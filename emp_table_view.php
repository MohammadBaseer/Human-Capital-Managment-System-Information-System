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
<h5 class="m-b-10">Employee Section</h5>
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="home.php"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item"><a href="javascript:">Employee Table View</a></li>
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
<!--  -->
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Current Staff</a>
</li>
<!--  -->
<li class="nav-item">
<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Resigned Staff</a>
</li>
</ul> 
<!--  -->

<div class="card-block pb-0">
<div class="table-responsive">
  <!--Model Add Employee button -->

  <!-- end -->
<div class="tab-content" id="pills-tabContent">
<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
<a href="submit.php" class="btn btn-primary" style="color: #fff; font-size: 0.8em;">Add Employee</a>

<table class="table table-hover" id="key-act-button" style="font-size: 0.8em;">
<thead>
  <tr>
    <th>Image</th>
    <th>ID</th>
    <th>Contract ID</th>
    <th>Name</th>
    <th>Father Name</th>
    <th>NIC</th>
    <th>Gender</th>
    <th>Marital Satute</th>
    <th>DoB</th>
    <th>Present Address</th>
    <th>Permanent Address</th>
    <th>Country</th>
    <th>Province</th>
    <th>Position</th>
    <th>Department</th>
<!--     <th>NTA Scale</th> -->   
    <th>Salary</th>
    <th>Degree</th>
    <th>Field of Study</th>
    <th>Experience</th>
    <th>Phone Number</th>
    <th>Personal Email</th>
    <th>Official Email</th>
    <th>Join Date</th>
    <th>Expire Date</th>
    <th>Contact Person</th>
    <th>Relationship</th>
    <th>Address</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Work</th>
    <!-- <th>Contract Scan</th>
    <th>Info File Scan</th>
    <th>Letter Scan</th>
    <th>Interview file Scan</th> -->
   <!--  <th>User</th>
    <th>Password</th> -->
    <th>Role</th>
    <th>Date</th>
    <th>Last Modify</th>
    <th>Action</th>
  </tr>
</thead>
<tbody>
<?php 
$sql = "  SELECT a.*, b.department FROM employees a,department b WHERE a.department_id = b.departmentid AND (status ='enable' || status ='disable' || status ='')";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
?>
  <tr>
    <td><img class="rounded-circle" style="width:50px; height: 50px;" src="profile_img/<?php echo $row['profile_img'];?>" alt="activity-user"></td>
    <td><?php echo $row['id'];?></td>
    <td><?php echo $row['emp_contract_id'];?></td>
    <td><?php echo $row['full_name'];?></td>
    <td><?php echo $row['father_name'];?></td>
    <td><?php echo $row['nic'];?></td>
    <td><?php echo $row['gender'];?></td>
    <td><?php echo $row['marital'];?></td>
    <td><?php echo $row['birthday'];?></td>
    <td><?php echo $row['present_address'];?></td>
    <td><?php echo $row['permanent_address'];?></td>
    <td><?php echo $row['country'];?></td>
    <td><?php echo $row['province'];?></td>
    <td><?php echo $row['position'];?></td>
    <td><?php echo $row['department'];?></td>
    <!-- <td><?php //echo $row['nta'];?></td> -->
    <td><?php echo $row['salary'];?></td>
    <td><?php echo $row['degree'];?></td>
    <td><?php echo $row['feild_of_study'];?></td>
    <td><?php echo $row['experience'];?></td>
    <td><?php echo $row['mobile_number'];?></td>
    <td><?php echo $row['personal_email'];?></td>
    <td><?php echo $row['official_email'];?></td>
    <td><?php echo $row['join_date'];?></td>
    <td><?php echo $row['expire_date'];?></td>
    <td><?php echo $row['contact_person_name'];?></td>
    <td><?php echo $row['contact_person_relationship'];?></td>
    <td><?php echo $row['contact_person_address'];?></td>
    <td><?php echo $row['contact_person_number'];?></td>
    <td><?php echo $row['contact_person_email'];?></td>
    <td><?php echo $row['contact_person_work'];?></td>
    <!-- <td><?php //echo $row['contractscan'];?></td>
    <td><?php //echo $row['infofilescan'];?></td>
    <td><?php //echo $row['letterscan'];?></td>
    <td><?php //echo $row['interviewscan'];?></td> -->
   <!--  <td><?php //echo $row['user'];?></td>
    <td><?php //echo $row['password'];?></td> -->
    <td><?php echo $row['role'];?></td>
    <td><?php echo $row['date'];?></td>
    <td><?php echo $row['date_modify'];?></td>
<td style="text-align: center;">
<a class="text-white label theme-bg f-12" href="user_leave.php?userleave=<?php echo $row['id'];?>" data-type="inverse" data-animation-in="animated rotateIn" data-animation-out="animated rotateOut">Leaves</a>
<a class="text-white label theme-bg f-12" href="emp_details_view.php?empview=<?php echo $row['id'];?>" data-type="inverse" data-animation-in="animated rotateIn" data-animation-out="animated rotateOut">Veiw</a>
<a class="text-white label theme-bg f-12" href="emp_edit.php?empedit=<?php echo $row['id'];?>" data-type="inverse" data-animation-in="animated rotateIn" data-animation-out="animated rotateOut">Edit</a>
<!-- <a class="label theme-bg2 f-12 text-white" href="controller/href_controller.php?tblempresigned=<?php //echo $row['id'];?>" onclick="return confirm('Are you sure..?')">Resign</a> -->
</td>
  </tr>
