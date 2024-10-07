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
            {{-- Success Alert --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: #d4edda; border: 1px solid #c3e6cb; color: #155724; position: relative; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 5px;">
                    <i class="fa fa-check-circle" style="margin-right: 8px;"></i>
                    <strong>{{ session('success') }}</strong>
                                </div>
            @endif

            {{-- Error Alert --}}
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <i class="fa fa-exclamation-circle" style="margin-right: 8px;"></i>
                    <strong>Please fix the following errors:</strong>
                    <ul style="margin-top: 10px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <form name="UpdateCategory" id="UpdateCategory" method="POST" enctype="multipart/form-data" action="{{ route('admin.category.update', $categories->id) }}" style="background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="card" style="border: none; box-shadow: none;">
                            <div class="card-body">
                                {{-- Category Title --}}
                                <div class="form-group">
                                    <label for="title" class="font-weight-bold">Category Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{ $categories->title }}" required style="border-radius: 5px; padding: 10px;">
                                </div>
                                
                                {{-- Slug --}}
                                <div class="form-group">
                                    <label for="slug" class="font-weight-bold">Slug <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="slug" id="slug" value="{{ $categories->title }}" required style="border-radius: 5px; padding: 10px;">
                                </div>

                                {{-- Meta Tag --}}
                                <div class="form-group">
                                    <label for="meta_tag" class="font-weight-bold">Meta Tag <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="meta_tag" id="meta_tag" value="{{ $categories->meta_tag }}" style="border-radius: 5px; padding: 10px;">
                                </div>

                                {{-- Gender --}}
                                <div class="form-group">
                                    <label for="Gender" class="font-weight-bold">Gender <span class="text-danger">*</span></label>
                                    <select name="gender" class="form-control" style="border-radius: 5px; padding: 10px;">
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
                        <div class="card" style="border: none; box-shadow: none;">
                            <div class="card-body">
                                {{-- Authentication --}}
                                <div class="form-group">
                                    <label for="authentication" class="font-weight-bold">Authentication</label><br>
                                    <input type="checkbox" name="authentication" id="authentication" {{ $categories->authentication == 'top_stores' ? 'checked' : '' }} value="top_stores">&nbsp;
                                    <label for="authentication">Top Store</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        {{-- Save and Cancel Buttons --}}
                        <button type="submit" class="btn btn-primary" style="background-color: #007bff; border: none; padding: 10px 20px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                            <i class="fa fa-save"></i> Save
                        </button>
                        <a href="{{ route('admin.category') }}" class="btn btn-secondary" style="padding: 10px 20px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                            <i class="fa fa-times"></i> Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
