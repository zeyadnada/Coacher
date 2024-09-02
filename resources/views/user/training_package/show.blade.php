@extends('user.layouts.parent')
@section('title', $package->title)

@section('css')
    <style>
        .rtl {
            direction: rtl;
            text-align: right;
        }

        .rtl input {
            direction: rtl;
            text-align: right;
        }

        .form-floating {
            position: relative;
        }

        .form-floating .form-control {
            padding-top: 1.75rem;
            padding-bottom: .75rem;
            border-radius: .25rem;
        }

        .form-floating label {
            position: absolute;
            top: 0;
            left: 0;
            padding: .75rem .75rem;
            pointer-events: none;
            transition: .1s ease-in-out;
            font-size: .75rem;
            color: #b5bdc3;
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

            @if (count($errors) > 0)
                <div class="spacer"></div>
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
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
                                <h4>{{ $package->price }} رس</h4>
                            </div>
                            {{-- <div class="cd-single-item"> --}}
                            @if (!session()->has("coupon_$package->id"))
                                <form action="{{ route('coupon.store', ['id' => $package->id]) }}" method="POST">
                                    @csrf
                                    {{-- @method('delete') --}}
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
                                        <a href="#"> كود الخصم <span>{{ session()->get("coupon_$package->id")['code'] }}
                                            </span></a>
                                        <form action="{{ route('coupon.destroy',['id'=>$package->id]) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="حذف الكود">
                                        </form>
                                    </li>
                                    <li>
                                        @if (session()->get("coupon_$package->id")['type'] == 'percent')
                                            <a href="#"> الخصم <span> {{ session()->get("coupon_$package->id")['percent'] }} %
                                                    رس</span></a>
                                        @elseif (session()->get("coupon_$package->id")['type'] == 'fixed')
                                            <a href="#"> الخصم <span>- {{ session()->get("coupon_$package->id")['value'] }}
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
                        @if (!$subscription)
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-title">
                                        <span>تريد الاشتراك في هذه البافة ؟</span>
                                        <h2>اشترك الان</h2>
                                    </div>
                                </div>
                            </div>
                            {{-- <form action="{{ route('user.subscription.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                <div>
                                    <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                                    <input type="text" name="package_id" value="{{ $package->id }}" hidden>
                                </div>

                                <!-- WhatsApp Phone -->
                                <div class="pb-3">
                                    <input type="text" class="@error('whatsapp_phone') is-invalid @enderror"
                                        name="whatsapp_phone" value="{{ old('whatsapp_phone') }}" id="whatsapp_phone"
                                        placeholder="رقم الهاتف للتواصل">
                                    @error('whatsapp_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Age -->
                                <div class="pb-3">
                                    <input id="age" type="number" name="age" value="{{ old('age') }}"
                                        class="@error('age') is-invalid @enderror" placeholder="ادخل العمر">
                                    @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Height -->
                                <div class="pb-3">
                                    <input id="height" type="number" name="height" value="{{ old('height') }}"
                                        placeholder="ادخل الطول (سـم)" class="@error('height') is-invalid @enderror">
                                    @error('height')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Weight -->
                                <div class="pb-3">
                                    <input id="weight" type="number" name="weight" value="{{ old('weight') }}"
                                        placeholder="ادخل الوزن (كيلوجرام)" class="@error('weight') is-invalid @enderror">
                                    @error('weight')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- starting_date -->
                                <div class="pb-3 rtl form-floating custom-date-input">
                                    <input id="starting_date" type="date" name="starting_date"
                                        value="{{ old('starting_date', \Carbon\Carbon::now()->format('Y-m-d')) }}"
                                        class="@error('starting_date') is-invalid @enderror" placeholder=" ">
                                    <label for="starting_date">متي تود ان يبدا اشتراكك؟</label>
                                    @error('starting_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <button type="submit">تأكيد الاشتراك</button>
                            </form> --}}
                            <form action="{{ route('user.subscription.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                <div>
                                    <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                                    <input type="text" name="package_id" value="{{ $package->id }}" hidden>
                                </div>

                                <!-- WhatsApp Phone -->
                                <div class="pb-3">
                                    <input type="text" class="@error('whatsapp_phone') is-invalid @enderror"
                                        name="whatsapp_phone" value="{{ old('whatsapp_phone') }}" id="whatsapp_phone"
                                        placeholder="رقم الهاتف للتواصل">
                                    @error('whatsapp_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Age -->
                                <div class="pb-3">
                                    <input id="age" type="number" name="age" value="{{ old('age') }}"
                                        class="@error('age') is-invalid @enderror" placeholder="ادخل العمر">
                                    @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Height -->
                                <div class="pb-3">
                                    <input id="height" type="number" name="height" value="{{ old('height') }}"
                                        placeholder="ادخل الطول (سـم)" class="@error('height') is-invalid @enderror">
                                    @error('height')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Weight -->
                                <div class="pb-3">
                                    <input id="weight" type="number" name="weight" value="{{ old('weight') }}"
                                        placeholder="ادخل الوزن (كيلوجرام)" class="@error('weight') is-invalid @enderror">
                                    @error('weight')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- starting_date -->
                                <div class="pb-3 rtl form-floating custom-date-input">
                                    <input id="starting_date" type="date" name="starting_date"
                                        value="{{ old('starting_date', \Carbon\Carbon::now()->format('Y-m-d')) }}"
                                        class="@error('starting_date') is-invalid @enderror" placeholder=" ">
                                    <label for="starting_date">متي تود ان يبدا اشتراكك؟</label>
                                    @error('starting_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- Payment Method Cards -->
                                <div class="pb-3">
                                    <label for="payment_method">اختر طريقة الدفع</label>
                                    <div class="row">
                                        <!-- Credit Card -->
                                        <div class="col-md-3">
                                            <div class="card payment-card">
                                                <input type="radio" id="paymob_card_payment" name="payment_method"
                                                    value="paymob_card_payment" hidden>
                                                <label for="paymob_card_payment" class="card-body text-center">
                                                    <img src="/user/img/visa.png" alt="Credit Card Logo"
                                                        class="img-fluid mb-3">
                                                    <h5 class="card-title">بطاقة ائتمان</h5>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card payment-card">
                                                <input type="radio" id="paymob_wallet_payment" name="payment_method"
                                                    value="paymob_wallet_payment" hidden>
                                                <label for="paymob_wallet_payment" class="card-body text-center">
                                                    <img src="/user/img/visa.png" alt="Credit Card Logo"
                                                        class="img-fluid mb-3">
                                                    <h5 class="card-title">محفظة الكترونيه</h5>
                                                </label>
                                            </div>
                                        </div>


                                        <!-- PayPal -->
                                        <div class="col-md-3">
                                            <div class="card payment-card">
                                                <input type="radio" id="paymob_value_payment" name="payment_method"
                                                    value="paymob_value_payment" hidden>
                                                <label for="paymob_value_payment" class="card-body text-center">
                                                    <img src="path_to_paypal_logo.png" alt="PayPal Logo"
                                                        class="img-fluid mb-3">
                                                    <h5 class="card-title">باي بال</h5>
                                                </label>
                                            </div>
                                        </div>

                                        <!-- Bank Transfer -->
                                        <div class="col-md-3">
                                            <div class="card payment-card">
                                                <input type="radio" id="paymob_bank_installement_payment"
                                                    name="payment_method" value="paymob_bank_installement_payment" hidden>
                                                <label for="paymob_bank_installement_payment"
                                                    class="card-body text-center">
                                                    <img src="path_to_bank_transfer_logo.png" alt="Bank Transfer Logo"
                                                        class="img-fluid mb-3">
                                                    <h5 class="card-title">تحويل بنكي</h5>
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

                                <button type="submit">تأكيد الاشتراك</button>
                            </form>

                            <style>
                                .payment-card {
                                    border: 1px solid #ccc;
                                    cursor: pointer;
                                }

                                .payment-card:hover {
                                    border-color: #165190;
                                }

                                .payment-card input[type="radio"]:checked+label {
                                    border-color: #165190;
                                    background-color: #f0f8ff;
                                }
                            </style>
                        @else
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-title">
                                        <span>تريد الاشتراك في هذه البافة ؟</span>
                                        <h3 style="color:aliceblue">لقد قمت بالاشتراك مسبقاً</h3>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('user.subscription.update', $subscription->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div>
                                    <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                                    <input type="text" name="package_id" value="{{ $package->id }}" hidden>
                                </div>

                                <!-- WhatsApp Phone -->
                                <div class="pb-3">
                                    <input type="text" class="@error('whatsapp_phone') is-invalid @enderror"
                                        name="whatsapp_phone"
                                        value="{{ old('whatsapp_phone', $subscription->whatsapp_phone) }}"
                                        id="whatsapp_phone" placeholder="رقم الهاتف للتواصل">
                                    @error('whatsapp_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Age -->
                                <div class="pb-3">
                                    <input id="age" type="number" name="age"
                                        value="{{ old('age', $subscription->age) }}"
                                        class="@error('age') is-invalid @enderror" placeholder="ادخل العمر">
                                    @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Height -->
                                <div class="pb-3">
                                    <input id="height" type="number" name="height"
                                        value="{{ old('height', $subscription->height) }}" placeholder="ادخل الطول (سـم)"
                                        class="@error('height') is-invalid @enderror">
                                    @error('height')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Weight -->
                                <div class="pb-3">
                                    <input id="weight" type="number" name="weight"
                                        value="{{ old('weight', $subscription->weight) }}"
                                        placeholder="ادخل الوزن (كيلوجرام)" class="@error('weight') is-invalid @enderror">
                                    @error('weight')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- starting_date -->
                                <div class="pb-3 rtl form-floating custom-date-input">
                                    <input id="starting_date" type="date" name="starting_date"
                                        value="{{ old('starting_date', $subscription->starting_date) }}"
                                        class="@error('starting_date') is-invalid @enderror" placeholder=" "
                                        {{ $subscription->starting_date >= now() ? '' : 'readonly' }}>

                                    <label for="starting_date">
                                        {{ $subscription->starting_date >= now()
                                            ? 'تعديل تاريخ بدء الاشتراك'
                                            : 'لقد بدأ اشتراكك بالفعل، لا يمكنك تعديل تاريخ البدء' }}
                                    </label>

                                    @error('starting_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <button type="submit">تحديث الاشتراك</button>
                            </form>
                        @endif
                    </div>
                    <a href="{{ route('paymob.refund', [210792757, $package->price]) }}">refunddd</a>
                </div>
            </div>
        </div>
    </section>
    <!-- subscription Section End -->

@endsection
