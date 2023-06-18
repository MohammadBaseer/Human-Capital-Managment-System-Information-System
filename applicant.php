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
<h5 class="m-b-10">E-Recuritment</h5>
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="home.php"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item"><a href="javascript:">Recuritment Managment</a></li>
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
<h5>Applicant</h5>
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
    <th>vacancy</th>
    <th>Job Title</th>
    <th>location</th>
    <th>Close Date</th>
    <th>Action</th>
  </tr>
</thead>
<tbody>
<?php 

$sql = "  SELECT * FROM job_t";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
?>
  <tr>
    <td><?php echo $row['job_id'];?></td>
    <td><?php echo $row['vacancy'];?></td>
    <td><?php echo $row['job_title'];?></td>
    <td><?php echo $row['location'];?></td>
    <td><?php echo $row['close_date'];?></td>
<td>   
<a class="text-white label theme-bg f-12" href="submited_cv.php?vacid=<?php echo $row['job_id'];?>" data-type="inverse" data-animation-in="animated rotateIn" data-animation-out="animated rotateOut">View </a>
<!-- <a class="text-white label theme-bg f-12" href="submited_cv.php?vacid=<?php // echo $row['job_id'];?>" data-type="inverse" data-animation-in="animated rotateIn" data-animation-out="animated rotateOut">Selected</a>
<a class="text-white label theme-bg f-12" href="emp_edit.php?empedit=<?php //echo $row['id'];?>" data-type="inverse" data-animation-in="animated rotateIn" data-animation-out="animated rotateOut">Rejected</a> -->
</td>
  </tr>
<?php } ?>
</tbody>

</table>
<br><br>
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


