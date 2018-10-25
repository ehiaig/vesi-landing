<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\BankDetail;
use App\Models\Payout;
use App\Models\User;
use App\Mail\payoutInitiated;
use App\Mail\payoutNotice;
use App;
use Session;
use Redirect;
use Auth;

class PayoutController extends Controller
{
    public function initiateWithdrawal(Request $request)
    {
    	$acc_balance = Auth::user()->account_balance;

    	if($request->amount <= $acc_balance)
    	{
    		$payout = Payout::create([
	    		'amount'=>$request->amount,
	            'bank_id'=>$request->bank_id,
	            'user_id'=>$request->user_id, 
	    	]);

	    	//update the user's account balance
    		$user = Auth::user();

    		$user->account_balance = $acc_balance - $request->amount;
    		$user->save();

	    	//Send mail to admin
	    	\Mail::to('i@vesicash.com')
	        ->send(new payoutNotice($payout));

	        //Send mail to initiator
	        \Mail::to(auth()->user()->email)
	        ->send(new payoutInitiated($payout));
	    	return redirect()->back()->with('alert', 'Your request has been sent. We will begin processing your withdrawal. ');
    	}
    	
    	return redirect()->back()->with('alert', 'Your cannot withdrawal more than your wallet balance!');    	
    }
}
