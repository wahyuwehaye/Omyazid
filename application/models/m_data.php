<?php

	class M_data extends CI_Model{

		function __construct() {
        	parent::__construct();
    	}

    	function input_data($data,$table){
			$this->db->insert($table,$data);
		}

		function hapus_data($where,$table){
			$this->db->where($where);
			$this->db->delete($table);
		}

		function edit_data($where,$table){		
			return $this->db->get_where($table,$where);
		}

		function update_data($where,$data,$table){
			$this->db->where($where);
			$this->db->update($table,$data);
		}

		public function get_channel(){
			$this->db->order_by('id');
			$sql_channel=$this->db->get('channel');
			if($sql_channel->num_rows()>0){
				return $sql_channel->result_array();
			}
		}
	}
?>