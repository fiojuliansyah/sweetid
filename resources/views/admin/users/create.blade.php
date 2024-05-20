@extends('admin.layouts.master')

@section('title', 'User Create | SweetTroops Baking Studio')


@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Users</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">User Create</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User Create</h4>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('users.index') }}" type="button" class="btn btn-rounded btn-success"><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                        </span>Back</a>
                    </div>
                    <div class="card-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <br>
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Phone:</strong>
                                    {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <br>
                                <div class="form-group">
                                    <strong>Password:</strong>
                                    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <br>
                                <div class="form-group">
                                    <strong>Confirm Password:</strong>
                                    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <br>
                                <div class="form-group">
                                    <strong>Role:</strong>
                                    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="form-label">Class Room</label>
                                
                                <div class="col-md-4">
                                    @foreach ($rooms->slice(0, ceil($rooms->count() / 3)) as $class)
                                        <div class="form-check">
                                            <input type="checkbox" id="room_{{ $class->id }}" name="room_id[]" value="{{ $class->id }}">
                                            <label class="form-check-label" for="room_{{ $class->id }}">
                                                {{ $class->title }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                        
                                <div class="col-md-4">
                                    @foreach ($rooms->slice(ceil($rooms->count() / 3), ceil($rooms->count() / 3)) as $class)
                                        <div class="form-check">
                                            <input type="checkbox" id="room_{{ $class->id }}" name="room_id[]" value="{{ $class->id }}">
                                            <label class="form-check-label" for="room_{{ $class->id }}">
                                                {{ $class->title }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                        
                                <div class="col-md-4">
                                    @foreach ($rooms->slice(2 * ceil($rooms->count() / 3), ceil($rooms->count() / 3)) as $class)
                                        <div class="form-check">
                                            <input type="checkbox" id="room_{{ $class->id }}" name="room_id[]" value="{{ $class->id }}">
                                            <label class="form-check-label" for="room_{{ $class->id }}">
                                                {{ $class->title }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>                                                              
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection