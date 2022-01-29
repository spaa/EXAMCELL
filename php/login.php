<?php session_start();?>
<?php include'server.php';
?>
<!DOCTYPE html>
<html lang="en">
<script>
	//if by mistake after logging in user clicks back button
//login page will not open again	
if(window.performance.navigation.type == window.performance.navigation.TYPE_BACK_FORWARD){
	window.location.replace('../php/dashboard.php');
}
</script>
<head>
	<meta charset="UTF-8">
	<link rel="icon" href="../images/logo1.png">
	
	<!-- fontawsome link-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
 
	<!--<link rel="stylesheet" href="../css/style.css">-->
	<link rel="stylesheet" href="../css/w3.css">
	<link rel="stylesheet" href="../css/examform.css">

	<!-- translate login page to middle-->
	<link rel="stylesheet" href="../css/login.css">
	

	
	<!--JQuery link -->
	<script src="../js/jquery.min.js"></script>

	<title>LOGIN</title>
</head>
<body>
    
    <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
    <span class="w3-bar-item w3-left" style="position:relative;left:6%;"><img src ="../images/logo1.png" width="70px" height="60px"><span style="    font-size: 24px;"><b> &nbsp;&nbsp; ENGINEERING COLLEGE </b></span></span>
    </div>
    
	<form class="w3-container w3-mobile w3-margin w3-padding-large" action="login.inc.php" method="post" enctype="multipart/form-data">
		
		<div class="w3-content w3-third w3-animate-opacity w3-card-4 container w3-white w3-border w3-border-red" style=" ">
			
			<div class="w3-center " >

				<div class="w3-container w3-padding w3-xxlarge w3-black">
					LOGIN
				</div>

				<div class="w3-container w3-padding">
					<select class="w3-select w3-padding-large" name="user_type">
					  	<option value="" disabled selected>LOGIN AS</option>
					   	<option value="STUDENT">STUDENT</option>
					   	<option value="STAFF">STAFF</option>
					   	<option value="EXAMCELL">EXAM CELL</option>
					   	<option value="HOD">HOD</option>
					   	<option value="ADMIN">ADMIN</option>
					</select>
		        </div>
			      		        
				<div class="w3-container w3-padding w3-row">
					<label class=" fa fa-user w3-right-align w3-xlarge w3-opacity"></label>
				    <input type="text" id="uid" class="w3-input " name="uid" placeholder="UID *" oninput="capatilize('uid')" required autocomplete>
				    
				</div>
				<div class="w3-container w3-padding w3-row">
					<label class="fa fa-lock w3-right-align w3-xlarge w3-opacity"></label>
				    <input type="password" id="password" class="w3-input " name="password" placeholder="PASSWORD *" required autocomplete>
				    
				</div>
				<a href="#" class="w3-panel w3-padding w3-btn w3-hover-none w3-text-teal ">Forgot password ?</a>

				<div class="w3-container w3-margin">
					<input class="w3-container w3-btn w3-teal w3-padding w3-round-xxlarge" type="submit" name="login" value="LOGIN">
				</div>
			<div>
			
		</div>
		

	</form>

	<!--lower to upper case -->
	<script type="text/javascript" src="../js/exam_form.js"></script>

</body>