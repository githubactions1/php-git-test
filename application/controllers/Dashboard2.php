<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard2 extends CI_Controller {

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
				$this->load->view('header');
				
					
				
					
				$this->session->unset_userdata('frmdate');
				$this->session->unset_userdata('todate');	
				
				$date = date('Y-m-d');
				$last_week_date = date( "Y-m-d", strtotime( "$date -1 day" ) );

				$data['frmdate']=$this->session->userdata('frmdate')=='' ? $last_week_date:$this->session->userdata('frmdate');
				$data['todate']=$this->session->userdata('todate')=='' ? date('Y-m-d'):$this->session->userdata('todate');

                $attendance_list= json_decode($this->attendance_list());
	        	$attendance_list=$attendance_list->data;
			  $data['emplyeecnt_list']=$attendance_list->emplyeecnt;
			  $data['attndcnt_list']=$attendance_list->attndcnt;
			   $data['taskcnt_list']=$attendance_list->taskcnt;
			    $data['avrgcnt_list']=$attendance_list->avrgcnt;
	//echo '<pre>';print_r($attndcnt_list);exit;


/*$emp_wise_productivity_list= json_decode($this->get_emp_wise_Productivity_list());
				$emp_wise_productivity_list=$emp_wise_productivity_list->data;
				$data['emplyeecnt_list1']=$emp_wise_productivity_list->emplyeecnt;
				$data['taskcnt_list1']=$emp_wise_productivity_list->taskcnt;
				$data['attndcnt_list1']=$emp_wise_productivity_list->attndcnt;
				$data['avrgcnt_list1']=$emp_wise_productivity_list->avrgcnt;*/
				
				
				$emp_wise_productivity_list = json_decode($this->get_emp_wise_Productivity_list());
$data['emp_wise_productivity_list'] = $emp_wise_productivity_list->data;

	//echo '<pre>';print_r($data['emp_wise_productivity_list']);exit;	
			$this->load->view('dashboard2/emp_wise_productivity_report',$data);
			//	$this->load->view('footer');
		}else{
			 redirect('Welcome');	
		}

	}
	
		
		
		
	/*	public function attendance_list1(){
		
		
		$token=$this->session->userdata['user']->token;
			$data['emp_id']=$this->session->userdata['user']->emp_id;


		$admin=$this->session->userdata['user']->emp_id;			
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
	//	print_r($_POST['frmdate']);exit;


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
    "frmdate":'$frmdate',
    "todate":'$todate'
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Cookie: 69Atu22GZTSyDGW4sf4mMJdJ42436gAs=s%3AyDy1soFU0ouyMtRwIEf4-Uo9ob_fMnmS.mZwRCk9odfCAvR5VI0fCmJE7zkCwpkAqoWuMVhA8IOI'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
return $response;

		
		
		}	*/
		
	public function attendance_list(){
			
			
			
		$token=$this->session->userdata['user']->token;
			$data['emp_id']=$this->session->userdata['user']->emp_id;


		$admin=$this->session->userdata['user']->emp_id;			
			$date = date('Y-m-d');
			$last_week_date = date( "Y-m-d", strtotime( "$date -1 day" ) );
		if(isset($_GET['frmdate']) && $_GET['frmdate']!='' && isset($_GET['todate']) && $_GET['todate']!='')
{
    $fdate = date_create($_GET['frmdate']);
    $tdate = date_create($_GET['todate']);
    $frmdate = date_format($fdate, "Y-m-d");
    $todate = date_format($tdate, "Y-m-d");
}
else
{
    $frmdate = $last_week_date;
    $todate = $date;
}

		

		$curl = curl_init();

// Construct the JSON data
$data = array(
    "frmdate" => $frmdate,
    "todate" => $todate
);

$jsonData = json_encode($data);



curl_setopt_array($curl, array(
  CURLOPT_URL => 'sify.digitalrupay.com/livekibanaapirt1/sify/dashboard/PanIndiaProductivityoneDecimalReport',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
   CURLOPT_POSTFIELDS => $jsonData, 
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Cookie: 69Atu22GZTSyDGW4sf4mMJdJ42436gAs=s%3AyDy1soFU0ouyMtRwIEf4-Uo9ob_fMnmS.mZwRCk9odfCAvR5VI0fCmJE7zkCwpkAqoWuMVhA8IOI'
  ),
));

$response = curl_exec($curl);
//print_r($response);exit;

curl_close($curl);

return $response;
	}
	
	
	public function get_emp_wise_Productivity_list(){
		
		
		
		$token=$this->session->userdata['user']->token;
			$data['emp_id']=$this->session->userdata['user']->emp_id;


		$admin=$this->session->userdata['user']->emp_id;			
			$date = date('Y-m-d');
			$last_week_date = date( "Y-m-d", strtotime( "$date -1 day" ) );
		if(isset($_GET['frmdate']) && $_GET['frmdate']!='' && isset($_GET['todate']) && $_GET['todate']!='')
{
    $fdate = date_create($_GET['frmdate']);
    $tdate = date_create($_GET['todate']);
    $frmdate = date_format($fdate, "Y-m-d");
    $todate = date_format($tdate, "Y-m-d");
}
else
{
    $frmdate = $last_week_date;
    $todate = $date;
}

		

		$curl = curl_init();

// Construct the JSON data
/*$data = array(
    "frmdate" => $frmdate,
    "todate" => $todate
);


$jsonData1 = json_encode($data);*/

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
    'Cookie: 69Atu22GZTSyDGW4sf4mMJdJ42436gAs=s%3A2w2cxnSxZbpOVPc9QNgFjqdfkT0EWRYU.WwFp6LHX6EcFw6V8fNfKWDLTZJNKJK7fkPvEeADbY%2Bw'
  ),
));
			$response = curl_exec($curl);

			curl_close($curl);
			return $response;

		
		}
}
