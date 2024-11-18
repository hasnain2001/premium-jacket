<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
    <style>
        .product-image {
            width: 100px; /* Adjust the size as needed */
            height: auto;
        }
    </style>
</head>
<body>
    <h1>Thank you for your order, {{ $order->first_name }}!</h1>
    <p>Your order number is: {{ $order->order_number }}</p>

    <h3>Order Details:</h3>
    <ul>
        @foreach ($items as $item)
            @php
                $product = \App\Models\Product::find($item['product_id']);
                $images = json_decode($product->productimage);
            @endphp
            <li>
                <strong>Product ID:</strong> {{ $item['product_id'] }} <br>
                <strong>Product Name:</strong> {{ $product->name }} <br>
                <strong>Quantity:</strong> {{ $item['quantity'] }} <br>
                <strong>Price:</strong> ${{ $item['price'] }} <br>
                
             
                
                <!-- Display color and size if available -->
                @if (!empty($item['color']))
                    <strong>Color:</strong> {{ $item['color'] }} <br>
                @endif
                
                @if (!empty($item['size']))
                    <strong>Size:</strong> {{ $item['size'] }} <br>
                @endif
            </li>
        @endforeach
    </ul>

    <p><strong>Total Amount:</strong> ${{ $order->total_amount }}</p>
</body>
</html>
