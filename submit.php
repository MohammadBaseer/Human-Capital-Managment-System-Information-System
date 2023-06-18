<?php 
include_once('header.php');
?>
<div class="pcoded-main-container">

<?php
$error = "";
$b = "";
$a = "";
$c = "";
$d = "";
$e = "";
$f = "";
if (isset($_POST['submit'])) {
  
$data = $_POST;

$empcid   = $data ['empcid'];
$pfimg = $_FILES ['pfimg']['name'];
$fname = $data ['fname'];
$ftname = $data ['ftname'];
$bdate = $data ['bdate'];
$study = $data ['study'];
$mnumber = $data ['mnumber'];
$email = $data ['email'];
$pertaddress = $data ['pertaddress'];
$preaddress = $data ['preaddress'];
$nic = $data ['nic'];
$exp = $data ['exp'];
$idcard = $data ['idcard'];
$joindate = $data ['joindate'];
$expire = $data ['expire'];
$off_email = $data ['off_email'];
$gender = $data ['gender'];
$marital = $data ['marital'];
$country = $data ['country'];
$province = $data ['province'];
$degree = $data ['degree'];
$position = $data ['position'];
$department = $data ['department'];
$salary = $data ['salary'];
$rname = $data ['rname'];
$relationship = $data ['relationship'];
$raddress = $data ['address'];
$rnumber = $data ['number'];
$remail = $data ['remail'];
$rwork = $data ['work'];

$trn_date = date("Y-m-d H:i:s");




// Mersenne Twister algorithm 
//$pfimg = time().'_'.mt_rand().'.jpg';

// basename- time+randon include before file name used for images
// $pfimg = time().'_'.mt_rand().basename($_FILES["pfimg"]["name"]);
// $pfim = $pfimg;
// $image_url="profile_img/".$pfimg ;
// move_uploaded_file($_FILES['pfimg']['tmp_name'],$image_url);
// basename- time+randon include before file name used for scanned files
$pfimg = time().'_'.mt_rand().basename($_FILES["pfimg"]["name"]);
$pfim = $pfimg;
$image_url="profile_img/".$pfimg ;
move_uploaded_file($_FILES['pfimg']['tmp_name'],$image_url);
// codes ----------------------------------------------------------------------
 


if (empty($fname) || empty($ftname)) {
	$error = '<div class="alert alert-danger" style="padding-left: 4%;"><p>Personal data empty*</p></div>';
}
elseif (!preg_match("/^[a-zA-Z ]*$/",$fname) || 
		    !preg_match("/^[a-zA-Z ]*$/",$ftname) || 
		    	!preg_match("/^[a-zA-Z ]*$/",$study) || 
		    		!preg_match("/^[a-zA-Z ]*$/",$rname) || 
		    			!preg_match("/^[a-zA-Z ]*$/",$relationship) 
		    				) {
$error = '<div class="alert alert-danger" style="padding-left: 4%;"><p>Personal data only letters and white space allowed*</p></div>';
}

elseif (!is_numeric($mnumber)) {

	$error = '<div class="alert alert-danger" style="padding-left: 4%;"><p>Enter Phone Number*</p></div>'; 
	$a = '<b style="color: red;">';
	$b = '</b>';

}
elseif (!is_numeric($salary)) {
	$error = '<div class="alert alert-danger" style="padding-left: 4%;"><p>Invalid salary feild*</p></div>'; 
}
elseif (empty($bdate) || empty($joindate) || empty($expire)) {
$error = '<div class="alert alert-danger" style="padding-left: 4%;"><p>empty input*</p></div>'; 
}

elseif (!filter_var($email, FILTER_VALIDATE_EMAIL ) || !filter_var($remail, FILTER_VALIDATE_EMAIL ) || !filter_var($off_email, FILTER_VALIDATE_EMAIL )) {
  $error = '<div class="alert alert-danger" style="padding-left: 4%;"><p>Enter Email*</p></div>'; 
}

elseif (!is_numeric($rnumber)) {
	$error = '<div class="alert alert-danger" style="padding-left: 4%;"><p>Enter Phone Number*</p></div>'; 
	$c = '<b style="color: red;">';
	$d = '</b>';

}
elseif (strlen($mnumber) !== 10) {

	$error = '<div class="alert alert-danger" style="padding-left: 4%;"><p>Phone Number should be 10 digets*</p></div>';
	$a = '<b style="color: red;">';
	$b = '</b>';
}
elseif ($department === "") {
	$error = '<div class="alert alert-danger" style="padding-left: 4%;"><p>Please Select the Department*</p></div>';
	$e = '<b style="color: red;">';
	$f = '</b>';
}
elseif (strlen($rnumber) !== 10) {

	$error = '<div class="alert alert-danger" style="padding-left: 4%;"><p>Phone Number should be 10 digets*</p></div>';
	$c = '<b style="color: red;">';
	$d = '</b>';
}
else
{

$sql = "INSERT INTO `employees` (`emp_contract_id`, `profile_img`, `full_name`, `father_name`, `birthday`, `feild_of_study`, `mobile_number`, `personal_email`, `permanent_address`, `present_address`, `nic`, `experience`, `id_card_number`, `join_date`, `expire_date`,  `gender`, `marital`, `country`, `province`, `degree`, `position`, `department_id`, `salary`, `contact_person_name`, `contact_person_relationship`, `contact_person_address`, `contact_person_number`, `contact_person_email`, `contact_person_work`, `date`, `official_email`, `status` ) VALUES ('$empcid ', '$pfimg', '$fname', '$ftname', '$bdate', '$study', '$mnumber', '$email', '$pertaddress', '$preaddress', '$nic', '$exp', '$idcard', '$joindate', '$expire',  '$gender', '$marital', '$country',
'$province', '$degree', '$position', '$department', '$salary', '$rname', '$relationship', '$raddress', '$rnumber', '$remail', '$rwork', '$trn_date', '$off_email', 'enable');";
if($result = mysqli_query($conn,$sql))

{

$error = '<div class="alert alert-success" style="padding-left: 4%;"><p>New record added successfuly*</p></div>';  
echo "<script>window.location='emp_table_view.php';</script>";
 
}
else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



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
<h5 class="m-b-10">Employees Section</h5>
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="home.php"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item"><a href="javascript:">Manage Employee</a></li>
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
<h5>Add New Employee</h5>
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
<!-- ======================================================================================================= -->
 <?php echo $error; ?>
<form method="POST" enctype="multipart/form-data">
<div class="row">
<div class="col-xl-5" style="padding: 0px;margin: 5px 30px; outline: solid 0.5px #f4f7fa;">
<div style="height: 35px; background: #f4f7fa; padding: 6px;"><h5>Personal Information</h5></div>
<div style="padding: 0px">
<br>
<!--  -->
<!-- ============= -->
<div class="form-group row" style="margin: -10px;">
<label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Full Name*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="text" name="fname" title="Full Name" value="<?php if(isset($_POST['fname'])){ echo $_POST['fname']; } ?>" class="form-control" placeholder="Full Name">
</div>
</div>
<!-- =============-->
<div class="form-group row" style="margin: -10px;">
<label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Profile Image*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="file" name="pfimg" title="Profile Image" class="form-control">
</div>
</div>
<!-- =========== -->
<div class="form-group row" style="margin: -10px;">
<label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Father Name*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="text" name="ftname" title="Father Name" value="<?php if(isset($_POST['ftname'])){ echo $_POST['ftname']; } ?>" class="form-control" placeholder="Father Name">
</div>
</div>
<!-- ========== -->
<div class="form-group row" style="margin: -10px;">
<label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Birth Date*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="date" id="Birthdate" title="Birth Date" name="bdate" value="<?php if(isset($_POST['bdate'])){ echo $_POST['bdate']; } ?>"  class="form-control">
</div>
</div>
<!-- ========== -->
<div class="form-group row" style="margin: -10px;">
<label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Gender*</label>
<div class="col-sm-12 input-group-sm mb-3">
<select name="gender" class="form-control">
<option>-- Select Gender --</option> 
<option value="Male" <?php if(@$_POST['gender'] == 'Male') {echo 'selected';} ?> >Male</option>
<option value="Female" <?php if(@$_POST['gender'] == 'Female') {echo 'selected';} ?>>Female</option>
</select>
</div>
</div>
<!-- ============ -->
<div class="form-group row" style="margin: -10px;">
<label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Marital*</label>
<div class="col-sm-12 input-group-sm mb-3">
<select name="marital" class="form-control">
<option value="">-- Select Marital --</option> 
<option value="Married" <?php if(@$_POST['marital'] == 'Married') {echo 'selected';} ?>>Married</option>
<option value="Unmarried" <?php if(@$_POST['marital'] == 'Unmarried') {echo 'selected';} ?>>Unmarried</option>  
</select>
</div>
</div>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm"><?php echo $a; ?>Mobile Number*<?php echo $b; ?></label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="text" name="mnumber" title="Mobile Number" value="<?php if(isset($_POST['mnumber'])){ echo $_POST['mnumber']; } ?>" class="form-control" placeholder="Mobile Number" min="10" maxlength="10" >
</div>
</div>
<!-- ================ -->
<div class="form-group row" style="margin: -10px;">
<label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Personal Email*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="email" name="email" title="Personal Email" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>" class="form-control" placeholder="Personal Email" >
</div>
</div>
<!-- =================-->
<div class="form-group row" style="margin: -10px;">
<label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Permanent Address*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="text" name="pertaddress" title="Permanent Address" value="<?php if(isset($_POST['pertaddress'])){ echo $_POST['pertaddress']; } ?>" class="form-control" placeholder="Permanent Address">
</div>
</div>
<!-- ================-->
<div class="form-group row" style="margin: -10px;">
<label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Present Address*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="text" name="preaddress" title="Present" value="<?php if(isset($_POST['preaddress'])){ echo $_POST['preaddress']; } ?>" class="form-control" placeholder="Present Address">
</div>
</div>
<!-- =============== -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">NIC Number*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="number" name="nic" title="NIC Number" value="<?php if(isset($_POST['nic'])){ echo $_POST['nic']; } ?>" placeholder="NIC Number" class="form-control">
</div>
</div>
<!-- =============== -->
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Country*</label>
<div class="col-sm-12 input-group-sm mb-3">
<select name="country" id="contryid" class="form-control">
        <option value="">-- Select Country --</option>
<option value="Afghanistan" <?php if(@$_POST['country'] == 'Afghanistan') {echo 'selected';} ?>>Afghanistan</option>
</select>
</div>
</div>
<!-- ============== -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Provance*</label>
<div class="col-sm-12 input-group-sm mb-3">
<select name="province" title="province" class="form-control">
<option value="">-- Select province --</option>
<option value="Kabul" <?php if(@$_POST['province'] == 'Kabul') {echo 'selected';} ?> >Kabul</option> 
<option value="Mazar-e-Sharif" <?php if(@$_POST['province'] == 'Mazar-e-Sharif') {echo 'selected';} ?> >Mazar-e-Sharif</option>
<option value="Herat" <?php if(@$_POST['province'] == 'Herat') {echo 'selected';} ?> >Herat</option>        
</select>
</div>
</div>
<!-- ============= -->
<!--  -->
</div>
</div>


<!-- Qulification -->
<div class="col-xl-5" style="padding: 0px;margin: 5px 30px; outline: solid 0.5px #f4f7fa;">
<div style="height: 35px; background: #f4f7fa; padding: 6px;"><h5>Qulification</h5></div>
<div style="padding: 0px">
<br>
<!--  -->
<!-- =========== -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Degree*</label>
<div class="col-sm-12 input-group-sm mb-3">
<select name="degree" title="Degree" class="form-control">
<option value="">-- Select Degree --</option> 
<?php $result = mysqli_prepare($conn, "SELECT degree FROM degree");
mysqli_stmt_bind_result($result, $degree);
mysqli_stmt_execute($result);
while(mysqli_stmt_fetch($result)){ ?>
<option value="<?php echo $degree; ?>" <?php if(@$_POST['degree'] == $degree) {echo 'selected';} ?>><?php echo $degree; ?></option>
<?php }; mysqli_stmt_close($result); ?> 
</select>
</div>
</div>
<!-- ============ -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Field of Study*</label>
<div class="col-sm-12 input-group-sm mb-3">
<select name="study" title="Study" class="form-control">
<option value="">-- Select Field of Study --</option>
<?php $result = mysqli_prepare($conn, "SELECT study FROM study");
mysqli_stmt_bind_result($result, $study);
mysqli_stmt_execute($result);
while(mysqli_stmt_fetch($result)){ ?>
<option value="<?php echo $study; ?>" <?php if(@$_POST['study'] == $study) {echo 'selected';} ?>><?php echo $study; ?></option>
<?php }; mysqli_stmt_close($result); ?>   
</select>
</div>
</div>
<!-- ============ -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Experience*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="number" name="exp" title="Experience" value="<?php if(isset($_POST['exp'])){ echo $_POST['exp']; } ?>" placeholder="Years of Experience" class="form-control">
</div>
</div>
<!-- ================== -->
<br>
<div style="height: 35px; background: #f4f7fa; padding: 6px; margin-top: 7px;"><h5>Contract Information</h5></div>
<br>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Employee Contract ID*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="text" name="empcid" title="Employee Contract ID" value="<?php if(isset($_POST['empcid'])){ echo $_POST['empcid']; } ?>" class="form-control" placeholder="Employee Contract ID">
</div>
</div>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">ID Card Number*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="text" name="idcard" class="form-control" value="<?php if(isset($_POST['idcard'])){ echo $_POST['idcard']; } ?>" placeholder="ID Card Number">
</div>
</div>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Official Email*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="text" name="off_email" class="form-control" value="<?php if(isset($_POST['off_email'])){ echo $_POST['off_email']; } ?>" placeholder="Official Email">
</div>
</div>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Department*</label>
<div class="col-sm-12 input-group-sm mb-3">
<select name="department" class="form-control">
<option value="">-- Select Department --</option>
<?php 
$sql = "SELECT * FROM department";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){ 

?>
<option value="<?php echo $row['departmentid']; ?>"><?php echo $row['department']; ?></option>
<?php }; ?>
</select>
</div>
</div> 
<!-- ================== -->
<!-- <div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Department*</label>
<div class="col-sm-12 input-group-sm mb-3">
<select name="department" title="department" class="form-control">
<option value="">-- Select Department --</option>
<?php //$result = mysqli_prepare($conn, "SELECT department FROM department");
// mysqli_stmt_bind_result($result, $department);
// mysqli_stmt_execute($result);
//while(mysqli_stmt_fetch($result)){ ?>
<option value="<?php //echo $department; ?>" <?php //if(@$_POST['department'] == $department) {echo 'selected';} ?>><?php //echo $department; ?></option>
<?php //}; mysqli_stmt_close($result); ?>
</select>
</div>
</div> --> 
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Position*</label>
<div class="col-sm-12 input-group-sm mb-3">
<select name="position" title="Position" class="form-control">
<option value="">-- Select Position --</option>
<?php $result = mysqli_prepare($conn, "SELECT position FROM position");
mysqli_stmt_bind_result($result, $position);
mysqli_stmt_execute($result);
while(mysqli_stmt_fetch($result)){ ?>
<option value="<?php echo $position; ?>" <?php if(@$_POST['position'] == $position) {echo 'selected';} ?>><?php echo $position; ?></option>
<?php }; mysqli_stmt_close($result); ?>
</select>
</div>
</div>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Salary*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="text" name="salary" title="Salary" value="<?php if(isset($_POST['salary'])){ echo $_POST['salary']; } ?>" class="form-control">
</div>
</div>
<!-- ================== -->
<!-- <div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">NTA*</label>
<div class="col-sm-12 input-group-sm mb-3">
<select name="nta" title="NTA" class="form-control">
<option value="">-- Select NTA --</option>
</select>
</div>
</div> -->
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Join Date*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="date" id="Joind" title="Join Date" name="joindate" placeholder="Join Date" value="<?php if(isset($_POST['joindate'])){ echo $_POST['joindate']; } ?>" class="form-control">
</div>
</div>

