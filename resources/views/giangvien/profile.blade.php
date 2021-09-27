@extends('giangvien.layouts.master')
@section('title', 'Thông tin cá nhân')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    <br>
    <h3 style="text-align: center;">Thông tin</h3>
    <br>
    <table @class('table') style="width: 800px;margin: auto;">
        <tr>
            <td>Tên</td>
            @foreach($data as $item)
                <td>{{$item->hoten}}</td>
            @endforeach
        </tr>
        <tr>
            <td>Email</td>
            @foreach($data as $item)
                <td>{{$item->email}}</td>
            @endforeach
        </tr>
        <tr>
            <td>Số điện thoại</td>
            @foreach($data as $item)
                <td>{{$item->phone}}</td>
            @endforeach
        </tr>
        <tr>
            <td>Ngày sinh</td>
            @foreach($data as $item)
                <td>{{$item->ngaysinh}}</td>
            @endforeach
        </tr>
        <tr>
            <td>Giới tính</td>
            @foreach($data as $item)
                <td>{{$item->gioitinh == 1 ? 'Nam' : 'Nữ'}}</td>
            @endforeach
        </tr>
        <tr>
            <td>Được tạo lúc </td>
            @foreach($data as $item)
                <td>{{$item->created_at}}</td>
            @endforeach
        </tr>
    </table>





@endsection
