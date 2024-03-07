@extends('mobile.layouts.app')
@section('title')
    {{ $room->title }} | SweetTroops - Baking Studio Apps
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
<div class="page-wraper">
    <!-- Page Content -->
    <div class="page-content">
        <div class="content-body fb">
            <div class="container">
                <div class="dz-lightgallery row g-2" id="lightgallery">
                    <a class="col-12">
                        <img src="{{ Storage::url($room->cover) }}" alt="image">
                    </a>
                </div>
                <br>
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
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge badge-sm badge-warning">{{ $room->classtype['name'] }}</span>
                            </div>
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
                                        aria-controls="profile-tab-pane" aria-selected="false">Community Forum</button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent1">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">
                                <div class="container pt-0">
                                    <!-- Masseges List -->
                                    <ul class="dz-list message-list">
                                        <li>
                                            <a href="javascript:void(0);" class="item-content item-link"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal4">
                                                <div class="rounded-circle">
                                                    <i class="fas fa-play" style="font-size: 30px;" ></i>
                                                </div>
                                                <div class="media-content">
                                                    <div>
                                                        <h6 class="name">Trailer Video</h6>
                                                        <p class="my-1">
                                                            {{ $room->title }}
                                                        </p>
                                                    </div>
                                                    <span class="time">02:00</span>
                                                </div>
                                            </a>
                                            <br>
                                            @if (Route::has('login'))
                                                @auth
                                                @foreach ($courses as $course)
                                                    <a href="#">
                                                        <div class="rounded-circle">
                                                            <i class="fas fa-lock" style="font-size: 20px;" ></i>
                                                        </div>
                                                        <div class="media-content">
                                                            <div>
                                                                <h6 class="name">Step 1</h6>
                                                                <p class="my-1">
                                                                {{ $course->title }}
                                                                </p>
                                                            </div>
                                                            <span class="time">{{ $course->duration }}</span>
                                                        </div>
                                                    </a>
                                                @endforeach
                                                @else
                                                    @foreach ($courses as $course)
                                                    <a href="#">
                                                        <div class="rounded-circle">
                                                            <i class="fas fa-lock" style="font-size: 20px;" ></i>
                                                        </div>
                                                        <div class="media-content">
                                                            <div>
                                                                <h6 class="name"></h6>
                                                                <p class="my-1">
                                                                {{ $course->title }}
                                                                </p>
                                                            </div>
                                                            <span class="time">{{ $course->duration }}</span>
                                                        </div>
                                                    </a>
                                                    @endforeach
                                                @endauth
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel"
                                aria-labelledby="profile-tab" tabindex="0">
                                @guest                                
                                  <p class="mb-0">Buy This Class to View Community</p>
                                @endguest
                                @auth
                                  @if ($room->is_joined)
                                    {{-- <div style="text-align: right;">
                                      <a href="{{ route('product.create.discussion', $room->id) }}" class="btn btn-primary btn-sm btn-rounded pull-right">Create Discussion</a>
                                    </div>                                   --}}
                                    @foreach ($room->discussions as $discussion)
                                      <div class="card">
                                        <div class="card-body">
                                          <div class="row">
                                            <div class="col">
                                              {{ $discussion->title }}
                                              <br><span class="blockquote-footer">{{ $discussion->user->name .' - '. $discussion->created_at }}</span>
                                            </div>
                                            <div class="col">
                                              <div class="d-flex justify-content-end">
                                                <a href="{{ route('product.discussion', $discussion->id) }}">
                                                  <div class="badge badge-primary badge-pill">Lihat</div>
                                                </a>                                            
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>                                    
                                    @endforeach
                                  @else
                                    <p class="mb-0">Buy This Class to View Community</p>
                                  @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<script src="{{ asset('') }}mobile/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
<script>
    $(".stepper").TouchSpin();
</script>
<script>
    var w = {{ $room->price }};
    var x = {{ $room->disc_price }};
    var y = w - x;
    var z1 = y / {{ $room->price }} * 100;
    var z2 = Math.ceil(z1);
    document.getElementById("discount").innerHTML = z2;
</script>
@endsection