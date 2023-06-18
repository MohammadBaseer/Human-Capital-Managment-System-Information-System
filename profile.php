<?php 
include_once('header.php');
if (isset($_GET['profile']))
{
  $profile_id = $_GET['profile']; 
$sql = "SELECT *, b.department FROM employees a,department b WHERE a.department_id = b.departmentid AND id='$profile_id'";
   $result = mysqli_query($conn, $sql);
   $row =  mysqli_fetch_assoc($result);
}
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
<h5 class="m-b-10">Dashboard</h5>
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="home.php"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item"><a href="javascript:">My Profile</a></li>
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
<h5>My Profile</h5>
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
  <!-- ============= -->
 <a href="#" class="feather icon-printer" style="font-size: 1pc;" onclick="printDiv('print')"> Print</a>
<div id="print">
<div class="col-xl-12 col-md-12">
<!-- <div class="card">
<div class="card-block"> -->

<div class="text-center m-b-30">
<img class="img-fluid rounded-circle" src="profile_img/<?php echo $row['profile_img'];?>" alt="dashboard-user" style="width: 8em; height: 8em; border: 1px solid #dee2e6; padding: .25em;">
<h5 class="mt-3"><?php echo $row['full_name'];?></h5>
<span class="d-block"><?php echo $row['position'];?></span>
</div>
<!-- <h6 class=" m-b-0">754 Points <span class="float-right">1000</span></h6>
<div class="progress m-t-10" style="height: 7px;">
<div class="progress-bar progress-c-theme" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
</div> -->
<!-- <div class="row m-t-30">
<div class="col-6 p-r-0">
<a href="#!" class="btn btn-primary text-uppercase btn-block">add friend</a>
</div>
<div class="col-6">
<a href="#!" class="btn text-uppercase border btn-block btn-outline-secondary">message</a>
</div>
</div> -->

  <!-- ============= -->
<!-- ======================================================================================================= -->
 <?php echo @$error; ?>

