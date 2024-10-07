@extends('dashboard.layouts.parent')
@section('title', ' Content Management')
@section('content')
{{-- <h3>Dynamic Content Management</h3> --}}

    <div style="text-align: center">
        <a href="{{ route('dashboard.setting.create') }}" class="btn btn-primary ">Add New Content</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>key</th>
                <th>value</th>
                <th>Visibility</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($settings as $setting)
                <tr>
                    <td>{{ $setting->id }}</td>
                    <td>{{ $setting->key }}</td>
                    <td>{{ $setting->value }}</td>
                    <td>{{ $setting->is_visible ==""? 'Visible' : 'Hidden' }}</td>
                    <td>
                        <a href="{{ route('dashboard.setting.edit', $setting->id) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('dashboard.setting.destroy', $setting->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                        {{-- <form action="{{ route('admin.contents.toggleVisibility', $setting->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-secondary">{{ $setting->is_visible ? 'Hide' : 'Show' }}</button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

