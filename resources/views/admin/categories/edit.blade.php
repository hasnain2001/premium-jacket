@extends('admin.layouts.guest')
@section('title')
    Update
@endsection
@section('main-content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Category</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            @if(session('success'))
                <div class="alert alert-success alert-dismissable">
                    <i class="fa fa-ban"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <b>{{ session('success') }}</b>
                </div>
            @endif
            <form name="UpdateCategory" id="UpdateCategory" method="POST" enctype="multipart/form-data" action="{{ route('admin.category.update', $categories->id) }}">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Category Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{ $categories->title }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="title">slug <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="slug" id="title" value="{{ $categories->title }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="meta_tag">Meta Tag <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="meta_tag" id="meta_tag" value="{{ $categories->meta_tag }}" >
                                </div>
                                <div class="form-group">
                                    <label for="Gender"> Gender <span class="text-danger">*</span></label>
                                    <select name="gender" class="form-control">
                                        @foreach($genders as $gender)
                                            <option value="{{ $gender->name }}" {{ $categories->gender == $gender->name ? 'selected' : '' }}>
                                                {{ $gender->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>





                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                             
                                <div class="form-group">
                                    <label for="authentication">Authentication</label><br>
                                    <input type="checkbox" name="authentication" id="authentication" {{ $categories->authentication == 'top_stores' ? 'checked' : '' }} value="top_stores">&nbsp;<label for="authentication">Top Store</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('admin.category') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
