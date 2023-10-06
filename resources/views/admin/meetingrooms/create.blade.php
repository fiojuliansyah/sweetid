@extends('admin.layouts.master')

@section('title', 'Meeting Room | SweetTroops Baking Studio')
@section('sub-title', 'Add Meeting Room')
@section('button-add')
    @can('classtype-create')
        <li>
            <div class="card-body">
                <div class="btn-group">
                    <a href="{{ route('meetingrooms.index') }}" type="button" class="btn btn-sm btn-danger"><i
                            class="flaticon-032-ellipsis"></i> Go To List</a>
                </div>
            </div>
        </li>
    @endcan
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('meetingrooms.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>Room</label>
                                            <select name="room_id" class="default-select form-control wide">
                                                <option value="">-- Select Room --</option>
                                                @foreach ($rooms as $room)
                                                    <option value="{{ $room->id }}">{{ $room->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <br>
                                            <label>Topic:</label>
                                            <input type="text" name="topic" class="form-control" placeholder="Topic"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <br>
                                            <label>Agenda:</label>
                                            <textarea class="form-control" style="height:150px" name="agenda" placeholder="Agenda"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <br>
                                            <label>Duration:</label>
                                            <input type="number" name="duration" class="form-control"
                                                placeholder="Duration" required="">
                                            <small>In minute, example : 60 means 1 hour</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <br>
                                            <label>Password:</label>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Password" required="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <br>
                                            <label>Meeting Time</label>
                                            <input type="datetime-local" name="date" class="form-control"
                                                placeholder="Date & Time" required="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <br>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
