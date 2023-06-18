<?php 
include_once('header.php');
?>
<div class="pcoded-main-container">
<?php
$error = "";
if (isset($_GET['create_user']))
{
$id = $_GET['create_user']; 
$sql =  "SELECT * FROM employees WHERE id='$id' ";
$result = mysqli_query($conn, $sql);
$row =  mysqli_fetch_assoc($result);
// ==============
if (isset($_POST['update']))  
{
$data = $_POST;
$user   = mysqli_real_escape_string($conn, $data['user']);
$password = mysqli_real_escape_string($conn, $data['password']);
$emp_type = mysqli_real_escape_string($conn, $data['emp_type']);
$trn_date = date("Y-m-d H:i:s");

if(empty($_POST["user"]) || empty($_POST["password"]) || empty($_POST["emp_type"]))  
{
$error = '<div class="alert alert-danger" style="padding-left: 4%;"><p>Field is empty*</p></div>'; 
}else {
$sql1 = " SELECT * FROM employees WHERE user='$user'";
$result1 = mysqli_query($conn, $sql1);
$count = mysqli_num_rows($result1);
if ($count > 0) {
$error = '<div class="alert alert-danger" style="padding-left: 4%;"><p>User Taken*</p></div>'; 
}else {
$sql = "UPDATE employees SET user ='$user', password = '" . SHA1($password) . "', role = '$emp_type', date_modify = '$trn_date' WHERE id= $id";
if($result2 = mysqli_query($conn, $sql))
{		
$error = '<div class="alert alert-success" style="padding-left: 4%;"><p>Success*</p></div>';
echo "<script>window.location='user_administration.php'</script>";

}
else{ $error =  "Error: " . $sql . "<br>" . mysqli_error($conn);}
}}
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
<h5 class="m-b-10">System Administration</h5>
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="home.php"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item"><a href="javascript:">Administration</a></li>
</ul>
</div>
</div>
</div>
</div>
<div class="main-body">
<div class="page-wrapper">

<div class="row">

<div class="col-xl-12 col-md-12">
<div class="card user-list">
<div class="card-header">
<h5>Create User Account</h5>
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
<?php echo $error;; ?>
<!-- ============================================================================================ -->
<form method="POST">
<div class="col-xl-8 col-md-8" style="margin: auto;">
<div class="form-group">
<label class="control-label">User*</label>
<input type="text" name="user" class="form-control" placeholder="Email Address">
</div>
</div>
<div class="col-xl-8 col-md-8" style="margin: auto">
<div class="form-group">
<label class="control-label">Password*</label>
<input type="password" name="password" placeholder="Password " class="form-control" >
</div>
</div>
<div class="col-xl-8 col-md-8" style="margin: auto;">
<div class="form-group">
<label class="control-label">Role*</label>
<select name="emp_type" title="Role" class="form-control">
<option value="">-- Select Role --</option>
<?php $result = mysqli_query($conn, "SELECT * FROM role");
while($role_row = mysqli_fetch_assoc($result)){ ?>
<option <?php if($row['role'] == $role_row['role']){ echo "selected";} ?> value="<?php echo $role_row['role']; ?>"><?php echo $role_row['role']; ?></option>


<?php } ?>
</select>
</div>
</div>
<div class="col-xl-7 col-md-7" style="margin: auto;">
<button type="submit" name="update" class="btn btn-primary">Create</button>
</div>
</form>
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


<?php include_once('footer.php'); ?>
