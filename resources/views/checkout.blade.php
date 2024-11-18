<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CheckOut</title>
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('bootstrap-5.0.2/css/bootstrap.min.css')}}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        /* Improved Styling */
        body {
            background-color: #f8f9fa;
            color: #333;
        }
        .product-logo {
            width: 100%;
            height: 100px;
            margin-right: 10px;
            border-radius: 8px;
        }
        .card-header, .btn-primary {
            background-color: #007bff;
            color: white;
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
            height: 40px;
        }
        .img-thumbnail {
            border: 1px solid #ddd;
            padding: 4px;
            background-color: #fff;
        }
        .card {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .summary {
            border: 1px solid #f1f1f1;
            border-radius: 10px;
            padding: 20px;
            background: #fafafa;
        }
        .form-control, .card-header {
            border-radius: 8px;
        }
        .order-item {
    background-color: #f9f9f9; /* Light background for contrast */
    color: #333; /* Darker text for readability */
    font-size: 14px; /* Slightly larger text for better readability */
    font-weight: 500; /* Medium weight for balance */
    padding: 8px 9px; /* Add some padding for better spacing */
    margin: 1px 0; /* Add spacing between items */
    border-radius: 5px; /* Rounded corners for a softer look */
    border: 1px solid #ddd; /* Light border for separation */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    transition: all 0.3s ease; /* Smooth transition for hover effect */
}

.order-item:hover {
    background-color: #f1f1f1; /* Change background on hover */
    transform: scale(1.05); /* Slight zoom effect on hover */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Darker shadow on hover */
}

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .form-row .col {
                margin-bottom: 15px;
            }
        }
    </style>
</head>
<body>
    <nav>
        @include('components.navbar')
    </nav>

    <div class="container mt-4">
        <h3 class="text-primary mb-4">Checkout</h3>

        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa fa-check-circle me-2"></i><strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @session('success')
        <div class="alert alert-success" role="alert"> 
            {{ $value }}
        </div>
    @endsession
    @if (Session::has('success'))
    <div class="alert alert-success text-center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <p>{{ Session::get('success') }}</p>
    </div>
