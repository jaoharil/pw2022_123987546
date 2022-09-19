<?php
// panggil file database.php untuk koneksi ke database 
require_once "config/database.php"; 
if (isset($_POST['login'])) {
  # code...
  $user=$_POST['user'];
  $pass=MD5($_POST['pass']);

  $sql = mysqli_query($db,"SELECT * FROM tbl_admin WHERE user='$user' AND pass='$pass'");
  $data = mysqli_fetch_assoc($sql);
  $row = mysqli_num_rows($sql);

  if ($data['user']==$user && $data['pass']==$pass){
      session_start();
      $_SESSION['level'] = $data['level'];
      $_SESSION['user'] = $data['user'];
      header("Location:index.php");
  }else{
    echo "<script>alert('Anda Gagal Login...!!!');</script>";
  }

}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Signin Sistem Informasi Sekolah v.1</title>
  <!-- favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="assets/plugins/bootstrap-4.1.3/css/bootstrap.min.css" rel="stylesheet">



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<form class="form-signin" method="post">
  <img class="mb-4" src="assets/img/favicon.png" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="text" id="user" name="user" class="form-control" placeholder="Username" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Sign in</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2017-2021</p>
</form>


    
  </body>
</html>
