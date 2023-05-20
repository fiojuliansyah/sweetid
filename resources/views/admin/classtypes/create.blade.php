@extends('admin.layouts.master')

@section('title', 'Class Types | SweetTroops Baking Studio')
@section('sub-title', 'Add Class Type')
@section('button-add')
    @can('classtype-create')
    <li>
        <div class="card-body">
            <div class="btn-group">
                <a href="{{ route('classtypes.index') }}" type="button" class="btn btn-sm btn-danger"><i class="flaticon-032-ellipsis"></i> Go To List</a>
            </div>
        </div>
    </li>
    @endcan
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('classtypes.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>Icon:</label>
                                             <input type="file" name="icon" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <br>
                                            <label>Name:</label>
                                            <input type="text" name="name" class="form-control" placeholder="Name" required="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <br>
                                            <label>Detail:</label>
                                            <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <br>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection