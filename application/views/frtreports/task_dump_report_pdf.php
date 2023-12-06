<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>:: Task Dump Report ::</title>
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
    padding: 5px;
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
</style>

<body>
<table width="100%" border="0">
  <tbody>
    <tr class="logo">
      <th colspan="14"><p><img src="logo-light.png" alt=""></p></th>
    </tr>
    <tr class="report">
      <th colspan="14"><p>Task Dump Report</p></th>
    </tr>
    <tr class="date">
      <td colspan="7"><p>From Date : <?php echo $this->session->userdata['from_date'];?></p></td>
      <td colspan="7"><p>To Date : <?php echo $this->session->userdata['to_date'];?></p></td>
    </tr>
    <tr class="date">
      <td colspan="7"><p>Unit :</p></td>
      <td colspan="7"><p><?php echo $this->session->userdata['cluster_ids'];?></p></td>
    </tr>
    <tr class="report">
      <th>Sr. No.</th>
      <th>Name (BPID)</th>
      <th>Assignment Identity</th>
      <th>Order Number</th>
      <th>Service Number</th>
      <th>Task Auto Assigned</th>
      <th>Reason for Auto Assignment not done</th>
      <th>Assignment Type</th>
      <th>Auto Assignment Changed By Manager</th>
      <th>Approver</th>
      <th>Task Type</th>
      <th>Creation On</th>
      <th>Status</th>
    </tr>
	<?php if(!empty($records))
	{
	foreach($records as $key=>$row)  
	{ 
	?>
    <tr>
      <td><?php echo $key+1;?></td>
      <td><?php echo $row->Employee_Name;?>(<?php echo $row->Employee_Identity;?>)</td>
      <td><?php echo $row->Assignment_Identity;?></td>
      <td><?php echo $row->Order_Number;?></td>
      <td><?php echo $row->Service_Number;?></td>
      <td><?php echo $row->Task_was_Auto_Assigned;?></td>
      <td><?php echo $row->Reason_For_Auto_assignment_not_done;?></td>
      <td><?php echo $row->Assignment_Type;?></td>
      <td><?php echo $row->Auto_assignment_Changed_By_Manager;?></td>
      <td><?php echo $row->Approver;?></td>
      <td><?php echo $row->Resource_Type;?></td>
      <td><?php echo $row->Timestamp;?></td>
      <td><?php echo $row->Status;?></td>
    </tr>
	<?php } } ?>
  </tbody>
</table>
</body>
</html>
