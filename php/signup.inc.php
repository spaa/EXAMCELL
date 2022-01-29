
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
    header("Location: 403-forbidden-error.php");
    echo "Not Supported";
}

include 'files.php';
include 'server.php';

$uid = '';
$pass = '';

$middlename = '';
$firstname = '';
$lastname = '';
$mothername = '';
$dob = '';
$gender = '';
$medical_status = '';
$emailid = '';
$mobile_no = '';
$tel_no = '';
$father_email= '';
$father_mobile_no= '';
$mother_email= '';
$mother_mobile_no= '';

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

$errors = array();




//if register button is clicked
if(isset($_POST['upload'])){
   //$username = mysqli_real_escape_string($db,$_POST['username']);
   //$firstname = mysqli_real_escape_string($db,$_POST['firstname']);
   //$lastname = mysqli_real_escape_string($db,$_POST['lastname']);
   //$email = mysqli_real_escape_string($db,$_POST['email']);
   
   
	$middlename = $_POST['middlename'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$mothername = $_POST['mothername'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$medical_status = $_POST['medical_status'];
	$emailid = $_POST['email'];
	$mobile_no = $_POST['mobile_no'];
	$tel_no = $_POST['tel_no'];
	$father_email= $_POST['father_email'];
	$father_mobile_no= $_POST['father_mobile_no'];
	$mother_email= $_POST['mother_email'];
	$mother_mobile_no= $_POST['mother_mobile_no'];

	$employment_status = $_POST['employment_status'];
	$marital_status = $_POST['marital_status'];
	$blood_group= $_POST['blood_group'];

	$address = $_POST['address'];
	$state=$_POST['state'];
	$district=$_POST['district'];
	$city = $_POST['city'];
	$pincode = $_POST['pincode'];

	$admission_year = explode('0',$_POST['admission_year']);
	$admission_year_yyyy = $_POST['admission_year'];
	$admission_year_yy = $admission_year[1];

	$category = $_POST['category'];

	$current_year = explode(' ',$_POST['current_year']);
	$current_year_ch = $current_year[0];
	$current_year_no = $current_year[1];

	$course= explode(' ',$_POST['course']);
	$course_fullform = $course[0];
	$course_shortform = $course[1];

	$admission_type = $_POST['admission_type'];
	$shift = $_POST['shift'];
	$ssc = $_POST['board_name1'].",".$_POST['school_name1'].",".$_POST['date_of_passing1'].",".$_POST['marks_obtained1'].",".$_POST['total_marks1'].",".$_POST['seat_no1'];
	$hsc = $_POST['board_name2'].",".$_POST['school_name2'].",".$_POST['date_of_passing2'].",".$_POST['marks_obtained2'].",".$_POST['total_marks2'].",".$_POST['seat_no2'];



	include 'generate_uid_pass.inc.php';

	include 'image_upload.inc.php';
/*
	//if there are no errors ,save user to database
	if(count($errors) == 0){
		$query = "SELECT username FROM user WHERE username = '$username'";
		$result = mysqli_query($db, $query);
		if(!mysqli_query($db, $query))
		{
			array_push($errors, "query_not_processed");
			header("Location: ../php/register.php?error=query_not_processed");
		}
		else
		{	
			$check = mysqli_num_rows($result);
			if($check > 0){
				array_push($errors, "USERNAME ALREADY EXIST");
				header("Location: ../php/register.php?error=username");
				exit();
			}
			else{
				$password = md5($password_1); //encrypt password before storing in database(security purpose)
				$sql = "INSERT INTO user (username, email, password, firstname, lastname)
			        VALUES ('$username', '$email', '$password', '$firstname', '$lastname')";
				$logged = mysqli_query($db, $sql);
				if(!$logged)
				{
					array_push($errors, "DATA NOT INSERTED");
					header("Location: ../php/register.php?error=data_not_inserted");
				}
				else
				{
					$_SESSION['username'] = $username;
					$_SESSION['success'] = "you are logged in";
					header('Location: login.php');
				}
	    	}
		}
	}
*/

	echo $middlename .",".
$firstname .",".
$lastname .",".
$mothername .",".
$dob .",".
$gender .",".
$medical_status .",".
$emailid .",".
$mobile_no .",".
$tel_no .",".
$father_email.",".
$father_mobile_no.",".
$mother_email.",".
$mother_mobile_no.",".

$employment_status .",".
$marital_status .",".
$blood_group.",".

$address .",".
$state.",".
$district.",".
$city .",".
$pincode .",".

$admission_year_yyyy .",".
$category .",".
$current_year_ch .",".
$current_year_no .",".
$course_fullform .",".
$course_shortform .",".
$admission_type .",".
$shift .",".
$ssc .",".
$hsc .";".
$uid .";".
$pass;


}



?>
