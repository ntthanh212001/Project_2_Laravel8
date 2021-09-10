<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/app.css')}}">
    <title>@yield('title','không có tiêu đề')</title>
    @section('css')

    @show
</head>

<body>

    <div class="wrap">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 89px; background-color: white">
            <div class="container-fluid" >
                <a class="navbar-brand" href="{{url('admin/')}}">
                    <img style="margin-left: -10px;width: 50px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRadBc0dmRX19K4-btcMhEf6nTNsupPjF65mKgew5hOzf7PrRi64ExAklmy8zewqxtS8ZE&usqp=CAU" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin/branch/') }}">Ngành</a>
                        </li>
                        &nbsp;&nbsp;&nbsp;
                        &nbsp;
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{url('admin/class/')}}">Lớp</a>
                        </li>
                        &nbsp;&nbsp;&nbsp;
                        &nbsp;
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{url('admin/teacher/')}}">Giảng viên</a>
                        </li>
                        &nbsp;&nbsp;&nbsp;
                        &nbsp;
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{url('admin/student/')}}">Sinh viên</a>
                        </li>
                        &nbsp;&nbsp;&nbsp;
                        &nbsp;
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{url('admin/mark/')}}">Điểm</a>
                        </li>
                        &nbsp;&nbsp;&nbsp;
                        &nbsp;
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{url('admin/object/')}}">Môn học</a>
                        </li>
                        &nbsp;&nbsp;&nbsp;
                        &nbsp;
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{url('admin/assignment/')}}">Phân công</a>
                        </li>
                        &nbsp;&nbsp;&nbsp;
                        &nbsp;
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{url('admin/post/')}}">Thông báo</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
        <div class="content">
            @section('content')

            @show
            <footer class="text-center text-white" style="background-color: #86807F;">
                <!-- Grid container -->


                <!-- Copyright -->
                <div class="text-center text-dark p-3" style="background-color: #99e6ff;">
                    © 2021 Copyright:
                    <a class="text-dark" href="https://mdbootstrap.com/"></a>
                </div>
                <!-- Copyright -->
            </footer>
        </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
