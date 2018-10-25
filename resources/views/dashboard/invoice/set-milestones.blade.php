@extends('layouts.backend.app')
@section('title', 'Invoices')
@section('content')
<div class="content-i">
    <div class="content-box">
    	<div class="row">
            <div class="col-sm-12">
                <div class="element-wrapper">
                	<h4 class="element-header"> Add Milestones to your Invoice</h4>
					<div class="element-content">
						<div class="up-contents">
	                        
			                <!-- Invoice starts -->
			                <div class="invoice-w">
			                	<div class="invoice-heading">
		                			<h3>Invoice</h3>
		                			<div class="desc-label">Invoice No: invoice_no
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
											<a class="add-task-btn" data-target="#taskModal" data-toggle="modal" href="#">
												<i class="os-icon os-icon-ui-22"></i>
												<span>Add Milestones</span>
											</a>
										</div>
			            				@if(!$invoice->milestoneItems->isEmpty())
			            				<table class="table">
			            					@if(Session::has('flash_message'))
			            				<div class="prompts error">
	                                      <div>{{ Session::get('flash_message') }}</div>
	                                    </div>
	                                    @endif


			            					<thead>
			            						<tr>
			            							<th>Milestone</th>
			            							<th class="text-right">Price (NGN)</th>
			            							<th>Inspection Period</th>
			            						</tr>
			            					</thead>
			            					<tbody>
			            						@foreach ($invoice->milestoneItems as $milestoneItem)
			            						<tr>
			            							<td>{{$milestoneItem->name}}</td>
			            							<td class="text-right">{{$milestoneItem->price}}</td>
			            							<td class="text-right">{{$milestoneItem->inspection_period}}</td>
			            							<td>
										                <a class="danger" href="{{ route('milestoneitem.delete', $milestoneItem->id) }}"><i class="os-icon os-icon-ui-15"></i>Delete</a>
			            							</td>
			            						</tr>
			            						@endforeach
			            					</tbody>
			            					<tfoot>
				            						<tr>
				            							<td style="font-size: 14px;">Shipping cost</td>
				            							<td class="text-right" colspan="2">
				            								{{$invoice->milestoneItems->sum('shipping_cost') }}
				            							</td>
				            						</tr>
				            						<tr>
				            							<td>Total</td>
				            							<td class="text-right" colspan="2">
				            								{{$invoice->milestoneItems->sum('price') +$invoice->milestoneItems->sum('shipping_cost') }}
				            							</td>
				            						</tr>
				            					</tfoot>

			            					@else
		                                    <div class="alert alert-warning">
		                                        No Milestones have been set
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
			            			<!-- <div class="invoice-logo">
			            				<a class="btn btn-primary btn-sm" href="#">
			            					<i class="os-icon os-icon-edit"></i>
			            					<span>Edit Invoice</span>
			            				</a>
			            			</div> -->
			            			<div class="invoice-info">
			            				<!-- <a class="btn btn-grey btn-sm" href="#">
			            					<i class="os-icon os-icon-save"></i>
			            					<span>Save as Draft</span>
			            				</a> -->
			            				<span>
				            				<div class="actions-right">
				            					<a class="btn btn-success btn-sm" href="{{ route('send.escrow.milestone-invoice', $invoice->uuid) }}">
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
            <h6 class="element-header">Quick Links</h6>
            <div class="element-box-tp">
            	<div class="tasks-header-w">
					<a class="add-task-btn" data-target="#taskModal" data-toggle="modal" href="#">
						<i class="os-icon os-icon-ui-22"></i>
						<span>Add Milestones</span>
					</a>
				</div>

			<!--Modal - Add Item-->
			<div class="modal fade" id="taskModal" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header faded smaller">
							<button aria-label="Close" class="close" data-dismiss="modal" type="button">
								<span aria-hidden="true"> ×</span>
							</button>
						</div>
						<div class="modal-body">
							<form enctype='multipart/form-data' method="POST" action="{{ route('milestoneitem.save', [$invoice->uuid]) }}" >
								@csrf
								<!--This references the invoice id in the items table-->
								<input value="{{$invoice->id}}" name="invoice_id" type="hidden">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="">Milestone Name</label>
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
								<!-- <div class="row">
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
								</div> -->
								<div class="row">
									<div class="col-sm-4">
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
									<div class="col-sm-4">
										<div class="form-group">
											<label for=""> Inspection Days</label>
											<input class="form-control" min="1" max="30" name="inspection_period" type="number">
										</div>
									</div>
									<div class="col-sm-4">
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
			<!-- End of Modal Item-->
			
                <!-- <div class="el-buttons-list full-width">
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
                </div> -->
            </div>
        </div>
    </div>
</div>
@endsection