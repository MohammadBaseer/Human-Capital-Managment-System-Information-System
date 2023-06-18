<?php 
include_once('header.php');
if (isset($_POST['postjob'])) {
  
$data = $_POST;

$job_title   = $data ['job_title'];
$job_location   = $data ['job_location'];
$nationality   = $data ['nationality'];
$category   = $data ['category'];
$employment_type   = $data ['employment_type'];
$salary   = $data ['salary'];
$vacancy   = $data ['vac'];
$no_jobs   = $data ['no_jobs'];
$experience   = $data ['experience'];
$gender   = $data ['gender'];
$education   = $data ['education'];
$open_date   = $data ['open_date'];
$cloes_date   = $data ['cloes_date'];
$about_org   = $data ['about_org'];
$job_description   = $data ['job_description'];
$job_requirement   = $data ['job_requirement'];
$educatiion_details   = $data ['educatiion_details'];
$skill   = $data ['skill'];
$language   = $data ['language'];
$sub_guideline   = $data ['sub_guideline'];
$sub_email   = $data ['sub_email'];

$sql = "INSERT INTO `job_t` (`job_title`, `Location`, `nationality`, `category`, `employment_type`, `salary`, `vacancy`, `no_of_jobs`, `experience`, `gender`, `education`, `open_date`, `close_date`, `about_org`, `job_description`, `job_requirement`, `education_details`,`skill`, `languages`, `submission_guideline`, `submission_email`, `remark`)

VALUES ('$job_title', '$job_location', '$nationality', '$category', '$employment_type', '$salary', '$vacancy', '$no_jobs', '$experience', '$gender', '$education', '$open_date', '$cloes_date', '$about_org', '$job_description', '$job_requirement', '$educatiion_details', '$skill', '$language', '$sub_guideline','$sub_email', 'publish');";


if($result = mysqli_query($conn,$sql))
 
{
                   echo "<script>window.location='announce_new_job.php';</script>";

 

?>
    <!-- <script type="text/javascript">
      swal("Congrats!", " New record added successfully!", "success");
    </script> -->

<?php  
}

else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
?>
    <script type="text/javascript">
      swal("Error!", " Faild try again....!", "error");
    </script>
 <?php 
}}
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
<h5 class="m-b-10">E-Recuritment</h5>
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="home.php"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item"><a href="javascript:">Recuritment Managment / Job Announcement</a></li>
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
<h5>Announce New Job</h5>
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
<td><input type="text" name="job_title" class="form-control" placeholder="Job Title" value="Program Officer"></td>
</div>

<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Job Location*</b></label></td>
<td><input type="text" name="job_location" class="form-control" placeholder="Job Location" value="Kabul"></td>
</div>

<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Nationality*</b></label></td>
<td><input type="text" name="nationality" class="form-control" placeholder="Nationality" value="Afghan"></td>
</div>
<!-- 
 -->


<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Category*</b></label></td> 
<td><input type="text" name="category" class="form-control" placeholder="Category" value="Administrative"></td>
</div>

<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Employment Type*</b></label></td> 
<td><input type="text" name="employment_type" class="form-control" placeholder="Employment Type" value="Full Time"></td>
</div>

<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Salary*</b></label></td> 
<td><input type="text" name="salary" class="form-control" placeholder="Salary" value="NTA-Scale"></td>
</div>

<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Vacancy Number*</b></label></td>
<td><input type="text" name="vac" class="form-control" placeholder="Vacancy Number" value="IR-005"></td>
</div>

</div>
<div class="col-xl-5" style="padding: 0px;margin: 5px 30px; outline: solid 0.5px #f4f7fa;">
<br>
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>No. of Jobs*</b></label></td>
<td><input type="text" name="no_jobs" class="form-control" placeholder="No. of Jobs" value="6"></td>
</div>

<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Years of Experience*</b></label></td>
<td><input type="text" name="experience" value=" 4-Year(s)" class="form-control" placeholder="Years of Experience"></td>
</div>

<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Gender*</b></label></td> 
<td><select type="text" name="gender" class="form-control">
<option>-- Select Gender --</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Both">Both</option>
</select></td>
<!-- <input type="text" name="gender" class="form-control" placeholder="Gender"> -->
</div>


<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Education*</b></label></td> 
<td><input type="text" name="education" class="form-control" placeholder="Education" value="BBA"></td>
</div>

