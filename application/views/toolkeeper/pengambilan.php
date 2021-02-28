
<div class="container-fluid"> 
	<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Data Pengambilan</h3>
        </div>
        <div class="card-body">
        <strong class="card-title"><a class="btn btn-success" style="border-radius:20px" href="<?php echo base_url();?>toolkeeper/form_tambah_pengambilan"><input type="image" src="<?php echo base_url('assets/img/plus.png');?>" style="height:20px;position:relative;top:4px">&nbsp;Tambah Data</a></strong>
        &nbsp;
        <strong class="card-title"><a class="btn btn-info" style="border-radius:20px" href="<?php echo base_url();?>toolkeeper/cetak_pengambilan" target="_BLANK">Cetak Data Peminjaman&nbsp;<input type="image" src="<?php echo base_url('assets/img/print.png');?>" style="height:20px;position:relative;top:4px">&nbsp;</a></strong>

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
                            <th>Aksi</th>                                
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
                            <td>
                            	<!-- <div class="row">
                            		<div class="col-sm-2">
                            			<form method="POST" action="<?php echo base_url();?>toolkeeper/form_edit_pengambilan">
                            				<input type="hidden" name="id_pengambilan" value="<?php echo $amb->id_pengambilan;?>">
                            				<input type="image" src="<?php echo base_url('assets/img/edit.png');?>" style="width:25px;position:relative;top:5px";>
                            			</form>
                            		</div>
                            		&ensp; -->
                            		<div class="col-sm-2">
                            			<form method="POST" action="<?php echo base_url();?>toolkeeper/hapus_pengambilan">
                            				<input type="hidden" name="id_pengambilan" value="<?php echo $amb->id_pengambilan;?>">
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
