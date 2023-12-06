<marquee class="news-content" scrolldelay="120">
			<ul>
			<?php 
				if(!empty($flash_news_list)){
				foreach($flash_news_list as $key=>$flash_news){
				?>
			<li><?php echo $flash_news->news_content;?></li>
			<?php } }else { ?>
			<li>Today's Attendance : <span style="color:#e2db0f; font-size: 18px; font-weight: bold;"  id="attendance_count"><?php echo $tattendcount;?></span></li>
			<li>Absent : <span style="color:#6afa0b; font-size: 18px; font-weight: bold;" id="absent_count"><?php echo $absent_count;?></span></li>
			<li>On leave : <span style="color:#f7c413; font-size: 18px; font-weight: bold;"  id="On_leave_count"><?php echo $leave_count;?></span></li>
			
			<li>FRT Today's Attendance : <span style="color:#e2db0f; font-size: 18px; font-weight: bold;"  id="attendance_count"><?php echo $frtattendance_count;?></span></li>
			<li>FRT Absent : <span style="color:#6afa0b; font-size: 18px; font-weight: bold;" id="absent_count"><?php echo $frtabsent_count;?></span></li>
			<li>FRT On leave : <span style="color:#f7c413; font-size: 18px; font-weight: bold;"  id="On_leave_count"><?php echo $frtleave_count;?></span></li>
			
			
			
			<?php } ?>
			</ul>
			</marquee>