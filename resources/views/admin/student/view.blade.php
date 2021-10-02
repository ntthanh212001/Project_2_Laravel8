@extends('admin.layouts.master')
@section('title', 'Sinh viên lớp LT')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    <br>
    <div class="card shadow mb-4" style="width: 900px;margin: auto;">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">Thông tin sinh viên</h6>
        </div>

        <div class="card-body" >

            <table class="table">
                @foreach($data as $item)
                    <tr>
                        <td>Mã Sinh Viên </td>
                        <td>{{$item->masv}}</td>
                    </tr>
                <tr>
                    <td>Tên Sinh Viên </td>
                    <td>{{$item->hoten}}</td>
                </tr>
                    <tr>
                        <td>Giới tính </td>
                        <td>{{$item->gioitinh==1 ? 'Nam' : 'Nữ'}}</td>
                    </tr>
                    <tr>
                        <td>Ngày sinh </td>
                        <td>{{$item->ngaysinh}}</td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td>{{$item->address}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{$item->email}}</td>
                    </tr>
                    <tr>
                        <td>Ngành Học</td>
                        <td>{{$item->tennganh}}</td>
                    </tr>
                    <tr>
                        <td>Lớp</td>
                        <td>{{$item->tenlop}}</td>
                    </tr>
                @endforeach
            </table>

        </div>



    </div>
    <div class="card shadow mb-4" style="width: 900px;margin: auto;">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">Điểm</h6>
        </div>

        <div class="card-body" >

            <table class="table table-striped">

                  <tr>
                      <th>Môn</th>
                      <th>Điểm lý thuyết</th>
                      <th>Điểm Thực Hành</th>
                  </tr>

                    @foreach($data2 as $item)
                    <tr>
                        <td>{{$item->tenmonhoc}}</td>
                        <td>{{$item->diemlt}}</td>
                        <td>{{$item->diemtt}}</td>
                    </tr>
                    @endforeach


            </table>

        </div>



    </div>

@endsection
