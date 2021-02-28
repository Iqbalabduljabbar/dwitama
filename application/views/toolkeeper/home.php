<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <br>
               
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url()?>auth/Toolkeeper">
                <img class="img-profile rounded-circle" src="<?php echo base_url('foto/').$this->session->userdata('foto');?>" class="px-1 py-2" style="border-radius:50%; width:100px; height: 100px">    
            </a><br>
            <li class="nav-item">
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <span>Hallo <?php echo $this->session->userdata('nama');?></span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pengaturan:</h6>
                        <a class="collapse-item" href="<?php echo base_url();?>auth/ganti_password">Ganti Password</a>
                        <a class="collapse-item" href="<?php echo base_url();?>auth/edituser">Edit Data User</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Beranda -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>auth/Toolkeeper">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Beranda</span></a>
            </li>

            <!-- Nav Item - Karyawan -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>toolkeeper/kelola_karyawan">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Data Karyawan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Tools</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tipe Tools:</h6>
                        <a class="collapse-item" href="<?php echo base_url();?>toolkeeper/kelola_tools_hp">Tools Habis Pakai</a>
                        <a class="collapse-item" href="<?php echo base_url();?>toolkeeper/kelola_tools_kem">Tools Kembali/Pinjam</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>toolkeeper/kelola_peminjaman">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Peminjaman</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>toolkeeper/kelola_pengembalian">
                    <i class="fas fa-fw fa-download"></i>
                    <span>Data Pengembalian</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>toolkeeper/kelola_pengambilan">
                    <i class="fas fa-fw fa-download"></i>
                    <span>Data Pengambilan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar)
            <div class="text-center d-none d-md-inline">            
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>-->

            <!--Sidebar Logout-->
            <div class="text-center d-none d-md-inline">
                <a href="<?php echo site_url('auth/logout');?>" class="btn btn-danger px-4 py-1"  style="border-radius:20px">Logout</a>
            </div>
        </ul>
        <!-- End of Sidebar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="col-sm-12" style="text-align:center;margin-top:140px;position:relative;">
                          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                                <img class="img-profile" src="<?php echo base_url('assets/img/logodwi.png');?>" class="px-1 py-2" style="width:150px">    
                          </a>
                          <br><br>
                          <h2><strong>SELAMAT DATANG DI</strong></h2>
                          <h2><strong>SISTEM INFORMASI MANAJEMEN TOOLS</strong></h2>
                          <h2><strong>PT.DWITAMA MULYA PERSADA</strong></h2>
                          <hr class ="col-sm-8" style="border-width:2px;border-color:blue">
                          <h5><span class="glyphicon glyphicon-time"></span> Kawasan industri De Prima blok D1-07</h5>
                          <h5><span class="glyphicon glyphicon-time"></span> Jl.Raya sapan, Tegalluar, Kab.Bandung Jawa Barat 40287</h5>
                          <h5><span class="glyphicon glyphicon-time"></span>Telp.(022) 8888 1810 - Email: Sales@dwitama.co.id</h5>
                    </div>
                </div>

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

          