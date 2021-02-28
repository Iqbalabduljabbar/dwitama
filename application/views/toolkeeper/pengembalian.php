

<div class="container-fluid"> 
	<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Data Pengembalian</h3>
        </div>
        <div class="card-body">
        <strong class="card-title"><a class="btn btn-success" style="border-radius:20px" href="<?php echo base_url();?>toolkeeper/form_tambah_pengembalian"><input type="image" src="<?php echo base_url('assets/img/plus.png');?>" style="height:20px;position:relative;top:4px">&nbsp;Tambah Data</a></strong>
        &nbsp;
        <strong class="card-title"><a class="btn btn-info" style="border-radius:20px" href="<?php echo base_url();?>toolkeeper/cetak_pengembalian" target="_BLANK">Cetak Data Pengembalian&nbsp;<input type="image" src="<?php echo base_url('assets/img/print.png');?>" style="height:20px;position:relative;top:4px">&nbsp;</a></strong>

        <strong class="card-title float-right"><?php date_default_timezone_set("Asia/Jakarta"); echo "Tanggal " . date("d-m-Y"); ?></strong>
        <br><br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id Pengembalian</th>
                            <th>Tanggal Kembali</th>
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
                        foreach($pengembalian as $kem){?>
                        <tr>
                            <td><?php echo $no;?></td><?php $no++;?>
                            <td><?php echo $kem->id_kembali;?></td>
                            <td><?php echo $kem->tanggal_kembali;?></td>
                            <td><?php echo $kem->nik;?></td>
                            <td><?php echo $kem->nama_karyawan;?></td>
                            <td><?php echo $kem->jabatan;?></td>
                            <td><?php echo $kem->kode_tools;?></td>
                            <td><?php echo $kem->nama_tools;?></td>
                            <td><?php echo $kem->qty_dikembalikan;?></td>
                            <td><?php echo $kem->rak;?></td>                 
                            <td>
                                <!-- <div class="row">
                                    <div class="col-sm-2">
                                        <form method="POST" action="<?php echo base_url();?>toolkeeper/form_edit_pengembalian">
                                            <input type="hidden" name="id_kembali" value="<?php echo $kem->id_kembali;?>">
                                            <input type="image" src="<?php echo base_url('assets/img/edit.png');?>" style="width:25px;position:relative;top:5px";>
                                        </form>
                                    </div>
                                    &ensp; -->
                                    <div class="col-sm-2">
                                        <form method="POST" action="<?php echo base_url();?>toolkeeper/hapus_pengembalian">
                                            <input type="hidden" name="id_kembali" value="<?php echo $kem->id_kembali;?>">
                                            <input type="image" src="<?php echo base_url('assets/img/hapus.png');?>" style="width:25px;position:relative;top:5px"; onClick="return confirm('Anda yakin ingin menghapus data ini?')">
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
