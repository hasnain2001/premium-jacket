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
                    <h1>Update Product</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            @if(session('success'))
                <div class="alert alert-success alert-dismissable">
                    <i class="fa fa-check-circle"></i>
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

            <form name="UpdateStore" id="UpdateStore" method="POST" enctype="multipart/form-data" action="{{ route('admin.product.update', $product->id) }}">
                @csrf
                @method('POST')
                <div class="row">
                    <!-- Section 1: Basic Information -->
                    <div class="col-md-4 mb-4">
                        <div class="card p-3 shadow-sm">
                            <h5 class="card-title">Basic Information</h5>
                            <div class="form-group">
                                <label for="name">Product Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug:</label>
                                <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $product->slug) }}" required>
                                @error('slug')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control">{{ old('description', $product->description) }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}" required>
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="offprice">Off Price:</label>
                                <input type="number" class="form-control" id="offprice" name="offprice" value="{{ old('offprice', $product->offprice) }}" required>
                                @error('offprice')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}" required>
                                @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="sizes">Sizes:</label>
                                <input type="text" class="form-control" id="sizes" name="sizes" value="{{ old('sizes', $product->sizes) }}">
                                @error('sizes')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Category and Meta Information -->
                    <div class="col-md-4 mb-4">
                        <div class="card p-3 shadow-sm">
                            <h5 class="card-title">Category & Meta Information</h5>
                            <div class="form-group">
                                <label for="category">Category <span class="text-danger">*</span></label>
                                <select name="categories" id="category" class="form-control" required>
                                    <option value="" disabled selected>--Select Category--</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->slug }}" {{ old('categories', $product->categories) == $category->slug ? 'selected' : '' }}>{{ $category->slug }}</option>
                                    @endforeach
                                </select>
                                @error('categories')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Meta Title:</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $product->title) }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="meta_tag">Meta Tag:</label>
                                <input type="text" class="form-control" id="meta_tag" name="meta_tag" value="{{ old('meta_tag', $product->meta_tag) }}">
                                @error('meta_tag')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="meta_keyword">Meta Keyword:</label>
                                <input type="text" class="form-control" id="meta_keyword" name="meta_keyword" value="{{ old('meta_keyword', $product->meta_keyword) }}">
                                @error('meta_keyword')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="meta_description">Meta Description:</label>
                                <textarea class="form-control" id="meta_description" name="meta_description">{{ old('meta_description', $product->meta_description) }}</textarea>
                                @error('meta_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                             <div class="form-group">
                                <label for="top_product">Top Product <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="top_product" name="top_product" value="{{ old('top_product', $product->top_product) }}" min="0">
                            </div>
                                <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('admin.product') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </div>

                    <!-- Section 3: Status and Images -->
                    <div class="col-md-4 mb-4">
                        <div class="card p-3 shadow-sm">
                           
                           

                            <!-- Display Existing Images -->
                            <div class="form-group">
                                <label>Existing Images:</label>
                                <div class="d-flex flex-wrap">
                                    @foreach (json_decode($product->productimage, true) as $index => $image)
                                        <div class="p-1">
                                            <img src="{{ asset($image) }}" alt="Product Image" class="img-thumbnail" width="100">
                                            <label class="d-block text-center mt-1">
                                                <input type="checkbox" name="delete_images[]" value="{{ $index }}"> Delete
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- File Upload -->
                            <div class="form-group">
                                <label for="productimage">Upload New Images:</label>
                                <input type="file" class="form-control-file" id="productimage" name="productimage[]" multiple onchange="previewImages(event)">
                                <div id="imagePreviews" class="d-flex flex-wrap mt-3"></div>
                            </div>

                        
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

<script>
    function previewImages(event) {
        const files = event.target.files;
        const previewsContainer = document.getElementById('imagePreviews');
        previewsContainer.innerHTML = ''; // Clear previous previews

        Array.from(files).forEach(file => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('img-thumbnail', 'm-1');
                img.style.maxWidth = '100px';
                previewsContainer.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
    }
</script>
@endsection
