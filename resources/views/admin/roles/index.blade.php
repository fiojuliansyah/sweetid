@extends('admin.layouts.master')

@section('title', 'Roles | SweetTroops Baking Studio')


@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Roles</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Role List</a></li>
                </ol>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Role List</h4>
                        </div>
                        {{-- @can('role-create') --}}
                            <div class="card-body">
                                <a href="{{ route('roles.create') }}" type="button" class="btn btn-rounded btn-success"><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                                </span>Add Role</a>
                            </div>
                        {{-- @endcan --}}
                        <div class="card-body">
                            <div class="table-responsive">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                                <table class="table table-bordered">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                    
                                    @foreach ($roles as $key => $role)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                                            {{-- @can('role-edit') --}}
                                                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                                            {{-- @endcan
                                            @can('role-delete') --}}
                                                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            {{-- @endcan --}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                                {!! $roles->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection