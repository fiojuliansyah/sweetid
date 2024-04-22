@extends('admin.layouts.master')

@section('title', 'Sliders | SweetTroops Baking Studio')
@section('sub-title', 'Add Slider')
@section('button-add')
    @can('classtype-create')
        <li>
            <div class="card-body">
                <div class="btn-group">
                    <a href="{{ route('classtypes.index') }}" type="button" class="btn btn-sm btn-danger"><i
                            class="flaticon-032-ellipsis"></i> Go To List</a>
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
                            <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>Template Banner Size:</label>
                                            <small style="color: red">*Right Click to Download</small>
                                            <img src="https://previews.123rf.com/images/anaumenko/anaumenko1608/anaumenko160800133/62396884-baking-ingredients-on-rustic-background-top-view-long-format-banner.jpg"
                                                alt="" width="500">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>Image:</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <br>
                                            <label>Link:</label>
                                            <input type="text" name="link" class="form-control" placeholder="link">
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
