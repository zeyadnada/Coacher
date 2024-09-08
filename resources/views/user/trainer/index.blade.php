@extends('user.layouts.parent')
@section('title', 'ReFit Academy | Teams')
@section('trainer', 'active')

@section('content')
    <!-- Team Section Begin -->
    <section class="team-section team-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-title">
                        <div class="section-title">
                            <span> فريقنا </span>
                            <h2>تدرب مع الخبراء</h2>
                        </div>
                        <a href="{{ route('user.training-packages.index') }}"
                            class="primary-btn btn-normal appoinment-btn">اشترك الان</a>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($trainers as $trainer)
                    <div class="col-lg-4 col-sm-6">
                        <a href="{{ route('user.trainer.show', $trainer->id) }}">

                            <div class="ts-item set-bg" data-setbg="{{ '/storage/' . $trainer->image }}">
                                <div class="ts_text">
                                    <h4>{{ $trainer->name }}</h4>
                                    <span>{{ $trainer->job_title }}</span>
                                    <div class="tt_social">

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div>
                        <h2 style="color:aliceblue"> لا يوجد شي لعرضه الان</h2>

                    </div>
                @endforelse

            </div>
        </div>
    </section>
    <!-- Team Section End -->

@endsection
