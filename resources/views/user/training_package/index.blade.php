@extends('user.layouts.parent')


@section('title', 'Training Packages')
@section('package', 'active')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/user/img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>الخدمات</h2>
                        <div class="bt-option">
                            <a href="./index.html"> الصفحة الرئيسية </a>
                            <span> الخدمات </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <div class="container">
        <div class="row">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>

    <!-- Start Packages section-->
    <section class="classes-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span> باقاتنا </span>
                        <h2>اختر الباقة الذي تناسبك</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($packages as $package)
                    <div class="col-lg-4 col-md-6">
                        <div class="class-item">
                            <div class="ci-pic">
                                <img src="{{ '/storage/' . $package->image }}" alt="package" />
                            </div>
                            <div class="ci-text">
                                <div class="mb-3">
                                    <h4 data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="{{ $package->title }}">{{ $package->title }}</h4>
                                    <!-- data-bs-placement for the placement of the tooltip && data-bs-title should be the same conent of the h4 like shown -->
                                    <!-- <a href="#"><i class="fa fa-angle-left"></i></a> -->
                                    <span class="ml-2">{{ $package->price }} ر.س </span>
                                    <span>{{ $package->duration }}</span>
                                </div>
                                <div class="text-left">
                                    <a href="{{ route('user.training-packages.show', $package->id) }}" role="button"
                                        class="btn btn-outline-primary mb-3 mb-md-0">
                                        اشترك الان
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h2>لا توجد باقات متاحة الأن</h2>
                @endforelse

            </div>
        </div>
    </section>
    <!-- End Packages section-->

@endsection
