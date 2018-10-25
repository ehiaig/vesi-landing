@extends('layouts.frontend.app-auth')
@section('title', 'Reset Password | Vesicash')
@section('content')
<div class="all-wrapper menu-side with-pattern">
        <div class="auth-box-w">
            <div class="logo-w">
                <a href="">
                    <img alt="" src="{{ asset('frontend/images/vesi-logo.png')}}" width="200px" height="50px">
                </a>
            </div>
            <h4 class="auth-header">{{ __('Reset Password') }}</h4>
            <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" placeholder="Email Address" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                    <div class="pre-icon os-icon os-icon-user-male-circle"></div>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    <div class="pre-icon os-icon os-icon-fingerprint"></div>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" required>
                </div>
                <div class="buttons-w">
                    <button class="btn btn-primary" type="submit">{{ __('Reset Password') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
