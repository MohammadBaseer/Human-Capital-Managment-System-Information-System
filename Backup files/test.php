<?php
$conn = mysqli_connect('localhost','root','','hcmis');
if (!$conn) {
	echo "Not Connected to database";
}



$get = "SELECT * FROM employees a,resignation b WHERE a.id = b.emp_id AND id = '51'" ;


$run = mysqli_query($conn, $get);
$row = mysqli_fetch_assoc($run);

echo "<pre>";
print_r($row);
echo "</pre>";

 ?>
