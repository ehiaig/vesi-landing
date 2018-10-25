<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\BankDetail;
use App\Models\User;
use App;
use Session;
use Redirect;
use Validator;
use Auth;


class BankdetailController extends Controller
{
    public function create(Request $request)
    {
	    BankDetail::create([
    		'account_name'=>$request->account_name,
            'bank'=>$request->bank,
            'user_id'=>Auth::user()->id, 
            'account_no'=>$request->account_no,  
    	]);
        
        return redirect()->route('dashboard.show.index');
    }
}
