@extends('mobile.layouts.app')

@section('tile', 'Forgot Password | SweetTroops - Baking Studio Apps')

@section('content')
    <div class="page-content">

        <!-- Banner -->
        <div class="banner-wrapper shape-1">
            <div class="container inner-wrapper">
                <h2 class="dz-title">Forgot Password</h2>
                <p class="mb-0">Please enter your Email</p>
            </div>
        </div>
        <!-- Banner -->
        <div class="account-box">
            <div class="container">
                <div class="account-area">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="mb-3 input-group input-mini">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus >
                        </div>
                        <div class="input-group">
                            <button type="submit" class="btn mt-2 btn-primary w-100 btn-rounded">SEND LINK VERIFICATION</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content End -->

    <!-- Footer -->
    <footer class="footer fixed">
        <div class="container">
            <a href="{{ route('register') }}" class="btn btn-primary light btn-rounded text-primary d-block">CREATE ACCOUNT</a>
        </div>
    </footer>

    {{-- <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form> --}}
@endsection
