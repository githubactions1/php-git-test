

<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.ico">
<link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" type="text/css" />

<!-- Bootstrap Css -->
<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="<?php echo base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="<?php echo base_url();?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<div id="layout-wrapper"> 

<div class="page-content">
    <div class="container-fluid">
			<h3>Dashboard <?php echo $emp_id;?></h3>
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <div id="piechart" style="width: 100%; height: 500px;"></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <div id="donutchart" style="width: 100%; height: 500px;"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title md-3">Attendance Chart of Rigger Engineers in Regions By Date</h4>
              <div id="columnchart_values" style="width: 100%; height: 500px;"></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title md-3">Attendance by Vendor</h4>
              <table id="example" class="table table-striped">
                <thead>
                  <tr>
                    <th>Vender</th>
                    <th>Cluster</th>
                    <th>Employees</th>
                    <th>Days</th>
                    <th>Present Days</th>
                    <th>Weekly Off Days</th>
                    <th>Absent Days</th>
                  </tr>
                </thead>
                <tbody>
					<?php 
					if(!empty($all_atndnce_Vndrprcsnt_4th_grid)){
					foreach($all_atndnce_Vndrprcsnt_4th_grid as $key=>$Vndrprcsnt_4th_grid){
					?>
                  <tr>
                    <td><?php echo $Vndrprcsnt_4th_grid->sub_cat_name;?></td>
                    <td><?php echo $Vndrprcsnt_4th_grid->cluster_name;?></td>
                    <td><?php echo $Vndrprcsnt_4th_grid->emply_ct;?></td>
                    <td><?php echo $Vndrprcsnt_4th_grid->ttl_days;?></td>
                    <td><?php echo $Vndrprcsnt_4th_grid->present;?></td>
                    <td><?php echo $Vndrprcsnt_4th_grid->weeklyoff;?></td>
                    <td><?php echo $Vndrprcsnt_4th_grid->absent;?></td>
               
                  </tr>
					<?php } } ?>
                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title md-3">Utilization Summary</h4>
              <div id="columnchart_values1" style="width: 100%; height: 500px;"></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title md-3">Utilization Status By Cluster</h4>
              <table id="example1" class="table table-striped">
                <thead>
                  <tr>
                    <th>Region</th>
                    <th>Circle</th>
                    <th>Cluster</th>
                    <th>Date</th>
                    <th>Utilized</th>
                    <th>Not Utilized</th>
                    <th>Absent / On Leave</th>
                    <th>Weekly Off</th>
                    <th>Tasks Attended Punch In Missing</th>
                  </tr>
                </thead>
                <tbody>
				<?php 
					if(!empty($utliztn_Clstrsmry_6th_grid)){
					foreach($utliztn_Clstrsmry_6th_grid as $key=>$utliztn_Clstrsmry_6th){
					?>
                  <tr>
                    <td><?php echo $utliztn_Clstrsmry_6th->zone_name;?></td>
                    <td><?php echo $utliztn_Clstrsmry_6th->state_name;?></td>
                    <td><?php echo $utliztn_Clstrsmry_6th->cluster_name;?></td>
                    <td><?php echo $utliztn_Clstrsmry_6th->timedate;?></td>
                    <td><?php echo $utliztn_Clstrsmry_6th->utilized;?></td>
                    <td><?php echo $utliztn_Clstrsmry_6th->not_utilized;?></td>
                    <td><?php echo $utliztn_Clstrsmry_6th->absent;?></td>
                    <td><?php echo $utliztn_Clstrsmry_6th->weeklyoff;?></td>
                    <td><?php echo $utliztn_Clstrsmry_6th->punch_miss;?></td>
                  </tr>
					<?php } } ?>
                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title md-3">Not Utilized Members by Date</h4>
              <div id="columnchart_values2" style="width: 100%; height: 500px;"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title md-3">Attendance Days, Utilization and Task Counts</h4>
              <table id="example2" class="table table-striped">
                <thead>
                  <tr>
                    <th>Region</th>
                    <th>Circle</th>
                    <th>Cluster</th>
                    <th>Vendor</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Duration</th>
                    <th>Present Days</th>
                    <th>Weekly Off's</th>
                    <th>Absent / On Leave</th>
                    <th>Tasks Assigned</th>
                    <th>Tasks Attended</th>
                    <th>Tasks Complete</th>
                  </tr>
                </thead>
                <tbody>
					<?php 
					if(!empty($utilz_tn_taskcnt_8th_grid)){
					foreach($utilz_tn_taskcnt_8th_grid as $key8=>$utilz_tn_taskcnt_8){
					?>
                  <tr>
                    <td><?php echo $utilz_tn_taskcnt_8->region;?></td>
                    <td><?php echo $utilz_tn_taskcnt_8->circle;?></td>
                    <td><?php echo $utilz_tn_taskcnt_8->cluster;?></td>
                    <td><?php echo $utilz_tn_taskcnt_8->vendor;?></td>
                    <td><?php echo $utilz_tn_taskcnt_8->emp_name;?></td>
                    <td><?php echo $utilz_tn_taskcnt_8->designation;?></td>
                    <td><?php echo $utilz_tn_taskcnt_8->duration;?></td>
                    <td><?php echo $utilz_tn_taskcnt_8->present;?></td>
                    <td><?php echo $utilz_tn_taskcnt_8->weeklyoff;?></td>
                    <td><?php echo $utilz_tn_taskcnt_8->absent;?></td>
                    <td><?php echo $utilz_tn_taskcnt_8->tsk_asgn;?></td>
                    <td><?php echo $utilz_tn_taskcnt_8->task_atnd;?></td>
                    <td><?php echo $utilz_tn_taskcnt_8->task_cmplt;?></td>
                  </tr>
					<?php } } ?>
                  
               
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <h4 class="card-title mb-4">Assigned Tasks - Engineers and Riggers</h4>
                <div class="col-md-6 text-center">
                  <h1><?php echo $tasks_ts_rprt_9th_grid->ttl_eng==null ? 0:$tasks_ts_rprt_9th_grid->ttl_eng;?></h1>
                  <p>Engineer - Tasks Assigned</p>
                </div>
                <div class="col-md-6 text-center">
                  <h1><?php echo $tasks_ts_rprt_9th_grid->ttl_reg==null ? 0:$tasks_ts_rprt_9th_grid->ttl_reg;?></h1>
                  <p>Riggers - Tasks Assigned</p>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="row">
                <h4 class="card-title mb-4">Attended Tasks - Engineers and Riggers</h4>
                <div class="col-md-6 text-center">
                  <h1><?php echo $tasks_ts_rprt_9th_grid->task_atnd_eng==null ? 0:$tasks_ts_rprt_9th_grid->task_atnd_eng;?></h1>
                  <p>Engineer - Tasks Attended</p>
                </div>
                <div class="col-md-6 text-center">
                  <h1><?php echo $tasks_ts_rprt_9th_grid->task_atnd_reg==null ? 0:$tasks_ts_rprt_9th_grid->task_atnd_reg;?></h1>
                  <p>Riggers - Tasks Attended</p>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="row">
                <h4 class="card-title mb-4">Complete Tasks - Engineers and Riggers</h4>
                <div class="col-md-6 text-center">
                  <h1><?php echo $tasks_ts_rprt_9th_grid->task_cmplt_eng==null ? 0:$tasks_ts_rprt_9th_grid->task_cmplt_eng;?></h1>
                  <p>Engineer - Tasks Complete</p>
                </div>
                <div class="col-md-6 text-center">
                  <h1><?php echo $tasks_ts_rprt_9th_grid->task_cmplt_reg==null ? 0:$tasks_ts_rprt_9th_grid->task_cmplt_reg;?></h1>
                  <p>Riggers - Tasks Complete</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title md-3">Assigned - Attendance - Complete Tasks By Engineers and Riggers By Region</h4>
              <div id="columnchart_material" style="width: 100%; height: 500px;"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <h4 class="card-title mb-4">Tasks and Assigned</h4>
                <div class="col-md-12 text-center">
                  <h1>3,218</h1>
                  <p>Assigned Tasks</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 text-center">
                  <h1>4,736</h1>
                  <p>Assignments</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 text-center">
                  <h1>687</h1>
                  <p>Engg / Riggers Count</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 text-center">
                  <h1>3,203</h1>
                  <p>Attendence</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title md-3">Assignment Status</h4>
              <div id="donutchart1" style="width: 100%; height: 400px;"></div>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <h4 class="card-title mb-4">TAT, Travel Time, Queue Delay, Execution Time</h4>
                <div class="col-md-12 text-center">
                  <h1>306.3</h1>
                  <p>Implementation - Avg Field TAT (mins)</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 text-center">
                  <h1>216.6</h1>
                  <p>Infrastructure Support - Avg Field TAT (mins) </p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 text-center">
                  <h1>131.8</h1>
                  <p>Customer Support - Queue Delay (mins)</p>
                </div>
                <div class="col-md-6 text-center">
                  <h1>97.2</h1>
                  <p>Feasibility - Queue Delay (mins)</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 text-center">
                  <h1>136.9</h1>
                  <p>Implementation - Queue Delay (mins) </p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 text-center">
                  <h1>73.6</h1>
                  <p>Infrastructure Support - Execution Time (mins) </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!--- Task Assignments and Travel Time start here -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title md-3">Task Assignments and Travel Time by Travel Distance Ranges</h4>
              <div id="chart_div" style="width: 100%; height: 500px;"></div>
            </div>
          </div>
        </div>
      </div>
      <!--- Task Assignments and Travel Time end here --> 
      
      <!--- Task Assignment Counts and Task Execution start here -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title md-3">Task Assignment Counts and Task Execution Time By Task Type and Region</h4>
              <div id="columnchart_values3" style="width: 100%; height: 500px;"></div>
            </div>
          </div>
        </div>
      </div>
      <!--- Task Assignment Counts and Task Execution end here --> 
      
      <!--- Task Assignment Counts and Task Execution start here -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title md-3">
			  Trackon Task</h4>
              <div>
                <table id="example3" class="display" style="width:100%">
                  <thead>
				  <tbody>
                    <tr>
                      <th>time</th>
                      <th>region</th>
                      <th>circle</th>
                      <th>cluster</th>
                      <th>assigned_emp_name</th>
                      <th>designation</th>
                      <th>vendor Name</th>
                      <th>assign_identity_assign</th>
                      <th>orderno</th>
                      <th>iteration</th>
                      <th>scr_task</th>
                    </tr>
                  </tbody>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--- Task Assignment Counts and Task Execution end here --> 
      
      <!--- Tasks and Team Distribution by Date start here -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title md-3">Tasks and Team Distribution by Date </h4>
              <div id="columnchart_values4" style="width: 100%; height: 500px;"></div>
            </div>
          </div>
        </div>
      </div>
      <!--- Tasks and Team Distribution by Date end here --> 
      
    </div>
    <!-- container-fluid --> 
  </div>
  </div>
  
  
