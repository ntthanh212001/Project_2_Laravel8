<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

  
  @if (Auth::user() != null)
  <span>{{'Xin chào !'.Auth::user()->name }}</span>
  <a href="{{ route('logout') }}">Đăng xuất</a>
@else
  <a href="{{route('login')}}">Đăng nhập để tiếp tục</a>
@endif
 
</body>
</html>