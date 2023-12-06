<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		if($this->session->userdata['user']->emp_id!=''){
				$header_data['title']='PAN India Productivity Report';
				$this->load->view('header',$header_data);
				
				
				$data11 = array(
				'frmdate' => '',
				'todate' => ''
				);
				$this->session->unset_userdata($data11);	
				// $this->session->unset_userdata('frmdate');
				// $this->session->unset_userdata('todate');	
				
				$date = date('Y-m-d');
				$last_week_date = date( "Y-m-d", strtotime( "$date -1 day" ) );

				$data['frmdate']=$this->session->userdata('frmdate')=='' ? $last_week_date:$this->session->userdata('frmdate');
				$data['todate']=$this->session->userdata('todate')=='' ? date('Y-m-d'):$this->session->userdata('todate');


				$zones_list= json_decode($this->common_model->get_all_zones_list());
				$data['zones_list']=$zones_list->data;	


				
				
				$attendance_list= json_decode($this->Pan_India_Productivity_oneDecimal_Report_list($last_week_date,$date));
				$attendance_list=$attendance_list->data;
				$data['emplyeecnt_list']=$attendance_list->emplyeecnt;
				$data['attndcnt_list']=$attendance_list->attndcnt;
				$data['taskcnt_list']=$attendance_list->taskcnt;
				$data['avrgcnt_list']=$attendance_list->avrgcnt;

			
				$this->load->view('dashboard/dashboard',$data);
				$this->load->view('footer');
		}else{
			 redirect('Welcome');	
		}

	}
	
		
	   public function dashboard_search_filter_ajax()
		{
			$this->session->unset_userdata('frmdate');
			$this->session->unset_userdata('todate');

			$emp_id=$this->session->userdata['user']->emp_id; 
			$data['emp_id']=$emp_id; 
			$frmdate=$_POST['frmdate']; 
			$todate=$_POST['todate']; 

			$this->session->set_userdata('frmdate',$frmdate);
			$this->session->set_userdata('todate',$todate);

			$final['dashboard_ajax_div']=$data;
			echo json_encode($final);exit;	
		}	
	


		public function dashboard_attendance()
		{
			$data['emp_id']=$this->session->userdata['user']->emp_id; 
			$date = date('Y-m-d');
			$last_week_date = date( "Y-m-d", strtotime( "$date -1 day" ) );
			if(isset($_POST['frmdate']) && $_POST['frmdate']!='' && isset($_POST['todate']) && $_POST['todate']!='')
			{
			$fdate=date_create($_POST['frmdate']);
			$tdate=date_create($_POST['todate']);
			$frmdate=date_format($fdate,"Y-m-d");
			$todate=date_format($tdate,"Y-m-d");	
			}else{
			$frmdate=$last_week_date;
			$todate=$date;
			}		
			
			$data['frmdate']=$frmdate; 
			$data['todate']=$todate;  
			$final['dashboard_ajax_div']= $this->load->view('dashboard/dashboard_attendance',$data,TRUE);			
			echo json_encode($final);exit;
		}

		public function dashboard_today_summary()
		{
			$data['emp_id']=$this->session->userdata['user']->emp_id; 
			$date = date('Y-m-d');
			$last_week_date = date( "Y-m-d", strtotime( "$date -1 day" ) );

			// $frmdate=$this->session->userdata('frmdate')=='' ? $last_week_date:$this->session->userdata('frmdate');
			// $todate=$this->session->userdata('todate')=='' ? date('Y-m-d'):$this->session->userdata('todate');
			
			if(isset($_POST['frmdate']) && $_POST['frmdate']!='' && isset($_POST['todate']) && $_POST['todate']!='')
			{
			$fdate=date_create($_POST['frmdate']);
			$tdate=date_create($_POST['todate']);
			$frmdate=date_format($fdate,"Y-m-d");
			$todate=date_format($tdate,"Y-m-d");	
			}else{
				$frmdate=$last_week_date;
				$todate=$date;
			}				
			
			$data['frmdate']=$frmdate; 
			$data['todate']=$todate; 
			$final['dashboard_ajax_div']= $this->load->view('dashboard/dashboard_today_summary',$data,TRUE);			
			echo json_encode($final);exit;
		}

		public function dashboard_performance_data()
		{
			$data['emp_id']=$this->session->userdata['user']->emp_id; 
			$date = date('Y-m-d');
			$last_week_date = date( "Y-m-d", strtotime( "$date -1 day" ) );

			// $frmdate=$this->session->userdata('frmdate')=='' ? $last_week_date:$this->session->userdata('frmdate');
			// $todate=$this->session->userdata('todate')=='' ? date('Y-m-d'):$this->session->userdata('todate');
			
			if(isset($_POST['frmdate']) && $_POST['frmdate']!='' && isset($_POST['todate']) && $_POST['todate']!='')
			{
			$fdate=date_create($_POST['frmdate']);
			$tdate=date_create($_POST['todate']);
			$frmdate=date_format($fdate,"Y-m-d");
			$todate=date_format($tdate,"Y-m-d");	
			}else{
				$frmdate=$last_week_date;
				$todate=$date;
			}				
			
			$data['frmdate']=$frmdate; 
			$data['todate']=$todate; 
			$final['dashboard_ajax_div']= $this->load->view('dashboard/dashboard_performance_data',$data,TRUE);	

			$attendance_list= json_decode($this->Pan_India_Productivity_oneDecimal_Report_list($frmdate,$todate));
			$attendance_list=$attendance_list->data;
			$data['emplyeecnt_list']=$attendance_list->emplyeecnt;
			$data['attndcnt_list']=$attendance_list->attndcnt;
			$data['taskcnt_list']=$attendance_list->taskcnt;
			$data['avrgcnt_list']=$attendance_list->avrgcnt;
			
			$final['dashboard_ajax_div1']= $this->load->view('dashboard/dashboard_performance_data1',$data,TRUE);			
			echo json_encode($final);exit;
		}


		public function dashboard_api_requests_data()
		{
			$data['emp_id']=$this->session->userdata['user']->emp_id; 
			$date = date('Y-m-d');
			$last_week_date = date( "Y-m-d", strtotime( "$date -1 day" ) );

			// $frmdate=$this->session->userdata('frmdate')=='' ? $last_week_date:$this->session->userdata('frmdate');
			// $todate=$this->session->userdata('todate')=='' ? date('Y-m-d'):$this->session->userdata('todate');
			
			if(isset($_POST['frmdate']) && $_POST['frmdate']!='' && isset($_POST['todate']) && $_POST['todate']!='')
			{
			$fdate=date_create($_POST['frmdate']);
			$tdate=date_create($_POST['todate']);
			$frmdate=date_format($fdate,"Y-m-d");
			$todate=date_format($tdate,"Y-m-d");	
			}else{
				$frmdate=$last_week_date;
				$todate=$date;
			}				
			
			$data['frmdate']=$frmdate; 
			$data['todate']=$todate; 
			$final['dashboard_ajax_div']= $this->load->view('dashboard/dashboard_api_requests_data',$data,TRUE);			
			echo json_encode($final);exit;
		}


		public function pan_india_wise_employee_attendance()
		{
			$data['emp_id']=$this->session->userdata['user']->emp_id; 
			$date = date('Y-m-d');
			$last_week_date = date( "Y-m-d", strtotime( "$date -1 day" ) );

			// $frmdate=$this->session->userdata('frmdate')=='' ? $last_week_date:$this->session->userdata('frmdate');
			// $todate=$this->session->userdata('todate')=='' ? date('Y-m-d'):$this->session->userdata('todate');
			
			if(isset($_POST['frmdate']) && $_POST['frmdate']!='' && isset($_POST['todate']) && $_POST['todate']!='')
			{
			$fdate=date_create($_POST['frmdate']);
			$tdate=date_create($_POST['todate']);
			$frmdate=date_format($fdate,"Y-m-d");
			$todate=date_format($tdate,"Y-m-d");	
			}else{
				$frmdate=$last_week_date;
				$todate=$date;
			}				
			
			$data['frmdate']=$frmdate; 
			$data['todate']=$todate; 
			$final['dashboard_ajax_div']= $this->load->view('dashboard/dashboard_pan_india_wise_employee_attendance',$data,TRUE);
			echo json_encode($final);exit;
		}





		public function dashboard_active_users_reports_data()
		{
			$data['emp_id']=$this->session->userdata['user']->emp_id; 
			$date = date('Y-m-d');
			$last_week_date = date( "Y-m-d", strtotime( "$date -1 day" ) );

			// $frmdate=$this->session->userdata('frmdate')=='' ? $last_week_date:$this->session->userdata('frmdate');
			// $todate=$this->session->userdata('todate')=='' ? date('Y-m-d'):$this->session->userdata('todate');
			
			if(isset($_POST['frmdate']) && $_POST['frmdate']!='' && isset($_POST['todate']) && $_POST['todate']!='')
			{
			$fdate=date_create($_POST['frmdate']);
			$tdate=date_create($_POST['todate']);
			$frmdate=date_format($fdate,"Y-m-d");
			$todate=date_format($tdate,"Y-m-d");	
			}else{
				$frmdate=$last_week_date;
				$todate=$date;
			}				
			
			$data['frmdate']=$frmdate; 
			$data['todate']=$todate; 
			$final['dashboard_ajax_div']= $this->load->view('dashboard/dashboard_active_users_reports_data',$data,TRUE);			
			echo json_encode($final);exit;
		}


		
	 public function employee_wise_productivity_report()
		{
			$data['emp_id']=$this->session->userdata['user']->emp_id; 
			$date = date('Y-m-d');
			$last_week_date = date( "Y-m-d", strtotime( "$date -1 day" ) );

			// $frmdate=$this->session->userdata('frmdate')=='' ? $last_week_date:$this->session->userdata('frmdate');
			// $todate=$this->session->userdata('todate')=='' ? date('Y-m-d'):$this->session->userdata('todate');
			
			if(isset($_POST['frmdate']) && $_POST['frmdate']!='' && isset($_POST['todate']) && $_POST['todate']!='')
			{
			$fdate=date_create($_POST['frmdate']);
			$tdate=date_create($_POST['todate']);
			$frmdate=date_format($fdate,"Y-m-d");
			$todate=date_format($tdate,"Y-m-d");	
			}else{
				$frmdate=$last_week_date;
				$todate=$date;
			}				
			
			$data['frmdate']=$frmdate; 
			$data['todate']=$todate; 

			$emp_wise_productivity_list= json_decode($this->employee_wise_productivity_report_list($frmdate,$todate));
			$data['emp_wise_productivity_list'] = $emp_wise_productivity_list->data;

			
			$final['dashboard_ajax_div']= $this->load->view('dashboard/dashboard_employee_wise_productivity_report',$data,TRUE);
			$final['title']='employee_wise_productivity_report';		
			echo json_encode($final);exit;
		}



	public function getclusters_by_state_id(){
	
	       $clusters_list= json_decode($this->common_model->getclusters_by_state_id());
			$data_clusters_list=$clusters_list->data;


			if(count($data_clusters_list)>0){
			$opt='<option value="">-Select-</option>';		

			foreach($data_clusters_list as $v){ 
			$opt.='<option value="'.$v->cluster_id.'">'.$v->cluster_name.'</option>';
			}
			}else{
			$opt='<option value="">--No data--</option>';		

			}
			echo $opt;exit;

	}
	
	
	
	
	

		public function logout()
	{ 
		$test=$this->session->userdata['user'];
			$inrs_results = json_decode($this->emp_logout_ap());
			if($inrs_results->status==200)
			{
				$this->session->unset_userdata('user');
				$this->session->unset_userdata('token');
				
			$this->session->unset_userdata('f_fromDate');
			$this->session->unset_userdata('f_toDate');
				
				$this->session->set_flashdata('success', 'Logout Successfull...');
				redirect('Welcome'); 
			}
			else
			{
			$this->session->set_flashdata('error', 'Not Updated...');
				redirect('Welcome'); 
			}
		
        redirect('Welcome');
	}
	

	public function emp_logout_ap(){
		$token=$this->session->userdata['user']->token;
		$emp_id=$this->session->userdata['user']->emp_id;
				$curl = curl_init(); 
				// "comp_status":1,
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'logout',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'PUT',
				CURLOPT_POSTFIELDS =>'{
					"logout_location":"",
					"logout_remarks":"emp web logout",
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
		
		
	
	
	public function dashboard_new()
	{
		$data['emp_id']=$this->session->userdata['user']->emp_id; 
			$date = date('Y-m-d');
			$last_week_date = date( "Y-m-d", strtotime( "$date -7 day" ) );

		$frmdate=$this->session->userdata('frmdate')=='' ? $last_week_date:$this->session->userdata('frmdate');
		$todate=$this->session->userdata('todate')=='' ? date('Y-m-d'):$this->session->userdata('todate');


		$attendance_present_fst_grid= json_decode($this->common_model->get_all_attendance_present_fst_grid($frmdate,$todate));
		$data['attendance_present_fst_grid']=$attendance_present_fst_grid->data[0];	

		
		$attendance_emplyee_prcsnt_2nd_grid= json_decode($this->common_model->get_all_attendance_emplyee_prcsnt_2nd_grid($frmdate,$todate));
		$data['attendance_emplyee_prcsnt_2nd_grid']=$attendance_emplyee_prcsnt_2nd_grid->data[0];	




		$atndnc_Chrt_engreg_prcsnt_3rd_grid= json_decode($this->common_model->get_all_atndnc_Chrt_engreg_prcsnt_3rd_grid($frmdate,$todate));
		$data['atndnc_Chrt_engreg_prcsnt_3rd_grid']=$atndnc_Chrt_engreg_prcsnt_3rd_grid->data;	




		$all_atndnce_Vndrprcsnt_4th_grid= json_decode($this->common_model->get_all_atndnce_Vndrprcsnt_4th_grid($frmdate,$todate));
		$data['all_atndnce_Vndrprcsnt_4th_grid']=$all_atndnce_Vndrprcsnt_4th_grid->data;	


		$utliz_tnsmry_5th_grid= json_decode($this->common_model->get_all_utliz_tnsmry_5th_grid($frmdate,$todate));
		$data['utliz_tnsmry_5th_grid']=$utliz_tnsmry_5th_grid->data;	




		$utliztn_Clstrsmry_6th_grid= json_decode($this->common_model->get_all_utliztn_Clstrsmry_6th_grid($frmdate,$todate));
		$data['utliztn_Clstrsmry_6th_grid']=$utliztn_Clstrsmry_6th_grid->data;	




		$not_utlizd_membr_7th_grid= json_decode($this->common_model->get_all_not_utlizd_membr_7th_grid($frmdate,$todate));
		$data['not_utlizd_membr_7th_grid']=$not_utlizd_membr_7th_grid->data;	


		$utilz_tn_taskcnt_8th_grid= json_decode($this->common_model->get_all_utilz_tn_taskcnt_8th_grid($frmdate,$todate));
		$data['utilz_tn_taskcnt_8th_grid']=$utilz_tn_taskcnt_8th_grid->data;	


		$tasks_ts_rprt_9th_grid= json_decode($this->common_model->get_all_tasks_ts_rprt_9th_grid($frmdate,$todate));
		$data['tasks_ts_rprt_9th_grid']=$tasks_ts_rprt_9th_grid->data[0];	


		$tasks_ts_Grprprt_10th_grid= json_decode($this->common_model->get_all_tasks_ts_Grprprt_10th_grid($frmdate,$todate));
		$data['tasks_ts_Grprprt_10th_grid']=$tasks_ts_Grprprt_10th_grid->data;	



	// echo '<pre>';print_r($tasks_ts_Grprprt_10th_grid);



		$this->load->view('dashboard/dashboard_new_ajax',$data);
	}
	
public function managerpunchin(){
	
$managerpunchin= json_decode($this->manager_punchin());		
				if($managerpunchin->status==200)
				{
                    $data['status'] =1;
					$data['msg'] = 'Punchin Successfully..';				
				}
				else{
                  $data['status'] =0;
					$data['msg'] = 'Not Success..';				
					}
echo json_encode($data);					
	
}
public function manager_punchin(){
		$token=$this->session->userdata['user']->token;
$emp_id=$_POST['emp_id'];
$emp_username=$_POST['emp_username'];
		$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => API_MAIN_URL.'attendence/punchinweb',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
  "emp_id": "'.$emp_id.'",
  "username": "'.$emp_username.'"
  
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
		
		
		public function managerpunchout(){
		
	$managerpunchout= json_decode($this->manager_punchout());		
					if($managerpunchout->status==200)
					{
						$data['status'] =1;
						$data['msg'] = 'Punch Out Successfully..';				
					}
					else{
					  $data['status'] =0;
						$data['msg'] = 'Not Success..';				
						}
	echo json_encode($data);					
			
		}
	public function manager_punchout(){
			$token=$this->session->userdata['user']->token;
	$emp_id=$_POST['empid'];
	$emp_username=$_POST['empusername'];
			$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => API_MAIN_URL.'attendence/punchoutweb',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS =>'{
	  "emp_id": "'.$emp_id.'",
	  "username": "'.$emp_username.'"
	  
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
		
	public function mangerpunchinstatus(){
	$managerpunchin= json_decode($this->mangerpunchin_status());		
		$data11=$managerpunchin->data;	
		
			$final= $data11[0]->punch_status;
				
				
				echo json_encode($final);exit;	


	}


		
		public function mangerpunchin_status(){
	$token=$this->session->userdata['user']->token;

		$emp_id=$_POST['man_id'];	
			
		$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL =>  API_MAIN_URL.'attendence/punchinbasedonstatuslist',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS =>'{

	  "emp_id": "'.$emp_id.'"
	  
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
		
		
			
			
		
		
		
		
		
		
		public function change_password()
	{
		if($this->session->userdata['user']->emp_id!=''){
			$emp_id=$this->session->userdata['user']->emp_id;
				$this->load->view('header');
				$data="";
				if(isset($_POST['submit']) && $_POST['submit']!='')
				{
					
					
						if(trim($_POST['new_pwd']) == trim($_POST['conf_pwd'])){
							
						
						$employee= json_decode($this->get_single_employee_data($emp_id));
						$employee_record=$employee->data[0];
						

						
						if(trim($employee_record->emp_password)== md5(trim($_POST['cus_pwd']))){
						
							$inrs_results = json_decode($this->update_change_password_api());
							if($inrs_results->status==200)
							{
							$this->session->set_flashdata('success', 'Changed Successfully...');
							redirect('Dashboard/change_password'); 
							}
							else
							{
								$this->session->set_flashdata('error', 'Not Updated...');
								redirect('Dashboard/change_password'); 
							}
						
						}else{
							$this->session->set_flashdata('error', 'Please Check current Password is wrong..');
							redirect('Dashboard/change_password'); 
						}

						
						}else{
							$this->session->set_flashdata('error', 'New Password and Confirm Password should be same..');
							redirect('Dashboard/change_password'); 
						}
						
				}
				$this->load->view('dashboard/change_password',$data);
				$this->load->view('footer');
		}else{
			 redirect('Welcome');	
		}

	}
		
		
	
	public function update_change_password_api(){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];

		$emp_id=$this->session->userdata['user']->emp_id;

		$new_pwd=trim($_POST['new_pwd']);
		$cus_pwd=trim($_POST['cus_pwd']);
		$conf_pwd=trim($_POST['conf_pwd']);
		
		
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'change_password',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
		"nw_pswrd":"'.$new_pwd.'",
		"cur_pwd":"'.$cus_pwd.'",
		"conf_pwd":"'.$conf_pwd.'",
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
	
	
	
	
		public function Pan_India_Productivity_oneDecimal_Report_list($frmdate,$todate){
		
		
		
			$data['emp_id']=$this->session->userdata['user']->emp_id; 
			$date = date('Y-m-d');
			
		

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => 'sify.digitalrupay.com/livekibanaapirt1/sify/dashboard/PanIndiaProductivityoneDecimalReport',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
			  CURLOPT_POSTFIELDS =>'{
				"frmdate":"'.$frmdate.'",
				"todate":"'.$todate.'"
			}',
			  CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json',
				'Cookie: 69Atu22GZTSyDGW4sf4mMJdJ42436gAs=s%3AyDy1soFU0ouyMtRwIEf4-Uo9ob_fMnmS.mZwRCk9odfCAvR5VI0fCmJE7zkCwpkAqoWuMVhA8IOI'
			  ),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			return $response;

		
		
		}
		
		
	
		public function employee_wise_productivity_report_list($frmdate,$todate){
		
		
		
			$data['emp_id']=$this->session->userdata['user']->emp_id; 
			$date = date('Y-m-d');
			
		

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => 'sify.digitalrupay.com/livekibanaapirt1/sify/dashboard/emplyeeWiseProductivityData',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
			  CURLOPT_POSTFIELDS =>'{
				"frmdate":"'.$frmdate.'",
				"todate":"'.$todate.'"
			}',
			  CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json',
				'Cookie: 69Atu22GZTSyDGW4sf4mMJdJ42436gAs=s%3AyDy1soFU0ouyMtRwIEf4-Uo9ob_fMnmS.mZwRCk9odfCAvR5VI0fCmJE7zkCwpkAqoWuMVhA8IOI'
			  ),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			return $response;

		
		
		}
		
		
		
		
		
		
		
		public function pan_india_productivity_download_reports($frmdate,$todate){ 
					$attendance_data_managers= json_decode($this->Pan_India_Productivity_oneDecimal_Report_list($frmdate,$todate));
				$attendance_list=$attendance_data_managers->data;
				$emplyeecnt_list=$attendance_list->emplyeecnt;
				$attndcnt_list=$attendance_list->attndcnt;
				$taskcnt_list=$attendance_list->taskcnt;
				$avrgcnt_list=$attendance_list->avrgcnt;
 
				 
					$fname='sify_pan_india_productivity_reports_'.date('Y_m_d_H_i_s').'.csv';
					header('Content-Type: text/csv; charset=utf-8');  
					header('Content-Disposition: attachment; filename='.$fname.'');  
					$output = fopen("php://output", "w");  
					fputcsv($output, array('Zones','Circle','Total Manpower','T1 Manpower','T2 Manpower','T3 Manpower','T4 Manpower','Total PresentMan Days','T1 PresentMan Days','T2 PresentMan Days','T3 PresentMan Days','T4 PresentMan Days','Total Tasks Completed','T1 Tasks Completed','T2 Tasks Completed','T3 Tasks Completed','T4 Tasks Completed','Total Avg Task/Day','T1 Avg Task/Day','T2 Avg Task/Day','T3 Avg Task/Day','T4 Avg Task/Day'));  
					$fields=array();
					if(!empty($emplyeecnt_list))
					{
					foreach($emplyeecnt_list as $key=>$row)  
					{				
					$sno=$key+1; 
					
					
					$fields=array(
					//'sno'=>$sno,
					'Zones'=>$row->zone_name,
					'Circle'=>$row->state_name,
					'Total_Manpower'=>$row->total_emplyee,
					'T1_Manpower'=>$row->T1_emplyee_count,
					'T2_Manpower'=>$row->T2_emplyee_count,
					'T3_Manpower'=>$row->T3_emplyee_count, 
					'T4_Manpower'=>$row->T4_emplyee_count,
					'Total_PresentMan_Days'=>$attndcnt_list[$key]->total_attnd,
					'T1_PresentMan_Days'=>$attndcnt_list[$key]->T1_attnd_count,
					'T2_PresentMan_Days'=>$attndcnt_list[$key]->T2_attnd_count,
					'T3_PresentMan_Days'=>$attndcnt_list[$key]->T3_attnd_count,
					'T4_PresentMan_Days'=>$attndcnt_list[$key]->T4_attnd_count,
					'Total_Tasks_Completed'=>$taskcnt_list[$key]->total_task,
					'T1_Tasks_Completed'=>$taskcnt_list[$key]->T1_task_count,
					'T2_Tasks_Completed'=>$taskcnt_list[$key]->T2_task_count,
					'T3_Tasks_Completed'=>$taskcnt_list[$key]->T3_task_count,
					'T4_Tasks_Completed'=>$taskcnt_list[$key]->T4_task_count,
					'Total_Avg_Task_Day'=>$avrgcnt_list[$key]->total_AVGTASK_per_DAY,
					'T1_Avg_Task_Day'=>$avrgcnt_list[$key]->T1_AVGTASK_per_DAY_count,
					'T2_Avg_Task_Day'=>$avrgcnt_list[$key]->T2_AVGTASK_per_DAY_count,
					'T3_Avg_Task_Day'=>$avrgcnt_list[$key]->T3_AVGTASK_per_DAY_count,
					'T4_Avg_Task_Day'=>$avrgcnt_list[$key]->T4_AVGTASK_per_DAY_count
					);
					fputcsv($output, $fields);  							
					}  
					} 		
					fclose($output); 
				}
		
		
		
		
		public function employee_wise_productivity_reports_download($frmdate,$todate){ 
					
				$emp_wise_productivity_list= json_decode($this->employee_wise_productivity_report_list($frmdate,$todate));
				$emp_wise_productivity_list= $emp_wise_productivity_list->data;
 
				 
					$fname='sify_employee_wise_productivity_reports_'.date('Y_m_d_H_i_s').'.csv';
					header('Content-Type: text/csv; charset=utf-8');  
					header('Content-Disposition: attachment; filename='.$fname.'');  
					$output = fopen("php://output", "w");  
					fputcsv($output, array('Employee Name','Employee Code','FSM Group','Circle','Region','Task Completed','Present Days','Productivity'));  
					$fields=array();
					if(!empty($emp_wise_productivity_list))
					{
						
						$combined_data = [];	
						foreach ($emp_wise_productivity_list->emplyeecnt as $employee) {
						$emp_id = $employee->emp_id;

						// Initialize the combined data for this emp_id
						$combined_data[$emp_id] = [
						'employee' => $employee,
						'attndcnt' => null,
						'taskcnt' => null,
						'avrgcnt' => null,
						];
						}


						foreach ($emp_wise_productivity_list->attndcnt as $attndcnt) {
						$emp_id = $attndcnt->emp_id;
						if (isset($combined_data[$emp_id])) {
						$combined_data[$emp_id]['attndcnt'] = $attndcnt;
						}
						}

						foreach ($emp_wise_productivity_list->taskcnt as $taskcnt) {
						$emp_id = $taskcnt->emp_id;
						if (isset($combined_data[$emp_id])) {
						$combined_data[$emp_id]['taskcnt'] = $taskcnt;
						}
						}

						foreach ($emp_wise_productivity_list->avrgcnt as $avrgcnt) {
						$emp_id = $avrgcnt->emp_id;
						if (isset($combined_data[$emp_id])) {
						$combined_data[$emp_id]['avrgcnt'] = $avrgcnt;
						}
						}
						
					foreach ($combined_data as $emp_id => $data) {
					$employee = $data['employee'];
					$attndcnt = $data['attndcnt'];
					$taskcnt = $data['taskcnt'];
					$avrgcnt = $data['avrgcnt'];				
					$sno=$key+1; 
					
					
					$fields=array(
					//'sno'=>$sno,
					'Employee Name'=>$employee->emp_name,
					'Employee Code'=>$employee->emp_code,
					'FSM Group'=>$employee->cluster_name,
					'Circle'=>$employee->zone_name,
					'Region'=>$employee->state_name,
					'Task Completed'=>$taskcnt->total_task,
					'Present Days'=>$attndcnt->total_attnd,
					'Productivity'=>$avrgcnt->total_AVGTASK_per_DAY
					);
					fputcsv($output, $fields);  							
					}  
					} 		
					fclose($output); 
				}
		
		
		
		
		
}
