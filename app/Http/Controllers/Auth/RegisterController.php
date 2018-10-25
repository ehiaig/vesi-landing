<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Personal;
use App\Models\Business;
use Illuminate\Http\Request;
use App\Models\VerifyUser;
use App\Mail\verifyEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
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

    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();
        return redirect('/login')->with('status', 'You will get an activation code in few minutes. Check your email inbox or spam folder and click the button to activate your account.');
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    //Call personal Registration Form
    public function showRegisterPersonal()
    {   
        return view('auth.personal');
    }

    //Create a new user instance of personal.
    public function registerPersonal(Request $request)
    {
        $validator = Validator::make($request->input(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone'=>'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $userData = [
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'user_type' => 'personal',
            'account_balance' => 0.00,   
        ];
            
        $user = $this->create($userData);

        if($user){
            $personal = new Personal();
            $personal->user_id = $user->id;

            $personal->save();
        }

        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => str_random(40)
        ]);

        \Mail::to($user->email)->send(new verifyEmail($user));

        return view('auth/login');
    }

    //Call the business registration form.
    public function showRegisterBusiness()
    {   
        return view('auth.business');
    }

    //Create a new user instance of business.
    public function registerBusiness(Request $request)
    {   
        $validator = Validator::make($request->input(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone'=>'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $userData = [
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'user_type' => 'business',
            'account_balance' => 0.00,   
        ];

        $user = $this->create($userData);

        if($user){
            $business = new Business();
            $business->business_name = $request->input('business_name');
            $business->access_token = str_random(20); 
            $business->user_id = $user->id;

            $business->save();
        }

        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => sha1(time())
        ]);

        \Mail::to($user->email)->send(new verifyEmail($user));

        return view('auth/login')->with('success', 'Welcome to Vesicash!');
    }

    public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->verified) {
                $verifyUser->user->verified = 1;
                $verifyUser->user->save();
                $status = "Your e-mail is verified. You can now login.";
            }else{
                $status = "Your e-mail is already verified. You can now login.";
            }
        }else{
            return redirect('/login')->with('warning', "Sorry your email cannot be identified. Click the link below to create an account");
        }

        return redirect('/login')->with('status', $status);
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'firstname' => 'required|string|max:255',
    //         'lastname' => 'required|string|max:255',
    //         'phone'=>'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:8|confirmed',
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user_type' => $data['user_type'],
            'account_balance' => $data['account_balance'],
        ]);
    }
}
