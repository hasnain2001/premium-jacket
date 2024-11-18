@extends('admin.layouts.guest')

@section('datatable-title')
    Custom Jacket
@endsection

@section('main-content')

<div class="container ">
    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-check-circle"></i>
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Error Message -->
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="fa fa-exclamation-triangle"></i>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Title -->
    <h1 class="text-center mb-4">Customize Jacket List</h1>

    <!-- Table -->
    <table id="basic-datatable" class="table table-striped table-bordered dt-responsive nowrap w-100 shadow-lg">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Image</th>
                <th>Action</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customizes as $customize)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $customize->name }}</td>
                    <td>{{ $customize->email }}</td>
                    <td>{{ $customize->phone_number }}</td>
                    <td>
                        @if($customize->image !== 'No Image')
                            <img src="{{ asset('uploads/design/' . $customize->image) }}" class="img-thumbnail" alt="Image" width="100">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.customize.orderDetail', $customize->id) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye"></i> View Details
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('admin.customize.delete', $customize->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this entry?')">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<br><br>

@endsection
