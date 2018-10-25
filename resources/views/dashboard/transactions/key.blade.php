@extends('layouts.backend.app')
@section('title', 'Invoices')
@section('content')
<div class="content-i">
	<div class="content-box">
		<div class="big-error-w">

		<h5>Payment Successful! Here's the secret key for the invoice</h5> 
		<div class="element-inner-desc">
			<span>Your client will ask for this key when he delivers your items/service.</span>
			<h5>{{$invoice->secret_key}}</h5>
			<span>
				Note: Once you give this key to your Merchant, you have 24hours to open a dispute for this transaction if you're not satisfied with the items/service.
			</span>
			<div class="element-box-tp" style="padding-top: 20px">
				<a href="{{route('transactions.show.index')}}">
					<i class="os-icon os-icon-arrow-left6"></i>
					View Transactions
				</a>
				<a href="{{route('invoice.show.index')}}" style="padding-left: 40px;">					
					Back to Invoices
					<i class="os-icon os-icon-arrow-right7"></i>
				</a>
			</div>
		</div>
		
	</div>

</div></div>
@endsection