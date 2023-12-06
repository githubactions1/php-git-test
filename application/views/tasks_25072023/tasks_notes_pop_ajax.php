 <style>
 
.note-scroll{
	overflow-y: auto;
    overflow-x: hidden;
}

.note-scroll p{
	line-height: 24px;
	margin:0px;
}
.time {
    color: #2a2839;
    font-weight: 600;
}
 </style>
 <div class="modal-header">
          <h5 class="modal-title mt-0" id="myLargeModalLabel">Task <?php echo $note_type == 1 ? 'Notes' : 'Documents'?> (<?php  echo $task_details->task_no;?>)</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-hidden="true"></button>
        </div>
        <div class="modal-body">
		
            <div class="row note-scroll" >
             
				<?php 
				$i=0;
				if(!empty($tasks_notes_list)){
				foreach($tasks_notes_list as $key1=>$tasks_note){
				?>
				<div class="bg-light">
						
					
					 
						<div class="time"><?php echo $tasks_note->emp_name;?> -
						<?php echo Datetimeconversion($tasks_note->created_date_time);?></div>
					<?php if($tasks_note->note_type == 1){ ?>
					<?php echo $tasks_note->note;?>

					<?php } else { ?>
					<?php if(!empty($tasks_note->attachment)){ ?>
					<a href="<?php echo $tasks_note->attachment;?>" target="_blank" class="btn btn-sm btn btn-success">Attachment</a>
					<?php } ?>
					<?php } ?>
					 <p>Note Type : <?php echo $tasks_note->internal_type == 1 ? 'External' : 'Internal' ;?></p>
              </div>
			  <hr>
			  <?php }  } ?>
           
			  
			  
            </div>
            <div class="row"> 
             
              <div class="col-12 text-end"> 
               <button type="button" class="btn btn-success" data-bs-dismiss="modal">Ok</button>
              </div>
            </div>
         
        </div>
		
	