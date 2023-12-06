<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hardware_master extends CI_Controller {

	function __construct() { 
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session'); 
		$this->load->model('common_model');
	}
	  
	public function index()
	{
		

		if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){
					
				
				$this->load->view('header');
			

				$hardware_master_list= json_decode($this->common_model->get_all_hardware_master_list());
				$data['hardware_master_list']=$hardware_master_list->data;
				
				
				$this->load->view('hardware_master/hardware_master',$data);
				$this->load->view('footer');
		}else{
			 redirect('Welcome');	
		}

	}
	


	
}
