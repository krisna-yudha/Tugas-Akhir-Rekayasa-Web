<!-- filepath: c:\xampp\htdocs\TugasAkhirWeb\laravel12-app\resources\views\mahasiswa\create.blade.php -->
@extends('layouts.app')

@section('content')
    <h2>Tambah Mahasiswa</h2>
    @if($errors->any())
        <div style="color: red;">
            @foreach($errors->all() as $err)
                <div>{{ $err }}</div>
            @endforeach
        </div>
    @endif
    <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf
        Nama: <input type="text" name="nama" value="{{ old('nama') }}"><br>
        NIM: <input type="text" name="nim" value="{{ old('nim') }}"><br>
        <button type="submit">Simpan</button>
    </form>
    <a href="{{ route('mahasiswa.index') }}">Kembali</a>
@endsection