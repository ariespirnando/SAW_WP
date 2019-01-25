<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Myperingkat extends CI_Controller {
	function __construct(){
        parent::__construct();   
    } 
    function index(){
    	$data = array();
		$num_data  = $this->db->query("SELECT * FROM master_guru mg JOIN alternativ a on a.imaster_guru = mg.imaster_guru
			WHERE mg.imaster_guru='".$this->session->userdata('imaster_guru')."'
			ORDER BY a.vTahun"); 
		$data['result_num'] = $this->db->query("SELECT * FROM master_kriteria")->num_rows();
		$data['kriteria'] = $this->db->query("SELECT * FROM master_kriteria")->result_array(); 
		$data['tampil'] = 0;
		if($num_data->num_rows()>0){ 
			$data['tampil'] = 1;
			$data['result'] = $num_data->result_array(); 
		} 
		$data['menu'] = "Myperingkat";
		$this->template->load('template_wp','myperingkat/myperingkat', $data); 
    }  
}
?>