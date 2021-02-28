<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <br>
               
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url()?>auth/GA">
                <img class="img-profile rounded-circle" src="<?php echo base_url('assets/img/dp.jpg');?>" class="px-1 py-2" style="width:100px" readonly>    
            </a><br>
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url()?>auth/GA" readonly>
                <div class="sidebar-brand-text mx-3">Hallo <?php echo $this->session->userdata('nama');?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>auth/GA">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Beranda</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>GA/kelola_karyawan">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Laporan Data Karyawan</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Laporan Data Tools</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tipe Tools:</h6>
                        <a class="collapse-item" href="<?php echo base_url();?>GA/kelola_tools_hp">Tools Habis Pakai</a>
                        <a class="collapse-item" href="<?php echo base_url();?>GA/kelola_tools_kem">Tools Kembali/Pinjam</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>GA/kelola_peminjaman">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Laporan Data Peminjaman</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>GA/kelola_pengembalian">
                    <i class="fas fa-fw fa-download"></i>
                    <span>Laporan Data Pengembalian</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>GA/kelola_pengambilan">
                    <i class="fas fa-fw fa-download"></i>
                    <span>Laporan Data Pengambilan</span></a>
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

            <!-- Footer -->
            <div class="footer">
                <p>2021 - PT.DWITAMA MULYA PERSADA</p>
            </div>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>