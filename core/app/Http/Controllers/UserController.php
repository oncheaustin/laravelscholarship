<?php

namespace App\Http\Controllers;

use App\BasicSetting;
use App\Category;
use App\Compound;
use App\Deposit;
use App\DepositImage;
use App\Investment;
use App\PaymentLog;
use App\PaymentMethod;
use App\Plan;
use App\Repeat;
use App\RepeatLog;
use App\Support;
use App\SupportMessage;
use App\TraitsFolder\MailTrait;
use App\User;
use App\UserData;
use App\UserLog;
use App\WithdrawLog;
use App\WithdrawMethod;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Lib\GoogleAuthenticator;
use App\Answer;
use App\Student;
use App\Examinfo;
use App\Question;

class UserController extends Controller
{
    use MailTrait;
    public function __construct()
    {
        $this->middleware('verifyUser');
        $this->middleware('auth');
    }
    public function getDashboard()
    {

        $data['page_title'] = 'User Dashboard';

        $data['reference_title'] = "Referral User";
        $data['basic_setting'] = BasicSetting::first();
        $data['reference_user'] = User::whereUnder_reference(Auth::user()->id)->orderBy('id','desc')->get();

        $data['user'] = User::findOrFail(Auth::user()->id);
        $data['balance'] = $data['user'];
        $data['deposit'] = Deposit::whereUser_id(Auth::user()->id)->whereStatus(1)->sum('amount');
        $data['repeat'] = RepeatLog::whereUser_id(Auth::user()->id)->sum('amount');
        $data['withdraw'] = WithdrawLog::whereUser_id(Auth::user()->id)->whereIn('status',[2])->sum('amount');
        $data['refer'] = User::where('under_reference',Auth::user()->id)->count();
        return view('user.dashboard',$data);
    }

    public function changePassword()
    {
        $data['page_title'] = "Change Password";
        return view('user.change-password', $data);
    }

    public function submitPassword(Request $request)
    {
        $this->validate($request, [
            'current_password' =>'required',
            'password' => 'required|min:5|confirmed'
        ]);
        try {
            $c_password = Auth::user()->password;
            $c_id = Auth::user()->id;
            $user = User::findOrFail($c_id);
            if(Hash::check($request->current_password, $c_password)){

                $password = Hash::make($request->password);
                $user->password = $password;
                $user->save();
                session()->flash('message', 'Password Changes Successfully.');
                session()->flash('title','Success');
                Session::flash('type', 'success');
                return redirect()->back();
            }else{
                session()->flash('alert', 'Current Password Not Match');
                Session::flash('type', 'warning');
                session()->flash('title','Opps');
                return redirect()->back();
            }

        } catch (\PDOException $e) {
            session()->flash('alert', $e->getMessage());
            Session::flash('type', 'warning');
            session()->flash('title','Opps');
            return redirect()->back();
        }
    }

    public function editProfile()
    {
        $data['page_title'] = "";
        $data['page_title2']="Bank Details";
        $data['user'] = User::findOrFail(Auth::user()->id);
        return view('user.edit-profile', $data);
    }

