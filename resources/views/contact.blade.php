@extends('mobile.layouts.app')

@section('title', 'Contact Us | SweetTroops - Baking Studio Apps')
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
    <div class="page-content bottom-content ">
        <div class="container profile-area">
            <div class="contact-section">
                <div class="d-flex justify-content-between align-item-center">
                    <h5 class="title">Contacts</h5>
                </div>
                <ul>
                    <li>
                        <a href="https://wa.me/6285311232377">
                            <div class="icon-box">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="ms-3">
                                <div class="light-text">Whatsapp</div>
                                <p class="mb-0"> +62 85311 2323 77</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="icon-box">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="ms-3">
                                <div class="light-text">Email Address</div>
                                <p class="mb-0">info@sweettroops.com</p>
                            </div>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="#">
                            <div class="icon-box">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="ms-3">
                                <div class="light-text">Address</div>
                                <p class="mb-0">Franklin Avenue, Corner St.London, 24125151</p>
                            </div>
                        </a>
                    </li> --}}
                </ul>
                <div class="d-flex justify-content-between align-item-center">
                    <h5 class="title">Map 🏆</h5>
                </div>
                <br>
                <div class="google-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2804.5481626159503!2d106.78549264073148!3d-6.23337617480818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1397d42093b%3A0xf898bb99eb1b70f5!2sSweet%20Troops%20Artisan%20Baking%20Studio!5e0!3m2!1sen!2sid!4v1718851896228!5m2!1sen!2sid"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>

    <style>
        .google-map {
            width: 100%;
            height: 0;
            padding-bottom: 56.25%;
            /* 16:9 aspect ratio */
            position: relative;
        }

        .google-map iframe {
            position: absolute;
            width: 100%;
            height: 100%;
            border: 0;
        }
    </style>
@endsection
