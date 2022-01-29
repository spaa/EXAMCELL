<?php
include'server.php';
session_start();
$email = $_SESSION["email"];
$mobile = $_SESSION["mobile"];

$errors = array();
$style = 'style="position:relative;top:50px;"';
include 'errors.php';

		$uid = $_SESSION["uid"];
		if ($_SESSION['user_type']=="STUDENT") {
			$query = "SELECT * FROM student_general_info WHERE uid = '$uid'";
			$result = mysqli_query($db,$query);
			if (mysqli_num_rows($result)==1) {
				if (mysqli_num_rows($result)==1) {
					while ($row = mysqli_fetch_assoc($result)) {
						$firstname = $row["first_name"];
						$email = $row["emailid"];
						$mobile = $row["mobile_no"];
						$father_email = $row["father_email"];
						$father_mobile = $row["father_mobile_no"];
						$mother_email = $row["mother_email"];
						$mother_mobile = $row["mother_mobile_no"];
					}
				}
			}
		}

		elseif ($_SESSION['user_type']=="STAFF") {
			$query = "SELECT * FROM staff_information WHERE uid_staff = '$uid'";
			$result = mysqli_query($db,$query);
			if (mysqli_num_rows($result)==1) {
				if (mysqli_num_rows($result)==1) {
					while ($row = mysqli_fetch_assoc($result)) {
						$firstname = $row["first_name"];
						$email = $row["email"];
						$mobile = $row["mobile_no"];
					}
				}
			}
		}

		elseif ($_SESSION['user_type']=="EXAMCELL") {
			$query = "SELECT * FROM examcell WHERE uid = '$uid'";
			$result = mysqli_query($db,$query);
			if (mysqli_num_rows($result)==1) {
				if (mysqli_num_rows($result)==1) {
					while ($row = mysqli_fetch_assoc($result)) {
						$firstname = $row["first_name"];
						$email = $row["emailid"];
						$mobile = $row["mobile_no"];
					}
				}
			}
		}

		else{
			$query = "SELECT * FROM hod_information WHERE uid = '$uid'";
			$result = mysqli_query($db,$query);
			if (mysqli_num_rows($result)==1) {
				if (mysqli_num_rows($result)==1) {
					while ($row = mysqli_fetch_assoc($result)) {
						$firstname = $row["first_name"];
						$email = $row["emailid"];
						$mobile = $row["mobile_no"];
					}
				}
			}
		}

		//$query = "SELECT * FROM student_general_info WHERE uid = '$uid'";
		//$result = mysqli_query($db,$query);
		
		

		if (isset($_POST['verify'])) {
			$verify_otp = $_POST['otp'];
			if ($verify_otp == $_COOKIE['otp']) {
				$_SESSION['otp_verified'] = 1;
				header('Location: ../php/dashboard.php');
			}
			else {
				$_SESSION['otp_verified'] = 0;
				echo $_COOKIE['otp']."<br>";
				echo "'You Entered Incorrect OTP'";
				array_push($errors, "YOU ENTERED INCORRECT OTP");
			}
		}
		else{
			$otp_no = mt_rand(100000,999999);
		echo $otp_no."<br>";
		$otp_msg = "Hey ".$firstname." your OTP for college login verification is :- ".$otp_no;


		#include 'send_otp_code_using_way2sms.inc.php';

		#include 'send_otp_code_using_textlocal.inc.php';

		//include 'send_otp_code_using_fast2sms.inc.php';

		setcookie("otp",$otp_no);
		}

		
?>
