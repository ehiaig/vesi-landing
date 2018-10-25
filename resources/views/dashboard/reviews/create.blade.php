@extends('layouts.backend.app')
@section('title', 'Invoices')
@section('content')
<div class="content-i">
    <div class="content-box">
    	<div class="row">
            <div class="col-sm-12">
                <div class="element-wrapper" >
                	<h4 class="element-header"> Review Invoice</h4>
					<div class="element-content">
						<div class="up-contents"> 
			                <!-- Invoice starts -->
			                <div class="invoice-w">
			                	<div class="invoice-heading">
		                			<h3>Invoice</h3>
		                			<div class="desc-label">Invoice No: {{$invoice->invoice_no}}</div>
		                			<div class="invoice-date">Date: {{$invoice->created_at->format("M d, Y")}}</div>
		                		</div>
			            		<div class="infos">
			            			<div class="message-head">
			            				<div class="user-w with-status status-green">
			            					<div class="user-name">
			            						<h6 class="user-title">From:</h6>
			            						<div class="user-role">{{$invoice->sender->full_name}}
			            						</div>
			            					</div>
			            				</div>                				
			            			</div>
			            			<div class="info-1">
			            				<div class="user-w with-status status-green">
			            				<div class="user-name">
		            						<h6 class="user-title">To:</h6>
		            						<div class="invoice-info">{{$invoice->recipient->full_name}}
		            						</div>
		            						<div class="invoice-info">{{$invoice->recipient->email}}
		            						</div>
		            					</div>
		            				</div>
			            			</div>
			            		</div><br><br>
			            		
			            		@if($invoice->invoice_type == 'one-off')
				            		<div class="invoice-body">
				            			<div class="invoice-table">
				            				<table class="table">
				            					<thead>
				            						<tr>
				            							<th>Item</th>
				            							<th>Qty</th>
				            							<th class="text-right">Price (NGN)</th>
				            						</tr>
				            					</thead>
				            					<tbody>
				            						@foreach ($invoice->invoiceItems as $invoiceItem)
				            						<tr>
				            							<td>{{$invoiceItem->name}}</td>
				            							<td>{{$invoiceItem->quantity}}</td>
				            							<td class="text-right">{{$invoiceItem->price}}</td>
				            						</tr>
				            						@endforeach
				            					</tbody>
				            					<tfoot>
				            						<tr>
				            							<td style="font-size: 13px;">{{$invoice->note}}</td>
				            							<td style="font-size: 13px;" class="text-right" colspan="2">
				            								{{$invoice->amount}}
				            							</td>
				            						</tr>
				            						<tr style="font-size: 16px;">
				            							<td></td>
				            							<td>Total:</td>
				            							<td class="text-right" colspan="2">
				            								{{$invoice->amount}}
				            							</td>
				            						</tr>
				            					</tfoot>
				            				</table>
				            				 
				            				<div class="terms">
				            					<div class="terms-header">Terms and Conditions</div>
				            					<div class="terms-content">Should be paid as soon as received, otherwise a 5% penalty fee is applied</div>
				            				</div>
				            			</div>
				            		</div>
				            		<div class="invoice-footer">
				            			<div class="invoice-logo">
				            			</div>
				            			<div class="invoice-info">
				            				<span>			            					
					            				<div class="actions-right">
					            					<!--Payment Form starts-->
													<form method="POST" action="{{ route('pay') }}">
														@csrf
														<input type="hidden" name="email" value="{{$invoice->recipient->email}}">
											            <input type="hidden" name="orderID" value="{{$invoice->id}}">
											            <input type="hidden" name="amount" value="{{$invoice->amount*100}}">
											            <input type="hidden" name="metadata" value="{{ json_encode($array = ['invoice_uuid' => $invoice->uuid]) }}" > 
											            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
											            <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}">

														<div class="modal-footer" style="text-align: center;">
															<button class="btn btn-success" type="submit"> Pay Now</button>
															<a class="btn btn-secondary" href="{{route('invoice.show.index')}}" type="button"> Back</a>
														</div>
													</form>
					            					
					            				</div>
					            			</span>
				            			</div>
				            		</div>
			            		@elseif($invoice->invoice_type == 'milestone')
			            			<div class="invoice-body">    
				            			<div class="invoice-table">
				            				<table class="table">
				            					<thead>
				            						<tr>
				            							<th>Milestone</th>
				            							<th class="text-right">Price (NGN)</th>
				            						</tr>
				            					</thead>
				            					<tbody>
				            						@foreach ($invoice->milestoneItems as $milestoneItem)
				            						<tr>
				            							<td>{{$milestoneItem->name}}</td>
				            							<td class="text-right">{{$milestoneItem->inspection_period}}</td>
				            							<td>{{$milestoneItem->quantity}}</td>
				            						</tr>
				            						@endforeach
				            					</tbody>
				            					<tfoot>
				            						<tr>
				            							<td style="font-size: 13px;">{{$invoice->note}}</td>
				            							<td style="font-size: 13px;" class="text-right" colspan="2">
				            								{{$invoice->amount}}
				            							</td>
				            						</tr>
				            						<tr style="font-size: 16px;">
				            							<td></td>
				            							<td>Total:</td>
				            							<td class="text-right" colspan="2">
				            								{{$invoice->amount}}
				            							</td>
				            						</tr>
				            					</tfoot>
				            				</table>
				            				 
				            				<div class="terms">
				            					<div class="terms-header">Terms and Conditions</div>
				            					<div class="terms-content">Should be paid as soon as received, otherwise a 5% penalty fee is applied</div>
				            				</div>
				            			</div>
				            		</div>
				            		<div class="invoice-footer">
				            			<div class="invoice-logo">
				            				<span>
				            					<div class="pt-btn">
				            						<!-- <a class="btn btn-secondary btn-sm" href="#">
				            							<span>Review Invoice</span>
				            						</a> -->
				            					</div>
					            			</span>
				            			</div>
				            			<div class="invoice-info">
				            				<span>			            					
					            				<div class="actions-right">
					            					<!--Payment Form starts-->
													<form method="POST" action="{{ route('pay') }}">
														@csrf
														<input type="hidden" name="email" value="{{$invoice->recipient->email}}">
											            <input type="hidden" name="orderID" value="{{$invoice->id}}">
											            <input type="hidden" name="amount" value="{{$invoice->amount*100}}">
											            <input type="hidden" name="metadata" value="{{ json_encode($array = ['invoice_uuid' => $invoice->uuid]) }}" > 
											            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
											            <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}">

														<div class="modal-footer" style="text-align: center;">
															<button class="btn btn-success" type="submit"> Pay Now</button>
															<a class="btn btn-secondary" href="{{route('invoice.show.index')}}" type="button"> Back</a>
														</div>
													</form>
					            					
					            				</div>
					            			</span>
				            			</div>
				            		</div>
			            		@else
				            		<div class="invoice-table">	
			            				<table class="table">
			            					<thead>
			            						<tr>
			            							<th>Description</th>
			            							<th class="text-right">Price (NGN)</th>
			            						</tr>
			            					</thead>
			            					<tbody>
			            						
			            						<tr>
			            							<td>{{$invoice->note}}</td>
			            							<td class="text-right">{{$invoice->amount}}</td>
			            						</tr>
			            						
			            					</tbody>
			            					<tfoot>
			            						<tr>
			            							<td>Total</td>
			            							<td class="text-right" colspan="2">
			            								{{$invoice->amount}}
			            							</td>
			            						</tr>
			            					</tfoot>
			            				</table>
			            				 
			            				<div class="terms">
			            					<div class="terms-header">Terms and Conditions</div>
			            					<div class="terms-content">Should be paid as soon as received, otherwise a 5% penalty fee is applied</div>
			            				</div>
			            			</div>
			            			<div class="invoice-footer">
				            			<div class="invoice-logo">
				            				<span>
				            					<div class="pt-btn">
				            						
				            					</div>
					            			</span>
				            			</div>
				            			<div class="invoice-info">
				            				<span>			            					
					            				<div class="actions-right">
					            					<!--Payment Form starts-->
													<form method="POST" action="{{ route('pay') }}">
														@csrf
														<input type="hidden" name="email" value="{{$invoice->recipient->email}}">
											            <input type="hidden" name="orderID" value="{{$invoice->id}}">
											            <input type="hidden" name="amount" value="{{$invoice->amount*100}}">
											            <input type="hidden" name="metadata" value="{{ json_encode($array = ['invoice_uuid' => $invoice->uuid]) }}" > 
											            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
											            <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}">

														<div class="modal-footer" style="text-align: center;">
															<button class="btn btn-success" type="submit"> Pay Now</button>
															<a class="btn btn-secondary" href="{{route('invoice.show.index')}}" type="button"> Back</a>
														</div>
													</form>
					            					
					            				</div>
					            			</span>
				            			</div>
				            		</div>
			            		@endif
			            	</div>					
			                <!-- invoice ends-->
			            </div>
					</div>
				</div>
			</div>
			<div class="col-sm-3"></div>
		</div>
	</div>
	<div class="content-panel">
        <div class="element-wrapper">
            <h6 class="element-header">Leave messages here</h6>
				<div class="full-chat-w">
					<div class="full-chat-i">
		                <div class="full-chat-middle">
		                	<div class="chat-head">
		                		<div class="user-info">
		                			<span>To:</span>
		                			<a>{{$invoice->sender->fullname}}</a>
		                		</div>
		                 	</div>
		                 	@if(!$invoice->reviews->isEmpty())
		                 		@if(Session::has('flash_message'))
	            				<div class="prompts error">
                                  <div>{{ Session::get('flash_message') }}</div>
                                </div>
		                 	@endif
			                	<div class="chat-content-w">
			                		@foreach($invoice->reviews as $review)
				                		@if($review->sender == $invoice->recipient)
				                		<div class="chat-message">
			                				<div class="chat-message-content-w">
			                					<div class="chat-message-content">
			                						{{$review->message}}
			                					</div>
			                				</div>
			                				<div class="chat-message-date">
				                				{{$review->sender->fullname}} at {{$review->created_at->format("M d, Y")}}
				                			</div>
				                		</div>
			                			@else
			                			<div class="chat-message self">
			                				<div class="chat-message-content-w">
			                					<div class="chat-message-content">
			                						{{$review->message}}
			                					</div>
			                				</div>
			                				<div class="chat-message-date">
				                				{{$review->sender->fullname}} at {{$review->created_at->format("M d, Y")}}
				                			</div>
				                		</div>
			                			@endif
		                			@endforeach	                		
			                	</div>
		                	@else
                                <div class="alert alert-warning">
                                    Messages will be shown here
                                </div>
                            @endif
		                	<div class="chat-controls">
		                		<form method="POST" action="{{route('review.save', [$invoice->uuid])}}">
		                			@csrf
			                		<div class="chat-input">
			                			<textarea class="form-control" placeholder="Type your message here..." type="text" name="message" rows="3"></textarea> 
			                			<input type="hidden" name="invoice_id" value="{{$invoice->id}}">
			                		</div>
			                		<div class="chat-input-extra">
			                			<div class="chat-btn">
			                				<button class="btn btn-primary btn-sm" type="submit">Send</button>
			                			</div>
			                		</div>
		                		</form>
		                	</div>
		                </div>
		            </div>
		   
		     	</div>
	    </div>

    </div>
</div>
@endsection