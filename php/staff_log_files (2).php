<?php include'dashboard_header.php';
if($_SESSION['user_type']!="STAFF"){
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

	<title>Document</title>
</head>
<body>

	<form class="w3-mobile w3-margin" action="student_registration_form.inc.php" method="post" enctype="multipart/form-data">
		<div class="w3-card-4 w3-margin w3-center w3-white">

			<div class="w3-container w3-black w3-padding-large w3-xxlarge" style="text-shadow:1px 1px 0 orange">LOGS
			</div>

			 
		    <!--Subject Obtained -->
		    <div class="w3-button w3-block w3-black w3-left-align"><span class="w3-badge w3-white">1</span> EDUCATIONAL DETAILS SECTION</div>
		    <div id="Container4" class="w3-center w3-container w3-padding-24 w3-animate-zoom">
		    <div class="w3-responsive">
		      <table class="w3-table-all w3-card-4">
		          <thead>
		            <tr class="w3-teal _9_documents">
		                <th>Student Names</th>
		                <th>UID</th>
                        <th>10<sup>th</sup> Marksheet</th>
                        <th>12<sup>th</sup> or Diploma Marksheet</th>
                        <th>Semester 1</th>
                        <th>Semester 2</th>
                        <th>Semester 3</th>
                        <th>Semester 4</th>
                        <th>Semester 5</th>
                        <th>Semester 6</th>
                        <th>Semester 7</th>
                        <th>Semester 8</th>
                        <th>Comments</th>
                        <th colspan="2">Status</th>
		            </tr>
		          </thead>
                  <?php

                  $uid = '';
                  $name = '';
                  $tenth_doc  = '';
                  $tw_or_dp_doc = '';
                  $sem1 = '';
                  $sem2 = '';
                  $sem3 = ''; 
                  $sem4 = '';
                  $sem5 = '';
                  $sem6 = '';
                  $sem7 = '';
                  $sem8 = '';
                  
                  $query = "SELECT * FROM student_general_info WHERE current_year = 'FE'";
                  $result = mysqli_query($db,$query);
                  if(mysqli_num_rows($result)>0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $uid = $row["uid"];
                            $name = $row["first_name"]." ".$row["middle_name"]." ".$row["last_name"];
                            $tenth_doc = $row["ssc_marksheet"];
                            $tw_or_dp_doc = $row["hsc_marksheet"];
                            $sem1 = $row["sem1_document"];
                            $sem2 = $row["sem2_document"];
                            $sem3 = $row["sem3_document"];
                            $sem4 = $row["sem4_document"];
                            $sem5 = $row["sem5_document"];
                            $sem6 = $row["sem6_document"];
                            $sem7 = $row["sem7_document"];
                            $sem8 = $row["sem8_document"];
                            echo"
                                
                            <tr>
		                    <td> $name </td>
		                    <td> $uid </td>
                            <td >
		            	<a  href='$tenth_doc'  class='w3-btn w3-teal w3-large w3-padding'>Click here...</a>
		            </td>
                      <td>
		            	<a  href='$tw_or_dp_doc'  class='w3-btn w3-teal w3-large w3-padding'>Click here...</a>
		            </td>
                      <td>
		            	<a  href='$sem1'  class='w3-btn w3-teal w3-large w3-padding'>Click here...</a>
		            </td>  
                      <td>
		            	<a  href='$sem2' class='w3-btn w3-teal w3-large w3-padding'>Click here...</a>
		            </td> 
                      <td>
		            	<a  href='$sem3' class='w3-btn w3-teal w3-large w3-padding'>Click here...</a>
		            </td>
                      <td>
		            	<a  href='$sem4'  class='w3-btn w3-teal w3-large w3-padding'>Click here...</a>
		            </td>
                      <td>
		            	<a  href='$sem5'  class='w3-btn w3-teal w3-large w3-padding'>Click here...</a>
		            </td>
                      <td>
		            	<a  href='$sem6'  class='w3-btn w3-teal w3-large w3-padding'>Click here...</a>
		            </td>
                      <td>
		            	<a  href='$sem7'  class='w3-btn w3-teal w3-large w3-padding'>Click here...</a>
		            </td>
                      <td>
		            	<a  href='$sem8'  class='w3-btn w3-teal w3-large w3-padding'>Click here...</a>
		            </td>
                      <td>
		            	<textarea id= 'address' name= 'address' class='w3-container w3-input' rows='3' cols='40' placeholder='COMMENTS' required autocomplete></textarea>
		            </td>
                      <td>
                          <a  href='$sem3'  class='w3-btn w3-red w3-large w3-padding'>Verified </a> </td>
                      <td><a  href='$sem3'  class='w3-btn w3-teal w3-large w3-padding'> Not Verified </a> 
		            </td>
		          </tr>
        ";
    }
}
                  ?>
                </table>
			<!--Proceed to next Container
		      <div class=" w3-ceter w3-teal w3-button w3-margin" onclick="hide_show('Container4','Container5')">Proceed
		      </div> -->

		    </div>
		
				<input type="submit" name="upload" class="w3-btn w3-margin w3-padding-large w3-teal w3-round-xxlarge w3-center">
		    </div>

		</div>
	</form>
<!--Date Picker-->
	<script src="../js/datedropper.js"></script>

	<script type="text/javascript" src="../js/exam_form.js"></script>

	<script type="text/javascript" src="../js/student_staff_registration_form.js"></script>

	<!--Custom File Choose Button Java Script -->
  	<script src="../js/custom-file-input.js"></script>   
	
</body>
</html>