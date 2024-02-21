@extends('admin.layouts.master')

@section('title', 'Dashboard | SweetTroops Baking Studio')


@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-xl-12">
                                    <div class="card-bx bg-blue">
                                        <img class="pattern-img" src="{{ asset('') }}admin/images/pattern/pattern6.png" alt="">
                                        <div class="card-info text-white">
                                            <div class="media me-2">
                                                @if(Auth::user()->profile?->avatar != null)
                                                <img src="{{ Storage::url(Auth::user()->profile->avatar) }}" width="70" alt="image">    
                                                @else
                                                <img src="{{asset('/admin/images/avatar/1.png')}}" width="70" alt="image">      
                                                @endif
                                                <br>
                                            </div>
                                            <h2 class="text-white card-balance">Go to my own Class</h2>
                                            <p class="fs-16">{{ Auth::user()->name }}</p>
                                            <span>{{ Auth::user()->email }}</span>
                                        </div>
                                        <a class="change-btn" href="javascript:void(0);"><i class="fa fa-caret-up up-ico"></i>My Class Room<span class="reload-icon"><i class="fas fa-sync-alt reload active"></i></span></a>
                                    </div>
                                    <br>
                                    <br>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-xxl-12">
                    <h3>Best Month Class Room 🔥</h3>
                    @foreach ($rooms as $room)
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
                                        @if ($room->is_joined)
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
            </div>
        </div>
    </div>
@endsection