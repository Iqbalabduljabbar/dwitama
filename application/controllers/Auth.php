<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	var $table   = "login";
	var $pk		 = "id";

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('auth_model');
	}
	public function index()
	{
		$data['title'] = 'Login';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/login', $data);
		$this->load->view('templates/auth_footer', $data);
	}
	public function edituser()
	{
		$data['title'] = 'Edit User';
		$this->load->view('templates/header', $data);
		$this->load->view('auth/edituser', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambah_edituser()
	{
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$nama = $this->input->post('nama');
		$level = $this->input->post('level');
		//get Pdf
        $config['upload_path'] = './foto';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';  //2MB max
        $config['file_name'] = $_FILES['foto']['name'];
        $this->upload->initialize($config);
        if (!empty($_FILES['foto']['name'])) {
          if ( $this->upload->do_upload('foto') ) {
            $file = $this->upload->data();
              $data = array(
                'id' => $id,
                'username' => $username,
                'nama' => $nama,
                'level' => $level,
                'foto' => $file['file_name'],
              );
              $this->auth_model->tambah_edituser('login',$data,$id);
              redirect('auth/Toolkeeper');
          }else {
              die("gagal upload");
          }
        }else {
          echo "tidak masuk";
        }	
    }

    public function ganti_password()
    {
    	$data['title'] = 'Ganti Password';
    	// $this->auth_model->m_ganti_password('login',$data);
    	$login = $this->session->userdata['id'];
    	$this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
		$this->form_validation->set_rules('password_baru1', 'Password Baru', 'required|trim|min_length[8]|matches[password_baru2]'); 
		$this->form_validation->set_rules('password_baru2', 'Password Baru', 'required|trim|min_length[8]|matches[password_baru1]');

    	if($this->form_validation->run() == false){
			$this->load->view('templates/header', $data);
			$this->load->view('auth/ganti_password', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$post = $this->input->post();
			$data = array('password' => md5($post['password_baru1']));

			$this->auth_model->m_confirm_password($login, $data, 'login');
			redirect('Auth/toolkeeper');	
		}
   	}	

 //   	public function do_edit_password()
	// {
	// 	$id  =  $this->session->userdata('id');
	// 	foreach ($_POST as $key => $value) { $$key = $value; }
		
	// 	$oldpassTHIS =  $this->session->userdata('password'); 
	// 	$oldpass 	 = 	MD5($password_lama);
		
	// 	if($oldpassTHIS == $oldpass)
	// 	{
	// 		if($password_baru1 == $password_baru2)
	// 		{
	// 			if(isset($_POST['submit']))
	// 			{
	// 				$data = array('password'  => MD5($password_baru1));
	// 			}
	// 			$editpass = $this->crud->update($this->table,$data, $this->pk,$id);
	// 			if ($editpass != true) 
	// 			{
	// 				$this->session->set_userdata('password',MD5($password_baru1));
	// 				$this->session->set_flashdata("msg", $this->crud->msg_berhasil('Password berhasil di ubah'));
	// 			}
	// 			else 
	// 			{
	// 				$this->session->set_flashdata("msg", $this->crud->msg_gagal());
	// 			}
	// 		}
			
	// 		else{
	// 			$this->session->set_flashdata("msg", $this->crud->msg_gagal());
	// 		}
	// 	}
	// 	else{
	// 		$this->session->set_flashdata("msg", $this->crud->msg_gagal());
	// 	}
	// 	redirect(base_url('Auth/toolkeeper'));
	// }

	public function login()
	{
		$username=$this->input->post('username', TRUE);
		$password=md5($this->input->post('password', TRUE));
		$validasi = $this->auth_model->validasi($username,$password);
		if ($validasi->num_rows() > 0){
			$data = $validasi->row_array();
			$id 		= $data['id'];
			$username 	= $data['username'];
			$nama 		= $data['nama'];
			$password 	= $data['password'];
			$level	 	= $data['level'];
			$foto 		= $data['foto'];
			$sesdata	= array(
						'id' 		=> $id,
						'username' 	=> $username,
						'nama'		=> $nama,
						'password'	=> $password,
						'level'		=> $level,
						'foto' 		=> $foto,
						'logged_in' => TRUE
			);
		$this->session->set_userdata($sesdata);
			//Akses Login GA
			if($level === 'GA'){
				redirect('auth/GA');
			}
			else{
				redirect('auth/Toolkeeper');
			}
		}
		else{
			echo $this->session->set_flashdata('msg','Username atau Password Tidak Sesuai!');
			redirect('auth');
		}
	}

		public function GA(){
			$data['title'] = 'Beranda';
			if($this->session->userdata('level')==='GA'){
				$this->load->view('templates/headerhome', $data);
				$this->load->view('GA/home');
				$this->load->view('templates/footer');
			}
			else {
				echo "Access Denied";
			}
		}

		public function Toolkeeper(){
			$data['title'] = 'Beranda';
			if($this->session->userdata('level')==='Toolkeeper'){
				$this->load->view('templates/headerhome', $data);
				$this->load->view('toolkeeper/home');
				$this->load->view('templates/footer');
			}
			else {
				echo "Access Denied";
			}
		}
	

	public function registration()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim'); 
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');


		if( $this->form_validation->run() == false) {
		$data['title'] = 'Dwitama User Registration';
 		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/registration');
		$this->load->view('templates/auth_footer');	
		} else {
			echo 'data berhasil ditambahkan!';
		}
	}

	// public function registration_new()
	// {
	// 	$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
	// 	$this->form_validation->set_rules('email', 'Email', 'required|trim');
	// 	if($this->form_validation->run() == false){
	// 		$data['title'] = 'Dwitama User Registration';
	//  		$this->load->view('templates/auth_header', $data);
	// 		$this->load->view('auth/registration');
	// 		$this->load->view('templates/auth_footer');
	// 	}else{
	// 		echo 'data berhasil ditambahkan!';
	// 	}		
			
	// }

	public function logout(){
		$this->session->sess_destroy();
		redirect('auth');
	}
}