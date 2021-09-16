@extends('admin.layouts.master')
@section('title', 'Sinh viên')
@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    <div>
<a href="{{ route('student.showForm') }}" class="btn btn-success">Thêm Sinh Viên</a> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="{{route('student.showFormExcel')}}" class="btn btn-info">Import Excel</a>
    <a href="#" class="btn btn-danger">Export Excel</a>
    <br><br>

<table id="dataTable" class="table table-bordered" >
        <thead>
            <tr class="text center-container">
                <th>ID</th>
                <th>Mã Sinh Viên</th>
                <th>Họ tên</th>
                <th>Ngành học</th>
                <th>Lớp</th>
                {{-- <th>Địa chỉ</th>
                <th>Email</th>
                <th>Ngày sinh</th> --}}
                <th>Giới tính</th>
                {{-- <th>Số điện thoại</th> --}}
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr id="tid{{ $item->id }}">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->masv }}</td>
                    <td>{{ $item->hoten }}</td>
                    <td>{{ $item->tennganh }}</td>
                    <td>{{ $item->tenlop }}</td>
                    {{-- <td>{{ $item->address }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->ngaysinh }}</td> --}}
                    <td>{{ $item->gioitinh == 1 ? 'Nam' : 'Nữ' }}</td>
                    {{-- <td>{{ $item->phone }}</td> --}}

                    <td>
                        <a href="{{'/admin/student/edit/'.$item->id}}"
                            class="btn btn-info">Edit</a>
                        <a href="{{'/admin/student/update/'.$item->id}}"
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
