@extends('admin.layouts.master')

@section('title')
Detail {{ $room->title }} | SweetTroops Baking Studio
@endsection
@section('sub-title')
{{ $room->title }}
@endsection
@section('button-add')
    @can('classtype-create')
    <li>
        <div class="card-body">
            <div class="btn-group">
                <a href="{{ route('member.market') }}" type="button" class="btn btn-sm btn-danger"><i class="flaticon-032-ellipsis"></i> Go To List</a>
            </div>
        </div>
    </li>
    @endcan
@endsection
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3 col-lg-6  col-md-6 col-xxl-5 ">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade show active" id="first">
                                        <img class="img-fluid" src="images/product/1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="tab-slide-content new-arrival-product mb-4 mb-xl-0">
                                    <!-- Nav tabs -->
                                    <ul class="nav slide-item-list mt-3" role="tablist">
                                        <li role="presentation" class="show">
                                                <img src="{{ Storage::url($room->cover) }}" width="300" alt="">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--Tab slider End-->
                            <div class="col-xl-9 col-lg-6  col-md-6 col-xxl-7 col-sm-12">
                                <div class="product-detail-content">
                                    <!--Product details-->
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#detail"><i class="la la-home me-2"></i> Detail</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#playlist"><i class="la la-user me-2"></i> Playlist</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#forum"><i class="la la-phone me-2"></i>  Forum</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="detail" role="tabpanel">
                                                <div class="pt-4">
                                                    <div class="new-arrival-content pr">
                                                        <div class="comment-review star-rating">
                                                            <ul>
                                                                <li>
                                                                    @if ($room->is_featured == '1')
                                                                        <span class="badge badge-warning" >Featured</span>
                                                                    @endif
                                                                </li>
                                                                <li>
                                                                    @if ($room->is_recommended == '1')
                                                                        <span class="badge badge-info" >Recommended</span>
                                                                    @endif
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="d-table mb-2">
                                                            <h4 style="text-decoration: line-through red;">@currency($room->price)</h4>
                                                            <p class="price float-start d-block">@currency($room->disc_price)</p>
                                                        </div>
                                                        <p>Is Active: <span class="item">
                                                            @if ($room->is_active == '1')
                                                                Active <i class="fa fa-check-circle text-success"></i></span>
                                                            @else
                                                                Deactive <i class="fas fa-circle text-danger"></i></span>
                                                            @endif
                                                        </p>
                                                        <p>Duration: <span class="item">{{ $room->duration }}</span> </p>
                                                        <p>Class Type:&nbsp;&nbsp;
                                                            <span class="badge badge-danger light">{{ $room->classtype['name'] }}</span>
                                                        </p>
                                                        <p>Category:&nbsp;&nbsp;
                                                            <span class="badge badge-success light">{{ $room->category['name'] }}</span>
                                                        </p>
                                                        <p class="text-content">{{ $room->description }}</p>
                                                        <div class="d-flex align-items-end flex-wrap mt-4">
                                                            <div class="filtaring-area me-3">
                                                                <div class="size-filter">
                                                                    <h4 class="m-b-15">Trailer Video</h4>
                                                                    <video width="600" height="350" controls autoplay controlsList="nodownload" oncontextmenu="return false;">
                                                                        <source src="{{ Storage::url($room->trailer) }}" type="video/mp4" />
                                                                    </video>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <a href="{{ route('member.checkout',$room->id) }}" class="btn btn-primary">Enroll Now <span class="btn-icon-end"><i class="fas fa-money-bill"></i></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="playlist">
                                                <div class="pt-4">
                                                    <h4>This is profile title</h4>
                                                    <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.
                                                    </p>
                                                    <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="forum">
                                                <div class="pt-4">
                                                    <h4>This is contact title</h4>
                                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.
                                                    </p>
                                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- review -->
        </div>
    </div>
</div>
@endsection