<?php

namespace App\Http\Controllers;

use App\BasicSetting;
use App\Compound;
use App\Deposit;
use App\PaymentMethod;
use App\Plan;
use App\RepeatLog;
use App\Support;
use App\SupportMessage;
use App\TraitsFolder\MailTrait;
use App\User;
use App\UserLog;
use App\UserLogin;
use App\WithdrawLog;
use App\WithdrawMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class DashboardController extends Controller
{
    use MailTrait;
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function getDashboard()
    {
        $data['page_title'] = "Dashboard";

        $data['total_earn'] = UserLog::whereIn('amount_type', [1,2,5,9,10])->sum('amount') - UserLog::whereIn('amount_type', [4,3,6,8])->sum('amount');

        $data['total_pending_ticket'] = Support::whereIn('status', [1,3])->count();
        $data['total_ticket'] = Support::all()->count();
        $data['total_answer'] = Support::whereStatus(2)->count();
        $data['total_close'] = Support::whereStatus(9)->count();

        $data['user_balance'] = User::sum('balance');
        $data['total_repeat'] = RepeatLog::sum('amount');

        $data['total_user'] = User::all()->count();
        $data['block_user'] = User::whereStatus(1)->count();
        $data['email_verify'] = User::whereEmail_verify(0)->count();
        $data['phone_verify'] = User::wherePhone_verify(0)->count();

        $data['total_deposit'] = Deposit::whereNotIn('status',[0])->sum('amount');
        $data['deposit_method'] = PaymentMethod::all()->count();
        $data['deposit_number'] = Deposit::whereNotIn('status',[0])->count();
        $data['deposit_pending'] = Deposit::whereStatus(0)->count();

       
        $data['total_withdraw'] = WithdrawLog::whereStatus(2)->sum('amount');
        $data['withdraw_method'] = WithdrawMethod::all()->count();
        $data['withdraw_charge'] = WithdrawLog::whereStatus(2)->sum('charge');
        $data['withdraw_number'] = WithdrawLog::all()->count();
        $data['withdraw_success'] = WithdrawLog::whereStatus(2)->count();
        $data['withdraw_pending'] = WithdrawLog::whereStatus(1)->count();
        $data['withdraw_refund'] = WithdrawLog::whereStatus(3)->count();


        return view('dashboard.dashboard', $data);
    }
   
//    public function depositMethod()
//    {
//        $data['page_title'] = 'Deposit Method';
//        $data['paypal'] = PaymentMethod::whereId(1)->first();
//        $data['perfect'] = PaymentMethod::whereId(2)->first();
//        $data['btc'] = PaymentMethod::whereId(3)->first();
//        $data['stripe'] = PaymentMethod::whereId(4)->first();
//        return view('dashboard.payment-method',$data);
//    }


    public function depositMethod()
    {
        $data['page_title'] = 'Deposit Method';
//        $data['paypal'] = PaymentMethod::whereId(1)->first();
//        $data['perfect'] = PaymentMethod::whereId(2)->first();
//        $data['btc'] = PaymentMethod::whereId(3)->first();
//        $data['stripe'] = PaymentMethod::whereId(4)->first();

        $data['gateways'] = PaymentMethod::take(5)->get();
        return view('dashboard.payment-method',$data);
    }

    public function updateDepositMethod(Request $request, $id)
    {
        $gateway = PaymentMethod::find($id);

        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'fix' => 'required',
            'percent' => 'required',
            'rate' => 'required',
            'val1' => 'nullable',
            'val2' => 'nullable',
            'status' => 'nullable'
        ]);

        if($request->hasFile('image'))
        {
            if (file_exists('assets/images/'.$gateway->image)) {
                unlink('assets/images/'.$gateway->image);
            }
            $gateway['image'] = uniqid().'.'.$request->image->getClientOriginalExtension();
            $request->image->move('assets/images/',$gateway['image']);
        }

        $gateway['name'] = $request->name;
        $gateway['fix'] = $request->fix;
        $gateway['percent'] = $request->percent;
        $gateway['rate'] = $request->rate;
        $gateway['val1'] = $request->val1;
        $gateway['val2'] = $request->val2;
        $gateway['status'] = $request->status;

        $gateway->save();

        return back()->with('success','Gateway Information Updated successfully.');

    }
    

