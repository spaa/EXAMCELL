<?php include'dashboard_header.php';
	if($_SESSION['user_type']!="STUDENT"){
		echo "<script>window.location.href = '../php/403-forbidden-error.php';</script>";		
	}
	else{
		include 'acad_det_form.inc.php';
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/w3.css">
	<link rel="stylesheet" href="../css/examform.css">

	<!--Date Picker-->
	<link rel="stylesheet" href="../css/datedropper.css">
	
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

			<div class="w3-container w3-black w3-padding-large w3-xxlarge" style="text-shadow:1px 1px 0 orange">STUDENT ACADEMIC DETAILS
			</div>
			
			<div class="w3-display-container w3-panel w3-pale-blue w3-card-4 w3-center">
		        <span onclick="this.parentElement.style.display='none'" class="w3-btn w3-pale-blue w3-large w3-display-topright">x</span>
		        <p>Click on links to view the documents</p>
		      </div>
			 
		    <!--Subject Obtained -->
		    <div class="w3-button w3-block w3-black w3-left-align"><span class="w3-badge w3-white">1</span> EDUCATIONAL DETAILS SECTION</div>
		    <div id="Container4" class="w3-center w3-container w3-padding-24 w3-animate-zoom">
		    <div class="w3-responsive">
		      <table class="w3-table-all w3-card-4">
		          <thead>
		            <tr class="w3-teal _9_documents">
		              <th>Document Name</th>
		              <th>Links</th>
		            </tr>
		          </thead>
		          <tr>
		          <td>10<sup>th</sup></td>
		            <td>
		            	
		            	<a <?php echo "href='$tenth_doc'"?> class="w3-btn w3-teal w3-large w3-padding">10th document </a>
		            </td>
		          </tr>
		          <tr>
		            <td>12<sup>th</sup>/ DIPLOMA</td>
		            <td>
		            	
		            <a <?php echo "href='$tw_or_dp_doc'"?> class="w3-btn w3-teal w3-large w3-padding">12th/diploma document </a>

		            </td>
		          </tr>
		          
                   <tr>
		            <td>Semester 1</td>
		            <td>
		            	
		            	<a <?php echo "href='$sem1'"?> class="w3-btn w3-teal w3-large w3-padding">Semester 1 document</a>

		            </td>
		          </tr>
                  
                <tr>
		            <td>Semester 2</td>
		            <td>
		            	
		            	<a <?php echo "href='$sem2'"?> class="w3-btn w3-teal w3-large w3-padding">Semester 2 document</a>

		            </td>
		          </tr>
                  <tr>
		            <td>Semester 3</td>
		            <td>
		            	
		            	<a <?php echo "href='$sem3'"?> class="w3-btn w3-teal w3-large w3-padding">Semester 3 document</a>

		            </td>
		          </tr>
                  <tr>
		            <td>Semester 4</td>
		            <td>
		            	
		            	<a <?php echo "href='$sem4'"?> class="w3-btn w3-teal w3-large w3-padding">Semester 4 document</a>

		            </td>
		          </tr>
                  <tr>
		            <td>Semester 5</td>
		            <td>
		            	
		            <a <?php echo "href='$sem5'"?> class="w3-btn w3-teal w3-large w3-padding">Semester 5 document</a>

		            </td>
		          </tr>
                  <tr>
		            <td>Semester 6</td>
		            <td>
		            	
		            	<a <?php echo "href='$sem6'"?> class="w3-btn w3-teal w3-large w3-padding">Semester 6 document</a>

		            </td>
		          </tr>
                  <tr>
		            <td>Semester 7</td>
		            <td>
		            	
		            	<a <?php echo "href='$sem7'"?> class="w3-btn w3-teal w3-large w3-padding">Semester 7 document</a>

		            </td>
		          </tr>
                  <tr>
		            <td>Semester 8</td>
		            <td>
		            	
		            	<a <?php echo "href='$sem8'"?> class="w3-btn w3-teal w3-large w3-padding">Semester 8 document</a>

		            </td>
		          </tr>
		      </table>
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