@extends('giangvien.layouts.master')
@section('title', 'Lớp của tôi')

@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    <div>

        <table id="dataTable" class="table table-bordered" >
            <thead>
            <tr class="text center-container">
                <th>Mã Sv</th>
                <th>Tên sinh viên</th>
                <th>Môn</th>
                <th>Điểm lý thuyết</th>
                <th>Điểm thực hành</th>
                <th>Đánh giá</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{$item->masv}}</td>
                    <td>{{$item->tensv}}</td>
                    <td>{{$item->tenmon}}</td>
                    <td>{{$item->diemlt}}</td>
                    <td>{{$item->diemtt}}</td>
                    <td>
                        @if($item->diemlt <= 5)
                            <span style="color: red;">{{"Không Đạt"}}</span><br>
                            <span style=" font-style: italic;">(Điểm lý thuyết dưới 5)</span>
                        @elseif($item->diemtt <= 5)
                            <span style="color: red;">{{"Không Đạt"}}</span><br>
                            <span style=" font-style: italic;">(Điểm thực hành dưới 5)</span>
                        @else
                            <span style="color: Green;">{{"Đạt"}}</span><br>
                        @endif


                    </td>


                </tr>
            @endforeach
            </tbody>
            <tbody>

            </tbody>
        </table>


        <!-- Add GV Modal -->

@endsection
