@extends('admin.layouts.guest')
@section('datatable-title')
    Gender
@endsection
@section('main-content')

<div class="container">
    <div class="container-fluid">

        <!-- Start Page Title -->
        <div class="row mb-3">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="display-5 ">Gender</h1>
                        <a href="{{ route('admin.gender.create') }}" class="btn btn-primary rounded-pill shadow-sm">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Gender
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa fa-check-circle mr-2" aria-hidden="true"></i>
                <b>{{ session('success') }}</b>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Gender List -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0 text-white">Gender List</h5>
                    </div>
                    <div class="card-body">
                        <table id="datatable-buttons" class="table table-striped dt-responsive table-hover w-100">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Gender Name</th>
                                    <th>Added</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($genders as $gender)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $gender->name }}</td>
                                        <td>{{ $gender->created_at->format('d M, Y') }}</td>
                                        <td>
                                            <a href="{{ route('admin.gender.edit', $gender->id) }}" class="btn btn-info btn-sm rounded-pill shadow-sm">
                                                <i class="fa fa-edit" aria-hidden="true"></i> Edit
                                            </a>
                                            <a href="{{ route('admin.gender.delete', $gender->id) }}" onclick="return confirm('Are you sure you want to delete this!')" class="btn btn-danger btn-sm rounded-pill shadow-sm">
                                                <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Gender Name</th>
                                    <th>Added</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
