@extends('welcome')
@section('title')
Refund/Exchange Policy
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
<div class="refund">
<div class="container py-4 ">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-10 col-12">

            <!-- Card for main title and description -->
            <div class="card shadow-lg mb-4">
                <div class="card-body">
                    <h2 class="text-center mb-4"><i class="bi bi-arrow-repeat"></i> Refund/Exchange Policy</h2>
                    <p class="lead text-center mb-4">Shearling Leather strives to ensure customer satisfaction, and we understand that situations may arise where returns or exchanges become necessary. Please review the following requirements for the acceptance of returned goods:</p>
                </div>
            </div>

            <!-- Return Conditions Section -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h4 class="card-title "><i class="bi bi-calendar-check "></i> Return Conditions</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="bi bi-check-circle"></i> Goods must be returned within 10 days from the date of delivery.</li>
                        <li class="list-group-item"><i class="bi bi-check-circle"></i> Buyers are responsible for ensuring that returned goods are in resalable condition. The items must be unused, with all original packaging intact, including the attached price tag and the original invoice.</li>
                        <li class="list-group-item"><i class="bi bi-check-circle"></i> The product must be returned in its designated box and not the shipping box.</li>
                        <li class="list-group-item"><i class="bi bi-check-circle"></i> Currently, we do not provide return labels/return shipping services, and shipping charges will be borne by the customer.</li>
                    </ul>
                </div>
            </div>

            <!-- Refund/Exchange Process Section -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h4 class="card-title "><i class="bi bi-cash-coin "></i> Refund/Exchange Process</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="bi bi-check-circle"></i> Refunds/exchanges are processed within 10 days after receiving the returned goods.</li>
                        <li class="list-group-item"><i class="bi bi-check-circle"></i> The refund will be issued in the original form of payment or as a replacement product.</li>
                        <li class="list-group-item"><i class="bi bi-check-circle"></i> Quick strike (QS), limited edition, and brand collaboration products are non-returnable and non-exchangeable.</li>
                        <li class="list-group-item"><i class="bi bi-check-circle"></i> Exclusions to this policy are solely at the discretion of Shearling Leather.</li>
                    </ul>
                </div>
            </div>

            <!-- Non-Acceptance of Returns Section -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h4 class="card-title "><i class="bi bi-box "></i> Non-Acceptance of Returns</h4>
                    <p><i class="bi bi-x-circle"></i> Items purchased in quantities of three or more of the same product will not be accepted for refund and will not be considered.</p>
                </div>
            </div>

            <!-- Cancellation Policy Section -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h3 class="text-left mb-4 r"><i class="bi bi-x-circle "></i> Cancellation Policy</h3>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="bi bi-check-circle"></i> Orders can be canceled within 24 hours of purchase for a full refund.</li>
                        <li class="list-group-item"><i class="bi bi-check-circle"></i> Cancellations after this period may be subject to a cancellation fee.</li>
                        <li class="list-group-item"><i class="bi bi-check-circle"></i> Order will not be canceled if already shipped.</li>
                    </ul>
                </div>
            </div>

            <!-- Contact Info Section -->
            <div class="text-center mt-4">
                <p class="lead">We value our customers and aim to make the return/exchange process as straightforward as possible. For further assistance, please contact our customer service:</p>
                <strong><i class="bi bi-envelope-at-fill"></i> <a href="mailto:info@premiumleatherstyle.com" class="text-decoration-none text-dark">Email: info@premiumleatherstyle.com</a>
                </strong>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
