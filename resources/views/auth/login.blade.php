@extends('mobile.layouts.app')

@section('tile', 'Login | SweetTroops - Baking Studio Apps')

@section('content')
    <div class="page-wraper">

        <!-- Preloader -->
        <div id="preloader">
            <div class="spinner"></div>
        </div>
        <!-- Preloader end-->

        <!-- Page Content -->
        <div class="page-content">

            <!-- Banner -->
            <div class="banner-wrapper">
                <div class="circle-1"></div>
                <div class="container inner-wrapper">
                    <h1 class="dz-title">SweetTroops</h1>
                    <p class="mb-0">Baking Studio App</p>
                </div>
            </div>
            <!-- Banner End -->
            <div class="account-box">
                <div class="container">
                    <div class="account-area">
                        <h3 class="title">Welcome back</h3>
                        <p style="color: red">ini masih proses production</p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="input-group input-mini mb-3">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                <input id="email" class="form-control" @error('email') is-invalid @enderror" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                                @error('email')
                                    <p style="color: red">ini masih proses production</p>
                                @enderror
                            </div>
                            <div class="mb-3 input-group input-mini">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                <input id="password" class="form-control" @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password">
                                @error('password')
                                    <p style="color: red">ini masih proses production</p>
                                @enderror
                            </div>
                            <div class="input-group">
                                <button type="submit" class="btn mt-2 btn-primary w-100 btn-rounded">SIGN IN</button>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input id="remember_me" name="remember" class="form-check-input" type="checkbox" value="" checked>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Keep Sign In
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="btn-link">Forgot password?</a>
                                @endif
                            </div>
                        </form>
                        <div class="text-center mb-auto p-tb20">
                            <a href="{{ route('register') }}" class="saprate">Don’t have an account?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Content End -->

        <!-- Footer -->
        <footer class="footer fixed">
            <div class="container">
                <a href="{{ route('register') }}" class="btn btn-transparent btn-rounded d-block">CREATE AN ACCOUNT</a>
            </div>
        </footer>
        <!-- Footer End -->
    </div>
@endsection
