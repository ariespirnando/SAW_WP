<?php
class klasfikasimod extends CI_Model{
	function get_parameter($parameter,$val_param,$hasil){
    	$sql = "
    		SELECT (
    			select count(class) 
    			from tb_dataset 
    			where `$parameter`= '$val_param' AND class='$hasil'
    		) / COUNT($parameter) as hasil_bagi
			FROM `tb_dataset`
			WHERE class='$hasil' ";
    	$query=$this->db->query($sql);
        return $query->row();
    }
    function total_data(){
        $sql = "SELECT * FROM `tb_dataset` t";
        return $this->db->query($sql)->num_rows();
    }
    function total_class($hasil){
        $sql = "SELECT * FROM `tb_dataset` t WHERE t.class='$hasil'";
        return $this->db->query($sql)->num_rows();
    }
    function saran($hasil){
        $sql = "SELECT saran FROM `tb_saran` WHERE class='$hasil'";
        return $this->db->query($sql)->row(); 
    }
}