
<div class="container-fluid"> 
	<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Form <?=$title?></h3>
        </div>
        <form action="<?php echo base_url();?>toolkeeper/edit_tools" method="post">
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Kode Tools<span class="required"></span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" name="kode_tools" placeholder="Masukan Kode Tools" type="text"onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@.1234567890',this") value="<?php echo $kode_tools[0]->kode_tools;?>"readonly>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Tools<span class="required"></span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" name="nama_tools" placeholder="Masukan Nama Tools" type="text"onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@.1234567890',this") value="<?php echo $kode_tools[0]->nama_tools;?>"required>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Frekuensi Pemakaian<span class="required"></span></label>
            <div class="col-md-6 col-sm-6">
                <select name="frek_pemakaian" class="form-control" required>
                    <option value="" hidden>---- Pilih Frekuensi Pemakaian ----</option>
                    <option value="Setiap Hari">Setiap hari</option>
                    <option value="1x dalam seminggu">1x dalam seminggu</option>
                    <option value="2x dalam seminggu">2x dalam seminggu</option>
                    <option value="3x dalam seminggu">3x dalam seminggu</option>
                    <option value="4x dalam seminggu">4x dalam seminggu</option>
                    <option value="1x dalam sebulan">1x dalam sebulan</option>
                    <option value="2x dalam sebulan">2x dalam sebulan</option>
                    <option value="3x dalam sebulan">3x dalam sebulan</option>
                    <option value="4x dalam sebulan">4x dalam sebulan</option>
                    <option value="Jarang (1-2 bulan sekali)">Jarang (1-2 bulan sekali)</option>
                    <option value="Sangat Jarang (3 bulan sekali)">Sangat Jarang (3 bulan sekali)</option>
                    <option value="< 50 pcs perbulan">Kurang dari 50 pcs perbulan</option>
                    <option value="50 s/d 100 pcs">Antara 50 s/d 100 pcs perbulan</option>
                    <option value="> 100 pcs perbulan">Lebih dari 100 pcs perbulan</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">QTY<span class="required"></span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" name="qty" placeholder="Masukan Kuantitas Tools" type="number"onKeyPress="return goodchars(event,'1234567890',this") value="<?php echo $kode_tools[0]->qty;?>" required>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Satuan<span class="required"></span></label>
            <div class="col-md-6 col-sm-6">
                <select name="satuan" class="form-control" required>
                    <option value="" hidden>---- Pilih Satuan ----</option>
                    <option value="set">Set</option>
                    <option value="ea">EA</option>
                    <option value="pcs">Pcs</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Rak<span class="required"></span></label>
            <div class="col-md-6 col-sm-6">
                <select name="rak" class="form-control" required>
                    <option value="" hidden>---- Pilih Rak ----</option>
                    <option value="1">Rak 1 (Milling Konvensional)</option>
                    <option value="2">Rak 2 (Cutting Tools)</option>
                    <option value="3">Rak 3 (Gergaji Tangan)</option>
                    <option value="4">Rak 4 (Tools Mesin CNC)</option>
                    <option value="5">Rak 5 (Bubut Konvensional)</option>
                    <option value="6">Rak 6 (Sandblasting)</option>
                    <option value="7">Rak 7 (Carbide Tools)</option>
                    <option value="8">Rak 8 (Pompa Test)</option>
                    <option value="9">Rak 9 (Handsnai)</option>
                    <option value="10">Rak 10 (Handtap)</option>
                    <option value="11">Rak 11 (Mesin Bor)</option>
                    <option value="12">Rak 12 (Gergaji Tangan)</option>
                    <option value="13">Rak 13 (Gerinda Tools)</option>
                    <option value="14">Rak 14 (Mesin Amplas)</option>
                    <option value="15">Rak 15 (Perkakas)</option>
                    <option value="16">Rak 16 (Kunci Perkakas)</option>
                    <option value="17">Rak 17 (Alat Ukur)</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Masuk<span class="required"></span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" name="tanggal_masuk" placeholder="Masukan Tanggal Masuk" type="date"value="<?php echo $kode_tools[0]->tanggal_masuk;?>" required>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Tipe Pakai<span class="required"></span></label>
            <div class="col-md-6 col-sm-6">
                <select name="tipe_pakai" class="form-control" required>
                    <option value="" hidden>---- Pilih Tipe Pakai ----</option>
                    <option value="Pinjam">Pinjam</option>
                    <option value="Habis Pakai">Habis Pakai</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Keterangan<span class="required"></span></label>
            <div class="col-md-6 col-sm-6">
                <select name="keterangan" class="form-control" required>
                    <option value="" hidden>---- Pilih Keterangan ----</option>
                    <option value="Milling Konvensional">Milling Konvensional</option>
                    <option value="Cutting Tools">Cutting Tools</option>
                    <option value="Gergaji Tangan">Gergaji Tangan</option>
                    <option value="Tools Mesin CNC">Tools Mesin CNC)</option>
                    <option value="Bubut Konvensional">Bubut Konvensional</option>
                    <option value="Sandblasting">Sandblasting</option>
                    <option value="Carbide Tools">Carbide Tools</option>
                    <option value="Pompa Test">Pompa Test</option>
                    <option value="Handsnai">Handsnai</option>
                    <option value="Handtap">Handtap</option>
                    <option value="Mesin Bor">Mesin Bor</option>
                    <option value="Gergaji Tangan">Gergaji Tangan</option>
                    <option value="Gerinda Tools">Gerinda Tools</option>
                    <option value="Mesin Amplas">Mesin Amplas</option>
                    <option value="Perkakas">Perkakas</option>
                    <option value="Kunci Perkakas">Kunci Perkakas</option>
                    <option value="Alat Ukur">Alat Ukur</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <div class="col-md-6 col-sm-6" style="text-align: left">
                    <a href="<?= base_url(); ?>toolkeeper/kelola_tools_kem" class="btn btn-danger" style="border-radius: 20px;"><input type="image" src="<?php echo base_url('assets/img/return.png');?>" style="height:20px;position:relative;top:4px">&nbsp;Kembali</a>
                    <button type="submit" style="border-radius: 20px;" class="btn btn-success" onclick="return confirm('Anda yakin ingin mengubah data ini ?')">Submit&nbsp;<input type="image" src="<?php echo base_url('assets/img/check.png');?>" style="height:20px;position:relative;top:3px"></button>
                </div>
            </div>  
        </form>
    </div>