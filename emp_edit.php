<?php 
include_once('header.php');
$error ="";
$b = "";
$a = "";
$c = "";
$d = "";
?>
<div class="pcoded-main-container">
<?php
if (isset($_GET['empedit']))
{
  $id = $_GET['empedit']; 
$sql = "SELECT *, b.department FROM employees a,department b WHERE a.department_id = b.departmentid AND id='$id'";
   $result = mysqli_query($conn, $sql);
   $row =  mysqli_fetch_assoc($result);
//}
 if (isset($_POST['update']))
 {
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
@$status = $data ['resigned'];
$trn_date = date("Y-m-d H:i:s");
// --------------

if (!empty($_FILES["pfimg"]['name'])) {
	if (file_exists("profile_img/".$row['profile_img'])) {
		unlink("profile_img/".$row['profile_img']);
	}
	$pfimg = time().'_'.mt_rand().basename($_FILES["pfimg"]["name"]);
	$pfim = $pfimg;
	$image_url="profile_img/".$pfimg ;
	move_uploaded_file($_FILES['pfimg']['tmp_name'],$image_url);
}else{
	$pfimg = $row['profile_img'];
}
if (!is_numeric($mnumber)) {

	$error = '<div class="alert alert-danger" style="padding-left: 4%;"><p>Enter Phone Number*</p></div>'; 
	$a = '<b style="color: red;">';
	$b = '</b>';

}
elseif (empty($bdate) || empty($joindate) || empty($expire)) {
$error = '<div class="alert alert-danger" style="padding-left: 4%;"><p>Date empty*</p></div>'; 
}
elseif (!is_numeric($salary)) {
	$error = '<div class="alert alert-danger" style="padding-left: 4%;"><p>Invalid salary feild*</p></div>'; 
}
elseif (!preg_match("/^[a-zA-Z ]*$/",$fname) || 
		    !preg_match("/^[a-zA-Z ]*$/",$ftname) || 
		    	!preg_match("/^[a-zA-Z ]*$/",$study) || 
		    		!preg_match("/^[a-zA-Z ]*$/",$rname) || 
		    			!preg_match("/^[a-zA-Z ]*$/",$relationship) 
		    				) {
$error = '<div class="alert alert-danger" style="padding-left: 4%;"><p>Only letters and white space allowed*</p></div>';
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL ) || !filter_var($remail, FILTER_VALIDATE_EMAIL ) || !filter_var($off_email, FILTER_VALIDATE_EMAIL )) {
$error = '<div class="alert alert-danger" style="padding-left: 4%;"><p>Invalid Email*</p></div>';
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
elseif (strlen($rnumber) !== 10) {

	$error = '<div class="alert alert-danger" style="padding-left: 4%;"><p>Phone Number should be 10 digets*</p></div>';
	$c = '<b style="color: red;">';
	$d = '</b>';
}
else
{


if (mysqli_query($conn, "UPDATE employees SET 
	emp_contract_id = '$empcid',
	profile_img = '$pfimg',
	full_name = '$fname',
	father_name = '$ftname',
	birthday = '$bdate',
	feild_of_study = '$study',
	mobile_number = '$mnumber',
	personal_email = '$email',
	permanent_address = '$pertaddress',
	present_address = '$preaddress',
	nic = '$nic',
	experience = '$exp',
	id_card_number = '$idcard',
	join_date = '$joindate',
	expire_date = '$expire',
	gender = '$gender',
	marital = '$marital',
	country = '$country',
	province = '$province',
	degree = '$degree',
	position = '$position',
	department_id = '$department',
	salary = '$salary',
	contact_person_name = '$rname',
	contact_person_relationship = '$relationship',
	contact_person_address = '$raddress',
	contact_person_number = '$rnumber',
	contact_person_email = '$remail',
	contact_person_work = '$rwork',
	date_modify = '$trn_date',
	official_email = '$off_email',
	status ='$status' 
	 WHERE id=$id")){   
     echo "<script>window.location='veiw_employees.php';</script>";
}else 
	{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
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
<h5>Edit Recorde</h5>
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
 <?php echo @$error; ?>
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
<input type="text" name="fname" title="Full Name" value="<?php echo $row['full_name'];?>" class="form-control">
</div>
</div>
<!-- =============-->
<div class="row" style="margin: -10px;">
	<div class="col-sm-3"><img id="img_thumb" src="<?php echo "profile_img/".$row['profile_img']; ?>" class="img img-fluid"></div>
	<div class="form-group col-sm-8">
		<label for="colFormLabelSm" class="col-form-label col-form-label-sm">Change Profile Image*</label>
	<div class="input-group-sm mb-3">
	<input type="file" name="pfimg" id="img_upload" value="" class="form-control" >
		</div>

</div>
</div>
<!-- </div> -->
<!-- =========== -->
<div class="form-group row" style="margin: -10px;">
<label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Father Name*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="text" name="ftname" title="Father Name" value="<?php echo $row['father_name'];?>" class="form-control">
</div>
</div>
<!-- ========== -->
<div class="form-group row" style="margin: -10px;">
<label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Birth Date*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="date" id="Birthdate" title="Birth Date" name="bdate" value="<?php echo $row['birthday'];?>"  class="form-control">
</div>
</div>
<!-- ========== -->
<div class="form-group row" style="margin: -10px;">
<label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Gender*</label>
<div class="col-sm-12 input-group-sm mb-3">
<select name="gender" class="form-control">
<option value="">-- Select Gender --</option>
<option value="Male" <?php if($row['gender'] == 'Male'){echo "selected";} ?> >Male</option>
<option value="Female" <?php if($row['gender'] == 'Female'){echo "selected";} ?> >Female</option>
</select>
</div>
</div>

<!-- ============ -->
<div class="form-group row" style="margin: -10px;">
<label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Marital*</label>
<div class="col-sm-12 input-group-sm mb-3">
<select name="marital" class="form-control">
<option value="">-- Select Marital --</option> 
<option value="Married" <?php if($row['marital'] == 'Married') {echo "selected";} ?>>Married</option>
<option value="Unmarried" <?php if($row['marital'] == 'Unmarried') {echo "selected";} ?>>Unmarried</option>  
</select>
</div>
</div>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm"><?php echo $a; ?>Mobile Number*<?php echo $b; ?></label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="text" name="mnumber" title="Mobile Number" value="<?php echo $row['mobile_number'];?>" class="form-control" min="10" maxlength="10" >

</div>
</div>
<!-- ================ -->
<div class="form-group row" style="margin: -10px;">
<label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Personal Email*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="text" name="email" title="Personal Email" value="<?php echo $row['personal_email'];?>" class="form-control" >
</div>
</div>
<!-- =================-->
<div class="form-group row" style="margin: -10px;">
<label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Permanent Address*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="text" name="pertaddress" title="Permanent Address" value="<?php echo $row['permanent_address'];?>" class="form-control">
</div>
</div>
<!-- ================-->
<div class="form-group row" style="margin: -10px;">
<label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Present Address*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="text" name="preaddress" title="Present" value="<?php echo $row['present_address'];?>" class="form-control" >
</div>
</div>
<!-- =============== -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">NIC Number*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="number" name="nic" title="NIC Number" value="<?php echo $row['nic'];?>" class="form-control">
</div>
</div>
<!-- =============== -->
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Country*</label>
<div class="col-sm-12 input-group-sm mb-3">
<select name="country" id="contryid" class="form-control">
        <option value="">-- Select Country --</option>
<option value="Afghanistan" <?php if($row['country'] == 'Afghanistan') {echo "selected";} ?>>Afghanistan</option>

</select>
</div>
</div>
<!-- ============== -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Provance*</label>
<div class="col-sm-12 input-group-sm mb-3">
<select name="province" title="province" class="form-control">
<option value="">-- Select province --</option>
<option value="Kabul" <?php if($row['province'] == 'Kabul') {echo "selected";} ?>>Kabul</option> 
<option value="Mazar-e-Sharif" <?php if($row['province'] == 'Mazar-e-Sharif') {echo "selected";} ?>>Mazar-e-Sharif</option>
<option value="Herat" <?php if($row['province'] == 'Herat') {echo "selected";} ?>>Herat</option>     
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
<!-- <div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Degree*</label>
<div class="col-sm-12 input-group-sm mb-3">
<select name="degree" title="Degree" class="form-control">
<option value="">-- Select Degree --</option> 
<?php// $result = mysqli_prepare($conn, "SELECT degree FROM degree");
// mysqli_stmt_bind_result($result, $degree);
//mysqli_stmt_execute($result);
//while(mysqli_stmt_fetch($result)){ ?>
<option value="<?php //echo $degree; ?>"><?php //echo $degree; ?></option>
<?php //}; //mysqli_stmt_close($result); ?> 
</select>
</div>
</div> -->
<!-- =========== -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Degree*</label>
<div class="col-sm-12 input-group-sm mb-3">
	<?php 
$sql2 = "SELECT * FROM degree";
$degree = mysqli_query($conn, $sql2);
	 ?>
<select name="degree" title="Degree" class="form-control">
<option value="">-- Select Degree --</option> 
<?php 
while ($key = mysqli_fetch_assoc($degree)) {
 ?>
<option <?php if($key['degree'] == $row['degree']){echo "selected";} ?> value="<?php echo $key['degree']; ?>">
	<?php echo $key['degree']; ?>
</option>
 <?php } ?>
</select>
</div>
</div>
<!-- ============ -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Field of Study*</label>
<div class="col-sm-12 input-group-sm mb-3">
	<?php 
$sql3 = "SELECT * FROM study";
$study = mysqli_query($conn, $sql3);
	 ?>
<select name="study" title="study" class="form-control">
<option value="">-- Select Field of Study --</option> 
<?php 
while ($key = mysqli_fetch_assoc($study)) {
 ?>
<option <?php if($key['study'] == $row['feild_of_study']){echo "selected";} ?> value="<?php echo $key['study']; ?>">
	<?php echo $key['study']; ?>
</option>
 <?php } ?>
</select>
</div>
</div>

<!-- ============ -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Experience*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="number" name="exp" title="Experience" value="<?php echo $row['experience'];?>" class="form-control">
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
<input type="text" name="empcid" title="Employee Contract ID" value="<?php echo $row['emp_contract_id'];?>" class="form-control">
</div>
</div>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">ID Card Number*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="text" name="idcard" class="form-control" value="<?php echo $row['id_card_number'];?>">
</div>
</div>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Official Email*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="text" name="off_email" class="form-control" value="<?php echo $row['official_email'];?>">
</div>
</div>
<!-- ================== -->

 <div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Department*</label>
<div class="col-sm-12 input-group-sm mb-3">
	<?php 
$sql3 = "SELECT * FROM department";
$department = mysqli_query($conn, $sql3);
	 ?>
<select name="department" title="department" class="form-control">
<option value="">-- Select Field of department --</option> 
<?php 
while ($key = mysqli_fetch_assoc($department)) {
 ?>
<option <?php if($key['departmentid'] == $row['departmentid']){echo "selected";} ?> value="<?php echo $key['departmentid']; ?>">
	<?php echo $key['department']; ?>
</option>
 <?php } ?>
</select>
<?php //echo $row['feild_of_study']; ?>
</div>
</div>
<!-- ================== -->
 <div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Position*</label>
<div class="col-sm-12 input-group-sm mb-3">
	<?php 
$sql3 = "SELECT * FROM position";
$position = mysqli_query($conn, $sql3);
	 ?>
<select name="position" title="position" class="form-control">
<option value="">-- Select Field of position --</option> 
<?php 
while ($key = mysqli_fetch_assoc($position)) {
 ?>
<option <?php if($key['position'] == $row['position']){echo "selected";} ?> value="<?php echo $key['position']; ?>">
	<?php echo $key['position']; ?>
</option>
 <?php } ?>
</select>
<?php //echo $row['feild_of_study']; ?>
</div>
</div>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Salary*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="text" name="salary" title="Salary" value="<?php echo $row['salary'];?>" class="form-control">
</div>
</div>

<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Join Date*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="date" title="Join Date" name="joindate" value="<?php echo $row['join_date'];?>" class="form-control"">
</div>
</div>

<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Expire Date*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="date" title="Expire Date" name="expire" value="<?php echo $row['expire_date'];?>" class="form-control">
</div>
</div>

<!--  -->
</div>
</div>
<!-- next -->
<div class="col-xl-5" style="padding: 0px;margin: 5px 30px; outline: solid 0.5px #f4f7fa;">
<div style="height: 35px; background: #f4f7fa; padding: 6px;"><h5>Contact Persont</h5></div>
<div style="padding: 0px">
<br>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Name*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="text" name="rname" title="Relationship" value="<?php echo $row['contact_person_name'];?>" class="form-control">
</div>
</div>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Relationship*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="text" name="relationship" title="Relationship" value="<?php echo $row['contact_person_relationship'];?>" class="form-control">
</div>
</div>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Address*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="text" name="address" title="Address" value="<?php echo $row['contact_person_address'];?>" class="form-control">
</div>
</div>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm"><?php echo $c; ?>R-Mobile Number*<?php echo $d; ?></label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="text" name="number" class="form-control" value="<?php echo $row['contact_person_number'];?>" min="10" maxlength="10" >
</div>
</div>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Email*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="email" name="remail" title="Email" value="<?php echo $row['contact_person_email'];?>" class="form-control">
</div>
</div>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<label class="col-sm-5 col-form-label col-form-label-sm">Work*</label>
<div class="col-sm-12 input-group-sm mb-3">
<input type="text" name="work" title="Work" value="<?php echo $row['contact_person_work'];?>" class="form-control">
</div>
</div>
<!-- ============= -->
<div class="form-group row" style="margin: -10px;">
<div class="col-sm-12 input-group-sm mb-3">
<!-- <label class="col-sm-5 col-form-label col-form-label-sm" style="color: red; font-weight: bold;">Resigned* &nbsp &nbsp<input type="checkbox" name="resigned" value="Resigned" <?php //if($row['status'] == 'Resigned'){echo "checked";} ?> ></label> -->

</div>
</div>
<!-- ===================== -->
</div>
</div>

</div>
<br>
<button type="submit" name="update" class="btn btn-primary" style="margin-left: 18px;">Update</button>

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
<!-- <script type="text/javascript">
	$(document).ready(function () {
		$("#img_upload").on('change',function(e){
			$("#img_thumb").attr('src',$(this).files[0].mozFullPath);
		});
	});
</script> -->