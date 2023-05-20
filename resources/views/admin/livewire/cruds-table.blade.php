<div>
        <div class="table-responsive">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="row">
                <div class="mb-3 col-md-4">
                    <div class="input-group search-area">
                        <input wire:model="search" id="search" type="text" class="form-control" name="keyword" placeholder="Search...">
                    </div>   
                </div>
            </div>
            <table class="table header-border table-responsive-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Thumbnail</th>
                        <th>Name</th>
                        <th>Details</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $crud)
                    <tr>
                        <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}</td>
                        <td><img src="{{ Storage::url($crud->image) }}" width="75" alt="" /></td>
                        <td><img src="{{ Storage::url($crud->thumbnail) }}" width="75" alt="" /></td>
                        <td>{{ $crud->name }}</td>
                        <td>{{ $crud->detail }}</td>
                        <td>
                            <form action="{{ route('cruds.destroy',$crud->id) }}" method="POST">
                                <a class="btn btn-xs btn-primary" href="{{ route('cruds.show',$crud->id) }}">Show</a>
                                {{-- @can('crud-edit') --}}
                                <a class="btn btn-xs btn-warning" href="{{ route('cruds.edit',$crud->id) }}">Edit</a>
                                {{-- @endcan --}}
                                @csrf
                                @method('DELETE')
                                {{-- @can('crud-delete') --}}
                                <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                                {{-- @endcan --}}
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $data->links() !!}
        </div>
</div>