@extends('layouts.backend.app')
@section('title', 'Documentation')
@section('content')
<div class="element-wrapper">
	<div class="element-box">
		<div class="steps-w">
			<div class="step-triggers">
				<a class="step-trigger active" href="#stepContent1">Step One</a>
				<a class="step-trigger" href="#stepContent2">Step Two</a>
				<a class="step-trigger" href="#stepContent3">Step Three</a>
			</div>
			<div class="step-contents">
				<div class="step-content active" id="stepContent1">
					<legend>Enter a Redirect URL (Optional)</legend>
					<div class="form-desc">
						This is the page we will take your shoppers to after they successfully pay for items on your store.
					</div>
					<div class="help-block form-text text-muted form-control-feedback">
						E.g: http://mystore.com/thankyou-page
					</div>
					<div class="form-group">
						<input class="form-control" placeholder="Redirect URL" type="text">
						<div class="help-block form-text text-muted form-control-feedback">
							Note: We will take your shoppers back to your website homepage if you don’t supply any url
						</div>
					</div>

					<div class="form-buttons-w text-right">
						<a class="btn btn-primary step-trigger-btn" href="#stepContent2"> Continue</a>
					</div>
				</div>
				<div class="step-content" id="stepContent2">
					<legend>Copy this code</legend>
					<div class="form-group">
						<textarea rows="1"></textarea>
					</div>
					<div class="form-desc">
						Paste the above code in the exact place you want the Pay with vesiCash button to appear on your checkout page.
					</div>
					<div class="help-block form-text text-muted form-control-feedback">
							Note: This code should be inside your body tag <\body><\/body>						
					</div>
					<div class="form-buttons-w text-right">
						<a class="btn btn-primary step-trigger-btn" href="#stepContent3"> Continue</a>
					</div>
				</div>
				<div class="step-content" id="stepContent3">
					<legend>Copy this code</legend>
					<div class="form-group">
						<textarea rows="3"></textarea>
					</div>
					<div class="form-desc">
						Paste the code you just copied after the <div id="vesi-pay"></div> you copied in step two.
					</div>
					<div class="form-buttons-w text-right">
						<button class="btn btn-primary">Submit Form</button>
					</div>
				</div>
		</div>
		</div>
	</div>
</div>
@endsection