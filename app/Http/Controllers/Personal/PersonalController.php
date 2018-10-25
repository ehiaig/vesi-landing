<?php

namespace App\Http\Controllers\Personal;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Invoice;
use App;
use Session;
use Redirect;
use Validator;

class PersonalController extends Controller
{
	public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function fundWallet()
    {
        return view('dashboard/fund-wallet');
    }

    public function allPayments()
    {
        return view('dashboard/personal.all');
    }
    
}
