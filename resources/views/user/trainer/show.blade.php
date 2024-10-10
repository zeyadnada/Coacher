@extends('user.layouts.parent')
@section('title', "ReFit Academy | $trainer->name")
@section('trainer', 'active')
@section('content')
    <!-- Breadcrumb Section Begin -->
    {{-- <section class="breadcrumb-section set-bg" data-setbg="/user/img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>تفاصيل الصفوف</h2>
                        <div class="bt-option">
                            <a href="./index.html"> الصفحة الرئيسية </a>
                            <a href="#"> الصفوف </a>
                            <span> بناء الجسم </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <div>
        <i class="fa-solid fa-less-than"></i>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Class Details Section Begin -->
    <section class="class-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="class-details-text">
                        <div class="cd-trainer">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="cd-trainer-pic">
                                        <img src="{{ $trainer->image ? asset('storage/' . $trainer->image) : asset('/user/img/Refit.jpeg') }}"
                                            alt="trainer" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="cd-trainer-text">
                                        <div class="trainer-title">
                                            <h4>{{ $trainer->name }}</h4>
                                            <span>{{ $trainer->job_title }}</span>
                                        </div>

                                        <div>
                                            <h5>الخبرات المهنية</h5>
                                            {!! $trainer->experiences !!}
                                        </div>

                                        {{-- <ul class="trainer-info">
                                            <li><span> العمر </span>35</li>
                                            <li><span>الوزن</span>148lbs</li>
                                            <li><span>الطول</span>10' 2``</li>
                                            <li><span>الوظيفة</span> المؤسس</li>
                                        </ul> --}}
                                        <div>
                                            <h5>الشهادات</h5>
                                            {!! $trainer->certificates !!}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Class Details Section End -->

@endsection
