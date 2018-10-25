@extends('layouts.backend.app')
@section('title', 'Milestones')
@section('content')

<div class="content-box">
    <div class="col-sm-12">
        <h6 class="element-header">Overview of Milestone Invoices</h6>
        <div class="element-content">
            <div class="up-contents">
                <div class="os-tabs-w">
                    <div class="os-tabs-controls">
                        <ul class="nav nav-tabs bigger">
                            <li class="nav-item">
                                <a class="nav-link active show" data-toggle="tab" href="#tab_mssent">    
                                    Sent
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab_msreceived">
                                    Received
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">                             
                        <div class="tab-pane  active show" id="tab_mssent">
                            <div class="element-box">
                                <legend>Invoices I sent</legend>
                                <div class="pipeline-body">
                                    @if(!$invoices->isEmpty())
                                        <div class="element-box"> 
                                            @if(Session::has('flash_message'))
                                            <div class="prompts error">
                                              <div>{{ Session::get('flash_message') }}</div>
                                            </div>
                                            @endif             
                                            <div class="row">
                                                <div class="col-sm-12">                          
                                                @foreach ($invoices as $invoice)
                                                    <div class="pipeline-item">
                                                        <div class="pi-controls">
                                                            <span>To: &lt; {{$invoice->recipient->email}} &gt;</span>
                                                            <div class="badge badge-success-inverted">{{$invoice->status}}</div>
                                                        </div>
                                                        <div class="pi-body">
                                                            <div class="pi-info">
                                                                <div class="h6 pi-name">{{$invoice->id}}</div>
                                                                <div class="pi-sub">{{$invoice->note}}</div>

                                                                <table class="table table-lightborder">
                                                                    <thead>              
                                                                        <tr>
                                                                            <th>Milestone</th>
                                                                            <th>Amount</th>
                                                                            <th>Inspection Period</th>
                                                                            <th>Date Sent</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($invoice->milestoneItems as $milestone)
                                                                        <tr>
                                                                            <td> {{$milestone->name}}</td>
                                                                            <td>
                                                                                {{$milestone->price}}
                                                                            </td>
                                                                            <td>
                                                                                {{$milestone->inspection_period}}
                                                                            </td>
                                                                            <td>
                                                                                {{$milestone->updated_at->format("M d, Y")}}
                                                                            </td>     
                                                                        </tr>
                                                                        @endforeach
                                                                    </tbody>           
                                                                </table> 
                                                                <div class="h6 pi-name text-right">Total: {{$invoice->amount}}</div>
                                                            </div>
                                                        </div>
                                                        <div class="pi-foot">
                                                            @if($invoice->status == 'paid')
                                                                <button class="btn btn-sm btn-primary btn-right" href="#" data-target="#invoiceModal-{{ $invoice->id }}" data-toggle="modal" disabled>Pay</button>
                                                            @else
                                                                <button class="btn btn-sm btn-primary btn-right" href="#" data-target="#invoiceModal-{{ $invoice->id }}" data-toggle="modal">Pay</button>
                                                            @endif

                                                            
                                                            <!-- <a class="extra-info" href="#">
                                                                <i class="os-icon os-icon-mail-12"></i>
                                                                <span>Comments</span>
                                                            </a> -->
                                                        </div>
                                                    </div>
                                                
                                                <!--Modal - Add Item-->
                                                    <div class="modal fade" id="invoiceModal-{{ $invoice->id }}" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header faded smaller">
                                                                    <div class="modal-title">
                                                                        <strong>Pre-authorize your Payment</strong>
                                                                    </div>
                                                                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                                                        <span aria-hidden="true"> ×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-desc">When you pre-authorize your payment, Vesicash holds the money in an escrow until you confirm that your client has delivered your service/item.</div>
                                                                    <div style="text-align: center;">
                                                                        <span>
                                                                            A total amount of NGN {{$invoice->amount}} will be deducted from your account.
                                                                        </span>
                                                                        <!--Payment Form starts-->
                                                                        <form method="POST" action="{{ route('pay') }}">
                                                                            @csrf
                                                                            <input type="hidden" name="email" value="{{$invoice->sender->email}}">
                                                                            <input type="hidden" name="orderID" value="{{$invoice->id}}">
                                                                            <input type="hidden" name="amount" value="{{$invoice->amount*100}}">
                                                                            <input type="hidden" name="metadata" value="{{ json_encode($array = ['invoice_uuid' => $invoice->uuid]) }}" > 
                                                                            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
                                                                            <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}">

                                                                            <div class="modal-footer" style="text-align: center;">
                                                                                <button class="mr-2 mb-2 btn btn-outline-success" type="submit"> Pre-authorize Payment</button>
                                                                                <button class="mr-2 mb-2 btn btn-outline-secondary" data-dismiss="modal" type="button"> Cancel</button>
                                                                            </div>
                                                                        </form>
                                                                        <!--Payment form ends-->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!-- End of Modal Item-->
                                                @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="alert alert-warning">
                                            You haven't created any Invoice. Click to <a href="{{route('transactions.show.index')}}">view your transactions</a>
                                        </div>
                                    @endif
                                        
                                </div>
                            </div>
                                    
                        </div>
                        <div class="tab-pane" id="tab_msreceived">
                            <div class="element-box">                                
                                <legend>Invoices received</legend>
                                <div class="pipeline-body">
                                    @if(!$invoices_received->isEmpty())
                                        <div class="element-box"> 
                                            @if(Session::has('flash_message'))
                                            <div class="prompts error">
                                              <div>{{ Session::get('flash_message') }}</div>
                                            </div>
                                            @endif      
                                            <div class="row">
                                                <div class="col-sm-12">
                                                @foreach ($invoices_received as $invoice)
                                                    <div class="pipeline-item">
                                                        <div class="pi-controls">
                                                            <span>
                                                                From: &lt; {{$invoice->sender->email}} &gt;
                                                            </span>
                                                            <div class="badge badge-success">
                                                                {{$invoice->status}}
                                                            </div>
                                                        </div>
                                                        <div class="pi-body">
                                                            <div class="pi-info">
                                                                <div class="h6 pi-name">
                                                                    {{$invoice->id}}
                                                                </div>
                                                                <div class="pi-sub">
                                                                    {{$invoice->note}}
                                                                </div>
                                                                <table class="table table-lightborder">
                                                                    <thead>              
                                                                        <tr>
                                                                            <th>Milestone</th>
                                                                            <th>Amount</th>
                                                                            <th>Inspection Period</th>
                                                                            <th>Date Sent</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($invoice->milestoneItems as $milestone)
                                                                        <tr>
                                                                            <td> {{$milestone->name}}</td>
                                                                            <td>
                                                                                {{$milestone->price}}
                                                                            </td>
                                                                            <td>
                                                                                {{$milestone->inspection_period}}
                                                                            </td>
                                                                            <td>
                                                                                {{$milestone->updated_at->format("M d, Y")}}
                                                                            </td>     
                                                                        </tr>
                                                                        @endforeach
                                                                    </tbody>           
                                                                </table> 
                                                                <div class="h6 pi-name text-right">Total: {{$invoice->amount}}</div>
                                                            </div>
                                                        </div>
                                                        <div class="pi-foot">
                                                            <a class="mr-2 mb-2 btn btn-outline-secondary" href="{{ route('reviews.show.create', $invoice->uuid) }}">
                                                                <span>Review Invoice</span>
                                                            </a>
                                                            
                                                            <form method="POST" action="{{ route('recipient.accept', $invoice->uuid) }}" id="form-{{$invoice->uuid}}" class='ajax'>
                                                                @csrf
                                                                <input type="hidden" name="recipient_id" value="{{$invoice->recipient_id}}">
                                                                <input type="hidden" name="is_accepted" value="{{$invoice->is_accepted}}">
                                                            <button class="mr-2 mb-2 btn btn-success" type="submit" class="accept" {!! $invoice->is_accepted ? 'disabled="disabled"' : '' !!}>I accept</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                 @endforeach
                                                 </div> 
                                                {{$invoices_received->links()}} 
                                            </div>
                                        </div> 
                                    @else
                                        <div class="alert alert-warning">
                                            You haven't received any new Milestone Invoice. Click to <a href="{{route('transactions.show.index')}}">view your transactions</a>
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
@endsection
@section('scripts')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> -->
<script>

    $(".ajax").submit(function(event) {
        event.preventDefault();
        var $acceptButton = $(this).find('.accept');
       $acceptButton.prop('disabled', true);
        $.ajax({
            type: "post",
            url: $(this).attr('recipient.accept'),
            dataType: "json",
            data: $(this).serialize(),
            success: function(data){
                  alert("Data Saved");
            },
            error: function(data){
                 $acceptButton.prop('disabled', false);
                 alert("Error")
            }
        });
    });
</script>
@endsection