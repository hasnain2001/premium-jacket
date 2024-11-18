@extends('welcome')
@section('title')
FAQ'S
@endsection
@section('main-content')
<style>
.faq-btn {
    background-color: #690500; /* Dark red background */
    color: #f1c876; /* White text color */
    font-size: 16px; /* Set a readable font size */
    font-weight: bold; /* Make the text bold */
    padding: 12px 20px; /* Add more padding for better button size */
    border-radius: 6px; /* Rounded corners */
    border: none; /* Remove default button border */
    width: 100%; /* Make button span full width */
    text-align: left; /* Align text to the left */
    display: flex; /* Enable flexbox for icon and text */
    align-items: center; /* Vertically center icon and text */
    justify-content: flex-start; /* Align content to the left */
    transition: background-color 0.3s ease, transform 0.3s ease; /* Smooth transition effects */
}

.faq-btn i {
    margin-right: 10px; /* Add space between icon and text */
}

.faq-btn:hover {
    background-color:#853531; /* Lighter shade on hover */

}

.faq-btn:focus {
    outline: none; /* Remove focus outline */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add subtle shadow effect on focus */
}

</style>

<div class="container mt-5">
    <h2 class="text-center mb-4" style="font-family: 'Roboto', sans-serif; color: #333;">Frequently Asked Questions</h2>

    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="accordion" id="faqAccordion">

                <!-- FAQ 1 -->
                <div class="accordion-item mb-3 rounded shadow">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="faq-btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="bi bi-question-circle me-2"></i><strong>Why does the color of the jacket vary?</strong>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            The color of the jacket may vary due to screen resolution. Please keep in mind that the appearance of colors on your device's screen may differ slightly from the actual product color. We strive to provide accurate product images, but variations in screen settings and lighting conditions can affect the perception of color.
                        </div>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="accordion-item mb-3 rounded shadow">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class=" faq-btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="bi bi-question-circle me-2"></i><strong>What is the leather made of?</strong>
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Our jackets are made of genuine animal skin leather. Each animal has a unique skin texture and shade, which contributes to the individuality and character of the jacket. We source high-quality leather to ensure durability and a luxurious feel.
                        </div>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="accordion-item mb-3 rounded shadow">
                    <h2 class="accordion-header" id="headingThree">
                        <button class=" faq-btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <i class="bi bi-question-circle me-2"></i><strong>Can I choose the shade of the leather?</strong>
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            As the leather is made from genuine animal skin, the shade of the leather can be customized or selected. The natural variation in shades adds to the authenticity and uniqueness of each jacket. Rest assured, we carefully select and craft our jackets to maintain the highest standards of quality and style.
                        </div>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="accordion-item mb-3 rounded shadow">
                    <h2 class="accordion-header" id="headingFour">
                        <button class=" faq-btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            <i class="bi bi-question-circle me-2"></i><strong>Will the jacket I receive look exactly like the product image?</strong>
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            While we strive to provide accurate product images, please note that there may be slight variations in the appearance of the jacket you receive. Factors such as the natural variation in leather shades and the handcrafted nature of our products contribute to these differences. However, we assure you that the overall design, quality, and style of the jacket will match the product description.
                        </div>
                    </div>
                </div>

                <!-- FAQ 5 -->
                <div class="accordion-item mb-3 rounded shadow">
                    <h2 class="accordion-header" id="headingFive">
                        <button class=" faq-btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            <i class="bi bi-question-circle me-2"></i><strong>Can I return or exchange the jacket if I'm not satisfied with the color?</strong>
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            We understand that color perception can vary, and we strive to provide accurate product descriptions and images. However, if you are not satisfied with the color of the jacket you receive, our refund/exchange policy may apply. Please refer to our Refund Policy for more information on the requirements and process for returning or exchanging a product.
                        </div>
                    </div>
                </div>

                <!-- FAQ 6 -->
                <div class="accordion-item mb-3 rounded shadow">
                    <h2 class="accordion-header" id="headingSix">
                        <button class=" faq-btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            <i class="bi bi-question-circle me-2"></i><strong>How can I contact customer service for further assistance?</strong>
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            If you have any further questions or need assistance, please don't hesitate to reach out to our customer service team at shearlingstore@gmail.com. We value our customers and are here to help you with any concerns or inquiries you may have.
                        </div>
                    </div>
                </div>

                <!-- FAQ 7 -->
                <div class="accordion-item mb-3 rounded shadow">
                    <h2 class="accordion-header" id="headingSeven">
                        <button class=" faq-btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            <i class="bi bi-question-circle me-2"></i><strong>Can I cancel my order if I'm not satisfied with the color?</strong>
                        </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Yes, you can cancel your order within 10 days after delivery for a full refund. Please refer to our Refund Policy for more details on our cancellation policy and any applicable fees.
                        </div>
                    </div>
                </div>

                <!-- FAQ 8 -->
                <div class="accordion-item mb-3 rounded shadow">
                    <h2 class="accordion-header" id="headingEight">
                        <button class=" faq-btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                            <i class="bi bi-question-circle me-2"></i><strong>Are there any additional charges for shipping?</strong>
                        </button>
                    </h2>
                    <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            No, we offer free worldwide shipping for all our products. There are no additional shipping charges, allowing you to enjoy a hassle-free shopping experience. Please refer to our Shipping Policy for more information on our shipping process and delivery times.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
