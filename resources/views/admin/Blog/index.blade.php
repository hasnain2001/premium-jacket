@extends('admin.layouts.guest')

@section('datatable-title')
    Blogs
@endsection

@section('main-content')
<style>
    .alert-custom {
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
        font-weight: bold;
        border-radius: 0.25rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }
    .alert-custom .close {
        color: #155724;
    }
    .table-wrapper {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 0.5rem;
        overflow: hidden;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        font-weight: 600;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
    .btn-danger {
        font-weight: 600;
    }
    .table-responsive {
        margin-top: 20px;
    }
</style>

<div class="wrapper bg-white">
    <div class="content-wrapper">
        <section class="content">
            <div class="container bg-light p-4">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            

                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2 align-items-center">
                            <div class="col-sm-6">
                                <h1>Blog Management</h1>
                            </div>
                            <div class="col-sm-6 d-flex justify-content-end">
                                <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">Add New Blog</a>
                            </div>
                        </div>
                    </div>
                </section>

                @if ($blogs->isEmpty())
                    <div class="text-center py-4">
                        <p class="text-muted">No blogs available. Click the button above to add a new blog entry.</p>
                    </div>
                @else
                    <div class="table-wrapper">
                        <form id="bulkDeleteForm" action="{{ route('admin.blog.bulkDelete') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="table-responsive">
                                <table id="datatable-buttons" class="table table-hover dt-responsive nowrap w-100">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">
                                                <input type="checkbox" id="selectAllHeader">
                                            </th>
                                            <th scope="col">#</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Blog Image</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogs as $blog)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="selected_blogs[]" value="{{ $blog->id }}" class="selectCheckbox">
                                                </td>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $blog->title }}</td>
                                                <td>
                                                    @if ($blog->category_image)
                                                        <img src="{{ asset($blog->category_image) }}" alt="Blog Image" class="img-thumbnail" style="max-width: 80px;">
                                                    @else
                                                        <span class="badge badge-secondary">No Image</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                    <form action="{{ route('admin.blog.delete', $blog->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this blog entry?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="thead-dark">
                                        <tr>
                                            <th scope="col">
                                                <input type="checkbox" id="selectAllFooter">
                                            </th>
                                            <th scope="col">#</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Blog Image</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <button type="submit" class="btn btn-danger my-3" onclick="return confirm('Are you sure you want to delete the selected blogs?')">Delete Selected</button>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </section>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectAllHeader = document.getElementById('selectAllHeader');
        const selectAllFooter = document.getElementById('selectAllFooter');
        const checkboxes = document.querySelectorAll('.selectCheckbox');

        function toggleCheckboxes(selectAll) {
            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAll.checked;
            });
        }

        selectAllHeader.addEventListener('change', function() {
            toggleCheckboxes(selectAllHeader);
            selectAllFooter.checked = selectAllHeader.checked;
        });

        selectAllFooter.addEventListener('change', function() {
            toggleCheckboxes(selectAllFooter);
            selectAllHeader.checked = selectAllFooter.checked;
        });

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    if (document.querySelectorAll('.selectCheckbox:checked').length === checkboxes.length) {
                        selectAllHeader.checked = true;
                        selectAllFooter.checked = true;
                    }
                } else {
                    selectAllHeader.checked = false;
                    selectAllFooter.checked = false;
                }
            });
        });
    });
</script>

@endsection
