@extends('layouts.frontend.app-auth')
@section('title', 'Login | Vesicash')
@section('content')
    <div class="all-wrapper menu-side with-pattern">
        <div class="auth-box-w">
            <div class="logo-w">
                <a href="">
                    <img alt="" src="{{ asset('frontend/images/vesi-logo.png')}}" width="200px" height="50px">
                </a>
            </div>
            <h4 class="auth-header">Login</h4>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('warning'))
                    <div class="alert alert-warning">
                        {{ session('warning') }} <!-- <a href="">Click here </a> to request another. -->
                    </div>
                @endif  
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" placeholder="Email Address" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
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
                <div class="buttons-w">
                    <button class="btn btn-primary" type="submit">Log me in</button>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
                </div>
            </form>
            <div class="sign-form-text" style="text-align: center; padding-bottom: 30px;">
                <span">
                    <a href="{{ route('auth.show.register.personal') }}" class="text-primary"> Create Account</a> 
                    <a href="{{ route('password.request') }}" style="padding-left: 40px">Forgot Password <i class="fa fa-question-circle ml-1"></i></a>
                </span>
            </div>
        </div>
    </div>
@endsection
