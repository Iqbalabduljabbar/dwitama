<div class="container-fluid"> 
	<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary"><?=$title?></h3>
        </div>
        <br>
        <div class="col-md-6 col-sm-6">
        <?= $this->session->flashdata('message'); ?>
        </div>
        <form action="<?php echo base_url();?>auth/ganti_password" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Password Lama<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" type="password" id="password_lama" name="password_lama" placeholder="Masukan Password Lama Anda">
                    <?= form_error('password_lama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Password Baru<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" type="password" id="password_baru1" name="password_baru1" placeholder="Masukan Password Baru Anda">
                    <?= form_error('password_baru1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Konfirmasi Password Baru<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" type="password" id="password_baru2" name="password_baru2" placeholder="Ulangi Password Baru Anda">
                    <?= form_error('password_baru2', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <br>
            <div class="form-group">
                <div class="col-md-6 col-sm-3" style="text-align: left">
                    <a href="<?= base_url(); ?>auth/Toolkeeper" class="btn btn-danger" style="border-radius: 20px;"><input type="image" src="<?php echo base_url('assets/img/return.png');?>" style="height:20px;position:relative;top:4px">&nbsp;Kembali</a>
                    <button type="submit" style="border-radius: 20px;" class="btn btn-success" onclick="return confirm('Anda yakin ingin simpan data ini ?')">Submit&nbsp;<input type="image" src="<?php echo base_url('assets/img/check.png');?>" style="height:20px;position:relative;top:3px"></button>
                </div>
            </div>  
        </form> 
    </div>
