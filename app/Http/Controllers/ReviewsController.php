<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Invoice;
use App\Models\MilestoneItem;
use App\Models\Review;
use App;
use Session;
use Redirect;
use Auth;

class ReviewsController extends Controller
{
    public function showReviewPage($uuid)
    {
    	$invoice = Invoice::where('uuid', $uuid)->first();
    	if(!$invoice){
          abort(404);
        }
        return view('dashboard/reviews.create', [
            'invoice' => $invoice,
        ]);
    }

    public function createReview(Request $request)
    {
    	$invoice = Invoice::findOrFail($request->invoice_id);

    	Review::create([
    		'message'=>$request->message,
            'invoice_id'=>$request->invoice_id,
            'user_id'=>Auth::user()->id,   
    	]);

    	Session::flash('flash_message', 'Rewiews added!');
    	return redirect()->route('reviews.show.create', $invoice->uuid);
    }
}
