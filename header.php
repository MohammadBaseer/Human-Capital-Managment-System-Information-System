<?php 
include_once('controller/connection.php');
 session_start();

   $user_check = $_SESSION['login_user'];

   //$ses_sql = mysqli_query($conn,"select * from employees where users = '$user_check' ");
   $ses_sql = mysqli_query($conn, "SELECT *, b.department FROM employees a,department b WHERE a.department_id = b.departmentid AND user = '$user_check'");
   $auth = mysqli_fetch_array($ses_sql);

   $login_session = $auth['user'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
   }

 ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html.codedthemes.com/datta-able/bootstrap/Home/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Dec 2018 07:21:12 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<title>HC-MIS</title>


<!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
<!-- <meta http-equiv="refresh" content="10"> -->

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="Datta Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
<meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template">
<meta name="author" content="Codedthemes" />
<!--  -->


<!--  -->
<link rel="icon" href="http://html.codedthemes.com/datta-able/bootstrap/assets/images/favicon.ico" type="image/x-icon">

<link rel="stylesheet" href="assets/fonts/fontawesome/css/fontawesome-all.min.css">
<link rel="stylesheet" href="assets/plugins/animation/css/animate.min.css">
<link rel="stylesheet" href="assets/plugins/modal-window-effects/css/md-modal.css">

<link rel="stylesheet" href="assets/plugins/animation/css/animate.min.css">

<link rel="stylesheet" href="assets/plugins/notification/css/notification.min.css">

<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/feather-font-master/src/css/iconfont.css">
<link rel="stylesheet" href="assets/plugins/data-tables/css/datatables.min.css">
<style>
/*jquery table export is display non*/
   .dt-buttons
   {
      display: none;
   }

@media print{
.not_print{
   display: none;
}
}
.style-block .prelayout-color, .f-12{
   display:none;
}
</style>
</head>

<body onunoad="rdir()">

<script>
   function redir()
   {
      Alert("closed");
      // window.location="http://localhost:9090/Baseer/bootstrap/default/controller/unset_session.php";
   }

</script>
<script type="text/javascript">
setInterval(function(){
$('#badge').load(' #badge');
$('#getdataa').load(' #getdataa');
// $('#ppp').load(' #ppp');
},2000);

</script>
<?php 
if ($auth['status'] == 'Resigned'){
echo "<script>window.location='controller/logout.php';</script>";
}
else
{
 ?>

<div class="loader-bg">
<div class="loader-track">
<div class="loader-fill"></div>
</div>
</div>


<nav class="pcoded-navbar">
<div class="navbar-wrapper">
<div class="navbar-brand header-logo">
<a href="home.php" class="b-brand">
<div class="b-bg">
<i class="feather icon-trending-up"></i>
</div>
<span class="b-title">HC-MIS</span>
</a>
<a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
</div>

<div class="navbar-content scroll-div">
<!-- ============================================ -->
<?php } ?>
<!-- ============================================ -->


   <!-- start -->
