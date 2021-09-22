@extends('admin.layouts.master')
@section('title', 'Sinh viên lớp Thiết Kế Đồ Hoạ')
@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    <a href="{{ route('student.showForm') }}">Thêm Sinh Viên</a>
    <form action="{{url('/admin/student/tkdh')}}" method="get" >

        <select name="k" @class('form-select') onChange="this.form.submit()">Lớp
            <option value="" >Tất cả lớp</option>
            @foreach($data3 as $item)
                <option value="{{$item->tenlop}}"
                @if($item->tenlop == $key_class)
                    {{'selected'}}
                    @endif
                >{{$item->tenlop}}</option>
            @endforeach
        </select>
        <noscript><input value="submit"  type="submit"/></noscript>
    </form>
    <table id="dataTable" class="table table-bordered" >
        <thead>
        <tr class="text center-container">
            <th>STT</th>
            <th>Mã Sinh Viên</th>
            <th>Họ tên</th>
            <th>Ngành học</th>
            <th>Lớp</th>
            <th>Địa chỉ</th>
            <th>Email</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Số điện thoại</th>
            <th>Hành Động</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $item)
            <tr id="tid{{ $item->id }}">
                <td>{{ $item->rownum }}</td>
                <td>{{ $item->masv }}</td>
                <td>{{ $item->hoten }}</td>
                <td>{{ $item->tennganh }}</td>
                <td>{{ $item->tenlop }}</td>
                <td>{{ $item->address }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->ngaysinh }}</td>
                <td>{{ $item->gioitinh == 1 ? 'Nam' : 'Nữ' }}</td>
                <td>{{ $item->phone }}</td>

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
