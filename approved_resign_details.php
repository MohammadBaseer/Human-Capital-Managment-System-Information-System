<?php 
include_once('header.php');

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
<h5 class="m-b-10">E-Leave System</h5>
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="home.php"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item"><a href="javascript:">Veiw Form</a></li>
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
<h5>Leave Details</h5>
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
  if (@$approved = $_REQUEST['approved_details']) {

$sql = "SELECT * FROM employees JOIN resignation WHERE employees.id = resignation.emp_id AND resignation.r_id = '$approved' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if ($row['team_m_approval'] !=='approved' AND $row['hr_approval'] !=='approved' ) {
//  ?>  
 <h5 style="color: red">Error</h5>



<?php
}
else
{
  ?>
<a href="#" class="feather icon-printer" style="font-size: 1pc;" onclick="printDiv('print')"> Print</a><br><br>
<div id="print">
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
  <p style="line-height: 5px;"><i style="font-weight: bolder;">HR Approval: </i><?php echo $row['hr_approval']; ?></p>
  <p style="line-height: 5px;"><i style="font-weight: bolder;">Submit Date: </i><?php echo $row['r_date']; ?></p>
  <p style="line-height: 5px;"><i style="font-weight: bolder;">Approved Date: </i><?php echo $row['r_date_modify']; ?></p>

  <br>
  <div class="col-sm-8">
  <p style="line-height: 5px;"><i style="font-weight: bolder;">Resign Details: </i></p>
  <p style="margin-left: 25px;"><?php echo $row['letter']; ?></p>
 
 <p style="line-height: 5px;"><i style="font-weight: bolder;">If reject Reason: </i></p>
  <p style="margin-left: 25px;"><?php echo $row['remark']; ?></p>
 </div>

  </div>
  </table>

</form>
</div>
<?php
  	 }
    }
else{
	echo "Error";
}

   ?>
</div>

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