<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Expire Date*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="date" id="LeaveDate" title="Expire Date" name="expire" placeholder="Expire Date" value="<?php if(isset($_POST['expire'])){ echo $_POST['expire']; } ?>" class="form-control">
</div>
</div>

<!--  -->
</div>
</div>
<!-- next -->
<div class="col-xl-11" style="padding: 0px;margin: 5px 30px; outline: solid 0.5px #f4f7fa;">
<div style="height: 35px; background: #f4f7fa; padding: 6px;"><h5>Contact Persont</h5></div>
<div style="padding: 0px">
<br>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Name*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="text" name="rname" title="Relationship" value="<?php if(isset($_POST['rname'])){ echo $_POST['rname']; } ?>" class="form-control" placeholder="Name">
</div>
</div>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Relationship*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="text" name="relationship" title="Relationship" value="<?php if(isset($_POST['relationship'])){ echo $_POST['relationship']; } ?>" class="form-control" placeholder="Relationship">
</div>
</div>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Address*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="text" name="address" title="Address" value="<?php if(isset($_POST['address'])){ echo $_POST['address']; } ?>" class="form-control" placeholder="Address">
</div>
</div>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm"><?php echo $c; ?>Mobile Number*<?php echo $d; ?></label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="text" name="number" class="form-control" placeholder="Mobile Number" value="<?php if(isset($_POST['number'])){ echo $_POST['number']; } ?>" min="10" maxlength="10" >
</div>
</div>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Email*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="email" name="remail" title="Email" class="form-control" value="<?php if(isset($_POST['remail'])){ echo $_POST['remail']; } ?>" placeholder="Email">
</div>
</div>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Work*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="text" name="work" title="Work" class="form-control" value="<?php if(isset($_POST['work'])){ echo $_POST['work']; } ?>" placeholder="Work">
</div>
</div>
<!-- ============= -->

</div>
</div>
</div>
</div>
<br>
<button type="submit" name="submit" class="btn btn-primary" style="margin-left: 18px;">Submit</button>
<br>
</form>
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
</div>


<?php include_once('footer.php'); ?>

<!-- 
<script type="text/javascript">
  swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Your record has been deleted!", {
      icon: "success",
    });
  } else {
    swal("Your record is safe!");
  }
});
</script> -->