<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Open Date*</b></label></td>
<td><input type="date" name="open_date" class="form-control" placeholder="Open Date"  ></td>
</div>

<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Cloes Date*</b></label></td> 
<td><input type="date" name="cloes_date" class="form-control" placeholder="Cloes Date"></td>
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
EQUALITY for Peace and Democracy (EPD) is an Afghan non-profit, non-governmental organization founded in 2010 for empowering women and youth at the community and policy levels in Afghanistan. The aim of EPD is to increase the capacity of women and youth so that they are able to represent their needs in development, peacebuilding, and democratic processes.

Vision: EPD envisions Afghanistan as a peaceful, prosperous and democratic state where all Afghans enjoy equal rights without any fear or discrimination.

Mission: To empower and strengthen women and youth at the community and policy levels, build coalitions and networks, and jointly promote and advocate for human rights, peace, and good governance.
  </textarea>
</td>
</div>
<div class="col-sm-12 input-group-sm mb-3"><br>
<td><label class="control-label"><b>Job Description*</b></label></td>
<td><textarea class="form-control" rows="15" name="job_description">Prepare, review and provide legal advice on all legal documents 
Build a strong network and partnership with Provincial and District Government Office the local influential elders, Community Development Council (CDC), District Development Assembly (DDA)
Ensure the establishment of a close working relationship and coordination with Local Shura members particularly those who are involved in conflict resolution and involve them for program implementation
Conduct activities as per the work plan
Hold workshops and training at the provincial and district levels as per the central office’s instruction
Assist in the preparation of a work plan for the project
Establish and maintain effective cooperation and coordination mechanism between selected beneficiaries, PGO, Police Headquarter and Justice Department (Huquq Department)
Organize coordination meeting at district/provincial levels as per the work plan
Prepare financial documents for the conducted activities
Mobilize influential elders and conduct network meetings for them
Preparing financial documents for the conducted activities
Participate in the capacity building programs in Kabul
Maintain, compile data/evidence and update an accurate and proper database to track and follow up with issues to be resolved by the selected beneficiaries through the informal justice system
Support the research and program department in monitoring and evaluation of the activities
Collect proper means of verification for the conducted activities
Maintain a properly soft and hard archive
Evaluation of the project activities
Conduct interviews with different stakeholders as per the instructions
Collect means of verification for the data collection including consent forms, photos, interview recordings, and GPS coordinates
To perform other duties as requested.
</textarea></td>
</div>


<div class="col-sm-12 input-group-sm mb-3"><br>
<td><label class="control-label"><b>Job Requirements*</b></label></td>
<td><textarea class="form-control" rows="15" name="job_requirement">
Having a Bachelor degree with two years of experience in the related field

Experience & Skills:      

Experience in capacity building programs
Ability to prepare operational plans of organization/project
Ability to managing and liaison with outside of organization and project
Fluency in written and spoken Dari and Pashto languages
Familiar with contexts, culture, and language of locals at the duty station
Microsoft Office packages (Word, Excel, PowerPoint) and Internet
Strong interpersonal and communication skills, innovative and team worker
Honest, active and well mannered
Previous work with elders, civil society and governmental organizations including PGO
Previous work experience in working with formal and informal conflict resolution(preferred
</textarea></td>
</div>
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Education in Detail*</b></label></td>
<td><textarea class="form-control" rows="8" name="educatiion_details">
  
</textarea></td>
</div>


<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Skills*</b></label></td>
<td><textarea class="form-control" rows="8" name="skill"></textarea></td>
</div>

<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Languages*</b></label></td>
<td><textarea class="form-control" rows="4" name="language"></textarea></td>
</div>

<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Submission Guideline*</b></label></td>
<td><textarea class="form-control" rows="4" name="sub_guideline">
All Applicants are invited to submit their CVs no later than 07/12/2019 to the following e-mail address:
epd.afghanistan@gmail.com
Please write the post title and or vacancy number in the subject line of your e-mail.
Only shortlisted candidates will be contacted for the written test and interview.

preference will be given to those who are from Helmand province.
</textarea></td>
</div>

<div class="col-sm-12 input-group-sm mb-3">
<td><label class="control-label"><b>Submission Email*</b></label></td>
<td><textarea class="form-control" rows="2" name="sub_email">epd.afghanistan@gmail.com</textarea></td>
</div>



<div class="col-md-12 form-group">
<button type="submit" name="postjob" class="btn btn-primary" >Announce</button>
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