<script src="<?php echo base_url();?>assets/libs/jquery/jquery.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/metismenu/metisMenu.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/simplebar/simplebar.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/node-waves/waves.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script> 
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 

<!-- datatable start here --> 
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.5.1.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/js/dataTables.bootstrap5.min.js"></script> 
	
<script>
		$(document).ready(function () {
    $('#example').DataTable({
        scrollY: 310,
        scrollX: true,
    });
});
	
	$(document).ready(function () {
    $('#example1').DataTable({
        scrollY: 310,
        scrollX: true,
    });
});
	
	$(document).ready(function () {
    $('#example2').DataTable({
        scrollY: 310,
        scrollX: true,
    });
});
	
	</script> 
<!-- datatable start here --> 

<!-- piechart start here --> 
<script>
	      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', '	 per Day'],
          ['Present',     <?php echo $attendance_present_fst_grid->Present==null ? 0:$attendance_present_fst_grid->Present;?>],
          ['Weekly',      <?php echo $attendance_present_fst_grid->Weekoff==null ? 0:$attendance_present_fst_grid->Weekoff;?>],
          ['Absent / On Leave',  <?php echo $attendance_present_fst_grid->Absent==null ? 0:$attendance_present_fst_grid->Absent;?>],         
        ]);

        var options = {
          title: ''
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
	</script> 
<!-- piechart end here --> 

<!-- donutchart start here --> 
<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', '10'],
          ['Utilized',     <?php echo $attendance_emplyee_prcsnt_2nd_grid->ttl_utlized_prsnt==null ? 0:$attendance_emplyee_prcsnt_2nd_grid->ttl_utlized_prsnt;?>],
          ['Not Utilized',      <?php echo $attendance_emplyee_prcsnt_2nd_grid->ttl_n_utlized_prsnt==null ? 0:$attendance_emplyee_prcsnt_2nd_grid->ttl_n_utlized_prsnt;?>],
          ['Weekly Off',  <?php echo $attendance_emplyee_prcsnt_2nd_grid->wekoff_prsnt==null ? 0:$attendance_emplyee_prcsnt_2nd_grid->wekoff_prsnt;?>],
          ['Absent / On Leave', <?php echo $attendance_emplyee_prcsnt_2nd_grid->absnt_prsnt==null ? 0:$attendance_emplyee_prcsnt_2nd_grid->absnt_prsnt;?>],
          ['Tasks Attended Punch',    <?php echo $attendance_emplyee_prcsnt_2nd_grid->n_utlized_eng_prsnt==null ? 0:$attendance_emplyee_prcsnt_2nd_grid->n_utlized_eng_prsnt;?>],
		  ['Engineer',    <?php echo $attendance_emplyee_prcsnt_2nd_grid->ttl_eng==null ? 0:$attendance_emplyee_prcsnt_2nd_grid->ttl_eng;?>],
		  ['Rigger',    <?php echo $attendance_emplyee_prcsnt_2nd_grid->ttl_reg==null ? 0:$attendance_emplyee_prcsnt_2nd_grid->ttl_reg;?>],
        ]);

        var options = {
          title: '',
          pieHole: 0.4,
			 width: 500,
        height: 500,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script> 
<!-- donutchart end here --> 

<!-- donutchart1 start here --> 
<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Approved', '10'],
          ['Field Cancelled',     5],
          ['Assigned',      4],
          ['Complete',  3],
          ['Rejected (ServiceNow)', 4],
          ['Acknowledged',    2],
		  ['Access Not Available',    4],
		  ['Travel',    2],
			['UAT Success',    2],
			['Request For Reschedule',    2],
			['Other',    2],
        ]);

        var options = {
          title: '',
          pieHole: 0.4,
			
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart1'));
        chart.draw(data, options);
      }
    </script> 
<!-- donutchart1 end here --> 

<!-- Attendance Chart of Rigger Engineers in Regions By Date script start here --> 
<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
             var data = google.visualization.arrayToDataTable([
        ['', 'Engineer - Present', 'Engineer - Absent', 'Rigger - Present', 'Rigger - Absent / On',
         'Engineer - Weekly Off', 'Rigger - Weekly Off', { role: 'annotation' } ],
        // ['East Region Attendence', 10, 24, 20, 32, 18, 5, '',],
        // ['West Region Attendence', 16, 22, 23, 30, 16, 9, ''],
        // ['North Region Attendence', 28, 19, 29, 30, 12, 13, ''],
		// ['South Region Attendence', 28, 19, 29, 30, 12, 13, '']
		
			<?php 
			if(!empty($atndnc_Chrt_engreg_prcsnt_3rd_grid)){
			foreach($atndnc_Chrt_engreg_prcsnt_3rd_grid as $key=>$prcsnt_3rd_grid){
			?>
		  ["<?php echo $prcsnt_3rd_grid->timedate;?>", <?php echo $prcsnt_3rd_grid->present_eng;?>, <?php echo $prcsnt_3rd_grid->absent_eng;?>, <?php echo $prcsnt_3rd_grid->present_reg;?>, <?php echo $prcsnt_3rd_grid->absent_reg;?>,<?php echo $prcsnt_3rd_grid->weekoff_eng;?>, <?php echo $prcsnt_3rd_grid->weekoff_reg;?>,'' ,],
			<?php } } ?>
      ]);

           var options = {
        width: 500,
        height: 500,
        legend: { position: 'top', maxLines:  <?php echo count($atndnc_Chrt_engreg_prcsnt_3rd_grid);?> },
        bar: { groupWidth: '75%' },
        isStacked: true,
      };	
		
		 var view = new google.visualization.DataView(data);
      view.setColumns([0, 1, 2, 3, 4, 5, 6, 7]);

		
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script> 
<!-- Attendance Chart of Rigger Engineers in Regions By Date script end here --> 

<!-- Utilization Summary script start here --> 
<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
             var data = google.visualization.arrayToDataTable([
        ['', 'Absent / On Leave', 'Utilized', 'Tasks Attended Punch Miss', 'Not Utilized', 'Weekly Off', { role: 'annotation' } ],
        // ['East Region Status', 10, 24, 20, 32, 18, '',],
        // ['West Region Status', 16, 22, 23, 30, 16, ''],
        // ['North Region Status', 28, 19, 29, 30, 12, ''],
		// ['South Region Status', 28, 19, 29, 30, 12, '']
		
		<?php 
		if(!empty($utliz_tnsmry_5th_grid)){
		foreach($utliz_tnsmry_5th_grid as $key1=>$utliz_tnsmry){
		?>
		["<?php echo $utliz_tnsmry->timedate;?>", <?php echo $utliz_tnsmry->absent;?>, <?php echo $utliz_tnsmry->utilized;?>, <?php echo $utliz_tnsmry->punch_miss;?>,<?php echo $utliz_tnsmry->not_utilized;?>, <?php echo $utliz_tnsmry->weeklyoff;?>,'' ,],
		<?php } } ?>
		
		
		
      ]);

           var options = { 
        width: 500,
        height: 500,
        legend: { position: 'top', maxLines: <?php echo count($utliz_tnsmry_5th_grid);?> },
        bar: { groupWidth: '75%' },
        isStacked: true,
      };	
		
		 var view = new google.visualization.DataView(data);
      view.setColumns([0, 1, 2, 3, 4, 5, 6]);

		
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values1"));
      chart.draw(view, options);
  }
  </script> 
<!-- Utilization Summary script end here --> 

<!-- Not Utilized Members by Date start here --> 
<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
             var data = google.visualization.arrayToDataTable([
        ['', 'South - Not Utilized', 'North - Not Utilized', 'West - Not Utilized', 'East - Not Utilized', { role: 'annotation' } ],
        // ['Engineer: No Tasks Assigned', 10, 24, 20, 32, '',],
        // ['Engineer: No Tasks Assigned', 16, 22, 23, 30, ''],
        // ['Engineer: No Tasks Assigned', 28, 19, 29, 30, ''],
		// ['Engineer: No Tasks Assigned', 28, 19, 29, 30, '']
		<?php 
		if(!empty($not_utlizd_membr_7th_grid)){
		foreach($not_utlizd_membr_7th_grid as $key2=>$not_utlizd_membr){
		?>
		<?php if($not_utlizd_membr->zone_name == 'SOUTH'){ ?>
		["<?php echo $not_utlizd_membr->timedate;?>", <?php echo $not_utlizd_membr->not_utilized;?>, 0, 0, 0, '',],
		<?php }else if($not_utlizd_membr->zone_name == 'NORTH'){ ?>
		["<?php echo $not_utlizd_membr->timedate;?>",0,  <?php echo $not_utlizd_membr->not_utilized;?>, 0, 0, '',],
		<?php }else if($not_utlizd_membr->zone_name == 'WEST'){ ?>
		["<?php echo $not_utlizd_membr->timedate;?>", 0, 0, <?php echo $not_utlizd_membr->not_utilized;?>, 0, '',],
		<?php }else { ?>
		["<?php echo $not_utlizd_membr->timedate;?>", 0, 0, 0, <?php echo $not_utlizd_membr->not_utilized;?>, '',],
		<?php } ?>
		<?php } } ?>
		
		
      ]);

           var options = {
        width: 1000,
        height: 500,
        legend: { position: 'top', maxLines: <?php echo count($not_utlizd_membr_7th_grid);?> },
        bar: { groupWidth: '75%' },
        isStacked: true,
      };	
		
		 var view = new google.visualization.DataView(data);
      view.setColumns([0, 1, 2, 3, 4, 5]);

		
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values2"));
      chart.draw(view, options);
  }
  </script> 

