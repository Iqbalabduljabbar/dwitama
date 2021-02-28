<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GA extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('ga_model');
	}
	public function home()
	{
		$data['judul'] = 'Halaman General Affair';
		$this->load->view('templates/header', $data);
		$this->load->view('GA/home');
		$this->load->view('templates/footer', $data);
	}

	public function kelola_karyawan()
	{
		$data['karyawan']=$this->ga_model->lihat_karyawan();
		$this->load->view('GA/karyawan',$data);
	}

	public function kelola_tools_kem()
	{
		$data['tools']=$this->ga_model->lihat_tools_kem();
		$this->load->view('GA/tools',$data);
	}

	public function kelola_tools_hp()
	{
		$data['tools_hp']=$this->ga_model->lihat_tools_hp();
		$this->load->view('GA/tools_hp',$data);
	}

	public function kelola_peminjaman()
	{
		$data['peminjaman']=$this->ga_model->lihat_peminjaman();
		$this->load->view('GA/peminjaman',$data);
	}

	public function kelola_pengembalian()
	{
		$data['pengembalian']=$this->ga_model->lihat_pengembalian();
		$this->load->view('GA/pengembalian',$data);
	}
	public function kelola_pengambilan()
	{
		$data['pengambilan']=$this->ga_model->lihat_pengambilan();
		$this->load->view('GA/pengambilan',$data);
	} 
}

