@extends('welcome')

@section('title')
Delivery Information
@endsection
 <style>
.delivery{
    font-family: Arial, Helvetica, sans-serif ;
}
 .custom-header {
    background-color: #f9f9f9;
    padding: 20px;
}

.custom-title {
    font-family: 'Poppins', sans-serif;
    font-size: 2.5rem;
    color: #690500;
}

.custom-body {
    font-family: 'Open Sans', sans-serif;
    font-size: 1rem;
    color: #333;
    line-height: 1.8;
}

.custom-paragraph {
    margin-bottom: 1.5rem;
    font-size: 1rem;
}

.custom-section-title {
    color: #690500;
    font-weight: bold;
    font-size: 1.25rem;
    margin-top: 1.5rem;
    display: flex;
    align-items: center;
}

.custom-section-title::before {
    content: '★ ';
    margin-right: 5px;
    font-size: 1.5rem;
    color: #690500;
}
</style>
@section('main-content')
<div class="container  delivery">
    <div class="card shadow-sm">
        <div class="card-header bg-light custom-header">
            <h1 class="text-center custom-title">Delivery Information</h1>
        </div>
        <div class="card-body custom-body">
            <p class="custom-paragraph">
                Thank you for choosing <strong>premiumleathertyle.com</strong> for your purchase. We are committed to ensuring a seamless and satisfactory delivery experience for our customers. Please take a moment to review our delivery policy.
            </p>
            <hr>
            <h6 class="custom-section-title">📦 Handling Time</h6>
            <p>Our standard handling time is <strong>7-8 business days</strong>. However, during peak seasons such as Christmas or for specific products, the handling time may extend to <strong>10-12 business days</strong>. We appreciate your understanding and patience during these periods.</p>
            
            <h6 class="custom-section-title">🚚 Shipping Carrier</h6>
            <p>We use <strong>DHL services</strong> for our shipments to ensure reliable and timely delivery of your products. DHL is a trusted global courier service known for its efficiency and commitment to customer satisfaction.</p>
            
            <h6 class="custom-section-title">📄 Shipping Details</h6>
            <p>To facilitate a smooth delivery process, we require customers to provide accurate and complete shipping details at the time of purchase. This includes the recipient's full name, shipping address, and contact number. Any errors or incomplete information may result in delays, and <strong>premiumleathertyle.com</strong> will not be held responsible for such delays.</p>
            
            <h6 class="custom-section-title">🌍 Customs Duty</h6>
            <p>Please note that customs duty, if applicable, will be the responsibility of the customer. The customs policies vary by country, and customers are advised to check with their local customs office for information on any potential duties or taxes that may apply to their order.</p>
            
            <h6 class="custom-section-title">🔍 Tracking Information</h6>
            <p>Once your order has been shipped, you will receive a shipping confirmation email containing the tracking information for your package. This allows you to monitor the progress of your delivery and estimate the expected delivery date.</p>
            
            <h6 class="custom-section-title">🕒 Delivery Time</h6>
            <p>The delivery time may vary based on your location and customs clearance processes. While we strive to provide accurate estimated delivery times, unforeseen circumstances such as weather conditions or customs delays may impact the actual delivery date.</p>
            
            <h6 class="custom-section-title">🎉 Shipping Costs</h6>
            <p>
                <strong>Great news!</strong> We are pleased to offer <strong>free delivery worldwide</strong> for all our products. There are no additional shipping costs, and this is our way of expressing gratitude for choosing <strong>premiumleathertyle.com</strong>. Enjoy the convenience of having your order delivered to your doorstep without any extra charges.
            </p>
            <hr>
            <p class="text-center mt-4 custom-paragraph">
                We appreciate your trust in <strong>premiumleathertyle.com</strong>, and we are dedicated to making your shopping experience enjoyable. If you have any further questions or concerns about our delivery policy, please do not hesitate to contact our customer service team at 

               <strong> <a href="mailto: info@premiumleatherstyle.com" class=" text-decoration-none text-dark "> info@premiumleatherstyle.com</a>.</strong>
            </p>
            <p class="text-center"><strong>Thank you for choosing premiumleathertyle.com!</strong></p>
        </div>
    </div>
</div>
@endsection
