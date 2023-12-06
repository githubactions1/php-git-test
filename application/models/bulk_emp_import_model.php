<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Bulk_emp_import_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	
		  public function save_bulk_emp_upload()
	  {
		$token=$this->session->userdata['user']->token;//$this->session->userdata['token'];

		  if((!$_FILES['import_excel']['error']) && ($_FILES['import_excel'] !=''))
		  {
			  $new_image=rand(1,10000)."_".$_FILES['import_excel']['name'];
			  move_uploaded_file($_FILES['import_excel']['tmp_name'],"uploads/".$new_image);
		  }
		  $file = "uploads/".$new_image;
		  

			  //read file from path
			  $objPHPExcel = PHPExcel_IOFactory::load($file);
			  //get only the Cell Collection
			  $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
			  //extract to a PHP readable array format
			  foreach ($cell_collection as $cell) {
				  $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
				  $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
				  $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
				  //header will/should be in row 1 only. of course this can be modified to suit your need.
				  if ($row == 1) {
					  $header[$row][$column] = $data_value;
				  } else {
					  $arr_data[$row][$column] = $data_value;
				  }
			  }
			  //send the data in an array format
			  $data['header'] = $header;
			  $data['values'] = $arr_data; 
			  $length=sizeof($data['values']);
			  
			  
			  // $import_values=$this->db->query("select * from import_bulk_assin_inv_emp where import_id='1'")->result_array();
			  // $import_values=$import_values[0];
			  $uCount_s=0;
			  $uCount_e=0;
			  $uniques=0;
			  $uniques1=0;
			  $message="";
			  foreach($data['values'] as $key=>$val)
			  {
					// echo '<pre>';print_r($val['C']);exit;
						
						if($val['A']!= "" && $val['B']!= "" && $val['C']!= ""  && $val['D']!= ""  && $val['E']!= ""  && $val['F']!= ""  && $val['G']!= ""  && $val['H']!= ""  && $val['I']!= ""  && $val['J']!= ""  && $val['K']!= ""  && $val['L']!= ""  && $val['M']!= "" && $val['N']!= "" && $val['O']!= "" && $val['P']!= ""  ){
							
						$emp_username=trim($val['A']);
						$emp_name=trim($val['B']);
						$emp_designation=trim($val['C']);
						$emp_mobile=trim($val['D']);
						$emp_email=trim($val['E']);
						$emp_code=trim($val['F']);
						$address=trim($val['G']);
						$address2=trim($val['G']);
						$member_type=trim($val['H']);
						$task_type=trim($val['I']);
						
						if(!empty($task_type)){
							$task_type_a=explode(',',$task_type);
							$task_type= "'" . implode ( "', '", $task_type_a ) . "'";
						}
						
						$vendor_name=trim($val['J']);
						if(!empty($vendor_name)){
							$vendor_names_a=explode(',',$vendor_name);
							$vendor_name= "'" . implode ( "', '", $vendor_names_a ) . "'";
						}
						
						$cluster_id=trim($val['L']);
						if(!empty($cluster_id)){
							$cluster_id_a=explode(',',$cluster_id);
							$cluster_id= "'" . implode ( "', '", $cluster_id_a ) . "'";
						}
						
						
						$shift_type_id=trim($val['K'].'-'.$cluster_id_a[0]);
						$city_type=trim($val['M']);
						$total_leaves=trim($val['N']);
						
						$emp_latitude=trim($val['O']);
						$emp_longitude=trim($val['P']);
						$emp_password=substr(rand(1,10000000),0,6); 
						
						$dataArray=array(
							'emp_username'=>$emp_username,
							'emp_name'=>$emp_name,
							'emp_designation'=>$emp_designation,
							'emp_email'=>$emp_email,
							'emp_mobile'=>$emp_mobile,
							'emp_code'=>$emp_code,
							'cluster_id'=>$cluster_id,
							'shift_type_id'=>$shift_type_id,
							'vendor_name'=>$vendor_name,
							'skill_type'=>$task_type,
							'member_type'=>$member_type,
							'address'=>$address,
							'address2'=>$address2,
							'city_type'=>$city_type,
							'total_leaves'=>$total_leaves,
							'emp_latitude'=>$emp_latitude,
							'emp_longitude'=>$emp_longitude 
						);
					 $postData='['.json_encode($dataArray).']';
					
						$curl = curl_init();
						curl_setopt_array($curl, array(
						CURLOPT_URL => API_MAIN_URL.'employees/insertBulkemployee',
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_ENCODING => '',
						CURLOPT_MAXREDIRS => 10,
						CURLOPT_TIMEOUT => 0,
						CURLOPT_FOLLOWLOCATION => true,
						CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						CURLOPT_CUSTOMREQUEST => 'POST',
						CURLOPT_POSTFIELDS =>$postData,
						CURLOPT_HTTPHEADER => array(
						'x-access-token:'.$token,
						'Content-Type: application/json'
						),
						));

						$response = curl_exec($curl);

						curl_close($curl);
					$inrs_results = json_decode($response);
					//echo '<pre>';print_r($inrs_results);exit;  
					if($inrs_results->status==200)
					{
						$uCount_s++;		
					} 
					
					if($inrs_results->status==400)
					{
						$uCount_e++;	
						$message.=$inrs_results->message.'<br>';
					}
					
					if($inrs_results->status==700)
					{
						$uCount_e++;	
						$message.=$inrs_results->message.'<br>';
					}
				}
				
				
			  }
			  
			  
			  
			  $uCount_final= array("success"=>$uCount_s,"errorr"=>$uCount_e,"message"=>$message);
			  // unlink($file);
		  return $uCount_final;
	  } 
	  
	  
	  
	  
	  
	  public function check_bulk_emp_upload()
	  {
	  
		  if((!$_FILES['file']['error']) && ($_FILES['file'] !=''))
		  {
			  $new_image=rand(1,10000)."_".$_FILES['file']['name'];
			  move_uploaded_file($_FILES['file']['tmp_name'],"uploads/".$new_image);
		  }
		  $file = "uploads/".$new_image;
	  
	  
			  //load the excel library
			  // $this->load->library('excel');
			  //read file from path
			  $objPHPExcel = PHPExcel_IOFactory::load($file);
			  //get only the Cell Collection
			  $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
			  //extract to a PHP readable array format
			  foreach ($cell_collection as $cell) {
				  $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
				  $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
				  $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
				  //header will/should be in row 1 only. of course this can be modified to suit your need.
				  if ($row == 1) {
					  $header[$row][$column] = $data_value;
				  } else {
					  $arr_data[$row][$column] = $data_value;
				  }
			  }
			  
			  //send the data in an array format
			  $data['header'] = $header;
			  $data['values'] = $arr_data; 
			  $length=sizeof($data['values']);

			  $uCount=0;
			  $uCounts='';
			  $uniques='';
			  $ecounts='';
					  foreach($data['values'] as $key=>$val) 
					  {
						 
							if($val['A']!= "" && $val['B']!= "" && $val['C']!= ""  && $val['D']!= ""  && $val['E']!= ""  && $val['F']!= ""  && $val['G']!= ""  && $val['H']!= ""  && $val['I']!= ""  && $val['J']!= ""  && $val['K']!= ""  && $val['L']!= ""  && $val['M']!= "" && $val['N']!= "" && $val['O']!= "" && $val['P']!= ""  ){
								$uCount++;		
							}
								
								
							if($val['A']== "" ){	
								$uniques.="check with Username is : ".$val['A']." record In Required fields missing <br>";
							}
							
							if($val['B']== "" || $val['C']== ""  || $val['D']== ""  || $val['E']== ""  || $val['F']== ""  || $val['G']== ""  || $val['H']== ""  || $val['I']== ""  || $val['J']== ""  || $val['K']== ""  || $val['L']== ""  || $val['M']== "" || $val['N']== "" || $val['O']== "" || $val['P']== ""  ){	
								$uniques.="check with Username is : ".$val['A']." record In Required fields missing <br>";
							}
							
					  }
				
				if(!empty($uniques)){
				$uCounts.=$uniques.' AND ';
				}

					$uCounts .=$uCount.' Records Is Ready to Upload'.' <br>'.$ecounts;
			  unlink($file);
		  return $uCounts;
	  }
	
}