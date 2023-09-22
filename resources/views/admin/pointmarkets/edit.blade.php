@extends('admin.layouts.master')

@section('title', 'Point Markets | SweetTroops Baking Studio')
@section('button-add')
    <li>
        <div class="card-body">
            <div class="btn-group">
                <a href="{{ route('pointmarkets.index') }}" type="button" class="btn btn-sm btn-danger"><i class="flaticon-032-ellipsis"></i> Go To List</a>
            </div>
        </div>
    </li>
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
                        <form action="{{ route('pointmarkets.update',$pointmarket->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Image:</strong>
                                         <input type="file" name="image" class="form-control" placeholder="Post Title">
                                        @error('image')
                                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                       @enderror
                                    </div>
                                    <div class="form-group">
                                      <img src="{{ Storage::url($pointmarket->image) }}" height="200" width="200" alt="" />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <input type="text" name="name" value="{{ $pointmarket->name }}" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <br>
                                        <strong>Description:</strong>
                                        <textarea class="form-control" style="height:150px" name="description" placeholder="description">{{ $pointmarket->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <br>
                                        <strong>Point:</strong>
                                        <textarea class="form-control" style="height:150px" name="point" placeholder="point">{{ $pointmarket->point }}</textarea>
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
