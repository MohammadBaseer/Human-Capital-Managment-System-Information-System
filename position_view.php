<?php 
include_once('header.php');
if (isset($_GET['post_detail'])) {
$post_detail = $_GET['post_detail'];
  //$sql = "SELECT * FROM employees WHERE id='$empwiew'";
  $sql = "SELECT * From job_t WHERE job_id='$post_detail'";
  $result = mysqli_query($conn, $sql);
  if ($row =  mysqli_fetch_assoc($result))
  {
// echo "<pre>";
// print_r($row);
// echo "</pre>";
  } 
else 
{
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
  }

 ?>


<!-- position details CSS -->
    <!-- <link rel="stylesheet" href="assets/css/cssone/style.css"> -->
    <link rel="stylesheet" type="text/css" href="assets/css/cssone/form.css">
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/cssone/bootsraptforform.css"> -->
    <!--  -->
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
<li class="breadcrumb-item"><a href="javascript:">Recuritment Managment</a></li>
<li class="breadcrumb-item"><a href="javascript:">Job Announcement</a></li>
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
<div class="card-block pb-0">
<!--  -->
<a href="#" class="feather icon-printer" style="font-size: 1pc;" onclick="printDiv('print')"> Print</a>
<div id="print">
  <br>
<div class="boxwraper">
            <!-- <div class="titlebar">
              <div class="row">
                <div class="col-sm-6">Job Detail</div> 
           <div class="col-sm-6 text-right"><a href="javascript:;" onclick="window.history.back(-1);">Back</a></div>
           </div>
            </div> -->
            
            <!--Job Detail-->
            
            <div class="row"> 
              
              <!--Requirements-->
              
              <div class="col-md-12">
                <ul class="reqlist">
                  <li style="display: flex;">
                    <div class="col-sm-6">Job Title:</div>
                    <div class="col-sm-6"><?php echo $row['job_title']; ?></div>
                    <div class="clear"></div>
                  </li>
                  <li style="display: flex;">
                    <div class="col-sm-6">Job Location:</div>
                    <div class="col-sm-6"><?php echo $row['location']; ?></div>
                    <div class="clear"></div>
                  </li>
                  <li style="display: flex;">
                    <div class="col-sm-6">Nationality:</div>
                    <div class="col-sm-6"><?php echo $row['nationality']; ?></div>
                    <div class="clear"></div>
                  </li>
                  <li style="display: flex;">
                    <div class="col-sm-6">Category:</div>
                    <div class="col-sm-6"><?php echo $row['category']; ?></div>
                    <div class="clear"></div>
                  </li>
                  <li style="display: flex;">
                    <div class="col-sm-6">Employment Type:</div>
                    <div class="col-sm-6"><?php echo $row['employment_type']; ?></div>
                    <div class="clear"></div>
                  </li>
                  <li style="display: flex;">
                    <div class="col-sm-6">Salary:</div>
                    <div class="col-sm-6"><?php echo $row['salary']; ?></div>
                    <div class="clear"></div>
                  </li>
                  <li style="display: flex;">
                    <div class="col-sm-6">Vacancy Number:</div>
                    <div class="col-sm-6"><?php echo $row['vacancy']; ?></div>
                    <div class="clear"></div>
                  </li>
                                    <li style="display: flex;">
                    <div class="col-sm-6">No. of Jobs:</div>
                    <div class="col-sm-6"><?php echo $row['no_of_jobs']; ?></div>
                    <div class="clear"></div>
                  </li>
                  <li style="display: flex;">
                    <div class="col-sm-6">Year of Experience:</div>
                    <div class="col-sm-6"><?php echo $row['experience'];?></div>
                    <div class="clear"></div>
                  </li>
                  <li style="display: flex;">
                    <div class="col-sm-6">Education:</div>
                    <div class="col-sm-6"><?php echo $row['education']; ?></div>
                    <div class="clear"></div>
                  </li>
                  <li style="display: flex;">
                    <div class="col-sm-6">Gender:</div>
                    <div class="col-sm-6"><?php echo $row['gender']; ?></div>
                    <div class="clear"></div>
                  </li>
                  <li style="display: flex;">
                    <div class="col-sm-6">Open Date:</div>
                    <div class="col-sm-6"><?php echo $row['open_date']; ?></div>
                    <div class="clear"></div>
                  </li>
                  <li style="display: flex;">
                    <div class="col-sm-6">Cloes Date:</div>
                    <div class="col-sm-6"><?php echo $row['close_date']; ?></div>
                    <div class="clear"></div>
                  </li>
                </ul>
              </div>
              
              <div class="clear"></div>
            </div>
            
            <!--Job Description-->
            
            <div class="jobdescription">
              <div class="row">
                <div class="col-md-12">
                  <div class="subtitlebar">About Organization</div>
                  <p style="text-align: justify;">
                    <?php echo $row['about_org']; ?>
                  </p>
                </div>
                <div class="col-md-12">
                  <div class="subtitlebar">Job Description</div>
                  <p style="text-align: justify;"><?php echo $row['job_description']; ?>
                  </p><!-- <h2 class="normal-details"><?php echo $row['job_description']; ?></h2>
                  <p></p> -->
                </div>
                <div class="col-md-12">
                  <div class="subtitlebar">Job Requirement</div>
                  <p style="text-align: justify;">
                    <?php echo $row['job_requirement']; ?>
                  </p>
                </div>
                <div class="col-md-12">
                  <div class="subtitlebar">Education</div>
                  <p style="text-align: justify;">
                    <?php echo $row['education_details']; ?>
                  </p>
                </div>
                <div class="col-md-12">
                  <div class="subtitlebar">Skill</div>
                  <p style="text-align: justify;">
                    <?php echo $row['skill']; ?>
                  </p>
                </div>
                <div class="col-md-12">
                  <div class="subtitlebar">Languages</div>
                  <p style="text-align: justify;">
                    <?php echo $row['languages']; ?>
                  </p> 
                </div>
                <div class="col-md-12">
                  <div class="subtitlebar">Submission Guidelines</div>
                  <p style="text-align: justify;">
                    <?php echo $row['submission_guideline']; ?>
                  </p>
                </div>
                <div class="col-md-12">
                  <div class="subtitlebar">Submission Email</div>
                  <p style="text-align: justify;">
                    <?php echo $row['submission_email']; ?>
                  </p>
                </div>
                              </div>
              <div class="actionBox footeraction">
                <a class="not_print applyjob" href="position_edit.php?post_edit=<?php echo $row['job_id'];?>" ><span>Edit</span></a>
              </div>
              <div class="clear">&nbsp;</div>
              
            </div>
          </div>

<!--  -->
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


