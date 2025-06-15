<!-- filepath: c:\xampp\htdocs\TugasAkhirWeb\laravel12-app\resources\views\mahasiswa\index.blade.php -->
@extends('layouts.app')

@section('header')
    <h2 class="fw-bold text-primary mb-2">Data Mahasiswa</h2>
    <p class="text-secondary mb-0">Kelola data mahasiswa di sistem</p>
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fs-5 fw-semibold text-secondary">Daftar Mahasiswa</h3>
        <a href="?showForm=1" class="btn btn-primary d-flex align-items-center gap-2">
            <i class="fas fa-plus-circle"></i>
            Tambah Mahasiswa
        </a>
    </div>

    @if(request('showForm'))
    <div class="mb-4 bg-light p-4 rounded-3 shadow-sm border border-primary">
        <form action="{{ route('mahasiswa.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-medium text-primary">Nama</label>
                <input type="text" name="nama" value="{{ old('nama') }}" class="form-control" required>
                @error('nama') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-medium text-primary">NIM</label>
                <input type="text" name="nim" value="{{ old('nim') }}" class="form-control" required>
                @error('nim') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-light">Batal</a>
            </div>
        </form>
    </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover table-striped bg-white rounded shadow-sm">
            <thead class="table-light">
                <tr>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mahasiswa as $mhs)
                <tr>
                    <td>{{ $mhs->nama }}</td>
                    <td>{{ $mhs->nim }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-warning btn-sm text-white d-flex align-items-center">
                                <i class="fas fa-edit me-1"></i>
                                Edit
                            </a>
                            <a href="{{ route('mahasiswa.delete', $mhs->id) }}" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm d-flex align-items-center">
                                <i class="fas fa-trash-alt me-1"></i>
                                Hapus
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center py-3 text-secondary">Belum ada data mahasiswa.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection