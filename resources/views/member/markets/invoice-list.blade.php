@extends('admin.layouts.master')

@section('title', 'My Order | SweetTroops Baking Studio')
@section('sub-title', 'My Order')   
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="d-flex flex-wrap align-items-center mb-3">
            <div class="mb-3 me-auto">
                <div class="card-tabs style-1 mt-3 mt-sm-0">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript:void(0);" data-bs-toggle="tab" id="transaction-tab" data-bs-target="#AllTransaction" role="tab">All transaction</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-bs-toggle="tab" id="Completed-tab" data-bs-target="#Completed" role="tab">unpaid</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-bs-toggle="tab" id="Pending-tab" data-bs-target="#Pending" role="tab">Paid</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mb-3 col-md-4">
                <div class="input-group search-area">
                    <input wire:model="search" id="search" type="text" class="form-control" name="keyword" placeholder="Search...">
                </div>   
            </div>
            <a href="javascript:void(0);" class="btn btn-outline-primary mb-3"><i class="fa fa-calendar me-3 scale3"></i>Filter Date</a>
        </div>
        <div class="row">
            
        </div>
        <div class="row">
            <div class="col-xl-12 tab-content">
                <div class="tab-pane fade show active" id="AllTransaction" role="tabpanel" aria-labelledby="transaction-tab">
                    <div class="table-responsive fs-14">
                        <table class="table card-table display mb-4 dataTablesCard text-black" id="example5">
                            <thead>
                                <tr>
                                    <th>ID Invoice</th>
                                    <th>Date</th>
                                    <th>Class Room</th>
                                    <th>Recipient</th>
                                    <th>Amount</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (Auth::check())
                                    @foreach ($invoices as $inv)
                                    <tr>
                                        <td><span>{{ $inv->invoice_id }}</span></td>
                                        <td><span class="text-nowrap">{{ \Carbon\Carbon::parse($inv->created_at)->format('M d Y') }}</span></td>
                                        <td><span>{{ Str::limit($inv->room['title'], 40) }}</span></td>
                                        <td>
                                            <h6 class="fs-16 mb-0 text-nowrap">{{ $inv->user['name'] }}</h6>
                                        </td>
                                        <td><span>@currency($inv->price)</span></td>
                                        <td>
                                            <span>{{ $inv->classtype['name'] }}</span>
                                        </td>
                                        @if ( $inv->status == '0' )
                                        <td><a href="javascript:void(0)" class="btn btn-danger btn-rounded light">Unpaid</a></td> 
                                        
                                        @elseif ( $inv->status == '1' )
                                        <td><a href="javascript:void(0)" class="btn btn-success btn-rounded light">Paid</a></td>

                                        @endif
                                        @if ( $inv->status == '0' )
                                        <td>
                                            <a href="{{ route('member.checkout',$inv->room['id']) }}" class="btn btn-sm btn-success">Pay Now</a>
                                        </td>
                                        @else
                                            
                                        @endif
                                    </tr>
                                    @endforeach
                                    @else
                                @endif
                            </tbody>
                        </table>
                        {{-- {!! $invoices->links() !!} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection