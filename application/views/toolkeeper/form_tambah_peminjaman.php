<!-- Custom CSS -->
<!-- <link href="<?= base_url('assets/'); ?>vendor/bootstrap-select/bootstrap/css/hierarchy-select.min.css" rel="stylesheet" /> -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">


<div class="container-fluid"> 
	<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Form <?=$title?></h3>
        </div>
        <form action="<?php echo base_url();?>toolkeeper/tambah_peminjaman" method="post">
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">ID Peminjaman<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" readonly value="<?= set_value('id_pinjam', $id_pinjam); ?>" name="id_pinjam" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Peminjaman<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" name="tanggal_pinjam" placeholder="Masukan Tanggal Peminjaman" type="date"onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@.1234567890',this") required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Karyawan<span class="required"></span></label>  
                <div class="col-md-6 col-sm-6">
                     <select name="nik" class="form-control " data-live-search="true">
                          <option value="0" selected disabled="">Pilih Karyawan</option>
                          <?php foreach ($karyawan as $k) : ?>
                            <option <?= $this->uri->segment(3) == $k['nik'] ? 'selected' : '';  ?> <?= set_select('nik', $k['nik']) ?> value="<?= $k['nik'] ?>"><?= $k['nik'] . ' | ' . $k['nama_karyawan']. ' | ' . $k['jabatan'] ?></option>
                        <?php endforeach; ?>
                      </select>
                </div>
            </div>  
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Tools<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <select name="kode_tools[]" onclick="test(this.id)" id="kode_tools" class="form-control " data-live-search="true">
                        <option value="" selected disabled>Pilih Tools</option>
                        <?php foreach ($tools as $t) : ?>
                            <option <?= $this->uri->segment(3) == $t['kode_tools'] ? 'selected' : '';  ?> <?= set_select('kode_tools', $t['kode_tools']) ?> value="<?= $t['kode_tools'] ?>"><?= $t['kode_tools'] . ' | ' . $t['nama_tools']. ' | ' . $t['rak'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Stok Barang<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" id="stok" type="number" readonly="" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah Peminjaman<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control only-number" name="jumlah_pinjam[]" id="qty_pinjam" placeholder="Masukan QTY" type="text" oninput="total(this.id)" required>
                </div>
            </div>
             <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Stok Setelah Pinjam<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" id="total_stok" type="number" readonly="">
                </div>
            </div>
            <div id="tambahForm"></div>
            <div class="form-group">
                <div class="row">
                    &ensp;
                    <div class="col-md-3 col-sm-3">
                      <button type="button" id="tbhtools" onclick="tambahPeminjaman()" style="border-radius: 20px;" class="btn btn-info" >Tambah Tools &nbsp;<input type="image" src="<?php echo base_url('assets/img/check.png');?>" style="height:20px;position:relative;top:3px"></button> 
                    </div>
                    <div class="col-md-6 col-sm-3" style="margin-left:85px">
                        <a href="<?= base_url(); ?>toolkeeper/kelola_peminjaman" class="btn btn-danger" style="border-radius: 20px;"><input type="image" src="<?php echo base_url('assets/img/return.png');?>" style="height:20px;position:relative;top:4px">&nbsp;Kembali</a>
                        <button type="submit" style="border-radius: 20px;" class="btn btn-success" onclick="return confirm('Anda yakin ingin simpan data ini ?')">Submit&nbsp;<input type="image" src="<?php echo base_url('assets/img/check.png');?>" style="height:20px;position:relative;top:3px"></button>                         
                    </div>
                </div>
            </div>  
        </form>
    </div>

