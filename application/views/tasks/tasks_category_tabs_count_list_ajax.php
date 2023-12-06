
<li class="active"> 
<a href="javascript:void(0)" onclick="get_tasks_category_id_set(0)"  class="nav-link <?php if($category_id==0) { echo 'active'; }?>">All <sup><span class="badge bg-success rounded-pill"> <?php echo $task_main_categories[0]->total_task_counts;?></span></sup></a> </li>
<?php 
if(!empty($task_main_categories)){
foreach($task_main_categories as $key=>$task_main){
?>

<li><a href="javascript:void(0)" onclick="get_tasks_category_id_set(<?php echo $task_main->sub_cat_id;?>)"  class="nav-link <?php if($category_id==$task_main->sub_cat_id) { echo 'active'; }?>"><?php echo $task_main->sub_cat_name;?> <sup><span class="badge bg-danger rounded-pill"><?php echo $task_main->task_counts;?></span></sup></a> </li>

<?php } } ?>