<!-- filepath: c:\xampp\htdocs\TugasAkhirWeb\laravel12-app\resources\views\mahasiswa\create.blade.php -->
@extends('layouts.app')

@section('header')
    <h2 class="fw-bold text-primary mb-2">Tambah Mahasiswa</h2>
    <p class="text-secondary mb-0">Isi formulir untuk menambahkan data mahasiswa baru</p>
@endsection

@section('content')
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body p-4">
            @if($errors->any())
                <div class="alert alert-danger mb-4">
                    <strong><i class="fas fa-exclamation-triangle me-2"></i>Terjadi kesalahan:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('mahasiswa.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label fw-medium text-primary">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                        id="nama" name="nama" value="{{ old('nama') }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="nim" class="form-label fw-medium text-primary">NIM</label>
                    <input type="text" class="form-control @error('nim') is-invalid @enderror" 
                        id="nim" name="nim" value="{{ old('nim') }}" required>
                    @error('nim')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan
                    </button>
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-light">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection