<div class="container-fluid"> 
	<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Form <?=$title?></h3>
        </div>
        <form action="<?php echo base_url();?>toolkeeper/tambah_pengembalian" method="post">
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">ID Pengembalian<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" readonly value="<?= set_value('id_kembali', $id_kembali); ?>" name="id_kembali" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Pengembalian<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" name="tanggal_kembali" placeholder="Masukan Tanggal pengembalian" type="date"onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@.1234567890',this") required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Karyawan<span class="required"></span></label>  
                <div class="col-md-6 col-sm-6">
                     <select name="nik" class="form-control selectric">
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
                    <select name="kode_tools" id="kode_tools" class="custom-select">
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
                <label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah Pengembalian<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control only-number" name="qty_dikembalikan" id="qty_dikembalikan" placeholder="Masukan QTY" type="text"onKeyPress="return goodchars(event,'1234567890',this") required>
                </div>
            </div>
             <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Stok Setelah Pinjam<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" id="total_stok" type="number" readonly="">
                </div>
            </div>
            <br>
            <div class="form-group">
                <div class="col-md-6 col-sm-3" style="text-align: left">
                    <a href="<?= base_url(); ?>toolkeeper/kelola_pengembalian" class="btn btn-danger" style="border-radius: 20px;"><input type="image" src="<?php echo base_url('assets/img/return.png');?>" style="height:20px;position:relative;top:4px">&nbsp;Kembali</a>
                    <button type="submit" style="border-radius: 20px;" class="btn btn-success" onclick="return confirm('Anda yakin ingin simpan data ini ?')">Submit&nbsp;<input type="image" src="<?php echo base_url('assets/img/check.png');?>" style="height:20px;position:relative;top:3px"></button>
                </div>
            </div>  
        </form>
    </div>
