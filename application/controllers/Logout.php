<?php if(!defined('BASEPATH')) exit("No direct script "); 

class Logout extends MY_Controller{
	private function _construct()
	{
		parent::_construct();
	}
	
	public function index()
	{
		$this->load->library('session');
		$sess = $this->session->userdata('SESS_MEMBER_ID');
		if(isset($sess) && $sess!= null){
			$this->session->sess_destroy();
			redirect('loginmanager');
		}else{
			show_404();
		}
	}
}
?>