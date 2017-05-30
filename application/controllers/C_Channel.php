<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Channel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('channel_model','channel');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('channel');
	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->channel->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $channel) {
			$no++;
			$row = array();
			$row[] = $channel->no_channel;
			$row[] = $channel->channel_name;
			$row[] = $channel->synopsis_channel;
			$row[] = $channel->url_promo_channel;
			if($channel->logo)
				$row[] = '<a href="'.base_url('upload/'.$channel->logo).'" target="_blank"><img src="'.base_url('upload/'.$channel->logo).'" class="img-responsive" /></a>';
			else
				$row[] = '(No logo)';

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_channel('."'".$channel->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_channel('."'".$channel->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->channel->count_all(),
						"recordsFiltered" => $this->channel->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->channel->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		
		$data = array(
				'no_channel' => $this->input->post('no_channel'),
				'channel_name' => $this->input->post('channel_name'),
				'synopsis_channel' => $this->input->post('synopsis_channel'),
				'url_promo_channel' => $this->input->post('url_promo_channel'),
			);

		if(!empty($_FILES['logo']['name']))
		{
			$upload = $this->_do_upload();
			$data['logo'] = $upload;
		}

		$insert = $this->channel->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'no_channel' => $this->input->post('no_channel'),
				'channel_name' => $this->input->post('channel_name'),
				'synopsis_channel' => $this->input->post('synopsis_channel'),
				'url_promo_channel' => $this->input->post('url_promo_channel'),
			);

		if($this->input->post('remove_logo')) // if remove logo checked
		{
			if(file_exists('upload/'.$this->input->post('remove_logo')) && $this->input->post('remove_logo'))
				unlink('upload/'.$this->input->post('remove_logo'));
			$data['logo'] = '';
		}

		if(!empty($_FILES['logo']['name']))
		{
			$upload = $this->_do_upload();
			
			//delete file
			$channel = $this->channel->get_by_id($this->input->post('id'));
			if(file_exists('upload/'.$channel->logo) && $channel->logo)
				unlink('upload/'.$channel->logo);

			$data['logo'] = $upload;
		}

		$this->channel->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		//delete file
		$channel = $this->channel->get_by_id($id);
		if(file_exists('upload/'.$channel->logo) && $channel->logo)
			unlink('upload/'.$channel->logo);
		
		$this->channel->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _do_upload()
	{
		$config['upload_path']          = 'upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000; //set max size allowed in Kilobyte
        $config['max_width']            = 10000; // set max width image allowed
        $config['max_height']           = 10000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('logo')) //upload and validate
        {
            $data['inputerror'][] = 'logo';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('no_channel') == '')
		{
			$data['inputerror'][] = 'no_channel';
			$data['error_string'][] = 'First name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('channel_name') == '')
		{
			$data['inputerror'][] = 'channel_name';
			$data['error_string'][] = 'Last name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('synopsis_channel') == '')
		{
			$data['inputerror'][] = 'synopsis_channel';
			$data['error_string'][] = 'Date of Birth is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('url_promo_channel') == '')
		{
			$data['inputerror'][] = 'url_promo_channel';
			$data['error_string'][] = 'Please select gender';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}