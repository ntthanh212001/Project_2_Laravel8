@extends('admin.layouts.master')
@section('title','Tất cả giảng viên')
@section('content')
<div>
<table id="tbl" class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Họ tên</th>
            <th>Email</th>
            
            <th>Giới tính</th>
            <th>Số điện thoại</th>
           
        </tr>
    </thead>
    <tbody>
        @forelse ($sinhvien as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->hoten }}</td>
            <td>{{ $item->email }}</td>
         
            <td>{{ $item->gioitinh==1? 'Nam':'Nữ' }}</td>
            <td>{{ $item->phone }}</td>
           
        </tr>
        @empty
        <th colspan="7">Danh sách trống</th>
        @endforelse
    </tbody>



</table>
</div>

@endsection