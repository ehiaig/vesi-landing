@extends('layouts.backend.app')
@section('title', 'Transactions Dashboard')
@section('content')
<div class="content-w">
	<div class="content-i">
		<div class="content-box">
			<div class="row">
                <div class="col-sm-12">
                    <div class="element-wrapper">
                        <h6 class="element-header">Recent Transactions</h6>
                        <div class="element-box">
                            <div class="os-tabs-w">
                                <div class="os-tabs-controls">
                                    <ul class="nav nav-tabs smaller">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#tab_invoice">INVOICE Transactions</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tab_milestone">MILESTONE Transactions</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_invoice">
                                    	<div class="os-tabs-w">
			                                <div class="os-tabs-controls">
			                                    <ul class="nav nav-tabs smaller">
			                                        <li class="nav-item active">
			                                            <a class="nav-link" data-toggle="tab" href="#tab_sent">Invoices Sent</a>
			                                        </li>
			                                        <li class="nav-item">
			                                            <a class="nav-link" data-toggle="tab" href="#tab_received">Invoices Received</a>
			                                        </li>
			                                    </ul>
			                                </div>
			                                <div class="tab-content">
			                                	<div class="tab-pane active" id="tab_sent">
			                                		@if(!$sentinvoices->isEmpty())
                                                    <div class="table-responsive">
                                                        @if(Session::has('flash_message'))
                                                        <div class="prompts error">
                                                          <div>{{ Session::get('flash_message') }}</div>
                                                        </div>
                                                        @endif
														<table class="table table-padded">
															<thead>
																<tr>
																	<th>Recipient</th>
																	<th>Date</th>
																	<th>Payment Status</th>
																	<th>Amount (NGN)</th>
																</tr>
															</thead>
															<tbody>
																@foreach($sentinvoices as $sentinvoice)
																<tr>
																	<td class="">
																		<span>{{ $sentinvoice->recipient->fullname }}</span>
																	</td>
																	<td>
																		<span>{{$sentinvoice->updated_at->format("M d, Y")}}</span>
																	</td>
																	<td class="">
																		<span>{{$sentinvoice->status}}</span>
																	</td>
																	<td>
																		<span>{{$sentinvoice->amount}}</span>
																	</td>
																	<td>
																		@if($sentinvoice->secret_key_updated_at)
																		<button class="mr-2 mb-2 btn btn-primary btn-sm"  type="button" disabled>
											                               Enter Secrey key
											                            </button>
											                            @else
											                            <button class="mr-2 mb-2 btn btn-primary btn-sm" data-target="#secretKeyModal-{{ $sentinvoice->id }}" data-toggle="modal" type="button">
											                               Enter Secrey key
											                            </button>
											                            @endif
																	</td>
																	<td class="text-center">
																		<form method="POST" action="{{ route('sender.confirm', $sentinvoice->uuid) }}" id="form-{{$sentinvoice->uuid}}" class='ajax'>
																			@csrf
																			<input type="hidden" name="sender_id" value="{{$sentinvoice->sender_id}}">
																			<input type="hidden" name="sender_confirmed" value="{{$sentinvoice->sender_confirmed}}">
																		<button class="btn btn-success btn-sm" type="submit" class="confirm" {!! $sentinvoice->sender_confirmed ? 'disabled="disabled"' : '' !!}

																			>Confirm</button>
																		</form>
																	</td>
																	<!-- <td class="text-center">
																		<a class="btn btn-secondary btn-sm" href="#">Open Dispute</a>
																	</td> -->	
																</tr>
																<div class="onboarding-modal modal fade animated" id="secretKeyModal-{{ $sentinvoice->id }}" role="dialog" tabindex="-1" role="dialog">
													            <div class="modal-dialog modal-centered" >
													                <div class="modal-content text-center">
													                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
													                        <span class="close-label">Close</span>
													                        <span class="os-icon os-icon-close"></span>
													                    </button>
													                    <div class="onboarding-content with-gradient">
													                        <h4 class="onboarding-title">Supply Secret Key</h4>
													                        <div class="onboarding-text">
													                            Enter the Secret Key you collected from the customer who received this invoice.  
													                        </div>
													                    
													                        <form method="POST" action="{{ route('supply.key', $sentinvoice->uuid) }}">
													                            @csrf
													                            <div class="input-group">
													                                <input class="form-control" placeholder="Enter Secret Key " type="text" name="secret">                                
													                                <button class="btn btn-primary" type="submit">
													                                     Submit
													                                 </button>
													                            </div>
													                        </form> 
													                    </div>                
													                </div>
													            </div>
													        </div>
																@endforeach
															</tbody>
															
														</table>
														{{$sentinvoices->links()}}
													</div>
													@else
                                                        <div class="alert alert-danger">
                                                            You haven't sent any Invoice yet
                                                        </div>
                                                    @endif 
                                                    
			                                	</div>
			                                	<div class="tab-pane" id="tab_received">
			                                		@if(!$receivedinvoices->isEmpty())
                                                    <div class="table-responsive">
                                                        @if(Session::has('flash_message'))
                                                        <div class="prompts error">
                                                          <div>{{ Session::get('flash_message') }}</div>
                                                        </div>
                                                        @endif
														<table class="table table-padded">
															<thead>
																<tr>
																	<th>Invoice No</th>
																	<th>Date</th>
																	<th>Payment Status</th>
																	<th>Amount (NGN)</th>
																	<th>Secret Key</th>
																</tr>
															</thead>
															<tbody>
																@foreach($receivedinvoices as $invoice)
																<tr>
																	<td class="">
																		<span>{{ $invoice->id }}</span>
																	</td>
																	<td>
																		<span>{{$invoice->updated_at->format("M d, Y")}}</span>
																	</td>
																	<td class="">
																		<span>{{$invoice->status}}</span>
																	</td>
																	<td>
																		<span>{{$invoice->amount}}</span>
																	</td>
																	<td class="text-right bolder nowrap">
																		<span>{{$invoice->secret_key}}</span>
																	</td>
																	<td class="text-center">
																		<form method="POST" action="{{ route('recipient.confirm', $invoice->uuid) }}" id="form-{{$invoice->uuid}}" class='ajax'>
																			@csrf
																			<input type="hidden" name="recipient_id" value="{{$invoice->recipient_id}}">
																			<input type="hidden" name="recipient_confirmed" value="{{$invoice->recipient_confirmed}}">
																		<button class="btn btn-success btn-sm" type="submit" class="confirm" {!! $invoice->recipient_confirmed ? 'disabled="disabled"' : '' !!}

																			>Confirm</button>
																		</form>
																	</td>
																	<td class="text-center">
																		@if($invoice->recipient_confirmed)
											                            	<button class="btn btn-secondary btn-sm" href="#" data-target="#disputeModal-{{ $invoice->id }}" data-toggle="modal" disabled>Open Dispute</button>
											                            @else
											                            	<button class="btn btn-secondary btn-sm" href="#" data-target="#disputeModal-{{ $invoice->id }}" data-toggle="modal">Open Dispute</button>
											                            @endif
																	</td>

																	<!--Modal - Add Item-->
                                                    <div class="modal fade" id="disputeModal-{{ $invoice->id }}" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header faded smaller">
                                                                    <div class="modal-title" style="text-align: center;">
                                                                        <strong>Open a Dispute</strong>
                                                                    </div>
                                                                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                                                        <span aria-hidden="true"> ×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-desc">Was there a problem with your order? Let's help you resolve it.</div>

                                                                    <form method="POST" action="{{route('dispute.save')}}"">
                                                                    	@csrf
                                                                    	<input type="hidden" name="invoice_id" value="{{$invoice->id}}">
	                                                                    <div class="form-group row">
	                                                                    	<label class="col-sm-4 col-form-label">Select the dispute</label>
	                                                                    	<div class="col-sm-8">
	                                                                    		<div class="form-check">
	                                                                    			<label class="form-check-label">
	                                                                    				<input checked="" class="form-check-input" name="dispute_type" value="I did not receive my order" type="radio">I did not receive my order.
	                                                                    			</label>
	                                                                    		</div>
	                                                                    		<div class="form-check">
	                                                                    			<label class="form-check-label"><input class="form-check-input" name="dispute_type" value="My item was damaged or different from what was described" type="radio">My item was damaged or different from what was described.</label>
	                                                                    		</div>
	                                                                    		<div class="form-check">
	                                                                    			<label class="form-check-label"><input class="form-check-input" name="dispute_type" value="I want to cancel, I'm no longer interested in this item" type="radio">I want to cancel, I'm no longer interested in this item</label>
	                                                                    		</div>
	                                                                    	</div>
	                                                                    </div>
	                                                                    <div style="text-align: center;">
	                                                                        <button class="mr-2 mb-2 btn btn-outline-success" type="submit" > Proceed </button>
	                                                                        <button class="mr-2 mb-2 btn btn-outline-secondary" data-dismiss="modal" type="button"> Cancel</button>
	                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!-- End of Modal Item-->	
																</tr>
																@endforeach
															</tbody>
														</table>
														{{$receivedinvoices->links()}}
													</div>
													@else
                                                        <div class="alert alert-warning">
                                                            You haven't received any Invoice yet
                                                        </div>
                                                    @endif
			                                	</div>
			                                </div>
			                            </div>                                        
                                    </div>
                                    <div class="tab-pane" id="tab_milestone">
                                    	<div class="os-tabs-w">
			                                <div class="os-tabs-controls">
			                                    <ul class="nav nav-tabs smaller">
			                                        <li class="nav-item active">
			                                            <a class="nav-link" data-toggle="tab" href="#mstab_sent">Milestones I Created</a>
			                                        </li>
			                                        <li class="nav-item">
			                                            <a class="nav-link" data-toggle="tab" href="#mstab_received">Sent by Clients</a>
			                                        </li>
			                                    </ul>
			                                </div>
			                                <div class="tab-content">
			                                	<div class="tab-pane active" id="mstab_sent">
			                                		<div class="element-box">
					                                    <div class="pipeline-body">
					                                        <div class="row">       
					                                            @foreach ($mssentinvoices as $invoice)
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
					                                                                     	<th>Date</th>
					                                                                        <th>Milestone</th>
																							<th>Milestone  Status</th>
																							<th>Amount (NGN)</th>
																							<th>Inspection Period</th>
					                                                                    </tr>
					                                                                </thead>
					                                                                <tbody>
					                                                                    @foreach ($invoice->milestoneItems as $milestone)
					                                                                    <tr>
					                                                                    	<td>
																								<span>{{$milestone->updated_at->format("M d, Y")}}</span>
																							</td>
					                                                                        <td> {{$milestone->name}}</td>
					                                                                        <td>
					                                                                            {{$milestone->milestone_status}}
					                                                                        </td>
					                                                                        <td>
					                                                                            {{$milestone->price}}
					                                                                        </td>
					                                                                        <td>
					                                                                            {{$milestone->inspection_period}}
					                                                                        </td>
					                                                                        <td class="text-center">
																							<form method="POST" action="{{ route('senderms.confirm', $milestone->id) }}" id="form-{{$milestone->id}}" class='ajax'>
																								@csrf
																								<input type="hidden" name="recipient_id" value="{{$invoice->sender->id}}">
																								<input type="hidden" name="sender_confirmed" value="{{$milestone->sender_confirmed}}">
																							<button class="btn btn-success btn-sm" type="submit" class="confirm" {!! $milestone->sender_confirmed ? 'disabled="disabled"' : '' !!}

																								>Confirm</button>
																							</form>
																						</td>
																						<td class="text-center">
																							<a class="btn btn-secondary btn-sm" href="#">Open Dispute</a>
																						</td>     
					                                                                    </tr>
					                                                                    @endforeach
					                                                                </tbody>           
					                                                            </table> 
					                                                            <div class="h6 pi-name text-right">Total: {{$invoice->amount}}</div>
					                                                        </div>
					                                                    </div>
					                                                </div>
					                                            @endforeach
					                                        </div>
					                                    </div>
					                                </div>
			                                	</div>
			                                	<div class="tab-pane" id="mstab_received">
			                                		<div class="element-box">
					                                    <div class="pipeline-body">            
					                                        <div class="row">
					                                            @foreach ($msreceivedinvoices as $invoice)
					                                                <div class="pipeline-item">
					                                                    <div class="pi-controls">
					                                                        <span>From: &lt; {{$invoice->sender->email}} &gt;</span>
					                                                        <div class="badge badge-success-inverted">{{$invoice->status}}</div>
					                                                        
					                                                    </div>
					                                                    <div class="pi-body">
					                                                        <div class="pi-info">
					                                                            <div class="h6 pi-name">{{$invoice->id}}</div>
					                                                            <div class="pi-sub">{{$invoice->note}}</div>

					                                                            <table class="table table-lightborder">
					                                                                <thead>              
					                                                                    <tr>
					                                                                     	<th>Date</th>
					                                                                        <th>Milestone</th>
																							<th>Milestone  Status</th>
																							<th>Amount (NGN)</th>
																							<th>Inspection Period</th>
					                                                                    </tr>
					                                                                </thead>
					                                                                <tbody>
					                                                                    @foreach ($invoice->milestoneItems as $milestone)
					                                                                    <tr>
					                                                                    	<td>
																								<span>{{$milestone->updated_at->format("M d, Y")}}</span>
																							</td>
					                                                                        <td> {{$milestone->name}}</td>
					                                                                        <td>
					                                                                            {{$milestone->milestone_status}}
					                                                                        </td>
					                                                                        <td>
					                                                                            {{$milestone->price}}
					                                                                        </td>
					                                                                        <td>
					                                                                            {{$milestone->inspection_period}}
					                                                                        </td>
					                                                                        <td class="text-center">
																							<form method="POST" action="{{ route('recipientms.confirm', $milestone->id) }}" id="form-{{$milestone->id}}" class='ajax'>
																								@csrf
																								<input type="hidden" name="recipient_id" value="{{$invoice->recipient->id}}">
																								<input type="hidden" name="recipient_confirmed" value="{{$milestone->recipient_confirmed}}">
																							<button class="btn btn-success btn-sm" type="submit" class="confirm" {!! $milestone->recipient_confirmed ? 'disabled="disabled"' : '' !!}

																								>Confirm</button>
																							</form>
																						</td>
																						<td class="text-center">
																							<a class="btn btn-secondary btn-sm" href="#">Open Dispute</a>
																						</td>     
					                                                                    </tr>
					                                                                    @endforeach
					                                                                </tbody>           
					                                                            </table> 
					                                                            <div class="h6 pi-name text-right">Total: {{$invoice->amount}}</div>
					                                                        </div>
					                                                    </div>
					                                                    <div class="pi-foot">
					                                                        <!-- <div class="tags">
					                                                            
					                                                            <a class="tag" href="#">Sales</a>
					                                                        </div> -->
					                                                        <!-- <a class="btn btn-sm btn-primary btn-right" href="#" data-target="#taskModal" data-toggle="modal">Pay</a> -->
					                                                    </div>
					                                                </div>
					                                            @endforeach
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
                </div>
            </div>	
		</div>
    </div>
</div>
@endsection
@section('scripts')
<script>

    $(".ajax").submit(function(event) { //listening on class name and for submit action
        event.preventDefault();
        var $confirmButton = $(this).find('.confirm'); // the confirm button of this form
       $confirmButton.prop('disabled', true);
        $.ajax({
            type: "post",
            url: $(this).attr('sender.confirm'), //send to the correct url based on the markup
            dataType: "json",
            data: $(this).serialize(), //this refers to the submitted form
            success: function(data){
                  alert("Data Saved");
            },
            error: function(data){
                 $confirmButton.prop('disabled', false);
                 alert("Error")
            }
        });
    });

    $(".ajax").submit(function(event) { //listening on class name and for submit action
        event.preventDefault();
        var $confirmButton = $(this).find('.confirm'); // the confirm button of this form
       $confirmButton.prop('disabled', true);
        $.ajax({
            type: "post",
            url: $(this).attr('senderms.confirm'), //send to the correct url based on the markup
            dataType: "json",
            data: $(this).serialize(), //this refers to the submitted form
            success: function(data){
                  alert("Data Saved");
            },
            error: function(data){
                 $confirmButton.prop('disabled', false);
                 alert("Error")
            }
        });
    });
</script>
@endsection