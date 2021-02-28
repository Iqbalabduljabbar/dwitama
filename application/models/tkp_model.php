<?php 
class Tkp_model extends CI_Model{
//fungsi validasi
	function lihat_karyawan(){
		$this->db->select('*');
		$this->db->from('karyawan');
		$result = $this->db->get();
		return $result->result();
	}	

	function tambah_karyawan($table, $data){
		$this->db->insert($table,$data);
	}

	function get_nik($nik){
		$this->db->from('karyawan');
		$this->db->where('nik',$nik);
		$result=$this->db->get();
		return $result->result();
	}

	function edit_karyawan($table, $data, $nik){
		$this->db->where('nik',$nik);
		$this->db->update($table,$data);
	}

	function hapus_karyawan($nik){
		$this->db->where('nik',$nik);
		$this->db->delete('karyawan');
	}

	function lihat_tools_hp(){
		$this->db->select('*');
		$this->db->from('tools_hp');
		$result = $this->db->get();
		return $result->result();
	}

	function tambah_tools_hp($table, $data){
		$this->db->insert($table,$data);
	}

	function get_kode_tools_hp($kode_tools_hp){
		$this->db->from('tools_hp');
		$this->db->where('kode_tools_hp',$kode_tools_hp);
		$result=$this->db->get();
		return $result->result();
	}

	function edit_tools_hp($table, $data, $kode_tools_hp){
		$this->db->where('kode_tools_hp',$kode_tools_hp);
		$this->db->update($table,$data);
	}

	function hapus_tools_hp($kode_tools_hp){
		$this->db->where('kode_tools_hp',$kode_tools_hp);
		$this->db->delete('tools_hp');
	}	
	function lihat_tools_kem(){
		$this->db->select('*');
		$this->db->from('tools');
		$result = $this->db->get();
		return $result->result();
	}

	function tambah_tools($table, $data){
		$this->db->insert($table,$data);
	}

	function get_kode_tools($kode_tools){
		$this->db->from('tools');
		$this->db->where('kode_tools',$kode_tools);
		$result=$this->db->get();
		return $result->result();
	}

	function edit_tools($table, $data, $kode_tools){
		$this->db->where('kode_tools',$kode_tools);
		$this->db->update($table,$data);
	}

	function hapus_tools($kode_tools){
		$this->db->where('kode_tools',$kode_tools);
		$this->db->delete('tools');
	}	

	function lihat_peminjaman(){
		$this->db->select('*');
		$this->db->from('tmp_peminjaman');
		$this->db->join('karyawan','karyawan.nik=tmp_peminjaman.nik');
		$this->db->join('tools','tools.kode_tools=tmp_peminjaman.kode_tools');
		$this->db->join('peminjaman','peminjaman.id_pinjam=tmp_peminjaman.id_pinjam');
		$result = $this->db->get();
		return $result->result();
	}

	function tambah_peminjaman($table, $data){
		$this->db->insert($table,$data);
	}

	function get_id_pinjam($id_tmp_peminjaman){
		$this->db->from('tmp_peminjaman');
		$this->db->join('karyawan','karyawan.nik=tmp_peminjaman.nik');
		$this->db->join('tools','tools.kode_tools=tmp_peminjaman.kode_tools');
		$this->db->where('id_tmp_peminjaman',$id_tmp_peminjaman);
		$result=$this->db->get();
		return $result->result();
	}

	function edit_peminjaman($table, $data, $id_pinjam){
		$this->db->where('id_pinjam',$id_pinjam);
		$this->db->update($table,$data);
	}

	function hapus_peminjaman($id_pinjam){
		$this->db->where('id_pinjam',$id_pinjam);
		$this->db->delete('peminjaman');
	}

	function lihat_pengembalian(){
		$this->db->select('*');
		$this->db->from('tmp_pengembalian');
		$this->db->join('karyawan','karyawan.nik=tmp_pengembalian.nik');
		$this->db->join('tools','tools.kode_tools=tmp_pengembalian.kode_tools');
		$result = $this->db->get();
		return $result->result();
	}
	
	function tambah_pengembalian($table, $data){
		$this->db->insert($table,$data);
	}

