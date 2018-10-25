<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BankDetail;
use App\Models\User;
use App;
use Session;
use Redirect;
use Validator;
use Auth;

class DashboardController extends Controller
{
	public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
    	$user = auth()->user();

      	$bankDetails = BankDetail::where('user_id', $user->id)->get();
        return view('dashboard.index', ['bankDetails'=>$bankDetails]);
    }
}
