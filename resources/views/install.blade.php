@extends('mobile.layouts.app')

@section('title', 'Google Play | SweetTroops - Baking Studio Apps')
@section('navbar')
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
@endsection

@section('content')
<div class="container">
    <h5 class="title">SweetTroops</h5>
    <p>Install SweetTroops - hanya tersedia di link dibawah ini</p>
    <div class="row">
        <div class="col-6">
            <a href="javascript:void(0);">
                <span id="addToHomeScreenButton">
                    <img src="https://bekya.com.au/wp-content/uploads/2019/11/Playstore-button.png" alt="" width="200">
                </span>
            </a>
        </div>
        <div class="col-6">
            <a href="javascript:void(0);">
                <img src="https://e7.pngegg.com/pngimages/390/549/png-clipart-apple-app-store-advertisement-iphone-app-store-android-coming-soon-electronics-text.png" alt="" width="200">
            </a>
        </div>
    </div>
</div>
@endsection
@push('pwa')
<script src="{{ asset('/sw.js') }}"></script>
<script>
    if ("serviceWorker" in navigator) {
        window.addEventListener("beforeinstallprompt", (event) => {
            // Prevent the browser's default install prompt
            event.preventDefault();

            // Save the event for later use
            let deferredPrompt = event;

            // Show the "Add to Home Screen" button
            const addToHomeScreenButton = document.getElementById("addToHomeScreenButton");
            addToHomeScreenButton.style.display = "block";

            addToHomeScreenButton.addEventListener("click", () => {
                // Show the browser's install prompt
                deferredPrompt.prompt();

                // Wait for the user to respond to the prompt
                deferredPrompt.userChoice.then((choiceResult) => {
                    if (choiceResult.outcome === "accepted") {
                        console.log("User accepted the A2HS prompt");
                    } else {
                        console.log("User dismissed the A2HS prompt");
                    }

                    // Reset the deferredPrompt
                    deferredPrompt = null;

                    // Hide the "Add to Home Screen" button
                    addToHomeScreenButton.style.display = "none";
                });
            });
        });

        // Register a service worker hosted at the root of the site using the default scope
        navigator.serviceWorker.register("/sw.js").then(
            (registration) => {
                console.log("Service worker registration succeeded:", registration);
            },
            (error) => {
                console.error(`Service worker registration failed: ${error}`);
            }
        );
    } else {
        console.error("Service workers are not supported.");
    }
</script>
@endpush