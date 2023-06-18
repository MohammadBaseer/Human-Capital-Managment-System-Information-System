

<?php
include_once('controller/connection.php');


$error = '';
session_start();
// ================
if (isset($_SESSION['login_user'])) {
  $auth = $_SESSION['login_user'];
  header("location:home.php");
}
// ==============
// If form submitted, insert values into the database.
if (isset($_POST['post'])){
        // removes backslashes
   $username = stripslashes($_REQUEST['user']);
        //escapes special characters in a string
   $username = mysqli_real_escape_string($conn,$username);
   $password = stripslashes($_REQUEST['password']);
   $password = mysqli_real_escape_string($conn,$password);

 $query = "SELECT * FROM `employees` WHERE user='$username'
and password='" . SHA1($password)."' ";
   $result = mysqli_query($conn,$query) or die(mysql_error());
   $row = mysqli_fetch_assoc($result);
   $count = mysqli_num_rows($result);
if (@empty($username) || empty($password)) {
  $error = '<b>Enter user and password*</b>';
} 
// elseif ($row['user'] ==! $username || $row['password'] ==! $password) {
//   $error = '<b>Please enter correct user/password*</b>';
// }

elseif (@$username ==! $row['user'] || $password ==! $row['password']) {
  $error = '<b>Please enter correct user/password*</b>';

}


elseif (@$row['status'] == 'Resigned') {
  $error = '<b>You Are Resigned:</b><br>Please contact to HR-Department.';
}
elseif (@$row['acc_status'] == 'disable') {
  $error = '<b>Account Disable:</b><br>Please contact to HR-Department.';
}
        elseif($count==1){
       $_SESSION['login_user'] = $username;
            // Redirect user to index.php
       header("Location: home.php");
         }else{
$error = '<b>query error*</b>';
   }
    }
   //else{
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html.codedthemes.com/datta-able/bootstrap/default/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Dec 2018 07:26:20 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<title>HCMIS Signin</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="Datta Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
<meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template">
<meta name="author" content="Codedthemes" />

<link rel="icon" href="http://html.codedthemes.com/datta-able/bootstrap/assets/images/favicon.ico" type="image/x-icon">

<link rel="stylesheet" href="assets/fonts/fontawesome/css/fontawesome-all.min.css">
<link rel="stylesheet" href="assets/feather-font-master/src/css/iconfont.css">
<link rel="stylesheet" href="assets/plugins/animation/css/animate.min.css">

<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="auth-wrapper">
<div class="auth-content">
<div class="auth-bg">
<span class="r"></span>
<span class="r s"></span>
<span class="r s"></span>
<span class="r"></span>
</div>
<div class="card">
<div class="card-body text-center">
<div class="mb-4">
<i class="feather icon-unlock auth-icon"></i>
</div>
<h3 class="mb-4">Login</h3>
<form method="POST">
<div class="input-group mb-3">
<input type="text" name="user" class="form-control" placeholder="Email">
</div>
<div class="input-group mb-4">
<input type="password" name="password" class="form-control" placeholder="password">
</div>
<div class="form-group text-left">
   <p class="mb-0 text-muted"><?php echo $error; ?></p> 
<div class="checkbox checkbox-fill d-inline">
<!-- <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked=""> -->
<!-- <label for="checkbox-fill-a1" class="cr"> Save Details</label> -->
</div>
</div>
<button class="btn btn-primary shadow-2 mb-4" name="post">Login</button>
<!-- <p class="mb-2 text-muted">Forgot password? <a href="auth-reset-password.html">Reset</a></p>
<p class="mb-0 text-muted">Don’t have an account? <a href="auth-signup.html">Signup</a></p> -->
<p class="mb-0 text-muted"><?php //echo $error; ?></p> 
</form>
</div>
</div>
</div>
</div>

<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/pcoded.min.js"></script>
</body>


</html>
<?php //} ?>