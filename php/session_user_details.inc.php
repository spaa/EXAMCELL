<?php
if(isset($_SERVER['HTTP_REFERER'])){
    if(!stristr($_SERVER['HTTP_REFERER'],".php")){
        header("Location: 403-forbidden-error.php");
    }
    else{
        //echo "Good";
    }
}
else{
	/*The below statement is written because 
	sometime user can type session_user_details.php in url
	and since this file is included there it will give warning for header
	Warning: Cannot modify header information - headers already sent by 
	(output started at E:\XAMPP\htdocs\EXAMCELL\php\dashboard_header.php:82)
	in E:\XAMPP\htdocs\EXAMCELL\php\session_user_details.inc.php on line 17 */
	error_reporting(E_ALL ^ E_WARNING); 
	//error_reporting(E_ERROR | E_PARSE);
    header("Location: 403-forbidden-error.php");
    //echo "Not Supported";
}

include'server.php';
$firstname = $_SESSION['username'];
$uid = $_SESSION['uid'];
$user_type = $_SESSION['user_type'];
$class_incharge = $_SESSION["class_incharge"];

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
		$photo = $row["photo"];
		$signature = $row["signature"];
		}
	}
}

if ($_SESSION['user_type']=="STAFF") {
	$uid = $_SESSION['uid'];
	$query = "SELECT * FROM staff_information WHERE uid_staff = '$uid'";
	$result = mysqli_query($db,$query);
	if (mysqli_num_rows($result)== 1) {
		while ($row = mysqli_fetch_assoc($result)) {
		$middlename = $row["middle_name"];
		$lastname = $row["last_name"];
		$mothername = $row["mother_name"];

		$medical_status = $row["medical_status"];
		$blood_group = $row["blood_group"];

		$marital_status = $row["marital_status"];

		$course_fullform = $row["branch"];
            
		$shift = $row["shift"];
        
        
            
		$email = $row["email"];
		$mobile = $row["mobile_no"];
		$dob = $row["dob"];
		$gender = $row["gender"];
		$address = $row["address"];
		$photo = $row["photo"];
		$signature = $row["signature"];
		}
	}
}

if ($_SESSION['user_type']=="EXAMCELL") {
	$uid = $_SESSION['uid'];
	$query = "SELECT * FROM examcell WHERE uid = '$uid'";
	$result = mysqli_query($db,$query);
	if (mysqli_num_rows($result)== 1) {
		while ($row = mysqli_fetch_assoc($result)) {
		$middlename = $row["middle_name"];
		$lastname = $row["last_name"];
		$mothername = $row["mother_name"];

		$medical_status = $row["medical_status"];
		$blood_group = $row["blood_group"];

		$marital_status = $row["marital_status"];

		$course_fullform = $row["branch"];
            
		$shift = $row["shift"];
        
        
            
		$email = $row["email"];
		$mobile = $row["mobile_no"];
		$dob = $row["dob"];
		$gender = $row["gender"];
		$address = $row["address"];
		$photo = $row["photo"];
		$signature = $row["signature"];
		}
	}
}


if ($_SESSION['user_type']=="HOD") {
	$uid = $_SESSION['uid'];
	$query = "SELECT * FROM hod_information WHERE uid = '$uid'";
	$result = mysqli_query($db,$query);
	if (mysqli_num_rows($result)== 1) {
		while ($row = mysqli_fetch_assoc($result)) {
		$middlename = $row["middle_name"];
		$lastname = $row["last_name"];
		$mothername = $row["mother_name"];

		$medical_status = $row["medical_status"];
		$blood_group = $row["blood_group"];

		$marital_status = $row["marital_status"];

		$course_fullform = $row["branch"];
            
		$shift = $row["shift"];
        
        
            
		$email = $row["email"];
		$mobile = $row["mobile_no"];
		$dob = $row["dob"];
		$gender = $row["gender"];
		$address = $row["address"];
		$photo = $row["photo"];
		$signature = $row["signature"];
		}
	}
}
?>