@extends('dashboard.layouts.parent')

@section('title', 'Add Subscriptions')
@section('menu', 'menu-open')

@section('css')
    <!-- iCheck for checkboxes and radio inputs -->
    {{-- <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css"> --}}
    <!-- Select2 -->
    <link rel="stylesheet" href="/dashboard/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/dashboard/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    {{-- <link rel="stylesheet" href="../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="../../plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="../../plugins/dropzone/min/dropzone.min.css"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="/dashboard/dist/css/adminlte.min.css">

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('dashboard.subscriptions.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row mb-3">
                        <div class="col-md-6">
                            <label for="name">Subscriber Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" placeholder="Enter Subscriber Name" id="name"
                                class="form-control" style="width: 100%;">
                            </input>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="email">Subscriber Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" placeholder="Enter Subscriber Email" id="email"
                                class="form-control" style="width: 100%;">
                            </input>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-md-6">
                            <label for="whatsapp_phone">Whatsapp Phone</label>
                            <input type="text" class="form-control @error('whatsapp_phone') is-invalid @enderror"
                                name="whatsapp_phone" value="{{ old('whatsapp_phone') }}" id="whatsapp_phone"
                                placeholder="Enter Whatsapp Phone">
                            @error('whatsapp_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="starting_date">Starting Date</label>
                            <input id="starting_date" type="date" name="starting_date" value="{{ old('starting_date') }}"
                                class="form-control @error('starting_date') is-invalid @enderror">
                            @error('starting_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col-md-4">
                            <label for="package_id">Package</label>
                            <select class="select2 form-control @error('package_id') is-invalid @enderror" name="package_id"
                                id="package_id" style="width: 100%;">
                                <option value="" disabled selected>Select a Package</option>
                                @foreach ($packages as $package)
                                    <option value="{{ $package->id }}">{{ $package->title }}</option>
                                @endforeach
                            </select>
                            @error('package_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="duration_id">Duration</label>
                            <select dir="rtl" class="select2 form-control @error('duration_id') is-invalid @enderror"
                                name="duration_id" id="duration_id" style="width: 100%;">
                                <option value="" disabled selected>Select a Duration</option>
                            </select>
                            @error('duration_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="trainer_id">Trainer</label>
                            <select class="select2 form-control @error('trainer_id') is-invalid @enderror" name="trainer_id"
                                id="trainer_id" style="width: 100%;">
                                <option value="" {{ old('trainer_id') === '' ? 'selected' : '' }}>No Trainer</option>
                                @foreach ($trainers as $trainer)
                                    <option value="{{ $trainer->id }}"
                                        {{ old('trainer_id') == $trainer->id ? 'selected' : '' }}>
                                        {{ $trainer->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('trainer_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col-md-4">
                            <label for="amount_paid">Amount Paid</label>
                            <input id="amount_paid" type="number" name="amount_paid" value="{{ old('amount_paid') }}"
                                placeholder="Enter Amount Paid "
                                class="form-control @error('amount_paid') is-invalid @enderror">
                            @error('amount_paid')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="payment_status">Payment Status</label>
                            <select class="select2 form-control @error('payment_status') is-invalid @enderror"
                                name="payment_status" id="payment_status" style="width: 100%;">
                                <option value="" disabled {{ old('payment_status') == '' ? 'selected' : '' }}>Select
                                    a Status</option>
                                <option value="Pending" {{ old('payment_status') == 'Pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="Paid" {{ old('payment_status') == 'Paid' ? 'selected' : '' }}>Paid
                                </option>
                                <option value="Cancelled" {{ old('payment_status') == 'Canceled' ? 'selected' : '' }}>
                                    Cancelled
                                </option>
                            </select>
                            @error('payment_status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="transaction_id">Transaction ID</label>
                            <input type="text" class="form-control @error('transaction_id') is-invalid @enderror"
                                name="transaction_id" placeholder="Pay First to Get This ID" id="transaction_id"
                                value="{{ old('transaction_id') }}" style="width: 100%;">
                            @error('transaction_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row my-4">
                        <div class="col-3">
                            <input type="submit" value="Add Subscription" class="btn btn-primary">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('js')

    <!-- jQuery -->
    {{-- <script src="/dashboard/plugins/jquery/jquery.min.js"></script> --}}
    <!-- Bootstrap 4 -->
    {{-- <script src="/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
    <!-- Select2 -->
    <script src="/dashboard/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    {{-- <script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="../../plugins/moment/moment.min.js"></script>
    <script src="../../plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="../../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- BS-Stepper -->
    <script src="../../plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- dropzonejs -->
    <script src="../../plugins/dropzone/min/dropzone.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script> --}}
    <!-- Page specific script -->

    {{-- ////////////// --}}
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
    <script>
        $("input").tagsinput('items')
    </script>

    <script>
        //script to get durations related to specific package
        $(document).ready(function() {
            $('#package_id').change(function() {
                var packageId = $(this).val();

                if (packageId) {
                    $.ajax({
                        url: '/packages/' + packageId + '/durations',
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#duration_id').empty(); // Clear previous options
                            $('#duration_id').append(
                                '<option value="" disabled selected>Select a Duration</option>'
                            );

                            $.each(data, function(key, duration) {
                                $('#duration_id').append('<option value="' + duration
                                    .id + '">' + duration.duration + ' - ' +
                                    (duration.discount_price ? duration
                                        .discount_price : duration.price) +
                                    '</option>');
                            });
                        }
                    });
                } else {
                    $('#duration_id').empty();
                    $('#duration_id').append(
                        '<option value="" disabled selected>Select a Duration</option>');
                }
            });
        });
    </script>
@endsection
