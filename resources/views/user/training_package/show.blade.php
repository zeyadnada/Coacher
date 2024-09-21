@extends('user.layouts.parent')
@section('title', $package->title)

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@24.4.0/build/css/intlTelInput.css">
@section('css')
    <style>
        label {
            margin-bottom: 0;
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

        .iti {
            width: 100%;
        }

        .iti__selected-country {
            padding: 5px !important;
        }

        .payment-card img {
            max-height: 64px;
            /* Control the image height for consistency */
        }
    </style>
@endsection
@section('content')
    <!-- Class Details Section Begin -->
    <section class="class-details-section spad">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success text-center mx-auto">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger text-center mx-auto">
                    {{ session('error') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-6">
                    <div class="class-details-text">
                        {{-- <div class="cd-pic">
                            <img src="{{ '/storage/' . $package->image }}" alt="" />
                        </div> --}}
                        {{-- <div class="cd-text">
                            <div class="cd-single-item">
                                <h3>{{ $package->title }}</h3>
                                <p>
                                    {!! $package->description !!}
                                </p>
                            </div>
                            <div class="cd-single-item">
                                <h4>{{ $package->price }}EGP</h4>
                            </div>
                            @if (!session()->has('coupon'))
                                <form action="{{ route('user.coupon.store', ['id' => $package->id]) }}" method="POST">
                                    @csrf
                                    <label for="coupon_code" style="color: white">هل يوجد اى كود خصم؟</label> <br>
                                    <input type="text" name="coupon_code" id="coupon_code"><br>
                                    <input type="submit" value="خصم">
                                </form>
                            @endif
                        </div> --}}
                        <div class="cd-single-item">
                            <h2>{{ $package->title }}</h2>
                            <div class="mt-5">
                                <h4 style="font-size: 19px; margin-bottom:12px">{{ $package->introduction }}</h4>
                                <h4 style="font-size: 17px;">{{ $package->target_audience }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8">
                    <div class="sidebar-option">
                        <div class="so-categories">
                            <h4 class="title">تفاصيل</h4>
                            <div class="class-details-text">
                                <div class="cd-text">
                                    <div class="cd-single-item">
                                        {{-- <h3>{{ $package->title }}</h3> --}}

                                        {!! $package->description !!}

                                    </div>
                                    {{-- @if ($package->discount_price)
                                        <h3 class="pl-1" style="display: inline-block">{{ $package->discount_price }}</h3>
                                        <span
                                            style="font-size: 17px;color:aliceblue"><del>{{ $package->price }}</del></span>
                                    @else
                                        <h3>{{ $package->price }}EGP</h3>
                                    @endif --}}

                                    @if ($package->discount_price)
                                        <div>
                                            <h3 style="display: inline-block; color:#f36100" class="pr-1">
                                                {{ $package->discount_price }}
                                            </h3>
                                            <h5 style="font-size: 18px;display:inline-block;color:#f36100">جنيه</h5>
                                            <span class="pr-1"
                                                style="font-size: 17px; color:#b5bdc3"><del>{{ $package->price }}</del></span>
                                        </div>
                                    @else
                                        <div>
                                            <h2 style="display: inline-block" class="pr-1">{{ $package->price }}</h2>
                                            <h5 style="font-size: 18px">جنيه</h5>
                                        </div>
                                    @endif
                                    {{-- <div class="cd-single-item">
                                        <h4>{{ $package->price }}EGP</h4>
                                    </div> --}}
                                </div>
                            </div>

                            <ul>
                                <li>
                                    <a href="#"> المدة <span>{{ $package->duration }}</span></a>
                                </li>
                                {{-- <li>
                                    <a href="#"> السعر <span>{{ $package->price }} جنيه</span></a>
                                </li> --}}
                                @if (session()->has('coupon'))
                                    <li>
                                        <a href="#"> كود الخصم
                                            <span>{{ session()->get('coupon')['code'] }}
                                            </span></a>
                                    </li>
                                    <li>
                                        @if (session()->get('coupon')['type'] == 'percent')
                                            <a href="#"> الخصم <span>
                                                    {{ session()->get('coupon')['percent'] }} %
                                                    جنيه</span></a>
                                        @elseif (session()->get('coupon')['type'] == 'fixed')
                                            <a href="#"> الخصم <span>-
                                                    {{ session()->get('coupon')['value'] }}
                                                    جنيه</span></a>
                                        @endif
                                    </li>
                                    <li>
                                        <a href="#"> اجمالى السعر بعد الخصم
                                            <span>{{ $package->final_price }} جنيه</span></a>
                                    </li>
                                @endif
                            </ul>
                            @if (!session()->has('coupon'))
                                <div class="leave-comment">
                                    <form action="{{ route('user.coupon.store', ['id' => $package->id]) }}" method="POST">
                                        @csrf
                                        <label class="mb-2" for="coupon_code" style="color: white">هل يوجد اى كود
                                            خصم؟</label>
                                        <div class="row">
                                            <div class="col-9">
                                                <input type="text" name="coupon_code" id="coupon_code">
                                            </div>
                                            <div class="col-3">
                                                <button type="submit" class="btn-primary">تفعيل</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endif
                            @if (session()->has('coupon'))
                                <form action="{{ route('user.coupon.destroy', ['id' => $package->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn-primary" type="submit">حذف الكود</button>
                                </form>
                            @endif
                        </div>
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
                        <form id="form" action="{{ route('user.subscription.store', $package->id) }}" method="post"
                            enctype="multipart/form-data">
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
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="text" hidden name="full_phone" />
                                <input type="text" hidden name="country_code" />

                            </div>

                            <!-- starting_date -->
                            <div class="pb-3 rtl form-floating custom-date-input">
                                <label for="starting_date">تاريخ بداية الاشتراك</label>
                                <input id="starting_date" type="date" name="starting_date"
                                    value="{{ old('starting_date', \Carbon\Carbon::now()->format('Y-m-d')) }}"
                                    class="@error('starting_date') is-invalid @enderror" placeholder="">
                                @error('starting_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <!-- Payment Method Cards -->
                            <div class="pb-3">
                                <label for="payment_method" class="pb-2">اختر طريقة الدفع</label>
                                <div class="payment-methods-container row">
                                    <!-- Credit Card -->
                                    <div class="col-6 col-lg-3 mb-3">
                                        <div class="payment-card">
                                            <input type="radio" id="paymob_card_payment" name="payment_method"
                                                value="paymob_card_payment" hidden>
                                            <label for="paymob_card_payment" class="card-body text-center border rounded">
                                                <img src="/user/img/credit-card.svg" alt="Credit Card Logo"
                                                    class="img-fluid mb-3">
                                                <h5 class="card-title">بطاقة ائتمان</h5>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Wallet Payment -->
                                    <div class="col-6 col-lg-3 mb-3">
                                        <div class="payment-card">
                                            <input type="radio" id="paymob_wallet_payment" name="payment_method"
                                                value="paymob_wallet_payment" hidden>
                                            <label for="paymob_wallet_payment"
                                                class="card-body text-center border rounded">
                                                <img src="/user/img/mobile-wallet.png" alt="Wallet Payment Logo"
                                                    class="img-fluid mb-3">
                                                <h5 class="card-title">محفظة الكترونيه</h5>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Instapay Payment -->
                                    <div class="col-6 col-lg-3 mb-3">
                                        <div class="payment-card">
                                            <input type="radio" id="instapay" name="payment_method" value="instapay"
                                                hidden>
                                            <label for="instapay" class="card-body text-center border rounded">
                                                <img src="/user/img/instapay.png" alt="Instapay Logo"
                                                    class="img-fluid mb-3">
                                                <h5 class="card-title">Instapay</h5>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Bank Installment -->
                                    <div class="col-6 col-lg-3 mb-3">
                                        <div class="payment-card">
                                            <input type="radio" id="paymob_bank_installement_payment"
                                                name="payment_method" value="paymob_bank_installement_payment" hidden>
                                            <label for="paymob_bank_installement_payment"
                                                class="card-body text-center border rounded">
                                                <img src="/user/img/installment.png" alt="Installment Logo"
                                                    class="img-fluid mb-3">
                                                <h5 class="card-title">تقسيط بنكي</h5>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @error('payment_method')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>
                            <button type="submit">تأكيد الاشتراك</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subscription Section End -->
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@24.4.0/build/js/intlTelInput.min.js"></script>
    <script>
        // Initialize intlTelInput
        const input = document.querySelector("#whatsapp_phone");
        const form = document.querySelector("#form");
        const message = document.querySelector("#message");

        const iti = window.intlTelInput(input, {
            initialCountry: "eg",
            separateDialCode: true,
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@24.4.0/build/js/utils.js" // For formatting and placeholders
        });

        form.onsubmit = () => {
            if (!iti.isValidNumber()) {
                message.innerHTML = "Invalid number. Please try again.";
                return false;
            }

            // Manually set hidden inputs
            const hiddenPhone = form.querySelector('input[name="full_phone"]');
            if (hiddenPhone) {
                hiddenPhone.value = iti.getNumber(); // Sets the full phone number
            }

            const hiddenCountry = form.querySelector('input[name="country_code"]');
            if (hiddenCountry) {
                hiddenCountry.value = iti.getSelectedCountryData().iso2; // Sets the country code
            }
        };

        const urlParams = new URLSearchParams(window.location.search);
        const fullPhone = urlParams.get('full_phone');
        if (fullPhone) {
            message.innerHTML = `Submitted hidden input value: ${fullPhone}`;
        }
    </script>

@endsection
