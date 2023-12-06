

<li class="active"><a href="javascript:void(0)" onclick="get_tasks_status_set(0)" class="nav-link <?php if($task_status==0) { echo 'active'; }?>">All</a> </li>
<li><a href="javascript:void(0)" onclick="get_tasks_status_set(217)" class="nav-link <?php if($task_status==217) { echo 'active'; }?>"><i class="mdi mdi-checkbox-blank-circle " style="color:#797979!important;"></i> Open- <?php echo $task_status_tabs_cpount->Open_217;?> </a> </li>

<?php if($task_status_tabs_cpount->Assigned_218 > 0){?>
<li><a href="javascript:void(0)" onclick="get_tasks_status_set(218)" class="nav-link <?php if($task_status==218) { echo 'active'; }?>"><i class="mdi mdi-checkbox-blank-circle " style="color: #4d6071!important;"></i> Assigned- <?php echo $task_status_tabs_cpount->Assigned_218;?> </a> </li>
<?php } if($task_status_tabs_cpount->Acknowledged_219 > 0){?>
<li><a href="javascript:void(0)" onclick="get_tasks_status_set(219)" class="nav-link <?php if($task_status==219) { echo 'active'; }?>"><i class="mdi mdi-checkbox-blank-circle " style="color: #5095d3!important;"></i> Acknowledged- <?php echo $task_status_tabs_cpount->Acknowledged_219;?> </a> </li>
<?php } if($task_status_tabs_cpount->Travel_220 > 0){?>
<li><a href="javascript:void(0)" onclick="get_tasks_status_set(220)" class="nav-link <?php if($task_status==220) { echo 'active'; }?>"><i class="mdi mdi-checkbox-blank-circle " style="color: #d7c316!important;"></i> Travel- <?php echo $task_status_tabs_cpount->Travel_220;?> </a> </li>
<?php } if($task_status_tabs_cpount->Onsite_Waiting_for_Access_221 > 0){?>
<li><a href="javascript:void(0)" onclick="get_tasks_status_set(221)" class="nav-link <?php if($task_status==221) { echo 'active'; }?>"><i class="mdi mdi-checkbox-blank-circle " style="color: #ff8a00!important;"></i> Onsite - Waiting for Access- <?php echo $task_status_tabs_cpount->Onsite_Waiting_for_Access_221;?> </a> </li>
<?php } if($task_status_tabs_cpount->Access_Available_WIP_222 > 0){?>
<li><a href="javascript:void(0)" onclick="get_tasks_status_set(222)" class="nav-link <?php if($task_status==222) { echo 'active'; }?>"><i class="mdi mdi-checkbox-blank-circle " style="color: #9ada1d!important;"></i> Access Available - WIP- <?php echo $task_status_tabs_cpount->Access_Available_WIP_222;?> </a> </li>
<?php } if($task_status_tabs_cpount->UAT_223 > 0){?>
<li><a href="javascript:void(0)" onclick="get_tasks_status_set(223)" class="nav-link <?php if($task_status==223) { echo 'active'; }?>"><i class="mdi mdi-checkbox-blank-circle " style="color: #b4f808!important;"></i> UAT- <?php echo $task_status_tabs_cpount->UAT_223;?> </a> </li>
<?php } if($task_status_tabs_cpount->Checklist_Submited_224 > 0){?>
<li><a href="javascript:void(0)" onclick="get_tasks_status_set(224)" class="nav-link <?php if($task_status==224) { echo 'active'; }?>"><i class="mdi mdi-checkbox-blank-circle " style="color: #1d6dda!important;"></i> Checklist Submited- <?php echo $task_status_tabs_cpount->Checklist_Submited_224;?> </a> </li>
<?php } if($task_status_tabs_cpount->UAT_Accepted_225 > 0){?>
<li><a href="javascript:void(0)" onclick="get_tasks_status_set(225)" class="nav-link <?php if($task_status==225) { echo 'active'; }?>"><i class="mdi mdi-checkbox-blank-circle " style="color: #f36666!important;"></i> UAT-Success- <?php echo $task_status_tabs_cpount->UAT_Accepted_225;?> </a> </li>
<?php } if($task_status_tabs_cpount->Complete_226 > 0){?>
<li><a href="javascript:void(0)" onclick="get_tasks_status_set(226)" class="nav-link <?php if($task_status==226) { echo 'active'; }?>"><i class="mdi mdi-checkbox-blank-circle " style="color: #00c0ff!important;"></i> Complete- <?php echo $task_status_tabs_cpount->Complete_226;?> </a> </li>
<?php } if($task_status_tabs_cpount->Approved_227 > 0){?>
<li><a href="javascript:void(0)" onclick="get_tasks_status_set(227)" class="nav-link <?php if($task_status==227) { echo 'active'; }?>"><i class="mdi mdi-checkbox-blank-circle " style="color: #1fceab!important;"></i> Approved- <?php echo $task_status_tabs_cpount->Approved_227;?> </a> </li>
<?php } if($task_status_tabs_cpount->Field_Cancel_271 > 0){?>
<li><a href="javascript:void(0)" onclick="get_tasks_status_set(271)" class="nav-link <?php if($task_status==271) { echo 'active'; }?>"><i class="mdi mdi-checkbox-blank-circle " style="color: #f36666!important;"></i> Field Cancelled- <?php echo $task_status_tabs_cpount->Field_Cancel_271;?> </a> </li>
<?php } if($task_status_tabs_cpount->Rejected_from_SN_407 > 0){?>
<li><a href="javascript:void(0)" onclick="get_tasks_status_set(407)" class="nav-link <?php if($task_status==407) { echo 'active'; }?>"><i class="mdi mdi-checkbox-blank-circle " style="color: #e71c5a!important;"></i> Rejected(ServiceNow)- <?php echo $task_status_tabs_cpount->Rejected_from_SN_407;?> </a> </li>
<?php } if($task_status_tabs_cpount->Incomplete_272 > 0){?>
<li><a href="javascript:void(0)" onclick="get_tasks_status_set(272)" class="nav-link <?php if($task_status==272) { echo 'active'; }?>"><i class="mdi mdi-checkbox-blank-circle " style="color:#931ce7!important;"></i> Incomplete- <?php echo $task_status_tabs_cpount->Incomplete_272;?> </a> </li>
<?php } ?>
<script>
	



		
$('#status_tabs_count_ajax_div a').click(function(e) {
    e.preventDefault();
    $('#status_tabs_count_ajax_div a').removeClass('active');
    $(this).addClass('active');
});
</script>