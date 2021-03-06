@extends('layouts.backend.app')
@section('title', 'Invoices')
@section('content')
<div class="content-i">
    <div class="content-box">
    	<div class="row">
            <div class="col-sm-12">
                <div class="element-wrapper">
                	<h4 class="element-header"> Add Items to your Invoice</h4>
					<div class="element-content">
						<div class="up-contents">	                        
			                <!-- Invoice starts -->
			                <div class="invoice-w">
			                	<div class="invoice-heading">
		                			<h3>Invoice</h3>
		                			<div class="desc-label">Invoice No: {{$invoice->invoice_no}}
		                				<!-- <div class="col-sm-6">
											<div class="form-group">
												<input class="form-control" name="invoice_no" placeholder="Enter invoice number" type="text">
											</div>
										</div> -->
		                			</div>
		                			<div class="invoice-date">Date: {{$invoice->updated_at->format("M d, Y")}}</div>
		                		</div>
			            		<div class="infos">
			            			<div class="message-head">
			            				<div class="user-w with-status status-green">
			            					<div class="user-name">
			            						<h6 class="user-title">From:</h6>
			            						<div class="user-role">{{Auth::user()->full_name}}
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
			            			<div class="invoice-body">
				            			<div class="invoice-table">
				            				<div class="tasks-header-w" style="text-align: center;">
												<a class="add-task-btn" data-target="#oneoffModal" data-toggle="modal" href="#">
													<i class="os-icon os-icon-ui-22"></i>
													<span>Add Item</span>
												</a>
											</div>
				            				@if(!$invoice->invoiceItems->isEmpty())
				            				<table class="table">
				            					@if(Session::has('flash_message'))
				            				<div class="prompts error">
		                                      <div>{{ Session::get('flash_message') }}</div>
		                                    </div>
		                                    @endif


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
				            							<td>
											                <a class="danger" href="{{ route('item.delete', $invoiceItem->id) }}"><i class="os-icon os-icon-ui-15"></i>Delete</a>
				            							</td>
				            						</tr>
				            						@endforeach
				            					</tbody>
				            					<tfoot>
				            						<tr>
				            							<td style="font-size: 14px;">Shipping cost</td>
				            							<td class="text-right" colspan="2">
				            								{{$invoice->invoiceItems->sum('shipping_cost') }}
				            							</td>
				            						</tr>
				            						<tr>
				            							<td>Total</td>
				            							<td class="text-right" colspan="2">
				            								{{$invoice->invoiceItems->sum('price') +$invoice->invoiceItems->sum('shipping_cost') }}
				            							</td>
				            						</tr>
				            					</tfoot>
				            					@else
			                                    <div class="alert alert-warning">
			                                        No Item has been added to this invoice
			                                    </div>
			                                @endif
				            				</table>
				            				 
				            				<!-- <div class="terms">
				            					<div class="terms-header">Terms and Conditions</div>
				            					<div class="terms-content">Should be paid as soon as received, otherwise a 5% penalty fee is applied</div>
				            				</div> -->
				            			</div>
				            		</div>
				            		<div class="invoice-footer">
				            			<div class="invoice-logo">
				            				<!-- <a class="btn btn-primary btn-sm" href="#">
				            					<i class="os-icon os-icon-edit"></i>
				            					<span>Edit Invoice</span>
				            				</a> -->
				            			</div>
				            			<div class="invoice-info">
				            				<!-- <a class="btn btn-grey btn-sm" href="#">
				            					<i class="os-icon os-icon-save"></i>
				            					<span>Save as Draft</span>
				            				</a> -->
				            			<!-- <div class="invoice-logo">
				            				<img alt="" src="img/logo.png">
				            				<span>Paper Inc</span>
				            			</div>
				            			<div class="invoice-info">
				            				<span>hello@paper.inc</span> -->
				            				<span>
					            				<div class="actions-right">
					            					<a class="btn btn-success btn-sm" href="{{ route('send.escrow.invoice', $invoice->uuid) }}">
					            						<i class="os-icon os-icon-mail-18"></i>
					            						<span>Send Invoice</span>
					            					</a>
					            				</div>
					            			</span>
				            			</div>
				            		</div>
		            			
			            		
			            	</div>					
			                <!-- invoice ends-->
			            </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="content-panel">
        <div class="content-panel-close">
            <i class="os-icon os-icon-close"></i>
        </div>
        <div class="element-wrapper">
            <!-- <h6 class="element-header">Activities</h6> -->
            <div class="element-box-tp">

			<!--Modal - One-off Items-->
			<div class="modal fade" id="oneoffModal" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header faded smaller">
							<div class="modal-title">
								<span>Assigned to:</span> 
								{{$invoice->recipient->full_name}}
								<!-- <img alt="" class="avatar" src="img/avatar1.jpg">
								<span>Due Date: </span>
								<strong>Sep 12th, 2017</strong> -->
							</div>
							<button aria-label="Close" class="close" data-dismiss="modal" type="button">
								<span aria-hidden="true"> ×</span>
							</button>
						</div>
						<div class="modal-body">
							<form enctype='multipart/form-data' method="POST" action="{{ route('item.save', [$invoice->uuid]) }}" >
								@csrf
								<!--This references the invoice id in the items table-->
								<input value="{{$invoice->id}}" name="invoice_id" type="hidden">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="">Name</label>
										<input class="form-control" placeholder="Item name" name="name" type="text">
									</div>
								</div>
								<div class="col-sm-6">
								<div class="form-group">
									<label for="">Description</label>
									<textarea class="form-control" name="description" rows="3"></textarea>
								</div>
								</div>
							</div>
								<!-- <div class="form-group">
									<label for="">Media Attached</label>
									<div class="attached-media-w">
										<a class="attach-media-btn" href="#">
											<i class="os-icon os-icon-ui-22"></i>
											<span>Add Photos</span>
										</a>
									</div>
								</div> -->
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label for=""> Price</label>
											<div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">NGN</div>
                                                </div>
                                                <input class="form-control" placeholder="Price" type="number" name="price">
                                            </div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label for="">Quantity</label>
											<input class="form-control" min="1" name="quantity" type="number">
										</div>
									</div>
								</div>
								<div class="row">
									<!-- <div class="col-sm-6">
										<div class="form-group">
											<label for=""> Tax</label>
											<input class="form-control" min="0" max="100" name="tax" type="number">
										</div>
									</div> -->
									<div class="col-sm-6">
										<div class="form-group">
											<label for="">Shipping Cost</label>
											<input class="form-control" name="shipping_cost" type="number">
										</div>
									</div>
								</div>

								<div class="modal-footer buttons-on-left">
									<button class="btn btn-teal" type="submit"> Save changes</button>
									<button class="btn btn-link" data-dismiss="modal" type="button"> Cancel</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- End of Modal One-off Item-->
			
               <!--  <div class="el-buttons-list full-width">
                    <a class="btn btn-white btn-sm" href="#">
                        <i class="os-icon os-icon-delivery-box-2"></i>
                        <span>Disputes</span>
                    </a>
                    <a class="btn btn-white btn-sm" href="#">
                        <i class="os-icon os-icon-window-content"></i>
                        <span>Reviews</span>
                    </a>
                    <a class="btn btn-white btn-sm" href="#">
                        <i class="os-icon os-icon-wallet-loaded"></i>
                        <span> Settings</span>
                    </a>
                </div> -->
            </div>
        </div>
    </div>
</div>
@endsection