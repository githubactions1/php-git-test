<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Geofence extends CI_Controller {

	function __construct() { 
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session'); 
		//$this->load->model('login_model');
	}
	 
	public function index()
	{
		

		// if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){
					
				
				$this->load->view('header');
			

				$this->load->view('geofence/geofence');
				$this->load->view('footer');
		// }else{
			 // redirect('Welcome');	
		// }

	}
	


	
}
