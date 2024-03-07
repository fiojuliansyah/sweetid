@extends('mobile.layouts.app')
@section('title')
    My Class Room | SweetTroops - Baking Studio Apps
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
    <div class="container bottom-content">
        <div class="serach-area">
            <div class="item-list style-2 recent-jobs-list">
                <ul>
                    @foreach ($myClass as $myclass)
                    <li>
                        <div class="item-content">
                            <div class="item-media media media-60">
                                <img src="{{ Storage::url($myclass->room->images->first()->image ?? '') }}" alt="logo">
                            </div>
                            <div class="item-inner">
                                <div class="item-title-row">
                                    <h6 class="item-title"><a href="{{ route('class.show', $myclass->room->id) }}">{{ $myclass->room['title'] }}</a></h6>
                                </div>
                                <div class="item-footer">
                                    <div class="d-flex align-items-center">
                                        <span class="badge badge-sm badge-danger">{{ $myclass->room->category['name'] }}</span>
                                        <span class="badge badge-sm badge-warning">{{ $myclass->room->classtype['name'] }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- Job List -->
        </div>
    </div>
</div>

@endsection