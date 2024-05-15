@extends('admin.layouts.master')

@section('title', 'Users Class | SweetTroops Baking Studio')
@section('sub-title', 'User Class')

@section('button-add')
    <li>
        <div class="card-body">
            <div class="btn-group">
                <a href="{{ route('class.create',$user->id) }}" type="button" class="btn btn-sm btn-success"><i class="fa fa-plus color-info"></i> Add Class</a>
                <div class="btn-group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown">Import</button>
                </div>
            </div>
        </div>
    </li>
@endsection

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="mb-3 col-md-4">
                <h1>{{ $user->name }}</h1>
            </div>
        </div>
        <div class="row">
            @foreach ($competitions as $competition)
                <div class="col-lg-12 col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row m-b-30">
                                <div class="col-md-5 col-xxl-12">
                                    <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                        <div class="new-arrivals-img-contnent">
                                            <img class="img-fluid" src="{{ Storage::url($competition->room->images->first()->image ?? '') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7 col-xxl-12">
                                    <div class="new-arrival-content position-relative">
                                        <h4><a href="{{ route('rooms.show',$competition->room->id) }}">{{ $competition->room->title }}</a></h4>
                                        <div class="comment-review star-rating">
                                            <ul>
                                                <li>
                                                    @if ($competition->room->is_featured == '1')
                                                        <span class="badge badge-warning" >Featured</span>
                                                    @endif
                                                </li>
                                                <li>
                                                    @if ($competition->room->is_recommended == '1')
                                                        <span class="badge badge-info" >Recommended</span>
                                                    @endif
                                                </li>
                                            </ul>
                                            <br>
                                            <span class="review-text">(34 member) / </span><a class="product-review" href="" data-bs-toggle="modal" data-bs-target="#reviewModal">Write a review?</a>
                                            <p class="price">@currency($competition->room->disc_price)</p>
                                        </div>
                                        <p>price: <span style="color: green">@currency($competition->room->price)</span></p>
                                        <p>Is Active: <span class="item">
                                            @if ($competition->room->is_active == '1')
                                                Active <i class="fa fa-check-circle text-success"></i></span>
                                            @else
                                                Deactive <i class="fas fa-circle text-danger"></i></span>
                                            @endif
                                        </p>
                                        <p>Duration: <span class="item">{{ $competition->room->duration }}</span> </p>
                                        <p>Class Type:&nbsp;&nbsp;
                                            <span class="badge badge-danger light">{{ $competition->room->classtype['name'] }}</span>
                                        </p>
                                        <p>Category:&nbsp;&nbsp;
                                            <span class="badge badge-success light">{{ $competition->room->category['name'] }}</span>
                                        </p>
                                        <p>Description: <span class="item">{{ $competition->room->short_description }}</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection