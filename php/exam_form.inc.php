<?php
include 'server.php';
$firstname = $_SESSION['username'];


$middlename = '';
$lastname = '';
$mothername = '';
$dob = '';
$gender = '';
$medical_status = '';
$email = '';
$mobile = '';
$tel_no = '';
$father_email= '';
$father_mobile= '';
$mother_email= '';
$mother_mobile= '';

$employment_status = '';
$marital_status = '';
$blood_group= '';

$address = '';
$state='';
$district='';
$city = '';
$pincode = '';

$admission_year = '';
$admission_year_yyyy = '';
$admission_year_yy = '';
$category = '';
$current_year = '';
$current_year_ch = '';
$current_year_no = '';
$course= '';
$course_fullform = '';
$course_shortform = '';
$admission_type = '';
$shift = '';
$ssc = '';
$hsc = '';

if ($_SESSION['user_type']=="STUDENT") {
	$uid = $_SESSION['uid'];
	$query = "SELECT * FROM student_general_info WHERE uid = '$uid'";
	$result = mysqli_query($db,$query);
	if (mysqli_num_rows($result)==1) {
		while ($row = mysqli_fetch_assoc($result)) {
		$middlename = $row["middle_name"];
		$lastname = $row["last_name"];
		$mothername = $row["mother_name"];
		

		$father_email = $row["father_email"];
		$father_mobile = $row["father_mobile_no"];
		$mother_email = $row["mother_email"];
		$mother_mobile = $row["mother_mobile_no"];

		$medical_status = $row["medical_status"];
		$blood_group = $row["blood_group"];

		$employment_status = $row["employment"];
		$marital_status = $row["marital_status"];

		$admission_year_yyyy = $row["admission_year"];
		$current_year_ch = $row["current_year"];
		$course_fullform = $row["course_name"];
		$category = $row["admission_category"];
		$admission_type = $row["admission_type"];
		$shift = $row["shift"];

		$email = $row["emailid"];
		$mobile = $row["mobile_no"];
		$dob = $row["dob"];
		$gender = $row["gender"];
		$address = $row["address"];
		$pincode = $row["pincode"];
		$photo = $row["photo"];
		$signature = $row["signature"];
		}
	}

	include'change_profile_details.inc.php';
/*
	if(isset($_POST['save'])) {
		$firstname = mysqli_real_escape_string($db,$_POST['firstname']);
		$lastname = mysqli_real_escape_string($db,$_POST['lastname']);
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$mobile = mysqli_real_escape_string($db,$_POST['mobile']);
		$dob = mysqli_real_escape_string($db,$_POST['DOB']);
		$gender = mysqli_real_escape_string($db,$_POST['gender']);
		$add1 = mysqli_real_escape_string($db,$_POST['address1']);
		$add2 = mysqli_real_escape_string($db,$_POST['address2']);

		if (isset($_POST['change_username'])) {
			
			$check_pass = mysqli_real_escape_string($db,$_POST['user_password']);
			$confirm_pass = md5($check_pass);
			if ($check_pass!="") 
			{
				$check = "SELECT * FROM user WHERE password='$confirm_pass' AND username='$username'";
				$process = mysqli_query($db,$check);
				if (!mysqli_query($db,$check)) {
					header("Location: ../php/session_user_details.php?error=cant_process_query");
					exit();
				}
				else
				{
					if (mysqli_num_rows($process) == 1) 
					{
							$username = mysqli_real_escape_string($db,$_POST['username2']);

							$change = "UPDATE user SET username='$username' WHERE password='$confirm_pass'";
							$process1 = mysqli_query($db,$change);


							$update = "UPDATE user SET firstname='$firstname',lastname='$lastname',email='$email',mobile='$mobile',dob='$dob',gender='$gender',add1='$add1',add2='$add2' WHERE username='$username'";
							$result = mysqli_query($db,$update);
							session_destroy();
							unset($_SESSION['username']);
							header("Location: ../php/login.php");
							exit();
					}
					else
					{
						header("Location: ../php/session_user_details.php?error=multiple_rows_found_in_database_with_same_username");
						exit();
					}
				}
			}
		}


		if (isset($_POST['change_password'])) {
			$pass1 = mysqli_real_escape_string($db,$_POST['pass1']);
			$pass2 = mysqli_real_escape_string($db,$_POST['pass2']);
			$pass3 = mysqli_real_escape_string($db,$_POST['pass3']);
			$check_pass = md5($pass1);
			$confirm_pass = md5($pass2);

			if($pass1!="" && $pass2!="" && $pass3!="")
			{
				if ($pass1 == $pass2) {
					header("Location: ../php/session_user_details.php?error=same_password");
					exit();
				}
				$check = "SELECT * FROM user WHERE password='$check_pass' AND username = '$username' ";
				$process = mysqli_query($db,$check);

				if (!mysqli_query($db,$check)) {
					header("Location: ../php/session_user_details.php?error=cant_process_query");
					exit();
				}
				else{
					if (mysqli_num_rows($process) == 1) {
						if ($pass2 != $pass3) {
							header("Location: ../php/session_user_details.php?error=new_password_not_same");
							exit();
						}
						else{
							$change = "UPDATE user SET password='$confirm_pass' WHERE username='$username'";
							$process1 = mysqli_query($db,$change);


							$update = "UPDATE user SET firstname='$firstname',lastname='$lastname',email='$email',mobile='$mobile',dob='$dob',gender='$gender',add1='$add1',add2='$add2' WHERE username='$username'";
							$result = mysqli_query($db,$update);
							session_destroy();
							unset($_SESSION['username']);
							header("Location: ../php/login.php");
							exit();
						}
					}
					else{
						header("Location: ../php/session_user_details.php?error=multiple_rows_found_in_database_with_same_username");
						exit();
					}
				}
			}
		}
		else
		{
			$update = "UPDATE user SET firstname='$firstname',lastname='$lastname',email='$email',mobile='$mobile',dob='$dob',gender='$gender',add1='$add1',add2='$add2' WHERE username='$username'";
			$result = mysqli_query($db,$update);
			header("Location: index.php");
		}
	}	*/
}
?>