<!-- <script type="text/javascript" src="<?= base_url('assets/'); ?>vendor/bootstrap-select/bootstrap/js/hierarchy-select.min.js"></script> -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

<script type="text/javascript">
    // let hal = '<?= $this->uri->segment(1); ?>';

    $(document).ready(function() {
        $(".only-number").keypress(function (e){
              var charCode = (e.which) ? e.which : e.keyCode;
              if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
              }
        });
    }); 

    $('.dropdown-toggle').on('click', function(){
        $(this).prev('.selectpicker').on('click', function(){
            // test(this.id);
            alert('error')
        });
    });

    function tambahPeminjaman()
    {
        var i = 0;
        $("#tambahForm").append('<div class="form-group">' +
            '<label class="col-form-label col-md-3 col-sm-3 label-align">Tools<span class="required"></span></label>'+
            '<div class="col-md-6 col-sm-6">'+
                '<select name="kode_tools[]" id="kode_tools'+ i +'" onclick="test(this.id)" class="custom-select">' +
                    '<option value="" selected disabled>Pilih Tools</option>' +
                    '<?php foreach ($tools as $t) : ?>' +
                        '<option <?= $this->uri->segment(3) == $t['kode_tools'] ? 'selected' : '';  ?> <?= set_select('kode_tools', $t['kode_tools']) ?> value="<?= $t['kode_tools'] ?>"><?= $t['kode_tools'] . ' | ' . $t['nama_tools']. ' | ' . $t['rak'] ?></option>' +
                    '<?php endforeach; ?>' +
                '</select>' +
            '</div>' +
        '</div>' +
        '<div class="form-group">' +
                '<label class="col-form-label col-md-3 col-sm-3 label-align">Stok Barang<span class="required"></span></label>' +
                '<div class="col-md-6 col-sm-6">' + 
                    '<input class="form-control" id="stok'+ i +'" type="number" readonly="" required>' +
                '</div>' + 
            '</div>' +
            '<div class="form-group">' +
                '<label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah Peminjaman<span class="required"></span></label>' +
                '<div class="col-md-6 col-sm-6">' +
                    '<input class="form-control only-number" name="jumlah_pinjam[]" id="qty_pinjam'+ i +'" placeholder="Masukan QTY" type="text" oninput="total(this.id)" required>' +
                '</div>' +
            '</div>' +
            '<div class="form-group">' +
                '<label class="col-form-label col-md-3 col-sm-3 label-align">Stok Setelah Pinjam<span class="required"></span></label>' +
                '<div class="col-md-6 col-sm-6">' +
                    '<input class="form-control" id="total_stok'+ i +'" type="number" readonly="">' +
                '</div>' +
            '</div>');
        i++;
    }


    function test(value)
    {
        if(value === 'kode_tools')
        {
            var hal = '<?= $this->uri->segment(1); ?>';
            var stok = $('#stok');
            var total = $('#total_stok');
            var jumlah = hal == 'toolkeeper' ? $('#qty_pinjam') : $('#qty_kembali');
            $(document).on('change', '#' + value, function() {
                let url = '<?= base_url('toolkeeper/getstok/'); ?>' + this.value;
                $.getJSON(url, function(data) {
                    stok.val(data.stok_awal);
                    total.val(data.stok_awal);
                    jumlah.focus();
                });
                // alert(this.value);
            });
        }else {
            var i = 0;
            var hal = '<?= $this->uri->segment(1); ?>';
            var stok_tambah = $('#stok' + i);
            var total_tambah = $('#total_stok' + i);
            var jumlah_tambah = hal == 'toolkeeper' ? $('#qty_pinjam' + i) : $('#qty_kembali' + i);
            $(document).on('change', '#' + value, function() {
                let url = '<?= base_url('toolkeeper/getstok/'); ?>' + this.value;
                $.getJSON(url, function(data) {
                    stok_tambah.val(data.stok_awal);
                    total_tambah.val(data.stok_awal);
                    jumlah_tambah.focus();
                });
                // alert(this.value);
            });
            // alert(jumlah_tambah.focus());
            i++;
        }
    }

    function total(method)
    {
        if(method === 'qty_pinjam')
        {
            $(document).on('keyup', '#' + method, function() {
                var stok = $('#stok');
                var total = $('#total_stok');
                let totalStok = parseInt(stok.val()) - parseInt(this.value);
                total.val(Number(totalStok));
            });
            // alert(method);
        }else{
            $(document).on('keyup', '#' + method, function() {
                var i = 0; 
                var stok_tambah = $('#stok' + i);
                var total_tambah = $('#total_stok' + i);
                let totalStok = parseInt(stok_tambah.val()) - parseInt(this.value);
                total_tambah.val(Number(totalStok));
                i++;
            });
            // alert(method);
        }
    }
    // $('.select2').select2();
    // $('.select2').hierarchySelect({
    //     hierarchy: false,
    //     width: 'auto'
    // });
    $('.selectpicker').selectpicker();

</script>