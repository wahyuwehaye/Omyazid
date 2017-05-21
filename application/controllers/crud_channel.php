<?php 
	
	class crud_channel extends CI_Controller{

		function __construct(){
			parent::__construct();
			$this->load->model('m_data');
			$this->load->helper(array('form','url'));
		}

		function index(){
			$this->load->view('channel', array('error' => ' ' ));
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
	}
?>