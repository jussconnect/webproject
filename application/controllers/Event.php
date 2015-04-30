<?php if(!defined('BASEPATH')) exit("No direct script "); 

class Event extends MY_Controller{
	private function _construct()
	{
		parent::_construct();
	}
	
	public function index($value='This is Event page')
	{
		echo $value;
	}
}
?>