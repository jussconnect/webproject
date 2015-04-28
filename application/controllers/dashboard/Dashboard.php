<?php if(!defined('BASEPATH')) exit("No direct script "); 
	
	
class Dashboard extends CI_Controller{
	
	function _construct(){
		parent::_construct();
		$this->load->helper('cookie');
		
	}
	
	
	function index(){
	   $cookie = $this->input->cookie('JUSSCONNET_COOKIES');
		echo $cookie;
		$this->load->view("dashboard/dashboard", $cookie);
	}
	
	
	}


 ?>