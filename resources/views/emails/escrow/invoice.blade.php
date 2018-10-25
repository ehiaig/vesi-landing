<!DOCTYPE html>
<html>
<body style="background-color: #222533; padding: 20px; font-family: font-size: 14px; line-height: 1.43; font-family: &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif;">
	

<div style="max-width: 600px; margin: 10px auto 20px; font-size: 12px; color: #A5A5A5; text-align: center;">
	If you are unable to see this message, 
	<a href="#" style="color: #A5A5A5; text-decoration: underline;">click here to view in browser</a>
</div>
<div style="max-width: 600px; margin: 0px auto; background-color: #fff; box-shadow: 0px 20px 50px rgba(0,0,0,0.05);">
	<!-- <img alt="" src="img/email-header-img.jpg" style="max-width: 100%; height: auto;"> -->
	<div style="padding: 60px 70px;">
		@if($invoice->invoice_type == 'one-off')
			<div style="color: #636363; font-size: 14px;">
				<p>Hi {{$invoice->recipient->firstname}},</p>
				<p>You just received an invoice from {{$invoice->sender->firstname}}. Kindly go through the Invoice breakdown below.
			</div>
			<table style="margin-top: 30px; width: 100%;">
				<tr>
					<td style="padding-right: 30px;">
						<div style="text-transform: uppercase; font-size: 11px; letter-spacing: 1px; font-weight: bold; color: #B8B8B8; margin-bottom: 5px;">Invoice {{$invoice->invoice_no}}</div>					
					</td>
					<td style="max-width: 150px;">
						<div style="font-size: 12px; color: #111; font-weight: bold; margin-bottom: 20px;">{{$invoice->updated_at->format("M d, Y")}}</div>
					</td>
				</tr>
			</table>
			<table style="margin-top: 40px; width: 100%;">
				<tr>
					<td style="text-transform: uppercase; letter-spacing: 1px; color: #B8B8B8; font-size: 10px; font-weight: bold;">
						Item
					</td>
					<td style="text-transform: uppercase; letter-spacing: 1px; color: #B8B8B8; font-size: 10px; font-weight: bold; text-align: right;">Amount</td>
				</tr>
				@foreach($invoice->invoiceItems as $invoiceItem)
				<tr>
					<td style="padding: 15px 0px;border-bottom: 1px solid rgba(0,0,0,0.05);">
						<div style="color: #111; font-size: 14px; font-weight: bold;">
							{{$invoiceItem->name}}
							
						</div>
						<div style="color: #B8B8B8; font-size: 12px;">{{$invoiceItem->description}}</div>
					</td>
					<td style="padding: 15px 0px; text-align: right;  font-size: 14px; font-weight: bold; color: #111; border-bottom: 1px solid rgba(0,0,0,0.05);">
						{{$invoiceItem->price}}
					</td>
				</tr>
				@endforeach
				<table style="margin-left: auto; margin-top: 0px; border-top: 3px solid #eee; padding-top: 10px; margin-bottom: 20px;">
					<!-- <tr>
						<td style="color: #B8B8B8; font-size: 12px; padding: 5px 0px;">
							Subtotal:
						</td>
						<td style="color: #111; text-align: right; font-weight: bold; padding: 5px 0px 5px 40px; font-size: 12px;">
							$145.98
						</td>
					</tr> -->
					<tr>
						<td style="color: #B8B8B8; font-size: 12px; padding: 5px 0px;">
							Shipping
						</td>
						<td style="color: #111; text-align: right; font-weight: bold; padding: 5px 0px 5px 40px; font-size: 12px;">
							{{$invoice->invoiceItems->sum('shipping_cost')}}
						</td>
					</tr>
					<tr>
						<td style="color: #111; letter-spacing: 1px; font-size: 20px; padding: 10px 0px; text-transform: uppercase; font-weight: bold;">
							Total
						</td>
						<td style="color: #4B72FA; text-align: right; font-weight: bold; padding: 10px 0px 5px 40px; font-size: 20px;">
							{{$invoice->amount}}
						</td>
					</tr>
				</table>
			</table>
			<div style="color: #636363; font-size: 14px;">
				<p><strong>Note: </strong>Your payment will not be released to {{$invoice->sender->firstname}} until you confirm you have received the item/service you paid for.
			</div>
		@elseif($invoice->invoice_type == 'milestone')
			<div style="color: #636363; font-size: 14px;">
				<p>Hi {{$invoice->recipient->firstname}},</p>
				<p>{{$invoice->sender->firstname}} just sent you an invoice with specific milestones and payment attached to the milestones.
			</div>
			<table style="margin-top: 30px; width: 100%;">
				<tr>
					<td style="padding-right: 30px;">
						<div style="text-transform: uppercase; font-size: 11px; letter-spacing: 1px; font-weight: bold; color: #B8B8B8; margin-bottom: 5px;">Invoice {{$invoice->invoice_no}}</div>					
					</td>
					<td style="max-width: 150px;">
						<div style="font-size: 12px; color: #111; font-weight: bold; margin-bottom: 20px;">{{$invoice->updated_at->format("M d, Y")}}</div>
					</td>
				</tr>
			</table>
			<table style="margin-top: 40px; width: 100%;">
				<tr>
					<td style="text-transform: uppercase; letter-spacing: 1px; color: #B8B8B8; font-size: 10px; font-weight: bold;">
						Milestone
					</td>
					<td style="text-transform: uppercase; letter-spacing: 1px; color: #B8B8B8; font-size: 10px; font-weight: bold; text-align: right;">Inspection Period</td>
					<td style="text-transform: uppercase; letter-spacing: 1px; color: #B8B8B8; font-size: 10px; font-weight: bold; text-align: right;">Amount</td>
				</tr>
				@foreach($invoice->milestoneItems as $milestoneItem)
					<tr>
						<td style="padding: 15px 0px;border-bottom: 1px solid rgba(0,0,0,0.05);">
							<div style="color: #111; font-size: 14px; font-weight: bold;">
								{{$milestoneItem->name}}
							</div>
							<div style="color: #B8B8B8; font-size: 12px;">{{$milestoneItem->inspection_period}}</div>
						</td>
						<td style="padding: 15px 0px; text-align: right;  font-size: 14px; font-weight: bold; color: #111; border-bottom: 1px solid rgba(0,0,0,0.05);">
							{{$milestoneItem->price}}
						</td>
					</tr>
				@endforeach
				<table style="margin-left: auto; margin-top: 0px; border-top: 3px solid #eee; padding-top: 10px; margin-bottom: 20px;">
					<tr>
						<td style="color: #B8B8B8; font-size: 12px; padding: 5px 0px;">
							Shipping
						</td>
						<td style="color: #111; text-align: right; font-weight: bold; padding: 5px 0px 5px 40px; font-size: 12px;">
							{{$invoice->milestoneItems->sum('shipping_cost')}}
						</td>
					</tr>
					<tr>
						<td style="color: #111; letter-spacing: 1px; font-size: 20px; padding: 10px 0px; text-transform: uppercase; font-weight: bold;">
							Total
						</td>
						<td style="color: #4B72FA; text-align: right; font-weight: bold; padding: 10px 0px 5px 40px; font-size: 20px;">
							{{$invoice->amount}}
						</td>
					</tr>
				</table>
			</table>
			<div style="color: #636363; font-size: 14px;">
				<p><strong>Note: </strong>Kindly go through the Invoice and accepts so that {{$invoice->sender->firstname}} can make payment.
			</div>
		@else
		<table style="margin-top: 40px; width: 100%;">
			<tr>
				<td style="text-transform: uppercase; letter-spacing: 1px; color: #B8B8B8; font-size: 10px; font-weight: bold;">
					Description
				</td>
				<td style="text-transform: uppercase; letter-spacing: 1px; color: #B8B8B8; font-size: 10px; font-weight: bold; text-align: right;">Amount</td>
			</tr>
			<tr>
				<td style="padding: 15px 0px;border-bottom: 1px solid rgba(0,0,0,0.05);">
					<div style="color: #111; font-size: 14px; font-weight: bold;">
						{{$invoice->note}}
						
					</div>
				</td>
				<td style="padding: 15px 0px; text-align: right;  font-size: 14px; font-weight: bold; color: #111; border-bottom: 1px solid rgba(0,0,0,0.05);">
					{{$invoice->amount}}
				</td>
			</tr>
		</table>
		@endif					
		<div style="color: #636363; font-size: 14px; padding-top: 20px; text-align: center; margin-bottom: 20px;">
				<a href="{{ route('invoice.open', $invoice->uuid) }}" style="padding: 5px 15px; background-color: #4B72FA; color: #fff; font-weight: bolder; font-size: 14px; display: inline-block; margin: 0px 15px; text-decoration: none;">
					View Invoice
				</a>
		</div>
		<div style="color: #A5A5A5; font-size: 12px; margin-bottom: 20px; padding: 0px 50px;">
				For questions and requests, contact us at <a href="mailto:support@vesicash.com">support@vesicash.com</a>
			</div>	
		<div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid rgba(0,0,0,0.05);">
				<div style="color: #A5A5A5; font-size: 10px; margin-bottom: 5px;">19B Adeyemi Lawson Street, Ikoyi, Lagos.</div>
				<div style="color: #A5A5A5; font-size: 10px;">Copyright 2018 Vesicash Innovative Technologies. All rights reserved.</div>
		</div>
	</div>
</div>
</body>
</html>