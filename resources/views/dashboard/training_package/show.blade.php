@extends('dashboard.layouts.parent')

@section('title', 'Show Training Package')

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
                    <img src="{{ $package->image ? asset('storage/' . $package->image) : asset('/user/img/Refit.jpeg') }}"
                        alt="package image" class="img-full">
                    <div class="card-body">
                        <div class="mb-4">
                            <h3 class="h4 mb-0">{{ $package->title }}</h3>
                        </div>
                        @foreach ($package->durations as $duration)
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-solid fa-clock mr-2"></i>
                                        <p dir="rtl" class="mb-0">
                                            ({{ $duration->months }})
                                            {{ $duration->duration }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-solid fa-money-bill-wave mr-2"></i> {{ $duration->price }}$
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-solid fa-money-check mr-2"></i>
                                        {{ $duration->discount_price ?? $duration->price }}$
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="ps-lg-1-6 ps-xl-5">
                    <div class="mb-5 wow fadeIn">
                        <div class="text-start mb-1-6 wow fadeIn">
                            <h3 class="h1 mb-0 text-primary">Introduction</h3>
                        </div>
                        <p>{{ $package->introduction }}</p>

                    </div>
                    <div class="mb-5 wow fadeIn">
                        <div class="text-start mb-1-6 wow fadeIn">
                            <h3 class="h1 mb-0 text-primary">Target Audience</h3>
                        </div>
                        <p>{{ $package->target_audience }}</p>

                    </div>
                    <div class="mb-5 wow fadeIn">
                        <div class="text-start mb-1-6 wow fadeIn">
                            <h3 class="h1 mb-0 text-primary">Description</h3>
                        </div>
                        <p>{!! $package->description !!}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
