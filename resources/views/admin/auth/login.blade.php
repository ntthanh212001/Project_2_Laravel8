<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>ADMIN</title>
  <link rel="stylesheet" href="/admin_login/dist/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 
</head>
<body>
<!-- partial:index.partial.html -->
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> Đăng nhập ADMIN </h2>
    <!-- Icon -->
    <div class="fadeIn first">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQsssLgmQluLP4KXPVos1jmNtZdnrGRFewwH5KF3zCKCM8rpLVWvdW5fcdhij0FPl6g9kg&usqp=CAU" id="icon" alt="User Icon" />
    </div>
    <br>

    <!-- Login Form -->
    {{-- @include('admin/auth.alert') --}}
    <form method="POST" >
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Tài khoản</label>
          <input type="email" class="form-control" name="user" id="exampleInputEmail1" aria-describedby="emailHelp" style="width: 300px;margin: auto;">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label" >Mật khẩu</label>
          <input type="password" class="form-control" name="password" id="exampleInputPassword1" style="width: 300px;margin: auto;">
        </div>
        
        <button type="submit" class="btn btn-outline-primary">Đăng nhập</button>
    </form>
    <br>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#"></a>
    </div>

  </div>
</div>
<!-- partial -->
  
</body>
</html>
