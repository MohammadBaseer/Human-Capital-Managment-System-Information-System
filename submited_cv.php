<?php 
include_once('header.php');
?>
<div class="pcoded-main-container">

<?php
if (isset($_GET['vacid']))
{
  $id = $_GET['vacid']; 
 // echo $id;
$sql = "  SELECT *, b.* FROM cv_submission a, job_t b WHERE a.vac_id = b.job_id AND job_id = '$id' ";
$result = mysqli_query($conn, $sql);
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
<li class="breadcrumb-item"><a href="javascript:">Recuritment Managment / Applicant</a></li>
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
<h5>Applicant Information</h5>
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
<div class="table-responsive">
<table class="table table-hover" id="key-act-button" style="font-size: 0.8em;">
<thead>
  <tr>
    <th>ID</th>
    <th>Full Name</th>
    <th>Country</th>
    <th>City</th>
    <th>Phone Number</th>
    <th>Email</th>
    <th>Vacancy Number</th>
    <th>Job Title</th>
    <th>Catagory</th>
    <th>Open Date</th>
    <th>Close Date</th>
    <th>Cover</th>
    <th>Resume</th>
  </tr>
</thead>
<tbody>
<?php 

// $sql = "  SELECT *, b.* FROM cv_submission a, job_t b WHERE a.job_id = b.job_id";
// $result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
?>
  <tr>
    <td><?php echo $row['cv_id'];?></td>
    <td><?php echo $row['first_name'].' '.$row['last_name'];?></td>
    <td><?php echo $row['country'];?></td>
    <td><?php echo $row['city'];?></td>
    <td><?php echo $row['area_code'].' '.$row['phone_number'];?></td>
    <td><?php echo $row['email'];?></td>
    <td><?php echo $row['vacancy'];?></td>
    <td><?php echo $row['job_title'];?></td>
    <td><?php echo $row['category'];?></td>
    <td><?php echo $row['open_date'];?></td>
    <td><?php echo $row['close_date'];?></td>
    <td nowrap="" style="width: 240px;text-align: justify;"><div style="  width: 240px; overflow: hidden; text-overflow: ellipsis;  white-space: nowrap;"><?php echo $row['cover_letter'];?></div></td>
    <td><a href="website\resumes\<?php echo $row['resume'];?>"><?php echo $row['resume'];?></a></td>
  </tr>
<?php } ?>
</tbody>


</table><br>
</div><br><br><br><br><br>

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


