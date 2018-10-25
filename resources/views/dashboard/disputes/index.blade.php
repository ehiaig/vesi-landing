@extends('layouts.backend.app')
@section('title', 'Invoices')
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
			<div class="support-index show-ticket-content">
				<div class="support-tickets">
					<div class="support-tickets-header">
						<div class="tickets-control">
							<h5>Disputes</h5>
							<!-- <div class="element-search">
								<input placeholder="Type to filter tickets..." type="text">
							</div> -->
						</div>
						<!-- <div class="tickets-filter">
							<div class="form-group mr-3">
								<label class="d-none d-md-inline-block mr-2">Status</label>
								<select class="form-control-sm">
									<option>Closed</option>
									<option>Open</option>
									<option>Pending</option>
								</select>
							</div>
							<div class="form-group mr-1">
								<label class="d-none d-md-inline-block mr-2">Agent</label>
								<select class="form-control-sm">
									<option>John Mayers</option>
									<option>Phil Collins</option>
									<option>Ray Donovan</option>
								</select>
							</div>
							<div class="form-check stick-right">
								<label class="form-check-label">
									<span>Private</span>
									<input type="checkbox">
								</label>
							</div>
						</div> -->
					</div>
					@if(!$disputes->isEmpty())
                 		@if(Session::has('flash_message'))
            				<div class="prompts error">
                              <div>{{ Session::get('flash_message') }}</div>
                            </div>
                 		@endif
						@foreach($disputes as $dispute)
						<div class="support-ticket">
							<div class="st-meta">
								<span class="label"> Status:</span>
								<div class="badge badge-primary-inverted">{{$dispute->status}}</div>
							</div>
							<hr>
							<div class="st-body">
								<div class="ticket-content">
									<h6 class="ticket-title">{{$dispute->type}}</h6>
									<div class="ticket-description"> <strong>Client's Response:</strong> {{$dispute->response}}</div>
								</div>
							</div>
							<div class="st-foot">
								@if(Auth::user() == $dispute->invoice->sender)
									<span class="label">Client:</span>
									<a class="value with-avatar">
										<span>{{$dispute->invoice->recipient->full_name}}</span>
									</a>
								@else
									<span class="label">Seller:</span>
									<a class="value with-avatar">
										<span>{{$dispute->invoice->sender->full_name}}</span>
									</a>
								@endif
								<span class="label">Updated:</span>
								<span class="value">{{$dispute->updated_at->format('M d, Y' )}}</span>
							</div>							
						</div>
						<div class="st-foot">
							<div class="row">
								@if(!$dispute->is_resolved)
									<a class="btn btn-secondary btn-sm" href="{{route('disputes.show.create', $dispute->uuid)}}">Add comment</a>
									@if(Auth::user() == $dispute->initiator)
										<form method="POST" action="{{route('dispute.resolve', [$dispute->uuid])}}">
											@csrf
				                			<input type="hidden" name="is_resolved" value="{{$dispute->is_resolved}}">
					                		<div class="chat-input-extra">
					                			<div class="chat-btn">
					                				<button class="btn btn-primary btn-sm" type="submit">Mark as Resolved</button>
					                			</div>
					                		</div>
				                		</form>
									@endif
								@endif
							</div>
						</div>
						@endforeach
						<!-- <div class="load-more-tickets">
							<a href="#"><span>Load More Disputes...</span></a>
						</div> -->
					@else
                        <div class="alert alert-warning">
                            You have no disputes to attend to.
                        </div>
                    @endif
				</div>
					<!-- <div class="support-ticket-content-w folded-info">
						<div class="support-ticket-content">
							<div class="support-ticket-content-header">
								<h3 class="ticket-header">School Orders</h3> -->
								<!-- <a class="back-to-index" href="#">
									<i class="os-icon os-icon-arrow-left5"></i>
									<span>Back</span>
								</a>
								<a class="show-ticket-info" href="#">
									<span>Show Details</span>
									<i class="os-icon os-icon-documents-03"></i>
								</a> -->
							<!-- </div>
							<div class="ticket-thread">
								<div class="ticket-reply">
									<div class="ticket-reply-info">
										<a class="author with-avatar" href="#">
											<img alt="" src="img/avatar1.jpg">
											<span>John Mayers</span>
										</a>
										<span class="info-data">
											<span class="label">replied on</span>
											<span class="value">May 27th, 2017 at 7:42am</span>
										</span> -->
										<!-- <div class="actions" href="#">
											<i class="os-icon os-icon-ui-46"></i>
											<div class="actions-list">
												<a href="#">
													<i class="os-icon os-icon-ui-49"></i>
													<span>Edit</span>
												</a>
												<a href="#">
													<i class="os-icon os-icon-ui-09"></i>
													<span>Mark Private</span>
												</a>
												<a href="#">
													<i class="os-icon os-icon-ui-03"></i>
													<span>Favorite</span>
												</a>
												<a class="danger" href="#">
													<i class="os-icon os-icon-ui-15"></i>
													<span>Delete</span>
												</a>
											</div>
										</div> -->
									<!-- </div>
									<div class="ticket-reply-content">
										<p>Hi. For the featured recipe banner feature, I'm able to enable it to show selected recipe and post on the feature recipe banner.</p><p>Is there any way the enable the feature banner to show recent recipe and post instead?</p><p>Thank you. </p>
									</div>
								</div>
								<div class="ticket-reply highlight">
									<div class="ticket-reply-info">
										<a class="author with-avatar" href="#">
											<img alt="" src="img/avatar3.jpg">
											<span>Phil Collins</span>
										</a>
										<span class="info-data">
											<span class="label">replied on</span>
											<span class="value">May 12th, 2017 at 11:23am</span>
										</span>
										<span class="badge badge-success">support agent</span>
									</div>
									<div class="ticket-reply-content">
										<p>Hi. For the featured recipe banner feature, I'm able to enable it to show selected recipe and post on the feature recipe banner.</p>
										<p>Is there any way the enable the feature banner to show recent recipe and post instead?</p><p>Thank you. </p>
									</div>
								</div>
							</div>
						</div>
						<div class="support-ticket-info">
							<a class="close-ticket-info" href="#">
								<i class="os-icon os-icon-ui-23"></i>
							</a>
							<div class="customer">
								<div class="avatar">
									<img alt="" src="img/avatar1.jpg">
								</div>
								<h4 class="customer-name">John Mayers</h4>
								<div class="customer-tickets">12 Tickets</div>
							</div>
							<h5 class="info-header">Ticket Details</h5>
							<div class="info-section text-center">
								<div class="label">Created:</div>
								<div class="value">Jan 24th, 8:15am</div>
								<div class="label">Category</div>
								<div class="value">
									<div class="badge badge-primary">Photobook</div>
								</div>
							</div>
							<h5 class="info-header">Agents Assigned</h5>
							<div class="info-section">
								<ul class="users-list as-tiles">
									<li>
										<a class="author with-avatar" href="#">
											<div class="avatar" style="background-image: url(%27img/avatar1.html)"></div>
											<span>John Mayers</span>
										</a>
									</li>
									<li>
										<a class="add-agent-btn" href="#"><i class="os-icon os-icon-ui-22"></i><span>Add Agent</span></a>
									</li>
								</ul>
							</div>
						</div> 
					</div>-->
				</div>
		</div>
	</div>
</div>
@endsection
