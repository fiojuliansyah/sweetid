@extends('mobile.layouts.app')
@section('title')
    Class Room Checkout | SweetTroops - Baking Studio Apps
@endsection

@section('content')
<div class="page-wraper">

    <!-- Preloader -->
    <div id="preloader">
        <div class="spinner"></div>
    </div>
    <!-- Preloader end-->

    <!-- Header -->
    <header class="header transparent">
        <div class="main-bar">
            <div class="container">
                <div class="header-content">
                    <div class="left-content">
                        <a href="javascript:void(0);" class="back-btn">
                            <svg width="18" height="18" viewBox="0 0 10 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.03033 0.46967C9.2966 0.735936 9.3208 1.1526 9.10295 1.44621L9.03033 1.53033L2.561 8L9.03033 14.4697C9.2966 14.7359 9.3208 15.1526 9.10295 15.4462L9.03033 15.5303C8.76406 15.7966 8.3474 15.8208 8.05379 15.6029L7.96967 15.5303L0.96967 8.53033C0.703403 8.26406 0.679197 7.8474 0.897052 7.55379L0.96967 7.46967L7.96967 0.46967C8.26256 0.176777 8.73744 0.176777 9.03033 0.46967Z"
                                    fill="#fff" />
                            </svg>
                        </a>
                        <h5 class="mb-0 ms-2 text-nowrap">Order</h5>
                    </div>
                    <div class="mid-content">
                    </div>
                    <div class="right-content">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Page Content -->
    <div class="page-content">
        <div class="content-body">
            <div class="dz-banner-heading position-relative">
                <div class="overlay-black-light style-2">
                    <img src="{{ Storage::url($room->images->first()->image ?? '') }}" class="bnr-img" alt="">
                </div>
                <div class="banner-content">
                    <div class="container">
                        <h4 class="mb-1 text-white">{{ $room->title }}</h4>
                        <p class="address mb-2">
                            {{ $room->short_description }}
                        </p>
                        <span class="text-style">Price</span>
                        <h3>@currency($room->disc_price)<del> @currency($room->price)</del></h3>
                        <span class="badge badge-sm badge-warning">{{ $room->classtype['name'] }}</span>
                        <ul class="timeline mb-2">
                            @if ( $room->is_featured == '1' )
                            <li>
                                <span class="badge badge-sm badge-secondary">Featured</span> 
                            </li>
                            @endif
                            @if ( $room->is_recommended == '1' )
                            <li>
                                <span class="badge badge-sm badge-info">Recommended</span> 
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="featured-box">
                <div class="container">
                    <div class="title-bar mt-0">
                        <h5 class="title">Detail Information</h5>
                    </div>
                    <div class="row g-3">
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                                    <input type="hidden" name="status" value="0">
                                    <input type="hidden" name="payment_method" value="Debit">
                                    <input type="hidden" name="price" value="{{ $room->disc_price }}">
                                    <input type="hidden" name="classtype_id" value="{{ $room->classtype['id'] }}">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">First name</label>
                                            <input type="text" class="form-control"  name="user_id" readonly value="{{ Auth::user()->name }}" required="">
                                            <div class="invalid-feedback">
                                                Valid first name is required.
                                            </div>
                                        </div>
                                        @if($user ? $user->phone : '')        
                                        <div class="col-md-6 mb-3">
                                            <label for="lastName" class="form-label">Phone</label>
                                            <input type="text" class="form-control" name="phone" value="{{ $user ? $user->phone : '' }}" required="">
                                            <div class="invalid-feedback">
                                                Valid last name is required.
                                            </div>
                                        </div>                                   
                                        @else

                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Email <span class="text-muted">(Optional)</span></label>
                                        <input type="email" class="form-control" readonly name="email" value="{{ Auth::user()->email }}">
                                        <div class="invalid-feedback">
                                            Please enter a valid email address for shipping updates.
                                        </div>
                                    </div>
                                    @if ($user ? $user->profile?->address : '') 
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" name="address" value="{{ $user ? $user->profile?->address : '' }}" required="">
                                        <div class="invalid-feedback">
                                            Please enter your shipping address.
                                        </div>
                                    </div>
                                    @else
                                    @endif
                                    <div class="form-check custom-checkbox mb-2">
                                        <input type="checkbox" class="form-check-input" id="save-info">
                                        <label class="form-check-label" for="save-info">Save this
                                            information
                                            for next
                                            time</label>
                                    </div>
                                    <hr class="mb-4">
                                    @if ($user ? $user->profile?->address : '') 
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to
                                        payment</button>
                                    @else
                                    <p style="color: red">*Lengkapi No Telepon dan Alamat di Profile</p>
                                    <a href="{{ route('profile.edit') }}" class="btn btn-warning btn-lg btn-block" type="submit">Go To Profile</a>
                                    @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content End-->
</div>
@endsection