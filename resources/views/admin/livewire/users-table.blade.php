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
                        <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    <span class="badge badge-success">{{ $v }}</span>
                                @endforeach
                            @endif
                        </td>
                        <td>    
                            <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                <a class="btn btn-xs btn-success" href="{{ route('users.class',$user->id) }}" target="_blank">List Class</a>
                                <a class="btn btn-xs btn-primary" href="{{ route('users.show',$user->id) }}">Show</a>
                                @can('user-edit')
                                <a class="btn btn-xs btn-warning" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                @endcan
                                @csrf
                                @method('DELETE')
                                @can('user-delete')
                                <button type="submit" class="btn btn-xs btn-danger">Delete</button>
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
