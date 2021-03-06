@extends('layouts.backend.app')
@section('title', 'Business Dashboard')
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper compact pt-4">
                <div class="element-actions">
                    <a class="btn btn-primary btn-sm" href="#">
                        <i class="os-icon os-icon-ui-22"></i>
                        <span>Add Account</span>
                    </a>
                    <a class="btn btn-success btn-sm" href="#">
                        <i class="os-icon os-icon-grid-10"></i>
                        <span>Make Payment</span>
                    </a>
                </div>
                <h6 class="element-header">Financial Overview</h6>
                <div class="element-box-tp">
                    <div class="row">
                        <div class="col-lg-7 col-xxl-6">
                            <!--START - BALANCES-->
                            <div class="element-balances">
                                <div class="balance hidden-mobile">
                                    <div class="balance-title">Total Balance</div>
                                    <div class="balance-value"><span>$350</span><span class="trending trending-down-basic"><span>%12</span><i class="os-icon os-icon-arrow-2-down"></i></span></div><div class="balance-link"><a class="btn btn-link btn-underlined" href="#"><span>View Statement</span><i class="os-icon os-icon-arrow-right4"></i></a></div>
                                </div>
                                <div class="balance">
                                    <div class="balance-title">Credit Available</div><div class="balance-value">$17,800</div><div class="balance-link"><a class="btn btn-link btn-underlined" href="#"><span>Request Increase</span><i class="os-icon os-icon-arrow-right4"></i></a></div>
                                </div>
                                <div class="balance">
                                    <div class="balance-title">Due Today</div><div class="balance-value danger">$180</div><div class="balance-link"><a class="btn btn-link btn-underlined btn-gold" href="#"><span>Pay Now</span><i class="os-icon os-icon-arrow-right4"></i></a></div>
                                </div>
                            </div><!--END - BALANCES-->
                        </div>
                        <div class="col-lg-5 col-xxl-6">
                            <!--START - MESSAGE ALERT-->
                            <div class="alert alert-warning borderless">
                                <h5 class="alert-heading">Refer Friends. Get Rewarded</h5>
                                <p>You can earn: 15,000 Membership Rewards points for each approved referral – up to 55,000 Membership Rewards points per calendar year.</p>
                                <div class="alert-btn">
                                    <a class="btn btn-white-gold" href="#">
                                        <i class="os-icon os-icon-ui-92"></i>
                                        <span>Send Referral</span>
                                    </a>
                                </div>
                            </div>
                            <!--END - MESSAGE ALERT-->


                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 col-xxl-6">
                    <!--START - CHART-->
                    <div class="element-wrapper">
                        <div class="element-box">
                            <div class="element-actions"><div class="form-group"><select class="form-control form-control-sm"><option selected="true">Last 30 days</option><option>This Week</option><option>This Month</option><option>Today</option></select></div></div>
<h5 class="element-box-header">Balance History</h5><div class="el-chart-w"><div style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div><canvas data-chart-data="13,28,19,24,43,49,40,35,42,46" height="157" id="liteLineChartV2" width="526" style="display: block; width: 526px; height: 157px;" class="chartjs-render-monitor"></canvas></div></div></div>
                    <!--END - CHART-->
                </div>
                <div class="col-lg-5 col-xxl-6"><!--START - Money Withdraw Form--><div class="element-wrapper"><div class="element-box"><form><h5 class="element-box-header">Withdraw Money</h5><div class="row"><div class="col-sm-5"><div class="form-group"><label class="lighter" for="">Select Amount</label><div class="input-group mb-2 mr-sm-2 mb-sm-0"><input class="form-control" placeholder="Enter Amount..." value="0" type="text"><div class="input-group-append"><div class="input-group-text">USD</div></div></div></div></div><div class="col-sm-7"><div class="form-group"><label class="lighter" for="">Transfer to</label><select class="form-control"><option value="">Citibank *6382</option><option value="">Chase *8372</option><option value="">Bank of America *7363</option></select></div></div></div><div class="form-buttons-w text-right compact"><a class="btn btn-grey" href="#"><i class="os-icon os-icon-ui-22"></i><span>Add Account</span></a><a class="btn btn-primary" href="#"><span>Transfer</span><i class="os-icon os-icon-grid-18"></i></a></div></form></div></div><!--END - Money Withdraw Form--></div></div>

</div></div></div>
@endsection