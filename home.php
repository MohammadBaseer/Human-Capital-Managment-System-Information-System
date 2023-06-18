<?php 
include_once('header.php');
 ?>

<div class="pcoded-main-container">
<div class="pcoded-wrapper">
<div class="pcoded-content">
<div class="pcoded-inner-content">


<div class="main-body">
<!-- --------------------------------------------------- -->
<?php 
// admin $ HR-Manager
if ($auth['role'] == 'HR-Manager' ) {
?>
<div class="page-wrapper">
 
<div class="row">
<!--  -->
<div class="col-md-6 col-xl-6">
<div class="card theme-bg bitcoin-wallet">
<div class="card-block">
<h5 class="text-white mb-2">Total </h5>
<h2 class="text-white mb-2 f-w-300">
	<?php 
$sql = "  SELECT * FROM employees where status !='Resigned' ";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
echo $count;
	 ?>
</h2>
<span class="text-white d-block">Employee's</span>

<i class="feather icon-users" style="font-size: 5em; color: #000;"></i>
</div>
</div>
</div>
<!--  -->
<div class="col-md-6 col-xl-6">
<a href="#">
<div class="card theme-bg2 bitcoin-wallet">
<div class="card-block">
<h5 class="text-white mb-2">My Department Total</h5>
<h2 class="text-white mb-2 f-w-300">
	<?php 
$owner = $auth['full_name'];
$sql = "SELECT * FROM leave_forms as l INNER JOIN employees as e on l.employee_id = e.id  INNER JOIN department AS d ON e.department_id = d.departmentid WHERE  l.manager = '$owner' AND hr_sign = 'approved' ";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
echo $count;
	 ?>
</h2>
<span class="text-white d-block">Leaves Form Approved</span>
<i class="feather icon-file-text" style="font-size: 5em; color: #000;"></i>
</div>
</div>
</a>
</div>

<!--  -->
</div>
<div class="row">

<div class="col-md-6 col-xl-6">
<div class="card theme-bg2 bitcoin-wallet">
<div class="card-block">
<h5 class="text-white mb-2">Total</h5>
<h2 class="text-white mb-2 f-w-300">
	<?php 
$sql = "SELECT * FROM leave_forms as l INNER JOIN employees as e on l.employee_id = e.id  INNER JOIN department AS d ON e.department_id = d.departmentid WHERE  manager_sign = 'approved' AND hr_sign = '' ";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
echo $count;
	 ?>
</h2>
<span class="text-white d-block">Forms for Approval</span>
<i class="feather icon-file-text" style="font-size: 5em; color: #000;"></i>
</div>
</div>
</div>
<!--  -->
<div class="col-md-6 col-xl-6">
<div class="card theme-bg bitcoin-wallet">
<div class="card-block">
<h5 class="text-white mb-2">Total</h5>
<h2 class="text-white mb-2 f-w-300">
	<?php 
$sql = "  SELECT * FROM employees where status='resigned'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
echo $count;
	 ?>
</h2>
<span class="text-white d-block">Employee's Resigned</span>
<i class="feather icon-users" style="font-size: 5em; color: #000;"></i>
</div>
</div>
</div>
<!--  -->











</div>

</div>
<?php } ?>


<!-- -------------------------------- -->
</div>
</div>
</div>
</div>
</div>
<?php 
include_once('footer.php');
 ?>