//    public function updateDepositMethod(Request $request)
//    {
//        return "asdf";
//        $this->validate($request,[
//            'paypal_name' => 'required',
//            'paypal_rate' => 'numeric',
//            'paypal_image' => 'mimes:png,jpeg,jpg',
//            'paypal_email' => 'required',
//            'perfect_name' => 'required',
//            'perfect_rate' => 'numeric',
//            'perfect_image' => 'mimes:png,jpeg,jpg',
//            'perfect_account' => 'required',
//            'perfect_alternate' => 'required',
//            'btc_name' => 'required',
//            'btc_rate' => 'numeric',
//            'btc_image' => 'mimes:png,jpeg,jpg',
//            'btc_api' => 'required',
//            'btc_xpub' => 'required',
//            'stripe_name' => 'required',
//            'stripe_rate' => 'numeric',
//            'stripe_image' => 'mimes:png,jpeg,jpg',
//            'stripe_secret' => 'required',
//            'stripe_publishable' => 'required',
//        ]);
//
//        $paypal = PaymentMethod::whereId(1)->first();
//        $perfect = PaymentMethod::whereId(2)->first();
//        $btc = PaymentMethod::whereId(3)->first();
//        $stripe = PaymentMethod::whereId(4)->first();
//
//        $paypal->name = $request->paypal_name;
//        $paypal->val1 = $request->paypal_email;
//        $paypal->status = $request->paypal_status == 'on' ? '1' : '0';
//        $paypal->fix = $request->paypal_fix;
//        $paypal->rate = $request->paypal_rate;
//        $paypal->percent = $request->paypal_percent;
//        if($request->hasFile('paypal_image')){
//            $image3 = $request->file('paypal_image');
//            $filename3 = time().'h3'.'.'.$image3->getClientOriginalExtension();
//            $location = 'assets/images/' . $filename3;
//            Image::make($image3)->resize(400,400)->save($location);
//            $path = './assets/images/';
//            $link = $path.$paypal->image;
//            if (file_exists($link)){
//                unlink($link);
//            }
//            $paypal->image = $filename3;
//        }
//        $perfect->name = $request->perfect_name;
//        $perfect->val1 = $request->perfect_account;
//        $perfect->val2 = $request->perfect_alternate;
//        $perfect->status = $request->perfect_status == 'on' ? '1' : '0';
//        $perfect->fix = $request->perfect_fix;
//        $perfect->rate = $request->perfect_rate;
//        $perfect->percent = $request->perfect_percent;
//        if($request->hasFile('perfect_image')){
//            $image3 = $request->file('perfect_image');
//            $filename3 = time().'h4'.'.'.$image3->getClientOriginalExtension();
//            $location = 'assets/images/' . $filename3;
//            Image::make($image3)->resize(400,400)->save($location);
//            $path = './assets/images/';
//            $link = $path.$perfect->image;
//            if (file_exists($link)){
//                unlink($link);
//            }
//            $perfect->image = $filename3;
//        }
//        $btc->name = $request->btc_name;
//        $btc->val1 = $request->btc_api;
//        $btc->val2 = $request->btc_xpub;
//        $btc->status = $request->btc_status == 'on' ? '1' : '0';
//        $btc->fix = $request->btc_fix;
//        $btc->rate = $request->btc_rate;
//        $btc->percent = $request->btc_percent;
//        if($request->hasFile('btc_image')){
//            $image3 = $request->file('btc_image');
//            $filename3 = time().'h5'.'.'.$image3->getClientOriginalExtension();
//            $location = 'assets/images/' . $filename3;
//            Image::make($image3)->resize(400,400)->save($location);
//            $path = './assets/images/';
//            $link = $path.$btc->image;
//            if (file_exists($link)){
//                unlink($link);
//            }
//            $btc->image = $filename3;
//        }
//        $stripe->name = $request->stripe_name;
//        $stripe->val1 = $request->stripe_secret;
//        $stripe->val2 = $request->stripe_publishable;
//        $stripe->status = $request->stripe_status == 'on' ? '1' : '0';
//        $stripe->fix = $request->stripe_fix;
//        $stripe->rate = $request->stripe_rate;
//        $stripe->percent = $request->stripe_percent;
//        if($request->hasFile('stripe_image')){
//            $image3 = $request->file('stripe_image');
//            $filename3 = time().'h6'.'.'.$image3->getClientOriginalExtension();
//            $location = 'assets/images/' . $filename3;
//            Image::make($image3)->resize(400,400)->save($location);
//            $path = './assets/images/';
//            $link = $path.$stripe->image;
//            if (file_exists($link)){
//                unlink($link);
//            }
//            $stripe->image = $filename3;
//        }
//
//        $paypal->save();
//        $perfect->save();
//        $btc->save();
//        $stripe->save();
//
//        session()->flash('message', 'Deposit Method Updated Successfully.');
//        Session::flash('type', 'success');
//        Session::flash('title', 'Success');
//        return redirect()->back();
//    }
    public function bankDeposit()
    {
        $data['page_title'] = 'Add Manual Method';
        return view('dashboard.bank-create',$data);
    }

    public function showBitcoinManualDeposit()
    {
        $data['page_title'] = 'All Bitcoin Manual Method';
        $data['btc'] = PaymentMethod::where('id', 5)->first();
        return view('dashboard.manual-bitcoin-show',$data);
    }
    public function editBitcoinManualDeposit($id)
    {
        $data['page_title'] = 'Edit Manual Method';
        $data['btc'] = PaymentMethod::findOrFail($id);
        return view('dashboard.manual-bitcoin-edit',$data);
    }
    public function updateBitcoinManual(Request $request, $id)
    {
        $btc = PaymentMethod::findOrFail($id);
        $this->validate($request,[
            'name' => 'required',
            'image' => 'mimes:png,jpg,jpeg',
            'val1' => 'required',
            'fix' => 'required',
            'percent' => 'required',
        ]);
        $in = Input::except('_method','_token');
        $in['status'] = $request->status == 'on' ? '1' : '0';
        if($request->hasFile('image')) {
            $image3 = $request->file('image');
            $filename3 = time() . 'h7' . '.' . $image3->getClientOriginalExtension();
            $location = 'assets/images/' . $filename3;
            Image::make($image3)->resize(400, 400)->save($location);
            $in['image'] = $filename3;
            $path = './assets/images/';
            $link = $path.$btc->image;
            if (file_exists($link)){
                unlink($link);
            }
        }
        $btc->fill($in)->save();
        session()->flash('message', 'Manual Method Updated Successfully.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }

    public function submitBankDeposit(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
            'val1' => 'required',
            'fix' => 'required|numeric',
            'percent' => 'required|numeric',
            'currency' => 'required',
            'rate' => 'required|numeric',
        ]);
        $in = Input::except('_method','_token');
        $in['status'] = $request->status == 'on' ? '1' : '0';
        if($request->hasFile('image')){
            $image3 = $request->file('image');
            $filename3 = time().'h7'.'.'.$image3->getClientOriginalExtension();
            $location = 'assets/images/' . $filename3;
            Image::make($image3)->resize(400,400)->save($location);
            $in['image'] = $filename3;
        }
        PaymentMethod::create($in);
        session()->flash('message', 'Manual Method Added Successfully.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }
    public function showBank()
    {
        $data['page_title'] = 'All Manual Method';
        $count = PaymentMethod::count();
        $skip = 5;
        $limit = $count - $skip;
        $data['gateways'] = PaymentMethod::orderBy('id','asc')->skip($skip)->take($limit)->get();
        return view('dashboard.bank-show',$data);
    }
    public function editBank($id)
    {
        $data['page_title'] = 'Edit Manual Method';
        $data['bank'] = PaymentMethod::findOrFail($id);
        return view('dashboard.bank-edit',$data);
    }
    public function updateBank(Request $request,$id)
    {
        $bank = PaymentMethod::findOrFail($id);
        $this->validate($request,[
            'name' => 'required',
            'image' => 'mimes:png,jpg,jpeg',
            'val1' => 'required',
            'fix' => 'required|numeric',
            'rate' => 'required|numeric',
            'percent' => 'required|numeric',
            'status' => 'nullable|numeric'
        ]);
        $in = Input::except('_method','_token');
        if($request->hasFile('image')) {
            $image3 = $request->file('image');
            $filename3 = time() . 'h7' . '.' . $image3->getClientOriginalExtension();
            $location = 'assets/images/' . $filename3;
            Image::make($image3)->resize(400, 400)->save($location);
            $in['image'] = $filename3;
            $path = './assets/images/';
            $link = $path.$bank->image;
            if (file_exists($link)){
                unlink($link);
            }
        }
        $bank->fill($in)->save();
        session()->flash('message', 'Manual Method Updated Successfully.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }
    public function withdrawMethod()
    {
        $data['page_title'] = 'Add Withdraw Method';
        return view('dashboard.withdraw-method',$data);
    }
    public function storeWithdrawMethod(Request $request)
    {

        $this->validate($request,[
            'name' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
            'fix' => 'required|numeric',
            'withdraw_min' => 'numeric',
            'withdraw_max' => 'numeric',
            'percent' => 'required|numeric',
        ]);
        $in = Input::except('_method','_token');
        $in['status'] = $request->status == 'on' ? '1' : '0';
        if($request->hasFile('image')) {
            $image3 = $request->file('image');
            $filename3 = time() . 'h8' . '.' . $image3->getClientOriginalExtension();
            $location = 'assets/images/' . $filename3;
            Image::make($image3)->resize(400, 400)->save($location);
            $in['image'] = $filename3;
        }
        WithdrawMethod::create($in);
        session()->flash('message','Withdraw Method Added Successfully.');
        session()->flash('type','success');
        session()->flash('title','Success');
        return redirect()->back();
    }
    public function showWithdrawMethod()
    {
        $data['page_title'] = 'All Withdraw Method';
        $data['bank'] = WithdrawMethod::orderBy('id','desc')->get();
        return view('dashboard.withdraw-show',$data);
    }
    public function editWithdrawMethod($id)
    {
        $data['page_title'] = 'Edit Withdraw Method';
        $data['bank'] = WithdrawMethod::findOrFail($id);
        return view('dashboard.withdraw-edit',$data);
    }
    public function updateWithdrawMethod(Request $request,$id)
    {
        $wit = WithdrawMethod::findOrFail($id);
        $this->validate($request,[
            'name' => 'required',
            'withdraw_min' => 'numeric',
            'withdraw_max' => 'numeric',
            'image' => 'mimes:png,jpg,jpeg',
            'fix' => 'required|numeric',
            'percent' => 'required|numeric',
        ]);
        $in = Input::except('_method','_token');
        $in['status'] = $request->status == 'on' ? '1' : '0';
        if($request->hasFile('image')) {
            $image3 = $request->file('image');
            $filename3 = time() . 'h8' . '.' . $image3->getClientOriginalExtension();
            $location = 'assets/images/' . $filename3;
            Image::make($image3)->resize(400, 400)->save($location);
            $in['image'] = $filename3;
            $path = './assets/images/';
            $link = $path.$wit->image;
            if (file_exists($link)){
                unlink($link);
            }
        }
        $wit->fill($in)->save();
        session()->flash('message','Withdraw Method Updated Successfully.');
        session()->flash('type','success');
        session()->flash('title','Success');
        return redirect()->back();
    }
    public function pendingDeposit()
    {
        $data['page_title'] = 'All Pending Manual Deposit Request';
        $data['deposit'] = Deposit::whereStatus(0)->orderBy('id','desc')->paginate(15);
        return view('dashboard.request-all',$data);
    }
    public function viewRequest($id)
    {
        $data['page_title'] = "Deposit Request View";
        $data['deposit'] = Deposit::findOrFail($id);
        return view('dashboard.request-view', $data);
    }
    public function approveManualRequest(Request $request)
    {

        $this->validate($request,[
            'id' => 'required'
        ]);

        $data = Deposit::findOrFail($request->id);
        $bank = $data->bank->name;
        $basic = BasicSetting::first();
        $mem = User::findOrFail($data->user_id);
        $data->status = 1;

        $ul['user_id'] = $mem->id;
        $ul['amount'] = $data->amount;
        $ul['charge'] = $data->charge;
        $ul['post_bal'] = $mem->balance + $data->amount;
        $ul['amount_type'] = 1;
        $ul['description'] = "Deposit ".$data->amount." ".$basic->currency." . By $bank.";
        $ul['transaction_id'] = $data->transaction_id;
        UserLog::create($ul);

        if ($mem->under_reference != 0){
            $refMem = User::findOrFail($mem->under_reference);
            $refAmo = round(($data->amount * $basic->reference_percent) / 100,$basic->deci);
            $ul['user_id'] = $refMem->id;
            $ul['amount'] = $refAmo;
            $ul['charge'] = null;
            $ul['post_bal'] = $refMem->balance + $refAmo;
            $ul['amount_type'] = 3;
            $ul['description'] = "Referral Deposit Bonus ".$refAmo." ".$basic->currency." . From - $mem->username.";
            $ul['transaction_id'] = $data->transaction_id;
            UserLog::create($ul);

            $refMem->balance = $refMem->balance + $refAmo;
            $refMem->save();
            if ($basic->email_notify == 1){
                $text = $refAmo." - ". $basic->currency ." Referral Deposit Bonus From - $mem->username. <br> Transaction ID Is : <b>#".$data->custom."</b>";
                $this->sendMail($refMem->email,$refMem->name,'Referral Deposit Bonus.',$text);
            }
            if ($basic->phone_notify == 1){
                $text = $refAmo." - ".$basic->currency ." Referral Deposit Bonus From - $mem->username.. <br> Transaction ID Is : <b>#".$data->custom."</b>";
                $this->sendSms($refMem->phone,$text);
            }

        }

        $mem->balance = $mem->balance + ($data->amount);
        $mem->save();

        $data->save();
        if ($basic->email_notify == 1){
            $text = $data->amount." - ". $basic->currency ." Payment Request Approve via $bank. <br> Transaction ID Is : <b>#".$data->transaction_id."</b>";
            $this->sendMail($mem->email,$mem->name,'Deposit Completed.',$text);
        }
        if ($basic->phone_notify == 1){
            $text = $data->amount." - ".$basic->currency ." Payment Request Approve via $bank. <br> Transaction ID Is : <b>#".$data->transaction_id."</b>";
            $this->sendSms($mem->phone,$text);
        }

        session()->flash('message', 'Payment Request Successfully Approved.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->route('request-deposit');
    }
    public function cancelManualRequest(Request $request)
    {
        $this->validate($request,[
            'id' => 'required'
        ]);
        $data = Deposit::findOrFail($request->id);
        $data->status = 2;
        $data->save();
        $basic = BasicSetting::first();
        if ($basic->email_notify == 1){
            $text = "$data->amount $basic->currency Payment Request Cancel. <br> Transaction ID Is : <b>#$data->transaction_id</b>";
            $this->sendMail($data->member->email,$data->member->name,'Payment Request Cancel.',$text);
        }
        if ($basic->phone_notify == 1){
            $text = "$data->amount $basic->currency Payment Request Cancel. <br> Transaction ID Is : <b>#$data->transaction_id</b>";
            $this->sendSms($data->member->phone,$text);
        }

        session()->flash('message', 'Payment Request Successfully Cancel.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
        
    }
    public function requestDeposit()
    {
        $data['page_title'] = 'All Manual Deposit Request';
        $data['deposit'] = Deposit::whereNotIn('payment_type', [1,2,3,4])->orderBy('id','desc')->paginate(15);
        return view('dashboard.request-all',$data);
    }
    public function userDepositHistory()
    {
        $data['page_title'] = 'User Deposit History';
        $data['deposit'] = Deposit::orderBy('id','desc')->paginate(15);
        return view('dashboard.deposit-history',$data);
    }
    public function allWithdrawRequest()
    {
        $data['page_title'] = "All Withdraw Request";
        $data['log'] = WithdrawLog::whereNotIn('status',[0])->orderBy('id','desc')->get();
        return view('dashboard.withdraw-request-all', $data);
    }
    public function singleWithdrawView($id)
    {
        $data['page_title'] = 'Withdraw Details';
        $data['deposit'] = WithdrawLog::findOrFail($id);
        return view('dashboard.single-withdraw',$data);
    }
    public function confirmWithdraw(Request $request)
    {
        $basic = BasicSetting::first();
        $this->validate($request,[
            'id' => 'required'
        ]);
        $ee = WithdrawLog::findOrFail($request->id);
        $parent = User::findOrFail($ee->user_id);
        $ee->status = 2;
        $ee->save();

        if ($basic->email_notify == 1){
            $text = "$ee->amount $basic->currency Withdraw Request Approved. Withdraw Via ".$ee->method->name.". <br> Transaction ID Is : <b>#$ee->transaction_id</b>";
            $this->sendMail($parent->email,$parent->name,'Withdraw Approved.',$text);
        }
        if ($basic->phone_notify == 1){
            $text = "$ee->amount $basic->currency Withdraw Request Approved. Withdraw Via ".$ee->method->name.". <br> Transaction ID Is : <b>#$ee->transaction_id</b>";
            $this->sendSms($parent->phone,$text);
        }

        session()->flash('message','Withdraw Confirmed Successfully.');
        session()->flash('type','success');
        session()->flash('title','Success');
        return redirect()->back();
    }
    public function refundWithdraw(Request $request)
    {
        $this->validate($request,[
            'id' => 'required'
        ]);
        $ww = WithdrawLog::findOrFail($request->id);
        $ww->status = 3;


        $basic = BasicSetting::first();
        $parent = User::whereId($ww->user_id)->first();

        $bal36 = $parent;
        $ul['user_id'] = $parent->id;
        $ul['amount'] = $ww->amount;
        $ul['charge'] = null;
        $ul['post_bal'] = $bal36->balance + $ww->amount;
        $ul['amount_type'] = 6;
        $ul['description'] = $ww->amount." ".$basic->currency." Withdraw Refunded.";
        $ul['transaction_id'] = $ww->transaction_id;
        UserLog::create($ul);

        $ul['user_id'] = $parent->id;
        $ul['amount'] = $ww->charge;
        $ul['charge'] = null;
        $ul['post_bal'] = $bal36->balance + $ww->amount + $ww->charge;
        $ul['amount_type'] = 10;
        $ul['description'] = $ww->charge." ".$basic->currency." Withdraw Charge Refunded.";
        $ul['transaction_id'] = $ww->transaction_id;
        UserLog::create($ul);

        $parent->balance = $parent->balance + ($ww->net_amount);
        $parent->save();

        $ww->save();

        if ($basic->email_notify == 1){
            $text = "$ww->amount $basic->currency Withdraw Refunded. <br> Transaction ID Is : <b>#$ww->transaction_id</b>";
            $this->sendMail($parent->email,$parent->name,'Withdraw Refunded.',$text);
        }
        if ($basic->phone_notify == 1){
            $text = "$ww->amount $basic->currency Withdraw Refunded.  <br> Transaction ID Is : <b>#$ww->transaction_id</b>";
            $this->sendSms($parent->phone,$text);
        }


        session()->flash('message','Withdraw Refund Successfully.');
        session()->flash('type','success');
        session()->flash('title','Success');
        return redirect()->back();
    }
    public function withdrawConfirm()
    {
        $data['page_title'] = "Confirm Withdraw Request";
        $data['log'] = WithdrawLog::whereStatus(2)->orderBy('id','desc')->get();
        return view('dashboard.withdraw-request-all', $data);
    }
    public function withdrawPending()
    {
        $data['page_title'] = "Pending Withdraw Request";
        $data['log'] = WithdrawLog::whereStatus(1)->orderBy('id','desc')->get();
        return view('dashboard.withdraw-request-all', $data);
    }
    public function withdrawRefund()
    {
        $data['page_title'] = "Refund Withdraw Request";
        $data['log'] = WithdrawLog::whereStatus(3)->orderBy('id','desc')->get();
        return view('dashboard.withdraw-request-all', $data);
    }

    public function repeatHistory()
    {
        $data['page_title'] = "Investment Repeat History";
        $data['log'] = RepeatLog::orderBy('id','desc')->paginate(15);
        return view('dashboard.repeat-history', $data);
    }
    public function adminSupport()
    {
        $data['page_title'] = "All Support Ticket";
        $data['support'] = Support::orderBy('id','desc')->get();
        return view('dashboard.support-all', $data);
    }

    public function adminSupportPending()
    {
        $data['page_title'] = "Pending Support Ticket";
        $data['support'] = Support::whereIn('status', [1,3])->orderBy('id','desc')->get();
        return view('dashboard.support-pending', $data);
    }
    public function adminSupportMessage($id)
    {
        $data['page_title'] = "Support Message";
        $data['support'] = Support::whereTicket_number($id)->first();
        $data['message'] = SupportMessage::whereTicket_number($id)->orderBy('id','asc')->get();
        return view('dashboard.support-message', $data);
    }
    public function adminSupportMessageSubmit(Request $request)
    {
        $this->validate($request,[
            'message' => 'required',
            'support_id' => 'required'
        ]);
        $mm = Support::findOrFail($request->support_id);
        $mm->status = 2;
        $mm->save();
        $mess['support_id'] = $mm->id;
        $mess['ticket_number'] = $mm->ticket_number;
        $mess['message'] = $request->message;
        $mess['type'] = 2;
        SupportMessage::create($mess);
        session()->flash('message','Support Ticket Successfully Reply.');
        session()->flash('type','success');
        session()->flash('title','Success');
        return redirect()->back();
    }
    public function adminSupportClose(Request $request)
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
    public function userDetails($id)
    {
        $data['page_title'] = 'User Details';
        $data['user'] = User::find($id);
        $user = $data['user'];
        $data['total_repeat'] = RepeatLog::whereUser_id($user->id)->count();
        $data['total_repeat_amount'] = RepeatLog::whereUser_id($user->id)->sum('amount');
        $data['total_deposit'] = Deposit::whereUser_id($user->id)->whereStatus(1)->count();
        $data['total_deposit_amount'] = Deposit::whereUser_id($user->id)->whereStatus(1)->sum('amount');
        $data['total_withdraw'] = WithdrawLog::whereUser_id($user->id)->whereIn('status',[3,2])->count();
        $data['total_withdraw_amount'] = WithdrawLog::whereUser_id($user->id)->whereIn('status',[2])->sum('amount');
        $data['total_login'] = UserLogin::whereUser_id($user->id)->count();
        $data['last_login'] = UserLogin::whereUser_id($user->id)->orderBy('id','desc')->first();
        return view('dashboard.user-details',$data);
    }
    public function userDetailsUpdate(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $uss = User::findOrFail($request->user_id);

        $in = Input::except('_method','_token','user_id');
        $in['email_verify'] = $request->email_verify == 'on' ? '1' : '0';
        $in['phone_verify'] = $request->phone_verify == 'on' ? '1' : '0';
        $in['status'] = $request->status == 'on' ? '0' : '1';
        $uss ->fill($in)->save();

        session()->flash('message', 'User Details Updated Successfully.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }
    public function userSendMail($id)
    {
        $data['page_title'] = 'User Details';
        $data['user'] = User::findOrFail($id);
        return view('dashboard.user-send-email',$data);
    }
    public function userSendMailSubmit(Request $request)
    {
        $this->validate($request,[
            'subject' => 'required',
            'message' => 'required',
            'user_id' => 'required'
        ]);
        $user = User::findOrFail($request->user_id);
        $this->sendMail($user->email,$user->name,$request->subject,$request->message);
        session()->flash('message', 'Email Send Successfully.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }
    
    

    
    
        public function userSendMailall($id)
    {
        $data['page_title'] = 'User Details';
        $data['user'] = User::orderBy('id','desc')->get();
        return view('dashboard.user-send-email',$data);
    }
    public function userSendMailSubmitall(Request $request)
    {
        $this->validate($request,[
            'subject' => 'required',
            'message' => 'required',
            'user_id' => 'required'
        ]);
        $user = User::get()($request->user_id);
        $this->sendMail($user->email,$user->name,$request->subject,$request->message);
        session()->flash('message', 'Email Send Successfully.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }
    
    public function userMoney($id)
    {
        $data['page_title'] = 'User Balance Manage';
        $data['user'] = User::whereUsername($id)->first();
        return view('dashboard.user-money',$data);
    }
    public function userMoneySubmit(Request $request)
    {
        $this->validate($request,[
            'amount' => 'required',
            'reason' => 'required'
        ]);
        $basic = BasicSetting::first();
        $ac = $request->operation == 'on' ? '1' : '2';
        if ($ac == 1)
        {
            $user = User::findOrFail($request->user_id);
            $bal = $user;

            $cus = strtoupper(Str::random(20));
            $ul['user_id'] = $user->id;
            $ul['amount'] = $request->amount;
            $ul['charge'] = null;
            $ul['amount_type'] = 8;
            $ul['post_bal'] = $bal->balance + $request->amount;
            $ul['description'] = "Add $request->amount $basic->currency - For $request->reason";
            $ul['transaction_id'] = $cus;
            UserLog::create($ul);

            $bal->balance = $bal->balance + $request->amount;
            $bal->save();

            if ($basic->email_notify == 1){
                $text = "Add ".$request->amount." - ". $basic->currency ." For $request->reason. <br> Transaction ID Is : <b>#".$cus."</b>";
                $this->sendMail($bal->email,$bal->name,'Manual Add Balance.',$text);
            }
            if ($basic->phone_notify == 1){
                $text = "Add ".$request->amount." - ".$basic->currency ." For $request->reason. <br> Transaction ID Is : <b>#".$cus."</b>";
                $this->sendSms($bal->phone,$text);
            }

            session()->flash('message', 'User balance Added Successfully.');
            Session::flash('type', 'success');
            Session::flash('title', 'Success');
            return redirect()->back();
        }else{
            $user = User::findOrFail($request->user_id);
            $bal = $user;

            $cus = strtoupper(Str::random(20));
            $ul['user_id'] = $user->id;
            $ul['amount'] = $request->amount;
            $ul['charge'] = null;
            $ul['amount_type'] = 9;
            $ul['post_bal'] = $bal->balance - $request->amount;
            $ul['description'] = "Subtract $request->amount $basic->currency - For $request->reason";
            $ul['transaction_id'] = $cus;
            UserLog::create($ul);

            $bal->balance = $bal->balance - $request->amount;
            $bal->save();

            if ($basic->email_notify == 1){
                $text = "Subtract ".$request->amount." - ". $basic->currency ." For $request->reason. <br> Transaction ID Is : <b>#".$cus."</b>";
                $this->sendMail($bal->email,$bal->name,'Manual Subtract Balance.',$text);
            }
            if ($basic->phone_notify == 1){
                $text = "Subtract ".$request->amount." - ".$basic->currency ." For $request->reason. <br> Transaction ID Is : <b>#".$cus."</b>";
                $this->sendSms($bal->phone,$text);
            }

            session()->flash('message', 'User Balance Subtract Successfully.');
            Session::flash('type', 'success');
            Session::flash('title', 'Success');
            return redirect()->back();
        }

    }
    public function manageUser()
    {
        $data['page_title'] = "Manage User";
        $data['user'] = User::orderBy('id','desc')->paginate(15);
        return view('dashboard.user-manage',$data);
    }
    public function showBlockUser()
    {
        $data['page_title'] = 'All Blocked User';
        $data['user'] = User::whereStatus(1)->paginate(15);
        return view('dashboard.user-manage',$data);
    }
    public function allVerifyUser()
    {
        $data['page_title'] = 'All Verified User';
        $data['user'] = User::whereStatus(0)->whereEmail_verify(1)->wherePhone_verify(1)->orderBy('id','desc')->paginate(15);
        return view('dashboard.user-manage',$data);
    }
    public function phoneUnVerifyUser()
    {
        $data['page_title'] = 'Phone UnVerified User';
        $data['user'] = User::wherePhone_verify(0)->orderBy('id','desc')->paginate(15);
        return view('dashboard.user-manage',$data);
    }
    public function emailUnVerifyUser()
    {
        $data['page_title'] = 'Email UnVerified User';
        $data['user'] = User::whereEmail_verify(0)->orderBy('id','desc')->paginate(15);
        return view('dashboard.user-manage',$data);
    }
    public function blockUser(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->status = 1;
        $user->save();
        session()->flash('message', 'User Successfully Blocked');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }
    public function unblockUser(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->status = 0;
        $user->save();
        session()->flash('message', 'User Successfully Unblocked');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }
    public function userDepositAll($id)
    {
        $data['user'] = User::whereUsername($id)->first();
        $data['page_title'] = $data['user']->username.' - Deposit Log';
        $data['deposit'] = Deposit::whereUser_id($data['user']->id)->orderBy('id','desc')->get();
        return view('dashboard.user-deposit-log',$data);
    }
    public function userWithdrawAll($id)
    {
        $data['user'] = User::whereUsername($id)->first();
        $data['page_title'] = $data['user']->username.' - Withdraw Log';
        $data['log'] = WithdrawLog::whereUser_id($data['user']->id)->orderBy('id','desc')->get();
        return view('dashboard.user-withdraw-log',$data);
    }
    public function userLogInAll($id)
    {
        $data['user'] = User::whereUsername($id)->first();
        $data['page_title'] = $data['user']->username.' - Login Details';
        $data['log'] = UserLogin::whereUser_id($data['user']->id)->orderBy('id','desc')->get();
        return view('dashboard.user-login-log',$data);
    }

    public function userRepeatAll($id)
    {
        $data['user'] = User::whereUsername($id)->first();
        $data['page_title'] = $data['user']->username.' - All Repeat';
        $data['log'] = RepeatLog::whereUser_id($data['user']->id)->orderBy('id','desc')->paginate(15);
        return view('dashboard.repeat-history',$data);
    }
    public function adminActivity()
    {
        $data['page_title'] = 'Transaction Log';
        $data['log'] = UserLog::orderBy('id','desc')->paginate(15);
        return view('dashboard.admin-activity',$data);
    }

}
