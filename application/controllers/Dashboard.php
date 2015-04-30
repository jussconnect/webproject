<?php if(!defined('BASEPATH')) exit("No direct script "); 
	
	
class Dashboard extends My_Controller{
	
	function _construct(){
		parent::_construct();
	
		
	}
	
	
	public function index(){
		$this->load->library('session');
		$cookie = $this->session->all_userdata();
		
		if(is_array($cookie) && count($cookie)>0){
		$this->load->view('common/header');
		$this->load->view('nav/top_navbar');
		$this->load->view('nav/side_navbar');
		$this->load->view("dashboard/dashboard", $cookie);
		$this->load->view('common/footer');
			
		}else{
			$cookie = "Error in retrieving";
			$this->load->view("dashboard/dashboard", $cookie);
		}
	   	
		
	   		
		
	}
	
	
	}


 ?>