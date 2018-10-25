<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Redirect;

class ItemController extends Controller
{
    public function createItem(Request $request)
    {   
        $invoice = Invoice::findOrFail($request->invoice_id);

        InvoiceItem::create([
            'name'=>$request->name,
            'invoice_id'=>$request->invoice_id,         
            'description'=>$request->description,
            // 'tax'=>$request->tax,
            'shipping_cost'=>$request->shipping_cost,
            'quantity'=>$request->quantity,
            'price'=>($request->price)*($request->quantity),
        ]);
       return redirect()->route('invoice.show.single', $invoice->uuid);
   }
   public function delete($id)
    {
        $invoiceItem = InvoiceItem::find($id);
        $invoiceItem->delete();
        
        return redirect()->back();       
    }
}
