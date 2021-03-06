<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>{{ config('app.name', 'Link Vesicash') }}</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="" name="author">
    <meta content="Admin dashboard html template" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="favicon.png" rel="shortcut icon">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="{{ asset('backend/css/main.css?version=4.3.0')}}" rel="stylesheet">
</head>
<body class="full-screen with-content-panel">
	<div class="content-i">
	    <div class="content-box">
	    	<div class="row">
	    		<div class="col-sm-3"></div>
	            <div class="col-sm-6">
	                <div class="element-wrapper" >
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
																<button class="btn btn-link" data-dismiss="modal" type="button"> Cancel</button>
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
																<button class="btn btn-link" data-dismiss="modal" type="button"> Cancel</button>
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
																<button class="btn btn-link" data-dismiss="modal" type="button"> Cancel</button>
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

		<!--Modal - Preauthorize Payment-->
		<div class="modal fade" id="taskModal" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
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
						<div class="form-desc">When you pre-authorize your payment, Vesicash holds the money in an escrow until you confirm that the Supplier has delivered your service/item.</div>
						<div style="text-align: center;">
							<span>
								A total amount of NGN{{$invoice->amount}} will be deducted from your account.
							</span>
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
									<button class="btn btn-teal" type="submit"> Pre-authorize Payment</button>
									<button class="btn btn-link" data-dismiss="modal" type="button"> Cancel</button>
								</div>
							</form>
							<!--Payment form ends-->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End of Modal Item-->
	</div>
</body>
</html>