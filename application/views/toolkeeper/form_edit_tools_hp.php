
<div class="container-fluid"> 
	<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Form <?=$title?></h3>
        </div>
        <form action="<?php echo base_url();?>toolkeeper/edit_tools_hp" method="post">
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Kode Tools<span class="required"></span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" name="kode_tools_hp" placeholder="Masukan Kode Tools" type="text"onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@.1234567890',this") value="<?php echo $kode_tools_hp[0]->kode_tools_hp;?>"readonly>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Tools<span class="required"></span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" name="nama_tools_hp" placeholder="Masukan Nama Tools" type="text"onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@.1234567890',this") value="<?php echo $kode_tools_hp[0]->nama_tools_hp;?>"required>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Frekuensi Pemakaian<span class="required"></span></label>
            <div class="col-md-6 col-sm-6">
                <select name="frek_pem_hp" class="form-control" required>
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
                <input class="form-control" name="qty_hp" placeholder="Masukan Kuantitas Tools" type="number"onKeyPress="return goodchars(event,'1234567890',this") value="<?php echo $kode_tools_hp[0]->qty_hp;?>" required>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">QTY Diambil<span class="required"></span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" name="qty_diambil_hp" placeholder="Masukan Kuantitas Tools" type="number"onKeyPress="return goodchars(event,'1234567890',this") value="<?php echo $kode_tools_hp[0]->qty_diambil_hp;?>" required>
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
                <select name="rak_hp" class="form-control" required>
                    <option value="" hidden>---- Pilih Rak ----</option>
                        <option value="Rak A">Rak A</option>
                        <option value="Rak B">Rak B</option>
                        <option value="Rak C">Rak C</option>
                        <option value="Rak D">Rak D</option>
                        <option value="Rak E">Rak E</option>
                        <option value="Etalase">Etalase</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Masuk<span class="required"></span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" name="tgl_msk_hp" placeholder="Masukan Tanggal Masuk" type="date"value="<?php echo $kode_tools_hp[0]->tgl_msk_hp;?>" required>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Keterangan<span class="required"></span></label>
            <div class="col-md-6 col-sm-6">
                <select name="keterangan" class="form-control" required>
                    <option value="" hidden>---- Pilih Keterangan ----</option>
                    <option value="Milling Konvensional">Milling Konvensional</option>
                    <option value="Cutting Tools">Cutting Tools</option>
                    <option value="Gergaji Tangan">Gergaji Tangan</option>
                    <option value="Tools Mesin CNC">Tools Mesin CNC</option>
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
                <div class="col-md-6 col-sm-3">
                    <a href="<?= base_url(); ?>toolkeeper/kelola_tools_hp" class="btn btn-danger" style="border-radius:20px"><input type="image" src="<?php echo base_url('assets/img/return.png');?>" style="height:20px;position:relative;top:4px">&nbsp;Kembali</a>
                    <button type="submit" class="btn btn-success" style="border-radius:20px" onclick="return confirm('Yakin Tambah Tools ?')">Submit&nbsp;<input type="image" src="<?php echo base_url('assets/img/check.png');?>" style="height:20px;position:relative;top:4px"></button>
                </div>
            </div>  
        </form>
    </div>&nbsp;
