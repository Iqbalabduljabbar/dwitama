<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dwitama - <?= $title; ?></title>

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
          bottom: 10;
          width: 100%;
          background-color: white;
          color: black;
          text-align: center;
          width: 100%;
          height: 25px;
          font-size: 12px;
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
          <img class="img-profile rounded-circle" src="<?php echo base_url('foto/').$this->session->userdata('foto');?>" class="px-1 py-2" style="height:25px; width:25px ">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo site_url('auth/edituser');?>">Edit User</a>
          <a class="dropdown-item" href="<?php echo site_url('auth/ganti_password');?>">Ganti Password</a>
          <a class="dropdown-item" href="<?php echo site_url('auth/logout');?>">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<br>