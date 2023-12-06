<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave_approvals extends CI_Controller {

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
	 
			$leave_approvals_list= json_decode($this->get_all_leave_approvals_list());
			$data['leave_approvals_list']=$leave_approvals_list->data;
//print_r($data['leave_approvals_list']);die;
			$this->load->view('leave_approvals/leave_approvals',$data);
			$this->load->view('footer');
			}else{
			redirect('Welcome');	
			}

		}
		
		public function get_all_leave_approvals_list(){
			
			$token=$this->session->userdata['user']->token;	

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => API_MAIN_URL.'leaverequest/frtemployessleavelist',
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
	
public function approve_leave(){
	 
$emp_leaveapproved= json_decode($this->emp_leave_approved());		
				if($emp_leaveapproved->status==200)
				{
                    $data['status'] =1;
					$data['msg'] = 'Approved Success..';				
				}
				else{
                  $data['status'] =0;
					$data['msg'] = 'Not Success..';				
					}
echo json_encode($data);					
	
}	
	
public function emp_leave_approved(){
$token=$this->session->userdata['user']->token;	
$reg_emp_id=$this->session->userdata['user']->emp_id;

	$leave_id=$_POST['emp_id'];	
	$tuid=$_POST['tuid'];	
	$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => API_MAIN_URL.'leaverequest/approvedleave',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    
 "leave_status":"1",
 "l_req_id":"'.$leave_id.'",
 "emp_id":"'.$tuid.'",
 "approved_by":"'.$reg_emp_id.'"
 
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
	
	


public function rejected_leave(){
	
$emp_leaverejected= json_decode($this->emp_leave_reject());		
				if($emp_leaverejected->status==200)
				{
					$data['status'] = 1;
					$data['msg'] = ' Rejected successfully....';
				}
				else{
					$data['status'] =0;
					$data['msg'] = 'Not success..';
				}	
				echo json_encode($data);					

	
}	
	
public function emp_leave_reject(){
$token=$this->session->userdata['user']->token;	
$reg_emp_id=$this->session->userdata['user']->emp_id;
	$leave_id=$_POST['emp_id'];	

	$tuid=$_POST['tuid'];	
	$curl = curl_init();
	curl_setopt_array($curl, array(
  CURLOPT_URL => API_MAIN_URL.'leaverequest/rejectleave',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    
 "leave_status":"2",
 "l_req_id":"'.$leave_id.'",
 "emp_id":"'.$tuid.'",
 "approved_by":"'.$reg_emp_id.'"
 
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
