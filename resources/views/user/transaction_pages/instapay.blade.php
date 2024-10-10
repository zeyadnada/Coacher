<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="Gym Template" />
    <meta name="keywords" content="Gym, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Refit Academy | Instapay</title>

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
    <link rel="stylesheet" href="/user/css/style.css" type="text/css" />
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
    <!-- Payment Status Section -->
    <section class="section-modalAlert" id="payment-status"
        style="border: 1px solid; border-image: linear-gradient(to right, #f36100,purple) 1;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="modalAlert-text">
                        <!-- Instapay icon -->
                        <div class="status-icon">
                            <img src="/user/img/instapay.png" alt="Instapay Payment Instructions" />
                        </div>
                        {{-- <h2>رقم الدفع الخاص بنا : 01208776273</h2> <!-- Payment number --> --}}
                        <div class="img-container d-inline-block mb-3" style="width: 230px">
                            <img src="/user/img/instapay_QR.jpg" alt="">
                        </div>
                        <h4 dir="rtl"> انسخ (QR Code) او قم بالدفع من خلال الرقم :01551471731</h4>
                        <p dir="rtl">قم بإتمام عملية الدفع إلى الرقم الموضح أعلاه. بعد الدفع، أرسل لنا لقطة
                            الشاشة (Screenshot) لعملية الدفع لتاكيد الاشتراك.</p>
                        <a href="{{ route('home') }}" class="pt-4" id="close-section">
                            <i class="fa fa-home"></i>
                            العودة للصفحة الرئيسية
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


</body>

</html>
