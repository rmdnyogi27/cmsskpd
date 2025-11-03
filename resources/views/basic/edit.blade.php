@extends('layouts.admin')

@section('main-content')
<div class="container mt-5">
    <h3>Edit User</h3>
    <form action="{{ route('basic.update', $user->id) }}" method="POST" class="mt-3">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">First Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $user->last_name) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password (isi jika mau diubah)</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('basic.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
