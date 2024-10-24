<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="Gym Template" />
    <meta name="keywords" content="Gym, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title')</title>

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

    <!-- Refit Icons  -->
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon-16x16.png">
    <link rel="manifest" href="/assets/img/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    @yield('css')
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>

    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="fa fa-close"></i>
        </div>
        <nav class="canvas-menu mobile-menu">
            <ul>
                <li class="@yield('home')">
                    <a href="{{ route('home') }}"> الصفحة الرئيسية </a>
                </li>
                <li class="@yield('package')"><a href="{{ route('home') }}#packages">الباقات
                    </a></li>
                <li><a href="{{ route('home') }}#transformations">انجازات المشتركين</a></li>
                <li class="@yield('trainer')"><a href="{{ route('user.trainer.index') }}">فريقنا</a></li>
                <li><a href="#footer"> اتصل بنا </a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="canvas-social">
            <a href="https://www.facebook.com/people/Refit-Academy/61564070225405/?mibextid=ZbWKwL"><i
                    class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="http://www.youtube.com/@RefitAcademy-t4x"><i class="fa fa-youtube-play"></i></a>
            <a href="https://www.instagram.com/refitacademy?igsh=MTlnOXV3eWw1bTRsOQ%3D%3D"><i
                    class="fa fa-instagram"></i></a>
        </div>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 d-flex">
                    <div class="logo d-inline-block">
                        <a href="/">
                            <img src="/user/img/logo.png" alt="Logo" />
                        </a>
                    </div>
                    <div class="text-center d-lg-none d-inline-block flex-fill pl-4rem">
                        <a href="/#packages" class="btn btn-outline-primary"> اشترك الان </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="nav-menu">
                        <ul>
                            <li class="nav-item">
                                <a href="/#main" class="nav-link"> الصفحة الرئيسية </a>
                            </li>
                            <li class="nav-item"><a href="/#packages" class="nav-link">الباقات
                                </a></li>
                            <li class="nav-item"><a href="/#transformations" class="nav-link">انجازات المشتركين</a>
                            </li>
                            <li class="@yield('trainer') nav-item"><a href="{{ route('user.trainer.index') }}"
                                    class="nav-link">فريقنا</a></li>
                            <li class="nav-item"><a href="/#footer" class="nav-link"> اتصل بنا </a></li>
                        </ul>
                    </nav>
                </div>
                {{-- <div class="col-lg-3">
                    <div class="top-option">
                        <div class="to-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-3">
                    <div class="text-left top-option">
                        <a href="/#packages" class="btn btn-outline-primary ml-2"> اشترك الان </a>
                    </div>
                </div>
            </div>
            <div class="canvas-open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header End -->
    @yield('content')

    <!-- Get In Touch Section Begin -->
    {{-- <div class="gettouch-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="gt-text">
                        <i class="fa fa-mobile"></i>
                        <ul>
                            <li>201551471731+</li>
                            <li>201126518696+</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="gt-text email">
                        <i class="fa fa-envelope"></i>
                        <p>Support.gymcenter@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Get In Touch Section End -->

    <!-- Footer Section Begin -->
    <section class="footer-section section" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="fs-about">
                        <div class="fa-logo">
                            <a href="#"><img src="/user/img/logo.png" alt="" /></a>
                        </div>
                        <p>
                            قادرين نوصلك لاحسن نسخة من نفسك في اسرع وقت وباقل الامكانيات زي الآلاف اللي ساعدناهم في
                            الخمس سنين اللي فاتوا
                        </p>
                        <div class="fa-social">
                            <a href="https://www.facebook.com/people/Refit-Academy/61564070225405/?mibextid=ZbWKwL"><i
                                    class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="http://www.youtube.com/@RefitAcademy-t4x"><i class="fa fa-youtube-play"></i></a>
                            <a href="https://www.instagram.com/refitacademy?igsh=MTlnOXV3eWw1bTRsOQ%3D%3D"><i
                                    class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-envelope-o"></i></a>
                            {{-- <i class="fab fa-tiktok"></i> --}}

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="fs-widget">
                        <h4>روابط سريعة</h4>
                        <ul>
                            <li><a href="{{ route('user.about') }}">من نحن</a></li>
                            <li><a href="{{ route('user.privacyPolicy') }}"> سياسة الخصوصية </a></li>
                            <li><a href="{{ route('user.refundPolicy') }}"> سياسة الاسترداد </a></li>
                            <li><a href="{{ route('home') }}#packages"> اشترك </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="fs-widget">
                        <h4>تواصل معنا</h4>
                        <ul>
                            <li><a href="mailto:info@gmail.com">info@gmail.com</a></li>
                            <li>1126518696 (20+)</li>
                            <li><a href="https://wa.me/201126518696" target="_blank"> اتصل بنا </a></li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="copyright-text">
                        <p> صنع بكل
                            <i class="fa fa-heart" aria-hidden="true"></i>
                            بواسطة
                            <a class="pr-1" href="https://wa.me/201208776273" target="_blank">CodeCrafters</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here....." />
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!--start WhatsApp Contact icon-->
    <div class="contact-us">
        <span class="contact-text">اضغط للتواصل عبر واتساب</span>
        <div class="whatsapp-icon d-inline-block">
            <a href="https://wa.me/201028829262" target="_blank">
                <img src="/user/img/whatsapp.png" alt="whatsapp" />
            </a>
        </div>
    </div>
    <!--end WhatsApp Contact icon-->


    <!-- Js Plugins -->
    <script src="/user/js/jquery-3.3.1.min.js"></script>
    <script src="/user/js/bootstrap.min.js"></script>
    <script src="/user/js/jquery.magnific-popup.min.js"></script>
    <script src="/user/js/masonry.pkgd.min.js"></script>
    <script src="/user/js/jquery.barfiller.js"></script>
    <script src="/user/js/jquery.slicknav.js"></script>
    <script src="/user/js/owl.carousel.min.js"></script>
    <script src="/user/js/main.js"></script>
    @yield('js')
</body>

</html>
