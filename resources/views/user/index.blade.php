@extends('user.layouts.parent')

@section('title', 'Refit Academy')
@section('css')
    <style>
        .header-section {
            top: 50px;
        }
    </style>
@endsection

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
                            <h2>تم اشتراكك</h2>
                            <h4>تمت عملية الدفع بنجاح</h4>
                            <h6>رقم الاشتراك الخاص بك هو: <strong
                                    style="color: #f36100">{{ session('subscriptionId') }}</strong></h6>
                            <p>{{ session('paymentSuccess') }}</p>
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


    <!-- promotion Section Begin -->
    {{-- <div class="offer-section" style="display: {{ \App\Models\Setting::where('key', 'offers')->first()->is_visible }}">
        <p class="mb-0 text-center text-white">
            <Strong>{{ \App\Models\Setting::where('key', 'offers')->first()->value }}</Strong>
        </p>
    </div> --}}
    <div class="offer-section">
        <p class="mb-0 text-center text-white">
            <strong> الحق العروض,</strong> العروض متاحة لفترة محدودة
        </p>
    </div>
    <!-- promotion Section End -->

    <!-- Header Hero Section Begin -->
    {{-- <section class="hero-section section" id="main">
        <section class="banner-section set-bg" data-setbg="/user/img/hero/hero-1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="bs-text">
                            <h2 style="display:">
                                <strong></strong>
                            </h2>
                            <div class="bt-tips">سجل الان وابدا رحلتك مع Refit</div>
                            <a href="#packages" class="primary-btn btn-normal"> اشترك الان
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section> --}}

    <section class="hero-section">
        <section class="banner-section set-bg" data-setbg="/user/img/hero/hero-1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="bs-text">
                            <h2>مع بعض <strong style="color: #f36100">هنغير </strong>الواقع</h2>
                            <div class="bt-tips">سجل الان وابدا رحلتك مع Refit</div>
                            <a href="#packages" class="primary-btn btn-normal"> اشترك الان
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <!-- Header Hero Section End -->

    <!-- ChoseUs Section Begin -->
    <section class="choseus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>ليه refit academy الاختيار الامثل ؟</span>
                        <h2>لاننا قادرين نوصلك لاحسن نسخة من نفسك في اسرع وقت وباقل الامكانيات زي الآلاف اللي ساعدناهم في
                            الخمس سنين اللي فاتوا وده لأن معانا
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="cs-item">
                        <span class="flaticon-014-heart-beat"></span>
                        <h4>رعاية طبية</h4>
                        <p>استشاريين باطنة ، جراحة ، عظام ، مخ واعصاب ، علاج طبيعي ، تغذية علاجية عشان تضمن رعاية طبية على
                            اعلى مستوى</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="cs-item">
                        <span class="flaticon-033-juice"></span>
                        <h4>اخصائيين تغذية</h4>
                        <p>مسئولين عن توفير الدايت بلان المخصصة ليك حسب امكانياتك وتفضيلاتك.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="cs-item">
                        <span class="flaticon-002-dumbell"></span>
                        <h4>مدربين معتمدين</h4>
                        <p>علي اعلي مستوي معاك طوال الوقت</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="cs-item">
                        <span class="flaticon-034-stationary-bike"></span>
                        <h4>متابعة يومية</h4>
                        <p>طوال ايام الاسبوع على مدار الساعة.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ChoseUs Section End -->

    <!-- Pricing Section Begin -->
    <section class="pricing-section spad" id="packages">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span> خطط الاسعار </span>
                        <h2>اختر خطة اسعارك المفضلة</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($packages as $package)
                    <div class="col-lg-4 col-md-6">
                        <div class="ps-item">
                            <h3>{{ $package->title }}</h3>
                            <div class="pi-price">
                                <div>
                                    <h2 id="price-{{ $package->id }}" style="display: inline-block" class="pr-1"></h2>
                                    <h5 style="font-size: 18px">جنيه</h5>
                                    <span id="discount-price-{{ $package->id }}" style="display: none;">
                                        <del id="original-price-{{ $package->id }}" style="font-size: 17px"></del>
                                    </span>
                                </div>

                                <div class="leave-comment">
                                    <select name="duration" id="duration-{{ $package->id }}" class="duration-select">
                                        @foreach ($package->durations as $key => $duration)
                                            <option value="{{ json_encode($duration) }}" {{ $key === 0 ? 'selected' : '' }}>
                                                {{ $duration->duration }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mt-4">
                                    <p>{{ $package->introduction }}</p>
                                    <p>{{ $package->target_audience }}</p>
                                </div>

                            </div>

                            {!! $package->description !!}

                            <a href="{{ route('user.training-packages.show', $package->id) }}"
                                id="subscribe-link-{{ $package->id }}" class="primary-btn pricing-btn">اشترك الان</a>
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
                        <span>ماذا تنتظر ؟</span>
                        <h2>خطوات الاشتراك</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-6">
                    <div class="cs-item">
                        <span style="font-size: 70px; font-weight: bold;">1</span>
                        <h4>اختر الباقة المناسبة</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="cs-item">
                        <span style="font-size: 70px; font-weight: bold;">2</span>
                        <h4>قم بالدفع عبر الطرق الدفع المتاحة</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="cs-item">
                        <span style="font-size: 70px; font-weight: bold;">3</span>
                        <h4>سيتصل بك فريقنا عبر WhatsApp للتحقق من اشتراكك وبدء عملية المتابعة</h4>
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
                        <a href="/#packages" class="primary-btn btn-normal appoinment-btn">اشترك الان</a>
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
    <section class="banner-section set-bg" data-setbg="/user/img/hero/hero-2.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="bs-text service-banner">
                        <h2>التمرن الى اقصى الحدود</h2>
                        <div class="bt-tips">سجل الان وابدا رحلتك مع Refit</div>
                        <a href="https://www.youtube.com/watch?v=EzKkl64rRbM" class="play-btn video-popup"><i
                                class="fa fa-caret-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Video Banner Section End -->

    <!-- Team Section Begin -->
    <section class="team-section spad" id="teams">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-title">
                        <div class="section-title">
                            <span> فريقنا </span>
                            <h2>تدرب مع <strong>فريقنا</strong> المحترف</h2>
                        </div>
                        <a href="/#packages" class="primary-btn btn-normal appoinment-btn">
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
                                <div class="ts-item set-bg"
                                    data-setbg="{{ $trainer->image ? asset('storage/' . $trainer->image) : asset('/user/img/Refit.jpeg') }}">
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
    <section class="accordion-section spad-2" style="background-color:#0a0a0a">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="accordion-title pt-0 pt-lg-5 text-right">
                        <h2 class="mt-4 ">
                            الاسئلة الشائعة
                        </h2>
                        <p class="fs-5">
                            لو عندك سؤال غير الاسئلة الموجودة , ممكن تتواصل معانا عن طريق الواتساب
                        </p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="accordion" id="faqAccordion"> <!-- Changed ID -->
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <a class="w-100 text-start" type="button" data-toggle="collapse"
                                        data-target="#faqCollapseOne" aria-expanded="true"
                                        aria-controls="faqCollapseOne">
                                        ما الذي يضمن جودة الخدمة والوصول للنتيجة المطلوبة؟
                                    </a>
                                </h2>
                            </div>
                            <div id="faqCollapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#faqAccordion"> <!-- Updated parent -->
                                <div class="card-body">
                                    احنا بنتبع المعايير الدولية في (السعودية ومصر والإمارات) ونحن ملتزمون بجودة تطبيق تلك
                                    المعايير،يمكنك الإطلاع على بعض نتائج وآراء العملاء السابقين
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <a class="w-100 text-start" type="button" data-toggle="collapse"
                                        data-target="#faqCollapseTwo" aria-expanded="true"
                                        aria-controls="faqCollapseTwo">
                                        ايه مده الأشتراك المناسبة الي اقدر اوصل فيها لهدفي؟
                                    </a>
                                </h2>
                            </div>
                            <div id="faqCollapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#faqAccordion"> <!-- Updated parent -->
                                <div class="card-body">
                                    المده بتختلف من شخص لأخر علي حسب هدفك وحالتك الصحية ونقطة البداية بتاعتك تقدر تتواصل
                                    معانا
                                    علي الواتساب وهنساعدك تحدد مده الأشتراك المناسبة ليك ان شاء الله
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <a class="w-100 text-start" type="button" data-toggle="collapse"
                                        data-target="#faqCollapseThree" aria-expanded="true"
                                        aria-controls="faqCollapseThree">
                                        هل سأواجه صعوبة أثناء تنفيذ النظام الغذائي والتمارين الرياضية؟
                                    </a>
                                </h2>
                            </div>
                            <div id="faqCollapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#faqAccordion"> <!-- Updated parent -->
                                <div class="card-body">
                                    لا، فكل شئ مصمم خصيصًا ليتوافق مع ظروفك اليومية ومع نظام المتابعة يمكن تغيير البرنامج
                                    ليتناسب معك في حالة حدوث أي تغيير في يومك.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <h2 class="mb-0">
                                    <a class="w-100 text-start" type="button" data-toggle="collapse"
                                        data-target="#faqCollapseFour" aria-expanded="true"
                                        aria-controls="faqCollapseFour">
                                        هل يمكن الوصول لنتيجة في حالة عدم توفر وقت كافي؟
                                    </a>
                                </h2>
                            </div>
                            <div id="faqCollapseFour" class="collapse" aria-labelledby="headingFour"
                                data-parent="#faqAccordion"> <!-- Updated parent -->
                                <div class="card-body">
                                    نعم لأن الوجبات يتم تقسيمها على مدار اليوم بالشكل المناسب ليك كما إنه يمكنك أداء
                                    التمارين في
                                    المنزل مثل عدد كبير من عملائنا الذين حققوا نتائج ممتازة من المنزل.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFive">
                                <h2 class="mb-0">
                                    <a class="w-100 text-start" type="button" data-toggle="collapse"
                                        data-target="#faqCollapseFive" aria-expanded="true"
                                        aria-controls="faqCollapseFive">
                                        مرونة تغيير النظام الغذائي والتدريبي؟
                                    </a>
                                </h2>
                            </div>
                            <div id="faqCollapseFive" class="collapse" aria-labelledby="headingFive"
                                data-parent="#faqAccordion"> <!-- Updated parent -->
                                <div class="card-body">
                                    نعم لأن الوجبات يتم تقسيمها على مدار اليوم بالشكل المناسب ليك كما إنه يمكنك أداء
                                    التمارين في
                                    المنزل مثل عدد كبير من عملائنا الذين حققوا نتائج ممتازة من المنزل.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FAQ Section End -->

    <!-- Terms and Conditions Section Begin -->
    <section class="accordion-section spad-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="accordion-title pt-0 pt-lg-5 text-right">
                        <h2 class="mt-4 ">
                            الشروط والاحكام
                        </h2>
                        <p class="fs-5">
                            يتم تطبيق هذه الشروط و الاحكام
                        </p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="accordion" id="termsAccordion"> <!-- Changed ID -->
                        <div class="card">
                            <div class="card-header" id="termsHeadingOne">
                                <h2 class="mb-0">
                                    <a class="w-100 text-start" type="button" data-toggle="collapse"
                                        data-target="#termsCollapseOne" aria-expanded="true"
                                        aria-controls="termsCollapseOne">
                                        إستخدام الهرمونات و المنشطات
                                    </a>
                                </h2>
                            </div>
                            <div id="termsCollapseOne" class="collapse show" aria-labelledby="termsHeadingOne"
                                data-parent="#termsAccordion"> <!-- Updated parent -->
                                <div class="card-body">
                                    لا يتم إستخدام أي هرمونات أو منشطات أثناء النظام أو المتابعة
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="termsHeadingTwo">
                                <h2 class="mb-0">
                                    <a class="w-100 text-start" type="button" data-toggle="collapse"
                                        data-target="#termsCollapseTwo" aria-expanded="true"
                                        aria-controls="termsCollapseTwo">
                                        التواصل وخصوصية العملاء
                                    </a>
                                </h2>
                            </div>
                            <div id="termsCollapseTwo" class="collapse" aria-labelledby="termsHeadingTwo"
                                data-parent="#termsAccordion"> <!-- Updated parent -->
                                <div class="card-body">
                                    لن يتم نشر أي صور أو نتائج أو بيانات خاصة بيك إلا بموافقة منك حفاظا علي خصوصية العملاء
                                    وإحتراما لرغبتهم. التواصل يكون بشكل فردي علي الواتساب الخاص بيك ويتم التواصل بكل مشترك
                                    علي
                                    حدا.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="termsHeadingThree">
                                <h2 class="mb-0">
                                    <a class="w-100 text-start" type="button" data-toggle="collapse"
                                        data-target="#termsCollapseThree" aria-expanded="true"
                                        aria-controls="termsCollapseThree">
                                        الرغبة لتحقيق الهدف
                                    </a>
                                </h2>
                            </div>
                            <div id="termsCollapseThree" class="collapse" aria-labelledby="termsHeadingThree"
                                data-parent="#termsAccordion"> <!-- Updated parent -->
                                <div class="card-body">
                                    وأخيرا الهدف الأول والأخير لينا هو الوصول بكل شخص لأقوي نتيجة ترضية وترضينا فتأكد إنك
                                    عايز
                                    تعمل حاجة فعلا وعندك الرغبة عشان نحقق هدفنا سوا وهساعدك زي ما ساعدنا آلاف الابطال مش بس
                                    ف مصر
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Terms and Conditions Section End -->
@endsection

@section('js')
    <script>
        // this script belong to success payment alert
        document.getElementById('close-section').addEventListener('click', function() {
            document.getElementById('paymeny-status').style.display = 'none';
        });
    </script>

    <script>
        // this script for change price automatically according to change package durations
        $(document).ready(function() {

            // Function to update price, discount price, and subscription link
            function updatePriceAndLink(selectElement) {
                const durationData = JSON.parse(selectElement.find('option:selected').val());
                const packageId = selectElement.attr('id').split('-')[1];
                const subscribeLink = $('#subscribe-link-' + packageId);

                if (durationData) {
                    // Update the displayed price and discount price
                    if (durationData.discount_price) {
                        $('#discount-price-' + packageId).show();
                        $('#price-' + packageId).text(durationData.discount_price);
                        $('#original-price-' + packageId).text(durationData.price);
                        // $('#discount-price-' + packageId).text(durationData.discount_price);
                    } else {
                        $('#price-' + packageId).text(durationData.price);
                        $('#discount-price-' + packageId).hide();
                    }

                    // Set or update the subscription link with the duration_id
                    let currentHref = subscribeLink.attr('href');
                    if (currentHref.includes('duration_id=')) {
                        // Replace the existing duration_id with the new one
                        subscribeLink.attr('href', currentHref.replace(/duration_id=\d+/, 'duration_id=' +
                            durationData.id));
                    } else {
                        // Add the duration_id if it's not present
                        subscribeLink.attr('href', currentHref + '?duration_id=' + durationData.id);
                    }
                } else {
                    // Reset the displayed prices and subscription link
                    $('#price-' + packageId).text('');
                    $('#discount-price-' + packageId).hide();
                    subscribeLink.attr('href', subscribeLink.attr('href').split('?')[0]);
                }
            }

            // Iterate over each select box on page load to set the default selected option's price
            $('.duration-select').each(function() {
                updatePriceAndLink($(this));
            });

            // Handle change event when user selects a different duration
            $('.duration-select').on('change', function() {
                updatePriceAndLink($(this));
            });
        });
    </script>
@endsection
