<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {
	function __construct(){
        parent::__construct();  
        if(!$this->session->userdata('loggedin')){   
            redirect('Login');
        } 
    }  
	public function index()
	{
		$data = array();
		$data['action'] = base_url().'index.php/Daftar/add';
		$data['menu'] = 'Daftar';
		$this->template->load('template_wp','daftar/daftar', $data);
	}
	 
	function add(){   
		if( null !== ($this->input->post('alamat')) &&
			null !== ($this->input->post('nama_user')) &&
			null !== ($this->input->post('pass')) &&
			null !== ($this->input->post('telpon')) &&  
			null !== ($this->input->post('user'))){

			$alamat = $this->input->post('alamat');
			$nama_user = $this->input->post('nama_user');
			$telpon = $this->input->post('telpon');
			$user = $this->input->post('user');
			$pass = $this->input->post('pass');  
			$data['pass'] = md5($pass);
			$data['user'] = $user;
			$data['telpon'] = $telpon;
			$data['nama_user'] = $nama_user;
			$data['alamat'] = $alamat;  

			$config['upload_path'] = realpath('./assets/upload/admin/');
	        $config['allowed_types'] = 'gif|jpg|png'; 
	        $this->upload->initialize($config);
	        $this->load->library('upload', $config);
	        
	        if (!file_exists($_FILES['gambar']['tmp_name']) || 
	        	!is_uploaded_file($_FILES['gambar']['tmp_name'])) {
	        	$this->db->insert('tb_user',$data);
				redirect('Daftar');
	        }else{

		        if (!$this->upload->do_upload('gambar')) {
		            $error = $this->upload->display_errors();  
		            $this->session->set_flashdata('message', 'Upload Foto Gagal !'); 
					redirect('Daftar');
		        } else {
		            $result = $this->upload->data(); 
		            $data['tpath'] = $result['file_name'];
		            $this->db->insert('tb_user',$data);
		            $this->session->set_flashdata('message', 'Data berasil ditambah'); 
					redirect('Daftar');
		        } 
		    }
		}else{
			$this->session->set_flashdata('message', 'Data belum diiisi !!'); 
			redirect('Daftar');
		} 
	}
 
 
}
