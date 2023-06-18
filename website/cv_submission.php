
<?php 
include_once('../controller/connection.php');
$error ='';
if (isset($_GET['apply'])) {
$apply = $_GET['apply'];
  $sql = "SELECT * From job_t WHERE job_id='$apply'";
  $result = mysqli_query($conn, $sql);
  // if (
    $row =  mysqli_fetch_assoc($result);

    if (isset($_POST['submit'])) {
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$addrsone = $_POST['addrsone'];
$addrstwo = $_POST['addrstwo'];
$city = $_POST['city']; 
$district = $_POST['district'];
$postal_code = $_POST['postal_code']; 
$country = $_POST['country'];
$area_code = $_POST['area_code'];
$phone_numbere = $_POST['phone_numbere'];
$email = $_POST['email'];
$degree_level = $_POST['degree_level'];
$cover = $_POST['cover'];
$resume = $_FILES["resume"]["name"];
// =============
// $resume = time().'_'.mt_rand().basename($_FILES["resume"]["name"]);
// $image_url="resumes/".$resume ;
// move_uploaded_file($_FILES['resume']['tmp_name'],$image_url);
// =============
if (empty($first_name) || empty($last_name) || empty($addrsone) || empty($addrstwo) || empty($city) || empty($district)|| empty($postal_code) || empty($country) || empty($area_code) || empty($phone_numbere) || empty($email)|| empty($degree_level) || empty($cover)) {
$error = '<div class="alert alert-danger" style="padding-left: 4%;"><p>Field is empty 1*</p></div>';  
}

else
{
  // =============
  $sql1 = " SELECT * FROM cv_submission WHERE email='$email' AND vac_id='$apply'";
$result1 = mysqli_query($conn, $sql1);
$count = mysqli_num_rows($result1);
  if ($count > 0) {
$error = '<div class="alert alert-danger" style="padding-left: 4%;"><p>You are already submited*</p></div>'; 
  }
  else{
  // =============
$resume = time().'_'.mt_rand().basename($_FILES["resume"]["name"]);
$image_url="resumes/".$resume ;
move_uploaded_file($_FILES['resume']['tmp_name'],$image_url);
// =============
$sql = "INSERT INTO `cv_submission` (`vac_id`, `first_name`, `last_name`, `address_one`, `address_two`, `city`, `district`, `postal_code`, `country`, `area_code`, `phone_number`, `email`, `degree_level`, `cover_letter`,`resume`)
VALUES 
('$apply', '$first_name', '$last_name', '$addrsone', '$addrstwo', '$city', '$district', '$postal_code', '$country', '$area_code', '$phone_numbere', '$email', '$degree_level', '$cover', '$resume')";
if($result = mysqli_query($conn,$sql))

{

$error = '<div class="alert alert-success" style="padding-left: 4%;"><p>Successfuly Submited*</p></div>';  
}
else 
{
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
   }
    }
  }
}

 ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Atomic &mdash; Free Business Website Template by Colorlib</title>
    <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" type="text/css" href="cssone/Announce_form.css">
    <link rel="stylesheet" type="text/css" href="cssone/bootsraptforform.css">
    <!-- lined-icons -->
<link rel="stylesheet" href="../css/icon-font.min.css" type='text/css' />
<link rel="stylesheet" href="../css/font-icons/css/font-awesome.min.css" type='text/css' />
<!-- //lined-icons -->
<!-- cv form -->
<link rel="stylesheet" type="text/css" href="css/cv_form.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<style type="text/css">
    .form-label-left{
        width:150px;
    }
    .form-line{
        padding-top:12px;
        padding-bottom:12px;
    }
    .form-label-right{
        width:150px;
    }
    body, html{
        margin:0;
        padding:0;
        background:#FFFFFF;
    }

    .form-all{
        margin:0px auto;
        padding-top:0px;
        width:690px;
        color:#555 !important;
        font-family:"Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Verdana, sans-serif;
        font-size:14px;
    }
    .form-radio-item label, .form-checkbox-item label, .form-grading-label, .form-header{
        color: #555;
    }

</style>

<style type="text/css" id="form-designer-style">
    /* Injected CSS Code */
/*PREFERENCES STYLE*/
    .form-all {
      font-family: Arial, sans-serif;
    }
    .form-all .qq-upload-button,
    .form-all .form-submit-button,
    .form-all .form-submit-reset,
    .form-all .form-submit-print {
      font-family: Arial, sans-serif;
    }
    .form-all .form-pagebreak-back-container,
    .form-all .form-pagebreak-next-container {
      font-family: Arial, sans-serif;
    }
    .form-header-group {
      font-family: Arial, sans-serif;
    }
    .form-label {
      font-family: Arial, sans-serif;
    }
  
    .form-label.form-label-auto {
      
    display: inline-block;
    float: left;
    text-align: left;
  
    }
  
    .form-line {
      margin-top: 12px 36px 12px 36px px;
      margin-bottom: 12px 36px 12px 36px px;
    }
  
    .form-all {
      width: 690px;
    }
  
    .form-label-left,
    .form-label-right,
    .form-label-left.form-label-auto,
    .form-label-right.form-label-auto {
      width: 120px;
    }
  
    .form-all {
      font-size: 14pxpx
    }
    .form-all .qq-upload-button,
    .form-all .qq-upload-button,
    .form-all .form-submit-button,
    .form-all .form-submit-reset,
    .form-all .form-submit-print {
      font-size: 14pxpx
    }
    .form-all .form-pagebreak-back-container,
    .form-all .form-pagebreak-next-container {
      font-size: 14pxpx
    }
  
    .supernova .form-all, .form-all {
      background-color: #FFFFFF;
      border: 1px solid transparent;
    }
  
    .form-all {
      color: #555;
    }
    .form-header-group .form-header {
      color: #555;
    }
    .form-header-group .form-subHeader {
      color: #555;
    }
    .form-label-top,
    .form-label-left,
    .form-label-right,
    .form-html,
    .form-checkbox-item label,
    .form-radio-item label {
      color: #555;
    }
    .form-sub-label {
      color: #6f6f6f;
    }
  
    .supernova {
      background-color: undefined;
    }
    .supernova body {
      background: transparent;
    }
  
    .form-textbox,
    .form-textarea,
    .form-radio-other-input,
    .form-checkbox-other-input,
    .form-captcha input,
    .form-spinner input {
      background-color: undefined;
    }
  
    .supernova {
      background-image: none;
    }
    #stage {
      background-image: none;
    }
  
    .form-all {
      background-image: none;
    }
  
  .ie-8 .form-all:before { display: none; }
  .ie-8 {
    margin-top: auto;
    margin-top: initial;
  }
  
  /*PREFERENCES STYLE*//*__INSPECT_SEPERATOR__*/
    /* Injected CSS Code */
