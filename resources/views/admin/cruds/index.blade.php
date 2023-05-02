@extends('admin.layouts.master')

@section('title', 'Cruds | SweetTroops Baking Studio')


@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Cruds</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Crud List</a></li>
                </ol>
            </div>
            <!-- row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Crud List</h4>
                        </div>
                        @can('crud-create')
                        <div class="card-body">
                            <a href="{{ route('cruds.create') }}" type="button" class="btn btn-rounded btn-success"><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                            </span>Add Data</a>
                        </div>
                        @endcan
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
                                        <th>Image</th>
                                        <th>Thumbnail</th>
                                        <th>Name</th>
                                        <th>Details</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                    @foreach ($cruds as $crud)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td><img src="{{ Storage::url($crud->image) }}" width="75" alt="" /></td>
                                        <td><img src="{{ Storage::url($crud->thumbnail) }}" width="75" alt="" /></td>
                                        <td>{{ $crud->name }}</td>
                                        <td>{{ $crud->detail }}</td>
                                        <td>
                                            <form action="{{ route('cruds.destroy',$crud->id) }}" method="POST">
                                                <a class="fa fa-eye" href="{{ route('cruds.show',$crud->id) }}"></a>
                                                {{-- @can('crud-edit') --}}
                                                <a class="fas fa-pencil-alt color-muted" href="{{ route('cruds.edit',$crud->id) }}"></a>
                                                {{-- @endcan --}}
                                                @csrf
                                                @method('DELETE')
                                                {{-- @can('crud-delete') --}}
                                                <button type="submit" class="fas fa-times color-danger"></button>
                                                {{-- @endcan --}}
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                                {!! $cruds->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection