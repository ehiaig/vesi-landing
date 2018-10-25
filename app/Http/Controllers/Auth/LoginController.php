<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Auth;
use App\Models\VerifyUser;
use App\Mail\verifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function authenticated(Request $request, $user)
    {
        if (!$user->verified) {
            auth()->logout();

            $verifyUser = VerifyUser::create([
                'user_id' => $user->id,
                'token' => str_random(40)
            ]);

            \Mail::to($user->email)->send(new verifyEmail($user));

            return back()->with('warning', 'Your account is not yet activated. We sent you an activation code few seconds ago. Please check your email inbox or spam folder and click the button to activate your account.');
        }
        return redirect()->intended($this->redirectPath());
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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    protected function redirectTo()
    {
        $user = Auth::user();
        
        if($user->user_type == 'personal'){
            return route('dashboard.show.index');
        }

        if($user->user_type == 'business'){
            return route('dashboard.show.index');
        }

        if($user->user_type == 'admin') {
            return route('dashboard.show.admin.index');
        }

     }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

}
