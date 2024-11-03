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
            <div class="col-lg-8 mb-4">
                <div class="card p-4">
                    <div class="express-checkout mb-3 d-flex align-items-center">
                        <img src="{{ asset('images/secure-stripe-payment-logo.png') }}" alt="Stripe" class="product-logo">
                        <img src="{{ asset('images/paypal.png') }}" alt="PayPal" class="product-logo">
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
                                    <label for="state">State</label>
                                    <input type="text" name="state" class="form-control" id="state" placeholder="State" required>
                                </div>
                                <div class="col">
                                    <label for="zip">ZIP Code</label>
                                    <input type="text" name="zip" class="form-control" id="zip" placeholder="ZIP Code" required>
                                </div>
                            </div>
                           
                        </div>

                        <!-- Shipping Options -->
                        <h4 class="mb-3">Shipping Options</h4>
                        <div class="card p-3 mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="shipping_option" id="free_shipping" value="free-shipping" checked>
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
                        </div>

                        <!-- Payment Options -->
                        <h4 class="mt-4">Choose Payment Method</h4>
                        <input type="hidden" name="payment_method" id="payment_method">
                        <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#stripeModal">
                            Pay with Stripe
                        </button>
                        <button type="button" onclick="submitForm('paypal')" class="btn btn-info">Pay with PayPal</button>

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
                                                <div class='alert-danger alert'>Please correct the errors and try
                                                    again.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" onclick="submitForm('stripe')" class="btn btn-primary">Confirm Payment</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

           <!-- Right Side - Order Summary -->
        <div class="col-lg-4">
            <div class="summary shadow-sm p-4">
                <h5>Order Summary</h5>
                <table class="table table-borderless">
                    <tbody>
                        @foreach($cartItems as $item)
                            <tr>
                                <td>
                                    @php
                                    $images = json_decode($item->product->productimage);
                                    @endphp
                                    @if(is_array($images) && !empty($images))
                                        <img src="{{ asset($images[0]) }}" alt="Product Image" class="img-thumbnail product-logo">
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
    <footer>
        @include('components.footer')
    </footer>
    <script src="{{asset('bootstrap-5.0.2/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        const stripe = Stripe('STRIPE_KEY'); // Replace with your own key
        const elements = stripe.elements();
        const cardElement = elements.create('card');
        cardElement.mount('#card-element');
    
        const form = document.getElementById('payment-form');
        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            
            const { paymentMethod, error } = await stripe.createPaymentMethod({
                type: 'card',
                card: cardElement,
            });
    
            if (error) {
                // Show error to your customer
                console.error(error);
                alert(error.message);
            } else {
                // Send paymentMethod.id to your server
                const stripeToken = paymentMethod.id; // This is the token you need to send
                const formData = new FormData(form);
                formData.append('stripeToken', stripeToken); // Add the token to the form data
    
                // Submit the form with the token
                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                }).then(response => response.json()).then(data => {
                    // Handle the response
                    console.log(data);
                }).catch(error => {
                    console.error('Error:', error);
                });
            }
        });
        function submitForm(paymentMethod) {
            document.getElementById('payment_method').value = paymentMethod;
            document.getElementById('payment-form').submit();
        }

      
        </script>
        <script>
              document.addEventListener("DOMContentLoaded", function () {
        fetch('https://restcountries.com/v3.1/all')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(countries => {
                const countrySelect = document.getElementById('country');
                countries.forEach(country => {
                    const option = document.createElement('option');
                    option.value = country.cca2; // Using country code as value for better compatibility
                    option.textContent = country.name.common;
                    countrySelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching countries:', error));
    });
        </script>

</body>
</html>
