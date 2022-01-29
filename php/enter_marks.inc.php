<?php 
include'server.php';
session_start();

if(isset($_SERVER['HTTP_REFERER'])){
    if(!stristr($_SERVER['HTTP_REFERER'],"enter_marks.php")){
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

$errors = array();
//require '../php/notification_files.inc.php';

$no_of_students = $_SESSION['no_of_students_in_class'];
$batch_no = $_SESSION['batch_no'];
$subject_batch_no = $_SESSION['subject_batch_no'];
$subject_name = $_SESSION['subject_name'];
$subject_short_name = $_SESSION['subject_short_name'];
$exam_type = $_SESSION['ut_tw_pr_th_type'];


//TODO prepared statement for entering marks in particular subject for particular year and branch
$enter_marks_query = mysqli_prepare($db,"UPDATE $subject_batch_no SET $exam_type=? WHERE uid=?");
mysqli_stmt_bind_param($enter_marks_query,"ss",$marks,$uid);

//variable to keep check on marks entered
$record = 0;

if (isset($_POST['final'])) {
	echo "yes selected";
	for ($i=1; $i <= $no_of_students; $i++) { 
		$marks = $_POST['marks'][$i-1];
		$uid = $_POST['rollno'][$i-1];
		if(!($marks=="" || $marks==null)){
			if(mysqli_stmt_execute($enter_marks_query)){
			$record++;
		}
		}
		
		else{
			array_push($errors, "query_not_processed");
			header("Location: ../php/enter_marks.php?error=marks_not_entered");
			exit();
		}
		echo "<br><br><br>Seat no of student ".$i.":- ".$uid;
		echo "<br>Marks of student ".$i.":- ".$marks;
	}

	if ($exam_type = "ut1_marks") {
		$ut_tw_pr_th = "UT1";
	}
	elseif ($exam_type = "ut2_marks") {
		$ut_tw_pr_th = "UT2";
	}
	elseif ($exam_type = "tearm_work") {
		$ut_tw_pr_th = "TERMWORK";
	}
	elseif ($exam_type = "practical") {
		$ut_tw_pr_th = "PRACS";
	}
	else{
		$ut_tw_pr_th = "theory";
	}
	
	$msg = $ut_tw_pr_th." Marks entered for ".$record." student for ".$subject_name."(".$subject_short_name.")";
	$notification = new StaffMarksEntryNotification();
	$notification->set_msg($msg);
	$_SESSION['marks_notification'] .= serialize($notification);
	header("Location: ../php/dashboard_header.php");
}
?>