@extends('admin.layouts.master')

@section('title', 'Class Market | SweetTroops Baking Studio')
@section('sub-title', 'Class Market List')   
@section('content')
    @livewire('markets-table')
@endsection