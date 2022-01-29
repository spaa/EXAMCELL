<?php 
session_start();?>
<?php 
  if (!isset($_SESSION['uid'])) {
    header('Location: dashboard.php?logout="1"');
  }
  if ($_SESSION['otp_verified'] != 1) {
    header('Location: dashboard.php?logout="1"');
  }
  $name = $_SESSION['username'];
?>
<?php include'server.php';?>
<?php include'logout.inc.php';?>
<!DOCTYPE html>
<html>
<title>DASHBOARD</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" type="text/css" href="../css/examform.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" href="../images/logo1.png">

  <!--Custom File Choose Button Styling -->
  <link rel="stylesheet" type="text/css" href="../css/normalize.css" />
  <link rel="stylesheet" type="text/css" href="../css/demo.css" />
  <link rel="stylesheet" type="text/css" href="../css/component.css" />
<!--JQuery link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-white" >

<!-- POP UP MESSAGE -->
<?php 

if(isset($_SESSION['message'])){
  $messge_header = substr($_SESSION['message'],0,7);
  $message = substr($_SESSION['message'],8);
  if($messge_header=="SUCCESS"){
    $color = "w3-green";
  }else{
    $color = "w3-red";
  }
  echo "<div id='m' class='w3-container w3-center w3-margin w3-padding w3-animate-top' style='position:relative;top:100px'>

  <!-- Modal content -->
  <div class='w3-card-4 w3-half w3-display-topmiddle'>
    <div class='$color w3-container' style='padding:0'>
      <span class='w3-bar-item w3-grey w3-right w3-button w3-xxlarge' onclick='document.getElementById(`m`).style.display=`none`;'>&times;</span>
      <h2 class='w3-bar-item'>$messge_header</h2>
    </div>
    <div class='w3-pale-green w3-container'>
      <p>$message</p>
    </div>
  </div>

</div>
";
  unset($_SESSION['message']);
}
?>

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
 <span class="w3-bar-item w3-left" style="position:relative;left:3.5%;"><img src ="../images/logo1.png" width="70px" height="60px"><span class="" style="font-size:30px;"><b class="w3-hide-small w3-hide-medium"> &nbsp;&nbsp; ENGINEERING COLLEGE </b><b class="w3-hide-large ">&nbsp;&nbsp;EC</b></span></span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="height:500px;z-index:5;width:300px;top:75px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <?php echo "<img src='".$_SESSION['photo']."' class='w3-circle w3-margin-right' style='width:66px'>";?>
    </div>
    <div class="w3-col s8 w3-bar">
      <?php echo "<span>Welcome, <strong>".$_SESSION['name']."</strong></span>";?><br>
      <?php echo "<span>UID : <strong>".$_SESSION['uid']."</strong></span>";?><br>
        <?php echo "<span>DEPARTMENT : <strong id='department'>".$_SESSION['branch']."</strong> (<strong id='department_short_name'>".$_SESSION['branch_short_name']."</strong>)</span>";?><br>
    </div>
  </div>
  <hr>
<?php if ($_SESSION['user_type']=="STUDENT"):?>
<div class='w3-container' id='dashboard'>
      <h5><b>STUDENT DASHBOARD</b></h5>
    </div>
    <div class='w3-bar-block' id='navigation'>
      <a href='../php/session_user_details.php' id='nav1' class='w3-bar-item w3-hover-text-orange w3-hover-teal w3-button w3-padding'><i class='fas fa-user-circle' style='font-size:18px'></i>  PROFILE</a>
      <a href='../php/change_pwd.php' class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i class='fas fa-unlock'></i> CHANGE PASSWORD</a>
      <a href='../php/acad_det.php' id='nav2' class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i class='fas fa-book-reader'></i>  ACADEMIC DETAILS</a>
      <a href='../php/admission_form_page.php' id='nav3' class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i class='fas fa-money-check'></i>  ADMISSION FORM </a>      
      <ul id="child" style="margin:0px;padding:0px;list-style-type:none;" onmouseover="show(this)" onmouseout="hide(this)">
      <a href='../php/exam_form_page.php' id='nav3' class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal' onmouseover="show(this)" onmouseout="hide(this)"><i class='fas fa-money-check'></i>  EXAMFORM </a>      
        <li style="display:none;margin-left:30px;"><a href="regular_form.php" class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i class='fas fa-money-check'></i> REGULAR FORM</a></li>
        <li style="display:none;margin-left:30px;"><a href="kt_form.php" class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i class='fas fa-money-check'></i> KT FORMS</a></li>
      </ul>
      <a href='../php/pdf_convert.php' id='nav4' class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i class='far fa-id-card'></i>  HALLTICKET</a>
      <a href='../php/pdf_convert_marksheet.php' id='nav6' class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i class='far fa-newspaper'></i>  GATZET</a>
      <a href='../php/student_log_files.php' id='nav6' class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i class='fas fa-envelope-open-text'></i> LOG MESSAGES</a>
      <a href="dashboard.php?logout='1'" class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i class='fas fa-key'></i> LOGOUT</a>
      
      <!--<a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  News</a>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>  General</a>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  History</a>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>
