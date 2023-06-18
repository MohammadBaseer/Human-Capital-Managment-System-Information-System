<?php 
include_once('../controller/connection.php');

 ?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Office Website</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../../assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="cssone/Announce_form.css">
    <link rel="stylesheet" type="text/css" href="cssone/bootsraptforform.css">
    <link rel="stylesheet" href="../css/icon-font.min.css" type='text/css' />
    <link rel="stylesheet" href="../css/font-icons/css/font-awesome.min.css" type='text/css' />

</head>

<body>

    <div class="js-animsition animsition" id="site-wrap" data-animsition-in-class="fade-in"
        data-animsition-out-class="fade-out">

        <header class="templateux-navbar dark" role="banner">

            <div class="container" data-aos="fade-down">
                <div class="row">

                    <div class="col-3 templateux-logo">
                        <a href="index.html" class="animsition-link">Company website</a>
                    </div>
                    <nav class="col-9 site-nav">
                        <button
                            class="d-block d-md-none hamburger hamburger--spin templateux-toggle templateux-toggle-light ml-auto templateux-toggle-menu"
                            data-toggle="collapse" data-target="#mobile-menu" aria-controls="mobile-menu"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button> 
                        <ul class="sf-menu templateux-menu d-none d-md-block">
                            <li><a href="index.php" class="animsition-link">Home</a></li>
                            <!-- <li><a href="#" class="animsition-link">About</a></li>
                            <li><a href="#" class="animsition-link">Gallery</a></li>
                            <li><a href="#" class="animsition-link">Blog</a></li> -->
                            <li class="active"><a href="vacancy.php" class="animsition-link">Vacancy</a></li>
                        </ul> 

                    </nav>

                </div> 
            </div> 
        </header> 

        <div class="templateux-cover" style="background-image: url(images/slider-1.jpg); min-height: 139px">
        </div>
        <br><br><br>
        <!--  -->

        <div class="container" data-aos="fade-down">
            <div class="row align-items-center">
                <div style="border-bottom: solid #0187ff 1px; width: 100%;">
                    <h2>Opportunities/Vacancy</h2>
                </div>
                <!-- start php here  -->
                <?php 

$date = date("Y-m-d");


$sql = "SELECT *, (SELECT COUNT(vacancy_view_counter.id) FROM `vacancy_view_counter` WHERE vacancy_view_counter.vac_id = job_t.job_id) As viewers FROM `job_t` WHERE remark = 'publish' AND open_date <= '$date' AND close_date >='$date'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result))
{
// echo "<pre>";
// print_r($row);
// echo "</pre>";
?>
                <div class="col-md-12">
                    <br>
                    <div class="col-md-8 col-sm-12">
                        <ul class="searchList">
                            <!-- job start -->
                            <li>
                                <div class="row">
                                    <div class="col-md-8 col-sm-8">
                                        <div class="jobimg"><img src="images/logo.png"></div>
                                        <div class="jobinfo">
                                            <h3><a
                                                    href="apply.php?job_id=<?php echo $row['job_id'];?>"><?php echo $row['job_title']; ?></a>
                                            </h3>
                                            <!--<div class="companyName"><a href="#.">Datebase Management Company</a></div>-->
                                            <div class="companyName"> </div>
                                            <div class="location">Salary: <strong><?php echo $row['salary']; ?></strong>
                                            </div>

                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">

                                        <div class="listbtn"><a
                                                href="apply.php?job_id=<?php echo $row['job_id'];?>">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                                <p><?php echo $row['experience']; ?></p>

                                <p>Views: <?php echo $row['viewers']; ?> </p>
                                <div class="greybox">
                                    <div class="infobox"><i class="feather icon-map" aria-hidden="true"></i>
                                        <span><?php echo $row['location']; ?></span>
                                    </div>
                                    <div class="infobox"><i class="feather icon-file-text" aria-hidden="true"></i>
                                        <span><?php echo $row['experience']; ?></span>
                                    </div>
                                    <div class="infobox"><i class="feather icon-calendar" aria-hidden="true"></i> <span>
                                            <?php echo $row['close_date']; ?></span>
                                    </div>
                                    <div class="infobox"><i class="feather icon-aperture" aria-hidden="true"></i>
                                        <span><?php echo $row['employment_type']; ?></span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                            </li>
                        </ul>

                        <div class="clearfix"></div>
                    </div>

                </div>
                <?php 
} ?>
                <!-- end php here -->

            </div>
        </div>

        <!--  -->

        <script src="js/scripts-all.js"></script>
        <script src="js/main.js"></script>
        <script src="js/google-map.js"></script>

</body>

</html>