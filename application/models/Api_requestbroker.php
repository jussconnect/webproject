<?php if(!defined('BASEPATH')) exit("No Direct accesss allowed");

class Api_requestbroker extends CI_Model{
	function __construct(){
		parent:: __construct();
	}
	
	public function authenticate($userdata){
	
		if($userdata['username'] == 'pradeep' && $userdata['password']=='pradeep'){
			$sess_data = array(
			'username' => "Pradeep", 
			'password' => "pradeep",
			'member_id'=> "3394ttyy",
			'u_name' => "pradeep kumar",
			'img' =>'image/prof.jpeg');
			
			return $sess_data;
		} 
		
		return null;
	} 
}


?>
