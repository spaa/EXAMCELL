
<?php include'dashboard_header.php';
if($_SESSION['user_type']!="EXAMCELL"){
	echo "<script>window.location.href='403-forbidden-error.php';</script>";
}
?>

	<form class="w3-mobile w3-margin" action="student_registration_form.inc.php" method="post" enctype="multipart/form-data">
		<div class="w3-card-4 w3-margin w3-center w3-white">

			<div class="w3-container w3-black w3-padding-large w3-xxlarge" style="text-shadow:1px 1px 0 orange">STUDENT REGISTRATION
			</div>

			<div class="w3-button w3-block w3-black w3-left-align w3-large">
				<span class="w3-badge w3-white">1</span> PERSONAL INFORMATION OF STUDENT
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
				    	
				    	<div class="w3-container w3-padding w3-third">
				        	<input id="dob" class="w3-input" type="text" name="dob" placeholder="DATE OF BIRTH *">
				        </div>

				    	<div class="w3-container w3-padding w3-third">
				            <select class="w3-select w3-padding-large" name="gender">
				            	<option value="" selected disabled>GENDER</option>
				            	<option value="MALE">MALE</option>
				            	<option value="FEMALE">FEMALE</option>
				            	<option value="OTHERS">OTHERS</option>
				            </select>
				        </div>
				    	
				        <div class="w3-container w3-padding w3-third">
				            <select class="w3-select w3-padding-large" name="medical_status">
						    	<option value="" disabled selected>MEDICAL STATUS</option>
						    	<option value="NOTHING">NOTHING</option>
						    	<option value="PHYSICALLY-HANDICAPPED">PHYSICALLY HANDICAPPED</option>
						    	<option value="BLIND">BLIND</option>
						    	<option value="OTHERS">OTHERS</option>
						    </select>
				        </div>
				        
				        
				    </div>

				    <div  class="w3-container w3-row w3-padding">

				    	<div class="w3-container w3-padding w3-third">
				            <input type="email" class="w3-input" name="email" placeholder="EMAIL ID *" autocomplete>
				        </div>
				    	
				        <div class="w3-container w3-padding w3-third">
				            <input type="text" maxlength="10" class="w3-input" name="mobile_no" pattern="[0-9]{10}" placeholder="MOBILE NUMBER *" autocomplete>
				        </div>
				        
				        <div class="w3-container w3-padding w3-third">
				            <input type="text" maxlength="10" class="w3-input" name="tel_no" pattern="[0-9]{10}" placeholder="TELEPHONE NUMBER" autocomplete>
				        </div>
				    </div>

				    <div  class="w3-container w3-row w3-padding">

				    	<div class="w3-container w3-padding w3-half">
				            <input type="email" class="w3-input" name="father_email" placeholder="FATHERS EMAIL ID" autocomplete>
				        </div>
				    	
				        <div class="w3-container w3-padding w3-half">
				            <input type="text" maxlength="10" class="w3-input" name="father_mobile_no" pattern="[0-9]{10}" placeholder="FATHERS MOBILE NUMBER" autocomplete>
				        </div>
				        
				    </div>

				    <div  class="w3-container w3-row w3-padding">

				    	<div class="w3-container w3-padding w3-half">
				            <input type="email" class="w3-input" name="mother_email" placeholder="MOTHERS EMAIL ID" autocomplete>
				        </div>
				    	
				        <div class="w3-container w3-padding w3-half">
				            <input type="text" maxlength="10" class="w3-input" name="mother_mobile_no" pattern="[0-9]{10}" placeholder="MOTHERS MOBILE NUMBER" autocomplete>
				        </div>
				        
				    </div>
					
					<div  class="w3-container w3-row w3-padding">
				    	
				    	<div class="w3-container w3-padding w3-third">
				            <select class="w3-select w3-padding-large" name="employment_status">
				            	<option value="" selected disabled>EMPLOYMENT STATUS</option>
				            	<option value="EMPLOYED">EMPLOYED</option>
				            	<option value="UNEMPLOYED">UN EMPLOYED</option>
				            </select>
				        </div>
				    	
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

		    <!--Academic Detail:--->
		    <div class="w3-button w3-block w3-black w3-left-align"><span class="w3-badge w3-white">3</span> ACADEMIC DETAILS</div>
		    <div id="Container3" class="w3-container w3-row w3-padding w3-animate-zoom">
		        
		        <div class="w3-container w3-padding w3-half">
		            <input type="text" name="admission_year" id="admission_year" class="w3-input" placeholder="ADMISSION YEAR *">
		        </div>

		        <div class="w3-container w3-padding w3-half">
		            <select class="w3-select w3-padding-large" name="category">
				        <option value="" disabled selected>CATEGORY</option>
				        <option value="OPEN">OPEN</option>
				        <option value="SC">SC</option>
				        <option value="ST">ST</option>
				        <option value="DT">DT</option>
				        <option value="OBC">OBC</option>
				      </select> 
		        </div>

		        <div class="w3-container w3-padding w3-half">
					<select id="current_year" class="w3-select" name="current_year">
						<option value="" selected disabled>CLASS/STANDARD/YEAR</option>
						<option value="FE 1">F.E.</option>
						<option value="SE 2">S.E.</option>
					</select>
				</div>

				<div class="w3-container w3-padding w3-half">
					<select id="current_sem" class="w3-select" name="current_sem">
						<option value="" selected disabled>CLASS/STANDARD/YEAR</option>
						<option value="1">SEM 1</option>
						<option value="3">SEM 3</option>
					</select>
				</div>

		        <div class="w3-container w3-padding w3-half">
					<select id="course" class="w3-select" name="course">
						<option value="" selected disabled>COURSE NAME</option>
						<option value="COMPUTER CP">COMPUTER ENGINEERING</option>
						<option value="IT IT">IT ENGINEERING</option>
						<option value="CIVIL CV">CIVIL ENGINEERING</option>
						<option value="EXTC EX">EXTC ENGINEERING</option>
						<option value="ELECTRICAL EL">ELECTRICAL ENGINEERING</option>
						<option value="CHEMICAL CM">CHEMICAL ENGINEERING</option>
						<option value="BIOMED BM">BIO-MED ENGINEERING</option>
						<option value="BIOTECH BT">BIO-TECH ENGINEERING</option>
						<option value="MECHANICAL MC">MECHANICAL ENGINEERING</option>
					</select>
				</div>

				<div class="w3-container w3-padding w3-half">
					<input type="text" id="admission_type" name="admission_type" class="w3-input" placeholder="ADMISSION TYPE" oninput="capatilize('admission_type')" required autocomplete>
				</div>

				<div class="w3-container w3-padding w3-half">
		            <select id="shift" class="w3-select" name="shift">
						<option value="" selected disabled>SHIFT</option>
						<option value="1">I</option>
						<option value="2">II</option>
					</select>
		        </div>
				
				<!--Proceed to next Container 
				<div class="w3-ceter w3-teal w3-button w3-margin" onclick="hide_show('Container3','Container4')">Proceed
		      	</div>-->
		    </div> 


		    <!--Subject Obtained -->
		    <div class="w3-button w3-block w3-black w3-left-align"><span class="w3-badge w3-white">4</span> EDUCATIONAL DETAILS SECTION</div>
		    <div id="Container4" class="w3-center w3-container w3-padding-24 w3-animate-zoom">
		    <div class="w3-responsive">
		      <table class="w3-table-all w3-card-4">
		          <thead>
		            <tr class="w3-teal _9_documents">
		              <th>Name of Examination</th>
		              <th>Name of Board/University</th>
		              <th>School Name</th>
		              <th>Date of Passing</th>
		              <th>Marks Obtained</th>
		              <th>Total Marks</th>
		              <th>Seat Number</th>
		              <th>Upload Document</th>
		            </tr>
		          </thead>
		          <tr>
		          <td>10<sup>th</sup></td>
		            <td><input type="text" name="board_name1" id="board_name1" class="w3-input"oninput="capatilize('board_name1')" required autocomplete></td>
		            <td><textarea type="text" name="school_name1" id="school_name1" class="w3-input"oninput="capatilize('school_name1')" required autocomplete></textarea> </td>
		            <td><input type="month" name="date_of_passing1" id="date_of_passing1" class="w3-input"oninput="capatilize('date_of_passing1')" required autocomplete></td>
		            <td><input type="text" name="marks_obtained1" id="marks_obtained1" class="w3-input"oninput="capatilize('marks_obtained1')" required autocomplete></td>
		            <td><input type="text" name="total_marks1" id="total_marks1" class="w3-input"oninput="capatilize('total_marks1')" required autocomplete></td>
		            <td><input type="text" name="seat_no1" id="seat_no1" class="w3-input"oninput="capatilize('seat_no1')" required autocomplete></td>
		            <td>
		            	
		            	<input type="file" name="file1" id="file1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" style="display: none;" />
                		<label class="w3-teal w3-round-xxlarge" for="file1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="14" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span></label>

		            </td>
		          </tr>
		          <tr>
		            <td>12<sup>th</sup></td>
		            <td><input type="text" name="board_name2" id="board_name2" class="w3-input"oninput="capatilize('board_name2')" required autocomplete></td>
		            <td><textarea type="text" name="school_name2" id="school_name2" class="w3-input"oninput="capatilize('school_name2')" required autocomplete></textarea> </td>
		            <td><input type="month" name="date_of_passing2" id="date_of_passing2" class="w3-input"oninput="capatilize('date_of_passing2')" required autocomplete></td>
		            <td><input type="text" name="marks_obtained2" id="marks_obtained2" class="w3-input"oninput="capatilize('marks_obtained2')" required autocomplete></td>
		            <td><input type="text" name="total_marks2" id="total_marks2" class="w3-input"oninput="capatilize('total_marks2')" required autocomplete></td>
		            <td><input type="text" name="seat_no2" id="seat_no2" class="w3-input"oninput="capatilize('seat_no2')" required autocomplete></td>
		            <td>
		            	
		            	<input type="file" name="file2" id="file2" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" style="display: none;" />
                		<label class="w3-teal w3-round-xxlarge" for="file2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="14" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span></label>

		            </td>
		          </tr>
		          
		      </table>
		    </div>

			<!--Proceed to next Container
		      <div class=" w3-ceter w3-teal w3-button w3-margin" onclick="hide_show('Container4','Container5')">Proceed
		      </div> -->

		    </div>


		    <!--Name Field:--->
		    <div class="w3-button w3-block w3-black w3-left-align">
		      <span class="w3-badge w3-white">5</span> PHOTO AND SIFNATURE UPLOAD</div>
		    <!--Name Field inputs:--->
		    <div id="Container5" class=" w3-container w3-row-padding w3-padding w3-animate-zoom">

				<div class="w3-container w3-content w3-padding">
			        <!--photo details:--->
			        <div class="w3-third">
			          <div id="wrapper">
			            <input type='file' id="photo" name="file3" accept="image/*" capture style="display:none"/>
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
			            	<input type='file' id="signature" name="file4" accept="image/*" capture style="display:none"/>
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

	<script type="text/javascript" src="../js/exam_form.js"></script>

	<script type="text/javascript" src="../js/student_staff_registration_form.js"></script>

	<!--Custom File Choose Button Java Script -->
  	<script src="../js/custom-file-input.js"></script>   
	
</body>
</html>