@extends('admin.layouts.master')
@section('title', 'Tất cả lớp')

@section('content')
    @if (Session::get('succsess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('succsess') }}
        </div>
    @endif
    @if (Session::get('succsess_delete'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('succsess_delete') }}
        </div>
    @endif
    @if (Session::get('error'))
        <div class="alert alert-success">
            {{ Session::get('error') }}
        </div>
    @endif
    <div>
        <a href="{{ route('form-insert-branch') }}">Thêm lớp</a>
      
        <table id="tbl" class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Tên lớp</th>
                    <th>Hành động</th>
                    <th>Thời gian tạo</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($lop as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->tenlop }}</td>
                        <td>
                            <a href="/delete-branch/{{ $item->id }}">Xoá</a>
                            <a href="/edit-branch/{{ $item->id }}">Sửa</a>
                        </td>

                        <td>{{ date('d/m/Y', strtotime($item->created_at)) . '  ' . 'lúc' . '  ' . date('H:i:s', strtotime($item->created_at)) }}
                        </td>
                    </tr>
                @empty
                    <th colspan="7">Danh sách trống</th>
                @endforelse
            </tbody>



        </table>

    </div>
    
@endsection
