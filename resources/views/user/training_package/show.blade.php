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
        <br>
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

                        <div class="cd-single-item">
                            <h2>{{ $package->title }}</h2>
                            <div class="mt-4">
                                <h4 style="font-size: 19px; margin-bottom:12px">{{ $package->introduction }}</h4>
                                <h4 style="font-size: 17px;">{{ $package->target_audience }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8">
                    <div class="sidebar-option">
                        <div class="so-categories">
                            <h3 class="title">تفاصيل</h3>
                            <div class="class-details-text">
                                <div class="cd-text">
                                    <div class="cd-single-item">
                                        {!! $package->description !!}
                                    </div>

                                    <!-- Display price based on selected duration -->
                                    {{-- <div class="price-details mt-3">
                                        <!-- Discount Price -->
                                        @if ($selectedDuration && $selectedDuration->discount_price)
                                            <h3 id="discount-price" style="display: inline-block; color:#f36100"
                                                class="pr-1">
                                                {{ $selectedDuration->discount_price }}

                                            </h3>
                                            <h5 style="font-size: 18px;display:inline-block;color:#f36100">جنيه</h5>

                                            <!-- Original Price (Strikethrough) -->
                                            <span class="pr-1" style="font-size: 17px; color:#b5bdc3">
                                                <del id="original-price">{{ $selectedDuration->price }}</del>
                                            </span>
                                        @elseif ($selectedDuration)
                                            <!-- Regular Price -->
                                            <div>
                                                <h2 id="price" style="display: inline-block" class="pr-1">
                                                    {{ $selectedDuration->price }}
                                                </h2>
                                                <h5 style="font-size: 18px">جنيه</h5>
                                            </div>
                                        @endif
                                    </div> --}}

                                    <!-- Display price based on selected duration -->
                                    <div class="price-details mt-3">
                                        <!--final price -->
                                        <h3 id="final-price" style="display: inline-block; color:#f36100" class="pr-1">
                                            {{ $selectedDuration->discount_price ?? $selectedDuration->price }}
                                        </h3>
                                        <h5 style="font-size: 18px; display:inline-block; color:#f36100">جنيه</h5>

                                        <!-- normal Price (price before discount if exist) -->
                                        <span class="pr-1" style="font-size: 17px; color:#b5bdc3">
                                            <del id="price"
                                                style="display: inline-block;">{{ $selectedDuration->discount_price ? $selectedDuration->price : '' }}</del>
                                        </span>
                                    </div>

                                    <div>
                                        <label for="duration-select" class="mb-2 text-white">اختر المدة:</label>
                                        <div class="leave-comment">
                                            <select id="duration-select">
                                                @foreach ($package->durations as $duration)
                                                    <option value="{{ $duration->id }}" data-price="{{ $duration->price }}"
                                                        data-discount-price="{{ $duration->discount_price }}"
                                                        data-coupon-price="{{ $duration->final_price }}"
                                                        {{ isset($selectedDuration) && $selectedDuration->id == $duration->id ? 'selected' : '' }}>
                                                        {{ $duration->duration }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <ul>
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
                                            <span id="coupon-price">{{ $selectedDuration->final_price }} جنيه</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                            @if (!session()->has('coupon'))
                                <div class="leave-comment">
                                    <form action="{{ route('user.coupon.store', ['id' => $package->id]) }}" method="POST">
                                        @csrf
                                        <label class="mb-2 text-white" for="coupon_code">هل يوجد اى كود
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
                                <input type="hidden" id="selected-duration-id" name="duration_id"
                                    value="{{ $selectedDuration->id ?? '' }}">
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
                                <label for="whatsapp_phone">رقم واتساب للمتابعة</label>
                                <input type="tel" class="@error('whatsapp_phone') is-invalid @enderror"
                                    name="whatsapp_phone" value="{{ old('whatsapp_phone') }}" id="whatsapp_phone">
                                @error('whatsapp_phone')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong id="message"></strong>
                                </span>
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
                                    <div class="col-6 col-md-3 mb-3 d-flex">
                                        <div class="payment-card flex-fill">
                                            <input type="radio" id="paymob_card_payment" name="payment_method"
                                                value="paymob_card_payment" hidden>
                                            <label for="paymob_card_payment" class="card-body text-center border rounded">
                                                <img src="/user/img/credit-card.svg" alt="Credit Card Logo"
                                                    class="img-fluid mb-3">
                                                <h5 class="card-title mb-0">بطاقة ائتمان</h5>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Wallet Payment -->
                                    <div class="col-6 col-md-3 mb-3 d-flex">
                                        <div class="payment-card flex-fill">
                                            <input type="radio" id="paymob_wallet_payment" name="payment_method"
                                                value="paymob_wallet_payment" hidden>
                                            <label for="paymob_wallet_payment"
                                                class="card-body text-center border rounded">
                                                <img src="/user/img/mobile-wallet.png" alt="Wallet Payment Logo"
                                                    class="img-fluid mb-3">
                                                <h5 class="card-title mb-0">محفظة الكترونيه</h5>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Instapay Payment -->
                                    <div class="col-6 col-md-3 mb-3 d-flex">
                                        <div class="payment-card flex-fill">
                                            <input type="radio" id="instapay" name="payment_method" value="instapay"
                                                hidden>
                                            <label for="instapay" class="card-body text-center border rounded">
                                                <img src="/user/img/instapay.png" alt="Instapay Logo"
                                                    class="img-fluid mb-3">
                                                <h5 class="card-title mb-0">Instapay</h5>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Bank Installment -->
                                    {{-- <div class="col-6 col-md-3 mb-3 d-flex">
                                        <div class="payment-card flex-fill">
                                            <input type="radio" id="paymob_bank_installement_payment"
                                                name="payment_method" value="paymob_bank_installement_payment" hidden>
                                            <label for="paymob_bank_installement_payment"
                                                class="card-body text-center border rounded">
                                                <img src="/user/img/installment.png" alt="Installment Logo"
                                                    class="img-fluid mb-3">
                                                <h5 class="card-title mb-0">تقسيط بنكي</h5>
                                            </label>
                                        </div>
                                    </div> --}}
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
        //this is script for (intl-tel-input) phone numbers package 
        // Initialize intlTelInput
        const input = document.querySelector("#whatsapp_phone");
        const form = document.querySelector("#form");
        const message = document.querySelector("#message");

        const iti = window.intlTelInput(input, {
            initialCountry: "eg",
            separateDialCode: false,
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@24.4.0/build/js/utils.js" // For formatting and placeholders
        });

        form.onsubmit = () => {
            if (!iti.isValidNumber()) {
                message.innerHTML = "رقم غير صالح (تاكد من الرقم)";
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

    <script>
        // this script for change price automatically according to change package durations
        $(document).ready(function() {
            $('#duration-select').on('change', function() {
                const selectedOption = $(this).find('option:selected');
                const price = selectedOption.data('price');
                const discountPrice = selectedOption.data('discount-price');
                const couponPrice = selectedOption.data('coupon-price');


                // Update hidden input for selected duration ID
                $('#selected-duration-id').val($(this).val());

                // Update price and discount price dynamically
                // Show discount price if available
                if (discountPrice) {
                    $('#final-price').text(discountPrice).show();
                    $('#price').text(price).show();
                } else if (!discountPrice) {
                    $('#final-price').text(price).show();
                    $('#price').hide();
                }
                // Update coupon price (if exist)
                $('#coupon-price').text(couponPrice + ' جنيه');

                // Update the URL with the new duration_id
                var currentUrl = new URL(window.location.href);
                currentUrl.searchParams.set('duration_id', $(this).val());
                window.history.pushState({}, '', currentUrl);
            });
        });
    </script>
@endsection
