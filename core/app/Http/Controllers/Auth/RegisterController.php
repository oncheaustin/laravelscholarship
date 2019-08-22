<?php

namespace App\Http\Controllers\Auth;

use App\BasicSetting;
use App\TraitsFolder\MailTrait;
use App\User;
use App\Http\Controllers\Controller;
use App\UserLog;
use App\RoleUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    use MailTrait;
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/user/deposit-fund';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $basic = BasicSetting::first();
        if ($basic->google_recap == 1){
            Config::set('captcha.secret', $basic->google_secret_key);
            Config::set('captcha.sitekey', $basic->google_site_key);
        }
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $basic = BasicSetting::first();
        if ($basic->user_reg == 0){
            session()->flash('message','Registration Is Currently Deactivate. Please Try Letter.');
            session()->flash('type','danger');
            return redirect()->route('login');
        }
        $data['page_title'] = "Register";
        $data['reference'] = '0';
        return view('auth.register',$data);
    }

    public function showReferenceLoginForm($id)
    {
        $basic = BasicSetting::first();
        if ($basic->user_reg == 0){
            session()->flash('message','Registration Is Currently Deactivate. Please Try Letter.');
            session()->flash('type','danger');
            return redirect()->route('login');
        }
        $data['page_title'] = "Register";
        $data['reference'] = $id;
        return view('auth.register',$data);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|min:10|unique:users',
            
            'password' => 'required|string|min:6|confirmed',
            'g-recaptcha-response' => 'captcha',
            'gender' => 'required|string',
            'state' => 'required|string',
            'lg' => 'required|string',
            'institution' => 'required|string',
            'course' => 'required|string',
            'level' => 'required|string',
            'description' => 'required|string|min:1|max:500',
            
            'bank' => 'required|string',
            'account_na' => 'required|string',
            'account_no' => 'required|string',
            'account_no' => 'required|string',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $basic = BasicSetting::first();
       /* if ($data['under_reference'] != null){
            $reChk = User::whereReference($data['under_reference'])->count();
            if ($reChk == 0){
                $reference = 0;
            }else{
                $reference = User::whereReference($data['under_reference'])->first()->id;
            }
        }else{
            $reference = 0;
        }
        */
        if ($basic->email_verify == 1){
            $email_verify = 0;
        }else{
            $email_verify = 1;
        }

        if ($basic->phone_verify == 1){
            $phone_verify = 0;
        }else{
            $phone_verify = 1;
        }
      
        $email_code = strtoupper(Str::random(6));
        $email_time = Carbon::parse()->addMinutes(5);
        $phone_code = strtoupper(Str::random(6));
        $phone_time = Carbon::parse()->addMinutes(5);
        $reference = '0';
        
       
            $filename = time().'h3'.'.';
            $location = 'assets/images/' . $filename;
            $image1 = $location;
          
            
           
            
            $filename2 = time().'h3'.'.';
            $location2 = 'assets/images/letter' . $filename2;
            $image2 = $location2;
          
         
        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'username' => $data['email'],
            'reference' => $data['email'],
            'under_reference' => $reference,
            'email_verify' => $email_verify,
            'email_code' => $email_code,
            'email_time' => $email_time,
            'phone_verify' => $phone_verify,
            'phone_code' => $phone_code,
            'phone_time' => $phone_time,
            'gender' => $data['gender'],
            'state' => $data['state'],
             'lg' => $data['lg'],
             'institution' => $data['institution'],
              'course' => $data['course'],
               'level' => $data['level'],
                'description' => $data['description'],
            'password' => bcrypt($data['password']),
            'image1' => $image1,
            'image2' => $image2,
            'bank' => $data['bank'],
            'account_name' => $data['account_na'],
            'account_no' => $data['account_no'],
            'slug' => $data['name'],

        ]);
    }

    protected function registered(Request $request, $user)
    {
        $basic = BasicSetting::first();

        if ($user->under_reference != 0){
            $refUser = User::findOrFail($user->under_reference);

            $bal4 = $refUser;
            $trx = strtoupper(Str::random(20));
            $ul['user_id'] = $bal4->id;
            $ul['amount'] = $basic->reference_bonus;
            $ul['charge'] = null;
            $ul['amount_type'] = 3;
            $ul['post_bal'] = $bal4->balance + $basic->reference_bonus;
            $ul['description'] = $basic->reference_bonus." ".$basic->currency." Bonus For Reference Join. ";
            $ul['transaction_id'] = $trx;
            UserLog::create($ul);

            if ($basic->email_notify == 1){
                $text = $basic->reference_bonus." - ". $basic->currency." Bonus For Reference Join. <br> Transaction ID Is : <b>#$trx</b>";
                $this->sendMail($bal4->email,$bal4->name,'New Investment',$text);
            }
            if ($basic->phone_notify == 1){
                $text = $basic->reference_bonus." - ". $basic->currency." Bonus For Reference Join. <br> Transaction ID Is : <b>#$trx</b>";
                $this->sendSms($bal4->phone,$text);
            }
            $refUser->balance = $refUser->balance + $basic->reference_bonus;
            $refUser->save();
        }


        if ($basic->email_verify == 1)
        {
            $email_code = strtoupper(Str::random(6));
            $text = "Your Verification Code Is: <b>$email_code</b>";
            $this->sendMail($user->email,$user->name,'Email verification',$text);
            $user->email_code = $email_code;
            $user->email_time = Carbon::parse()->addMinutes(5);
            $user->save();
        }
        if ($basic->phone_verify == 1)
        {
            $email_code = strtoupper(Str::random(6));
            $txt = "Your Verification Code is: $email_code";
            $to = $user->phone;
            $this->sendSms($to,$txt);
            $user->phone_code = $email_code;
            $user->phone_time = Carbon::parse()->addMinutes(5);
            $user->save();
        }
        
        $user_id= User::findOrFail(Auth::user()->id);
        $last_for_user = User::orderBy('id', 'desc')->first();
        
        $de['user_id'] = $last_for_user->id;
        $de['role_id'] = '5';
        $dep = RoleUser::create($de);

    }




     public function getContact1()
    {
        $data['page_title'] = 'Registration Page';
        return view('home.register-2',$data);
    }

        public function postContact1(Request $request)
    {

         $request->validate([
            
           
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|min:10|unique:users',
            
            'password' => 'required|string|min:6|confirmed',
            
        ]);
        $email_code = strtoupper(Str::random(6));
        $email_time = Carbon::parse()->addMinutes(5);
        $phone_code = strtoupper(Str::random(6));
        $phone_time = Carbon::parse()->addMinutes(5);
          
       $de['name'] = $request->name;
        $de['email'] = $request->email;
        $de['phone'] = $request->phone;
        $de['password'] = Hash::make($request->input('password'));
        $de['username'] = $request->email;
        $de['reference'] = $request->name;
        $de['under_reference'] = '0';
        $de['email_verify'] = '1';
        $de['phone_verify'] = '1';
        $de['email_code'] = $email_code;
        $de['phone_code'] = $phone_code;
        $de['email_time'] = $email_time;
        $de['phone_time'] = $phone_time;

      

            /*$filename = time().$image;
      

         

        

        if($request->hasFile('image')){
            $image3 = $request->file('image');
            foreach ($image3 as $img){
                $filename3 = time().'h3'.'.'.$img->getClientOriginalExtension();
                $location = 'assets/images/' . $filename3;
                Image::make($img)->save($location);
                $in['image'] = $filename3;
                $in['deposit_id'] = $dep->id;
                DepositImage::create($in);
            }
*/
            $reg = User::create($de);

        return redirect()->route('register-2');

    }

   
}
