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
                        <div class="col-6">
                            <label for="user_id">User</label>
                            <select class="select2 form-control @error('user_id') is-invalid @enderror" name="user_id"
                                id="user_id" class="form-control" style="width: 100%;">
                                <option value="" disabled selected>Select a user</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6">
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
                    </div>
                    <div class="form-row mb-3">

                        <div class="col-4">
                            <label for="age">Age</label>
                            <input id="age" type="number" name="age" value="{{ old('age') }}"
                                class="form-control @error('age') is-invalid @enderror">
                            @error('age')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="height">Height (cm)</label>
                            <input id="height" type="number" name="height" value="{{ old('height') }}"
                                placeholder="Enter User height" class="form-control @error('height') is-invalid @enderror">
                            @error('height')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="col-4">
                            <label for="weight">Weight (kg)</label>
                            <input id="weight" type="number" name="weight" value="{{ old('weight') }}"
                                placeholder="Enter User weight" class="form-control @error('weight') is-invalid @enderror">
                            @error('weight')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col-6">
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

                        <div class="col-6">
                            <label for="starting_date">Starting Date</label>
                            <input id="starting_date" type="date" name="starting_date"
                                value="{{ old('starting_date') }}"
                                class="form-control @error('starting_date') is-invalid @enderror">
                            @error('starting_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-6">
                            <label for="trainer_id">Trainer</label>
                            <select class="select2 form-control @error('trainer_id') is-invalid @enderror" name="trainer_id"
                                id="trainer_id" style="width: 100%;">
                                <option value="" disabled selected>Select a Trainer</option>
                                <option value="">No Trainer</option>
                                @foreach ($trainers as $trainer)
                                    <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                                @endforeach
                            </select>
                            @error('trainer_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="col-6">
                            <label for="status">Payment Status</label>
                            <select class="select2 form-control @error('status') is-invalid @enderror" name="status"
                                id="status" style="width: 100%;">
                                <option value="" disabled {{ old('status') == '' ? 'selected' : '' }}>Select a
                                    Status</option>
                                <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="Paid" {{ old('status') == 'Paid' ? 'selected' : '' }}>Paid</option>
                                <option value="Cancelled" {{ old('status') == 'Canceled' ? 'selected' : '' }}>Cancelled
                                </option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="form-row my-4">
                        <div class="col-2">
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('js')

    <!-- jQuery -->
    <script src="/dashboard/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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


    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        // Select all textareas with class 'editor'
        document.querySelectorAll('.editor').forEach((textarea) => {
            // Initialize CKEditor 5 for each textarea
            ClassicEditor
                .create(textarea)
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>



@endsection
