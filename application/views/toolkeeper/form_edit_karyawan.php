<div class="container-fluid"> 
	<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Form <?=$title?></h3>
        </div>
        <form action="<?php echo base_url();?>toolkeeper/edit_karyawan" method="post">
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">NIK<span class="required"></span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" name="nik" placeholder="Masukan NIK" type="text"onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@.1234567890',this") value="<?php echo $nik[0]->nik;?>" readonly>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Karyawan<span class="required"></span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" name="nama_karyawan" placeholder="Masukan Nama Karyawan" type="text"onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@.1234567890',this") value="<?php echo $nik[0]->nama_karyawan;?>" required>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin<span class="required"></span></label>
            <div class="col-md-6 col-sm-6">
                <select name="jenis_kelamin" class="form-control" required>
                    <option value="" hidden>---- Pilih Jenis Kelamin ----</option>
                    <option value="L">Laki - Laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Jabatan<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <select name="jabatan" class="form-control" required>
                    <option value="" hidden>---- Pilih Jabatan ----</option>
                    <option value="QA & QC">QA & QC</option>
                    <option value="Operator">Operator</option>
                    <option value="General Affair">General Affair</option>
                    <option value="Finance">Finance</option>
                    <option value="CS">Customer Service</option>
                    <option value="PM & PPIC">PM & PPIC</option>
                    <option value="HRD">HRD</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Status<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <select name="status" class="form-control" required>
                    <option value="" hidden>---- Pilih Status ----</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Pasif">Pasif</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <div class="col-md-6 col-sm-3" style="text-align: left">
                    <a href="<?= base_url(); ?>toolkeeper/kelola_karyawan" class="btn btn-danger" style="border-radius: 20px;"><input type="image" src="<?php echo base_url('assets/img/return.png');?>" style="height:20px;position:relative;top:4px">&nbsp;Kembali</a>
                    <button type="submit" style="border-radius: 20px;" class="btn btn-success" onclick="return confirm('Anda yakin ingin mengubah data ini ?')">Submit&nbsp;<input type="image" src="<?php echo base_url('assets/img/check.png');?>" style="height:20px;position:relative;top:3px"></button>
                </div>
            </div>  
        </form>
    </div>
