<style>

td {
word-break: break-all;
}
.servi {
font-size: 12px;
border-radius: 50%;
width: 25px;
height: 25px;
text-align: center;
text-transform: UPPERCASE;
font-weight: bold;
padding-top: 7px;
padding-right: 5px;
}



.ord +tr {
  border-bottom: none;
}


.sts-nam{
font-size: 12px;
}
.bg-load{   
 background-color: rgb(0 0 0 / 48%);
    opacity: 0.7;
}
</style>



<div class="row" id="page_load_grid_data_div" >
<?php 
if(!empty($task_list)){
foreach($task_list as $key2=>$task_row){




$primary_task_status_2=explode(',',$task_row->primary_task_status);
$primary_task_status=$primary_task_status_2[0];
$status_bg_colour=$primary_task_status_2[1];
$bg_color='';
if($status_bg_colour == ''){
$bg_color= 'bg-success';
}
?>
<div class="col-xl-4 col-sm-6 mb-2" data-service_no="<?php echo $task_row->service_no;?>" data-task_no="<?php echo $task_row->task_no; ?>">
<div class="tsk_grid">
<div class="tsk_grid-body">											
<div class="row pro">        
<div class="col-md-6">                                            
<div class="row phar">
<div class="col-md-3">
<span class="badge <?php echo $bg_color;?> servi rounded-pill" style="background-color: <?php echo $status_bg_colour;?>!important;"><?php echo $task_row->task_priority;?></span>
</div>
<div class="col-md-9">
<p>Service Number</p>
<h6 class="mb-4 text-primary"><a href="<?php echo base_url();?>Tasks/update_task/<?php echo $task_row->task_id;?>"><?php echo $task_row->task_no;?></a></h6>  
</div>
</div> 		
</div>
										
<div class="col-md-6">
<div class="text-dark"> 											
<span>Appointment</span>
<p class="text-dark" ><strong style="font-family:Source Sans Pro,sans-serif;font-size:12px;color: #343a40 !important;"><?php echo Dateconversion($task_row->task_appointment_date);?>,<?php echo Timeconversion($task_row->task_appointment_date);?></strong></p>  
</div>											
</div>


</div>										
<div class="col-md-12">
<div class="customer">
<p >Order Number: <span><?php echo $task_row->service_no;?></span></p>
<p>Type: <span><?php echo $task_row->task_type_name;?></span></p>
<p>Organization Unit: <span ><?php echo $task_row->cluster_name;?></span></p>
<p>Customer Information: <span ><?php echo $task_row->circuit_name;?></span></p>
</div>



<div class="font-size-11 text-bold white-space-wrap-default-width" title="<?php echo $task_row->taskAddress?>"><?php echo $task_row->taskAddress?>
</div></div>										
<div class="col-md-12 natco">
<table class="natco-bdy">

<?php 
$emp_list=explode(',',$task_row->call_attended_name);
$sub_task_status_names=explode(',',$task_row->sub_task_status_name);
$sub_task_nos=explode(',',$task_row->sub_task_no);
$sub_task_id=explode(',',$task_row->tasks_ids);
$primary_task_id=$task_row->primary_task_id;
// $primary_task_status=$task_row->primary_task_status;

$sub_task_status_name_ids=explode(',',$task_row->sub_task_status_name_ids);
$primary_task_status_id=$task_row->primary_task_status_id;

$notes_add_disabled=0;
if($primary_task_status_id == 227){
$notes_add_disabled=1;
}

if(!empty($emp_list)){
	$i=1;
	?>
	
	
	<?php 
foreach($emp_list as $key1=>$call_attended_name){

	
	if($primary_task_id == $sub_task_id[$key1]) {
?>
<tr class="<?php if(count($emp_list)>=2){ ?>ord <?php } ?>">
<td> <?php echo $call_attended_name;?><?php if($primary_task_id == $sub_task_id[$key1]) { echo '*'; }?></td>
<td class="sts-nam"><strong>
<?php if(($task_row->task_status=='227') || ($sub_task_status_names[$key1]=='Approved') || ($sub_task_status_names[$key1]=='Removed') || ($primary_task_status=='Approved') || ($primary_task_status_id=='407') || ($primary_task_id != $sub_task_id[$key1] && $sub_task_status_names[$key1] == 'Field Cancel')){ ?>

<span  style="color:<?php echo $status_bg_colour;?>"><?php echo $sub_task_status_names[$key1];?></span>
<?php } else { ?>
<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target=".bs-example-modal-change_status" onclick='getCHange_task_status_pop("<?php echo $sub_task_id[$key1];?>")' style="color:<?php echo $status_bg_colour;?>"> <?php echo $sub_task_status_names[$key1];?> </a> 
</td>
<td>
<?php  if(($primary_task_id == $sub_task_id[$key1]) && $primary_task_status_id!='271') { ?>
<?php if($primary_task_status_id !=226){ ?>
<a href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-md2" onclick='getAssign_task_pop("<?php echo $task_row->task_id;?>")'> <i class="fas fa-pencil-alt"></i></a>
<?php }  ?>
<?php }  ?>
</td>

<?php } ?>



<?php 
$i++;
	}
if($i==3) break;
}
?>

<?php 
foreach($emp_list as $key1=>$call_attended_name){

	
	if($primary_task_id != $sub_task_id[$key1]) {
?>
<tr class="<?php if(count($emp_list)>=2){ ?>ord <?php } ?>">
<td> <?php echo $call_attended_name;?><?php if($primary_task_id == $sub_task_id[$key1]) { echo '*'; }?></td>
<td class="sts-nam"><strong>
<?php if(($task_row->task_status=='227') || ($sub_task_status_names[$key1]=='Approved') || ($sub_task_status_names[$key1]=='Removed') || ($primary_task_status=='Approved') || ($primary_task_status_id=='407') || ($primary_task_id != $sub_task_id[$key1] && $sub_task_status_names[$key1] == 'Field Cancel')){ ?>

<span  style="color:<?php echo $status_bg_colour;?>"><?php echo $sub_task_status_names[$key1];?></span>
<?php } else { ?>
<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target=".bs-example-modal-change_status" onclick='getCHange_task_status_pop("<?php echo $sub_task_id[$key1];?>")' style="color:<?php echo $status_bg_colour;?>"> <?php echo $sub_task_status_names[$key1];?> </a> 
</td>
<td>
<?php  if(($primary_task_id == $sub_task_id[$key1]) && $primary_task_status_id!='271') { ?>
<?php if($primary_task_status_id !=226){ ?>
<a href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-md2" onclick='getAssign_task_pop("<?php echo $task_row->task_id;?>")'> <i class="fas fa-pencil-alt"></i></a>
<?php }  ?>
<?php }  ?>
</td>

<?php } ?>



<?php 
$i++;
	}
if($i==3) break;
}
?>


<td>
<?php
if(count($emp_list)>2){
?>
<?php if(($sub_task_status_name_ids[$key1]=='227') || ($sub_task_status_name_ids[$key1]=='408') || ($primary_task_status_id=='407') || ($primary_task_status_id=='271') || ($primary_task_status_id=='227') || ($primary_task_status_id=='226')){ } else {?>
 <a href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-md2" onclick='getAssign_task_pop("<?php echo $task_row->task_id;?>")'><b>1 & more</b></a>
</strong>
<?php 
}
}
?>
</td>



</tr>
<?php  } ?>


</table>
</div>										
<div class="row">
<div class="col-md-4">
<div class="text-dark"> 											
<div class="owner"><span>Owner / Dispatcher</span></div>
<div class="owner"><span><?php echo $task_row->task_owner_name;?></span></div>
</div>											
</div>											
<div class="col-md-8">
<div class="text-dark"> 
<div class="row">
<div class="col-md-6">											
<div class="attch">
<ul> 												
<li><a href="javascript:void(0)"  data-bs-toggle="modal" data-bs-target=".bs-example-modal-notes_sow" onclick='getNotes_task_show_pop("<?php echo $task_row->task_id;?>",1)'><i class="far fa-edit"></i><?php echo $task_row->notes_count;?></a></li>
<li><a href="javascript:void(0)"  data-bs-toggle="modal" data-bs-target=".bs-example-modal-notes_sow" onclick='getNotes_task_show_pop("<?php echo $task_row->task_id;?>",0)'><i class="fa fa-link" aria-hidden="true"></i><?php echo $task_row->doc_count;?></a></li>
</ul>
</div>												
</div>
<div class="col-md-6">													
<div class="bad">
<ul> 
<li>


<a href="javascript:void(0)" onclick="get_tasks_status_set(<?php echo $task_row->primary_task_status_id;?>)"><img src="<?php echo base_url()?>assets/images/new-updates-sify-icon.svg" alt="" style="width:16px;height:16px;margin: -3px 0 0 0;"></a>



</li>
<li><a href="javascript:void(0)" <?php if($notes_add_disabled == 0){ ?> data-bs-toggle="modal" data-bs-target=".bs-example-modal-md3" <?php } ?> onclick='getTask_section_id_details("<?php echo $task_row->task_id;?>")' ><i class="fa fa-plus-circle"></i></a>
</li>

<li><a href="<?php echo base_url();?>Tasks/update_task/<?php echo $task_row->task_id;?>"><i class="fa fa-edit"></i></a></li>

<li><a href="javascript:void(0)" <?php if($notes_add_disabled == 0){ ?> data-bs-toggle="modal" data-bs-target=".bs-example-modal-notes_add" <?php } ?> onclick='getTask_section_id_details("<?php echo $task_row->task_id;?>")' ><i class="fas fa-ellipsis-h"></i></a>
</li>
<!--<li><a href="#"><i class="fas fa-ellipsis-h"></i></a></li>-->

</ul>
</div>											   
</div>
</div>
</div>											
</div>											
</div>
</div>
</div>
<!--  alerts-->
<?php 
$Date = date('Y-m-d H:i:s',strtotime($task_row->task_appointment_date)); // this format is string comparable
$date_now=date('Y-m-d H:i:00', strtotime("+1 hours", strtotime($Date)));
$cur_date_time=date('Y-m-d H:i:00');

if ($date_now < $cur_date_time) {
?>
<div class=" alert-container">
<div class="alert-icon" title="Task Delayed"><i class="fa fa-exclamation" aria-hidden="true"></i>
</div>
</div>
<?php } ?>
<?php if(in_array('223',$sub_task_status_name_ids)) { ?>
<a href="javascript:void(0)" onclick="get_tasks_status_uat_retry(<?php echo $task_row->task_id;?>)"><div class="alert-container-bottom">
				<div class="alert-icon sync-icon" title="Click to sync task"><i class="fas fa-sync"></i></div>
			</div></a>
<?php } ?>

<!--<div class="alert-container-bottom">
<div class="alert-icon sync-icon" title="Click to sync task"><i class="fa fa-refresh" aria-hidden="true"></i>
</div>
</div>-->
<!-- end -->
</div>    
<?php } } else { ?>
<span class="text-center"><h5>No data available </h5></span>
<?php }  ?>
   

</div>
<?php 
if(!empty($task_list)){ ?>
<div class="text-right" id="load_more_div" > 
<button type="button" class="btn btn-primary" onclick="loadPagination()" ><i class="fa fa-refresh"></i>
Load More</button>
</div>

<?php } ?>
<input type="hidden"  id="pagno" value="0">

<div class="text-center" id="lazyload" style="display:none;" > 
<input type="hidden" id="pages_no" value="<?php echo $pages; ?>">
<img src="<?php echo site_url(); ?>assets/images/monitor-loader.gif"  alt="" />
</div>

<script>

// $(window).on("scroll", function() {
			// var scrollHeight = $(document).height();
			// var scrollPosition = $(window).height() + $(window).scrollTop();
			// if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
			// loadPagination()
			// }
		// });
		
		
		function loadPagination()
		{	
				
		var task_status=$("#task_status").val();
		var category_id=$("#task_category_id").val();

		var search_like=$("#search_like").val();
		var from_date=$("#from_date_input").val();
		var to_date=$("#to_date_input").val();

			var pagno1=$("#pagno").val();
			var pages_no=$("#pages_no").val();
			var set_old_pagno=$("#set_old_pagno").val();
			var pagno=parseInt(pagno1)+1;
			console.log(pagno1);
			console.log(pages_no);
			console.log(pagno);
			if(pages_no == pagno)
			{
				$("#load_more_div").hide();
			}
			if(pages_no >= pagno)
			{
			$("#load_div").show();
			//$("#lazyload").show();
				
				$.ajax({
				type: "post",
				url:"<?php echo site_url(); ?>Tasks/get_tasks_list_ajax_load",
				data:{"task_category_id":category_id,"task_status":task_status,"from_date":from_date,"to_date":to_date,"search_like":search_like,"pagno":pagno,"set_old_pagno":set_old_pagno},
				complete: function(data){  
						var op = data.responseText.trim();
						//$("#lazyload").hide();
						$("#load_div").hide();
						$("#pagno").val(pagno);						
						$("#set_old_pagno").val(pagno);						
						$("#page_load_grid_data_div").append(op); 
					}
				
				});	
			  
			}
		}






</script>


