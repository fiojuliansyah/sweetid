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
                    <th>Name</th>
                    <th>Description</th>
                    <th>Point</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $pointmarket)
                <tr>
                    <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}</td>
                    <td><img src="{{ Storage::url($pointmarket->image) }}" width="75" alt="" /></td>
                    <td>{{ $pointmarket->name }}</td>
                    <td>{{ $pointmarket->description }}</td>
                    <td>{{ $pointmarket->point }}</td>
                    <td>
                        <form action="{{ route('pointmarkets.destroy',$pointmarket->id) }}" method="POST">
                            <a class="btn btn-xs btn-primary" href="{{ route('pointmarkets.show',$pointmarket->id) }}">Show</a>
                            {{-- @can('pointmarket-edit') --}}
                            <a class="btn btn-xs btn-warning" href="{{ route('pointmarkets.edit',$pointmarket->id) }}">Edit</a>
                            {{-- @endcan --}}
                            @csrf
                            @method('DELETE')
                            {{-- @can('pointmarket-delete') --}}
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