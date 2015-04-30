<?php if(!defined('BASEPATH')) exit("No direct script "); 

class Faq extends MY_Controller{
	
	function _construct(){
		parent::_construct();
	}
	
	public function index($value="Faq page")
	{
		$this->load->library('session');
		
		$sess = $this->session->userdata('SESS_MEMBER_ID');
		if(isset($sess)){
			$this->load->view('common/header');
			$this->load->view('nav/top_navbar');
			$this->load->view('nav/side_navbar');
			$this->load->view('faq/faq');
			
			$this->load->view('common/footer');
		}else{
			show_404();
		}
	}
}


?>