@extends('admin.layouts.master')

@section('title', 'Cruds | SweetTroops Baking Studio')
@section('sub-title', 'Crud List')
@section('button-add')
    @can('crud-create')
        <li>
            <div class="card-body">
                <div class="btn-group">
                    <a href="{{ route('cruds.create') }}" type="button" class="btn btn-sm btn-success"><i
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
                            @livewire('cruds-table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
