@extends('admin.layouts.master')
@section('title', 'Sửa Sinh viên')
@section('content')
    <form action="{{ url('/importMark') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="sample" accept=".xlsx"/>
        <button type="submit">Import</button>
    </form>
    <a href="{{ url('/exportMark') }}">
        <button>Export</button>
    </a>
    <a href="{{ url('/sampleMark') }}">
        <button>Tải Mẫu Excel</button>
    </a>
@endsection

