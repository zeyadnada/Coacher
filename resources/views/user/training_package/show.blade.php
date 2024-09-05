@extends('user.layouts.parent')
@section('title', $package->title)

@section('css')
    <style>
        label {
            margin-bottom:0;
            color: #b5bdc3
        }

        .rtl {
            direction: rtl;
            text-align: right;
        }

        .rtl input {
            direction: rtl;
            text-align: right;
        }
        .custom-date-input input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(1);
        }
    </style>
@endsection
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
            @if (session()->has('success_message'))
                <div class="spacer"></div>
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif
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
                                <h4>{{ $package->price }}EGP</h4>
                            </div>
                            {{-- <div class="cd-single-item"> --}}
                            @if (!session()->has("coupon_$package->id"))
                                <form action="{{ route('user.coupon.store', ['id' => $package->id]) }}" method="POST">
                                    @csrf
                                    <label for="coupon_code" style="color: white">هل يوجد اى كود خصم؟</label> <br>
                                    <input type="text" name="coupon_code" id="coupon_code"><br>
                                    <input type="submit" value="خصم">
                                </form>
                            @endif
                            {{-- </div> --}}
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
                                @if (session()->has("coupon_$package->id"))
                                    <li>
                                        <a href="#"> كود الخصم
                                            <span>{{ session()->get("coupon_$package->id")['code'] }}
                                            </span></a>
                                        <form action="{{ route('user.coupon.destroy', ['id' => $package->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="حذف الكود">
                                        </form>
                                    </li>
                                    <li>
                                        @if (session()->get("coupon_$package->id")['type'] == 'percent')
                                            <a href="#"> الخصم <span>
                                                    {{ session()->get("coupon_$package->id")['percent'] }} %
                                                    رس</span></a>
                                        @elseif (session()->get("coupon_$package->id")['type'] == 'fixed')
                                            <a href="#"> الخصم <span>-
                                                    {{ session()->get("coupon_$package->id")['value'] }}
                                                    رس</span></a>
                                        @endif
                                    </li>
                                    <li>
                                        <a href="#"> اجمالى السعر بعد الخصم
                                            <span>{{ session()->get("coupon_$package->id")['discount'] }} رس</span></a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        {{-- <div class="so-latest">
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

                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Class Details Section End -->

    <!-- subscription Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="leave-comment">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title">
                                    <span>تريد الاشتراك في هذه البافة ؟</span>
                                    <h2>اشترك الان</h2>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('user.subscription.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <!-- Package Id -->
                            <div>
                                <input type="text" name="package_id" value="{{ $package->id }}" hidden>
                            </div>

                            <!-- Name -->
                            <div class="pb-3">
                                <label for="name">الأسم</label>
                                <input id="name" type="text" name="name" value="{{ old('name') }}"
                                    placeholder="ادخل الاسم" class="@error('name') is-invalid @enderror">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="pb-3">
                                <label for="email">البريد الالكتروني</label>

                                <input id="email" type="email" name="email" value="{{ old('email') }}"
                                    placeholder="ادخل الايميل" class="@error('email') is-invalid @enderror">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- WhatsApp Phone -->
                            <div class="pb-3">
                                <label for="whatsapp_phone">رقم الهاتف</label>
                                <input type="text" class="@error('whatsapp_phone') is-invalid @enderror"
                                    name="whatsapp_phone" value="{{ old('whatsapp_phone') }}" id="whatsapp_phone"
                                    placeholder="رقم واتساب للمتابعة">
                                @error('whatsapp_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- starting_date -->
                            <div class="pb-3 rtl form-floating custom-date-input">
                                <label for="starting_date">تاريخ بداية الاشتراك</label>
                                <input id="starting_date" type="date" name="starting_date"
                                    value="{{ old('starting_date', \Carbon\Carbon::now()->format('Y-m-d')) }}"
                                    class="@error('starting_date') is-invalid @enderror" placeholder=" ">
                                @error('starting_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Payment Method Cards -->
                            {{-- <div class="pb-3">
                                <label for="payment_method">اختر طريقة الدفع</label>
                                <div class="row">
                                    <!-- Credit Card -->
                                    <div class="col-md-3">
                                        <div class="card payment-card">
                                            <input type="radio" id="paymob_card_payment" name="payment_method"
                                                value="paymob_card_payment" hidden>
                                            <label for="paymob_card_payment" class="card-body text-center">
                                                <img src="/user/img/credit-card.svg" alt="Credit Card Logo"
                                                    class="img-fluid mb-2">
                                                <h5 class="card-title">بطاقة ائتمان</h5>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card payment-card">
                                            <input type="radio" id="paymob_wallet_payment" name="payment_method"
                                                value="paymob_wallet_payment" hidden>
                                            <label for="paymob_wallet_payment" class="card-body text-center">
                                                <img src="/user/img/mobile-wallet.png" alt="Credit Card Logo"
                                                    class="img-fluid mb-2">
                                                <h5 class="card-title">محفظة الكترونيه</h5>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @error('payment_method')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}
                            <div class="pb-3">
                                <label for="payment_method">اختر طريقة الدفع</label>
                                <div class="payment-methods-container">
                                    <!-- Credit Card -->
                                    <div class="payment-card">
                                        <input type="radio" id="paymob_card_payment" name="payment_method"
                                            value="paymob_card_payment" hidden>
                                        <label for="paymob_card_payment" class="card-body text-center">
                                            <img src="/user/img/credit-card.svg" alt="Credit Card Logo"
                                                class="img-fluid mb-3">
                                            <h5 class="card-title">بطاقة ائتمان</h5>
                                        </label>
                                    </div>

                                    <!-- Wallet Payment -->
                                    <div class="payment-card">
                                        <input type="radio" id="paymob_wallet_payment" name="payment_method"
                                            value="paymob_wallet_payment" hidden>
                                        <label for="paymob_wallet_payment" class="card-body text-center">
                                            <img src="/user/img/mobile-wallet.png" alt="Credit Card Logo"
                                                class="img-fluid mb-3">
                                            <h5 class="card-title">محفظة الكترونيه</h5>
                                        </label>
                                    </div>
                                </div>
                                @error('payment_method')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit">تأكيد الاشتراك</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subscription Section End -->
@endsection
