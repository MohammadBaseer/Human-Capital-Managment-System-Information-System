<?php 
include_once('../controller/connection.php');
if (isset($_GET['job_id'])) {
$job_id = $_GET['job_id'];
  //$sql = "SELECT * FROM employees WHERE id='$empwiew'";
  $sql = "SELECT * From job_t WHERE job_id='$job_id' AND remark= 'publish' ";
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
// ===================
// $visitor_ip = $_SERVER['REMOTE_ADDR'];
$visitor_ip = "222.222.222.222";

$query = "SELECT * FROM vacancy_view_counter WHERE ip_address ='$visitor_ip' ";
$result = mysqli_query($conn , $query);
$rw =  mysqli_fetch_assoc($result);
$total_vistor = mysqli_num_rows($result);
// ============================


// ===========================
if ($total_vistor == 0 AND $rw['vac_id'] != $job_id )
if ($total_vistor)
 {
  // echo "if".$total_vistor;
$query = "INSERT INTO vacancy_view_counter (ip_address, vac_id) VALUES ('$visitor_ip', '$job_id') ";
$result = mysqli_query($conn , $query);
}
elseif ($rw['vac_id'] == $total_vistor ) {
 // echo "elseif".$total_vistor;
$query = "INSERT INTO vacancy_view_counter (ip_address, vac_id) VALUES ('$visitor_ip', '$job_id') ";
$result = mysqli_query($conn , $query);
}
// =================== 
 ?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Atomic &mdash; Free Business Website Template by Colorlib</title>
    <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" type="text/css" href="cssone/form.css">
  <link rel="stylesheet" type="text/css" href="cssone/bootsraptforform.css">

  </head>
  <body>
  
  <div class="js-animsition animsition" id="site-wrap" data-animsition-in-class="fade-in" data-animsition-out-class="fade-out">


    <header class="templateux-navbar dark" role="banner">
     
      <div class="container"  data-aos="fade-down">
        <div class="row">

          <div class="col-3 templateux-logo">
            <a href="index.html" class="animsition-link">Atomic</a>
          </div>
          <nav class="col-9 site-nav">
            <button class="d-block d-md-none hamburger hamburger--spin templateux-toggle templateux-toggle-light ml-auto templateux-toggle-menu" data-toggle="collapse" data-target="#mobile-menu" aria-controls="mobile-menu" aria-expanded="false" aria-label="Toggle navigation">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button> <!-- .templateux-toggle -->

            <ul class="sf-menu templateux-menu d-none d-md-block">
                            <li><a href="index.php" class="animsition-link">Home</a></li>
                            <!-- <li><a href="#" class="animsition-link">About</a></li>
                            <li><a href="#" class="animsition-link">Gallery</a></li>
                            <li><a href="#" class="animsition-link">Blog</a></li> -->
                            <li class="active"><a href="vacancy.php" class="animsition-link">Vacancy</a></li>
                        </ul>

          </nav> <!-- .site-nav -->
          

        </div> <!-- .row -->
      </div> <!-- .container -->
    </header> <!-- .templateux-navba -->
    
    <div class="templateux-cover" style="background-image: url(images/slider-1.jpg); min-height: 139px;">
    </div> 

<!--  -->


 <div class="container" data-aos="fade-down">
        <div class="row align-items-center">
          <div  style="border-bottom: solid #0187ff 1px; width: 100%;"><h2>Apply For <?php echo $row['job_title']; ?></h2></div>

<!-- start php here  -->
          
<div class="col-md-8"> 
      <br>    
          <!--Job Detail-->
          
          <div class="boxwraper">
            <div class="titlebar">
              <div class="row">
                <div class="col-sm-6">Job Detail</div>
           <div class="col-sm-6 text-right"><a href="javascript:;" onclick="window.history.back(-1);">Back</a></div>
                              </div>
            </div>
            
            <!--Job Detail-->
            
            <div class="row"> 
              
              <!--Requirements-->
              
              <div class="col-md-12">
                <ul class="reqlist">
                  <li>
                    <div class="col-sm-6">Job Title:</div>
                    <div class="col-sm-6"><?php echo $row['job_title']; ?></div>
                    <div class="clear"></div>
                  </li>
                  <li>
                    <div class="col-sm-6">Job Location:</div>
                    <div class="col-sm-6"><?php echo $row['location']; ?></div>
                    <div class="clear"></div>
                  </li>
                  <li>
                    <div class="col-sm-6">Nationality:</div>
                    <div class="col-sm-6"><?php echo $row['nationality']; ?></div>
                    <div class="clear"></div>
                  </li>
                  <li>
                    <div class="col-sm-6">Category:</div>
                    <div class="col-sm-6"><?php echo $row['category']; ?></div>
                    <div class="clear"></div>
                  </li>
                  <li>
                    <div class="col-sm-6">Employment Type:</div>
                    <div class="col-sm-6"><?php echo $row['employment_type']; ?></div>
                    <div class="clear"></div>
                  </li>
                  <li>
                    <div class="col-sm-6">Salary:</div>
                    <div class="col-sm-6"><?php echo $row['salary']; ?></div>
                    <div class="clear"></div>
                  </li>
                  <li>
                    <div class="col-sm-6">Vacancy Number:</div>
                    <div class="col-sm-6"><?php echo $row['vacancy']; ?></div>
                    <div class="clear"></div>
                  </li>
                                    <li>
                    <div class="col-sm-6">No. of Jobs:</div>
                    <div class="col-sm-6"><?php echo $row['no_of_jobs']; ?></div>
                    <div class="clear"></div>
                  </li>
                  <li>
                    <div class="col-sm-6">Year of Experience:</div>
                    <div class="col-sm-6"><?php echo $row['experience'];?></div>
                    <div class="clear"></div>
                  </li>
                  <li>
                    <div class="col-sm-6">Education:</div>
                    <div class="col-sm-6"><?php echo $row['education']; ?></div>
                    <div class="clear"></div>
                  </li>
                  <li>
                    <div class="col-sm-6">Gender:</div>
                    <div class="col-sm-6"><?php echo $row['gender']; ?></div>
                    <div class="clear"></div>
                  </li>
                  <li>
                    <div class="col-sm-6">Open Date:</div>
                    <div class="col-sm-6"><?php echo $row['open_date']; ?></div>
                    <div class="clear"></div>
                  </li>
                  <li>
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
                  <p>
                  </p><h2 class="normal-details"><?php echo $row['about_org']; ?></h2>
                  <p></p>
                </div>
                <div class="col-md-12">
                  <div class="subtitlebar">Job Description</div>
                  <p>
                  </p><h2 class="normal-details"><?php echo $row['job_description']; ?></h2>
                  <p></p>
                </div>
                <div class="col-md-12">
                  <div class="subtitlebar">Job Requirement</div>
                  <p>
                  </p><h2 class="normal-details"><?php echo $row['job_requirement']; ?></h2>
                  <p></p>
                </div>
                <div class="col-md-12">
                  <div class="subtitlebar">Education</div>
                  <p>
                  </p><h2 class="normal-details"><?php echo $row['education_details']; ?></h2>
                  <p></p>
                </div>
                <div class="col-md-12">
                  <div class="subtitlebar">Skill</div>
                  <p>
                  </p><h2 class="normal-details"><?php echo $row['skill']; ?></h2>
                  <p></p>
                </div>
                <div class="col-md-12">
                  <div class="subtitlebar">Languages</div>
                  <p>
                  </p><h2 class="normal-details"><?php echo $row['languages']; ?></h2>
                  <p></p>
                </div>
                <div class="col-md-12">
                  <div class="subtitlebar">Submission Guidelines</div>
                  <p>
                  </p><h2 class="normal-details"><?php echo $row['submission_guideline']; ?></h2>
                  <p></p>
                </div>
                <div class="col-md-12">
                  <div class="subtitlebar">Submission Email</div>
                  <p>
                  </p><h2 class="normal-details"><?php echo $row['submission_email']; ?></h2>
                  <p></p>
                </div>
                              </div>
              <div class="actionBox footeraction">
                <h4>To Apply for this job click below</h4>
                <a href="cv_submission.php?apply=<?php echo $row['job_id'];?>" class="applyjob"><span>Apply Now</span></a> </div>
              <div class="clear">&nbsp;</div>
              
            </div>
          </div>
        </div>

          <!-- end php here -->

        </div>
      </div>

<!--  -->

  <script src="js/scripts-all.js"></script>
  <script src="js/main.js"></script>
    <script src="js/google-map.js"></script>
  
  </body>
</html>