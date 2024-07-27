@extends('admin.layouts.guest')
@section('title')
    Create Product
@endsection
<style>
    .form-group {
        margin-bottom: 1rem;
    }
    .image-preview {
    margin: 10px;
}

.image-preview img {
    max-width: 100px;
    max-height: 100px;
}


</style>
@section('main-content')
<div class="container">
<div class="content-wrapper">

    @if(session('success'))
    <div class="alert alert-success alert-dismissable">
        <i class="fa fa-ban"></i>

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
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('admin.product')}}">Product</a></li>

                                <li class="breadcrumb-item active">Add Product</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Add  Product</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="product-name" class="form-label">Product Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" required placeholder="Product name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="product-reference" class="form-label">Slug <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="slug" name="slug" required placeholder="Define your URL here">
                                    @error('slug')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="product-description" class="form-label">Product Description <span class="text-danger">*</span></label>
                                    <textarea name="description" id="description" class="form-control" placeholder="Description" required></textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="category">Category <span class="text-danger">*</span></label>
                                    <select name="categories" id="category" class="form-control">
                                        <option value="" disabled selected>--Select Category--</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->slug }}">{{ $category->slug }}</option>
                                        @endforeach
                                    </select>
                                    @error('categories')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="product-price">Price <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="product-price" name="price" placeholder="Enter amount" required>
                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="product-price"> OFF Price <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="product-price" name="offprice" placeholder="Enter amount" required>
                                    @error('offprice')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="quantity">Quantity:</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity" required>
                                    @error('quantity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2">Status <span class="text-danger">*</span></label>
                                    <br/>
                                    <div class="d-flex flex-wrap">
                                        <div class="form-check me-2">
                                            <input class="form-check-input" type="radio" name="status" value="enable" id="enable" required>
                                            <label class="form-check-label" for="enable">Enable</label>
                                        </div>
                                        <div class="form-check me-2">
                                            <input class="form-check-input" type="radio" name="status" value="disable" id="disable" required>
                                            <label class="form-check-label" for="disable">Disable</label>
                                        </div>
                                    </div>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="product-meta-title" class="form-label">Meta Title</label>
                                    <input type="text" class="form-control" id="product-meta-title" name="meta_title" placeholder="Enter title">
                                </div>

                                <div class="mb-3">
                                    <label for="product-meta-keywords" class="form-label">Meta Keywords</label>
                                    <input type="text" class="form-control" id="product-meta-keywords" name="meta_keywords" placeholder="Enter keywords">
                                </div>

                                <div>
                                    <label for="product-meta-description" class="form-label">Meta Description</label>
                                    <textarea class="form-control" rows="5" id="product-meta-description" name="meta_description" placeholder="Please enter description"></textarea>
                                </div>
                            </div>
                        </div> <!-- end card -->

                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Product Images</h5>
                                <div class="mb-3">
                                    <label for="productimage">Product Images:</label>
                                    <input type="file" class="form-control" id="productimage" name="productimage[]" multiple required onchange="previewImages(event)">
                                    <div id="imagePreviews" style="display: flex; gap: 10px; flex-wrap: wrap; margin-top: 10px;"></div>
                                    <span class="text-danger">maximum 6 pictures you can upload</span>
                                </div>



                            </div>
                        </div> <!-- end card -->


                    </div> <!-- end col -->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-12">
                        <div class="text-center mb-3">
                            <a href="{{ route('admin.product') }}" class="btn w-sm btn-light waves-effect">Cancel</a>
                            <button type="submit" class="btn w-sm btn-success waves-effect waves-light">Save</button>
                            <a href="{{ route('admin.product.create') }}" class="btn w-sm btn-danger waves-effect">Delete</a>

                        </div>
                    </div> <!-- end col -->
                </div>
            </form>
            <!-- end row -->





        </div> <!-- container -->

    </div> <!-- content -->
</div></div>


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
                img.style.maxWidth = '100px';
                img.style.marginTop = '10px';
                previewsContainer.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
    }

</script>

@endsection
