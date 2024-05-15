{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('admin.profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('admin.profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('admin.profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
@extends('admin.layouts.master')

@section('title', 'Profile | SweetTroops Baking Studio')
@section('sub-title', 'Profile')  
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content">
                            @if($user->profile?->avatar != null)
                            <div class="cover-photo rounded" style="background: url('{{ Storage::url($user ? $user->profile?->thumbnail : '') }}');">   
                            @else
                            <div class="cover-photo rounded" style="background: url('/storage/covers/cover.png');">      
                            @endif
                            </div>
                        </div>
                        <div class="profile-info">
                            <div class="profile-photo">
                                @if($user->profile?->avatar != null)
                                <img src="{{ Storage::url($user ? $user->profile?->avatar : '') }}" class="img-fluid rounded-circle" alt="">   
                                @else
                                <img src="{{asset('/storage/avatars/default.png')}}"  class="img-fluid rounded-circle" alt="">      
                                @endif
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0">{{ Auth::user()->name }}</h4>
                                    <p>Class Member</p>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">{{ Auth::user()->email }}</h4>
                                    <p>Email</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        @include('admin.profile.partials.update-profile-information-form')
                    </div>
                    <div class="card-body">
                        @include('admin.profile.partials.update-detail-information-form')
                    </div>
                    <div class="card-body">
                        @include('admin.profile.partials.update-password-form')
                    </div>
                    {{-- <div class="card-body">
                        @include('admin.profile.partials.delete-user-form')
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
