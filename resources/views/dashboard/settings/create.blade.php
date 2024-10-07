@extends('dashboard.layouts.parent')
@section('title', 'Add Content ')
@section('content')

    <form action="{{ route('dashboard.setting.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="key">Key</label>
            <input type="text" id="key" name="key" class="form-control" value="{{ old('key') }}" required>
            @error('key')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="value">Value</label>
            <textarea id="value" name="value" class="form-control" required>{{ old('value') }}</textarea>
            @error('value')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="visible">
                <input type="radio" id="visible" name="is_visible" value=""
                    {{ old('is_visible') == '' ? 'checked' : '' }}> Visible
            </label>
            <label for="hidden">
                <input type="radio" id="hidden" name="is_visible" value="none"
                    {{ old('is_visible') == 'none' ? 'checked' : '' }}> Hidden
            </label>
            @error('is_visible')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Create</button>
    </form>

@endsection
