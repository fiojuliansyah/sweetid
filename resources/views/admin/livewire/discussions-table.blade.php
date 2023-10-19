<div>
    <div class="table-responsive">
        @if ($message = Session::get('message'))
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
                    <th>Room</th>
                    <th>Title</th>
                    <th>Question</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $discussion)
                <tr>
                    <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}</td>
                    <td>{{ $discussion->room['title'] }}</td>
                    <td>{{ $discussion->title }}</td>
                    <td>{{ $discussion->body }}</td>                    
                    <td>
                        <a class="btn btn-xs btn-primary mb-2" href="{{ route('discussions.room',$discussion->id) }}">Discussion Room</a>
                        <form action="{{ route('discussions.destroy',$discussion->id) }}" method="POST">
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