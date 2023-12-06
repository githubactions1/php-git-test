<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tasks extends CI_Controller {

	function __construct() { 
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('checklogin_helper');
		$this->load->library('form_validation');
		$this->load->library('session'); 
		$this->load->model(array('tasks_model'));

	}
	 
	public function index()
	{
	if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){
			redirect('Tasks/task_list');
				
		}else{
			 redirect('Welcome');	
		}

	}
	
	
	public function task_list($task_category_id='',$task_status='')
	{
		
		
		$this->session->unset_userdata('f_fromDate');
		$this->session->unset_userdata('f_toDate');
	if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){
					
			$data['title']='Tasks -List';
			$this->load->view('header',$data);
			if($task_category_id == ''){
			$task_category_id=0;
			}
			if($task_status == ''){
			$task_status=217;
			}
		   $emp_id=$this->session->userdata['user']->emp_id;
			
			$column_name='task_category';
			$task_main_categories= json_decode($this->tasks_model->get_all_sub_list_with_count(7,$column_name));
			
			if($task_main_categories->status==200)
				{
				$data['task_main_categories']=$task_main_categories->data;	
				}else{
				$data['task_main_categories']=array();	
				}
				
			$data['category_id']=$task_category_id;	
				// $column_name='task_category';
				// $task_main_categories= json_decode($this->tasks_model->get_all_sub_list_with_count(7,$column_name));
				// $data['task_main_categories']=$task_main_categories->data;	
					
				// $column_name='task_status';
				// $task_status_list= json_decode($this->tasks_model->get_all_sub_list_with_count(9,$column_name));
				// $data['task_status_list']=$task_status_list->data;	

				$clusters_list= json_decode($this->tasks_model->get_all_clusters_list());
				$data['clusters_list']=$clusters_list->data;	
					

				$employees_list= json_decode($this->tasks_model->get_all_employees_list());
				$data['employees_list']=$employees_list->data;
				
				
		
			$data['task_category_id']=$task_category_id;
			$data['task_status']=$task_status;
				$this->load->view('tasks/tasks',$data);
				$this->load->view('footer');
				
		}else{
			 redirect('Welcome');	
		}

	}
	
	
	


		public function task_details($task_id)
		{
		if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){
					
			$data['title']='Tasks -Grid';
			$this->load->view('header',$data);
			$task_details_list= json_decode($this->tasks_model->get_task_details($task_id));
 

			$task_record=$task_details_list->data;
			$task_record1=$task_record->task;
			$task_logs=$task_record->tasklogs;
			$task_sections_cols=$task_record->tasksectioncols;
				$task_hardware_used_data=$task_record->taskhardwareuseddata;

			//echo '<pre>';print_r($task_sections_cols);exit;


			$data['task_details']=$task_record1;	
			$data['task_logs']=$task_logs;	
			$data['task_sections_cols']=$task_sections_cols;	
			$data['task_hardware_used_data']=$task_hardware_used_data;	
			$data['task_check_list']=array();
			$task_check_list1= json_decode($this->tasks_model->get_check_list_submited_tasks_web($task_id));
			$array_data = $task_check_list1->data;
			//$array_data = json_decode(json_encode($task_check_list1->data), true);
				if(!empty($array_data)){
				$data['task_check_list']=$array_data;
				}else {
				$data['task_check_list']=array();
				}


			$this->load->view('tasks/task_details',$data); 
			$this->load->view('footer');
			}else{
				 redirect('Welcome');	
			}

		}

		


	

	public function add()
	{
		

		if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){
					
				
			$data['title']='Tasks -Add';
			$this->load->view('header',$data);

			$task_main_categories= json_decode($this->tasks_model->get_all_sub_list(7));
			$data['task_main_categories']=$task_main_categories->data;
			

			$employees_list= json_decode($this->tasks_model->get_all_employees_list());
			$data['employees_list']=$employees_list->data;
			
			
			$task_type_list= json_decode($this->tasks_model->get_all_task_type_list());
			$data['task_type_list']=$task_type_list->data;	

			$users_list= json_decode($this->tasks_model->get_all_users_list());
			$data['users_list']=$users_list->data;	
				
				if(isset($_POST['submit']) && $_POST['submit']!='')
			{ 
		
		

				$inrs_results = json_decode($this->tasks_model->inserttask_details());
				if($inrs_results->status==200)
				{
				$this->session->set_flashdata('success', 'Created Successfully...');
				redirect('Tasks/task_list'); 
				}
				else
				{
				$this->session->set_flashdata('error', 'Not Updated...');
					redirect('Tasks/task_list'); 
				}
			}
				
				
				
				
			$this->load->view('tasks/add_task',$data);
			$this->load->view('footer');
		}else{
			 redirect('Welcome');	
		}

	}
	



	public function update_task($task_id)
	{
		

		if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){
					
				
				$data['title']='Tasks -Update';
				$this->load->view('header',$data);
				$task_details_list= json_decode($this->tasks_model->get_task_details($task_id));


				$task_record=$task_details_list->data;
				$task_record1=$task_record->task;
				$task_logs=$task_record->tasklogs;
				$task_sections_cols=$task_record->tasksectioncols;
				$task_hardware_used_data=$task_record->taskhardwareuseddata;



				$data['task_details']=$task_record1;	
				$data['task_logs']=$task_logs;	
				$data['task_sections_cols']=$task_sections_cols;	
				$data['task_hardware_used_data']=$task_hardware_used_data;	

			
				$task_status_list= json_decode($this->tasks_model->get_all_sub_list(9));
				$data['task_status_list']=$task_status_list->data;	
				
				if(isset($_POST['submit']) && $_POST['submit']!='')
			{ 
		

	
				$inrs_results = json_decode($this->tasks_model->update_task_details());

				if($inrs_results->status==200)
				{
				$this->session->set_flashdata('success', 'Updated Successfully...');
				redirect('Tasks/task_list'); 
				}
				else
				{
				$this->session->set_flashdata('error', 'Not Updated...');
					redirect('Tasks/task_list'); 
				}
			}
				
				
				
				
				
				
				
			$data['task_check_list']=array();
			$task_check_list1= json_decode($this->tasks_model->get_check_list_submited_tasks_web($task_id));
			$array_data = json_decode(json_encode($task_check_list1->data), true);
				if(!empty($array_data)){
				$data['task_check_list']=$task_check_list1->data[0];
				}else {
				$data['task_check_list']=array();
				}
				
				
			$check_list_form1= json_decode($this->tasks_model->get_check_list_form_web($task_id));
			$check_list_form_tabs=$check_list_form1->data;
			$data['check_list_form']=$check_list_form_tabs->tabs[0];
				
				
				
				
				


				$this->load->view('tasks/update_task',$data);
				$this->load->view('footer');
		}else{
			 redirect('Welcome');	
		}

	}
	

   public function task_search_filter_ajax()
	{
			$task_category_id = $this->input->post('task_category_id');
			$task_status = $this->input->post('task_status');
			$emp_id=$this->session->userdata['user']->emp_id;
		

			
			$offsetIndex=0;
			$limit = 6;
			$task_list= json_decode($this->tasks_model->get_task_list_filters($emp_id,$task_category_id,$task_status,$offsetIndex,$limit));
			$data['task_list']=$task_list->data;	

				$allcount=count($data['task_list']);
				$j=$allcount/$limit;		
				$j1=round($allcount/$limit);
				if($j1<$j)
				{
				$data['pages']=round($j1+1);
				}
				else
				{
				$data['pages']=$j1;
				}



			$final['list_ajax_div']= $this->load->view('tasks/tasks_list_ajax',$data,TRUE);
			$final['grid_ajax_div']= $this->load->view('tasks/tasks_grid_ajax',$data,TRUE);
			$final['task_category_id']= $task_category_id;
			$final['task_status']= $task_status;
			
			
			$fromDate=$_POST['from_date'];
			$toDate=$_POST['to_date'];
			$cluster_id=$_POST['cluster_id'];
			$fromDate=$this->session->userdata('f_fromDate')=='' ? $fromDate:date('Y-m-d',strtotime($this->session->userdata('f_fromDate')));	
			$toDate=$this->session->userdata('f_toDate')=='' ? $toDate:date('Y-m-d',strtotime($this->session->userdata('f_toDate')));	
			
			$final['session_filter_date']= $fromDate.' <b>to</b> '.$toDate;
			$final['session_from_date']= $fromDate;
			$final['session_to_date']= $toDate;
			$final['session_cluster_id']= $cluster_id;
			
			
			echo json_encode($final);exit;	
	}
   public function get_tasks_list_ajax()
	{
		
		$task_category_id = $this->input->post('task_category_id');
		$task_status = $this->input->post('task_status');
		$emp_id=$this->session->userdata['user']->emp_id;


		$offsetIndex=0;
		$limit = 6;
		$task_list= json_decode($this->tasks_model->get_task_list($emp_id,$task_category_id,$task_status,$offsetIndex,$limit));
		$data['task_list']=$task_list->data;	
		
		
		
		$task_list_all1= json_decode($this->tasks_model->get_task_list($emp_id,$task_category_id,$task_status,0,0));
		$task_list_all=$task_list_all1->data;
		$allcount=count($task_list_all);
		$j=$allcount/$limit;		
		$j1=round($allcount/$limit);
		if($j1<$j)
		{
			$data['pages']=round($j1+1);
		}
		else
		{
			$data['pages']=$j1;
		}

		$final['list_ajax_div']= $this->load->view('tasks/tasks_list_ajax',$data,TRUE);
		$final['grid_ajax_div']= $this->load->view('tasks/tasks_grid_ajax',$data,TRUE);
		$final['task_category_id']= $task_category_id;
		$final['task_status']= $task_status;
		
		
		$fromDate=$_POST['from_date'];
		$toDate=$_POST['to_date'];
		$fromDate=$this->session->userdata('f_fromDate')=='' ? $fromDate:date('Y-m-d',strtotime($this->session->userdata('f_fromDate')));	
		$toDate=$this->session->userdata('f_toDate')=='' ? $toDate:date('Y-m-d',strtotime($this->session->userdata('f_toDate')));	
		
		$final['session_filter_date']= $fromDate.' <b>to</b> '.$toDate;
		
		echo json_encode($final);exit;			
		
	}
	
   public function get_tasks_list_ajax_load()
	{
		
		$task_category_id = $this->input->post('task_category_id');
		$task_status = $this->input->post('task_status');
		$emp_id=$this->session->userdata['user']->emp_id;


		$set_old_pagno=$this->input->post('set_old_pagno');
		$offsetIndex=$this->input->post('pagno');
		if($set_old_pagno == $offsetIndex){
			$offsetIndex=$this->input->post('pagno')+1;
		}
		$limit = 6;
		$task_list= json_decode($this->tasks_model->get_task_list($emp_id,$task_category_id,$task_status,$offsetIndex,$limit));
		$data['task_list']=$task_list->data;	
		

		$this->load->view('tasks/tasks_grid_ajax_lazy_load',$data);
	}
	
	
	
	
	
	
	public function get_task_type_list()
		{
			//echo '<pre>';print_r($_POST);exit;
			$task_category = $this->input->post('task_category');
			$task_type_list= json_decode($this->tasks_model->get_complaint_categories($task_category));
			$task_type_list=$task_type_list->data;
			
				if(count($task_type_list)>0){
				$opt='<option value="">--Select--</option>';		

				foreach($task_type_list as $v){ 
				$opt.='<option value="'.$v->comp_cat_id.'">'.$v->comp_cat_name.'</option>';
				}
				}else{
				$opt='<option value="">--No data--</option>';		

				}
				echo $opt;exit;
		}
		
	
		public function get_task_assign_ajax()
	{
		
		$data['task_id']=$task_id=$_POST['task_id'];
		$data['page_type']=$page_type=$_POST['page_type'];
		$task_details_list= json_decode($this->tasks_model->get_single_task_details($task_id));
		$task_record=$task_details_list->data;
				$data['task_details']=$task_record[0];	

		
		$employees_list= json_decode($this->tasks_model->get_all_employees_list());
		$data['employees_list']=$employees_list->data;
		
		
	

		echo $this->load->view('tasks/task_assign_pop_ajax',$data,true);
		exit;
	}
	
	
	public function get_task_notes_sow_list_ajax()
	{
		
		$data['task_id']=$task_id=$_POST['task_id'];
		$data['note_type']=$note_type=$_POST['note_type'];
		$task_details_list= json_decode($this->tasks_model->get_single_task_details($task_id));
		$task_record=$task_details_list->data;
				$data['task_details']=$task_record[0];	

		
		$tasks_notes_list= json_decode($this->tasks_model->get_all_tasks_notes_sow_list($task_id,$note_type));
		$data['tasks_notes_list']=$tasks_notes_list->data;

		echo $this->load->view('tasks/tasks_notes_pop_ajax',$data,true);
		exit;
	}
	
	
	
		public function get_task_status_update_ajax()
	{
		
		$data['task_id']=$task_id=$_POST['task_id'];
		$data['page_type']=$page_type=$_POST['page_type'];
		$task_details_list= json_decode($this->tasks_model->get_single_task_details($task_id));
		$task_record=$task_details_list->data;
				$data['task_details']=$task_record[0];	

		
		$employees_list= json_decode($this->tasks_model->get_all_employees_list());
		$data['employees_list']=$employees_list->data;
		
		

		$task_status_list= json_decode($this->tasks_model->get_all_sub_list(9));
		$data['task_status_list']=$task_status_list->data;	

		echo $this->load->view('tasks/task_status_update_pop_ajax',$data,true);
		exit;
	}
	
	
		public function task_assign_submit_form_ajax()
	{
		$page_type=$_POST['page_type'];
		$task_id=$_POST['task_id'];
			$inrs_results = json_decode($this->tasks_model->assign_task_submit());
				if($inrs_results->status==200){
				$data['status'] = 1;
				$data['page_type'] = $page_type;
				$data['task_id'] = $task_id;
				$data['msg'] = ' Assigned successfully....';
				}else{
				$data['status'] =0;
				$data['page_type'] = $page_type;
				$data['task_id'] = $task_id;
				$data['msg'] = 'Not Assigned..';
				}

				echo json_encode($data);
	}
	
	
	
		public function section_add()
	{
		if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){
			
			$task_id=$_POST['task_id'];	
			$inrs_results = json_decode($this->tasks_model->insert_task_section_details());
			if($inrs_results->status==200)
			{
			$this->session->set_flashdata('success', 'Created Successfully...');
				redirect('Tasks/update_task/'.$task_id.''); 
			}
			else
			{
			$this->session->set_flashdata('error', 'Not Updated...');
				redirect('Tasks/update_task/'.$task_id.''); 
			}			
			
		}
   }
   
   
   
   
	public function get_section_id_data()
		{
			$section_id = $this->input->post('section_id');
			$section_id_list=json_decode($this->tasks_model->get_single_section_data($section_id));
			$section_data=$section_id_list->data;
			$data['section_id']= $section_id;
			$data['section_name']=$section_data[0]->section_name;

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
		
		
			public function section_update()
	{
		if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){
			
			$section_id=$_POST['section_id'];	
			$task_id=$_POST['task_id'];	
			$inrs_results = json_decode($this->tasks_model->update_task_section_details());
			if($inrs_results->status==200)
			{
			$this->session->set_flashdata('success', 'Updated Successfully...');
				redirect('Tasks/update_task/'.$task_id.''); 
			}
			else
			{
			$this->session->set_flashdata('error', 'Not Updated...');
				redirect('Tasks/update_task/'.$task_id.''); 
			}			
			
		}
   }
   
   
   
   
   
	public function get_task_section_cols_id_data()
		{
			$task_section_col_id = $this->input->post('task_section_col_id');
			$section_id_list=json_decode($this->tasks_model->get_single_section_cols_data($task_section_col_id));
			$section_data=$section_id_list->data;
			$data['task_section_col_id']= $task_section_col_id;
			$data['section_col_name']=$section_data[0]->section_col_name;
			$data['section_col_value']=$section_data[0]->section_col_value;
			$data['section_id']=$section_data[0]->section_id;

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
   
	
			public function section_cols_update()
	{
		if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){
			
			$task_section_col_id=$_POST['task_section_col_id'];	
			$task_id=$_POST['task_id'];	

			$inrs_results = json_decode($this->tasks_model->update_task_section_cols_details());

			if($inrs_results->status==200)
			{
			$this->session->set_flashdata('success', 'Updated Successfully...');
				redirect('Tasks/update_task/'.$task_id.''); 
			}
			else
			{
			$this->session->set_flashdata('error', 'Not Updated...');
				redirect('Tasks/update_task/'.$task_id.''); 
			}			
			
		}
   }
   
 
   public function section_cols_add()
	{
		if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){
			
			$task_id=$_POST['task_id'];	
			$inrs_results = json_decode($this->tasks_model->insert_task_section_cols_add());
			if($inrs_results->status==200)
			{
			$this->session->set_flashdata('success', 'Created Successfully...');
				redirect('Tasks/update_task/'.$task_id.''); 
			}
			else
			{
			$this->session->set_flashdata('error', 'Not Updated...');
				redirect('Tasks/update_task/'.$task_id.''); 
			}			
			
		}
   }
   
   
     public function add_notes_data($page_type)
	{
		// echo '<pre>';print_r($_POST);exit;
				if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){
				
				$task_id=$_POST['task_id'];	
				$inrs_results = json_decode($this->insert_task_notes_data());

				if($inrs_results->status==200)
				{
				$this->session->set_flashdata('success', 'Submitted Successfully...');
					if($page_type == 1){
					redirect('Tasks/update_task/'.$task_id.''); 
					}else{
					redirect('Tasks/task_list'); 
					}
				}
				else
				{
				$this->session->set_flashdata('error', 'Not Updated...');
					if($page_type == 1){
					redirect('Tasks/update_task/'.$task_id.''); 
					}else{
					redirect('Tasks/task_list'); 
					}
				}			
				
			}
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
	 
	public function task_status_submit_form_ajax()
	{
		$page_type=$_POST['page_type'];
		$task_id=$_POST['task_id'];
		$perent_task_id=$_POST['perent_task_id'];
		$inrs_results = json_decode($this->tasks_model->update_task_details());

		
		if(!empty($perent_task_id)){
				$task_id=$perent_task_id;
			}
				if($inrs_results->status==200){
				$data['status'] = 1;
				$data['page_type'] = $page_type;
				$data['task_id'] = $task_id;
				$data['msg'] = ' Updated successfully....';
				}else if($inrs_results->status==400){
				$data['status'] = 0;
				$data['page_type'] = $page_type;
				$data['task_id'] = $task_id;
				$data['msg'] = $inrs_results->message;
				}else{
				$data['status'] =0;
				$data['page_type'] = $page_type;
				$data['task_id'] = $task_id;
				$data['msg'] = 'Not Updated..';
				}

				echo json_encode($data);
	}
	
	
	
	public function get_task_auto_Refresh_ajax()
		{
			
			$this->session->unset_userdata('auto_Refresh_on');
			//echo '<pre>';print_r($_POST);exit;
			$auto_Refresh = $this->input->post('auto_Refresh');
			$opt=$auto_Refresh ==1 ?'0':'1';
			
			$this->session->set_userdata('auto_Refresh_on',$opt);

			echo $opt;exit;
		}
		
		
		
		
	   public function get_tasks_status_tabs_count_list()
		{
			
			$task_category_id = $this->input->post('task_category_id');
			$task_status = $this->input->post('task_status');
			$emp_id=$this->session->userdata['user']->emp_id;

			
			$data['task_status']= $task_status;
			$task_status_list= json_decode($this->tasks_model->get_tasks_status_tabs_count_list($emp_id,$task_category_id));
			$data['task_status_tabs_cpount']=$task_status_list->data[0];	

			$final['status_tabs_count_ajax_div']= $this->load->view('tasks/tasks_status_tabs_count_list_ajax',$data,TRUE);
			$final['task_category_id']= $task_category_id;
			echo json_encode($final);exit;			
			
		}
		
	   public function get_tasks_category_tabs_count_list()
		{
			
			$task_category_id = $this->input->post('task_category_id');
			$task_status = $this->input->post('task_status');
			$emp_id=$this->session->userdata['user']->emp_id;

			
			$column_name='task_category';
			$task_main_categories= json_decode($this->tasks_model->get_all_sub_list_with_count(7,$column_name));
			$data['task_main_categories']=$task_main_categories->data;	
			$data['category_id']=$task_category_id;	

			$final['category_tabs_count_ajax_div']= $this->load->view('tasks/tasks_category_tabs_count_list_ajax',$data,TRUE);
			$final['task_category_id']= $task_category_id;
			echo json_encode($final);exit;			
			
		}
		
		
		
		
		
		
		
			public function task_update_checklist_submited_form_ajax()
	{
		//$object = json_encode((object) $_POST);

		// echo '<pre>';print_r($_POST);
		// echo '<pre>';print_r($object);exit; 

		$task_id=$_POST['task_id'];
			$inrs_results = json_decode($this->tasks_model->get_checklist_submited_tasks_web());
				if($inrs_results->status==200){
				$data['status'] = 1;
				$data['task_id'] = $task_id;
				$data['msg'] = ' Updated successfully....';
				}else{
				$data['status'] =0;
				$data['task_id'] = $task_id;
				$data['msg'] = 'Not Updated..';
				}

				echo json_encode($data);
	}
		
		
		
		
	public function get_employees_primary_sub_list()
		{
			//echo '<pre>';print_r($_POST);exit;
			$task_id = $this->input->post('task_id');
			$call_attend_by_primary = $this->input->post('call_attend_by_primary');
			
			
		$task_details_list= json_decode($this->tasks_model->get_single_task_details($task_id));
		$task_record=$task_details_list->data;
				$task_details=$task_record[0];			
				$employees_list= json_decode($this->tasks_model->get_all_employees_list());
				$employees_list1=$employees_list->data;
				if(count($employees_list1)>0){
				$opt='<option value="">--Select--</option>';		

				foreach($employees_list1 as $v){
					if($v->emp_role==2 || $v->emp_role==3){ 
					if($v->emp_id != $call_attend_by_primary){
				if(in_array($v->emp_id,explode(",",$task_details->secondary_member))) { $selected='selected';}else{ $selected='';}
				$opt.='<option value="'.$v->emp_id.'" '.$selected.' style="color:red;">'.$v->emp_name.'('.$v->emp_username.')</option>';
					}
				  }
				}
				}else{
				$opt='<option value="">--No data--</option>';		

				}
				$opt.='	
				<script>
				$(function() {
				$(".select2").select2();
				});</script>';	
				echo $opt;exit;
		}
		
		
		public function base64_to_converter($chck_img_id) {
				$column_name='chck_img_id';
				$image_data= json_decode($this->tasks_model->get_checklist_image_data($column_name,$chck_img_id));
				$image_data=$image_data->data[0];

				$base64_string=$image_data->img_encode;
				
				header("Content-type: image/gif");
				$data = $base64_string;
				echo base64_decode($data);

		}
		
		
		public function base64_to_jpeg() {
		
			$data['base64_string']=$base64_string=$_POST['encode_img'];
			$data['task_id']=$task_id=$_POST['task_id'];
			
			$inrs_results = json_decode($this->tasks_model->get_checklist_submit_image());
			$data_inrs_results=$inrs_results->data;
			$data['chck_img_id']=$data_inrs_results->insertId;
			
			
			echo $this->load->view('tasks/task_base64_to_jpeg_pop_ajax',$data,true);
			exit;
		}
		
		 
			
			public function get_tasks_status_new_uat_retry_update()
		{
			
				$data['task_id']=$task_id=$_POST['task_id'];
				
				$task_details_list= json_decode($this->tasks_model->get_task_details($task_id));
				$task_record=$task_details_list->data;
				$task_details=$task_record->task;	
				
				// echo '<pre>';print_r($task_details);
				$task_status_ids=explode(',',$task_details->sub_task_status_id);
				 
				 
				$caseNumber=$task_details->task_no;
				$sub_task_nos=explode(',',$task_details->sub_task_no);
				$call_attended_ids=explode(',',$task_details->call_attended_ids);
				$task_status_id_updated_final='';
				if(!empty($task_status_ids)){
					foreach($task_status_ids as $key=>$task_status_id){

						if($task_status_id == 223){
							$LGTaskId=$sub_task_nos[$key];
							$call_attend_by=$call_attended_ids[$key];
							$inrs_results = json_decode($this->tasks_model->get_tasks_status_new_uat_success_retry($caseNumber,$LGTaskId,$call_attend_by));
							if($inrs_results->status==200){
							$task_status_id_updated_final .=$LGTaskId.',';
							}
						}
					}
				}
				if(!empty($task_status_id_updated_final)){
				$data['status'] = 1;
				$data['task_ids_updated'] = $task_status_id_updated_final;
				$data['msg'] = ' Updated successfully....';
				}else{
				$data['status'] =0;
				$data['task_ids_updated'] = $task_status_id_updated_final;
				$data['msg'] = 'Not Updated..';
				}

				echo json_encode($data);
				exit;
		}
		
		
		
		
		
		
		
		
}