<?php } ?>
</tbody>


</table>

</div>



<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
<table class="table table-hover" id="zero-configuration" style="font-size: 0.8em;">
<thead>
  <tr>
    <th>Image</th>
    <th>ID</th>
    <th>Contract ID</th>
    <th>Name</th>
    <th>Father Name</th>
    <th>NIC</th>
    <th>Gender</th>
    <th>Marital Satute</th>
    <th>DoB</th>
    <th>Present Address</th>
    <th>Permanent Address</th>
    <th>Country</th>
    <th>Province</th>
    <th>Position</th>
    <th>Department</th>
<!--     <th>NTA Scale</th> -->   
    <th>Salary</th>
    <th>Degree</th>
    <th>Field of Study</th>
    <th>Experience</th>
    <th>Phone Number</th>
    <th>Personal Email</th>
    <th>Official Email</th>
    <th>Join Date</th>
    <th>Expire Date</th>
    <th>Contact Person</th>
    <th>Relationship</th>
    <th>Address</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Work</th>
    <!-- <th>Contract Scan</th>
    <th>Info File Scan</th>
    <th>Letter Scan</th>
    <th>Interview file Scan</th> -->
   <!--  <th>User</th>
    <th>Password</th> -->
    <th>Role</th>
    <th>Date</th>
    <th>Last Modify</th>
    <th>Action</th>
  </tr>
</thead>
<tbody>
<?php 
$sql = "  SELECT a.*, b.department FROM employees a,department b WHERE a.department_id = b.departmentid AND status ='Resigned' ";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
?>
  <tr>
    <td><img class="rounded-circle" style="width:50px; height: 50px;" src="profile_img/<?php echo $row['profile_img'];?>" alt="activity-user"></td>
    <td><?php echo $row['id'];?></td>
    <td><?php echo $row['emp_contract_id'];?></td>
    <td><?php echo $row['full_name'];?></td>
    <td><?php echo $row['father_name'];?></td>
    <td><?php echo $row['nic'];?></td>
    <td><?php echo $row['gender'];?></td>
    <td><?php echo $row['marital'];?></td>
    <td><?php echo $row['birthday'];?></td>
    <td><?php echo $row['present_address'];?></td>
    <td><?php echo $row['permanent_address'];?></td>
    <td><?php echo $row['country'];?></td>
    <td><?php echo $row['province'];?></td>
    <td><?php echo $row['position'];?></td>
    <td><?php echo $row['department'];?></td>
    <!-- <td><?php //echo $row['nta'];?></td> -->
    <td><?php echo $row['salary'];?></td>
    <td><?php echo $row['degree'];?></td>
    <td><?php echo $row['feild_of_study'];?></td>
    <td><?php echo $row['experience'];?></td>
    <td><?php echo $row['mobile_number'];?></td>
    <td><?php echo $row['personal_email'];?></td>
    <td><?php echo $row['official_email'];?></td>
    <td><?php echo $row['join_date'];?></td>
    <td><?php echo $row['expire_date'];?></td>
    <td><?php echo $row['contact_person_name'];?></td>
    <td><?php echo $row['contact_person_relationship'];?></td>
    <td><?php echo $row['contact_person_address'];?></td>
    <td><?php echo $row['contact_person_number'];?></td>
    <td><?php echo $row['contact_person_email'];?></td>
    <td><?php echo $row['contact_person_work'];?></td>
    <!-- <td><?php //echo $row['contractscan'];?></td>
    <td><?php //echo $row['infofilescan'];?></td>
    <td><?php //echo $row['letterscan'];?></td>
    <td><?php //echo $row['interviewscan'];?></td> -->
   <!--  <td><?php //echo $row['user'];?></td>
    <td><?php //echo $row['password'];?></td> -->
    <td><?php echo $row['role'];?></td>
    <td><?php echo $row['date'];?></td>
    <td><?php echo $row['date_modify'];?></td>
<td style="text-align: center;">
<a class="text-white label theme-bg f-12" href="user_leave.php?userleave=<?php echo $row['id'];?>" data-type="inverse" data-animation-in="animated rotateIn" data-animation-out="animated rotateOut">Leaves</a>
<a class="text-white label theme-bg f-12" href="emp_details_view.php?empview=<?php echo $row['id'];?>" data-type="inverse" data-animation-in="animated rotateIn" data-animation-out="animated rotateOut">Veiw</a>
<a class="text-white label theme-bg f-12" href="emp_edit.php?empedit=<?php echo $row['id'];?>" data-type="inverse" data-animation-in="animated rotateIn" data-animation-out="animated rotateOut">Edit</a>
</td>
  </tr>
<?php } ?>
</tbody>


</table>
</div>

</div>
<!--  -->


<br>
</div><br><br><br><br><br>
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

<?php 
include_once('footer.php');
 ?>