    public function submitProfile(Request $request)
    {$data['page_title'] = "Scholarship Payment";
        $user = User::findOrFail(Auth::user()->id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'phone' => 'required|string|min:10|unique:users,phone,'.$user->id,
            
            'username' => 'required|min:5|unique:users,username,'.$user->id,
            'image' => 'required|mimes:png,jpg,jpeg',
            'image2' => 'required|mimes:png,jpg,jpeg'
        ]);
        $in = Input::except('_method','_token');
        $in['reference'] = $request->username;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = $request->username.'.'.$image->getClientOriginalExtension();
            $location = 'assets/images/' . $filename;
            $in['image'] = $filename;
            if ($user->image != 'user-default.png'){
                $path = './assets/images/';
                $link = $path.$user->image;
                if (file_exists($link)) {
                    unlink($link);
                }
            }
            Image::make($image)->resize(400,400)->save($location);
        }
        $user->fill($in)->save();
        
        if($request->hasFile('image')){
            $image2 = $request->file('image2');
            $filename = $request->username.'.'.$image2->getClientOriginalExtension();
            $location = 'assets/images/' . $filename;
            $in['image2'] = $filename;
           if ($user->image2 != 'user-default2.png'){
                $path = './assets/images/';
                $link = $path.$user->image;
                if (file_exists($link)) {
                    unlink($link);
                }
            }
            Image::make($image2)->resize(400,800)->save($location);
        }
        $user->fill($in)->save();
        session()->flash('message', 'Documents Uploaded Successfully.');
        session()->flash('title','Success');
        Session::flash('type', 'success');
        return redirect()->route('deposit-fund');
    }
    public function depositMethod()
    {
$user = User::findOrFail(Auth::user()->id);

$reAmo = 1000;

        $data['page_title'] = 'Scholarship Payment';
        $data['user'] = $user->balance;
        $data['paypal'] = PaymentMethod::whereId(1)->first();
        $data['perfect'] = PaymentMethod::whereId(2)->first();
        $data['btc'] = PaymentMethod::whereId(3)->first();
        $data['stripe'] = PaymentMethod::whereId(4)->first();
//        $count = PaymentMethod::count();
//        $skip = 4;
//        $limit = $count - $skip;
//        $data['bank'] = PaymentMethod::orderBy('id','asc')->skip($skip)->take($limit)->whereStatus(1)->get();
        $data['bank'] = PaymentMethod::orderBy('id','asc')->where('id', '>', 4)->whereStatus(1)->get();
        $data['balance'] = User::findOrFail(Auth::user()->id);
        $data['exam_code'] = $user->phone_code;
        

        return view('user.deposit-fund',$data);
        

    }
    public function submitDepositFund(Request $request)
    {
        $basic = BasicSetting::first();
        $this->validate($request,[
            'amount' => 'required',
            'payment_type' => 'required',
        ]);
        $pay_id = $request->payment_type;
        $amou = $request->amount;
        if ($pay_id == 1) {
            $paypal = PaymentMethod::whereId(1)->first();
            $charge = ($paypal->fix + ( $amou*$paypal->percent / 100 ));
        }elseif ($pay_id == 2) {
            $paypal = PaymentMethod::whereId(2)->first();
            $charge = ($paypal->fix + ( $amou*$paypal->percent / 100 ));
        }elseif ($pay_id == 3) {
            $paypal = PaymentMethod::whereId(3)->first();
            $charge = ($paypal->fix + ( $amou*$paypal->percent / 100 ));
        }elseif ($pay_id == 4) {
            $paypal = PaymentMethod::whereId(4)->first();
            $charge = ($paypal->fix + ( $amou*$paypal->percent / 100 ));
        }else{
            $paypal = PaymentMethod::whereId($pay_id)->first();
            $charge = $paypal->fix + ( $amou*$paypal->percent / 100 );
        }
         
        $lo['member_id'] = Auth::user()->id;
        $lo['custom'] = strtoupper(Str::random(20));
        $lo['amount'] = $amou;
        $lo['charge'] = round($charge,$basic->deci);
        $lo['net_amount'] = $amou + $charge;
        $lo['usd'] = round(($amou + $charge) / $paypal->rate,2);
        $lo['payment_type'] = $request->payment_type;
        $data['fund'] = PaymentLog::create($lo);
        return redirect()->route('deposit-preview',$data['fund']->custom);
    }
    public function depositPreview($id)
    {
        
       $email = User::findOrFail(Auth::user()->id);
        $data['fund'] = PaymentLog::whereCustom($id)->first();
        $data['page_title'] = "Payment Preview";
        $data['paypal'] = PaymentMethod::whereId(1)->first();
        $data['perfect'] = PaymentMethod::whereId(2)->first();
        $data['btc'] = PaymentMethod::whereId(3)->first();
        $data['stripe'] = PaymentMethod::whereId(4)->first();
       
//        $count = PaymentMethod::count();
//        $skip = 4;
//        $limit = $count - $skip;
//        $data['bank'] = PaymentMethod::orderBy('id','asc')->skip($skip)->take($limit)->whereStatus(1)->get();
        $data['bank'] = PaymentMethod::orderBy('id','asc')->where('id', '>', '4')->whereStatus(1)->get();
        return view('user.deposit-preview',$data, ['email'=>$email],['name'=>$email],['phone'=>$email]);
    }
    public function manualDepositSubmit(Request $request)
    {
        $this->validate($request,[
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'fund_id' => 'required'
        ]);
        $fund = PaymentLog::findOrFail($request->fund_id);
        $de['user_id'] = Auth::user()->id;
        $de['amount'] = $fund->amount;
        $de['charge'] = $fund->charge;
        $de['net_amount'] = $fund->net_amount;
        $de['payment_type'] = $fund->payment_type;
        $de['message'] = $request->message;
        $de['transaction_id'] = $fund->custom;
        $dep = Deposit::create($de);

        if($request->hasFile('image')){
            $image3 = $request->file('image');
            foreach ($image3 as $img){
                $filename3 = time().'h3'.'.'.$img->getClientOriginalExtension();
                $location = 'assets/deposit/' . $filename3;
                Image::make($img)->save($location);
                $in['image'] = $filename3;
                $in['deposit_id'] = $dep->id;
                DepositImage::create($in);
            }
        }
        session()->flash('message', 'Deposit Successfully Submitted. Wait For Confirmation.');
        Session::flash('type', 'success');
        Session::flash('title', 'Completed');
        return redirect()->route('deposit-fund');

    }
    public function historyDepositFund()
    {
        $data['page_title'] = "Deposit History";
        $data['deposit'] = Deposit::whereUser_id(Auth::user()->id)->orderBy('id','desc')->get();
        return view('user.deposit-history',$data);
    }
    public function userActivity()
    {
        $data['page_title'] = "Transaction Log";
        $data['log'] = UserLog::whereUser_id(Auth::user()->id)->orderBy('id','desc')->paginate(15);
        return view('user.user-activity',$data);
    }
    public function withdrawRequest()
    {

        $data['page_title'] = "Withdraw Method";
        $data['basic'] = BasicSetting::first();
        
        if ($data['basic']->withdraw_status == 0){
            session()->flash('message','Currently Withdraw Is Deactivated.');
            session()->flash('type','warning');
            session()->flash('title','Warning');
        }
         $user = User::findOrFail(Auth::user()->id);
        $data['method'] = WithdrawMethod::whereStatus(1)->get();
        return view('user.withdraw-request',$data);
    }
    public function submitWithdrawRequest(Request $request)
    {
         $user = User::findOrFail(Auth::user()->id);
        $this->validate($request,[
            'method_id' => 'required',
            'amount' => 'required'
        ]);
        $basic = BasicSetting::first();
        $bal = User::findOrFail(Auth::user()->id);
        $method = WithdrawMethod::findOrFail($request->method_id);
        $ch = $method->fix + round(($request->amount * $method->percent) / 100,$basic->deci);
        $reAmo = $request->amount + $ch;
        if ($reAmo < $method->withdraw_min){
            session()->flash('message','Your Request Amount is Smaller Then Withdraw Minimum Amount.');
            session()->flash('type','warning');
            session()->flash('title','Opps');
            return redirect()->back();
        }
        if ($reAmo > $method->withdraw_max){
            session()->flash('message','Your Request Amount is Larger Then Withdraw Maximum Amount.');
            session()->flash('type','warning');
            session()->flash('title','Opps');
            return redirect()->back();
        }
        if ($reAmo > $bal->balance){
            session()->flash('message','Your Request Amount is Larger Then Your Current Balance.');
            session()->flash('type','warning');
            session()->flash('title','Opps');
            return redirect()->back();
        }else{
            $tr = strtoupper(Str::random(20));
            $w['amount'] = $request->amount;
            $w['method_id'] = $request->method_id;
            $w['charge'] = $ch;
            $w['transaction_id'] = $tr;
            $w['net_amount'] = $reAmo;
            $w['user_id'] = Auth::user()->id;
            $trr = WithdrawLog::create($w);
            return redirect()->route('withdraw-preview',$trr->transaction_id);
        }
    }
    public function previewWithdraw($id)
    {
        $data['page_title'] = "Withdraw Method";
        $data['withdraw'] = WithdrawLog::whereTransaction_id($id)->first();
        $data['method'] = WithdrawMethod::findOrFail($data['withdraw']->method_id);
         $data['user'] = User::findOrFail(Auth::user()->id);
        $data['balance'] = User::findOrFail(Auth::user()->id);
        return view('user.withdraw-preview',$data);
    }
    public function submitWithdraw(Request $request)
    {
        $basic = BasicSetting::first();
        $this->validate($request,[
            'withdraw_id' => 'required',
            'account_name' => 'required',
            'account_no' => 'required',
            'bank' => 'required'
        ]);
        $ww = WithdrawLog::findOrFail($request->withdraw_id);
        $ww->message = $request->message;
        $ww->account_name = $request->account_name;
        $ww->account_no = $request->account_no;
        $ww->bank = $request->bank;
        $ww->status = 1;
        $ww->save();

        $bal4 = User::findOrFail(Auth::user()->id);
        $ul['user_id'] = $bal4->id;
        $ul['amount'] = $ww->amount;
        $ul['charge'] = $ww->charge;
        $ul['amount_type'] = 5;
        $ul['post_bal'] = $bal4->balance - $ww->amount;
        $ul['description'] = $ww->amount." ".$basic->currency." Withdraw Request Send. Via ".$ww->method->name;
        $ul['transaction_id'] = $ww->transaction_id;
        UserLog::create($ul);

        $bal4 = User::findOrFail(Auth::user()->id);
        $ul['user_id'] = $bal4->id;
        $ul['amount'] = $ww->charge;
        $ul['charge'] = null;
        $ul['amount_type'] = 10;
        $ul['post_bal'] = $bal4->balance - ($ww->amount + $ww->charge);
        $ul['description'] = $ww->charge." ".$basic->currency." Charged for Withdraw Request. Via ".$ww->method->name;
        $ul['transaction_id'] = $ww->transaction_id;
        UserLog::create($ul);

        $bal4->balance = $bal4->balance - $ww->net_amount;
        $bal4->save();

        if ($basic->email_notify == 1){
            $text = $ww->amount." - ". $basic->currency." Withdraw Request Send via ".$ww->method->name.". <br> Transaction ID Is : <b>#$ww->transaction_id</b>";
            $this->sendMail($bal4->email,$bal4->name,'Withdraw Request.',$text);
        }
        if ($basic->phone_notify == 1){
            $text = $ww->amount." - ". $basic->currency." Withdraw Request Send via ".$ww->method->name.". <br> Transaction ID Is : <b>#$ww->transaction_id</b>";
            $this->sendSms($bal4->phone,$text);
        }

        session()->flash('message','Withdraw request Successfully Submitted. Wait For Confirmation.');
        session()->flash('type','success');
        session()->flash('title','Success');
        return redirect()->route('withdraw-log');

    }
    public function withdrawLog()
    {
        $data['page_title'] = "Withdraw Log";
        $data['log'] = WithdrawLog::whereUser_id(Auth::user()->id)->whereNotIn('status',[0])->orderBy('id','desc')->get();
        return view('user.withdraw-log',$data);
    }
    public function openSupport()
    {
        $data['page_title'] = "Open Support Ticket";
        return view('user.support-open', $data);
    }
    public function submitSupport(Request $request)
    {
        $this->validate($request,[
            'subject' => 'required',
            'message' => 'required'
        ]);
        $s['ticket_number'] = strtoupper(Str::random(12));
        $s['user_id'] = Auth::user()->id;
        $s['subject'] = $request->subject;
        $s['status'] = 1;
        $mm = Support::create($s);
        $mess['support_id'] = $mm->id;
        $mess['ticket_number'] = $mm->ticket_number;
        $mess['message'] = $request->message;
        $mess['type'] = 1;
        SupportMessage::create($mess);
        session()->flash('success','Support Ticket Successfully Open.');
        session()->flash('type','success');
        session()->flash('title','Success');
        return redirect()->route('support-all');
    }
    public function allSupport()
    {
        $data['page_title'] = "All Support Ticket";
        $data['support'] = Support::whereUser_id(Auth::user()->id)->orderBy('id','desc')->get();
        return view('user.support-all',$data);
    }
    public function supportMessage($id)
    {
        $data['page_title'] = "Support Message";
        $data['support'] = Support::whereTicket_number($id)->first();
        $data['message'] = SupportMessage::whereTicket_number($id)->orderBy('id','asc')->get();
        return view('user.support-message', $data);
    }
    public function userSupportMessage(Request $request)
    {
        $this->validate($request,[
            'message' => 'required',
            'support_id' => 'required'
        ]);
        $mm = Support::findOrFail($request->support_id);
        $mm->status = 3;
        $mm->save();
        $mess['support_id'] = $mm->id;
        $mess['ticket_number'] = $mm->ticket_number;
        $mess['message'] = $request->message;
        $mess['type'] = 1;
        SupportMessage::create($mess);
        session()->flash('message','Support Ticket Successfully Reply.');
        session()->flash('type','success');
        session()->flash('title','Success');
        return redirect()->back();
    }
    public function supportClose(Request $request)
    {
        $this->validate($request,[
            'support_id' => 'required'
        ]);
        $su = Support::findOrFail($request->support_id);
        $su->status = 9;
        $su->save();
        session()->flash('message','Support Successfully Closed.');
        session()->flash('type','success');
        session()->flash('title','Success');
        return redirect()->back();
    }

    public function newInvest()
    {
        $data['basic_setting'] = BasicSetting::first();
        $data['page_title'] = "User New Invest";
        $data['plan'] = Plan::whereStatus(1)->get();
        return view('user.investment-new',$data);
    }

    public function postInvest(Request $request)
    {
        $this->validate($request,[
            'id' => 'required'
        ]);
        $data['page_title'] = "Investment Preview";
        $data['plan'] = Plan::findOrFail($request->id);
        return view('user.investment-preview',$data);
    }

    public function chkInvestAmount(Request $request)
    {
        $plan = Plan::findOrFail($request->plan);
        $user = User::findOrFail(Auth::user()->id);
        $amount = $request->amount;

        if ($request->amount > $user->balance){
            return '<div class="col-sm-7 col-sm-offset-4">
                <div class="alert alert-warning"><i class="fa fa-times"></i> Amount Is Larger than Your Current Amount.</div>
            </div>
            <div class="col-sm-7 col-sm-offset-4">
                <button type="button" class="btn btn-primary btn-block bold uppercase btn-lg delete_button disabled"
                        >
                    <i class="fa fa-cloud-upload"></i> Invest Amount Under This Product
                </button>
            </div>';
        }
        if( $plan->minimum > $amount){
            return '<div class="col-sm-7 col-sm-offset-4">
                <div class="alert alert-warning"><i class="fa fa-times"></i> Amount Is Smaller than Plan Minimum Amount.</div>
            </div>
            <div class="col-sm-7 col-sm-offset-4">
                <button type="button" class="btn btn-primary btn-block bold uppercase btn-lg  delete_button disabled"
                        >
                    <i class="fa fa-cloud-upload"></i> Invest Amount Under This Product
                </button>
            </div>';
        }elseif( $plan->maximum < $amount){
            return '<div class="col-sm-7 col-sm-offset-4">
                <div class="alert alert-warning"><i class="fa fa-times"></i> Amount Is Larger than Plan Maximum Amount.</div>
            </div>
            <div class="col-sm-7 col-sm-offset-4">
                <button type="button" class="btn btn-primary btn-block bold uppercase btn-lg delete_button disabled"
                      >
                    <i class="fa fa-cloud-upload"></i> Invest Amount Under This Product
                </button>
            </div>';
        }else{
            return '<div class="col-sm-7 col-sm-offset-4">
                <div class="alert alert-success"><i class="fa fa-check"></i> Well Done. Invest This Amount Under this Product.</div>
            </div>
            <div class="col-sm-7 col-sm-offset-4">
                <button type="button" class="btn btn-primary bold uppercase btn-block btn-lg delete_button"
                        data-toggle="modal" data-target="#DelModal"
                        data-id='.$amount.'>
                    <i class="fa fa-cloud-upload"></i> Invest Amount Under This Product
                </button>
            </div>';
        }

    }

    public function submitInvest(Request $request)
    {
        $basic = BasicSetting::first();
        $request->validate([
           'amount' => 'required',
            'user_id' => 'required',
            'plan_id' => 'required'
        ]);
        $in = Input::except('_method','_token');
        $in['trx_id'] = strtoupper(Str::random(20));
        $invest = Investment::create($in);

        $pak = Plan::findOrFail($request->plan_id);
        $com = Compound::findOrFail($pak->compound_id);
        $rep['user_id'] = $invest->user_id;
        $rep['investment_id'] = $invest->id;
        $rep['repeat_time'] = Carbon::parse()->addHours($com->compound);
        $rep['total_repeat'] = 0;
        Repeat::create($rep);

        $bal4 = User::findOrFail(Auth::user()->id);
        $ul['user_id'] = $bal4->id;
        $ul['amount'] = $request->amount;
        $ul['charge'] = null;
        $ul['amount_type'] = 14;
        $ul['post_bal'] = $bal4->balance - $request->amount;
        $ul['description'] = $request->amount." ".$basic->currency." Invest Under ".$pak->name." Plan.";
        $ul['transaction_id'] = $in['trx_id'];
        UserLog::create($ul);

        $bal4->balance = $bal4->balance - $request->amount;
        $bal4->save();

        $trx = $in['trx_id'];

        if ($basic->email_notify == 1){
            $text = $request->amount." - ". $basic->currency." Invest Under ".$pak->name." Plan. <br> Transaction ID Is : <b>#$trx</b>";
            $this->sendMail($bal4->email,$bal4->name,'New Investment',$text);
        }
        if ($basic->phone_notify == 1){
            $text = $request->amount." - ". $basic->currency." Invest Under ".$pak->name." Plan. <br> Transaction ID Is : <b>#$trx</b>";
            $this->sendSms($bal4->phone,$text);
        }

        session()->flash('success','Investment Successfully Completed.');
        session()->flash('type','success');
        session()->flash('title','Success');
        return redirect()->back();
    }

    public function historyInvestment()
    {
        $data['page_title'] = "Invest History";
        $data['history'] = Investment::whereUser_id(Auth::user()->id)->orderBy('id','desc')->get();
        return view('user.investment-history',$data);
    }

    public function repeatLog()
    {
        $data['user'] = User::findOrFail(Auth::user()->id);
        $data['page_title'] = 'All Repeat';
        $data['log'] = RepeatLog::whereUser_id(Auth::user()->id)->orderBy('id','desc')->paginate(15);
        return view('user.repeat-history',$data);
    }
