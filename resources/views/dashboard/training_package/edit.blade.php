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
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('dashboard.training-packages.update', $package->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row mb-3">
                        <div class="col-8">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') is-invalid @enderror" placeholder="Enter Package Title"
                                aria-describedby="helpId" value="{{ old('title', $package->title) }}">
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
                                value="{{ old('introduction', $package->introduction) }}">
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
                                placeholder="Enter Target Audience if exist" aria-describedby="helpId"
                                value="{{ old('target_audience', $package->target_audience) }}">
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
                                id="description" name="description" placeholder="Enter Package Description" rows="6">{{ old('description', $package->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col-12">
                            @if ($errors->has('durations'))
                                <div class="alert alert-danger">
                                    <strong>{{ $errors->first('durations') }}</strong>
                                </div>
                            @endif
                            <table class="table" id="duration-table">
                                <thead>
                                    <tr>
                                        <th>Duration</th>
                                        <th>Price</th>
                                        <th>Discount Price</th>
                                        <th> <button type="button" class="btn btn-success" id="add_row">+</button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($package->durations as $key => $duration)
                                        <tr>
                                            <td>
                                                <input type="text" name="durations[{{ $key }}][duration]"
                                                    class="form-control @error('durations.' . $key . '.duration') is-invalid @enderror"
                                                    placeholder="duration"
                                                    value="{{ old('durations.' . $key . '.duration', $duration->duration) }}">
                                                @error('durations.' . $key . '.duration')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="number" name="durations[{{ $key }}][price]"
                                                    class="form-control @error('durations.' . $key . '.price') is-invalid @enderror"
                                                    placeholder="price"
                                                    value="{{ old('durations.' . $key . '.price', $duration->price) }}">
                                                @error('durations.' . $key . '.price')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="number" name="durations[{{ $key }}][discount_price]"
                                                    class="form-control @error('durations.' . $key . '.discount_price') is-invalid @enderror"
                                                    placeholder="discount price"
                                                    value="{{ old('durations.' . $key . '.discount_price', $duration->discount_price) }}">
                                                @error('durations.' . $key . '.discount_price')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger remove_row">-</button>
                                                <input type="hidden" name="durations[{{ $key }}][id]"
                                                    value="{{ $duration->id }}">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="form-row my-4">
                        <div class="col-2">
                            <input type="submit" class="btn btn-warning" value="Update Package">
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
        $(document).ready(function() {
            let rowIndex = {{ count(old('durations', $package->durations)) }};

            // Function to handle removing a duration row
            $(document).on('click', '.remove_row', function() {
                const row = $(this).closest('tr');
                row.remove(); // Completely remove the row from the DOM
            });

            // Function to handle adding a new duration row
            $('#add_row').click(function() {
                const newRow = `
                <tr>
                    <td>
                        <input type="text" name="durations[${rowIndex}][duration]" class="form-control" placeholder="duration" required>
                    </td>
                    <td>
                        <input type="number" name="durations[${rowIndex}][price]" class="form-control" placeholder="price" min="0" required>
                    </td>
                    <td>
                        <input type="number" name="durations[${rowIndex}][discount_price]" class="form-control" placeholder="discount price" min="0">
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger remove_row">-</button>
                    </td>
                </tr>
            `;
                $('#duration-table tbody').append(newRow);
                rowIndex++;
            });
        });
    </script>



@endsection
