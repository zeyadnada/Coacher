@extends('dashboard.layouts.parent')

@section('title', 'Add Admin')

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="/dashboard/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/dashboard/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dashboard/dist/css/adminlte.min.css">

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('dashboard.admin.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row mb-3">
                        <div class="col-md-6">
                            <label for="title">Name</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Enter Admin Name"
                                aria-describedby="helpId" value="{{ old('name') }}" dir="auto">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="title">phone</label>
                            <input type="text" name="phone" id="phone"
                                class="form-control @error('phone') is-invalid @enderror" placeholder="Enter Phone"
                                aria-describedby="helpId" value="{{ old('phone') }}">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-md-4">
                            <label for="name">Location</label>
                            <input type="text" name="location" id="location"
                                class="form-control @error('location') is-invalid @enderror"
                                placeholder="Enter Admin Location" aria-describedby="helpId"
                                value="{{ old('location') }}">
                            @error('location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>Gender</label>
                            <select class="form-control @error('gender') is-invalid @enderror" name="gender"
                                data-placeholder="Select Gender" style="width: 100%;">
                                <option {{ old('gender') == 'male' ? 'selected' : '' }} value="male">Male</option>
                                <option {{ old('gender') == 'female' ? 'selected' : '' }} value="female">Female</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>Admin Type</label>
                            <select class="form-control @error('admin_type') is-invalid @enderror" name="admin_type"
                                data-placeholder="Select admin_type" style="width: 100%;">
                                <option {{ old('admin_type') == 'admin' ? 'selected' : '' }} value="admin">Admin
                                </option>
                                <option {{ old('admin_type') == 'super_admin' ? 'selected' : '' }} value="super_admin">
                                    Super Admin</option>
                            </select>
                            @error('admin_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" id="email" placeholder="name@example.com">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="image">Admin Image</label>
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
                        <div class="col-md-6">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" id="password" placeholder="Enter Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation" id="password_confirmation"
                                placeholder="Enter confirm Password">
                            {{-- @error('confirmation_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}
                        </div>
                    </div>

                    <div class="form-row my-4">
                        <div class="col-2">
                            <input type="submit" class="btn btn-primary" value="Add Admin">
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Select2 -->
    <script src="/dashboard/plugins/select2/js/select2.full.min.js"></script>

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
