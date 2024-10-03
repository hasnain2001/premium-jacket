@extends('admin.layouts.guest')

@section('datatable-title')
    Customers
@endsection

@section('main-content')
<div class="container">
    <h1>Users</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
     <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Role</th> <!-- New Role Column -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        {{-- Check if user is an admin or a regular user --}}
                        {{ $user->is_admin ? 'Admin' : 'User' }}
                    </td>
                    <td>
                        {{-- <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a> --}}
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
