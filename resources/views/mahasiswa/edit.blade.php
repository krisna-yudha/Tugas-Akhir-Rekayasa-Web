<!-- filepath: c:\xampp\htdocs\TugasAkhirWeb\laravel12-app\resources\views\mahasiswa\edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h2>Edit Mahasiswa</h2>
    @if($errors->any())
        <div style="color: red;">
            @foreach($errors->all() as $err)
                <div>{{ $err }}</div>
            @endforeach
        </div>
    @endif
    <form action="{{ route('mahasiswa.update', $mhs->id) }}" method="POST">
        @csrf
        Nama: <input type="text" name="nama" value="{{ old('nama', $mhs->nama) }}"><br>
        NIM: <input type="text" name="nim" value="{{ old('nim', $mhs->nim) }}"><br>
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('mahasiswa.index') }}">Kembali</a>
@endsection