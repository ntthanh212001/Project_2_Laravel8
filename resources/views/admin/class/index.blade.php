@extends('admin.layouts.master')
@section('title', 'lớp')
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
@endsection
@section('content')
    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#lopModal">Thêm Lớp</a>
    <br><br>
    <table id="dataTable" @class('table')>
        <thead>
            <tr class="text center-container">
                <th>ID</th>
                <th>Tên Lớp</th>
                <th>Tên Ngành</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data1 as $item)
                <tr id="tid{{ $item->id }}">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->tenlop }}</td>
                    <td>{{ $item->tennganh }}</td>

                    <td>
                        <a href="javascript:void(0)" onclick="editTeacher({{ $item->id }})"
                            class="btn btn-info">Edit</a>

                    </td>
                    {{-- <td>
        <a href="javascript:void(0)" onclick="editGiangvien({{$item->id}})" class="btn btn-info">Edit</a>
            <a href="javascript:void(0)" onclick="deleteGiangvien({{$item->id}})" class="btn btn-danger">Del</a>
            </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Add GV Modal -->



@endsection
