@extends('admin.layouts.master')
@section('title', 'Sửa Sinh viên')
@section('content')
    <form action="{{ url('/import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="sample" accept=".xlsx"/>
        <button type="submit">Import</button>
    </form>
    <a href="{{ url('/exportSinhvien') }}">
        <button>Export</button>
    </a>
    <a href="{{ url('/sampleSinhvien') }}">
        <button>Dowload Excel mau</button>
    </a>
@endsection

