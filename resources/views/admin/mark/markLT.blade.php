@extends('admin.layouts.master')
@section('title', 'Điểm lập trình')
@section('css')

{{-- <link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.1/af-2.3.7/b-2.0.0/b-colvis-2.0.0/b-html5-2.0.0/b-print-2.0.0/datatables.min.css" /> --}}
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
{{--  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script> --}}
{{-- <script type="text/javascript"
    src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.1/af-2.3.7/b-2.0.0/b-colvis-2.0.0/b-html5-2.0.0/b-print-2.0.0/datatables.min.js">
</script> --}}
@endsection
@section('content')
<div class="row">
    <form method="GET" id="search-form">
        @csrf
        <div class="col-md-8">
            <div class="btn btn-flat fix-box" style="margin: 0;padding: 0 0 0 12px;">
                <select name="search_lop" id="search_lop" class="form-control">
                    @foreach(App\Models\Lop::where('lops.nganh_id',1)->pluck('tenlop') as $key=>$val)
                    {{-- @foreach(App\Models\Lop::collection('lops.nganh_id',1)->all() as $key=>$val) --}}
                    {{-- @foreach(App\Models\Lop::pluck('tenlop')->where('nganh_id',1) as $key=>$val) --}}
                    {{-- @foreach(App\Models\Lop::filter(lops.nganh_id = 1) as $key=>$val) --}}
                    <option value="{{$key}}">{{$val}}</option>

                    @endforeach
                </select>
                
                <select name="search_mh" id="search_mh" class="form-control">
                    <option>-- Chọn môn học --</option>
                    @foreach(App\Models\Monhoc::where('monhocs.nganh_id',1)->pluck('tenmon','tenmon')->all() as $key=>$val)
                    <option value="{{$key}}">{{$val}}</option>
                    @endforeach
                </select>
            <button type="submit" class="btn btn-success">Xem</button>

            </div>
        </div>
    </form>
</div>
<br><br>
<table class="table table-bordered">
    <thead>
        <tr class="text center-container">
            <th>STT</th>
            <th>Mã SV</th>
            <th>Tên sinh viên</th>
            <th>Môn học</th>
            <th>Điểm lý thuyết</th>
            <th>Điểm thực hành</th>

            {{-- <th>Điểm tổng</th> --}}

            {{-- <th>Thời gian tạo</th>
                <th>Lần chỉnh sửa gần nhất</th>
                <th>Hành Động</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($student as $item)
        <tr {{-- id="tid{{ $item->id }}" --}}>
            {{-- <td>{{ $item->id }}</td> --}}
            <td>{{ $item->rownum }}</td>
            <td>{{ $item->masv }}</td>
            <td>{{ $item->hoten }}</td>
            <td>{{ $item->tenmon }}</td>
            {{-- <td>{{ $item->hotengv }}</td> --}}
            <td contenteditable="true"
                onBlur="saveToDatabase(this,'diemlt','{{$item->diem_id}}','{{$item->sv_id}}','{{$item->monhoc_id}}')">
                {{ $item->diemlt }}</td>
            <td contenteditable="true"
                onBlur="saveToDatabase(this,'diemtt','{{$item->diem_id}}','{{$item->sv_id}}','{{$item->monhoc_id}}')">
                {{ $item->diemtt }}</td>
            {{-- <td>{{ $item->diemtong }}</td> --}}

            {{-- <td>{{ $item->created_at }}</td>
            <td>{{ $item->updated_at }}</td> --}}
        </tr>
        @endforeach
    </tbody>
</table>

@stop
{{-- @section('css')
<link rel="stylesheet" href="{{asset('css/point.css')}} ">
@stop --}}
@section('js')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
{{-- <script src="https://cdn.datatables.net/buttons/1.5.0/js/buttons.html5.min.js"></script> --}}
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /* var url = "{{route('mark.savediem')}}"; */
    function saveToDatabase(diem, column, diem_id, sv_id, monhoc_id){
        $(diem).css("background","#FFF url({{asset('image/preloader.gif')}}) no-repeat right center");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('mark.savediem')}}",
            type: "POST",
            data: {
                diem: diem.innerHTML,
                column: column,
                diem_id: diem_id,
                sv_id: sv_id,
                monhoc_id: monhoc_id,
                _token: '{{csrf_token()}}'
            },

            success: function(data){
                    $(diem).css("background","#FDFDFD");
                },
                error: function (data) {
                    $(diem).css("background","red");
                }

        });
    }
</script>

@stop
