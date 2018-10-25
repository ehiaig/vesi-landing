@extends('layouts.backend.app')
@section('title', 'Business Dashboard')
@section('content')
<div class="content-w">
	<div class="content-i">
		<div class="content-box">
			<div class="row">
                <div class="col-sm-12">
                    <div class="element-wrapper">
                        <h6 class="element-header">Recent Milestones</h6>
                        <div class="element-box">
                            <div class="os-tabs-w">
                                <div class="os-tabs-controls">
                                    <ul class="nav nav-tabs smaller">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#tab_overview">PENDING</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tab_sales">COMPLETED</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_overview">
                                    	<div class="os-tabs-w">
			                                <div class="os-tabs-controls">
			                                    <ul class="nav nav-tabs smaller">
			                                        <li class="nav-item">
			                                            <a class="nav-link active" data-toggle="tab" href="#tab_created">Milestones I Created</a>
			                                        </li>
			                                        <li class="nav-item">
			                                            <a class="nav-link" data-toggle="tab" href="#tab_received">Milestones Sent to Me</a>
			                                        </li>
			                                    </ul>
			                                </div>
			                                <div class="tab-content">
			                                	<div class="tab-pane active" id="tab_created">
			                                		<div class="element-box">
					                                    <div class="pipeline-body">
					                                        <div class="row">       
					                                            @foreach ($sentinvoices as $invoice)
					                                                <div class="pipeline-item">
					                                                    <div class="pi-controls">
					                                                        <span>To: &lt; {{$invoice->recipient->email}} &gt;</span>
					                                                        <div class="badge badge-success-inverted">{{$invoice->status}}</div>
					                                                        
					                                                    </div>
					                                                    <div class="pi-body">
					                                                        <div class="pi-info">
					                                                            <div class="h6 pi-name">{{$invoice->id}}</div>
					                                                            <div class="pi-sub">{{$invoice->note}}</div>

					                                                            <table class="table table-lightborder">
					                                                                <thead>              
					                                                                    <tr>
					                                                                     	<th>Date</th>
					                                                                        <th>Milestone</th>
																							<th>Milestone  Status</th>
																							<th>Amount (NGN)</th>
																							<th>Inspection Period</th>
					                                                                    </tr>
					                                                                </thead>
					                                                                <tbody>
					                                                                    @foreach ($invoice->milestoneItems as $milestone)
					                                                                    <tr>
					                                                                    	<td>
																								<span>{{$milestone->updated_at->format("M d, Y")}}</span>
																							</td>
					                                                                        <td> {{$milestone->name}}</td>
					                                                                        <td>
					                                                                            {{$milestone->milestone_status}}
					                                                                        </td>
					                                                                        <td>
					                                                                            {{$milestone->price}}
					                                                                        </td>
					                                                                        <td>
					                                                                            {{$milestone->inspection_period}}
					                                                                        </td>
					                                                                        <td class="text-center">
																							<form method="POST" action="{{ route('senderms.confirm', $milestone->id) }}" id="form-{{$milestone->id}}" class='ajax'>
																								@csrf
																								<input type="hidden" name="recipient_id" value="{{$invoice->sender->id}}">
																								<input type="hidden" name="sender_confirmed" value="{{$milestone->sender_confirmed}}">
																							<button class="btn btn-success btn-sm" type="submit" class="confirm" {!! $milestone->sender_confirmed ? 'disabled="disabled"' : '' !!}

																								>Confirm</button>
																							</form>
																						</td>
																						<td class="text-center">
																							<a class="btn btn-secondary btn-sm" href="#">Open Dispute</a>
																						</td>     
					                                                                    </tr>
					                                                                    @endforeach
					                                                                </tbody>           
					                                                            </table> 
					                                                            <div class="h6 pi-name text-right">Total: {{$invoice->amount}}</div>
					                                                        </div>
					                                                    </div>
					                                                    <div class="pi-foot">
					                                                        <!-- <div class="tags">
					                                                            
					                                                            <a class="tag" href="#">Sales</a>
					                                                        </div> -->
					                                                        <!-- <a class="btn btn-sm btn-primary btn-right" href="#" data-target="#taskModal" data-toggle="modal">Pay</a> -->
					                                                    </div>
					                                                </div>
					                                            @endforeach
					                                        </div>
					                                    </div>
					                                </div>
			                                	</div>
			                                	<div class="tab-pane" id="tab_received">
			                                		<div class="element-box">
					                                    <div class="pipeline-body">            
					                                        <div class="row">
					                                            @foreach ($receivedinvoices as $invoice)
					                                                <div class="pipeline-item">
					                                                    <div class="pi-controls">
					                                                        <span>From: &lt; {{$invoice->sender->email}} &gt;</span>
					                                                        <div class="badge badge-success-inverted">{{$invoice->status}}</div>
					                                                        
					                                                    </div>
					                                                    <div class="pi-body">
					                                                        <div class="pi-info">
					                                                            <div class="h6 pi-name">{{$invoice->id}}</div>
					                                                            <div class="pi-sub">{{$invoice->note}}</div>

					                                                            <table class="table table-lightborder">
					                                                                <thead>              
					                                                                    <tr>
					                                                                     	<th>Date</th>
					                                                                        <th>Milestone</th>
																							<th>Milestone  Status</th>
																							<th>Amount (NGN)</th>
																							<th>Inspection Period</th>
					                                                                    </tr>
					                                                                </thead>
					                                                                <tbody>
					                                                                    @foreach ($invoice->milestoneItems as $milestone)
					                                                                    <tr>
					                                                                    	<td>
																								<span>{{$milestone->updated_at->format("M d, Y")}}</span>
																							</td>
					                                                                        <td> {{$milestone->name}}</td>
					                                                                        <td>
					                                                                            {{$milestone->milestone_status}}
					                                                                        </td>
					                                                                        <td>
					                                                                            {{$milestone->price}}
					                                                                        </td>
					                                                                        <td>
					                                                                            {{$milestone->inspection_period}}
					                                                                        </td>
					                                                                        <td class="text-center">
																							<form method="POST" action="{{ route('recipientms.confirm', $milestone->id) }}" id="form-{{$milestone->id}}" class='ajax'>
																								@csrf
																								<input type="hidden" name="recipient_id" value="{{$invoice->recipient->id}}">
																								<input type="hidden" name="recipient_confirmed" value="{{$milestone->recipient_confirmed}}">
																							<button class="btn btn-success btn-sm" type="submit" class="confirm" {!! $milestone->recipient_confirmed ? 'disabled="disabled"' : '' !!}

																								>Confirm</button>
																							</form>
																						</td>
																						<td class="text-center">
																							<a class="btn btn-secondary btn-sm" href="#">Open Dispute</a>
																						</td>     
					                                                                    </tr>
					                                                                    @endforeach
					                                                                </tbody>           
					                                                            </table> 
					                                                            <div class="h6 pi-name text-right">Total: {{$invoice->amount}}</div>
					                                                        </div>
					                                                    </div>
					                                                    <div class="pi-foot">
					                                                        <!-- <div class="tags">
					                                                            
					                                                            <a class="tag" href="#">Sales</a>
					                                                        </div> -->
					                                                        <!-- <a class="btn btn-sm btn-primary btn-right" href="#" data-target="#taskModal" data-toggle="modal">Pay</a> -->
					                                                    </div>
					                                                </div>
					                                            @endforeach
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
            </div>	
		</div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>

    $(".ajax").submit(function(event) { //listening on class name and for submit action
        event.preventDefault();
        var $confirmButton = $(this).find('.confirm'); // the confirm button of this form
       $confirmButton.prop('disabled', true);
        $.ajax({
            type: "post",
            url: $(this).attr('senderms.confirm'), //send to the correct url based on the markup
            dataType: "json",
            data: $(this).serialize(), //this refers to the submitted form
            success: function(data){
                  alert("Data Saved");
            },
            error: function(data){
                 $confirmButton.prop('disabled', false);
                 alert("Error")
            }
        });
    });
</script>
@endsection