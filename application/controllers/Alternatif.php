<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif extends CI_Controller {
	function __construct(){
        parent::__construct();  
        if(!$this->session->userdata('loggedin')){   
            redirect('Login');
        } 
    }  
 	
 	function fotoguru(){
 		$id = $this->input->post('q');
 		$img = $this->db->query('SELECT m.tpath FROM master_guru m where m.imaster_guru ="'.$id.'"')->row_array();
 		if(empty($img['tpath'])){
 			echo '';
 		}else{
 			echo '<img style="width: 50%; height: 50%" src="'.base_url().'assets/upload/guru/'.$img['tpath'].'">';
 		}
 	}
 	 
	public function index()
	{
		$data = array();
		$data['menu'] = 'Alternatif';
		$data['result'] = $this->db->query("SELECT * FROM alternativ a JOIN master_guru mp on mp.imaster_guru = a.imaster_guru ORDER BY a.vTahun,a.ialternativ DESC")->result_array();
		$data['result_num'] = $this->db->query("SELECT * FROM master_kriteria")->num_rows();
		$data['kriteria'] = $this->db->query("SELECT * FROM master_kriteria")->result_array(); 
		$this->template->load('template_wp','alternatif/alternatif', $data);
	}
	function guru(){
		$key = $this->input->get("term");     
        $data = array();
        // $sql = "SELECT mp.imaster_guru, mp.vNama_guru FROM master_guru mp where 
        // 			mp.imaster_guru NOT IN (SELECT al.imaster_guru FROM alternativ al)
        // 			AND (mp.vNama_guru LIKE '%".$key."%') LIMIT 50"; 
        $sql = "SELECT mp.imaster_guru, mp.vNama_guru FROM master_guru mp where mp.vNama_guru LIKE '%".$key."%' LIMIT 50"; 
        $que = $this->db->query($sql)->result_array();

        if(!empty($que)){
            foreach ($que as $line) {  
                $row['id']        = trim($line['imaster_guru']);
                $row['value']     = trim($line['vNama_guru']); 
                array_push($data, $row);
            }
        } 
                    
        echo json_encode($data);
        exit;  
	}
	function add(){
		$data = array();
		$data['action'] = base_url().'Alternatif/save';
		$data['menu'] = 'Alternatif';

		$data['vNama_guru'] = '';
		$data['imaster_guru'] = '';
		$data['ialternativ'] = '';
		$data['vTahun'] = '';
		$data['tpath'] ='';

		$data['btn'] = 'Save';
		$data['kriteria'] = $this->db->query("SELECT * FROM master_kriteria")->result_array();
		$this->template->load('template_wp','alternatif/formalternatif', $data);
	}
	function save(){
		$data['imaster_guru'] = $this->input->post('imaster_guru'); 
		$data['vTahun'] = $this->input->post('vTahun');

		if($this->cekData($data['imaster_guru'],$data['vTahun'])==0){

			$this->db->insert('alternativ',$data); 
			$datas['ialternativ'] = $this->db->insert_id();
			$fnilai_awal = $this->input->post('fnilai_awal'); 
			foreach ($fnilai_awal as $k => $v) { 
				$datas['imaster_kriteria'] = $k;
				$datas['vTahun'] = $data['vTahun'];
				$nilai = explode(',', $v);
				$datas['imaster_subkriteria']	  = $nilai[0];
				$datas['fnilai_awal']	  = $nilai[1];
				$this->db->insert('alternativ_detail',$datas);
			}

			$this->db->query('UPDATE alternativ a set a.fnilai_akhir_wp =NULL, a.fnilai_akhir_saw =NULL WHERE a.vTahun="'.$data['vTahun'].'"');
			$this->db->query('UPDATE alternativ_detail ad SET ad.fnilai_normal_saw = NULL WHERE ad.vTahun ="'.$data['vTahun'].'"'); 
			
			redirect('Alternatif');
		}else{
			$this->session->set_flashdata('message', 'Nama Guru sudah Terdaftar !!'); 
			redirect('Alternatif/add');
		}
	}
	function edit($id){
		$sql = "SELECT * FROM alternativ a JOIN master_guru mp on mp.imaster_guru = a.imaster_guru where a.ialternativ='".$id."'";
		$dt = $this->db->query($sql)->row_array();
		$data = array();
		$data['menu'] = 'Alternatif';
		$data['action'] = base_url().'Alternatif/Ubah';

		$data['vNama_guru'] = $dt['vNama_guru'];
		$data['imaster_guru'] = $dt['imaster_guru'];
		$data['ialternativ'] = $dt['ialternativ']; 
		$data['vTahun'] = $dt['vTahun'];
		$data['tpath'] = $dt['tpath'];
		

		$data['btn'] = 'Edit'; 
		$data['kriteria'] = $this->db->query("SELECT * FROM master_kriteria")->result_array();
		$this->template->load('template_wp','alternatif/formalternatif', $data); 
	}
	function Ubah(){ 
		$data['imaster_guru'] = $this->input->post('imaster_guru'); 
		$data['vTahun'] = $this->input->post('vTahun');
		$id = $this->input->post('ialternativ');
		$this->db->where('ialternativ',$id);
		$this->db->update('alternativ',$data);

		$this->db->where('ialternativ',$id);
		$this->db->delete('alternativ_detail');  

		$datas['ialternativ'] = $id;
		$fnilai_awal = $this->input->post('fnilai_awal'); 
		foreach ($fnilai_awal as $k => $v) { 
			$datas['imaster_kriteria'] = $k;
			$datas['vTahun'] = $data['vTahun'];
			$nilai = explode(',', $v);
			$datas['imaster_subkriteria']	  = $nilai[0];
			$datas['fnilai_awal']	  = $nilai[1];
			$this->db->insert('alternativ_detail',$datas);
		}

		$this->db->query('UPDATE alternativ a set a.fnilai_akhir_wp =NULL, a.fnilai_akhir_saw =NULL WHERE a.vTahun="'.$data['vTahun'].'"');
		$this->db->query('UPDATE alternativ_detail ad SET ad.fnilai_normal_saw = NULL WHERE ad.vTahun ="'.$data['vTahun'].'"'); 

		redirect('Alternatif');
	}
	function hapus($id){
		$this->db->where('ialternativ',$id);
		$this->db->delete('alternativ');  

		$this->db->where('ialternativ',$id);
		$this->db->delete('alternativ_detail');  

		$this->db->query('UPDATE alternativ a set a.fnilai_akhir_wp =NULL, a.fnilai_akhir_saw =NULL');
		$this->db->query('UPDATE alternativ_detail ad SET ad.fnilai_normal_saw = NULL'); 

		redirect('Alternatif');
	}
	function cleardata($year){
		$this->db->query('Delete from alternativ_detail WHERE vTahun="'.$year.'"');
		$this->db->query('Delete from alternativ WHERE vTahun="'.$year.'"');
	}

	function cekData($id,$year){
		$sql = "SELECT a.ialternativ FROM alternativ a WHERE a.imaster_guru = '".$id."' AND 
				a.vTahun = '".$year."' ";
		if($this->db->query($sql)->num_rows()>0){
			return 1;
		}else{
			return 0;
		}
	}
  
}
?>