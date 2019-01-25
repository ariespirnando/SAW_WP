<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Peringkat extends CI_Controller {
	function __construct(){
        parent::__construct();  
        if(!$this->session->userdata('loggedin')){   
            redirect('Login');
        } 
    }  
    public function index(){
    	$data['menu'] = 'Peringkat';
    	$this->template->load('template_wp','peringkat/index', $data);
    }
	public function rank($year){

		$awal_wp = microtime(true);
		$this->hitungWP($year);
		$akhir_wp = microtime(true); 
		$lama_wp = $akhir_wp - $awal_wp;

		$awal_saw = microtime(true);
		$this->hitungSAW($year); 
		$akhir_saw = microtime(true); 
		$lama_saw = $akhir_saw - $awal_saw;

		$this->jumlahAkhir($year);

		$data = array();
		$num_data  = $this->db->query("SELECT a.fnilai_akhir_saw, a.fnilai_akhir_wp, a.fnilai_akhir, a.ialternativ, mp.vNama_guru, mp.tpath FROM alternativ a 
						JOIN master_guru mp on mp.imaster_guru = a.imaster_guru
						WHERE a.vTahun='".$year."'
						ORDER by a.fnilai_akhir DESC"); 

		$num_wp  = $this->db->query("SELECT a.fnilai_akhir_saw, a.fnilai_akhir_wp, a.fnilai_akhir, a.ialternativ, mp.vNama_guru, mp.tpath FROM alternativ a 
						JOIN master_guru mp on mp.imaster_guru = a.imaster_guru
						WHERE a.vTahun='".$year."'
						ORDER by a.fnilai_akhir_wp DESC"); 
		$num_saw  = $this->db->query("SELECT a.fnilai_akhir_saw, a.fnilai_akhir_wp, a.fnilai_akhir, a.ialternativ, mp.vNama_guru, mp.tpath FROM alternativ a 
						JOIN master_guru mp on mp.imaster_guru = a.imaster_guru
						WHERE a.vTahun='".$year."'
						ORDER by a.fnilai_akhir_saw DESC"); 


		$data['tampil'] = 0;
		if($num_data->num_rows()>0){
			$num2 = $this->db->query("SELECT a.ialternativ FROM alternativ a WHERE a.vTahun='".$year."' AND a.fnilai_akhir IS NULL")->num_rows();
			if($num2>0){}else{
				$data['tampil'] = 1;
				$data['result'] = $num_data->result_array();
				$data['result_wp'] = $num_wp->result_array();
				$data['result_saw'] = $num_saw->result_array();
			}
		}
		$data['time_wp'] = $lama_wp;
		$data['time_saw'] = $lama_saw;
		$data['menu'] = 'Peringkat';
		$data['tahun'] = $year;
		$this->template->load('template_wp','peringkat/peringkat', $data);
	}

	function hitungSAW($year){ 
		$kriteria = $this->db->query("SELECT fbobot,imaster_kriteria,fbobot_preferensi,vAtribut FROM master_kriteria")->result_array();
		foreach ($kriteria as $kri) {
			$benefit = $this->db->query("SELECT MAX(ad.fnilai_awal) as Benefit FROM alternativ_detail ad JOIN master_kriteria mk on 
											mk.imaster_kriteria = ad.imaster_kriteria
											WHERE mk.vAtribut = 'Benefit' AND ad.imaster_kriteria='".$kri['imaster_kriteria']."' AND ad.vTahun='".$year."'
											LIMIT 1")->row_array();
			$cost = $this->db->query("SELECT MIN(ad.fnilai_awal) as Cost FROM alternativ_detail ad JOIN master_kriteria mk on 
											mk.imaster_kriteria = ad.imaster_kriteria
											WHERE mk.vAtribut = 'Cost' AND ad.imaster_kriteria='".$kri['imaster_kriteria']."' AND ad.vTahun='".$year."'
											LIMIT 1")->row_array();

			$nilai = $this->db->query("SELECT ad.ialternativ_detail, ad.ialternativ, ad.fnilai_awal 
						FROM alternativ_detail ad WHERE ad.imaster_kriteria = '".$kri['imaster_kriteria']."' AND ad.vTahun='".$year."'")->result_array();
			foreach ($nilai as $nn) {
				$this->db->where('ialternativ_detail',$nn['ialternativ_detail']); 
				if($kri['vAtribut']=="Benefit"){
					if(!empty($benefit['Benefit'])){
						if($nn['fnilai_awal']==0){
							$dUpdate['fnilai_normal_saw'] = 0;
							$dUpdate['fnilai_bobot_saw'] = 0; 
						}else{
							$nilai_normal  = number_format(($nn['fnilai_awal']/$benefit['Benefit']),8);
							$dUpdate['fnilai_normal_saw'] = $nilai_normal;
							$dUpdate['fnilai_bobot_saw'] = number_format(($nilai_normal*$kri['fbobot']),8);
						}
						$this->db->update('alternativ_detail',$dUpdate);
					}
				}else{
					if(!empty($cost['Cost'])){
						if($nn['fnilai_awal']==0){
							$dUpdate['fnilai_normal_saw'] = 0;
							$dUpdate['fnilai_bobot_saw'] = 0;
						}else{
							$nilai_normal = number_format(($cost['Cost']/$nn['fnilai_awal']),8);
							$dUpdate['fnilai_normal_saw'] = $nilai_normal;
							$dUpdate['fnilai_bobot_saw'] = number_format(($nilai_normal*$kri['fbobot']),8);
						}
						$this->db->update('alternativ_detail',$dUpdate);
					}
				}
			}  
		}

		$Alternatif = $this->db->query("SELECT ialternativ FROM alternativ WHERE vTahun='".$year."'")->result_array();
		foreach ($Alternatif as $al) {
			$sqN = $this->db->query("SELECT SUM(ad.fnilai_bobot_saw) as nilai FROM  alternativ_detail ad where ad.ialternativ = '".$al['ialternativ']."' AND ad.vTahun='".$year."'")->row_array();
			if(empty($sqN['nilai'])){
				$dtAlt['fnilai_akhir_saw'] = 0;
			}else{
				$dtAlt['fnilai_akhir_saw'] = $sqN['nilai'];
			}  
			$this->db->where('ialternativ',$al['ialternativ']);
			$this->db->update('alternativ',$dtAlt); 
		}
	}

	function hitungWP($year){
		$kriteria = $this->db->query("SELECT fbobot,imaster_kriteria,fbobot_preferensi,vAtribut FROM master_kriteria")->result_array();
		$sum = $this->db->query("SELECT SUM(fbobot) AS fbobot FROM master_kriteria limit 1")->row_array();
		if(empty($sum['fbobot'])){
			$sum['fbobot'] = 0;
		}
		foreach ($kriteria as $kri) {
			$this->db->where('imaster_kriteria',$kri['imaster_kriteria']); 
			if(empty($kri['fbobot']) || $kri['fbobot']==0){
				$dPre['fbobot_preferensi'] = 0;
			}else{
				$dPre['fbobot_preferensi'] = number_format($kri['fbobot']/$sum['fbobot'],8);
			}
			$this->db->update('master_kriteria',$dPre); 
		}

		$kriteria = $this->db->query("SELECT fbobot,imaster_kriteria,fbobot_preferensi,vAtribut FROM master_kriteria")->result_array();
		foreach ($kriteria as $kri) {
			$nilai = $this->db->query("SELECT ad.ialternativ_detail, ad.ialternativ, ad.fnilai_awal 
						FROM alternativ_detail ad WHERE ad.vTahun='".$year."' AND ad.imaster_kriteria = '".$kri['imaster_kriteria']."'")->result_array();
			foreach ($nilai as $nn) {
				$this->db->where('ialternativ_detail',$nn['ialternativ_detail']); 
				if($kri['vAtribut']=="Benefit"){  
					$dUpdate['fnilai_s_wp'] = number_format(pow($nn['fnilai_awal'],$kri['fbobot_preferensi']),8);
				}else{ 
					$kri['fbobot_preferensi'] = -1*$kri['fbobot_preferensi'];
					$dUpdate['fnilai_s_wp'] = number_format(pow($nn['fnilai_awal'],$kri['fbobot_preferensi']),8);
				}
				$this->db->update('alternativ_detail',$dUpdate);
			}   
		}

		$Alternatif = $this->db->query("SELECT ialternativ,fnilai_akhir_s_wp FROM alternativ where vTahun='".$year."'")->result_array();
		foreach ($Alternatif as $al) {
			$sqN = $this->db->query("SELECT EXP(SUM(LOG(COALESCE(ad.fnilai_s_wp))))as nilai FROM  alternativ_detail ad where ad.vTahun='".$year."' AND ad.ialternativ = '".$al['ialternativ']."'")->row_array();
			// $sqN = $this->db->query("SELECT SUM(ad.fnilai_s_wp)as nilai FROM  alternativ_detail ad where ad.ialternativ = '".$al['ialternativ']."'")->row_array();
			if(empty($sqN['nilai'])){
				$dtAlt['fnilai_akhir_s_wp'] = 0;
			}else{
				$dtAlt['fnilai_akhir_s_wp'] = $sqN['nilai'];
			}  
			$this->db->where('ialternativ',$al['ialternativ']);
			$this->db->update('alternativ',$dtAlt); 
		}

		$Alternatif = $this->db->query("SELECT ialternativ,fnilai_akhir_s_wp FROM alternativ WHERE vTahun='".$year."'")->result_array();
		$sumS = $this->db->query("SELECT SUM(fnilai_akhir_s_wp) as sum_s1 FROM  alternativ WHERE vTahun='".$year."'")->row_array();
		if(empty($sumS['sum_s1'])){
			$sumS['sum_s1'] = 0;
		}
		foreach ($Alternatif as $al2) { 
			if(empty($al2['fnilai_akhir_s_wp']) || $al2['fnilai_akhir_s_wp']==0){
				$dtAlt2['fnilai_akhir_wp'] = 0;
			}else{
				$dtAlt2['fnilai_akhir_wp'] = number_format($al2['fnilai_akhir_s_wp']/$sumS['sum_s1'],8);
			}  
			$this->db->where('ialternativ',$al2['ialternativ']);
			$this->db->update('alternativ',$dtAlt2); 
		}
		
	}
	
	function jumlahAkhir($year){
		$Alternatif = $this->db->query("SELECT ialternativ,fnilai_akhir_saw,fnilai_akhir_wp FROM alternativ WHERE vTahun='".$year."'")->result_array();
		foreach ($Alternatif as $al) { 
			$dtAlt['fnilai_akhir'] = $al['fnilai_akhir_saw']+$al['fnilai_akhir_wp']; 
			$this->db->where('ialternativ',$al['ialternativ']);
			$this->db->update('alternativ',$dtAlt); 
		}

		$Rank = $this->db->query("SELECT a.ialternativ FROM alternativ a WHERE a.vTahun='".$year."' ORDER BY a.fnilai_akhir DESC")->result_array();
		$i=1;
		foreach ($Rank as $r) { 
			$dtAltr['iPeringkat'] = $i++; 
			$this->db->where('ialternativ',$r['ialternativ']);
			$this->db->update('alternativ',$dtAltr); 
		}
	}

}
?>