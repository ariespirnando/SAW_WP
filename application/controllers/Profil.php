<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	function __construct() {
        parent::__construct();
        if(!$this->session->userdata('loggedin')){   
            redirect('Login');
        }  
    }
	public function index()
	{
		$data = array(); 
		$data['menu'] = 'Profil';
		$data['action'] = base_url().'index.php/Profil/Ubahprofil3';
		$data['row']  = $this->db->query("SELECT * FROM tb_user t WHERE t.id_user='".$this->session->userdata('id_user')."'")->row_array();
		$this->template->load('template_wp','profil/profil',$data);
	}

	public function password(){
		$data = array(); 
		$data['menu'] = 'Profil';
		$data['action'] = base_url().'index.php/Profil/update';
		$this->template->load('template_wp','profil/password',$data);
	}
	public function password2(){
		$data = array(); 
		$data['menu'] = 'Profil';
		$data['action'] = base_url().'index.php/Profil/update2';
		$this->template->load('template_wp','profil/password2',$data);
	}

	function profil2(){
		$sql = "SELECT * FROM master_guru n where n.imaster_guru='".$this->session->userdata('imaster_guru')."'";
		$dt = $this->db->query($sql)->row_array();
		$data = array();
		$data['menu'] = 'Guru';
		$data['action'] = base_url().'Profil/Ubahprofil'; 
		$data['vNama_guru'] = $dt['vNama_guru']; 
		$data['imaster_guru'] = $dt['imaster_guru'];  

		$data['vNik'] = $dt['vNik'];  
		$data['vJabatan'] = $dt['vJabatan'];  
		$data['vJk'] = $dt['vJk'];  
		$data['talamat'] = $dt['talamat'];  
		if(empty($dt['vBirthday'])){
			$dt['vBirthday'] = "";
		}
		if(empty($dt['dBirthday'])){
			$dt['dBirthday'] ="";
		}
		$data['vBirthday'] = $dt['vBirthday'];
		$data['tpath'] = $dt['tpath'];  
		$data['dBirthday'] = $dt['dBirthday'];  
		$data['vNmapelajaran'] = $dt['vNmapelajaran'];  

		$data['btn'] = 'Edit'; 
		$this->template->load('template_wp','profil/profil2', $data); 
	}
	function Ubahprofil3(){
		$data['nama_user'] = $this->input->post('nama_user');  

		$data['alamat'] = $this->input->post('alamat');   
		$data['telpon'] = $this->input->post('telpon');    
		$id = $this->input->post('id_user');

		$config['upload_path'] = realpath('./assets/upload/admin/');
        $config['allowed_types'] = 'gif|jpg|png'; 
        $this->upload->initialize($config);
        $this->load->library('upload', $config);

		if (!file_exists($_FILES['gambar']['tmp_name']) || 
        	!is_uploaded_file($_FILES['gambar']['tmp_name'])) {
		    $this->db->where('id_user',$id);
			$this->db->update('tb_user',$data);
			$this->session->set_flashdata('message', 'Data berhasil di Update'); 
			redirect('Profil'); 
		}
		else{
		    if (!$this->upload->do_upload('gambar')) {
	            $error = $this->upload->display_errors();
	            $this->session->set_flashdata('message', 'Upload Foto Gagal !');   
	            redirect('Profil'); 
	        } else {
	            $result = $this->upload->data(); 
	            $data['tpath'] = $result['file_name'];
	            $this->db->where('id_user',$id);
				$this->db->update('tb_user',$data);
				
				$this->session->set_flashdata('message', 'Data berhasil di Update'); 
				redirect('Profil'); 
	        } 
		} 
 
	}
	function Ubahprofil(){
		$data['vNama_guru'] = $this->input->post('vNama_guru');  

		$data['vNik'] = $this->input->post('vNik');   
		$data['vJabatan'] = $this->input->post('vJabatan');   
		$data['vJk'] = $this->input->post('vJk');    
		$data['talamat'] = $this->input->post('talamat');   
		$data['vBirthday'] = $this->input->post('vBirthday');   
		$data['dBirthday'] = $this->input->post('dBirthday');     
		$data['vNmapelajaran'] = $this->input->post('vNmapelajaran');  
		$data['vPassword'] = md5($this->input->post('vNik'));
		$id = $this->input->post('imaster_guru');

		$config['upload_path'] = realpath('./assets/upload/guru/');
        $config['allowed_types'] = 'gif|jpg|png'; 
        $this->upload->initialize($config);
        $this->load->library('upload', $config);

		if (!file_exists($_FILES['gambar']['tmp_name']) || 
        	!is_uploaded_file($_FILES['gambar']['tmp_name'])) {
		    $this->db->where('imaster_guru',$id);
			$this->db->update('master_guru',$data);
			$this->session->set_flashdata('message', 'Data berhasil di Update'); 
			redirect('Profil/profil2'); 
		}
		else{
		    if (!$this->upload->do_upload('gambar')) {
	            $error = $this->upload->display_errors();
	            $this->session->set_flashdata('message', 'Upload Foto Gagal !');   
	            redirect('Profil/profil2'); 
	        } else {
	            $result = $this->upload->data(); 
	            $data['tpath'] = $result['file_name'];
	            $this->db->where('imaster_guru',$id);
				$this->db->update('master_guru',$data);
				
				$this->session->set_flashdata('message', 'Data berhasil di Update'); 
				redirect('Profil/profil2'); 
	        } 
		} 
 
	}
	 
	function update(){    

		if( null !== ($this->input->post('id_user')) &&
			null !== ($this->input->post('pass')) &&  
			null !== ($this->input->post('user'))){

			$pass = $this->input->post('pass');
			$id_user = $this->input->post('id_user'); 
			$user = $this->input->post('user');

			$data['user'] = $this->input->post('user');
			$data['pass'] = md5($pass); 
			$this->db->where('id_user',$id_user);
			$this->db->update('tb_user',$data); 

			$fls['pass'] = $pass;
			$fls['user'] = $user;
            $this->session->set_userdata($fls); 

            $this->session->set_flashdata('message', 'Password berhasil di Update'); 
			redirect('Profil/password');
			
		}else{
			$this->session->set_flashdata('message', 'Data belum diiisi !!'); 
			redirect('Profil/password');
		} 
	}

	function update2(){    

		if( null !== ($this->input->post('id_user')) &&
			null !== ($this->input->post('pass'))){

			$pass = $this->input->post('pass');
			$id_user = $this->input->post('id_user'); 

			$data['vPassword'] = md5($pass);  
			$this->db->where('imaster_guru',$id_user);
			$this->db->update('master_guru',$data);   

		    $fls['pass'] = $pass;
            $this->session->set_userdata($fls); 

            $this->session->set_flashdata('message', 'Password berhasil di Update'); 
			redirect('Profil/password2'); 
			
		}else{
			$this->session->set_flashdata('message', 'Data belum diiisi !!'); 
			redirect('Profil/password2');
		} 
	}
 
 
}
