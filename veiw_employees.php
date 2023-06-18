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
<h5 class="m-b-10">Employee Section</h5>
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="home.php"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item"><a href="javascript:">Manage Employees</a></li>
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
<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Current Staff</a>
</li>
<!--  -->
<li class="nav-item">
<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Resigned Staff</a>
</li>
</ul>
<!-- 
 -->
<div class="card-block pb-0">
<div class="table-responsive">
<div class="tab-content" id="pills-tabContent">
<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
	<!--Model Add Employee button -->
<a href="submit.php" class="btn btn-primary" style="color: #fff; font-size: 0.8em;">Add Employee</a>
<div id="printMe">
<table class="table table-hover" id="key-act-button" style="font-size: 0.8em;">
<thead>
<tr>
<th>Profile Photo</th>
<th>Name</th>
<th>Father Name</th>
<th>Department</th>
<th>Role</th>
<th class="not_print" style="text-align: center;">Action</th>
</tr>
</thead>
<tbody style="font-size: 0.8em;">
<?php 
$sql = "  SELECT a.profile_img, a.full_name, a.father_name, a.id, a.role, b.department FROM employees a,department b WHERE a.department_id = b.departmentid AND (status = 'enable' || status ='disable' || status ='')";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
?>
<tr>
<td><img class="rounded-circle" style="width:50px; height: 50px;" src="profile_img/<?php echo $row['profile_img'];?>" alt="activity-user"></td>
<td>
<h6 class="mb-1"><?php echo $row['full_name']; ?></h6>
<!-- <p class="m-0">Apple</p> -->
</td>
<td>
<h6 class="mb-1"><?php echo $row['father_name']; ?></h6>
<!-- <p class="text-c-green m-0">+ 84 Daily</p> -->
</td>
<td>
<h6 class="m-b-0"><?php echo $row['department']; ?></h6>
</td>
<td>
<h6 class="m-b-0"><?php echo $row['role']; ?></h6>
</td>
<td class="not_print" style="text-align: center;">
<a class="text-white label theme-bg f-12" href="user_leave.php?userleave=<?php echo $row['id'];?>" data-type="inverse" data-animation-in="animated rotateIn" data-animation-out="animated rotateOut">Leaves</a>
<a class="text-white label theme-bg f-12" href="emp_edit.php?empedit=<?php echo $row['id'];?>" data-type="inverse" data-animation-in="animated rotateIn" data-animation-out="animated rotateOut">Edit</a>
<a class="text-white label theme-bg f-12" href="emp_details_view.php?empview=<?php echo $row['id'];?>" data-type="inverse" data-animation-in="animated rotateIn" data-animation-out="animated rotateOut">Veiw</a>
<!-- <a class="label theme-bg2 f-12 text-white" href="controller/href_controller.php?vwempresigned=<?php //echo $row['id'];?>" onclick="return confirm('Are you sure..?')">Resign</a> -->
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
<table class="table table-hover" id="zero-configuration" style="font-size: 0.8em;">
<thead>
<tr>
<th>Profile Photo</th>
<th>Name</th>
<th>Father Name</th>
<th>Department</th>
<th>Role</th>
<th class="not_print" style="text-align: center;">Action</th>
</tr>
</thead>
<tbody style="font-size: 0.8em;">
<?php 
$sql = "  SELECT a.profile_img, a.full_name, a.father_name, a.id, a.role, b.department FROM employees a,department b WHERE a.department_id = b.departmentid AND status = 'Resigned' ";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
?>
<tr>
<td><img class="rounded-circle" style="width:50px; height: 50px;" src="profile_img/<?php echo $row['profile_img'];?>" alt="activity-user"></td>
<td>
<h6 class="mb-1"><?php echo $row['full_name']; ?></h6>
<!-- <p class="m-0">Apple</p> -->
</td>
<td>
<h6 class="mb-1"><?php echo $row['father_name']; ?></h6>
<!-- <p class="text-c-green m-0">+ 84 Daily</p> -->
</td>
<td>
<h6 class="m-b-0"><?php echo $row['department']; ?></h6>
</td>
<td>
<h6 class="m-b-0"><?php echo $row['role']; ?></h6>
</td>
<td class="not_print" style="text-align: center;">
<a class="text-white label theme-bg f-12" href="user_leave.php?userleave=<?php echo $row['id'];?>" data-type="inverse" data-animation-in="animated rotateIn" data-animation-out="animated rotateOut">Leaves</a>
<a class="text-white label theme-bg f-12" href="emp_edit.php?empedit=<?php echo $row['id'];?>" data-type="inverse" data-animation-in="animated rotateIn" data-animation-out="animated rotateOut">Edit</a>
<a class="text-white label theme-bg f-12" href="emp_details_view.php?empview=<?php echo $row['id'];?>" data-type="inverse" data-animation-in="animated rotateIn" data-animation-out="animated rotateOut">Veiw</a>
</td>
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


