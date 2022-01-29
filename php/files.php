
<?php include'server.php';
$date = "2-4-2019";
$dob = '';
$year = explode('-',$date);
echo $year[0];
echo $date;
echo $year[1];
echo "<br><br><br>";

$year = date('Y-m-d',strtotime($date));
$uid_year = date('y',strtotime($year));
echo $year;
echo "<br>".$uid_year."<br>"."<br>";

if(isset($_POST['upload'])){
$dob = date('d-m-Y',strtotime($_POST['dob']));

echo $dob;
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<link rel="stylesheet" href="../css/w3.css">
	<link rel="stylesheet" href="../css/examform.css">
	<link rel="stylesheet" href="../css/datedropper.css">
	<!--JQuery link -->
	<script src="../js/jquery.min.js"></script>

	<title>Document</title>
</head>
<body>
<form id="user_details" method="post" action="files.php" enctype="multipart/form-data">
	<div>

		<div class="w3-container w3-padding w3-third">
       	<input id="dob" class="w3-input" type="text" name="dob" placeholder="DATE OF BIRTH *">
</div>
		
			<button name="upload">UPLOAD A</button>
			
		
		<div class="w3-container w3-padding w3-third">
				            <select id="gender" class="w3-select w3-padding-large" name="gender" onchange="document.getElementByID('g').innerHTML=document.getElementByID('gender').value">
				            	<option value="" selected disabled>GENDER</option>
				            	<option value="male M">MALE</option>
				            	<option value="F">FEMALE</option>
				            	<option value="others">OTHERS</option>
				            </select>
		</div>
		
</form>



<!--Date Picker-->
	<script src="../js/datedropper.js"></script>
	<script type="text/javascript" src="../js/student_staff_registration_form.js"></script>

	<script type="text/javascript" src="../js/student_registration_form.js"></script>
	
	<script type="text/javascript" src="../js/exam_form.js"></script>

	<!--Custom File Choose Button Java Script -->
  	<script src="../js/custom-file-input.js"></script> 


</body>