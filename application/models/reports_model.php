<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Reports_model extends CI_Model {
	public function __construct() {
		parent::__construct();
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
	
	
	
	
	
		public function getemployeereports(){
			$token=$this->session->userdata['user']->token;
			if(isset($_POST['fdate']) && $_POST['fdate']!='' && isset($_POST['tdate']) && $_POST['tdate']!='')
			{ 
				if($_POST['form_date_type'] == 4){
					$fdate=date_create($_POST['fdate']);
					$tdate=date_create($_POST['tdate']);
					$f_date=date_format($fdate,"Y-m-d 00:00");
					$t_date=date_format($tdate,"Y-m-d 23:59");
				}else {
					if($_POST['form_date_type'] == 1){
						$f_date=date('Y-m-d 00:00:00', strtotime(' -1 day'));
						$t_date=date('Y-m-d 23:59:59');
					}else if($_POST['form_date_type'] == 2){
						$f_date=date('Y-m-d 00:00:00', strtotime(' -7 day'));
						$t_date=date('Y-m-d 23:59:59');
					}else if($_POST['form_date_type'] == 3){
						$f_date=date('Y-m-d 00:00:00', strtotime(' -1 Month'));
						$t_date=date('Y-m-d 23:59:59');
					}
				} 
			}
			else{
				$f_date=date('Y-m-d 00:00');
				$t_date=date('Y-m-d 23:59');
			} 
			$emp_id=$_POST['employee_id'];
			$cluster_id=$_POST['cluster_id'];
			
		
		   /* Insert Change Log history */
			$log_category="Reports Download";
			$request_params="Field man power data Download From ".$f_date.' to '.$t_date;
			$log_text=$request_params;
			$this->load->model('tasks_model');
			$this->tasks_model->insert_change_log_history($log_category,$request_params,$log_text);
		   /* Insert Change Log history */
			
			$curl = curl_init();
				curl_setopt_array($curl, array(
				CURLOPT_URL => API_MAIN_URL.'reports/fieldmanpowerdata',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"frmdt":"'.$f_date.'",
					"emp_id":"'.$emp_id.'",
					"cluster_id":"'.$cluster_id.'",
					"todt":"'.$t_date.'"
				}',
				CURLOPT_HTTPHEADER => array(
					'x-access-token:'.$token,
					'Content-Type: application/json'
				),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			return  $response;
		} 
		public function get_attendanceports(){
				
			$token=$this->session->userdata['user']->token;
			if(isset($_POST['fdate']) && $_POST['fdate']!='' && isset($_POST['tdate']) && $_POST['tdate']!='')
			{
					if($_POST['form_date_type'] == 4){
						$fdate=date_create($_POST['fdate']);
						$tdate=date_create($_POST['tdate']);
						$f_date=date_format($fdate,"Y-m-d 00:00:00");
						$t_date=date_format($tdate,"Y-m-d 23:59:59");
					}else {
						if($_POST['form_date_type'] == 1){
							$f_date=date('Y-m-d 00:00:00', strtotime(' -1 day'));
							$t_date=date('Y-m-d 23:59:59');
						}else if($_POST['form_date_type'] == 2){
							$f_date=date('Y-m-d 00:00:00', strtotime(' -7 day'));
							$t_date=date('Y-m-d 23:59:59');
						}else if($_POST['form_date_type'] == 3){
							$f_date=date('Y-m-d 00:00:00', strtotime(' -1 Month'));
							$t_date=date('Y-m-d 23:59:59');
						}
					}
			}else{
				$f_date=date('Y-m-d 00:00');
				$t_date=date('Y-m-d 23:59');
			} 
			$cluster_id=$_POST['cluster_id'];
			$emp_id=$_POST['employee_id'];
			
			
					
			   /* Insert Change Log history */
				$log_category="Reports Download";
				$request_params="Attendance Reports Download From ".$f_date.' to '.$t_date;
				$log_text=$request_params;
				$this->load->model('tasks_model');
				$this->tasks_model->insert_change_log_history($log_category,$request_params,$log_text);
			   /* Insert Change Log history */
			
			
			$curl = curl_init();
				curl_setopt_array($curl, array(
				CURLOPT_URL => API_MAIN_URL.'reports/attendancedatartr',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"frmdt":"'.$f_date.'",
					"emp_id":"'.$emp_id.'",
					"cluster_id":"'.$cluster_id.'",
					"todt":"'.$t_date.'"
				}',
				CURLOPT_HTTPHEADER => array(
					'x-access-token:'.$token,
					'Content-Type: application/json'
				),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			return  $response;
		}


		public function get_task_dump_reportdata(){
			$token=$this->session->userdata['user']->token;
			if(isset($_POST['fdate']) && $_POST['fdate']!='' && isset($_POST['tdate']) && $_POST['tdate']!='')
			{
				if($_POST['form_date_type'] == 4){
					$fdate=date_create($_POST['fdate']);
					$tdate=date_create($_POST['tdate']);
					$f_date=date_format($fdate,"Y-m-d 00:00");
					$t_date=date_format($tdate,"Y-m-d 23:59");
				}else {
					if($_POST['form_date_type'] == 1){
						$f_date=date('Y-m-d 00:00:00', strtotime(' -1 day'));
						$t_date=date('Y-m-d 23:59:59');
					}else if($_POST['form_date_type'] == 2){
						$f_date=date('Y-m-d 00:00:00', strtotime(' -7 day'));
						$t_date=date('Y-m-d 23:59:59');
					}else if($_POST['form_date_type'] == 3){
						$f_date=date('Y-m-d 00:00:00', strtotime(' -1 Month'));
						$t_date=date('Y-m-d 23:59:59');
					}
				}
			}
			else{
			$f_date=date('Y-m-d 00:00');
			$t_date=date('Y-m-d 23:59');
			} 
			$cluster_id=$_POST['cluster_id'];
			$emp_id=$_POST['employee_id'];
			
		   /* Insert Change Log history */
			$log_category="Reports Download";
			$request_params="task dump reports data Download From ".$f_date.' to '.$t_date;
			$log_text=$request_params;
			$this->load->model('tasks_model');
			$this->tasks_model->insert_change_log_history($log_category,$request_params,$log_text);
		   /* Insert Change Log history */
			
			$curl = curl_init();
				curl_setopt_array($curl, array(
				CURLOPT_URL => API_MAIN_URL.'reports/taskdumpreportdata',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
				"frmdt":"'.$f_date.'",
				"emp_id":"'.$emp_id.'",
				"cluster_id":"'.$cluster_id.'",
				"todt":"'.$t_date.'"
			}',
			CURLOPT_HTTPHEADER => array(
				'x-access-token:'.$token,
				'Content-Type: application/json'
			),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			return  $response;
		}

		public function get_task_performancereport(){
			$token=$this->session->userdata['user']->token;
			if(isset($_POST['fdate']) && $_POST['fdate']!='' && isset($_POST['tdate']) && $_POST['tdate']!='')
			{
			
						if($_POST['form_date_type'] == 4){
						$fdate=date_create($_POST['fdate']);
						$tdate=date_create($_POST['tdate']);
						$f_date=date_format($fdate,"Y-m-d 00:00");
						$t_date=date_format($tdate,"Y-m-d 23:59");
						}else {
						if($_POST['form_date_type'] == 1){
						$f_date=date('Y-m-d 00:00:00', strtotime(' -1 day'));
						$t_date=date('Y-m-d 23:59:59');
						}else if($_POST['form_date_type'] == 2){
						$f_date=date('Y-m-d 00:00:00', strtotime(' -7 day'));
						$t_date=date('Y-m-d 23:59:59');
						}else if($_POST['form_date_type'] == 3){
						$f_date=date('Y-m-d 00:00:00', strtotime(' -1 Month'));
						$t_date=date('Y-m-d 23:59:59');
						}
						}
			
			
			}
			else{
			$f_date=date('Y-m-d 00:00');
			$t_date=date('Y-m-d 23:59');
			}
			
			
			$cluster_id=$_POST['cluster_id'];
			$emp_id=$_POST['employee_id'];
			
		   /* Insert Change Log history */
			$log_category="Reports Download";
			$request_params="performance reports Download From ".$f_date.' to '.$t_date;
			$log_text=$request_params;
			$this->load->model('tasks_model');
			$this->tasks_model->insert_change_log_history($log_category,$request_params,$log_text);
		   /* Insert Change Log history */
			
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => API_MAIN_URL.'reports/performancereport',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS =>'{
			"frmdt":"'.$f_date.'",
			"cluster_id":"'.$cluster_id.'",
			"emp_id":"'.$emp_id.'",
			"todt":"'.$t_date.'"
			}',
			CURLOPT_HTTPHEADER => array(
			'x-access-token:'.$token,
			'Content-Type: application/json'
			),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			return  $response;
		}
		
		
		public function get_task_locationreport(){
			$token=$this->session->userdata['user']->token;
			if(isset($_POST['fdate']) && $_POST['fdate']!='' && isset($_POST['tdate']) && $_POST['tdate']!='')
			{
					
					if($_POST['form_date_type'] == 4){
					$fdate=date_create($_POST['fdate']);
					$tdate=date_create($_POST['tdate']);
					$f_date=date_format($fdate,"Y-m-d 00:00");
					$t_date=date_format($tdate,"Y-m-d 23:59");
					}else {
					if($_POST['form_date_type'] == 1){
					$f_date=date('Y-m-d 00:00:00', strtotime(' -1 day'));
					$t_date=date('Y-m-d 23:59:59');
					}else if($_POST['form_date_type'] == 2){
					$f_date=date('Y-m-d 00:00:00', strtotime(' -7 day'));
					$t_date=date('Y-m-d 23:59:59');
					}else if($_POST['form_date_type'] == 3){
					$f_date=date('Y-m-d 00:00:00', strtotime(' -1 Month'));
					$t_date=date('Y-m-d 23:59:59');
					}
					}
			}
			else{
			$f_date=date('Y-m-d 00:00');
			$t_date=date('Y-m-d 23:59');
			}
			
			
			$cluster_id=$_POST['cluster_id'];
			$emp_id=$_POST['employee_id'];
			
			
		   /* Insert Change Log history */
			$log_category="Reports Download";
			$request_params="task location report Download From ".$f_date.' to '.$t_date;
			$log_text=$request_params;
			$this->load->model('tasks_model');
			$this->tasks_model->insert_change_log_history($log_category,$request_params,$log_text);
		   /* Insert Change Log history */
		   
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => API_MAIN_URL.'reports/locationreport',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS =>'{
			"frmdt":"'.$f_date.'",
			"emp_id":"'.$emp_id.'",
			"cluster_id":"'.$cluster_id.'",
			"todt":"'.$t_date.'"
			}',
			CURLOPT_HTTPHEADER => array(
			'x-access-token:'.$token,
			'Content-Type: application/json'
			),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			return  $response;
		} 

		public function get_attendanceports_Pdf(){
			$token=$this->session->userdata['user']->token;
			if(isset($this->session->userdata['fdate']) && $this->session->userdata['fdate']!='' && isset($this->session->userdata['tdate']) && $this->session->userdata['tdate']!='')
			{
			
						if($this->session->userdata['form_date_type'] == 4){
						$fdate=date_create($this->session->userdata['fdate']);
						$tdate=date_create($this->session->userdata['tdate']);
						$f_date=date_format($fdate,"Y-m-d 00:00");
						$t_date=date_format($tdate,"Y-m-d 23:59");
						}else {
						if($this->session->userdata['form_date_type'] == 1){
						$f_date=date('Y-m-d 00:00:00', strtotime(' -1 day'));
						$t_date=date('Y-m-d 23:59:59');
						}else if($this->session->userdata['form_date_type'] == 2){
						$f_date=date('Y-m-d 00:00:00', strtotime(' -7 day'));
						$t_date=date('Y-m-d 23:59:59');
						}else if($this->session->userdata['form_date_type'] == 3){
						$f_date=date('Y-m-d 00:00:00', strtotime(' -1 Month'));
						$t_date=date('Y-m-d 23:59:59');
						}
						}
			
			
			}
			else{
			$f_date=date('Y-m-d 00:00');
			$t_date=date('Y-m-d 23:59');
			}
			
			
			$cluster_id=$this->session->userdata['cluster_id'];
			$emp_id=$this->session->userdata['employee_id'];
			
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => API_MAIN_URL.'reports/attendancedataPdfrtr',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS =>'{
			"frmdt":"'.$f_date.'",
			"todt":"'.$t_date.'",
			"emp_id":"'.$emp_id.'",
			"cluster_id":"'.$cluster_id.'"
			}',
			CURLOPT_HTTPHEADER => array(
			'x-access-token:'.$token,
			'Content-Type: application/json'
			),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			return  $response;
		}
		
		
		
		
		public function get_task_dump_report_pdf(){
			$token=$this->session->userdata['user']->token;
			if(isset($this->session->userdata['fdate']) && $this->session->userdata['fdate']!='' && isset($this->session->userdata['tdate']) && $this->session->userdata['tdate']!='')
			{
			
						if($this->session->userdata['form_date_type'] == 4){
						$fdate=date_create($this->session->userdata['fdate']);
						$tdate=date_create($this->session->userdata['tdate']);
						$f_date=date_format($fdate,"Y-m-d 00:00");
						$t_date=date_format($tdate,"Y-m-d 23:59");
						}else {
						if($this->session->userdata['form_date_type'] == 1){
						$f_date=date('Y-m-d 00:00:00', strtotime(' -1 day'));
						$t_date=date('Y-m-d 23:59:59');
						}else if($this->session->userdata['form_date_type'] == 2){
						$f_date=date('Y-m-d 00:00:00', strtotime(' -7 day'));
						$t_date=date('Y-m-d 23:59:59');
						}else if($this->session->userdata['form_date_type'] == 3){
						$f_date=date('Y-m-d 00:00:00', strtotime(' -1 Month'));
						$t_date=date('Y-m-d 23:59:59');
						}
						}
			
			
			}
			else{
			$f_date=date('Y-m-d 00:00');
			$t_date=date('Y-m-d 23:59');
			}
			
			
			$cluster_id=$this->session->userdata['cluster_id'];
			$emp_id=$this->session->userdata['employee_id'];
			
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => API_MAIN_URL.'reports/taskdumpreportdata',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS =>'{
			"frmdt":"'.$f_date.'",
			"todt":"'.$t_date.'",
			"emp_id":"'.$emp_id.'",
			"cluster_id":"'.$cluster_id.'"
			}',
			CURLOPT_HTTPHEADER => array(
				'x-access-token:'.$token,
				'Content-Type: application/json' 
			),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			return  $response;
		}
		
		public function get_task_performancereport_pdf(){
			$token=$this->session->userdata['user']->token;
			if(isset($this->session->userdata['fdate']) && $this->session->userdata['fdate']!='' && isset($this->session->userdata['tdate']) && $this->session->userdata['tdate']!='')
			{
			
						if($this->session->userdata['form_date_type'] == 4){
						$fdate=date_create($this->session->userdata['fdate']);
						$tdate=date_create($this->session->userdata['tdate']);
						$f_date=date_format($fdate,"Y-m-d 00:00");
						$t_date=date_format($tdate,"Y-m-d 23:59");
						}else {
						if($this->session->userdata['form_date_type'] == 1){
						$f_date=date('Y-m-d 00:00:00', strtotime(' -1 day'));
						$t_date=date('Y-m-d 23:59:59');
						}else if($this->session->userdata['form_date_type'] == 2){
						$f_date=date('Y-m-d 00:00:00', strtotime(' -7 day'));
						$t_date=date('Y-m-d 23:59:59');
						}else if($this->session->userdata['form_date_type'] == 3){
						$f_date=date('Y-m-d 00:00:00', strtotime(' -1 Month'));
						$t_date=date('Y-m-d 23:59:59');
						}
						}
			
			
			}
			else{
			$f_date=date('Y-m-d 00:00');
			$t_date=date('Y-m-d 23:59');
			}
			
			
			$cluster_id=$this->session->userdata['cluster_id'];
			$emp_id=$this->session->userdata['employee_id'];
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => API_MAIN_URL.'reports/performancereport',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS =>'{
			"frmdt":"'.$f_date.'",
			"cluster_id":"'.$cluster_id.'",
			"emp_id":"'.$emp_id.'",
			"todt":"'.$t_date.'"
			}',
			CURLOPT_HTTPHEADER => array(
			'x-access-token:'.$token,
			'Content-Type: application/json'
			),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			return  $response;
		}
		
		
		
		public function get_attendance_data_managers_Pdf(){
				
			$token=$this->session->userdata['user']->token;
			if(isset($_POST['fdate']) && $_POST['fdate']!='' && isset($_POST['tdate']) && $_POST['tdate']!='')
			{
					if($_POST['form_date_type'] == 4){
						$fdate=date_create($_POST['fdate']);
						$tdate=date_create($_POST['tdate']);
						$f_date=date_format($fdate,"Y-m-d 00:00");
						$t_date=date_format($tdate,"Y-m-d 23:59");
					}else {
						if($_POST['form_date_type'] == 1){
							$f_date=date('Y-m-d 00:00:00', strtotime(' -1 day'));
							$t_date=date('Y-m-d 23:59:59');
						}else if($_POST['form_date_type'] == 2){
							$f_date=date('Y-m-d 00:00:00', strtotime(' -7 day'));
							$t_date=date('Y-m-d 23:59:59');
						}else if($_POST['form_date_type'] == 3){
							$f_date=date('Y-m-d 00:00:00', strtotime(' -1 Month'));
							$t_date=date('Y-m-d 23:59:59');
						}
					}
			}else{
				$f_date=date('Y-m-d 00:00');
				$t_date=date('Y-m-d 23:59');
			} 
			$cluster_id=$_POST['cluster_id'];
			$emp_id=$_POST['managers_id'];
			
			
		   /* Insert Change Log history */
			$log_category="Reports Download";
			$request_params="Attendance data managers Download From ".$f_date.' to '.$t_date;
			$log_text=$request_params;
			$this->load->model('tasks_model');
			$this->tasks_model->insert_change_log_history($log_category,$request_params,$log_text);
		   /* Insert Change Log history */
			
			$curl = curl_init();
				curl_setopt_array($curl, array(
				CURLOPT_URL => API_MAIN_URL.'reports/attendancedatamanagersPdf',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"frmdt":"'.$f_date.'",
					"emp_id":"'.$emp_id.'",
					"todt":"'.$t_date.'"
				}',
				CURLOPT_HTTPHEADER => array(
					'x-access-token:'.$token,
					'Content-Type: application/json'
				),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			return  $response;
		}
}