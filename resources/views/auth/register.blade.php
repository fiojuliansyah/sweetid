@extends('mobile.layouts.app')

@section('tile', 'Sign Up | SweetTroops - Baking Studio Apps')

@section('content')
    <div class="page-wraper">

        <!-- Preloader -->
        {{-- <div id="preloader">
            <div class="spinner"></div>
        </div> --}}
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
                        <h3 class="title">Create your account</h3>
                        <p>Lorem ipsum dolor sit amet</p>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="input-group input-mini mb-3">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                <input id="name" class="form-control" type="text" name="name"
                                    :value="old('name')" required autofocus autocomplete="name" placeholder="nama kamu">
                            </div>
                            <div class="mb-3 input-group input-mini">
                                <span class="input-group-text"><i class="fa fa-at"></i></span>
                                <input id="email" class="form-control" @error('email') is-invalid @enderror"
                                    type="email" name="email" :value="old('email')" required autocomplete="email"
                                    placeholder="email">
                            </div>
                            {{-- <div class="mb-3 input-group input-mini">
                                <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                <input id="phone" class="form-control" @error('phone') is-invalid @enderror" type="phone" name="phone" :value="old('phone')" required autocomplete="phone" placeholder="no whatsapp aktif">
                            </div> --}}
                            <div class="mb-3 input-group input-mini">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                <input id="password" class="form-control" @error('password') is-invalid @enderror"
                                    type="password" name="password" required autocomplete="new-password"
                                    placeholder="password">
                            </div>
                            <div class="mb-3 input-group input-mini">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                <input id="password_confirmation" class="form-control"
                                    @error('password_confirmation') is-invalid @enderror" type="password"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="confirm password">
                            </div>
                            <div class="input-group">
                                <button type="submit" class="btn mt-2 btn-primary w-100 btn-rounded">SIGN UP</button>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                        checked>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        By tapping “Sign Up” you accept our <a href="javascript:void(0);"
                                            class="text-primary" data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvasBottom2" aria-controls="offcanvasBottom">terms</a>
                                        and <a href="javascript:void(0);" class="text-primary" data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvasBottom2" aria-controls="offcanvasBottom">Condition</a>
                                    </label>
                                </div>
                            </div>
                        </form>
                        <div class="text-center mb-auto p-tb20">
                            <a href="{{ route('login') }}" class="saprate">Already have account?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Content End -->

        <!-- Footer -->
        <footer class="footer fixed">
            <div class="container">
                <a href="{{ url('authorized/google') }}" class="btn mt-2 btn-dark w-100 btn-rounded"><img
                        src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" width="20"
                        alt="">&nbsp; &nbsp;Sign Up With Google Account</a>
            </div>
            <div class="container">
                <a href="{{ route('login') }}" class="btn btn-transparent btn-rounded d-block">SIGN IN</a>
            </div>
        </footer>
        <!-- Footer End -->
        <!-- CART -->
        <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom2">
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="offcanvas-body">
                <h4 class="title border-bottom pb-2 mb-2">Terms & Condition</h4>
                <p class="mb-0">Lorem ipsum dolor sit amet const Lorem ipsum dolor sit amet const Lorem ipsum dolor sit
                    amet const Lorem ipsum dolor sit amet const.</p>
            </div>
        </div>
        <!-- CART -->
    </div>
@endsection
