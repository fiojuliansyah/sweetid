<div>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="mb-3 col-md-4">
                    <div class="input-group search-area">
                        <input wire:model="search" id="search" type="text" class="form-control" name="keyword" placeholder="Search...">
                    </div>   
                </div>
            </div>
            <div class="row">
                @foreach ($data as $room)
                    <div class="col-lg-12 col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row m-b-30">
                                    <div class="col-md-5 col-xxl-12">
                                        <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                            <div class="new-arrivals-img-contnent">
                                                <img class="img-fluid" src="{{ Storage::url($room->images->first()->image) }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-xxl-12">
                                        <div class="new-arrival-content position-relative">
                                            <h4><a href="{{ route('rooms.show',$room->id) }}">{{ $room->title }}</a></h4>
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
                                                <span class="review-text">(34 member) / </span><a class="product-review" href="" data-bs-toggle="modal" data-bs-target="#reviewModal">Write a review?</a>
                                                <p class="price">@currency($room->disc_price)</p>
                                            </div>
                                            <p>price: <span style="color: green">@currency($room->price)</span></p>
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
                                            <p>Description: <span class="item">{{ $room->short_description }}</span></p>
                                            <a href="{{ route('discussions.index',['room' => $room->id]) }}" class="btn btn-primary btn-sm">Discussion</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {!! $data->links() !!}
        </div>
    </div>
</div>
