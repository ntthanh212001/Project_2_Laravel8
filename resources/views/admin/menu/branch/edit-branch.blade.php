@extends('admin.layouts.master')
@section('title', 'Sửa ngành')
@section('content')

    <form method="POST">
        @csrf
        <div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label class="form-label">Tên ngành</label>
                    <input type="text" name="namebranch" class="form-control" value="{{$data['tennganh']}}">
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <button type="submit" class="btn btn-primary">Sửa</button>
            </div>
        </div>
    </form>
@endsection
