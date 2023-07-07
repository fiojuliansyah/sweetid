@extends('admin.layouts.master')

@section('title')
Invoice {{ $transaction->room['title'] }} | SweetTroops Baking Studio
@endsection
@section('sub-title')
{{ $transaction->room['title'] }}
@endsection

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="card mt-3">
                    <div class="card-header"> Invoice : {{ $transaction->invoice_id }}<strong>{{ \Carbon\Carbon::parse($transaction->created_at)->format('d M Y') }}</strong>
                            <span class="float-end">
                            <strong>Status: @if ($transaction->status == '0')
                                <span style="color: red">Unpaid</span>
                            @elseif ($transaction->status == '1')
                                <span style="color: green">Paid</span>
                            @endif</strong>
                            </span>
                    </div>
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                <h6>From:</h6>
                                <div> <strong>Sweet Troops Artisan Baking Studio</strong> </div>
                                <div>Jl. Teuku Nyak Arief No.3, RT.3/RW.2,</div>
                                <div> Grogol Sel., Kec. Kby. Lama, Kota Jakarta Selatan,</div>
                                <div> Daerah Khusus Ibukota Jakarta 12220</div>
                                <div>Phone: 0859-4591-2722</div>
                                <div>Email: info@sweettroops.com</div>
                            </div>
                            <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                <h6>To:</h6>
                                <div> <strong>{{ $transaction->user['name'] }}</strong> </div>
                                <div>Alamat: {{ $transaction->address }}</div>
                                <div>{{ $transaction->phone }}</div>
                                <div>{{ $transaction->user['email'] }}</div>
                            </div>
                            <div class="mt-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 d-flex justify-content-lg-end justify-content-md-center justify-content-xs-start">
                                <div class="row align-items-center">
                                    <div class="col-sm-9"> 
                                        <div class="brand-logo mb-3">
                                            <img class="logo-abbr me-2" width="50" src="{{ asset('') }}admin/images/logo.png" alt="">
                                            <img class="logo-compact" width="110" src="{{ asset('') }}admin/images/logo-text.png" alt="">
                                        </div>
                                        <span>Please send exact amount: <strong class="d-block">0.15050000 BTC</strong>
                                            <strong>1DonateWffyhwAjskoEwXt83pHZxhLTr8H</strong></span><br>
                                        <small class="text-muted">Current exchange rate 1BTC = $6590 USD</small>
                                    </div>
                                    <div class="col-sm-3 mt-3"> <img src="{{ asset('') }}admin/images/qr.png" alt="" class="img-fluid width110"> </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th>Class</th>
                                        <th>Description</th>
                                        <th class="center">Class Type</th>
                                        <th class="right">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="center">1</td>
                                        <td class="left strong">{{ Str::limit($transaction->room['title'], 30) }}</td>
                                        <td class="left">{{ Str::limit($transaction->room['short_description'], 50) }}</td>
                                        <td class="center">{{ $transaction->classtype['name'] }}</td>
                                        <td class="right">@currency($transaction->room['price'])</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-5"> </div>
                            <div class="col-lg-4 col-sm-5 ms-auto">
                                <table class="table table-clear">
                                    <tbody>
                                        <tr>
                                            <td class="left"><strong>Subtotal</strong></td>
                                            <td class="right">@currency($transaction->room['price'])</td>
                                        </tr>
                                        <tr>
                                            <td class="left"><strong>Discount (<span id="discount"></span>%</strong>)</td>
                                            <td class="right">Rp. <span id="min_price"></span></strong></td>
                                        </tr>
                                        <tr>
                                            <td class="left"><strong>Total</strong></td>
                                            <td class="right"><strong>@currency($transaction->price)</strong><br>
                                        </tr>
                                    </tbody>
                                </table>
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
    var w = {{ $transaction->room['price'] }};
    var x = {{ $transaction->room['disc_price'] }};
    var y = w - x;
    var z1 = y / {{ $transaction->room['price'] }} * 100;
    var z2 = Math.ceil(z1);
    document.getElementById("discount").innerHTML = z2;

    var a = {{ $transaction->room['price'] }};
    var b = {{ $transaction->room['disc_price'] }};
    var c = a - b;

    let num = c;
    let rupiahFormat = num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    console.log(rupiahFormat); // 12.345

    document.getElementById("min_price").innerHTML = rupiahFormat;

</script>
@endsection