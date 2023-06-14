@extends('admin.layouts.master')

@section('title', 'Transactions | SweetTroops Baking Studio')
@section('sub-title', 'Transaction List')   
@section('content')
    @livewire('transactions-table')
@endsection