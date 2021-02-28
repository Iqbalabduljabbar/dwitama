<div class="container-fluid"> 
	<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Form <?=$title?></h3>
        </div>
        <form action="<?php echo base_url();?>auth/tambah_edituser" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align"><span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" value="<?php echo $this->session->userdata('id'); ?>" name="id"  readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Username<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" value="<?php echo $this->session->userdata('username'); ?>" name="username" required>
                </div>
            </div>
			<div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Karyawan<span class="required"></span></label>  
                <div class="col-md-6 col-sm-6">
                     <input class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" name="nama" readonly required>
                </div>
            </div> 
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Level<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" value="<?php echo $this->session->userdata('level'); ?>" name="level" readonly required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Foto<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" name="foto" type="file" required>
                </div>
            </div>
            <br>
            <div class="form-group">
                <div class="col-md-6 col-sm-3" style="text-align: left">
                    <a href="<?= base_url(); ?>auth/home" class="btn btn-danger" style="border-radius: 20px;"><input type="image" src="<?php echo base_url('assets/img/return.png');?>" style="height:20px;position:relative;top:4px">&nbsp;Kembali</a>
                    <button type="submit" style="border-radius: 20px;" class="btn btn-success" onclick="return confirm('Anda yakin ingin simpan data ini ?')">Submit&nbsp;<input type="image" src="<?php echo base_url('assets/img/check.png');?>" style="height:20px;position:relative;top:3px"></button>
                </div>
            </div>  
        </form> 
    </div>
