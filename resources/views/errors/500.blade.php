<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>{{ config('app.name', 'Vesicash') }}</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="" name="author">
    <meta content="Admin dashboard html template" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="favicon.png" rel="shortcut icon">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="{{ asset('backend/css/main.css?version=4.3.0')}}" rel="stylesheet">
</head>
<body class="full-screen with-content-panel">
    @include('layouts.backend.topbar')
    <div class="content-w">
        <div class="content-box">
            <h4 style="text-align: center;">500</h4>
            <div class="big-error-w">
                <h5>{{ __('An error occured with your request.') }}</h5>


                {{ __(' Please head over to view your transactions.') }}, <a href="{{ route('transactions.show.index') }}">login</a>
                {{ __('If you'd like to see view invoices in your dashboard, click here') }}, <a href="{{ route('invoice.show.index') }}">{{ __('click here') }}</a>.

                <h6><a href="{{ route('logout') }}">Logout</a></h6>
            </div>      
            <div style="background-color: #F5F5F5; padding: 40px; text-align: center;">
                <div style="margin-bottom: 20px;">
                    <!-- <div style="margin-bottom: 20px;">
                        <a href="#" style="text-decoration: underline; font-size: 14px; letter-spacing: 1px; margin: 0px 15px; color: #261D1D;">
                            Contact Us
                        </a>
                        <a href="#" style="text-decoration: underline; font-size: 14px; letter-spacing: 1px; margin: 0px 15px; color: #261D1D;">
                            Terms and Conditions
                        </a>
                    </div> -->
                    <div style="color: #A5A5A5; font-size: 12px; margin-bottom: 20px; padding: 0px 50px;">Vesicash</div>
                    <!-- <div style="margin-bottom: 20px;">
                        <a href="#" style="display: inline-block; margin: 0px 10px;">
                            <img alt="" src="img/market-google-play.png" style="height: 33px;">
                        </a>
                        <a href="#" style="display: inline-block; margin: 0px 10px;">
                            <img alt="" src="img/market-ios.png" style="height: 33px;">
                        </a>
                    </div> -->
                    <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid rgba(0,0,0,0.05);">
                        <div style="color: #A5A5A5; font-size: 10px; margin-bottom: 5px;">19B Adeyemi Lawson, Ikoyi, Lagos</div>
                        <div style="color: #A5A5A5; font-size: 10px;">
                            Copyright 2018 Light Admin template. All rights reserved.
                        </div>
                    </div>
            </div>      
        </div>
    </div>
</body>
</html>