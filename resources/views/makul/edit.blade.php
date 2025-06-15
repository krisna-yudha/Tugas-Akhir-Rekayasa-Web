<!-- filepath: c:\xampp\htdocs\TugasAkhirWeb\laravel12-app\resources\views\mahasiswa\edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h2>Edit Mata Kuliah</h2>
    @if($errors->any())
        <div style="color: red;">
            @foreach($errors->all() as $err)
                <div>{{ $err }}</div>
            @endforeach
        </div>
    @endif
    <form action="{{ route('makul.update', $mk->id) }}" method="POST">
        @csrf
        Nama: <input type="text" name="nama" value="{{ old('nama', $mk->nama) }}"><br>
        Kode: <input type="text" name="kode" value="{{ old('kode', $mk->kode) }}"><br>
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('makul.index') }}">Kembali</a>
@endsection