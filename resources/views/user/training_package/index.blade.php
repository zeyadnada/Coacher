@extends('user.layouts.parent')


@section('title', 'Training Packages')
@section('package', 'active')

@section('content')
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
                                    <h4 data-toggle="tooltip" data-placement="top" title="{{ $package->title }}">
                                        {{ $package->title }}</h4>
                                    <!-- data-bs-placement for the placement of the tooltip && data-bs-title should be the same conent of the h4 like shown -->
                                    <!-- <a href="#"><i class="fa fa-angle-left"></i></a> -->
                                    <span class="ml-5">{{ $package->duration }}</span>
                                    @if ($package->discount_price)
                                        <span style="font-size: 17px"><del>{{ $package->price }}</del></span>
                                        <span class="pr-1">{{ $package->discount_price }}</span>
                                        <span style="font-size: 15px">جنيه</span>
                                    @else
                                        <span>{{ $package->price }}EGP</span>
                                    @endif



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
