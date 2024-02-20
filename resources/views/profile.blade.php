@extends('mobile.layouts.app')

@section('title', 'Profil | SweetTroops - Baking Studio Apps')
@section('navbar')
<header class="header">
    <div class="main-bar">
        <div class="container">
            <div class="header-content">
                <div class="left-content">
                    <a href="{{ url('home') }}">
                        <svg width="18" height="18" viewBox="0 0 10 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.03033 0.46967C9.2966 0.735936 9.3208 1.1526 9.10295 1.44621L9.03033 1.53033L2.561 8L9.03033 14.4697C9.2966 14.7359 9.3208 15.1526 9.10295 15.4462L9.03033 15.5303C8.76406 15.7966 8.3474 15.8208 8.05379 15.6029L7.96967 15.5303L0.96967 8.53033C0.703403 8.26406 0.679197 7.8474 0.897052 7.55379L0.96967 7.46967L7.96967 0.46967C8.26256 0.176777 8.73744 0.176777 9.03033 0.46967Z"
                                fill="#a19fa8" />
                        </svg>
                    </a>
                    <h5 class="mb-0 ms-2">Back</h5>
                </div>
                <div class="mid-content">
                </div>
            </div>
        </div>
    </div>
</header>
@endsection

@section('content')
<div class="page-content bottom-content ">
    <div class="container profile-area">
        <div class="profile">
            <div class="media media-100">
                <img src="{{ asset('') }}mobile/images/avatar/1.jpg" alt="/">
                <svg class="progress-style" height="100" width="100">
                    <circle id="round-1" cx="60" cy="60" r="50" stroke="#E8EFF3" stroke-width="7" fill="none" />
                    <circle id="round-2" cx="60" cy="60" r="50" stroke="#C3AC58" stroke-width="7" fill="none" />
                </svg>
            </div>
            <div class="mb-2">
                <h4>{{ Auth::user()->name }}</h4>
                <h6 class="detail">{{ Auth::user()->email }}</h6>
            </div>
        </div>
        <div class="contact-section">
            <div class="d-flex justify-content-between align-item-center">
                <h5 class="title">Contacts</h5>
                <a href="javascript:void(0);" class="btn-link">Edit</a>
            </div>
            <br>
            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>
            <form method="post" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')
                <div>
                    <x-input-label class="form-label" for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="form-control" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <br>
                <div>
                    <x-input-label class="form-label" for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="form-control" :value="old('email', $user->email)" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div>
                            <p class="text-sm mt-2 text-gray-800">
                                {{ __('Your email address is unverified.') }}
                                <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>
                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-600">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>
                <br>
                <div class="flex items-center gap-4">
                    <x-primary-button class="btn btn-primary">{{ __('Save') }}</x-primary-button>
                    @if (session('status') === 'profile-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600"
                            style="color: green"
                        >{{ __('Saved.') }}</p>
                    @endif
                </div>
            </form>
            <br>
            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>
            <form action="{{ url('profile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <x-input-label class="form-label" for="avatar" :value="__('Avatar')" />
                    <input id="avatar" name="avatar" type="file" class="form-control" value="{{ $user ? $user->profile?->avatar : '' }}" autofocus autocomplete="avatar" />
                    <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
                </div>
                <br>
                <div>
                    <x-input-label class="form-label" for="thumbnail" :value="__('thumbnail')" />
                    <input id="thumbnail" name="thumbnail" type="file" class="form-control" value="{{ $user ? $user->profile?->thumbnail : '' }}" autofocus autocomplete="thumbnail" />
                    <x-input-error class="mt-2" :messages="$errors->get('thumbnail')" />
                </div>
                <br>
                <div>
                    <x-input-label class="form-label" for="address" :value="__('address')" />
                    <input id="address" name="address" type="text" class="form-control" value="{{ $user ? $user->profile?->address : '' }}" required autofocus autocomplete="address" />
                    <x-input-error class="mt-2" :messages="$errors->get('address')" />
                </div>
                <br>        
                <br>
                <div class="flex items-center gap-4">
                    <x-primary-button class="btn btn-primary">{{ __('Save') }}</x-primary-button>
                    @if (session('status') === 'profile-updated-successfully')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600"
                            style="color: green"
                        >{{ __('Saved.') }}</p>
                    @endif
                </div>
            </form>    
            <div class="mt-4">       
                <form id="send-otp" method="post" action="{{ route('profile.get-otp') }}">
                    @csrf
                    <div class="row">
                        <div class="col-8">
                            <x-input-label class="form-label" for="phone" :value="__('phone')" />
                            <input id="phone" name="phone" type="text" class="form-control" value="{{ $user ? $user->profile?->phone : '' }}" required autofocus autocomplete="phone" />
                            <x-input-error class="mt-2" :messages="$errors->get('phone')" />                   
                        </div>
                        <div class="col-4">   
                            <x-input-label class="form-label" for="phone" :value="__('')" />             
                            <x-primary-button class="btn btn-primary" form="send-otp" type="submit"
                            >{{ __('Send OTP') }}</x-button>
                        </div>
                    </div>
                    @if (session('status') === 'verification-link-sent')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600"
                            style="color: rgb(5, 66, 12)"
                        >{{ __('Verification link sent.') }}</p>
                    @endif
                </form>
                </div>
                <form id="verify-otp" action="{{ route('profile.verify-otp') }}" method="POST" class="mt-3">
                @csrf
                    <x-input-label class="form-label" for="otp" :value="__('OTP')" />
                    <input id="otp" name="otp" type="text" class="form-control" value="{{ $user ? $user->profile?->otp : '' }}" required autofocus autocomplete="otp" />
                    <x-input-error class="mt-2" :messages="$errors->get('otp')" />
                    <div class="flex items-center gap-4 mt-3">
                        <x-primary-button class="btn btn-primary" form="verify-otp">{{ __('Save') }}</x-button>                
                    </div>
                </form>
            </div>
            <br>
            <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('put')
                <div>
                    <x-input-label for="current_password" :value="__('Current Password')" />
                    <x-text-input id="current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" style="color:red"/>
                </div>
                <br>
                <div>
                    <x-input-label for="password" :value="__('New Password')" />
                    <x-text-input id="password" name="password" type="password" class="form-control" autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" style="color:red" />
                </div>
                <br>
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" style="color:red" />
                </div>
                <br>
                <div class="flex items-center gap-4">
                    <x-primary-button class="btn btn-primary">{{ __('Save') }}</x-primary-button>
        
                    @if (session('status') === 'password-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600"
                            style="color: green"
                        >{{ __('Saved.') }}</p>
                    @endif
                </div>
            </form>
            <br>
            <div class="d-flex justify-content-between align-item-center">
                <h5 class="title">Your Reward 🏆</h5>
                <a href="javascript:void(0);" class="btn-link">History</a>
            </div>
            <div class="swiper-btn-center-lr">
                <div class="swiper-container mt-4 offer-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="offer-bx">
                                <div class="offer-content">
                                    <h6>Order 10 packs French Fries Deluxe</h6>
                                    <small>4 days ago</small>
                                </div>
                                <div class="point">
                                    <h5 class="title">150</h5>
                                    <small class="d-block">Pts</small>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="offer-bx">
                                <div class="offer-content">
                                    <h6>Order 10 packs French Fries Deluxe</h6>
                                    <small>4 days ago</small>
                                </div>
                                <div class="point">
                                    <h5 class="title">150</h5>
                                    <small class="d-block">Pts</small>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="offer-bx">
                                <div class="offer-content">
                                    <h6>Order 10 packs French Fries Deluxe</h6>
                                    <small>4 days ago</small>
                                </div>
                                <div class="point">
                                    <h5 class="title">150</h5>
                                    <small class="d-block">Pts</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection