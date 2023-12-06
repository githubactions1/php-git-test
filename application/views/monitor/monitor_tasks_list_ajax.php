
<h2 style="padding-bottom: 5px; margin-bottom: 5px; border-bottom:1px solid #c9c1c1; font-size: 15px;"><?php echo count($emplyee_gps_tasks);?> Task Assigned to <span style="color:blue;"><?php echo $emplyee_gps_tasks[0]->call_attend_by_name;?></span><a href="javascript:void(0)" onclick="removeChild_window()" class="close-btn fa fa-times"></a></h2>
<?php if(!empty($emplyee_gps_tasks)) { 
    foreach($emplyee_gps_tasks as $emplyee_gps)
    {
    ?>
<p><span class="bg-primary prority"><?php echo $emplyee_gps->task_priority;?></span>Task Id</span> <span class="appnt"> Appointment</span></p>
<p style="margin-bottom: 5px;"><span><strong><?php echo $emplyee_gps->service_no;?></strong></span><span class="appnt"> <?php echo $emplyee_gps->task_appointment_date;?></span></p>

<div><?php echo $emplyee_gps->task_other_issue;?></div>
<div><?php echo $emplyee_gps->cluster_name;?></div>


<div class="font-size-11 text-bold white-space-wrap-default-width" title="<?php echo $emplyee_gps->taskAddress?>"><?php echo $emplyee_gps->taskAddress?>
</div>
<table class="cts bg-light">
					<tr class="ord">
					<?php 
					$emp_list=explode(',',$emplyee_gps->call_attended_name);
					$sub_task_status_names=explode(',',$emplyee_gps->sub_task_status_name);
					 
					if(!empty($emp_list)){
					foreach($emp_list as $key=>$call_attended_name){ ?>
					<tr class="ord">
					<td> <?php echo $call_attended_name;?> <?php if($call_attended_name == $emplyee_gps->primary_name) { echo '*'; }?></td>
					<td><strong>
					<?php echo $sub_task_status_names[$key];?></strong> 
					</td>
					</tr>
					<?php } } ?>
					</tr>


					</table>
<hr>
<?php } } ?>