<?php
@session_start();
  // error_reporting(0);
include '../config/koneksi.php';
include '../config/fungsi_koperasi.php';
if ($_SESSION['manager'] == null) {
  echo "<script>alert('Harap login terlebih dahulu');window.location.href='login.php'</script>";
}
if (isset($_GET['logout'])) {
  session_destroy();
  header('Location:../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Sistem Koperasi Pasar Kranji Bekasi</title>

  <!-- Favicons -->
  <link href="../img/logo1.png" rel="icon">
  <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="../lib/gritter/css/jquery.gritter.css" />
  <link rel="stylesheet" href="../assets/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../lib/bootstrap-fileupload/bootstrap-fileupload.css" />
  <link rel="stylesheet" type="text/css" href="../lib/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="../lib/bootstrap-daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" type="text/css" href="../lib/bootstrap-timepicker/compiled/timepicker.css" />
  <link rel="stylesheet" type="text/css" href="../lib/bootstrap-datetimepicker/datertimepicker.css" />
  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">
  <link href="../css/table-responsive.css" rel="stylesheet">
  <script src="../lib/chart-master/Chart.js"></script>


</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b><span>Koperasi</span> Pasar Kranji</b></a>
      <!--logo end-->
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="?logout">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href=""><img src="../img/ava1.png" class="img-circle" width="80"></a></p>
          <h5 class="centered"><?= $_SESSION['nama'] ?></h5>
          <li class="mt">
            <a href="index_manager.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-user"></i>
              <span>Anggota Koperasi</span>
              </a>
            <ul class="sub">
              <li><a href="?halaman=anggota">Data Anggota</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-user"></i>
              <span>Supplier Koperasi</span>
              </a>
            <ul class="sub">
              <li><a href="?halaman=supplier">Data Supplier</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-book"></i>
              <span>Barang Dagang</span>
              </a>
            <ul class="sub">
              <li><a href="?halaman=barang_dagang">Barang Dagang</a></li>
              <li><a href="?halaman=barang">Data Barang Dagang</a></li>
              <li><a href="?halaman=kebutuhan">Kebutuhan Barang Anggota</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>Pengelolaan Keuangan</span>
              </a>
            <ul class="sub">
              <li><a href="?halaman=simpanan">Simpanan</a></li>
              <li><a href="?halaman=pinjaman">Pinjaman</a></li>
              <!-- <li><a href="">Bayar Pinjaman</a></li> -->
              <li><a href="?halaman=iuran">Iuran</a></li>
              <!-- <li><a href="">Denda</a></li> -->
            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <div class="content-wrapper">
      <section class="content">
        
        <?php  

        $page = @$_GET['halaman'];
        $aksi = @$_GET['aksi'];
        $page=strtolower($page);
        switch ($page) {
          // case 'user':
          //   if ($aksi == "tambah"){
          //     include 'halaman/user/create_user.php';
          //   } elseif ($aksi == "edit") {
          //     include 'halaman/user/edit_user.php';
          //   } elseif ($aksi == "delete") {
          //     include 'halaman/user/delete_user.php';
          //   }elseif ($aksi == "new") {
          //     include 'halaman/user/index.php';
          //   }
          //    else {
          //     include 'halaman/user/index_user.php';
          //   }
          //   break;
          
          case 'anggota':
            if ($aksi == "tambah"){
              include 'anggota/create_anggota.php';
            } elseif ($aksi == "edit") {
              include 'anggota/edit_anggota.php';
            } elseif ($aksi == "delete") {
              include 'anggota/delete_anggota.php';
            } else {
              include 'anggota/index_anggota.php';
            }
            # code...
            break;

          case 'supplier':
            if ($aksi == "tambah"){
              include 'supplier/create_supp.php';
            } elseif ($aksi == "edit") {
              include 'supplier/edit_supp.php';
            } elseif ($aksi == "delete") {
              include 'supplier/delete_supp.php';
            } else {
              include 'supplier/index_supp.php';
            }
            # code...
            break;

          // case 'manager':
          //   if ($aksi == "tambah"){
          //     include 'manager/create_manager.php';
          //   } elseif ($aksi == "edit") {
          //     include 'manager/edit_manager.php';
          //   } elseif ($aksi == "delete") {
          //     include 'manager/delete_manager.php';
          //   } else {
          //     include 'manager/index_manager.php';
          //   }
          //   # code...
          //   break;

          case 'barang':
            if ($aksi == "tambah"){
              include 'barang_dagang/create_barang.php';
            } elseif ($aksi == "edit") {
              include 'barang_dagang/edit_barang.php';
            } elseif ($aksi == "delete") {
              include 'barang_dagang/delete_barang.php';
            } else {
              include 'barang_dagang/index_barang.php';
            }
            # code...
            break;

          case 'barang_dagang':
            if ($aksi == "tambah"){
              include 'barang/create_nama_barang.php';
            } elseif ($aksi == "edit") {
              include 'barang/edit_nama_barang.php';
            } elseif ($aksi == "delete") {
              include 'barang/delete_nama_barang.php';
            } else {
              include 'barang/index_nama_barang.php';
            }
            # code...
            break;

          case 'kebutuhan':
            if ($aksi == "detail"){
              include 'pembelian_anggota/detail_pembelian.php';
            } elseif ($aksi == "edit") {
              include 'barang/edit_nama_barang.php';
            } elseif ($aksi == "delete") {
              include 'barang/delete_nama_barang.php';
            } else {
              include 'pembelian_anggota/index_kebutuhan_barang.php';
            }
            # code...
            break;

          case 'simpanan':
            if ($aksi == "tambah"){
              include 'simpanan/create_simpan.php';
            } elseif ($aksi == "edit") {
              include 'simpanan/edit_simpan.php';
            } elseif ($aksi == "delete") {
              include 'simpanan/delete_simpan.php';
            } else {
              include 'simpanan/index_simpan.php';
            }
            # code...
            break;

            case 'pinjaman':
            if ($aksi == "tambah"){
              include 'pinjaman/create_pinjam.php';
            } elseif ($aksi == "edit") {
              include 'pinjaman/edit_pinjam.php';
            } elseif ($aksi == "delete") {
              include 'pinjaman/delete_pinjam.php';
            } else {
              include 'pinjaman/index_pinjam.php';
            }
            # code...
            break;

            case 'iuran':
              if ($aksi == "tambah"){
                include 'iuran/create_iuran.php';
              } elseif ($aksi == "edit") {
                include 'iuran/edit_iuran.php';
              } elseif ($aksi == "delete") {
                include 'iuran/delete_iuran.php';
              } else {
                include 'iuran/index_iuran.php';
              }
              # code...
              break;

            // case 'least':
            
            //     include 'halaman/metode/index_least.php';
              
            //   break;

            default:
            include 'home/index_home.php';
        }
        ?>
      </section>
    </div>
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="../lib/jquery/jquery.min.js"></script>

  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="../lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../lib/jquery.scrollTo.min.js"></script>
  <script src="../lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="../lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="../lib/common-scripts.js"></script>
  <script src="../lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script type="text/javascript" src="../lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="../lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="../lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="../lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="../lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="../lib/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="../lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script src="../lib/advanced-form-components.js"></script>
  <script type="text/javascript" src="../lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="../lib/gritter-conf.js"></script>
  <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script>
  $(function () {
    $("#example1").DataTable();
    $("#dariom").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>
  <!--script for this page-->
  <script src="../lib/sparkline-chart.js"></script>
  <script src="../lib/zabuto_calendar.js"></script>
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
</body>
</html>
