@extends('mobile.layouts.master')

@section('tile', 'Home | SweetTroops - Baking Studio Apps')


@section('header')
<header class="header transparent">
    <div class="main-bar">
        <div class="container">
            <div class="header-content">
                <div class="left-content">
                    <a href="javascript:void(0);" class="menu-toggler">
                        <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 24 24" width="30px"
                            fill="#000000">
                            <path
                                d="M13 14v6c0 .55.45 1 1 1h6c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1h-6c-.55 0-1 .45-1 1zm-9 7h6c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1zM3 4v6c0 .55.45 1 1 1h6c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1zm12.95-1.6L11.7 6.64c-.39.39-.39 1.02 0 1.41l4.25 4.25c.39.39 1.02.39 1.41 0l4.25-4.25c.39-.39.39-1.02 0-1.41L17.37 2.4c-.39-.39-1.03-.39-1.42 0z" />
                        </svg>
                    </a>
                </div>
                <div class="mid-content">
                </div>
                <div class="right-content">
                    <a href="javascript:void(0);" class="theme-color" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
                        <svg class="color-plate" xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 24 24"
                            width="30px" fill="#000000">
                            <path
                                d="M12 3c-4.97 0-9 4.03-9 9s4.03 9 9 9c.83 0 1.5-.67 1.5-1.5 0-.39-.15-.74-.39-1.01-.23-.26-.38-.61-.38-.99 0-.83.67-1.5 1.5-1.5H16c2.76 0 5-2.24 5-5 0-4.42-4.03-8-9-8zm-5.5 9c-.83 0-1.5-.67-1.5-1.5S5.67 9 6.5 9 8 9.67 8 10.5 7.33 12 6.5 12zm3-4C8.67 8 8 7.33 8 6.5S8.67 5 9.5 5s1.5.67 1.5 1.5S10.33 8 9.5 8zm5 0c-.83 0-1.5-.67-1.5-1.5S13.67 5 14.5 5s1.5.67 1.5 1.5S15.33 8 14.5 8zm3 4c-.83 0-1.5-.67-1.5-1.5S16.67 9 17.5 9s1.5.67 1.5 1.5-.67 1.5-1.5 1.5z" />
                        </svg>
                    </a>
                    <a href="javascript:void(0);" class="theme-btn">
                        <svg class="dark" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
                            height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                            <g></g>
                            <g>
                                <g>
                                    <g>
                                        <path
                                            d="M11.57,2.3c2.38-0.59,4.68-0.27,6.63,0.64c0.35,0.16,0.41,0.64,0.1,0.86C15.7,5.6,14,8.6,14,12s1.7,6.4,4.3,8.2 c0.32,0.22,0.26,0.7-0.09,0.86C16.93,21.66,15.5,22,14,22c-6.05,0-10.85-5.38-9.87-11.6C4.74,6.48,7.72,3.24,11.57,2.3z" />
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <svg class="light" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
                            height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                            <rect fill="none" height="24" width="24" />
                            <path
                                d="M12,7c-2.76,0-5,2.24-5,5s2.24,5,5,5s5-2.24,5-5S14.76,7,12,7L12,7z M2,13l2,0c0.55,0,1-0.45,1-1s-0.45-1-1-1l-2,0 c-0.55,0-1,0.45-1,1S1.45,13,2,13z M20,13l2,0c0.55,0,1-0.45,1-1s-0.45-1-1-1l-2,0c-0.55,0-1,0.45-1,1S19.45,13,20,13z M11,2v2 c0,0.55,0.45,1,1,1s1-0.45,1-1V2c0-0.55-0.45-1-1-1S11,1.45,11,2z M11,20v2c0,0.55,0.45,1,1,1s1-0.45,1-1v-2c0-0.55-0.45-1-1-1 C11.45,19,11,19.45,11,20z M5.99,4.58c-0.39-0.39-1.03-0.39-1.41,0c-0.39,0.39-0.39,1.03,0,1.41l1.06,1.06 c0.39,0.39,1.03,0.39,1.41,0s0.39-1.03,0-1.41L5.99,4.58z M18.36,16.95c-0.39-0.39-1.03-0.39-1.41,0c-0.39,0.39-0.39,1.03,0,1.41 l1.06,1.06c0.39,0.39,1.03,0.39,1.41,0c0.39-0.39,0.39-1.03,0-1.41L18.36,16.95z M19.42,5.99c0.39-0.39,0.39-1.03,0-1.41 c-0.39-0.39-1.03-0.39-1.41,0l-1.06,1.06c-0.39,0.39-0.39,1.03,0,1.41s1.03,0.39,1.41,0L19.42,5.99z M7.05,18.36 c0.39-0.39,0.39-1.03,0-1.41c-0.39-0.39-1.03-0.39-1.41,0l-1.06,1.06c-0.39,0.39-0.39,1.03,0,1.41s1.03,0.39,1.41,0L7.05,18.36z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection

@section('sidebar')
<div class="sidebar">
    <div class="author-box">
        <div class="dz-media">
            @if (Route::has('login'))
                @auth
                    @if(Auth::user()->profile?->avatar != null)
                        <img src="{{ Storage::url(Auth::user()->profile->avatar) }}"  alt="author-image">       
                    @else
                        <img src="{{asset('/storage/avatars/default.png')}}"  alt="author-image">  
                    @endif
                    @else
                    <img src="{{asset('/storage/avatars/default.png')}}"  alt="author-image"> 
                @endauth    
            @endif
        </div>
        <div class="dz-info">
            <span>Good Morning</span>
            @if (Route::has('login'))
                <div>
                    @auth
                        <h5 class="name">{{ Auth::user()->name }}</h5>
                    @else
                        <h5 class="name">Guest</h5>
                    @endauth
                </div>
            @endif
        </div>
    </div>
    <ul class="nav navbar-nav">
        <li class="nav-label">Main Menu</li>
        <li><a class="nav-link" href="index.html">
                <span class="dz-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                        fill="#000000">
                        <path
                            d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z" />
                    </svg>
                </span>
                <span>Home</span>
            </a>
        </li>
        @if (Route::has('login'))
                <div>
                    @auth
                    <li>
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <span class="dz-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px"
                                    viewBox="0 0 24 24" width="24px" fill="#000000">
                                    <g></g>
                                    <g>
                                        <g>
                                            <path
                                                d="M5,5h6c0.55,0,1-0.45,1-1v0c0-0.55-0.45-1-1-1H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h6c0.55,0,1-0.45,1-1v0 c0-0.55-0.45-1-1-1H5V5z" />
                                            <path
                                                d="M20.65,11.65l-2.79-2.79C17.54,8.54,17,8.76,17,9.21V11h-7c-0.55,0-1,0.45-1,1v0c0,0.55,0.45,1,1,1h7v1.79 c0,0.45,0.54,0.67,0.85,0.35l2.79-2.79C20.84,12.16,20.84,11.84,20.65,11.65z" />
                                        </g>
                                    </g>
                                </svg>
                            </span>
                            <span>Logout</span>              
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    @else
                    <li><a class="nav-link" href="{{ route('login') }}">
                        <span class="dz-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px"
                                    viewBox="0 0 24 24" width="24px" fill="#000000">
                                    <g></g>
                                    <g>
                                        <g>
                                            <path
                                                d="M5,5h6c0.55,0,1-0.45,1-1v0c0-0.55-0.45-1-1-1H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h6c0.55,0,1-0.45,1-1v0 c0-0.55-0.45-1-1-1H5V5z" />
                                            <path
                                                d="M20.65,11.65l-2.79-2.79C17.54,8.54,17,8.76,17,9.21V11h-7c-0.55,0-1,0.45-1,1v0c0,0.55,0.45,1,1,1h7v1.79 c0,0.45,0.54,0.67,0.85,0.35l2.79-2.79C20.84,12.16,20.84,11.84,20.65,11.65z" />
                                        </g>
                                    </g>
                            </svg>
                        </span>
                        <span>Login or Register</span>
                    </a>
                </li>
                    @endauth
                </div>
         @endif
        <li class="nav-label">Admin Panel</li>
        <li>
            <a class="nav-link" href="{{ url('/admin/dashboard') }}">
                <span class="dz-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                        fill="#000000">
                        <path
                            d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z" />
                    </svg>
                </span>
                <span>Dekstop Mode</span>
            </a>
        </li>
        <li class="nav-color" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
            aria-controls="offcanvasBottom">
            <a href="javascript:void(0);" class="nav-link">
                <span class="dz-icon">
                    <svg class="color-plate" xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 24 24"
                        width="30px" fill="#000000">
                        <path
                            d="M12 3c-4.97 0-9 4.03-9 9s4.03 9 9 9c.83 0 1.5-.67 1.5-1.5 0-.39-.15-.74-.39-1.01-.23-.26-.38-.61-.38-.99 0-.83.67-1.5 1.5-1.5H16c2.76 0 5-2.24 5-5 0-4.42-4.03-8-9-8zm-5.5 9c-.83 0-1.5-.67-1.5-1.5S5.67 9 6.5 9 8 9.67 8 10.5 7.33 12 6.5 12zm3-4C8.67 8 8 7.33 8 6.5S8.67 5 9.5 5s1.5.67 1.5 1.5S10.33 8 9.5 8zm5 0c-.83 0-1.5-.67-1.5-1.5S13.67 5 14.5 5s1.5.67 1.5 1.5S15.33 8 14.5 8zm3 4c-.83 0-1.5-.67-1.5-1.5S16.67 9 17.5 9s1.5.67 1.5 1.5-.67 1.5-1.5 1.5z" />
                    </svg>
                </span>
                <span>Highlights</span>
            </a>
        </li>
        <li>
            <div class="mode">
                <span class="dz-icon">
                    <svg class="dark" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
                        height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                        <g></g>
                        <g>
                            <g>
                                <g>
                                    <path
                                        d="M11.57,2.3c2.38-0.59,4.68-0.27,6.63,0.64c0.35,0.16,0.41,0.64,0.1,0.86C15.7,5.6,14,8.6,14,12s1.7,6.4,4.3,8.2 c0.32,0.22,0.26,0.7-0.09,0.86C16.93,21.66,15.5,22,14,22c-6.05,0-10.85-5.38-9.87-11.6C4.74,6.48,7.72,3.24,11.57,2.3z" />
                                </g>
                            </g>
                        </g>
                    </svg>
                </span>
                <span class="text-dark">Dark Mode</span>
                <div class="custom-switch">
                    <input type="checkbox" class="switch-input theme-btn" id="toggle-dark-menu">
                    <label class="custom-switch-label" for="toggle-dark-menu"></label>
                </div>
            </div>
        </li>
    </ul>
    <div class="sidebar-bottom">
        <h6 class="name">SweetTroops - Baking Studio</h6>
        <p>App Version 1.0</p>
    </div>