</style>

  </head>
  <body>
  
  <div class="js-animsition animsition" id="site-wrap" data-animsition-in-class="fade-in" data-animsition-out-class="fade-out">


    <header class="templateux-navbar dark" role="banner">
     
      <div class="container"  data-aos="fade-down">
        <div class="row">

          <div class="col-3 templateux-logo">
            <a href="index.html" class="animsition-link">Atomic</a>
          </div>
          <nav class="col-9 site-nav">
            <button class="d-block d-md-none hamburger hamburger--spin templateux-toggle templateux-toggle-light ml-auto templateux-toggle-menu" data-toggle="collapse" data-target="#mobile-menu" aria-controls="mobile-menu" aria-expanded="false" aria-label="Toggle navigation">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button> <!-- .templateux-toggle -->

            <ul class="sf-menu templateux-menu d-none d-md-block">
                            <li><a href="index.php" class="animsition-link">Home</a></li>
                            <!-- <li><a href="#" class="animsition-link">About</a></li>
                            <li><a href="#" class="animsition-link">Gallery</a></li>
                            <li><a href="#" class="animsition-link">Blog</a></li> -->
                            <li class="active"><a href="vacancy.php" class="animsition-link">Vacancy</a></li>
                        </ul>

          </nav> <!-- .site-nav -->
          

        </div> <!-- .row -->
      </div> <!-- .container -->
    </header> <!-- .templateux-navba -->
    
    <div class="templateux-cover" style="background-image: url(images/slider-1.jpg); min-height: 139px">
    </div> 
<br><br><br>
<!--  -->


 <div class="container" data-aos="fade-down">
  <?php echo $error; ?>
        <div class="row align-items-center">
          <div  style="border-bottom: solid #0187ff 1px; width: 100%; margin-bottom: 10px;"><h2> Apply For <?php echo $row['job_title']; ?></h2></div>
