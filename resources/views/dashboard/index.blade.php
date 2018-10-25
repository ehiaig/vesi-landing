@extends('layouts.backend.app')
@section('title', 'Personal Dashboard')
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper compact pt-4">
                <!-- <div class="element-actions">
                    <a class="btn btn-primary btn-sm" href="#">
                        <i class="os-icon os-icon-ui-22"></i>
                        <span>Add Account</span>
                    </a>
                    <a class="btn btn-success btn-sm" href="#">
                        <i class="os-icon os-icon-grid-10"></i>
                        <span>Make Payment</span>
                    </a>
                </div> -->
                <h6 class="element-header">Financial Overview</h6>
                <div class="element-box-tp">
                	<div class="row">
                		<div class="col-lg-7 col-xxl-6">
                			<!--START - BALANCES-->
                			<div class="element-balances">
                				<div class="balance">
                					<div class="balance-title">Wallet Balance</div>
                					<div class="balance-value">
                						<span>NGN {{ Auth::user()->account_balance }}</span>
                					</div>
                					<div class="balance-link">
                						<!-- <a class="btn btn-link btn-underlined" href="#">
                							<span>View Statement</span>
                							<i class="os-icon os-icon-arrow-right4"></i>
                						</a> -->
                					</div>
                				</div>
                				<div class="balance">
                					<div class="balance-title">Escrow Balance</div>
                					<div class="balance-value">NGN 0.00</div>
                					<div class="balance-link">
                						<!-- <a class="btn btn-link btn-underlined" href="#">
                							<span>Request Increase</span>
                							<i class="os-icon os-icon-arrow-right4"></i>
                						</a> -->
                					</div>
                				</div>
                				<!-- <div class="balance hidden-mobile">
                					<div class="balance-title">Today</div>
                					<div class="balance-value danger">NGN 0.00</div>
                					<div class="balance-link">
                						<a class="btn btn-link btn-underlined btn-gold" href="#">
                                            <span>Pay Now</span>
                                            <i class="os-icon os-icon-arrow-right4"></i>
                                        </a>
                                    </div>
                                </div> -->
                            </div>
                            <!--END - BALANCES-->
                        </div>
                        <div class="col-lg-5 col-xxl-6">
                            <!--START - MESSAGE ALERT-->
                            <!-- <div class="alert alert-warning borderless">
                                <h5 class="alert-heading">Refer Friends. Get Rewarded</h5>
                                <p>You can earn: 15,000 Membership Rewards points for each approved referral – up to 55,000 Membership Rewards points per calendar year.</p>
                                <div class="alert-btn">
                                    <a class="btn btn-white-gold" href="#">
                                        <i class="os-icon os-icon-ui-92"></i>
                                        <span>Send Referral</span>
                                    </a>
                                </div>
                            </div> -->
                            <!--END - MESSAGE ALERT-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 col-xxl-6">
                    <!--START - CHART-->
                    <!-- <div class="element-wrapper">
                        <div class="element-box">
                            <div class="element-actions">
                                <div class="form-group">
                                    <select class="form-control form-control-sm">
                                        <option selected="true">Today</option>
                                    </select>
                                </div>
                            </div>
                            <h5 class="element-box-header">Balance History</h5>
                            <div class="el-chart-w">
                                <div style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                        <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">
                                            
                                        </div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                        <div style="position:absolute;width:200%;height:200%;left:0; top:0">
                                            
                                        </div>
                                    </div>
                                </div>
                                <canvas data-chart-data="13,28,19,24,43,49,40,35,42,46" height="157" id="liteLineChartV2" width="526" style="display: block; width: 526px; height: 157px;" class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                    </div>
 -->                    <!--END - CHART-->
                </div>
                <div class="col-lg-5 col-xxl-6">
                    <!--START - Money Withdraw Form-->
                    <div class="element-wrapper">
                        <div class="element-box">
                            <div>
                                <h5 class="element-box-header">Bank Account</h5>
                                @if(!$bankDetails->isEmpty())
                                    <div class="table-responsive">
                                        @if(Session::has('flash_message'))
                                        <div class="prompts error">
                                          <div>{{ Session::get('flash_message') }}</div>
                                        </div>
                                        @endif
                                        <table class="table table-lightborder">
                                            <thead>              
                                                <tr>
                                                    <th>Bank Name</th>
                                                    <th>Account Name</th>
                                                    <th>Account Number</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($bankDetails as $details)
                                                <tr>
                                                    <td> {{$details->bank}}</td>
                                                    <td>
                                                        {{$details->account_name}}
                                                    </td>
                                                    <td>
                                                        <span>{{$details->account_no}}</span>
                                                    </td>                          
                                                </tr>
                                                @endforeach
                                            </tbody>           
                                        </table>  
                                    </div>
                                @else
                                    <div class="alert alert-warning">
                                        You haven't created any Bank Account 
                                    </div>
                                @endif
                                <a class="btn btn-grey" href="#" data-target="#bankModal" data-toggle="modal">
                                    <i class="os-icon os-icon-ui-22"></i>
                                    <span>Add Bank Account</span>
                                </a>
                            </div> 
                            <hr>
                                <form method="POST" action="{{ route('payout.save') }}">
                                    @csrf
                                    <h5 class="element-box-header">Withdraw Money</h5>
                                    <div class="row">
                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="lighter" for="">Set Amount</label>
                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                    <input class="form-control" placeholder="Enter Amount" type="number" name="amount">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">NGN</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="lighter" for="">Transfer to</label>
                                                <select class="form-control" name="bank_id">  
                                                        <option>Select Bank</option>
                                                        @foreach($bankDetails as $bankdetail)
                                                            <option value="{{$bankdetail->id}}">
                                                                {{$bankdetail->bank}} ({{$bankdetail->account_name}} - {{$bankdetail->account_no}})
                                                            </option>
                                                        @endforeach
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-buttons-w compact">
                                        @if($bankDetails->isEmpty())
                                            <div class="help-block form-text text-muted form-control-feedback">
                                                You need to add your bank account before initiating a withdrawal.
                                            </div>
                                            <button class="btn btn-primary" type="submit" disabled>
                                                <span>Request withdrawal</span>
                                                <i class="os-icon os-icon-grid-18"></i>
                                            </button>
                                        @else
                                            <button class="btn btn-primary" type="submit">
                                                <span>Request withdrawal</span>
                                                <i class="os-icon os-icon-grid-18"></i>
                                            </button>
                                        @endif
                                    </div>
                            </form>
                        </div>
                    </div>
                    <!--END - Money Withdraw Form-->

                    <!-- Modal Bank Details-->
                    <div class="modal fade" id="bankModal" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header faded smaller">
                                    <div class="modal-title">
                                        <span>Bank Details</span> 
                                    </div>
                                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                        <span aria-hidden="true"> ×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form enctype='multipart/form-data' method="POST" action="{{ route('bank.save') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="">Bank Name</label>
                                                    <input class="form-control" placeholder="Bank name" name="bank" type="text" style="text-transform:uppercase">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="">Account Name</label>
                                                    <input class="form-control" placeholder="Account Holder" name="account_name" type="text" style="text-transform:uppercase">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="">Account Number</label>
                                                    <input class="form-control" placeholder="Account Number" name="account_no" type="number">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <button class="btn btn-teal" type="submit"> Save</button>
                                                <button class="btn btn-link" data-dismiss="modal" type="button"> Cancel</button>
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Modal Bank Details-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection