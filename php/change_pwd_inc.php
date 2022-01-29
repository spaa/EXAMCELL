<?php
include'server.php';
session_start();

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

$uid = '';
$old_password = '';
$new_password = '';
$confirm_password = '';
$user_type = '';

$password1 ='';
$password ='';
$errors = array();

if(isset($_POST['conf_btn'])){
   $uid = $_SESSION['uid'];
   $user_type = $_SESSION['user_type'];

    
   $old_password = $_POST['oldpwd'];
   $new_password = $_POST['newpwd'];
   $confirm_password = $_POST['conf_pwd'];

   	$password = md5($old_password); //encrypt password before storing in database(security purpose)
    
    echo "old: ".$old_password."<br>old hash: ".$password."<br>newpass: ".$new_password."<br>UID: ".$uid."<br>User Type: ".$user_type;
	
   	if($user_type=="STUDENT")
    {
		$query = "SELECT * FROM student_general_info WHERE uid = '$uid' AND password = '$password'";
	}
	elseif($user_type=="STAFF")
    {
		$query = "SELECT * FROM staff_information WHERE uid_staff = '$uid' AND password = '$password'";
	}
	elseif($user_type=="EXAMCELL")
    {
		$query = "SELECT * FROM examcell WHERE uid = '$uid' AND password = '$password'";
	}
	elseif($user_type=="HOD")
    {
		$query = "SELECT * FROM hod_information WHERE uid = '$uid' AND password = '$password'";
	}
	$result = mysqli_query($db, $query);
	    if(mysqli_num_rows($result) == 1)
        {
		    while ($row = mysqli_fetch_assoc($result)) 
            {
		    	if($new_password == $confirm_password)
                {
                        $password1 = md5($new_password);
                        if($user_type=="STUDENT")
                        {
                              $query = "UPDATE student_general_info SET password = '$password1' WHERE uid = '$uid'";
                        }
                        elseif($user_type=="STAFF")
                        {
                            $query = "UPDATE staff_information SET password = '$password1' WHERE uid_staff = '$uid'";
                        }
                        elseif($user_type=="EXAMCELL")
                        {
                            $query = "UPDATE examcell SET password = '$password1' WHERE uid = '$uid'";
                        }
                        elseif($user_type=="HOD")
                        {
                            $query = "UPDATE hod_information SET password = '$password1' WHERE uid = '$uid'";
                        }
                        $result = mysqli_query($db, $query);
                        if(!mysqli_query($db,$query))
                        {
                            array_push($errors, "cannot_update_password_in_database");
                            header("Location:  ../php/change_pwd.php?error=cannot_update_password_in_database");
                        }
                        else
                        {
                            header("Location:  ../php/login.php?logout=1");
                        }
                    header("Location: ../php/login.php?logout=1");
                }else
                {
                    header("Location: ../php/change_pwd.php?error=new_passwords_dont_match");
                }
            }
        } 
}
?>