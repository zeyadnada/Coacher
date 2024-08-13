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

    <!-- Services Section Begin -->
    <section class="services-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>ماذا نقدمة </span>
                        <h2>تخطى حدودك</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @forelse ($packages as $package)
                    <div class="col-lg-3 col-md-6 p-0">
                        <div class="ss-pic">
                            <img src="{{ '/storage/' . $package->image }}" alt="package" />
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 p-0">
                        <div class="ss-text">
                            <h4>{{ $package->title }}</h4>
                            <p>{{ $package->price }} رس</p>
                            <a href="{{ route('user.training-packages.show', $package->id) }}"> اكتشف </a>
                        </div>
                    </div>
                @empty
                    <h2>No Packages Yet</h2>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Services Section End -->
    <section class="classes-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span> صفوفنا </span>
                        <h2>اختر الصف الذي يناسبك</h2>
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
                                <h4 class="pb-3">{{ $package->title }}</h4>
                                <span>{{ $package->price }} رس</span>
                                <a href="{{ route('user.training-packages.show', $package->id) }}"><i
                                        class="fa fa-angle-left"></i></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <h2>No Packages Yet</h2>
                @endforelse

            </div>
        </div>
    </section>
@endsection
