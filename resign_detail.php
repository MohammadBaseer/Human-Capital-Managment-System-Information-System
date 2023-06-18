<?php 
include_once('header.php');

 ?>



<div class="pcoded-main-container">
<?php 
$error = '';
@$reason = $_POST['reason'];
@$trn_date = date("Y-m-d");
@$team_manager = $_REQUEST['tm_detail'];
@$hr_manager = $_REQUEST['hr_detail'];
// 


  if (isset($_POST['hr_approve'])) {


$sql = "UPDATE employees JOIN resignation ON  employees.id = resignation.emp_id SET resignation.hr_approval = 'approved', resignation.remark= '$reason', resignation.r_date_modify='$trn_date', employees.status = 'Resigned' WHERE resignation.r_id='$hr_manager' " ;   
if (mysqli_query($conn, $sql)) {
              echo "<script>window.location='resign_approved.php';</script>";

     
}      
else
{
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
            
}
 elseif (isset($_POST['hr_reject'])) {
  if ($reason == '' ) {
    $error = "<p style='color: red;'>Empty*</P>"; 
    echo $reason;
}
else
{
$sql = "UPDATE resignation SET hr_approval = 'rejected', remark= '$reason', r_date_modify='$trn_date' WHERE r_id='$hr_manager' " ;
            
            mysqli_query($conn, $sql);
            echo "<script>window.location='resign_rejected.php';</script>";
}
 }
 elseif (isset($_POST['tm_approve'])) {
$sql = "UPDATE resignation SET team_m_approval = 'approved', remark= '$reason', r_date_modify='$trn_date' WHERE r_id='$team_manager' " ;
            mysqli_query($conn, $sql);
            echo "<script>window.location='Documents.php';</script>";

 }
 elseif (isset($_POST['tm_reject'])) {
  if ($reason == '' ) {
    $error = "<p style='color: red;'>Empty*</P>"; 
            echo $reason;

}
else
{
$sql = "UPDATE resignation SET team_m_approval = 'rejected', remark= '$reason', r_date_modify='$trn_date' WHERE r_id='$team_manager' " ;
            mysqli_query($conn, $sql);
            echo "<script>window.location='resign_rejected.php';</script>";

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
<h5 class="m-b-10">Document</h5>
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="home.php"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item"><a href="javascript:">Resignation Form</a></li>
</ul>
</div>
</div>
</div>
</div>
<div class="main-body">
<div class="page-wrapper">

<div class="row">
<div class="col-xl-12 col-md-12">
<div class="card Application-list">
<div class="card-header">
<h5>Resignation Details</h5>
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
<!-- ========================================================== -->
<div class="table-responsive">
	<?php 
 if (@$team_manager = $_REQUEST['tm_detail'])
{

$sql = "SELECT * FROM employees JOIN resignation WHERE employees.id = resignation.emp_id AND resignation.r_id = '$team_manager' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
  
if ($row['team_m_approval']=='approved' || $row['team_m_approval']=='rejected' ) {
 ?> 
<h5 style="color: red">Error</h5>



<?php
}
else
{
  ?>
    <h4><?php echo '<b>'.$row['full_name'].'</b> '.'Resign Letter'; ?></h4>

  <form method="POST" enctype="multipart/form-data">
  <table class="table table-bordered border">
  <br><br>
  <!-- ========================= -->
<div class="container">


  <p style="line-height: 5px;"><i style="font-weight: bolder;">Contract ID: </i><?php echo $row['emp_contract_id']; ?></p>
  <p style="line-height: 5px;"><i style="font-weight: bolder;">Name: </i><?php echo $row['full_name']; ?></p>
  <p style="line-height: 5px;"><i style="font-weight: bolder;">Father Name: </i><?php echo $row['father_name']; ?></p>
  <p style="line-height: 5px;"><i style="font-weight: bolder;">Department: </i><?php echo $row['department']; ?></p>
  <p style="line-height: 5px;"><i style="font-weight: bolder;">Supervisor: </i><?php echo $row['supervisor']; ?></p>
  <p style="line-height: 5px;"><i style="font-weight: bolder;">Submit Date: </i><?php echo $row['r_date']; ?></p>
  <br>
  <div class="col-sm-8">
  <p style="line-height: 5px;"><i style="font-weight: bolder;">Resign Details: </i></p>
  <p style="margin-left: 25px;"><?php echo $row['letter']; ?></p>
  </div>

 <p style="line-height: 5px;"><i style="font-weight: bolder;">If reject Reason: </i></p>
  <?php echo $error; ?>

 <textarea class="form-control" rows="4" name="reason" style="background-color: #fff;"></textarea>


  </div>
  </table>


<button type="submit" name="tm_approve" class="btn btn-primary">Approve</button>
<button type="submit" name="tm_reject" class="btn btn-danger">Reject</button>
</form>

<?php
}
?>
</div>



  <?php }
  elseif (@$hr_manager = $_REQUEST['hr_detail']) {

$sql = "SELECT * FROM employees JOIN resignation WHERE employees.id = resignation.emp_id AND resignation.r_id = '$hr_manager' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
  

  // if ($row['team_m_approval']=='' || $row['team_m_approval']=='rejected' || $row['hr_approval']=='approved' || $row['hr_approval']=='rejected') {


if ($row['team_m_approval']=='' || $row['team_m_approval']=='rejected' || $row['hr_approval']=='approved' || $row['hr_approval']=='rejected'  


AND ($row['team_m_approval']!='' || $row['team_m_approval']=='rejected' || $row['hr_approval']=='approved' || $row['hr_approval']=='rejected' AND $row['role'] == 'Team-Manager' ) ) {
 ?> 
<h5 style="color: red">Error1</h5>



<?php
}
else
{
  ?>
  <h4><?php echo '<b>'.$row['full_name'].'</b> '.'Resign Letter'; ?></h4>
  <form method="POST" enctype="multipart/form-data">
  <table class="table table-bordered border">
  <br><br>
  <!-- ========================= -->
<div class="container">
  <p style="line-height: 5px;"><i style="font-weight: bolder;">Contract ID: </i><?php echo $row['emp_contract_id']; ?></p>
  <p style="line-height: 5px;"><i style="font-weight: bolder;">Name: </i><?php echo $row['full_name']; ?></p>
  <p style="line-height: 5px;"><i style="font-weight: bolder;">Father Name: </i><?php echo $row['father_name']; ?></p>
  <p style="line-height: 5px;"><i style="font-weight: bolder;">Department: </i><?php echo $row['department']; ?></p>
  <p style="line-height: 5px;"><i style="font-weight: bolder;">Supervisor: </i><?php echo $row['supervisor']; ?></p>
  <p style="line-height: 5px;"><i style="font-weight: bolder;">Supervisor Approval: </i><?php echo $row['team_m_approval']; ?></p>
  <p style="line-height: 5px;"><i style="font-weight: bolder;">Submit Date: </i><?php echo $row['r_date']; ?></p>
  <p style="line-height: 5px;"><i style="font-weight: bolder;">Approved Date: </i><?php echo $row['r_date_modify']; ?></p>

  <br>
  <div class="col-sm-8">
  <p style="line-height: 5px;"><i style="font-weight: bolder;">Resign Details: </i></p>
  <p style="margin-left: 25px;"><?php echo $row['letter']; ?></p>
  </div>

 <p style="line-height: 5px;"><i style="font-weight: bolder;">If reject Reason: </i></p>
 <?php echo $error; ?>
 <textarea class="form-control" rows="4" name="reason" style="background-color: #fff;"></textarea>

 <!-- <textarea name="reason"></textarea> -->

  </div>
  </table>
</div>


<button type="submit" name="hr_approve" class="btn btn-primary">Approve</button>
<button type="submit" name="hr_reject" class="btn btn-danger">Reject</button>
</form>
<?php
}


  	  }
else{
	echo "Error";
}

   ?>


<br>
<div class="col-sm-12">
<br><br>
</div>
<!-- ========================================================== -->
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

<?php 

include_once('footer.php');
 ?>


