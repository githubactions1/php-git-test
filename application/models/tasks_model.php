<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Tasks_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	
	public function get_all_sub_list_with_count($cat_id,$column_name){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
				// "sub_cat_status":1, 
					
				if(isset($_POST['from_date']) && $_POST['from_date']!='' && isset($_POST['to_date']) && $_POST['to_date']!='')
				{
				$fromDate=$_POST['from_date'];
				$toDate=$_POST['to_date'];
				
						
				$fromDate=date('Y-m-d 00:00:00',strtotime($fromDate));
				$toDate=date('Y-m-d 23:59:59',strtotime($toDate));
				}else{
					
				$fromDate=date('Y-m-d 00:00');
				$toDate=date('Y-m-d 23:59');
					
				}
				
				$fromDate=$this->session->userdata('f_fromDate')=='' ? $fromDate:$this->session->userdata('f_fromDate');	
				$toDate=$this->session->userdata('f_toDate')=='' ? $toDate:$this->session->userdata('f_toDate');	
					 
				
				$search_like=(isset($_POST['search_like']))? trim($_POST['search_like']) : "";
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'categories/gettasksubcategoriescount',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"cat_id":"'.$cat_id.'",
					"column_name":"'.$column_name.'",
					"fromDate":"'.$fromDate.'",
					"search_like":"'.$search_like.'",
					"toDate":"'.$toDate.'"
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
	
	
	public function get_all_employees_list(){
			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		
				$curl = curl_init(); 
			  curl_setopt_array($curl, array(
			  //CURLOPT_URL => API_MAIN_URL.'employees/getemployee',
			  CURLOPT_URL => API_MAIN_URL.'task/getemployeesspecifictomanager',
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
	
	public function get_task_list($emp_id,$task_category_id,$task_status){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
			$search_like=(isset($_POST['search_like']))? trim($_POST['search_like']) : "";
			// if(!empty($search_like)){
				// $task_category_id=0;
				// $task_status=0;
			// }
			
				if(isset($_POST['from_date']) && $_POST['from_date']!='' && isset($_POST['to_date']) && $_POST['to_date']!='')
				{
				$fromDate=$_POST['from_date'];
				$toDate=$_POST['to_date'];
				
						
				$fromDate=date('Y-m-d 00:00:00',strtotime($fromDate));
				$toDate=date('Y-m-d 23:59:59',strtotime($toDate));
				}else{
					
				$fromDate=date('Y-m-d 00:00');
				$toDate=date('Y-m-d 23:59');
					
				}
			
					
			$fromDate=date('Y-m-d 00:00:00',strtotime($fromDate));
			$toDate=date('Y-m-d 23:59:59',strtotime($toDate));
		
			$fromDate=$this->session->userdata('f_fromDate')=='' ? $fromDate:$this->session->userdata('f_fromDate');	
			$toDate=$this->session->userdata('f_toDate')=='' ? $toDate:$this->session->userdata('f_toDate');	


			// $fromDate1=$_POST['from_date'];
			// $toDate1=$_POST['to_date'];
			// $this->session->unset_userdata('f_fromDate');
			// $this->session->unset_userdata('f_toDate');

			// $fromDate=date('Y-m-d 00:00:00',strtotime($fromDate1));
			// $toDate=date('Y-m-d 23:59:59',strtotime($toDate1));

			// $this->session->set_userdata('f_fromDate',$fromDate);
			// $this->session->set_userdata('f_toDate',$toDate);


				$curl = curl_init(); 
				// "sub_cat_status":1,
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'task/gettaskbystatusandctgry',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"emp_id":"'.$emp_id.'",
					"task_category":"'.$task_category_id.'",
					"search_like":"'.$search_like.'",
					"fromDate":"'.$fromDate.'",
					"toDate":"'.$toDate.'",
					"task_status":"'.$task_status.'"
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
	public function get_task_list_filters($emp_id,$task_category_id,$task_status){
		
		
		
		$fromDate1=$_POST['from_date'];
		$toDate1=$_POST['to_date'];
		
		// $this->session->unset_userdata('f_fromDate');
		// $this->session->unset_userdata('f_toDate');
		
			$data11 = array(
			'f_fromDate' => '',
			'f_toDate' => ''
			);
			$this->session->unset_userdata($data11);
					


		$fromDate=date('Y-m-d 00:00:00',strtotime($fromDate1));
		$toDate=date('Y-m-d 23:59:59',strtotime($toDate1));

		// $this->session->set_userdata('f_fromDate',$fromDate);
		// $this->session->set_userdata('f_toDate',$toDate);

		$data11_set = array(
		'f_fromDate' =>$fromDate,
		'f_toDate' =>$toDate
		);
		$this->session->set_userdata($data11_set);



	echo '<pre>';print_r($_POST);exit;
		$order_by=$_POST['order_by'];
		$task_priority=$_POST['task_priority'];
		$cluster_id=$_POST['cluster_id'];
		$column_name=$_POST['column_name'];
		$call_attend_by=$_POST['call_attend_by'];

		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
				// "sub_cat_status":1,
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'task/gettaskfilter',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"emp_id":"'.$emp_id.'",
					"task_category":"'.$task_category_id.'",
					"fromDate":"'.$fromDate.'",
					"toDate":"'.$toDate.'",
					"order_by":"'.$order_by.'",
					"cluster_id":"'.$cluster_id.'",
					"task_priority":"'.$task_priority.'",
					"column_name":"'.$column_name.'",
					"call_attend_by":"'.$call_attend_by.'",
					"task_status":"'.$task_status.'"
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
	
	
	public function get_all_users_list(){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
				
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'circuits/getcircuitsbyuserstatus',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"user_status":1
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
	
	
	
	public function inserttask_details(){
		
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		$emp_id=$this->session->userdata['user']->emp_id;
		
		$task_status=218;
		$circuit_id=$_POST['circuit_id'];
		$call_attend_by=$_POST['call_attend_by'];
		$call_type=$_POST['call_type'];
		$task_category=$_POST['task_category'];
		$task_type=$_POST['task_type'];
		$task_other_issue=$_POST['task_other_issue'];
		$task_priority=$_POST['task_priority'];
		$task_owner=$_POST['task_owner'];
		$task_message=$_POST['task_message'];

		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'task/inserttask',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
				"task_status":"'.$task_status.'",
				"circuit_id":"'.$circuit_id.'",
				"call_attend_by":"'.$call_attend_by.'",
				"call_type":"'.$call_type.'",
				"task_category":"'.$task_category.'",
				"task_type":"'.$task_type.'",
				"task_other_issue":"'.$task_other_issue.'",
				"task_priority":"'.$task_priority.'",
				"task_owner":"'.$task_owner.'",
				"task_message":"'.$task_message.'",
				"remarks":"'.$task_message.'",
				"emp_id":"'.$emp_id.'",
				"emp_department_id":"4",
				"task_latitude": "17.4376",
				"task_longitude": "78.4766"
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
	
	
	public function get_task_details($task_id){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
				
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'task/gettasklogsdetailsweb',
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

	
	public function get_complaint_categories($task_category){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
				
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'task/getcomplientsbymaincatid',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"main_cat_id":"'.$task_category.'"
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
	
	
	
	
	
	public function assign_task_submit(){
		
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		$emp_id=$this->session->userdata['user']->emp_id;
		
		$task_id=$_POST['task_id'];
		$call_attend_by_old=$_POST['call_attend_by_old'];
		$call_attend_by_primary=$_POST['call_attend_by_primary'];
		$call_attend_by_primary_old=$_POST['call_attend_by_primary_old'];
		$mngr=$_POST['mngr'];
		if(!empty($call_attend_by_primary_old)){
			if($call_attend_by_primary == $call_attend_by_primary_old){
				$call_attend_by_primary='';
			}
		}
		
		$call_attend_by=implode(',',$_POST['call_attend_by']);
		
			$a1=explode(',',$_POST['call_attend_by_old']);
			$a2=$_POST['call_attend_by'];
			$a11=count($a1);	
			$a22=count($a2);
			$call_attend_by_added='';
			$call_attend_by_deleted='';

				
			$call_attend_by_added1=array_diff($a2,$a1);
							
				if(!empty($call_attend_by_added1)){
					$call_attend_by_added=implode(',',$call_attend_by_added1);
				}
		
		
			$call_attend_by_deleted1=array_diff($a1,$a2);
						if(!empty($call_attend_by_deleted1)){
					$call_attend_by_deleted=implode(',',$call_attend_by_deleted1);
				}
				
			
	// echo 'New';print_r($call_attend_by);
	// echo 'Old';print_r($call_attend_by_old);
	// echo 'Added';print_r($call_attend_by_added);
	// echo 'Dele';print_r($call_attend_by_deleted);
	
	// exit;

		
		$task_appointment_date=date('Y-m-d H:i:s',strtotime($_POST['task_appointment_date']));

		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'task/inserttaskcallattendedby',
		CURLOPT_RETURNTRANSFER => true, 
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
			"task_id":"'.$task_id.'",
			"call_attend_by":"'.$call_attend_by.'",
			"call_attend_by_old":"'.$call_attend_by_old.'",
			"call_attend_by_added":"'.$call_attend_by_added.'",
			"call_attend_by_deleted":"'.$call_attend_by_deleted.'",
			"call_attend_by_primary":"'.$call_attend_by_primary.'",
			"call_attend_by_primary_old":"'.$call_attend_by_primary_old.'",
			"mngr":"'.$mngr.'",
			"task_appointment_date":"'.$task_appointment_date.'"
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
	
	
	
	public function insert_task_section_details(){
		
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		$emp_id=$this->session->userdata['user']->emp_id;
		
		$task_id=$_POST['task_id'];
		$section_name=$_POST['section_name'];
		$section_col_name='Coloumn Name';;

		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'tasksections/inserttasksections',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
			"task_id":"'.$task_id.'",
			"emp_id":"'.$emp_id.'",
			"section_col_name":"'.$section_col_name.'",
			"section_name":"'.$section_name.'"
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
	
	
	
	public function get_single_section_data($section_id){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
				
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'tasksections/getbyidtasksections',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"section_id":"'.$section_id.'"
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
	
	
	
	public function update_task_section_details(){
		
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		$emp_id=$this->session->userdata['user']->emp_id;
		
		$task_id=$_POST['task_id'];
		$section_name=$_POST['section_name'];
		$section_id=$_POST['section_id'];

		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'tasksections/updatetasksections',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
			"task_id":"'.$task_id.'",
			"emp_id":"'.$emp_id.'",
			"section_id":"'.$section_id.'",
			"status":1,
			"section_name":"'.$section_name.'"
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
	
	
	
	public function get_single_task_details($task_id){
			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
				curl_setopt_array($curl, array(
				CURLOPT_URL => API_MAIN_URL.'task/gettaskby/'.$task_id,
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
	
	
	
	
	public function get_single_section_cols_data($task_section_col_id){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
				
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'tasksections/getbytasksectionscols',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"task_section_col_id":"'.$task_section_col_id.'"
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
	
	
	
	
	
	public function update_task_section_cols_details(){
		
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		$emp_id=$this->session->userdata['user']->emp_id;
		
		$task_id=$_POST['task_id'];
		$section_id=$_POST['section_id'];
		$section_col_name=$_POST['section_col_name'];
		$section_col_value=$_POST['section_col_value'];
		$task_section_col_id=$_POST['task_section_col_id'];
	



		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'tasksections/updatetasksectionscols',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
			"task_id":"'.$task_id.'",
			"emp_id":"'.$emp_id.'",
			"section_id":"'.$section_id.'",
			"section_col_name":"'.$section_col_name.'",
			"task_section_col_id":"'.$task_section_col_id.'",
			"section_col_value":"'.$section_col_value.'"
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

	
	public function update_task_details(){
		
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		$emp_id=$this->session->userdata['user']->emp_id;
		
		$task_id=$_POST['task_id'];
		$issue_found=trim($_POST['issue_found']);
		$remarks1=trim($_POST['remarks']);
		//$remarks= preg_replace('/[^A-Za-z0-9\-!]/', ' ', $remarks1);
		$remarks=json_encode(addslashes($_POST['remarks']));
		
		$task_status=$_POST['task_status'];
		$perent_task_id=$_POST['perent_task_id'];
		$call_attend_by=$_POST['call_attend_by'];
		$primary_flag=$_POST['primary_flag'];
		$approved_hw_used=$_POST['approved_hw_used'];
	


		
	   /* Insert Change Log history */
		$log_category="Task Status Update";
		$request_params="Ticket details is ".$_POST['service_no'];
		$log_text=$request_params;
		$this->insert_change_log_history($log_category,$request_params,$log_text);
	   /* Insert Change Log history */
	   
	   
	   
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'task/updatetask',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'PUT',
		CURLOPT_POSTFIELDS =>'{
			"task_id":"'.$task_id.'",
			"approved_hw_used":"'.$approved_hw_used.'",
			"remarks":'.$remarks.',
			"task_message":'.$remarks.',
			"comments":'.$remarks.',
			"task_status":"'.$task_status.'",
			"emp_id":"'.$emp_id.'",
			"task_other_issue":"'.$issue_found.'",
			"perent_task_id":"'.$perent_task_id.'",
			"call_attend_by":"'.$call_attend_by.'",
			"primary_flag":"'.$primary_flag.'",
			"issue_found":"'.$issue_found.'"
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
	
	
	
	public function insert_task_section_cols_add(){
		
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		$emp_id=$this->session->userdata['user']->emp_id;
		
		$task_id=$_POST['task_id'];
		$section_id=$_POST['section_id'];
		$section_col_name=$_POST['section_col_name'];
		$section_col_value=$_POST['section_col_value'];

		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'tasksections/inserttasksectionscols',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
			"task_id":"'.$task_id.'",
			"emp_id":"'.$emp_id.'",
			"section_id":"'.$section_id.'",
			"section_col_name":"'.$section_col_name.'",
			"section_col_value":"'.$section_col_value.'"
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
	
	
	 public function insert_task_notes_data(){
		
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		$emp_id=$this->session->userdata['user']->emp_id;
		
		$task_id=$_POST['task_id'];
		$note_type=$_POST['note_type'];
		//$note=$_POST['note'];
		
		$note=json_encode(addslashes($_POST['note']));
		$internal_type=$_POST['internal_type'];
		
		// if(!empty($_FILES['attachment'])){
		// $oname=$_FILES["attachment"]["name"];
		// $img=base64_encode($oname);
		// $im="data:image/png;base64,/";
		// $image=$im.$img;
		// }else{
			// $image='';
		// }
		  // if((!$_FILES['attachment']['error']) && ($_FILES['attachment'] !=''))
		  // {
			  // $new_image=rand(1,10000)."_".$_FILES['attachment']['name'];
			  // move_uploaded_file($_FILES['attachment']['tmp_name'],"uploads/".$new_image);
		  // }
		  // $file = "uploads/".$new_image;
		// $img=base64_encode($file);
		// $im="data:image/png;base64,/";
		// $image=$im.$img;
		
		$image="";
		 if (!empty($_FILES['attachment']['name'])) {
                // Load the Upload library
                $this->load->library('upload');
                // Set the upload path and allowed file types
                $config['upload_path'] = 'uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $this->upload->initialize($config);
                // Try to upload the file
                if ($this->upload->do_upload('attachment')) {
                    // File uploaded successfully, get the base64 encoding
                    $data = $this->upload->data();
					$base_patch=base_url();
                    $image_path =$base_patch.'uploads/'.$data['file_name'];
                    $base64_image = base64_encode($image_path);

                    // Now you can use $base64_image as needed, for example, display it in a view.
                    // You can pass it to the view like this:
                    $data['base64_image'] = $base64_image;
					$image=$image_path;
			  }
			}
			// $image=$image_path;
			// $img=base64_encode($image);
			// $im="data:image/png;base64,/";
			// $image=$im.$data['base64_image'];
			// echo '<pre>';print_r($image);exit;

		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'tasksections/taskdocumentnoteswebb',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
			"task_id":"'.$task_id.'",
			"emp_id":"'.$emp_id.'",
			"internal_type":"'.$internal_type.'",
			"note_type":"'.$note_type.'",
			"attachment":"'.$image.'",
			"note":'.$note.'
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
	
	
	
	
	
	
	public function get_all_tasks_notes_sow_list($task_id,$note_type){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
				
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'tasksections/getcommentslist',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"task_id":"'.$task_id.'",
					"note_type":"'.$note_type.'"
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
	
	
	
	public function get_tasks_status_tabs_count_list($emp_id,$task_category_id){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
			if(isset($_POST['from_date']) && $_POST['from_date']!='' && isset($_POST['to_date']) && $_POST['to_date']!='')
			{
			$fromDate=$_POST['from_date'];
			$toDate=$_POST['to_date'];
			
					
			$fromDate=date('Y-m-d 00:00:00',strtotime($fromDate));
			$toDate=date('Y-m-d 23:59:59',strtotime($toDate));
			}else{
				
			$fromDate=date('Y-m-d 00:00');
			$toDate=date('Y-m-d 23:59');
				
			} 
			$fromDate=$this->session->userdata('f_fromDate')=='' ? $fromDate:$this->session->userdata('f_fromDate');	
			$toDate=$this->session->userdata('f_toDate')=='' ? $toDate:$this->session->userdata('f_toDate');	
			
			$search_like=(isset($_POST['search_like']))? trim($_POST['search_like']) : "";
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'task/gettaskstatuscountbycategory',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"task_category":"'.$task_category_id.'",
					"fromDate":"'.$fromDate.'",
					"search_like":"'.$search_like.'",
					"toDate":"'.$toDate.'"
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
	
	
	
	
	
	
	public function get_check_list_submited_tasks_web($task_id){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
				
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'tasksections/checklistsubmitedtasksweb',
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
	
	public function get_check_list_form_web($task_id){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
				
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'tasksections/getfamidbasedlist',
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
	
	
	public function get_checklist_submited_tasks_web(){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
				$submitted_tabs=json_encode((object) $_POST);
			
// echo '<pre>';print_r($submitted_tabs);exit; 

				$task_id=$_POST['task_id'];

			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'tasksections/update_checklist_submited_tasks_web',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"task_id":"'.$task_id.'",
					"submitted_tabs":"'.$submitted_tabs.'"
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
	
	
		public function get_checklist_submit_image(){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
				$emp_id=$this->session->userdata['user']->emp_id;
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'tasksections/insertchecklistimagedata',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"task_id":"'.$_POST['task_id'].'",
					"emp_id":"'.$emp_id.'",
					"img_encode":"'.$_POST['encode_img'].'"
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
	
		public function get_checklist_image_data($column_name,$chck_img_id){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
				$emp_id=$this->session->userdata['user']->emp_id;
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'tasksections/getchecklistimagedata',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"chck_img_id":"'.$chck_img_id.'",
					"column_name":"'.$column_name.'"
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
	
	
	
	
	 
	public function get_tasks_status_new_uat_success_retry($caseNumber,$LGTaskId,$call_attend_by){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
				$emp_id=$this->session->userdata['user']->emp_id;
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'servicenow/uatFailRetry',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"caseNumber":"'.$caseNumber.'",
					"LGTaskId":"'.$LGTaskId.'",
					"call_attend_by":"'.$call_attend_by.'"
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
	
	
	
	
	
	
	
	public function get_single_hardware_data($hardware_id){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
			  curl_setopt_array($curl, array(
			  //CURLOPT_URL => API_MAIN_URL.'employees/getemployee',
			  CURLOPT_URL => API_MAIN_URL.'/task/gettaskhardwarebyid/'.$hardware_id,
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
	
	
	
	public function update_hard_ware_used(){
		
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		$emp_id=$this->session->userdata['user']->emp_id;
		
		$hardware_id=$_POST['hardware_id'];
		$hw_partcode=$_POST['hw_partcode'];
		$hw_desc=$_POST['hw_desc'];
		$no_of_units_used=$_POST['no_of_units_used'];
		$hw_id=$_POST['hw_id'];
		$cat_id=$_POST['cat_id'];

		$task_id=$_POST['task_id'];
		$comments='Hardware Edited to '.$hw_partcode.'- units used is '.$no_of_units_used;


	   /* Insert Change Log history */
		$log_category="Task Hardware Edited";
		$request_params="Ticket details is ".$_POST['service_no'];
		$log_text=$comments;
		$this->insert_change_log_history($log_category,$request_params,$log_text);
	   /* Insert Change Log history */

		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'task/updatetaskhardware',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
			"id":"'.$hardware_id.'",
			"cat_id":"'.$cat_id.'",
			"hw_id":"'.$hw_id.'",
			"hw_partcode":"'.$hw_partcode.'",
			"hw_desc":"'.$hw_desc.'",
			"task_id":"'.$task_id.'",
			"emp_id":"'.$emp_id.'",
			"comments":"'.$comments.'",
			"no_of_units_used":"'.$no_of_units_used.'"
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
	
	
	
	public function get_category_hardware_data(){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
			  curl_setopt_array($curl, array(
			  //CURLOPT_URL => API_MAIN_URL.'employees/getemployee',
			  CURLOPT_URL => API_MAIN_URL.'/hardware/gethardwaredata',
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
	
	
	public function get_category_wise_hardware_data($cat_id){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
				
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'hardware/gethardwareidbaseddata',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"sub_cat_id":"'.$cat_id.'"
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
	

	public function get_single_hw_desc_data($part_code){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
				
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'task/gettaskhardwarebypartcode',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"part_code":"'.$part_code.'"
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
	
	
	
	/* check List Update */
	
	
	
	
	public function check_list_update_form_task_submit(){
		
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		$emp_id=$this->session->userdata['user']->emp_id;
		
		$task_id=$_POST['task_id'];
		$chck_sub_id=$_POST['chck_sub_id'];
		
			$postData1=$_POST;
			
			if (($key = array_search($_POST['task_id'], $postData1)) !== false) {
			unset($postData1[$key]);
			}
			if (($key = array_search($_POST['chck_sub_id'], $postData1)) !== false) {
			unset($postData1[$key]);
			}
			
			$TT_Camera_data=array();
			$TT_Normal_data=array();
			foreach($postData1 as $k => $v)
			{
			  if (strpos($k, 'TT_Camera_') !== false || strpos($k, 'TT_Signature_') !== false)
			  {
				  $k1=str_replace('TT_Camera_','',$k);
				  $final_k=str_replace('TT_Signature_','',$k1);
				 $TT_Camera_data[]=$final_k.'":"'.$v; 
				//$number = substr($k, strrpos($k, '_'));
			  }else {
				  $k1=str_replace('TT_Choice_','',$k);
				  $k11=str_replace('TT_Radio_','',$k1);
				  $k2=str_replace('TT_Date_','',$k11);
				  $k3=str_replace('TT_Text_','',$k2);
				  $k4=str_replace('TT_Number_','',$k3);
				  $final_k=str_replace('TT_Textarea_','',$k4);
				  
				  $TT_Normal_data[]=$final_k.'":"'.$v; 
			  } 
			}
			 			
			$postData_dup=json_encode($postData1);
			
			$TT_Camera_data1=json_encode($TT_Camera_data);
			$TT_Normal_data1=json_encode($TT_Normal_data);
			$TT_Normal_data111=str_replace('[','{',$TT_Normal_data1);
			$form_tabs=str_replace(']','}',$TT_Normal_data111);
			$form_tabs=strtr($form_tabs, ['\\' => '']);
			
			
			$TT_Camera_data11=str_replace('[','{',$TT_Camera_data1);
			$images_tabs=str_replace(']','}',$TT_Camera_data11);
			$images_tabs=strtr($images_tabs, ['\\' => '']);


			$k1postData=str_replace('TT_Camera_','',$postData_dup);
			$k1_postDatan=str_replace('TT_Signature_','',$k1postData);
			$k1_postData=str_replace('TT_Choice_','',$k1_postDatan);
			$k11_postData=str_replace('TT_Radio_','',$k1_postData);
			$k2_postData=str_replace('TT_Date_','',$k11_postData);
			$k3_postData=str_replace('TT_Text_','',$k2_postData);
			$k4_postData=str_replace('TT_Number_','',$k3_postData);
			$submitted_tabs=str_replace('TT_Textarea_','',$k4_postData);
			$submitted_tabs=strtr($submitted_tabs, ['\\' => '']);
			
			// echo $images_tabs;
			// echo "<br>";
			// echo $form_tabs;
			// echo "<br>";
			// echo $submitted_tabs;die;
			// $data='{
				// "chck_sub_id":"'.$chck_sub_id.'",
				// "task_id":"'.$task_id.'",
				// "images_tabs":'.$images_tabs.',
				// "form_tabs":'.$form_tabs.',
				// "submitted_tabs":'.$submitted_tabs.'
			// }';
	//	echo '<pre>';print_r($data);exit;

		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'tasksections/updatechcklistsubmitData',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
				"chck_sub_id":"'.$chck_sub_id.'",
				"task_id":"'.$task_id.'",
				"images_tabs":'.$images_tabs.',
				"form_tabs":'.$form_tabs.',
				"submitted_tabs":'.$submitted_tabs.'
			}',
		CURLOPT_HTTPHEADER => array(
		'x-access-token:'.$token,
		'Content-Type: application/json'
		),
		));

		$response = curl_exec($curl);
		//print_r($response);die;
		curl_close($curl);
		return $response;
		
	}
	
	
	
	
	
	
	/* check List Update */
	
	
	
	
	public function get_all_clusters_list_manager_wsie(){
			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				 $emp_id=$this->session->userdata['user']->emp_id;
				$curl = curl_init(); 
				curl_setopt_array($curl, array(
				CURLOPT_URL => API_MAIN_URL.'clusters/geclusterbymanager',
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
				'x-access-token:'.$token 
				),
				));

				$response = curl_exec($curl);

				curl_close($curl);
				return $response;

	}
	
	
	
	/* Insert Change Log history */
	public function insert_change_log_history($log_category,$request_params,$log_text){
			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$emp_id=$this->session->userdata['user']->emp_id;
				$emp_name=$this->session->userdata['user']->emp_code.'-'.$this->session->userdata['user']->emp_username;

				$ipaddress = $_SERVER['REMOTE_ADDR'];

				$curl = curl_init(); 
				curl_setopt_array($curl, array(
				CURLOPT_URL => API_MAIN_URL.'reports/changeloghistory',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"emp_id":"'.$emp_id.'",
					"emp_name":"'.$emp_name.'",
					"ipaddress":"'.$ipaddress.'",
					"log_category":"'.$log_category.'",
					"request_params":"'.$request_params.'",
					"log_text":"'.$log_text.'"
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

	/* Insert Change Log history */
	
	
	/* NEW TASK QUERY PHP */
		
	public function get_task_list_new($emp_id,$task_category_id,$task_status){
		
					
			$fromDate=date('Y-m-d 00:00:00');
				$toDate=date('Y-m-d 23:59:00');
		
		$user=$this->session->userdata['user'];//$this->session->userdata['token'];
			 $qry = '';
			 $qry2 = '';
			 $qry3 = '';
			if($user->emp_designation == 284){
			$qry = '';
			}else{
			$qry.='t.call_attend_by in "'.$emp_id.'" or t.task_owner= "'.$emp_id.'"';
			} 


			if($task_category_id != 0){
			$qry3 .=' and  st_id.task_category='.$task_category_id.'';   
			}
			if($task_status != 0){

				$qry3.=' and st_id.task_status='.$task_status.'';   

			}
			$qry.= ' and ((t.parent_id is null and st_id.primary_flag = 1)'.$qry3.'
						and (t.task_created_date) >= "'.$fromDate.'"
						and (t.task_created_date) <= "'.$toDate.'")';
			
			

		$query = "WITH CallAttendedNames AS (
		SELECT parent_id, GROUP_CONCAT(DISTINCT e.emp_name ORDER BY st.task_id DESC) AS call_attended_name
		FROM tasks AS st
		JOIN employees AS e ON st.call_attend_by = e.emp_id
		WHERE st.task_status != 408
		GROUP BY parent_id
		),

		SubTaskNos AS (
		SELECT parent_id, GROUP_CONCAT(DISTINCT service_no ORDER BY st.task_id DESC) AS sub_task_no
		FROM tasks AS st
		WHERE st.task_status != 408
		GROUP BY parent_id
		),

		SubTaskStatusNames AS (
		SELECT parent_id, GROUP_CONCAT(sb.sub_cat_name ORDER BY st2.task_id DESC) AS sub_task_status_name
		FROM tasks AS st2
		JOIN sub_categories AS sb ON sb.sub_cat_id = st2.task_status
		WHERE st2.task_status != 408
		GROUP BY parent_id
		),

		SubTaskStatusIds AS (
		SELECT parent_id, GROUP_CONCAT(st2.task_status ORDER BY st2.task_id DESC) AS sub_task_status_name_ids
		FROM tasks AS st2
		WHERE st2.task_status != 408
		GROUP BY parent_id
		),

		TasksIds AS (
		SELECT parent_id, GROUP_CONCAT(DISTINCT st.task_id ORDER BY st.task_id DESC) AS tasks_ids
		FROM tasks AS st
		WHERE st.task_status != 408
		GROUP BY parent_id
		),

		PrimaryTaskInfo AS (
		SELECT parent_id, 
		GROUP_CONCAT(DISTINCT st.task_id) AS primary_task_id,
		GROUP_CONCAT(DISTINCT CONCAT(sb.sub_cat_name, ',', sb.sub_cat_description)) AS primary_task_status,
		GROUP_CONCAT(DISTINCT st.task_status) AS primary_task_status_id
		FROM tasks AS st
		JOIN sub_categories AS sb ON sb.sub_cat_id = st.task_status
		WHERE st.primary_flag = 1
		GROUP BY parent_id
		),

		DocCount AS (
		SELECT parent_id, COUNT(*) AS countss
		FROM tasks_documents_notes as tdc
		join tasks as t on t.task_id=tdc.task_id
		WHERE note_type = 0
		GROUP BY parent_id
		),

		NotesCount AS (
		SELECT parent_id, COUNT(*) AS countss
		FROM tasks_documents_notes as tdc
		join tasks as t on t.task_id=tdc.task_id
		WHERE note_type = 1
		GROUP BY parent_id
		)

		SELECT t.*, 
		sc.sub_cat_name AS task_main_category_name, 
		cc.comp_cat_name AS task_type_name,
		e2.emp_name AS task_owner_name, 
		sc2.sub_cat_name AS task_status_name, 
		sc2.sub_cat_description AS status_bg_colour, 
		c.circuit_name AS circuit_name, 
		c.landmark AS circuit_landmark, 
		c.city AS circuit_city, 
		c.pincode AS circuit_pincode, 
		cl.cluster_name AS cluster_name, 
		can.call_attended_name,
		stn.sub_task_no,
		stsn.sub_task_status_name,
		stsi.sub_task_status_name_ids,
		tids.tasks_ids,
		pt.primary_task_id,
		pt.primary_task_status,
		pt.primary_task_status_id,
		ifnull(dc.countss,0) as doc_count,
		ifnull(nc.countss,0) as notes_count
		FROM tasks AS t
		LEFT JOIN sub_categories AS sc ON t.task_category = sc.sub_cat_id
		LEFT JOIN complaint_categories AS cc ON t.task_type = cc.comp_cat_id
		LEFT JOIN employees AS e2 ON t.task_owner = e2.emp_id
		LEFT JOIN sub_categories AS sc2 ON t.task_status = sc2.sub_cat_id
		LEFT JOIN circuits AS c ON t.circuit_id = c.circuit_id 
		LEFT JOIN clusters AS cl ON INSTR(cl.pincodes,t.task_pincode)
		LEFT JOIN tasks AS st_id ON st_id.parent_id = t.task_id 
		LEFT JOIN employees AS e ON e.emp_id = st_id.call_attend_by
		LEFT JOIN CallAttendedNames AS can ON t.task_id = can.parent_id
		LEFT JOIN SubTaskNos AS stn ON t.task_id = stn.parent_id
		LEFT JOIN SubTaskStatusNames AS stsn ON t.task_id = stsn.parent_id
		LEFT JOIN SubTaskStatusIds AS stsi ON t.task_id = stsi.parent_id
		LEFT JOIN TasksIds AS tids ON t.task_id = tids.parent_id
		LEFT JOIN PrimaryTaskInfo AS pt ON t.task_id = pt.parent_id
		LEFT JOIN DocCount AS dc ON t.task_id = dc.parent_id
		LEFT JOIN NotesCount AS nc ON t.task_id = nc.parent_id
		WHERE 1=1 $qry GROUP BY t.task_id";    		
		// $result=$query->result_array();
	// echo '<pre>';print_r($this->db->last_query());exit;

		return  $query;
			
	}
		
	/* NEW TASK QUERY PHP */
	// added 10-11-2023 by sk
		public function get_frtall_employees_list(){
			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		
				$curl = curl_init(); 
			  curl_setopt_array($curl, array(
			  //CURLOPT_URL => API_MAIN_URL.'employees/getemployee',
			  CURLOPT_URL => API_MAIN_URL.'task/getfrtemployeesspecifictomanager',
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
	// end 
	
	
	// hard_ware_used_add 
	
	public function insert_hard_ware_used(){
		
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		$emp_id=$this->session->userdata['user']->emp_id;
		
		$hw_partcode=$_POST['hw_partcode'];
		$hw_desc=$_POST['hw_desc'];
		$no_of_units_used=$_POST['no_of_units_used'];
		$cat_id=$_POST['cat_id'];
		$hw_id=$_POST['hw_id'];

		$task_id=$_POST['task_id'];
		$comments='Hardware Edited to '.$hw_partcode.'- units used is '.$no_of_units_used;


	   /* Insert Change Log history */
		$log_category="Task Hardware Edited";
		$request_params="Ticket details is ".$_POST['service_no'];
		$log_text=$comments;
		$this->insert_change_log_history($log_category,$request_params,$log_text);
	   /* Insert Change Log history */

		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'task/inserttaskhardware',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
			"cat_id":"'.$cat_id.'",
			"hw_partcode":"'.$hw_partcode.'",
			"hw_desc":"'.$hw_desc.'",
			"task_id":"'.$task_id.'",
			"emp_id":"'.$emp_id.'",
			"hw_id":"'.$hw_id.'",
			"comments":"'.$comments.'",
			"no_of_units_used":"'.$no_of_units_used.'"
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
	
	// hard_ware_used_add 

}