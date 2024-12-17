<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="Refit Academy" />
    <meta name="keywords"
        content="Refit, Refit Academy, Coaching, online Coaching, Academy, Gym, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title')</title>

    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1602232677039685');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=1602232677039685&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->

    <!-- TikTok Pixel Code Start -->
    <script>
        ! function(w, d, t) {
            w.TiktokAnalyticsObject = t;
            var ttq = w[t] = w[t] || [];
            ttq.methods = ["page", "track", "identify", "instances", "debug", "on", "off", "once", "ready", "alias",
                "group", "enableCookie", "disableCookie", "holdConsent", "revokeConsent", "grantConsent"
            ], ttq.setAndDefer = function(t, e) {
                t[e] = function() {
                    t.push([e].concat(Array.prototype.slice.call(arguments, 0)))
                }
            };
            for (var i = 0; i < ttq.methods.length; i++) ttq.setAndDefer(ttq, ttq.methods[i]);
            ttq.instance = function(t) {
                for (
                    var e = ttq._i[t] || [], n = 0; n < ttq.methods.length; n++) ttq.setAndDefer(e, ttq.methods[n]);
                return e
            }, ttq.load = function(e, n) {
                var r = "https://analytics.tiktok.com/i18n/pixel/events.js",
                    o = n && n.partner;
                ttq._i = ttq._i || {}, ttq._i[e] = [], ttq._i[e]._u = r, ttq._t = ttq._t || {}, ttq._t[e] = +new Date,
                    ttq._o = ttq._o || {}, ttq._o[e] = n || {};
                n = document.createElement("script");
                n.type = "text/javascript", n.async = !0, n.src = r + "?sdkid=" + e + "&lib=" + t;
                e = document.getElementsByTagName("script")[0];
                e.parentNode.insertBefore(n, e)
            };


            ttq.load('CSVHK9BC77UA1OP17DE0');
            ttq.page();
        }(window, document, 'ttq');
    </script>
    <!-- TikTok Pixel Code End -->

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Zain:wght@200;300;400;700;800;900&display=swap"
        rel="stylesheet" />

    <!-- Css Styles -->
    <link rel="stylesheet" href="/user/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/user/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/user/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="/user/css/magnific-popup.min.css" />
    <link rel="stylesheet" href="/user/css/slicknav.min.css" />
    <link rel="stylesheet" href="/user/css/style.min.css" />
    <link rel="stylesheet" href="/user/css/styleRTL.min.css" />
    
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
            <a href="https://www.tiktok.com/@refitacademy">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14" height="13"
                    fill="currentColor">
                    <path
                        d="M412.19,107.33a109.09,109.09,0,0,1-77.61-32.16,110.24,110.24,0,0,1-32.18-77.61h-65.1V353.6a68.14,68.14,0,1,1-68.12-68.13,69.58,69.58,0,0,1,18.38,2.5v-70a138.17,138.17,0,0,0-18.38-1.34,137.78,137.78,0,1,0,137.78,137.77V181.36a109.42,109.42,0,0,0,23.56,15.31,108.18,108.18,0,0,0,46.87,10.72V142.29A107.67,107.67,0,0,1,412.19,107.33Z" />
                </svg>
            </a>
            <a href="https://www.facebook.com/people/Refit-Academy/61564070225405/?mibextid=ZbWKwL"><i
                    class="fa fa-facebook"></i></a>
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
                            <img src="/user/img/logo.png" alt="Logo" loading="lazy" />
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

    <!-- Footer Section Begin -->
    <section class="footer-section section" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="fs-about">
                        <div class="fa-logo">
                            <a href="#"><img src="/user/img/logo.png" alt="logo" loading="lazy" /></a>
                        </div>
                        <p>
                            قادرين نوصلك لاحسن نسخة من نفسك في اسرع وقت وباقل الامكانيات زي الآلاف اللي ساعدناهم في
                            الخمس سنين اللي فاتوا
                        </p>
                        <div class="fa-social">
                            <a href="https://www.tiktok.com/@refitacademy">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14"
                                    height="13" fill="currentColor">
                                    <path
                                        d="M412.19,107.33a109.09,109.09,0,0,1-77.61-32.16,110.24,110.24,0,0,1-32.18-77.61h-65.1V353.6a68.14,68.14,0,1,1-68.12-68.13,69.58,69.58,0,0,1,18.38,2.5v-70a138.17,138.17,0,0,0-18.38-1.34,137.78,137.78,0,1,0,137.78,137.77V181.36a109.42,109.42,0,0,0,23.56,15.31,108.18,108.18,0,0,0,46.87,10.72V142.29A107.67,107.67,0,0,1,412.19,107.33Z" />
                                </svg>
                            </a>
                            <a href="https://www.facebook.com/people/Refit-Academy/61564070225405/?mibextid=ZbWKwL"><i
                                    class="fa fa-facebook"></i></a>
                            <a href="https://www.instagram.com/refitacademy?igsh=MTlnOXV3eWw1bTRsOQ%3D%3D"><i
                                    class="fa fa-instagram"></i></a>
                            <a href="http://www.youtube.com/@RefitAcademy-t4x"><i class="fa fa-youtube-play"></i></a>

                            <a href="mailto:refitacademy5@gmail.com">
                                <i class="fa fa-envelope-o"></i>
                            </a>
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
                            <li><a href="mailto:refitacademy5@gmail.com">refitacademy5@gmail.com</a></li>
                            <li>1055459491 (20+)</li>
                            <li><a href="https://wa.me/201055459491" target="_blank"> اتصل بنا </a></li>
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
                            <a class="pr-1">CodeCrafters</a>
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
            <a href="https://wa.me/201055459491" target="_blank">
                <img src="/user/img/whatsapp.png" loading="lazy" alt="whatsapp" />
            </a>
        </div>
    </div>
    <!--end WhatsApp Contact icon-->


    <!-- Js Plugins -->
    <script src="/user/js/jquery-3.3.1.min.js"></script>
    <script defer src="/user/js/bootstrap.min.js"></script>
    <script defer src="/user/js/jquery.magnific-popup.min.js"></script>
    <script defer src="/user/js/jquery.slicknav.min.js"></script>
    <script defer src="/user/js/owl.carousel.min.js"></script>
    <script defer src="/user/js/main.min.js"></script>
    @yield('js')

</body>

</html>
