@extends('admin.layouts.master')

@section('title')
Checkout {{ $room->title }} | SweetTroops Baking Studio
@endsection
@section('sub-title')
{{ $room->title }}
@endsection

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 order-lg-2 mb-4">
                                <ul class="list-group mb-3">
                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div>
                                            <img class="img-fluid" src="{{ Storage::url($room->images->first()->image ?? '') }}" alt="">
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div>
                                            <h6 class="my-0"><strong> {{ $room->classtype['name'] }} </strong> {{ $room->title }}</h6>
                                            <small class="text-muted">{{ $room->short_description }}</small>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <span style="color: green">@currency($room->price)</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between active">
                                        <div class="text-white">
                                            <h6 class="my-0 text-white">Discount</h6>
                                        </div>
                                        <span class="text-white"><strong><span id="discount"></span>%</strong></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Total (IDR)</span>
                                        <strong>@currency($room->disc_price)</strong>
                                    </li>
                                </ul>

                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Promo code">
                                        <button type="submit" class="input-group-text">Redeem</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-8 order-lg-1">
                                <h4 class="mb-3">Billing address</h4>
                                <form action="{{ route('member.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                                    <input type="hidden" name="status" value="0">
                                    <input type="hidden" name="payment_method" value="Debit">
                                    <input type="hidden" name="price" value="{{ $room->disc_price }}">
                                    <input type="hidden" name="classtype_id" value="{{ $room->classtype['id'] }}">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">First name</label>
                                            <input type="text" class="form-control"  name="user_id" readonly value="{{ Auth::user()->name }}" required="">
                                            <div class="invalid-feedback">
                                                Valid first name is required.
                                            </div>
                                        </div>
                                        @if($user ? $user->profile?->phone : '')        
                                        <div class="col-md-6 mb-3">
                                            <label for="lastName" class="form-label">Phone</label>
                                            <input type="text" class="form-control" name="phone" value="{{ $user ? $user->profile?->phone : '' }}" required="">
                                            <div class="invalid-feedback">
                                                Valid last name is required.
                                            </div>
                                        </div>                                   
                                        @else

                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Email <span class="text-muted">(Optional)</span></label>
                                        <input type="email" class="form-control" readonly name="email" value="{{ Auth::user()->email }}">
                                        <div class="invalid-feedback">
                                            Please enter a valid email address for shipping updates.
                                        </div>
                                    </div>
                                    @if ($user ? $user->profile?->address : '') 
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" name="address" value="{{ $user ? $user->profile?->address : '' }}" required="">
                                        <div class="invalid-feedback">
                                            Please enter your shipping address.
                                        </div>
                                    </div>
                                    @else
                                    @endif
                                    <div class="form-check custom-checkbox mb-2">
                                        <input type="checkbox" class="form-check-input" id="save-info">
                                        <label class="form-check-label" for="save-info">Save this
                                            information
                                            for next
                                            time</label>
                                    </div>
                                    <hr class="mb-4">
                                    @if ($user ? $user->profile?->address : '') 
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to
                                        payment</button>
                                    @else
                                    <p style="color: red">*Lengkapi No Telepon dan Alamat di Profile</p>
                                    <a href="{{ route('profile.edit') }}" class="btn btn-warning btn-lg btn-block" type="submit">Go To Profile</a>
                                    @endif
                                </form>
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
<script>
    var w = {{ $room->price }};
    var x = {{ $room->disc_price }};
    var y = w - x;
    var z1 = y / {{ $room->price }} * 100;
    var z2 = Math.ceil(z1);
    document.getElementById("discount").innerHTML = z2;
</script>
@endsection