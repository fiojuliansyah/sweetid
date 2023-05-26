@extends('mobile.layouts.app')
@section('title')
    {{ $room->title }} | SweetTroops - Baking Studio Apps
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
                        <h5 class="mb-0 ms-2 text-nowrap">Product Detail</h5>
                    </div>
                    <div class="mid-content">
                    </div>
                    <div class="right-content d-flex align-items-center">
                        <a href="javascript:void(0);" class="item-bookmark icon-2 mb-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.785 2.04751C15.9489 2.04694 15.1209 2.21163 14.3486 2.53212C13.5764 2.85261 12.8751 3.32258 12.285 3.91501L12 4.18501L11.73 3.91501C11.1492 3.2681 10.4424 2.74652 9.65306 2.3822C8.86367 2.01787 8.00824 1.81847 7.13912 1.79618C6.27 1.7739 5.40547 1.9292 4.59845 2.25259C3.79143 2.57599 3.05889 3.06066 2.44566 3.67695C1.83243 4.29325 1.35142 5.02819 1.03206 5.83682C0.712696 6.64544 0.561704 7.51073 0.588323 8.37973C0.614942 9.24873 0.818613 10.1032 1.18687 10.8907C1.55513 11.6783 2.08022 12.3824 2.73002 12.96L12 22.2675L21.3075 12.96C22.2015 12.0677 22.8109 10.9304 23.0589 9.6919C23.3068 8.45338 23.1822 7.16915 22.7006 6.00144C22.2191 4.83373 21.4023 3.83492 20.3534 3.13118C19.3045 2.42744 18.0706 2.05034 16.8075 2.04751H16.785Z"
                                    fill="white"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->


    <!-- Page Content -->
    <div class="page-content">
        <div class="content-body fb">
            <div class="swiper-btn-center-lr my-0">
                <div class="swiper-container demo-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="dz-banner-heading">
                                <div class="overlay-black-light">
                                    <img src="{{ Storage::url($room->cover) }}" class="bnr-img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-btn">
                        <div class="swiper-pagination style-2 flex-1"></div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="company-detail">
                    <div class="detail-content">
                        <div class="flex-1">
                            <h4>{{ $room->title }}</h4>
                            <p>{{ $room->short_description }}</p>
                        </div>
                    </div>
                    <ul class="item-inner">
                        <li>
                            <div class="reviews-info">
                                <i class="fa fa-star"></i>
                                <h6 class="reviews">4.5</h6>
                            </div>
                        </li>
                        <li>
                            <i class="fa-solid fa-clock"></i>
                            <h6 class="mb-0 ms-2">{{ $room->duration }}</h6>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="item-content item-link"
                                data-bs-toggle="modal" data-bs-target="#exampleModal4">
                                <div class="dz-inner">
                                    <span class="badge badge-warning"> <marquee behavior="" direction="">View Trailer</marquee> </span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="modal fade" tabindex="-1" id="exampleModal4" aria-labelledby="exampleModal4" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body text-center small p-4">
                                <video width="300" controls autoplay controlsList="nodownload" oncontextmenu="return false;">
                                    <source src="{{ Storage::url($room->trailer) }}" type="video/mp4" />
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-list-2">
                    <div class="price">
                        <span class="text-style">Price</span>
                        <h3>@currency($room->disc_price)<del> @currency($room->price)</del></h3>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="badge badge-danger font-w400 px-3">20% OFF DISCOUNT</div>
                    <a href="javascript:void(0);" class="btn-link font-16">Apply promo code</a>
                </div>
                <div class="card-body">
                    <div class="dz-tab">
                        <div class="tab-slide-effect">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="tab-active-indicator"></li>
                                <li class="nav-item active" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home-tab-pane" type="button" role="tab"
                                        aria-controls="home-tab-pane" aria-selected="true">Playlist</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile-tab-pane" type="button" role="tab"
                                        aria-controls="profile-tab-pane" aria-selected="false">Dark</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                        data-bs-target="#contact-tab-pane" type="button" role="tab"
                                        aria-controls="contact-tab-pane" aria-selected="false">Content</button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent1">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">
                                <ul>
                                    <li>1</li>
                                    <li>1</li>
                                    <li>1</li>
                                    <li>1</li>
                                    <li>1</li>
                                    <li>1</li>
                                    <li>1</li>
                                    <li>1</li>
                                    <li>1</li>
                                    <li>1</li>
                                    <li>1</li><li>1</li>
                                    <li>1</li>
                                    <li>1</li>
                                    <li>1</li>
                                    <li>1</li>
                                    <li>1</li><li>1</li>
                                    <li>1</li>
                                    <li>1</li>
                                    <li>1</li>

                                    <li>1</li>
                                    <li>1</li>
                                    
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel"
                                aria-labelledby="profile-tab" tabindex="0">
                                <h6>Dark Ready</h6>
                                <p class="mb-0">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel"
                                aria-labelledby="contact-tab" tabindex="0">
                                <p class="mb-0">Lorem ipsum, dolor sit amet consectetur adipisicing elit
                                    Lorem ipsum, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content End -->

    <!-- Theme Color Settings -->
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

    <!-- Footer -->
    <div class="footer fixed">
        <div class="container">
            @if (Route::has('login'))
                <div>
                    @auth
                        <a href="order.html" class="btn btn-primary text-start w-100 btn-rounded">
                            ENROLL NOW
                        </a>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-primary text-start w-100 btn-rounded">
                        LOGIN or REGISTER
                    </a>
                    @endauth
                </div>
            @endif
        </div>
    </div>
    <!-- Footer End -->

</div>
@endsection
@section('footer')
<script src="{{ asset('') }}mobile/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
<script>
    $(".stepper").TouchSpin();
</script>
@endsection