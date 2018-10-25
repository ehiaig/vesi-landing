@extends('layouts.backend.app')
@section('title', 'Create Disputes')
@section('content')
<div class="content-i">
	<div class="content-box">
		<div class="row">
	        <div class="col-sm-12">
	            <div class="element-wrapper">
	            	<h4 class="element-header">Dispute - {{$dispute->type}}</h4>
	            	<p>Was there a problem with your transaction? Let's help you resolve it.</p>
	            	<div class="element-content">
	            		<div class="support-index">
	            			<div class="support-ticket-content">
	            				<div class="support-ticket-content-header">
	            					<h5 class="ticket-header">Status: {{$dispute->status}}</h5>
	            					<h5>Case Id: {{$dispute->dispute_no}}</h5>
	            				</div>
	            				@if(Auth::user() == $dispute->invoice->sender)
		            				<div class="ticket-thread">
		            					<div class="ticket-reply">
		            						<div class="ticket-reply-content">
		            							<p>
		            								Shopper A has escalated this dispute to a claim and has asked Vesicash to decide whether they're eligible for a refund. Please let us how you would like to respond to this claim at the end of 24 hours. 
		            							</p>
		            							<p>
		            								How would you like to respond to this claim?
		            							</p>
		            							<form method="POST" action="{{route('dispute.update', [$dispute->uuid])}}">
		                                        	@csrf
		                                            <div class="form-group row">
		                                            	<label class="col-sm-4 col-form-label">Select the dispute</label>
		                                            	<div class="col-sm-8">
		                                            		<div class="form-check">
		                                            			<label class="form-check-label">
		                                            				<input checked="" class="form-check-input" name="response" value="Request that recipient returns the item for a full refund." type="radio">Request that recipient returns the item for a full refund.
		                                            			</label>
		                                            		</div>
		                                            		<div class="form-check">
		                                            			<label class="form-check-label"><input class="form-check-input" name="response" value="Request that recipient returns the item for a full refund minus delivery fee." type="radio">Request that recipient returns the item for a full refund minus delivery fee. </label>
		                                            		</div>
		                                            		<div class="form-check">
		                                            			<label class="form-check-label"><input class="form-check-input" name="response" value="Provide other documents or information." type="radio">Provide other documents or information.</label>
		                                            		</div>
		                                            		<div class="form-check">
		                                            			<label class="form-check-label"><input class="form-check-input" name="response" value="Send a replacement item." type="radio">Send a replacement item</label>
		                                            		</div>
		                                            	</div>
		                                            </div>
		                                            <div style="text-align: center;">
		                                                <button class="mr-2 mb-2 btn btn-outline-success" type="submit" > Proceed </button>                           
		                                            </div>
		                                        </form>
		            						</div>
		            					</div>	            			
			            			</div>
			            		@endif
			            			<div class="element-wrapper">
						            <h6 class="element-header">Leave messages here</h6>
										<div class="full-chat-w">
											<div class="full-chat-i">
								                <div class="full-chat-middle">
								                	
								                 	@if(!$dispute->comments->isEmpty())
								                 		@if(Session::has('flash_message'))
								            				<div class="prompts error">
							                                  <div>{{ Session::get('flash_message') }}</div>
							                                </div>
								                 		@endif
									                	<div class="chat-content-w">
									                		@foreach($dispute->comments as $comment)
										                		@if($comment->sender == $dispute->invoice->recipient)
											                		<div class="chat-message">
										                				<div class="chat-message-content-w">
										                					<div class="chat-message-content">
										                						{{$comment->message}}
										                					</div>
										                				</div>
										                				<div class="chat-message-date">
											                				{{$comment->sender->fullname}} at {{$comment->created_at->format("M d, Y")}}
											                			</div>
											                		</div>
									                			@else
										                			<div class="chat-message self">
										                				<div class="chat-message-content-w">
										                					<div class="chat-message-content">
										                						{{$comment->message}}
										                					</div>
										                				</div>
										                				<div class="chat-message-date">
											                				{{$comment->sender->fullname}} at {{$comment->created_at->format("M d, Y")}}
											                			</div>
											                		</div>
									                			@endif
								                			@endforeach	                		
									                	</div>
								                	@else
						                                <div class="alert alert-warning">
						                                    Messages will be shown here
						                                </div>
						                            @endif
								                	<div class="chat-controls">
								                		<form method="POST" action="{{route('comment.save', [$dispute->uuid])}}">
								                			@csrf
									                		<div class="chat-input">
									                			<textarea class="form-control" placeholder="Type your message here..." type="text" name="message" rows="3"></textarea> 
									                			<input type="hidden" name="dispute_id" value="{{$dispute->id}}">
									                		</div>
									                		<div class="chat-input-extra">
									                			<div class="chat-btn">
									                				<button class="btn btn-primary btn-sm" type="submit">Send</button>
									                			</div>
									                		</div>
								                		</form>
								                	</div>
								                </div>
								            </div>
								   
								     	</div>
							    	</div>
			            		
		            		</div>
	            		</div>	            		
	            	</div>
            	</div>
            </div>
        </div>
    </div>
    <div class="content-panel">
        <div class="element-wrapper">
            <h6 class="element-header">Transaction Details</h6>            
            <p>
            	<strong>Amount:</strong> {{$dispute->invoice->amount}}
            </p>
            <p>
            	<strong>Description:</strong> {{$dispute->invoice->note}}
            </p>
            <p>
            	<strong>Status:</strong> {{$dispute->invoice->status}}
            </p>
            <p><strong>Order By:</strong> {{$dispute->invoice->recipient->fullname}}</p>
            
        </div>
    </div>
</div>
@endsection