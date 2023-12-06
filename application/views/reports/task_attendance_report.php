<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>:: Trackon Attendance Report ::</title>
</head>

<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    padding: 10px;
    text-align: center;
}
.logo {
    background: #5a9bd5;
    height: auto;
    padding: 20px 0;
}
.logo p {
    text-align: left;
    margin: 0px;
    line-height: 0px;
}
.logo img {
    width: 150px;
    height: 40px;
}
.date {
    width: 100%;
}
.date p {
    text-align: center;
    font-size: 16px;
    font-weight: bold;
    margin: 0px;
    padding: 10px;
}
.report {
    background: #f2f2f2;
    height: auto;
    padding: 20px 0;
}
.report p {
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    margin: 0px;
    padding: 10px;
}
.approx {
    background: #d4ffe5;
    height: auto;
    padding: 20px 0;
}
.approx p {
    text-align: center;
    font-size: 16px;
    font-weight: bold;
    margin: 0px;
    padding: 10px;
}
.long {
    color: #4739d6;
    font-weight: bold;
}
.punch {
    color: #f71c1d;
}
.ontime {
    color: #15d666;
}
</style>

<body>
<table width="100%" border="0">
  <tbody>
    <tr class="logo">
      <th colspan="12"><p><img src="<?php echo site_url(); ?>assets/images/logo-light.png" alt="" height="40"></p></th>
    </tr>
    <tr class="report">
      <th colspan="12"><p>Trackon Attendance Report</p></th>
    </tr>
    <!--<tr>
      <td colspan="3">Employee Name</td>
      <td colspan="3">Shift Name</td>
      <td colspan="3">Shift Time</td>
      <td colspan="3">Attendance Report</td>
    </tr>
    <tr>
      <td colspan="3">Karanam Srikanth</td>
      <td colspan="3">S1-FSM_HYD</td>
      <td colspan="3">09:30 AM To 11:59 PM</td>
      <td colspan="3">16-May-2023 to 22-May-2023</td>
    </tr>
    <tr class="approx">
      <td colspan="3"><p>5 <br>
          Attendance Days</p></td>
      <td colspan="3"><p>6 <br>
          Work Days in Period</p></td>
      <td colspan="2"><p>0 <br>
          Extra Worked Days</p></td>
      <td colspan="2"><p>83.33 <br>
          Attendance %</p></td>
    </tr>-->
    <tr class="report">
      <th>Sr. No.</th>
      <th>Employee Name</th>
      <th>Shift Name</th>
      <th>Shift Time</th>
      <th>Date</th>
      <th>Status</th>
      <th>In Time</th>
      <th>Out Time</th>
      <th>Working Hours</th>
      <th>Punch In Location</th>
      <th>Punch In Location Status</th>
      <th>Punch Out Location Status</th>
      <th>Punch In Co-ordinate</th>
    </tr>
	<?php if(!empty($records))
	{
	foreach($records as $key=>$row)  
	{ 
	?>
    <tr>
      <td><?php echo $key+1;?></td>
      <td><?php echo $row->emp_name;?></td>
      <td><?php echo $row->shift_name;?></td>
      <td><?php echo $row->shift_start;?>-<?php echo $row->shift_end;?></td>
      <td><?php echo $row->timedate;?></td>
      <td><?php echo $row->attdnce_sts;?></td>
      <td><?php echo $row->in_time;?></td>
      <td><?php echo $row->out_time;?></td>
      <td><?php echo $row->workinghours;?></td>
      <td><?php echo $row->punch_in_locn;?></td>
      <td><?php echo $row->punch_in_km;?></td>
      <td><?php echo $row->punch_out_km;?></td>
      <td><?php echo $row->coordinates;?></td>
    </tr>
   <?php } } ?>
	
	

  </tbody>
</table>
</body>
</html>
