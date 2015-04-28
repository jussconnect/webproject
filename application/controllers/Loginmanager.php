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
	
	public $user_creds = null;
	
	
	public function index(){
		
	$this->show_login_form(FALSE);
	}
	
	
	public function show_login_form($show_error=false){
		$data['error'] = $show_error;
		$this->load->helper('form');
		$this->load->view('common/header');
		$this->load->view('nav/top_nav');
		$this->load->view('login/login_form',$data);
		$this->load->view('common/footer');
	}
	
	
	public function process_form(){
		
		$config['global_xss_filtering'] = TRUE;
		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password', TRUE);
		$type = $this->input->post('type', TRUE);
		$remm = $this->input->post('remme', TRUE);
		
		echo "****".$username." ".$password;
		
		$result = $this->validate_from_remoteApi(array(
		'username'=>$username, 'password'=>$password));
		
		echo $result['member_id'];
		
		echo $result['username'];
		echo $result['password']; 
		
		if(is_array($result) && count($result)>0){
			
			//$this->shelving_hot_cookies($result);
			
			redirect('dashboard/dashboard');
		}else{
			// Error found on 
			$this->show_login_form(TRUE);
		}
		
		
	}
	
	
		
	private function validate_from_remoteApi($user_data){
		
		$this->load->model('Api_requestbroker');
		if(is_array($user_data) && count($user_data)>0){
		echo "userdata seems good";
		$result = $this->Api_requestbroker->authenticate($user_data);
		print $result['member_id'];
		
		if($result != null){
			# everything fine
			$this->shelving_hot_cookies($result);
			return $result;
		}	
		}
			echo "Got Nothing";
		
			# Got nothing
			return null;
	}
	
	private function shelving_hot_cookies($userdata){
		$this->load->helper('cookie');
		$cookie = array(
			'name'=>$config['sess_cookie_name'],
			'username'=> $userdata['username']
		
		);
		
		$this->index->set_cookie($cookie);
	}
	
}


?>