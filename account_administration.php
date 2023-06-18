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
<h5 class="m-b-10">System Administration</h5>
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="home.php"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item"><a href="javascript:">Administration</a></li>
</ul>
</div>
</div>
</div>
</div>
<div class="main-body">
<div class="page-wrapper">

<div class="row"> 
<!-- ========= -->

<div class="col-sm-12">
<h5 class="mt-4">Account Administration</h5>
<hr>
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Account Administraton</a>
</li>
<!-- <li class="nav-item">
<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">User Security</a>
</li> -->
</ul>




<div class="tab-content" id="pills-tabContent">
<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
<table class="table table-hover" id="zero-configuration" style="font-size: 0.8em;">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Position</th>
<th>Department</th>
<th>Role</th>
<th style="text-align: center;">Status</th>
</thead>
<tbody>
<?php 
$sql = "  SELECT a.*, b.department FROM employees a,department b WHERE a.department_id = b.departmentid AND NOT role='' ";
// $sql = "  SELECT a.*, b.department FROM employees a,department b WHERE a.department_id = b.departmentid AND status !='Resigned'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
?>
<tr>
<td><?php echo $row['id'];?></td>
<td><?php echo $row['full_name'];?></td>
<td><?php echo $row['position'];?></td>
<td><?php echo $row['department'];?></td>
<td><?php echo $row['role'];?></td>
<td style="text-align: center;">
<?php 
if ($row['role'] == 'HR-Manager' && ($row['acc_status'] == 'enable' || $row['acc_status'] == '' )) {
// echo "<a class='text-white label theme-bg f-12'> Lock </a>";
?>
<a  data-toggle="tooltip" title="Unable to Lock HR-Managar" style="font-size: 15px; cursor: not-allowed;"> 
<i class="feather icon-user" aria-hidden="true"></i>
</a>
<?php 
 
}
elseif (($row['status'] == '' || $row['status'] == 'enable') AND ($row['acc_status'] == 'enable' || $row['acc_status'] == '')) {
?>
<a href="controller/href_controller.php?lock_account=<?php echo $row['id'];?>" data-toggle="tooltip" title="Lock" style="font-size: 15px; ">
<i class="feather icon-unlock" aria-hidden="true"></i>
</a>
<?php
}
elseif ($row['status'] == 'Resigned')
{
?>
<a  data-toggle="tooltip" title="User Resigned" style="font-size: 15px; cursor: not-allowed;">
<i class="feather icon-x-circle" aria-hidden="true"></i>
</a>
<?php 
}
else
{
?>
<a href="controller/href_controller.php?unlock_account=<?php echo $row['id'];?>" data-toggle="tooltip" title="Unlock" style="font-size: 15px;">
<i class="feather icon-lock" aria-hidden="true"></i>
</a>

<?php
} 
?>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>

<div class="clear-fix"></div>

<!-- <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
</div> -->
</div>
</div>
<!-- ======= -->

</div>
</div>
</div>
</div>
</div>

<?php 

include_once('footer.php');
 ?>


