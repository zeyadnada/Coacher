@extends('dashboard.layouts.parent')

@section('title', 'Add Training Package')

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
                <form action="{{ route('dashboard.training-packages.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row mb-3">
                        <div class="col-8">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') is-invalid @enderror" placeholder="Enter Package Title"
                                aria-describedby="helpId" value="{{ old('title') }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="image">Package Image</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" name="image"
                                id="image">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-4">
                            <label for="duration">Duration</label>
                            <input dir="rtl" type="text" name="duration" id="duration"
                                class="form-control @error('duration') is-invalid @enderror"
                                placeholder="Enter Package month duration" aria-describedby="helpId"
                                value="{{ old('duration') }}">
                            @error('duration')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="price">Package Price</label>
                            <input id="price" type="number" name="price" value="{{ old('price') }}"
                                placeholder="Enter Pachage Price" class="form-control @error('price') is-invalid @enderror">
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="col-4">
                            <label for="discount_price">Discount Price</label>
                            <input id="price" type="number" name="discount_price" value="{{ old('discount_price') }}"
                                placeholder="Enter Final Price"
                                class="form-control @error('discount_price') is-invalid @enderror">
                            @error('discount_price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                    <div class="form-row mb-3">
                        <div class="col-12">
                            <label for="introduction">Introduction</label>
                            <input type="text" name="introduction" id="introduction"
                                class="form-control @error('introduction') is-invalid @enderror"
                                placeholder="Enter package introduction if exist" aria-describedby="helpId"
                                value="{{ old('introduction') }}">
                            @error('introduction')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-12">
                            <label for="target_audience">Target Audience</label>
                            <input type="text" name="target_audience" id="target_audience"
                                class="form-control @error('target_audience') is-invalid @enderror"
                                placeholder="Enter target audience if exist" aria-describedby="helpId"
                                value="{{ old('target_audience') }}">
                            @error('target_audience')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col-12">
                            <label for="description">Description</label>
                            <textarea class="editor form-control form-control custom-file @error('description') is-invalid @enderror"
                                id="experiences" name="description" placeholder="Enter Package Description" rows="6" dir="rtl">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row my-4">
                        <div class="col-2">
                            <input type="submit" class="btn btn-primary" value="Add Package">
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

   
   
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script> --}}
    <!-- Page specific script -->

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
