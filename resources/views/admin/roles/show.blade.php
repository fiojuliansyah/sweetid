@extends('admin.layouts.master')

@section('title', 'Role Show | SweetTroops Baking Studio')


@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Roles</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $role->name }}</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Role {{ $role->name }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    {{ $role->name }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <br>
                                    <strong>Permissions:</strong>
                                    @if(!empty($rolePermissions))
                                        @foreach($rolePermissions as $v)
                                            <label class="label label-success">{{ $v->name }},</label>
                                        @endforeach
                                    @endif
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