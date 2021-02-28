<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toolkeeper extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('tkp_model');
	}
	
	public function home()
	{
		$data['title'] = 'Beranda';
		$this->load->view('templates/headerhome', $data);
		$this->load->view('toolkeeper/home');
		$this->load->view('templates/footer', $data);
	}

	public function karyawan()
	{
		$data['title'] = 'Karyawan';
		$this->load->view('templates/header', $data);
		$this->load->view('toolkeeper/karyawan');
		$this->load->view('toolkeeper/form_tambah_karyawan');
		$this->load->view('templates/footer', $data);
	}

	public function tools_hp()
	{
		$data['title'] = 'Tools Habis Pakai';
		$this->load->view('templates/header', $data);
		$this->load->view('toolkeeper/tools_hp');
		$this->load->view('templates/footer', $data);
	}

	public function tools_kem()
	{
		$data['title'] = 'Tools Kembali';
		$this->load->view('templates/header', $data);
		$this->load->view('toolkeeper/tools_kem');
		$this->load->view('templates/footer', $data);
	}

	public function peminjaman()
	{
		$data['title'] = 'Peminjaman';
		$this->load->view('templates/header', $data);
		$this->load->view('toolkeeper/peminjaman');
		$this->load->view('templates/footer', $data);
	}

	public function pengembalian()
	{
		$data['title'] = 'Pengembalian';
		$this->load->view('templates/header', $data);
		$this->load->view('toolkeeper/pengembalian');
		$this->load->view('templates/footer', $data);
	}

	public function pengambilan()
	{
		$data['title'] = 'Pengambilan';
		$this->load->view('templates/header', $data);
		$this->load->view('toolkeeper/pengambilan');
		$this->load->view('templates/footer', $data);
	}

	public function form_edit_user()
	{
		$data['title'] = 'Edit Pengguna Sistem';
		$username=$this->input->post('username');
		$data['username']=$this->tkp_model->get_username($username);
		$this->load->view('templates/header', $data);
		$this->load->view('toolkeeper/form_edit_user',$data);
		$this->load->view('templates/footer', $data);
	}

	public function kelola_karyawan()
	{
		$data['title'] = 'Karyawan';
		$data['karyawan']=$this->tkp_model->lihat_karyawan();
		$this->load->view('templates/header', $data);
		$this->load->view('toolkeeper/karyawan',$data);
		$this->load->view('templates/footer', $data);
	} 

	public function form_tambah_karyawan()
	{
		$data['title'] = 'Tambah Data Karyawan';
		$this->load->view('templates/header', $data);
		$this->load->view('toolkeeper/form_tambah_karyawan',$data);
		$this->load->view('templates/footer', $data);
	}

	public function tambah_karyawan()
	{
		$nik=$this->input->post('nik');
		$nama_karyawan=$this->input->post('nama_karyawan');
		$jenis_kelamin=$this->input->post('jenis_kelamin');
		$jabatan=$this->input->post('jabatan');
		$status=$this->input->post('status');

		$data=array(
					'nik' => $nik,
					'nama_karyawan' => $nama_karyawan,
					'jenis_kelamin' => $jenis_kelamin,
					'jabatan' => $jabatan,
					'status' => $status
					);
		$this->tkp_model->tambah_karyawan('karyawan', $data);
		$this->kelola_karyawan();
	}

	public function form_edit_karyawan()
	{
		$data['title'] = 'Edit Data Karyawan';
		$nik=$this->input->post('nik');
		$data['nik']=$this->tkp_model->get_nik($nik);
		$this->load->view('templates/header', $data);
		$this->load->view('toolkeeper/form_edit_karyawan',$data);
		$this->load->view('templates/footer', $data);
	}

	public function edit_karyawan()
	{
		$nik=$this->input->post('nik');
		$nama_karyawan=$this->input->post('nama_karyawan');
		$jenis_kelamin=$this->input->post('jenis_kelamin');
		$jabatan=$this->input->post('jabatan');
		$status=$this->input->post('status');

		$data=array(
					'nik' => $nik,
					'nama_karyawan' => $nama_karyawan,
					'jenis_kelamin' => $jenis_kelamin,
					'jabatan' => $jabatan,
					'status' => $status
					);
		$this->tkp_model->edit_karyawan('karyawan', $data, $nik);
		$this->kelola_karyawan();
	}

	public function hapus_karyawan()
	{
		$nik=$this->input->post('nik');
		$this->tkp_model->hapus_karyawan($nik);
		$this->kelola_karyawan();
	}

	public function cetak_karyawan()
	{
		$data['karyawan']=$this->tkp_model->lihat_karyawan();
		$this->load->view('toolkeeper/cetak_karyawan',$data);
	}

	public function kelola_tools_kem()
	{
		$data['title'] = 'Tools Kembali';
		$data['tools']=$this->tkp_model->lihat_tools_kem();
		$this->load->view('templates/header', $data);
		$this->load->view('toolkeeper/tools',$data);
		$this->load->view('templates/footer', $data);
	}

	public function form_tambah_tools()
	{
		$data['title'] = 'Tambah Data Tools Kembali';
		$this->load->view('templates/header', $data);
		$this->load->view('toolkeeper/form_tambah_tools',$data);
		$this->load->view('templates/footer', $data);
	}

	public function tambah_tools()
	{
		$kode_tools=$this->input->post('kode_tools');
		$nama_tools=$this->input->post('nama_tools');
		$frek_pemakaian=$this->input->post('frek_pemakaian');
		$qty=$this->input->post('qty');
		$satuan=$this->input->post('satuan');
		$rak=$this->input->post('rak');
		$tanggal_masuk=$this->input->post('tanggal_masuk');
		$tipe_pakai=$this->input->post('tipe_pakai');
		$keterangan=$this->input->post('keterangan');

		$data=array(
					'kode_tools' => $kode_tools,
					'nama_tools' => $nama_tools,
					'frek_pemakaian' => $frek_pemakaian,
					'qty' => $qty,
					'satuan' => $satuan,
					'rak' => $rak,
					'tanggal_masuk' => $tanggal_masuk,
					'tipe_pakai' => $tipe_pakai,
					'keterangan' => $keterangan
					);
		$this->tkp_model->tambah_tools('tools', $data);
		$this->kelola_tools();
	}

	public function form_edit_tools()
	{
		$data['title'] = 'Edit Data Tools Kembali';
		$kode_tools=$this->input->post('kode_tools');
		$data['kode_tools']=$this->tkp_model->get_kode_tools($kode_tools);
		$this->load->view('templates/header', $data);
		$this->load->view('toolkeeper/form_edit_tools',$data);
		$this->load->view('templates/footer', $data);
	}

	public function edit_tools()
	{
		$kode_tools=$this->input->post('kode_tools');
		$nama_tools=$this->input->post('nama_tools');
		$frek_pemakaian=$this->input->post('frek_pemakaian');
		$qty=$this->input->post('qty');
		$satuan=$this->input->post('satuan');
		$rak=$this->input->post('rak');
		$tanggal_masuk=$this->input->post('tanggal_masuk');
		$tipe_pakai=$this->input->post('tipe_pakai');
		$keterangan=$this->input->post('keterangan');

		$data=array(
					'kode_tools' => $kode_tools,
					'nama_tools' => $nama_tools,
					'frek_pemakaian' => $frek_pemakaian,
					'qty' => $qty,
					'satuan' => $satuan,
					'rak' => $rak,
					'tanggal_masuk' => $tanggal_masuk,
					'tipe_pakai' => $tipe_pakai,
					'keterangan' => $keterangan
					);
		$this->tkp_model->edit_tools('tools', $data, $kode_tools);
		$this->kelola_tools();
	}

	public function hapus_tools()
	{
		$kode_tools=$this->input->post('kode_tools');
		$this->tkp_model->hapus_tools($kode_tools);
		$this->kelola_tools();
	}

	public function cetak_tools()
	{
		$data['tools']=$this->tkp_model->lihat_tools();
		$this->load->view('toolkeeper/cetak_tools',$data);
	}

	public function kelola_tools_hp()
	{
		$data['title'] = 'Tools Habis Pakai';
		$data['tools_hp']=$this->tkp_model->lihat_tools_hp();
		$this->load->view('templates/header', $data);
		$this->load->view('toolkeeper/tools_hp',$data);
		$this->load->view('templates/footer', $data);
	}

	public function form_tambah_tools_hp()
	{
		$data['title'] = 'Tambah Data Tools Habis Pakai';
		$this->load->view('templates/header', $data);
		$this->load->view('toolkeeper/form_tambah_tools_hp',$data);
		$this->load->view('templates/footer', $data);
	}

	public function tambah_tools_hp()
	{
		$kode_tools_hp=$this->input->post('kode_tools_hp');
		$nama_tools_hp=$this->input->post('nama_tools_hp');
		$frek_pem_hp=$this->input->post('frek_pem_hp');
		$qty_hp=$this->input->post('qty_hp');
		$qty_diambil_hp=$this->input->post('qty_diambil_hp');
		$satuan=$this->input->post('satuan');
		$rak_hp=$this->input->post('rak_hp');
		$tgl_msk_hp=$this->input->post('tgl_msk_hp');
		$keterangan=$this->input->post('keterangan');

		$data=array(
					'kode_tools_hp' => $kode_tools_hp,
					'nama_tools_hp' => $nama_tools_hp,
					'frek_pem_hp' => $frek_pem_hp,
					'qty_hp' => $qty_hp,
					'qty_diambil_hp' => $qty_diambil_hp,
					'satuan' => $satuan,
					'rak_hp' => $rak_hp,
					'tgl_msk_hp' => $tgl_msk_hp,
					'keterangan' => $keterangan
					);
		$this->tkp_model->tambah_tools_hp('tools_hp', $data);
		$this->kelola_tools_hp();
	}

	public function form_edit_tools_hp()
	{
		$data['title'] = 'Edit Data Tools Habis Pakai';
		$kode_tools_hp=$this->input->post('kode_tools_hp');
		$data['kode_tools_hp']=$this->tkp_model->get_kode_tools_hp($kode_tools_hp);
		$this->load->view('templates/header', $data);
		$this->load->view('toolkeeper/form_edit_tools_hp',$data);
		$this->load->view('templates/footer', $data);
	}

	public function edit_tools_hp()
	{
		$kode_tools_hp=$this->input->post('kode_tools_hp');
		$nama_tools_hp=$this->input->post('nama_tools_hp');
		$frek_pem_hp=$this->input->post('frek_pem_hp');
		$qty_hp=$this->input->post('qty_hp');
		$qty_diambil_hp=$this->input->post('qty_diambil_hp');
		$satuan=$this->input->post('satuan');
		$rak_hp=$this->input->post('rak_hp');
		$tgl_msk_hp=$this->input->post('tgl_msk_hp');
		$keterangan=$this->input->post('keterangan');

		$data=array(
					'kode_tools' => $kode_tools,
					'nama_tools' => $nama_tools,
					'frek_pem_hp' => $frek_pem_hp,
					'qty_hp' => $qty_hp,
					'qty_diambil_hp' => $qty_diambil_hp,
					'satuan' => $satuan,
					'rak_hp' => $rak_hp,
					'tgl_msk_hp' => $tgl_msk_hp,
					'keterangan' => $keterangan
					);
		$this->tkp_model->edit_tools_hp('tools', $data, $kode_tools_hp);
		$this->kelola_tools_hp();
	}

	public function hapus_tools_hp()
	{
		$kode_tools_hp=$this->input->post('kode_tools_hp');
		$this->tkp_model->hapus_tools_hp($kode_tools_hp);
		$this->kelola_tools_hp();
	}

	public function cetak_tools_hp()
	{
		$data['tools_hp']=$this->tkp_model->lihat_tools_hp();
		$this->load->view('toolkeeper/cetak_tools_hp',$data);
	}

	public function kelola_peminjaman()
	{
		$data['title'] = 'Peminjaman';
		$data['peminjaman']=$this->tkp_model->lihat_peminjaman();
		$this->load->view('templates/header', $data);
		$this->load->view('toolkeeper/peminjaman',$data);
		$this->load->view('templates/footer', $data);
	}

	public function form_tambah_peminjaman()
	{
		
		$data['title'] = 'Tambah Data Peminjaman';
		$data['tools'] = $this->tkp_model->getTools();
		$data['karyawan'] = $this->tkp_model->getKaryawan();
		//gencode
		$kode = 'PJM';
        $kode_terakhir = $this->tkp_model->getMax('peminjaman', 'id_pinjam', $kode);
        $kode_tambah = substr($kode_terakhir, -6, 6);
        $kode_tambah++;
        $number = str_pad($kode_tambah, 6, '0', STR_PAD_LEFT);
        $data['id_pinjam'] = $kode . $number;
		$this->load->view('templates/header', $data);
		$this->load->view('toolkeeper/form_tambah_peminjaman', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('toolkeeper/custom-script-peminjaman.php', $data);
	}

	public function getstok($getId)
    {
        $id = encode_php_tags($getId);
        $query = $this->tkp_model->cekStok($id);
        echo json_encode($query);
    }
  
	public function tambah_peminjaman()
	{
		$id_peminjaman = $this->input->post('id_pinjam');
		$nik = $this->input->post('nik');
		$kode_tools = $this->input->post('kode_tools');
		$qty = $this->input->post('jumlah_pinjam');

		// $data=array(
		// 			'id_pinjam' => $id_tmp_peminjaman,
		// 			'nik' => $nik,
		// 			'kode_tools' => $kode_tools,
		// 			'jumlah_pinjam' => $qty
		// 			);
		
		// $this->tkp_model->tambah_peminjaman('peminjaman', $data);
		// $this->kelola_peminjaman();
		// var_dump($this->input->post());
		$data_peminjaman = array(
			'id_pinjam' => $id_peminjaman,
			'tanggal_pinjam' => date('Y-m-d', strtotime($this->input->post('tanggal_pinjam')))
		);

		$peminjaman = $this->tkp_model->tambah_peminjaman('peminjaman', $data_peminjaman);
		for($i=0; $i<count($kode_tools); $i++)
		{
			$data = array(
				'id_pinjam' => $data_peminjaman['id_pinjam'],
				'nik' => $nik,
				'kode_tools' => $kode_tools[$i],
				'jumlah_pinjam' => $qty[$i]
			);

			$this->tkp_model->tambah_tmp_peminjaman('tmp_peminjaman', $data);
		}
		// $this->kelola_peminjaman();
		// var_dump($data_peminjaman['id_pinjam']);
		var_dump($this->input->post('kode_tools'));
	}

	// public function tambah_peminjaman()
	// {
	// 	$id_pinjam=$this->input->post('id_pinjam');
	// 	$tanggal_pinjam=$this->input->post('tanggal_pinjam');
	// 	$nik=$this->input->post('nik');
	// 	$kode_tools=$this->input->post('kode_tools');
	// 	$qty=$this->input->post('jumlah_pinjam');

	// 	$data=array(
	// 				'id_pinjam' => $id_pinjam,
	// 				'tanggal_pinjam' => $tanggal_pinjam,
	// 				'nik' => $nik,
	// 				'kode_tools' => $kode_tools,
	// 				'jumlah_pinjam' => $qty
	// 				);
		
	// 	$this->tkp_model->tambah_peminjaman('peminjaman', $data);
	// 	$this->kelola_peminjaman();
	// }

	public function form_edit_peminjaman()
	{
		$id_pinjam=$this->input->post('id_pinjam');
		$data['id_pinjam']=$this->tkp_model->get_id_pinjam($id_pinjam);
		$this->load->view('toolkeeper/form_edit_peminjaman',$data);
	}

	public function edit_peminjaman()
	{
		$id_pinjam=$this->input->post('id_pinjam');
		$tanggal_pinjam=$this->input->post('tanggal_pinjam');
		$nik=$this->input->post('nik');
		$nama_karyawan=$this->input->post('nama_karyawan');
		$jabatan=$this->input->post('jabatan');
		$kode_tools=$this->input->post('kode_tools');
		$nama_tools=$this->input->post('nama_tools');
		$qty=$this->input->post('qty');
		$produksi=$this->input->post('produksi');
		$rak=$this->input->post('rak');

		$data=array(
					'id_pinjam' => $id_pinjam,
					'tanggal_pinjam' => $tanggal_pinjam,
					'nik' => $nik,
					'kode_tools' => $kode_tools,
					'produksi' => $produksi
					);
		$datakar=array(
					'nik' => $nik,
					'nama_karyawan' => $nama_karyawan,
					'jabatan' => $jabatan
					);
		$datatoo=array(
					'kode_tools' => $kode_tools,
					'nama_tools' => $nama_tools,
					'qty' => $qty,
					'rak' => $rak
					);

		$this->tkp_model->edit_peminjaman('peminjaman', $data, $id_pinjam);
		$this->tkp_model->edit_karyawan('karyawan', $datakar, $nik);
		$this->tkp_model->edit_tools('tools', $datatoo, $kode_tools);
		$this->kelola_peminjaman();
	}

	public function hapus_peminjaman()
	{
		$id_pinjam=$this->input->post('id_pinjam');
		$this->tkp_model->hapus_peminjaman($id_pinjam);
		$this->kelola_peminjaman();
	}

	public function cetak_peminjaman()
	{
		$data['peminjaman']=$this->tkp_model->lihat_peminjaman();
		$this->load->view('toolkeeper/cetak_peminjaman',$data);
	}

	public function kelola_pengembalian()
	{
		$data['title'] = 'Pengembalian';
		$data['pengembalian']=$this->tkp_model->lihat_pengembalian();
		$this->load->view('templates/header', $data);
		$this->load->view('toolkeeper/pengembalian',$data);
		$this->load->view('templates/footer', $data);
	}

	public function form_tambah_pengembalian()
	{		
		$data['title'] = 'Tambah Data Pengembalian';
		$data['tools'] = $this->tkp_model->getTools();
		$data['karyawan'] = $this->tkp_model->getKaryawan();
		//gencode
		$kode = 'KEM';
        $kode_terakhir = $this->tkp_model->getMax('pengembalian', 'id_kembali', $kode);
        $kode_tambah = substr($kode_terakhir, -6, 6);
        $kode_tambah++;
        $number = str_pad($kode_tambah, 6, '0', STR_PAD_LEFT);
        $data['id_kembali'] = $kode . $number;
		$this->load->view('templates/header', $data);
		$this->load->view('toolkeeper/form_tambah_pengembalian', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('toolkeeper/custom-script-pengembalian', $data);
	}
 	   
	public function tambah_pengembalian()
	{
		$id_kembali=$this->input->post('id_kembali');
		$tanggal_kembali=$this->input->post('tanggal_kembali');
		$nik=$this->input->post('nik');
		$kode_tools=$this->input->post('kode_tools');
		$qty_dikembalikan=$this->input->post('qty_dikembalikan');
	
		$data=array(
					'id_kembali' => $id_kembali,
					'tanggal_kembali' => $tanggal_kembali,
					'nik' => $nik,
					'kode_tools' => $kode_tools,
					'qty_dikembalikan' => $qty_dikembalikan
					);
		
		$this->tkp_model->tambah_pengembalian('pengembalian', $data);
		$this->kelola_pengembalian();
	}

	public function hapus_pengembalian()
	{
		$id_kembali=$this->input->post('id_kembali');
		$this->tkp_model->hapus_pengembalian($id_kembali);
		$this->kelola_pengembalian();
	}

	public function cetak_pengembalian()
	{
		$data['pengembalian']=$this->tkp_model->lihat_pengembalian();
		$this->load->view('toolkeeper/cetak_pengembalian',$data);
	}

	public function kelola_pengambilan()
	{
		$data['title'] = 'Pengambilan';
		$data['pengambilan']=$this->tkp_model->lihat_pengambilan();
		$this->load->view('templates/header', $data);
		$this->load->view('toolkeeper/pengambilan',$data);
		$this->load->view('templates/footer', $data);
	}

	public function form_tambah_pengambilan()
	{
		$data['title'] = 'Tambah Data Pengambilan';
		$data['tools_hp'] = $this->tkp_model->getToolshp();
		$data['karyawan'] = $this->tkp_model->getKaryawan();
		//gencode
		$kode = 'AMB';
        $kode_terakhir = $this->tkp_model->getMax('pengambilan', 'id_pengambilan', $kode);
        $kode_tambah = substr($kode_terakhir, -6, 6);
        $kode_tambah++;
        $number = str_pad($kode_tambah, 6, '0', STR_PAD_LEFT);
        $data['id_pengambilan'] = $kode . $number;
		$this->load->view('templates/header', $data);
		$this->load->view('toolkeeper/form_tambah_pengambilan', $data);
		$this->load->view('templates/footer', $data);
	}

	public function getstokhp($getId)
    {
        $id = encode_php_tags($getId);
        $query = $this->tkp_model->cekStokhp($id);
        echo json_encode($query);
    }

	public function tambah_pengambilan()
	{
		$id_pengambilan=$this->input->post('id_pengambilan');
		$tgl_pengambilan=$this->input->post('tgl_pengambilan');
		$nik=$this->input->post('nik');
		$kode_tools_hp=$this->input->post('kode_tools_hp');
		$qty_diambil=$this->input->post('qty_diambil');

		$data=array(
					'id_pengambilan' => $id_pengambilan,
					'tgl_pengambilan' => $tgl_pengambilan,
					'nik' => $nik,
					'kode_tools_hp' => $kode_tools_hp,
					'qty_diambil' => $qty_diambil
					);
		
		$this->tkp_model->tambah_pengambilan('pengambilan', $data);
		$this->kelola_pengambilan();
	}

	public function hapus_pengambilan()
	{
		$id_pengambilan=$this->input->post('id_pengambilan');
		$this->tkp_model->hapus_pengambilan($id_pengambilan);
		$this->kelola_pengambilan();
	}

	public function cetak_pengambilan()
	{
		$data['pengambilan']=$this->tkp_model->lihat_pengambilan();
		$this->load->view('toolkeeper/cetak_pengambilan',$data);
	} 
}


  