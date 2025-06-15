{{-- filepath: resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }
        .simple-nav {
            box-shadow: 0 4px 12px 0 rgba(0,0,0,0.05);
        }
        .simple-card {
            transition: box-shadow 0.3s, transform 0.3s;
            border-radius: 0.75rem;
        }
        .simple-card:hover {
            box-shadow: 0 10px 25px 0 rgba(59,130,246,0.15);
            transform: translateY(-5px);
        }
        .logout-btn {
            transition: all 0.2s;
        }
        .logout-btn:hover {
            background: #dc3545 !important;
        }
        .dash-header {
            border-bottom: 1px solid #e9ecef;
            padding-bottom: 1rem;
            margin-bottom: 1.5rem;
        }
    </style>
    
    <!-- This enables @push('styles') to work in child views -->
    @stack('styles')
</head>
<body class="min-h-screen">
    <nav class="bg-white simple-nav mb-8">
        <div class="container d-flex justify-content-between align-items-center py-3">
            <a href="{{ route('dashboard') }}" class="text-decoration-none">
                <span class="fw-bold fs-4 text-primary">Dashboard</span>
            </a>
            <div class="d-flex align-items-center gap-3">
                <span class="text-secondary">Hi, {{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm logout-btn">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    
    <main class="container">
        <div class="bg-white rounded-4 shadow-sm simple-card p-4 p-md-5">
            <div class="dash-header">
                @yield('header')
            </div>
            @yield('content')
        </div>
    </main>
    
    <footer class="container text-center text-muted mt-5 mb-4 small">
        &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }} &middot; All rights reserved.
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
