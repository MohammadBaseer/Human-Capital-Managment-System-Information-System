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
<!-- ===============================-->
<div class="col-xl-12 col-md-12">
<div class="card Application-list">
<div class="card-header">
<h5>View</h5>
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


	<!-- end -->
<!-- 
 -->
 <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Create User Account</a>
</li>
<!--  -->
<li class="nav-item">
<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">User Security</a>
</li>
</ul>
<!-- 
 -->
<div class="card-block pb-0">
<div class="table-responsive">
<div class="tab-content" id="pills-tabContent">
<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
	<!--Model Add Employee button -->

<div id="printMe">
<table class="table table-hover" id="zero-configuration" style="font-size: 0.8em;">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Position</th>
<th>Department</th>
<th>Date</th>
<th style="text-align: center;">Action</th>
</tr>
</thead>
<tbody>
<?php 
$sql = "  SELECT a.*, b.department FROM employees a,department b WHERE a.department_id = b.departmentid AND user =''";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
?>
<tr>
<td><?php echo $row['id'];?></td>
<td><?php echo $row['full_name'];?></td>
<td><?php echo $row['position'];?></td>
<td><?php echo $row['department'];?></td>
<th><?php echo $row['date']; ?></th>
<td style="text-align: center;">
<a href="create_user_account.php?create_user=<?php echo $row['id'];?>" data-type="inverse" data-animation-in="animated rotateIn" data-animation-out="animated rotateOut" data-toggle="tooltip" title="Create Account"><i class="feather icon-user-plus" style="font-size: 1.5em;"></i></a>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<a href="#" class="feather icon-printer" style="font-size: 1pc;" onclick="printDiv('printMe')"> Print</a>

</div>




<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
<div id="print">
<table class="table table-hover" id="col-reorder" style="font-size: 0.8em;">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Position</th>
<th>Department</th>
<th>User</th>
<th>Role</th>
<th>Date</th>
<th>Last Modify</th>
<th style="text-align: center;">Modify</th>
</tr>
</thead>
<tbody>
<?php 
$sql = "  SELECT a.*, b.department FROM employees a,department b WHERE a.department_id = b.departmentid AND NOT user =''";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
?>
<tr>
<td><?php echo $row['id'];?></td>
<td><?php echo $row['full_name'];?></td>
<td><?php echo $row['position'];?></td>
<td><?php echo $row['department'];?></td>
<td><?php echo $row['user'];?></td>
<td><?php echo $row['role'];?></td>
<th><?php echo $row['date']; ?></th>
<th><?php echo $row['date_modify']; ?></th>


<?php 
if ($row['role'] == 'HR-Manager') {
	echo "<td style='text-align: center;'> Not Allow";
}
else{
 ?>

<td style="text-align: center;">
<a href="edit_user_account.php?create_user=<?php echo $row['id'];?>" data-type="inverse" data-animation-in="animated rotateIn" data-animation-out="animated rotateOut" data-toggle="tooltip" title="Update Account"><i class="feather icon-user-plus" style="font-size: 1.5em;"></i></a>
</td>

<?php } ?>
</tr>
<?php } ?>
</tbody>
</table>
<br><br>
</div>

<a href="#" class="feather icon-printer" style="font-size: 1pc;" onclick="printDiv('print')"> Print</a>

</div>
</div>
<br><br>
</div>
</div>
</div>
</div>

 <!-- 
  -->
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


