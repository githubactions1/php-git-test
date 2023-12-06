<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitor extends CI_Controller {

	function __construct() { 
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session'); 
		$this->load->model('common_model');
		$this->load->model('tasks_model');
	}
	 
	public function index()
	{
		if($this->session->userdata['user']->emp_id!=''){
			$this->load->view('header');
			$data['moitorlist']=array();		
			$this->load->view('monitor/monitor',$data);
			$this->load->view('footer');
			}else{
			redirect('Welcome');	
			}
	}
	
		public function monitor_ajax()
		{

			
			$moitor_list= json_decode($this->get_monitor_details());
			if($moitor_list->status==200)
			{
			$data['moitorlist']=$moitor_list->data;
			}
			else
			{
			$data['moitorlist']=array();		

			}
			$emp_id_login=$this->session->userdata['user']->emp_id;	
			$task_category_id=0;
			$task_status_list= json_decode($this->tasks_model->get_tasks_status_tabs_count_list($emp_id_login,$task_category_id));
			$data['task_status_tabs_cpount']=$task_status_list->data[0];
			
			$final['dashboard_ajax_div']= $this->load->view('monitor/monitor_ajax',$data,TRUE);			
			echo json_encode($final);exit;
		}
	
	
			
		public function get_monitor_details(){
			
			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
			$curl = curl_init(); 
			curl_setopt_array($curl, array(
			CURLOPT_URL => API_MAIN_URL.'gps/gettotalemplyeegps',
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
	
	
	
		public function monitor_view($emp_id)
		{
			if($this->session->userdata['user']->emp_id!=''){
			$frmdate=date('Y-m-d', strtotime("-1 day"));
			$todate=date('Y-m-d');
			if(!empty($_POST['frmdate'])){
				$frmdate=$_POST['frmdate'];
			}
			if(!empty($_POST['todate'])){
				$todate=$_POST['todate'];
			}
			// $moitor_details= json_decode($this->get_monitor_details_view($emp_id));	
			// $data['moitordetails']=$moitor_details->data;

			$moitoremp_details= json_decode($this->get_emp_monitor_details_view($emp_id,$frmdate,$todate));	
			$data['moitorempdetails']=$moitoremp_details->data;
			$data['emp_id']=$emp_id;
			$data['frmdate']=$frmdate;
			$data['todate']=$todate;
			$this->load->view('header');
			
			
			$emp_id_login=$this->session->userdata['user']->emp_id;	
			$task_category_id=0;
			$task_status_list= json_decode($this->tasks_model->get_tasks_status_tabs_count_list($emp_id_login,$task_category_id));
			$data['task_status_tabs_cpount']=$task_status_list->data[0];
			
				
			$emplyee_gps_tasks= json_decode($this->get_total_emplyee_gps_tasks($emp_id));	
			$data['emplyee_gps_tasks']=$emplyee_gps_tasks->data;
			
			
			$this->load->view('monitor/monitor_new',$data);
			$this->load->view('footer');
			
			}else{
			redirect('Welcome');	
			}
		}
	
	
	
	
	
	
	
	
	
		public function get_monitor_details_view($emp_id){
		 $emp_id=$this->uri->segment(3);
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'gps/getmonitordatalist',
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
		'Content-Type: application/json'
		),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return $response;
		}
		
		
		public function get_emp_monitor_details_view($emp_id,$frmdate,$todate){
			$emp_id=$this->uri->segment(3);	
			$curl = curl_init();

			$frmdate=date('Y-m-d',strtotime($frmdate));
			$todate=date('Y-m-d', strtotime($todate));

			curl_setopt_array($curl, array(
				CURLOPT_URL => API_MAIN_URL.'gps/getemployeedatalist',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
			  CURLOPT_POSTFIELDS =>'{
				"emp_id":"'.$emp_id.'",
				"frmdate":"'.$frmdate.'",
				"todate":"'.$todate.'"

			}',
			  CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json'
			  ),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			return $response;
				
		}



		public function get_monitor_tasks_list_ajax()
		{
			
			$emp_id = $this->input->post('emp_id');
				
			$emplyee_gps_tasks= json_decode($this->get_total_emplyee_gps_tasks($emp_id));	
			$data['emplyee_gps_tasks']=$emplyee_gps_tasks->data;
			$emp_id_login=$this->session->userdata['user']->emp_id;	
			$task_category_id=0;
			$task_status_list= json_decode($this->tasks_model->get_tasks_status_tabs_count_list($emp_id_login,$task_category_id));
			$data['task_status_tabs_cpount']=$task_status_list->data[0];


			$final['monitor_tasks_list_ajax_div']= $this->load->view('monitor/monitor_tasks_list_ajax',$data,TRUE);
			$final['monitor_status_list_ajax_div']= $this->load->view('monitor/monitor_status_counts_ajax',$data,TRUE);
			echo json_encode($final);exit;			
			
		}
	


		
		
	
	public function get_total_emplyee_gps_tasks($emp_id){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
				// "sub_cat_status":1,
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'gps/gettotalemplyeegpstasks',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"call_attend_by":"'.$emp_id.'"
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
	
	
	
	
	
		public function monitor_demo($emp_id)
		{
			if($this->session->userdata['user']->emp_id!=''){
			$frmdate=date('Y-m-d', strtotime("-1 day"));
			$todate=date('Y-m-d');
			if(!empty($_POST['frmdate'])){
				$frmdate=$_POST['frmdate'];
			}
			if(!empty($_POST['todate'])){
				$todate=$_POST['todate'];
			}
			// $moitor_details= json_decode($this->get_monitor_details_view($emp_id));	
			// $data['moitordetails']=$moitor_details->data;

			$moitoremp_details= json_decode($this->get_emp_monitor_details_view($emp_id,$frmdate,$todate));	
			$data['moitorempdetails']=$moitoremp_details->data;
			$data['emp_id']=$emp_id;
			$data['frmdate']=$frmdate;
			$data['todate']=$todate;
			$this->load->view('header');
			
			
			$emp_id_login=$this->session->userdata['user']->emp_id;	
			$task_category_id=0;
			$task_status_list= json_decode($this->tasks_model->get_tasks_status_tabs_count_list($emp_id_login,$task_category_id));
			$data['task_status_tabs_cpount']=$task_status_list->data[0];
			
				
			$emplyee_gps_tasks= json_decode($this->get_total_emplyee_gps_tasks($emp_id));	
			$data['emplyee_gps_tasks']=$emplyee_gps_tasks->data;
			
			
			$this->load->view('monitor/monitor_demo',$data);
			$this->load->view('footer');
			
			}else{
			redirect('Welcome');	
			}
		}
	
	
	
	
	
	
	
}

