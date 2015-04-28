<?php if(!defined('BASEPATH')) exit("No Direct Script access allowed");

class MY_Controller extends CI_Controller{
	
	function __construct(){
		parent :: __construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('language');
		$this->load->helper('cookie');
		
		$this->lang->load('en_admin','english');
	}
}

?>
