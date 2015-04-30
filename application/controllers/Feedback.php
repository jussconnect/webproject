<?php if(!defined('BASEPATH')) exit("No direct script "); 

class Feedback extends MY_Controller{
	private function _construct()
	{
		parent::_construct();
	}
	
	public function index()
	{
		$this->load->view('common/header');
		$this->load->view('nav/top_navbar');
		$this->load->view('nav/side_navbar');
		$this->load->helper('form');
        $this->load->view('feedback/feedback');
		$this->load->view('common/footer');
		
	}
	
	public function f_validation(){
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('thought','Thought','required');
        
            if($this->form_validation->run()){
                redirect('dashboard');
            } else {    
                   $this->load->view('feedback');     
            }
            
        }
          
	
}


?>