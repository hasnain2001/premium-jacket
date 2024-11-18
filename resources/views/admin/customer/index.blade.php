@extends('admin.layouts.guest')

@section('datatable-title')
    Customers
@endsection

@section('main-content')
<div class="container">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-6">
            <h1 class="display-5">Users</h1>
        </div>
        <div class="col-6 d-flex justify-content-end">
            {{-- <a href="{{ route('admin.users.create') }}" class="btn btn-primary rounded-pill shadow-sm">
                <i class="fa fa-user-plus" aria-hidden="true"></i> Add New User
            </a> --}}
        </div>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-check-circle mr-2"></i>
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- User Table -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0 text-white">User List</h5>
        </div>
        <div class="card-body">
            <table  id="datatable-buttons"  class="table table-striped table-hover dt-responsive w-100">
   
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('d M, Y H:i') }}</td>
                            <td>
                                <span class="badge badge-dark" style="color: black;">
                                    {{ $user->is_admin ? 'Admin' : 'User' }}
                                </span>
                                
                            </td>
                            <td>
                                @if (!$user->is_admin)
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm rounded-pill shadow-sm" onclick="return confirm('Are you sure you want to delete this user?')">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                @else
                                    <button class="btn btn-secondary btn-sm rounded-pill shadow-sm" disabled>
                                        <i class="fa fa-ban"></i> Cannot Delete
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
