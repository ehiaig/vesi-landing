<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Invoice;
use App\Models\MilestoneItem;
use App\Mail\sendInvoice;
use App\Mail\invoiceSent;
use App;
use Session;
use Redirect;
use Validator;
use Auth;
use Illuminate\Filesystem\Filesystem;
use Keygen;

class InvoiceController extends Controller
{
  public function __construct()
    {
        
    }

    public function index()
    { 
      $user = auth()->user();

      $sentinvoices = Invoice::where('sender_id', $user->id)->where('status', '!=', 'draft')->where('invoice_type', '!=', 'milestone')->orderBy('id', 'desc')->paginate(5);
      $receivedinvoices = Invoice::where('recipient_id', $user->id)->where('invoice_type', '!=', 'milestone')->where('status', 'not paid')->orderBy('id', 'desc')->paginate(5);
      $draftinvoices = Invoice::where('sender_id', $user->id)->where('status', 'draft')->where('invoice_type', '!=', 'milestone')->orderBy('id', 'desc')->paginate(5);

      return view('dashboard/invoice.index', [
            'sentinvoices' => $sentinvoices,
            'receivedinvoices' => $receivedinvoices,
            'draftinvoices' => $draftinvoices
        ]);
    }

  //To create Professional Invoice
    public function createProfessionalInvoice(Request $request)
    {   
      $user = User::where('email', $request->input('email'))->first();
      if(!$user){

        $validator = Validator::make($request->all(), [
              'firstname' => 'required|string|max:255',
              'lastname' => 'required|string|max:255',
              'phone'=>'required|string|max:255',
              'email' => 'required|string|email|max:255|unique:users'
          ]);

        if ($validator->fails()){
          return redirect()->back()->withErrors($validator)->withInput();
        } 

         $user = User::create([
              'firstname' => $request->input('firstname'),
              'lastname' => $request->input('lastname'),
              'phone' => $request->input('phone'),
              'email' => $request->input('email'),
              'password' => bcrypt('123456'),
              'user_type' => 'personal',
              'account_balance' => 0.00,  
          ]);
      }

      $invoice = new Invoice();
      $invoice->sender_id = Auth::user()->id;
      $invoice->recipient_id = $user->id;
      $invoice->invoice_no = Keygen::numeric(6)->generate();
      $invoice->note = $request->input('note');
      $invoice->secret_key = str_random(8);//md5(microtime())
      $invoice->amount = $request->input('amount');
      $invoice->invoice_type = 'one-off';
      $invoice->offline_ref_code = Keygen::numeric(15)->generate();

      if ($request->hasFile('photo')) {
            $randomKey = sha1(time() . microtime());
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileName = $randomKey . '.' . $extension;

            $destinationPath = public_path() . '/images/uploads/invoices/';
            // Check if the folder exists on upload, create it if it doesn't
            if (!is_dir(public_path('/images/uploads/invoices/'))) {
                $this->fs->makeDirectory(public_path('/images/uploads/invoices/'), 0777, true);
            }
            //Move the photo to a temporary path
            $upload_success = $request->file('photo')->move($destinationPath, $fileName);
            
            if ($upload_success) {
                $invoice->photo = $fileName;
            }
        }
      $invoice->save();
        
      return redirect()->route('invoice.show.single', ['invoice'=>$invoice->uuid]);
    }

    public function singleInvoice($uuid)
    { 
        $invoice = Invoice::where('uuid', $uuid)->first();
        if(!$invoice){
          abort(404);
        }
        return view('dashboard/invoice.single', [
            'invoice' => $invoice,
        ]);
    }

  //Send professional invoice
    public function sendInvoiceEmail(Request $request, $uuid)
    {
      $invoice = Invoice::where('uuid', $uuid)->first();
      if(!$invoice){
        abort(404);
      }

      $invoice->amount = $invoice->invoiceItems->sum('price') + $invoice->invoiceItems->sum('shipping_cost');
      $invoice->status = 'not paid';
      // $invoice->invoice_no = $request->input('invoice_no');
      $invoice->save();

      \Mail::to($invoice->recipient->email)
      // ->cc(auth()->user()->email)
        ->send(new sendInvoice($invoice));

        return redirect()->route('invoice.show.index', ['invoice' => $invoice])->with('alert', 'Invoice has been Sent!');
    }

