<?php

include 'server.php';

if(isset($_SERVER['HTTP_REFERER'])){
    if(!stristr($_SERVER['HTTP_REFERER'],"staff_registration_form.php")){
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

$emailid = '';
$mobile_no = '';
$joining_date = '';


$marital_status = '';
$blood_group= '';

$address = '';
$state='';
$district='';
$city = '';
$pincode = '';


$branch= '';
$branch_fullform = '';
$branch_shortform = '';

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
	$emailid = $_POST['email'];
	$mobile_no = $_POST['mobile_no'];

	$shift = $_POST['shift'];
	
	$joining_date = date('d-m-Y',strtotime($_POST['joining_date']));

	$marital_status = $_POST['marital_status'];
	$blood_group= $_POST['blood_group'];

	$address = $_POST['address'];
	$state=$_POST['state'];
	$district=$_POST['district'];
	$city = $_POST['city'];
	$pincode = $_POST['pincode'];

	$branch= explode(' ',$_POST['branch']);
	$branch_fullform = $branch[0];
	$branch_shortform = $branch[1];


	include 'generate_uid_pass_for_staff.inc.php';

	
	//if there are no errors ,save user to database
	if(count($errors) == 0){
		$query = "SELECT uid_staff FROM staff_information WHERE first_name = '$firstname' and last_name = '$lastname'";
		$result = mysqli_query($db, $query);
		if(!mysqli_query($db, $query))
		{
			array_push($errors, "query_for_authentication_no_duplicate_data_not_processed");
			header("Location: ../php/staf_registration_form.php?error=query_for_authentication_no_duplicate_data_not_processed");
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
				$sql = "INSERT INTO staff_information (uid_staff,password,first_name,middle_name,last_name,mother_name,dob,gender,email,mobile_no,marital_status,blood_group,branch,branch_short_name,address,state,district,city,pincode,shift,joining_date)
			        VALUES ('$uid', '$password', '$firstname', '$middlename', '$lastname','$mothername','$dob','$gender','$emailid','$mobile_no','$marital_status','$blood_group','$branch_fullform','$branch_shortform','$address','$state','$district','$city','$pincode','$shift','$joining_date')";
				$logged = mysqli_query($db, $sql);
				if(!$logged)
				{
					array_push($errors, "DATA NOT INSERTED IN GENERAL STAFF INFO DATABASE");
					header("Location: ../php/staf_registration_form.php?error=data_not_inserted_in_general_staff_database");
				}
				else
				{
					$_SESSION['success'] = "new data entered successfully";

					
					$sql = "UPDATE no_of_staff SET no_of_staff ='$no_of_staff' ";

					$logged = mysqli_query($db, $sql);
					if(!$logged)
					{
						array_push($errors, "data_not_inserted_in_no_of_staff_database");
							header("Location: ../php/staf_registration_form.php?error=data_not_inserted_in_no_of_staff_database");
					}
					header('Location: staf_registration_form.php?success=new_data_entered_successfully');
				}


	    	}
		}
	}

	include 'image_upload_staff.inc.php';
}



?>
