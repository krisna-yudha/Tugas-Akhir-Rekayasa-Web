<!-- filepath: c:\xampp\htdocs\TugasAkhirWeb\laravel12-app\resources\views\mahasiswa\create.blade.php -->
@extends('layouts.app')

@section('content')
    <h2>Tambah Mata Kuliah</h2>
    @if($errors->any())
        <div style="color: red;">
            @foreach($errors->all() as $err)
                <div>{{ $err }}</div>
            @endforeach
        </div>
    @endif
    <form action="{{ route('makul.store') }}" method="POST">
        @csrf
        Nama: <input type="text" name="nama" value="{{ old('nama') }}"><br>
        Kode: <input type="text" name="kode" value="{{ old('kode') }}"><br>
        <button type="submit">Simpan</button>
    </form>
    <a href="{{ route('makul.index') }}">Kembali</a>
@endsection