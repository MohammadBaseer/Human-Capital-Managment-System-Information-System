<?php 
include_once('header.php');


 ?>



<div class="pcoded-main-container">
<div class="pcoded-wrapper">
<div class="pcoded-content">
<div class="pcoded-inner-content">

<div class="page-header">
<div class="page-block">
<div class="row align-items-center">
<div class="col-md-12">
<div class="page-header-title">
<h5 class="m-b-10">E-Leave System</h5>
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="home.php"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item"><a href="javascript:">Leave Managment</a></li>
</ul>
</div>
</div>
</div>
</div>
<div class="main-body">
<div class="page-wrapper">

<div class="row">
<div class="col-xl-12 col-md-12">
<div class="card Application-list">
<div class="card-header">
<h5>Manage Leaves</h5> 
<div class="card-header-right">
<div class="btn-group card-option">
<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="feather icon-more-horizontal"></i>
</button>
<ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
<li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
<li class="dropdown-item minimize-card"><a href="javascript:"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
<li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
<li class="dropdown-item close-card"><a href="javascript:"><i class="feather icon-trash"></i> remove</a></li>
</ul>
</div>
</div>
</div>
<div class="card-block pb-0" style="padding: 15px 0px;">
<!-- ========================================================== -->



<div class="col-sm-12">

<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
<!--  -->
<li class="nav-item">
<a class="nav-link " href="manage_leave.php">Leave Management</a>
</li>
<!--  -->
<li class="nav-item">
<a class="nav-link active" href="#">Approved</a>
</li>
<!--  -->
<li class="nav-item">
<a class="nav-link " href="my_rejected_leaves.php">Rejected</a>
</li>
</ul>




<div class="tab-content" id="pills-tabContent">

<div class="tab-pane fade show active" id="pills-rejected" role="tabpanel" aria-labelledby="pills-rejected-tab">
<!-- ========================================================== -->
<div class="table-responsive">
<a href="#" class="feather icon-printer" style="font-size: 1pc;" onclick="printDiv('print')"> Print</a>
<div id="print">
<table id="key-act-button" class="table table-hover" style="font-size: 0.8em;">
<thead>
<tr>
<!-- <th>ID</th> -->
<th>Name</th>
<th>Department</th>
<th>From Date</th>
<th>To Date</th>
<th>Total Days</th>
<th>Type of Leave</th>
<th>Department Manager</th>
<!-- <th>Approved By</th> -->
<th>Approved by</th>
</tr>
</thead>
<tbody>
<?php 
$department = $auth['department_id'];
$user = $auth['user'];
$sql = "SELECT * FROM leave_forms as l INNER JOIN employees as e on l.employee_id = e.id  INNER JOIN department AS d ON e.department_id = d.departmentid WHERE department_id = '$department' AND user = '$user' AND manager_sign= 'approved' AND hr_sign = 'approved' ";

$result = mysqli_query($conn, $sql);
// $rowcount = mysqli_num_rows($result);



while ($row = mysqli_fetch_assoc($result)) {
?>


 
<tr>
<!-- <td><?php //echo $row['leave_id']; ?></td> -->
<td><?php echo $row['full_name']; ?></td>
<td><?php echo $row['department']; ?></td>
<td><?php echo $row['from_date']; ?></td>
<td><?php echo $row['to_date']; ?></td>
<td><?php echo date_diff(date_create($row['from_date']),date_create($row['to_date']))->format('%d days'); ?></td>
<td><?php echo $row['leave_type']; ?></td>
<td><?php echo $row['manager']; ?></td>
<td>
<?php if($row['hr_sign'] == "approved"){
echo "<span class='text-white label theme-bg f-12'> Manager & HR </span>";
}elseif($row['manager_sign'] == "approved"){
echo "<span class='text-white label theme-bg f-12'> Manager </span>";
}else{
echo "<span class='text-white label theme-bg f-12'> Pending </span>";
}
?> 
</td>


<!-- <td>
<a href="" data-toggle="tooltip" title="Veiw"> 
<i class="feather icon-file" aria-hidden="true"></i>
</a>
</td> -->    
</tr>

<?php } ?>

</tbody>

</table>
</div><br>
</div>
<!-- ======================================= -->
</div>
</div>


<br><br>
<!-- ========================================================== -->
</div>
</div>
</div>


</div>
</div>
</div>
</div>
</div>
</div>
</div>

<script>
  function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var orginalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = orginalContents;
  }
</script>
<?php 

include_once('footer.php');
 ?>


