@extends('user.layouts.parent')


@section('title', 'Gym')
@section('home', 'active')

@section('content')
    <!-- Hero Section Begin -->
    <section class="hero-section">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="hs-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="/user/img/hero/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-6">
                            <div class="hi-text">
                                <span> كون جسدك </span>
                                <h1>كن <strong>قويا </strong> تمرن جيدا</h1>
                                <a href="{{ route('user.training-packages.index') }}" class="primary-btn">عرض الباقات</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hs-item set-bg" data-setbg="/user/img/hero/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-6">
                            <div class="hi-text">
                                <span>Shape your body</span>
                                <h1>Be <strong>strong</strong> traning hard</h1>
                                <a href="#" class="primary-btn">Get info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

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

    <!-- Classes Section Begin -->
    {{-- <section class="classes-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span> صفوفنا </span>
                        <h2>اختر الصف الذي يناسبك</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="/user/img/classes/class-1.jpg" alt="" />
                        </div>
                        <div class="ci-text">
                            <span> التحمل والقوة </span>
                            <h5>رفع الاثقال</h5>
                            <a href="#"><i class="fa fa-angle-left"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="/user/img/classes/class-2.jpg" alt="" />
                        </div>
                        <div class="ci-text">
                            <span> كارديو </span>
                            <h5>تمارين الركض</h5>
                            <a href="#"><i class="fa fa-angle-left"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="/user/img/classes/class-3.jpg" alt="" />
                        </div>
                        <div class="ci-text">
                            <span> التحمل والقوة </span>
                            <h5>تمارين القوة</h5>
                            <a href="#"><i class="fa fa-angle-left"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="/user/img/classes/class-4.jpg" alt="" />
                        </div>
                        <div class="ci-text">
                            <span> كارديو </span>
                            <h4>ركوب الدراجات</h4>
                            <a href="#"><i class="fa fa-angle-left"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="/user/img/classes/class-5.jpg" alt="" />
                        </div>
                        <div class="ci-text">
                            <span> التدريبات </span>
                            <h4>المصارعة</h4>
                            <a href="#"><i class="fa fa-angle-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ChoseUs Section End -->

    <!-- Banner Section Begin -->
    {{-- <section class="banner-section set-bg" data-setbg="/user/img/banner-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="bs-text">
                        <h2>سجل الان للحصول على صفقات جديدة</h2>
                        <div class="bt-tips">حيث الصحة والجمال واللياقة يلتقون</div>
                        <a href="#" class="primary-btn btn-normal"> اشترك الان </a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Banner Section End -->

    <!-- Pricing Section Begin -->
    {{-- <section class="pricing-section spad">
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
                <div class="col-lg-4 col-md-8">
                    <div class="ps-item">
                        <h3>المتقطع</h3>
                        <div class="pi-price">
                            <h2>39.0 ر.س</h2>
                            <span> الحصة الواحدة </span>
                        </div>
                        <ul>
                            <li>ركوب الدراجات</li>
                            <li>معدات غير محدودة</li>
                            <li>مدرب شخصي</li>
                            <li>تمارين لفقدان الوزن</li>
                            <li>الدفع شهريا</li>
                            <li>لا يوجد قيود زمنية</li>
                        </ul>
                        <a href="#" class="primary-btn pricing-btn"> اشترك الان </a>
                        <a href="#" class="thumb-icon"><i class="fa fa-picture-o"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8">
                    <div class="ps-item">
                        <h3>الاشتراك السنوي</h3>
                        <div class="pi-price">
                            <h2>99.0 ر.س</h2>
                            <span> الحصة الواحدة </span>
                        </div>
                        <ul>
                            <li>ركوب الدراجات</li>
                            <li>معدات غير محدودة</li>
                            <li>مدرب شخصي</li>
                            <li>تمارين لفقدان الوزن</li>
                            <li>الدفع سنويا</li>
                            <li>لا يوجد قيود زمنية</li>
                        </ul>
                        <a href="#" class="primary-btn pricing-btn"> اشترك الان </a>
                        <a href="#" class="thumb-icon"><i class="fa fa-picture-o"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8">
                    <div class="ps-item">
                        <h3>الاشتراك النصف سنوي</h3>
                        <div class="pi-price">
                            <h2>59.0 ر.س</h2>
                            <span> الحصة الواحدة </span>
                        </div>
                        <ul>
                            <li>ركوب الدراجات</li>
                            <li>معدات غير محدودة</li>
                            <li>مدرب شخصي</li>
                            <li>تمارين لفقدان الوزن</li>
                            <li>الدفع نصف سنويا</li>
                            <li>لا يوجد قيود زمنية</li>
                        </ul>
                        <a href="#" class="primary-btn pricing-btn"> اشترك الان </a>
                        <a href="#" class="thumb-icon"><i class="fa fa-picture-o"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Pricing Section End -->

    <!-- Gallery Section Begin -->
    {{-- <div class="gallery-section">
        <div class="gallery">
            <div class="grid-sizer"></div>
            <div class="gs-item grid-wide set-bg" data-setbg="/user/img/gallery/gallery-1.jpg">
                <a href="/user/img/gallery/gallery-1.jpg" class="thumb-icon image-popup"><i
                        class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="/user/img/gallery/gallery-2.jpg">
                <a href="/user/img/gallery/gallery-2.jpg" class="thumb-icon image-popup"><i
                        class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="/user/img/gallery/gallery-3.jpg">
                <a href="/user/img/gallery/gallery-3.jpg" class="thumb-icon image-popup"><i
                        class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="/user/img/gallery/gallery-4.jpg">
                <a href="/user/img/gallery/gallery-4.jpg" class="thumb-icon image-popup"><i
                        class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="/user/img/gallery/gallery-5.jpg">
                <a href="/user/img/gallery/gallery-5.jpg" class="thumb-icon image-popup"><i
                        class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item grid-wide set-bg" data-setbg="/user/img/gallery/gallery-6.jpg">
                <a href="/user/img/gallery/gallery-6.jpg" class="thumb-icon image-popup"><i
                        class="fa fa-picture-o"></i></a>
            </div>
        </div>
    </div> --}}
    <!-- Gallery Section End -->

    <!-- Team Section Begin -->
    <section class="team-section spad">
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
                                        <h4>بطلنا أحمد وائل 22 سنة طالب بكلية صيدلة اشترك معانا بهدف الحياة الصحية 📌ايه
                                            الخطوات اللي اتبعناها مع يوسف؟ *بدأنا نطلب منه اختبارات تحديد القوة والمرونة
                                            واللياقة وتحليل الـ inbody وقياساته عشان نصممله البرامج المتناسبة مع احتياجات
                                            جسمه وقدرته </h4>
                                        {{-- <span>{{ $trainer->job_title }}</span> --}}
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
    <!-- Team Section End -->


    <!-- Banner Section Begin -->
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
    <!-- Banner Section End -->

@endsection
