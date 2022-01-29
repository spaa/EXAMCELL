<!--url-->
<?php $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>

<?php include'dashboard_header.php';?>

<?php include'server.php';?>
<?php

$old_password = '';
$password = '';
$new_password = '';
$uid = '';
$user_type = '';
?>

	<form class="w3-mobile w3-margin" action="change_pwd_inc.php" method="post" enctype="multipart/form-data">
		<div class="w3-card-4 w3-margin w3-center w3-white">

			<div class="w3-container w3-black w3-padding-large w3-xxlarge" style="text-shadow:1px 1px 0 orange">CHANGE PASSWORD
			</div>
            
			<!--Name Field inputs:--->
			<div id="Container1" class="w3-container w3-row-padding w3-padding w3-animate-zoom">
					<div class="w3-container w3-row w3-padding">
		      		        
				        <div class="w3-container w3-padding w3-half">
				        	<label class="w3-third">Old Password</label>
				            <input type="password" id="oldpwd" class="w3-input w3-twothird" name="oldpwd" required />
				        </div>
                    </div>
                    <div class="w3-container w3-row w3-padding">
				        <div class="w3-container w3-padding w3-half">
				        	<label class="w3-third">New Password</label>
				            <input type="password" id="newpwd" class="w3-input w3-twothird" name="newpwd" required/>
				        </div>
				    </div>

				    <div class="w3-container w3-row w3-padding">
				        <div class="w3-container w3-padding w3-half">
				        	<label class="w3-third">Confirm Password</label>
				            <input type="password" id="conf_pwd" class="w3-input  w3-twothird" name="conf_pwd" required />
				        </div>
                    </div>
                    <div class="w3-btn w3-teal w3-large w3-padding">
                        <input type ="submit" id="conf_btn" class="w3-btn w3-teal w3-large w3-padding" name="conf_btn" value="Submit">
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
	

  
