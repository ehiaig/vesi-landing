@extends('layouts.backend.app')
@section('title', 'Invoices')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-sm-12">
                <div class="element-wrapper">
                    <div class="element-actions">
                        <div class="col-4 col-lg-5 text-right">
                            <button class="mr-2 mb-2 btn btn-primary" data-target="#onboardingFormModal" data-toggle="modal" type="button">
                            <i class="os-icon os-icon-ui-22"></i>&nbsp; Create New Invoice
                        </button>
                        </div>
                    </div>
                   
                    <div aria-hidden="true" class="onboarding-modal modal fade animated" id="onboardingFormModal" role="dialog" tabindex="-1">
                        <div class="modal-dialog modal-centered" role="document">
                            <div class="modal-content text-center">
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                    <span class="close-label">Close</span>
                                    <span class="os-icon os-icon-close"></span>
                                </button>
                                <div class="onboarding-media">
                                    <img alt="" src="img/bigicon5.png" width="200px">
                                </div>
                                    <div class="onboarding-content with-gradient">
                                        <h4 class="onboarding-title">Create Payment Invoice</h4>
                                        <div class="onboarding-text">
                                            Select from any of the three different invoice types below to soothe your needs. 
                                        </div>
                                        <div class="os-tabs-w">
                                        <div class="os-tabs-controls">
                                            <ul class="nav nav-tabs smaller">
                                                <li class="nav-item">
                                                    <a class="nav-link active show" data-toggle="tab" href="#tab_overview">Quick Invoice</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#tab_sales">Professional Invoice</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#tab_milestone">Milestone Invoice</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-content">
                                            <div class="tab-pane active show" id="tab_overview">
                                                <div class="form-desc" align="left">
                                                    Create a Quick Invoice - set amount, description and request a one-time payment from your customer.
                                                </div>
                                                <form enctype='multipart/form-data' method="POST" action="{{ route('save.invoice.basic') }}">
                                                    @csrf
                                                    <legend><span>Customer's details</span></legend>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label" for=""> First Name</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control" placeholder="First Name" type="text" name="firstname" required autofocus>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label" for=""> Last Name</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control" placeholder="Last Name" type="text" name="lastname" required autofocus>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label" for=""> Email</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control" placeholder="Email" type="text" name="email" required autofocus>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label" for=""> Phone</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control" placeholder="Phone" type="text" name="phone" required autofocus>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label" for="">Amount</label>
                                                        <div class="col-sm-6">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">NGN</div>
                                                                </div>
                                                                <input class="form-control" placeholder="Amount" type="number" name="amount" required autofocus>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Description</label>
                                                        <div class="col-sm-6">
                                                            <textarea class="form-control" rows="3" name="note"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-buttons-w">
                                                        <button class="btn btn-primary" type="submit">
                                                             Submit
                                                         </button>
                                                     </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane" id="tab_sales">
                                                <div class="form-desc">
                                                        Professional Invoice is suitable when you have to add a list of items and their prices to an invoice. 
                                                    </div>          
                                                <fieldset class="form-group">
                                                    <form enctype='multipart/form-data' method="POST" action="{{ route('save.invoice.professional') }}">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label" for=""> First Name</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control" placeholder="First Name" type="text" name="firstname" required autofocus>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label" for=""> Last Name</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control" placeholder="Last Name" type="text" name="lastname" required autofocus>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label" for=""> Email</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control" placeholder="Email" type="text" name="email" required autofocus>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label" for=""> Phone</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control" placeholder="Phone" type="text" name="phone" required autofocus>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label">Description</label>
                                                            <div class="col-sm-6">
                                                                <textarea class="form-control" rows="3" name="note"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-buttons-w">
                                                            <button class="btn btn-primary" type="submit"> Submit & Continue</button>
                                                        </div>
                                                    </form>
                                                </fieldset>                                    
                                            </div>
                                            <div class="tab-pane" id="tab_milestone">
                                                <div class="form-desc">
                                                    Milestone Invoice - allows you create milestones and pay your customers based on the milestones. 
                                                </div>          
                                                <fieldset class="form-group">
                                                    <form enctype='multipart/form-data' method="POST" action="{{ route('save.invoice.milestone') }}">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label" for=""> First Name</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control" placeholder="First Name" type="text" name="firstname">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label" for=""> Last Name</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control" placeholder="Last Name" type="text" name="lastname">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label" for=""> Email</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control" placeholder="Email" type="text" name="email">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label" for=""> Phone</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control" placeholder="Phone" type="text" name="phone">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label">Description</label>
                                                            <div class="col-sm-6">
                                                                <textarea class="form-control" rows="3" name="note"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-buttons-w">
                                                            <button class="btn btn-primary" type="submit"> Submit & Continue</button>
                                                        </div>
                                                    </form>
                                                </fieldset>                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                                
                    <h6 class="element-header">Invoices</h6>
                    <div class="element-content">
                        <div class="up-contents">
                            <div class="os-tabs-w">
                                <div class="os-tabs-controls">
                                    <ul class="nav nav-tabs bigger">
                                        <li class="nav-item">
                                            <a class="nav-link active show" data-toggle="tab" href="#tab_sent">
                                                Invoices Sent
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tab_received">
                                                Invoices Received
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tab_draft">
                                                Draft Invoices
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="tab_sent">
                                        <div class="element-box">
                                            <!-- <div class="controls-above-table">
                                                <div class="row">
                                                    <form class="form-inline justify-content-sm-end">
                                                        <input class="form-control form-control-sm rounded bright" placeholder="Search" type="text">
                                                        <select class="form-control form-control-sm rounded">
                                                            <option value="Pending">Today</option>
                                                            <option value="Active">Last Week </option>
                                                            <option value="Cancelled">Last 30 Days</option>
                                                        </select>
                                                        <select class="form-control form-control-sm rounded bright">
                                                            <option selected="selected" value="">Select Status</option>
                                                            <option value="Pending">Pending</option>
                                                            <option value="Active">Active</option>
                                                            <option value="Cancelled">Cancelled</option>
                                                        </select>
                                                    </form>
                                                </div>
                                            </div> -->
                                            <div class="element-box">
                                                @if(!$sentinvoices->isEmpty())
                                                <div class="table-responsive">
                                                    @if(Session::has('flash_message'))
                                                    <div class="prompts error">
                                                      <div>{{ Session::get('flash_message') }}</div>
                                                    </div>
                                                    @endif
                                                    <table class="table table-lightborder">
                                                        <thead>              
                                                            <tr>
                                                                <th>Customer Name</th>
                                                                <th>Amount</th>
                                                                <th>Payment Status</th>
                                                                <th class="text-center">Date</th>
                                                                <th>Invoice Type</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($sentinvoices as $sentinvoice)
                                                            <tr>
                                                                <td>
                                                                    <div class="user-with-avatar">
                                                                        <span class="d-none d-xl-inline-block">{{$sentinvoice->recipient->full_name}} </span>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center"> {{$sentinvoice->amount}}</td>
                                                                <td class="text-center">
                                                                    {{$sentinvoice->status}}
                                                                </td>
                                                                <td class="text-right">
                                                                    <span>{{$sentinvoice->created_at->format("M d, Y")}}</span>
                                                                </td>
                                                                <td>
                                                                    {{ $sentinvoice->invoice_type}}
                                                                </td>
                                                                <td>
                                                                    <a class="btn btn-sm btn-link btn-right" href="#" data-target="#invoiceModal-{{ $sentinvoice->id }}" data-toggle="modal">View</a>
                                                                </td>                             
                                                            </tr>
                                                            <!--Modal - Add Item-->
                                                            <div class="modal fade" id="invoiceModal-{{ $sentinvoice->id }}" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header faded smaller">
                                                                            <div class="modal-title">
                                                                                <strong>Invoice Summary</strong>
                                                                            </div>
                                                                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                                                                <span aria-hidden="true"> ×</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body" >
                                                                            <div style="text-align: center; padding-bottom: 20px">
                                                                                <span>
                                                                                    You sent an invoice of <strong>NGN {{ $sentinvoice->amount }}</strong> to <strong>{{ $sentinvoice->recipient->email }}</strong>.
                                                                                </span>
                                                                            </div>  
                                                                            <div class="input-group">Sharable Link:
                                                                                <input class="form-control"
                                                                                value="{{ url('invoice/lnk/'.$sentinvoice->offline_ref_code) }}"  readonly>                                
                                                                                <!-- <button class="btn btn-primary" type="submit">
                                                                                     Copy
                                                                                 </button> -->
                                                                            </div>
                                                                                                        
                                                                            
                                                                            <div class="wrapper">
                                                                                <div class="list-group-item">
                                                                                    <div class="col-xs-5 no-padder">Status</div>
                                                                                    <div class="col-xs-7 no-padder text-right font-bold ng-binding">
                                                                                        {{ $sentinvoice->status }}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="list-group-item">
                                                                                    <div class="col-xs-5 no-padder">Amount </div>
                                                                                    <div class="col-xs-7 no-padder text-right font-bold ng-binding">
                                                                                        {{ $sentinvoice->amount }}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="list-group-item">
                                                                                    <div class="col-xs-5 no-padder">Description</div>
                                                                                    <div class="col-xs-7 no-padder text-right font-bold ng-binding">
                                                                                        {{ $sentinvoice->note }}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <!-- End of Modal Item-->
                                                            @endforeach
                                                        </tbody>           
                                                    </table>  
                                                </div>
                                                @else
                                                    <div class="alert alert-warning">
                                                        You haven't sent any new Invoice. Click to <a href="{{route('transactions.show.index')}}">view your transactions</a> 
                                                    </div>
                                                @endif      
                                                <div class="controls-below-table">
                                                    <div class="table-records-info">Showing records 1 - 5</div>
                                                    <div class="table-records-pages">
                                                        {{ $sentinvoices->links()}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_received">
                                        <div class="element-box">                        
                                            <div class="element-box">
                                                @if(!$receivedinvoices->isEmpty())
                                                <div class="table-responsive">
                                                    @if(Session::has('flash_message'))
                                                    <div class="prompts error">
                                                      <div>{{ Session::get('flash_message') }}</div>
                                                    </div>
                                                    @endif
                                                    <div class="table-responsive">
                                                        <table class="table table-lightborder">
                                                            <thead>
                                                                <tr>
                                                                    <th>Sender Name</th>
                                                                    <th>Amount</th>
                                                                    <th>Payment Status</th>
                                                                    <th>Type</th>
                                                                    <th class="text-center">Date</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($receivedinvoices as $invoice)
                                                                <tr>                              
                                                                    <td>
                                                                        <div class="user-with-avatar">
                                                                            
                                                                            <span class="d-none d-xl-inline-block">{{$invoice->sender->full_name}} </span>
                                                                             
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-center"> {{$invoice->amount}}</td>
                                                                    <td class="text-center">
                                                                        {{$invoice->status}}
                                                                    </td>
                                                                    <td>
                                                                        {{ $invoice->invoice_type}}
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span>{{$invoice->created_at->format("M d, Y")}}</span>
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{ route('invoice.open', $invoice->uuid) }}">
                                                                            View
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>  
                                                    </div>   
                                                </div>

                                                   
                                                <div class="controls-below-table">
                                                    <div class="table-records-info">Showing records 1 - 5</div>
                                                    <div class="table-records-pages">
                                                        {{ $receivedinvoices->links()}} 
                                                    </div>
                                                </div>
                                                @else
                                                    <div class="alert alert-warning">
                                                        You have no unpiad invoice. Click to <a href="{{route('transactions.show.index')}}">view your transactions</a> 
                                                    </div>
                                                @endif                                                
                                            </div>
                                        </div> 
                                    </div>                                 
                                    <div class="tab-pane" id="tab_draft">
                                        <div class="element-box">
                                            
                                            <div class="element-box">
                                                @if(!$draftinvoices->isEmpty())
                                                <div class="table-responsive">
                                                    @if(Session::has('flash_message'))
                                                    <div class="prompts error">
                                                      <div>{{ Session::get('flash_message') }}</div>
                                                    </div>
                                                    @endif
                                                    <table class="table table-lightborder">
                                                        <thead>              
                                                            <tr>
                                                                <th>Customer Name</th>
                                                                <th>Amount</th>
                                                                <th>Payment Status</th>
                                                                <th>Type</th>
                                                                <th class="text-center">Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($draftinvoices as $invoice)
                                                            <tr>
                                                                <td>
                                                                    <div class="user-with-avatar">
                                                                        
                                                                        <span class="d-none d-xl-inline-block">{{$invoice->recipient->full_name}} </span>
                                                                         
                                                                    </div>
                                                                </td>
                                                                <td class="text-center"> {{$invoice->amount}}</td>
                                                                <td class="text-center">
                                                                    {{$invoice->status}}
                                                                </td>
                                                                <td>
                                                                    {{ $invoice->invoice_type}}
                                                                </td>
                                                                <td class="text-right">
                                                                    <span>{{$invoice->created_at->format("M d, Y")}}</span>
                                                                </td>
                                                                <!-- <td class="text-right">
                                                                    <a href="{{route('invoice.show.edit', $invoice->uuid )}}">Edit</a>
                                                                </td> -->
                                                            </tr>
                                                            @endforeach
                                                        </tbody>           
                                                    </table>  
                                                </div>
                                                {{$draftinvoices->links()}}
                                                @else
                                                    <div class="alert alert-warning">
                                                        No Draft Invoice
                                                    </div>
                                                @endif      
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--------------------START - Sidebar-------------------->
    <!-- <div class="content-panel">
        <div class="content-panel-close">
            <i class="os-icon os-icon-close"></i>
        </div>
        <div class="element-wrapper">
            <h6 class="element-header">Quick Links</h6>
            <div class="element-box-tp">
                <div class="el-buttons-list full-width">
                    <a class="btn btn-white btn-sm" href="#">
                        <i class="os-icon os-icon-delivery-box-2"></i>
                        <span>Create New Product</span>
                    </a>
                    <a class="btn btn-white btn-sm" href="#">
                        <i class="os-icon os-icon-window-content"></i>
                        <span>Customer Comments</span>
                    </a>
                    <a class="btn btn-white btn-sm" href="#">
                        <i class="os-icon os-icon-wallet-loaded"></i>
                        <span>Store Settings</span>
                    </a>
                </div>
            </div>
        </div>
    </div> -->
    <!--------------------END - Sidebar-------------------->
</div>
@endsection