<?php 
// admin $ HR-Manager
if ($auth['role'] == 'HR-Manager' ) {
?>

<ul class="nav pcoded-inner-navbar">

<li class="nav-item pcoded-menu-caption">
<label>Dashboard</label>
</li>
<li data-username="Vertical Horizontal Box Layout RTL fixed static collapse menu color icon dark" class="nav-item pcoded-hasmenu">
<a href="javascript:" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
<ul class="pcoded-submenu">
<li class=""><a href="home.php" class="">Home</a></li>
<li class=""><a href="profile.php?profile=<?php echo $auth['id'];?>" class="">My Profile</a></li>
</ul>
</li>

<li data-username="Vertical Horizontal Box Layout RTL fixed static collapse menu color icon dark" class="nav-item pcoded-hasmenu">
<a href="javascript:" class="nav-link"><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Employees Section</span></a>
<ul class="pcoded-submenu">
<li class=""><a href="veiw_employees.php" class="">Manage Employees</a></li>
<li class=""><a href="emp_table_view.php" class="">Employee Table View</a></li>
<li class="pcoded-hasmenu"><a href="javascript:" class="">Tables</a>
<ul class="pcoded-submenu">
<li class=""><a href="department_table.php">Department Table</a></li>
<li class=""><a href="position_table.php">Position Table</a></li>
<li class=""><a href="degree_table.php">Degree</a></li>
<li class=""><a href="study_table.php">Field of Study Table</a></li>
</ul>
</li>
</ul>
</li>

<li class="nav-item pcoded-menu-caption">
<label>E-Leave System</label>
</li>
<li data-username="Vertical Horizontal Box Layout RTL fixed static Collapse menu color icon dark" class="nav-item pcoded-hasmenu">
<a href="javascript:" class="nav-link"><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Leave Management</span></a>
<ul class="pcoded-submenu">
<li class=""><a href="manage_leave.php" class="">Manage Leave</a></li>
<li class=""><a href="my_department_leaves.php" class="">My Team Approval</a></li>
<li class=""><a href="hr_leave_approval.php" class="">HR Approval</a></li>
<li class=""><a href="my_department_approved_leaves.php" class="">Team Approved Leaves</a></li>
</ul>
</li>
<li class="nav-item pcoded-menu-caption">
<label>E-Recuritment</label>
</li>
<li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
<a href="javascript:" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Recuritment Management</span></a>
<ul class="pcoded-submenu">
<li class="pcoded-hasmenu"><a href="javascript:" class="">Job Announcement</a>
<ul class="pcoded-submenu">
<li class=""><a href="announce_new_job.php" class="">Announce New Job</a></li>
<li class=""><a href="closed_vacancy.php">Closed Vacancy</a></li>
</ul>
<li class=""><a href="applicant.php">Applicant</a></li>

</li>
</ul>
</li>
<!-- Documents -->

<li class="nav-item pcoded-menu-caption">
<label>Staff Documents</label>
</li>
<li data-username="Vertical Horizontal Box Layout RTL fixed static collapse menu color icon dark" class="nav-item pcoded-hasmenu">
<a href="javascript:" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file"></i></span><span class="pcoded-mtext">All Documents</span></a>
<ul class="pcoded-submenu">
<li class=""><a href="Documents.php" class="">All Staff Documents</a></li>
</ul>
</li>
<!--  -->
<li class="nav-item pcoded-menu-caption">
<label>System Administration</label>
</li>
<li data-username="advance components Alert gridstack lightbox modal notification pnotify rating rangeslider slider syntax highlighter Tour Tree view Nestable Toolbar" class="nav-item pcoded-hasmenu">
<a href="javascript:" class="nav-link"><span class="pcoded-micon"><i class="feather icon-settings"></i></span><span class="pcoded-mtext">Administrator</span></a>
<ul class="pcoded-submenu">
<li class=""><a href="user_administration.php" class="">User Administration</a></li>   
<li class=""><a href="account_administration.php" class="">Account Administration</a></li> 
<li class=""><a href="setting.php" class="">Settings</a></li>   
</ul>
</li>


</ul> 

<?php

}
// dep manager
elseif ($auth['role'] == 'Team-Manager') {
?>

<ul class="nav pcoded-inner-navbar">

<li class="nav-item pcoded-menu-caption">
<label>Dashboard</label>
</li>
<li data-username="Vertical Horizontal Box Layout RTL fixed static collapse menu color icon dark" class="nav-item pcoded-hasmenu">
<a href="javascript:" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
<ul class="pcoded-submenu">
<li class=""><a href="home.php" class="">Home</a></li>
<li class=""><a href="profile.php?profile=<?php echo $auth['id'];?>" class="">My Profile</a></li>
</ul>
</li>
<li class="nav-item pcoded-menu-caption">
<label>E-Leave System</label>
</li>
<li data-username="Vertical Horizontal Box Layout RTL fixed static Collapse menu color icon dark" class="nav-item pcoded-hasmenu">
<a href="javascript:" class="nav-link"><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Leave Management</span></a>
<ul class="pcoded-submenu">
<li class=""><a href="manage_leave.php" class="">Manage Leave</a></li>
<li class=""><a href="my_department_leaves.php" class="">My Team Approval</a></li>
<li class=""><a href="my_department_approved_leaves.php" class="">Team Approved Leaves</a></li>
</ul>
</li>
<!-- Documents -->

<li class="nav-item pcoded-menu-caption">
<label>My Staff Documents</label>
</li>
<li data-username="Vertical Horizontal Box Layout RTL fixed static collapse menu color icon dark" class="nav-item pcoded-hasmenu">
<a href="javascript:" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file"></i></span><span class="pcoded-mtext">All Documents</span></a>
<ul class="pcoded-submenu">
<li class=""><a href="Documents.php" class=""><?php echo $auth['department'].' Section Documents' ; ?></a></li>
</ul>
</li>
<!--  -->
</ul> 

<?php

}

 // employee
