@extends('admin.layouts.guest')
@section('datatable-title')
    Categories
@endsection
@section('main-content')
<div class="container">

    <!-- Start Content-->
    <div class="container-fluid">

        <section class="content-header">
            <div class="row mb-3">
                <div class="col-sm-6">
                    <h1 class="display-5">Categories</h1>
                </div>
                <div class="d-flex  justify-content-end">
                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary rounded-pill shadow-sm">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Category
                    </a>
                </div>
            </div>
        </section>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <i class="fa fa-check-circle mr-2" aria-hidden="true"></i>
                <b>{{ session('success') }}</b>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0 text-white">Category List</h5>
                    </div>
                    <div class="card-body">
                        <table id="datatable-buttons" class="table table-striped dt-responsive table-hover w-100">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Top Category</th>
                                    <th>Gender</th>
                                    <th>Status</th>
                                    <th>Added</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $category->title }}</td>
                                        <td>
                                            @if ($category->authentication == "No Auth")
                                                <span class="badge badge-danger text-success">
                                                    <i class="fa fa-times-circle" aria-hidden="true"></i> No
                                                </span>
                                            @else
                                                <span class="badge badge-success text-primary   ">
                                                    <i class="fa fa-check-circle" aria-hidden="true"></i> Yes
                                                </span>
                                            @endif
                                        </td>
                                        <td>{{ $category->gender }}</td>
                                        <td>
                                            @if ($category->status == "disable")
                                                <span class="badge badge-danger">
                                                    <i class="fa fa-times-circle" aria-hidden="true"></i> Disabled
                                                </span>
                                            @else
                                                <span class="badge badge-success text-success">
                                                    <i class="fa fa-check-circle" aria-hidden="true"></i> Enabled
                                                </span>
                                            @endif
                                        </td>
                                        <td>{{ $category->created_at->format('d M, Y') }}</td>
                                        <td>
                                            <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary btn-sm rounded-pill shadow-sm">
                                                <i class="fa fa-edit" aria-hidden="true"></i> Edit
                                            </a>
                                            <a href="{{ route('admin.category.delete', $category->id) }}" onclick="return confirm('Are you sure you want to delete this!')" class="btn btn-danger btn-sm rounded-pill shadow-sm">
                                                <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Top Category</th>
                                    <th>Gender</th>
                                    <th>Status</th>
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
