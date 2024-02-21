@extends('mobile.layouts.app')
@section('title')
    Class Room List | SweetTroops - Baking Studio Apps
@endsection

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
<div class="page-content">
    <div class="container">
        <div class="search-area">
            <form>
                <div class="mb-3 input-group input-radius">
                    <span class="input-group-text">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M20.5605 18.4395L16.7528 14.6318C17.5395 13.446 18 12.0262 18 10.5C18 6.3645 14.6355 3 10.5 3C6.3645 3 3 6.3645 3 10.5C3 14.6355 6.3645 18 10.5 18C12.0262 18 13.446 17.5395 14.6318 16.7528L18.4395 20.5605C19.0245 21.1462 19.9755 21.1462 20.5605 20.5605C21.1462 19.9748 21.1462 19.0252 20.5605 18.4395ZM5.25 10.5C5.25 7.605 7.605 5.25 10.5 5.25C13.395 5.25 15.75 7.605 15.75 10.5C15.75 13.395 13.395 15.75 10.5 15.75C7.605 15.75 5.25 13.395 5.25 10.5Z"
                                fill="#B9B9B9" />
                        </svg>
                    </span>
                    <input type="text" placeholder="Search beverages or foods"
                        class="form-control main-in ps-0 bs-0">
                </div>
            </form>
            <div class="swiper-btn-center-lr">
                <div class="swiper-container mt-4 categorie-swiper">
                    <div class="swiper-wrapper">
                        @foreach ($allCategory as $cat)
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

            <!-- TITLE -->
            {{-- <h4 class="title my-4">{{ $allCategory->name }} Class Room</h4> --}}
            <!-- TITLE -->

            <div class="item-list recent-jobs-list">
                <ul>
                    @foreach ($rooms as $room)           
                    <li>
                        <div class="item-content">
                            <div class="item-inner">
                                <div class="item-title-row">
                                    <h6 class="item-title"><a href="{{ route('product.show',$room->id) }}">{{ $room->title }} <span class="badge badge-sm badge-warning">{{ $room->classtype['name'] }}</span></a></h6>
                                    <div class="item-subtitle">{{ $room->short_description }}</div>
                                </div>
                                <div class="item-footer">
                                    <div class="d-flex align-items-center">
                                        <h6 class="me-3">@currency($room->disc_price)</h6>
                                        <del class="off-text">
                                            <h6>@currency($room->price)</h6>
                                        </del>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        @if ($room->is_recommended == '1')
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="badge badge-sm badge-info">Recomended</span>
                                        </div> 
                                        @endif
                                        @if ($room->is_featured == '1')
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="badge badge-sm badge-secondary">Featured</span>
                                        </div> 
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="item-media media media-90"><img src="{{ Storage::url($room->images->first()->image) }}"
                                    alt="logo">
                                <a href="javascript:void(0);" class="item-bookmark icon-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16.785 2.04751C15.9489 2.04694 15.1209 2.21163 14.3486 2.53212C13.5764 2.85261 12.8751 3.32258 12.285 3.91501L12 4.18501L11.73 3.91501C11.1492 3.2681 10.4424 2.74652 9.65306 2.3822C8.86367 2.01787 8.00824 1.81847 7.13912 1.79618C6.27 1.7739 5.40547 1.9292 4.59845 2.25259C3.79143 2.57599 3.05889 3.06066 2.44566 3.67695C1.83243 4.29325 1.35142 5.02819 1.03206 5.83682C0.712696 6.64544 0.561704 7.51073 0.588323 8.37973C0.614942 9.24873 0.818613 10.1032 1.18687 10.8907C1.55513 11.6783 2.08022 12.3824 2.73002 12.96L12 22.2675L21.3075 12.96C22.2015 12.0677 22.8109 10.9304 23.0589 9.6919C23.3068 8.45338 23.1822 7.16915 22.7006 6.00144C22.2191 4.83373 21.4023 3.83492 20.3534 3.13118C19.3045 2.42744 18.0706 2.05034 16.8075 2.04751H16.785Z"
                                            fill="white" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                {{-- <div class="saprater"></div> --}}
            </div>
            <!-- Job List -->
        </div>
    </div>
</div>
@endsection