@extends('admin.layouts.master')
@section('title', 'Trang Chủ')
@section('content')
<br>
<div class="row" style="width: 80%; margin-left: 123px">
    <div class="col-xl-3 col-xxl-3 col-sm-6">
        <div class="widget-stat card bg-secondary">
            <div class="card-body">
                <div class="media">
                    <span class="mr-3">
                        <i class="la la-graduation-cap"></i>
                    </span>
                    <div class="media-body text-white">
                        <p class="mb-1">Khóa</p>
                        <h3 class="text-white">28</h3>
                        <div class="progress mb-2 bg-white">
                            <div class="progress-bar progress-animated bg-light" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-xxl-3 col-sm-6">
        <div class="widget-stat card bg-warning">
            <div class="card-body">
                <div class="media">
                    <span class="mr-3">
                        <i class="la la-user"></i>
                    </span>
                    <div class="media-body text-white">
                        <p class="mb-1">Ngành</p>
                        <h3 class="text-white">245</h3>
                        <div class="progress mb-2 bg-white">
                            <div class="progress-bar progress-animated bg-light" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-xxl-3 col-sm-6">
        <div class="widget-stat card bg-danger">
            <div class="card-body">
                <div class="media">
                    <span class="mr-3">
                        <i class="la la-dollar"></i>
                    </span>
                    <div class="media-body text-white">
                        <p class="mb-1">Sinh viên</p>
                        <h3 class="text-white">25160$</h3>
                        <div class="progress mb-2 bg-white">
                            <div class="progress-bar progress-animated bg-light" style="width: 90%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-xxl-3 col-sm-6">
        <div class="widget-stat card bg-primary">
            <div class="card-body">
                <div class="media">
                    <span class="mr-3">
                        <i class="la la-users"></i>
                    </span>
                    <div class="media-body text-white">
                        <p class="mb-1">Sinh viên</p>
                        <h3 class="text-white">3280</h3>
                        <div class="progress mb-2 bg-white">
                            <div class="progress-bar progress-animated bg-light" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
