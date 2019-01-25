<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {
	function __construct(){
        parent::__construct();  
        if(!$this->session->userdata('loggedin')){   
            redirect('Login');
        } 
    }  
	public function index()
	{
		$data = array();
		$data['menu'] = 'Kriteria';
		$data['result'] = $this->db->query("SELECT * FROM master_kriteria")->result_array();
		$this->template->load('template_wp','kriteria/kriteria', $data);
	}
	function add(){
		$data = array();
		$data['menu'] = 'Kriteria';
		$data['action'] = base_url().'Kriteria/save';
		$data['vNama_kriteria'] = '';
		$data['vAtribut'] = '';
		$data['fbobot'] = '';
		$data['imaster_kriteria'] = ''; 
		$data['cKode'] = '';  
		$data['btn'] = 'Save';
		$this->template->load('template_wp','kriteria/formkriteria', $data);
	}
	function save(){
		$data['vNama_kriteria'] = $this->input->post('vNama_kriteria');
		$data['vAtribut'] = $this->input->post('vAtribut'); 
		$data['fbobot'] = $this->input->post('fbobot');  
		$this->db->insert('master_kriteria',$data); 
		$datas['cKode'] = "KRITERIA-".str_pad($this->db->insert_id(), 2, "0", STR_PAD_LEFT); 
		$this->db->where('imaster_kriteria',$this->db->insert_id());
		$this->db->update('master_kriteria',$datas); 
		redirect('Kriteria');
	}
	function edit($id){
		$sql = "SELECT * FROM master_kriteria n where n.imaster_kriteria='".$id."'";
		$dt = $this->db->query($sql)->row_array();
		$data = array();
		$data['menu'] = 'Kriteria';
		$data['action'] = base_url().'Kriteria/Ubah';
		$data['vNama_kriteria']  =$dt['vNama_kriteria'];
		$data['vAtribut'] = $dt['vAtribut']; 
		$data['imaster_kriteria'] = $dt['imaster_kriteria'];
		$data['cKode'] = $dt['cKode']; 
		$data['fbobot'] = $dt['fbobot'];  
		$data['btn'] = 'Edit'; 
		$this->template->load('template_wp','kriteria/formkriteria', $data); 
	}
	function Ubah(){
		$data['vNama_kriteria'] = $this->input->post('vNama_kriteria');
		$data['vAtribut'] = $this->input->post('vAtribut'); 
		$data['fbobot'] = $this->input->post('fbobot'); 
		$id = $this->input->post('imaster_kriteria');
		$this->db->where('imaster_kriteria',$id);
		$this->db->update('master_kriteria',$data);
		redirect('Kriteria');
	}
	function hapus($id){
		$this->db->where('imaster_kriteria',$id);
		$this->db->delete('master_kriteria'); 

		$this->db->query('Delete from master_kriteria_nilai'); 
		redirect('Kriteria');
	}
}
?>