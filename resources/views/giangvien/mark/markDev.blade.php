@extends('giangvien.layouts.master')
@section('title', 'Điểm Lớp')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif


    <form action="{{url('/giangvien/mark/dev')}}" method="get" >

        <select name="k" @class('form-select')>Lớp
            <option value="" >Tất cả lớp</option>
            @foreach($data2 as $item)
            <option value="{{$item->tenlop}}"
                @if($item->tenlop == $key_class)
                    {{'selected'}}
                    @endif
            >{{$item->tenlop}}</option>
            @endforeach
        </select>
        <button  type="submit" @class('btn btn-info')>Chọn</button>
    </form>

    </select>
    <div>

        <table id="dataTable" class="table table-bordered" >
            <thead>
            <tr class="text center-container">
                <th>Mã Sv</th>
                <th>Tên sinh viên</th>
                <th>Môn</th>
                <th>Lý thuyết</th>
                <th>Thực hành</th>
                <th>Đánh giá</th>
                <th>Ghi chú</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>
                    <td style="width: 10%;">{{$item->masv}}</td>
                    <td style="width: 15%;">{{$item->tensv}}</td>
                    <td style="width: 10%;">{{$item->tenmon}}</td>
                    <td style="width: 7%;">{{$item->diemlt}}</td>
                    <td style="width: 7%;">{{$item->diemtt}}</td>
                    <td>
                        @if($item->diemlt <5 || $item->diemtt < 5)
                            <i class="fa fa-times" aria-hidden="true" style="color: red;"></i>&nbsp;&nbsp;{{'Không đạt'}}
                        @elseif ($item->diemlt >=5 || $item->diemtt >= 5)
                            <i class="fa fa-check" aria-hidden="true" style="color: green;">&nbsp;</i>{{'Đạt'}}
                        @endif
                    </td>
                    <td>
                        @if($item->diemlt <5 )
                            <span style="font-style: italic;font-weight: bold;">Điểm lý thuyết dưới 5</span>
                        @endif
                            <br>
                            @if($item->diemtt <5 )
                                <span style="font-style: italic;font-weight: bold;">Điểm thực hành dưới 5</span>
                            @endif
                    </td>


                </tr>
            @endforeach
            </tbody>

        </table>


        <!-- Add GV Modal -->

@endsection
