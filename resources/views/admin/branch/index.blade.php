@extends('admin.layouts.master')
@section('title','Ngành')
@section('css')
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
<a href="#" class="btn btn-success" data-toggle="modal" data-target="#nganhModal">Thêm Ngành</a>
<br><br>
<table id="nganhTable" class="table table-bordered">
    <thead>
        <tr class="text center-container">
            <th>ID</th>
            <th>Tên ngành</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->tennganh }}</td>
            <td>
            <a href="#" id="editNganh" data-value="{{ $item->id }}" class="btn btn-success" data-toggle="modal" data-target="#editModal">
                Sửa
            </a>
            <a href="#" id="deleteNganh" data-value="{{ $item->id }}" class="btn btn-danger">
                Xóa
            </a>
        </td>
            {{-- <td>
        <a href="javascript:void(0)" onclick="editGiangvien({{$item->id}})" class="btn btn-info">Edit</a>
            <a href="javascript:void(0)" onclick="deleteGiangvien({{$item->id}})" class="btn btn-danger">Del</a>
            </td> --}}
        </tr>
        @empty
        <th colspan="7">Danh sách trống</th>
        @endforelse
    </tbody>
</table>
<!-- Add GV Modal -->
<div class="modal fade" id="nganhModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm Ngành</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="nganhForm" action="">
                    @csrf
                    <div class="form-group">
                        <label for="tennganh">Tên ngành</label>
                        <input type="text" class="form-control" id="tennganh" />
                    </div>

                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sửa Ngành</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editNganhForm">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" class="form-control">
                        <label for="tennganh">Tên ngành</label>
                        <input type="text" name="e_tennganh" id="e_tennganh" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
/*
$(document).ready( function () {
    $('#nganhTable').DataTable();
} ); */

    $("#nganhForm").submit(function(e){
        e.preventDefault();

        let tennganh = $("#tennganh").val();
        let _token = $("input[name=_token]").val();

        $.ajax({
            url: "{{route('branch.add')}}",
            type: "POST",
            data: {
                tennganh:tennganh,
                _token:_token
            },
            success:function(response)
            {
                if (response)
                {
                    $("#nganhTable tbody").prepend('<tr><td>'+ response.id +'</td><td>'+ response.tennganh +'</td></tr>');
                    $("#nganhForm")[0].reset();
                    $("#nganhModal").modal('hide');
                }
            }
        });
    });



</script>
@endsection
