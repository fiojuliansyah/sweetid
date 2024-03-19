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
                                <div class="mb-3 col-md-6">
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <label class="form-label">Class Room</label>
                                    <select id="room_id" name="room_id" class="default-select form-control wide" multiple>
                                        <option selected="">Pilih Kelas</option>
                                        @foreach ($rooms as $class)    
                                        <option value="{{ $class->id }}">{{ $class->title }}</option>
                                        @endforeach
                                    </select>
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