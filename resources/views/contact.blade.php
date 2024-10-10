<?php
header("X-Robots-Tag:index, follow");
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <title>Contact - Best Deals and Discounts |CouponsArena</title>
     <meta name="description" content="Find the best deals, discounts, and coupons on CouponsArena. Save money on your favorite products from top brands.">

 <meta name="keywords" content="deals, discounts, coupons, savings, affiliate marketing">

  <meta name="author" content="John Doe">
 <meta name="robots" content="index, follow">
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
<link rel="canonical" href="https://CouponsArena.com/about">
    <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />




</head>
<body>
<x-navbar/>
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
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
<div class="container mt-5">
  <h1>Contact Us</h1>
  @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  <form action="{{ route('contact.submit') }}" method="POST">
      @csrf
      <div class="form-group">
          <label for="name">Your Name:</label>
          <input type="text" name="name" class="form-control" id="name" required>
      </div>
      <div class="form-group">
          <label for="email">Your Email:</label>
          <input type="email" name="email" class="form-control" id="email" required>
      </div>
      <div class="form-group">
          <label for="message">Message:</label>
          <textarea name="message" class="form-control" id="message" rows="5" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary mt-3">Send Message</button>
  </form>
</div>
<x-footer/>

</body>
</html>
