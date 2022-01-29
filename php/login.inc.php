<?php
include'server.php';
session_start();


$uid = '';
$password_1 = '';
$user_type = '';
$errors = array();

if(isset($_POST['login'])){
   $uid = $_POST['uid'];
   $password_1 = $_POST['password'];
   $user_type = $_POST['user_type'];

   //ensure that form fields are filled properly
   if(empty($uid)){
	array_push($errors, "Uid is Required");
	//header("Location: ../php/register.php?error=username");
   }

   if(empty($password_1)){
	array_push($errors, "Password is Required");
	//header("Location: ../php/register.php?error=password");
   }

   if(count($errors) == 0){
   	$password = md5($password_1); //encrypt password before storing in database(security purpose)
	
   	if($user_type=="STUDENT"){
		$query = "SELECT * FROM student_general_info WHERE uid = '$uid' AND password = '$password'";
	}
	elseif($user_type=="STAFF"){
		$query = "SELECT * FROM staff_information WHERE uid_staff = '$uid' AND password = '$password'";
	}
	elseif($user_type=="EXAMCELL"){
		$query = "SELECT * FROM examcell WHERE uid = '$uid' AND password = '$password'";
	}
	elseif($user_type=="HOD"){
		$query = "SELECT * FROM hod_information WHERE uid = '$uid' AND password = '$password'";
	}
	elseif($user_type=="ADMIN"){
		$query = "SELECT * FROM admin_info WHERE name = '$uid' AND password = '$password'";
	}
	$result = mysqli_query($db, $query);
	    if(mysqli_num_rows($result) == 1){
		//log user in
		    while ($row = mysqli_fetch_assoc($result)) {
		    	if ($user_type=="STAFF") {
		    		$session_uid = $row["uid_staff"];
		    		$emailid = $row["email"];
					$branch = $row["branch"];
					$branch_short_form = $row["branch_short_name"];
                    $class_incharge = $row["class_incharge"];
		    	}
                elseif($user_type=="EXAMCELL")
                {
                    $session_uid = $row["uid"];
                    $branch = "EXAM CELL";
                }
                elseif($user_type=="HOD")
                {
                    $session_uid = $row["uid"];
                    $emailid = $row["emailid"];
					$branch = $row["branch"];
					$branch_short_form = $row["branch_short_name"];					   
                	//$branch = "COMPUTER";
                }
                elseif($user_type=="ADMIN")
                {
                    $session_uid = $row["name"];
                    $emailid = " ";
					$branch = " ";
					$branch_short_form = " ";					   
                	//$branch = "COMPUTER";
                }
		    	else{
		    		$session_uid = $row["uid"];
		    		$emailid = $row["emailid"];
					$branch = $row["course_name"];
					$branch_short_form = $row["course_short_name"];					
		    	}
		    	$mobile_no = $row["mobile_no"];
		    	$photo = $row["photo"];
		    	$username = $row["first_name"];
                $name = $row["first_name"]." ".$row["middle_name"]." ".$row["last_name"];
		    }
			$_SESSION["uid"] = $session_uid;
			$_SESSION["mobile"] = $mobile_no;
			$_SESSION["email"] = $emailid;
			$_SESSION["photo"] = $photo;
			$_SESSION["user_type"] = $user_type;
			$_SESSION['username'] = $username;
			$_SESSION['name'] = $name;
			$_SESSION['branch'] = $branch;
			$_SESSION['branch_short_name'] = $branch_short_form;
            $_SESSION['class_incharge'] = $class_incharge;
		    $_SESSION["success"] = "you are logged in";

		    //include 'otp_page.inc.php';

		    /*if ($mobile==0) {
		    	header('Location: session_user_details.php');
		    }
		    else{*/
		    header('Location: ../php/otp_page.php');
		    #}
		}
	    else{
	    	header("Location: ../php/login.php?error=failed");
	    	array_push($errors, "WRONG USERNAME/PASSWORD COMBINATION");
	    	exit();
	    }

	    include'errors.php';
    }
}