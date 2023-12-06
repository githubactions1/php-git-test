<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Flash_news extends CI_Controller {

	function __construct() { 
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('checklogin_helper');
		$this->load->library('session'); 
		//$this->load->model('login_model');
		$this->load->model(array('settings_model','tasks_model','common_model'));

	}
	 
	public function index()
	{
		if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){
		$this->load->view('header');
 
		$flash_news_list= json_decode($this->get_all_flash_news_list());
		$data['flash_news_list']=$flash_news_list->data;
		

		$this->load->view('flash_news/flash_news',$data);
		$this->load->view('footer');
		}else{
		redirect('Welcome');	
		}

	}
	
	
	public function get_all_flash_news_list(){
			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
			$news_date='';
			$type='0';
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => API_MAIN_URL.'employees/getflashnews',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS =>'{
			"type":"'.$type.'"
			}',
			CURLOPT_HTTPHEADER => array(
			'x-access-token:'.$token,
			'Content-Type: application/json'
			),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			return $response;

	}
	
	
	
	
	public function add()
	{
		
		if($this->session->userdata['user']->emp_role != 1){ 
			$this->session->set_flashdata('error', 'You are not having permissions to View the action.');
				redirect('Flash_news'); 
		}
		
		
		if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){	
		$this->load->view('header');
		
			$data=array();
			if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){ 
				if(isset($_POST['submit']) && $_POST['submit']!='')
			{ 
		
		

				$inrs_results = json_decode($this->insertflash_news());
				if($inrs_results->status==200)
				{
				$this->session->set_flashdata('success', 'Created Successfully...');
				redirect('Flash_news'); 
				}
				else
				{
				$this->session->set_flashdata('error', 'Not Updated...');
					redirect('Flash_news'); 
				}
			}
			}
			else{
				 redirect('Welcome');	
			}
		
		$data['page_name']='Add';	
		$this->load->view('flash_news/flash_news_add',$data);
		$this->load->view('footer');
		}else{
			 redirect('Welcome');	
		}

	}

	public function edit($news_id)
	{
		
		
		if($this->session->userdata['user']->emp_role != 1){ 
			$this->session->set_flashdata('error', 'You are not having permissions to View the action.');
				redirect('Flash_news'); 
		}

		if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){	
		$this->load->view('header');
		
			$data=array();
			if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){ 
				if(isset($_POST['submit']) && $_POST['submit']!='')
			{ 
			// echo '<pre>';print_r($_POST);exit;

		

				$inrs_results = json_decode($this->updateflash_news());

				if($inrs_results->status==200)
				{
				$this->session->set_flashdata('success', 'Updated Successfully...');
				redirect('Flash_news'); 
				}
				else
				{
				$this->session->set_flashdata('error', 'Not Updated...');
					redirect('Flash_news'); 
				}
			}
			}
			else{
				 redirect('Welcome');	
			}
			
		$news_details= json_decode($this->get_single_flash_news_data($news_id));	
		$data['news_record']=$news_details->data[0];	

		$this->load->view('flash_news/flash_news_edit',$data);
		$this->load->view('footer');
		}else{
			 redirect('Welcome');	
		}

	}
	
	
		
	public function get_single_flash_news_data($news_id){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'employees/getflashnewsbyid/'.$news_id,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'GET',
			  
			  CURLOPT_HTTPHEADER => array(
				'x-access-token:'.$token 
			  ),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			return $response;

	}

	
	


		public function insertflash_news(){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];

		$news_status=1;
			$base64Image="";
		$news_name=trim($_POST['news_name']);
		$news_start_date=trim($_POST['news_start_date']);
		$news_end_date=trim($_POST['news_end_date']);
		$news_content=trim($_POST['news_content']);
		
		$news_image_size=trim($_POST['news_image_height']).','.trim($_POST['news_image_width']);
		if(empty($_POST['news_image_height']) || empty($_POST['news_image_width'])){
			$news_image_size="70,70";
		}
			
		 if (isset($_FILES["news_image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
			$tmp_name = $_FILES["news_image"]["tmp_name"];
			$name = $_FILES["news_image"]["name"];

			// Read the uploaded image file
			$imageData = file_get_contents($tmp_name);

			if ($imageData !== false) {
				// Encode the image data to Base64
				$base64Image = base64_encode($imageData);

			} else {
			  $base64Image="";
				}
        }

		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'employees/createfashnews',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
				"news_image":"'.$base64Image.'",
				"news_name":"'.$news_name.'",
				"news_start_date":"'.$news_start_date.'",
				"news_end_date":"'.$news_end_date.'",
				"news_status":"'.$news_status.'",
				"news_image_size":"'.$news_image_size.'",
				"news_content":"'.$news_content.'"
		}',
		CURLOPT_HTTPHEADER => array(
		'x-access-token:'.$token,
		'Content-Type: application/json'
		),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return $response;
		
	}
	
	
	
	
		public function updateflash_news(){

		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		
		$news_id=$_POST['news_id'];
		
		

		$news_name=trim($_POST['news_name']);
		$news_start_date=trim($_POST['news_start_date']);
		$news_end_date=trim($_POST['news_end_date']);
		$news_content=trim($_POST['news_content']);
		$base64Image="";
		 if (isset($_FILES["news_image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
			$tmp_name = $_FILES["news_image"]["tmp_name"];
			$name = $_FILES["news_image"]["name"];

			// Read the uploaded image file
			$imageData = file_get_contents($tmp_name);

			if ($imageData !== false) {
				// Encode the image data to Base64
				$base64Image = base64_encode($imageData);

			} else {
			  $base64Image="";
				}
        }
	
		$news_image_size=trim($_POST['news_image_height']).','.trim($_POST['news_image_width']);
		if(empty($_POST['news_image_height']) || empty($_POST['news_image_width'])){
			$news_image_size="70,70";
		}
		
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'employees/updateflashnews',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
			"news_image":"'.$base64Image.'",
			"news_name":"'.$news_name.'",
			"news_start_date":"'.$news_start_date.'",
			"news_end_date":"'.$news_end_date.'",
			"news_id":"'.$news_id.'",
			"news_image_size":"'.$news_image_size.'",
			"news_content":"'.$news_content.'"
		}',
		CURLOPT_HTTPHEADER => array(
		'x-access-token:'.$token,
		'Content-Type: application/json'
		),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return $response;
		
		
		
		}
	






	

public function update_flash_news_status($news_status,$news_id){
	$data=array();
			if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){ 
			
			
				if(isset($news_status) && $news_status!='')
			{ 
				$inrs_results = json_decode($this->update_flash_news_status_api($news_status,$news_id));
				if($inrs_results->status==200)
				{
				 $this->session->set_flashdata('success', 'Updated Successfully...');
					redirect('Flash_news'); 
				}
				else
				{
				$this->session->set_flashdata('error', 'Not Updated...');
					redirect('Flash_news'); 
				}
			}
			
			}
			else{
				 redirect('Welcome');	
			}


	}
	public function update_flash_news_status_api($news_status,$news_id){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		$news_status=$news_status==1?'0':'1';

		$admin=$this->session->userdata['user']->emp_id;

		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'employees/deactivateflashnews',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
		"news_status":"'.$news_status.'",
		"news_id":"'.$news_id.'"
		}',
		CURLOPT_HTTPHEADER => array(
		'x-access-token:'.$token,
		'Content-Type: application/json'
		),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return $response;
		}
	
	
}
