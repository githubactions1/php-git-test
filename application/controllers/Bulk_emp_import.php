<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH."/third_party/PHPExcel.php";
ini_set('memory_limit', '-1');
class Bulk_emp_import extends CI_Controller {

	function __construct() { 
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session'); 
		//$this->load->model('login_model');
		$this->load->model(array('settings_model','tasks_model','common_model','bulk_emp_import_model'));

	}
	 
	public function index()
	{
		if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){
		$this->load->view('header');
 
		$data=array();

		$this->load->view('bulk_import/bulk_emp_import',$data);
		$this->load->view('footer');
		}else{
		redirect('Welcome');	
		}

	}
	
	public function bulk_emp_import_ajax()
	{
			if(isset($_POST['submit']) && $_POST['submit']!='')
		{
					//echo '<pre>';print_r($_POST);exit; 

			$up_data=$this->bulk_emp_import_model->save_bulk_emp_upload();
			
			if(!empty($up_data))
			{
				$success_msg=$up_data['success']." Users uploaded Successfully!"." <br> " .$up_data['errorr']." Not  uploaded<br>" .$up_data['message']."!";
				$error_msg=$up_data['success']." Users uploaded Successfully!"." <br> " .$up_data['errorr']." Not  uploaded <br>" .$up_data['message']."!";
				
				if($up_data['success'] > 0){
				$this->session->set_flashdata('success',$success_msg);
				}else {
				$this->session->set_flashdata('error',$error_msg);
				}
				
				redirect("Bulk_emp_import", 'location');
			}
		}
	}


	
	public function check_bulk_emp_upload()
	{
		$data['menu'] = 'Import Settings';
		$data['banner_pos']=$this->bulk_emp_import_model->check_bulk_emp_upload();
		echo json_encode($data['banner_pos']);
	}
}
