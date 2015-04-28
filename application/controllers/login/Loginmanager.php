<?php if(!defined('BASEPATH')) exit("No direct script "); 

class Loginmanager extends MY_Controller{
	
	
	function _construct(){
		parent::_construct();
		$this->load->helper("cookie");
		$this->load->library("session");
		$this->load->library('form_validation');
		$this->load->helper('html');
		$this->load->model('API_RequestBroker');
	}
	
	public function index(){
		$data = $this->input->cookies('JUSSCONNET_COOKIES');
		
		if(isset($data)){
			echo "error";
		}
		
	}
	
	
	public function show_login_form($show_error=false){
		$data['error'] = $show_error;
		$this->load->helper('form');
		$this->load->view('login/login_form',$data);
	}
	
	
	private function process_form(){
		$config['global_xss_filtering'] = TRUE;
		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password', TRUE);
		$type = $this->input->post('type', TRUE);
		$remm = $this->input->post('remme', TRUE);
		
		$result = $this->validate_from_remoteApi(array(
		'username'=>$username, 'password'=>$password));
		
		if(is_array($result) && count($result)>1){
			
			$this->shelving_hot_cookies($result);
		}else{
			
			$this->show_login_form(TRUE);
		}
		
		
	}
	
	
		
	private function validate_from_remoteApi($user_data){
		$result = $this->API_RequestBroker->authenticate($user_data);
		if($result){
			# everything fine
			$this->shelving_hot_cookies($result);
			return $result;
		}
			# Got nothing
			return null;
	}
	
	private function shelving_hot_cookies($userdata){
		$this->load->helper('cookie');
		
		$this->index->set_cookie($userdata);
	}
	
	
	
}


?>