//    public function userReference()
//    {
//        $data['page_title'] = "Reference User";
//        $data['user'] = User::whereUnder_reference(Auth::user()->id)->orderBy('id','desc')->get();
//        return view('user.reference-user',$data);
//    }




 public function walletSettings()

    {
 
       
        
     
        $data['page_title'] = 'Wallet Settings';
        $data['account_number'] = UserData::whereUser_id(Auth::user()->id)->get();
        
        

        return view('user.wallet', $data);

    }

    public function walletSettingsStore(Request $r)

    {

        $inputs = $r->except('_token');

        /*$r->validate(function () use ($input) {
            $rules = [];
            if ($input) {
                foreach ($input as $key => $value) {
                    $rules[$key] = 'required';
                }
            }
            return $rules;
        });*/

        foreach ($inputs as $key => $value) {
            $data = UserData::where(['user_id' => Auth::user()->id])->update([
                'account_number' => $value
            ]);
        }

        return redirect()->back()->with('message', 'Updated Successfully.');

    }

    public function google2fa()
    {
        $page_title = 'Enable Google Login Verification';

        $gnl = BasicSetting::first();
        $ga = new GoogleAuthenticator();
        $secret = $ga->createSecret();
        $qrCodeUrl = $ga->getQRCodeGoogleUrl(Auth::user()->username.'@'.$gnl->title, $secret);

        $prevcode = Auth::user()->secretcode;
        $prevqr = $ga->getQRCodeGoogleUrl(Auth::user()->username.'@'.$gnl->title, $prevcode);

        return view('user.goauth.create', compact('secret','qrCodeUrl','prevcode','prevqr','page_title'));

    }

    public function create2fa(Request $request)
    {
        $user = User::find(Auth::id());

        $this->validate($request,
            [
                'key' => 'required',
                'code' => 'required',
            ]);

        $ga = new GoogleAuthenticator();

        $secret = $request->key;
        $oneCode = $ga->getCode($secret);
        $userCode = $request->code;

        if ($oneCode == $userCode)
        {
            $user['secretcode'] = $request->key;
            $user['tauth'] = 1;
            $user['tfver'] = 1;
            $user->save();

            //$msg =  'Google Two Factor Authentication Enabled Successfully';
            //send_email($user->email, $user->username, 'Google 2FA', $msg);
            //$sms =  'Google Two Factor Authentication Enabled Successfully';
            //send_sms($user->mobile, $sms);

            return back()->with('success', 'Google Authenticator Enabeled Successfully');
        }
        else {

            return back()->with('alert', 'Wrong Verification Code');
        }


    }

    public function disable2fa(Request $request)
    {
        $this->validate($request,
            [
                'code' => 'required',
            ]);

        $user = User::find(Auth::id());
        $ga = new GoogleAuthenticator();

        $secret = $user->secretcode;
        $oneCode = $ga->getCode($secret);
        $userCode = $request->code;

        if ($oneCode == $userCode)
        {
            $user = User::find(Auth::id());
            $user['tauth'] = 0;
            $user['tfver'] = 1;
            $user['secretcode'] = '0';
            $user->save();

            // $msg =  'Google Two Factor Authentication Disabled Successfully';
            // send_email($user->email, $user->username, 'Google 2FA', $msg);
            // $sms =  'Google Two Factor Authentication Disabled Successfully';
            // send_sms($user->mobile, $sms);

            return back()->with('success', 'Two Factor Authenticator Disable Successfully');
        }
        else
        {
            return back()->with('alert', 'Wrong Verification Code');
        }
        
    }

//Examination


 public function getContact2()
    {
        $data['page_title'] = 'Registration Page';
        return view('user.register-2',$data);
    }
  public function getContact3()
    {
        $data['page_title'] = 'Registration Page';
        return view('register-3',$data);
    }

  

}
