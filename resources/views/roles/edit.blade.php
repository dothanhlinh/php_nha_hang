@extends('layouts.app')

@section('content')
    <h1>Edit Role</h1>

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $role->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="permissions" class="form-label">Permissions</label>
            <select class="form-control" id="permissions" name="permissions[]" multiple required>
                @foreach($permissions as $permission)
                    <option value="{{ $permission->name }}" {{ $role->permissions->contains('name', $permission->name) ? 'selected' : '' }}>{{ $permission->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
