<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	function __construct() { 
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session'); 
		//$this->load->library('curl');
		//$this->load->model('login_model');
	}
	
	public function index()
	{
		$data = array();
		
	
		 redirect('Welcome');	
	
	
		 
	}
	
	
	
	
		public function ajax_submit_form()
	{
			$user_access = $this->check_customer_login(); 
			$decode=json_decode($user_access);
			
			if($decode->status==200){
				$record1=$decode->data->user;
				//$token=$decode->data->token;


				// echo '<pre>';print_r($record1->token);
				$emp_id=$record1->emp_id;
				$token=$record1->token;
				// $user['token'] =$record1->token;
				$user=(array) $record1;

				$array = array(
				'emp_id' => $emp_id,
				'token' => $token,
				// ... other key-value pairs
				);
				$object = (object) $record1;


				$this->session->set_userdata('user',$object);
				// $this->session->set_userdata('token',$token);

				
				
				$data['status'] = 1;
				$data['msg'] = ' Submitted successfully....';
			}else{
				$data['status'] =0;
				$data['msg'] = 'Invalid credentails..';
			}
			
			 echo json_encode($data);
	}
	
	
	
	
	
	
	
	
	
	
	
	public function logout()
	{
		$emp_id=$this->session->userdata('emp_id');
		$login_id=$this->session->userdata('login_id');
		$user_access = $this->login_model->logout($login_id,$emp_id);
		redirect('Login');
	}
	
  

public function check_customer_login()
	{
		
		//print_r($_POST);die;
		$env_info=$_SERVER['HTTP_USER_AGENT'];
		$login_location=$_SERVER['REMOTE_ADDR'];
		if(empty($env_info)){
			$env_info='Web Through';
		}
		
		if(empty($login_location)){
			$login_location='Web Browser';
		}
		$login_address='Web Through Login';
		$description='Web Through Login';
		
		
		//print_r($_POST);
		 $email = $_POST['loginEmail'];
		 $password = $_POST['loginPwd']; 
		 
	// "gps_lat":"",
	// "gps_lang":"",
	// "track_type":"field",
	// "full_addr":"'.$login_address.'",
	// "fcm_id":"",
	// "app":"web",
	// "device_id":""

		$curl = curl_init(); 
		curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'login_web',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
			  CURLOPT_POSTFIELDS =>'{
			    "usr_name":"'.$email.'",
			    "pwd":"'.$password.'",
			    "env_info":"'.$env_info.'",
			    "login_location":"'.$login_location.'",
			    "login_address":"'.$login_address.'",
			    "description":"'.$description.'"
			}',
		  CURLOPT_HTTPHEADER => array(
		    'Content-Type: application/json',
    'Cookie: 69Atu22GZTSyDGW4sf4mMJdJ42436gAs=s%3AGQ3-iUP8ktVITzpfzsxofKKRmzkRREhh.RxnK79FIUMGwKo6juO2oTkaKdHXqI8fM1O8vxUpiiWQ'
		  ),
		)); 
		$response = curl_exec($curl);  
		curl_close($curl); 
		if ($err) { 
		   return "cURL Error #:" . $err;
		} else {  
		 return $response;
		 }

	}
	


 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */