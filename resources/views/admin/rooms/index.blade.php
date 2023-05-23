@extends('admin.layouts.master')

@section('title', 'Class Rooms | SweetTroops Baking Studio')
@section('sub-title', 'Class Room List')
@section('button-add')
    @can('classtype-create')
    <li>
        <div class="card-body">
            <div class="btn-group">
                <a href="{{ route('rooms.create') }}" type="button" class="btn btn-sm btn-success"><i class="fa fa-plus color-info"></i> Add Class Room</a>
                <div class="btn-group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown">Import</button>
                    <div class="dropdown-menu"><a class="dropdown-item" href="javascript:void()">Dropdown link</a>
                        <a class="dropdown-item" href="javascript:void()">Dropdown link</a>
                    </div>
                </div>
                <div class="btn-group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown">Import</button>
                    <div class="dropdown-menu"><a class="dropdown-item" href="javascript:void()">Dropdown link</a>
                        <a class="dropdown-item" href="javascript:void()">Dropdown link</a>
                    </div>
                </div>
            </div>
        </div>
    </li>
    @endcan
@endsection    
@section('content')
    @livewire('rooms-table')
@endsection