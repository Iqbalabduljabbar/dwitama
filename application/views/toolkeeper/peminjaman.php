
<div class="container-fluid"> 
	<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Data Peminjaman</h3>
        </div>
        <div class="card-body">
        <strong class="card-title"><a class="btn btn-success" style="border-radius:20px" href="<?php echo base_url();?>toolkeeper/form_tambah_peminjaman"><input type="image" src="<?php echo base_url('assets/img/plus.png');?>" style="height:20px;position:relative;top:4px">&nbsp;Tambah Data</a></strong>
        &nbsp;
        <strong class="card-title"><a class="btn btn-info" style="border-radius:20px" href="<?php echo base_url();?>toolkeeper/cetak_peminjaman" target="_BLANK">Cetak Data Peminjaman&nbsp;<input type="image" src="<?php echo base_url('assets/img/print.png');?>" style="height:20px;position:relative;top:4px">&nbsp;</a></strong>

        <strong class="card-title float-right"><?php date_default_timezone_set("Asia/Jakarta"); echo "Tanggal " . date("d-m-Y"); ?></strong>
        <br><br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id Pinjam</th>
                            <th>Tanggal Pinjam</th>
                            <th>NIK</th>
                            <th>Nama Karyawan</th>
                            <th>Jabatan</th>
                            <th>Kode Tools</th>
                            <th>Nama Tools</th>
                            <th>QTY</th>
                            <th>Rak</th>
                            <th>Aksi</th>                                
                       </tr>
                    </thead>
                    <tbody>
                    	<?php
                    	$no=1;
                    	foreach($peminjaman as $pem){?>
                        <tr>
                            <td><?php echo $no;?></td><?php $no++;?>
                            <td><?php echo $pem->id_pinjam;?></td>
                            <td><?php echo $pem->tanggal_pinjam;?></td>
                            <td><?php echo $pem->nik;?></td>
                            <td><?php echo $pem->nama_karyawan;?></td>
                            <td><?php echo $pem->jabatan;?></td>
                            <td><?php echo $pem->kode_tools;?></td>
                            <td><?php echo $pem->nama_tools;?></td>
                            <td><?php echo $pem->jumlah_pinjam;?></td>
                            <td><?php echo $pem->rak;?></td>                 
                            <td>
                            	<!-- <div class="row">
                            		<div class="col-sm-2">
                            			<form method="POST" action="<?php echo base_url();?>toolkeeper/form_edit_peminjaman">
                            				<input type="hidden" name="id_pinjam" value="<?php echo $pem->id_pinjam;?>">
                            				<input type="image" src="<?php echo base_url('assets/img/edit.png');?>" style="width:25px;position:relative;top:5px";>
                            			</form>
                            		</div>
                            		&ensp; -->
                            		<div class="col-sm-2">
                            			<form method="POST" action="<?php echo base_url();?>toolkeeper/hapus_peminjaman">
                            				<input type="hidden" name="id_pinjam" value="<?php echo $pem->id_pinjam;?>">
                            				<input type="image" src="<?php echo base_url('assets/img/hapus.png');?>" style="width:25px;position:relative;top:5px"; onClick="return confirm('Data tools yang belum dikembalikan tidak dapat dihapus!')">
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

