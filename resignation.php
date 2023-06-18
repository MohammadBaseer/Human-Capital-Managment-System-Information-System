<?php 
include_once('header.php');


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
<h5 class="m-b-10">Resignation</h5>
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="home.php"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item"><a href="javascript:">Resignation</a></li>
</ul>
</div>
</div>
</div>
</div>
<div class="main-body">
<div class="page-wrapper">

<div class="row">
<div class="col-xl-12 col-md-12">
<div class="card Application-list">
<div class="card-header">
<h5>Resignation</h5> 
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
<div class="card-block pb-0" style="padding: 15px 0px;">
<!-- ========================================================== -->



<div class="col-sm-12">

<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
<!--  -->
<li class="nav-item">
<a class="nav-link active" href="#">Resignation</a>
</li>
<!--  -->
<!--  -->
<li class="nav-item">
<a class="nav-link" href="resignation_rejected.php">Rejected Resignation</a>
</li>
</ul>




<div class="tab-content" id="pills-tabContent">
<!--  -->
<div class="tab-pane fade show active" id="pills-submit" role="tabpanel" aria-labelledby="pills-submit-tab">
<!-- ======================= -->
<div class="table-responsive">
<a href="resignation_form.php" class="btn btn-success md-close" name="send" >Resignation Form</a>
<div id="print">

</div>
<br><br>
</div>
</div>
<!-- ======================= -->
</div>
<!--  -->
</div>


<br><br>
<!-- ========================================================== -->
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
</div>
<script>
  function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var orginalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = orginalContents;
  }
</script>
<?php 

include_once('footer.php');
 ?>


