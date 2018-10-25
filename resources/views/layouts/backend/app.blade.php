<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Vesicash | Dashboard') }}</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="" name="author">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="keywords" content="Escrow,secure Payment,Africa,Safe Payment, Digital Escrow, Online Fraud, Contact us">
    <meta name="description" content="Send Money, Pay online or Setup a Merchant account - vesicash.">
    <meta name="google-site-verification" content="qJeng2b-AqixgYJNW6yjX7iEH3LWo6SQre0HsRjolUc" />
    <link href="favicon.png" rel="shortcut icon">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="http://fast.fonts.net/cssapi/487b73f1-c2d1-43db-8526-db577e4c822b.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/bower_components/dropzone/dist/dropzone.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/bower_components/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/bower_components/slick-carousel/slick/slick.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/css/main.css?version=4.3.0')}}" rel="stylesheet">

    <!-- Hotjar Tracking Code for www.vesicash.com -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:1026990,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
</head>
<body class="menu-position-side menu-side-left full-screen with-content-panel">
<div class="all-wrapper with-side-panel solid-bg-all">
    <!-- @include('layouts.backend.onboarding') -->
    <div class="layout-w">
        <!-------------------- START - Mobile Menu -------------------->
        <div class="menu-mobile menu-activated-on-click color-scheme-dark">
            <div class="mm-logo-buttons-w">
                <a class="mm-logo">
                <img src="{{asset('frontend/img/vesi-logo.png')}}">
                    <span>Vesicash</span>
                </a>
                <div class="mm-buttons">
                    <div class="content-panel-open">
                        <div class="os-icon os-icon-grid-circles"></div>
                    </div>
                    <div class="mobile-menu-trigger">
                        <div class="os-icon os-icon-hamburger-menu-1"></div>
                    </div>
                </div>
            </div>
            <div class="menu-and-user">
                <div class="logged-user-w">
                    <!-- <div class="avatar-w">
                        <img alt="" src="img/avatar1.jpg">
                    </div> -->
                    <div class="logged-user-info-w">
                        <div class="logged-user-name">{{ Auth::user()->firstname }}</div>
                        <div class="logged-user-role">Administrator</div>
                    </div>
                </div>
                <!--------------------START - Mobile Menu List-------------------->
                <ul class="main-menu">
                    <li class="has-sub-menu">
                        <a href="">
                            <div class="icon-w">
                                <div class="os-icon os-icon-layout"></div>
                            </div>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="has-sub-menu">
                        <a href="">
                            <div class="icon-w">
                                <div class="os-icon os-icon-layers"></div>
                            </div>
                            <span>Overview</span>
                        </a>
                    </li>
                    <li class="has sub-menu">
                        <a data-placement="top" data-toggle="tooltip" title="" type="button" data-original-title="Transactions are invoices that have been paid for.">
                            <div class="icon-w">
                                <div class="os-icon os-icon-credit-card"></div>
                            </div>
                            <span>Transactions</span>
                        </a>
                        <div class="sub-menu-w">
                            <div class="sub-menu-icon">
                                <i class="os-icon os-icon-mail"></i>
                            </div>
                            <div class="sub-menu-i">
                                <ul class="sub-menu">
                                    <li><a href="{{route('transactions.show.index')}}">Monitor Invoices</a></li>
                                    <li><a href="{{route('transactions.show.milestones')}}">Monitor Milestones</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>        
                    <li class="has-sub-menu">
                        <a>
                            <div class="icon-w">
                                <div class="os-icon os-icon-file-text"></div>
                            </div>
                            <span>Invoices</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{route('invoice.show.index')}}">All Invoices</a></li>
                            <li>
                                <a href="{{route('invoice.show.all-ms')}}">All Milestones</a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li class="has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                                <div class="os-icon os-icon-life-buoy"></div>
                            </div>
                            <span>Wallet</span>
                        </a>
                        <ul class="sub-menu">
                            
                        </ul>
                    </li> -->
                    <li class="has-sub-menu">
                        <a href="{{route('disputes.show.index')}}">
                            <div class="icon-w">
                                <div class="os-icon os-icon-mail"></div>
                            </div>
                            <span>Disputes</span>
                        </a>
                        
                    </li>
                    
                    <!-- <li class="has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                                <div class="os-icon os-icon-edit-32"></div>
                            </div>
                            <span>Account</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="forms_regular.html">Settings</a></li>
                            <li><a href="forms_validation.html">Logout</a></li>
                        </ul>
                    </li> -->
                </ul>
                <!--------------------END - Mobile Menu List-------------------->
                <!-- <div class="mobile-menu-magic">
                    <h4>Vesicash</h4>
                    <p>Refer a friend</p>
                    <div class="btn-w">
                        <a class="btn btn-white btn-rounded" href="" target="_blank">Get link</a>
                    </div>
                </div> -->
            </div>
        </div>
        <!-------------------- END - Mobile Menu -------------------->
        <!--------------------START - Main Menu-------------------->
        @include('layouts.backend.sidebar')
        @include('layouts.backend.topbar')
        @yield('content')
        <div aria-hidden="true" class="onboarding-modal modal fade animated" id="onboardingFormModal" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-centered" role="document">
                <div class="modal-content text-center">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span class="close-label">Close</span>
                        <span class="os-icon os-icon-close"></span>
                    </button>
                    <div class="onboarding-media">
                        <img alt="" src="img/bigicon5.png" width="200px">
                    </div>
                        <div class="onboarding-content with-gradient">
                            <h4 class="onboarding-title">Create Payment Invoice</h4>
                            <div class="onboarding-text">You can create three different invoice types to soothe your needs. 
                            </div>
                            <div class="os-tabs-w">
                            <div class="os-tabs-controls">
                                <ul class="nav nav-tabs smaller">
                                    <li class="nav-item">
                                        <a class="nav-link active show" data-toggle="tab" href="#tab_overview">Quick Invoice</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tab_sales">Professional Invoice</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tab_milestone">Milestone Invoice</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active show" id="tab_overview">
                                    <div class="form-desc" align="left">
                                        Create a Quick Invoice - set amount, description and request a one-time payment from your customer.
                                    </div>
                                    
                                    <form enctype='multipart/form-data' method="POST" action="{{ route('save.invoice.basic') }}">
                                            @csrf
                                            <legend><span>Customer's details</span></legend>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label" for=""> First Name</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" placeholder="First Name" type="text" name="firstname" required autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label" for=""> Last Name</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" placeholder="Last Name" type="text" name="lastname" required autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label" for=""> Email</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" placeholder="Email" type="text" name="email" required autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label" for=""> Phone</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" placeholder="Phone" type="text" name="phone" required autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label" for="">Amount</label>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">NGN</div>
                                                    </div>
                                                    <input class="form-control" placeholder="Amount" type="number" name="amount" required autofocus>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Description</label>
                                            <div class="col-sm-6">
                                                <textarea class="form-control" rows="3" name="note"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-buttons-w">
                                            <button class="btn btn-primary" type="submit">
                                                 Submit
                                             </button>
                                         </div>
                                    </form>
                        
                                </div>
                                <div class="tab-pane" id="tab_sales">
                                    <div class="form-desc">
                                            Professional Invoice is suitable when you have to add a list of items and their prices to an invoice. 
                                        </div>          
                                    <fieldset class="form-group">
                                        <form enctype='multipart/form-data' method="POST" action="{{ route('save.invoice.professional') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label" for=""> First Name</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" placeholder="First Name" type="text" name="firstname" required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label" for=""> Last Name</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" placeholder="Last Name" type="text" name="lastname" required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label" for=""> Email</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" placeholder="Email" type="text" name="email" required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label" for=""> Phone</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" placeholder="Phone" type="text" name="phone" required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Description</label>
                                        <div class="col-sm-6">
                                            <textarea class="form-control" rows="3" name="note"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-buttons-w">
                                        <button class="btn btn-primary" type="submit"> Submit & Continue</button>
                                    </div>
                                        </form>
                                    </fieldset>                                    
                                </div>
                                <div class="tab-pane" id="tab_milestone">
                    <div class="form-desc">
                        Milestone Invoice - allows you create milestones and pay your customers based on the milestones. 
                    </div>          
                    <fieldset class="form-group">
                        <form enctype='multipart/form-data' method="POST" action="{{ route('save.invoice.milestone') }}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for=""> First Name</label>
                                <div class="col-sm-6">
                                    <input class="form-control" placeholder="First Name" type="text" name="firstname">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for=""> Last Name</label>
                                <div class="col-sm-6">
                                    <input class="form-control" placeholder="Last Name" type="text" name="lastname">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for=""> Email</label>
                                <div class="col-sm-6">
                                    <input class="form-control" placeholder="Email" type="text" name="email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for=""> Phone</label>
                                <div class="col-sm-6">
                                    <input class="form-control" placeholder="Phone" type="text" name="phone">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Description</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" rows="3" name="note"></textarea>
                                </div>
                            </div>
                            <div class="form-buttons-w">
                                <button class="btn btn-primary" type="submit"> Submit & Continue</button>
                            </div>
                        </form>
                    </fieldset>                                    
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
    <div class="display-type"></div>