	function get_id_kembali($id_tmp_kembali){
		$this->db->from('tmp_pengembalian');
		$this->db->join('karyawan','karyawan.nik=tmp_pengembalian.nik');
		$this->db->join('tools','tools.kode_tools=tmp_pengembalian.kode_tools');
		$this->db->where('id_tmp_kembali',$id_tmp_kembali);
		$result=$this->db->get();
		return $result->result();
	}

	function edit_pengembalian($table, $data, $id_kembali){
		$this->db->where('id_kembali',$id_kembali);
		$this->db->update($table,$data);
	}

	function hapus_pengembalian($id_kembali){
		$this->db->where('id_kembali',$id_kembali);
		$this->db->delete('pengembalian');
	}

	function lihat_pengambilan(){
		$this->db->select('*');
		$this->db->from('tmp_pengambilan');
		$this->db->join('karyawan','karyawan.nik=tmp_pengambilan.nik');
		$this->db->join('tools_hp','tools_hp.kode_tools_hp=tmp_pengambilan.kode_tools_hp');
		$result = $this->db->get();
		return $result->result();
	}

	function tambah_pengambilan($table, $data){
		$this->db->insert($table,$data);
	}

	// function get_id_pengambilan($id_pengambilan){
	// 	$this->db->from('pengambilan');
	// 	$this->db->join('karyawan','karyawan.nik=pengambilan.nik');
	// 	$this->db->join('tools_hp','tools_hp.kode_tools_hp=pengambilan.kode_tools_hp');
	// 	$this->db->where('id_pengambilan',$id_pengambilan);
	// 	$result=$this->db->get();
	// 	return $result->result();
	// }

	function hapus_pengambilan($id_pengambilan){
		$this->db->where('id_pengambilan',$id_pengambilan);
		$this->db->delete('pengambilan');
	}

	function tambah_tmp_peminjaman($table, $data){
		$this->db->insert($table,$data);
	}

	function get_id_tmp_peminjaman($id_tmp_peminjaman){
		$this->db->from('tmp_peminjaman');
		$this->db->join('karyawan','karyawan.nik=tmp_peminjaman.nik');
		$this->db->join('tools','tools.kode_tools=tmp_peminjaman.kode_tools');
		$this->db->where('id_tmp_peminjaman',$id_tmp_peminjaman);
		$result=$this->db->get();
		return $result->result();
	}

	function tambah_tmp_pengembalian($table, $data){
		$this->db->insert($table,$data);
	}

	function get_id_tmp_pengembalian($id_tmp_pengembalian){
		$this->db->from('tmp_pengembalian');
		$this->db->join('karyawan','karyawan.nik=tmp_pengembalian.nik');
		$this->db->join('tools','tools.kode_tools=tmp_pengembalian.kode_tools');
		$this->db->where('id_tmp_pengembalian',$id_tmp_pengembalian);
		$result=$this->db->get();
		return $result->result();
	}

	function tambah_tmp_pengambilan($table, $data){
		$this->db->insert($table,$data);
	}

	function get_id_tmp_pengambilan($id_tmp_pengambilan){
		$this->db->from('tmp_pengambilan');
		$this->db->join('karyawan','karyawan.nik=tmp_pengambilan.nik');
		$this->db->join('tools_hp','tools_hp.kode_tools_hp=tmp_pengambilan.kode_tools_hp');
		$this->db->where('id_tmp_pengambilan',$id_tmp_pengambilan);
		$result=$this->db->get();
		return $result->result();
	}

	public function getToolshp()
    {
        return $this->db->get('tools_hp')->result_array();
    }

    public function getTools()
    {
        return $this->db->get('tools')->result_array();
    }

    public function getKaryawan()
    {
        return $this->db->get('karyawan')->result_array();
    }

    public function cekStok($id)
    {
        return $this->db->get_where('tools t', ['kode_tools' => $id])->row_array();
    }

    public function cekStokhp($id)
    {
         return $this->db->get_where('tools_hp thp', ['kode_tools_hp' => $id])->row_array();
    }

    public function getMax($table, $field, $kode = null)
    {
        $this->db->select_max($field);
        if ($kode != null) {
            $this->db->like($field, $kode, 'after');
        }
        return $this->db->get($table)->row_array()[$field];
    }	
}
?>
