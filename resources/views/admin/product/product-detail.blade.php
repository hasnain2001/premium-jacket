@extends('admin.layouts.app')
@section('datatable-title')
    create
@endsection
@section('content')

<style>
        .main-image img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .product-thumbs img {
            cursor: pointer;
        }
        .product-thumbs img:hover {
            border: 2px solid #007bff;
        }
</style>
 <!-- Start Content-->
 <div class="container-fluid">
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
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">

                        <li class="breadcrumb-item"><a href="{{route('admin.product')}}">Product</a></li>
                        <li class="breadcrumb-item active">Product Detail</li>
                    </ol>
                </div>
                <h4 class="page-title">Product Detail</h4>
                <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-success btn-xs waves-effect waves-light">Edit<i class="mdi mdi-pencil"></i>
                </a>
            
                <a href="{{ route('admin.product.delete', $product->id) }}" onclick="return confirm('Are you sure you want to delete the selected product ?')" class="btn btn-danger btn-xs waves-effect waves-light">Delete    <i class="mdi mdi-close"></i></a>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="main-image mb-4 text-center">
                                        @php
                                            $images = json_decode($product->productimage, true);
                                        @endphp
                                        @if (is_array($images) && count($images) > 0)
                                            <img src="{{ asset($images[0]) }}" alt="{{ $product->name }}" class="productimage img-fluid rounded" id="mainImage">
                                        @else
                                            <img src="default-image.jpg" alt="No Image" class="img-fluid rounded" id="mainImage">
                                        @endif
                                    </div>
                                    <div class="product-thumbs d-flex justify-content-center">
                                        <div >
                                        @if (is_array($images) && count($images) > 0)
                                            @foreach ($images as $key => $image)
                                                <img class="productimage img-fluid small-img rounded m-1" src="{{ asset($image) }}" data-index="{{ $key }}" onclick="changeImage(this)" style="width: 80px; cursor: pointer;">
                                            @endforeach
                                        @else
                                            <p class="no-images">No images available.</p>
                                        @endif
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="ps-lg-3 mt-3 mt-lg-0">
                                @php
                                $halfName = substr($product->name, 0, ceil(strlen($product->name) / 2));
                            @endphp

                            <a href="#" class="text-primary">{{ $halfName }}</a>

                                <h4 class="mb-3">{{$product->name}}</h4>
                                <p class="text-muted float-start me-3">
                                    <span class="mdi mdi-star text-warning"></span>
                                    <span class="mdi mdi-star text-warning"></span>
                                    <span class="mdi mdi-star text-warning"></span>
                                    <span class="mdi mdi-star text-warning"></span>
                                    <span class="mdi mdi-star"></span>
                                </p>
                                {{-- <p class="mb-4"><a href="#" class="text-muted">( 36 Customer Reviews )</a></p> --}}
                                <h6 class="text-danger text-uppercase">
                                    {{ number_format((($product->offprice - $product->price) / $product->offprice) * 100, 2) }}% Off
                                    (Save ${{ number_format($product->offprice - $product->price, 2) }} USD)
                                </h6>
                                <h4 class="mb-4">
                                    Price:
                                    <span class="text-muted me-2">
                                        <del>${{ number_format($product->offprice, 2) }} USD</del>
                                    </span>
                                    <b>${{ number_format($product->price, 2) }} USD</b>
                                </h4>

                                <h4><span class="badge bg-soft-success text-success mb-4">Instock {{$product->quantity  }}</span></h4>
                                <p class="text-muted mb-4">{{ $product->description }}.</p>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div>
                                            <p class="text-muted"><i class="mdi mdi-checkbox-marked-circle-outline h6 text-primary me-2"></i> Sed ut perspiciatis unde</p>
                                            <p class="text-muted"><i class="mdi mdi-checkbox-marked-circle-outline h6 text-primary me-2"></i> Nemo enim ipsam voluptatem</p>
                                            <p class="text-muted"><i class="mdi mdi-checkbox-marked-circle-outline h6 text-primary me-2"></i> Temporibus autem quibusdam et</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <p class="text-muted"><i class="mdi mdi-checkbox-marked-circle-outline h6 text-primary me-2"></i> Itaque earum rerum hic</p>
                                            <p class="text-muted"><i class="mdi mdi-checkbox-marked-circle-outline h6 text-primary me-2"></i> Donec quam felis ultricies nec</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div>
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row -->

    <script>
        function changeImage(element) {
            const mainImage = document.getElementById('mainImage');
            mainImage.src = element.src;
        }
    </script>


@endsection
