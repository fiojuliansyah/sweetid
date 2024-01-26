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
                        <form id="discussionForm" action="{{ route('product.store.discussion') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="input-wrapper message-area">
                                <div class="append-media"></div>
                                <div class="icon-popup">
                                    <label for="file-upload">
                                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M14 0C6.26613 0 0 6.26613 0 14C0 21.7339 6.26613 28 14 28C21.7339 28 28 21.7339 28 14C28 6.26613 21.7339 0 14 0ZM18.5161 9.48387C19.5153 9.48387 20.3226 10.2911 20.3226 11.2903C20.3226 12.2895 19.5153 13.0968 18.5161 13.0968C17.5169 13.0968 16.7097 12.2895 16.7097 11.2903C16.7097 10.2911 17.5169 9.48387 18.5161 9.48387ZM9.48387 9.48387C10.4831 9.48387 11.2903 10.2911 11.2903 11.2903C11.2903 12.2895 10.4831 13.0968 9.48387 13.0968C8.48468 13.0968 7.67742 12.2895 7.67742 11.2903C7.67742 10.2911 8.48468 9.48387 9.48387 9.48387ZM20.4806 19.0919C18.8718 21.0226 16.5121 22.129 14 22.129C11.4879 22.129 9.12823 21.0226 7.51935 19.0919C6.75161 18.1718 8.14032 17.0202 8.90806 17.9347C10.1726 19.4532 12.0242 20.3169 14 20.3169C15.9758 20.3169 17.8274 19.4476 19.0919 17.9347C19.8484 17.0202 21.2427 18.1718 20.4806 19.0919Z"
                                                fill="#CAC6C1"></path>
                                        </svg>
                                    </label>
                                    <input type="hidden" name="discussion_id" value="{{ $discussion->id }}">
                                    <input type="file" name="attachment" id="file-upload" onchange="previewImage()"
                                        style="display: none;" accept="image/*">
                                </div>
                                <input type="text" name="body" class="form-control" placeholder="Type message...">
                        </form>
                        <a href="#"
                            onclick="event.preventDefault(); document.getElementById('discussionForm').submit();""
                            class="btn btn-chat btn-icon btn-primary light p-2 btn-rounded">
                            <svg class="text-primary" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M21.4499 11.11L3.44989 2.11C3.27295 2.0187 3.07279 1.9823 2.87503 2.00546C2.67728 2.02862 2.49094 2.11029 2.33989 2.24C2.18946 2.37064 2.08149 2.54325 2.02982 2.73567C1.97815 2.9281 1.98514 3.13157 2.04989 3.32L4.99989 12L2.09989 20.68C2.05015 20.8267 2.03517 20.983 2.05613 21.1364C2.0771 21.2899 2.13344 21.4364 2.2207 21.5644C2.30797 21.6924 2.42378 21.7984 2.559 21.874C2.69422 21.9496 2.84515 21.9927 2.99989 22C3.15643 21.9991 3.31057 21.9614 3.44989 21.89L21.4499 12.89C21.6137 12.8061 21.7512 12.6786 21.8471 12.5216C21.9431 12.3645 21.9939 12.184 21.9939 12C21.9939 11.8159 21.9431 11.6355 21.8471 11.4784C21.7512 11.3214 21.6137 11.1939 21.4499 11.11ZM4.70989 19L6.70989 13H16.7099L4.70989 19ZM6.70989 11L4.70989 5L16.7599 11H6.70989Z"
                                    fill="#40189D" />
                            </svg>
                        </a>
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
    <script type="text/javascript">
        function doRefresh() {
            $.ajax({
                url: "{{ route('product.discussion', $discussion->id) }}",  // Replace with the actual route URL for refreshing content
                type: "GET",
                dataType: "html",
                success: function(response) {
                    $("#show").html(response);
                },
                error: function(xhr) {
                    console.error("Error refreshing content: " + xhr.statusText);
                }
            });
        }
    
        // Refresh every 5 seconds (5000 milliseconds)
        $(function() {
            setInterval(doRefresh, 2000);
        });
    </script>
@endsection
