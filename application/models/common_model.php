<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Common_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	

	
	
	public function get_all_attendance_present_fst_grid($frmdate,$todate){

			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
							
			// $frmdate=$this->session->userdata('frmdate');
			// $todate=$this->session->userdata('todate');


		

				$curl = curl_init(); 
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'dashboard/attendanceprcsnt',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"frmdate": "'.$frmdate.'",
					"todate": "'.$todate.'"
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





	public function get_all_attendance_emplyee_prcsnt_2nd_grid($frmdate,$todate){

			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				
			// $frmdate=$this->session->userdata('frmdate');
			// $todate=$this->session->userdata('todate');

			// $frmdate='2023-04-08 07:30';
			// $todate='2023-04-15 15:30';
	
				$curl = curl_init(); 
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'dashboard/attendanceemplyeeprcsnt',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"frmdate": "'.$frmdate.'",
					"todate": "'.$todate.'"
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

	public function get_all_atndnc_Chrt_engreg_prcsnt_3rd_grid($frmdate,$todate){

			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				
			// $frmdate=$this->session->userdata('frmdate');
			// $todate=$this->session->userdata('todate');

			// $frmdate='2023-04-08 07:30';
			// $todate='2023-04-15 15:30';
	
				$curl = curl_init(); 
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'dashboard/atndncChrtengregprcsnt',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"frmdate": "'.$frmdate.'",
					"todate": "'.$todate.'"
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

	public function get_all_atndnce_Vndrprcsnt_4th_grid($frmdate,$todate){

			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				
			// $frmdate=$this->session->userdata('frmdate');
			// $todate=$this->session->userdata('todate');

			// $frmdate='2023-04-08 07:30';
			// $todate='2023-04-15 15:30';
	
				$curl = curl_init(); 
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'dashboard/atndnceVndrprcsnt',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"frmdate": "'.$frmdate.'",
					"todate": "'.$todate.'"
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


	public function get_all_utliz_tnsmry_5th_grid($frmdate,$todate){

			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				
			// $frmdate=$this->session->userdata('frmdate');
			// $todate=$this->session->userdata('todate');

			// $frmdate='2023-04-08 07:30';
			// $todate='2023-04-15 15:30';
	
				$curl = curl_init(); 
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'dashboard/utliztnsmry',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"frmdate": "'.$frmdate.'",
					"todate": "'.$todate.'"
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






	public function get_all_utliztn_Clstrsmry_6th_grid($frmdate,$todate){

			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				
			// $frmdate=$this->session->userdata('frmdate');
			// $todate=$this->session->userdata('todate');

			// $frmdate='2023-04-08 07:30';
			// $todate='2023-04-15 15:30';
	
				$curl = curl_init(); 
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'dashboard/utliztnClstrsmry',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"frmdate": "'.$frmdate.'",
					"todate": "'.$todate.'"
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

	
	public function get_all_not_utlizd_membr_7th_grid($frmdate,$todate){

			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				
			// $frmdate=$this->session->userdata('frmdate');
			// $todate=$this->session->userdata('todate');

			// $frmdate='2023-04-08 07:30';
			// $todate='2023-04-15 15:30';
	
				$curl = curl_init(); 
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'dashboard/notutlizdmembr',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"frmdate": "'.$frmdate.'",
					"todate": "'.$todate.'"
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

	public function get_all_utilz_tn_taskcnt_8th_grid($frmdate,$todate){

			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				
			// $frmdate=$this->session->userdata('frmdate');
			// $todate=$this->session->userdata('todate');

			// $frmdate='2023-04-08 07:30';
			// $todate='2023-04-15 15:30';
	
				$curl = curl_init(); 
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'dashboard/utilztntaskcnt',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"frmdate": "'.$frmdate.'",
					"todate": "'.$todate.'"
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

	
	public function get_all_tasks_ts_rprt_9th_grid($frmdate,$todate){

			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				
			// $frmdate=$this->session->userdata('frmdate');
			// $todate=$this->session->userdata('todate');

			// $frmdate='2023-04-08 07:30';
			// $todate='2023-04-15 15:30';
	
				$curl = curl_init(); 
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'dashboard/taskstsrprt',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"frmdate": "'.$frmdate.'",
					"todate": "'.$todate.'"
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

	public function get_all_tasks_ts_Grprprt_10th_grid($frmdate,$todate){

			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				
			// $frmdate=$this->session->userdata('frmdate');
			// $todate=$this->session->userdata('todate');

			// $frmdate='2023-04-08 07:30';
			// $todate='2023-04-15 15:30';
	
				$curl = curl_init(); 
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => API_MAIN_URL.'dashboard/taskstsGrprprt',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>'{
					"frmdate": "'.$frmdate.'",
					"todate": "'.$todate.'"
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
				"status":1
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
				"status":1
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
	



		public function getclusters_by_state_id(){
			$zone_id=$_POST['zone_id'];		
			$state_id=$_POST['state_id'];		
			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => API_MAIN_URL.'clusters/getclustersbystateidandzoneid',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS =>'{
			"state_id": "'.$state_id.'",
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
		
		
		
		
		public function get_monitor_view_details($emp_id,$task_id){
			$zone_id=$_POST['zone_id'];		
			$state_id=$_POST['state_id'];		
			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => API_MAIN_URL.'attendence/gettasklog',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS =>'{
			"emp_id": "'.$emp_id.'",
			"task_id": "'.$task_id.'"
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






	
		
		public function get_cluster_wsie_vendors_list($cluster_ids){
			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => API_MAIN_URL.'clusters/getvenderbycluster',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS =>'{
			"cluster_ids": "'.$cluster_ids.'"
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



	
	public function get_all_hardware_master_list(){
			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
				$curl = curl_init(); 
				curl_setopt_array($curl, array(
				CURLOPT_URL => API_MAIN_URL.'categories/gethardwarelist',
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



	
		
		public function get_cluster_wsie_shifts_list($cluster_ids){
			$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => API_MAIN_URL.'tasksections/getshiftdatalist',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS =>'{
			"cluster_id": "'.$cluster_ids.'"
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