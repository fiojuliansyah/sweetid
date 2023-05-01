@extends('admin.layouts.master')

@section('title', 'User Show | SweetTroops Baking Studio')


@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Users</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $user->name }}</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User {{ $user->name }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form>
                                <fieldset disabled="">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" placeholder="{{ $user->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" placeholder="{{ $user->email }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Role</label>
                                        <select class="form-control ">
                                            @if(!empty($user->getRoleNames()))
                                                @foreach($user->getRoleNames() as $v)
                                                    <option class="badge badge-primary">{{ $v }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" disabled="">
                                        <label class="form-check-label">
                                            Can't check this
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection