<?php 
	
	class crud extends CI_Controller{

		function __construct(){
			parent::__construct();
			$this->load->model('m_data');
			$this->load->helper(array('form','url'));
		}

		function tambah_channel(){
			$config['upload_path']          = './gambar/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 1000;
			$config['max_width']            = 10240;
			$config['max_height']           = 7680;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('imgchannel')){
				$error = array('error' => $this->upload->display_errors());
				echo "<script>
				alert('Gagal');
				window.location.href='../channel';
				</script>";
				/* 
				redirect('channel');
				$this->load->view('back/C_dashboard/channel', $error);
				*/
			}else{
				$no_channel = $this->input->post('no_channel');
				$channel_name = $this->input->post('channel_name');
				$synopsis_channel = $this->input->post('synopsis_channel');
				$url_promo_channel = $this->input->post('url_promo_channel');
							
				$data = array(
					'no_channel' => $no_channel,
					'channel_name' => $channel_name,
					'synopsis_channel' => $synopsis_channel,
					'url_promo_channel' => $url_promo_channel
					);
				$this->m_data->input_data($data,'channel');
				$data2 = array('upload_data' => $this->upload->data());
				echo "<script>
				alert('Sukses');
				window.location.href='../channel';
				</script>";
				/* 
				redirect('channel');
				$this->load->view('v_upload_sukses', $data2);
				*/
			}
		}

		function tambah_program(){
			$program_name = $this->input->post('program_name');
			$channel = $this->input->post('channel');
			$date = $this->input->post('date(format)');
			$time_start = $this->input->post('time_start');
			$time_end = $this->input->post('time_end');
			$duration = $this->input->post('duration');
			$synopsis_program = $this->input->post('synopsis_program');
			$genre = $this->input->post('genre');
			$parenting_categories = $this->input->post('parenting_categories');
			$broadcast_type = $this->input->post('broadcast_type');
			$url_teaser = $this->input->post('url_teaser');

			$data = array(
				'program_name' => $program_name,
				'channel' => $channel,
				'date' => $date,
				'time_start' => $time_start,
				'time_end' => $time_end,
				'duration' => $synopsis_program,
				'genre' => $genre,
				'parenting_categories' => $parenting_categories,
				'broadcast_type' => $broadcast_type,
				'url_teaser' => $url_teaser
				);
			$this->m_data->input_data($data,'program');
			redirect('program');
		}
	}
?>