elseif ($auth['role'] == 'Employee'){
?>

<ul class="nav pcoded-inner-navbar">

<li class="nav-item pcoded-menu-caption">
<label>Dashboard</label>
</li>
<li data-username="Vertical Horizontal Box Layout RTL fixed static collapse menu color icon dark" class="nav-item pcoded-hasmenu">
<a href="javascript:" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
<ul class="pcoded-submenu">
<li class=""><a href="home.php" class="">Home</a></li>
<li class=""><a href="profile.php?profile=<?php echo $auth['id'];?>" class="">My Profile</a></li>
</ul>
</li>
<li class="nav-item pcoded-menu-caption">
<label>E-Leave System</label>
</li>
<li data-username="Vertical Horizontal Box Layout RTL fixed static Collapse menu color icon dark" class="nav-item pcoded-hasmenu">
<a href="javascript:" class="nav-link"><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Leave Management</span></a>
<ul class="pcoded-submenu">
<li class=""><a href="manage_leave.php" class="">Manage Leave</a></li>
</ul>
</li>

</ul> 

<?php

}

 // non
else{
?>

<ul class="nav pcoded-inner-navbar">

<li class="nav-item pcoded-menu-caption">
<label>Dashboard</label>
</li>
<li data-username="Vertical Horizontal Box Layout RTL fixed static collapse menu color icon dark" class="nav-item pcoded-hasmenu">
<a href="javascript:" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
<ul class="pcoded-submenu">
<li class=""><a href="home.php" class="">Home</a></li>
<li class=""><a href="profile.php?profile=<?php echo $auth['id'];?>" class="">My Profile</a></li>
</ul>
</li>
</ul> 

<?php

}


 ?>



































































<!-- end -->


</div>
</div>
</nav>
<!-- bar side ends -->
<!-- start main header -->
<header class="navbar pcoded-header navbar-expand-lg navbar-light">
<div class="m-header">
<a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
<a href="home.php" class="b-brand">
<div class="b-bg">
<i class="feather icon-trending-up"></i>
</div>
<span class="b-title">HCMIS</span>
</a>
</div>
<a class="mobile-menu" id="mobile-header" href="javascript:">
<i class="feather icon-more-horizontal"></i>
</a>
<div class="collapse navbar-collapse">
<ul class="navbar-nav mr-auto">
<li><a href="javascript:" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a></li>

</ul>





<!-- for maintenance -->
<ul class="navbar-nav ml-auto">
   <!--  -->

