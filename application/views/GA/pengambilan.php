<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dwitama - Pengambilan</title>

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
    <!--<link href="<?= base_url('assets/'); ?>bootstrap/css/bootstrap.css" rel="stylesheet">-->

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
          background-color: white;
          color: black;
          text-align: center;
          width: 100%;
          height: 25px;
          font-size: 14px;
        }

        .topnav-right {
            float: right;
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
          <a class="nav-link active" aria-current="page" href="<?php echo base_url()?>auth/GA">Beranda</a>
        </li>
        &ensp;
        <li class="nav-item">
          <a class="nav-link active" href="<?php echo base_url();?>GA/kelola_karyawan">Laporan Data Karyawan</a>
        </li>
        &ensp;
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span>Laporan Data Tools</span>&ensp;
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo base_url();?>GA/kelola_tools_hp">Tools Habis Pakai</a>
              <a class="dropdown-item" href="<?php echo base_url();?>GA/kelola_tools_kem">Tools Kembali</a>
            </div>
        </li>
        &ensp;
        <li class="nav-item">
          <a class="nav-link active" href="<?php echo base_url();?>GA/kelola_peminjaman">Laporan Data Peminjaman</a>
        </li>
        &ensp;
        <li class="nav-item">
          <a class="nav-link active" href="<?php echo base_url();?>GA/kelola_pengembalian">Laporan Data Pengembalian</a>
        </li>
        &ensp;
        <li class="nav-item">
          <a class="nav-link active" href="<?php echo base_url();?>GA/kelola_pengambilan">Laporan Data Pengambilan</a>
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
            <h3 class="m-0 font-weight-bold text-primary">Data Pengambilan</h3>
        </div>
        <div class="card-body">
        <strong class="card-title"><a class="btn btn-info" style="border-radius:20px" href="<?php echo base_url();?>GA/cetak_pengambilan" target="_BLANK">Cetak Data Pengambilan&nbsp;<input type="image" src="<?php echo base_url('assets/img/print.png');?>" style="height:20px;position:relative;top:4px">&nbsp;</a></strong>

        <strong class="card-title float-right"><?php date_default_timezone_set("Asia/Jakarta"); echo "Tanggal " . date("d-m-Y"); ?></strong>
        <br><br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id Pengambilan</th>
                            <th>Tanggal Pengambilan</th>
                            <th>NIK</th>
                            <th>Nama Karyawan</th>
                            <th>Jabatan</th>
                            <th>Kode Tools</th>
                            <th>Nama Tools</th>
                            <th>QTY Diambil</th>
                            <th>Rak</th>                                
                       </tr>
                    </thead>
                    <tbody>
                    	<?php
                    	$no=1;
                    	foreach($pengambilan as $amb){?>
                        <tr>
                            <td><?php echo $no;?></td><?php $no++;?>
                            <td><?php echo $amb->id_pengambilan;?></td>
                            <td><?php echo $amb->tgl_pengambilan;?></td>
                            <td><?php echo $amb->nik;?></td>
                            <td><?php echo $amb->nama_karyawan;?></td>
                            <td><?php echo $amb->jabatan;?></td>
                            <td><?php echo $amb->kode_tools_hp;?></td>
                            <td><?php echo $amb->nama_tools_hp;?></td>
                            <td><?php echo $amb->qty_diambil;?></td>
                            <td><?php echo $amb->rak_hp;?></td>                 
                        </tr>
                    	<?php }?>
                    </tbody>
                </table>
            </div>
    	</div>
    </div>
</div>

<div class="footer">
  <p>2021 - PT.DWITAMA MULYA PERSADA</p>
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
    <!--<script src="<?= base_url('assets/'); ?>bootstrap/js/bootstrap.js"></script>-->


</body>

</html>