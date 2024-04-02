@extends('admin.layouts.master')

@section('title', 'Courses | SweetTroops Baking Studio')


@section('content')
<div class="content-body">
    <div class="container-fluid">
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Course Edit</h4>
                    </div>
                    {{-- @can('product-create') --}}
                    <div class="card-body">
                        <a href="{{ route('courses.index') }}" type="button" class="btn btn-rounded btn-success"><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                        </span>Back</a>
                    </div>
                    {{-- @endcan --}}
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
                        <form action="{{ route('courses.update',$course->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <label class="form-label">Room</label>
                                    <select id="room_id" name="room_id" class="default-select form-control wide">
                                        <option selected="">Pilih Room</option>
                                        @foreach ($rooms as $room)    
                                        <option value="{{ $room->id }}"> {{ $room->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <br>
                                        <strong>Title:</strong>
                                        <input type="text" name="title" class="form-control" value="{{ $course->title }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <br>
                                        <strong>Duration:</strong>
                                        <input type="text" name="duration" class="form-control" value="{{ $course->duration }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <br>
                                        <strong>Upload Video:</strong>
                                         <input type="file" name="video" class="form-control">
                                        @error('video')
                                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                       @enderror
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
