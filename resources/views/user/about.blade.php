@extends('user.layouts.parent')


@section('title', 'Refit Academy')
@section('home', 'active')
@section('content')
    <!-- About US Section Begin -->
    <section class="aboutus-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="about-video set-bg" data-setbg="/user/img/Refit.jpeg">
                        <a href="https://www.youtube.com/watch?v=EzKkl64rRbM" class="play-btn video-popup"><i
                                class="fa fa-caret-right"></i></a>
                        {{-- <img src="/user/img/Refit.jpeg" alt="Refit"> --}}
                    </div>
                </div>
                <div class="col-lg-6 p-0">
                    <div class="about-text">
                        <div class="section-title">
                            <h2> من نحن </h2>
                        </div>
                        <div class="at-desc">
                            <p>
                                قدارين نوصلك لاحسن نسخة من نفسك في اسرع وقت وباقل الامكانيات زي الآلاف اللي ساعدناهم في
                                الخمس سنين اللي فاتوا وده لأن معانا
                                - استشاريين باطنة ، جراحة ، عظام ، مخ واعصاب ، علاج طبيعي ، تغذية علاجية عشان تضمن رعاية
                                طبية على اعلى مستوى
                                - اخصائيين تغذية مسئولين عن توفير الدايت بلان المخصصة ليك حسب امكانياتك وتفضيلاتك
                                - مدربين معتمدين على اعلى مستوى
                                - متابعة طول ايام الاسبوع على مدار الساعة
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About US Section End -->
@endsection
