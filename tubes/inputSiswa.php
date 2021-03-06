<!DOCTYPE html>
<html lang="en">
<?php
   // buat koneksi
   $conn = mysqli_connect("localhost","root","","pendidikan");

   // cek apakah button submit sudah di tekan atau belum
   if(isset($_POST['submit']))
   {
        $nim = $_POST["nim"];
        $nama = $_POST["nama"];
        $alamat = $_POST["alamat"];
        $ttl = $_POST["ttl"];
        $email = $_POST["email"];

        $query = " INSERT INTO siswa
        VALUES
        ('','$nim','$nama','$alamat','$ttl','$email')";
        mysqli_query($conn,$query);
        if(mysqli_affected_rows($conn) > 0) {
          echo "
          <script>
      alert('data berhasil disimpan');
      document.location.href = 'dataSiswa.php';
      </script>
      ";
      }
      else {
          echo "
          <script>
          alert('data gagal disimpan');
          document.location.href = 'dataSiswa.php';
          </script>";
          echo "<br>";
          echo mysqli_error($conn);
      }
  }

?>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/pendidikan.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.php">Pendidikan</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <!-- <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li> -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <!-- <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div> -->
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Login Screens:</h6>
            <a class="dropdown-item" href="login.php">Login</a>
            <a class="dropdown-item" href="register.php">Register</a>
            <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Other Pages:</h6>
          </div>
        </li>
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown">
            <i class="fas fa-fw fa-folder"></i>
            <span>Master Data</span>
          </a>
          <div class="dropdown-menu">
            <h6 class="dropdown-header">Data : </h6>
            <a class="dropdown-item" href="dataSiswa.php">Data Siswa</a>
            <a class="dropdown-item" href="dataGuru.php">Data Guru</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown">
            <i class="fas fa-fw fa-folder"></i>
            <span>Input Data</span>
          </a>
          <div class="dropdown-menu">
            <h6 class="dropdown-header">Input : </h6>
            <a class="dropdown-item" href="inputSiswa.php">Data Siswa</a>
            <a class="dropdown-item" href="inputGuru.php">Data Guru</a>
        </li>
        <li class="nav-item active">
          <!-- <a class="nav-link" href="tables.php">
            <i class="fas fa-fw fa-table"></i> -->
            <span>Tables</span></a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active">Data Siswa</li>
          </ol>

          <!-- Input Data -->
          <form action="" method="post">
          <div class="form-group">
          <div class=form-label-group>
          <div class="form-row col-lg-auto">
          <div class="col-lg-1 form-text"> 
          <label  for="nim">Nim</label>
          </div>
          <div class="col-lg-5">
          <input type="text" class="form-control" id="nim" name="nim" placeholder="nim"  required>
          </div>
          </div>
          </br>
          <div class="form-row col-lg-auto">
          <div class="col-lg-1 form-text">
          <label for="nama">Nama</label>
          </div>
          <div class="col-lg-5">
          <input type="text" name="nama" id="nama"  class="form-control" placeholder="nama" >
          </div>
          </div>
          </br>
          <div class="form-row col-lg-auto">
          <div class="col-lg-1 form-text">
          <label for="alamat">Alamat</label>
          </div>
          <div class="col-lg-5">
          <input class="form-control"type="textarea" name="alamat" id="alamat"  placeholder="alamat">
          </div>
          </div>
          </br>
          <div class="form-row col-lg-auto">
          <div class="col-lg-1 form-text">
          <label for="date">Tanggal Lahir</label>
          </div>
          <div class="col-lg-5">
          <input type="date" name="date" id="ttl"class="form-control " >
          </div>
          </div>
          </br>
          <div class="form-row col-lg-auto">
          <div class="col-lg-1 form-text">
          <label for="email">Email</label>
          </div>
          <div class="col-lg-5">
          <input class="form-control"type="textarea" name="email" id="email"  placeholder="email">
          </div>
          </div>
          </br>
          <div class="form-row col-lg-auto">
          <button type="submit" name="submit" id="submit" class="btn btn-primary btn-success btn-block">Tambah</button>
          </div>
          </form>
          </div>
          
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Satya Website</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>

  </body>

</html>
