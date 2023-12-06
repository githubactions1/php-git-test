<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	function __construct() { 
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session'); 
		//$this->load->model('login_model');
	}
	 
	public function index()
	{
		

		if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){
			$clusters_list= json_decode($this->get_all_clusters_list());
			$data['clusters_list']=$clusters_list->data;
            $clusters_list_emp= json_decode($this->get_clusters_byempid());
			$data['clusters_byid']=$clusters_list_emp->data;			
			$bussinfo= json_decode($this->get_bussinfo());
			$data['businfo_list']=$bussinfo->data;
			$kpi_results= json_decode($this->get_kpiinfo());
			$data['kpi_list']=$kpi_results->data;
			
				$this->load->view('header');
			    $this->load->view('settings/settings',$data);
				$this->load->view('footer');
		}else{
			 redirect('Welcome');	
		}

	}
	

	public function team_setup()
	{
		

		if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){
					
				
				$this->load->view('header');
			

				$this->load->view('settings/team_setup');
				$this->load->view('footer');
		}else{
			 redirect('Welcome');	
		}

	}
	

	public function organization_setup()
	{
		

		if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){
					
					$tasktype_list= json_decode($this->gettasktype());
		$data['tasktypelist']=$tasktype_list->data;		
							
					$data['title'] = 'Organization Setup';
					$this->load->view('header');
			

				$this->load->view('settings/organization_setup',$data);
				$this->load->view('footer');
		}else{
			 redirect('Welcome');	
		}

	}
	

	
  /* Start zones   */
		
		
	public function zones()
	{
		if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){
		
		$data['title'] = 'Zones';
		$this->load->view('header',$data);




		$zones_list= json_decode($this->get_all_zones_list());
		$data['zones_list']=$zones_list->data;
		$this->load->view('settings/zones',$data);
		$this->load->view('footer');
		}else{
		redirect('Welcome');	
		}
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
				"status":0
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



		
	public function insert_zone(){
	$data=array();
	if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){ 
				if(!empty($_POST))
			{ 
				$inrs_results = json_decode($this->insertzone());
				if($inrs_results->status==200){
					$data['status'] = 1;
					$data['msg'] = ' Submitted successfully....';
					}else{
					$data['status'] =0;
					$data['msg'] = 'Not Submitted..';
					}

					echo json_encode($data);
			}
			}
			else{
				 redirect('Welcome');	
			}
	}




		public function insertzone(){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		$zone_name=$_POST['zone_name'];
		
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'zone/insertzone',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
		"zone_name":"'.$zone_name.'"
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
		
		

		public function update_zone(){
		  $data=array();
			if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){ 
				if(!empty($_POST))
			{ 
				$inrs_results = json_decode($this->updatezone());
				if($inrs_results->status==200){
					$data['status'] = 1;
					$data['msg'] = ' Submitted successfully....';
					}else{
					$data['status'] =0;
					$data['msg'] = 'Not Submitted..';
					}

					echo json_encode($data);
			}
			}
			else{
				 redirect('Welcome');	
			}
		}
		public function updatezone(){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		$zone_name=$_POST['zone_name'];
		$zone_id=$_POST['zone_id'];
		$admin=$this->session->userdata['user']->emp_id;

		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'zone/updatezone',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
		"zone_name":"'.$zone_name.'",
		"zone_id":"'.$zone_id.'"
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




	public function get_single_zone_id_data()
		{
			$zone_id = $this->input->post('zone_id');
			$zones_list=json_decode($this->get_single_zone_data($zone_id));
			$zone_data=$zones_list->data;
			$data['zone_id']= $zone_id;
			$data['zone_name']=$zone_data[0]->zone_name;

			if($data == false)
			{
			$this->session->set_userdata('error_message', "Department not exists");
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
		
		
		
	public function get_single_zone_data($zone_id){
			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'zone/getzonebyid/'.$zone_id,
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
	
	
	
	public function update_zone_status($zone_status,$zone_id){
	$data=array();
			if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){ 
			
			
				if(isset($zone_status) && $zone_status!='')
			{ 
				$inrs_results = json_decode($this->update_zone_status_api($zone_status,$zone_id));
				if($inrs_results->status==200)
				{
					$this->session->set_flashdata('success', 'Updated Successfully...');
					redirect('Settings/zones'); 
				}
				else
				{
					$this->session->set_flashdata('error', 'Not Updated...');
					redirect('Settings/zones'); 
				}
			}
			
			}
			else{
				 redirect('Welcome');	
			}


	}
	
	
	
	public function update_zone_status_api($zone_status,$zone_id){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		$zone_status=$zone_status==1?'0':'1';
		$zone_id=$zone_id;

		$admin=$this->session->userdata['user']->emp_id;

		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'zone/deletezone',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
		"zone_status":"'.$zone_status.'",
		"zone_id":"'.$zone_id.'"
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
	
		
		
		/* End Zones   */
		
		
		
		
		
		/* Start States   */
	
		public function states()
		{
			

			if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){


	
			$data['title'] = 'States';
			$this->load->view('header',$data);

			$states_list= json_decode($this->get_all_states_list());
			$data['states_list']=$states_list->data;
		
			
				
			$zones_list= json_decode($this->get_all_zones_list());
			$data['zones_list']=$zones_list->data;
			$this->load->view('settings/states',$data);
			$this->load->view('footer');
			}else{
			redirect('Welcome');	
			}

		}
		
		
		
	public function insert_state(){
	$data=array();
	if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){ 
				if(!empty($_POST))
			{ 
				$inrs_results = json_decode($this->insertstate());
				if($inrs_results->status==200){
					$data['status'] = 1;
					$data['msg'] = ' Submitted successfully....';
					}else{
					$data['status'] =0;
					$data['msg'] = 'Not Submitted..';
					}

					echo json_encode($data);
			}
			}
			else{
				 redirect('Welcome');	
			}

	}




		public function insertstate(){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		$state_name=$_POST['state_name'];
		$zone_id=$_POST['zone_id'];
		
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'state/insertstate',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
		"state_name":"'.$state_name.'",
		"zone_id":"'.$zone_id.'"
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
		
		

		public function update_state(){
		  $data=array();
			if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){ 
				if(!empty($_POST))
			{ 
				$inrs_results = json_decode($this->updatestate());
				if($inrs_results->status==200){
					$data['status'] = 1;
					$data['msg'] = ' Submitted successfully....';
					}else{
					$data['status'] =0;
					$data['msg'] = 'Not Submitted..';
					}

					echo json_encode($data);
			}
			}
			else{
				 redirect('Welcome');	
			}

		}
		public function updatestate(){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		$state_name=$_POST['state_name'];
		$state_id=$_POST['state_id'];
		$zone_id=$_POST['zone_id'];
		$admin=$this->session->userdata['user']->emp_id;

		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'state/updatestate',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
		"state_name":"'.$state_name.'",
		"zone_id":"'.$zone_id.'",
		"state_id":"'.$state_id.'"
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
				"status":0
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
	
	
	
	

	public function get_single_state_id_data()
		{
			$state_id = $this->input->post('state_id');
			$states_list=json_decode($this->get_single_state_data($state_id));
			$state_data=$states_list->data;
			$data['state_id']= $state_id;
			$data['state_name']=$state_data[0]->state_name;
			$data['zone_id']=$state_data[0]->zone_id;

			if($data == false)
			{
			$this->session->set_userdata('error_message', "State not exists");
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
		
		
		
	public function get_single_state_data($state_id){
			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'state/getstatebyid/'.$state_id,
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
	
	
	
	
		
	public function update_state_status($state_status,$state_id){
	$data=array();
			if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){ 
			
			
				if(isset($state_status) && $state_status!='')
			{ 
				$inrs_results = json_decode($this->update_state_status_api($state_status,$state_id));
				if($inrs_results->status==200)
				{
					$this->session->set_flashdata('success', 'Updated Successfully...');

					redirect('Settings/states'); 
				}
				else
				{
					$this->session->set_flashdata('error', 'Not Updated...');

					redirect('Settings/states'); 
				}
			}
			
			}
			else{
				 redirect('Welcome');	
			}


	}
	
	
	
	public function update_state_status_api($state_status,$state_id){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		$state_status=$state_status==1?'0':'1';
		$state_id=$state_id;

		$admin=$this->session->userdata['user']->emp_id;

		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'state/deletestate',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
		"state_status":"'.$state_status.'",
		"state_id":"'.$state_id.'"
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
		
		
		
		/* End States   */
		
		
		
		
		
		
		
		
		/* Start clusters   */
	
		public function clusters()
		{
			

			if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){


			
			$data['title'] = 'Clusters';
			$this->load->view('header',$data);

			$clusters_list= json_decode($this->get_all_clusters_list());
			$data['clusters_list']=$clusters_list->data;
		
			
				
			$zones_list= json_decode($this->get_all_zones_list());
			$data['zones_list']=$zones_list->data;
			$this->load->view('settings/clusters',$data);
			$this->load->view('footer');
			}else{
			redirect('Welcome');	
			}

		}
		
		
		
	public function insert_cluster(){
	$data=array();
	if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){ 
				if(!empty($_POST))
			{ 
				$inrs_results = json_decode($this->insertcluster());
				if($inrs_results->status==200){
					$data['status'] = 1;
					$data['msg'] = ' Submitted successfully....';
					}else{
					$data['status'] =0;
					$data['msg'] = 'Not Submitted..';
					}

					echo json_encode($data);
			}
			}
			else{
				 redirect('Welcome');	
			}

	}




		public function insertcluster(){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		$cluster_name=$_POST['cluster_name'];
		$zone_id=$_POST['zone_id'];
		$stste_id=$_POST['stste_id'];
		$latitude=$_POST['latitude'];
		$langitude=$_POST['langitude'];
		$address=$_POST['address'];
		$pincode=$_POST['pincode'];
		$emp_no=$_POST['emp_no'];
		$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => API_MAIN_URL.'clusters/insertclusters',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
   
   "state_id":"'.$stste_id.'",
    "zone_id":"'.$zone_id.'",
    "cluster_name":"'.$cluster_name.'",
    "cluster_status":"1",
     "latitude":"'.$latitude.'",
    "longitude":"'.$langitude.'",
    "address":"'.$address.'",
     "pincodes":"'.$pincode.'",
   "min_task_per_emp":"'.$stste_id.'"

    
}
',
  CURLOPT_HTTPHEADER => array(
    'x-access-token:'.$token,
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
return $response;

		
	}
		
		

		public function update_cluster(){
		 $data=array();
	if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){ 
				if(!empty($_POST))
			{ 
				$inrs_results = json_decode($this->updatecluster());
				if($inrs_results->status==200){
					$data['status'] = 1;
					$data['msg'] = ' Submitted successfully....';
					}else{
					$data['status'] =0;
					$data['msg'] = 'Not Submitted..';
					}

					echo json_encode($data);
			}
			}
			else{
				 redirect('Welcome');	
			}



		}
		public function updatecluster(){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		$cluster_name=$_POST['cluster_name'];
		$cluster_id=$_POST['cluster_id'];
		$zone_id=$_POST['zone_id'];
		$stste_id=$_POST['state_id'];
		$latitude=$_POST['latitude'];
		$langitude=$_POST['langitude'];
		$address=$_POST['address'];
		$pincode=$_POST['pincode'];
		$emp_no=$_POST['emp_no'];

		$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => API_MAIN_URL.'clusters/updateclusters',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
   
   "state_id":"'.$stste_id.'",
    "zone_id":"'.$zone_id.'",
    "cluster_name":"'.$cluster_name.'",
    "cluster_status":1,
     "latitude":"'.$latitude.'",
    "longitude":"'.$langitude.'",
    "address":"'.$address.'",
     "pincodes":"'.$pincode.'",
   "min_task_per_emp":"'.$emp_no.'",
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
	
	
	
	

	public function get_single_cluster_id_data()
		{
			$cluster_id = $_POST['cluster_id'];
			$clusters_list=json_decode($this->get_single_cluster_data($cluster_id));
			$data['clusters_list']=$clusters_list->data;
			$zone_list=json_decode($this->get_all_zones_list());
			$data['zone_lists']=$zone_list->data;
			$state_list=json_decode($this->get_all_states_list());
			$data['state_lists']=$state_list->data;
						foreach($data['clusters_list'] as $cluster){
							$z_id=$cluster->zone_id;
							$c_id=$cluster->cluster_id;
							$state_id=$cluster->state_id;
							$cluster_name=$cluster->cluster_name;
							$latitude=$cluster->latitude;
							$longitude=$cluster->longitude;
							$address=$cluster->address;
							$pincodes=$cluster->pincodes;
							$min_task_per_emp=$cluster->min_task_per_emp;
							}
							echo $cluster_name.'~'.$latitude.'~'.$longitude.'~'.$address.'~'.$pincodes.'~'.$min_task_per_emp.'~'.$c_id.'~';
			?>
			<option selected>Select</option>
			<?php
			foreach($data['zone_lists'] as $zone){
			?> 
			<option value="<?php echo $zone->zone_id;?>"  <?php if ($z_id== $zone->zone_id){
                    echo 'selected="selected"';
                }?>><?php echo $zone->zone_name;?></option>
			<?php 
			} 
		echo '~';
			?>
			<option selected>Select</option>
			<?php
			foreach($data['state_lists'] as $state){
			?> 
			<option value="<?php echo $state->state_id;?>"  <?php if ($state_id== $state->state_id){
                    echo 'selected="selected"';
                }?>><?php echo $state->state_name;?></option>
			<?php 
			} 
		}
		
		
	public function get_single_cluster_data($cluster_id){
			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'clusters/getclustersbyid/'.$cluster_id,
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
	
	
	
	
		
	public function update_cluster_status($cluster_status,$cluster_id){
	$data=array();
			if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){ 
			
			
				if(isset($cluster_status) && $cluster_status!='')
			{ 
				$inrs_results = json_decode($this->update_cluster_status_api($cluster_status,$cluster_id));
				if($inrs_results->status==200)
				{
				$this->session->set_flashdata('success', 'Updated Successfully...');

					redirect('Settings/clusters'); 
				}
				else
				{
					$this->session->set_flashdata('error', 'Not Updated...');
					redirect('Settings/clusters'); 
				}
			}
			
			}
			else{
				 redirect('Welcome');	
			}


	}
	
	
	
	public function update_cluster_status_api($cluster_status,$cluster_id){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		$cluster_status=$cluster_status==1?'0':'1';
		$cluster_id=$cluster_id;

		$admin=$this->session->userdata['user']->emp_id;

		$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => API_MAIN_URL.'clusters/deleteclusters',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "cluster_id":"'.$cluster_id.'",
    "cluster_status":"'.$cluster_status.'"
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
		
		
		
		/* End clusters   */
		
		
	public function getstatebyzoneid(){
	
	       $ststelistbyid= json_decode($this->getstateby_zoneid());
			$data['statelist_byid']=$ststelistbyid->data;
		if(!empty($data['statelist_byid'])){
			?>
			 <option selected>Select</option>

			<?php
			foreach($data['statelist_byid'] as $key=>$state){
			?> 
			<option value="<?php echo $state->state_id;?>"><?php echo $state->state_name;?></option>
			<?php } } 
			
	}	
	public function getstateby_zoneid(){
$zone_id=$_POST['z_id'];		
	$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
	$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => API_MAIN_URL.'state/getstatebyzone',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "zone_id": "'.$zone_id.'"
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

	public function vendors(){
	if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){
		
		$vendors_count= json_decode($this->get_vendors_count());
	$get_vendors_count=$vendors_count->data[0];
	$data['vendorscount']=$get_vendors_count->count;
	
	$cluster_data= json_decode($this->getclusters());
				$data['clustersdata']=$cluster_data->data;

				
	$vendors_data= json_decode($this->getvendordetails());
				$data['vendorsdata']=$vendors_data->data;			
					
					$this->load->view('header');
					$this->load->view('settings/vendors_list',$data);
					$this->load->view('footer');
					}else{
					redirect('Welcome');	
					}	

		
		
		
	}

	public function getclusters(){
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
	public function getvendordetails(){
	$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => API_MAIN_URL.'vender/getvenderdetails',
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

	public function add_vendors(){
	if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){ 
	$vendo_results = json_decode($this->addvendors());
	if($vendo_results->status==200)
	{
	$this->session->set_flashdata('success', 'Added Successfully...');

	redirect('Settings/vendors'); 
	}
	else
	{
	$this->session->set_flashdata('error', 'Not Updated...');
	redirect('Settings/vendors'); 
	}
	}
	else{
	redirect('Welcome');	
	}	
	}



	public function addvendors(){
	$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];

		 $v_name=$_POST['v_name'];	
		 $v_code=$_POST['v_code'];	
		  $cluster_id=implode(",",$_POST['cluster_id']);
		 $start_date=$_POST['start_date'];	
		 $end_date=$_POST['end_date'];	
	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => API_MAIN_URL.'vender/insertintovender',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS =>'{
		"vendor_name": "'.$v_name.'",
		"vendor_code": "'.$v_code.'",
		"cluster_ids":"'.$cluster_id.'",
		"start_date": "'.$start_date.'",
		"end_date": "'.$end_date.'"
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




	public function vendor_delete(){
	if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){ 
	$vendor_id=$this->uri->segment(3);
	$vendo_results = json_decode($this->vendordelete($vendor_id));
	if($vendo_results->status==200)
	{
	$this->session->set_flashdata('success', 'Deleted Successfully...');

	redirect('Settings/vendors'); 
	}
	else
	{
	$this->session->set_flashdata('error', 'Not Updated...');
	redirect('Settings/vendors'); 
	}
	}
	else{
	redirect('Welcome');	
	}	
	}
	public function vendordelete($vendor_id){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];

		$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => API_MAIN_URL.'vender/deletevenderdetails',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS =>'{
		"vendor_id":"'.$vendor_id.'"
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
	public function get_vendorid(){
	$vid=$_POST['v_id'];	
	$vendors_data= json_decode($this->getvendordetailsbyid($vid));
	$data['vendorsdata']=$vendors_data->data;
	$cluster_data= json_decode($this->getclusters());
	$data['clustersdata']=$cluster_data->data;


	foreach($data['vendorsdata'] as $vendorsdetails){
		
		$vendor_id=$vendorsdetails->vendor_id;
		$vendor_name=$vendorsdetails->vendor_name;
		$vendor_code=$vendorsdetails->vendor_code;
		$formated_start_date=$vendorsdetails->formated_start_date;
		$formated_end_date=$vendorsdetails->formated_end_date;
		 $cluster_ids=$vendorsdetails->cluster_ids;
		$clusterids=explode(",",$cluster_ids);
	echo  $vendor_id.'~'.$vendor_name.'~'.$vendor_code.'~'.$formated_start_date.'~'.$formated_end_date.'~';
	?>
	<option >Select</option>
				<?php
				foreach($data['clustersdata'] as $cluster){
				?> 
				<option value="<?php echo $cluster->cluster_id;?>"  <?php if (in_array($cluster->cluster_id,$clusterids)){
						echo 'selected="selected"';
					}?>><?php echo $cluster->cluster_name;?></option>
	<?php	
	}			
		
	}
	}	

	public function getvendordetailsbyid($vid){
	$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];	
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => API_MAIN_URL.'vender/getvenderdetailsbyid/"'.$vid.'"',
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
	public function edit_vendors(){
		
	if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){ 
	$vendo_results = json_decode($this->editvendors());
	if($vendo_results->status==200)
	{
	$this->session->set_flashdata('success', 'Updated Successfully...');

	redirect('Settings/vendors'); 
	}
	else
	{
	$this->session->set_flashdata('error', 'Not Updated...');
	redirect('Settings/vendors'); 
	}
	}
	else{
	redirect('Welcome');	
	}		
	}
	public function editvendors(){
	$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];	

	 $edit_vendor_id=$_POST['edit_vendor_id'];
	 $edit_vendor_name=$_POST['edit_vendor_name'];
	 $edit_vendor_code=$_POST['edit_vendor_code'];
	 $edit_ven_clust_id=implode(",",$_POST['edit_ven_clust_id']);
	 $edit_vendor_sdate=$_POST['edit_vendor_sdate'];
	 $edit_vendor_ddate=$_POST['edit_vendor_ddate'];



	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => API_MAIN_URL.'vender/updatevenderdetails',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS =>'{
		"vendor_id": "'.$edit_vendor_id.'",
		"vendor_name": "'.$edit_vendor_name.'",
		"vendor_code": "'.$edit_vendor_code.'",
		"cluster_ids": "'.$edit_ven_clust_id.'",
		"start_date": "'.$edit_vendor_sdate.'",
		"end_date": "'.$edit_vendor_ddate.'",
		"status": 1
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
	
	public function org()
	{
		

		if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){
					
		$zones_list= json_decode($this->get_all_zones_list());
		$data['zones_list']=$zones_list->data;
		//$states_list= json_decode($this->get_all_states_list());
		//$data['states_list']=$states_list->data;
			
				//$this->load->view('header');
			    $this->load->view('settings/geocoding',$data);
				//$this->load->view('footer');
		}else{
			 redirect('Welcome');	
		}

	}
	
public function add_organization(){
	if(isset($_POST['org_utype']) && $_POST['org_utype']==1){
		
		$inrs_results = json_decode($this->insertorgcluster());
		
	}
	if(isset($_POST['org_utype']) && $_POST['org_utype']==2){
		
		$inrs_results = json_decode($this->insertorgzone());
		
	}
	if(isset($_POST['org_utype']) && $_POST['org_utype']==3){
		
		
		$inrs_results = json_decode($this->insertorgstate());
	}
	
	if($inrs_results->status==200)
	{
	$this->session->set_flashdata('success', 'Added Successfully...');

	redirect('Settings/org'); 
	}
	else
	{
	$this->session->set_flashdata('error', 'Not Updated...');
	redirect('Settings/org'); 
	}
	//Array ( [org_uid] => 101 [org_utype] => 2 [org_uname] => new cluster [address] => vijayawada [pincode] => 522509 [lat] => 14.748596 [long] => 74.589648 [min_task_emp] => 2 [save] => Save )
	
	
	
	
}
public function insertorgcluster(){
	$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
    $org_uid=$_POST['org_uid'];
	$org_uname=$_POST['org_uname'];
	$address=$_POST['address'];
	$pincode=$_POST['pincode'];
	$lat=$_POST['lat'];
	$long=$_POST['long'];	
	$min_task_emp=$_POST['min_task_emp'];
    $org_unit=$_POST['org_unit'];
$state_id=$_POST['state_id'];
	
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => API_MAIN_URL.'clusters/insertclusters',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
   
   "state_id":"'.$state_id.'",
    "zone_id":"'.$org_unit.'",
    "cluster_name":"'.$org_uname.'",
    "cluster_status":"1",
     "latitude":"'.$lat.'",
    "longitude":"'.$long.'",
    "address":"'.$address.'",
     "pincodes":"'.$pincode.'",
   "min_task_per_emp":"'.$min_task_emp.'"

    
}
',
  CURLOPT_HTTPHEADER => array(
    'x-access-token:'.$token,
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;
//die;
return $response;
}

public function insertorgzone(){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		//$zone_name=$_POST['zone_name'];
		$org_uname=$_POST['org_uname'];
		
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'zone/insertzone',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
		"zone_name":"'.$org_uname.'"
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
	public function insertorgstate(){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		//$state_name=$_POST['state_name'];
		//$zone_id=$_POST['zone_id'];
		$org_uname=$_POST['org_uname'];
		$org_unit=$_POST['org_unit'];
		
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_MAIN_URL.'state/insertstate',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
		"state_name":"'.$org_uname.'",
		"zone_id":"'.$org_unit.'"
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
	public function insert_bascinfo(){
		//print_r($_POST);
		//die;
			
	$inrs_results = json_decode($this->insertbascinfo());
	
	
	if($inrs_results->status==200)
	{
	$this->session->set_flashdata('success', 'Added Successfully...');

	redirect('Settings'); 
	}
	else
	{
	$this->session->set_flashdata('error', 'Not Updated...');
	redirect('Settings'); 
	}
	

}

public function insertbascinfo(){
$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
$org_unit=$_POST['org_unit'];
//print_r($_POST);
//die;
//Array ( [org_unit] => 2 [allow_backdate_leave] => on [backdate_leave] => 20 [location_interval] => 2 [attendance_away_offlocation] => on 
//[office_center_location] => 20 [punchin_location] => on [late_attendance] => 10 [late_attendance_sms_alert] => on [kpi_refreshed] => 
//[location_tr_outside] => on [check_in_tasklocation] => on [duration_old_task] => 15 [max_attach_size] => 2000 [task_send_sms_to_manger] => on 
//[weekly_off] => on [weeks] => Array ( [0] => on [1] => on ) [send_sms] => on [submit] => Save )

if(isset($_POST['allow_backdate_leave']) && $_POST['allow_backdate_leave']!=""){
$allow_backdate_leave=1;	
}
else{
$allow_backdate_leave=0;	
}


if(isset($_POST['attendance_away_offlocation']) && $_POST['attendance_away_offlocation']!=""){
$attendance_away_offlocation=1;	
}
else{
$attendance_away_offlocation=0;	
}

if(isset($_POST['punchin_location']) && $_POST['punchin_location']!=""){
$punchin_location=1;	
}
else{
$punchin_location=0;	
}


if(isset($_POST['late_attendance_sms_alert']) && $_POST['late_attendance_sms_alert']!=""){
$late_attendance_sms_alert=1;	
}
else{
$late_attendance_sms_alert=0;	
}

if(isset($_POST['location_tr_outside']) && $_POST['location_tr_outside']!=""){
$location_tr_outside=1;	
}
else{
$location_tr_outside=0;	
}
if(isset($_POST['check_in_tasklocation']) && $_POST['check_in_tasklocation']!=""){
$check_in_tasklocation=1;	
}
else{
$check_in_tasklocation=0;	
}

if(isset($_POST['task_send_sms_to_manger']) && $_POST['task_send_sms_to_manger']!=""){
$task_send_sms_to_manger=1;	
}
else{
$task_send_sms_to_manger=0;	
}
if(isset($_POST['weekly_off']) && $_POST['weekly_off']!=""){
$weekly_off=1;	
}
else{
$weekly_off=0;	
}
if(isset($_POST['send_sms']) && $_POST['send_sms']!=""){
$send_sms=1;	
}
else{
$send_sms=0;	
}
$weeks=implode(',',$_POST['weeks']);

$backdate_leave=$_POST['backdate_leave'];
$location_interval=$_POST['location_interval'];
//$attendance_away_offlocation=$_POST['attendance_away_offlocation'];
$office_center_location=$_POST['office_center_location'];
//$punchin_location=$_POST['punchin_location'];
$late_attendance=$_POST['late_attendance'];
$sms_alert=$_POST['sms_alert'];	
$kpi_refreshed=$_POST['kpi_refreshed'];
//$location_tr_outside=$_POST['location_tr_outside'];
//$check_in_tasklocation=$_POST['check_in_tasklocation'];
$duration_old_task=$_POST['duration_old_task'];
$max_attach_size=$_POST['max_attach_size'];
$send_sms_to_manger=$_POST['send_sms_to_manger'];
//$late_attendance_sms_alert=$_POST['late_attendance_sms_alert'];	
//$weekly_off=$_POST['weekly_off'];
//$send_sms=$_POST['send_sms'];
	
// api 



$curl = curl_init();

curl_setopt_array($curl, array(
  //CURLOPT_URL => 'http://sify.digitalrupay.com/devapirt1/sify/tasksections/updatebussinessinfodata',
  CURLOPT_URL => API_MAIN_URL.'tasksections/updatebussinessinfodata',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "meta_title":"testing",
    "business_name":"testingg",
    "location_interval_min":"'.$location_interval.'",
    "allow_back_dated_leaves_till":"'.$backdate_leave.'",
    "allow_to_apply_back_dated_leave":"'.$allow_backdate_leave.'", 
    "mark_late_attendance_after":"'.$late_attendance.'",
    "allow_marking_attendance_away_from_office_location":"'.$attendance_away_offlocation.'",
    "call_manager_option_mobile":"'.$late_attendance_sms_alert.'",
    "default_leaves":"'.$backdate_leave.'",
    "office_base_frm_cntr_location":"'.$office_center_location.'",
    "location_mandatory_punch":"'.$punchin_location.'",
    "late_attendance_alert":"'.$late_attendance_sms_alert.'",
    "travel_onsite_location":"'.$check_in_tasklocation.'",
    "duration_old_tasks":"'.$duration_old_task.'",
    "maximum_attachment_size":"'.$max_attach_size.'",
    "employee_specific_weekoff":"'.$weekly_off.'",
    "weeks":"'.$weeks.'",
    "call_manager_option":"'.$send_sms.'",
    "business_id":1,
	"alert_sms_task":"'.$task_send_sms_to_manger.'"

}',
  CURLOPT_HTTPHEADER => array(
    'x-access-token:'.$token,
	'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;	
return $response;
}
public function get_bussinfo(){
	$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
	
	$curl = curl_init();

curl_setopt_array($curl, array(
  //CURLOPT_URL => 'http://sify.digitalrupay.com/devapirt1/sify/tasksections/selectbussinessinfodata',
  CURLOPT_URL => API_MAIN_URL.'tasksections/selectbussinessinfodata',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "business_id":1
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
public function add_shift(){
	
$inrs_shit_results = json_decode($this->addshift());
	
	
	if($inrs_shit_results->status==200)
	{
	$this->session->set_flashdata('success', 'Added Successfully...');

	redirect('Settings'); 
	}
	else
	{
	$this->session->set_flashdata('error', 'Not Updated...');
	redirect('Settings'); 
	}
}
public function addshift(){
	$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
	
	$stime=$_POST['ss_time'];
	$etime=$_POST['se_time'];
	$cluster_id=$_POST['cl_id'];
	$zone_id=$_POST['zone_id'];
	$state_id=$_POST['state_id'];
	$shift_name=$_POST['shift_name'];
	
	
$curl = curl_init();

curl_setopt_array($curl, array(
  //CURLOPT_URL => 'http://sify.digitalrupay.com/devapirt1/sify/tasksections/insertshiftdata',
  CURLOPT_URL => API_MAIN_URL.'tasksections/insertshiftdata',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "cluster_id":"'.$cluster_id.'",
    "state_id":"'.$state_id.'",
    "zone_id":"'.$zone_id.'",
    "shift_name":"'.$shift_name.'", 
    "shift_start_date":"'.$stime.'",
    "shift_end_date":"'.$etime.'"
}',
  CURLOPT_HTTPHEADER => array(
    'x-access-token:'.$token,
	'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
return  $response;
//die;
}

public function get_shift_cluster_by_id()
{
$cluster_id = $_POST['c_id'];
?>
<p>Shift <span class="text-danger">*</span></p>
<?php
$shift_list=json_decode($this->getshiftbyid($cluster_id));
$data['shift_lists']=$shift_list->data;
foreach($data['shift_lists'] as $shits){
?>

<div class="col-md-4">
<!--<p>Shift <span class="text-danger">*</span></p>-->
<div class="card">
<div class="card-body">
<div class="row">
<div class="col-md-10">
<p><?php echo $shits->shift_name;?>:<?php echo $shits->diff_time;?>Hrs</p>
</div>
<div class="col-md-1">
<p style="cursor: pointer;" onclick='myclick("<?php echo $shits->shift_id.'~'.$shits->shift_start_date.'~'.$shits->shift_end_date.'~'.$shits->shift_name.'~'.$shits->zone_id.'~'.$shits->state_id.'~'.$shits->cluster_id;?>")'><i class="fa fa-edit"></i></p>
</div>
<div class="col-md-1">
<p onclick='shdelete("<?php echo $shits->shift_id;?>")' style="cursor: pointer;"><i class="fa fa-trash"></i></p>
<input type="hidden" class="ddata1" id="sdata"value="<?php echo $shits->shift_id.'~'.$shits->shift_start_date.'~'.$shits->shift_end_date.'~'.$shits->shift_name;?>">
</div>
<div class="col-md-5">
<input class="form-control gray-bg" type="time" value="<?php echo $shits->shift_start_date;?>" id="example-time-input" readonly>
</span> </div>
<div class="col-md-2 text-center">
<p>to</p>
</div>
<div class="col-md-5">
<input class="form-control gray-bg" type="time" value="<?php echo $shits->shift_end_date;?>" id="example-time-input" readonly>
</div>
</div>
</div>
</div>
</div>

<?php
}
}
	
	
		
public function getshiftbyid($cluster_id){
$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
$curl = curl_init();

curl_setopt_array($curl, array(
//CURLOPT_URL => 'http://sify.digitalrupay.com/devapirt1/sify/tasksections/getshiftdata',
  CURLOPT_URL => API_MAIN_URL.'tasksections/getshiftdata',
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => '',
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => 'POST',
CURLOPT_POSTFIELDS =>'{
"cluster_id":"'.$cluster_id.'"
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

public function get_kpiinfo(){
$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];	
$curl = curl_init();

curl_setopt_array($curl, array(
//CURLOPT_URL => 'http://sify.digitalrupay.com/devapirt1/sify/categories/getsubcategories',
  CURLOPT_URL => API_MAIN_URL.'categories/getsubcategories',
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => '',
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => 'POST',
CURLOPT_POSTFIELDS =>'{
"sub_cat_status":1,
"cat_id":9
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

public function get_clusters_byempid(){
	$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
	$emp_id=$this->session->userdata['user']->emp_id;
$curl = curl_init();

curl_setopt_array($curl, array(
  //CURLOPT_URL => 'http://sify.digitalrupay.com/devapirt1/sify/clusters/getclustersbyemplye',
  CURLOPT_URL => API_MAIN_URL.'clusters/getclustersbyemplye',
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
public function update_shift(){
	
$up_shit_results = json_decode($this->updateshift());
	
	
	if($up_shit_results->status==200)
	{
	$this->session->set_flashdata('success', 'Updated Successfully...');

	redirect('Settings'); 
	}
	else
	{
	$this->session->set_flashdata('error', 'Not Updated...');
	redirect('Settings'); 
	}	
}
public function updateshift(){
	$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
	
	$stime=$_POST['ss_time'];
	$etime=$_POST['se_time'];
	$sh_id=$_POST['sh_id'];
	$zone_id=$_POST['zone_id'];
	$state_id=$_POST['state_id'];
	$shift_name=$_POST['shift_name'];
	$cluster_id=$_POST['cluster_id'];

$curl = curl_init();

curl_setopt_array($curl, array(
  //CURLOPT_URL => 'http://sify.digitalrupay.com/devapirt1/sify/tasksections/updateshiftdata',
  CURLOPT_URL => API_MAIN_URL.'tasksections/updateshiftdata',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "cluster_id":"'.$cluster_id.'",
    "state_id":"'.$state_id.'",
    "zone_id":"'.$zone_id.'",
    "shift_name":"'.$shift_name.'", 
    "shift_start_date":"'.$stime.'",
    "shift_end_date":"'.$etime.'",
    "status":1,
	"shift_id":"'.$sh_id.'"
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
public function delete_shift(){
$del_shit_results = json_decode($this->deleteshift());
if($del_shit_results->status==200)
{
$data['status'] = 1;
$data['msg'] = ' Submitted successfully....';
}else{
$data['status'] =0;
$data['msg'] = 'Not Submitted..';
}

echo json_encode($data);	

	
	
}

public function deleteshift(){
$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
$sh_id=$_POST['shiftid'];
//echo $sh_id;

$curl = curl_init();
curl_setopt_array($curl, array(
  //CURLOPT_URL => 'http://sify.digitalrupay.com/devapirt1/sify/tasksections/deleteshiftdata',
  CURLOPT_URL => API_MAIN_URL.'tasksections/deleteshiftdata',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
"shift_id":"'.$sh_id.'"
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
public function get_vendors_count(){
	$token=$this->session->userdata['user']->token;
	$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => API_MAIN_URL.'vender/getvendercount',
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
public function gettasktype(){
	$token=$this->session->userdata['user']->token;
	$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => API_MAIN_URL.'complaintcategories/getcomplaintcategories',
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


}
