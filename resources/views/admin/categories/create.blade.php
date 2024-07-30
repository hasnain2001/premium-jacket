@extends('admin.layouts.guest')
@section('title')
    Create
@endsection
@section('main-content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Category</h1>
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
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form name="CreateCategory" id="CreateCategory" method="POST" enctype="multipart/form-data" action="{{ route('admin.category.store') }}">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Category Title<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" id="slug" required>
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title">slug <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="slug" id="title" required>
                                    @error('slug')
                                     <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="meta_tag">Meta Tag <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="meta_tag" id="meta_tag">
                                    @error('meta_tag')

                                   <span class="tex-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="meta_keyword">Meta Keyword <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="meta_keyword" id="meta_keyword">
                                    @error('meta_keyword')
 <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category">Gender <span class="text-danger">*</span></label>
                                    <select name="gender" id="gender" class="form-control" required>
                                        <option value="" disabled selected>--Select Gender--</option>
                                        @foreach($genders as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea name="meta_description" id="meta_description" class="form-control" cols="30" rows="4" style="resize: none;"></textarea>
                                    @error('meta_description')
                                    <span class="text-danger">{{ $message }}</span>
                                                                       @enderror
                                </div>





                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                             
                                <div class="form-group">
                                    <label for="authentication">Authentication</label><br>
                                    <input type="checkbox" name="authentication" id="authentication" value="top_stores">&nbsp;<label for="authentication">Top Store</label>
                                    @error('authentication')
                                    <span class="text-danger">{{ $message }}</span>
                                                                       @enderror
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
