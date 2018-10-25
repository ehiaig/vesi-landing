@extends('layouts.backend.app')
@section('title', 'Invoices')
@section('content')
<div class="content-i">
    <div class="content-box">
    	<div class="row">
            <div class="col-sm-12">
                <div class="element-wrapper">
                	<h4 class="element-header"> Invoice Preview</h4>
					<div class="element-content">

						<div class="up-contents">
	                        <p>Here's a preview of the invoice you've just created. Click on the send button below to send it to your customer. </p>

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
		                			<!-- <div>Link 

		                				<a href="{{ route('invoice.lnk', $invoice->offline_ref_code) }}">{{ url('invoice/lnk/'.$invoice->offline_ref_code) }}</a>
		                				<input type="hidden" name="invoice_link" value="{{ url('invoice/lnk/'.$invoice->offline_ref_code) }}">
		                			</div> -->
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
			            				<table class="table">

			            					<thead>
			            						<tr>
			            							<th>Description</th>
			            							<th class="text-right">Amount (NGN)</th>
			            						</tr>
			            					</thead>
			            					<tbody>			            						
			            						<tr>
			            							<td>{{$invoice->note}}</td>
			            							<td>{{$invoice->amount}}</td>
			            						</tr>
			            						
			            					</tbody>
			            					<tfoot>
			            						<tr>
			            							<td>Total Amount</td>
			            							<td class="text-right" colspan="1">
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
			            				<span>
				            				<div class="actions-right">
				            					<a class="btn btn-success btn-sm" href="{{ route('send.escrow.basic-invoice', $invoice->uuid) }}">
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
        <div class="element-wrapper">
            <h6 class="element-header">Activities</h6>
            <!-- <div class="element-box-tp">		
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
            </div> -->
        </div>
    </div>
</div>
@endsection