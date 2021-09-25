@extends('admin.layouts.master')
@section('title', 'Phân công')
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
<style>
    body {font-family: Arial;}

    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }
</style>
@endsection
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<div class="btn-group pull-right">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#phanCong">
        <i class="fa fa-plus" aria-hidden="true"></i> Thêm
    </button>
</div>
<table class="table table-bordered" id="table-phancong">
    <thead>
        <tr>
            <th>STT</th>
            <th>Giảng viên</th>
            <th>Môn học</th>
            <th>Lớp</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $item)
        <tr>
            <td>{{$item->rownum}}</td>
            <td>
                {{$item->hoten}}
            </td>
            <td>{{$item->tenmon}}</td>
            <td>{{$item->tenlop}}</td>
        </tr>
        @empty
        <th colspan="4" class="text center-container">Danh sách phân công trống</th>
        @endforelse
    </tbody>
</table>

{{-- phancong --}}
<div class="modal fade" id="phanCong" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm phân công</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="phancongForm" action="">
                    @csrf
                    <div class="form-group">
                        <div class="form-line">
                            <select class="selectpicker show-tick form-control" name="giangvien_id" id="giangvien_id"
                                style="width: 100%;" required>
                                <option value="">--Chọn giảng viên--</option>
                                @foreach(App\Models\Giangvien::select('hoten','id')->get() as $val)
                                <option value="{{$val->id}}" id="hoten">{{$val->hoten}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <select class="selectpicker show-tick form-control" name="giangvien_id" id="giangvien_id"
                                style="width: 100%;" required>
                                <option value="">--Chọn môn học--</option>
                                    @foreach(App\Models\Monhoc::select('tenmon','id')->get() as $val)
                                <option value="{{$val->id}}" id="tenmon">{{$val->tenmon}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line"><select class="selectpicker show-tick form-control" name="giangvien_id" id="giangvien_id"
                                style="width: 100%;" required>
                                <option value="">--Chọn lớp--</option>
                                    @foreach(App\Models\Lop::select('tenlop','id')->get() as $val)
                                <option value="{{$val->id}}" id="tenlop">{{$val->tenlop}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info btn-flat">Lưu lại</button>
                        <button type="button" class="btn btn-flat btn-danger" data-dismiss="modal">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<h2>Thêm phân công</h2>
<p>Hương HIIH</p>

<div class="tab">
    <button class="tablinks" onclick="openCity(event, 'London')">Ngành lập trình</button>
    <button class="tablinks" onclick="openCity(event, 'Paris')">Ngành Quản Trị mạng</button>
    <button class="tablinks" onclick="openCity(event, 'Tokyo')">Ngành thiết kế đồ hoạ</button>
</div>

<div id="London" class="tabcontent">
    <form action="{{url('admin/assignment/dev')}}" method="GET">
    <select class="form-select" aria-label="Default select example" name="gv_id">
        @foreach($dt1 as $item)
            <option value="{{$item->id}}">{{$item->hoten}}</option>
        @endforeach

    </select>
        <select class="form-select" aria-label="Default select example" name="monhoc_id">
            @foreach($dt2 as $item)
                <option value="{{$item->id}}">{{$item->tenmon}}</option>
            @endforeach

        </select>
        <select class="form-select" aria-label="Default select example" name="lop_id">
            @foreach($dt3 as $item)
                <option value="{{$item->id}}">{{$item->tenlop}}</option>
            @endforeach

        </select>
        <button type="submit">Thêm</button>
    </form>
</div>

<div id="Paris" class="tabcontent">
    <form action="{{url('admin/assignment/dev')}}" method="GET">
        <select class="form-select" aria-label="Default select example" name="gv_id">
            @foreach($dt4 as $item)
                <option value="{{$item->id}}">{{$item->hoten}}</option>
            @endforeach

        </select>
        <select class="form-select" aria-label="Default select example" name="monhoc_id">
            @foreach($dt5 as $item)
                <option value="{{$item->id}}">{{$item->tenmon}}</option>
            @endforeach

        </select>
        <select class="form-select" aria-label="Default select example" name="lop_id">
            @foreach($dt6 as $item)
                <option value="{{$item->id}}">{{$item->tenlop}}</option>
            @endforeach

        </select>
        <button type="submit">Thêm</button>
    </form>
</div>

<div id="Tokyo" class="tabcontent">
    <form action="{{url('admin/assignment/dev')}}" method="GET">
        <select class="form-select" aria-label="Default select example" name="gv_id">
            @foreach($dt7 as $item)
                <option value="{{$item->id}}">{{$item->hoten}}</option>
            @endforeach

        </select>
        <select class="form-select" aria-label="Default select example" name="monhoc_id">
            @foreach($dt8 as $item)
                <option value="{{$item->id}}">{{$item->tenmon}}</option>
            @endforeach

        </select>
        <select class="form-select" aria-label="Default select example" name="lop_id">
            @foreach($dt9 as $item)
                <option value="{{$item->id}}">{{$item->tenlop}}</option>
            @endforeach

        </select>
        <button type="submit">Thêm</button>
    </form>
</div>

<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>
<script>
    $("#phancongForm").submit(function(e){
        e.preventDefault();

        let hoten = $("#hoten").val();
        let tenmon = $("#tenmon").val();
        let tenlop = $("#tenlop").val();
        let _token = $("input[name=_token]").val();

        $.ajax({
            url: "{{route('phancong.add')}}",
            type: "POST",
            data: {
                hoten:hoten,
                tenmon:tenmon,
                tenlop:tenlop,
                _token:_token
            },
            success:function(response)
            {
                if (response)
                {
                    $("#table-phancong tbody").prepend('<tr><td>'+ response.id +'</td><td>'+ response.hoten +'</td><td>'+ response.tenmon +'</td><td>'+ response.tenlop +'</td></tr>');
                    $("#phancongForm")[0].reset();
                    $("#phanCong").modal('hide');
                    location.reload();
                }
            }
        });
    });
</script>
@endsection
