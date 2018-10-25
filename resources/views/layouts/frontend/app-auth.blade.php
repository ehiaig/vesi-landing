<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>{{ config('app.name', 'Vesicash') }}</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
   <meta name="keywords" content="Escrow,secure Payment,Africa,Safe Payment, Digital Escrow, Online Fraud, Contact us">
    <meta name="description" content="Send Money, Pay online or Setup a Merchant account - vesicash.">
    <meta name="google-site-verification" content="qJeng2b-AqixgYJNW6yjX7iEH3LWo6SQre0HsRjolUc" />
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="favicon.png" rel="shortcut icon">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="{{ asset('backend/css/main.css?version=4.3.0')}}" rel="stylesheet">
</head>
<body>
    @yield('content')
</body>
</html>