@extends('user.layouts.parent')


@section('title', 'Refit Academy')
@section('home', 'active')

@section('content')

    <!--Success Payment Section Begin (appear only in success payment) -->
    @if (session('paymentSuccess'))
        <section class="section-modalAlert" id="paymeny-status">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="modalAlert-text">
                            <!-- Green circle with checkmark image -->
                            <div class="status-icon">
                                <img src="/user/img/confirm-icon.svg" alt="Success" />
                            </div>
                            <h2> {{ session('paymentSuccess') }}</h2>
                            <h4>تمت عملية الدفع بنجاح</h4>
                            <p>نشكركم على إتمام عملية الدفع. تم تأكيد الطلب الخاص بكم، وسنقوم بالاتصال بك قريبًا.</p>
                            <a href="javascript:void(0)" class="pt-4" id="close-section">
                                <i class="fa fa-home"></i>
                                العودة للصفحة الرئيسية
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!--Success Payment Section End (appear only in success payment) -->

    <!-- Failed Payment Section Begin (appear only in failed payment) -->
    @if (session('paymentFailed'))
        <section class="section-modalAlert" id="paymeny-status">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="modalAlert-text">
                            <!-- Red circle with cross mark image -->
                            <div class="status-icon">
                                <img src="/user/img/error-icon.svg" alt="Failed Payment" />
                            </div>
                            <h2> {{ session('paymentFailed') }}</h2>
                            <h4>لم تتم عملية الدفع</h4>
                            <p>نأسف، ولكن حدث خطأ أثناء محاولة الدفع. يرجى التحقق من تفاصيل الدفع أو المحاولة مرة أخرى.</p>
                            <a href="javascript:void(0)" class="pt-4" id="close-section">
                                <i class="fa fa-home"></i>
                                العودة للصفحة الرئيسية
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- Failed Payment Section End (appear only in failed payment) -->


    <!-- Header Section Begin -->
    <section class="hero-section">
        <section class="banner-section set-bg" data-setbg="/user/img/hero/hero-1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="bs-text">
                            <h2>سجل الان للحصول على صفقات جديدة</h2>
                            <div class="bt-tips">حيث الصحة والجمال واللياقة يلتقون</div>
                            <a href="{{ route('user.training-packages.index') }}" class="primary-btn btn-normal"> اشترك الان
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <!-- Header Section End -->

    <!-- ChoseUs Section Begin -->
    <section class="choseus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span> لماذا تختارنا ؟ </span>
                        <h2>تخطى حدودك</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="cs-item">
                        <span class="flaticon-034-stationary-bike"></span>
                        <h4>معدات متقدمة</h4>
                        <p>لوريم ايبسوم دولار سيت اميت, كونسيكتيتور اديبا اسينج ايليت.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="cs-item">
                        <span class="flaticon-033-juice"></span>
                        <h4>خطة تدريبية صحية</h4>
                        <p>لوريم ايبسوم دولار سيت اميت, كونسيكتيتور اديبا اسينج ايليت.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="cs-item">
                        <span class="flaticon-002-dumbell"></span>
                        <h4>تدريبات مخصصة</h4>
                        <p>لوريم ايبسوم دولار سيت اميت, كونسيكتيتور اديبا اسينج ايليت.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="cs-item">
                        <span class="flaticon-014-heart-beat"></span>
                        <h4>تدريبات متنوعة</h4>
                        <p>لوريم ايبسوم دولار سيت اميت, كونسيكتيتور اديبا اسينج ايليت.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ChoseUs Section End -->

    <!-- Pricing Section Begin -->
    <section class="pricing-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span> خطط الاسعار </span>
                        <h2>اختر خطة اسعارك المفضلة</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @forelse ($packages as $package)
                    <div class="col-lg-4 col-md-8">
                        <div class="ps-item">
                            <h3>{{ $package->title }}</h3>
                            <div class="pi-price">
                                {{-- <h2>6000 EGP</h2> --}}
                                @if ($package->discount_price)
                                    <div>
                                        <h2 style="display: inline-block" class="pr-1">{{ $package->discount_price }}</h2>
                                        <h5 style="font-size: 18px">جنيه</h5>
                                        <span class="pr-1" style="font-size: 17px"><del>{{ $package->price }}</del></span>
                                    </div>
                                @else
                                    <div>
                                        <h2 style="display: inline-block" class="pr-1">{{ $package->price }}</h2>
                                        <h5 style="font-size: 18px">جنيه</h5>
                                    </div>
                                @endif
                                <span>{{ $package->duration }}</span>
                            </div>
                            {{-- <div> --}}
                            {!! $package->description !!}
                            {{-- </div> --}}
                            <a href="{{ route('user.training-packages.show', $package->id) }}"
                                class="primary-btn pricing-btn"> اشترك الان </a>
                            {{-- <a href="#" class="thumb-icon"><i class="fa fa-picture-o"></i></a> --}}
                        </div>
                    </div>
                @empty
                @endforelse

            </div>
        </div>
    </section>
    <!-- Pricing Section End -->

    <!-- Subscriptions Steps Section Begin -->
    <section class="choseus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>ماذا تنتظر?</span>
                        <h2>خطوات الاشتراك</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="cs-item">
                        <span class="flaticon-034-stationary-bike"></span>
                        <h4>معدات متقدمة</h4>
                        <p>لوريم ايبسوم دولار سيت اميت, كونسيكتيتور اديبا اسينج ايليت.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="cs-item">
                        <span class="flaticon-033-juice"></span>
                        <h4>خطة تدريبية صحية</h4>
                        <p>لوريم ايبسوم دولار سيت اميت, كونسيكتيتور اديبا اسينج ايليت.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="cs-item">
                        <span class="flaticon-002-dumbell"></span>
                        <h4>تدريبات مخصصة</h4>
                        <p>لوريم ايبسوم دولار سيت اميت, كونسيكتيتور اديبا اسينج ايليت.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="cs-item">
                        <span class="flaticon-014-heart-beat"></span>
                        <h4>تدريبات متنوعة</h4>
                        <p>لوريم ايبسوم دولار سيت اميت, كونسيكتيتور اديبا اسينج ايليت.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Subscriptions Steps Section Begin -->

    <!-- Transformation Section Begin -->
    <section class="team-section transformation spad" id="transformations">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-title">
                        <div class="section-title">
                            <span> قصص نجاح أبطالنا </span>
                            <h2>إنجازات المشتركين</h2>
                        </div>
                        <a href="{{ route('user.training-packages.index') }}"
                            class="primary-btn btn-normal appoinment-btn">اشترك الان</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="ts-slider owl-carousel">
                    @forelse ($transformations as $transformation)
                        <div class="col-lg-4">
                            <a href="{{ route('user.trainer.show', $transformation->id) }}">
                                <div class="ts-item set-bg" data-setbg="{{ '/storage/' . $transformation->photo_path }}">
                                    <div class="ts_text">
                                        <span>{{ $transformation->description }}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                    @endforelse

                </div>
            </div>
        </div>
    </section>
    <!-- Transformation Section End -->

    <!-- Video Banner Section Begin -->
    <section class="banner-section set-bg" data-setbg="/user/img/banner-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="bs-text service-banner">
                        <h2>التمرن الى اقصى الحدود</h2>
                        <div class="bt-tips">حيث الصحة والجمال واللياقة</div>
                        <a href="https://www.youtube.com/watch?v=EzKkl64rRbM" class="play-btn video-popup"><i
                                class="fa fa-caret-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Video Banner Section End -->

    <!-- Team Section Begin -->
    <section class="team-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-title">
                        <div class="section-title">
                            <span> فريقنا </span>
                            <h2>تدرب مع <strong>فريقنا</strong> المحترف</h2>
                        </div>
                        <a href="{{ route('user.training-packages.index') }}"
                            class="primary-btn btn-normal appoinment-btn">
                            احجز الان
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="ts-slider owl-carousel">
                    @forelse ($trainers as $trainer)
                        <div class="col-lg-4">
                            <a href="{{ route('user.trainer.show', $trainer->id) }}">
                                <div class="ts-item set-bg" data-setbg="{{ '/storage/' . $trainer->image }}">
                                    <div class="ts_text">
                                        <h4>{{ $trainer->name }}</h4>
                                        <span>{{ $trainer->job_title }}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Team Section End -->

    <!-- FAQ Section Begin -->
    <section class="accordion-section spad-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="accordion-title text-right">
                        <h2 class="mt-4 ">
                            الاسئلة الشائعة
                        </h2>
                        <p class="fs-5">
                            لو عندك سؤال غير الاسئلة الموجودة , ممكن تتواصل معانا عن طريق الواتساب
                        </p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <a class="w-100 text-start" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        من نحن ؟
                                    </a>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    أكاديمية ريفيت هي منصة تدريب إلكترونية متخصصة في اللياقة البدنية. نقدم مجموعة متنوعة من
                                    الدورات والبرنامج التدريبية التي تساعدك على تحقيق أهدافك الصحية واللياقة البدنية. لدينا
                                    فريق من المدربين المحترفين الذين يلتزمون بتوفير تجربة تعليمية ممتازة لجميع متعلمينا.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <a class="w-100 text-start" type="button" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                        لقد اشتركت ولم يصلني الرد
                                    </a>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    بيتم مراجعة وتأكيد التحويلات خلال 24 ساعة عمل وفريقنا بيتواصل معاك علي رقمك المسجل, لكن
                                    اتأكد ان الرقم المسجل في بيانات الدفع صحيح وعليه واتساب، ولو عندك اي استفسار بخصوص الدفع
                                    تواصل مع خدمة العملاء واتساب على رقم: 1050001587(20+)
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <a class="w-100 text-start" type="button" data-toggle="collapse"
                                        data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                        ما الذي يضمن جودة الخدمة والوصول للنتيجة المطلوبة؟
                                    </a>
                                </h2>
                            </div>

                            <div id="collapseThree" class="collapse " aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    شركتنا تتبع المعايير الدولية في (السعودية ومصر والإمارات) ونحن ملتزمون بجودة تطبيق تلك
                                    المعايير،يمكنك الإطلاع على بعض نتائج وآراء العملاء السابقين.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <a class="w-100 text-start" type="button" data-toggle="collapse"
                                        data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                        ايه مده الأشتراك المناسبة الي اقدر اوصل فيها لهدفي ؟ </a>
                                </h2>
                            </div>

                            <div id="collapseFour" class="collapse " aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    المده بتختلف من شخص لأخر علي حسب هدفك وحالتك الصحية ونقطة البداية بتاعتك تقدر تتواصل
                                    معايا علي الواتساب وهساعدك تحدد مده الأشتراك المناسبة ليك ان شاء الله.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FAQ Section End -->

@endsection

@section('js')
    <script>
        // this script belong to success payment alert
        document.getElementById('close-section').addEventListener('click', function() {
            document.getElementById('paymeny-status').style.display = 'none';
        });
    </script>
@endsection
