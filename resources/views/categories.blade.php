@extends('welcome')
@section('title')
categories |
@endsection


 <style>
     .refund i{
        color: #690500;
            }
            .refund i:hover{
        color: #221e1e;

            }
 </style>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
@section('main-content')
<br>
<header class="bg-light py-3 px-4 rounded shadow-sm" aria-label="breadcrumb">
   <ol class="breadcrumb mb-0">
     <li class="breadcrumb-item">
       <a href="/" class="text-decoration-none text-dark">
         <i class="fas fa-home"></i> Home
       </a>
     </li>
     <li class="breadcrumb-item">
       <a href="{{ route('categories') }}" class="text-decoration-none text-dark">
         <i class="fas fa-th-large"></i> Categories
       </a>
     </li>

   </ol>
 </header>



<div class="container">
                  <h1 class="text-center">Categories</h1>
                <main class="main_content">
              @if ($categories->isEmpty())

              <p>no categories found</p>
                  @else

                   <div class="row">
                       @foreach ($categories as $category)
                       <div class="col-12 col-md-6 col-lg-3 mb-3">
                           <div class="card shadow p-4 category-card">
                               <div class="card-body">
                                   <a href="{{ route('category_details', ['slug' => Str::slug($category->slug)]) }}" class="text-decoration-none">

                                       <h4 class=" text-dark ">{{ $category->title }}</h4>
                                   </a>
                               </div>
                           </div>
                       </div>
                       @endforeach
                   </div>
                   @endif
               </div>
           </main></div>
           @endsection