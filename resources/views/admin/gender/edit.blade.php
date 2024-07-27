@extends('admin.datatable_master')
@section('title')
    Update
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Gender</h1>
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
            <form name="UpdateGender" id="UpdateGender" method="POST" enctype="multipart/form-data" action="{{ route('admin.gender.edit', $genders->id) }}">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">genders Title<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="slug" value="{{ $genders->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="title">Meta Title<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" id="slug" value="{{ $genders->title }}" >
                                </div>
                              
                               
                               
                                <div class="form-group">
                                    <label for="meta_tag">Meta Tag <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="meta_tag" id="meta_tag" value="{{ $genders->meta_tag }}">
                                </div>
                                <div class="form-group">
                                    <label for="meta_keyword">Meta Keyword <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="meta_keyword" id="meta_keyword" value="{{ $genders->meta_keyword }}">
                                </div>
                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea 
                                    name="meta_description" 
                                    id="meta_description"  
                                    class="form-control" 
                                    cols="30" 
                                    rows="4" 
                                    style="resize: none;"
                                >{{ $genders->meta_description }}</textarea>
                                
                                </div>


                                <div class="col-12">
                                    <div class="d-grid gap-2">
            
                                    <button type="submit" class="btn btn-lg btn-primary">Save</button>
                                    <a href="{{ route('admin.gender') }}" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </div>
                             
                            </div>
                        </div>
                    </div>
                  
                  
                </div>
            </form>
        </div>
    </section>
</div>
@endsection