<?php
header("X-Robots-Tag:index, follow");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us | Premium Leather Jackets for Men & Women | Premium Leather Style</title>

    <meta name="description" content="Discover the story behind Premium Leather Style. Our commitment to crafting high-quality leather jackets for men and women. Shop our collection of stylish and durable outerwear, designed to elevate your fashion.">
    <meta name="keywords" content="About Premium Leather Style, leather jackets, premium leather jackets, men's leather jackets, women's leather jackets, stylish outerwear, durable leatherwear, fashion jackets, quality leather clothing">
    <meta name="author" content="Premium Leather Style">

<meta name="robots" content="index, follow">
<link rel="canonical" href="https://www.premiumleatherstyle.com/about">

<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #fff;
        }
        .hero {
            background: url({{ asset('images/about.jpg') }}) no-repeat center center;
            background-size: cover;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }
        .hero h1 {
            font-size: 3em;
            margin: 0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        .section-title {
            font-size: 2em;
            margin-bottom: 20px;
            text-align: center;
        }
        .text-content {
            margin-bottom: 40px;
            line-height: 1.6;
        }
        .text-content p {
            margin-bottom: 20px;
        }
        .two-column {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 40px;
        }
        .two-column img {
            width: 48%;
            border-radius: 5px;
        }
        .two-column .text {
            width: 48%;
        }
        @media (max-width: 768px) {
            .two-column {
                flex-direction: column;
            }
            .two-column img,
            .two-column .text {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <nav>
        @include("components.navbar")
    </nav>

    <div class="hero">
        <h1>About Us</h1>
    </div>

    <div class="container">
        <div class="section-title">About Us</div>
        <div class="text-content">
            <p>Any wardrobe is simply incomplete without a great leather jacket. A search for a good leather jacket is exactly where The Hide Leather Style started, when some friends and I were in the market, looking for leather jackets ourselves.</p>
            <p>After much digging and research, it turned out that the explanation for higher prices of leather outerwear was a long supply chain of distributors, wholesalers, retailers coupled with costly marketing campaigns. This meant only a minute fraction of the price consumers paid went into the product itself.</p>
          <p>We could identify that the problem was solvable and consumers like us deserve better, so we started The Hide Leather Style.</p>
          <p>The challenge we took on ourselves was simple, make it easy for people to buy high quality leather jacket at accessible pricing.</p>
          <p>By cutting out the unnecessary expenses, designing and manufacturing in-house, selling directly to consumers and utilizing just-in-time production we are able to provide higher quality leather jackets at a fraction of market price.</p>
          <p>We know that electrifying feeling of wearing a leather jacket and believe everyone has the right to have that feeling.
        </p>
        <p>In our collection, we offer leather vests for men and women in a range of colors, including distressed leather vests, vintage leather vests, slim-fit leather vests, plus-size leather vests, embroidered leather vests, sleeveless leather vests, suede leather vests. Each vest is crafted from the finest leather materials and is tailored for maximum comfort and style.</p>
        We also deal in real sheepskin shearling jackets, shearling coats, and aviator jackets which will keep you warm and fashionable during the winter months. Shearling bomber jackets, cropped fur leather jackets, vintage fur vests, real fur-lined jackets, and many more can be found in our collection.
        </div>

        <div class="two-column">
            <div class="text">
                <h2>Finest Raw Materials</h2>
                <p>It all starts with the raw materials and since we carry our life in our jackets, we don’t use anything but only the best possible materials. All our jackets are made with full grain natural leather, YKK zippers, and polyester lining.</p>
            </div>
            <img src="{{ asset('images/about1.png') }}" alt="Finest Raw Materials">
        </div>

        <div class="two-column">
            <img src="{{ asset('images/about2.png') }}" alt="Exquisite Craftsmanship">
            <div class="text">
                <h2>Exquisite Craftsmanship</h2>
                <p>Our products are handmade, one at a time by one craftsman with precision and attention to detail, unlike the mass chain production. Not opting for chain production means higher cost but a better quality that you will notice in our stitching.</p>
            </div>
        </div>

        <div class="two-column">
            <div class="text">
                <h2>Fair Pricing - Direct to You</h2>
                <p>With our direct-to-consumer approach, our products come at a fraction of the price of what luxury brands would sell them for. We keep our prices lower by cutting out middlemen, storefront costs and inefficient marketing spent. Additionally, with just-in-time production.</p>
            </div>
            <img src="{{ asset('images/about3.png') }}" alt="Fair Pricing - Direct to You">
        </div>

        <div class="two-column">
            <img src="{{ asset('images/about4.png') }}" alt="Sizes that Fit All">
            <div class="text">
                <h2>Sizes that Fit All</h2>
                <p>Inclusivity is a buzzword but we take it quite seriously. We truly know there is something electrifying about wearing a great leather jacket, we ensure no one misses out on this. All our jackets are offered in eight standard sizes from XS to 4XL.</p>
            </div>
        </div>

        <div class="two-column">
            <div class="text">
                <h2>Discovery & Expression</h2>
                <p>As no two persons are alike, we believe in diversity and expression. Our customers can make 100% custom, bespoke jackets from scratch with the help of our design consultants. Thus, fostering diversity and enabling our customers to fully express themselves and be apart from the rest.</p>
            </div>
            <img src="{{ asset('images/about5.png') }}" alt="Discovery & Expression">
        </div>
    </div>
<footer>
    @include('components.footer')
</footer>
</body>
</html>
