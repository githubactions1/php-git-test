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
		$this->load->database();

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
		
	if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){
					
					// $this->session->unset_userdata('f_fromDate');
			// $this->session->unset_userdata('f_toDate');


			$data11 = array(
			'f_fromDate' => '',
			'f_toDate' => ''
			);
			$this->session->unset_userdata($data11);
					
			$data['title']='Tasks -List';
			$this->load->view('header',$data);
			if($task_category_id == ''){
			$task_category_id=0;
			}
			if($task_status == ''){
			$task_status=217;
			}
		   $emp_id=$this->session->userdata['user']->emp_id;
				
			// $task_list= json_decode($this->tasks_model->get_task_list($emp_id,$task_category_id,0));
			// $data['task_list']=$task_list->data;	
				// $column_name='task_category';
				// $task_main_categories= json_decode($this->tasks_model->get_all_sub_list_with_count(7,$column_name));
				// $data['task_main_categories']=$task_main_categories->data;	
					
				// $column_name='task_status';
				// $task_status_list= json_decode($this->tasks_model->get_all_sub_list_with_count(9,$column_name));
				// $data['task_status_list']=$task_status_list->data;	

				$clusters_list= json_decode($this->tasks_model->get_all_clusters_list_manager_wsie());
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
		


			$task_list= json_decode($this->tasks_model->get_task_list_filters($emp_id,$task_category_id,$task_status));
			$data['task_list']=$task_list->data;	

			$final['list_ajax_div']= $this->load->view('tasks/tasks_list_ajax',$data,TRUE);
			$final['grid_ajax_div']= $this->load->view('tasks/tasks_grid_ajax',$data,TRUE);
			$final['task_category_id']= $task_category_id;
			$final['task_status']= $task_status;
			
			
			$fromDate=$_POST['from_date'];
			$toDate=$_POST['to_date'];
			$fromDate=$this->session->userdata('f_fromDate')=='' ? $fromDate:date('Y-m-d',strtotime($this->session->userdata('f_fromDate')));	
			$toDate=$this->session->userdata('f_toDate')=='' ? $toDate:date('Y-m-d',strtotime($this->session->userdata('f_toDate')));	
			
			$final['session_filter_date']= $fromDate.' <b>to</b> '.$toDate;
			$final['session_from_date']= $fromDate;
			$final['session_to_date']= $toDate;
			
			
			echo json_encode($final);exit;	
	}
   public function get_tasks_list_ajax()
	{
		
		$task_category_id = $this->input->post('task_category_id');
		$task_status = $this->input->post('task_status');
		$emp_id=$this->session->userdata['user']->emp_id;

		
	
		$task_list= json_decode($this->tasks_model->get_task_list($emp_id,$task_category_id,$task_status));
		$data['task_list']=$task_list->data;	

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
		
		/*31-10-2023 */
		$data['task_hardware_used_data']=array();
		if($data['task_details']->task_status == 226){
		$task_detailss= json_decode($this->tasks_model->get_task_details($task_record[0]->parent_id));
		$single_task_record=$task_detailss->data;
		$data['task_hardware_used_data']=$single_task_record->taskhardwareuseddata;
		}
		/*31-10-2023 */
		
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
	
     public function add_notes_images_data($page_type)
	{
		// echo '<pre>';print_r($_POST);exit;
				if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){
				
				$task_id=$_POST['task_id'];	
				
				
				foreach($_POST['img_id'] as $key=>$value)
				{	
					$Img='';
					if($_FILES['attachment']['name'][$key]!='')
					{
						$folder_name='tasks_attachments';
						$width='';
						$height='';
						$this->load->library('upload');
						$uploadImgData = array();
						$_FILES['file']['name']       = $_FILES['attachment']['name'][$key];
						$_FILES['file']['type']       = $_FILES['attachment']['type'][$key];
						$_FILES['file']['tmp_name']   = $_FILES['attachment']['tmp_name'][$key];
						$_FILES['file']['error']      = $_FILES['attachment']['error'][$key];
						$_FILES['file']['size']       = $_FILES['attachment']['size'][$key];
						$uploadPath = 'uploads/'.$folder_name.'/';
						$config['upload_path'] = $uploadPath;
						

						$config['allowed_types'] = 'jpg|jpeg|png|gif';
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						if($this->upload->do_upload('file'))
						{
							$imageData = $this->upload->data();
							$uploadImgData[$key]['image_name'] = $imageData['file_name'];						
						}
						$Img = $uploadImgData[$key]['image_name'];
						$config_image = array();
						$config_image = array(
							'image_library' => 'gd2',
							'source_image' => 'uploads/'.$folder_name.'/'.$Img,
							'new_image' => 'uploads/'.$folder_name.'/'.$Img,
							'maintain_ratio' => FALSE,
							'rotate_by_exif' => TRUE,
							'strip_exif' => TRUE,
						);	
						if(!empty($height)){
							$config_image['height']=$height;
						}	
						if(!empty($width)){
							$config_image['width']=$width;
						}
						$config_image['width']     = 300;
						$config_image['height']   = 375;				
						$this->load->library('image_lib', $config_image);
						$this->image_lib->initialize($config_image);
						$this->image_lib->resize();
						$this->image_lib->clear();
					}
					if(!empty($Img))
					{
						$base_patch=base_url();
						$image_with_path =$base_patch.'uploads/tasks_attachments/'.$Img;
						$inrs_results = json_decode($this->insert_task_notes_images_data($image_with_path));
					}
					
				}
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
	
	
	
		public function insert_task_notes_images_data($image){
		
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		$emp_id=$this->session->userdata['user']->emp_id;
		
		$task_id=$_POST['task_id'];
		
		$primary_task_id=$_POST['task_id'];
		if(isset($_POST['primary_task_id']) && $_POST['primary_task_id']!=''){
			$primary_task_id=$_POST['primary_task_id'];
		}
		
		$note_type=$_POST['note_type'];
		//$note=$_POST['note'];
		
		$note=json_encode(addslashes($_POST['note']));
		$internal_type=$_POST['internal_type'];
		
		
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
			"primary_task_id":"'.$primary_task_id.'",
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
	
	
		public function insert_task_notes_data(){
		
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		$emp_id=$this->session->userdata['user']->emp_id;
		
		$task_id=$_POST['task_id'];
		$primary_task_id=$_POST['task_id'];
		if(isset($_POST['primary_task_id']) && $_POST['primary_task_id']!=''){
			$primary_task_id=$_POST['primary_task_id'];
		}
		
		$note_type=$_POST['note_type'];
		//$note=$_POST['note'];str_replace("'", '', $_POST['note'])
		
		$notes1=str_replace("<", ' < ', $_POST['note']);
		//$notes2=str_replace(">", '', $notes1);
		$note=json_encode(addslashes(str_replace(";", '',$notes1)));
		
		
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
                $config['upload_path'] = 'uploads/tasks_attachments/';
                $config['allowed_types'] = 'gif|jpg|png';
                $this->upload->initialize($config);
                // Try to upload the file
                if ($this->upload->do_upload('attachment')) {
                    // File uploaded successfully, get the base64 encoding
                    $data = $this->upload->data();
					$base_patch=base_url();
                    $image_path =$base_patch.'uploads/tasks_attachments/'.$data['file_name'];
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
			"primary_task_id":"'.$primary_task_id.'",
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
				$opt.='<option value="'.$v->emp_id.'" '.$selected.'>'.$v->emp_name.'('.$v->emp_username.')</option>';
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
		
		
			public function get_clear_tasks_session_search_dates()
		{
			
					
			$this->session->unset_userdata('f_fromDate');
			$this->session->unset_userdata('f_toDate');
			
				$task_status_id_updated_final='success';
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
		 
		
	
		
		
			public function hard_ware_used_update()
	{
		if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){

			$hardware_id=$_POST['hardware_id'];	
			$task_id=$_POST['task_id'];	
			$inrs_results = json_decode($this->tasks_model->update_hard_ware_used());
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
   
   
   
   
   
   public function add_more_images_ajax()
	{		
        $key = $this->input->post('key');
        $attachment_counts = $this->input->post('attachment_counts');
        $data['key'] = $key+1;
        $data['attachment_counts'] = $attachment_counts;
		$this->load->view('tasks/add_more_images_ajax',$data);	
	}
	
	
	public function get_task_hardware_details_data()
	{
		
		$task_id = $this->input->post('task_id');
		$hardware_id = $this->input->post('hardware_id');
		$service_no = $this->input->post('service_no');
		$hardware_id_list=json_decode($this->tasks_model->get_single_hardware_data($hardware_id));
		$hardware_data=$hardware_id_list->data;
		
		
		$hardware_categories_list=json_decode($this->tasks_model->get_category_hardware_data());
		$data['hardware_categories_data']=$hardware_categories_list->data;
		
		$hardware_list=json_decode($this->tasks_model->get_category_wise_hardware_data($hardware_data[0]->cat_id));
		$data['hardware_list_data']=$hardware_list->data;
		
		

		
		
		
		$data['hardware_id']= $hardware_id;
		$data['task_id']= $task_id;
		$data['service_no']= $service_no;
		$data['data']=$hardware_data[0];
	

		echo $this->load->view('tasks/task_hardware_details_ajax',$data,true);
		exit;
	}
	
	
	public function get_category_hardware_list()
		{
			//echo '<pre>';print_r($_POST);exit;
			$cat_id = $this->input->post('cat_id');			
			
		$hardware_list=json_decode($this->tasks_model->get_category_wise_hardware_data($cat_id));
		$hardware_list_data=$hardware_list->data;
		
				if(count($hardware_list_data)>0){
				$opt='<option value="">--Select--</option>';		

				foreach($hardware_list_data as $v){
				$selected='';
				$opt.='<option value="'.$v->part_code.'" '.$selected.'>'.$v->part_code.'</option>';
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
		
		
	public function get_hw_desc_list()
		{
			 $hw_partcode = $this->input->post('hw_partcode');
			$hw_desc_data=json_decode($this->tasks_model->get_single_hw_desc_data($hw_partcode));
			$hw_data=$hw_desc_data->data;
			$data['hw_desc']=$hw_data[0]->hw_desc;
			$data['hw_id']=$hw_data[0]->id;

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
	
	
		
	/* Check list edit */
	
	
	public function get_task_check_list_details_data()
	{
		
		$task_id = $this->input->post('task_id');
		
		$data['task_id']= $task_id;
	
		$check_list_form1= json_decode($this->tasks_model->get_check_list_form_web($task_id));
		$check_list_form_tabs=$check_list_form1->data;
		$data['check_list_form_data']=$check_list_form_tabs->tabs[0];
			
			
		$data['task_check_list']=array();
		$task_check_list1= json_decode($this->tasks_model->get_check_list_submited_tasks_web($task_id));
		$array_data = json_decode(json_encode($task_check_list1->data), true);
		if(!empty($array_data)){
		$data['task_check_list']=$task_check_list1->data[0];
		}
			
			
		echo $this->load->view('tasks/task_check_list_details_ajax',$data,true);
		exit;
	}
	
	
	
	
	public function task_check_list_update_form_ajax()
	{
			$page_type=1;
			$task_id=$_POST['task_id'];
			
			$inrs_results = json_decode($this->tasks_model->check_list_update_form_task_submit());
				
				
				if($inrs_results->status==200){
				$data['status'] = 1;
				$data['page_type'] = $page_type;
				$data['task_id'] = $task_id;
				$data['msg'] = ' Updated successfully....';
				}else{
				$data['status'] =0;
				$data['page_type'] = $page_type;
				$data['task_id'] = $task_id;
				$data['msg'] = 'Not Updated..';
				}

		echo json_encode($data);
		exit;
	}
	
	/* Check list edit */
	
	
	
	
	
	
		/* NEW TASK QUERY PHP */

	 public function get_task_list_new()
	{
		
		$task_category_id = 0;
		$task_status =217;
		$emp_id=$this->session->userdata['user']->emp_id;

		
		$task_list= $this->tasks_model->get_task_list_new($emp_id,$task_category_id,$task_status);
	
		echo '<pre>';print_r($task_list);exit; 

	}
		/* NEW TASK QUERY PHP */
		
		
		
		
		
		
		
		
		/* NEW TASK hard_ware_used_add */
		
		
		
	public function get_task_hardware_details_add()
	{
		
		$task_id = $this->input->post('task_id');
		$hardware_id = $this->input->post('hardware_id');
		$service_no = $this->input->post('service_no');
		

		$hardware_categories_list=json_decode($this->tasks_model->get_category_hardware_data());
		$data['hardware_categories_data']=$hardware_categories_list->data;
		
		
		$data['hardware_id']= $hardware_id;
		$data['task_id']= $task_id;
		$data['service_no']= $service_no;
		$data['data']=array();
	

		echo $this->load->view('tasks/task_hardware_add_ajax',$data,true);
		exit;
	}
		
			
				public function hard_ware_used_add()
		{
			
			
			if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){

				$hardware_id=$_POST['hardware_id'];	
				$task_id=$_POST['task_id'];	
				$inrs_results = json_decode($this->tasks_model->insert_hard_ware_used());
				if($inrs_results->status==200)
				{
				$this->session->set_flashdata('success', 'Added Successfully...');
					redirect('Tasks/update_task/'.$task_id.''); 
				}
				else
				{
				$this->session->set_flashdata('error', 'Not Added...');
					redirect('Tasks/update_task/'.$task_id.''); 
				}			
				
			}
		}
		
		/* NEW TASK hard_ware_used_add */
	
}
