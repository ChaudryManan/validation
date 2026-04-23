<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fa;
        }
        .cart-box {
            background: white;
            padding: 30px;
            border-radius: 15px;
        }
        .product-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
        }
    </style>
</head>

<body>

<div class="container mt-5">

    <h2 class="mb-4">🛒 Your Cart</h2>

    <div class="cart-box">

        @if(count($cart) > 0)

            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                </thead>

                <tbody>

                @php $grandTotal = 0; @endphp

                @foreach($cart as $id => $item)

                    @php
                        $total = $item['price'] * $item['quantity'];
                        $grandTotal += $total;
                    @endphp

                    <tr>
                        <td>
                            <img src="{{ asset('products/'.$item['image']) }}" class="product-img">
                        </td>

                        <td>{{ $item['name'] }}</td>
                        <td>${{ $item['price'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>${{ $total }}</td>
                    </tr>

                @endforeach

                </tbody>
            </table>

            <h4 class="text-end">Total: ${{ $grandTotal }}</h4>

        @else
            <p>Your cart is empty 😢</p>
        @endif

    </div>

</div>

</body>
</html>