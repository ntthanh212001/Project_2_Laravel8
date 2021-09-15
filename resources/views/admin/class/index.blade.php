@extends('admin.layouts.master')
@section('title', 'lớp')
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