</div>
@endsection

@section('content')
    <div class="author-notification">
        <div class="container inner-wrapper">
            <div class="dz-info">
                <span class="text-dark">Good Morning</span>
                @if (Route::has('login'))
                    <div>
                        @auth
                            <h3 class="name mb-0">{{ Auth::user()->name }} 👋</h3>
                        @else
                            <h3 class="name mb-0">Guest 👋 <a href="{{ route('login') }}" class="badge badge-secondary">Login or Register</a></h3>
                        @endauth
                    </div>
                @endif
            </div>
            <a href="javascript:void(0);" class="position-relative me-2 notify-cart" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasBottom2" aria-controls="offcanvasBottom">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M18.1776 17.8443C16.6362 17.8428 15.3854 19.0912 15.3839 20.6326C15.3824 22.1739 16.6308 23.4247 18.1722 23.4262C19.7136 23.4277 20.9643 22.1794 20.9658 20.638C20.9658 20.6371 20.9658 20.6362 20.9658 20.6353C20.9644 19.0955 19.7173 17.8473 18.1776 17.8443Z"
                        fill="#2C406E" />
                    <path
                        d="M23.1278 4.47973C23.061 4.4668 22.9932 4.46023 22.9251 4.46012H5.93181L5.66267 2.65958C5.49499 1.46381 4.47216 0.574129 3.26466 0.573761H1.07655C0.481978 0.573761 0 1.05574 0 1.65031C0 2.24489 0.481978 2.72686 1.07655 2.72686H3.26734C3.40423 2.72586 3.52008 2.82779 3.53648 2.96373L5.19436 14.3267C5.42166 15.7706 6.66363 16.8358 8.12528 16.8405H19.3241C20.7313 16.8423 21.9454 15.8533 22.2281 14.4747L23.9802 5.74121C24.0931 5.15746 23.7115 4.59269 23.1278 4.47973Z"
                        fill="#2C406E" />
                    <path
                        d="M11.3404 20.5158C11.2749 19.0196 10.0401 17.8418 8.54244 17.847C7.0023 17.9092 5.80422 19.2082 5.86645 20.7484C5.92617 22.2262 7.1283 23.4008 8.60704 23.4262H8.67432C10.2142 23.3587 11.4079 22.0557 11.3404 20.5158Z"
                        fill="#2C406E" />
                </svg>
                {{-- <span class="badge badge-danger counter">5</span> --}}
            </a>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Page Content -->
    <div class="page-content">

        <div class="content-inner pt-0">
            <div class="container fb">
                <!-- Search -->
                <form>
                    <div class="mb-3 input-group input-radius">
                        <span class="input-group-text">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M20.5605 18.4395L16.7528 14.6318C17.5395 13.446 18 12.0262 18 10.5C18 6.3645 14.6355 3 10.5 3C6.3645 3 3 6.3645 3 10.5C3 14.6355 6.3645 18 10.5 18C12.0262 18 13.446 17.5395 14.6318 16.7528L18.4395 20.5605C19.0245 21.1462 19.9755 21.1462 20.5605 20.5605C21.1462 19.9748 21.1462 19.0252 20.5605 18.4395ZM5.25 10.5C5.25 7.605 7.605 5.25 10.5 5.25C13.395 5.25 15.75 7.605 15.75 10.5C15.75 13.395 13.395 15.75 10.5 15.75C7.605 15.75 5.25 13.395 5.25 10.5Z"
                                    fill="#B9B9B9" />
                            </svg>
                        </span>
                        <input type="text" placeholder="Search learning of baking"
                            class="form-control main-in ps-0 bs-0">
                    </div>
                </form>

                <!-- Dashboard Area -->
                <div class="dashboard-area">
                    <!-- Categorie -->
                    <div class="d-flex justify-content-between align-item-center">
                        <h5 class="title">Class Type 🏆</h5>
                        {{-- <a href="javascript:void(0);" class="btn-link">View All</a> --}}
                    </div>
                    <div class="swiper-btn-center-lr">
                        <div class="swiper-container mt-4 offer-swiper">
                            <div class="swiper-wrapper">
                                @foreach ($classtype as $class)
                                    <div class="swiper-slide">
                                        <div class="offer-bx">
                                            <div class="offer-content">
                                                <h6>{{ $class->name }}</h6>
                                                <small> <b>1410</b> Students</small>
                                            </div>
                                            <div class="icon-bx bg-primary">
                                                <img src="{{ Storage::url($class->icon) }}" width="35" alt="">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Categorie End -->
                    <!-- Categorie -->
                    <div class="swiper-btn-center-lr">
                        <div class="swiper-container mt-4 categorie-swiper">
                            <div class="swiper-wrapper">
                                @foreach ($category as $cat)
                                <div class="swiper-slide">
                                    <a href="{{ route('product.category',$cat->slug) }}" class="categore-box style-2 secondary">
                                        <div class="icon-bx">
                                            <img src="{{ Storage::url($cat->icon) }}" width="35" alt="">
                                        </div>
                                    <span class="title">{{ $cat->name }}</span>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Categorie End -->
                    <!-- Recent -->
                    <div class="m-b10">
                        <div class="swiper-btn-center-lr">
                            <div class="swiper-container tag-group mt-4 recomand-swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="card add-banner bg-secondary">
                                            <div class="circle-1"></div>
                                            <div class="circle-2"></div>
                                            <div class="card-body">
                                                <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.alamy.com%2Fstock-photo%2Fcake-banner.html&psig=AOvVaw0jQqRORBwZ7tXSjSguiC1f&ust=1684831784714000&source=images&cd=vfe&ved=0CBEQjRxqFwoTCKiO_NHFiP8CFQAAAAAdAAAAABAE" alt="">
                                                <div class="card-info">
                                                    <span>Happy Weekend</span>
                                                    <h2 data-text="60% OFF" class="title m-t10">60% OFF</h2>
                                                    <small>*for All Lessons</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card add-banner bg-primary">
                                            <div class="circle-1"></div>
                                            <div class="circle-2"></div>
                                            <div class="card-body">
                                                <div class="card-info">
                                                    <span>Happy Weekend</span>
                                                    <h2 data-text="60% OFF" class="title m-t10">60% OFF</h2>
                                                    <small>*for All Lessons</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card add-banner bg-success">
                                            <div class="circle-1"></div>
                                            <div class="circle-2"></div>
                                            <div class="card-body">
                                                <div class="card-info">
                                                    <span>Happy Weekend</span>
                                                    <h2 data-text="60% OFF" class="title m-t10">60% OFF</h2>
                                                    <small>*for All Lessons</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Recent -->

                    <!-- Recomended Start -->
                    <div class="title-bar">
                        <h5 class="title">Recomended 👌</h5>
                        <a class="btn-link" href="product.html">View more</a>
                    </div>

                    <div class="swiper-btn-center-lr">
                        <div class="swiper-container tag-group mt-4 recomanded-swiper">
                            <div class="swiper-wrapper">
                                @foreach ($rooms as $room)
                                    @if ($room->is_recommended == '1')
                                        <div class="swiper-slide">
                                            <div class="recomended-list">
                                                <div class="image-box">
                                                    <img src="{{ Storage::url($room->cover) }}" alt="image">
                                                </div>
                                                <div class="text-content">
                                                    <a href="{{ route('product.show',$room->id) }}">
                                                        <h6 class="title">{{ Str::limit($room->title, 20) }}</h6>
                                                    </a>
                                                    <div class="d-flex justify-content-between align-items-center m-t10">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <span class="badge badge-sm badge-danger">{{ $room->category['name'] }}</span>
                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <span class="badge badge-sm badge-warning">{{ $room->classtype['name'] }}</span>
                                                        </div>
                                                    </div>   
                                                    <strong class="title" style="text-decoration: line-through red; font-size: 10px;">@currency($room->price)</strong>
                                                    <h6 class="title">@currency($room->disc_price)</h6>
                                                </div>
                                            </div>
                                        </div>  
                                    @endif       
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Recomended Start -->

                    <!-- Item box Start -->
                    <div class="title-bar">
                        <h5 class="title">Trending this week &#128293;</h5>
                    </div>
                    @foreach ($rooms as $room)
                        @if ($room->is_featured == '1')
                            <div class="item-box">
                                <div class="item-media">
                                    <img src="{{ Storage::url($room->cover) }}" width="100" alt="food">
                                </div>
                                <div class="item-content">
                                    <a href="{{ route('product.show',$room->id) }}">
                                        <h6 class="mb-0">{{ Str::limit($room->title, 50) }}</h6>
                                    </a>
                                    <div class="item-footer">
                                        <div class="row">
                                            <strong style="text-decoration: line-through red; font-size: 13px;">@currency($room->price)</strong>
                                            <h6>@currency($room->disc_price)</h6>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center m-t10">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="badge badge-sm badge-danger">{{ $room->category['name'] }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="badge badge-sm badge-warning">{{ $room->classtype['name'] }}</span>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <!-- Item box Start -->
                    <a href="{{ route('product.list') }}" class="btn btn-outline-primary btn-rounded btn-block">VIEW MORE</a>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('section')
    <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom">
        <div class="offcanvas-body small">
            <ul class="theme-color-settings">
                <li>
                    <input class="filled-in" id="primary_color_8" name="theme_color" type="radio"
                        value="color-primary" />
                    <label for="primary_color_8"></label>
                    <span>Default</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_2" name="theme_color" type="radio"
                        value="color-green" />
                    <label for="primary_color_2"></label>
                    <span>Green</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_3" name="theme_color" type="radio"
                        value="color-blue" />
                    <label for="primary_color_3"></label>
                    <span>Blue</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_4" name="theme_color" type="radio"
                        value="color-pink" />
                    <label for="primary_color_4"></label>
                    <span>Pink</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_5" name="theme_color" type="radio"
                        value="color-yellow" />
                    <label for="primary_color_5"></label>
                    <span>Yellow</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_6" name="theme_color" type="radio"
                        value="color-orange" />
                    <label for="primary_color_6"></label>
                    <span>Orange</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_7" name="theme_color" type="radio"
                        value="color-purple" />
                    <label for="primary_color_7"></label>
                    <span>Purple</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_1" name="theme_color" type="radio"
                        value="color-red" />
                    <label for="primary_color_1"></label>
                    <span>Red</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_9" name="theme_color" type="radio"
                        value="color-lightblue" />
                    <label for="primary_color_9"></label>
                    <span>Lightblue</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_10" name="theme_color" type="radio"
                        value="color-teal" />
                    <label for="primary_color_10"></label>
                    <span>Teal</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_11" name="theme_color" type="radio"
                        value="color-lime" />
                    <label for="primary_color_11"></label>
                    <span>Lime</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_12" name="theme_color" type="radio"
                        value="color-deeporange" />
                    <label for="primary_color_12"></label>
                    <span>Deeporange</span>
                </li>
            </ul>
        </div>
    </div>
    <!-- Theme Color Settings End -->
    <!-- CART -->
    <div class="offcanvas offcanvas-bottom rounded-0" tabindex="-1" id="offcanvasBottom2">
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <div class="offcanvas-body container fixed">
            <div class="item-list style-2">
                <ul>
                    <li>
                        <div class="item-content">
                            <div class="item-media media media-60">
                                <img src="{{ asset('') }}mobile/images/food/pic6.png" alt="logo">
                            </div>
                            <div class="item-inner">
                                <div class="item-title-row">
                                    <h6 class="item-title"><a href="order-list.html">Chicken Briyani Haji
                                            Mahmud</a>
                                    </h6>
                                    <div class="item-subtitle">Coffe, Milk</div>
                                </div>
                                <div class="item-footer">
                                    <div class="d-flex align-items-center">
                                        <h6 class="me-3">$ 4.0</h6>
                                        <del class="off-text">
                                            <h6>$ 8.9</h6>
                                        </del>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="dz-stepper border-1 ">
                                            <input class="stepper" type="text" value="3" name="demo3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item-content">
                            <div class="item-media media media-60">
                                <img src="{{ asset('') }}mobile/images/food/food1.png" alt="logo">
                            </div>
                            <div class="item-inner">
                                <div class="item-title-row">
                                    <h6 class="item-title"><a href="order-list.html">Deluxe Super Burger Spicy</a>
                                    </h6>
                                    <div class="item-subtitle">Coffe, Milk</div>
                                </div>
                                <div class="item-footer">
                                    <div class="d-flex align-items-center">
                                        <h6 class="me-3">$ 7.2</h6>
                                        <del class="off-text">
                                            <h6>$ 8.9</h6>
                                        </del>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="dz-stepper border-1 ">
                                            <input class="stepper" type="text" value="3" name="demo3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item-content">
                            <div class="item-media media media-60">
                                <img src="{{ asset('') }}mobile/images/food/pic3.png" alt="logo">
                            </div>
                            <div class="item-inner">
                                <div class="item-title-row">
                                    <h6 class="item-title"><a href="order-list.html">Coffee Mocha / White
                                            Mocha</a>
                                    </h6>
                                    <div class="item-subtitle">Coffe, Milk</div>
                                </div>
                                <div class="item-footer">
                                    <div class="d-flex align-items-center">
                                        <h6 class="me-3">$ 12.0</h6>
                                        <del class="off-text">
                                            <h6>$ 8.9</h6>
                                        </del>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="dz-stepper border-1 ">
                                            <input class="stepper" type="text" value="3" name="demo3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="view-title">
                <div class="container">
                    <ul>
                        <li>
                            <a href="javascript:void(0);" class="promo-bx">
                                Apply Promotion Code
                                <span>2 Promos</span>
                            </a>
                        </li>
                        <li>
                            <span>Subtotal</span>
                            <span>$54.76</span>
                        </li>
                        <li>
                            <span>TAX (2%)</span>
                            <span>-$1.08</span>
                        </li>
                        <li>
                            <h5>Total</h5>
                            <h5>$53.68</h5>
                        </li>
                    </ul>
                    <a href="payment.html" class="btn btn-primary btn-rounded btn-block flex-1 ms-2">CONFIRM</a>
                </div>
            </div>
        </div>
    </div>
    <!-- CART -->

    <!-- PWA Offcanvas -->
    {{-- <div class="offcanvas offcanvas-bottom pwa-offcanvas">
        <div class="container">
            <div class="offcanvas-body small">
                <img class="logo" src="{{ asset('') }}mobile/images/icon.png" alt="">
                <h5 class="title">SweetTroops on Your Home Screen</h5>
                <p>Install SweetTroops - Food Restaurant on your home screen, and access it just like a regular app
                </p>
                <a href="javascrpit:void(0);" class="btn btn-sm btn-primary pwa-btn">Add to Home Screen</a>
                <a href="javascrpit:void(0);" class="btn btn-sm pwa-close light btn-secondary ms-2">Maybe
                    later</a>
            </div>
        </div>
    </div>
    <div class="offcanvas-backdrop pwa-backdrop"></div> --}}
@endsection
