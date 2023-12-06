<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

	function __construct() { 
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('checklogin_helper');
		$this->load->library('session'); 
		//$this->load->model('login_model');
	}
	 
	public function index()
	{
		

	 if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){
		  $today_atten= json_decode($this->get_today_attendcount());
	$today_attend_count=$today_atten->data[0];
	$data['tattendcount']=$today_attend_count->count;
			
	$today_punchin= json_decode($this->get_today_punchincount());
	$today_punchin_count=$today_punchin->data[0];
	$data['tpicount']=$today_punchin_count->count;

$today_punchout= json_decode($this->get_today_punchoutcount());
	$today_punchout_count=$today_punchout->data[0];
	$data['tpocount']=$today_punchout_count->count;
	
	$today_absnhout= json_decode($this->get_today_absentcount());
	$today_absent_count=$today_absnhout->data[0];
	$data['tabsount']=$today_absent_count->absent;
	
	$idle_count= json_decode($this->get_idlecount());
	$idlecount=$idle_count->data[0];
	$data['icount']=$idlecount->count;
	
	$onleave_count= json_decode($this->get_onleavecount());
	$onleavecount=$onleave_count->data[0];
	$data['olcount']=$onleavecount->leave_count;
	
	$ontime_count= json_decode($this->get_ontime_count());
	$ontimecount=$ontime_count->data[0];
	$data['ontimecount']=$ontimecount->ontime_count;
	$data['latecount']=$ontimecount->late_count;
	
	$clusters_list= json_decode($this->get_all_clusters_list());
			$data['clusters_list']=$clusters_list->data;
	$zones_states_and_clusters_list= json_decode($this->get_all_zones_states_and_clusters_list());
		$data['zones_states_and_clusters_list']=$zones_states_and_clusters_list->data;
		
	
	
	
	if((isset($_POST['type_id']) && $_POST['type_id']!="") or (isset($_POST['status_id']) && $_POST['status_id']!="")){
		 $team_list= json_decode($this->get_team_detailsbyfilter());
		 $type_n=$_POST['status_id'];
	}
	else{
	 $team_list= json_decode($this->get_team_details());	
	 $type_n='0';
	}
		
               
				$data['team_details']=$team_list->data;
			 $data['type_n']=$type_n;
		//print_r($data['team_details']);
		//die;
				
			$this->load->view('header');
			$this->load->view('team',$data);
				$this->load->view('team_footer');
		}else{
			 redirect('Welcome');	
		}

	}
	
	
	
public function header_count_display(){
$current_controller = $this->uri->segment(3);

if ($current_controller == "FrtReport") {
	$data['attendance_count']=0;
	$data['leave_count']=0;
	$data['absent_count']=0;
	$data['tattendcount']=0;
}
else{
	$today_absnhout= json_decode($this->get_today_absentcount());
	$today_absent_count=$today_absnhout->data[0];
	
	$onleave_count= json_decode($this->get_onleavecount());
	$onleavecount=$onleave_count->data[0];

	$today_punchout= json_decode($this->get_today_punchoutcount());
	$today_punchout_count=$today_punchout->data[0];
	$tpocount=$today_punchout_count->count;
	
	$today_punchin= json_decode($this->get_today_punchincount());
	$today_punchin_count=$today_punchin->data[0];
	$tpicount=$today_punchin_count->count;
	
	
	$data['attendance_count']=$tpicount+$tpocount+$today_absent_count->absent; 
	$data['leave_count']=$onleavecount->leave_count;
	$data['absent_count']=$today_absent_count->absent;
	$data['tattendcount']=$tpicount+$tpocount;
	
	
	// added 04-12-2023 by sk
	$today_frtpcount= json_decode($this->get_today_frtcount());
	$today_frt_count=$today_frtpcount->data[0];
	
	$today_frtacount= json_decode($this->get_today_frtabsentcount());
	$today_frt_absentcount=$today_frtacount->data[0];
	
	
	$data['frtattendance_count']=$today_frt_count->Present; 
	$data['frtleave_count']=$today_frt_count->On_Leave;
	$data['frtabsent_count']=$today_frt_absentcount->absent;

	//end
}
	
	
	
	$flash_news_list= json_decode($this->get_all_flash_news_list());
	$data['flash_news_list']=$flash_news_list->data;
	$final['header_flash_news_ajax']= $this->load->view('team/header_flash_news_ajax',$data,TRUE);
	$final['header_flash_news_image_div_ajax']= $this->load->view('team/header_flash_news_image_div_ajax',$data,TRUE);
			echo json_encode($final);exit;	


}
	
