<?php
@session_start();
include 'config/koneksi.php';
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Sistem Koperasi Pasar Kranji Bekasi</title>

  <!-- Favicons -->
  <link href="img/logo1.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" method="post">
        <h2 class="form-login-heading"><img src="img/logo1.png"><br><br>Sistem Koperasi Pasar Kranji Bekasi</h2>
        <div class="login-wrap">
          <input type="text" name="username" class="form-control" placeholder="Username" autofocus>
          <br>
          <input type="password" name="password" class="form-control" placeholder="Password">
          <br>
          <button class="btn btn-theme btn-block" name="submit" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
          <hr>
        </div>

      </form>
      <?php 
      if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $queryuser = mysqli_query($koneksi, "SELECT *FROM user WHERE username='$username' AND password='$password' AND level_user='admin'");
        $result1 = mysqli_fetch_array($queryuser);

        $queryanggota = mysqli_query($koneksi, "SELECT *FROM anggota WHERE username='$username' AND password='$password'");
        $result2 = mysqli_fetch_array($queryanggota);

        $querymanager = mysqli_query($koneksi, "SELECT *FROM manager WHERE username='$username' AND password='$password'");
        $result3 = mysqli_fetch_array($querymanager);

        $querysupplier = mysqli_query($koneksi, "SELECT *FROM supplier WHERE username='$username' AND password='$password'");
        $result4 = mysqli_fetch_array($querysupplier);

      if (mysqli_num_rows($queryuser) == 1) {
        $_SESSION["admin"] = $result1;
        $_SESSION['user_id'] = $result1['id_user'];
        $_SESSION['username'] = $result1['username'];
        $_SESSION['password'] = $result1['password'];
        $_SESSION['nama'] = $result1['nama_user'];
        $_SESSION['level_user'] = 'admin';
    header('location:index.php');
    } elseif (mysqli_num_rows($queryanggota) == 1) {
        $_SESSION["anggota"] = $result2;
        $_SESSION['id_anggota'] = $result2['id_anggota'];
        $_SESSION['username'] = $result2['username'];
        $_SESSION['password'] = $result2['password'];
        $_SESSION['nama'] = $result2['nama_anggota'];
        $_SESSION['alamat'] = $result2['alamat'];
        $_SESSION['no_tlp'] = $result2['no_tlp'];
        $_SESSION['no_ktp'] = $result2['no_ktp'];
        $_SESSION['foto_anggota'] = $result2['foto_anggota'];
    header('location:halaman_anggota/index_anggota.php');
    } elseif (mysqli_num_rows($querymanager) == 1) {
        $_SESSION["manager"] = $result3;
        $_SESSION['id_manager'] = $result3['id_manager'];
        $_SESSION['username'] = $result3['username'];
        $_SESSION['password'] = $result3['password'];
        $_SESSION['nama'] = $result3['nama_manager'];
        $_SESSION['alamat'] = $result3['alamat'];
        $_SESSION['no_tlp'] = $result3['no_tlp'];
        $_SESSION['no_ktp'] = $result3['no_ktp'];
        $_SESSION['foto_anggota'] = $result3['foto_anggota'];
    header('location:manager/index_manager.php');
    } elseif (mysqli_num_rows($querysupplier) == 1) {
        $_SESSION["supplier"] = $result4;
        $_SESSION['id_supplier'] = $result4['id_supplier'];
        $_SESSION['username'] = $result4['username'];
        $_SESSION['password'] = $result4['password'];
        $_SESSION['nama'] = $result4['nama_supplier'];
        $_SESSION['alamat'] = $result4['alamat'];
        $_SESSION['no_tlp'] = $result4['no_tlp'];
        $_SESSION['no_ktp'] = $result4['no_ktp'];
        $_SESSION['foto_supplier'] = $result4['foto_anggota'];
    header('location:supplier/index_supplier.php');
    }
    else {
    echo "Login Gagal";
    } 
    }
    ?>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/laptop.jpg", {
      speed: 500
    });
  </script>
</body>

</html>
