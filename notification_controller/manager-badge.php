   <?php 
   include_once('../controller/connection.php');
   echo
$access_to = $auth['full_name'];
$sql = "SELECT * FROM leave_forms as l INNER JOIN employees as e on l.employee_id = e.id  INNER JOIN department AS d ON e.department_id = d.departmentid WHERE full_name = '$access_to' AND manager_sign= '' AND hr_sign = '' ";
$result = mysqli_query($conn, $sql);
$rowcount = mysqli_num_rows($result);
   if ($rowcount == 0) {

   } 
   else
   {
?>
 <?php echo '<span class="badge badge-danger">'?> <?php echo $rowcount; ?> <?php echo '</span>'; }?>