<!DOCTYPE html>
<html>
<body style="background-color: #222533; padding: 20px; font-family: font-size: 14px; line-height: 1.43; font-family: &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif;">
	<div style="max-width: 600px; margin: 10px auto 20px; font-size: 12px; color: #A5A5A5; text-align: center;">If you are unable to see this message, 
		<a href="#" style="color: #A5A5A5; text-decoration: underline;">click here to view in browser</a>
	</div>
	<div style="max-width: 600px; margin: 0px auto; background-color: #fff; box-shadow: 0px 20px 50px rgba(0,0,0,0.05);">
		<table style="width: 100%;">
			<tr>
				<td style="background-color: #fff;">
					<img alt="" src="img/logo.png" style="width: 70px; padding: 20px">
				</td>
				<td style="padding-left: 50px; text-align: right; padding-right: 20px;">
					<a href="#" style="color: #261D1D; text-decoration: underline; font-size: 14px; letter-spacing: 1px;">Sign In</a>
					<a href="#" style="color: #7C2121; text-decoration: underline; font-size: 14px; margin-left: 20px; letter-spacing: 1px;">Forgot Password</a>
				</td>
			</tr>
		</table>
		<div style="padding: 60px 70px; border-top: 1px solid rgba(0,0,0,0.05);">
			<h1 style="margin-top: 0px;">Payment Successful.</h1>
			<div style="color: #636363; font-size: 14px; margin-bottom: 30px">
				<p>Hello {{$invoice->recipient->firstname}},</p>
				<p>
					You have pre-authorized a payment of {{$invoice->amount}} from your Vesicash account, for {{$invoice->note}} sent by {{$invoice->sender->firstname}} on {{$invoice->updated_at->format("M d, Y")}}.
				</p>
				<p>Your payment is protected until the Seller fulfills your order. When your order is fulfilled, you will receive a notification to confirm delivery or open a dispute. If you don’t  respond within 24 hours of receiving this notification, the payment will be automatically released to the Seller.
				</p>
				<p>Thanks for using Vesicash.</p>
			</div>
		</div>
		<div style="background-color: #F5F5F5; padding: 40px; text-align: center;">
					<!-- <div style="margin-bottom: 20px;"><a href="#" style="display: inline-block; margin: 0px 10px;"><img alt="" src="img/social-icons/twitter.png" style="width: 28px;"></a><a href="#" style="display: inline-block; margin: 0px 10px;"><img alt="" src="img/social-icons/facebook.png" style="width: 28px;"></a><a href="#" style="display: inline-block; margin: 0px 10px;"><img alt="" src="img/social-icons/linkedin.png" style="width: 28px;"></a><a href="#" style="display: inline-block; margin: 0px 10px;"><img alt="" src="img/social-icons/instagram.png" style="width: 28px;"></a>
					</div> -->
				<!-- <div style="margin-bottom: 20px;">
					<a href="#" style="text-decoration: underline; font-size: 14px; letter-spacing: 1px; margin: 0px 15px; color: #261D1D;">Contact Us</a>
					<a href="#" style="text-decoration: underline; font-size: 14px; letter-spacing: 1px; margin: 0px 15px; color: #261D1D;">Privacy Policy</a>
					<a href="#" style="text-decoration: underline; font-size: 14px; letter-spacing: 1px; margin: 0px 15px; color: #261D1D;">Unsubscribe</a>
				</div> -->
				<div style="color: #A5A5A5; font-size: 12px; margin-bottom: 20px; padding: 0px 50px;">
					You are receiving this email because you signed up for Vesicash Escrow Serivices
				</div>
				<div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid rgba(0,0,0,0.05);">
					<div style="color: #A5A5A5; font-size: 10px; margin-bottom: 5px;">19B Adeyemi Lawson Street, Ikoyi, Lagos.</div>
					<div style="color: #A5A5A5; font-size: 10px;">Copyright 2018 Vesicash Innovative Technologies. All rights reserved.</div>
				</div>
			</div>
		</div>
	</body>
</html>
				