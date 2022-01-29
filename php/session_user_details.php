<!--url-->
<?php $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>

<?php include'dashboard_header.php';?>
<?php include 'session_user_details.inc.php';?>


	<form class="w3-mobile w3-margin" action="session_user_details.inc.php" method="post" enctype="multipart/form-data">
		<div class="w3-card-4 w3-margin w3-center w3-white">

			<div class="w3-container w3-black w3-padding-large w3-xxlarge" style="text-shadow:1px 1px 0 orange"><?php echo $_SESSION['user_type'];?> PROFILE
			</div>

			
			<!--Name Field inputs:--->
			<div id="Container1" class="w3-container w3-row-padding w3-padding w3-animate-zoom">

			
					<div class="w3-container w3-row w3-padding">
		      		        
				        <div class="w3-container w3-padding w3-half">
				        	<label class="w3-third">UID</label>
				            <input type="text" id="uid" class="w3-input w3-twothird" name="uid" disabled <?php echo"value='$uid'";?> />
				        </div>
				    </div>

                    <div class="w3-container w3-row w3-padding">
		      		        
				        <div class="w3-container w3-padding w3-half">
				        	<label class="w3-third">FIRST NAME</label>
				            <input type="text" id="firstname" class="w3-input w3-twothird" name="firstname" disabled <?php echo"value='$firstname'";?> />
				        </div>
				        <div class="w3-container w3-padding w3-half">
				        	<label class="w3-third">MIDDLE NAME</label>
				            <input type="text" id="middlename" class="w3-input  w3-twothird" name="middlename" disabled <?php echo"value='$middlename'";?> />
				        </div>
				    </div>

				    <div class="w3-container w3-row w3-padding">
				        <div class="w3-container w3-padding w3-half">
				        	<label class="w3-third">LAST NAME</label>
				            <input type="text" id="lastname" class="w3-input  w3-twothird" name="lastname" disabled <?php echo"value='$lastname'";?> />
				        </div>
				        <div class="w3-container w3-padding w3-half">
				        	<label class="w3-third">MOTHER NAME</label>
				            <input type="text" id="mothername" class="w3-input w3-twothird" name="mothername" disabled <?php echo"value='$mothername'";?> />

				        </div>
				    </div>

				    <div  class="w3-container w3-row w3-padding">
				    	
				    	<div class="w3-container w3-padding w3-half">
				        	<label class="w3-third">DATE OF BIRTH</label>
				            <input type="text" id="dob" class="w3-input  w3-twothird" name="dob" disabled <?php echo"value='$dob'";?> />
				        </div>

				    	<div class="w3-container w3-padding w3-half">
				        	<label class="w3-third">GENDER</label>
				            <input type="text" id="gender" class="w3-input  w3-twothird" name="gender" disabled <?php echo"value='$gender'";?> />
				        </div>
				    </div>
				    <div  class="w3-container w3-row w3-padding">
				    	
				        <div class="w3-container w3-padding w3-half">
				            <label class="w3-third">MEDICAL STATUS</label>
				            <input type="text" id="medical_status" class="w3-input  w3-twothird" name="medical_status" disabled <?php echo"value='$medical_status'";?> />
				        </div>

				        <div class="w3-container w3-padding w3-half">
				            <label class="w3-third">BLOOD GROUP</label>
				            <input type="text" id="blood_group" class="w3-input  w3-twothird" name="blood_group" disabled <?php echo"value='$blood_group'";?> />
				        </div>
				        
				        
				    </div>

				    <div  class="w3-container w3-row w3-padding">

				    	<div class="w3-container w3-padding w3-half">
				            <label class="w3-third">EMAIL ID</label>
				            <input type="text" id="emailid" class="w3-input  w3-twothird" name="emailid" disabled <?php echo"value='$email'";?> />
				        </div>
				    	
				        <div class="w3-container w3-padding w3-half">
				            <label class="w3-third">MOBILE NUMBER</label>
				            <input type="text" id="mobile" class="w3-input  w3-twothird" name="mobile" disabled <?php echo"value='$mobile'";?> />
				        </div>
				        
				    </div>
				    <?php if ($user_type=="STUDENT"): ?>

				    <div  class="w3-container w3-row w3-padding">

				    	<div class="w3-container w3-padding w3-half">
				            <label class="w3-third">FATHERS EMAIL ID</label>
				            <input type="text" id="emailid" class="w3-input  w3-twothird" name="emailid" disabled <?php echo"value='$father_email'";?> />
				        </div>
				    	
				        <div class="w3-container w3-padding w3-half">
				            <label class="w3-third">FATHERS MOBILE</label>
				            <input type="text" id="emailid" class="w3-input  w3-twothird" name="emailid" disabled <?php echo"value='$father_mobile'";?> />
				        </div>
				        
				    </div>
				    
				    <div  class="w3-container w3-row w3-padding">

				    	<div class="w3-container w3-padding w3-half">
				            <label class="w3-third">MOTHERS EMAIL ID</label>
				            <input type="text" id="emailid" class="w3-input  w3-twothird" name="emailid" disabled <?php echo"value='$mother_email'";?> />
				        </div>
				    	
				        <div class="w3-container w3-padding w3-half">
				            <label class="w3-third">MOTHERS MOBILE</label>
				            <input type="text" id="emailid" class="w3-input  w3-twothird" name="emailid" disabled <?php echo"value='$mother_mobile'";?> />
				        </div>
				        
				    </div>
				    <?php endif ?>
					
					<div  class="w3-container w3-row w3-padding">
				    	<?php if ($user_type=="STUDENT"): ?>
				    	<div class="w3-container w3-padding w3-half">
				            <label class="w3-third">EMPLOYMENT STATUS</label>
				            <input type="text" id="emailid" class="w3-input  w3-twothird" name="emailid" disabled <?php echo"value='$employment_status'";?> />
				        </div>
                        <?php endif ?>
				    	
				        <div class="w3-container w3-padding w3-half">
				            <label class="w3-third">MARITAL STATUS</label>
				            <input type="text" id="emailid" class="w3-input  w3-twothird" name="emailid" disabled <?php echo"value='$marital_status'";?> />
				        </div>
				        
				        
				    </div>

				    <div  class="w3-container w3-row w3-padding">
				    	
				    	<div class="w3-container w3-padding ">
				            <label class="w3-third">ADDRESS</label>
				            <textarea type="text" id="emailid" class="w3-input  w3-twothird" name="emailid" disabled> <?php echo "$address";?> </textarea>
				        </div>
				    					        
				    </div>

				    <?php if ($user_type=="STUDENT"): ?>

				    <div  class="w3-container w3-row w3-padding">

				    	<div class="w3-container w3-padding w3-half">
				            <label class="w3-third">ADMISSION YEAR</label>
				            <input type="text" id="emailid" class="w3-input  w3-twothird" name="emailid" disabled <?php echo"value='$admission_year_yyyy'";?> />
				        </div>
				    	
				        <div class="w3-container w3-padding w3-half">
				            <label class="w3-third">CURRENT YEAR</label>
				            <input type="text" id="emailid" class="w3-input  w3-twothird" name="emailid" disabled <?php echo"value='$current_year_ch'";?> />
				        </div>
				        
				    </div>
 					<?php endif ?>

				    <div  class="w3-container w3-row w3-padding">

				    	<div class="w3-container w3-padding w3-half">
				            <label class="w3-third">BRANCH</label>
				            <input type="text" id="emailid" class="w3-input  w3-twothird" name="emailid" disabled <?php echo"value='$course_fullform'";?> />
				        </div>
				    	<?php if ($user_type=="STUDENT"): ?>

				        <div class="w3-container w3-padding w3-half">
				            <label class="w3-third">CATEGORY</label>
				            <input type="text" id="emailid" class="w3-input  w3-twothird" name="emailid" disabled <?php echo"value='$category'";?> />
				        </div>
				        <?php endif ?>
				    </div>

				    <div  class="w3-container w3-row w3-padding">
				    	<?php if ($user_type=="STUDENT"): ?>

				    	<div class="w3-container w3-padding w3-half">
				            <label class="w3-third">ADMISSION TYPE</label>
				            <input type="text" id="emailid" class="w3-input  w3-twothird" name="emailid" disabled <?php echo"value='$admission_type'";?> />
				        </div>
				    	<?php endif ?>
				        <div class="w3-container w3-padding w3-half">
				            <label class="w3-third">SHIFT</label>
				            <input type="text" id="emailid" class="w3-input  w3-twothird" name="emailid" disabled <?php echo"value='$shift'";?> />
				        </div>
				        
				    </div>

		    
		        

				
		    <!--Name Field:--->
		    
		    <div id="Container5" class=" w3-container w3-row-padding w3-padding w3-animate-zoom">

				<div class="w3-container w3-content w3-padding">
			        <!--photo details:--->
			        <div class="w3-third">
			          <div id="wrapper">
			            
			            <div style="width: 200px;height:250px">
			                  <img id="photo_img" <?php echo"src='$photo'";?> style="width: 200px;height: 250px;" alt="Photo" />
			            </div>
			          </div>
			          
			        </div>

			        <!--signature details:--->
			        <div class="w3-third">
			        	<div id="wrapper">       
			            	
			            	<div style="width: 200px;height:150px">
			                  <img id="signature_img"  <?php echo"src='$signature'";?> style="width: 200px;height: 150px;" alt="Signature" />
			            	</div>
			        	</div>
			        	
			        </div>

			    </div>
				
				
		    </div>

		</div>
	</form>
<!--Date Picker-->
	<script src="../js/datedropper.js"></script>

	<script type="text/javascript" src="../js/exam_form.js"></script>

	<script type="text/javascript" src="../js/student_staff_registration_form.js"></script>

	<!--Custom File Choose Button Java Script -->
  	<script src="../js/custom-file-input.js"></script>   
	

  
