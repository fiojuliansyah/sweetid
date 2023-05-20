@extends('admin.layouts.master')

@section('title', 'Class Types | SweetTroops Baking Studio')
@section('sub-title', 'Class Type List')
@section('button-add')
    @can('classtype-create')
    <li>
        <div class="card-body">
            <div class="btn-group">
                <a href="{{ route('classtypes.create') }}" type="button" class="btn btn-sm btn-success"><i class="fa fa-plus color-info"></i> Add Data</a>
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
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @livewire('classtypes-table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection