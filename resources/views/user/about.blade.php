@extends('user.layouts.parent')


@section('title', 'Refit Academy')
@section('home', 'active')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="pt-120 bg-black" style="padding-top:70px; background-color: black;">
        <div class="container">
            <div class="text-center">
                <div class="breadcrumb-text">
                    <h2 class="mb-0" style="color: #f36100">من نحن؟</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- About US Section Begin -->
    <section class="aboutus-section spad" style="background-color: #000;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="about-video set-bg " data-setbg="/user/img/Refit.jpeg">
                    </div>
                </div>
                <div class="col-lg-6 p-0">
                    <div class="about-text pt-3">
                        <div class="section-title">
                            <span> من نحن </span>
                            <h2 style="font-size: 20px">احنا <strong>Refit Academy</strong> قدارين نوصلك لاحسن نسخة من نفسك
                                في اسرع وقت وباقل
                                الامكانيات زي الآلاف
                                اللي ساعدناهم في الخمس سنين اللي فاتوا وده لأن معانا </h2>
                        </div>

                        <div style="color:#c4c4c4; padding-right:20px ">
                            <ul>
                                <li>
                                    استشاريين باطنة ، جراحة ، عظام ، مخ واعصاب ، علاج طبيعي ، تغذية علاجية عشان تضمن
                                    رعاية طبية على اعلى مستوى

                                </li>
                                <li> اخصائيين تغذية مسئولين عن توفير الدايت بلان المخصصة ليك حسب امكانياتك وتفضيلاتك

                                </li>
                                <li> مدربين معتمدين على اعلى مستوى

                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About US Section End -->
@endsection
