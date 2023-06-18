<?php 
include_once('header.php');
$error = '';
if (isset($_POST['submit'])) {
$reason       = $_POST['reason'];
$from_date     = date("Y-m-d", strtotime($_POST['from_date']));
$to_date       = date("Y-m-d", strtotime($_POST['to_date']));
$res_per      = $_POST['res_per'];
$leave_type   = $_POST['leave_type'];
$manager       = $_POST['manager'];

$employee_id = $auth['id'];

if (empty($reason) || empty($from_date) || empty($to_date) || empty($res_per) || empty($leave_type) || empty($manager)) {
$error = '<div class="alert alert-danger" style="padding-left: 4%;"><p>Feild is empty*</p></div>';
}
else {
$sql = "INSERT INTO leave_forms
(employee_id, reason, from_date, to_date,  responsible_person, leave_type, manager) VALUES ( '$employee_id', '$reason',  '$from_date', '$to_date', '$res_per', '$leave_type', '$manager')";

if (
  mysqli_query($conn, $sql)
) {
      echo "<script>window.location='manage_leave.php';</script>";
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
}

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
<h5 class="m-b-10">Leave Section</h5>
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="home.php"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item"><a href="javascript:">Submit Form</a></li>
</ul>
</div>
</div>
</div>
</div>
<div class="main-body">
<div class="page-wrapper">

<div class="row">
<!-- =========Degree===== -->

<div class="col-xl-12 col-md-12">
<div class="card user-list">
<div class="card-header">
<h5>Leave Forn</h5>
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
<div class="card-block">
<div class="col-sm-9">
<form method="POST">
<!-- ========== -->
<?php echo $error; ?>
<div class="form-group row" style="margin: -10px; ">
<div class="col-sm-12 input-group-sm mb-3" style="display: inherit;">
<td><label class="col-sm-3 col-form-label col-form-label-sm"><b>Reason:</b></label></td>
<td><textarea class="form-control max-textarea" maxlength="225" rows="4" name="reason"></textarea></td>
</div>
</div>
<!-- ========== -->
<div class="form-group row" style="margin: -10px; ">
<div class="col-sm-12 input-group-sm mb-3" style="display: inherit;">
<td><label class="col-sm-3 col-form-label col-form-label-sm"><b>From Date</b></label></td>
<td><input type="date" name="from_date" class="form-control" /></td>
</div>
</div>
<!-- ========== -->
<div class="form-group row" style="margin: -10px; ">
<div class="col-sm-12 input-group-sm mb-3" style="display: inherit;">
<td><label class="col-sm-3 col-form-label col-form-label-sm"><b>To Date</b></label></td>
<td><input type="date" name="to_date" class="form-control"/></td>
</div>
</div>
<!-- ========== -->
<div class="form-group row" style="margin: -10px; ">
<div class="col-sm-12 input-group-sm mb-3" style="display: inherit;">
<td><label class="col-sm-3 col-form-label col-form-label-sm"><b>Responsible Person</b></label></td>
<td>
<select name="res_per" class="form-control">
<option></option>
<?php
$sql = " SELECT * FROM employees";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
if ($row['full_name'] != $auth['full_name']) {
?>
<option value="<?php echo $row['full_name'];?>">
<?php echo $row['full_name']; ?>
</option>
<?php }}?>
</select>
</td>
</div>
</div>
<!-- ========== -->
<div class="form-group row" style="margin: -10px; ">
<div class="col-sm-12 input-group-sm mb-3" style="display: inherit;">
<td><label class="col-sm-3 col-form-label col-form-label-sm"><b>Leave Type</b></label></td>
<td>
<select name="leave_type" class="form-control">
<option value="Sick">Sick Leave</option>
<option value="Annual">Annual Leave</option>
<option value="Urgent">Urgent leave</option>
</select>
</td>
</div>
</div>
<!-- =================== -->

<div class="form-group row" style="margin: -10px; ">
<div class="col-sm-12 input-group-sm mb-3" style="display: inherit;">
<td><label class="col-sm-3 col-form-label col-form-label-sm"><b>Manager</b></label></td>
<td>
<select name="manager" class="form-control">
<option></option>
<?php
$query = mysqli_query($conn,"SELECT * FROM employees");
while ($row = mysqli_fetch_assoc($query)) {




if ($auth['role'] == 'Team-Manager') {
//======================
if ($row['full_name'] != $auth['full_name'] AND ($row['role'] == 'HR-Manager' AND $row['role'] != 'Team-Manager')) {
?>
<option value="<?php echo $row['full_name']; ?>"><?php echo $row['full_name']; ?></option>
<?php }
//=====================	
}
else
{


//======================
if ($row['full_name'] != $auth['full_name'] AND $auth['role'] != 'HR-Manager' AND ($row['role'] == 'HR-Manager' || $row['role'] == 'Team-Manager')) {
?>
<option value="<?php echo $row['full_name']; ?>"><?php echo $row['full_name']; ?></option>
<?php }
//=====================





} }?>





</select>
</td>
</div>
</div>











<!-- ========== -->
<div class="form-group row" style="margin: -10px; ">
<div class="col-sm-12 input-group-sm mb-3" style="display: inherit;">
<td><label class="col-sm-3 col-form-label col-form-label-sm"><b>Submit Date</b></label></td>
<td>
<?php
date_default_timezone_set('Asia/Kabul');
echo date('l jS \of F Y h:i:s A'); ?>
</td>
</div>
</div>

<!--  -->
<br>
<div class="col-md-12 form-group">
<button type="submit" name="submit" class="btn btn-primary" >Submit</button>
<button type="reset" class="btn btn-default">Reset</button>
</div>
</form>
</div>
</div>
</div>
<!-- =========/Degree===== -->


</div>
</div>
</div>
</div>
</div>
</div>

</div>
</div>

<?php 

include_once('footer.php');
 ?>
