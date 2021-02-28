<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cetak Data Tools Kembali / Pinjam PT.Dwitama</title>

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

    <title><?php echo $judkar; ?></title>
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

<div class="container-fluid"> 
	<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Data Tools</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Tools</th>
                            <th>Nama Tools</th>
                            <th>Frekuensi Pemakaian</th>
                            <th>QTY</th>
                            <th>Satuan</th>
                            <th>Rak</th>
                            <th>Tanggal Masuk</th>
                            <th>Tipe Pakai</th>
                            <th>Keterangan</th>
                       </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        foreach($tools as $t){?>
                        <tr>
                            <td><?php echo $no;?></td><?php $no++;?>
                            <td><?php echo $t->kode_tools;?></td>
                            <td><?php echo $t->nama_tools;?></td>
                            <td><?php echo $t->frek_pemakaian;?></td>
                            <td><?php echo $t->qty;?></td>
                            <td><?php echo $t->satuan;?></td>
                            <td><?php echo $t->rak;?></td>
                            <td><?php echo $t->tanggal_masuk;?></td>
                            <td><?php echo $t->tipe_pakai;?></td>
                            <td><?php echo $t->keterangan;?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
    	</div>
    </div>
</div>

<div class="footer">
  <p>2020 - PT.DWITAMA MULYA PERSADA</p>
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

    <!-- cetak script -->
    <script> window.print()</script>

</body>

</html>