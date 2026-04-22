<!DOCTYPE html>
<html lang="en">
<head>
    <title>MyShop Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fa;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        .navbar-brand, .nav-link {
            color: white !important;
            font-weight: 500;
        }

        .nav-link:hover {
            color: #ffd700 !important;
        }

        /* Hero Section */
        .hero {
            height: 80vh;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
                        url('https://images.unsplash.com/photo-1607083206968-13611e3d76db');
            background-size: cover;
            background-position: center;
            color: white;
            display: flex;
            align-items: center;
        }

        .hero h1 {
            font-size: 50px;
            font-weight: bold;
        }

        .hero p {
            font-size: 20px;
        }

        .btn-custom {
            background: #667eea;
            color: white;
            border-radius: 10px;
        }

        .btn-custom:hover {
            background: #5a67d8;
        }

        .btn-admin {
            background: #ff4d4d;
            color: white;
        }

        .btn-admin:hover {
            background: #e60000;
        }
        .card {
    border-radius: 15px;
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-8px);
}
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg px-4">
    <a class="navbar-brand" href="#">MyShop</a>

    <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        ☰
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-4">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Explore</a>
            </li>

             <li class="nav-item">
                <a href="/cart" class="btn btn-warning ms-2">🛒 Cart</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="{{ route('add.product') }}">Add Product</a>
            </li>

            <li class="nav-item">
                <a class="nav-link btn btn-admin text-white ms-2 px-3" href="/admin">Admin Dashboard</a>
            </li>
        </ul>

        <div class="ms-auto d-flex align-items-center gap-3">
            <span class="text-white">
                {{ Auth::user()->name }}
            </span>

            <form method="POST" action="/logout">
                @csrf
                <button class="btn btn-light btn-sm">Logout</button>
            </form>
        </div>
    </div>
</nav>

<!-- HERO SECTION -->
<section class="hero">
    <div class="container">
        <h1>Welcome to MyShop 🛍️</h1>
        <p>Discover amazing products at the best prices</p>

        <div class="mt-4">
            <a href="#" class="btn btn-custom btn-lg me-2">Shop Now</a>
            <a href="#" class="btn btn-outline-light btn-lg">Explore</a>
        </div>
    </div>
</section>

<!-- PRODUCTS SECTION -->
<div class="container mt-5">

    <h3 class="mb-4 text-center">🛒 Featured Products</h3>

    <div class="row">

        @forelse($products as $product)

        <div class="col-md-3 mb-4">
            <div class="card product-card border-0 position-relative shadow-sm">

                <!-- Badge -->
                <span class="badge bg-danger position-absolute m-2">NEW</span>

                <!-- Image -->
               <div class="product-img">
    <a href="/product/{{ $product->id }}">
        <img 
            src="{{ $product->image ? asset('products/'.$product->image) : 'https://via.placeholder.com/300x200' }}" 
            class="card-img-top"
            style="height:200px; object-fit:cover;">
    </a>
</div>
                <!-- Body -->
                <div class="card-body text-center">

                    <h6 class="product-title fw-bold">
                        {{ $product->name }}
                    </h6>

                    <!-- Price -->
                    <p class="mb-2">
                        <span class="text-danger fw-bold fs-5">
                            ${{ $product->price }}
                        </span>
                    </p>

                    <!-- Rating -->
                    <div class="mb-2 text-warning">
                        ★★★★☆
                    </div>

                    <!-- Buttons -->
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary btn-sm">Add to Cart</button>
                        <a href="/product/{{ $product->id }}" class="btn btn-outline-dark btn-sm w-100">
    View Details
</a>
                    </div>

                </div>
            </div>
        </div>

        @empty
            <p class="text-center">No products found</p>
        @endforelse

    </div>
</div>

    </div>
</div>

</body>
</html>