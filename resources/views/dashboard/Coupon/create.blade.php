@extends('dashboard.layouts.parent')

@section('title', 'Add Coupons')

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
                <form action="{{ route('dashboard.coupon.save') }}" method="post">
                    @csrf
                    <div class="form-row mb-3">
                        <div class="col-md-6">
                            <label for="code">Code name</label>
                            <input type="text" name="code" id="code"
                                class="form-control @error('code') is-invalid @enderror" placeholder="Enter Code"
                                aria-describedby="helpId" value="{{ old('code') }}" dir="auto">
                            @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label>Coupon Type</label>
                            <select class="form-control @error('type') is-invalid @enderror" name="type"
                                data-placeholder="Select Coupon type" style="width: 100%;">
                                <option value="fixed" {{ old('type') === 'fixed' ? 'selected' : '' }}>Fixed Value</option>
                                <option value="percent" {{ old('type') === 'percent' ? 'selected' : '' }}>Percent Off
                                </option>
                            </select>
                            @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-md-3">
                            <label for="value">Fixed Value</label>
                            <input type="number" name="value" id="value"
                                class="form-control @error('value') is-invalid @enderror" placeholder="Enter fixed value"
                                aria-describedby="helpId" value="{{ old('value') }}">
                            @error('value')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="percent_off">Percentage Value</label>
                            <input type="number" name="percent_off" id="percent_off"
                                class="form-control @error('percent_off') is-invalid @enderror"
                                placeholder="Enter percentage value" aria-describedby="helpId"
                                value="{{ old('percent_off') }}" dir="auto">
                            @error('percent_off')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="usage_limit">Usage Limit</label>
                            <input type="number" name="usage_limit" id="usage_limit"
                                class="form-control @error('usage_limit') is-invalid @enderror"
                                placeholder="Enter number of times the coupon can be used" aria-describedby="helpId"
                                value="{{ old('usage_limit') }}" dir="auto">
                            @error('usage_limit')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row my-4">
                        <div class="col-3">
                            <input type="submit" class="btn btn-primary" value="Add Coupon">
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
