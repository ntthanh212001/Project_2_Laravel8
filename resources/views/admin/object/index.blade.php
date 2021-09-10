@extends('admin.layouts.master')
@section('title', 'Môn học')
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
    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#sinhvienModal">Thêm Môn học</a>
    <br><br>

    <table id="monhocTable" class="table table-bordered">
        <thead>
            <tr class="text center-container">
                <th>ID</th>
                <th>Tên môn học</th>
                <th>Số giờ</th>
                <th>Học kì</th>
                <th>Ngành</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr id="tid{{ $item->id }}">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->tenmon }}</td>
                    <td>{{ $item->sogio }}</td>
                    <td>{{ $item->tenhocki }}</td>
                    <td>{{ $item->tennganh }}</td>
                    <td>
                        <a href="javascript:void(0)" onclick="editStudent({{ $item->id }})"
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
    <div class="modal fade" id="sinhvienModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm môn học</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="monhocForm" action="">
                        @csrf

                        <div class="form-group">
                            <label for="tenmon">Tên Môn học</label>
                            <input type="text" class="form-control" id="tenmon" />
                        </div>
                        <div class="form-group">
                            <label for="sogio">Số giờ</label>
                            <input type="number" class="form-control" id="sogio" />
                        </div>
                        <div>
                            <label for="hocki_id">Học kì</label><br>
                            <select name="hocki_id" id="hocki_id" class="form-select">
                                @foreach ($data2 as $item)
                                    <option id="lop_id" value="{{ $item->id }}">{{ $item->tenhocki }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="nganh_id">Ngành</label><br>
                            <select name="nganh_id" id="nganh_id" class="form-select">
                                @foreach ($data3 as $item)
                                    <option id="nganh_id" value="{{ $item->id }}">{{ $item->tennganh }}</option>
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
    <!-- Add GV Modal -->
    <div class="modal fade" id="sinhvienEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa sinh viên</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="sinhvienEditForm" action="">
                        @csrf
                        <input type="hidden" id="id" name="id" />
                        <div class="form-group">
                            <label for="masv">Mã sinh viên</label>
                            <input type="text" class="form-control" id="masv2" />
                        </div>
                        <div class="form-group">
                            <label for="hoten">Họ tên</label>
                            <input type="text" class="form-control" id="hoten2" />
                        </div>
                        <div class="form-group">
                            <label for="gioitinh">Giới tính</label>
                            <br><br>
                            <input type="radio" name="gioitinh" id="gioitinh2" value="nam" checked> Nam
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="gioitinh" id="gioitinh2" value="nu"> Nữ
                        </div>
                        <div class="form-group">
                            <label for="ngaysinh">Ngày sinh</label>
                            <input type="date" class="form-control" id="ngaysinh2" />
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="tel" class="form-control" id="phone2" />
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="text" class="form-control" id="address2" />
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email2" />
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu(mặc định 123456)</label>
                            <input type="password" class="form-control" id="password2" />
                        </div>
                        <div>
                            <label for="lop_id">Lớp</label><br>
                            <select name="lop_id" id="lop_id2" class="form-select">
                                {{-- @foreach ($data as $item)
                                    <option id="lop_id" value="{{ $item->id }}">{{ $item->tenlop }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                        <div>
                            <label for="nganh_id">Ngành</label><br>
                            <select name="nganh_id" id="nganh_id2" class="form-select">
                                {{-- @foreach ($data as $item)
                                    <option id="nganh_id" value="{{ $item->id }}">{{ $item->tennganh }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#monhocTable').DataTable();
        });

        $("#monhocForm").submit(function(e) {
            e.preventDefault();
            let tenmon = $("#tenmon").val();
            let sogio = $("#sogio").val();
            let hocki_id = $("#hocki_id").val();
            let nganh_id = $("#nganh_id").val();
            let _token = $("input[name=_token]").val();

            $.ajax({
                url: "{{ route('object.add') }}",
                type: "GET",
                data: {
                    tenmon: tenmon,
                    sogio: sogio,
                    hocki_id: hocki_id,
                    nganh_id: nganh_id,
                },
                success: function(response) {
                    if (response) {
                        $("#monhocTable tbody").prepend('<tr><td>' + response.id + '</td><td>' +
                            response.tenmon + '</td><td>' + response.sogio + '</td><td>' + response
                            .hocki_id + '</td><td>' + response.ngaysinh + '</td><td>' + response
                            .nganh_id + '</td><td>' + response.status + '</td></tr>');
                        $("#monhocForm")[0].reset();
                        $("#sinhvienModal").modal('hide');
                        location.reload();
                        swal({
                            title: 'Thông báo',
                            text: response.success,
                            icon: 'success'
                        })

                    }
                }
            });
        });
    </script>
    <script>
        /* Edit GV */

        function editStudent(id) {
            $.get('/admin/student/' + id, function(sinhvien) {
                $("#id").val(sinhvien.id);
                $("#masv2").val(sinhvien.masv);
                $("#hoten2").val(sinhvien.hoten);
                $("#gioitinh2").val(sinhvien.gioitinh);
                $("#ngaysinh2").val(sinhvien.ngaysinh);
                $("#phone2").val(sinhvien.phone);
                $("#address2").val(sinhvien.address);
                $("#email2").val(sinhvien.email);
                $("#password2").val(sinhvien.password);
                $("#nganh_id2").val(sinhvien.nganh_id);
                $("#lop_id2").val(sinhvien.lop_id);
                $("#sinhvienEditModal").modal('toggle');
            });
        }

        $("#sinhvienEditForm").submit(function(e) {
            e.preventDefault();
            let masv = $("#masv2").val();
            let hoten = $("#hoten2").val();
            let gioitinh = $("#gioitinh2").val();
            let ngaysinh = $("#ngaysinh2").val();
            let phone = $("#phone2").val();
            let address = $("#address2").val();
            let email = $("#email2").val();
            let password = $("#password2").val();
            let nganh_id = $("#nganh_id2").val();
            let lop_id = $("#lop_id2").val();
            let _token = $("input[name=_token]").val();


            $.ajax({
                url: "{{ route('student.update') }}",
                type: "PUT",
                data: {
                    masv: masv,
                    hoten: hoten,
                    gioitinh: gioitinh,
                    ngaysinh: ngaysinh,
                    phone: phone,
                    address: address,
                    email: email,
                    password: password,
                    nganh_id: nganh_id,
                    lop_id: lop_id,
                    _token: _token
                },
                success: function(response) {
                    $('#tid' + response.id + ' td:nth-child(1)').text(response.masv);
                    $('#tid' + response.id + ' td:nth-child(2)').text(response.hoten);
                    $('#tid' + response.id + ' td:nth-child(3)').text(response.gioitinh);
                    $('#tid' + response.id + ' td:nth-child(4)').text(response.ngaysinh);
                    $('#tid' + response.id + ' td:nth-child(5)').text(response.phone);
                    $('#tid' + response.id + ' td:nth-child(6)').text(response.address);
                    $('#tid' + response.id + ' td:nth-child(7)').text(response.email);
                    $('#tid' + response.id + ' td:nth-child(8)').text(response.password);
                    $('#tid' + response.id + ' td:nth-child(9)').text(response.nganh_id);
                    $('#tid' + response.id + ' td:nth-child(10)').text(response.lop_id);

                    $("#sinhvienEditModal").modal('toggle');
                    $("#sinhvienEditForm")[0].reset();
                    location.reload();


                }
            });
        });
    </script>

@endsection
