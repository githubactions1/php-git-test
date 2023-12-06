<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distance_approvals extends CI_Controller {

	function __construct() { 
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('checklogin_helper');
		$this->load->library('form_validation');
		$this->load->library('session'); 
		//$this->load->model('login_model');
		$this->load->model(array('settings_model','tasks_model','common_model'));

	}
	 
		public function index()
		{
			if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){
			$this->load->view('header');
	 
			$distance_approvals_list= json_decode($this->get_all_distance_approvals_list());
			$data['distance_approvals_list']=$distance_approvals_list->data;

			$this->load->view('distance_approvals/distance_approvals',$data);
			$this->load->view('footer');
			}else{
			redirect('Welcome');	
			}

		}
	
	
		public function get_all_distance_approvals_list(){
			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		
				$curl = curl_init(); 
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'tasksections/listtaskdistdisputedata',
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
	
	

	public function get_single_distance_approvals_id_data()
		{
			$task_id = $this->input->post('task_id');

			$d_list=json_decode($this->get_single_state_distance_approvals($task_id));
			$d_list_data1=$d_list->data;
			$d_list_data=$d_list_data1[0];
			$cal_dist=$d_list_data->cal_dist;
			if($cal_dist !='' || $cal_dist !='0'){
				$cal_dist=$d_list_data->cal_dist/1000;
			}
			$data['emp_name']=$d_list_data->emp_name;
			$data['cal_dist']=$cal_dist;
			$data['actual_dist']=$d_list_data->actual_dist;
			$data['emp_id']=$d_list_data->emp_id;
			$data['task_id']=$d_list_data->task_id;
			$data['emp_remarks']=$d_list_data->emp_remarks;
			$data['start_address']=trim($d_list_data->start_address, '"');
			$data['end_address']=trim($d_list_data->end_address, '"');
			$data['task_details']=$d_list_data->task_no.' , '.$d_list_data->service_no;


			
			$data['travel_date']=$travel_date=y_m_d_conversion($d_list_data->i_ts);
			$check_approve_date= date('Y-m-d', strtotime($travel_date. ' + 5 days'));
			$today=date('Y-m-d');

			if($today >= $check_approve_date){
				$data['check_approve_date']="expired";
				$data['check_approve_status']="0";
			} else {
				$data['check_approve_date']="active";
				$data['check_approve_status']="1";
			}
	//echo '<pre>';print_r($data);exit;

			if($data == false)
			{
			$this->session->set_userdata('error_message', " not exists");
			$response['msg'] = false;
			}
			else
			{
			$response['msg'] = true;
			$response['response'] = $data;
			}
			echo json_encode($response);
			exit;
				
		}
		
		
		
		
	
		public function get_single_state_distance_approvals($task_id){
		$curl = curl_init();
			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];

		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'tasksections/taskdisputebaseonidbasedlistweb',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
		"task_id":"'.$task_id.'"
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
		
		
			
		public function update_distance_approvals(){
			
			
				$data=array();
				if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){ 
					if(isset($_POST['submit']) && $_POST['submit']!='')
				{ 

			

					$inrs_results = json_decode($this->updateemployee_distance_approvals());

					if($inrs_results->status==200)
					{
					$this->session->set_flashdata('success', 'Updated Successfully...');
					redirect('Distance_approvals'); 
					}
					else
					{
					$this->session->set_flashdata('error', 'Not Updated...');
						redirect('Distance_approvals'); 
					}
				}
				}
				else{
					 redirect('Welcome');	
				}
			
		}
		
		
		
	public function updateemployee_distance_approvals(){
		
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		$emp_id=$this->session->userdata['user']->emp_id;
		
		$task_id=$_POST['task_id'];
		$status=trim($_POST['updated_status']);
		$mgr_approve_dist='0';
		if($status == 1){
		$mgr_approve_dist=trim($_POST['mgr_approve_dist']);
		}
		$mgr_remarks=json_encode(addslashes($_POST['mgr_remarks']));
	



		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'tasksections/updatetaskdistdisputeweb',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
			"task_id":"'.$task_id.'",
			"mgr_approve_dist":'.$mgr_approve_dist.',
			"status":'.$status.',
			"mgr_apprved_by":'.$emp_id.',
			"mgr_remarks":'.$mgr_remarks.'
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
