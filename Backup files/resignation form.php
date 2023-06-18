<?php 
include_once('header.php');

 ?>


<div class="pcoded-main-container">
  <?php 
 // echo $auth['departmentid'];
  $my_id = @$auth['id'];

// ===========================


if (isset($_POST['send'])) {
  $to = $_POST['to'];
  $letter = $_POST['letter'];
if (!empty($to) AND !empty($letter)) {
      if (strlen($letter) <= 50) {
  $error = '<div class="alert alert-danger" style="padding-left: 4%;"><p>Letter Should Not Less then 50 Characters*</p></div>'; 
 }
  else
  {
  $date = date("Y-m-d");
   $dep = $auth['department'];
// run query to check already have row with same emp_id
$query = "SELECT * FROM resignation WHERE emp_id = '$my_id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($row['emp_id'] == $auth['id'] AND ($row['team_m_approval'] == '' || $row['hr_approval'] == '' )) {

$error = '<div class="alert alert-danger" style="padding-left: 4%;"><p>Already Submitted*</p></div>';
}
else
{
  $sql = "INSERT INTO resignation (`department`, `supervisor`, `letter`, `emp_id`, `r_date`) VALUES ('$dep','$to','$letter','$my_id', '$date')";
  if ($result = mysqli_query($conn,$sql)) {
}
// 
else{
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}


}
}
else{
$error = '<div class="alert alert-danger" style="padding-left: 4%;"><p>To or Letter is Empty*</p></div>';

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
<h5 class="m-b-10">Resignation</h5>
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="home.php"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item"><a href="javascript:">Resignation</a></li>
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
<h5><a href="javascript:;" onclick="window.history.back(-1);"> Resignation </a> / Resignation Form</h5>
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

<!-- =============================================================== -->
<?php 
$get = "SELECT * FROM employees a,resignation b WHERE a.id = b.emp_id AND id = $my_id AND b.team_m_approval != 'rejected' AND b.hr_approval != 'rejected' "  ;


$run = mysqli_query($conn, $get);
$row = mysqli_fetch_assoc($run);




if ($row['id'] == $my_id)
{


echo @$error; ?>

<h5 style="color: red;">You Request is Under Proccess...</h5>
<p><strong>Note:</strong></p>
<p style="padding-left: 25px; margin-top: -15px;">
  After HR Approval Your Account will be disable automatically.
</p><br>
<div class="col-xl-6">
<h5 style="font-weight: bolder; color: #3f4d6787;">Approval Status</h5>
<table class="">
  <tr>
    <td style="padding: 2px 25px 2px 25px; font-weight: bolder;">Supervisor Approval:</td>
    <td style="padding: 2px 25px 2px 25px; color: gray;"><?php echo $row['team_m_approval']; ?></td>
  </tr>
  <tr>
    <td style="padding: 2px 25px 2px 25px; font-weight: bolder;">HR Approval:</td>
    <td style="padding: 2px 25px 2px 25px;"><?php echo $row['hr_approval']; ?></td>
  </tr>
</table>

</div>
<br>
<p style="font-weight: bolder;">Remark:</p><br>
<p style="padding-left: 25px; margin-top: -38px;"><?php echo $row['remark']; ?></p>
</p>
<br><br>
<?php
}









 
else
{
?>





  <!-- ============= -->
<div class="col-xl-12 col-md-12">

  



<br>
<div>
<?php echo @$error; ?>
<form method="POST">
 <td><label class="control-label"><b>To*</b></label></td>
 <td> <select name="to" class="form-control">







 <?php
 $var = $auth['department_id'];
if ($auth['role'] == 'Team-Manager') {//if open


$query =  "SELECT * FROM employees WHERE role = 'HR-Manager' ";
$result = mysqli_query($conn,$query);

?>
<option value="">Sent to</option>
<?php
while ($rows = mysqli_fetch_assoc($result)) {//while loop open
  ?>
<option value="<?php echo $rows['full_name'];?>"><?php echo $rows['full_name']."  --  ".$rows['role'];?></option>
<?php 
}//while loop close 

}//if close 
elseif ($auth['role'] == 'Employee') {
$query =  "SELECT * FROM employees WHERE department_id = '$var' AND role = 'Team-Manager' ";
$result = mysqli_query($conn,$query);
echo "<option value='' >Sent to</option>";

while ($rows = mysqli_fetch_assoc($result)) {//while loop open
  ?>
<option value="<?php echo $rows['full_name'];?>"><?php echo $rows['full_name']."  --  ".$rows['role'];?></option>
<?php 
}//while loop close 
}
else
{
?>
<option>Sent to</option>
<option style="color: red">Please Email to CEO for Resignation</option>
<?php
}
?>












</select>
</td><br>
 <td><label class="control-label"><b>Letter*</b></label></td>
<td><textarea class="form-control" rows="12" name="letter"  style="background-color: #fff;">
<?php if(isset($_POST['letter'])){ echo $_POST['letter']; } ?>
</textarea></td> 
<br>
<div class="row">
<a href="javascript:;" onclick="window.history.back(-1);" class="btn btn-danger">Cancel</a>
<?php 
if ($auth['role'] == 'HR-Manager') {
  ?>
<a class="btn btn-success md-close" style="cursor: not-allowed;">Send</a>

<?php
}
else
{
?>
<button class="btn btn-success md-close" name="send">Send</button>

<?php
}

 ?>

</div>
</form>

</div>
<!--  -->
<!-- </div>
</div> -->
</div>



<?php 
}
 ?>

<!-- ====================================================================================================== -->
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include_once('footer.php'); ?>

