@extends('dashboard.layouts.parent')
@section('title', 'edit Content ')
@section('content')

    <form action="{{ route('dashboard.setting.update', $setting->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Use PUT or PATCH for updating -->

        <div class="form-group">
            <label for="key">Key</label>
            <input type="text" id="key" name="key" class="form-control" value="{{ old('key', $setting->key) }}"
                required>
            @error('key')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="value">Value</label>
            <textarea id="value" name="value" class="form-control" required>{{ old('value', $setting->value) }}</textarea>
            @error('value')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="visible">
                <input type="radio" id="visible" name="is_visible" value=""
                    {{ old('is_visible', $setting->is_visible) == '' ? 'checked' : '' }}> Visible
            </label>
            <label for="hidden">
                <input type="radio" id="hidden" name="is_visible" value="none"
                    {{ old('is_visible', $setting->is_visible) == 'none' ? 'checked' : '' }}> Hidden
            </label>
            @error('is_visible')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>


@endsection
