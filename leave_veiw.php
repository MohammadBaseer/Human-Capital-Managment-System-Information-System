<?php 
include_once('header.php');

 ?>



<div class="pcoded-main-container">
<?php 
@$reason = $_POST['reason'];
@$trn_date = date("Y-m-d H:i:s");
@$hr_approved = $_REQUEST['hr_approved'];
@$manager_approved = $_REQUEST['manager_approved'];

  if (isset($_POST['hr_approve'])) {


$sql = "UPDATE leave_forms SET remark= '$reason', hr_sign='approved', last_modify='$trn_date' WHERE leave_id='$hr_approved'" ;
             mysqli_query($conn, $sql);
            echo "<script>window.location='my_department_leaves.php';</script>";
        
 }
 elseif (isset($_POST['hr_reject'])) {
 $sql = "UPDATE leave_forms SET remark= '$reason', hr_sign='rejected', last_modify='$trn_date' WHERE leave_id='$hr_approved'" ;
             mysqli_query($conn, $sql);
            echo "<script>window.location='my_department_leaves.php';</script>";

 }
 elseif (isset($_POST['manager_approve'])) {
  $sql = "UPDATE leave_forms SET remark= '$reason', manager_sign='approved', last_modify='$trn_date' WHERE leave_id='$manager_approved'" ;
             mysqli_query($conn, $sql);
            echo "<script>window.location='my_department_leaves.php';</script>";

 }
 elseif (isset($_POST['manager_reject'])) {
    $sql = "UPDATE leave_forms SET remark= '$reason', manager_sign='rejected', last_modify='$trn_date' WHERE leave_id='$manager_approved'" ;
             mysqli_query($conn, $sql);
            echo "<script>window.location='my_department_leaves.php';</script>";

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
<a href="#" class="feather icon-printer" style="font-size: 1pc;" onclick="printDiv('print')"> Print</a>
<div id="print">
	<?php 
 if (@$hr_approved = $_REQUEST['hr_approved'])
{
$sql = "SELECT * FROM leave_forms as l INNER JOIN employees as e on l.employee_id = e.id  INNER JOIN department AS d ON e.department_id = d.departmentid WHERE leave_id= '$hr_approved' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
  
	 ?>
  <form method="POST" enctype="multipart/form-data">
  <table class="table table-bordered border">

    <tbody>
      <tr>
        <td style="font-weight: bold;">Name:</td>
        <td colspan="3"><?php echo $row['full_name']; ?></td>
      </tr>
      <tr>
      <tr>
        <td style="font-weight: bold;">Department:</td>
        <td><?php echo $row['department']; ?></td>
        <td style="font-weight: bold;">Manager:</td>
        <td><?php echo $row['manager']; ?></td>
      </tr>
        <td style="font-weight: bold;">From Date:</td>
        <td><?php echo $row['from_date']; ?></td>
        <td style="font-weight: bold;">To Date:</td>
        <td><?php echo $row['to_date']; ?></td>
      </tr>
      <tr>
        <td style="font-weight: bold;">Total Days:</td>
        <td><?php echo date_diff(date_create($row['from_date']),date_create($row['to_date']))->format('%d days'); ?></td>
        <td style="font-weight: bold;">Leave Type:</td>
        <td><?php echo $row['leave_type']; ?></td>
      </tr>
      <tr>
      <tr>
        <td style="font-weight: bold;">Team Manager:</td>
        <td colspan="3"><?php echo $row['manager_sign']; ?></td>
      </tr>

      <tr>
        <td style="font-weight: bold;">Reason:</td>
        <td colspan="3"><input type="text" name="reason" style="border: none;" placeholder="Ex.. Reject Reason/other"></td>
      </tr>
</tr>
    </tbody>

  </table>

  <!-- <a href="controller/approval.php?hr_approved=<?php //echo $row['leave_id'];?>"> -->
<button type="submit" name="hr_approve" class="btn btn-primary">Approve</button>
<!-- </a> -->
 <!-- <a href="controller/approval.php?hr_rejected=<?php //echo $row['leave_id'];?>" onclick="return confirm('Are you sure..?');"> -->
<button type="submit" name="hr_reject" class="btn btn-danger">Reject</button>
<!-- </a> -->
</form>



  <?php }
  elseif (@$manager_approved = $_REQUEST['manager_approved']) {

$sql = "SELECT * FROM leave_forms as l INNER JOIN employees as e on l.employee_id = e.id  INNER JOIN department AS d ON e.department_id = d.departmentid WHERE leave_id= '$manager_approved' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
  
	 ?>
  <form method="POST" enctype="multipart/form-data">
  <table class="table table-bordered border">

    <tbody>
      <tr>
        <td style="font-weight: bold;">Name:</td>
        <td colspan="3"><?php echo $row['full_name']; ?></td>
      </tr>
      <tr>
      <tr>
        <td style="font-weight: bold;">Department:</td>
        <td><?php echo $row['department']; ?></td>
        <td style="font-weight: bold;">Manager:</td>
        <td><?php echo $row['manager']; ?></td>
      </tr>
        <td style="font-weight: bold;">From Date:</td>
        <td><?php echo $row['from_date']; ?></td>
        <td style="font-weight: bold;">To Date:</td>
        <td><?php echo $row['to_date']; ?></td>
      </tr>
      <tr>
        <td style="font-weight: bold;">Total Days:</td>
        <td><?php echo date_diff(date_create($row['from_date']),date_create($row['to_date']))->format('%d days'); ?></td>
        <td style="font-weight: bold;">Leave Type:</td>
        <td><?php echo $row['leave_type']; ?></td>
      </tr>

        <tr>
        <td style="font-weight: bold;">Reason:</td>
        <td colspan="3"><input type="text" name="reason" style="border: none;" placeholder="Ex.. Reject Reason/other"></td>
      </tr> 
    
    </tbody>

  </table>
  </div>

  <!-- <a href="controller/approval.php?manager_approved=<?php //echo $row['leave_id'];?>"> -->
<button type="submit" name="manager_approve" class="btn btn-primary">Approve</button>
<!-- </a> -->
 <!-- <a href="controller/approval.php?manager_rejected=<?php //echo $row['leave_id'];?>" onclick="return confirm('Are you sure..?');"> -->
<button type="submit" name="manager_reject" class="btn btn-danger">Reject</button>
<!-- </a> -->

</form>
<?php



  	  }
else{
	echo "Error";
}

   ?>


<br>
<div class="col-sm-12">
<br><br>
</div>
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


