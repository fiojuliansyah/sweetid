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
                    <div class="col-xl-3 col-lg-6 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="new-arrivals-img-contnent">
                                        <img class="img-fluid" src="{{ Storage::url($room->images->first()->image ?? '') }}" alt="">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4><a href="{{ route('member.detail',$room->id) }}">{{ $room->title }}</a></h4>
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
                                        <p style="text-decoration: line-through red; font-size: 20px;">@currency($room->price)</p> 
                                        <span class="price">@currency($room->disc_price)</span>
                                    </div>
                                    <p>Duration: <span class="item">{{ $room->duration }}</span> </p>
                                    <p>Class Type:&nbsp;&nbsp;
                                        <span class="badge badge-danger light">{{ $room->classtype['name'] }}</span>
                                    </p>
                                    <p>Category:&nbsp;&nbsp;
                                        <span class="badge badge-success light">{{ $room->category['name'] }}</span>
                                    </p>
                                    <p>Description: <span class="item">{{ $room->short_description }}</span></p>
                                    <div class="col text-center">
                                      @if ($room->is_joined).
                                        <a href="{{ route('member.detail',$room->id) }}" class="btn btn-primary">View Detail <span class="btn-icon-end"><i class="fas fa-eye"></i></span>
                                        </a>
                                      @else
                                        <a href="{{ route('member.checkout',$room->id) }}" class="btn btn-primary">Enroll Now <span class="btn-icon-end"><i class="fas fa-money-bill"></i></span>
                                        </a>
                                      @endif
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
