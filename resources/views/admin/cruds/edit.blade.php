@extends('admin.layouts.master')

@section('title', 'Cruds | SweetTroops Baking Studio')


@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Cruds</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Crud Edit</a></li>
            </ol>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Crud Edit</h4>
                    </div>
                    {{-- @can('product-create') --}}
                    <div class="card-body">
                        <a href="{{ route('cruds.index') }}" type="button" class="btn btn-rounded btn-success"><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                        </span>Back</a>
                    </div>
                    {{-- @endcan --}}
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
                        <form action="{{ route('cruds.update',$crud->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Post Image:</strong>
                                         <input type="file" name="image" class="form-control" placeholder="Post Title">
                                        @error('image')
                                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                       @enderror
                                    </div>
                                    <div class="form-group">
                                      <img src="{{ Storage::url($crud->image) }}" height="200" width="200" alt="" />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Post Thumbnail:</strong>
                                         <input type="file" name="image" class="form-control" placeholder="Post Title">
                                        @error('image')
                                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                       @enderror
                                    </div>
                                    <div class="form-group">
                                      <img src="{{ Storage::url($crud->thumbnail) }}" height="200" width="200" alt="" />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <input type="text" name="name" value="{{ $crud->name }}" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <br>
                                        <strong>Detail:</strong>
                                        <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $crud->detail }}</textarea>
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
