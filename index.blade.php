<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Escrow,secure Payment,Africa,Safe Payment, Digital Escrow, Online Fraud, Contact us">
    <meta name="description" content="Send Money, Pay online or Setup a Merchant account - vesicash.">
    <meta name="google-site-verification" content="qJeng2b-AqixgYJNW6yjX7iEH3LWo6SQre0HsRjolUc" />
    <meta name="author" content="">
    <title>{{ config('app.name', 'Vesicash | Digital Escrow payment for transactions across Africa') }}</title>
    <link rel="icon" href="{{asset('frontend/images/logo.png')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,500i|Roboto:500,700">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="google-site-verification" content="qJeng2b-AqixgYJNW6yjX7iEH3LWo6SQre0HsRjolUc" />
    <link rel="stylesheet" href="{{ asset('frontend/lib/bootstrap/css/bootstrap.min.css') }}">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('frontend/lib/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/lib/ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/lib/ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/lib/magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">

    <!-- Main Stylesheet File -->
    <link href="" rel="stylesheet">

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

<body id="body">
<header id="header">
    <div class="container">
        <div id="logo" class="pull-left">
            <a href="{{ url('/') }}">
                <img src="{{asset('frontend/img/vesi-logo.png')}}" alt="Vesicash Logo" style="margin-left: -40px" width="200px" title=""/>
            </a>
        </div>
        <nav id="nav-menu-container">
            <ul class="nav-menu text-primary" style="text-decoration-color: #3bb75e">
                <li class="menu-active">
                    <a style="color: #3bb75e;">Personal</a>
                </li>
                <li><a href="{{route('business')}}">Business</a></li>
               <!-- <li><a href="#services">Developers</a></li>-->
                @guest
                    <li class="menu-has-children" style=" border: #081e5b"><a
                            class="cbtn  btn-shadow btn-width " style="background-color: #3bb75e;margin: -3px"><b> Sign up
                        today </b></a>
                        <ul>
                            <li>
                                <a href="{{route('auth.show.register.business')}}">Business</a>
                            </li> 
                            <li>
                                <a href="{{route('auth.show.register.personal')}}">Personal</a>
                            </li>                            
                            <li> 
                                <a href="{{route('login')}}">Login</a> 
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="menu-has-children" style=" border: #081e5b">
                        <a>
                            {{ Auth::user()->firstname }} <span class="caret"></span>
                        </a>
                    <ul>
                        <li>
                            <a href="{{route('dashboard.show.index')}}">Back to Dashboard</a>
                        </li>
                        <li>
                            <a href="{{route('logout')}}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                         {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                @endguest
            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header>

<main id="main">
    <section id="" style=" width: 100%">
        <div class="headcon ">
            <img src="{{asset('frontend/img/personal-gif.gif')}}" alt="" class="" style="width: 100%;height: 100%">
            <div class=" row bottom-left" style="margin-bottom: 5px;margin-left: 50px">
                <a class="cbtn  btn-shadow btn-width text-primary" style="background-color: #3bb75e;" href="{{route('auth.show.register.personal')}}">
                    Sign up today 
                </a>
            </div>
        </div>
    </section>

    <section id="about" class="wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 content" style="padding-top: 50px">
                    <h2 style="font-size: 30px;">Why do I need Vesicash?</h2>
                    <h3 style="font-size: 16px">With Vesicash you will never be a victim of fraud. You no longer have to
                        worry about; </h3>
                    <ul>
                        <li><i class="ion-android-checkmark-circle"></i> Payment not being made for service/product
                            delivered
                        </li>
                        <li><i class="ion-android-checkmark-circle"></i> Service or product not being delivered after
                            payment was made
                        </li>
                        <li><i class="ion-android-checkmark-circle"></i> Delay in payment after you've delivered</li>
                    </ul>
                    <div class="" style="position: center">
                        <a class="cbtn  btn-shadow btn-width " style="background-color: #3bb75e" href="{{route('auth.show.register.personal')}}">  Sign up </a>
                        <a class="cbtn  btn-shadow btn-width" style="margin-top: 10px;background-color: #243949" href="{{route('login')}}"><b>
                            Learn more </b></a>
                    </div>
                </div>
                <div class="col-lg-6 about-img" style=" margin-top: 0px">
                    <img src="{{asset('frontend/img/funds-are-released.gif')}}" alt="">
                </div>


            </div>

        </div>
    </section><!-- #about -->

    <br>
    <br>

    <hr>
    <section id="services">
        <div class="container">
            <div class="section-header">
                <h2 style="text-align: left">What we do</h2>
                <p>Our proprietary process ensures you get paid for all the goods or services you render and also
                    ensure the good or service you paid for is delivered. With Vesicash, you are in total control of your
                    payment.</p>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="box wow fadeInRight">
                        <div class="icon">
                            <img src="{{asset('frontend/img/lock-2.png')}}" alt="">
                        </div>
                        <h4 class="title">
                            <a>Payment Security</a>
                        </h4>
                        <p class="description">Funds are held securely in trust until the transaction is completed and everyone is happy</p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="box wow fadeInLeft">
                        <div class="icon">
                            <img src="{{asset('frontend/img/real-estate-1.png')}}" alt="">
                        </div>
                        <h4 class="title"><a>Safe Purchase</a></h4>
                        <p class="description">Vesicash can be used for your small to big purchase with peace of mind.</p>
                        <br><br>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="box wow fadeInRight" data-wow-delay="0.2s">
                        <div class="icon">
                            <img src="{{asset('frontend/img/weight-balance-3.png')}}" alt="">
                        </div>
                        <h4 class="title"><a>Dispute Resolution</a></h4>
                        <p class="description">Vesicash has a mechanism that resolves all dispute in less than 72hours.</p>
                        <br>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="box wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="icon">
                            <img src="{{asset('frontend/img/id.png')}}" alt="">
                        </div>
                        <h4 class="title"><a ref="">Identity Verification</a></h4>
                        <p class="description">Our system verifies the identity of the person you are transacting with
                            in real time.</p>
                        <br>
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="box wow fadeInRight" data-wow-delay="0.2s">
                        <div class="icon"><img src="{{asset('frontend/img/shield-1.png')}}" alt=""></div>
                        <h4 class="title"><a href="">Protection</a></h4>
                        <p class="description">We protect all parties to a transaction by ensuring everyone holds up to
                            their part of the deal.</p>
                        <br><br>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="box wow fadeInRight" data-wow-delay="0.2s">
                        <div class="icon"><img src="{{asset('frontend/img/profits.png')}}" alt=""></div>
                        <h4 class="title"><a href="">Milestone Payments</a></h4>
                        <p class="description">We do not only support a one-off payment,we also support payments that are tied to specific milestones.</p><br>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- #services -->
    <hr>

    <section class="" style="padding-top: 50px;padding-bottom: -50px;height: 950px">

        <div class="container">

            <h2 class="section-header">How does it work?</h2>
            <div class="row">
                <div class="col-sm-12">
                    <div class="tabbed">
                        <input type="radio" name="mytabs" id="tab-nav-1" checked>
                        <label for="tab-nav-1">Send payment</label>

                        <input type="radio" name="mytabs" id="tab-nav-2">
                        <label for="tab-nav-2">Request payment</label>
                        <div class="mytabs " style="padding-top: 20px">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="box wow fadeInRight" style="border: 0px">
                                        <div class="icon col-lg-2">
                                            <img src="{{asset('frontend/img/user.png')}}" alt="">
                                        </div>
                                        <h6 class="title" style="margin-left: 0">1. Create Transaction</h6>
                                        <p class="description" style="margin-left: 0; padding-top: 0">
                                            Give us the details of the counterparty,we verify the
                                            identity and send the transaction request to them for acceptance.</p>
                                        <br>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="box wow fadeInLeft" style="border: 0px">
                                        <div class="icon"><img src="{{asset('frontend/img/shield-2.png')}}" alt=""></div>
                                        <h6 class="title" style="margin-left: 0">2. Make payment </h6>
                                        <p class="description" style="margin-left: 0; margin-top: 0">You make the payment into Vesicash and the counterparty is notified of the payment. Funds are held securely in Vesicash vault.</p>

                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="box wow fadeInRight" data-wow-delay="0.2s" style="border: 0px">
                                        <div class="icon"><img src="{{asset('frontend/img/cash-1.png')}}" alt=""></div>
                                        <h6 class="title" style="margin-left: 0">3. Release funds</h6>
                                        <p class="description" style="margin-left: 0; margin-top: 0">Funds are released after confirmations indicating that both party are happy.</p>
                                        <br>
                                        <br>
                                    </div>

                                </div>
                                <div class="col-md-12 cta-btn-container text-center" >
                                    <a class="cbtn  btn-shadow btn-width" style="margin-top: 10px;background-color: #243949" href="{{route('login')}}">
                                        <b>Create your first transaction </b>
                                    </a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="box wow fadeInRight">
                                        <div class="icon"><img src="{{asset('frontend/img/user.png')}}" alt=""></div>
                                        <h6 class="title" style="margin-left: 0">1. Create Transaction</h6>
                                        <p class="description" style="margin-left: 0; margin-top: 0">Give us the details of the counterparty,we verify the
                                            identity and send the transaction request to them for acceptance.</p>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="box wow fadeInLeft">
                                        <div class="icon"><img src="{{asset('frontend/img/shield.png')}}" alt=""></div>
                                        <h6 class="title" style="margin-left: 0">2. Make payment </h6>
                                        <p class="description" style="margin-left: 0; margin-top: 0">They make payment into Vesicash and you are notified.
                                            Funds are held securely in Vesicash vault.</p>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="box wow fadeInRight" data-wow-delay="0.2s">
                                        <div class="icon"><img src="{{asset('frontend/img/cash-2.png')}}" alt=""></div>
                                        <h6 class="title" style="margin-left: 0">3. Release funds</h6>
                                        <p class="description" style="margin-left: 0; margin-top: 0">Funds are released after confirmations indicating that
                                            both party are happy.</p>
                                    </div>

                                </div>

                                <div class="col-md-12 cta-btn-container text-center">
                                    <a class="cbtn  btn-shadow btn-width" style="margin-top: 10px;background-color: #243949" href="{{route('login')}}">
                                        <b>Send your first transaction </b>
                                    </a>   
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>

    </section>

    <hr>

    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action" class="wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 text-center text-lg-left">
                    <h3 class="cta-title">Try Vesicash now</h3>
                    <p class="cta-text"> To start transacting with peace of mind, create a free account in 15s.</p>
                </div>
                <div class="col-lg-3 cta-btn-container text-center">
                    <a class="cta-btn align-middle" href="{{route('login')}}"> <b>Start today </b></a>
                </div>
            </div>

        </div>
    </section><!-- #call-to-action -->
    <hr>

    <section id="contact" class="wow fadeInUp">
        <div class="container">
            <div class="section-header" style="margin-top: 40px">
                <h2 style="margin-left: -15px">To know more</h2>
                <p></p>
            </div>

            <div class="row contact-info">
                <div class="col-md-3">
                    <div class="" style="text-align: left; ">

                        <h3>About</h3>
                        <p style="color: #50d8af"> Mission Statement</p>
                        <p style="color: #50d8af"> Values and Philosophy</p>
                        <!--<a href="https://medium.com/vesicash/stories/public" class="">  <p style="color: #50d8af"> Blog </p></a>
                        <br>-->

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="" style="text-align: left">

                        <h3>Address</h3>
                        <p style="color: #50d8af"> 19B Adeyemi Lawson, Ikoyi, Lagos.</p>
                        <br>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="" style="text-align: left">

                        <h3>Follow us</h3>
                        <a href="https://twitter.com/Vesicash"><i class="fa fa-twitter"></i></a>
                        <a href="https://www.linkedin.com/company/vesicash/"
                           style="margin-left: 20px; width: 10px;height: 0px "><i
                                class="fa fa-linkedin"></i></a>
                        <br>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="" style="text-align: left">

                        <h3>Contact us</h3>
                        <p class="text-primary"><a href="mailto:support@vesicash.com" style="color: #50d8af">support@vesicash.com</a>
                        </p>
                        <p><a href="mailto:customer@vesicash.com" style="color: #50d8af">customer@vesicash.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- #contact -->
</main>

<footer id="footer">
    <div class="container">
        <div class="copyright" style="margin-top:10px ">
            <img src="{{asset('frontend/img/vesi-logo.png')}}" alt="" style=" width: 20%; height: 20%; margin-left: 0">
            &copy;<strong>Vesicash Innovative Technologies Limited</strong>. All Rights Reserved
        </div>
    </div>
</footer>

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
<script src="{{ asset('frontend/lib/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('frontend/lib/jquery/jquery-migrate.min.js')}}"></script>
<script src="{{ asset('frontend/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('frontend/lib/easing/easing.min.js')}}"></script>
<script src="{{ asset('frontend/lib/superfish/hoverIntent.js')}}"></script>
<script src="{{ asset('frontend/lib/superfish/superfish.min.js')}}"></script>
<script src="{{ asset('frontend/lib/wow/wow.min.js')}}"></script>
<script src="{{ asset('frontend/lib/magnific-popup/magnific-popup.min.js')}}"></script>
<script src="{{ asset('frontend/lib/sticky/sticky.js')}}"></script>
<script src="{{ asset('frontend/js/main.js')}}"></script>

</body>
</html>