<form method="POST" enctype="multipart/form-data">
<div class="row">
<div class="col-xl-5" style="padding: 0px;margin: 5px 30px; outline: solid 0.5px #f4f7fa;">
<div style="height: 35px; background: #f4f7fa; padding: 6px;"><h5>Personal Information</h5></div>
<div style="padding: 0px">
<br>
<!--  -->
<!-- =============-->
<!-- <div class="form-group row" style="margin: -10px;">
<div class="col-sm-12 input-group-sm mb-3">
<div>
<img style="width: 10em; height: 10em; border: 1px solid #dee2e6; padding: .25em;" src="profile_img/<?php // echo $row['profile_img'];?>" alt="activity-user">
</div>
</div>
</div> -->
<!-- ============= -->
<!-- <div class="form-group row" style="margin: -10px;">
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="col-sm-5 col-form-label col-form-label-sm"><b>Full Name:</b></label></td>
<td><?php //echo $row['full_name'];?></td>
</div>
</div> -->
<!-- =========== -->
<div class="form-group row" style="margin: -10px;">
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="col-sm-5 col-form-label col-form-label-sm"><b>Father Name:</b></label></td>
<td><?php echo $row['father_name'];?></td>
</div>
</div>
<!-- ========== -->
<div class="form-group row" style="margin: -10px;">
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="col-sm-5 col-form-label col-form-label-sm"><b>Birth Date:</b></label></td>
<td><?php echo $row['birthday'];?></td>
</div>
</div>
<!-- ========== -->
<div class="form-group row" style="margin: -10px;">
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="col-sm-5 col-form-label col-form-label-sm"><b>Gender:</b></label></td>
<td><?php echo $row['gender'];?></td>
</div>
</div>
<!-- ============ -->
<div class="form-group row" style="margin: -10px;">
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="col-sm-5 col-form-label col-form-label-sm"><b>Marital:</b></label></td>
<td><?php echo $row['marital'];?></td>
</div>
</div>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="col-sm-5 col-form-label col-form-label-sm"><b>Mobile Number:</b></label></td>
<td><?php echo $row['mobile_number'];?></td>
</div>
</div>
<!-- ================ -->
<div class="form-group row" style="margin: -10px;">
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="col-sm-5 col-form-label col-form-label-sm"><b>Personal Email:</b></label></td>
<td><?php echo $row['personal_email'];?></td>
</div>
</div>
<!-- =================-->
<div class="form-group row" style="margin: -10px;">
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="col-sm-5 col-form-label col-form-label-sm"><b>Permanent Address:</b></label></td>
<td><?php echo $row['permanent_address'];?></td>
</div>
</div>
<!-- ================-->
<div class="form-group row" style="margin: -10px;">
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="col-sm-5 col-form-label col-form-label-sm"><b>Present Address:</b></label></td>
<td><?php echo $row['present_address'];?></td>
</div>
</div>
<!-- =============== -->
<div class="form-group row" style="margin: -10px;">
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="col-sm-5 col-form-label col-form-label-sm"><b>NIC Number:</b></label></td>
<td><?php echo $row['nic'];?></td>
</div>
</div>
<!-- =============== -->
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="col-sm-5 col-form-label col-form-label-sm"><b>Country:</b></label></td>
<td><?php echo $row['experience'];?></td>
</div>
</div>
<!-- ============== -->
<div class="form-group row" style="margin: -10px;">
<div class="col-sm-12 input-group-sm mb-3">
<label class="col-sm-5 col-form-label col-form-label-sm">Province:</b></label></td>
<td><?php echo $row['province'];?></td>
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
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="col-sm-5 col-form-label col-form-label-sm"><b>Degree:</b></label></td>
<td><?php echo $row['degree'];?></td>
</div>
</div>
<!-- ============ -->
<div class="form-group row" style="margin: -10px;">
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="col-sm-5 col-form-label col-form-label-sm"><b>Field of Study:</b></label></td>
<td><?php echo $row['feild_of_study'];?></td>
</div>
</div>
<!-- ============ -->
<div class="form-group row" style="margin: -10px;">
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="col-sm-5 col-form-label col-form-label-sm"><b>Experience:</b></label></td>
<td><?php echo $row['experience'];?></td>
</div>
</div>
<!-- ================== -->
<br>
<div style="height: 35px; background: #f4f7fa; padding: 6px; margin-top: 7px;"><h5>Contract Information</h5></div>
<br>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="col-sm-5 col-form-label col-form-label-sm"><b>Employee Contract ID:</b></label></td>
<td><?php echo $row['emp_contract_id'];?></td>
</div>
</div>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="col-sm-5 col-form-label col-form-label-sm"><b>ID Card Number:</b></label></td>
<td><?php echo $row['id_card_number'];?></td>
</div>
</div>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="col-sm-5 col-form-label col-form-label-sm"><b>Official Email:</b></label></td>
<td><?php echo $row['official_email'];?></td>
</div>
</div>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="col-sm-5 col-form-label col-form-label-sm"><b>Department:</b></label></td>
<td><?php echo $row['department'];?></td>
</div>
</div>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="col-sm-5 col-form-label col-form-label-sm"><b>Salary:</b></label></td>
<td><?php echo $row['salary'];?></td>
</div>
</div>
<!-- ================== -->

<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="col-sm-5 col-form-label col-form-label-sm"><b>Join Date:</b></label></td>
<th><?php echo $row['join_date'];?></th>
</div>
</div>

<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="col-sm-5 col-form-label col-form-label-sm"><b>Expire Date:</b></label></td>
<td><?php echo $row['expire_date'];?></td>
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
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="col-sm-5 col-form-label col-form-label-sm"><b>Name:</b></label></td>
<td><?php echo $row['contact_person_name'];?></td>
</div>
</div>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="col-sm-5 col-form-label col-form-label-sm"><b>Relationship:</b></label></td>
<td><?php echo $row['contact_person_relationship'];?></td>
</div>
</div>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="col-sm-5 col-form-label col-form-label-sm"><b>Address:</b></label></td>
<td><?php echo $row['contact_person_address'];?></td>
</div>
</div>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="col-sm-5 col-form-label col-form-label-sm"><b>Mobile Number:</b></label></td>
<td><?php echo $row['contact_person_number'];?></td>
</div>
</div>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="col-sm-5 col-form-label col-form-label-sm"><b>Email:</b></label></td>
<td><?php echo $row['contact_person_email'];?></td>
</div>
</div>
<!-- ================== -->
<div class="form-group row" style="margin: -10px;">
<div class="col-sm-12 input-group-sm mb-3">
<td><label class="col-sm-5 col-form-label col-form-label-sm"><b>Work:</b></label></td>
<td><?php echo $row['contact_person_work'];?></td>
</div>
</div>
<!-- ============= -->

</div>
</div>

</div>
</div>

<br>

<br>
<br>
</form>



<a href="resignation.php" class="btn btn-primary">Resign</a>



</div>
<!--  -->
<!-- </div>
</div> -->
</div>





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

<script>
  function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var orginalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = orginalContents;
  }
</script>
<?php include_once('footer.php'); ?>

