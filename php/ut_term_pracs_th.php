<?php 
//include'dashboard_header.php';
include 'server.php';
session_start();

if(isset($_SERVER['HTTP_REFERER'])){
    if(!stristr($_SERVER['HTTP_REFERER'],".php")){
		header('HTTP/1.0 403 Forbidden');
        //header("Location: 403-forbidden-error.php");
    }
    else{
        //echo "Good";
    }
}
else{
	header('HTTP/1.0 403 Forbidden');
    //header("Location: 403-forbidden-error.php");
    echo "Not Supported";
}

$errors = array();

//Note it is not required now because earlier we used for loop for which we required to know the no. of subjects teacher is teaching
//it is done because this page can be loaded by clicking a link in notification
/*if(isset($_SERVER['HTTP_REFERER'])){
	if(stristr($_SERVER['HTTP_REFERER'],"staff_notification.php")){
		$total_class = $_POST['total_no_of_subjects'];
	}
	else{
		$total_class = $_SESSION['total_no_of_subjects_alloted'];
	}
}
else{
	$total_class = $_SESSION['total_no_of_subjects_alloted'];
}*/
//earlier logic:-since each subject had unique name a for loop was required to find which subject was selected
//for ($i=1; $i <= $total_class; $i++) {
	//if (isset($_POST['$i'])) {
	//$subject_batch_no = $_POST[$i];
	//echo $subject_batch_no;

	//Now Latest:-since each subject have same name
	if (isset($_POST['enter_marks'])) {
		$subject_batch_no = $_POST['subject_batch_no'];				
	
		$query = "SELECT * FROM subject_incharge WHERE subject_batch_no = '$subject_batch_no'";
		$result = mysqli_query($db, $query);
	    if(mysqli_num_rows($result) == 1)
	    {
	    	while ($row = mysqli_fetch_assoc($result)) 
	    	{
	    		$subject_name = $row["subject_name"];
				$subject_short_name = $row["subject_short_name"];
				$batch_no = $row["batch_no"];
				$subject_code = $row["subject_code"];
			}
			
			$_SESSION['batch_no'] = $batch_no;
			$_SESSION['subject_batch_no'] = $subject_batch_no;
			$_SESSION['subject_name'] = $subject_name;
			$_SESSION['subject_short_name'] = $subject_short_name;
			$_SESSION['subject_code'] = $subject_code;

		/*echo "<div class='w3-card-4 w3-margin w3-center w3-white'>

			<div class='w3-container w3-black w3-padding-large w3-xxlarge' style='text-shadow:1px 1px 0 orange'> ENTER MARKS IN ".$subject_name."(".$subject_short_name.")
			</div>
		<form class='w3-mobile w3-margin w3-padding' action='../php/enter_marks.php' method='POST' enctype='multipart/form-data'>
		<input type='submit' class='w3-btn w3-teal w3-padding w3-round-large' name='exam_marks' value='UT1'>
		<input type='submit' class='w3-btn w3-teal w3-padding w3-round-large' name='exam_marks' value='UT2'>
		<input type='submit' class='w3-btn w3-teal w3-padding w3-round-large' name='exam_marks' value='PRACS'>
		<input type='submit' class='w3-btn w3-teal w3-padding w3-round-large' name='exam_marks' value='TERMWORK'>
		<input type='submit' class='w3-btn w3-teal w3-padding w3-round-large' name='exam_marks' value='THEORY'>
		</form>
		</div>
		";*/

		header("Location: ../php/exam_type.php");
		echo "<div class='w3-card-4 w3-margin w3-center w3-white'>
		<div class='w3-container w3-black w3-padding-large w3-xxlarge' style='text-shadow:1px 1px 0 orange'> ENTER MARKS IN $subject_name($subject_short_name)
		</div>
		<form class='w3-mobile w3-margin w3-padding' action='../php/enter_marks.php' method='POST' enctype='multipart/form-data'>
		";
		}
	}
	else{
		header("Location: 403-forbidden-error.php");
	}
//}
?>
<input type='submit' class='w3-btn w3-teal w3-padding w3-round-large' name='exam_marks' value='UT1'>
<input type='submit' class='w3-btn w3-teal w3-padding w3-round-large' name='exam_marks' value='UT2'>
<input type='submit' class='w3-btn w3-teal w3-padding w3-round-large' name='exam_marks' value='PRACS'>
<input type='submit' class='w3-btn w3-teal w3-padding w3-round-large' name='exam_marks' value='TERMWORK'>
<input type='submit' class='w3-btn w3-teal w3-padding w3-round-large' name='exam_marks' value='THEORY'>
</form>
</div>