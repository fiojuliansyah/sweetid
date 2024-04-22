@extends('admin.layouts.master')

@section('title', 'Sliders | SweetTroops Baking Studio')
@section('sub-title', 'Slider List')
@section('button-add')
    @can('classtype-create')
        <li>
            <div class="card-body">
                <div class="btn-group">
                    <a href="{{ route('sliders.create') }}" type="button" class="btn btn-sm btn-success"><i
                            class="fa fa-plus color-info"></i> Add Data</a>
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
                            <div class="table-responsive">
                                @if ($message = Session::get('message'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                                <table class="table header-border table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Link</th>
                                            <th width="280px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sliders as $slider)
                                            <tr>
                                                <td><img src="{{ Storage::url($slider->image) }}" width="75"
                                                        alt="" /></td>
                                                <td>{{ $slider->link }}</td>
                                                <td>detail</td>
                                                <td>
                                                    <form action="{{ route('sliders.destroy', $slider->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
