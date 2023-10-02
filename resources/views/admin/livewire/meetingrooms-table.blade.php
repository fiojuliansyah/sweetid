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
                    <input wire:model="search" id="search" type="text" class="form-control" name="keyword"
                        placeholder="Search...">
                </div>
            </div>
        </div>
        <table class="table header-border table-responsive-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Topic</th>
                    <th>Time</th>
                    <th>Duration</th>
                    <th>Room</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $meetingroom)
                    <tr>
                        <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}</td>
                        <td>{{ $meetingroom->topic }}</td>
                        <td>{{ $meetingroom->time }}</td>
                        <td>{{ $meetingroom->duration }} Minute</td>
                        <td>{{ $meetingroom->room->title }}</td>
                        <td>
                            <a class="btn btn-xs btn-primary mb-2"
                                href="{{ route('meetingrooms.join', $meetingroom->id) }}" target="__BLANK">Join</a>
                            <form action="{{ route('meetingrooms.destroy', $meetingroom->id) }}" method="POST">
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
