<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_C extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Main_M','main_m');
	}

	public function index()
	{
		$this->load->view('signin');
		// if($this->session->userdata('logged')){
		// 	redirect(base_url()."Main_C/dashboard");
		// }
		// else{
		// 	$this->load->view('signin');

		// }
		
		// if(isset($_SESSION['error'])){
		//     unset($_SESSION['error']);
		// }
	}	
	public function login()
	{
		redirect(base_url()."Main_C/dashboard");
		// $check = $this->main_m->login($_POST);
		// if($check!=false){
		// 	$session_data = array(
		// 		'username' => $username,
		// 		'logged' => TRUE,
		// 		'type' => $v[0]->user_type,
		// 		'id' => $v[0]->user_id
		// 	);
		// 	$this->session->set_userdata($session_data);
		// 	redirect(base_url()."Main_C/dashboard");
		// }
		// else{
		// 	$this->session->set_flashdata('error', 'Invalid Username or Password');
		// 	redirect();
		// }

	}
	public function logout()
	{
		redirect(base_url());
	}
	public function dashboard(){
		$this->load->view('header');
		$this->load->view('dashboard');
		$this->load->view('footer');
		// if($this->session->userdata('logged')){
		// 	$this->load->view('header');
		// 	$this->load->view('dashboard');
		// 	$this->load->view('footer');
		// 	}
		// else{
		// 	redirect(base_url());
		// }
	}
	public function openvs(){
		$this->load->view('header');
		$this->load->view('openvs');
		$this->load->view('footer');
	}
	public function setsched(){
		
			$data["criteria"] = $this->main_m->getCriteria();
			$data["vaccine"] = $this->main_m->getVaccine();
			// return var_dump($data["criteria"]);
			$this->load->view('header');
			$this->load->view('setschedule',$data);
			$this->load->view('footer');
	}
	public function schedule(){
		$this->load->view('header');
		$this->load->view('schedule');
		$this->load->view('footer');
	}
	public function getBarangay(){
		$res = $this->main_m->getBarangay();
		echo json_encode($res);
	}
	public function getStations(){
		$res = $this->main_m->getStations();
		echo json_encode($res);
	}
	public function getList(){
		// echo json_encode();
		$res = $this->main_m->getList($_GET['barangay_id']);
		echo json_encode($res);
	}
}