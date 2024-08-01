<div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    @if ( session('error'))
<div class="alert aler-danger">
{{ session('error') }}
</div>
    @endif

    <div class="container">
        <h2>Your Cart</h2>
        @if ($cartItems->isEmpty())
            <p>Your cart is empty.</p>
        @else
            <ul class="list-group">
                @foreach ($cartItems as $item)
                    <li class="list-group-item">
                        {{ $item->product->name }} - Quantity: {{ $item->quantity }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
