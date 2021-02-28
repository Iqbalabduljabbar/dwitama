<?php 
class Ga_model extends CI_Model{
//fungsi lihat karyawan
	function lihat_karyawan(){
		$this->db->select('*');
		$this->db->from('karyawan');
		$result = $this->db->get();
		return $result->result();
	}	
	//fungsi lihat tools kembali
	function lihat_tools_kem(){
		$this->db->select('*');
		$this->db->from('tools');
		$result = $this->db->get();
		return $result->result();
	}	
	//fungsi lihat tools habis pakai
	function lihat_tools_hp(){
		$this->db->select('*');
		$this->db->from('tools_hp');
		$result = $this->db->get();
		return $result->result();
	}
	//fungsi lihat peminjaman
	function lihat_peminjaman(){
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->join('karyawan','karyawan.nik=peminjaman.nik');
		$this->db->join('tools','tools.kode_tools=peminjaman.kode_tools');
		$result = $this->db->get();
		return $result->result();
	}	
	//fungsi lihat pengembalian
	function lihat_pengembalian(){
		$this->db->select('*');
		$this->db->from('pengembalian');
		$this->db->join('karyawan','karyawan.nik=pengembalian.nik');
		$this->db->join('tools','tools.kode_tools=pengembalian.kode_tools');
		$result = $this->db->get();
		return $result->result();
	}
	//fungsi lihat pengambilan
	function lihat_pengambilan(){
		$this->db->select('*');
		$this->db->from('pengambilan');
		$this->db->join('karyawan','karyawan.nik=pengambilan.nik');
		$this->db->join('tools_hp','tools_hp.kode_tools_hp=pengambilan.kode_tools_hp');
		$result = $this->db->get();
		return $result->result();
	}	
}
?>