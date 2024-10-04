@extends('dashboard.layouts.parent')

@section('title', 'Admin profile')

@section('css')
    <style>
        .rounded-3 {
            border-radius: 0.3rem !important;
        }

        .social-icon-style2 {
            margin-bottom: 0;
            display: inline-block;
            padding-left: 10px;
            list-style: none;
        }

        .social-icon-style2 li {
            vertical-align: middle;
            display: inline-block;
            margin-right: 5px;
        }

        a,
        a:active,
        a:focus {
            color: #616161;
            text-decoration: none;
            transition-timing-function: ease-in-out;
            -ms-transition-timing-function: ease-in-out;
            -moz-transition-timing-function: ease-in-out;
            -webkit-transition-timing-function: ease-in-out;
            -o-transition-timing-function: ease-in-out;
            transition-duration: .2s;
            -ms-transition-duration: .2s;
            -moz-transition-duration: .2s;
            -webkit-transition-duration: .2s;
            -o-transition-duration: .2s;
        }

        .text-secondary,
        .text-secondary-hover:hover {
            color: #59b73f !important;
        }

        .display-25 {
            font-size: 1.4rem;
        }

        .text-primary,
        .text-primary-hover:hover {
            color: #ff712a !important;
        }

        p {
            margin: 0 0 20px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-4 mb-5 mb-lg-0 wow fadeIn">
                <div class="card border-0 shadow">
                    <img src="{{ $admin->image ? asset('storage/' . $admin->image) : '' }}" alt="Profile Image"
                        class="img-full">
                    <div class="card-body">
                        <div class="mb-4">
                            <h3 class="h4 mb-0">{{ $admin->name }}</h3>
                            <span class="text-primary">{{ $admin->admin_type }}</span>
                        </div>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-3"><i
                                    class="far fa-envelope display-25 me-3 text-secondary mr-2"></i>{{ $admin->email }}
                            </li>
                            <li class="mb-3"><i class="fas fa-mobile-alt display-25 me-3 text-secondary mr-2"></i>
                                {{ $admin->phone }}</li>
                            </li>
                            <li class="mb-3"><i class="fas fa-mobile-alt display-25 me-3 text-secondary mr-2"></i>
                                {{ $admin->gender }}</li>
                            </li>

                            <li><i
                                    class="fas fa-map-marker-alt display-25 me-3 text-secondary mr-2"></i>{{ $admin->location }}
                            </li>
                        </ul>
                    </div>
                    <a href="{{ route('dashboard.adminprofile.edit', $admin->id) }}" class="btn btn-warning">Edit My Profile</a>
                </div>
            </div>
            {{-- <div class="col-lg-8">
                <div class="ps-lg-1-6 ps-xl-5">
                    <div class="mb-5 wow fadeIn">
                        <div class="text-start mb-1-6 wow fadeIn">
                            <h3 class="h1 mb-0 text-primary">Experiences</h3>
                        </div>
                        <p>{!! $trainer->experiences !!}</p>

                    </div>
                    <div class="mb-5 wow fadeIn">
                        <div class="text-start mb-1-6 wow fadeIn">
                            <h3 class="h1 mb-0 text-primary">Certificates</h3>
                        </div>
                        <p>{!! $trainer->certificates !!}</p>

                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
