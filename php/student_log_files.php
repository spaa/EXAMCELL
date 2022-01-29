
<?php include'dashboard_header.php';
if($_SESSION['user_type']!="STUDENT"){
	echo "<script>window.location.href='403-forbidden-error.php';</script>";
}
?>
<?php include'server.php';?> 

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/w3.css">
	<link rel="stylesheet" href="../css/examform.css">

	<!--Custom File Choose Button Styling -->
	<link rel="stylesheet" type="text/css" href="../css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="../css/demo.css" />
	<link rel="stylesheet" type="text/css" href="../css/component.css" />

	<!--JQuery link -->
	<script src="../js/jquery.min.js"></script>

	<title>LOG</title>
</head>
<body>
	<form class="w3-mobile w3-margin"  enctype="multipart/form-data">
		<div class="w3-card-4 w3-margin w3-center w3-white">

			<div class="w3-container w3-black w3-padding-large w3-xxlarge" style="text-shadow:1px 1px 0 orange">LOGS
			</div>

			 
		    <!--Subject Obtained -->
		   
		      <table class="w3-table-all w3-card-4">
	<table class="w3-table w3-border">
		<tr>
			<th>Description</th>
			<th>Status</th>
			<th>Comment</th>
		</tr>
		<tr>
			<td> HallTicket</td>
			<td><b>Verified</b></td>
			<td>
		    <textarea id= 'address' name= 'address' class='w3-container w3-input w3-disabled' rows='2' cols='10' placeholder='COMMENTS' required autocomplete></textarea>
		</td>
		</tr>
		<tr>
			<td>Exam Form</td>
			<td><b>Verified</b></td>
			<td>
		    <textarea id= 'address' name= 'address' class='w3-container w3-input w3-disabled' rows='2' cols='10' placeholder='COMMENTS' required autocomplete></textarea>
		</td>
		</tr>

	</table>


	<script src="../js/datedropper.js"></script>

	<script type="text/javascript" src="../js/exam_form.js"></script>

	<script type="text/javascript" src="../js/student_staff_registration_form.js"></script>

	<!--Custom File Choose Button Java Script -->
  	<script src="../js/custom-file-input.js"></script>   
	
</body>
</html>
	
	
