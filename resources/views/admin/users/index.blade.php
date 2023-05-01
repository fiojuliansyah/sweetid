@extends('admin.layouts.master')

@section('title', 'Users | SweetTroops Baking Studio')


@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Users</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">User List</a></li>
            </ol>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User List</h4>
                    </div>
                    @can('user-create')
                    <div class="card-body">
                        <a href="{{ route('users.create') }}" type="button" class="btn btn-rounded btn-success"><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                        </span>Add User</a>
                    </div>
                    @endcan
                    <div class="card-body">
                        <div class="table-responsive">
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                            @endif
                            <table class="table table-bordered verticle-middle table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Roles</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                @foreach ($data as $key => $user)
                                    <tbody>
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if(!empty($user->getRoleNames()))
                                                    @foreach($user->getRoleNames() as $v)
                                                        <span class="badge badge-primary">{{ $v }}</span>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>    
                                                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                                    <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                                                    @can('user-edit')
                                                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('user-delete')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                            {!! $data->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection