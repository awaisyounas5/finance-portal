@extends('layouts.app')

@section('content')
<div class="container-fluid p-0" style="background-color:#102344;">
    <div class="row m-0">
        <div class="col-12 p-0">
            <div class="login-card login-dark">
                <div>
                    <div><a class="logo" href="{{ route('home') }}"><img class="img-fluid for-light" src="../assets/images/logo/logo.png" alt="looginpage" style="width:600px;"><img class="img-fluid for-dark" src="../assets/images/logo/logo_dark.png" alt="looginpage"></a></div>
                    <div class="login-main">
                        <form method="POST" action="{{ route('login') }}" class="theme-form">
                            @csrf
                            <h4>Sign in to account</h4>
                            <p>Enter your email & password to login</p>
                            <div class="form-group">
                                <label class="col-form-label">Email Address</label>
                                <input id="email" name="email" class="form-control @error('email') is-invalid @enderror" type="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="username@example.com">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Password</label>
                                <div class="form-input position-relative">
                                    <input id="password" name="password" class="form-control @error('password') is-invalid @enderror" type="password" required placeholder="*********">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div class="checkbox p-0">
                                    <input id="checkbox1" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="text-muted" for="checkbox1">Remember password</label>
                                </div>
                                <!-- <a class="link" href="{{ route('password.request') }}">Forgot password?</a> -->
                                <div class="text-end mt-3">
                                    <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection