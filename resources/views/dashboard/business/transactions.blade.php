@extends('layouts.backend.app')
@section('title', 'Business Dashboard')
@section('content')
<div class="content-w">
	<div class="content-i">
		<div class="content-box">
			<div class="row">
                <div class="col-sm-12">
                    <div class="element-wrapper">
                        <h6 class="element-header">Transactions</h6>
                        <div class="element-box">
                            <div class="os-tabs-w">
                                <div class="os-tabs-controls">
                                    <ul class="nav nav-tabs smaller">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#tab_overview">Pending</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tab_sales">Completed</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_overview">
                                        <div class="table-responsive">
											<table class="table table-padded">
												<thead>
													<tr>
														<th>Invoice Id</th>
														<th>Date</th>
														<th>Payment Status</th>
														<th class="text-center">Amount (NGN)</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="nowrap">
															<span>875768</span>
														</td>
														<td>
															<span>Sept 12, 2018</span>
														</td>
														<td class="cell-with-media">
															<span>Authorized</span>
														</td>
														<td class="text-right bolder nowrap">
															<span class="text-success">5000</span>
														</td>
														<td class="text-center">
															<a class="badge badge-success" href="#">Confirm</a>
														</td>
														<td class="text-center">
															<a class="badge badge-danger" href="#">Open Dispute</a>
														</td>	
													</tr>
												</tbody>
											</table>
										</div>
                                    </div>
                                    <div class="tab-pane" id="tab_sales"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>	
		</div>
		<!--START  Quick Links-->
		<div class="content-panel">
            <div class="content-panel-close">
                <i class="os-icon os-icon-close"></i>
            </div>
            <div class="element-wrapper">
                <h6 class="element-header">Quick Links</h6>
                <div class="element-box-tp">
                    <div class="el-buttons-list full-width">
                        <a class="btn btn-white btn-sm" href="#">
                            <i class="os-icon os-icon-delivery-box-2"></i>
                            <span>Create New Product</span>
                        </a>
                        <a class="btn btn-white btn-sm" href="#">
                            <i class="os-icon os-icon-window-content"></i>
                            <span>Customer Comments</span>
                        </a>
                        <a class="btn btn-white btn-sm" href="#">
                            <i class="os-icon os-icon-wallet-loaded"></i>
                            <span>Store Settings</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Quick Links -->
    </div>
    <div class="content-box">
		<!--START - Transactions Table-->
		<div class="element-wrapper">
			<h6 class="element-header">Recent Transactions</h6>
			<div class="element-box-tp">
				<div class="table-responsive">
					<table class="table table-padded">
						<thead>
							<tr>
								<th>Status</th>
								<th>Date</th>
								<th>Description</th>
								<th class="text-center">Category</th>
								<th class="text-right">Amount</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="nowrap">
									<span class="status-pill smaller green"></span>
									<span>Complete</span>
								</td>
								<td>
									<span>Today</span>
									<span class="smaller lighter">1:52am</span>
								</td>
								<td class="cell-with-media">
									<img alt="" src="img/company1.png" style="height: 25px;">
									<span>Banana Shakes LLC</span>
								</td>
								<td class="text-center">
									<a class="badge badge-success" href="#">Shopping</a>
								</td>
								<td class="text-right bolder nowrap">
									<span class="text-success">+ 1,250 USD</span>
								</td>
							</tr>
							<tr>
								<td class="nowrap">
									<span class="status-pill smaller red"></span>
									<span>Declined</span>
								</td>
								<td>
									<span>Jan 19th</span>
									<span class="smaller lighter">3:22pm</span>
								</td>
								<td class="cell-with-media">
									<img alt="" src="img/company2.png" style="height: 25px;">
									<span>Stripe Payment Processing</span>
								</td>
								<td class="text-center">
									<a class="badge badge-danger" href="#">Cafe</a>
								</td>
								<td class="text-right bolder nowrap">
									<span class="text-success">+ 952.23 USD</span>
								</td>
							</tr>
							<tr>
								<td class="nowrap">
									<span class="status-pill smaller yellow"></span>
									<span>Pending</span>
								</td>
								<td>
									<span>Yesterday</span>
									<span class="smaller lighter">7:45am</span>
								</td>
								<td class="cell-with-media">
									<img alt="" src="img/company3.png" style="height: 25px;">
									<span>MailChimp Services</span>
								</td>
								<td class="text-center">
									<a class="badge badge-warning" href="#">Restaurants</a>
								</td>
								<td class="text-right bolder nowrap">
									<span class="text-danger">- 320 USD</span>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!--END - Transactions Table-->
	</div>
</div>
@endsection