<?php 
include_once('header.php');
?>
<div class="pcoded-main-container">

<?php
if (isset($_POST['change'])) {
	$own_id = $auth['id'];
	$pass = $_POST['pass'];
	if (empty($pass)) {
$error = '<div class="alert alert-danger" style="padding-left: 4%;"><p>Empty Password*</p></div>';	
}else{
	mysqli_query($conn, "UPDATE employees SET  password = '" . SHA1($pass) . "' WHERE id=$own_id");
$error = '<div class="alert alert-success" style="padding-left: 4%;"><p>Password Changed*</p></div>';
}
}
 ?>



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
<h5 class="mt-4">Settings</h5>
<hr>
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Settings</a>
</li>
</ul>




<div class="tab-content" id="pills-tabContent">
	<div class="col-sm-12">

<?php 
echo @$error;
$verification = $auth['role'] == 'HR-Manager';
$sql = "SELECT * FROM employees ";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

if ($row['role'] == $verification) {

//echo $auth['role'];
 ?>
	<div class="row">

<div class="col-sm-6" style="border-bottom: solid 1px;">
<!-- ====================== -->
<h6>Note:</h6>
<p>Backup Whole database.</p>
<a href="backup.php" class="btn btn-success">Backup</a>
<br><br>
</div>



<div class="col-sm-6" style="border-bottom: solid 1px;">
<br>

<form method="POST">
	<label>Enter New Password</label>
	<input type="Password" name="pass" class="form-control col-sm-10" placeholder="new Password">
	<br>
	<button class="btn btn-success" name="change">Change</button>

</form>
<br>
</div>
</div>
<?php } 
else{
	?>
<div class="col-sm-12">
<br>

<form method="POST">
	<label>Enter New Password</label>
	<input type="Password" name="pass" class="form-control col-sm-4" placeholder="new Password">
	<br>
	<button class="btn btn-success" name="change">Change</button>

</form>
<br>
</div>
	<?php
}
?>

</div>
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


