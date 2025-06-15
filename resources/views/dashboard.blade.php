@extends('layouts.app')

@push('styles')
<!-- Bootstrap 5 CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<style>
    body {
        background-color: #f8f9fa;
        background-image: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    }
    .welcome-banner {
        background: linear-gradient(135deg, #4158D0 0%, #C850C0 50%, #FFCC70 100%);
        border-radius: 1rem;
        padding: 1.5rem;
        margin-bottom: 2rem;
        color: white;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .crud-card {
        transition: all 0.3s ease;
        border-radius: 1rem;
        overflow: hidden;
        border: none;
        min-height: 180px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    .crud-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }
    .card-body {
        padding: 1.5rem;
    }
    .card-icon {
        height: 45px;
        width: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        margin-bottom: 1rem;
    }
    .mahasiswa-icon {
        background-color: rgba(13, 110, 253, 0.1);
        color: #0d6efd;
    }
    .dosen-icon {
        background-color: rgba(25, 135, 84, 0.1);
        color: #198754;
    }
    .makul-icon {
        background-color: rgba(255, 193, 7, 0.1);
        color: #ffc107;
    }
    .crud-title {
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }
    .stats-box {
        background: white;
        border-radius: 0.5rem;
        padding: 0.75rem;
        text-align: center;
        box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        margin-top: 1.5rem;
    }
    .stats-number {
        font-size: 1.5rem;
        font-weight: 700;
    }
    .stats-label {
        font-size: 0.85rem;
        color: #6c757d;
    }
    footer {
        margin-top: 3rem;
        padding-top: 1rem;
        border-top: 1px solid #dee2e6;
        color: #6c757d;
        font-size: 0.875rem;
    }
</style>
@endpush

@section('header')
<div class="welcome-banner">
    <h2 class="fw-bold mb-1">Selamat datang, {{ Auth::user()->name }}!</h2>
    <p class="mb-0">Sistem Informasi Akademik - Dashboard Administrator</p>
</div>
@endsection

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="fs-5 fw-semibold text-secondary">Menu Utama</h3>
            <span class="badge bg-primary">{{ date('d M Y') }}</span>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-12 col-md-4">
        <div class="crud-card card h-100">
            <div class="card-body">
                <div class="card-icon mahasiswa-icon">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <h4 class="crud-title text-primary">CRUD Mahasiswa</h4>
                <p class="text-secondary mb-3">Kelola data mahasiswa, tambah, edit, dan hapus informasi mahasiswa.</p>
                <a href="/mahasiswa" class="btn btn-primary">
                    Akses Mahasiswa <i class="fas fa-arrow-right ms-1"></i>
                </a>
                
                <div class="stats-box">
                    <div class="stats-number text-primary"></div>
                    <div class="stats-label">Total Mahasiswa</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-12 col-md-4">
        <div class="crud-card card h-100">
            <div class="card-body">
                <div class="card-icon dosen-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <h4 class="crud-title text-success">CRUD Dosen</h4>
                <p class="text-secondary mb-3">Kelola data dosen, tambah, edit, dan hapus informasi dosen.</p>
                <a href="/dosen" class="btn btn-success">
                    Akses Dosen <i class="fas fa-arrow-right ms-1"></i>
                </a>
                
                <div class="stats-box">
                    <div class="stats-number text-success"></div>
                    <div class="stats-label">Total Dosen</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-12 col-md-4">
        <div class="crud-card card h-100">
            <div class="card-body">
                <div class="card-icon makul-icon">
                    <i class="fas fa-book"></i>
                </div>
                <h4 class="crud-title text-warning">CRUD Mata Kuliah</h4>
                <p class="text-secondary mb-3">Kelola data mata kuliah, tambah, edit, dan hapus informasi mata kuliah.</p>
                <a href="/makul" class="btn btn-warning text-white">
                    Akses Mata Kuliah <i class="fas fa-arrow-right ms-1"></i>
                </a>
                
                <div class="stats-box">
                    <div class="stats-number text-warning"></div>
                    <div class="stats-label">Total Mata Kuliah</div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="text-center mt-5">
    <p>&copy; {{ date('Y') }} Sistem Informasi Akademik. All rights reserved.</p>
</footer>
@endsection
