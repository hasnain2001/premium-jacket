@extends('admin.layouts.guest')
@section('datatable-title')
    create
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

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>

                            <li class="breadcrumb-item active">Products</li>
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
                                <form action="{{route('product.search.index')}}" class="d-flex flex-wrap align-items-center">
                                    @csrf
                                    <label for="inputPassword2" class="visually-hidden">Search</label>
                                    <div class="me-3">
                                        <input id="searchInput" name="query" class="form-control my-1 my-lg-0" id="inputPassword2" placeholder="Search...">
                                    </div>
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
            @if ($adminproduct->isEmpty())
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Sorry!</h4>
                <p>No products available at the moment. Please check back later.</p>
                <hr>
                <p class="mb-0">Feel free to browse other categories or use the search feature to find what you're looking for.</p>
            </div>
        @else

                @foreach ($adminproduct as $product)
                    <div class="col-md-4">
                        <div class="card product-box">
                            <div class="card-body">
                                <div class="product-action">
                                    <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-success btn-xs waves-effect waves-light"><i class="mdi mdi-pencil"></i></a>
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


            @endif
        </div> <!-- end row -->



           {{ $adminproduct->links('vendor.pagination.custom') }}

    </div> <!-- container -->

</div> <!-- content -->


                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </section>

    </div>


    <script>

$(document).ready(function() {
    $('#searchInput').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: '{{ route('product.search.index') }}',
                dataType: 'json',
                data: {
                    query: request.term
                },
                success: function(data) {
                    console.log(data); // Debugging line
                    response($.map(data, function(item) {
                        return {
                            label: item.label, // Display label
                            value: item.value // Value submitted to input
                        };
                    }));
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('AJAX call failed: ' + textStatus + ', ' + errorThrown);
                }
            });
        }
    });
});


    </script>

@endsection
