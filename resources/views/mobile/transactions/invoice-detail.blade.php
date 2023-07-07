@extends('mobile.layouts.app')
@section('title')
    Class Room Checkout | SweetTroops - Baking Studio Apps
@endsection
@section('css')
    <script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="SET_YOUR_CLIENT_KEY_HERE"></script>
@endsection
@section('content')
<div class="page-content">
    <div class="container bottom-content">
        <h6 class="item-title">Invoice : {{ $transaction->invoice_id }}</h6>
        <strong>{{ \Carbon\Carbon::parse($transaction->created_at)->format('d M Y') }}</strong>
        <div class="view-title row mb-5">
            {{-- <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12" style="font-size: 10px">
                <h6>From:</h6>
                <div> <strong>Sweet Troops Artisan Baking Studio</strong> </div>
                <div>Jl. Teuku Nyak Arief No.3, RT.3/RW.2,</div>
                <div> Grogol Sel., Kec. Kby. Lama, Kota Jakarta Selatan,</div>
                <div> Daerah Khusus Ibukota Jakarta 12220</div>
                <div>Phone: 0859-4591-2722</div>
                <div>Email: info@sweettroops.com</div>
            </div> --}}
            <div class="mt-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 d-flex justify-content-lg-end justify-content-md-center justify-content-xs-start" style="font-size: 10px">
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
            <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12" style="font-size: 10px">
                <h6>Detail Member</h6>
                <div> <strong>{{ $transaction->user['name'] }}</strong> </div>
                <div>Alamat: {{ $transaction->address }}</div>
                <div>{{ $transaction->phone }}</div>
                <div>{{ $transaction->user['email'] }}</div>
            </div>
        </div>
        <div class="item-list style-2">
            <ul>
                <li>
                    <div class="item-content">
                        <div class="item-inner">
                            <div class="item-title-row">
                                <div class="item-subtitle">{{ Str::limit($transaction->room['title'], 30) }}</div>
                                <div class="item-subtitle">{{ Str::limit($transaction->room['short_description'], 50) }}</div>
                                <div class="item-subtitle"><span class="badge badge-warning">{{ $transaction->classtype['name'] }}</span></div>
                            </div>
                            <div class="item-footer">
                                <div class="d-flex align-items-center">
                                    <h6 class="me-3">@currency($transaction->price)</h6>
                                    <del class="off-text">
                                        <h6>@currency($transaction->room['price'])</h6>
                                    </del>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="float-end">
                                        <strong>Status: @if ($transaction->status == '0')
                                            <span style="color: red">Unpaid</span>
                                        @elseif ($transaction->status == '1')
                                            <span style="color: green">Paid</span>
                                        @endif</strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="view-title">
            <ul>
                <li>
                    <span>Subtotal</span>
                    <span>@currency($transaction->room['price'])</span>
                </li>
                <li>
                    <span>Discount (<span id="discount"></span>%</strong>)</span>
                    <span>Rp. <span id="min_price"></span></span>
                </li>
                <li>
                    <h5>Total</h5>
                    <h5>@currency($transaction->price)</h5>
                </li>
            </ul>
        </div>
    </div>
    <div class="footer fixed ">
        <div class="container">
            <div class="footer-btn d-flex align-items-center">
                <button id="pay-button" class="btn btn-primary btn-rounded flex-1 ms-2">Pay Now</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')

<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
      window.snap.pay('{{$snapToken}}', {
        onSuccess: function(result){
          /* You may add your own implementation here */
          window.location.href = '/class/invoice/{{$transaction->id}}';
        //   alert("payment success!"); console.log(result);
        },
        onPending: function(result){
          /* You may add your own implementation here */
          alert("wating your payment!"); console.log(result);
        },
        onError: function(result){
          /* You may add your own implementation here */
          alert("payment failed!"); console.log(result);
        },
        onClose: function(){
          /* You may add your own implementation here */
          alert('you closed the popup without finishing the payment');
        }
      })
    });
</script>

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