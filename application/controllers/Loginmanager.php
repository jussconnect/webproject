<?php if(!defined('BASEPATH')) exit("No direct script "); 

class Loginmanager extends MY_Controller{
	
	
	function _construct(){
		parent::_construct();
		$this->load->library("session");
		$this->load->library('form_validation');
		$this->load->helper('html');
		$this->load->helper('cookie');
		$this->load->model('API_RequestBroker');
	}
	
	public $user_creds = null;
	
	
	public function index(){
	$sess = $this->session->userdata('SESS_MEMBER_ID');
	if(isset($sess)!= null){
		redirect('Dashboard');	
	}else{
	$this->show_login_form(FALSE);
	}
	}
	
	
	public function show_login_form($show_error=FALSE){
		$data['error'] = $show_error;
		$this->load->helper('form');
		$this->load->view('common/login_header');
		$this->load->view('nav/login_top_navbar');
		$this->load->view('login/login_form',$data);
		$this->load->view('common/footer');
	}
	
	
	public function process_form(){
		
		$config['global_xss_filtering'] = TRUE;
		$username = $this->input->post('login', TRUE);
		$password = $this->input->post('password');
		$type = $this->input->post('type', TRUE);
		$remm = $this->input->post('remme', TRUE);
		
		
		
		$result = $this->validate_from_remoteApi(array(
		'username'=>$username, 'password'=>$password));
		
		 
		if($result != null){
	
			
			$this->shelving_hot_cookies($result);
			
			redirect('dashboard');
		}else{
			// Error found on 
			$this->show_login_form(TRUE);
		}
		
		
	}
	
	
		
	private function validate_from_remoteApi($user_data){
		
		$this->load->model('Api_requestbroker');
		if(is_array($user_data) && count($user_data)>0){
		$result = $this->Api_requestbroker->authenticate($user_data);
		
		if($result != null){
		
			$this->shelving_hot_cookies($result);
			return $result;
		}	
		}
			
		
			# Got nothing
			return null;
	}
	
	public function shelving_hot_cookies($userdata){

		$this->load->library('session');
		
		$cookie = array(
			'LOGIN_ID' => "Student",
			'SESS_FIRST_NAME'=> $userdata['username'],
			'PASS' => $userdata['password'],
			'SESS_MEMBER_ID'=> $userdata['member_id'],
			'SESS_U_NAME' => $userdata['u_name'],
			'profimg' => $userdata['img']
		);
		
		
		
		//$this->input->set_cookie($name, $value);
		$this->session->set_userdata($cookie);
		
	}
	
	
		private function checkforsession()
	{
		if(isset($this->session->userdata['SESS_MEMBER_ID']))
		{
				$this->redirecttopage();
		}
	}
	
	
	private function checkforcookies()
	{
			$data="";
			if(isset($_COOKIE['username']) && isset($_COOKIE['password']) && isset($_COOKIE['type'])) 
			{
				$data['login']=$_COOKIE['username'];
				$data['password']=$_COOKIE['password'];
				if($_COOKIE['type']=="T")
				{
				$data['category']== "login-teacher";
				}
				if($_COOKIE['type']=="S")
				{
				$data['category']= "login-student";
				}
			}
	return $data;
	}
	
	
}


?>