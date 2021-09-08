@extends('admin.layouts.master')
@section('title', 'lớp')
@section('css')
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.1/af-2.3.7/b-2.0.0/b-colvis-2.0.0/b-html5-2.0.0/b-print-2.0.0/datatables.min.css" />
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
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.1/af-2.3.7/b-2.0.0/b-colvis-2.0.0/b-html5-2.0.0/b-print-2.0.0/datatables.min.js">
    </script>
@endsection
@section('content')
    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#giangvienModal">Thêm Lớp</a>
    <br><br>
    <table id="giangvienTable" class="table table-bordered">
        <thead>
            <tr class="text center-container">
                <th>ID</th>
                <th>Tên Lớp</th>
                <th>Tên Ngành</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
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
    <div class="modal fade" id="giangvienModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm lớp</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="giangvienForm" action="">
                        @csrf
                        <div class="form-group">
                            <label for="tenlop">Tên lớp</label>
                            <input type="text" class="form-control" id="tenlop" />
                        </div>
                        <div>
                            <label for="tennganh">Ngành</label><br>
                            <select name="tennganh" id="tennganh">
                                @foreach ($data2 as $item)
                                    <option id="tennganh" value="{{ $item->id }}">{{ $item->tennganh }}</option>
                                @endforeach
                            </select>
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
                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#giangvienTable').DataTable();
        });

        $("#giangvienForm").submit(function(e) {
            e.preventDefault();
            let tenlop = $("#tenlop").val();
            let tennganh = $("#tennganh").val();
            let _token = $("input[name=_token]").val();

            $.ajax({
                url: "{{ route('class.add') }}",
                type: "POST",
                data: {
                    tenlop: tenlop,
                    tennganh: tennganh,
                    _token: _token
                },
                success: function(response) {
                    if (response) {
                        $("#giangvienTable tbody").prepend('<tr><td>' + response.id + '</td><td>' +
                            response.tenlop + '</td><td>' + response.tennganh + '</td></tr>');
                        $("#giangvienForm")[0].reset();
                        $("#giangvienModal").modal('hide');
                    }
                }
            });
        });
    </script>
    <script>
        /* Edit GV */

        function editTeacher(id) {
            $.get('/admin/teacher/' + id, function(giangvien) {
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

        $("#teacherEditForm").submit(function(e) {
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
                url: "{{ route('teacher.update') }}",
                type: "PUT",
                data: {
                    id: id,
                    hoten: hoten,
                    email: email,
                    password: password,
                    ngaysinh: ngaysinh,
                    gioitinh: gioitinh,
                    phone: phone,
                    status: status,
                    _token: _token
                },
                success: function(response) {
                    $('#tid' + response.id + ' td:nth-child(1)').text(response.id);
                    $('#tid' + response.id + ' td:nth-child(2)').text(response.hoten);
                    $('#tid' + response.id + ' td:nth-child(3)').text(response.email);
                    $('#tid' + response.id + ' td:nth-child(4)').text(response.ngaysinh);
                    $('#tid' + response.id + ' td:nth-child(5)').text(response.gioitinh);
                    $('#tid' + response.id + ' td:nth-child(6)').text(response.phone);
                    $('#tid' + response.id + ' td:nth-child(7)').text(response.status);
                    $("#teacherEditModal").modal('toggle');
                    $("#teacherEditForm")[0].reset();
                    //    $("#teacherEditModal").modal('hide');


                }
            });
        });
    </script>

@endsection