@endif

        @if($errors->any())
            <div class="alert alert-danger">
                <strong>Please fix the following issues:</strong> 
                <ul class="mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

        <div class="row">
            <!-- Left Side - Checkout Form -->
            <div class="col-lg-8 mb-4">
                <div class="card p-4">
                    <div class="express-checkout mb-4 d-flex align-items-center flex-column flex-md-row">
                        <img src="{{ asset('images/secure-stripe-payment-logo.png') }}" alt="Stripe" class=" img-fluid">
                            <img src="{{ asset('images/paypal.png') }}" alt="PayPal" class="img-fluid ">
                    </div>
                    <hr/>

                    <!-- Checkout Form -->
                    <form   role="form"  action="{{ route('checkout.store') }}" method="post"   class="require-validation" data-cc-on-file="false"
                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                    id="payment-form">
                      
                        @csrf

                        @foreach($cartItems as $item)
                        <input type="hidden" name="items[{{ $loop->index }}][product_id]" value="{{ $item->product->id }}">
                        <input type="hidden" name="items[{{ $loop->index }}][quantity]" value="{{ $item->quantity }}">
                        <input type="hidden" name="items[{{ $loop->index }}][price]" value="{{ $item->product->price }}">
                        <input type="hidden" name="items[{{ $loop->index }}][size]" value="{{ $item->size }}">
                        <input type="hidden" name="items[{{ $loop->index }}][color]" value="{{ $item->color }}">
                    @endforeach
                        <h4 class="mb-3">Contact Information</h4>
                        <div class="card p-3 mb-4">
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
                                <small class="form-text text-muted">We'll send order updates to this email.</small>
                            </div>
                            <div class="form-group mt-3">
                                <label for="phone">Phone Number</label>
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone Number" required>
                            </div>
                            <div class="col">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" required>
                            </div>
                            <div class="col">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" required>
                            </div>
                        </div>

                        <h4 class="mb-3">Shipping Address</h4>
                        <div class="card p-3 mb-4">
                            <!-- Contact and Shipping Details -->
                            <div class="row">
                                <div class="form-group">
                                    <label for="country">Country/Region</label>
                                    <select name="country" id="country" class="form-control" required>
                                        <option value="">Select a country</option>
                                    </select>
                                </div>
                                
                                <div class="col">
                                    <label for="state">State</label>
                                
                                    <!-- Input field for state when no states are available -->
                                    <input type="text" name="state" class="form-control" placeholder="Enter state">
                                </div>
                            </div>
                            
                            <div class="form-group mt-3">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" id="address" placeholder="Address" required>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label for="city">City</label>
                                    <input type="text" name="city" class="form-control" id="city" placeholder="City" required>
                                </div>
                                
                                <div class="col">
                                    <label for="zip">ZIP Code</label>
                                    <input type="text" name="zip" class="form-control" id="zip" placeholder="ZIP Code" required>
                                </div>
                            </div>
                           
                        </div>
                        <input class="form-check-input" type="hidden" name="shipping_option" id="free_shipping" value="free-shipping" checked>
                        <!-- Shipping Options -->
                        {{-- <h4 class="mb-3">Shipping Options</h4>
                        <div class="card p-3 mb-4">
                            <div class="form-check">
                              
                                <label class="form-check-label" for="free_shipping">Free Shipping</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="shipping_option" id="express_shipping" value="express-shipping">
                                <label class="form-check-label" for="express_shipping">Express Shipping</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="shipping_option" id="standard_shipping" value="standard-shipping">
                                <label class="form-check-label" for="standard_shipping">Standard Shipping</label>
                            </div>
                        </div> --}}

                        <!-- Payment Options -->
                        <h4 class="mt-4">Choose Payment Method</h4>
                        <input type="hidden" name="payment_method" id="payment_method">
                        <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#stripeModal">
                            Pay with Stripe
                        </button>
                        <button type="button" onclick="submitPayPalForm()" class="btn btn-info">
                            Pay with PayPal
                        </button>

                        <!-- Stripe Payment Modal -->
                        <div class="modal fade" id="stripeModal" tabindex="-1" aria-labelledby="stripeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Enter Payment Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        
                                        <div class='form-row row'>
                                            <div class='col-xs-12 form-group required'>
                                                <label class='control-label'>Name on Card</label> <input
                                                    class='form-control' size='4' type='text'>
                                            </div>
                                        </div>
                    
                                        <div class='form-row row'>
                                            <div class='col-xs-12 form-group card required'>
                                                <label class='control-label'>Card Number</label> <input
                                                    autocomplete='off' class='form-control card-number' size='20'
                                                    type='text'>
                                            </div>
                                        </div>
                    
                                        <div class='form-row row'>
                                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                                    type='text'>
                                            </div>
                                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                <label class='control-label'>Expiration Month</label> <input
                                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                                    type='text'>
                                            </div>
                                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                <label class='control-label'>Expiration Year</label> <input
                                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                                    type='text'>
                                            </div>
                                        </div>
                    
                                        <div class='form-row row'>
                                            <div class='col-md-12 error form-group hide'>
                                                <div class='alert-success alert'>Please enter  correct detail.</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="col-xs-12">
                                                    <button class="btn btn-primary btn-lg btn-block" onclick="submitStripeForm()" type="submit">Pay Now ${{ $total }}</button>
                                                </div>
                                            </div>
                                        </div>
                                     
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

      <!-- Right Side - Order Summary -->
