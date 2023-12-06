<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

	function __construct() { 
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('checklogin_helper');
		$this->load->library('session'); 
		$this->load->model(array('settings_model','tasks_model','common_model','reports_model'));
	}
	 
			public function index()
			{
				redirect('Reports/reports_new');	
			if($this->session->userdata['user']->emp_id!=''){
				
				$employees_list= json_decode($this->tasks_model->get_all_employees_list());
				$data['employees_list']=$employees_list->data;
				
				
				$this->load->view('header');
						$this->load->view('reports/reports',$data);
						$this->load->view('footer');
				 }else{
					 redirect('Welcome');	
				 }

			}
			public function reports_new()
			{
			if($this->session->userdata['user']->emp_id!=''){
				
				$this->load->view('header'); 
				$employees_list= json_decode($this->tasks_model->get_all_employees_list());
				$data['employees_list']=$employees_list->data; 
				$zones_states_and_clusters_list= json_decode($this->common_model->get_all_zones_states_and_clusters_list());
				$data['zones_states_and_clusters_list']=$zones_states_and_clusters_list->data;


		$managers_list= json_decode($this->get_all_managers_list());
		$data['managers_list']=$managers_list->data;
						// echo '<pre>';print_r($data['managers_list']);exit; 

						$this->load->view('reports/reports_new',$data);
						$this->load->view('footer');
				 }else{
					 redirect('Welcome');	
				 }

			}

		public function reports_download_ajax(){ 
				if(isset($_POST['report_type']) && $_POST['report_type']==1){
					$employee_data= json_decode($this->reports_model->get_attendanceports());
					$employee_data=$employee_data->data;
				
					$fname='sify_emp_attendanceports_'.date('Y_m_d_H_i_s').'.csv';
					header('Content-Type: text/csv; charset=utf-8');  
					header('Content-Disposition: attachment; filename='.$fname.'');  
					$output = fopen("php://output", "w");  
					fputcsv($output, array('sno', 'Region','State','FSM','City Type','Vendor Name','Employee / Rigger Id','Employee / Rigger Name','Designation','Team Type','Shift Time','Date','In Time','Out Time','Status (Present / Absent)','Updated By','Comments','Working Hours','Punch In Location','Punch In Location Status','Punch Out Location Status','Punch In Co-ordinate','Onboarding Date'));  
					$fields=array();
					if(!empty($employee_data))
					{
					foreach($employee_data as $key=>$row)  
					{				
					$sno=$key+1;
					$punch_in_km='';
					$punch_out_km='';
					if(!empty($row->punch_in_km)){
						$punch_in_km=$row->punch_in_km.' Km';
					}
					if(!empty($row->punch_out_km)){
						$punch_out_km=$row->punch_out_km.' Km';
					} 
					$status=$row->attdnce_sts;
					if($row->attdnce_sts == 'N/A'){
						$status='Absent';
					}
					
					$fields=array(
					'sno'=>$sno,
					'Region'=>$row->region,
					'State'=>$row->state,
					'FSM'=>$row->FSM,
					'City_Type'=>$row->City_Type,
					'Vendor'=>$row->vendor_name,
					'Employee_id'=>$row->emplyee_rigger_id,
					'emp_name'=>$row->emplyee_rigger_name,
					'Designation'=>$row->designation,
					'team_type'=>$row->team_type,
					'shift_Time'=>$row->shift_Time,
					'timedate'=>$row->date_time,
					'in_time'=>$row->in_time,
					'out_time'=>$row->out_time,
					'status'=>$status,
					'updatedby'=>$row->updatedby,
					'comments'=>$row->comments,
					'workinghours'=>$row->workinghours,
					'punch_in_locn'=>$row->punch_in_locn,
					'punch_in_km'=>$punch_in_km,
					'punch_out_km'=>$punch_out_km,
					'coordinates'=>$row->coordinates,
					'Onboarding_Date'=>$row->Onboarding_Date
					);
					fputcsv($output, $fields);  							
					}  
					} 		
					fclose($output); 
				}
				else if(isset($_POST['report_type']) && $_POST['report_type']==5){
					$attendance_data_managers= json_decode($this->reports_model->get_attendance_data_managers_Pdf());
					$attendance_data_managers=$attendance_data_managers->data;
				
					$fname='sify_managers_attendanceports_'.date('Y_m_d_H_i_s').'.csv';
					header('Content-Type: text/csv; charset=utf-8');  
					header('Content-Disposition: attachment; filename='.$fname.'');  
					$output = fopen("php://output", "w");  
					fputcsv($output, array('sno', 'Region','State','FSM Names','Manager Id','Manager Name','Designation','Team Type','Date','In Time','Out Time','Status','Working Hours'));  
					$fields=array();
					if(!empty($attendance_data_managers))
					{
					foreach($attendance_data_managers as $key=>$row)  
					{				
					$sno=$key+1; 
					$punch_in_km='';
					$punch_out_km='';
					if(!empty($row->punch_in_km)){
						$punch_in_km=$row->punch_in_km.' Km';
					}
					if(!empty($row->punch_out_km)){
						$punch_out_km=$row->punch_out_km.' Km';
					} 
					$status=$row->attdnce_sts;
					if($row->attdnce_sts == 'N/A'){
						$status='Absent';
					}
					
					$fields=array(
					'sno'=>$sno,
					'Region'=>$row->region,
					'State'=>$row->state,
					'FSM'=>$row->FSM,
					'Employee_id'=>$row->emplyee_rigger_id,
					'emp_name'=>$row->emplyee_rigger_name, 
					'Designation'=>$row->designation,
					'team_type'=>$row->team_type,
					'timedate'=>$row->date_time,
					'in_time'=>$row->in_time,
					'out_time'=>$row->out_time,
					'status'=>$status,
					'workinghours'=>$row->workinghours
					);
					fputcsv($output, $fields);  							
					}  
					} 		
					fclose($output); 
				}
				else if(isset($_POST['report_type']) && $_POST['report_type']==4){
					$task_dump_reportdata= json_decode($this->reports_model->get_task_dump_reportdata());
					$task_dump_reportdata=$task_dump_reportdata->data;
				
					$fname='sify_task_dump_reportdata'.date('Y_m_d_H_i_s').'.csv';
					header('Content-Type: text/csv; charset=utf-8');  
					header('Content-Disposition: attachment; filename='.$fname.'');  
					$output = fopen("php://output", "w");  
					fputcsv($output, array('sno','Employee Name','Team Type','Employee Identity','PO Number','Effective Date','Expiry Date','Client Name','Assignment Identity','Order Number','Service Number','Task was Auto Assigned','Assignment Type','Reason For Auto assignment not done','Auto assignment Changed By Manager','Approver','Task Coordinates','Travel Start Coordinates','Travel Start Address','Travel End Coordinates','Travel End Address','Distance Travelled (Km)','Is Travelled','Reason_for_distance_not_capturing','Return Distance Travelled (Km)','Reason_for_return_distance_not_capturing','Recorded Hardware','Hardware Description','Unit / Meter','Pincode','Task Type','Creation On','Priority','Address','Timestamp','Status','Mobile Numbe','Cluster','Circle','Region','City_Type','Dispatcher','Vendor','Vendor Code','Designation','Resource Type','Acknowledge Time','Travel Start Time','Onsite Time','Completion Time','Approved Remarks'));  
					$fields=array();
					if(!empty($task_dump_reportdata))
					{
					foreach($task_dump_reportdata as $key=>$row)  
					{	
					
					if($row->Resource_Type == 1){
						$Resource_Type="On Roll";
					}else if($row->Resource_Type == 2){
						$Resource_Type="Outsource";
					}else{
						$Resource_Type="Contract";
					}

					$Travel_End_Time="";
					$Travel_Start_Time="";
					$Travel_Start_Coordinates="";
					$Travel_End_Coordinates="";
					if(!empty($row->Travel_Start_Coordinates)){
						$Travel_Start=explode(',',$row->Travel_Start_Coordinates);
						$Travel_Start_Coordinates=$Travel_Start[0].','.$Travel_Start[1];
						$Travel_Start_Time=$row->Travel_Start_Time;
					}	
					
					if(!empty($row->Travel_End_Coordinates)){
						$Travel_End=explode(',',$row->Travel_End_Coordinates);
						$Travel_End_Coordinates=$Travel_End[0].','.$Travel_End[1];
						$Travel_End_Time=$row->Travel_End_Time;
					}
					
					
					$Distance_Travelled_Km=$row->Distance_Travelled_Km;
					$Reason_for_distance_not_capturing=$row->Reason_for_distance_not_capturing;
					if($Distance_Travelled_Km != 0){
					$Distance_Travelled_Km=$row->Distance_Travelled_Km;
					$Reason_for_distance_not_capturing='Distance Captured Successfully';
					}
					
					$Return_Distance_Travelled_Km=$row->Return_Distance_Travelled_Km;
					$Reason_for_return_distance_not_capturing=$row->Reason_for_return_distance_not_capturing;
					if($Return_Distance_Travelled_Km != 0){
					$Return_Distance_Travelled_Km=$row->Return_Distance_Travelled_Km;
					$Reason_for_return_distance_not_capturing='Return Distance Captured Successfully';
					}
					
					
					if($row->Is_Travel == 'NO'){
						$Reason_for_distance_not_capturing='Travel is Not Done';
						$Reason_for_return_distance_not_capturing='Travel is Not Done';
					}
					
					
					$Assignment_Type='Manual';
					if($row->Task_was_Auto_Assigned == 'Yes'){
						$Assignment_Type='Auto';
					}
					
					if(!empty($row->Assignment_Type)){
						$Assignment_Type=$row->Assignment_Type;
					}
					
					$Reason_For_Auto_assignment_not_done=$row->Reason_For_Auto_assignment_not_done;
					$past_time = date('h:i A', strtotime($row->Creation_On));	
					if($row->Task_was_Auto_Assigned != 'Yes'){
						$Reason_For_Auto_assignment_not_done="ticket created after office hours";
						$past_time1 = date('H:i', strtotime($row->Creation_On));		
						if($past_time1 >= '09:30' && $past_time1 <= '18:30'){
							$Reason_For_Auto_assignment_not_done=$row->Reason_For_Auto_assignment_not_done;
						}
					}
					
					$po_number="";
					if(!empty($row->po_number)){
						$po_number="'".$row->po_number;
					}
					
					
					$sno=$key+1;
					$fields=array(
						'sno'=>$sno,
						'emp_name'=>$row->Employee_Name,
						'team_type'=>$row->team_type,
						'emp_identyty'=>$row->Employee_Identity,
						'po_number'=>$po_number,
						'effective_date'=>$row->effective_date,
						'expry_date'=>$row->expry_date,
						'Client_Name'=>$row->Client_Name,
						'Assignment_Identity'=>$row->Assignment_Identity,
						'Order_Number'=>$row->Order_Number,
						'Service_Number'=>$row->Service_Number,
						'Task_was_Auto_Assigned'=>$row->Task_was_Auto_Assigned,
						'Assignment_Type'=>$Assignment_Type,
						'Reason_For_Auto_assignment_not_done'=>$Reason_For_Auto_assignment_not_done,
						'Auto_assignment_Changed_By_Manager'=>$row->Auto_assignment_Changed_By_Manager,
						'Approver'=>$row->Approver,
						'Task_Coordinates'=>$row->Task_Coordinates,
						'Travel_Start_Coordinates'=>$Travel_Start_Coordinates,
						'Travel_Start_Address'=>$row->Travel_Start_Address,
						'Travel_End_Coordinates'=>$Travel_End_Coordinates,
						'Travel_End_Address'=>$row->Travel_End_Address,
						'Distance_Travelled_Km'=>$Distance_Travelled_Km,
						'Is_Travel'=>$row->Is_Travel,
						'Reason_for_distance_not_capturing'=>$Reason_for_distance_not_capturing,
						'Return_Distance_Travelled_Km'=>$Return_Distance_Travelled_Km,
						'Reason_for_return_distance_not_capturing'=>$Reason_for_return_distance_not_capturing,
						'Recorded_Hardware'=>$row->Recorded_Hardware,
						'hw_desc'=>$row->hw_desc,
						'Unit_Meter'=>$row->Unit_Meter,
						'Pincode'=>$row->Pincode,
						'Task_Type'=>$row->Task_Type,
						'Creation_On'=>Datetimeconversion($row->Creation_On),
						'Priority'=>$row->Priority,
						'Address'=>$row->Address,
						'Timestamp'=>$row->Timestamp,
						'Status'=>$row->Status,
						'Mobile_Number'=>$row->Mobile_Number,
						'Cluster'=>$row->Cluster,
						'Circle'=>$row->Circle,
						'Region'=>$row->Region,
						'City_Type'=>$row->City_Type,
						'Dispatcher'=>$row->Dispatcher,
						'Vendor'=>$row->Vendor,
						'VendorCode'=>$row->Vendor_Code,
						'Designation'=>$row->Designation,
						'Resource_Type'=>$Resource_Type,
						'AcknowledgeTime'=>$row->Acknowledge_Time,
						'Travel_Start_Time'=>$Travel_Start_Time,
						'Travel_End_Time'=>$Travel_End_Time,
						'Completion_Time'=>$row->Completion_Time,
						'reason_for_approval'=>$row->reason_for_approval
					);
					fputcsv($output, $fields);  							
					}  
					} 		
					fclose($output); 
					
				}
				else if(isset($_POST['report_type']) && $_POST['report_type']==3){
					$task_performancereportdata= json_decode($this->reports_model->get_task_performancereport());
					$task_performancereportdata=$task_performancereportdata->data;
				
					$fname='sify_Cluster_Performance_Reports'.date('Y_m_d_H_i_s').'.csv';
					header('Content-Type: text/csv; charset=utf-8');  
					header('Content-Disposition: attachment; filename='.$fname.'');  
					$output = fopen("php://output", "w");  
					fputcsv($output, array('sno','Region','Circle','Cluster','Employee Name','Designation','Vendor','Task Assigned Days','Assigned Tasks','Complete Tasks','Failed-Rej SN /  Fld Canc / InCompl / Acc NA/ Req Resc','In Progress Tasks','Avg Assign Time (hh:mm:ss)','Assign to Travel Start','Avg Travel Time (hh:mm:ss)','Avg Task Time (hh:mm:ss)','Productivity (Tasks / Days)','Productivity in Hours per Day'));  
					$fields=array();
					if(!empty($task_performancereportdata))
					{
					foreach($task_performancereportdata as $key=>$row)  
					{				 
					$sno=$key+1;
					$fields=array(
						'sno'=>$sno,
						'Region'=>$row->Region,
						'Circle'=>$row->Circle,
						'Cluster'=>$row->Cluster,
						'Employee_Name'=>$row->Name,
						'Designation'=>$row->Designation,
						'Vendor'=>$row->Vendor_Name,
						'Task_Assigned_Days'=>$row->Task_Assigned_Days,
						'Assigned_Tasks'=>$row->Assigned_Tasks,
						'Complete_Tasks'=>$row->Complete_Tasks,
						'Failed_Rej_SN'=>$row->Failed_Rej_SN_Fld_Canc_InCompl_Acc_NA_Req_Resc,
						'In_Progress_Tasks'=>$row->In_Progress_Tasks,
						'Avg_Assign_Time'=>$row->Avg_Assign_Time,
						'Assign_to_Travel_Start'=>$row->Assign_to_Travel_Start,
						'Avg_Travel_Time'=>$row->Avg_Travel_Time,
						'Avg_Task_Time'=>$row->Avg_Task_Time,
						'Productivity_Tasks_Days'=>$row->ProductivityTasks_Days,
						'Productivity_in_Hours_per_Day'=>$row->Productivity_in_Hours_per_Day
					);
					fputcsv($output, $fields);  							
					}  
					} 		
					fclose($output); 
				}
				else if(isset($_POST['report_type']) && $_POST['report_type']==6){
					$task_locationreportdata= json_decode($this->reports_model->get_task_locationreport());
					$task_locationreportdata=$task_locationreportdata->data;
				
					$fname='sify_Location_History_reports'.date('Y_m_d_H_i_s').'.csv';
					header('Content-Type: text/csv; charset=utf-8');  
					header('Content-Disposition: attachment; filename='.$fname.'');  
					$output = fopen("php://output", "w");  
					fputcsv($output, array('sno', 'Region','State','FSM','Vendor Name','Employee / Rigger Id','Employee / Rigger Name','Designation','Date','Task Id','Task Information','Customer Name','Complete Tasks','Assign Tasks','Stops','Time','Duration','Status','Distance Travelled From Last Location','Location','Approx. Total  Distance Travelled (Km)','Total Travelling Time'));  
					$fields=array();
					if(!empty($task_locationreportdata))
					{
					foreach($task_locationreportdata as $key=>$row)  
					{				
					$sno=$key+1;
					$fields=array(
					'sno'=>$sno,
					'Region'=>$row->Region,
					'State'=>$row->State,
					'FSM'=>$row->FSM,
					'Vendor'=>$row->Vendor_Name,
					'Employee_id'=>$row->Employee_Rigger_Id,
					'Employee_name'=>$row->Employee_Rigger_Name,
					'Designation'=>$row->Designation,
					'Date'=>$row->Date_d,
					'Task_Id'=>$row->Task_Id,
					'Task_Information'=>$row->Task_Information,
					'Customer_Name'=>$row->Customer_Name,
					'Complete_Tasks'=>$row->Complete_Tasks,
					'Assign_Tasks'=>$row->Assign_Tasks,
					'Stops'=>$row->Stops,
					'Time'=>$row->Time_t,
					'Duration'=>$row->Duration,
					'Status'=>$row->Status,
					'Return_Distance_Travelled'=>$row->Return_Distance_Travelled_Km.' Km',
					'Location'=>$row->Location,
					'Approx_Total_Distance_Travelled'=>$row->Approx_Total_Distance_Travelled_Km.' Km',
					'Total_Travelling_Time'=>$row->Total_Travelling_Time,
					);
					fputcsv($output, $fields);  							
					}  
					} 		
					fclose($output);  
				}
				else{
					$employee_data= json_decode($this->reports_model->getemployeereports());
					$employee_data=$employee_data->data;
					
					$fname='sify_employeereports'.date('Y_m_d_H_i_s').'.csv';
					header('Content-Type: text/csv; charset=utf-8');  
					header('Content-Disposition: attachment; filename='.$fname.'');  
					$output = fopen("php://output", "w");  
					fputcsv($output, array('sno','Zone','State','Organization Unit','City Type', 'Employee Id','Name','Mobile Number','Email Id','Designation','Team Type','Shift Name','Leaves','Base Address','Latitude','Latitude','Employment Type','Vendor Code','Vendor Name','User Name','Address','Skills','Task Types','Privilege','Organization Unit Id','Onboarding_Date','City Name','status'));  
					$fields=array();
					if(!empty($employee_data))
					{
					foreach($employee_data as $key=>$row)  
					{	
					
					if($row->emp_status==1){
						$status='Active';
					}else {
							$status='Inactive';
					}

					
					$sno=$key+1;
					$fields=array(
					'sno'=>$sno,
					'Zone'=>$row->Zone,
					'State'=>$row->State,
					'Organization_Unit_Name'=>$row->Organization_Unit_Name,
					'City_Type'=>$row->City_Type,
					'Employee_Id'=>$row->Employee_Id,
					'Name'=>$row->Name,
					'Mobile_Number'=>$row->Mobile_Number,
					'Email_Id'=>$row->Email_Id,
					'Designation'=>$row->Designation,
					'team_type'=>$row->team_type,
					'Shift_Name'=>$row->Shift_Name,
					'Leaves'=>$row->Leaves,
					'Base_Address'=>$row->Base_Address,
					'Latitude'=>$row->Latitude,
					'Longitutde'=>$row->Longitutde,
					'Employment_Type'=>$row->Employment_Type,
					'Vendor_Code'=>$row->Vendor_Code,
					'Vendor_Name'=>$row->Vendor_Name,
					'User_Name'=>$row->User_Name,
					'Address'=>$row->Address,
					'Skills'=>$row->Skills,
					'Task_Types'=>$row->Task_Types,
					'Privilege'=>$row->Privilege,
					'Organization_Unit_Id'=>$row->Organization_Unit_Name,
					'Onboarding_Date'=>$row->Onboarding_Date,
					'City_Name'=>$row->City_Name,
					'status'=>$status
					);
					fputcsv($output, $fields);  							
					}  
					} 		
					fclose($output); 
					
				}
								
					
		}		
						

	

		public function get_view_reports_pdf_new()
		{
			
				$this->session->unset_userdata('fdate');
				$this->session->unset_userdata('tdate');
				$this->session->unset_userdata('cluster_id');
				$this->session->unset_userdata('form_date_type');
				$this->session->unset_userdata('employee_id');

				$fdate=$_POST['fdate']; 
				$tdate=$_POST['tdate']; 
				$cluster_id=$_POST['cluster_id']; 
				$form_date_type=$_POST['form_date_type']; 
				$employee_id=$_POST['employee_id']; 
				$report_type=$_POST['report_type']; 

				$this->session->set_userdata('fdate',$fdate);
				$this->session->set_userdata('tdate',$tdate);
				$this->session->set_userdata('cluster_id',$cluster_id);
				$this->session->set_userdata('form_date_type',$form_date_type);
				$this->session->set_userdata('employee_id',$employee_id);
			
			$data['report_type']=$report_type;
			
				if($report_type == 1){
					$url="task_attendance_report_pdf";
				}else {
					$url="task_cluster_performance_report_pdf";
				}
			$data['url']=$url;
			$final['reports_ajax_div']= $this->load->view('reports/ajax_view_reports_pdf',$data,TRUE);			
			echo json_encode($final);exit;
		}
		
		
				
		public function task_dump_report_pdf()
		{ 
			
			$task_dump_report= json_decode($this->reports_model->get_task_dump_report_pdf());
			$task_dump_report=$task_dump_report->data;

			$data['records']=$task_dump_report;
		
			$task_id=2222;
			
			
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
			
			$data['from_date']=$f_date;
			$data['to_date']=$t_date;
			
			
			
			
			

			$task_page=$this->load->view('reports/task_dump_report_pdf',$data,TRUE);
			
			
			$pdfFilePath = "task_(".$task_id.").pdf";
			$this->load->library('m_pdf');
			$this->m_pdf->pdf->SetFont('times', 'BI', 20, '', 'false');
			$this->m_pdf->pdf->WriteHTML($task_page);
			$this->m_pdf->pdf->Output($pdfFilePath, "I"); 				
		}		
					
				
		public function task_attendance_report_pdf()
		{ 
			
			$employee_data= json_decode($this->reports_model->get_attendanceports_Pdf());
			$employee_data=$employee_data->data;

			$data['records']=$employee_data;
		
			$task_id=2222;
			

			$task_page=$this->load->view('reports/task_attendance_report',$data,TRUE);
			
			
			$pdfFilePath = "task_(".$task_id.").pdf";
			$this->load->library('m_pdf');
			$this->m_pdf->pdf->SetFont('times', 'BI', 20, '', 'false');
			$this->m_pdf->pdf->WriteHTML($task_page);
			$this->m_pdf->pdf->Output($pdfFilePath, "I"); 				
		}		
				
			
		public function task_cluster_performance_report_pdf()
		{ 
			$cluster_id=$this->session->userdata['cluster_id'];
			
			$task_performancereportdata= json_decode($this->reports_model->get_task_performancereport_pdf());
			$task_performancereportdata=$task_performancereportdata->data;

			$data['records']=$task_performancereportdata;
		
			$task_id=2222;
			

			$task_page=$this->load->view('reports/task_cluster_performance_report',$data,TRUE);
			
			
			$pdfFilePath = "task_(".$task_id.").pdf";
			$this->load->library('m_pdf');
			$this->m_pdf->pdf->SetFont('times', 'BI', 20, '', 'false');
			$this->m_pdf->pdf->WriteHTML($task_page);
			$this->m_pdf->pdf->Output($pdfFilePath, "I"); 				
		}
		
		
		
		
		
		
	public function get_all_managers_list(){
			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
		
				$curl = curl_init(); 
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'employees/getmanagerslist',
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
	
	
	
	
	  public function get_date_deff_details()
		{
			
			$end = $this->input->post('end');
			$start = $this->input->post('start');
			$datediff = (strtotime($end) - strtotime($start));
			
			$diff_days=round($datediff / 86400);
			if($start == '' || $end == ''){
				$final['diff_status']=1;
			}else {
				if($diff_days <= 31 && $diff_days >= 0){
					$final['diff_status']=1;
				}else if($diff_days < 0){
					$final['diff_status']=2;
				}else {
					$final['diff_status']=0;
				}
			}

			$final['start_date']=date('Y').'-'.date('m').'-'.date('d');
			$final['end_date']=date('Y').'-'.date('m').'-'.date('d');
			
			$final['diff_days']=round($datediff / 86400); 
			echo json_encode($final);exit;			
			
		}
		
		
	public function dashboard()
		{
			$this->load->view('header');
			
			$employee_data= json_decode($this->reports_model->get_attendanceports_Pdf());
			$employee_data=$employee_data->data;

			$data['records']=$employee_data;
			
			$this->load->view('reports/check_dashboard',$data);
			$this->load->view('footer');
	
		}
		// added 10-11-2023 by sk
		public function frtreports()
			{
			if($this->session->userdata['user']->emp_id!=''){
				
				$this->load->view('header'); 
				$employees_list= json_decode($this->tasks_model->get_frtall_employees_list());
				$data['employees_list']=$employees_list->data; 
				$zones_states_and_clusters_list= json_decode($this->common_model->get_all_zones_states_and_clusters_list());
				$data['zones_states_and_clusters_list']=$zones_states_and_clusters_list->data;


		$managers_list= json_decode($this->get_all_managers_list());
		$data['managers_list']=$managers_list->data;
						// echo '<pre>';print_r($data['managers_list']);exit; 

						$this->load->view('reports/frtreports',$data);
						$this->load->view('footer');
				 }else{
					 redirect('Welcome');	
				 }

			}
			// end 
		
}
