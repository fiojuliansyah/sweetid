@extends('mobile.layouts.app')
@section('title')
    {{ $room->title }} | SweetTroops - Baking Studio Apps
@endsection

{{-- @section('refresh')
<meta http-equiv="refresh" content="10">
@endsection --}}

@section('content')
    <div class="page-wraper">
        <header class="header">
            <div class="main-bar">
                <div class="container">
                    <div class="header-content">
                        <div class="left-content">
                            <a href="{{ url('home') }}">
                                <svg width="18" height="18" viewBox="0 0 10 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.03033 0.46967C9.2966 0.735936 9.3208 1.1526 9.10295 1.44621L9.03033 1.53033L2.561 8L9.03033 14.4697C9.2966 14.7359 9.3208 15.1526 9.10295 15.4462L9.03033 15.5303C8.76406 15.7966 8.3474 15.8208 8.05379 15.6029L7.96967 15.5303L0.96967 8.53033C0.703403 8.26406 0.679197 7.8474 0.897052 7.55379L0.96967 7.46967L7.96967 0.46967C8.26256 0.176777 8.73744 0.176777 9.03033 0.46967Z"
                                        fill="#a19fa8" />
                                </svg>
                            </a>
                            <h5 class="mb-0 ms-2">Back</h5>
                        </div>
                        <div class="mid-content">
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div id="show" class="page-content message-content">
            <div class="container chat-box-area bottom-content">
                <div class="chat-content {{ $discussion->user->id == Auth::user()->id ? 'user' : '' }}">
                    <div class="message-item">
                        <h6>{{ $discussion->user->name }}</h6>
                        <div class="bubble">{{ $discussion->body }}</div>
                        <div class="message-time">{{ $discussion->created_at->diffForHumans() }}</div>
                    </div>
                </div>
                <br>
                @foreach ($discussion->discussion_details as $chat)
                    <div class="chat-content {{ $chat->user->id == Auth::user()->id ? 'user' : '' }}">
                        <div class="message-item">
                            @if ($chat->attachment)
                            <small>
                                <a href="{{ asset('storage/discussion/'.$chat->attachment) }}" target="_blank">
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
                    @if ($chat->user->id != Auth::user()->id)
                        <br>
                    @endif
                @endforeach
            </div>
        </div>
        <footer class="footer border-0 fixed transparent">
            <div class="container">
                <div class="chat-footer">
                    <div class="form-group boxed">
                        <img id="image-preview" src="{{ asset('') }}mobile/images/empty.png" alt="Preview"
                            class="preload-img img-fluid bottom-20">
                        <br>
                        <form action="{{ route('product.store.discussion') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="input-wrapper message-area">
                                <div class="append-media"></div>
                                <div class="icon-popup">
                                    <label for="file-upload">
                                        <svg fill="#000000" height="24" width="24" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                            viewBox="0 0 330.591 330.591" xml:space="preserve">
                                        <g>
                                            <g>
                                                <path d="M52.575,320.395c-0.693,0-1.391-0.015-2.09-0.043c-12.979-0.54-25.361-6.071-34.865-15.576
                                                    c-9.504-9.504-15.035-21.886-15.576-34.864c-0.549-13.213,4.115-25.456,13.133-34.475L221.581,27.033
                                                    c11.523-11.523,27.197-17.483,44.096-16.78c16.676,0.693,32.594,7.81,44.822,20.037c12.228,12.229,19.346,28.147,20.037,44.823
                                                    c0.703,16.911-5.256,32.571-16.781,44.096L156.711,276.255c-2.928,2.927-7.676,2.928-10.607,0c-2.928-2.93-2.928-7.678,0-10.608
                                                    l157.045-157.047c8.523-8.522,12.928-20.194,12.4-32.865c-0.537-12.906-6.098-25.279-15.658-34.84
                                                    c-9.559-9.56-21.932-15.119-34.838-15.656c-12.67-0.533-24.344,3.876-32.865,12.399L23.784,246.044
                                                    c-12.596,12.594-11.498,34.184,2.443,48.125c6.836,6.837,15.672,10.813,24.881,11.195c8.975,0.349,17.229-2.734,23.244-8.752
                                                    l169.441-169.439c7.422-7.422,6.691-20.229-1.629-28.549c-4.113-4.114-9.414-6.505-14.924-6.733
                                                    c-5.289-0.212-10.115,1.595-13.625,5.106L95.536,215.08c-2.93,2.927-7.678,2.928-10.607,0c-2.93-2.93-2.93-7.678,0-10.607
                                                    L203.008,86.39c6.512-6.512,15.322-9.9,24.855-9.486c9.281,0.385,18.127,4.332,24.906,11.114
                                                    c14.17,14.167,14.9,36.49,1.631,49.762L84.959,307.22C76.418,315.76,64.985,320.395,52.575,320.395z"/>
                                            </g>
                                        </g>
                                        </svg>
                                    </label>
                                    <input type="hidden" name="discussion_id" value="{{ $discussion->id }}">
                                    <input type="file" name="attachment" id="file-upload" onchange="previewImage()"
                                        style="display: none;" accept="image/*">
                                </div>
                                <input type="text" name="body" class="form-control" placeholder="Type message...">
                                <button type="submit"
                                    class="btn btn-icon btn-primary light p-2 btn-rounded">
                                    <svg class="text-primary" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M21.4499 11.11L3.44989 2.11C3.27295 2.0187 3.07279 1.9823 2.87503 2.00546C2.67728 2.02862 2.49094 2.11029 2.33989 2.24C2.18946 2.37064 2.08149 2.54325 2.02982 2.73567C1.97815 2.9281 1.98514 3.13157 2.04989 3.32L4.99989 12L2.09989 20.68C2.05015 20.8267 2.03517 20.983 2.05613 21.1364C2.0771 21.2899 2.13344 21.4364 2.2207 21.5644C2.30797 21.6924 2.42378 21.7984 2.559 21.874C2.69422 21.9496 2.84515 21.9927 2.99989 22C3.15643 21.9991 3.31057 21.9614 3.44989 21.89L21.4499 12.89C21.6137 12.8061 21.7512 12.6786 21.8471 12.5216C21.9431 12.3645 21.9939 12.184 21.9939 12C21.9939 11.8159 21.9431 11.6355 21.8471 11.4784C21.7512 11.3214 21.6137 11.1939 21.4499 11.11ZM4.70989 19L6.70989 13H16.7099L4.70989 19ZM6.70989 11L4.70989 5L16.7599 11H6.70989Z"
                                            fill="#40189D" />
                                    </svg>
                                </button>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    </footer>

    </div>
@endsection
@section('footer')
    <script src="{{ asset('') }}mobile/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <script>
        $(".stepper").TouchSpin();
    </script>
    <script>
        function previewImage() {
            var input = document.getElementById('file-upload');
            var imageContainer = document.getElementById('image-preview');
            var files = input.files;
            var file = files[files.length - 1]; // Mengambil file terakhir dari yang dipilih

            var reader = new FileReader();

            reader.onload = function(e) {
                imageContainer.src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    </script>
@endsection
