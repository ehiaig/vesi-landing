<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Dispute;
use App\Models\Comment;
use App;
use Session;
use Redirect;
use Auth;

class CommentsController extends Controller
{
    public function createComment(Request $request)
    {
    	$dispute = Dispute::findOrFail($request->dispute_id);

    	Comment::create([
    		'message'=>$request->message,
            'dispute_id'=>$request->dispute_id,
            'user_id'=>Auth::user()->id,   
    	]);

    	// Session::flash('flash_message', 'Rewiews added!');
    	return redirect()->back();
    }
}
