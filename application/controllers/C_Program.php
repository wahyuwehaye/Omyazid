<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Program extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('program_model','program');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('program');
	}

	public function ajax_list()
	{
		$this->load->helper('url');
		
		$list = $this->program->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $program) {
			$no++;
			$row = array();
			$row[] = $program->program_name;
			$row[] = $program->channel;
			$row[] = $program->tanggal;
			$row[] = $program->time_start;
			$row[] = $program->time_end;
			$row[] = $program->duration;
			$row[] = $program->synopsis_program;
			$row[] = $program->genre;
			$row[] = $program->parenting_categories;
			$row[] = $program->broadcast_type;
			$row[] = $program->url_teaser;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_program('."'".$program->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_program('."'".$program->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->program->count_all(),
						"recordsFiltered" => $this->program->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->program->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		// $this->_validate();
		// $checkbox_genre = serialize($this->input->post('genre'));
		// $checkbox_parenting = serialize($this->input->post('parenting_categories'));
		// $checkbox_broadcast = serialize($this->input->post('broadcast_type'));
		// <script>
		// $(document).ready(function(){
		//     $("button").click(function(){
		//         var x = $this->input->post('genre').serializeArray();
		//         $.each(x, function(i, field){
		//         	if ((field.name) == "genre"){
		//             var checkbox_genre = $("#results").append(field.value + " - ");
		//             } else if ((field.name) == "chock"){
		//             $("#results").append(field.value + " x ");
		//             }
		//         });
		//     });
		// });
		// </script>
		$data = array(
				'program_name' => $this->input->post('program_name'),
				'channel' => $this->input->post('channel'),
				'tanggal' => $this->input->post('tanggal'),
				'time_start' => $this->input->post('time_start'),
				'time_end' => $this->input->post('time_end'),
				'duration' => $this->input->post('duration'),
				'synopsis_program' => $this->input->post('synopsis_program'),
				// 'genre' => $checkbox_genre,
				// 'parenting_categories' => $checkbox_parenting,
				// 'broadcast_type' => $checkbox_broadcast,
				'genre' => $this->input->post('cb_genre'),
				'parenting_categories' => $this->input->post('cb_pc'),
				'broadcast_type' => $this->input->post('cb_bt'),
				'url_teaser' => $this->input->post('url_teaser')
			);
		$insert = $this->program->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		// $this->_validate();
		//$u_genre = text() $checkbox_genre;
		// $checkbox_parenting = serialize($this->input->post('parenting_categories'));
		// $checkbox_broadcast = serialize($this->input->post('broadcast_type'));
		$data = array(
				'program_name' => $this->input->post('program_name'),
				'channel' => $this->input->post('channel'),
				'tanggal' => $this->input->post('tanggal'),
				'time_start' => $this->input->post('time_start'),
				'time_end' => $this->input->post('time_end'),
				'duration' => $this->input->post('duration'),
				'synopsis_program' => $this->input->post('synopsis_program'),
				// 'genre' => $this->input->post('genre'),
				// 'parenting_categories' => $this->input->post('parenting_categories'),
				// 'broadcast_type' => $this->input->post('broadcast_type'),
				'genre' => $this->input->post('cb_genre'),
				'parenting_categories' => $this->input->post('cb_pc'),
				'broadcast_type' => $this->input->post('cb_bt'),
				'url_teaser' => $this->input->post('url_teaser')
			);
		$this->program->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->program->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}