<!-- Not Utilized Members by Date end here --> 

<!--  Assigned - Attendance - Complete start here --> 
<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Eng : Assigned Tasks', 'Rigger: Assigned Tasks', 'Rigger: Attended Tasks', 'Rigger: Complete Tasks', 'Engineer: Assigned Tasks', 'Engineer: Attended Tasks', 'Engineer: Complete Tasks', 'Missing Designation', 'Missing Designation', 'Missing Designation'],
          
		  // ['2014', 1000, 1500, 1100, 800, 500, 650, 850, 450, 664],
          // ['2015', 1170, 460, 250, 190, 200, 345, 455, 567, 675],
          // ['2016', 660, 1120, 300, 110, 200, 385, 445, 512, 622],
          // ['2017', 1030, 540, 350, 160, 275, 312, 414, 515, 680]
		  
		  <?php 
		if(!empty($tasks_ts_Grprprt_10th_grid)){
		foreach($tasks_ts_Grprprt_10th_grid as $key10=>$tasks_ts_Grprprt_10th){
		?>
		['<?php echo $tasks_ts_Grprprt_10th->zone_name;?>', <?php echo $tasks_ts_Grprprt_10th->ttl_eng;?>, <?php echo $tasks_ts_Grprprt_10th->ttl_reg;?>, <?php echo $tasks_ts_Grprprt_10th->task_atnd_reg;?>, <?php echo $tasks_ts_Grprprt_10th->task_cmplt_reg;?>,<?php echo $tasks_ts_Grprprt_10th->task_atnd_eng;?>, <?php echo $tasks_ts_Grprprt_10th->task_cmplt_eng;?>, 0, 0, 0],
		<?php } } ?>
		  
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',			  
          }
			
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script> 
<!--  Assigned - Attendance - Complete end here --> 

