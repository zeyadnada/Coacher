@extends('dashboard.layouts.parent')

@section('title', 'Dashboard')

@section('dashboard-img')
    <img src="img/dashboardLogo.png" alt="Dpill" class="brand-image img-circle elevation-3" style="opacity: .8">
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3></h3>

                    <p>Subscriptions</p>
                </div>
                <div class="icon">
                    <i class="fa fa-regular fa-pills"></i>
                </div>
                <a href="" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3></h3>

                    <p>Trainers</p>
                </div>
                <div class="icon">
                    <i class="fa fa-duotone fa-capsules"></i>
                </div>
                <a href="" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3></h3>

                    <p>Training Packages</p>
                </div>
                <div class="icon">
                    <i class="fa fa-regular fa-newspaper"></i>
                </div>
                <a href="" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3></h3>

                    <p>Article Categories</p>
                </div>
                <div class="icon">
                    <i class="fa fa-duotone fa-layer-group"></i>
                </div>
                <a href="" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3></h3>

                    <p>Admin</p>
                </div>
                <div class="icon">
                    <i class="fa fa-duotone fa-user-tie"></i>
                </div>
                <a href="" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div> <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3></h3>

                    <p>Users</p>
                </div>
                <div class="icon">
                    <i class="fa fa-solid fa-user"></i>
                </div>
                <a href="" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3></h3>

                    <p>Side Effects</p>
                </div>
                <div class="icon">
                    <i class="fa fa-solid fa-braille"></i>
                </div>
                <a href="" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3></h3>

                    <p>Contraindications</p>
                </div>
                <div class="icon">
                    <i class="fa fa-solid fa-exclamation"></i>
                </div>
                <a href="" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

    </div>


@endsection
