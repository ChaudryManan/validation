<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
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
            background: #667eea;
            color: white;
        }
        .btn-custom:hover {
            background: #5a67d8;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center">

<div class="card p-4 shadow-lg" style="width: 400px;">

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h3 class="text-center mb-4">Create Account</h3>

    <form method="POST" action="/signup">
        @csrf

        <!-- NAME -->
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name"
                class="form-control @error('name') is-invalid @enderror"
                placeholder="Enter your name"
                value="{{ old('name') }}">

            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- EMAIL -->
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email"
                class="form-control @error('email') is-invalid @enderror"
                placeholder="Enter your email"
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

        <!-- CONFIRM PASSWORD -->
        <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation"
                class="form-control"
                placeholder="Confirm password">
        </div>

        <button type="submit" class="btn btn-custom w-100">Sign Up</button>

        <p class="text-center mt-3">
            Already have an account? <a href="/login">Login</a>
        </p>
    </form>
</div>

</body>
</html>