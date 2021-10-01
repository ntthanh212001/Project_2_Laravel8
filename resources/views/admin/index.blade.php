@extends('admin.layouts.master')
@section('title', 'Trang Chủ')
@section('content')
<br>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <h4>Ngành</h4></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$nganhs}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            <h4>Lớp</h4></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$lops}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-align-left fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><h4>Giảng viên</h4>
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$giangviens}}</div>
                            </div>
                            {{-- <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            <h4>Sinh viên</h4></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$sinhviens}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card shadow mb-md-auto" style="width: 700px;">
    <h5 style="text-align: center">Biểu đồ điểm lý thuyết</h5>
    <div>
        <canvas id="myChart"></canvas>
    </div>
</div>

@endsection
@section('js')
    <script>

        // const labels = Utils.months({count: 7});
        const data = {
            labels: [
                @foreach($data2 as $item)
                {{ $loop->index . "," }}
                @endforeach
            ],
            datasets: [{
                label: 'Dữ liệu ',
                data: [
                    @foreach($data2 as $item)
                        {{ $item->diemlt . "," }}
                        @endforeach
                ],
                fill: false,
                borderColor: 'red',
                tension: 0.1
            }]

        };

        const config = {
            type: 'line',
            data: data,
        };
        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
@endsection
