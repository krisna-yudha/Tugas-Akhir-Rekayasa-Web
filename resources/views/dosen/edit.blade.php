<!-- filepath: c:\xampp\htdocs\TugasAkhirWeb\laravel12-app\resources\views\dosen\edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h2>Edit Dosen</h2>
    @if($errors->any())
        <div style="color: red;">
            @foreach($errors->all() as $err)
                <div>{{ $err }}</div>
            @endforeach
        </div>
    @endif
    <form action="{{ route('dosen.update', $dsn->id) }}" method="POST">
        @csrf
        Nama: <input type="text" name="nama" value="{{ old('nama', $dsn->nama) }}"><br>
        NIDN: <input type="text" name="nidn" value="{{ old('nidn', $dsn->nidn) }}"><br>
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('dosen.index') }}">Kembali</a>
@endsection