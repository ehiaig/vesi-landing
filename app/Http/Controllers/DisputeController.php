<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Dispute;
use App;
use Session;
use Redirect;
use Validator;
use Auth;
use Keygen;
use DB;

class DisputeController extends Controller
{
    public function index()
    {   
        $user = auth()->user();
        //dd($user->id);
        // $disputes = Dispute::where('user_id', $user->id)->get();
        $query = DB::table('disputes')->where('user_id', $user->id)
                    ->join('invoices', function($join) use ($user){
                        $join->on('disputes.invoice_id', '=', 'invoices.id')
                        ->orWhere('invoices.recipient_id', $user->id);

                    })->get();
                

        dd($query);


        $sent_inv = Invoice::where('sender_id', $user->id)->first();
        $res_disputes = Dispute::where('invoice_id', $sent_inv->id)->get();

        $received_inv = Invoice::where('recipient_id', $user->id)->first();
        $op_disputes = Dispute::where('invoice_id', $received_inv->id)->get();

    	return view('dashboard/disputes.index', [
            // 'res_disputes'=> $res_disputes,
            // 'op_disputes'=> $op_disputes,
            'disputes'=>$disputes
        ]);
    }

    public function showDispute(Request $request, $uuid)
    { 
        $dispute = Dispute::where('uuid', $uuid)->first();
        
        if(!$dispute){
          abort(404);
        }

        return view('dashboard/disputes.create', [
            'dispute' => $dispute
        ]);
    }

    public function saveDispute(Request $request)
    {   
        $invoice = Invoice::findOrFail($request->invoice_id);
        if(!$invoice){
          abort(404);
        }

        $dispute = Dispute::updateOrCreate(['invoice_id'=>$request->invoice_id],[
            'user_id' => Auth::user()->id,
            'dispute_no' => Keygen::numeric(12)->generate(),
            'type' => $request->input('dispute_type'),
            'response' => $request->input('response'),
            'status' => 'open'  
        ]);
        $dispute->save();

        return redirect()->route('disputes.show.create', ['dispute'=>$dispute->uuid]);
    }

    public function updateDispute(Request $request, $uuid)
    {   
        $dispute = Dispute::where('uuid', $uuid)->first();
        if(!$dispute){
          abort(404);
        }

        $dispute->response = $request->input('response');
        $dispute->save();
                
        return redirect()->back();
    }

    public function disputeResolved(Request $request, $uuid)
    {   
        $user = auth()->user();
        $dispute = Dispute::where('user_id', $user->id)->where('uuid', $uuid)->first();
        if(!$dispute){
          abort(404);
        }

        $dispute->is_resolved = 1;
        $dispute->status = 'settled';
        $dispute->save();
                
        return redirect()->back();
    }
}
