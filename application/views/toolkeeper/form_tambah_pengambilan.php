
<div class="container-fluid"> 
	<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Form <?=$title?></h3>
        </div>
        <form action="<?php echo base_url();?>toolkeeper/tambah_pengambilan" method="post">
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">ID Pengambilan<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" readonly value="<?= set_value('id_pengambilan', $id_pengambilan); ?>" name="id_pengambilan" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Pengambilan<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" name="tgl_pengambilan" placeholder="Masukan Tanggal Peminjaman" type="date"onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@.1234567890',this") required>
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
                    <select name="kode_tools_hp" id="kode_tools_hp" class="custom-select">
                        <option value="" selected disabled>Pilih Tools</option>
                        <?php foreach ($tools_hp as $thp) : ?>
                            <option <?= $this->uri->segment(3) == $thp['kode_tools_hp'] ? 'selected' : '';  ?> <?= set_select('kode_tools_hp', $thp['kode_tools_hp']) ?> value="<?= $thp['kode_tools_hp'] ?>"><?= $thp['kode_tools_hp'] . ' | ' . $thp['nama_tools_hp']. ' | ' . $thp['rak_hp'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">QTY<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" id="stok" type="number" readonly="" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah Pengambilan<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control only-number" name="qty_diambil" id="qty_diambil" placeholder="Masukan QTY" type="text"onKeyPress="return goodchars(event,'1234567890',this") required>
                </div>
            </div>
             <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">QTY Setelah Pengambilan<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" id="total_stok" type="number" readonly="">
                </div>
            </div>
            <br>
            <div class="form-group">
                <div class="col-md-6 col-sm-6" style="text-align: left">
                    <a href="<?= base_url(); ?>toolkeeper/kelola_pengambilan" class="btn btn-danger" style="border-radius: 20px;"><input type="image" src="<?php echo base_url('assets/img/return.png');?>" style="height:20px;position:relative;top:4px">&nbsp;Kembali</a>
                    <button type="submit" style="border-radius: 20px;" class="btn btn-success" onclick="return confirm('Anda yakin ingin simpan data ini ?')">Submit&nbsp;<input type="image" src="<?php echo base_url('assets/img/check.png');?>" style="height:20px;position:relative;top:3px"></button>
                </div>
            </div>  
        </form>
    </div>
<script type="text/javascript">

    $(document).ready(function() {

    $(".only-number").keypress(function (e){
      var charCode = (e.which) ? e.which : e.keyCode;
      if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
      }
    });


    });
</script>

<script type="text/javascript">
        let hal = '<?= $this->uri->segment(1); ?>';

        let stok = $('#stok');
        let total = $('#total_stok');
        let jumlah = hal == 'toolkeeper' ? $('#qty_pinjam') : $('#qty_diambil') ;

        $(document).on('change', '#kode_tools_hp', function() {
            let url = '<?= base_url('toolkeeper/getstokhp/'); ?>' + this.value;
            $.getJSON(url, function(data) {
                stok.val(data.qty_hp);
                total.val(data.qty_hp);
                jumlah.focus();
            });
        });

        $(document).on('keyup', '#qty_pinjam', function() {
            let totalStok = parseInt(stok.val()) - parseInt(this.value);
            total.val(Number(totalStok));
        });

        $(document).on('keyup', '#qty_diambil', function() {
            let totalStok = parseInt(stok.val()) - parseInt(this.value);
            total.val(Number(totalStok));
        });
    </script>
