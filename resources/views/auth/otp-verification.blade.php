@extends('mobile.layouts.app')

@section('tile', 'OTP | SweetTroops - Baking Studio Apps')

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
                    <h3 class="title">Verifikasi No Handphone/Whatsapp</h3>
                    <form id="send-otp" method="post" action="{{ route('new.get-otp') }}">
                        @csrf
                        <div class="row">
                            <div class="col-8">
                                <x-input-label class="form-label" for="phone" :value="__('phone')" />
                                <input id="phone" name="phone" type="text" class="form-control"
                                    value="{{ $user ? $user->profile?->phone : '' }}" required autofocus
                                    autocomplete="phone" />
                                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                            </div>
                            <div class="col-4">
                                <x-input-label class="form-label" for="phone" :value="__('')" />
                                <x-primary-button class="btn btn-primary" form="send-otp"
                                    type="submit">{{ __('Send OTP') }}</x-button>
                            </div>
                        </div>
                        @if (session('status') === 'verification-link-sent')
                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600" style="color: rgb(5, 66, 12)">
                                {{ __('Verification link sent.') }}</p>
                        @endif
                    </form>
                    <form id="verify-otp" action="{{ route('profile.verify-otp') }}" method="POST" class="mt-3">
                        @csrf
                        <x-input-label class="form-label" for="otp" :value="__('OTP')" />
                        <input id="otp" name="otp" type="text" class="form-control"
                            value="{{ $user ? $user->profile?->otp : '' }}" required autofocus autocomplete="otp" />
                        <x-input-error class="mt-2" :messages="$errors->get('otp')" />
                        <div class="flex items-center gap-4 mt-3">
                            <x-primary-button class="btn btn-primary" form="verify-otp">{{ __('Submit') }}</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content End -->

    <!-- Footer -->
    <!-- Footer End -->
    </div>
@endsection
