@extends('welcome')
@section('title')
Terms & Conditions |
@endsection

@section('main-content')
<div class="container mt-5" style="font-family: 'Poppins', sans-serif;">
    <!-- Website Ownership -->
    <div class="mb-4">
        <h3 class=""><i class="fas fa-store text-primary    "></i> Website Ownership</h3>
        <p>This website is the property of <strong>premium leather style</strong>. For inquiries about our products, services, website, or terms and conditions, please contact us at:</p>
        <p><i class="fas fa-envelope text-warning"></i> <a href="mailto: info@premiumleatherstyle.com" class="text-decoration-none text-dark "> info@premiumleatherstyle.com</a></p>
    </div>

    <!-- Terms and Conditions -->
    <div class="mb-4">
        <h3 class="text-dark"><i class="fas fa-file-contract text-success "></i> Terms and Conditions of the Website</h3>
        <p>By using this website (the "Website"), you confirm that you agree to these terms in their entirety. If you do not agree, you must not use the Website.</p>
        <p>Other legal notices and our Privacy Policy (along with General Terms and Conditions of Sale, and Returns Policy) govern your use of this Website.</p>
    </div>

    <!-- Ownership Rights -->
    <div class="mb-4">
        <h4 class=""><i class="fas fa-shield-alt text-info"></i> Ownership Rights</h4>
        <p>Views expressed in user-generated content do not represent the opinions or values of premium leather style</p>
    </div>

    <!-- Links to Other Websites -->
    <div class="mb-4">
        <h4 class=""><i class="fas fa-link text-danger"></i> Links to Other Websites</h4>
        <p>We may provide links to external websites. We do not control their content and are not liable for any issues arising from their use.</p>
    </div>

    <!-- Terms Changes -->
    <div class="mb-4">
        <h4 class=""><i class="fas fa-sync-alt text-secondary"></i> Terms Changes</h4>
        <p>We reserve the right to update these terms. Continued use of this Website signifies your acceptance of these changes.</p>
    </div>

    <!-- Shipping Terms -->
    <div class="mb-4">
        <h4 class=""><i class="fas fa-truck text-primary"></i> General Terms of Shipping</h4>
        <ul class="list-unstyled ms-3">
            <li><i class="fas fa-check-circle text-success"></i> Delivery Time: <strong>12 to 15 Business Days</strong></li>
            <li><i class="fas fa-check-circle text-success"></i> Please provide a complete address with proper Zip Code and Contact Number.</li>
            <li><i class="fas fa-check-circle text-success"></i> Buyer is responsible for customs clearance if paperwork is required.</li>
            <li><i class="fas fa-check-circle text-success"></i> Custom charges, if applicable, must be paid by the buyer in their respective country.</li>
        </ul>
    </div>

    <!-- General Terms and Conditions of Sale -->
    <div class="mb-4">
        <h4 class=""><i class="fas fa-tags text-success"></i> General Terms and Conditions of Sale</h4>
        <p>These terms apply to all orders placed through the Website. By placing an order, you agree to these terms. If you do not agree, do not place an order.</p>
        <p>Products and services are subject to availability. We will notify you if an item is unavailable and may offer alternatives of equal or higher value.</p>
    </div>
</div>

@endsection
