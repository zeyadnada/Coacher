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

                    <!-- Table for Durations and Prices -->
                    <div class="form-row mb-3">
                        <div class="col-12">
                            @if ($errors->has('durations'))
                                <div class="alert alert-danger">
                                    <strong>{{ $errors->first('durations') }}</strong>
                                </div>
                            @endif
                            <table class="table" id="duration_table">
                                <thead>
                                    <tr>
                                        <th>Duration</th>
                                        <th>Price</th>
                                        <th>Discount Price</th>
                                        <th> <button type="button" class="btn btn-success" id="add_row">+</button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" name="durations[0][duration]"
                                                class="form-control @error('durations.0.duration') is-invalid @enderror"
                                                placeholder="duration" required value="{{ old('durations.0.duration') }}">
                                            @error('durations.0.duration')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="number" name="durations[0][price]"
                                                class="form-control @error('durations.0.price') is-invalid @enderror"
                                                placeholder="price" min="0" required
                                                value="{{ old('durations.0.price') }}">
                                            @error('durations.0.price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="number" name="durations[0][discount_price]"
                                                class="form-control @error('durations.0.discount_price') is-invalid @enderror"
                                                placeholder="discount price" min="0"
                                                value="{{ old('durations.0.discount_price') }}">
                                            @error('durations.0.discount_price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger remove_row">-</button>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
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


    <script>
        let rowCount = 1;
        // Add new row when clicking the "Add" button
        $('#add_row').on('click', function() {
            const newRow = `
            <tr>
                <td>
                    <input type="text" name="durations[${rowCount}][duration]" class="form-control @error('durations.${rowCount}.duration') is-invalid @enderror" placeholder="duration" required>
                    @error('durations.${rowCount}.duration')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </td>
                <td>
                    <input type="number" name="durations[${rowCount}][price]" class="form-control @error('durations.${rowCount}.price') is-invalid @enderror" placeholder="price" min="0" required>
                    @error('durations.${rowCount}.price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </td>
                <td>
                    <input type="number" name="durations[${rowCount}][discount_price]" class="form-control @error('durations.${rowCount}.discount_price') is-invalid @enderror" placeholder="discount price" min="0">
                    @error('durations.${rowCount}.discount_price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </td>
                <td>
                    <button type="button" class="btn btn-danger remove_row">-</button>
                </td>
            </tr>
        `;
            $('#duration_table tbody').append(newRow);
            rowCount++;
        });

        // Remove row
        $(document).on('click', '.remove_row', function() {
            $(this).closest('tr').remove();
        });
    </script>
@endsection
