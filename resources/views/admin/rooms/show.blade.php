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
                <a href="{{ route('rooms.index') }}" type="button" class="btn btn-sm btn-danger"><i class="flaticon-032-ellipsis"></i> Go To List</a>
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
                                            <br>
                                            <span class="review-text">(34 reviews) / </span><a class="product-review" href="" data-bs-toggle="modal" data-bs-target="#reviewModal">Write a review?</a>
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
                                        <p>Product code: <span class="item">{{ $room->duration }}</span> </p>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- review -->
            <div class="modal fade" id="reviewModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Review</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="text-center mb-4">
                                    <img class="img-fluid rounded" width="78" src="images/avatar/1.jpg" alt="DexignZone">
                                </div>
                                <div class="mb-3">
                                    <div class="rating-widget mb-4 text-center">
                                        <!-- Rating Stars Box -->
                                        <div class="rating-stars">
                                            <ul id="stars">
                                                <li class="star" title="Poor" data-value="1">
                                                    <i class="fa fa-star fa-fw"></i>
                                                </li>
                                                <li class="star" title="Fair" data-value="2">
                                                    <i class="fa fa-star fa-fw"></i>
                                                </li>
                                                <li class="star" title="Good" data-value="3">
                                                    <i class="fa fa-star fa-fw"></i>
                                                </li>
                                                <li class="star" title="Excellent" data-value="4">
                                                    <i class="fa fa-star fa-fw"></i>
                                                </li>
                                                <li class="star" title="WOW!!!" data-value="5">
                                                    <i class="fa fa-star fa-fw"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" placeholder="Comment" rows="5"></textarea>
                                </div>
                                <button class="btn btn-success btn-block">RATE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection