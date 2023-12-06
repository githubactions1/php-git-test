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
					 
				
				$search_like=(isset($_POST['search_like']))? $_POST['search_like'] : "";
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
	
	public function get_task_list($emp_id,$task_category_id,$task_status,$offsetIndex,$limit){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
			$search_like=(isset($_POST['search_like']))? $_POST['search_like'] : "";
			$cluster_id=(isset($_POST['cluster_id']))? $_POST['cluster_id'] : "";
			if(!empty($search_like)){
				// $task_category_id=0;
				// $task_status=0;
			}
			
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
					"task_status":"'.$task_status.'",
					"offsetIndex":"'.$offsetIndex.'",
					"cluster_id":"'.$cluster_id.'",
					"limit":"'.$limit.'"
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
	public function get_task_list_filters($emp_id,$task_category_id,$task_status,$offsetIndex,$limit){
		
		
		
		$fromDate1=$_POST['from_date'];
		$toDate1=$_POST['to_date'];
		$task_priority=$_POST['task_priority'];
		$cluster_id=$_POST['cluster_id'];
		
		
		$this->session->unset_userdata('f_fromDate');
		$this->session->unset_userdata('f_toDate');
		$this->session->unset_userdata('f_cluster_id');

		$fromDate=date('Y-m-d 00:00:00',strtotime($fromDate1));
		$toDate=date('Y-m-d 23:59:59',strtotime($toDate1));

		$this->session->set_userdata('f_fromDate',$fromDate);
		$this->session->set_userdata('f_toDate',$toDate);
		$this->session->set_userdata('f_cluster_id',$cluster_id);

		$order_by=$_POST['order_by'];
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
					"task_status":"'.$task_status.'",
					"offsetIndex":"'.$offsetIndex.'",
					"limit":"'.$limit.'"
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
		
		if(!empty($_FILES['attachment'])){
		$oname=$_FILES["attachment"]["name"];
		$img=base64_encode($oname);
		$im="data:image/png;base64,/";
		$image=$im.$img;
		}else{
			$image='';
		}
		
		
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'tasksections/taskdocumentnotes',
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
			"img":"'.$image.'",
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
			$search_like=(isset($_POST['search_like']))? $_POST['search_like'] : "";
			$fromDate=$this->session->userdata('f_fromDate')=='' ? $fromDate:$this->session->userdata('f_fromDate');	
			$toDate=$this->session->userdata('f_toDate')=='' ? $toDate:$this->session->userdata('f_toDate');	
			
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
	

}