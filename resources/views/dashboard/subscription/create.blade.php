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
                <form action="{{ route('dashboard.trainers.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row mb-3">
                        <div class="col-8">
                            <label for="title">Job title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                placeholder="Enter Job Title" aria-describedby="helpId" value="{{ old('title') }}">
                            {{-- @error('title')
                                <div class="error alert alert-danger">{{ $message }}</div>
                            @enderror --}}
                        </div>
                        {{-- <div class="col-4">
                            <label>Job Category</label>
                            <select class="select2" name="category_id" data-placeholder="Select Category" style="width: 100%;">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-9">
                            <label for="name">Location</label>
                            <input type="text" name="location" id="location" class="form-control"
                                placeholder="Enter Job Location" aria-describedby="helpId" value="{{ old('location') }}">
                            {{-- @error('name')
                                <div class="error alert alert-danger">{{ $message }}</div>
                            @enderror --}}
                        </div>
                        <div class="col-3">
                            <label for="vacancy">vacancy</label>
                            <input type="number" name="vacancy" id="vacancy" class="form-control"
                                placeholder="Enter vacancy Number" aria-describedby="helpId" value="{{ old('vacancy') }}">
                            {{-- @error('vacany')
                                <div class="error alert alert-danger">{{ $message }}</div>
                            @enderror --}}
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-3">
                            <label>Workplace</label>
                            <select class="select2" name="workplace" data-placeholder="Select Workplace"
                                style="width: 100%;">
                                <option value="Office">Office</option>
                                <option value="Remote">Remote</option>
                                <option value="Hybrid">Hybrid</option>
                                {{-- @foreach ($sideEffects as $sideEffect)
                                    <option value="{{ $sideEffect->name }}">{{ $sideEffect->name }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Job Type</label>
                            <select class="select2" name="type" data-placeholder="Select Jop Type" style="width: 100%;">

                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Freelance project">Freelance Project</option>
                                {{-- @foreach ($contraindications as $contraindication)
                                    <option value="{{ $contraindication->name }}">{{ $contraindication->name }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Experience Level</label>
                            <select class="select2" name="experience" data-placeholder="Select Career Level"
                                style="width: 100%;">

                                <option value="Internship">Internship</option>
                                <option value="Entry Level">Entry Level</option>
                                <option value="Junior">Junior</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Senior">Senior</option>
                                <option value="Lead">Lead</option>
                                <option value="Manager">Manager</option>
                                {{-- @foreach ($contraindications as $contraindication)
                                    <option value="{{ $contraindication->name }}">{{ $contraindication->name }}</option>
                                @endforeach --}}
                            </select>
                        </div>

                        <div class="col-3">
                            <label for="salary">Sallary</label>
                            <input type="number" name="salary" id="salary" class="form-control"
                                placeholder="Enter Salary in $ (Optional)" aria-describedby="helpId"
                                value="{{ old('salary') }}">
                            {{-- @error('vacany')
                                <div class="error alert alert-danger">{{ $message }}</div>
                            @enderror --}}
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col-12">
                            <label for="description">Description</label>
                            <textarea class="editor form-control form-control custom-file" id="description" name="description"
                                placeholder="Enter Job Description" rows="6">{{ old('description') }}</textarea>
                            {{-- @error('description')
                                <div class="error alert alert-danger">{{ $message }}</div>
                            @enderror --}}
                        </div>
                    </div>

                    <div class="form-row mb-4">
                        <div class="col-12">
                            <label for="responsibilities">Responsibilities</label>
                            <textarea class="editor form-control form-control custom-file" id="responsibilities" name="responsibilities"
                                placeholder="Enter Job Responsibilities" rows="6">{{ old('requirements') }}</textarea>
                            {{-- @error('description')
                                <div class="error alert alert-danger">{{ $message }}</div>
                            @enderror --}}
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col-12">
                            <label for="description">Job Requirements</label>
                            <textarea class="editor form-control form-control custom-file" id="requirements" name="requirements"
                                placeholder="Enter Job Requirements" rows="6">{{ old('requirements') }}</textarea>
                            {{-- @error('description')
                                <div class="error alert alert-danger">{{ $message }}</div>
                            @enderror --}}
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col-12">
                            <label for="benefits">Benefits</label>
                            <textarea class="editor form-control form-control custom-file" id="benefits" name="benefits"
                                placeholder="Enter Job Benefits (Optional)" rows="6">{{ old('benefits') }}</textarea>
                            {{-- @error('benefits')
                                <div class="error alert alert-danger">{{ $message }}</div>
                            @enderror --}}
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
