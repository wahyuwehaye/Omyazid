<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
        parent::__construct();
        $this->load->model('M_data');
        $this->load->model('M_main');
    }

	public function index()
	{
		$data['active_menu']='Dashboard';
		$this->load->view('back/template/header',$data);
		$this->load->view('back/dashboard');
		$this->load->view('back/template/footer');
	}

	public function channel(){
		$data['active_menu']='Channel';
		$this->load->view('back/template/header',$data);
		$this->load->view('back/channel', array('error' => ' ' ));
		$this->load->view('back/template/footer');
	}

	public function program(){
		$data['active_menu']='Program';
		$this->load->view('back/template/header',$data);
		$data['channel'] = $this->db->query("select * from channel");
		$this->load->view('back/program', $data);
		$this->load->view('back/template/footer');
	}
}
