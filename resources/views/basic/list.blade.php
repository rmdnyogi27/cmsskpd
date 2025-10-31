@extends('layouts.admin')

@section('main-content')
<div class="container">
    <h3 class="mb-4">Kelola Pengguna</h3>

    <a href="{{ route('basic.create') }}" class="btn btn-primary mb-3">New User</a>

    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $user->full_name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if(auth()->user()->role == 'admin')
                        <a href="{{ route('basic.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('basic.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    @else
                        <span class="text-muted">No Access</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