</div>
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>
<script src="{{ asset('backend/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ asset('backend/bower_components/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{ asset('backend/bower_components/moment/moment.js')}}"></script>
<script src="{{ asset('backend/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{ asset('backend/bower_components/bootstrap-validator/dist/validator.min.js')}}"></script>
<script src="{{ asset('backend/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ asset('backend/bower_components/dropzone/dist/dropzone.js')}}"></script>
<script src="{{ asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('backend/bower_components/fullcalendar/dist/fullcalendar.min.js')}}"></script>
<script src="{{ asset('backend/bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{ asset('backend/bower_components/tether/dist/js/tether.min.js')}}"></script>
<script src="{{ asset('backend/bower_components/slick-carousel/slick/slick.min.js')}}"></script>
<script src="{{ asset('backend/bower_components/bootstrap/js/dist/util.js')}}"></script>
<script src="{{ asset('backend/bower_components/bootstrap/js/dist/alert.js')}}"></script>
<script src="{{ asset('backend/bower_components/bootstrap/js/dist/button.js')}}"></script>
<script src="{{ asset('backend/bower_components/bootstrap/js/dist/collapse.js')}}"></script>
<script src="{{ asset('backend/bower_components/bootstrap/js/dist/dropdown.js')}}"></script>
<script src="{{ asset('backend/bower_components/bootstrap/js/dist/modal.js')}}"></script>
<script src="{{ asset('backend/bower_components/bootstrap/js/dist/tab.js')}}"></script>
<script src="{{ asset('backend/bower_components/bootstrap/js/dist/tooltip.j')}}s"></script>
<script src="{{ asset('backend/bower_components/bootstrap/js/dist/popover.js')}}"></script>
<script src="{{ asset('backend/js/demo_customizer4a76.js?version=4.3.0')}}"></script>
<script src="{{ asset('backend/js/main4a76.js?version=4.3.0')}}"></script>
<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-42863888-9', 'auto');
ga('send', 'pageview');</script>
</body>
</html>
