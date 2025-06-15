<!-- filepath: c:\xampp\htdocs\TugasAkhirWeb\laravel12-app\resources\views\dosen\create.blade.php -->
@extends('layouts.app')

@section('content')
    <h2>Tambah Dosen</h2>
    @if($errors->any())
        <div style="color: red;">
            @foreach($errors->all() as $err)
                <div>{{ $err }}</div>
            @endforeach
        </div>
    @endif
    <form action="{{ route('dosen.store') }}" method="POST">
        @csrf
        Nama: <input type="text" name="nama" value="{{ old('nama') }}"><br>
        NIDN: <input type="text" name="nidn" value="{{ old('nidn') }}"><br>
        <button type="submit">Simpan</button>
    </form>
    <a href="{{ route('dosen.index') }}">Kembali</a>
@endsection