@extends('admin.layouts.guest')
@section('datatable-title')
    Categories
@endsection
@section('main-content')

<div class="content">
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">

                                <h1>Gender</h1>

                    <div class="col-sm-6 d-flex justify-content-end">
                        <a href="{{ route('admin.gender.create') }}" class="btn btn-primary">Add New</a>
                    </div>


                @if(session('success'))
                    <div class="alert alert-success alert-dismissable">
                        <i class="fa fa-ban"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <b>{{ session('success') }}</b>
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <table id="datatable-buttons" class="table table-striped dt-responsive  w-100">
                                    <thead>
                                        <tr> <th scope="col">#</th>
                                            <th>genders Name</th>


                                            <th>Added</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($genders as $category)
                                            <tr> <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $category->name }}</td>



                                                <td>{{ $category->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('admin.gender.edit', $category->id) }}" class="btn btn-info btn-sm">Edit</a>
                                                    <a href="{{ route('admin.gender.delete', $category->id) }}" onclick="return confirm('Are you sure you want to delete this!')" class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <th scope="col">#</th>
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

        </section>

    </div>
@endsection
