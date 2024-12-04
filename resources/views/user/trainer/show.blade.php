@extends('user.layouts.parent')
@section('title', "ReFit Academy | $trainer->name")
@section('trainer', 'active')
@section('content')

    <!-- Class Details Section Begin -->
    <section class="class-details-section spad">
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="class-details-text">
                        <div class="cd-trainer">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="cd-trainer-pic">
                                        <img src="{{ $trainer->image ? asset('storage/' . $trainer->image) : asset('/user/img/Refit.jpeg') }}"
                                            alt="trainer" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="cd-trainer-text">
                                        <div class="trainer-title">
                                            <h3>{{ $trainer->name }}</h3>
                                            <h5 style="color: #aaaaaa">{{ $trainer->job_title }}</h5>
                                        </div>

                                        @if ($trainer->experiences)
                                            <div>
                                                <h4>الخبرات المهنية</h4>
                                                {!! $trainer->experiences !!}
                                            </div>
                                        @endif

                                        @if ($trainer->certificates)
                                            <div>
                                                <h4>الشهادات</h4>
                                                {!! $trainer->certificates !!}
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Class Details Section End -->

@endsection
