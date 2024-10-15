@extends('welcome')
@section('title')
    Checkout
@endsection

@section('main-content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<style>
    .product-logo {
        width: 100%;
        height: 100px;
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
      
    }
    .img-thumbnail {
        border: 1px solid #ddd;
        padding: 4px;
        background-color: #fff;
    }

    /* Improved Styling */
    .card {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    h1, h4 {
        font-weight: 600;
    }

    /* Order Summary Section */
    .summary {
        border: 1px solid #f1f1f1;
        border-radius: 10px;
        padding: 20px;
        background: #fafafa;
    }

    .summary h5 {
        font-size: 18px;
        font-weight: bold;
    }

    .table td, .table th {
        vertical-align: middle;
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .form-row .col {
            margin-bottom: 15px;
        }
    }
</style>


<div class="container mt-2">
    <h3 class="text-left mb-4">Checkout</h3>
    <!-- Success/ Error Messages -->
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
        <div class="col-lg-8">
            <div class="card p-4">
                <div class="express-checkout mb-3">
                    <img src="{{ asset('images/secure-stripe-payment-logo.png') }}" alt="Stripe" class=" product-logo ">
                 
                </div>
                <hr />

                <!-- Checkout Form -->
            
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
    $(function() {
        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');
            $('.has-error').removeClass('has-error');

            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));

                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }
        });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                var token = response['id'];
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }
    });
</script>

@endsection