<br><br>
<!-- start  -->

<!-- <div class="col-sm-8"> -->
<form class="jotform-form" action="" method="post" enctype="multipart/form-data" name="form_83302541638454" id="833025416384540" accept-charset="utf-8" style="box-shadow: 0 0 3px #0187ff ; padding: 0px;">
  <input type="hidden" name="formID" value="83302541638454" />
  <div class="form-all">

    <ul class="form-section page-section">
      <li id="cid_13" class="form-input-wide" data-type="control_head">
        <!-- <div class="form-header-group ">
          <div class="header-text httal htvam">
            <h1 id="header_13" class="form-header" data-component="header">
              Apply For (echo position)
            </h1>
          </div>
        </div> -->
      </li>
      <li class="form-line jf-required" data-type="control_fullname" id="id_1">
        <label class="form-label form-label-top form-label-auto" id="label_1" for="first_1">
          Full Name:
          <span class="form-required">
            *
          </span>
        </label>
        <div id="cid_1" class="form-input-wide jf-required">
          <div data-wrapper-react="true">
            <span class="form-sub-label-container" style="vertical-align:top">
              <input type="text" id="first_1" name="first_name" class="form-textbox validate[required]" size="10" value="<?php if(isset($_POST['first_name'])){ echo $_POST['first_name']; } ?>" data-component="first" required="" />
              <label class="form-sub-label" for="first_1" id="sublabel_first" style="min-height:13px" > First Name </label>
            </span>
            <span class="form-sub-label-container" style="vertical-align:top">
              <input type="text" id="last_1" name="last_name" class="form-textbox validate[required]" size="15" value="<?php if(isset($_POST['last_name'])){ echo $_POST['last_name']; } ?>" data-component="last" required="" />
              <label class="form-sub-label" for="last_1" id="sublabel_last" style="min-height:13px"> Last Name </label>
            </span>
          </div>
        </div>
      </li>
      <li class="form-line jf-required" data-type="control_address" id="id_3">
        <label class="form-label form-label-top form-label-auto" id="label_3" for="input_3undefined">
          Address:
          <span class="form-required">
            *
          </span>
        </label>
        <div id="cid_3" class="form-input-wide jf-required">
          <table summary="" class="form-address-table" border="0" cellPadding="0" cellSpacing="0">
            <tbody>
              <tr>
                <td colSpan="2">
                  <span class="form-sub-label-container" style="vertical-align:top">
                    <input type="text" id="input_3_addr_line1" name="addrsone" class="form-textbox validate[required] form-address-line" value="<?php if(isset($_POST['addrsone'])){ echo $_POST['addrsone']; } ?>" data-component="address_line_1" required="" />
                    <label class="form-sub-label" for="input_3_addr_line1" id="sublabel_3_addr_line1" style="min-height:13px"> Street Address </label>
                  </span>
                </td>
              </tr>
              <tr>
                <td colSpan="2">
                  <span class="form-sub-label-container" style="vertical-align:top">
                    <input type="text" id="input_3_addr_line2" name="addrstwo" class="form-textbox form-address-line" size="46" value="<?php if(isset($_POST['addrstwo'])){ echo $_POST['addrstwo']; } ?>" data-component="address_line_2" required="" />
                    <label class="form-sub-label" for="input_3_addr_line2" id="sublabel_3_addr_line2" style="min-height:13px"> Street Address Line 2 </label>
                  </span>
                </td>
              </tr>
              <tr>
                <td width="50%">
                  <span class="form-sub-label-container" style="vertical-align:top">
                    <input type="text" id="input_3_city" name="city" class="form-textbox validate[required] form-address-city" size="21" value="<?php if(isset($_POST['city'])){ echo $_POST['city']; } ?>" data-component="city" required="" />
                    <label class="form-sub-label" for="input_3_city" id="sublabel_3_city" style="min-height:13px"> City </label>
                  </span>
                </td>
                <td>
                  <span class="form-sub-label-container" style="vertical-align:top">
                    <input type="text" id="input_3_state" name="district" class="form-textbox validate[required] form-address-state" size="22" value="<?php if(isset($_POST['district'])){ echo $_POST['district']; } ?>" data-component="state" required="" />
                    <label class="form-sub-label" for="input_3_state" id="sublabel_3_state" style="min-height:13px"> District / Province </label>
                  </span>
                </td>
              </tr>
              <tr>
                <td width="50%">
                  <span class="form-sub-label-container" style="vertical-align:top">
                    <input type="text" id="input_3_postal" name="postal_code" class="form-textbox form-address-postal" size="10" value="<?php if(isset($_POST['postal_code'])){ echo $_POST['postal_code']; } ?>" data-component="zip" required="" />
                    <label class="form-sub-label" for="input_3_postal" id="sublabel_3_postal" style="min-height:13px"> Postal / Zip Code </label>
                  </span>
                </td>
                <td>
                  <span class="form-sub-label-container" style="vertical-align:top">
                    <select class="form-dropdown validate[required] form-address-country noTranslate" name="country" id="input_3_country" data-component="country" required="">
                      <option value=""> Please Select </option>
                      <option value="United States"> United States </option>
                      <option value="Afghanistan"> Afghanistan </option>
                      <option value="Albania"> Albania </option>
                      <option value="Algeria"> Algeria </option>
                      <option value="American Samoa"> American Samoa </option>
                      <option value="Andorra"> Andorra </option>
                      <option value="Angola"> Angola </option>
                      <option value="Anguilla"> Anguilla </option>
                      <option value="Antigua and Barbuda"> Antigua and Barbuda </option>
                      <option value="Argentina"> Argentina </option>
                      <option value="Armenia"> Armenia </option>
                      <option value="Aruba"> Aruba </option>
                      <option value="Australia"> Australia </option>
                      <option value="Austria"> Austria </option>
                      <option value="Azerbaijan"> Azerbaijan </option>
                      <option value="The Bahamas"> The Bahamas </option>
                      <option value="Bahrain"> Bahrain </option>
                      <option value="Bangladesh"> Bangladesh </option>
                      <option value="Barbados"> Barbados </option>
                      <option value="Belarus"> Belarus </option>
                      <option value="Belgium"> Belgium </option>
                      <option value="Belize"> Belize </option>
                      <option value="Benin"> Benin </option>
                      <option value="Bermuda"> Bermuda </option>
                      <option value="Bhutan"> Bhutan </option>
                      <option value="Bolivia"> Bolivia </option>
                      <option value="Bosnia and Herzegovina"> Bosnia and Herzegovina </option>
                      <option value="Botswana"> Botswana </option>
                      <option value="Brazil"> Brazil </option>
                      <option value="Brunei"> Brunei </option>
                      <option value="Bulgaria"> Bulgaria </option>
                      <option value="Burkina Faso"> Burkina Faso </option>
                      <option value="Burundi"> Burundi </option>
                      <option value="Cambodia"> Cambodia </option>
                      <option value="Cameroon"> Cameroon </option>
                      <option value="Canada"> Canada </option>
                      <option value="Cape Verde"> Cape Verde </option>
                      <option value="Cayman Islands"> Cayman Islands </option>
                      <option value="Central African Republic"> Central African Republic </option>
                      <option value="Chad"> Chad </option>
                      <option value="Chile"> Chile </option>
                      <option value="China"> China </option>
                      <option value="Christmas Island"> Christmas Island </option>
                      <option value="Cocos (Keeling) Islands"> Cocos (Keeling) Islands </option>
                      <option value="Colombia"> Colombia </option>
                      <option value="Comoros"> Comoros </option>
                      <option value="Congo"> Congo </option>
                      <option value="Cook Islands"> Cook Islands </option>
                      <option value="Costa Rica"> Costa Rica </option>
                      <option value="Cote d&#x27;Ivoire"> Cote d&#x27;Ivoire </option>
                      <option value="Croatia"> Croatia </option>
                      <option value="Cuba"> Cuba </option>
                      <option value="Cyprus"> Cyprus </option>
                      <option value="Czech Republic"> Czech Republic </option>
                      <option value="Democratic Republic of the Congo"> Democratic Republic of the Congo </option>
                      <option value="Denmark"> Denmark </option>
                      <option value="Djibouti"> Djibouti </option>
                      <option value="Dominica"> Dominica </option>
                      <option value="Dominican Republic"> Dominican Republic </option>
                      <option value="Ecuador"> Ecuador </option>
                      <option value="Egypt"> Egypt </option>
                      <option value="El Salvador"> El Salvador </option>
                      <option value="Equatorial Guinea"> Equatorial Guinea </option>
                      <option value="Eritrea"> Eritrea </option>
                      <option value="Estonia"> Estonia </option>
                      <option value="Ethiopia"> Ethiopia </option>
                      <option value="Falkland Islands"> Falkland Islands </option>
                      <option value="Faroe Islands"> Faroe Islands </option>
                      <option value="Fiji"> Fiji </option>
                      <option value="Finland"> Finland </option>
                      <option value="France"> France </option>
                      <option value="French Polynesia"> French Polynesia </option>
                      <option value="Gabon"> Gabon </option>
                      <option value="The Gambia"> The Gambia </option>
                      <option value="Georgia"> Georgia </option>
                      <option value="Germany"> Germany </option>
                      <option value="Ghana"> Ghana </option>
                      <option value="Gibraltar"> Gibraltar </option>
                      <option value="Greece"> Greece </option>
                      <option value="Greenland"> Greenland </option>
                      <option value="Grenada"> Grenada </option>
                      <option value="Guadeloupe"> Guadeloupe </option>
                      <option value="Guam"> Guam </option>
                      <option value="Guatemala"> Guatemala </option>
                      <option value="Guernsey"> Guernsey </option>
                      <option value="Guinea"> Guinea </option>
                      <option value="Guinea-Bissau"> Guinea-Bissau </option>
                      <option value="Guyana"> Guyana </option>
                      <option value="Haiti"> Haiti </option>
                      <option value="Honduras"> Honduras </option>
                      <option value="Hong Kong"> Hong Kong </option>
                      <option value="Hungary"> Hungary </option>
                      <option value="Iceland"> Iceland </option>
                      <option value="India"> India </option>
                      <option value="Indonesia"> Indonesia </option>
                      <option value="Iran"> Iran </option>
                      <option value="Iraq"> Iraq </option>
                      <option value="Ireland"> Ireland </option>
                      <option value="Israel"> Israel </option>
                      <option value="Italy"> Italy </option>
                      <option value="Jamaica"> Jamaica </option>
                      <option value="Japan"> Japan </option>
                      <option value="Jersey"> Jersey </option>
                      <option value="Jordan"> Jordan </option>
                      <option value="Kazakhstan"> Kazakhstan </option>
                      <option value="Kenya"> Kenya </option>
                      <option value="Kiribati"> Kiribati </option>
                      <option value="North Korea"> North Korea </option>
                      <option value="South Korea"> South Korea </option>
                      <option value="Kosovo"> Kosovo </option>
                      <option value="Kuwait"> Kuwait </option>
                      <option value="Kyrgyzstan"> Kyrgyzstan </option>
                      <option value="Laos"> Laos </option>
                      <option value="Latvia"> Latvia </option>
                      <option value="Lebanon"> Lebanon </option>
                      <option value="Lesotho"> Lesotho </option>
                      <option value="Liberia"> Liberia </option>
                      <option value="Libya"> Libya </option>
                      <option value="Liechtenstein"> Liechtenstein </option>
                      <option value="Lithuania"> Lithuania </option>
                      <option value="Luxembourg"> Luxembourg </option>
                      <option value="Macau"> Macau </option>
                      <option value="Macedonia"> Macedonia </option>
                      <option value="Madagascar"> Madagascar </option>
                      <option value="Malawi"> Malawi </option>
                      <option value="Malaysia"> Malaysia </option>
                      <option value="Maldives"> Maldives </option>
                      <option value="Mali"> Mali </option>
                      <option value="Malta"> Malta </option>
                      <option value="Marshall Islands"> Marshall Islands </option>
                      <option value="Martinique"> Martinique </option>
                      <option value="Mauritania"> Mauritania </option>
                      <option value="Mauritius"> Mauritius </option>
                      <option value="Mayotte"> Mayotte </option>
                      <option value="Mexico"> Mexico </option>
                      <option value="Micronesia"> Micronesia </option>
                      <option value="Moldova"> Moldova </option>
                      <option value="Monaco"> Monaco </option>
                      <option value="Mongolia"> Mongolia </option>
                      <option value="Montenegro"> Montenegro </option>
                      <option value="Montserrat"> Montserrat </option>
                      <option value="Morocco"> Morocco </option>
                      <option value="Mozambique"> Mozambique </option>
                      <option value="Myanmar"> Myanmar </option>
                      <option value="Nagorno-Karabakh"> Nagorno-Karabakh </option>
                      <option value="Namibia"> Namibia </option>
                      <option value="Nauru"> Nauru </option>
                      <option value="Nepal"> Nepal </option>
                      <option value="Netherlands"> Netherlands </option>
                      <option value="Netherlands Antilles"> Netherlands Antilles </option>
                      <option value="New Caledonia"> New Caledonia </option>
                      <option value="New Zealand"> New Zealand </option>
                      <option value="Nicaragua"> Nicaragua </option>
                      <option value="Niger"> Niger </option>
                      <option value="Nigeria"> Nigeria </option>
                      <option value="Niue"> Niue </option>
                      <option value="Norfolk Island"> Norfolk Island </option>
                      <option value="Turkish Republic of Northern Cyprus"> Turkish Republic of Northern Cyprus </option>
                      <option value="Northern Mariana"> Northern Mariana </option>
                      <option value="Norway"> Norway </option>
                      <option value="Oman"> Oman </option>
                      <option value="Pakistan"> Pakistan </option>
                      <option value="Palau"> Palau </option>
                      <option value="Palestine"> Palestine </option>
                      <option value="Panama"> Panama </option>
                      <option value="Papua New Guinea"> Papua New Guinea </option>
                      <option value="Paraguay"> Paraguay </option>
                      <option value="Peru"> Peru </option>
                      <option value="Philippines"> Philippines </option>
                      <option value="Pitcairn Islands"> Pitcairn Islands </option>
                      <option value="Poland"> Poland </option>
                      <option value="Portugal"> Portugal </option>
                      <option value="Puerto Rico"> Puerto Rico </option>
                      <option value="Qatar"> Qatar </option>
                      <option value="Republic of the Congo"> Republic of the Congo </option>
                      <option value="Romania"> Romania </option>
                      <option value="Russia"> Russia </option>
                      <option value="Rwanda"> Rwanda </option>
                      <option value="Saint Barthelemy"> Saint Barthelemy </option>
                      <option value="Saint Helena"> Saint Helena </option>
                      <option value="Saint Kitts and Nevis"> Saint Kitts and Nevis </option>
                      <option value="Saint Lucia"> Saint Lucia </option>
                      <option value="Saint Martin"> Saint Martin </option>
                      <option value="Saint Pierre and Miquelon"> Saint Pierre and Miquelon </option>
                      <option value="Saint Vincent and the Grenadines"> Saint Vincent and the Grenadines </option>
                      <option value="Samoa"> Samoa </option>
                      <option value="San Marino"> San Marino </option>
                      <option value="Sao Tome and Principe"> Sao Tome and Principe </option>
                      <option value="Saudi Arabia"> Saudi Arabia </option>
                      <option value="Senegal"> Senegal </option>
                      <option value="Serbia"> Serbia </option>
                      <option value="Seychelles"> Seychelles </option>
                      <option value="Sierra Leone"> Sierra Leone </option>
                      <option value="Singapore"> Singapore </option>
                      <option value="Slovakia"> Slovakia </option>
                      <option value="Slovenia"> Slovenia </option>
                      <option value="Solomon Islands"> Solomon Islands </option>
                      <option value="Somalia"> Somalia </option>
                      <option value="Somaliland"> Somaliland </option>
                      <option value="South Africa"> South Africa </option>
                      <option value="South Ossetia"> South Ossetia </option>
                      <option value="South Sudan"> South Sudan </option>
                      <option value="Spain"> Spain </option>
                      <option value="Sri Lanka"> Sri Lanka </option>
                      <option value="Sudan"> Sudan </option>
                      <option value="Suriname"> Suriname </option>
                      <option value="Svalbard"> Svalbard </option>
                      <option value="eSwatini"> eSwatini </option>
                      <option value="Sweden"> Sweden </option>
                      <option value="Switzerland"> Switzerland </option>
                      <option value="Syria"> Syria </option>
                      <option value="Taiwan"> Taiwan </option>
                      <option value="Tajikistan"> Tajikistan </option>
                      <option value="Tanzania"> Tanzania </option>
                      <option value="Thailand"> Thailand </option>
                      <option value="Timor-Leste"> Timor-Leste </option>
                      <option value="Togo"> Togo </option>
                      <option value="Tokelau"> Tokelau </option>
                      <option value="Tonga"> Tonga </option>
                      <option value="Transnistria Pridnestrovie"> Transnistria Pridnestrovie </option>
                      <option value="Trinidad and Tobago"> Trinidad and Tobago </option>
                      <option value="Tristan da Cunha"> Tristan da Cunha </option>
                      <option value="Tunisia"> Tunisia </option>
                      <option value="Turkey"> Turkey </option>
                      <option value="Turkmenistan"> Turkmenistan </option>
                      <option value="Turks and Caicos Islands"> Turks and Caicos Islands </option>
                      <option value="Tuvalu"> Tuvalu </option>
                      <option value="Uganda"> Uganda </option>
                      <option value="Ukraine"> Ukraine </option>
                      <option value="United Arab Emirates"> United Arab Emirates </option>
                      <option value="United Kingdom"> United Kingdom </option>
                      <option value="Uruguay"> Uruguay </option>
                      <option value="Uzbekistan"> Uzbekistan </option>
                      <option value="Vanuatu"> Vanuatu </option>
                      <option value="Vatican City"> Vatican City </option>
                      <option value="Venezuela"> Venezuela </option>
                      <option value="Vietnam"> Vietnam </option>
                      <option value="British Virgin Islands"> British Virgin Islands </option>
                      <option value="Isle of Man"> Isle of Man </option>
                      <option value="US Virgin Islands"> US Virgin Islands </option>
                      <option value="Wallis and Futuna"> Wallis and Futuna </option>
                      <option value="Western Sahara"> Western Sahara </option>
                      <option value="Yemen"> Yemen </option>
                      <option value="Zambia"> Zambia </option>
                      <option value="Zimbabwe"> Zimbabwe </option>
                      <option value="other"> Other </option>
                    </select>
                    <label class="form-sub-label" for="input_3_country" id="sublabel_3_country" style="min-height:13px"> Country </label>
                  </span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </li>
      <li class="form-line jf-required" data-type="control_phone" id="id_9">
        <label class="form-label form-label-top form-label-auto" id="label_9" for="input_9_area">
          Phone:
          <span class="form-required">
            *
          </span>
        </label>
        <div id="cid_9" class="form-input-wide jf-required">
          <div data-wrapper-react="true">
            <span class="form-sub-label-container" style="vertical-align:top">
              <input type="tel" id="input_9_area" name="area_code" class="form-textbox validate[required]" size="3" value="<?php if(isset($_POST['area_code'])){ echo $_POST['area_code']; } ?>" data-component="areaCode" required="" />
              <span class="phone-separate">
                 -
              </span>
              <label class="form-sub-label" for="input_9_area" id="sublabel_area" style="min-height:13px"> Area Code </label>
            </span>
            <span class="form-sub-label-container" style="vertical-align:top">
              <input type="tel" id="input_9_phone" name="phone_numbere" class="form-textbox validate[required]" size="8" value="<?php if(isset($_POST['phone_numbere'])){ echo $_POST['phone_numbere']; } ?>" data-component="phone" required="" />
              <label class="form-sub-label" for="input_9_phone" id="sublabel_phone" style="min-height:13px"> Phone Number </label>
            </span>
          </div>
        </div>
      </li>
      <li class="form-line jf-required" data-type="control_email" id="id_4">
        <label class="form-label form-label-top form-label-auto" id="label_4" for="input_4">
          E-mail:
          <span class="form-required">
            *
          </span>
        </label>
        <div id="cid_4" class="form-input-wide jf-required">
          <input type="email" id="input_4" name="email" class="form-textbox validate[required, Email]" size="30" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>" placeholder="ex: myname@example.com" data-component="email" required="" />
        </div>
     
      <li class="form-line jf-required" data-type="control_dropdown" id="id_5">
        <label class="form-label form-label-top form-label-auto" id="label_5" for="input_5">
          Degree Level:
          <span class="form-required">
            *
          </span>
        </label>
        <div id="cid_5" class="form-input-wide jf-required">
          <select class="form-dropdown validate[required]" id="input_5" name="degree_level" style="width:150px" data-component="dropdown" required="">
            <option value="">  </option>
            <option value="Master Degree"> Master Degree </option>
            <option value="Bachelor Degree"> Bachelor Degree </option>
            <option value="School Certificates "> School Certificates </option>
            <option value="Other/Primary"> Other/Primary </option>
          </select>
        </div>
      </li>
      <li class="form-line" data-type="control_textarea" id="id_7">
        <label class="form-label form-label-top form-label-auto" id="label_7" for="input_7"> Cover Letter: </label>
        <div id="cid_7" class="form-input-wide">
          <textarea  id="input_7" class="form-textarea" name="cover" cols="40" rows="6"  data-component="textarea"><?php if(isset($_POST['cover'])){ echo $_POST['cover']; } ?></textarea>
        </div>
      </li>
      <li class="form-line" data-type="control_fileupload" id="id_12">
        <label class="form-label form-label-top form-label-auto" id="label_12" for="input_12"> Resume </label>
        <div id="cid_12" class="form-input-wide">
          <input type="file" id="input_12" name="resume" class="form-upload" data-imagevalidate="yes" data-file-accept="pdf, doc, docx, xls, csv, txt, rtf, html, zip, mp3, wma, mpg, flv, avi, jpg, jpeg, png, gif" data-file-maxsize="10240" data-file-minsize="0" data-file-limit="0" data-component="fileupload" />
        </div>
      </li>
      <li class="form-line" data-type="control_button" id="id_11">
        <div id="cid_11" class="form-input-wide">
          <div style="margin-left:156px" class="form-buttons-wrapper">
            <button id="input_11" type="submit" name="submit" class="form-submit-button form-submit-button-light" data-component="button">
              Submit Form
            </button>
          </div>
        </div>
      </li>
      <li style="display:none">
        Should be Empty:
        <input type="text" name="website" value="" />
      </li>
    </ul>
  </div>
  <script>
  JotForm.showJotFormPowered = "new_footer";
  </script>
  <input type="hidden" id="simple_spc" name="simple_spc" value="83302541638454" />
  <script type="text/javascript">
  document.getElementById("si" + "mple" + "_spc").value = "83302541638454-83302541638454";
  </script>
  
