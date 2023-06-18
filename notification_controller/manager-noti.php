
<?php 

$sql = "SELECT * FROM leave_forms as l INNER JOIN employees as e on l.employee_id = e.id  INNER JOIN department AS d ON e.department_id = d.departmentid WHERE manager_sign= '' AND hr_sign = '' ";
$result = mysqli_query($conn, $sql);
$rowcount = mysqli_num_rows($result);
while ($row = mysqli_fetch_assoc($result)) {
?>
<a href="">
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
