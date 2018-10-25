@extends('layouts.backend.app')
@section('title', 'Invoices')
@section('content')
<div class="content-i">
	<div class="content-box">
		<div class="big-error-w">

		<h5>Edit Invoice</h5> 
		<div class="element-inner-desc">
			<form enctype='multipart/form-data' method="POST" action="{{ route('invoice.show.edit-basic', [$invoice->uuid]) }}">
				@csrf
				<div class="form-group row">
                    <label class="col-sm-4 col-form-label" for=""> First Name</label>
                    <div class="col-sm-6">
                        <input class="form-control" placeholder="First Name" type="text" name="firstname" value="{{ $invoice->recipient->firstname }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for=""> Last Name</label>
                    <div class="col-sm-6">
                        <input class="form-control" placeholder="Last Name" type="text" name="lastname" value="{{ $invoice->recipient->lastname }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for=""> Email</label>
                    <div class="col-sm-6">
                        <input class="form-control" placeholder="Email" type="text" name="recipient_email" value="{{ $invoice->recipient->email }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for=""> Phone</label>
                    <div class="col-sm-6">
                        <input class="form-control" placeholder="Phone" type="text" name="phone" value="{{ $invoice->recipient->phone }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="">Amount</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">NGN</div>
                            </div>
                            <input class="form-control" placeholder="Amount" type="number" name="amount" value="{{ $invoice->amount }}">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Description</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" rows="3" name="note">
                        	{{ $invoice->note }}
                        </textarea>
                    </div>
                </div>
                <div class="form-buttons-w">
                	<button class="btn btn-primary" type="submit"> Save & Continue</button>
                </div>
			</form>
		</div>		
	</div>
</div></div>
@endsection