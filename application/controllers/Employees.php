<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends CI_Controller {

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
 
		$employees_list= json_decode($this->get_all_employees_list());
		$data['employees_list']=$employees_list->data;

		$this->load->view('employees/employees',$data);
		$this->load->view('footer');
		}else{
		redirect('Welcome');	
		}

	}
	
	public function emp_list()
	{
		//redirect('Employees');	
		if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){
		$this->load->view('header');
 
		$employees_list= json_decode($this->get_employees_list());
		$data['employees_list']=$employees_list->data;
		
		$employees_count= json_decode($this->get_employee_count());
			$employeescount=$employees_count->data[0];

		$data['employees_count']=$employeescount->count;
		

		$this->load->view('employees/employees_list',$data);
		$this->load->view('footer');
		}else{
		redirect('Welcome');	
		}

	}
	
	public function get_all_employees_list(){
			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		
				$curl = curl_init(); 
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'employees/getemployee',
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
		

		if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){	
		$this->load->view('header');
		if($this->session->userdata['user']->emp_role != 1){ 
			$this->session->set_flashdata('error', 'You are not having permissions to View the action.');
				redirect('Employees'); 
		}
		
			$data=array();
			if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){ 
				if(isset($_POST['submit']) && $_POST['submit']!='')
			{ 
		
		

				$inrs_results = json_decode($this->insertemployee());
				

				if($inrs_results->status==200)
				{
				$this->session->set_flashdata('success', 'Created Successfully...');
				redirect('Employees'); 
				}
				else
				{
					$message=$inrs_results->message;
				$this->session->set_flashdata('error', $message);
					redirect('Employees'); 
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
			
			$designation_list= json_decode($this->get_employee_roles_list(1));
			$data['designation_list']=$designation_list->data;	
			
			
			$task_type_list= json_decode($this->get_all_task_type_list());
			$data['task_type_list']=$task_type_list->data;	
	
			
			$team_types_list= json_decode($this->get_all_sub_list(22));
			$data['team_types_list']=$team_types_list->data;	
	
		$skill_type_list= json_decode($this->tasks_model->get_all_sub_list(20));
		$data['skill_type_list']=$skill_type_list->data;
		
		$zones_states_and_clusters_list= json_decode($this->common_model->get_all_zones_states_and_clusters_list());
		$data['zones_states_and_clusters_list']=$zones_states_and_clusters_list->data;
		
		
		$data['page_name']='Add';	
		$this->load->view('employees/employee_add',$data);
		$this->load->view('footer');
		}else{
			 redirect('Welcome');	
		}

	}
	
	
	
		public function add_employee_submit_form_ajax()
	{
		
			// echo '<pre>';print_r($_POST);exit;

				$inrs_results = json_decode($this->insertemployee());
				if($inrs_results->status==200){
				$data['status'] = 1;
				$data['msg'] = ' Created successfully....';
				}else{
				$message=$inrs_results->message;	
				$data['status'] =0;
				$data['msg'] = $message;
				}

				echo json_encode($data);
	}

	public function edit($emp_id)
	{
		if($this->session->userdata['user']->emp_role != 1){ 
			$this->session->set_flashdata('error', 'You are not having permissions to View the action.');
				redirect('Employees'); 
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
				redirect('Employees'); 
				}
				else
				{
					$message=$inrs_results->message;
					$this->session->set_flashdata('error', $message);
					redirect('Employees');  
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
	
			$designation_list= json_decode($this->get_employee_roles_list(1));
			$data['designation_list']=$designation_list->data;	

			$task_type_list= json_decode($this->get_all_task_type_list());
			$data['task_type_list']=$task_type_list->data;	

			
			$team_types_list= json_decode($this->get_all_sub_list(22));
			$data['team_types_list']=$team_types_list->data;
				
		
		
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


		$emp_shifts_list= json_decode($this->common_model->get_cluster_wsie_shifts_list($employee_record[0]->cluster_id));
		$data['emp_shifts_list']=$emp_shifts_list->data;

		$this->load->view('employees/employee_edit',$data);
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
	
	


		public function insertemployee(){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		
		$emp_status=1;
		$emp_name=trim($_POST['emp_name']);
		$emp_code=trim($_POST['emp_code']);
		
		$emp_username=trim($_POST['emp_username']);
		$emp_password=trim($_POST['emp_mobile']);
		$emp_email=$_POST['emp_email'];
		$emp_dept='1';
		$emp_designation1=explode('**',$_POST['emp_designation']);
		if(!empty($emp_designation1)){
			$emp_designation=$emp_designation1[1];
			$emp_role=$emp_designation1[0];
		}
		
		$address=trim($_POST['address']);
		$address2=trim($_POST['address2']);
		
		
		$emp_reporting=1;
		$emp_mobile=trim($_POST['emp_mobile']);
		
		
		$city=trim($_POST['city']);
		$pincode='';
		$notes='employee created';
		
		$cluster_id=$_POST['cluster_id'];
		$cluster_id11=explode(',',$cluster_id);
		$cluster_id1=$cluster_id11[0];
		$cluster_data1=json_decode($this->settings_model->get_single_cluster_data($cluster_id1));
		$cluster_data=$cluster_data1->data;
		
		
		$zone_id=$cluster_data[0]->zone_id;
		$state=$cluster_data[0]->state_id;
		
		$comp_cat_id=$_POST['comp_cat_id'];
		$shift_type_id=1;
		if(!empty($_POST['shift_type_id'])){
		$shift_type_id=$_POST['shift_type_id'];
		}
		
		$vendor_name=$_POST['vendor_name'];
		$skill_type=$_POST['skill_type'];
		$member_type=$_POST['member_type'];
		$team_type=$_POST['team_type'];
		
		
		$city_type=$_POST['city_type'];
		$total_leaves=24;
		$emp_latitude=trim($_POST['emp_latitude']);
		$emp_longitude=trim($_POST['emp_longitude']);
		// added 20-11-2023 by sk
			$po_number=$_POST['po_number'];
			$effective_date=$_POST['effective_date'];
			$expry_date=$_POST['expry_date'];
		if(empty($expry_date)){
				$expry_date="0000-00-00";
			}
		
			if(empty($effective_date)){
					$effective_date="0000-00-00";
			}
			
			
//end 
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'employees/insertemployee',
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
				"team_type":"'.$team_type.'",
				"emp_reporting":"'.$emp_reporting.'",
				"emp_email":"'.$emp_email.'",
				"emp_mobile":"'.$emp_mobile.'",
				"emp_role":"'.$emp_role.'",
				"emp_code":"'.$emp_code.'",
				"city":"'.$city.'",
				"state":"'.$state.'",
				"pincode":"'.$pincode.'",
				"zone_id":"'.$zone_id.'",
				"notes":"'.$notes.'",
				"cluster_id":"'.$cluster_id.'",
				"comp_cat_id":"'.$comp_cat_id.'",
				"shift_type_id":"'.$shift_type_id.'",
				"vendor_name":"'.$vendor_name.'",
				"skill_type":"'.$skill_type.'",
				"member_type":"'.$member_type.'",
				"address":"'.$address.'",
				"address2":"'.$address2.'",
				"emp_status":"'.$emp_status.'",
				"city_type":"'.$city_type.'",
				"total_leaves":"'.$total_leaves.'",
				"emp_latitude":"'.$emp_latitude.'",
				"emp_longitude":"'.$emp_longitude.'",
				"fcm_id":"",
				"device_id":"",
				"ponumber":"'.$po_number.'",
				"effective_date":"'.$effective_date.'",
				"expry_date":"'.$expry_date.'"
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
		$emp_dept=1;
		
		$emp_designation1=explode('**',$_POST['emp_designation']);
		if(!empty($emp_designation1)){
			$emp_designation=$emp_designation1[1];
			$emp_role=$emp_designation1[0];
		}
		
		$address=trim($_POST['address']);
		$address2=trim($_POST['address2']);
		
		
		$emp_reporting=1;
		$emp_mobile=$_POST['emp_mobile'];
		
		
		
		$city=$_POST['city'];
		$pincode="";
		$notes="";
		$cluster_id=$_POST['cluster_id'];
		$cluster_id11=explode(',',$cluster_id);
		$cluster_id1=$cluster_id11[0];
		$cluster_data1=json_decode($this->settings_model->get_single_cluster_data($cluster_id1));
		$cluster_data=$cluster_data1->data;
		$zone_id=$cluster_data[0]->zone_id;
		$state=$cluster_data[0]->state_id;

		$comp_cat_id=$_POST['comp_cat_id'];
		$shift_type_id=1;
		if(!empty($_POST['shift_type_id'])){
		$shift_type_id=$_POST['shift_type_id'];
		}
		
		
		$vendor_name=$_POST['vendor_name'];
		$team_type=$_POST['team_type'];
		
		$skill_type=$_POST['skill_type'];
		$member_type=$_POST['member_type'];
		
		$admin=$this->session->userdata['user']->emp_id;
		
		$city_type=$_POST['city_type'];
		$total_leaves=24;
		$emp_latitude=$_POST['emp_latitude'];
		$emp_longitude=$_POST['emp_longitude'];
		// added 20-11-2023 by sk
			$po_number=$_POST['po_number'];
			$effective_date=$_POST['effective_date'];
			$expry_date=$_POST['expry_date'];
	//end
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'employees/updateemployee',
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
		"team_type":"'.$team_type.'",
		"emp_reporting":"'.$emp_reporting.'",
		"emp_email":"'.$emp_email.'",
		"emp_mobile":"'.$emp_mobile.'",
		"emp_role":"'.$emp_role.'",
		"emp_code":"'.$emp_code.'",
		"city":"'.$city.'",
		"state":"'.$state.'",
		"pincode":"'.$pincode.'",
		"zone_id":"'.$zone_id.'",
		"notes":"'.$notes.'",
		"cluster_id":"'.$cluster_id.'",
		"comp_cat_id":"'.$comp_cat_id.'",
		"shift_type_id":"'.$shift_type_id.'",
		"vendor_name":"'.$vendor_name.'",
		"skill_type":"'.$skill_type.'",
		"member_type":"'.$member_type.'",
		"address":"'.$address.'",
		"city_type":"'.$city_type.'",
		"total_leaves":"'.$total_leaves.'",
		"emp_latitude":"'.$emp_latitude.'",
		"emp_longitude":"'.$emp_longitude.'",
		"address2":"'.$address2.'",
		"ponumber":"'.$po_number.'",
		"effective_date":"'.$effective_date.'",
		"expry_date":"'.$expry_date.'"
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
		
				if($this->session->userdata['user']->emp_role == 1){ 
					$inrs_results = json_decode($this->update_employee_status_api($emp_status,$emp_id));
				}else{
					$inrs_results = json_decode($this->update_employee_status_api_with_manager($emp_status,$emp_id));
				}
				
				
				
				if($inrs_results->status==200)
				{
				 $this->session->set_flashdata('success', 'Updated Successfully...');
					redirect('Employees'); 
				}
				else
				{
				$this->session->set_flashdata('error', 'Not Updated...');
					redirect('Employees'); 
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

	
	
	public function update_employee_status_api_with_manager($lock_user,$emp_id){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		$lock_user=$lock_user==1?'0':'1';
		$emp_id=$emp_id;

		$admin=$this->session->userdata['user']->emp_id;

		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'employees/managerlockemployestatus',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
		"lock_user":"'.$lock_user.'",
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


	
	public function reset_imei_update($emp_id){
	$data=array();
			if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){ 
			
			
				if(isset($emp_id) && $emp_id!='')
			{ 
				$inrs_results = json_decode($this->update_reset_imei_update($emp_id));
				if($inrs_results->status==200)
				{
				 $this->session->set_flashdata('success', 'Updated Successfully...');
					redirect('Employees'); 
				}
				else
				{
				$this->session->set_flashdata('error', 'Not Updated...');
					redirect('Employees'); 
				}
			}
			
			}
			else{
				 redirect('Welcome');	
			}


	}
	
	public function update_reset_imei_update($emp_id){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		$emp_id=$emp_id;


		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'employees/resetemployeeDevice',
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

	public function get_cluster_wsie_shifts_list()
		{
			//echo '<pre>';print_r($_POST);exit;
			$cluster_ids = $this->input->post('cluster_ids');
			$cluster_wsie_shifts_list= json_decode($this->common_model->get_cluster_wsie_shifts_list($cluster_ids));
			$cluster_wsie_shifts_list1=$cluster_wsie_shifts_list->data;
			
				if(count($cluster_wsie_shifts_list1)>0 && !empty($cluster_ids)){
				$opt='<option value="">--Select--</option>';		

				foreach($cluster_wsie_shifts_list1 as $v){ 
				$opt.='<option value="'.$v->shift_id.'">'.$v->shift_name.'</option>';
				}
				}else{
				$opt='<option value="">--No data--</option>';		

				}
				echo $opt;exit;
		}

public function get_employees_list(){
$token=$this->session->userdata['user']->token;

	$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => API_MAIN_URL.'employees/teamsetupgetemployee',
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
public function get_employee_count(){
	
$token=$this->session->userdata['user']->token;
	
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => API_MAIN_URL.'employees/teamsetupgetemployeecount',
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
				redirect('Employees'); 
			}
			else
			{
			$this->session->set_flashdata('error', 'Not sent...');
				redirect('Employees'); 
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

	
		
		public function employees_download_data(){
			
				$employee_data= json_decode($this->get_all_employees_list());
				$employee_data=$employee_data->data;

					$fname='sify_employees_data'.date('Y_m_d_H_i_s').'.csv';
					header('Content-Type: text/csv; charset=utf-8');  
					header('Content-Disposition: attachment; filename='.$fname.'');  
					$output = fopen("php://output", "w");  
					fputcsv($output, array('State Name','Zone Name','Cluster Name','User Name','Employee Id','Employee Name','Mobile Number','Role','Address','Base Address','Employment Type','Team type','Vendor Name','Latitude','Longitude','Onboarding_Date','Status','City Name','City Type'));  
					$fields=array();
					if(!empty($employee_data))
					{
					foreach($employee_data as $key=>$row)  
					{		
						
					if($row->emp_role == 2 || $row->emp_role == 3){ 
					if($row->emp_status==1){
						$status='Active';
					}else {
							$status='Inactive';
					}
					
					$sno=$key+1;
					$fields=array(
					//'sno'=>$sno,
					'state_name'=>$row->state_name,
					'zone_name'=>$row->zone_name,
					'cluster_name'=>$row->cluster_name,
					'emp_username'=>$row->emp_username,
					'emp_code'=>$row->emp_code,
					'Name'=>$row->emp_name,
					'Mobile_Number'=>$row->emp_mobile,
					'Designation'=>$row->role_name,
					'Address'=>$row->address,
					'Base_Address'=>$row->address2,
					'Employment_Type'=>$row->member_type_name,
					'team_type'=>$row->team_type,
					'Vendor_Name'=>$row->vendor_name,
					'emp_latitude'=>$row->emp_latitude,
					'emp_longitude'=>$row->emp_longitude,
					//'Task_Types'=>$row->task_types,
					'Onboarding_Date'=>Dateconversion($row->date_created),
					'status'=>$status,
					'City_Name'=>$row->city,
					'City_Type'=>$row->city_type
					);
					fputcsv($output, $fields);  							
						}  
					}  
					} 		
					fclose($output); 
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
	
	// added 10-11-2023 by sk
	public function frtteam()
	{
		if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){
		$this->load->view('header');
 
		$employees_list= json_decode($this->get_frtall_employees_list());
		$data['employees_list']=$employees_list->data;

		$this->load->view('employees/ftpemployees',$data);
		$this->load->view('footer');
		}else{
		redirect('Welcome');	
		}

	}
	
	// added 14-11-2023 by sk	
	public function get_frtall_employees_list(){
			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		
				$curl = curl_init(); 
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'employees/frtteamgetemployee',
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
			//print_r($response);die;
			return $response;
			

	}
	
		public function frtemployeeadd()
	{
		

		if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){	
		$this->load->view('header');
		if($this->session->userdata['user']->emp_role != 1){ 
			$this->session->set_flashdata('error', 'You are not having permissions to View the action.');
				redirect('Employees'); 
		}
		
			$data=array();
			if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){ 
				if(isset($_POST['submit']) && $_POST['submit']!='')
			{ 
		
		

				$inrs_results = json_decode($this->insertemployee());
				

				if($inrs_results->status==200)
				{
				$this->session->set_flashdata('success', 'Created Successfully...');
				redirect('Employees/frtteam'); 
				}
				else
				{
					$message=$inrs_results->message;
				$this->session->set_flashdata('error', $message);
					redirect('Employees/frtteam'); 
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
			
			$designation_list= json_decode($this->get_employee_roles_list(1));
			$data['designation_list']=$designation_list->data;	
			
			
			$task_type_list= json_decode($this->get_all_task_type_list());
			$data['task_type_list']=$task_type_list->data;	
	
			
			$team_types_list= json_decode($this->get_all_sub_list(22));
			$data['team_types_list']=$team_types_list->data;	
	
		$skill_type_list= json_decode($this->tasks_model->get_all_sub_list(20));
		$data['skill_type_list']=$skill_type_list->data;
		
		$zones_states_and_clusters_list= json_decode($this->common_model->get_all_zones_states_and_clusters_list());
		$data['zones_states_and_clusters_list']=$zones_states_and_clusters_list->data;
		
		
		$data['page_name']='Add';	
		$this->load->view('employees/frtemployee_add',$data);
		$this->load->view('footer');
		}else{
			 redirect('Welcome');	
		}

	}
	// end
	
	/* Roles List 05-09-2023 */
	
	
	//added by sk 15-11-2023
	
	public function update_frtemployee_status($emp_status,$emp_id){
	$data=array();
			if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){ 
			
			
				if(isset($emp_status) && $emp_status!='')
			{ 
		
				if($this->session->userdata['user']->emp_role == 1){ 
					$inrs_results = json_decode($this->update_employee_status_api($emp_status,$emp_id));
				}else{
					$inrs_results = json_decode($this->update_employee_status_api_with_manager($emp_status,$emp_id));
				}
				
				
				
				if($inrs_results->status==200)
				{
				 $this->session->set_flashdata('success', 'Updated Successfully...');
					redirect('Employees/frtteam'); 
				}
				else
				{
				$this->session->set_flashdata('error', 'Not Updated...');
					redirect('Employees/frtteam'); 
				}
			}
			
			}
			else{
				 redirect('Welcome');	
			}


	}
	
	public function frtreinvite(){
			
		$emp_id=$this->uri->segment(3);	
		$reinvite_results = json_decode($this->get_reinvite($emp_id));
			if($reinvite_results->status==200)
			{ 
			 $this->session->set_flashdata('success', 'sent Successfully...');
				redirect('Employees/frtteam'); 
			}
			else
			{
			$this->session->set_flashdata('error', 'Not sent...');
				redirect('Employees/frtteam'); 
			}
		}
		
	
		public function frtreset_imei_update($emp_id){
	$data=array();
			if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){ 
			
			
				if(isset($emp_id) && $emp_id!='')
			{ 
				$inrs_results = json_decode($this->update_reset_imei_update($emp_id));
				if($inrs_results->status==200)
				{
				 $this->session->set_flashdata('success', 'Updated Successfully...');
					redirect('Employees/frtteam'); 
				}
				else
				{
				$this->session->set_flashdata('error', 'Not Updated...');
					redirect('Employees/frtteam'); 
				}
			}
			
			}
			else{
				 redirect('Welcome');	
			}


	}
	
	
	
	public function frt_empedit($emp_id)
	{
		if($this->session->userdata['user']->emp_role != 1){ 
			$this->session->set_flashdata('error', 'You are not having permissions to View the action.');
				redirect('Employees/frtteam'); 
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
				redirect('Employees/frtteam'); 
				}
				else
				{
					$message=$inrs_results->message;
					$this->session->set_flashdata('error', $message);
					redirect('Employees/frtteam');  
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
	
			$designation_list= json_decode($this->get_employee_roles_list(1));
			$data['designation_list']=$designation_list->data;	

			$task_type_list= json_decode($this->get_all_task_type_list());
			$data['task_type_list']=$task_type_list->data;	

			
			$team_types_list= json_decode($this->get_all_sub_list(22));
			$data['team_types_list']=$team_types_list->data;
				
		
		
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


		$emp_shifts_list= json_decode($this->common_model->get_cluster_wsie_shifts_list($employee_record[0]->cluster_id));
		$data['emp_shifts_list']=$emp_shifts_list->data;

		$this->load->view('employees/frtemployee_edit',$data);
		$this->load->view('footer');
		}else{
			 redirect('Welcome');	
		}

	}
	//end
}