public function get_today_punchincount(){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => API_MAIN_URL.'attendence/todaypunchin',
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
//die;	
}
public function get_today_punchoutcount(){
	$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => API_MAIN_URL.'attendence/todaypunchoutcount',
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
public function get_today_absentcount(){
$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => API_MAIN_URL.'attendence/todayabsent',
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
public function get_idlecount(){
$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => API_MAIN_URL.'attendence/idlecount',
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
public function get_team_details(){
	
	
	
$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
	
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => API_MAIN_URL.'attendence/todaypunchinlist',
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
public function get_team_detailsbyfilter(){
	$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
	//print_r($_POST);
	//die;
	 $type=$_POST['type_id'];
	 $status=$_POST['status_id'];
	//die;
	$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => API_MAIN_URL.'attendence/todaypunchinbyfilters',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "id":"'.$status.'",
    "type":"'.$type.'"
}',
  CURLOPT_HTTPHEADER => array(
    'x-access-token:'.$token,
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
return $response;
//die;
}
public function edit_empstatusabsent(){
	
$emp_absent= json_decode($this->empstatus_absent());		
				if($emp_absent->status==200)
				{
				$this->session->set_flashdata('success', 'Employee Status Updated...');
				}
				else{
				$this->session->set_flashdata('danger', 'Employee Status Not Updated...');
				}
	
}
public function empstatus_absent(){
	$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
	$emp_id=$_POST['emp_id'];
	$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => API_MAIN_URL.'attendence/absentinsertion',
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
public function edit_empstatus_notavilable(){
	
$emp_notaviable= json_decode($this->empstatus_notavilable());		
				if($emp_notaviable->status==200)
				{
				$this->session->set_flashdata('success', 'Employee Status Updated...');
				}
				else{
				$this->session->set_flashdata('danger', 'Employee Status Not Updated...');
				}
	
}

public function empstatus_notavilable(){
	$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
	$emp_id=$_POST['emp_id'];
	$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => API_MAIN_URL.'attendence/notavailable',
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
public function edit_empstatus_avilable(){
	
	$emp_notaviable= json_decode($this->empstatus_avilable());		
				if($emp_notaviable->status==200)
				{
				$this->session->set_flashdata('success', 'Employee Status Updated...');
				}
				else{
				$this->session->set_flashdata('danger', 'Employee Status Not Updated...');
				}
	
}

public function empstatus_avilable(){
	$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
	$emp_id=$_POST['emp_id'];
	$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => API_MAIN_URL.'attendence/available',
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

public function status_popover(){
	//print_r($_POST);
if($_POST["empid"]=="present"){
	?>
	<div class="input-group">                    
    <div class="input-group-btn">
	<p class=" btn btn-primary text-white emp_absent"style="padding: 10px;" id="<?php echo $_POST['id'];?>" role="button">Absent</p><br>
	<p class=" btn btn-primary text-white emp_notavialble"style="padding: 10px;" id="<?php echo $_POST['id'];?>"> Not Available</p>
	</div>
	</div>
<?php	
}
elseif($_POST["empid"]=="Absent"){
	?>
	<div class="input-group">                    
    <div class="input-group-btn">
	<p class="emp_avialble btn btn-primary text-white"style="padding: 10px;" id="<?php echo $_POST['id'];?>">Available</p></a><br>
	<p class="btn btn-primary text-white emp_notavialble"style="padding: 10px;" id="<?php echo $_POST['id'];?>">Not Available</p>
	</div>
	</div>
<?php	
}
else{
	?>
	<div class="input-group">                    
    <div class="input-group-btn">
	<p class=" btn btn-primary text-white emp_absent"style="padding: 10px;" id="<?php echo $_POST['id'];?>" >Absent</p><br>
	<p class=" btn btn-primary text-white emp_avialble"style="padding: 10px;" id="<?php echo $_POST['id'];?>">Available</p>
	</div>
	</div>
<?php	
}
	
	
}

public function get_today_attendcount(){
	$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
	
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => API_MAIN_URL.'attendence/totalattendencecount',
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

//02-06-2023 by sk
public function team_user(){

	 if(($this->session->userdata['user']->emp_id!='') && ($this->session->userdata['user']->token!='')){
$team_user_id=$this->uri->segment(3);
            $team_list= json_decode($this->get_team_user_details($team_user_id));	
            $data['team_details']=$team_list->data;
			$team_leaves_list= json_decode($this->get_team_userleaves_details($team_user_id));	
            $data['team_leave_details']=$team_leaves_list->data;
			
	$leave_count= json_decode($this->get_leave_count($team_user_id));
	$leavecount=$leave_count->data[0];
	$data['total_leaves']=$leavecount->total_leaves;
	$data['taken']=$leavecount->taken;
	$data['balance']=$leavecount->balance;
	$data['applied']=$leavecount->applied;
	$data['rejected']=$leavecount->rejected;
	$this->load->view('header');
			$this->load->view('team_user',$data);
			$this->load->view('footer');
			}
			else{
			redirect('Welcome');	
			}
	
	 
}

public function get_team_user_details($team_user_id){
	$token=$this->session->userdata['user']->token;
	$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => API_MAIN_URL.'attendence/getteamuseremployeelist',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "emp_id":"'.$team_user_id.'"
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

public function get_onleavecount(){
$token=$this->session->userdata['user']->token;	
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => API_MAIN_URL.'attendence/onleavecount',
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
public function get_ontime_count(){
$token=$this->session->userdata['user']->token;	
	
	$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => API_MAIN_URL.'attendence/ontimeandlatecount',
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
public function get_team_userleaves_details($team_user_id){
$token=$this->session->userdata['user']->token;	

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => API_MAIN_URL.'leaverequest/leavereqdataweblist',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "emp_id":"'.$team_user_id.'" 
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
public function get_leave_count($team_user_id){
$token=$this->session->userdata['user']->token;	

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => API_MAIN_URL.'leaverequest/leaverequestcountweblist',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "emp_id":"'.$team_user_id.'"
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
public function get_teamdetails_byfilter(){
	
$team_list= json_decode($this->get_team_detailsbyfilter());
$data['team_details']=$team_list->data;		

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
	
	public function get_all_zones_states_and_clusters_list(){
			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
				curl_setopt_array($curl, array(
				CURLOPT_URL => API_MAIN_URL.'zone/getzonesstatesandclusters',
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
public function Get_cluster_wsie_emp_list(){
	
	$cluster_ids = $this->input->post('cluster_ids');
			$cluster_wsie_shifts_list= json_decode($this->get_clusters_wsie_emp_list($cluster_ids));
			$cluster_wsie_shifts_list1=$cluster_wsie_shifts_list->data;
			
				if(count($cluster_wsie_shifts_list1)>0 && !empty($cluster_ids)){
				$opt='<option value="">--Select--</option>';		

				foreach($cluster_wsie_shifts_list1 as $v){ 
				$opt.='<option value="'.$v->emp_id.'">'.$v->emp_username.'</option>';
				}
				}else{
				$opt='<option value="">--No data--</option>';		

				}
				echo $opt;exit;
	
	
}
public function get_clusters_wsie_emp_list($cluster_ids){
	$token=$this->session->userdata['user']->token;
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => API_MAIN_URL.'employees/clustersbymembers',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "cluster_ids":"'.$cluster_ids.'"
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
//end	

// 12-06-2023
public function Get_emp_app_permissions(){
	
$emp_app_results= json_decode($this->get_team_app_details());
$data['emp_app_list']=$emp_app_results->data;
	
	foreach($data['emp_app_list'] as $empapplist){
		$permission_details=json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $empapplist->app_permissions), true );
	?>	
	<div><?php echo $empapplist->date_created;?></div>

<?php
if($permission_details['Accuracy']<100)
{
?>
<span data-toggle="tooltip" data-placement="top" title="High accuracy setting is On">
<span class="device-settings-icon accuracy-active"></span>
</span>
<?php
}
else{
?>
<span data-toggle="tooltip" data-placement="top" title="Accuracy setting is Off">
<span class="device-settings-icon accuracy-deactive"></span>

</span>
<?php

}
?>
<?php
if($permission_details['battery']>=50)
{
?>
<span data-toggle="tooltip" data-placement="top" title="Battery optimization setting is on <?php echo $permission_details['battery']; ?>%">
<span class="device-settings-icon battery-optimize-active">
</span>
</span>
<?php
}
else{
	?>
	
<span data-toggle="tooltip" data-placement="top" title="Battery optimization setting is off <?php echo $permission_details['battery']; ?>%">
<span class="device-settings-icon battery-optimize-deactive">
</span>	
</span>	
<?php	
}
?>


<?php
if($permission_details['gps_per']=='0') 
{
?>
<span data-toggle="tooltip" data-placement="top" title="GPS is On">
<span class="device-settings-icon gps-active">
</span>
</span>
<?php
}else{
	?>
<span data-toggle="tooltip" data-placement="top" title="GPS is Off">
<span class="device-settings-icon gps-deactive">
</span>	
</span>
<?php
}
?>

<?php
if($permission_details['nearby_device']=='0')
{
?>
<span data-toggle="tooltip" data-placement="top" title="Network is on">
<span class="device-settings-icon network-active">
</span>
</span>
<?php
}else{
	?>
<span data-toggle="tooltip" data-placement="top" title="Network is off">
<span class="device-settings-icon network-deactive">
</span>	
</span>
	<?php
}
?>
<?php
if($permission_details['file_per']=='0')
{
?>
<span class="storage-permission"><span data-toggle="tooltip" data-placement="left" title="Files and Storage permission is granted.">
<span class="device-settings-icon storage-active">
</span>
</span>
</span>	
<?php
}else{
	?>
<span class="storage-permission"><span data-toggle="tooltip" data-placement="left" title="Files and Storage permission denied">
<span class="device-settings-icon storage-deactive">
</span>
</span>
</span>	
<?php
}
?>
		
	<?php	
	}
	
	
}


	public function get_team_app_details(){
			$token=$this->session->userdata['user']->token;

	$emp_id=$_POST['empid'];	
	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => API_MAIN_URL.'attendence/apppermissionlogdata',
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
	
	
	
	public function get_present_emp_login_details_ajax()
	{
		
		$data['emp_id']=$emp_id=$_POST['emp_id'];
		$data['attendence_id']=$attendence_id=$_POST['attendence_id'];

		$team_list= json_decode($this->get_team_user_details($emp_id));	
		$data['team_details']=$team_list->data[0];	

		echo $this->load->view('team/present_emp_login_details_ajax',$data,true);
		exit;
	}

	public function update_emp_current_attendence_status()
	{
		
		 // echo '<pre>';print_r($_POST);exit;
		$emp_present_status=$_POST['emp_present_status'];	
		$attendence_id=$_POST['attendence_id'];	
		
		if($attendence_id == 0) {
			$inrs_results = json_decode($this->insert_emp_current_attendence());
		}else {
			$inrs_results = json_decode($this->update_emp_current_attendence());
		}
		if($inrs_results->status==200)
		{
		$this->session->set_flashdata('success', 'Updated Successfully...');
		redirect('Team'); 
		}
		else
		{
		$this->session->set_flashdata('error', 'Not Updated...');
		redirect('Team'); 
		}

	}


	
	public function update_emp_current_attendence(){
			$token=$this->session->userdata['user']->token;

	$attendence_id=$_POST['attendence_id'];	
	$emp_sts=$_POST['emp_present_status'];		
	$emp_id=$_POST['emp_id'];
	$punch_status='';
	$punch_in_time='';
	$punch_out_time='';
	if($emp_sts == 0){
		$punch_status=1;
		$punch_in_time=1;
	}
	if($emp_sts == 10){
		$punch_status=0;
		$emp_sts=0;
		$punch_out_time=1;
	}
	
	
   /* Insert Change Log history */
	$log_category="Team Attendence Status changed";
	$request_params="Team Attendence Status changed to status is ".$emp_sts.' and attendence_id '.$attendence_id;
	$log_text=$request_params;
	$this->load->model('tasks_model');
	$this->tasks_model->insert_change_log_history($log_category,$request_params,$log_text);
   /* Insert Change Log history */
	
	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => API_MAIN_URL.'attendence/editattendencestatus',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS =>'{
		"attendence_id":"'.$attendence_id.'",
		"punch_status":"'.$punch_status.'",
		"punch_in_time":"'.$punch_in_time.'",
		"punch_out_time":"'.$punch_out_time.'",
		"emp_id":"'.$emp_id.'",
		"emp_sts":"'.$emp_sts.'"
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

	
	public function insert_emp_current_attendence(){
			$token=$this->session->userdata['user']->token;

	$emp_sts=$_POST['emp_present_status'];	
	$username=$_POST['username'];	
	$emp_id=$_POST['emp_id'];	
	$punch_status='';
	$punch_in_time='';
	$punch_out_time='';
	if($emp_sts == 0){
		$punch_status=1;
		$punch_in_time=1;
	}
	if($emp_sts == 10){
		$punch_status=0;
		$emp_sts=0;
	}
	
	

   /* Insert Change Log history */
	$log_category="Team Attendence Status update";
	$request_params="Team Attendence Status update to status is ".$emp_sts.' and emp username is '.$username;
	$log_text=$request_params;
	$this->load->model('tasks_model');
	$this->tasks_model->insert_change_log_history($log_category,$request_params,$log_text);
   /* Insert Change Log history */
	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => API_MAIN_URL.'attendence/insertattendenceweb',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS =>'{
		"punch_status":"'.$punch_status.'",
		"username":"'.$username.'",
		"emp_sts":"'.$emp_sts.'",
		"punch_in_time":"'.$punch_in_time.'",
		"punch_out_time":"'.$punch_out_time.'",
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
	
	
	
	
	public function get_all_flash_news_list(){
			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
			$news_date=date('Y-m-d');
			$type='1';
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => API_MAIN_URL.'employees/getflashnews',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS =>'{
			"news_date":"'.$news_date.'",
			"type":"'.$type.'"
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
	// added 04-12-2023 by sk
	
	public function get_today_frtcount(){
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
			$news_date=date('Y-m-d');
		$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => API_MAIN_URL.'attendence/frtscrollingcounts',
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

public function get_today_frtabsentcount(){
$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];		
		
		$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => API_MAIN_URL.'attendence/frtscrollingabsentcounts',
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
	
	
	//end 
	

}
