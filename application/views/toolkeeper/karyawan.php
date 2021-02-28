
<div class="container-fluid"> 
	<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Data <?= $title; ?></h3>
        </div>
        <div class="card-body">
        <strong class="card-title"><a class="btn btn-success" style="border-radius:20px" href="<?php echo base_url();?>toolkeeper/form_tambah_karyawan"><input type="image" src="<?php echo base_url('assets/img/plus.png');?>" style="height:20px;position:relative;top:4px">&nbsp;Tambah Data</a></strong>
        &nbsp;

        <strong class="card-title"><a class="btn btn-info" style="border-radius:20px" href="<?php echo base_url();?>toolkeeper/cetak_karyawan" target="_BLANK"><input type="image" src="<?php echo base_url('assets/img/print.png');?>" style="height:20px;position:relative;top:4px">&nbsp;Cetak Data Karyawan</a></strong>

        <strong class="card-title float-right"><?php date_default_timezone_set("Asia/Jakarta"); echo "Tanggal " . date("d-m-Y"); ?></strong>
        <br><br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama Karyawan</th>
                            <th>Jenis Kelamin</th>
                            <th>Jabatan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                       </tr>
                    </thead>
                    <tbody>
                    	<?php
                    	$no=1;
                    	foreach($karyawan as $k){?>
                        <tr>
                            <td><?php echo $no;?></td><?php $no++;?>
                            <td><?php echo $k->nik;?></td>
                            <td><?php echo $k->nama_karyawan;?></td>
                            <td><?php echo $k->jenis_kelamin;?></td>
                            <td><?php echo $k->jabatan;?></td>
                            <td><?php echo $k->status;?></td>
                            <td>
                            	<div class="row">
                            		<div class="col-sm-2">
                            			<form method="POST" action="<?php echo base_url();?>toolkeeper/form_edit_karyawan">
                            				<input type="hidden" name="nik" value="<?php echo $k->nik;?>">
                            				<input type="image" src="<?php echo base_url('assets/img/edit.png');?>" style="width:25px;position:relative;top:5px">
                            			</form>
                            		</div>
                            		&ensp;
                            		<div class="col-sm-2">
                            			<form method="POST" action="<?php echo base_url();?>toolkeeper/hapus_karyawan">
                            				<input type="hidden" name="nik" value="<?php echo $k->nik;?>">
                            				<input type="image" src="<?php echo base_url('assets/img/hapus.png');?>" style="width:25px;position:relative;top:5px" onClick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')">
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