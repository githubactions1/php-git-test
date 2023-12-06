<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Managers extends CI_Controller {

	function __construct() { 
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session'); 
		//$this->load->model('login_model');
		$this->load->model(array('settings_model','tasks_model','common_model'));

	}
	 
	public function index()
	{
		if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){
		$this->load->view('header');
 
		$managers_list= json_decode($this->get_all_managers_list());
		$data['managers_list']=$managers_list->data;
		
		
		$manager_count= json_decode($this->get_manager_count());
	$managercount=$manager_count->data[0];
	$data['tatmanagercount']=$managercount->count;

		$this->load->view('managers/managers',$data);
		$this->load->view('footer');
		}else{
		redirect('Welcome');	
		}

	}
	
	public function emp_list()
	{
		if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){
		$this->load->view('header');
 
		$managers_list= json_decode($this->get_all_managers_list());
		$data['managers_list']=$managers_list->data;

		$this->load->view('managers/managers_list',$data);
		$this->load->view('footer');
		}else{
		redirect('Welcome');	
		}

	}
	
	public function get_all_managers_list(){
			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		
				$curl = curl_init(); 
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'employees/getmanagerslist',
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
	
	
	
	
	public function add()
	{
		
		if($this->session->userdata['user']->emp_role != 1){ 
			$this->session->set_flashdata('error', 'You are not having permissions to View the action.');
				redirect('Managers'); 
		}
		
		
		if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){	
		$this->load->view('header');
		
			$data=array();
			if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){ 
				if(isset($_POST['submit']) && $_POST['submit']!='')
			{ 
		
		

				$inrs_results = json_decode($this->insertemployee());
				if($inrs_results->status==200)
				{
				$this->session->set_flashdata('success', 'Created Successfully...');
				redirect('Managers'); 
				} 
				else
				{
					$message=$inrs_results->message;
				$this->session->set_flashdata('error', $message);
					redirect('Managers'); 
				}
			}
			}
			else{
				 redirect('Welcome');	
			}
			
			
			$clusters_list= json_decode($this->get_all_clusters_list());
			$data['clusters_list']=$clusters_list->data;	
			 
			$states_list= json_decode($this->get_all_states_list());
			$data['states_list']=$states_list->data;	
			
			$departments_list= json_decode($this->get_all_sub_list(1));
			$data['departments_list']=$departments_list->data;	
			
			$designation_list= json_decode($this->get_employee_roles_list(2));
			$data['designation_list']=$designation_list->data;	
			
			$team_types_list= json_decode($this->get_all_sub_list(23));
			$data['team_types_list']=$team_types_list->data;
			
			$task_type_list= json_decode($this->get_all_task_type_list());
			$data['task_type_list']=$task_type_list->data;	

		$emp_shifts_list= json_decode($this->tasks_model->get_all_sub_list(16));
		$data['emp_shifts_list']=$emp_shifts_list->data;	
	
		$skill_type_list= json_decode($this->tasks_model->get_all_sub_list(20));
		$data['skill_type_list']=$skill_type_list->data;
		
		$zones_states_and_clusters_list= json_decode($this->common_model->get_all_zones_states_and_clusters_list());
		$data['zones_states_and_clusters_list']=$zones_states_and_clusters_list->data;
		
		
		$data['page_name']='Add';	
		$this->load->view('managers/manager_add',$data);
		$this->load->view('footer');
		}else{
			 redirect('Welcome');	
		}

	}

	public function edit($emp_id)
	{
		
		
		if($this->session->userdata['user']->emp_role != 1){ 
			$this->session->set_flashdata('error', 'You are not having permissions to View the action.');
				redirect('Managers'); 
		}

		if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){	
		$this->load->view('header');
		
			$data=array();
			if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){ 
				if(isset($_POST['submit']) && $_POST['submit']!='')
			{ 
			// echo '<pre>';print_r($_POST);exit;

		

				$inrs_results = json_decode($this->updateemployee());

				if($inrs_results->status==200)
				{
				$this->session->set_flashdata('success', 'Updated Successfully...');
				redirect('Managers'); 
				}
				else
				{
				$this->session->set_flashdata('error', 'Not Updated...');
					redirect('Managers'); 
				}
			}
			}
			else{
				 redirect('Welcome');	
			}
			
			
			$clusters_list= json_decode($this->get_all_clusters_list());
			$data['clusters_list']=$clusters_list->data;	
			
			$states_list= json_decode($this->get_all_states_list());
			$data['states_list']=$states_list->data;	
			$departments_list= json_decode($this->get_all_sub_list(1));
			$data['departments_list']=$departments_list->data;	
	
			$designation_list= json_decode($this->get_employee_roles_list(2));
			$data['designation_list']=$designation_list->data;	

			$task_type_list= json_decode($this->get_all_task_type_list());
			$data['task_type_list']=$task_type_list->data;	

			
			$team_types_list= json_decode($this->get_all_sub_list(23));
			$data['team_types_list']=$team_types_list->data;
			
		$emp_shifts_list= json_decode($this->tasks_model->get_all_sub_list(16));
		$data['emp_shifts_list']=$emp_shifts_list->data;	
		
		
		$skill_type_list= json_decode($this->tasks_model->get_all_sub_list(20));
		$data['skill_type_list']=$skill_type_list->data;
		
		$employee= json_decode($this->get_single_employee_data($emp_id));
		$employee_record=$employee->data;
		$data['employee_record']=$employee_record[0];
		$data['page_name']='Edit';
		
		
		$zones_states_and_clusters_list= json_decode($this->common_model->get_all_zones_states_and_clusters_list());
		$data['zones_states_and_clusters_list']=$zones_states_and_clusters_list->data;
		
		
		
		
		$cluster_wsie_vendors= json_decode($this->common_model->get_cluster_wsie_vendors_list($employee_record[0]->cluster_id));
		$data['vendor_name_list']=$cluster_wsie_vendors->data;
		
		$this->load->view('managers/manager_edit',$data);
		$this->load->view('footer');
		}else{
			 redirect('Welcome');	
		}

	}
	
	
		
	public function get_single_employee_data($emp_id){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'employees/getbyemployee/'.$emp_id,
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

	
	


		public function insertemployee(){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];

		$emp_status=1;
		$emp_name=$_POST['emp_name'];
		$emp_code=$_POST['emp_code'];
		
		$emp_username=trim($_POST['emp_username']);
		$emp_password=trim($_POST['emp_mobile']);
		$emp_email=$_POST['emp_email'];
		$emp_dept='1';
		$emp_designation1=explode('**',$_POST['emp_designation']);
		if(!empty($emp_designation1)){
			$emp_designation=$emp_designation1[1];
			$emp_role=$emp_designation1[0];
		}
		
		$emp_reporting=1;
		$emp_mobile=$_POST['emp_mobile'];
		$team_type=$_POST['team_type'];
		$vendor_name=$_POST['vendor_name'];
		
		
		$cluster_id=$_POST['cluster_id'];
		$total_leaves=24;
		

		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'employees/addmanagers',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
				"emp_username":"'.$emp_username.'",
				"emp_password":"'.$emp_password.'",
				"emp_name":"'.$emp_name.'",
				"emp_dept":"'.$emp_dept.'",
				"emp_designation":"'.$emp_designation.'",
				"emp_reporting":"'.$emp_reporting.'",
				"emp_email":"'.$emp_email.'",
				"emp_mobile":"'.$emp_mobile.'",
				"emp_role":"'.$emp_role.'",
				"emp_code":"'.$emp_code.'",
				"emp_status":"'.$emp_status.'",
				"total_leaves":"'.$total_leaves.'",
				"cluster_id":"'.$cluster_id.'",
				"team_type":"'.$team_type.'",
				"vendor_name":"'.$vendor_name.'",
				"fcm_id":"",
				"device_id":""
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
	
	
	
	
		public function updateemployee(){

		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		
		$emp_id=$_POST['emp_id'];
		
		

		$emp_name=$_POST['emp_name'];
		$emp_code=$_POST['emp_code'];
		$emp_username=trim($_POST['emp_username']);
		$emp_password=trim($_POST['emp_mobile']);
		$emp_email=$_POST['emp_email'];
		$team_type=$_POST['team_type'];
		$vendor_name=$_POST['vendor_name'];
		$emp_dept=1;
		$emp_designation1=explode('**',$_POST['emp_designation']);
		if(!empty($emp_designation1)){
			$emp_designation=$emp_designation1[1];
			$emp_role=$emp_designation1[0];
		}
		
		$emp_reporting=1;
		$emp_mobile=$_POST['emp_mobile'];
		
		$cluster_id=$_POST['cluster_id'];
		$admin=$this->session->userdata['user']->emp_id;
		$total_leaves=24;
	
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'employees/editmanagersdata',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
		"emp_id":"'.$emp_id.'",
		"empusername":"'.$emp_username.'",
		"emppwd":"'.$emp_password.'",
		"emp_name":"'.$emp_name.'",
		"emp_dept":"'.$emp_dept.'",
		"emp_designation":"'.$emp_designation.'",
		"emp_reporting":"'.$emp_reporting.'",
		"emp_email":"'.$emp_email.'",
		"emp_mobile":"'.$emp_mobile.'",
		"emp_role":"'.$emp_role.'",
		"emp_code":"'.$emp_code.'",
		"cluster_id":"'.$cluster_id.'",
		"team_type":"'.$team_type.'",
		"vendor_name":"'.$vendor_name.'",
		"total_leaves":"'.$total_leaves.'"
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
	


		
		
	public function update_employee_status($emp_status,$emp_id){
	$data=array();
			if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){ 
			
			
				if(isset($emp_status) && $emp_status!='')
			{ 
				$inrs_results = json_decode($this->update_employee_status_api($emp_status,$emp_id));
				if($inrs_results->status==200)
				{
				 $this->session->set_flashdata('success', 'Updated Successfully...');
					redirect('Managers'); 
				}
				else
				{ 
				$this->session->set_flashdata('error', 'Not Updated...');
					redirect('Managers'); 
				}
			}
			
			}
			else{
				 redirect('Welcome');	
			}


	}
	
	
	
	public function update_employee_status_api($emp_status,$emp_id){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		$emp_status=$emp_status==1?'0':'1';
		$emp_id=$emp_id;

		$admin=$this->session->userdata['user']->emp_id;

		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'employees/deleteemployestatus',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
		"emp_status":"'.$emp_status.'",
		"emp_id":"'.$emp_id.'"
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





	
		public function get_all_task_type_list(){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
				// "comp_status":1,
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'categories/getcomplaintcategories',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"comp_status":1
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
	
		public function get_all_sub_list($cat_id){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
				// "sub_cat_status":1,
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'categories/getsubcategories',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"cat_id":"'.$cat_id.'",
					"sub_cat_status":1
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
	
		public function get_all_clusters_list(){
			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
				curl_setopt_array($curl, array(
				CURLOPT_URL => API_MAIN_URL.'clusters/getclusters',
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
	
	public function get_all_zones_list(){
			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'zone/getzonelist',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
				"status":1
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
	
	
	
	public function get_all_states_list(){
			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		
				$curl = curl_init(); 
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'state/getstatelist',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
				"status":1
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
	
	public function get_cluster_wsie_vendors_list()
		{
			//echo '<pre>';print_r($_POST);exit;
			$cluster_ids = $this->input->post('cluster_ids');
			$cluster_wsie_vendors= json_decode($this->common_model->get_cluster_wsie_vendors_list($cluster_ids));
			$cluster_wsie_vendors1=$cluster_wsie_vendors->data;
			
				if(count($cluster_wsie_vendors1)>0 && !empty($cluster_ids)){
				$opt='<option value="">--Select--</option>';		

				foreach($cluster_wsie_vendors1 as $v){ 
				$opt.='<option value="'.$v->vendor_id.'">'.$v->vendor_name.'</option>';
				}
				}else{
				$opt='<option value="">--No data--</option>';		

				}
				echo $opt;exit;
		}

public function update_manager_status($emp_status,$emp_id){
	$data=array();
			if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){ 
			
			
				if(isset($emp_status) && $emp_status!='')
			{ 
				$inrs_results = json_decode($this->update_managers_status_api($emp_status,$emp_id));
				if($inrs_results->status==200)
				{
				 $this->session->set_flashdata('success', 'Updated Successfully...');
					redirect('Managers'); 
				}
				else
				{
				$this->session->set_flashdata('error', 'Not Updated...');
					redirect('Managers'); 
				}
			}
			
			}
			else{
				 redirect('Welcome');	
			}


	}
	public function update_managers_status_api($emp_status,$emp_id){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		$emp_status=$emp_status==1?'0':'1';
		$emp_id=$emp_id;

		$admin=$this->session->userdata['user']->emp_id;

		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'employees/deleteemployestatus',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
		"emp_status":"'.$emp_status.'",
		"emp_id":"'.$emp_id.'"
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
	public function get_manager_count(){
			$token=$this->session->userdata['user']->token;
		
		$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => API_MAIN_URL.'employees/getmanagerscount',
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





	public function reinvite(){
			
		$emp_id=$this->uri->segment(3);	
		$reinvite_results = json_decode($this->get_reinvite($emp_id));
			if($reinvite_results->status==200)
			{ 
			 $this->session->set_flashdata('success', 'sent Successfully...');
				redirect('Managers'); 
			}
			else
			{
			$this->session->set_flashdata('error', 'Not sent...');
				redirect('Managers'); 
			}
		}
		
		
		public function get_reinvite($emp_id){
				$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$emp_id=$emp_id;


				$curl = curl_init();
				curl_setopt_array($curl, array(
				CURLOPT_URL => API_MAIN_URL.'employees/employeereinvite',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
				"emp_id":"'.$emp_id.'"
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



	/* Roles List 05-09-2023 */
		
		public function get_employee_roles_list($role_type){
			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
				curl_setopt_array($curl, array(
				CURLOPT_URL => API_MAIN_URL.'employees/getbyemployeerole/'.$role_type,
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
	
	/* Roles List 05-09-2023 */

	
}
