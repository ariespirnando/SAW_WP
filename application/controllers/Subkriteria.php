<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subkriteria extends CI_Controller {
	function __construct(){
        parent::__construct();  
        if(!$this->session->userdata('loggedin')){   
            redirect('Login');
        } 
    }  
    function kriteria(){
    	$key = $this->input->get("term");     
        $data = array();
        $sql = "SELECT * FROM master_kriteria mk where (mk.vNama_kriteria LIKE '%".$key."%' OR mk.cKode LIKE '%".$key."%') LIMIT 50" ;
        $que = $this->db->query($sql)->result_array();

        if(!empty($que)){
            foreach ($que as $line) {  
                $row['id']        = trim($line['imaster_kriteria']);
                $row['value']     = trim($line['cKode']).' - '.trim($line['vNama_kriteria']); 
                array_push($data, $row);
            }
        } 
                    
        echo json_encode($data);
        exit;  
    }
	public function index()
	{
		$data = array();
		$data['menu'] = 'Subkriteria';
		$data['result'] = $this->db->query("SELECT * FROM master_subkriteria ms
			JOIN master_kriteria mk ON 
			ms.imaster_kriteria = mk.imaster_kriteria order by ms.imaster_subkriteria DESC")->result_array();
		$this->template->load('template_wp','subkriteria/subkriteria', $data);
	}
	function add(){
		$data = array();
		$data['menu'] = 'Subkriteria';
		$data['action'] = base_url().'Subkriteria/save';
		$data['vnama'] = '';
		$data['vNama_kriteria'] = ''; 
		$data['fnilai'] = ''; 
		$data['imaster_kriteria'] = '';   
		$data['imaster_subkriteria'] = '';
		$data['btn'] = 'Save';
		$this->template->load('template_wp','subkriteria/formsubkriteria', $data);
	}
	function save(){
		$data['imaster_kriteria'] = $this->input->post('imaster_kriteria');
		$data['vnama'] = $this->input->post('vnama'); 
		$data['fnilai'] = $this->input->post('fnilai'); 
		$this->db->insert('master_subkriteria',$data);
 		redirect('Subkriteria');
	}
	function edit($id){
		$sql = "SELECT * FROM master_subkriteria ms
				JOIN master_kriteria mk ON 
				ms.imaster_kriteria = mk.imaster_kriteria 
				where ms.imaster_subkriteria='".$id."'";
		$dt = $this->db->query($sql)->row_array();

		$data = array();
		$data['menu'] = 'Subkriteria';
		$data['action'] = base_url().'Subkriteria/Ubah';

		$data['vNama_kriteria']  =$dt['cKode'].'-'.$dt['vNama_kriteria']; 
		$data['imaster_kriteria'] = $dt['imaster_kriteria'];
		$data['imaster_subkriteria'] = $dt['imaster_subkriteria']; 
		$data['vnama'] = $dt['vnama']; 
		$data['fnilai'] = $dt['fnilai']; 
		$data['btn'] = 'Edit'; 
		$this->template->load('template_wp','subkriteria/formsubkriteria', $data); 
	}
	function Ubah(){
		$data['imaster_kriteria'] = $this->input->post('imaster_kriteria');
		$data['vnama']           = $this->input->post('vnama'); 
		$data['fnilai']          = $this->input->post('fnilai');   
		$id = $this->input->post('imaster_subkriteria');
		$this->db->where('imaster_subkriteria',$id);
		$this->db->update('master_subkriteria',$data);

		redirect('Subkriteria');
	}
	function hapus($id){
		$this->db->where('imaster_subkriteria',$id);
		$this->db->delete('master_subkriteria');  
		redirect('Subkriteria');
	}
}
?>