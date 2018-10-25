<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Escrow,secure Payment,Africa,Safe Payment, Digital Escrow, Online Fraud, Contact us">
    <meta name="description" content="Send Money, Pay online or Setup a Merchant account - vesicash.">
    <meta name="google-site-verification" content="qJeng2b-AqixgYJNW6yjX7iEH3LWo6SQre0HsRjolUc" />
    <meta name="author" content="">
    <title>{{ config('app.name', 'Vesicash | Pay Safe, Buy Safe, Sell Safe') }}</title>
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
<body>

<header id="header">
    <div class="container">
        <div id="logo" class="pull-left">
            <a href="{{url('/')}}">
            	<img src="{{asset('frontend/img/vesi-logo.png')}}" alt="Vesicash Logo" width="100px"/>
            </a>
        </div>

        <nav id="nav-menu-container">
            <ul class="nav-menu text-primary">
                <li><a href="{{url('/')}}">Personal</a></li>
                <li class="menu-active"><a href="#portfolio">Business</a></li>
                <!--  <li><a href="#services">Developers</a></li> -->
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
        </nav>
    </div>
</header>

<main id="main" style="overflow: hidden">
    <section id="" style="padding-bottom: 70px;overflow: hidden">
        <div class="headcon">
            <img src="{{asset('frontend/img/business.png')}}" alt="" class="" style="width: 100%;height: 100%;">
            <div class="row bottom-left" style="margin-left: 20px;margin-top: 190px">
                <a class="cbtn btn-shadow btn-width text-primary" style="background-color: #243949" "{{route('auth.show.register.business')}}">Get in touch</a>
            </div>
        </div>
    </section>

    <section id="featured-services">
        <div class="container">
            <div class="section-header">
                <h4>Do you know?</h4>
                <hr>
                <!-- <p>Vesicash will take your business to a whole new higher level because of the trust it guarantees your
                     customers? without vesicash</p>-->

                <div class="row" style="margin-top: 6.25%">


                    <div class="col-lg-4 box" style="margin-top: 10px">
                        <h4 class="title"><a class="">Social Commerce</a></h4>
                        <p class="description">62% of the people that comes in contact with your product on Instagram,Twitter and Facebook refused to buy because of the fear of becoming a fraud victim. </p>
                    </div>

                    <div class="col-lg-4 box box-bg" style="margin-top: 10px">

                        <h4 class="title"><a>Marketplace</a></h4>
                        <p class="description">Buying and Selling on marketplace increase the risk of becoming a fraud victim by 65%.</p>
                    </div>

                    <div class="col-lg-4 box" style="margin-top: 10px">

                        <h4 class="title"><a>Freelancing platforms?</a></h4>
                        <p class="description">Remote working is the future of jobs. <br>Freelancers need an assured
                            payment system that will gradually take them into the future.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section><!-- #featured-services -->

    <!--==========================
      About Us Section
    ============================-->
    <section id="services" style="width: 100%;background-color: whitesmoke">
        <div class="container">

            <header class="section-header wow fadeInUp">
                <h3>What we offer</h3>
                <p></p>
            </header>

            <div class="row">
                <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s"
                >
                    <div class="icon"><i class="fa fa-shield"></i></div>
                    <h4 class="title"><a href="">Secure Payment</a></h4>
                    <p class="description">The security of your funds is the core of our system. With Vesicash, your funds are safe and secure at all time.</p>
                </div>

                <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s"
                >
                    <div class="icon"><i class="ion-arrow-graph-up-right"></i></div>
                    <h4 class="title"><a>Increase in sales</a></h4>
                    <p class="description">Using Vesicash increases your sales with your customers having total confidence in transacting without losing their money.</p>
                </div>

                <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s"
                >
                    <div class="icon"><i class="ion-ios-people"></i></div>
                    <h4 class="title"><a>Identity verification</a></h4>
                    <p class="description">Our System unmask the identity of the buyers at all time, so you can be sure you are transacting with real people without falling victims for fraud.</p>
                </div>

                <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s"
                     data-wow-duration="1.4s">
                    <div class="icon"><i class="fa fa-legal"></i></div>
                    <h4 class="title"><a>Zero Dispute</a></h4>
                    <p class="description">A transparent mechanism that resolves all dispute, you have nothing to worry about.</p>
                </div>
                <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s"
                     data-wow-duration="1.4s">
                    <div class="icon"><i class="ion-arrow-graph-up-right"></i></div>
                    <h4 class="title"><a href="">Revenue stream</a></h4>
                    <p class="description"> With Vesicash, you build an instant revenue stream and reduce
                        your cost.</p>
                </div>
                <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s"
                     data-wow-duration="1.4s">
                    <div class="icon"><i class="ion-connection-bars"></i></div>
                    <h4 class="title"><a>Data Insight</a></h4>
                    <p class="description">You get data insights to convert, retain and delight your customers. With
                        Vesicash your customers becomes family.</p>
                </div>

            </div>

        </div>
    </section>

    <!--==========================
      Services Section
    ============================-->
    <section id="services" style="width: 100%;background-color: #081e5b">
        <div class="container">


            <div class="row">
                <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s"
                     style="border: #545b62;border-style: solid">
                    <img src="{{asset('frontend/img/computer-1.png')}}" alt=""
                         style="width: 64px; margin-left: 32.5%;margin-top: 20px;margin-bottom: 10px">
                    <h4 style="margin-left: 50px"><b> API Integration </b></h4>
                    <p class="" style="margin-left: 10px;text-align: left">Request access to integrate our digital escrow system into your website or mobile application. </p>
                    <p class="" style="margin-left: 20px;text-align: left">
                    	<i class="fa ion-android-checkbox" style="color: #50d8af"></i> Adaptable
                        integration options, specifically built for developers</p>
                    <p class="" style="margin-left: 20px;text-align: left">
                    	<i class="fa ion-android-checkbox" style="color: #50d8af"></i> Customize your checkout experience to your taste.</p>
                    <p class="" style="margin-left: 20px;text-align: left">
                    	<i class="fa ion-android-checkbox" style="color: #50d8af"></i> Specific
                        features for SMEs and big-ticket businesses</p>
                    <p class="" style="margin-left: 20px;text-align: left">
                    	<i class="fa ion-android-checkbox" style="color: #50d8af"></i> Verified
                        identities and anti-fraud tools
                    </p>
                    <div class="" style="margin-left: 50px;margin-top: 50px">
                        <a class="cbtn btn-shadow btn-width text-primary" style="background-color: #243949"><b>Request
                            Access</b></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s"
                     style="border: #545b62;border-style: solid">
                    <img src="{{asset('frontend/img/approve-invoice.png')}}" alt=""
                         style="width: 64px; margin-left: 32.5%;margin-top: 20px;margin-bottom: 10px">
                    <h4 class=""><b>Invoice </b></h4>
                    <p class="" style="margin-left: 10px;text-align: left"> You don't want to integrate the API? No worries. You can start receiving payments in less than 30seconds with our invoice escrow</p>
                    <p class="" style="margin-left: 20px;text-align: left">
                    	<i class="fa ion-android-checkbox" style="color: #50d8af"></i> 
                    	Create a business account in 30seconds
                    </p>
                    <p class="" style="margin-left: 20px;text-align: left">
                    	<i class="fa ion-android-checkbox" style="color: #50d8af"></i> Create invoice transactions anytime and share with your customers to receive payments with confidence
                    </p>
                    <p class="" style="margin-left: 20px;text-align: left">
                    	<i class="fa ion-android-checkbox" style="color: #50d8af"></i> Supports
                        one-off and installmental Escrow. </p>
                    <div class="text-center" style="margin-left: 0px;margin-top: 50px">
                        <a class="cbtn btn-shadow btn-width text-primary" style="background-color: #243949;text-align: left" href="{{route('auth.show.register.business')}}">
                        	Create your business account</a>
                    </div>
                    </button>
                </div>

                <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s"
                     style="border: #545b62;border-style: solid">
                    <img src="{{asset('frontend/img/enterprise.png')}}" alt=""
                         style="width: 64px; margin-left: 32.5%;margin-top: 20px;margin-bottom: 10px">

                    <h4 class="text-center" style="margin-left: 20px"><b>Enterprise </b></h4>
                    <p class="" style="margin-left: 20px;text-align: left"> Secure your client payments with our enterprise digital escrow solution. For Banks,investment firms and Large corporates.</p>
                    <div class="" style="margin-left: 50px;margin-top: 190px">
                        <a class="cbtn btn-shadow btn-width text-primary" style="background-color: #243949">Request Demo</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- #services -->


    <!-- <section>
        <div class="container">
            <div class=""></div>
        </div>

    </section> -->


    <!--==========================
      Call To Action Section
    ============================-->
     <section id="call-to-action" class="wow fadeIn" style="width: 100%">
        <div class="container text-center">
            <h3>Call To Action</h3>
            <p class="text-white"> Whatever kind of transactions you want to carry out, you need an assurance that you will receive your payment or goods you paid for. Let Vesicash take away your worries,so you can start selling with confidence.</p>
            <a class="cta-btn" href="{{route('auth.show.register.business')}}">Create a free business account.</a>
        </div>
    </section><!-- #call-to-action -->
 
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
    </section>

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
