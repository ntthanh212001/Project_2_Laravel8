@extends('admin.layouts.master')
@section('title','Teacher')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.1/af-2.3.7/b-2.0.0/b-colvis-2.0.0/b-html5-2.0.0/b-print-2.0.0/datatables.min.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.1/af-2.3.7/b-2.0.0/b-colvis-2.0.0/b-html5-2.0.0/b-print-2.0.0/datatables.min.js"></script>
@endsection
@section('content')
<a href="#" class="btn btn-success" data-toggle="modal" data-target="#giangvienModal">Thêm Giảng Viên</a>
<br><br>
<table id="giangvienTable" class="table table-bordered">
    <thead>
        <tr class="text center-container">
            <th>ID</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Số điện thoại</th>
            <th>Trạng thái</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr id="tid{{$item->id}}">
            <td>{{ $item->id }}</td>
            <td>{{ $item->hoten }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->ngaysinh }}</td>
            <td>{{ $item->gioitinh==1? 'Nam':'Nữ' }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->status==1? 'On':'Off' }}</td>
            <td>
                <a href="javascript:void(0)" onclick="editTeacher({{$item->id}})" class="btn btn-info">Edit</a>
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
<div class="modal fade" id="giangvienModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm giảng viên</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="giangvienForm" action="">
                    @csrf
                    <div class="form-group">
                        <label for="hoten">Họ tên</label>
                        <input type="text" class="form-control" id="hoten" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" readonly
                            value="$2a$12$00S/d806OemZuOuYkbuiz.hMz9aSrzK/9oyQI76jC4tL.EhfZ0zAi" />
                    </div>
                    <div class="form-group">
                        <label for="ngaysinh">Ngày sinh</label>
                        <input type="date" class="form-control" id="ngaysinh" />
                    </div>
                    <div class="form-group">
                        <label for="gioitinh">Giới tính</label>
                        <br><br>
                        <input type="radio" name="gioitinh" id="gioitinh" value="1" checked> Nam
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="gioitinh" id="gioitinh" value="0"> Nữ
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone" />
                    </div>
                    <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <br><br>
                        <input type="radio" name="status" id="status" value="1" checked> On
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="status" id="status" value="0"> Off
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit GV Modal -->
<div class="modal fade" id="teacherEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sửa giảng viên</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="teacherEditForm">
                    @csrf
                    <input type="hidden" id="id" name="id" />
                    <div class="form-group">
                        <label for="hoten">Họ tên</label>
                        <input type="text" class="form-control" id="hoten2" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email2" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password2"
                            value="$2a$12$00S/d806OemZuOuYkbuiz.hMz9aSrzK/9oyQI76jC4tL.EhfZ0zAi" />
                    </div>
                    <div class="form-group">
                        <label for="ngaysinh">Ngày sinh</label>
                        <input type="date" class="form-control" id="ngaysinh2" />
                    </div>
                    <div class="form-group">
                        <label for="gioitinh">Giới tính</label>
                        <br><br>
                        <input type="radio" name="gioitinh" id="gioitinh2" value="1" checked> Nam
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="gioitinh" id="gioitinh2" value="0"> Nữ
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone2" />
                    </div>
                    <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <br><br>
                        <input type="radio" name="status" id="status2" value="1" checked> On
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="status" id="status2" value="0"> Off
                    </div>
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

$(document).ready( function () {
    $('#giangvienTable').DataTable();
} );

    $("#giangvienForm").submit(function(e){
        e.preventDefault();

        let hoten = $("#hoten").val();
        let email = $("#email").val();
        let password = $("#password").val();
        let ngaysinh = $("#ngaysinh").val();
        let gioitinh = $("#gioitinh").val();
        let phone = $("#phone").val();
        let status = $("#status").val();
        let _token = $("input[name=_token]").val();

        $.ajax({
            url: "{{route('teacher.add')}}",
            type: "POST",
            data: {
                hoten:hoten,
                email:email,
                password:password,
                ngaysinh:ngaysinh,
                gioitinh:gioitinh,
                phone:phone,
                status:status,
                _token:_token
            },
            success:function(response)
            {
                if (response)
                {
                    $("#giangvienTable tbody").prepend('<tr><td>'+ response.id +'</td><td>'+ response.hoten +'</td><td>'+ response.email +'</td><td>'+ response.ngaysinh +'</td><td>'+ response.gioitinh +'</td><td>'+ response.phone +'</td><td>'+ response.status +'</td></tr>');
                    $("#giangvienForm")[0].reset();
                    $("#giangvienModal").modal('hide');
                }
            }
        });
    });

</script>
<script>
    /* Edit GV */

       function editTeacher(id)
       {
           $.get('/admin/teacher/'+id, function(giangvien){
               $("#id").val(giangvien.id);
               $("#hoten2").val(giangvien.hoten);
               $("#email2").val(giangvien.email);
               $("#password2").val(giangvien.password);
               $("#ngaysinh2").val(giangvien.ngaysinh);
               $("#gioitinh2").val(giangvien.gioitinh);
               $("#phone2").val(giangvien.phone);
               $("#status2").val(giangvien.status);
               $("#teacherEditModal").modal('toggle');
           });
       }

       $("#teacherEditForm").submit(function(e){
           e.preventDefault();
           let id = $("#id").val();
           let hoten = $("#hoten2").val();
           let email = $("#email2").val();
           let password = $("#password2").val();
           let ngaysinh = $("#ngaysinh2").val();
           let gioitinh = $("#gioitinh2").val();
           let phone = $("#phone2").val();
           let status = $("#status2").val();
           let _token = $("input[name=_token]").val();


           $.ajax({
               url:"{{route('teacher.update')}}",
               type:"PUT",
               data:{
                   id:id,
                   hoten:hoten,
                   email:email,
                   password:password,
                   ngaysinh:ngaysinh,
                   gioitinh:gioitinh,
                   phone:phone,
                   status:status,
                   _token:_token
               },
               success:function(response)
               {
                    $('#tid' +response.id +' td:nth-child(1)').text(response.id);
                   $('#tid' +response.id +' td:nth-child(2)').text(response.hoten);
                   $('#tid' +response.id +' td:nth-child(3)').text(response.email);
                   $('#tid' +response.id +' td:nth-child(4)').text(response.ngaysinh);
                   $('#tid' +response.id +' td:nth-child(5)').text(response.gioitinh);
                   $('#tid' +response.id +' td:nth-child(6)').text(response.phone);
                   $('#tid' +response.id +' td:nth-child(7)').text(response.status);
                   $("#teacherEditModal").modal('toggle');
                   $("#teacherEditForm")[0].reset();
                //    $("#teacherEditModal").modal('hide');


               }
           });
       });
</script>

@endsection
