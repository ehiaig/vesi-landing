@extends('layouts.backend.app')
@section('title', 'Invoices')
@section('content')
<div class="content-i">
    <div class="content-box">
    	<div class="row">
            <div class="col-sm-12">
                <div class="element-wrapper">
                	<h4 class="element-header"> Invoice</h4>
					<div class="element-content">

						<div class="up-contents">                        

			                <!-- Invoice starts -->
			                <div class="invoice-w">
			                	<div class="invoice-heading">
		                			<h3>Invoice</h3>
		                			<div class="desc-label">Invoice No: {{$invoice->invoice_no}}</div>
		                			<div class="invoice-date">Date: {{$invoice->updated_at->format("M d, Y")}}</div>
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
				            							<td>{{$invoiceItem->price}}</td>
				            						</tr>
				            						@endforeach
				            					</tbody>
				            					<tfoot>
				            						<tr>
				            							<td style="font-size: 13px;" class="text-right" colspan="2">Shipping Cost</td>
				            							<td style="font-size: 13px;" class="text-right">
				            								{{$invoice->invoiceItems->sum('shipping_cost') }}
				            							</td>
				            						</tr
				            						<tr style="font-size: 16px;">
				            							<td></td>
				            							<td>Total:</td>
				            							<td class="text-right" colspan="2">
				            								{{$invoice->amount}}
				            							</td>
				            						</tr>
				            					</tfoot>
				            				</table>
				            			</div>
				            		</div>
			            			<div class="invoice-footer">
			            				@if($invoice->is_accepted)
					            			<div class="invoice-logo">
					            				<span>
					            					<div class="pt-btn">
							                            <button class="btn btn-secondary btn-sm"  href="{{ route('reviews.show.create', $invoice->uuid) }}" disabled>Review Invoice</button>
							                         </div>
						            			</span>
					            			</div>
					            			<div class="invoice-info">
					            				<span>			            					
						            				<div class="actions-right">
						            					<button class="btn btn-success btn-sm" href="{{ route('send.escrow.invoice', $invoice->uuid) }}" data-target="#taskModal" data-toggle="modal" disabled>
					            						<i class="os-icon os-icon-mail-18"></i>
					            						<span>Accept Invoice</span>
					            					</button>
						            				</div>
						            			</span>
					            			</div>
				            			@else
					            			<div class="invoice-logo">
					            				<span>
					            					<div class="pt-btn">
							                            	<a class="btn btn-secondary btn-sm" href="{{ route('reviews.show.create', $invoice->uuid) }}">Review Invoice</a>
					            					</div>
						            			</span>
					            			</div>
					            			<div class="invoice-info">
					            				<span>			            					
						            				<div class="actions-right">
						            					<a class="btn btn-success btn-sm" href="{{ route('send.escrow.invoice', $invoice->uuid) }}" data-target="#taskModal" data-toggle="modal">
					            						<i class="os-icon os-icon-mail-18"></i>
					            						<span>Accept Invoice</span>
					            					</a>
						            				</div>
						            			</span>
					            			</div>
				            			@endif
				            		</div>
								@elseif($invoice->invoice_type == 'milestone')
									<div class="invoice-body">
										<div class="invoice-table">
				            				<table class="table">
				            					<thead>
				            						<tr>
				            							<th>Milestone Title</th>
				            							<th>Price (NGN)</th>
				            							<th>Inspection Period</th>
				            						</tr>
				            					</thead>
				            					<tbody>
				            						@foreach ($invoice->milestoneItems as $milestoneItem)
				            						<tr>
				            							<td>{{$milestoneItem->name}}</td>
				            							<td>{{$milestoneItem->price}}</td>
				            							<td>{{$milestoneItem->inspection_period}}</td>
				            						</tr>
				            						@endforeach
				            					</tbody>
				            					<tfoot>
				            						<tr>
				            							<td style="font-size: 13px;" class="text-right" colspan="2">Shipping Cost</td>
				            							<td style="font-size: 13px;" class="text-right">
				            								{{$invoice->milestoneItems->sum('shipping_cost') }}
				            							</td>
				            						</tr
				            						<tr style="font-size: 16px;">
				            							<td></td>
				            							<td>Total:</td>
				            							<td class="text-right" colspan="2">
				            								{{$invoice->amount}}
				            							</td>
				            						</tr>
				            					</tfoot>
				            				</table>
				            				<!-- <div class="terms">
				            					<div class="terms-header">Terms and Conditions</div>
				            					<div class="terms-content">Should be paid as soon as received, otherwise a 5% penalty fee is applied</div>
				            				</div> -->
				            			</div>
				            		</div>
			            			<div class="invoice-footer">
				            			<div class="invoice-logo">
				            				<span>
				            					<div class="pt-btn">
				            						<a class="btn btn-secondary btn-sm" href="{{ route('reviews.show.create', $invoice->uuid) }}">
				            							<span>Review Invoice</span>
				            						</a>
				            					</div>
					            			</span>
				            			</div>
				            			<div class="invoice-info">
				            				<span>			            					
					            				<div class="actions-right">
					            					<form method="POST" action="{{ route('recipient.accept', $invoice->uuid) }}" id="form-{{$invoice->uuid}}" class='ajax'>
                                                        @csrf
                                                        <input type="hidden" name="recipient_id" value="{{$invoice->recipient_id}}">
                                                        <input type="hidden" name="is_accepted" value="{{$invoice->is_accepted}}">
                                                        <button class="mr-2 mb-2 btn btn-success" type="submit" class="accept" {!! $invoice->is_accepted ? 'disabled="disabled"' : '' !!}>Accept Invoice</button>
                                                    </form>
					            				</div>
					            			</span>
				            			</div>
				            		</div>
								@else
									<div class="invoice-body">   
				            			<div class="invoice-table">
				            				<table class="table">
				            					<thead>
				            						<tr>
				            							<th>Description</th>
				            							<th>Amount (NGN)</th>
				            						</tr>
				            					</thead>
				            					<tbody>
				            						<tr>
				            							<td>{{$invoice->note}}</td>
				            							<td>{{$invoice->amount}}</td>
				            						</tr>
				            					</tbody>
				            					<tfoot>
				            						<tr style="font-size: 16px;">
				            							<td></td>
				            							<td>Total:</td>
				            							<td class="text-right" colspan="2">
				            								{{$invoice->amount}}
				            							</td>
				            						</tr>
				            					</tfoot>
				            				</table>
				            			</div>
			            			</div>
			            			<div class="invoice-footer">
			            				@if($invoice->is_accepted)
					            			<div class="invoice-logo">
					            				<span>
					            					<div class="pt-btn">
							                            <button class="btn btn-secondary btn-sm"  href="{{ route('reviews.show.create', $invoice->uuid) }}" disabled>Review Invoice</button>
							                         </div>
						            			</span>
					            			</div>
					            			<div class="invoice-info">
					            				<span>			            					
						            				<div class="actions-right">
						            					<button class="btn btn-success btn-sm" href="{{ route('send.escrow.invoice', $invoice->uuid) }}" data-target="#taskModal" data-toggle="modal" disabled>
					            						<i class="os-icon os-icon-mail-18"></i>
					            						<span>Accept Invoice</span>
					            					</button>
						            				</div>
						            			</span>
					            			</div>
				            			@else
					            			<div class="invoice-logo">
					            				<span>
					            					<div class="pt-btn">
							                            	<a class="btn btn-secondary btn-sm" href="{{ route('reviews.show.create', $invoice->uuid) }}">Review Invoice</a>
					            					</div>
						            			</span>
					            			</div>
					            			<div class="invoice-info">
					            				<span>			            					
						            				<div class="actions-right">
						            					<a class="btn btn-success btn-sm" href="{{ route('send.escrow.invoice', $invoice->uuid) }}" data-target="#taskModal" data-toggle="modal">
					            						<i class="os-icon os-icon-mail-18"></i>
					            						<span>Accept Invoice</span>
					            					</a>
						            				</div>
						            			</span>
					            			</div>
				            			@endif
				            		</div>
		            			@endif
			            	</div>					
			                <!-- invoice ends-->
			            </div>
					</div>
				</div>
			</div>
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

	<div class="content-panel">
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
    </div>
</div>
@endsection
@section('scripts')
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