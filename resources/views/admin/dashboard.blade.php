@extends('admin.layouts.master')

@section('title', 'Dashboard | SweetTroops Baking Studio')


@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row invoice-card-row">
                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="card bg-warning invoice-card">
                        <div class="card-body d-flex">
                            <div class="icon me-3">
                                <i class="far fa-file-alt" style="color: white;"></i>
                            </div>
                            <div>
                                <h2 class="text-white invoice-num">{{ $CountAll }}</h2>
                                <span class="text-white fs-18">Total Invoices</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="card bg-success invoice-card">
                        <div class="card-body d-flex">
                            <div class="icon me-3">
                                <i class="far fa-file-alt" style="color: white;"></i>
                            </div>
                            <div>
                                <h2 class="text-white invoice-num">{{ $CountPaid }}</h2>
                                <span class="text-white fs-18">Paid Invoices</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="card bg-info invoice-card">
                        <div class="card-body d-flex">
                            <div class="icon me-3">
                                <i class="far fa-file-alt" style="color: white;"></i>
                            </div>
                            <div>
                                <h2 class="text-white invoice-num">{{ $CountUnpaid }}</h2>
                                <span class="text-white fs-18">Unpaid Invoices</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="card bg-secondary invoice-card">
                        <div class="card-body d-flex">
                            <div class="icon me-3">
                                <i class="fa fa-user" style="color: white;"></i>
                            </div>
                            <div>
                                <h2 class="text-white invoice-num">{{ $User }}</h2>
                                <span class="text-white fs-18">Pengguna</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-xxl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-xl-12">
                                    <div class="card-bx bg-blue">
                                        <img class="pattern-img" src="images/pattern/pattern6.png" alt="">
                                        <div class="card-info text-white">
                                            <img src="images/pattern/circle.png" class="mb-4" alt="">
                                            <h2 class="text-white card-balance">$824,571.93</h2>
                                            <p class="fs-16">Wallet Balance</p>
                                            <span>+0,8% than last week</span>
                                        </div>
                                        <a class="change-btn" href="javascript:void(0);"><i class="fa fa-caret-up up-ico"></i>Change<span class="reload-icon"><i class="fas fa-sync-alt reload active"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-xxl-6">
                    <div class="card">
                        <div class="card-header d-block d-sm-flex border-0">
                            <div class="me-3">
                                <h4 class="card-title mb-2">Previous Transactions</h4>
                                <span class="fs-12">Lorem ipsum dolor sit amet, consectetur</span>
                            </div>
                            <div class="card-tabs mt-3 mt-sm-0">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#monthly" role="tab">Monthly</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body tab-content p-0">
                            <div class="tab-pane active show fade" id="monthly" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md card-table transactions-table">
                                        <tbody>
                                            @foreach ($Transaction as $item)   
                                            <tr>
                                                <td>
                                                    <h6 class="fs-16 font-w600 mb-0"><a href="javascript:void(0);" class="text-black">{{ $item->user['name'] }}</a></h6>
                                                </td>
                                                <td>
                                                    <h6 class="fs-16 text-black font-w600 mb-0">{{ $item->room['title'] }}</h6>
                                                    <span class="fs-14">{{ $item->classtype['name'] }}</span>
                                                </td>
                                                <td><span class="fs-16 text-black font-w600">{{ $item->price }}</span></td>
                                                <td><span class="text-success fs-16 font-w500 text-end d-block">Completed</span></td>
                                            </tr>
                                            @endforeach
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
