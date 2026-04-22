<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #11998e, #38ef7d);
            height: 100vh;
        }
        .card {
            border-radius: 15px;
        }
        .form-control {
            border-radius: 10px;
        }
        .btn-custom {
            border-radius: 10px;
            background: #11998e;
            color: white;
        }
        .btn-custom:hover {
            background: #0f7f73;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center">

<div class="card p-4 shadow-lg" style="width: 400px;">

    <h3 class="text-center mb-4">Login</h3>

    {{-- LOGIN ERROR (wrong credentials) --}}
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf

        <!-- EMAIL -->
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email"
                class="form-control @error('email') is-invalid @enderror"
                placeholder="Enter email"
                value="{{ old('email') }}">

            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- PASSWORD -->
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password"
                class="form-control @error('password') is-invalid @enderror"
                placeholder="Enter password">

            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-custom w-100">Login</button>
//hello
        <p class="text-center mt-3">
            Don't have an account? <a href="/signup">Register</a>
        </p>
    </form>
</div>

</body>
</html>