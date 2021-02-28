<?php 
class Auth_model extends CI_Model{
//fungsi validasi
	function validasi($username, $password){
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$result = $this->db->get('login',1);
		return $result;
	}

	function tambah_edituser($table,$data,$where){
		$this->db->where('id', $where);
		$this->db->update($table,$data);
	}	

	function m_ganti_password(){
		$data['login'] = $this->db->get_where('login', ['username' =>
			$this->session->userdata('username')])->row_array();
	}

	function m_confirm_password($login,$data,$table){
		$this->db->where('id',$login);
        $this->db->update($table,$data);
 	}
}
?>