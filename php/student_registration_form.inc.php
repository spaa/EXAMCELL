
<?php

include 'server.php';

if(isset($_SERVER['HTTP_REFERER'])){
    if(!stristr($_SERVER['HTTP_REFERER'],"index.php")){
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
$current_sem = '';

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
	$dob = date('d-m-Y',strtotime($_POST['dob']));
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

	$current_sem = $_POST['current_sem'];

	include 'generate_uid_pass.inc.php';

	
	//if there are no errors ,save user to database
	if(count($errors) == 0){
		$query = "SELECT uid FROM student_general_info WHERE uid = '$uid'";
		$result = mysqli_query($db, $query);
		if(!mysqli_query($db, $query))
		{
			array_push($errors, "query_for_authentication_no_duplicate_data_not_processed");
			header("Location: ../php/index.php?error=query_for_authentication_no_duplicate_data_not_processed");
		}
		else
		{	
			$check = mysqli_num_rows($result);
			if($check > 0){
				array_push($errors, "uid_already_exist_duplicate_row_not_created_only_update_query_will_be_executed");
				#header("Location: ../php/index.php?warning=uid_already_exist_duplicate_row_not_created_only_update_query_will_be_executed");
				
			}
			else{
				$password = md5($pass); //encrypt password before storing in database(security purpose)
				$sql = "INSERT INTO student_general_info (uid,password,first_name,middle_name,last_name,mother_name,dob,gender,medical_status, emailid,mobile_no,employment,marital_status,blood_group,address,state,district,city,pincode,ssc_details,hsc_details,father_mobile_no,father_email,mother_mobile_no,mother_email,admission_year,current_year,course_name,course_short_name,admission_category,admission_type,shift,current_sem,current_year_yyyy)
			        VALUES ('$uid', '$password', '$firstname', '$middlename', '$lastname','$mothername','$dob','$gender','$medical_status','$emailid','$mobile_no','$employment_status','$marital_status','$blood_group','$address','$state','$district','$city','$pincode','$ssc','$hsc','$father_mobile_no','$father_email','$mother_mobile_no','$mother_email','$admission_year_yyyy','$current_year_ch','$course_fullform','$course_shortform','$category','$admission_type','$shift','$current_sem','$admission_year_yyyy')";
				$logged = mysqli_query($db, $sql);
				if(!$logged)
				{
					array_push($errors, "DATA NOT INSERTED IN GENERAL STUDENT INFO DATABASE");
					header("Location: ../php/index.php?error=data_not_inserted_in_general_student_database");
				}
				else
				{
					$_SESSION['success'] = "new data entered successfully";

					//update no_of_students table
					if ($uid_fe_or_dse==1) {
						$sql = "UPDATE students_per_year SET no_of_students='$no_of_students' WHERE year = '$admission_year_yyyy'";
					}
					else{
						$sql = "UPDATE students_per_year_dse SET no_of_students='$no_of_students' WHERE year = '$admission_year_yyyy'";
					}
					$logged = mysqli_query($db, $sql);
					if(!$logged)
					{
						array_push($errors, "data_not_inserted_in_students_per_year_database");
							header("Location: ../php/index.php?error=data_not_inserted_in_students_per_year_database");
					}
					header('Location: index.php?success=new_data_entered_successfully');
				}


	    	}
		}
	}

	include 'image_upload.inc.php';
}



?>
