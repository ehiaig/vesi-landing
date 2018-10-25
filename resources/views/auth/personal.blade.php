@extends('layouts.frontend.app-auth')
@section('title', 'Personal - Join Vesicash')
@section('content')
    <div class="all-wrapper menu-side with-pattern">
        <div class="auth-box-w wider">
            <div class="logo-w">
                <a href="ndex.html">
                    <img alt="" src="{{ asset('frontend/images/vesi-logo.png')}}" width="200px" height="50px">
                </a>
            </div>
            <h4 class="auth-header">Create a free account</h4>
            <div class="element-box">
                <form method="POST" action="{{ route('auth.register.personal.save') }}">
                    @csrf
                    <div class="form-group">
                        <label for="" >{{ __('First Name') }}</label>
                        <input  type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('firstname') }}" required autofocus>
                        <div class="pre-icon os-icon os-icon-user"></div>

                        @if ($errors->has('firstname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('firstname') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="" >{{ __('Last Name') }}</label>
                        <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required autofocus>
                        <div class="pre-icon os-icon os-icon-user"></div>

                        @if ($errors->has('lastname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('lastname') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for=""> Email address</label>
                        <input type="email" placeholder="Enter email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                        <div class="pre-icon os-icon os-icon-email-2-at2"></div>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        
                    </div>
                    <div class="form-group">
                        <label for="">Phone Number</label>
                        <input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus>
                        <div class="pre-icon os-icon os-icon-phone"></div>
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for=""> Password</label>
                                <input type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                <div class="pre-icon os-icon os-icon-fingerprint"></div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                            </div>
                        </div>
                    </div>
                    <div class="buttons-w" style="text-align: center;">
                        <button class="btn btn-primary" type="submit">Register</button>
                    </div>
                </form>
                <div class="sign-form-text" style="text-align: center; padding-bottom: 30px;">
                    <span">
                        <a href="{{ route('auth.show.register.business') }}" class="text-primary"> Create Business Account</a> 
                        <a href="{{ route('login') }}" style="padding-left: 40px">Login</a>
                    </span>
                </div>
            </div>
        </div>
    </div>

@endsection