@extends('user.layouts.master')
@section('title','Sinh viên')
@section('content')
    <br>

    <table class="table table-hover text-nowrap" >
        <tr>
            <th>STT</th>
            <th>Điểm thực hành</th>
            <th>Điểm lý thuyết</th>
            <th>Môn</th>
{{--            <th>Đánh giá</th>--}}
            <th>Ghi chú</th>
        </tr>
        @forelse($data as $item)
            <tr>
                <td>{{$item->rownum}}</td>
                <td>{{$item->diemlythuyet}}</td>
                <td>{{$item->diemthuchanh}}</td>
                <td>{{$item->monhoc}}</td>
{{--                <td>--}}
{{--                    @if($item->diemlythuyet <5 || $item->diemthuchanh < 5)--}}
{{--                        <i class="fa fa-times" aria-hidden="true" style="color: red;"></i>&nbsp;&nbsp;{{'Không đạt'}}--}}
{{--                    @else--}}
{{--                        <i class="fa fa-check" aria-hidden="true" style="color: green;">&nbsp;</i>{{'Đạt'}}--}}
{{--                    @endif--}}
{{--                </td>--}}
                <td>
                    @if($item->diemlythuyet <5 )
                        <span style="font-style: italic;font-weight: bold;">Thi lại lý thuyết</span>
                    @endif
                    <br>
                    @if($item->diemthuchanh <5 )
                        <span style="font-style: italic;font-weight: bold;">Thi lại thực hành </span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Không có dữ liệu</td>
            </tr>
        @endforelse
    </table>
@endsection

