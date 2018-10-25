<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Invoice;
use App\Models\User;
use Auth;


class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    protected function redirectTo()
    {
        $user = Auth::user();
        
        if($user->user_type == 'personal'){
            return route('dashboard.show.index');
        }

        if($user->user_type == 'business'){
            return route('dashboard.show.business.index');

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
        $this->middleware('guest');
    }


    public function setNewPassword(Request $request, $uuid)
    {        
        if(!$uuid){
            abort(404);
        }
        
        $invoice = Invoice::where('uuid', $uuid)->first();
        if(!$invoice){
            abort(404);
        } 

        if($request->isMethod('POST')){

            $validator = Validator::make($request->input(), [
                'password' => 'required|string|min:8|confirmed'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $recipient_email = $invoice->recipient->email;

            $user = User::where('email', $recipient_email)->first();
            $user->password = bcrypt($request->input('password'));
            $user->email_verified_at = now();

            $user->save();

            Auth::login($user, true);

            if($invoice->invoice_type == 'basic'){
                return redirect()->route('invoice.preview', $uuid);
            }
            if($invoice->invoice_type == 'one-off'){
                return redirect()->route('invoice.open', $uuid);
            }
            if($invoice->invoice_type == 'milestone'){
                return redirect()->route('invoice.openms', $uuid);
            }

            
        }

        return view('auth.new-password', [
            'uuid' => $uuid
        ]);
    }
}
