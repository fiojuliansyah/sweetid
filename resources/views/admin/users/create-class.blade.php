@extends('admin.layouts.master')

@section('title', 'User Create Class | SweetTroops Baking Studio')


@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User Create Class</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('class.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <label class="form-label">Class Room</label>
                        
                                <div class="col-md-4">
                                    @foreach ($rooms->slice(0, ceil($rooms->count() / 3)) as $class)
                                        <div class="form-check">
                                            <input type="checkbox" id="room_{{ $class->id }}" name="room_id[]" value="{{ $class->id }}" {{ in_array($class->id, $userRoomIds) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="room_{{ $class->id }}">
                                                {{ $class->title }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                        
                                <div class="col-md-4">
                                    @foreach ($rooms->slice(ceil($rooms->count() / 3), ceil($rooms->count() / 3)) as $class)
                                        <div class="form-check">
                                            <input type="checkbox" id="room_{{ $class->id }}" name="room_id[]" value="{{ $class->id }}" {{ in_array($class->id, $userRoomIds) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="room_{{ $class->id }}">
                                                {{ $class->title }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                        
                                <div class="col-md-4">
                                    @foreach ($rooms->slice(2 * ceil($rooms->count() / 3), ceil($rooms->count() / 3)) as $class)
                                        <div class="form-check">
                                            <input type="checkbox" id="room_{{ $class->id }}" name="room_id[]" value="{{ $class->id }}" {{ in_array($class->id, $userRoomIds) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="room_{{ $class->id }}">
                                                {{ $class->title }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <br>
                                <button type="submit" class="btn btn-secondary">Submit</button>
                            </div>
                        </form>                                                                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection