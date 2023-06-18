<?php 
include_once('connection.php');

@$manager_approved = $_REQUEST['manager_approved'];
@$manager_rejected = $_REQUEST['manager_rejected'];
@$hr_approved = $_REQUEST['hr_approved'];
@$hr_rejected = $_REQUEST['hr_rejected'];
@$job_unpublished = $_REQUEST['job_unpublished'];
@$job_publish = $_REQUEST['job_publish'];
@$del_id = $_REQUEST['delete'];
@$trn_date = date("Y-m-d H:i:s");

if ($manager_approved = $_REQUEST['manager_approved'])
{
$sql = "UPDATE leave_forms SET manager_sign='approved', last_modify='$trn_date' WHERE leave_id='$manager_approved';" ;
             mysqli_query($conn, $sql);
             header("location: ../my_department_leaves.php");
             exit(); 
 }
 elseif ($rejected = $_REQUEST['manager_rejected'])
{
$sql = "UPDATE leave_forms SET manager_sign='rejected', last_modify='$trn_date' WHERE leave_id='$manager_rejected';" ;
             mysqli_query($conn, $sql);
             header("location: ../my_department_leaves.php");
             exit();
 }
 // for HR 
elseif ($hr_approved = $_REQUEST['hr_approved'])
{
$sql = "UPDATE leave_forms SET hr_sign='approved', last_modify='$trn_date' WHERE leave_id='$hr_approved';" ;
             mysqli_query($conn, $sql);
             header("location: ../hr_leave_approval.php");
             exit(); 
 }
 elseif ($rejected = $_REQUEST['hr_rejected'])
{
$sql = "UPDATE leave_forms SET hr_sign='rejected', last_modify='$trn_date' WHERE leave_id='$hr_rejected';" ;
             mysqli_query($conn, $sql);
             header("location: ../hr_leave_approval.php");
             exit();
 }
elseif ($job_unpublished = $_REQUEST['job_unpublished'])
{
$sql = "UPDATE job_t SET remark='unpublished' WHERE job_id='$job_unpublished';" ;
             mysqli_query($conn, $sql);
             header("location: ../announce_new_job.php");
             exit();
 }

 //
elseif ($dell = $_GET['delete']) 
{
             mysqli_query($conn, "DELETE FROM leave_forms WHERE leave_id = '$dell'");
             header("location: leave-request.php");
             exit();
}

// elseif ($job_publish = $_REQUEST['job_publish'])
// {
// $sql = "UPDATE job_t SET remark='publish' WHERE job_id='$job_publish';" ;
//              mysqli_query($conn, $sql);
//              header("location: e-recuritmnet.php");
//              exit();
//  }

?> 
 