-->
    </div>
  </nav>
<?php endif?>
<?php if ($_SESSION['user_type']=="STAFF"):?>
<div class='w3-container' id='dashboard'>
      <h5><b>STAFF DASHBOARD</b></h5>
    </div>
    <div class='w3-bar-block' id='navigation'>
      <a href='../php/session_user_details.php' id='nav1' class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i class='fas fa-user-circle' style='font-size:18px'></i>  PROFILE</a>
      <a href='../php/change_pwd.php' class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i class='fas fa-unlock'></i> CHANGE PASSWORD</a>
      
      <a href='../php/subjects_alloted.php' id='nav3' class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i class='fas fa-edit'></i> SUBJECTS ALLOTED</a>
<?php if($_SESSION["class_incharge"]=='1'):?>
      <a href='../php/staff_log_files (2).php' id='nav4' class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i class='fas fa-user-check'></i>
  HALLTICKET VERIFICATION</a>
<?php endif?>
<a href='../php/staff_notification.php' class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i class='fa fa-diamond fa-fw'></i>  NOTIFICATIONS <span class='w3-badge w3-margin-left'>0</span></a>
      <a href="dashboard.php?logout='1'" class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i class='fas fa-key'></i> LOGOUT</a>
      <!--
      <a href='#' id='nav2' onclick='activate_link('nav2')' class='w3-bar-item w3-button w3-padding'><i class='fa fa-eye fa-fw'></i>  ACADEMIC DETAILS</a>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  News</a>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>  General</a>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  History</a>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>-->
    </div>
  </nav>
<?php endif?>
<?php if($_SESSION['user_type']=="EXAMCELL"):?>
    <div class='w3-container' id='dashboard'>
      <h5><b>EXAMCELL DASHBOARD</b></h5>
    </div>
    <div class='w3-bar-block' id='navigation'>
    <a href='../php/session_user_details.php' id='nav1'
      class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i class='fas fa-user-circle'
        style='font-size:18px'></i> PROFILE</a>
    <a href='../php/change_pwd.php' class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i
        class='fas fa-unlock'></i> CHANGE PASSWORD</a>
    <a href='../php/staf_registration_form.php' id='nav2'
      class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i class='fa fa-eye'></i> STAFF REGISTRATION</a>
    <a href='../php/index.php' id='nav3' class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i
        class='fas fa-user-plus'></i> STUDENT REGISTRATION</a>
    <a href="exam_form_activation.php" class="w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal"><i class="fa fa-bell"></i>  ACTIVATE EXAM FORM</a>
    <a href="admission_form_activation.php" class="w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal"><i class="fa fa-bell"></i>  ACTIVATE ADMISSION FORM</a>
    <a href='../php/log_message.php' id='nav4' class='w3-bar-item w3-button w3-padding'><i class='fas fa-envelope-open-text'></i>
      LOG MESSAGES</a>
    <a href="dashboard.php?logout='1'" class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i
        class='fas fa-key'></i> LOGOUT</a>".
    <!--<a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i> HALLTICKET </a>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>  General</a>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  History</a>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>-->
  </div>
  </nav>
