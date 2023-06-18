<?php 
include_once('header.php');
?>
<div class="pcoded-main-container">
<?php
$post_edit = $_REQUEST['post_edit'];

  if ($post_edit = $_REQUEST['post_edit'])
  {
  $sql = "SELECT * FROM job_t WHERE job_id='$post_edit'" ;
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);

                  if (isset($_POST['update'])) {
// 
$job_title   = mysqli_real_escape_string($conn, $_POST['job_title']);
$job_location   = mysqli_real_escape_string($conn, $_POST['location']);
$nationality   = mysqli_real_escape_string($conn, $_POST['nationality']);
$category   = mysqli_real_escape_string($conn, $_POST['category']);
$employment_type   = mysqli_real_escape_string($conn, $_POST['employment_type']);
$salary   = mysqli_real_escape_string($conn, $_POST['salary']);
$vacancy   = mysqli_real_escape_string($conn, $_POST['vacancy']);
$no_jobs   = mysqli_real_escape_string($conn, $_POST['no_of_jobs']);
$experience   = mysqli_real_escape_string($conn, $_POST['experience']);
$gender   = mysqli_real_escape_string($conn, $_POST['gender']);
$education   = mysqli_real_escape_string($conn, $_POST['education']);
$open_date   = mysqli_real_escape_string($conn, $_POST['open_date']);
$close_date   = mysqli_real_escape_string($conn, $_POST['close_date']);
$about_org   = mysqli_real_escape_string($conn, $_POST['about_org']);
$job_description   = mysqli_real_escape_string($conn, $_POST['job_description']);
$job_requirement   = mysqli_real_escape_string($conn, $_POST['job_requirement']);
$education_details   = mysqli_real_escape_string($conn, $_POST['education_details']);
$skill   = mysqli_real_escape_string($conn, $_POST['skill']);
$language   = mysqli_real_escape_string($conn, $_POST['language']);
$sub_guideline   = mysqli_real_escape_string($conn, $_POST['sub_guideline']);
$sub_email   = mysqli_real_escape_string($conn, $_POST['sub_email']);

// 


                    $sql = "UPDATE job_t SET job_title = '$job_title', location = '$job_location', nationality = '$nationality', category = '$category', employment_type = '$employment_type',salary = '$salary', vacancy = '$vacancy', no_of_jobs ='$no_jobs', experience = '$experience', gender = '$gender', education = '$education', open_date='$open_date', close_date = '$close_date', about_org = '$about_org', job_description = '$job_description', job_requirement = '$job_requirement', education_details = '$education_details', skill = '$skill', languages = '$language', submission_guideline = '$sub_guideline', submission_email = '$sub_email'  WHERE job_id ='$post_edit';" ;
             if(mysqli_query($conn, $sql))
             {
                   echo "<script>window.location='announce_new_job.php';</script>";
              // echo $education_details;
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
<h5 class="m-b-10">E-Recuritment</h5>
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="home.php"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item"><a href="javascript:">Recuritment Managment</a></li>
<li class="breadcrumb-item"><a href="javascript:">Job Announcement</a></li>
<li class="breadcrumb-item"><a href="javascript:">View</a></li>
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
<h5>Edit</h5>
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
<div class="card-block pb-0">
<!-- ============ -->
<form method="POST">

<div class="form-group row" style="margin: -10px; ">
<div class="col-xl-5" style="padding: 0px;margin: 5px 30px; outline: solid 0.5px #f4f7fa;">
<br>
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Job Title*</b></label></td> 
<td><input type="text" class="form-control" name="job_title"  value="<?php echo $row['job_title']; ?>"></td>
</div>

<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Job Location*</b></label></td>
<td><input type="text" class="form-control" name="location"  value="<?php echo $row['location']; ?>" ></td>
</div>

<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Nationality*</b></label></td>
<td><input type="text" class="form-control" name="nationality"  value="<?php echo $row['nationality']; ?>"></td>
</div>
<!-- 
 -->


<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Category*</b></label></td> 
<td><input type="text" class="form-control"  name="category" value="<?php  echo $row['category']; ?>"</td>
</div>

<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Employment Type*</b></label></td> 
<td><input type="text" class="form-control" name="employment_type" value="<?php echo $row['employment_type']; ?>"></td>
</div>

<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Salary*</b></label></td> 
<td><input type="text" class="form-control" name="salary" value="<?php echo $row['salary']; ?>"></td>
</div>

<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Vacancy Number*</b></label></td>
<td><input type="text" class="form-control" name="vacancy" value="<?php echo $row['vacancy']; ?>"></td>
</div>

</div>
<div class="col-xl-5" style="padding: 0px;margin: 5px 30px; outline: solid 0.5px #f4f7fa;">
<br>
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>No. of Jobs*</b></label></td>
<td><input type="text" class="form-control" name="no_of_jobs" value="<?php echo $row['no_of_jobs']; ?>"></td>
</div>

<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Years of Experience*</b></label></td>
<td><input type="text" class="form-control" name="experience" value="<?php echo $row['experience']; ?>"></td>
</div>

<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Gender*</b></label></td> 
<td><select type="text" name="gender" class="form-control">
<option value="Both">Both</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select></td>
<!-- <input type="text" name="gender" class="form-control" placeholder="Gender"> -->
</div>


<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Education*</b></label></td> 
<td><input type="text" class="form-control" name="education" value="<?php echo $row['education']; ?>"></td>
</div>

<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Open Date*</b></label></td>
<td><input type="text" class="form-control" name="open_date"  value="<?php echo $row['open_date']; ?>"></td>
</div>

<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Cloes Date*</b></label></td> 
<td><input type="text" class="form-control" name="close_date"  value="<?php echo $row['close_date']; ?>"></td>
</div>

</div>




 <!-- 
  -->
  <br><br>
 <div style="padding: 0px;margin: 5px 30px; outline: solid 0.5px #f4f7fa; width: 89.5%;">

<div class="col-sm-12 input-group-sm mb-3"><br>
<td><label class="control-label"><b>About Oganization*</b></label></td>
<td>
	<textarea class="form-control" rows="8" name="about_org">
    <?php echo $row['about_org']; ?>
  </textarea>
</td>
</div>
<div class="col-sm-12 input-group-sm mb-3"><br>
<td><label class="control-label"><b>Job Description*</b></label></td>
<td><textarea class="form-control" rows="15" name="job_description">
<?php echo $row['job_description']; ?>
</textarea></td>
</div>


<div class="col-sm-12 input-group-sm mb-3"><br>
<td><label class="control-label"><b>Job Requirements*</b></label></td>
<td><textarea class="form-control" rows="15" name="job_requirement">
<?php echo $row['job_requirement']; ?>  
</textarea></td>
</div>
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Education in Detail*</b></label></td>
<td><textarea class="form-control" rows="8" name="education_details">
 <?php echo $row['education_details']; ?> 
</textarea></td>
</div>


<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Skills*</b></label></td>
<td><textarea class="form-control" rows="8" name="skill">
<?php echo $row['skill']; ?>  
</textarea></td>
</div>

<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Languages*</b></label></td>
<td><textarea class="form-control" rows="4" name="language">
<?php echo $row['languages']; ?>  
</textarea></td>
</div>

<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Submission Guideline*</b></label></td>
<td><textarea class="form-control" rows="4" name="sub_guideline">
  <?php echo $row['submission_guideline']; ?>
</textarea></td>
</div>

<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Submission Email*</b></label></td>
<td><textarea class="form-control" rows="2" name="sub_email">
<?php echo $row['submission_email']; ?>
</textarea></td>
</div>



<div class="col-md-12 form-group">
<button type="submit" name="update" class="btn btn-primary" >
  Update
</button>
<button type="reset" class="btn btn-default" >Reset</button>
</div>

</div>
</div>
</div>



</form>
<br><br>
 <!-- 
  -->
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


