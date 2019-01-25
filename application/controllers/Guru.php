<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {
	function __construct(){
        parent::__construct();  
        if(!$this->session->userdata('loggedin')){   
            redirect('Login');
        } 
    }  
	public function index()
	{
		$data = array();
		$data['menu'] = 'Guru';
		$data['result'] = $this->db->query("SELECT * FROM master_guru")->result_array();
		$this->template->load('template_wp','guru/guru', $data);
	}
	function add(){
		$data = array();
		$data['menu'] = 'Guru';
		$data['action'] = base_url().'Guru/save'; 
		$data['vNama_guru'] = ''; 
		$data['imaster_guru'] = '';   


		$data['vNik'] = '';  
		$data['vJabatan'] = '';  
		$data['vJk'] = '';  
		$data['talamat'] = '';  
		$data['vBirthday'] = '';  
		$data['dBirthday'] = '';  
		$data['vNmapelajaran'] = '';  

		$data['btn'] = 'Save';
		$this->template->load('template_wp','guru/formguru', $data);
	}
	function save(){ 
		$data['vNama_guru'] = $this->input->post('vNama_guru');  

		$data['vNik'] = $this->input->post('vNik');   
		$data['vPassword'] = md5($this->input->post('vNik'));
		$data['vJabatan'] = $this->input->post('vJabatan');   
		$data['vJk'] = $this->input->post('vJk');    
		$data['talamat'] = $this->input->post('talamat');   
		$data['vBirthday'] = $this->input->post('vBirthday');   
		$data['dBirthday'] = $this->input->post('dBirthday');     
		$data['vNmapelajaran'] = $this->input->post('vNmapelajaran');    


		$config['upload_path'] = realpath('./assets/upload/guru/');
        $config['allowed_types'] = 'gif|jpg|png'; 
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        if (!file_exists($_FILES['gambar']['tmp_name']) || 
        	!is_uploaded_file($_FILES['gambar']['tmp_name'])) {
        	$this->db->insert('master_guru',$data); 
			redirect('Guru');
        }else{
	        if (!$this->upload->do_upload('gambar')) {
	            $error = $this->upload->display_errors();   
	            $this->session->set_flashdata('message', 'Upload Foto Gagal !'); 
	            redirect('Guru/add');
	        } else {
	            $result = $this->upload->data(); 
	            $data['tpath'] = $result['file_name'];
	            $this->db->insert('master_guru',$data); 
				redirect('Guru');
	        } 
	    }
		
	}
	function edit($id){
		$sql = "SELECT * FROM master_guru n where n.imaster_guru='".$id."'";
		$dt = $this->db->query($sql)->row_array();
		$data = array();
		$data['menu'] = 'Guru';
		$data['action'] = base_url().'Guru/Ubah'; 
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
		$data['tpath']     = $dt['tpath'];
		$data['vBirthday'] = $dt['vBirthday'];  
		$data['dBirthday'] = $dt['dBirthday'];  
		$data['vNmapelajaran'] = $dt['vNmapelajaran'];  

		$data['btn'] = 'Edit'; 
		$this->template->load('template_wp','guru/formguru', $data); 
	}
	function Ubah(){ 
		$data['vNama_guru'] = $this->input->post('vNama_guru');  

		$data['vNik'] = $this->input->post('vNik');   
		$data['vPassword'] = md5($this->input->post('vNik'));
		$data['vJabatan'] = $this->input->post('vJabatan');   
		$data['vJk'] = $this->input->post('vJk');    
		$data['talamat'] = $this->input->post('talamat');   
		$data['vBirthday'] = $this->input->post('vBirthday');   
		$data['dBirthday'] = $this->input->post('dBirthday');     
		$data['vNmapelajaran'] = $this->input->post('vNmapelajaran');  

		$id = $this->input->post('imaster_guru');

		$config['upload_path'] = realpath('./assets/upload/guru/');
        $config['allowed_types'] = 'gif|jpg|png'; 
        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if (!file_exists($_FILES['gambar']['tmp_name']) || 
        	!is_uploaded_file($_FILES['gambar']['tmp_name'])) {
		    $this->db->where('imaster_guru',$id);
			$this->db->update('master_guru',$data);
			redirect('Guru');
		}
		else{
		    if (!$this->upload->do_upload('gambar')) {
	            $error = $this->upload->display_errors();
	            $this->session->set_flashdata('message', 'Upload Foto Gagal !');   
	            redirect('Guru/edit/'.$id);
	        } else {
	            $result = $this->upload->data(); 
	            $data['tpath'] = $result['file_name'];
	            $this->db->where('imaster_guru',$id);
				$this->db->update('master_guru',$data);
				redirect('Guru');
	        } 
		}
        
	}
	function hapus($id){
		$this->db->where('imaster_guru',$id);
		$this->db->delete('master_guru');
		redirect('Guru');
	}
}
?>