<div class="col-lg-4">
    <div class="summary shadow-sm p-4 rounded border">
        <h4 class="text-left font-weight-bold mb-4">Summary  <p class="text-right mb-4"><strong>{{ count($cartItems) }}</strong> items in your bag.</p></h4>
      
        
        <table class="table table-borderless">
            <tbody>
                @foreach($cartItems as $item)
                <tr>
                    <td class="text-center align-top" style="width: 60px;">
                        @php
                        $images = json_decode($item->product->productimage);
                        @endphp
                        @if(is_array($images) && !empty($images))
                            <img src="{{ asset($images[0]) }}" alt="Product Image" class="img-fluid rounded" style="max-width: 50px; max-height: 50px;">
                        @else
                            <img src="{{ asset('images/No-image-available.jpg') }}" alt="No Image" class="img-fluid rounded" style="max-width: 50px; max-height: 50px;">
                        @endif
                    </td>
                    <td class="h-100">
                        <p class="mb-4 font-weight-bold">{{ $item->product->name }}</p>
                        <span class="order-item"  >Color: {{ $item->color }}</span>
                        <span class="order-item"  >Size: {{ $item->size }}</span>
                        <br><br>
                        <span class="order-item"  >Qty: {{ $item->quantity }}</span>
                    </td>
                    <td class="text-right font-weight-bold align-top" style="width: 80px;">
                        ${{ number_format($item->product->price * $item->quantity, 2) }}
                    </td>
                </tr>
                @endforeach

                <!-- Cart Subtotal -->
                <tr>
                    <td colspan="2" class="text-right font-weight-bold">Cart Subtotal</td>
                    <td class="text-right">${{ number_format($total, 2) }}</td>
                </tr>

                {{-- <!-- Shipping -->
                <tr>
                    <td colspan="2" class="text-right font-weight-bold">Shipping & Handling</td>
                    <td class="text-right">$0.00</td>
                </tr>

                <!-- Discount -->
                <tr>
                    <td colspan="2" class="text-right font-weight-bold text-success ">Discount</td>
                    <td class="text-right text-success">- $4.50</td>
                </tr> --}}

                <!-- Cart Total -->
                <tr>
                    <td colspan="2" class="text-right font-weight-bold" style="font-size: 1.2rem;">Cart Total</td>
                    <td class="text-right font-weight-bold" style="font-size: 1.2rem;">${{ number_format($total,2 ) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

        
    </div>
        </div>
    </div>
    <footer>
        @include('components.footer')
    </footer>
    <script src="{{asset('bootstrap-5.0.2/js/bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    
    <script type="text/javascript">
    
    $(function() {

// Function to handle the Stripe form submission
var $form = $(".require-validation");

// Binding to form submission
$('form.require-validation').bind('submit', function(e) {
    var $form = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid = true;
    
    $errorMessage.addClass('hide');  // Hide error messages
    $('.has-error').removeClass('has-error');  // Remove previous error class

    // Loop through required fields to check if they are empty
    $inputs.each(function(i, el) {
        var $input = $(el);
        if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();  // Prevent form submission if there are errors
        }
    });

    // Stripe Token creation and form submission
    if (!$form.data('cc-on-file')) {
        e.preventDefault();  // Prevent default form submission

        // Set the Stripe publishable key
        Stripe.setPublishableKey($form.data('stripe-publishable-key'));

        // Create a token for the payment method
        Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
        }, stripeResponseHandler);
    }
});

// Function to handle the Stripe API response
function stripeResponseHandler(status, response) {
    var $form = $('.require-validation');

    // If Stripe returns an error, display the error message
    if (response.error) {
        $('.error')
            .removeClass('hide')
            .find('.alert')
            .text(response.error.message);
    } else {
        // If successful, create a hidden input with the Stripe token
        var token = response['id'];

        // Clear any previous input values and append the token
        $form.find('input[type=text]').empty();
        $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");

        // Set the hidden payment method input value
        document.getElementById('payment_method').value = 'stripe';

        // Submit the form to the server
        $form.get(0).submit();
    }
}

});

    </script>
<script src="{{asset('js/check.js')}}"></script>
       

</body>
</html>
