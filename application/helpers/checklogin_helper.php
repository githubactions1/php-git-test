<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
function d_m_y_conversion($getdate){
return date("d-m-Y", strtotime($getdate));
}
function y_m_d_conversion($getdate){
return date("Y-m-d", strtotime($getdate));
}

function DateTimeconversion($getdate){
if(trim($getdate)!='0000-00-00 00:00:00' && trim($getdate)!=''){
return date('d-M-Y (h:i A)', strtotime($getdate));
}else{
return ''; 
}
}

function Dateconversion($getdate){
if(trim($getdate)!='0000-00-00'){
return date('d-M-Y', strtotime($getdate));
}else{
return '';
}
}
function Timeconversion($getdate){
if(trim($getdate)!='00:00:00' && trim($getdate)!=''){
return date('h:i A', strtotime($getdate));
}else{
return '';
}
}
function Datebreakconversion($getdate){
if(trim($getdate)!='0000-00-00 00:00:00'){
return date('d-m-Y', strtotime($getdate)).'<br>'.date('(h:i A)', strtotime($getdate));
}else{
return '';
}
}

function split_str($str) 
{
if(!empty($str)){
$url_name=	strtolower($str);
$url_name1 = stripslashes(str_replace("'", '', $url_name));
$url_name2 = str_replace(str_split('~[\\\\/:&+*?"<>|]~'), '-', $url_name1);
$url_name2 = str_replace(str_split('()'), '', $url_name2);
$url_name3 = preg_replace('/[^A-Za-z0-9]/', '-',$url_name2);
$url_name3 = stripslashes(str_replace("---", '-', $url_name3));
$url_name3 = stripslashes(str_replace("--", '-', $url_name3));
}
return $url_name3;	
}
function check_admin_login(){ 
$CI= & get_instance();		
$CI->load->library('session');
$CI->load->helper('url');
$check=$CI->session->userdata('user_type');
$user_id=$CI->session->userdata('user_id');
if($user_id =='' || $check != 0){
redirect(base_url().'master');
}
}
function get_url($str) 
{
if(!empty($str)){
$url_name=	strtolower(trim($str));
$url_name1 = stripslashes(str_replace("'", '', $url_name));
$url_name2 = str_replace(str_split('~[\\\\/:&+*?"<>|]~'), '-', $url_name1);
$url_name2 = str_replace(str_split('()'), '', $url_name2);
$url_name3 = preg_replace('/[^A-Za-z0-9]/', '-',$url_name2);
$url_name3 = stripslashes(str_replace("---", '-', $url_name3));
$url_name3 = stripslashes(str_replace("--", '-', $url_name3));
}
return $url_name3;	
}
function check_cus_login(){ 
$CI= & get_instance();		
$CI->load->library('session');
$CI->load->helper('url');
$user_type=$CI->session->userdata('user_type');
$customer_id=$CI->session->userdata('customer_id');
if($customer_id=='' && $user_type!='1'){
redirect(base_url().'customer');
}
}
function Genearate_Password(){
$pwddigt  =  substr(rand(1,1000000),0,4); 
$password =   'PWD'.$pwddigt;
return $password;	
}
function Genearate_customer_Id($lastId){
if (strlen($lastId) == 1) {
					$reference_id = 'CUS'.'000000' .$lastId;
				} else if (strlen($lastId) == 2) {
					$reference_id = 'CUS'.'00000'.$lastId;
				} else if (strlen($lastId) == 3) {
					$reference_id = 'CUS'.'0000'.$lastId;
				} else if (strlen($lastId) == 4) {
					$reference_id = 'CUS'.'000'.$lastId;
				}
				else if (strlen($lastId) == 5) {
					$reference_id = 'CUS'.'00'.$last_id;
				}
				else if (strlen($last_id) == 6) {
					$reference_id = 'CUS'.'0'.$last_id;
				}
				else {
					$reference_id = 'CUS'.$last_id;
				}
	return $reference_id;
}

function round_price($str){
	return str_replace(',','',number_format(floatval($str),2));
}

function base64_to_jpeg($base64_string){
				$output_file="test";
				// open the output file for writing
				// $base64_string1=file_put_contents('foo.png', base64_decode($base64_string)); 

				header("Content-type: image/gif");
				$data = $base64_string;
				echo base64_decode($data);
				
	}


function get_common_string($str) 
{
if(!empty($str)){
$url_name=	strtolower($str);
$url_name1 = stripslashes(str_replace("'", '', $url_name));
$url_name2 = str_replace(str_split('~[\\\\/:&+*?"<>|]~'), '', $url_name1);
$url_name2 = str_replace(str_split('()'), '', $url_name2);
$url_name3 = preg_replace('/[^A-Za-z0-9]/', '',$url_name2);
$url_name3 = stripslashes(str_replace("---", '', $url_name3));
$url_name3 = stripslashes(str_replace("--", '', $url_name3));
}
return $url_name3;	
}