<!--- Task Assignments and Travel Time start here --> 
<script>
	  google.charts.load('current', {'packages':['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {

        var button = document.getElementById('change-chart');
        var chartDiv = document.getElementById('chart_div');

        var data = google.visualization.arrayToDataTable([
          ['Travel Start to Onsite Distance Km (Point to Point distance * 1.5)', 'Task Assignments', 'Avg Travel Time (mins)'],
          ['0 to 10', 8000, 23.3],
          ['10 to 20', 24000, 4.5],
          ['20 to 40', 30000, 14.3],
          ['40 to 80', 50000, 0.9],
          ['80 to 160', 60000, 13.1],
			['160 to 320', 60000, 14.1],
			['320 to Infinty', 60000, 15.1]
        ]);

        var materialOptions = {
          width: 900,
          chart: {
            title: '',
            subtitle: ''
          },
          series: {
            0: { axis: 'distance' }, // Bind series 0 to an axis named 'distance'.
            1: { axis: 'brightness' } // Bind series 1 to an axis named 'brightness'.
          },
          axes: {
            y: {
              distance: {label: 'Task Assignments'}, // Left y-axis.
              brightness: {side: 'right', label: 'Travel Time (mins)'} // Right y-axis.
            }
          }
        };

        var classicOptions = {
          width: 1000,
          series: {
            0: {targetAxisIndex: 0},
            1: {targetAxisIndex: 1}
          },
          title: '',
          vAxes: {
            // Adds titles to each axis.
            0: {title: 'parsecs'},
            1: {title: 'apparent magnitude'}
          }
        };

        function drawMaterialChart() {
          var materialChart = new google.charts.Bar(chartDiv);
          materialChart.draw(data, google.charts.Bar.convertOptions(materialOptions));
          button.innerText = 'Change to Classic';
          button.onclick = drawClassicChart;
        }

        function drawClassicChart() {
          var classicChart = new google.visualization.ColumnChart(chartDiv);
          classicChart.draw(data, classicOptions);
          button.innerText = 'Change to Material';
          button.onclick = drawMaterialChart;
        }

        drawMaterialChart();
    };
	</script> 
<!--- Task Assignments and Travel Time end here --> 

<!-- Task Assignment Counts and Task Execution start here --> 
<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
             var data = google.visualization.arrayToDataTable([
        ['', 'Task Assignments', 'Avg Execution Time', { role: 'annotation' } ],
        ['East : Region Task Assignments', 10, 24, '',],
        ['West : Region Task Assignments', 16, 22, ''],
        ['North : Region Task Assignments', 28, 19, ''],
		['South : Region Task Assignments', 28, 19, '']
      ]);

           var options = {
        width: 1000,
        height: 500,
        legend: { position: 'top', maxLines: 4 },
        bar: { groupWidth: '75%' },
        isStacked: true,
      };	
		
		 var view = new google.visualization.DataView(data);
      view.setColumns([0, 1, 2, 3]);

		
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values3"));
      chart.draw(view, options);
  }
  </script> 

<!-- Task Assignment Counts and Task Execution end here --> 

<script>
	
	/* Formatting function for row details - modify as you need */
function format(d) {
    // `d` is the original data object for the row
    return (
        '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
        '<tbody>' +
        '<tr>' +
        '<td>Full name:</td>' +
        '<td>' +
        d.time +
        '</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Extension number:</td>' +
        '<td>' +
        d.region +
        '</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Extra info:</td>' +
        '<td>And any further details here (images etc)...</td>' +
        '</tr>' +
        '</tbody>' +
        '</table>'
    );
}
 
$(document).ready(function () {
    var table = $('#example3').DataTable({
        ajax: 'https://gajanandigitalcabletv.com/Track-On/assets/data/objects.txt',
        columns: [
            {
                className: 'dt-control',
                orderable: false,
                data: null,
                defaultContent: '',
            },
            { data: 'time' },
            { data: 'region' },
            { data: 'circle' },
            { data: 'cluster' },
			{ data: 'assigned_emp_name' },
            { data: 'designation' },
            { data: 'vendorname' },
            { data: 'assign_identity_assign' },			
			{ data: 'orderno' },
            { data: 'iteration' },
            { data: 'scr_task' },
           
        ],
        order: [[1, 'asc']],
    });
 
    // Add event listener for opening and closing details
    $('#example3 tbody').on('click', 'td.dt-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row(tr);
 
        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            row.child(format(row.data())).show();
            tr.addClass('shown');
        }
    });
});
	</script> 

<!-- Tasks and Team Distribution by Date start here --> 
<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
             var data = google.visualization.arrayToDataTable([
        ['', '0 to 1', '1 to 2', '2 to 3', '3 to 4',
         '4 to 5', '5 to Infinity', { role: 'annotation' } ],
        ['Task', 10, 24, 20, 32, 18, 5, '',],
        ['Task', 16, 22, 23, 30, 16, 9, ''],
        ['Task', 28, 19, 29, 30, 12, 13, ''],
		['Task', 28, 19, 29, 30, 12, 13, '']
      ]);

           var options = {
        width: 1000,
        height: 500,
        legend: { position: 'top', maxLines: 4 },
        bar: { groupWidth: '75%' },
        isStacked: true,
      };	
		
		 var view = new google.visualization.DataView(data);
      view.setColumns([0, 1, 2, 3, 4, 5, 6, 7]);

		
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values4"));
      chart.draw(view, options);
  }
  </script> 

<!-- Tasks and Team Distribution by Date end here -->