<?php if(!defined('BASEPATH')) exit("No direct script "); 

class Main extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('API_RequestBroker');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('html');
		}
	
	
	function index(){
		if($this->session->userdata('JUSSCONNECT_COOKIES')){
			redirect('dashboard/Dashboard');
		}else{
			$this->show_login(false);
		}
	}
	
	
	function show_login($show_error=false){
		$data['error'] = $show_error;
		
		$this->load->helper('form');
		$this->load->view('login_form', $data);
	}
	
	function login_user(){
		$username = $this->input->post('username');
		$pass = $this->input->post('password');
		
		if($username && $pass && $this->validate_from_remoteApi(array('username'=>$username, 'password'=>$pass))){
			redirect('dashboard');
		}else{
			
			$this->show_login(true);
		}
		
	}
	
	
	function validate_from_remoteApi($user_data){
		$result = $this->API_RequestBroker->authenticate($user_data);
		if($result){
			# everything fine
			$this->set_session();
			return true;
		}
			# Got nothing
			return false;
	}
	
	
	
	function set_session(){
		$this->session->set_userdata( array(
		'name' => 'gandu',
		 'virgin' =>'its widely proved',
		 'fapps'=>"always"));
	}
}

?>
