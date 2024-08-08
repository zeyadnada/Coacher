<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="Gym Template" />
    <meta name="keywords" content="Gym, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Gym | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Zain:wght@200;300;400;700;800;900&display=swap"
        rel="stylesheet" />

    <!-- Css Styles -->
    <link rel="stylesheet" href="/user/css/bootstrap.min.css" type="text/css" />

    <link rel="stylesheet" href="/user/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="/user/css/flaticon.css" type="text/css" />
    <link rel="stylesheet" href="/user/css/owl.carousel.min.css" type="text/css" />
    <link rel="stylesheet" href="/user/css/barfiller.css" type="text/css" />
    <link rel="stylesheet" href="/user/css/magnific-popup.css" type="text/css" />
    <link rel="stylesheet" href="/user/css/slicknav.min.css" type="text/css" />
    <link rel="stylesheet" href="/user/css/style.css" type="text/css" />
    <link rel="stylesheet" href="/user/css/styleRTL.css" type="text/css" />
    <link rel="stylesheet" href="/user/css/login-style.css" type="text/css" />
</head>

<body>
    <div class="signPages d-flex">
        <div class="nonFormSection d-none d-lg-block position-relative loginbackground">
            <div class="overlay position-absolute">
                <h4>قم بالتسجيل الان وابدا رحلتك الرياضية معنا</h4>
                <p>
                    القوة الحقيقية تأتي من القدرة على الاستمرار رغم الصعاب والتحديات
                </p>
            </div>
        </div>
        <div class="formSection w-50 w-md-100">
            <div class="logo text-center mb-3">
                <a href="index.html">
                    <img src="/user/img/logo.png" alt="" />
                </a>
            </div>
            <form method="post" action="{{ route('user.login') }}" >
                @csrf
                <h3 class="text-center">سجل دخولك الان</h3>
                <div class="input-field mt-4">
                    <input placeholder="ادخل البريد الالكتروني"  id="email" type="email"
                        formControlName="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <div>
                        {{-- <small class="text-danger">
                            هذا الحقل مطلوب
                        </small>
                        <small class="text-danger">
                            ادخل بريد الكتروني صحيح
                        </small> --}}
                    </div>
                </div>
                <div class="input-field position-relative mt-4">
                    <input type="password" placeholder="ادخل كلمة المرور"
                        class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <div>
                        {{-- <small class="text-danger">
                            هذا الحقل مطلوب
                        </small>
                        <small class="text-danger">
                            يجب ان تكون كلمة المرور اكثر من 6 احرف
                        </small> --}}
                    </div>
                </div>
                <div class="forgetPass text-end mt-3 mb-2">
                    <a> نسيت كلمة المرور ؟ </a>
                </div>
                <div class="mt-3">
                    <input type="submit" class="submitBtn btn btn-primary home-btn second-btn justify-content-center w-100" value="سجل الدخول">
                        <!-- <span
                *ngIf="loading"
                class="spinner-border spinner-border-sm mr-1"
              ></span> -->
                        {{-- سجل الدخول --}}
                        {{-- <input type="submit" value="sff"> --}}
                    {{-- </button> --}}
                    {{-- <input type="submit" value=""> --}}
                </div>
                <div class="policy mt-3 d-flex align-items-center">
                    <input class="form-check-input " type="checkbox" id="policy" />
                    <label class="mb-0 mr-3" for="policy">
                        اوافق على
                        <a href=""> شروط الاستخدام </a>
                        و
                        <a href=""> سياسة الخصوصية </a>
                    </label>
                </div>
                <div class="social position-relative mt-5 mb-3 w-100">
                    <a class="social-media d-block w-100 text-center mb-2" href="">
                        <img class="ml-2" src="/user/img/facebook.png" alt="" />
                        سجل دخولك باستخدام فيسبوك

                    </a>
                    <a class="social-media d-block w-100 text-center mb-2" href="">
                        <img class="ml-2" src="/user/img/google.png" alt="" />
                        سجل دخولك باستخدام جوجل
                    </a>
                    <a class="social-media d-block w-100 text-center mb-2" href="">
                        <img class="ml-2" src="/user/img/apple.png" alt="" />
                        سجل دخولك باستخدام ابل
                    </a>
                    <span> او </span>
                </div>
            </form>
            <div class="login text-center">
                <h5>
                    ليس لديك حساب ؟
                    <a href="{{ route('user.register') }}"> سجل الان </a>
                </h5>
            </div>
        </div>
    </div>
</body>

</html>
