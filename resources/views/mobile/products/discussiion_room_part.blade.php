@extends('mobile.layouts.app')
@section('content')
    <div class="page-content message-content">
        <div class="container chat-box-area bottom-content">
            <div class="chat-content {{ $discussion->user->id == Auth::user()->id ? 'user' : '' }}">
                <div class="message-item">
                    <h6>{{ $discussion->user->name }}</h6>
                    <div class="bubble">{{ $discussion->body }}</div>
                    <div class="message-time">{{ $discussion->created_at->diffForHumans() }}</div>
                </div>
            </div>
            @foreach ($discussion->discussion_details as $chat)
                <div class="chat-content {{ $chat->user->id == Auth::user()->id ? 'user' : '' }}">
                    <div class="message-item">
                        @if ($chat->attachment)
                            <small>
                                <a href="{{ asset('storage/discussion/' . $chat->attachment) }}" target="_blank">
                                    <i class="fa fa-paperclip">
                                    </i> Lihat Lampiran
                                </a>
                            </small>
                        @endif
                        <h6>{{ $chat->user->id == Auth::user()->id ? '' : $chat->user->name }}</h6>
                        <div class="bubble">{{ $chat->body }}</div>
                        <div class="message-time">{{ $chat->created_at->diffForHumans() }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