    //Recipient opens professional invoice
    public function OpenInvoice($uuid)
    {           
      $invoice = Invoice::where('uuid', $uuid)->first();

      if(!$invoice){
        abort(404);
      } 

      // $recipient_email = $invoice->recipient->email;

      // $verifiedAccount = User::where('email', $recipient_email)->whereNotNull('email_verified_at')->first();

      // if(is_null($verifiedAccount)){
      //     return redirect()->route('set.new.password', $uuid);
      // }

      return view ('dashboard/invoice.open', [
        'invoice' => $invoice,
        'user' => auth()->user()
      ]);
    }


    /**BASIC INVOICE**/

    //Create basic Invoice
    public function createBasicInvoice(Request $request)
    {   
       $user = User::where('email', $request->input('email'))->first();
       
       if(!$user){ 

          $validator = Validator::make($request->all(), [
              'firstname' => 'required|string|max:255',
              'lastname' => 'required|string|max:255',
              'phone'=>'required|string|max:255',
              'email' => 'required|string|email|max:255|unique:users'
          ]);

          if ($validator->fails()) {
              return redirect()->back()->withErrors($validator)->withInput();
          } 

          $user = User::create([
              'firstname' => $request->input('firstname'),
              'lastname' => $request->input('lastname'),
              'phone' => $request->input('phone'),
              'email' => $request->input('email'),
              'password' => bcrypt('123456'),
              'user_type' => 'personal',
              'account_balance' => 0.00,  
          ]);
       }

       $invoice = new Invoice();
       $invoice->sender_id = Auth::user()->id;
       $invoice->invoice_no = Keygen::numeric(6)->generate();
       $invoice->note = $request->input('note');
       $invoice->secret_key = str_random(8);//md5(microtime())
       $invoice->recipient_id = $user->id;
       $invoice->amount = $request->input('amount');
       $invoice->invoice_type = 'basic';
       $invoice->offline_ref_code = Keygen::numeric(15)->generate();

       if ($request->hasFile('photo')) {
            $randomKey = sha1(time() . microtime());
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileName = $randomKey . '.' . $extension;

            $destinationPath = public_path() . '/images/uploads/invoices/';
            // Check if the folder exists on upload, create it if it doesn't
            if (!is_dir(public_path('/images/uploads/invoices/'))) {
                $this->fs->makeDirectory(public_path('/images/uploads/invoices/'), 0777, true);
            }
            //Move the photo to a temporary path
            $upload_success = $request->file('photo')->move($destinationPath, $fileName);
            
            if ($upload_success) {
                $invoice->photo = $fileName;
            }
        }

        $invoice->save();
      
        return redirect()->route('invoice.show.preview', ['invoice'=>$invoice->uuid]);
    }

    //Edit Invoice
    public function editInvoice(Request $request, $uuid)
    { 
        $invoice = Invoice::where('uuid', $uuid)->first();

        if($request->isMethod('Post')){
          $validator = Validator::make($request->all(),[
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email')
            // 'password' => bcrypt('123456'),
            // 'user_type' => 'personal',
            // 'account_balance' => 0.00, 
          ]);
          if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
          }

          $invoice->sender_id = Auth::user()->id;
          $invoice->title = $request->input('title');
          $invoice->note = $request->input('note');
          $invoice->secret_key = str_random(8);
          $invoice->recipient_id = $user->id;
          $invoice->amount = $request->input('amount');
          $invoice->invoice_type = 'basic';
          $invoice->offline_ref_code = Keygen::numeric(15)->generate();
          $invoice->save();

          Session::flash('flash_message', 'Invoice successfully updated!');
            return redirect()->route('invoice.show.preview', ['invoice'=>$invoice->uuid]);
        }

        return view('dashboard/invoice.edit', [
            'invoice' => $invoice,
        ]);
    }

    //Preview Basic Invoice
    public function previewInvoice($uuid)
    { 
        $invoice = Invoice::where('uuid',$uuid)->first();
        if(!$invoice){
          abort(404);
        }
        return view('dashboard/invoice.preview', [
            'invoice' => $invoice,
        ]);
    }

    //Send basic invoice via email
    public function sendBasicInvoice(Request $request, $uuid)
    {
      $invoice = Invoice::where('uuid', $uuid)->first();
      if(!$invoice){
        abort(404);
      }

      $invoice->status = 'not paid';
      // $invoice->invoice_no = $request->input('invoice_no');
      $invoice->save();

      \Mail::to($invoice->recipient->email)
      // ->cc(auth()->user()->email)
        ->send(new sendInvoice($invoice));

      \Mail::to($invoice->sender->email)
        ->send(new invoiceSent($invoice));

        return redirect()->route('invoice.show.index', ['invoice' => $invoice])->with('alert', 'Invoice has been Sent!');
    }

    /*** END OF BASIC INVOICE **/


    /**MILESTONE INVOICE**/

    //Create
    public function createMilestoneInvoice(Request $request)
    {   
      $user = User::where('email', $request->input('email'))->first();
      if(!$user){
        $validator = Validator::make($request->all(), [
              'firstname' => 'required|string|max:255',
              'lastname' => 'required|string|max:255',
              'phone'=>'required|string|max:255',
              'email' => 'required|string|email|max:255|unique:users'
          ]);

          if ($validator->fails()) {
              return redirect()->back()->withErrors($validator)->withInput();
          } 
         $user = User::create([
              'firstname' => $request->input('firstname'),
              'lastname' => $request->input('lastname'),
              'phone' => $request->input('phone'),
              'email' => $request->input('email'),
              'password' => bcrypt('123456'),
              'user_type' => 'personal',
              'account_balance' => 0.00,  
          ]);
      }

       $invoice = new Invoice();
       $invoice->sender_id = Auth::user()->id;
       $invoice->recipient_id = $user->id;
       $invoice->invoice_no = Keygen::numeric(6)->generate();
       $invoice->note = $request->input('note');
       $invoice->secret_key = str_random(8);//md5(microtime())
       $invoice->amount = $request->input('amount');
       $invoice->invoice_type = 'milestone';
       $invoice->offline_ref_code = Keygen::numeric(15)->generate();

       if ($request->hasFile('photo')) {
            $randomKey = sha1(time() . microtime());
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileName = $randomKey . '.' . $extension;

            $destinationPath = public_path() . '/images/uploads/invoices/';
            // Check if the folder exists on upload, create it if it doesn't
            if (!is_dir(public_path('/images/uploads/invoices/'))) {
                $this->fs->makeDirectory(public_path('/images/uploads/invoices/'), 0777, true);
            }
            //Move the photo to a temporary path
            $upload_success = $request->file('photo')->move($destinationPath, $fileName);
            
            if ($upload_success) {
                $invoice->photo = $fileName;
            }
        }
       $invoice->save();
        
        // Session::flash('flash_message', 'Invoice successfully created!');
        return redirect()->route('invoice.show.set-milestones', ['invoice'=>$invoice->uuid]);
    }

    //View
    public function viewMilestoneInvoice($uuid)
    { 
        $invoice = Invoice::where('uuid', $uuid)->first();
        if(!$invoice){
          abort(404);
        }
        return view('dashboard/invoice.set-milestones', [
            'invoice' => $invoice,
        ]);
    }

    //Send via email
    public function sendMilestoneEmail(Request $request, $uuid)
    {
      $invoice = Invoice::where('uuid', $uuid)->first();
      if(!$invoice){
        abort(404);
      }

      $invoice->amount = $invoice->milestoneItems->sum('price') + $invoice->milestoneItems->sum('shipping_cost');
      $invoice->status = 'not paid';
      // $invoice->invoice_no = $request->input('invoice_no');
      $invoice->save();

      \Mail::to($invoice->recipient->email)
      // ->cc(auth()->user()->email)
        ->send(new sendInvoice($invoice));

        return redirect()->route('invoice.show.all-ms', ['invoice' => $invoice])->with('alert', 'Invoice has been Sent!');
    }

    //Recipient accepts Milestone Invoice
    public function recipientAcceptMsInvoice(Request $request, $uuid)
    { 
      $user = auth()->user();
      $invoices_received = Invoice::where('recipient_id', $user->id)->where('uuid', $uuid)->first();

      $invoices_received->is_accepted = 1;
      
      if (!$invoices_received->save()) {
          abort(404);
      }

      return redirect()->back()->with('alert', 'You have accepted the invoice!');      
    }

    //Get All milestones
    public function allMilestones()
    { 
      $user = auth()->user();

      $invoices = Invoice::where('sender_id', $user->id)->where('invoice_type', '=', 'milestone')->where('status', '!=', 'draft')->orderBy('id', 'desc')->paginate(5);

      $invoices_received = Invoice::where('recipient_id', $user->id)->where('invoice_type', '=', 'milestone')->where('status', 'not paid')->orderBy('id', 'desc')->paginate(5);
    
      return view('dashboard/invoice.all-ms', [
            'invoices' => $invoices,
            'invoices_received' => $invoices_received,
        ]);
    }

  //Link Invoice
  public function invoiceLink($ref_code)
  {
    $invoice = Invoice::where('offline_ref_code', $ref_code)->first();
    if(!$invoice){
      abort(404);
    }
    return view('dashboard/invoice.lnk', [
        'invoice' => $invoice,
    ]);
  }
}
