<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\MilestoneItem;
use App;
use Session;
use Redirect;
use Validator;
use Auth;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function getIndex()
    {	
    	$user = auth()->user();

    	//This currently gets for the recipient. How can we display for the Sender.
      	$receivedinvoices = Invoice::where('recipient_id', $user->id)->where('invoice_type', '!=', 'milestone')->where('status', '=', 'paid')->orderBy('id', 'desc')->paginate(5);

      	//For the sender
      	$sentinvoices = Invoice::where('sender_id', $user->id)->where('invoice_type', '!=', 'milestone')->where('status', '=', 'paid')->orderBy('id', 'desc')->paginate(5);

        //MS Recipient.
        $msreceivedinvoices = Invoice::where('recipient_id', $user->id)->where('invoice_type', 'milestone')->where('status', '=', 'paid')->orderBy('id', 'desc')->paginate(5);

        //Ms sender
        $mssentinvoices = Invoice::where('sender_id', $user->id)->where('invoice_type', 'milestone')->where('status', '=', 'paid')->orderBy('id', 'desc')->paginate(5);

    	return view('dashboard/transactions.index', [
            'receivedinvoices' => $receivedinvoices,
            'sentinvoices'=> $sentinvoices,
            'msreceivedinvoices' => $msreceivedinvoices,
            'mssentinvoices'=> $mssentinvoices,
        ]);
    }

    public function getTransKey($uuid)
    {
      $invoice = Invoice::where('uuid', $uuid)->first();

      if(!$invoice){
        abort(404);
      } 

      return view('dashboard/transactions.key', [
        'invoice' => $invoice,
        'user' => auth()->user()
      ]);
    }

    public function supplyTransKey(Request $request, $uuid)
    {	
    	$user = auth()->user();
        $sentinvoice = Invoice::where('sender_id', $user->id)->where('uuid', $uuid)->first();

	    if(!$sentinvoice){
	       abort(404);
	    } 

	    $supplied_key = $request->input('secret');

	    if($sentinvoice->secret_key != $supplied_key) {
	       Session::flash('flash_message', 'Wrong Secret Key');
    		return redirect()->back();
	    }

        $sentinvoice->secret_key_updated_at = Carbon::now()->toDateTimeString();
        $sentinvoice->save();
        
	    // Session::flash('flash_message', 'Confirmation: Secret Key is correct!');
    	return redirect()->back()->with('alert', 'Secret Key is correct!');
    }
    
    public function senderConfirmInvoice(Request $request, $uuid)
    {	
    	$user = auth()->user();
    	$sentinvoices = Invoice::where('sender_id', $user->id)->where('uuid', $uuid)->first();

    	$sentinvoices->sender_confirmed = 1;
    	
    	if (!$sentinvoices->save()) {
	        abort(404);
	    }
	    
    	Session::flash('flash_message', 'Invoice confirmed!');
    	return redirect()->back();	    
    }

    public function recipientConfirmInvoice(Request $request, $uuid)
    {	
    	$user = auth()->user();
    	$receivedinvoices = Invoice::where('recipient_id', $user->id)->where('uuid', $uuid)->first();

    	$receivedinvoices->recipient_confirmed = 1;
    	
    	if (!$receivedinvoices->save()) {
	        abort(404);
	    }
	    Session::flash('flash_message', 'Invoice confirmed!');
    	return redirect()->back();	    
    }

    //All milestone transactions
    public function getMilestones()
    {   
        $user = auth()->user();

        //For Recipient.
        $receivedinvoices = Invoice::where('recipient_id', $user->id)->where('invoice_type', '=', 'milestone')->where('status', '=', 'paid')->orderBy('id', 'desc')->paginate(5);

        //For the sender
        $sentinvoices = Invoice::where('sender_id', $user->id)->where('invoice_type', '=', 'milestone')->where('status', '=', 'paid')->orderBy('id', 'desc')->paginate(5);

        return view('dashboard/transactions.milestones', [
            'sentinvoices'=> $sentinvoices,
            'receivedinvoices' => $receivedinvoices,
        ]);
    }
    
    //Sender confirms Milestones
    public function senderConfirmMs(Request $request, $id)
    {   
        $user = auth()->user();
        $currentMs = MilestoneItem::find($id);
        $currentMs->sender_confirmed = 1;
        
        if (!$currentMs->save()) {
            abort(404);
        }

        Session::flash('flash_message', 'Milestone confirmed!');
        return redirect()->back();      
    }

    //Recipient confirms Milestones
    public function recipientConfirmMs(Request $request, $id)
    {   
        $user = auth()->user();
        $currentMs = MilestoneItem::find($id);
        $currentMs->recipient_confirmed = 1;
        
        if (!$currentMs->save()) {
            abort(404);
        }
        Session::flash('flash_message', 'Milestone confirmed!');
        return redirect()->back();      
    }
}
