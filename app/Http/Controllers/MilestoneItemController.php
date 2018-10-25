<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\MilestoneItem;
use Redirect;

class MilestoneItemController extends Controller
{
    public function createMilestone(Request $request)
    {	
    	$invoice = Invoice::findOrFail($request->invoice_id);

    	MilestoneItem::create([
    		'name'=>$request->name,
    		'invoice_id'=>$request->invoice_id,    		
    		'description'=>$request->description,
    		// 'tax'=>$request->tax,
    		'shipping_cost'=>$request->shipping_cost,
    		// 'quantity'=>$request->quantity,
            'price'=>$request->price,
    		'inspection_period'=> $request->inspection_period,
            'milestone_key' => str_random(8)
    	]);
       return redirect()->route('invoice.show.set-milestones', $invoice->uuid);
   }
   
   public function deleteMilestone($id)
    {
        $MilestoneItem = MilestoneItem::find($id);
        $MilestoneItem->delete();
        
        return redirect()->back();       
    }

    //All milestones
    // public function allMilestones()
    // { 
    //   $user = auth()->user();
    //   $ms = MilestoneItem::all()->where('milestone_status', '=', 'pending');

    //   return view('dashboard/invoice.all-ms', [
    //         'sentinvoices' => $sentinvoices,
    //         'receivedinvoices' => $receivedinvoices
    //     ]);
    // }
}
