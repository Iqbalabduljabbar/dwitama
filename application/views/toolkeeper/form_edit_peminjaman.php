<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dwitama - Edit Peminjaman</title>

    <!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="<?= base_url('assets/'); ?>css/login/images/logodwi.png"/>
    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

     <!-- Custom styles for this page -->
    <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style> 
        /* Modify the background color */ 
          
        .navbar-custom { 
            background-image: linear-gradient(to bottom right, #405452, #1490a3, #ffffff); 
        } 
        /* Modify brand and text color */ 
          
        .navbar-custom .navbar-brand, 
        .navbar-custom .navbar-text { 
            color: #edeb53; 
        } 

        .footer {
          position: absolute;
          opacity: 90%;
          left: 0;
          bottom: 0;
          width: 100%;
          background-color: black;
          color: white;
          text-align: center;
          width: 100%;
          height: 25px;
        }
    </style> 

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-light navbar-custom">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo base_url()?>auth/Toolkeeper">
    <img alt="Brand" src="http://localhost/dwitama/assets/css/login/images/logodwi.png" width="150px" height="50px" >
    </a>
    &ensp;
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url()?>auth/Toolkeeper">Home</a>
        </li>
        &ensp;
        <li class="nav-item">
          <a class="nav-link active" href="<?php echo base_url();?>toolkeeper/kelola_karyawan">Karyawan</a>
        </li>
        &ensp;
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span>Tools</span>&ensp;
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo base_url();?>toolkeeper/kelola_tools_hp">Tools Habis Pakai</a>
              <a class="dropdown-item" href="<?php echo base_url();?>toolkeeper/kelola_tools_kem">Tools Kembali</a>
            </div>
        </li>
        &ensp;
        <li class="nav-item">
          <a class="nav-link active" href="<?php echo base_url();?>toolkeeper/kelola_peminjaman">Peminjaman</a>
        </li>
        &ensp;
        <li class="nav-item">
          <a class="nav-link active" href="<?php echo base_url();?>toolkeeper/kelola_pengembalian">Pengembalian</a>
        </li>
        &ensp;
         <li class="nav-item">
          <a class="nav-link active" href="<?php echo base_url();?>toolkeeper/kelola_pengambilan">Pengambilan</a>
        </li>
      </ul>
    </div>
    <ul class="nav navbar-nav navbar-right">
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span><?php echo $this->session->userdata('nama');?></span>&ensp;
          <img class="img-profile rounded-circle" src="<?php echo base_url('assets/img/dp.jpg');?>" class="px-1 py-2" style="height:25px">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo site_url('auth/logout');?>">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<br>


<div class="container-fluid"> 
	<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Form Edit Data Peminjaman</h3>
        </div>
        <form action="<?php echo base_url();?>toolkeeper/edit_peminjaman" method="post">
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">ID Peminjaman<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" name="id_pinjam" placeholder="Masukan ID Peminjaman" type="text"onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@.1234567890',this") value="<?php echo $id_pinjam[0]->id_pinjam;?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Peminjaman<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" name="tanggal_pinjam" placeholder="Masukan Tanggal Peminjaman" type="date"onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@.1234567890',this") value="<?php echo $id_pinjam[0]->tanggal_pinjam;?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">NIK<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" name="nik" placeholder="Masukan NIK" type="text"onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@.1234567890',this") value="<?php echo $id_pinjam[0]->nik;?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Karyawan<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" name="nama_karyawan" placeholder="Masukan Nama Karyawan" type="text"onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@.1234567890',this") value="<?php echo $id_pinjam[0]->nama_karyawan;?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Jabatan<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <select name="jabatan" style="border-radius: 20px;" class="form-control" required>
                        <option value="<?php echo $id_pinjam[0]->jabatan;?>"></option>
                        <option value="QA & QC">QA & QC</option>
                        <option value="Operator">Operator</option>
                        <option value="General Affair">General Affair</option>
                        <option value="Finance">Finance</option>
                        <option value="CS">Customer Service</option>
                        <option value="PM & PPIC">PM & PPIC</option>
                        <option value="HRD">HRD</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Kode Tools<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" name="kode_tools" placeholder="Masukan Kode Tools" type="text"onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@.1234567890',this") value="<?php echo $id_pinjam[0]->kode_tools;?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Tools<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" name="nama_tools" placeholder="Masukan Nama Tools" type="text"onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@.1234567890',this") value="<?php echo $id_pinjam[0]->nama_tools;?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">QTY<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" name="qty" placeholder="Masukan QTY" type="number"onKeyPress="return goodchars(event,'1234567890',this") value="<?php echo $id_pinjam[0]->qty;?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Produksi<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" name="produksi" placeholder="Masukan Produksi" type="text"onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@.1234567890',this") value="<?php echo $id_pinjam[0]->produksi;?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Rak<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" name="rak" placeholder="Masukan rak" type="number" onKeyPress="return goodchars(event,'1234567890',this") value="<?php echo $id_pinjam[0]->rak;?>" required>
                </div>
            </div>
            <br>
            <div class="form-group">
                <div class="col-md-6 col-sm-6" style="text-align: left">
                    <a href="<?= base_url(); ?>toolkeeper/kelola_peminjaman" class="btn btn-danger" style="border-radius: 20px;"><input type="image" src="<?php echo base_url('assets/img/return.png');?>" style="height:20px;position:relative;top:4px">&nbsp;Kembali</a>
                    <button type="submit" style="border-radius: 20px;" class="btn btn-success" onclick="return confirm('Yakin Tambah User ?')">Submit&nbsp;<input type="image" src="<?php echo base_url('assets/img/check.png');?>" style="height:20px;position:relative;top:3px"></button>
                </div>
            </div>  
        </form>
    </div>
  <div class="footer">
    <p>2020 - PT.DWITAMA MULYA PERSADA</p>
  </div>
</div>       
  <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
</body>
</html>