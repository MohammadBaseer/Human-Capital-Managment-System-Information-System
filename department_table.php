<?php 
include_once('header.php');
include_once('controller/href_controller.php');

// ==================Department

if (isset($_POST['submit_department'])) {  
$data = $_POST;
$department   = $data ['department'];
if(empty($_POST["department"]))  
  {
    $error = '<div class="alert alert-warning" style="padding-left: 4%;"><p>Empty*</p></div>';
}

else {
  $sql = " SELECT * FROM department WHERE department='$department'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
      $error = '<div class="alert alert-success" style="padding-left: 4%;"><p>Input allready into database*</p></div>';
    }
else {

$sql = "INSERT INTO department (department) VALUES (?);";
 $stmt = mysqli_prepare($conn, $sql);
if ($stmt) {
  mysqli_stmt_bind_param($stmt, 's',$department);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
$error = '<div class="alert alert-success" style="padding-left: 4%;"><p>New record added successfuly*</p></div>'; 
}
else {
$error = '<div class="alert alert-danger" style="padding-left: 4%;"><p>Query error*</p></div>';
}

}}}
//===================/department

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
<h5 class="m-b-10">Employees Section</h5>
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="home.php"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item"><a href="javascript:">Tables</a></li>
</ul>
</div>
</div>
</div>
</div>
<div class="main-body">
<div class="page-wrapper">

<div class="row">
<!-- =========Department===== -->

<div class="col-xl-12 col-md-12">
<div class="card user-list">
<div class="card-header">
<h5>Department Table</h5>
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
<form method="POST">
<div class="vali-form-group" >
 <?php echo @$error; ?>
<div class="control-label">
<div class="input-group">             
<input type="text" name="department" value="<?php echo @$row['department']; ?>" placeholder="Department Name" class="form-control" style=" height: 35px; float: right;">
</div>
</div>
<div class="clearfix"> </div>
</div><br><br>
<div class="col-md-12 form-group">
<button type="submit" name="submit_department" class="btn btn-primary" >Add</button>
<button type="submit" name="update" class="btn btn-primary" >Edit</button>
<button type="reset" class="btn btn-default">Reset</button>
</div>
 </form>
</div>
<div class="col-xl-12 col-md-12">
<div class="col-xl-8 col-md-8" style="margin: auto;">             
<table id="col-reorder" class="table table-hover" style="font-size: 0.8em;">
<thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>       
                  <?php 
                  $sql = " SELECT * FROM department";
                  $result = mysqli_query($conn, $sql);
                  while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                      <td><?php echo $row['departmentid']; ?></td>
                      <td><?php echo $row['department']; ?></td>
                      <td><a href="?departmentedit=<?php echo $row['departmentid'];?>" data-toggle="tooltip" title="Edit">
                        <i class="feather icon-edit-1" aria-hidden="true"></i>
                      </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <a  href="controller/href_controller.php?departmentdelete=<?php echo $row['departmentid'];?>" onclick="return confirm('Are you sure..?')" data-toggle="tooltip" title="Delete">
                        <i class="feather icon-trash-2" aria-hidden="true"></i>
                      </a>
                   <?php }  ?>
              </tbody>
</table>
</div>
<br><br>
</div>
</div>
</div>
<!-- =========/Department===== -->

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


