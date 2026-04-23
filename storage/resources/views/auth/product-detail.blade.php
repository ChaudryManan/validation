<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $product->name }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Main Product Box */
        .product-box {
            background: white;
            border-radius: 20px;
            padding: 30px;
            width: 900px; /* FIXED WIDTH */
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        /* Image Container */
        .product-img-box {
            height: 350px; /* FIXED HEIGHT */
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .product-img-box img {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain; /* IMPORTANT */
        }

        .btn-buy {
            background: #28a745;
            color: white;
        }

        .btn-buy:hover {
            background: #218838;
        }
    </style>
</head>

<body>

<div class="product-box">

    <div class="row">

        <!-- IMAGE -->
        <div class="col-md-6">
            <div class="product-img-box">
                <img src="{{ $product->image ? asset('products/'.$product->image) : 'https://via.placeholder.com/400x300' }}">
            </div>
        </div>

        <!-- DETAILS -->
        <div class="col-md-6 d-flex flex-column justify-content-center">

            <h2>{{ $product->name }}</h2>

            <h3 class="text-danger mt-3">${{ $product->price }}</h3>

            <p class="mt-3 text-muted">
                {{ $product->description }}
            </p>

            <div class="mt-4 d-grid gap-2">

                <a href="/add-to-cart/{{ $product->id }}" 
                   class="btn btn-primary btn-lg">
                    Add to Cart
                </a>

                <button class="btn btn-buy btn-lg">
                    Buy Now
                </button>

            </div>

        </div>

    </div>

</div>

</body>
</html>