@extends('admin.layouts.guest')
@section('datatable-title')
    Product
@endsection
@section('main-content')

<style>
    .img-fluid{
        width: 100%;
        height: 200px;
      background-position: center;
    }
</style>
<div class="content">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-check-circle" aria-hidden="true"></i>
        <strong>Success!</strong> {{ session('success') }}
     
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
        <strong>Error!</strong>
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>

                            <li class="breadcrumb-item active"><a href="{{route('admin.product')}}">Product</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Products</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-auto">
                                <form action="{{ route('product.search.index') }}" method="POST" class="d-flex align-items-center">
                                    @csrf
                                    <label for="inputPassword2" class="visually-hidden">Search</label>
                                    <input type="search" name="query" class="form-control me-2" id="inputPassword2" placeholder="Search...">
                                    <button type="submit" class="btn btn-outline-secondary d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                                        </svg>
                                    </button>
                                </form>
                                
                          
                                
                                    <label for="status-select" class="me-2">Select By Category</label>
                                    <div class="me-sm-3">
                                        <form method="GET" action="{{ route('admin.product') }}">
                                            <select class="form-select my-1 my-lg-0" name="categories" id="category-select" onchange="this.form.submit()">
                                                <option value=""><a href="{{ route('admin.product') }}" >All Categories</a></option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->categories }}" {{ $selectedCategory == $category->categories ? 'selected' : '' }}>
                                                        {{ $category->categories }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </form>

                                    </div>

                            </div>
                            <div class="col-auto">
                                <div class="text-lg-end my-1 my-lg-0">

                                    <a href="{{ route('admin.product.create') }}" class="btn btn-danger waves-effect waves-light">
                                        <i class="mdi mdi-plus-circle me-1"></i> Add New
                                    </a>




                                </div>
                            </div><!-- end col-->
                        </div> <!-- end row -->
                    </div>
                </div> <!-- end card -->
            </div> <!-- end col-->
        </div>
        <!-- end row-->

        <div class="row">
            @if (count($products) > 0)
                @foreach ($products as $product)
                    <div class="col-md-4">
                        <div class="card product-box">
                            <div class="card-body">
                                <div class="product-action">
                                    <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-success btn-xs waves-effect waves-light"><i class="mdi mdi-pencil"></i>
                                    </a>


                                    <a href="{{ route('admin.product.delete', $product->id) }}" onclick="return confirm('Are you sure you want to delete the selected product ?')" class="btn btn-danger btn-xs waves-effect waves-light"><i class="mdi mdi-close"></i></a>
                                </div>
                                <div class="bg-light">
                                    @php
                                        $images = json_decode($product->productimage);
                                    @endphp
                                    @if(is_array($images) && !empty($images))
                                        <img src="{{ asset($images[0]) }}" alt="Product Image" class="img-fluid" >
                                    @else
                                        <img src="{{ asset('front/assets/images/no-image-found.jpg') }}" alt="No Image" class="stores shadow rounded-circle" loading="lazy">
                                    @endif
                                </div>
                                <div class="product-info">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h5 class="font-16 mt-0 sp-line-1"><a href="{{ route('admin.product.details', ['slug' => Str::slug($product->slug)]) }}" class="text-dark">{{$product->name}}</a></h5>
                                            <div class="text-warning mb-2 font-13">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <h5 class="m-0"><span class="text-muted">Stocks: {{$product->quantity}} pcs</span></h5>
                                        </div>
                                        <div class="col-auto">
                                            <div class="product-price-tag">
                                                ${{$product->price }}
                                            </div>
                                            <a href="{{ route('admin.product.details', ['slug' => Str::slug($product->slug)]) }}" class="btn btn-success text-white">View detail product</a>
                                        </div>
                                    </div> <!-- end row -->
                                </div> <!-- end product info -->
                            </div> <!-- end card body -->
                        </div> <!-- end card -->
                    </div> <!-- end col -->
                @endforeach
            @else
            <div class="alert alert-danger" role="alert">
               No Product AVailable
                     </div>
            @endif
        </div> <!-- end row -->


        <div class="row">
            <div class="col-12">
              <!-- Pagination links -->
              <div class="pagination-wrapper">
                {{ $products->appends(request()->input())->links('vendor.pagination.custom') }}
            </div>
            </div> <!-- end col-->
        </div>
        <!-- end row-->

    </div> <!-- container -->

</div> <!-- content -->


                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </section>

    </div>

<br><br>

@endsection