<?php endif ?>
<?php if($_SESSION['user_type']=="HOD"):?>
<div class='w3-container' id='dashboard'>
      <h5><b>HOD DASHBOARD</b></h5>
    </div>
    <div class='w3-bar-block' id='navigation'>
      <a href='../php/session_user_details.php' id='nav1' class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i class='fas fa-user-circle' style='font-size:18px'></i>  PROFILE</a>
      <a href='../php/change_pwd.php' class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i class='fas fa-unlock'></i> CHANGE PASSWORD</a>
      <a href='../php/create_new_class.php' id='nav2' class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i class='fas fa-chalkboard-teacher'></i>  ADD CLASS</a>
      <a href='../php/add_students.php' id='nav2' class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i class='fas fa-chalkboard-teacher'></i>  ADD STUDENTS</a>
      <a href='../php/hod_log_files.php' id='nav3' class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i class='fas fa-envelope-open-text'></i> LOG MESSAGES</a>
      <a href='../php/sem_link_activation.php' class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i class='fa fa-diamond fa-fw'></i> ACTIVATE EXAM LINK</a>      
      <a href="dashboard.php?logout='1'" class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i class='fas fa-key'></i> LOGOUT</a>".
      <!--<a href='#' class='w3-bar-item w3-button w3-padding'><i class='fa fa-users fa-fw'></i>  STUDENT REGISTRATION</a>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i> HALLTICKET </a>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  News</a>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>  General</a>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  History</a>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>-->
    </div>
  </nav>
<?php endif?>
<?php if($_SESSION['user_type']=="ADMIN"):?>
<div class='w3-container' id='dashboard'>
      <h5><b>HOD DASHBOARD</b></h5>
    </div>
    <div class='w3-bar-block' id='navigation'>
      <a href='../php/session_user_details.php' id='nav1' class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i class='fas fa-user-circle' style='font-size:18px'></i>  PROFILE</a>
      <!-- <a href='../php/change_pwd.php' class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i class='fas fa-unlock'></i> CHANGE PASSWORD</a> -->
      <a href='../php/add_or_modify_subjects.php' id='nav2' class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i class='fas fa-chalkboard-teacher'></i>  ADD SUBJECT</a>
      <a href="dashboard.php?logout='1'" class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i class='fas fa-key'></i> LOGOUT</a>".
      <!-- <a href='../php/add_students.php' id='nav2' class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i class='fas fa-chalkboard-teacher'></i>  ADD STUDENTS</a>
      <a href='../php/hod_log_files.php' id='nav3' class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i class='fas fa-envelope-open-text'></i> LOG MESSAGES</a>
      <a href='../php/sem_link_activation.php' class='w3-bar-item w3-button w3-padding w3-hover-text-orange w3-hover-teal'><i class='fa fa-diamond fa-fw'></i> ACTIVATE EXAM LINK</a>      --> 
    </div>
  </nav>
<?php endif?>
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!--FOOTER -->
<div class="w3-container w3-black w3-text-grey" style="position:fixed;bottom:0px;z-index:100;width:100%;">
<p><span style="position:relative;left:50%;">&copy; Copyright 2018-<?php echo date("Y");?></span>  <span class="w3-right">Developed by:- <b>SWAPNIL SUNIL CHOPADE</b></span></p>
</div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px; background-image:url('../images/blurred-background-coffee-cup-contemporary-908284.jpg'); ">

  <!-- Header -->
  
   <img src="../images/blurred-background-coffee-cup-contemporary-908284.jpg" width="1080px" height="580px" >
 
  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}

function show(id){
  id.children[1].style.display = "block";
  id.children[2].style.display = "block";
}

function hide(id){
  id.children[1].style.display = "none";
  id.children[2].style.display = "none";
}

/*function activate_link(id) {
  //var dashboard_name = document.getElementById('dashboard').children[0].innerHTML;
  var dashboard_name = document.getElementById('dashboard');
  if(dashboard_name.classList.add){
    dashboard_name.classList.add("w3-orange");
  }
  else{
    //for IE9 browser...CROSS BROWSER SOLUTION
    dashboard_name.className += " w3-orange ";
  }
  dashboard_name.setAttribute("style","text-shadow:1px 1px 0 #444");
}*/
</script>

</body>
</html>
