<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
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

    <!-- clients sessions tracking Code  -->
    <script type="text/javascript">
        (function(c, l, a, r, i, t, y) {
            c[a] = c[a] || function() {
                (c[a].q = c[a].q || []).push(arguments)
            };
            t = l.createElement(r);
            t.async = 1;
            t.src = "https://www.clarity.ms/tag/" + i;
            y = l.getElementsByTagName(r)[0];
            y.parentNode.insertBefore(t, y);
        })(window, document, "clarity", "script", "phwvz34aw1");
    </script>
    <!-- clients sessions tracking Code End -->

    <meta charset="UTF-8" />
    <meta name="description" content="Refit Academy" />
    <meta name="keywords"
        content="Refit, Refit Academy, Coaching, online Coaching, Academy, Gym, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Refit Academy | Instapay</title>

    <!-- Google Font -->
    {{-- <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Zain:wght@200;300;400;700;800;900&display=swap"
        rel="stylesheet" /> --}}
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100..900&display=swap" rel="stylesheet">



    <!-- Css Styles -->
    <link rel="stylesheet" href="/user/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="/user/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="/user/css/style.min.css" type="text/css" />
    <link rel="stylesheet" href="/user/css/styleRTL.css" type="text/css" />

    <!-- Refit Icons  -->
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon-16x16.png">
    <link rel="manifest" href="/assets/img/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
    <!-- Instapay Payment Section -->
    <section class="section-modalAlert" id="payment-status"
        style="border: 1px solid; border-image: linear-gradient(to right, #f36100, purple) 1;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="modalAlert-text">
                        <!-- Instapay icon -->
                        <div class="status-icon">
                            <img src="/user/img/instapay.png" alt="Instapay Payment Instructions" />
                        </div>
                        <div class="img-container d-inline-block mb-3" style="width: 230px">
                            <img src="/user/img/instapay_QR.jpg" alt="">
                        </div>
                        <h4 dir="rtl">
                            المبلغ المطلوب للدفع: <span style="font-weight: bold; color: #f36100;">{{ $amount_paid }}
                                جنيه</span>
                            <br>
                            انسخ (QR Code) أو قم بالدفع من خلال الرقم : 01144714942
                        </h4>
                        <h5 dir="rtl" class="mb-2">
                            أو
                            <a href="https://ipn.eg/S/moustafa2425/instapay/6u8HPA" target="_blank"
                                style="font-weight: bold; color: #f36100;">
                                الضغط على هذا الرابط لإتمام عملية الدفع عبر Instapay
                            </a>
                        </h5>
                        <p dir="rtl">
                            قم بإتمام عملية الدفع وبعد الدفع، أرسل لنا لقطة الشاشة (Screenshot) لعملية الدفع لتأكيد
                            الاشتراك.
                        </p>
                        <a href="{{ route('home') }}" class="pt-4" id="close-section">
                            <i class="fa fa-home"></i>
                            العودة للصفحة الرئيسية
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Instapay Payment Section -->
</body>

</html>
