@extends('user.layouts.parent')


@section('title', $package->title)


@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/user/img/breadcrumb-bg.jpg">
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
    </section>
    <div>
        <i class="fa-solid fa-less-than"></i>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Class Details Section Begin -->
    <section class="class-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="class-details-text">
                        <div class="cd-pic">
                            <img src="{{ '/storage/' . $package->image }}" alt="" />
                        </div>
                        <div class="cd-text">
                            <div class="cd-single-item">
                                <h3>{{ $package->title }}</h3>
                                <p>
                                    {!! $package->description !!}
                                </p>
                            </div>
                            <div class="cd-single-item">
                                <h4>{{ $package->price }} رس</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8">
                    <div class="sidebar-option">
                        <div class="so-categories">
                            <h4 class="title">الفئات</h4>
                            <ul>
                                <li>
                                    <a href="#"> المدة <span>{{ $package->duration }}</span></a>
                                </li>
                                <li>
                                    <a href="#"> السعر <span>{{ $package->price }} رس</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="so-latest">
                            <h5 class="title">اخر الاخبار</h5>
                            <div class="latest-large set-bg" data-setbg="/user/img/letest-blog/latest-1.jpg">
                                <div class="ll-text">
                                    <h5>
                                        <a href="#">
                                            طريقة تحضير هذة القهوة اليبانية هي الافضل للصحة
                                        </a>
                                    </h5>
                                    <ul>
                                        <li>20 اغسطس 2024</li>
                                        <li>20 تعليق</li>
                                    </ul>
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