<?php
// dep manager
if ($auth['role'] == 'HR-Manager') {
?>
   <!--  -->
<li>
<div class="dropdown" style="display: none;">
<a class="dropdown-toggle" href="javascript:" data-toggle="dropdown"><i class="icon feather icon-bell">
<i id="badge">
   <?php 
$sql = "SELECT * FROM leave_forms as l INNER JOIN employees as e on l.employee_id = e.id  INNER JOIN department AS d ON e.department_id = d.departmentid WHERE manager_sign= 'approved' AND hr_sign = '' OR (role = 'Team-Manager') ";
$result = mysqli_query($conn, $sql);
$rowcount = mysqli_num_rows($result);
   if ($rowcount == 0) {

   } 
   else
   {
?>
 <?php echo '<span class="badge badge-danger">'?> <?php echo $rowcount; ?> <?php echo '</span>'; }?>

  </i> </i></a>

<script type="text/javascript">

</script>

<div class="dropdown-menu dropdown-menu-right notification">
<div class="noti-head">
<h6 class="d-inline-block m-b-0">Notifications</h6>

</div>
<ul class="noti-body" id="getdataa">

<?php 
// $sql = "SELECT * FROM leave_forms as l INNER JOIN employees as e on l.employee_id = e.id  INNER JOIN department AS d ON e.department_id = d.departmentid WHERE manager_sign= 'approved' AND hr_sign = '' ";
$sql = "SELECT * FROM leave_forms as l INNER JOIN employees as e on l.employee_id = e.id  INNER JOIN department AS d ON e.department_id = d.departmentid WHERE manager_sign= 'approved' AND hr_sign = '' OR (role = 'Team-Manager') ";
$result = mysqli_query($conn, $sql);
$rowcount = mysqli_num_rows($result);
while ($row = mysqli_fetch_assoc($result)) {
?>
<a href="leave_veiw.php?hr_approved=<?php echo $row['leave_id'];?>">
<li class="notification">
<div class="media">
<img class="rounded-circle" style="width:50px; height: 50px;" src="profile_img/<?php echo $row['profile_img'];?>" alt="activity-user">
<div class="media-body">
<p><strong><?php echo $row['full_name']; ?></strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i><?php echo $row['submit_date']; ?></span></p>
<p>From : <i style="color: red;"><?php echo $row['from_date']; ?></i> To : <i style="color: red;"><?php echo $row['to_date']; ?></i></p>
<p> 
    <?php echo $row['leave_type']; ?> Leave --
    <?php echo date_diff(date_create($row['from_date']),date_create($row['to_date']))->format('%d days'); ?>

</p>
</div>
</div>
</li>
</a>
<?php 
}

 ?>

</ul> 


<script type="text/javascript">


</script>


</div>
</div>
</li>


<!--  -->
<?php } 
elseif ($auth['role'] == 'Team-Manager') {
?>
  


<li>
<div class="dropdown" style="display: none;">
<a class="dropdown-toggle" href="javascript:" data-toggle="dropdown"><i class="icon feather icon-bell">
   <i id="badge">
   <?php 
$mngr = $auth['full_name'];
$sql = "SELECT * FROM leave_forms as l INNER JOIN employees as e on l.employee_id = e.id  INNER JOIN department AS d ON e.department_id = d.departmentid WHERE manager= '$mngr' AND manager_sign= ''  ";
$result = mysqli_query($conn, $sql);
$rowcount = mysqli_num_rows($result);
if ($rowcount == 0) {

   } 
   else
   {
?>
 <?php echo '<span class="badge badge-danger">'?> <?php echo $rowcount; ?> <?php echo '</span>'; }?>


   </i></i>
</a>

<div class="dropdown-menu dropdown-menu-right notification">
<div class="noti-head">
<h6 class="d-inline-block m-b-0">Notifications</h6>

</div>
<ul class="noti-body" id="getdataa">
<?php 

while ($row = mysqli_fetch_assoc($result)) {
?>
<a href="leave_veiw.php?manager_approved=<?php echo $row['leave_id'];?>">
<li class="notification">
<div class="media">

<img class="rounded-circle" style="width:50px; height: 50px;" src="profile_img/<?php echo $row['profile_img'];?>" alt="activity-user">
<div class="media-body">
<p><strong><?php echo $row['full_name']; ?></strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i><?php echo $row['submit_date']; ?></span></p>
<p>From : <i style="color: red;"><?php echo $row['from_date']; ?></i> To : <i style="color: red;"><?php echo $row['to_date']; ?></i></p>
<p>
    <?php echo $row['leave_type']; ?> Leave --
    <?php echo date_diff(date_create($row['from_date']),date_create($row['to_date']))->format('%d days'); ?>

</p>
</div>
</div>
</li>
</a>
<?php 
}
 ?>

</ul> 



</div>
</div>
</li>




<?php 
}
?>
<!-- 
 -->





<!-- <li><a href="javascript:" class="displayChatbox"><i class="icon feather icon-mail"></i></a></li> -->
<li>
<div class="dropdown drp-user">
<a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">
<i class="icon feather icon-settings"></i>
</a>
<div class="dropdown-menu dropdown-menu-right profile-notification">
<div class="pro-head">
<img class="img-radius" src="profile_img/<?php echo $auth['profile_img'];?>" alt="activity-user">
<span><?php echo $auth['full_name'];?></span>
<a href="controller/logout.php" class="dud-logout" title="Logout">
<i class="feather icon-log-out"></i>
</a>
</div> 
<ul class="pro-body">
<li><a href="setting.php" class="dropdown-item"><i class="feather icon-settings"></i> Settings</a></li>
<li><a href="profile.php?profile=<?php echo $auth['id'];?>" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
<!-- <li><a href="message.html" class="dropdown-item"><i class="feather icon-mail"></i> My Messages</a></li> -->
<li><a href="controller/logout.php" class="dropdown-item"><i class="feather icon-lock"></i> Logout</a></li>
</ul>
</div>
</div>
</li>
</ul>
<!-- ------------------------------------- -->






</div>
</header>