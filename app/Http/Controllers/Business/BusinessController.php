<?php

namespace App\Http\Controllers\Business;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusinessController extends Controller
{
	public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    // public function index()
    // {	
    // 	return view('dashboard/business.index');
    // }

    public function transactions()
    {	
    	return view('dashboard/business.transactions');
    }

    public function docs()
    {	
    	return view('dashboard/business.docs');
    }

}
