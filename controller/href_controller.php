<?php 
include_once('connection.php');
// employee veiw
if (@$id = $_REQUEST['vwempresigned']) {
	$query = "SELECT count(*) as count FROM employees where role = 'Administration' AND status='' AND id='$id'";
		$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result);
if ($row['count'] == 1 ) {
echo "<b>Warning:</b><br>Admin user can't Resign please transfer access to other user.<br>";
echo '<div> <a style="cursor: pointer; text-decoration: none;" href="javascript:;" onclick="window.history.back(-1);">Back</a></div>';
}
else
{

	$sql = "UPDATE employees SET  status = 'Resigned' WHERE id='$id'";
	mysqli_query($conn, $sql);
	header ("Location: ../veiw_employees.php");


}

}

elseif (@$id = $_REQUEST['tblempresigned']) {
	$query = "SELECT count(*) as count FROM employees where role = 'Administration' AND status='' AND id='$id'";
		$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result);
if ($row['count'] == 1 ) {
echo "<b>Warning:</b><br>Admin user can't Resign please transfer access to other user.<br>";
echo '<div> <a style="cursor: pointer; text-decoration: none;" href="javascript:;" onclick="window.history.back(-1);">Back</a></div>';
}
else
{

	$sql = "UPDATE employees SET  status = 'Resigned' WHERE id='$id'";
	mysqli_query($conn, $sql);
	header ("Location: ../emp_table_view.php");


}
}
elseif (@$dell = $_GET['delete']) 
{
             mysqli_query($conn, "DELETE FROM leave_forms WHERE leave_id = '$dell'");
             header ("Location: ../manage_leave.php");
             exit();
}
// 

elseif (@$degreeid = $_REQUEST['degreedelete']) {
	$sql = "DELETE FROM degree WHERE degreeid='$degreeid'";
	mysqli_query($conn, $sql);
	echo "<script>window.location='degree_table.php';</script>";
}
else if (@$studyid = $_REQUEST['studydelete']) {
	$sql = "DELETE FROM study WHERE studyid='$studyid'";
	mysqli_query($conn, $sql);
	echo "<script>window.location='study_table.php';</script>";
}
else if (@$positionid = $_REQUEST['positiondelete']) {
	$sql = "DELETE FROM position WHERE positionid='$positionid'";
	mysqli_query($conn, $sql);
	echo "<script>window.location='position_table.php';</script>";
}
else if (@$departmentid = $_REQUEST['departmentdelete']) { 
	$sql = "DELETE FROM department WHERE departmentid='$departmentid'";
	mysqli_query($conn, $sql);
	 echo "<script>window.location='../department_table.php';</script>";
}
// 
// ============= edit section
// ======== degree table
elseif (@$degreeid = $_REQUEST['degreeedit'])
{
	  $result = mysqli_query($conn, "SELECT*FROM degree WHERE degreeid='$degreeid'");
	  $row =  mysqli_fetch_assoc($result);
 if (isset($_POST['update']))
{
	$degree = $_POST['degree'];
if (mysqli_query($conn, "UPDATE degree SET degree='$degree' WHERE degreeid=$degreeid")){   
  	  echo "<script>window.location='degree_table.php';</script>";
}}}
// ==========dep tabel
else if (@$departmentid = $_REQUEST['departmentedit'])
{
	  $result = mysqli_query($conn, "SELECT*FROM department WHERE departmentid='$departmentid'");
	  $row =  mysqli_fetch_assoc($result);
 if (isset($_POST['update']))
{
	$department = $_POST['department'];
if (mysqli_query($conn, "UPDATE department SET department='$department' WHERE departmentid=$departmentid")){
  	  echo "<script>window.location='department_table.php';</script>";
}}}
// =====position tabel
else if (@$positionid = $_REQUEST['positionedit'])
{
	  $result = mysqli_query($conn, "SELECT*FROM position WHERE positionid='$positionid'");
	  $row =  mysqli_fetch_assoc($result);
 if (isset($_POST['update']))
{
	$position = $_POST['position'];
if (mysqli_query($conn, "UPDATE position SET position='$position' WHERE positionid=$positionid")){   
  	  echo "<script>window.location='position_table.php';</script>";
}}}
// ============study tabel
else if (@$studyid = $_REQUEST['studyedit'])
{
	  $result = mysqli_query($conn, "SELECT*FROM study WHERE studyid='$studyid'");
	  $row =  mysqli_fetch_assoc($result);
 if (isset($_POST['update']))
{
	$study = $_POST['study'];
if (mysqli_query($conn, "UPDATE study SET study='$study' WHERE studyid=$studyid")){   
  	  echo "<script>window.location='study_table.php';</script>";
}}}
// ========== /edit section
// ====account administration started
elseif (@$account_unlockid = $_GET['unlock_account']) {
$sql = "UPDATE employees SET  acc_status = 'enable' WHERE id='$account_unlockid'";
	mysqli_query($conn, $sql);
	header ("Location: ../account_administration.php");
}

elseif (@$account_lockid = $_GET['lock_account']) {
$sql = "UPDATE employees SET  acc_status = 'disable' WHERE id='$account_lockid'";
	mysqli_query($conn, $sql);
	header ("Location: ../account_administration.php");
}
// ========

//=============

else{
echo "field";

}
 ?>