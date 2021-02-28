<div class="container-fluid"> 
	<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Data Tools Habis Pakai</h3>
        </div>
        <div class="card-body">
        <strong class="card-title"><a class="btn btn-success" style="border-radius:20px" href="<?php echo base_url();?>toolkeeper/form_tambah_tools_hp"><input type="image" src="<?php echo base_url('assets/img/plus.png');?>" style="height:20px;position:relative;top:4px">&nbsp;Tambah Data</a></strong>
        &nbsp;
        <strong class="card-title"><a class="btn btn-info" style="border-radius:20px" href="<?php echo base_url();?>toolkeeper/cetak_tools_hp" target="_BLANK"><input type="image" src="<?php echo base_url('assets/img/print.png');?>" style="height:20px;position:relative;top:4px">&nbsp;Cetak Data Tools</a></strong>

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
                            <th>QTY Total</th>
                            <th>QTY Diambil</th>
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
                    	foreach($tools_hp as $thp){?>
                        <tr>
                            <td><?php echo $no;?></td><?php $no++;?>
                            <td><?php echo $thp->kode_tools_hp;?></td>
                            <td><?php echo $thp->nama_tools_hp;?></td>
                            <td><?php echo $thp->frek_pem_hp;?></td>
                            <td><?php echo $thp->qty_hp;?></td>
                            <td><?php echo $thp->qty_diambil_hp;?></td>
                            <td><?php echo $thp->satuan;?></td>
                            <td><?php echo $thp->rak_hp;?></td>
                            <td><?php echo $thp->tgl_msk_hp;?></td>
                            <td><?php echo $thp->keterangan;?></td>
                            <td>
                            	<div class="row">
                            		<div class="col-sm-2">
                            			<form method="POST" action="<?php echo base_url();?>toolkeeper/form_edit_tools_hp">
                            				<input type="hidden" name="kode_tools_hp" value="<?php echo $thp->kode_tools_hp;?>">
                            				<input type="image" src="<?php echo base_url('assets/img/edit.png');?>" style="width:25px;position:relative;top:10px">
                            			</form>
                            		</div>
                            		&ensp;
                            		<div class="col-sm-2">
                            			<form method="POST" action="<?php echo base_url();?>toolkeeper/hapus_tools_hp">
                            				<input type="hidden" name="kode_tools_hp" value="<?php echo $thp->kode_tools_hp;?>">
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
