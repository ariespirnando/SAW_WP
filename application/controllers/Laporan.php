<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	function __construct(){
        parent::__construct();  
        if(!$this->session->userdata('loggedin')){   
            redirect('Login');
        } 
    }  
 	
 	
 	function index(){
 		$data['menu'] = 'Laporan';
 		$this->template->load('template_wp','laporan/index', $data);
 	}
	public function lapor($year)
	{
		$data = array();
		$data['menu'] = 'Laporan';
		$data['result'] = $this->db->query("SELECT * FROM alternativ a JOIN master_guru mp on mp.imaster_guru = a.imaster_guru WHERE a.vTahun='".$year."'")->result_array();
		$data['result_num'] = $this->db->query("SELECT * FROM master_kriteria")->num_rows();
		$data['kriteria'] = $this->db->query("SELECT * FROM master_kriteria")->result_array(); 

		$num_data  = $this->db->query("SELECT a.fnilai_akhir_saw, a.fnilai_akhir_wp, a.fnilai_akhir, a.ialternativ, mp.vNama_guru FROM alternativ a 
						JOIN master_guru mp on mp.imaster_guru = a.imaster_guru 
						WHERE a.vTahun='".$year."'
						ORDER by a.fnilai_akhir DESC"); 
		$data['tampil'] = 0;
		$data['tahun'] = $year;
		if($num_data->num_rows()>0){
			$num2 = $this->db->query("SELECT a.ialternativ FROM alternativ a WHERE a.vTahun='".$year."' AND a.fnilai_akhir IS NULL OR a.fnilai_akhir_saw IS NULL OR a.fnilai_akhir_wp IS NULL")->num_rows();
			if($num2>0){}else{
				$data['tampil'] = 1;
				$data['resultx'] = $num_data->result_array();
			}
		}

		$this->template->load('template_wp','laporan/laporan', $data);
	}

	function cetak($year){
		$data['result'] = $this->db->query("SELECT * FROM alternativ a JOIN master_guru mp on mp.imaster_guru = a.imaster_guru WHERE a.vTahun='".$year."'")->result_array();
		$data['result_num'] = $this->db->query("SELECT * FROM master_kriteria")->num_rows();
		$data['kriteria'] = $this->db->query("SELECT * FROM master_kriteria")->result_array(); 

		$num_data  = $this->db->query("SELECT a.fnilai_akhir_saw, a.fnilai_akhir_wp, a.fnilai_akhir, a.ialternativ, mp.vNama_guru FROM alternativ a 
						JOIN master_guru mp on mp.imaster_guru = a.imaster_guru
						WHERE a.vTahun='".$year."'
						ORDER by a.fnilai_akhir DESC"); 
		$data['tampil'] = 0;
		if($num_data->num_rows()>0){
			$num2 = $this->db->query("SELECT a.ialternativ FROM alternativ a WHERE a.vTahun='".$year."' AND a.fnilai_akhir IS NULL")->num_rows();
			if($num2>0){}else{
				$data['tampil'] = 1;
				$data['resultx'] = $num_data->result_array();
			}
		}
		$data['tahun'] = $year;
		

		$this->load->library('pdf'); 
	    $this->pdf->setPaper('A4', 'potrait');
	    $this->pdf->filename = "laporan.pdf";
	    $this->pdf->load_view('laporan/cetak',$data); 
	    /*header("Content-Disposition: attachment; filename=laporan.xlsx");
  		header("Content-Type: application/vnd.ms-excel");
	    $this->load->view('laporan/cetak',$data);*/
	}

	function cetak2($year){
		$data['result'] = $this->db->query("SELECT * FROM alternativ a JOIN master_guru mp on mp.imaster_guru = a.imaster_guru WHERE a.vTahun='".$year."'")->result_array();
		$data['result_num'] = $this->db->query("SELECT * FROM master_kriteria")->num_rows();
		$data['kriteria'] = $this->db->query("SELECT * FROM master_kriteria")->result_array(); 

		$num_data  = $this->db->query("SELECT a.fnilai_akhir_saw, a.fnilai_akhir_wp, a.fnilai_akhir, a.ialternativ, mp.vNama_guru FROM alternativ a 
						JOIN master_guru mp on mp.imaster_guru = a.imaster_guru
						WHERE a.vTahun='".$year."'
						ORDER by a.fnilai_akhir DESC"); 
		$data['tampil'] = 0;
		if($num_data->num_rows()>0){
			$num2 = $this->db->query("SELECT a.ialternativ FROM alternativ a WHERE a.vTahun='".$year."' AND a.fnilai_akhir IS NULL")->num_rows();
			if($num2>0){}else{
				$data['tampil'] = 1;
				$data['resultx'] = $num_data->result_array();
			}
		}
		$data['tahun'] = $year;
		

		header("Content-Disposition: attachment; filename=laporan.xls");
  		header("Content-Type: application/vnd.ms-excel");
	    $this->load->view('laporan/cetak',$data);
	}
	 
   
}
?>