@extends('admin.layouts.master')

@section('title', 'Cruds | SweetTroops Baking Studio')


@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Cruds</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Crud</a></li>
                </ol>
            </div>
            <!-- row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Crud Show</h4>
                        </div>
                        {{-- @can('product-create') --}}
                        <div class="card-body">
                            <a href="{{ route('cruds.index') }}" type="button" class="btn btn-rounded btn-success"><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                            </span>Back</a>
                        </div>
                        {{-- @endcan --}}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        {{ $crud->name }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <br>
                                        <strong>Details:</strong>
                                        {{ $crud->detail }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <br>
                                        <strong>Image:</strong>
                                        <img src="{{ Storage::url($crud->image) }}" width="350" alt="" />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <br>
                                        <strong>Thumbnail:</strong>
                                        <img src="{{ Storage::url($crud->thumbnail) }}" width="350" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
