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
                <h4>
                    قم بالتسجيل الان وابدا رحلتك الرياضية معنا
                </h4>
                <p>
                    القوة الحقيقية تأتي من القدرة على الاستمرار رغم الصعاب والتحديات
                </p>
            </div>
        </div>
        <div class="formSection  w-50 w-md-100">
            <!-- <div class="container"> -->
            <div class="logo text-center mb-3">
                <a href="index.html">
                    <img src="/user/img/logo.png" alt="" />
                </a>
            </div>
            <form action="{{ route('user.register') }}" method="POST">
                @csrf
                <h3 class="text-center">
                    اهلا بك مجددا
                </h3>
                <div class="input-field mt-3">
                    <input placeholder="ادخل اسم المستخدم" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" id="name" type="text">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div>
                    </div>
                </div>
                <div class="input-field mt-3">
                    <input placeholder="ادخل رقم الهاتف" class="form-control @error('phone') is-invalid @enderror"
                        name="phone" value="{{ old('phone') }}" id="phone" type="text">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div>
                    </div>
                </div>
                <div class="input-field mt-3">
                    <input placeholder="ادخل البريد الالكتروني "
                        class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" id="email" type="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div>
                    </div>
                </div>

                <div class="input-field mt-3">
                    <input placeholder="ادخل كلمة المرور "
                        class="form-control @error('password') is-invalid @enderror" name="password"
                        value="{{ old('password') }}" id="password" type="password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div>
                    </div>
                </div>
                <div class="input-field position-relative mt-3">
                    <div class="position-relative">
                        <input placeholder="اعد كتابة كلمة المرور "
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            name="password_confirmation" id="confirm_password" type="password">
                        <!-- <span class="password-toggle-icon">
                            <a role="button" (click)="showConfirmPassword = !showConfirmPassword">
                                <i [class]="showConfirmPassword ? 'ri-eye-off-line' : 'ri-eye-line'"></i>
                            </a>
                        </span> -->
                    </div>
                    <div>
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class=" mt-3">
                    <input type="submit"
                        class="submitBtn btn btn-primary home-btn second-btn justify-content-center w-100"
                        value="سجل الدخول">
                    <!-- <span *ngIf="loading" class="spinner-border spinner-border-sm mr-1"></span> -->
                    {{-- </button> --}}
                </div>
                <div class="social position-relative mt-5 mb-3 w-100">
                    <a class="social-media d-block w-100 text-center mb-2" href="">
                        <img class="ml-2" src="/img/facebook.png" alt="">
                        تسجيل باستخدام فيسبوك
                    </a>
                    <a class="social-media d-block w-100 text-center mb-2" href="">
                        <img class="ml-2" src="/img/google.png" alt="">
                        تسجيل باستخدام جوجل
                    </a>
                    <a class="social-media d-block w-100 text-center mb-2" href="">
                        <img class="ml-2" src="/img/apple.png" alt="">
                        تسجيل باستخدام ابل
                    </a>
                    <span>
                        او
                    </span>
                </div>
            </form>
            <div class="login text-center">
                <h5>
                    لديك حساب بالفعل؟
                    <a href="login.html">
                        سجل الدخول
                    </a>
                </h5>
            </div>

            <!-- </div> -->
        </div>
    </div>
</body>

</html>
