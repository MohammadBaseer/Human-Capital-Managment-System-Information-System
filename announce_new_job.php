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
<li class="breadcrumb-item"><a href="javascript:">Job Announcement</a></li>
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
<!-- ========================================================== -->
<div class="table-responsive">
<table id="key-act-button" class="table table-hover" style="font-size: 0.8em;">
<thead>
<tr style="background-color: #fff; ">
<th>ID</th>
<th ">Job Title</th>
<th>Location</th>
<th>Nationality</th>
<th>Category</th>
<th>Employment Type</th>
<th>Salary</th>
<th>Vacancy Number</th>
<th>No.of Jobs</th>
<th>Experience</th>
<th>Gender</th>
<th>Education</th>
<th>Open Date</th>
<th>close Date</th>
<th>About Organization</th>
<th>Job Description</th>
<th>Job Requirements</th>
<th>Education Details</th>
<th>Skill</th>
<th>Languages</th>
<th>Submission Guideline</th>
<th>Submission Email</th>
<th>Vacancy Status</th>
<!-- <th>People View</th>
<th>submitted CV</th> -->
<th>Action</th>
</tr>
</thead>
<tbody> 
<?php 
$date = date("Y-m-d");

$sql = "SELECT * FROM job_t Where remark = 'publish' AND open_date <= '$date' AND close_date >='$date' ";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result))
{
?>
         
<tr>
<td><?php echo $row['job_id']; ?></td>
<td><?php echo $row['job_title']; ?></td>
<td><?php echo $row['location']; ?></td>
<td><?php echo $row['nationality']; ?></td>
<td><?php echo $row['category']; ?></td>
<td><?php echo $row['employment_type']; ?></td>
<td><?php echo $row['salary']; ?></td>
<td><?php echo $row['vacancy']; ?></td>
<td><?php echo $row['no_of_jobs']; ?></td>
<td><?php echo $row['experience']; ?></td>
<td><?php echo $row['gender']; ?></td>
<td nowrap="" style="width: 240px;text-align: justify;"><?php echo $row['education']; ?></td>
<td><?php echo $row['open_date']; ?></td>
<td><?php echo $row['close_date']; ?></td>
<td nowrap="" style="width: 240px;text-align: justify;"><div style="  width: 240px; overflow: hidden; text-overflow: ellipsis;  white-space: nowrap;"><?php echo $row['about_org']; ?></div></td>
<td nowrap="" style="width: 240px;text-align: justify;"><div style="  width: 240px; overflow: hidden; text-overflow: ellipsis;  white-space: nowrap;"><?php echo $row['job_description']; ?></div></td>
<td nowrap="" style="width: 240px;text-align: justify;"><div style="  width: 240px; overflow: hidden; text-overflow: ellipsis;  white-space: nowrap;"><?php echo $row['job_requirement']; ?></div></td>
<td nowrap="" style="width: 240px;text-align: justify;"><div style="  width: 240px; overflow: hidden; text-overflow: ellipsis;  white-space: nowrap;"><?php echo $row['education_details']; ?></div></td>
<td nowrap="" style="width: 240px;text-align: justify;"><div style="  width: 240px; overflow: hidden; text-overflow: ellipsis;  white-space: nowrap;"><?php echo $row['skill']; ?></div></td>
<td><?php echo $row['languages']; ?></td>
<td nowrap="" style="width: 240px;text-align: justify;"><div style="  width: 240px; overflow: hidden; text-overflow: ellipsis;  white-space: nowrap;"><?php echo $row['submission_guideline']; ?></div></td>
<td><?php echo $row['submission_email']; ?></td>
<td><?php echo $row['remark']; ?></td>
<!-- <td>20 Users</td>
<td>40 CV's</td> -->
<td>&nbsp; &nbsp;
<a href="controller/approval.php?job_unpublished=<?php echo $row['job_id'];?>" data-toggle="tooltip" title="Unpublished">
<i class="feather icon-x" aria-hidden="true"></i>
</a>&nbsp; &nbsp;
<a href="position_view.php?post_detail=<?php echo $row['job_id'];?>" data-toggle="tooltip" title="Details"> 
<i class="feather icon-file" aria-hidden="true"></i>
</a>
</td> 
</tr>
<?php } ?>

</tbody>
</table>
</div>

<!-- ========================================================== -->
<br>
<a href="post_submission.php" class="btn btn-primary" style="color: #fff; font-size: 0.8em;">Submit Post</a>
</div><br><br><br><br>
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


