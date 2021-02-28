<div class="container-fluid"> 
	<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Data Tools Pinjam / Kembali</h3>
        </div>
        <div class="card-body">
        <strong class="card-title"><a class="btn btn-success" style="border-radius:20px" href="<?php echo base_url();?>toolkeeper/form_tambah_tools"><input type="image" src="<?php echo base_url('assets/img/plus.png');?>" style="height:20px;position:relative;top:4px">&nbsp;Tambah Data</a></strong>
        &nbsp;
        <strong class="card-title"><a class="btn btn-info" style="border-radius:20px" href="<?php echo base_url();?>toolkeeper/cetak_tools" target="_BLANK"><input type="image" src="<?php echo base_url('assets/img/print.png');?>" style="height:20px;position:relative;top:4px">&nbsp;Cetak Data Tools</a></strong>

        <strong class="card-title float-right"><?php date_default_timezone_set("Asia/Jakarta"); echo "Tanggal " . date("d-m-Y"); ?></strong>
        <br><br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Tools</th>
                            <th>Nama Tools</th>
                            <th>Frekuensi Pemakaian</th>
                            <th>QTY</th>
                            <th>QTY Dipinjam</th>
                            <th>Satuan</th>
                            <th>Rak</th>
                            <th>Tanggal Masuk</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
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
                            <td><?php echo $t->stok_awal;?></td>
                            <td><?php echo $t->qty;?></td>
                            <td><?php echo $t->satuan;?></td>
                            <td><?php echo $t->rak;?></td>
                            <td><?php echo $t->tanggal_masuk;?></td>
                            <td><?php echo $t->keterangan;?></td>
                            <td>
                            	<div class="row">
                            		<div class="col-sm-2">
                            			<form method="POST" action="<?php echo base_url();?>toolkeeper/form_edit_tools">
                            				<input type="hidden" name="kode_tools" value="<?php echo $t->kode_tools;?>">
                            				<input type="image" src="<?php echo base_url('assets/img/edit.png');?>" style="width:25px;position:relative;top:10px">
                            			</form>
                            		</div>
                            		&ensp;
                            		<div class="col-sm-2">
                            			<form method="POST" action="<?php echo base_url();?>toolkeeper/hapus_tools">
                            				<input type="hidden" name="kode_tools" value="<?php echo $t->kode_tools;?>">
                            				<input type="image" src="<?php echo base_url('assets/img/hapus.png');?>" style="width:25px;position:relative;top:10px"; onClick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')">
                            			</form>
                            		</div>
                            	</div>
                            </td>
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


</body>

</html>