<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rangking extends CI_Controller {
	function __construct(){
        parent::__construct();   
    } 
    function rank($year){
    	$data = array();
		$num_data  = $this->db->query("SELECT a.fnilai_akhir_saw, a.fnilai_akhir_wp, a.fnilai_akhir, a.ialternativ, mp.vNama_guru,mp.vNik, mp.tpath FROM alternativ a 
						JOIN master_guru mp on mp.imaster_guru = a.imaster_guru
						WHERE a.vTahun='".$year."'
						ORDER by a.fnilai_akhir DESC"); 
		$data['tampil'] = 0;
		if($num_data->num_rows()>0){
			$num2 = $this->db->query("SELECT a.ialternativ FROM alternativ a WHERE a.vTahun='".$year."' AND a.fnilai_akhir IS NULL")->num_rows();
			if($num2>0){}else{
				$data['tampil'] = 1;
				$data['result'] = $num_data->result_array();
			}
		}
		$data['resultx'] = $this->db->query("SELECT * FROM master_kriteria")->result_array();
		$data['menu'] = 'Rangking';
		$data['tahun'] = $year;
		if($this->session->userdata('loggedin')==2){
			$this->template->load('template_wp','rangking/rangking2', $data);
		}else{
			$this->template->load('template_wp','rangking/rangking', $data);
		}
		
    } 
	public function index(){  
		$data['menu'] = 'Rangking';
		$this->template->load('template_wp','rangking/index', $data);
	} 
}
?>