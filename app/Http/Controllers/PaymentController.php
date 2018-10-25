<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Paystack;
use App\Models\Invoice;
use App\Mail\paymentMade;
use App;
use Session;
use Redirect;
use Validator;
use Auth;

class PaymentController extends Controller
{
    public function redirectToGateway()
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        
        $uuid = $paymentDetails['data']['metadata']['invoice_uuid'];
        
        $invoice = Invoice::where('uuid', $uuid)->first();
	    if(!$invoice){
	      abort(404);
	    }

	    $invoice->status = 'paid';
        $invoice->is_accepted = 1;
	    $invoice->save();

        \Mail::to($invoice->recipient->email)
        ->send(new paymentMade($invoice));

	    Session::flash('flash_message', 'Invoice paid!');
	    return redirect()->route('transactions.show.key', ['invoice'=> $invoice->uuid]);
    }
}
