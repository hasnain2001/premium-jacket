@extends('welcome')
@section('title')
    Checkout
@endsection

@section('main-content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<style>
    .logo {
        width: 80px;
        height: 40px;
        margin-right: 10px;
    }
    .card-header {
        background-color: #007bff;
        color: white;
        padding: 15px;
        border-radius: 0;
    }
    .form-control {
        border-radius: 8px;
        padding: 10px;
    }
    .btn-primary {
        background-color: #007bff;
        border-radius: 8px;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
    .alert {
        padding: 15px;
        font-size: 16px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    .express-checkout img {
        margin-right: 10px;
        max-width: 100px;
    }
    .img-thumbnail {
        border: 1px solid #ddd;
        padding: 4px;
        background-color: #fff;
    }
</style>

<div class="container mt-4">
    <h1 class="text-center mb-4">Checkout</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-check-circle" style="margin-right: 10px;"></i>
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> Please fix the following issues:
            <ul class="mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <!-- Left Side - Checkout Form -->
        <div class="col-md-8">
            <!-- Express Checkout Buttons -->
            <div class="express-checkout mb-3">
                <img src="{{ asset('images/paypal.png') }}" alt="PayPal" class="img-fluid">
                <img src="{{ asset('images/venmo.png') }}" alt="Venmo" class="img-fluid">
            </div>

            <hr />
<form action="{{ route('checkout.store') }}" method="POST" enctype="multipart/form-data"   >
                @csrf

                <!-- Contact Information -->
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
                    <small class="form-text text-muted">We'll use this email to send you details and updates about your order.</small>
                </div>

                <!-- Shipping Address -->
                <h4 class="mt-4">Shipping Address</h4>
                <div class="form-group">
                    <label for="country">Country/Region</label>
                    <select name="country" id="country" class="form-control" required>
                        <option value="">Select a country</option>
                        <option value="AF">Afghanistan</option>
                        <option value="AL">Albania</option>
                        <option value="DZ">Algeria</option>
                    </select>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" required>
                    </div>
                    <div class="col">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" required>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="Address" required>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label for="city">City</label>
                        <input type="text" name="city" class="form-control" id="city" placeholder="City" required>
                    </div>
                    <div class="col">
                        <label for="state">State</label>
                        <input type="text" name="state" class="form-control" id="state" placeholder="State" required>
                    </div>
                    <div class="col">
                        <label for="zip">ZIP Code</label>
                        <input type="text" name="zip" class="form-control" id="zip" placeholder="ZIP Code" required>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone Number" required>
                </div>

                <div class="form-check mt-3">
                    <input type="checkbox" class="form-check-input" id="same-address">
                    <label class="form-check-label" for="same-address">Use same address for billing</label>
                </div>

                <!-- Shipping Options -->
                <h4 class="mt-4">Shipping Options</h4>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="shipping_option" id="free_shipping" value="free" checked>
                    <label class="form-check-label" for="free_shipping">Free Shipping</label>
                </div>

                @foreach($cartItems as $item)
                    <input type="hidden" name="items[{{ $loop->index }}][product_id]" value="{{ $item->product->id }}">
                    <input type="hidden" name="items[{{ $loop->index }}][quantity]" value="{{ $item->quantity }}">
                    <input type="hidden" name="items[{{ $loop->index }}][price]" value="{{ $item->product->price }}">
                @endforeach

                <!-- Place Order Button -->


                <div class='form-row row'>
                    <div class='col-xs-12 form-group required'>
                        <label class='control-label'>Name on Card</label>
                        <input class='form-control' size='4' type='text'>
                    </div>
                </div>

                <div class='form-row row'>
                    <div class='col-xs-12 form-group card required'>
                        <label class='control-label'>Card Number</label>
                        <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                    </div>
                </div>

                <div class='form-row row'>
                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                        <label class='control-label'>CVC</label>
                        <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                    </div>
                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                        <label class='control-label'>Expiration Month</label>
                        <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                    </div>
                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                        <label class='control-label'>Expiration Year</label>
                        <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now (${{ $total }})</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Right side - Order Summary -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Order Summary</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tbody>
                            @foreach($cartItems as $item)
                                <tr>
                                    <td>
                                        @php
                                        $images = json_decode($item->product->productimage);
                                        @endphp
                                        @if(is_array($images) && !empty($images))
                                            <img src="{{ asset($images[0]) }}" alt="Product Image" class="img-thumbnail">
                                        @else
                                            <img src="{{ asset('images/No-image-available.jpg') }}" alt="No Image" class="img-thumbnail">
                                        @endif
                                    </td>
                                    <td>{{ $item->product->name }} x {{ $item->quantity }}</td>
                                    <td>${{ $item->product->price * $item->quantity }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="font-weight-bold">Total</td>
                                <td class="font-weight-bold">${{ $total }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    Stripe.setPublishableKey('{{ env("STRIPE_KEY") }}');

    $('#payment-form').submit(function(e) {
        var $form = $(this);
        if (!$form.data('cc-on-file')) {
            e.preventDefault();
            Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
            }, function(status, response) {
                if (response.error) {
                    alert(response.error.message);
                } else {
                    var token = response['id'];
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            });
        }
    });
</script>
@endsection
