@extends('dashboard.layouts.parent')

@section('title', 'Edit Admin Profile')

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
                <form action="{{ route('dashboard.UpdateAdminProfile') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row mb-3">
                        <div class="col-6">
                            <label for="title">Name</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Enter Admin Name"
                                aria-describedby="helpId" value="{{ auth()->guard('admin')->user()->name }}" dir="auto">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="title">phone</label>
                            <input type="text" name="phone" id="phone"
                                class="form-control @error('phone') is-invalid @enderror" placeholder="Enter Phone"
                                aria-describedby="helpId" value="{{ auth()->guard('admin')->user()->phone }}">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-8">
                            <label for="name">Location</label>
                            <input type="text" name="location" id="location"
                                class="form-control @error('location') is-invalid @enderror"
                                placeholder="Enter Trainer Location" aria-describedby="helpId"
                                value="{{ auth()->guard('admin')->user()->location }}">
                            @error('location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- <div class="col-2">
                            <label for="birth_date">Birth Date</label>
                            <input id="birth_date" type="date" name="birth_date" value="{{ old('birth_date') }}"
                                class="form-control @error('birth_date') is-invalid @enderror">
                            @error('birth_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div> --}}
                        <div class="col-4">
                            <label>Gender</label>
                            <select class="form-control @error('gender') is-invalid @enderror" name="gender"
                                data-placeholder="Select Gender" style="width: 100%;">
                                <option {{ auth()->guard('admin')->user()->gender == 'male' ? 'selected' : '' }}
                                    value="male">Male</option>
                                <option {{ auth()->guard('admin')->user()->gender == 'female' ? 'selected' : '' }}
                                    value="female">Female</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        {{-- <div class="col-4">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                                value="{{ old('phone') }}" id="phone" placeholder="Phone Number">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div> --}}
                        <div class="col-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ auth()->guard('admin')->user()->email }}" id="email"
                                placeholder="name@example.com">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="image">Trainer Image</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" name="image"
                                id="image">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="form-row mb-4">
                        <div class="col-12">
                            <label for="experiences">Experiences</label>
                            <textarea class="editor form-control form-control custom-file @error('experiences') is-invalid @enderror"
                                id="experiences" name="experiences" placeholder="Enter Trainer Experiences" rows="6">{{ old('experiences') }}</textarea>
                            @error('experiences')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row mb-4">
                        <div class="col-12">
                            <label for="certificates">Certificates</label>
                            <textarea class="editor form-control form-control custom-file @error('certificates') is-invalid @enderror"
                                id="certificates" name="certificates" placeholder="Enter Trainer Certificates" rows="6">{{ old('certificates') }}</textarea>
                            @error('certificates')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}


                    <div class="form-row my-4">
                        <div class="col-2">
                            <input type="submit" class="btn btn-primary" value="update Admin">
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

    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
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
    </script> --}}



@endsection
