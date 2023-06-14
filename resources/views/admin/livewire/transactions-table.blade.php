<div>
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
                                <a class="nav-link" href="javascript:void(0);" data-bs-toggle="tab" id="Completed-tab" data-bs-target="#Completed" role="tab">Completed</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);" data-bs-toggle="tab" id="Pending-tab" data-bs-target="#Pending" role="tab">Pending</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);" data-bs-toggle="tab" id="Canceled-tab" data-bs-target="#Canceled" role="tab">Canceled</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <a href="javascript:void(0);" class="btn btn-outline-primary mb-3"><i class="fa fa-calendar me-3 scale3"></i>Filter Date</a>
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
                                        <th>Class</th>
                                        <th>Recipient</th>
                                        <th>Amount</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $inv)
                                    <tr>
                                        <td><span>{{ $inv->invoice_id }}</span></td>
                                        <td><span class="text-nowrap">{{ \Carbon\Carbon::parse($inv->created_at)->diffForHumans() }}</span></td>
                                        <td><span>{{ $inv->room['title'] }}</span></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="images/avatar/1.jpg" alt="" class="rounded-circle me-3" width="50">
                                                <div>
                                                    <h6 class="fs-16 mb-0 text-nowrap">{{ $inv->user['name'] }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span>@currency($inv->price)</span></td>
                                        <td>
                                            <div>
                                                <span class="badge badge-primary light">
                                                    <img src="{{ Storage::url($inv->classtype['icon']) }}" width="30" alt="" />
                                                </span>
                                                &nbsp; {{ $inv->classtype['name'] }}
                                            </div>
                                        </td>
                                        @if ( $inv->status == '0' )
                                        <td><a href="javascript:void(0)" class="btn btn-warning btn-rounded light">Pending</a></td> 
                                        
                                        @elseif ( $inv->status == '1' )
                                        <td><a href="javascript:void(0)" class="btn btn-success btn-rounded light">Approve</a></td>

                                        @elseif ( $inv->status == '2' )
                                        <td><a href="javascript:void(0)" class="btn btn-danger btn-rounded light">Cancel</a></td>

                                        @endif
                                        <td>
                                            <div class="dropdown dropstart">
                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="las la-times-circle text-danger scale5 me-3"></i>Cancel Transactions</a>
                                                    <a class="dropdown-item" href="transaction-details.html"><i class="las la-info-circle scale5 me-3"></i>View Details</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $data->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