</form>
<!-- </div> -->




<!-- end -->

        </div>
      </div>

<!--  -->















    


  
  <script src="js/scripts-all.js"></script>
  <script src="js/main.js"></script>
  <script src="js/google-map.js"></script>
  

<script src="css/cv_form.js" type="text/javascript"></script>
<script type="text/javascript">
   JotForm.init(function(){
      setTimeout(function() {
          $('input_4').hint('ex: myname@example.com');
       }, 20);
    /*INIT-END*/
});

   JotForm.prepareCalculationsOnTheFly([null,{"name":"fullName","qid":"1","text":"Full Name:","type":"control_fullname"},null,{"name":"address","qid":"3","text":"Address:","type":"control_address"},{"name":"email","qid":"4","text":"E-mail:","type":"control_email"},{"name":"skillLevel","qid":"5","text":"Skill Level:","type":"control_dropdown"},{"name":"areasOf","qid":"6","text":"Areas Of Interest:","type":"control_checkbox"},{"name":"coverLetter","qid":"7","text":"Cover Letter:","type":"control_textarea"},null,{"name":"phone","qid":"9","text":"Phone:","type":"control_phone"},null,{"name":"submitForm","qid":"11","text":"Submit Form","type":"control_button"},{"name":"resume","qid":"12","text":"Resume","type":"control_fileupload"},{"name":"clickTo","qid":"13","text":"Submit a Resume","type":"control_head"}]);
   setTimeout(function() {
JotForm.paymentExtrasOnTheFly([null,{"name":"fullName","qid":"1","text":"Full Name:","type":"control_fullname"},null,{"name":"address","qid":"3","text":"Address:","type":"control_address"},{"name":"email","qid":"4","text":"E-mail:","type":"control_email"},{"name":"skillLevel","qid":"5","text":"Skill Level:","type":"control_dropdown"},{"name":"areasOf","qid":"6","text":"Areas Of Interest:","type":"control_checkbox"},{"name":"coverLetter","qid":"7","text":"Cover Letter:","type":"control_textarea"},null,{"name":"phone","qid":"9","text":"Phone:","type":"control_phone"},null,{"name":"submitForm","qid":"11","text":"Submit Form","type":"control_button"},{"name":"resume","qid":"12","text":"Resume","type":"control_fileupload"},{"name":"clickTo","qid":"13","text":"Submit a Resume","type":"control_head"}]);}, 20); 
</script>

  </body>
</html>