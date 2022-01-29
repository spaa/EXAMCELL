<?php include'dashboard_header.php';
if($_SESSION['user_type']!="EXAMCELL"){
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

	<form class="w3-mobile w3-margin" action="staff_registration_form.inc.php" method="post" enctype="multipart/form-data">
		<div class="w3-card-4 w3-margin w3-center w3-white">

			<div class="w3-container w3-black w3-padding-large w3-xxlarge" style="text-shadow:1px 1px 0 orange">STAFF REGISTRATION
			</div>

			<div class="w3-button w3-block w3-black w3-left-align w3-large">
				<span class="w3-badge w3-white">1</span> PERSONAL INFORMATION OF STAFF
			</div>
			<!--Name Field inputs:--->
			<div id="Container1" class="w3-container w3-row-padding w3-padding w3-animate-zoom">

			
					<div class="w3-container w3-row w3-padding">
		      		        
				        <div class="w3-container w3-padding w3-quarter">
				            <input type="text" id="firstname" class="w3-input" name="firstname" placeholder="FIRST NAME *" oninput="capatilize('firstname')" required autocomplete>
				        </div>
				        <div class="w3-container w3-padding w3-quarter">
				            <input type="text" id="middlename" class="w3-input" name="middlename" placeholder="MIDDLE NAME *" oninput="capatilize('middlename')" required autocomplete>
				        </div>
				        <div class="w3-container w3-padding w3-quarter">
				            <input type="text" id="lastname" class="w3-input" name="lastname" placeholder="LAST NAME *" oninput="capatilize('lastname')" required autocomplete>
				        </div>
				        <div class="w3-container w3-padding w3-quarter">
				            <input type="text" id="mothername" class="w3-input" name="mothername" placeholder="MOTHERS NAME *" oninput="capatilize('mothername')" required autocomplete>

				        </div>
				    </div>

				    <div  class="w3-container w3-row w3-padding">
				    	
				    	<div class="w3-container w3-padding w3-half">
				        	<input id="dob" class="w3-input" type="text" name="dob" placeholder="DATE OF BIRTH *">
				        </div>

				    	<div class="w3-container w3-padding w3-half">
				            <select class="w3-select w3-padding-large" name="gender">
				            	<option value="" selected disabled>GENDER</option>
				            	<option value="MALE">MALE</option>
				            	<option value="FEMALE">FEMALE</option>
				            	<option value="OTHERS">OTHERS</option>
				            </select>
				        </div>
				        
				        
				    </div>

				    <div  class="w3-container w3-row w3-padding">

				    	<div class="w3-container w3-padding w3-half">
				            <input type="email" class="w3-input" name="email" placeholder="EMAIL ID *" autocomplete>
				        </div>
				    	
				        <div class="w3-container w3-padding w3-half">
				            <input type="text" maxlength="10" class="w3-input" name="mobile_no" pattern="[0-9]{10}" placeholder="MOBILE NUMBER *" autocomplete>
				        </div>
				        
				        
				    </div>

				    <div  class="w3-container w3-row w3-padding">
						<div class="w3-container w3-padding w3-half">
				            <select id="shift" class="w3-select" name="shift">
								<option value="" selected disabled>SHIFT</option>
								<option value="1">I</option>
								<option value="2">II</option>
							</select>
				        </div>

				        <div class="w3-container w3-padding w3-half">
				            <input type="text" name="joining_date" id="joining_date" class="w3-input" placeholder="JOINING DATE *">
				        </div>

				    </div>


				    
					<div  class="w3-container w3-row w3-padding">
				    	
				        <div class="w3-container w3-padding w3-third">
				            <select class="w3-select w3-padding-large" name="marital_status">
						    	<option value="" disabled selected>MARITAL STATUS</option>
						    	<option value="SINGLE">SINGLE</option>
						    	<option value="MARRIED">MARRIED</option>
							</select>
				        </div>
				        
				        <div class="w3-container w3-padding w3-third">
				            <select class="w3-select w3-padding-large" name="blood_group">
						    	<option value="" disabled selected>BLOOD GROUP</option>
						    	<option value="NONE">NONE</option>
						    	<option value="A+">A+</option>
						    	<option value="B+">B+</option>
						    	<option value="O+">O+</option>
						    </select>
				        </div>

				        <div class="w3-container w3-padding w3-third">
							<select id="course" class="w3-select" name="branch">
								<option value="" selected disabled>BRANCH</option>
								<option value="BIOMED BM">BIO-MED ENGINEERING</option>
								<option value="BIOTECH BT">BIO-TECH ENGINEERING</option>
								<option value="CIVIL CE">CIVIL ENGINEERING</option>
								<option value="CHEMICAL CH">CHEMICAL ENGINEERING</option>
								<option value="COMPUTER CS">COMPUTER ENGINEERING</option>
								<option value="ELECTRICAL EE">ELECTRICAL ENGINEERING</option>
								<option value="EXTC ET">EXTC ENGINEERING</option>
								<option value="IT IT">IT ENGINEERING</option>
								<option value="MECHANICAL ME">MECHANICAL ENGINEERING</option>
								<option value="FE FE">FE ENGINEERING</option>
							</select>
						</div>

				    </div>

					<!--Proceed to next Container 
				<div class="w3-ceter w3-teal w3-button w3-margin" onclick="hide_show('Container1','Container2')">Proceed
				</div>-->
			</div> 

			<!--Address Field:--->
		    <div class="w3-button w3-block w3-black w3-left-align"><span class="w3-badge w3-white">2</span> ADDRESS DETAILS</div>
		    <div id="Container2" class="w3-container w3-row w3-padding w3-animate-zoom">
		        
		        <div class="w3-container w3-padding">
		            <textarea id="address" name="address" class="w3-container w3-input" rows="3" cols="40" style="resize: none;" placeholder="ADDRESS" oninput="capatilize('address')" required autocomplete></textarea>
		        </div>

		        <div class="w3-container w3-padding w3-half">
					<input type="text" id="state" name="state" class="w3-input" placeholder="STATE" oninput="capatilize('state')" required autocomplete>
				</div>

		        <div class="w3-container w3-padding w3-half">
					<input type="text" id="district" name="district" class="w3-input" placeholder="DISTRICT" oninput="capatilize('district')" required autocomplete>
				</div>

				<div class="w3-container w3-padding w3-half">
					<input type="text" id="city" name="city" class="w3-input" placeholder="CITY/TAHSIL" oninput="capatilize('city')" required autocomplete>
				</div>

				<div class="w3-container w3-padding w3-half">
		            <input class="w3-input" id="pincode" name="pincode" maxlength='6' pattern="[0-9]{6}" placeholder='PINCODE' required autocomplete />
		        </div>

				<!--Proceed to next Container 
				<div class="w3-ceter w3-teal w3-button w3-margin" onclick="hide_show('Container2','Container3')">Proceed
		      	</div>-->
		    </div> 


		    <!--Name Field:--->
		    <div class="w3-button w3-block w3-black w3-left-align">
		      <span class="w3-badge w3-white">3</span> PHOTO AND SIGNATURE UPLOAD</div>
		    <!--Name Field inputs:--->
		    <div id="Container3" class=" w3-container w3-row-padding w3-padding w3-animate-zoom">

				<div class="w3-container w3-content w3-padding">
			        <!--photo details:--->
			        <div class="w3-third">
			          <div id="wrapper">
			            <input type='file' id="photo" name="file1" accept="image/*" capture style="display:none"/>
			            <div style="width: 200px;height:250px">
			                  <img id="photo_img" src="http://macgroup.org/blog/wp-content/uploads/2011/10/iphone-camera-icon-150x150.jpg" style="width: 200px;height: 250px;" alt="Photo" />
			            </div>
			          </div>
			          <div class="w3-container w3-center">
			        		<p name="upload_photo" id="photo_change" class="w3-button w3-teal w3-round" >CHOOSE PHOTO</p>
			        		
			          </div>
			        </div>

			        <!--signature details:--->
			        <div class="w3-third">
			        	<div id="wrapper">       
			            	<input type='file' id="signature" name="file2" accept="image/*" capture style="display:none"/>
			            	<div style="width: 200px;height:150px">
			                  <img id="signature_img" src="http://macgroup.org/blog/wp-content/uploads/2011/10/iphone-camera-icon-150x150.jpg" style="width: 200px;height: 150px;" alt="Signature" />
			            	</div>
			        	</div>
			        	<div class="w3-container w3-center">
			        		<p name="upload_signature" id="signature_change" class="w3-button w3-teal w3-round">CHOOSE SIGNATURE</p>
			        	</div>
			        </div>

			    </div>
				
				<input type="submit" name="upload" class="w3-btn w3-margin w3-padding-large w3-teal w3-round-xxlarge w3-center">
		    </div>

		</div>
	</form>
<!--Date Picker-->
	<script src="../js/datedropper.js"></script>

	<script type="text/javascript" src="../js/student_staff_registration_form.js"></script>
	
	<script type="text/javascript" src="../js/exam_form.js"></script>

	<!--Custom File Choose Button Java Script -->
  	<script src="../js/custom-file-input.js"></script>   
	
</body>
</html>