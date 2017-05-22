<?php 
	
	class crud_channel extends CI_Controller{

		function __construct(){
			parent::__construct();
			$this->load->model('m_data');
			$this->load->helper(array('form','url'));
		}

		function index(){
			$dd_channel = array();
			foreach ($this->m_data->get_channel as $dt_channel) 
			{
				$dd_channel[$dt_channel['id']] = $dt_channel['channel_name'];
			}
			$data['$dt_channel']=$dd_channel;
			$this->load->view('program',$data);
		}
	}
?>