<?php include 'dashboard_header.php';?>
<?php //include 'server.php';?>
<br>
<?php
//Earlier:-each exam type had unique name so for loop was required
//I assumed that if each exam_type(input) had same name then even after clicking 3rd input the $_POST[$i] would take 1st input value
//but the assumption was wrong
//for($i=1;$i<=5;$i++){
//if (isset($_POST[$i])) {

//TODO $_SERVER['HTTP_REFERER']
//V1.1
//if this page opens from notification
$notification_referer = -1;
if(isset($_SERVER['HTTP_REFERER'])){
	if(stristr($_SERVER['HTTP_REFERER'],"staff_notification.php")){
		$type = $_SESSION['exam_type'];
		$notification_referer = 1;
	}
}
//Now
if (isset($_POST['exam_marks'])) {
	$errors = array();
	//$type = $_POST[$i];
	$type = $_POST['exam_marks'];
	//V1.0 nothing
	//V1.1
	$notification_referer = 1;
}
//V1.0
//if(isset($_POST['exam_marks'])||$notification_referer==1){
//V1.1
if($notification_referer==1){
	$subject_name = $_SESSION['subject_name'];
	$subject_short_name = $_SESSION['subject_short_name'];
	$batch_no = $_SESSION['batch_no'];
	$subject_batch_no = $_SESSION['subject_batch_no'];

	if ($type == "UT1") {
		$ut_tw_pr_th_type = "ut1_marks";
	}
	elseif ($type == "UT2") {
		$ut_tw_pr_th_type = "ut2_marks";
	}
	elseif ($type == "TERMWORK") {
		$ut_tw_pr_th_type = "tearm_work";
	}
	elseif ($type == "PRACS") {
		$ut_tw_pr_th_type = "practical";
	}
	else{
		$ut_tw_pr_th_type = "theory";
	}

echo "
	<form class='w3-mobile w3-margin' action='enter_marks.inc.php' method='post' enctype='multipart/form-data'>
	<div class='w3-container w3-center w3-black w3-padding-large w3-xxlarge' style='text-shadow:1px 1px 0 orange'>".$type."<br>".$subject_name."(".$subject_short_name.")
			</div>
	<div class='w3-responsive'>
   	<table class='w3-table-all w3-card-4'>
   	<thead>
    <tr class='w3-teal _9_documents'>
		<th>SEAT NO.</th>
		<th>STUDENT NAME</th>
		<th>UID</th>
		<th>MARKS</th>
		<th>SAVE/UPDATE</th>
	</tr>
	</thead>";

	$no_of_students  = 0;

	//TODO Modify this code for faster processing
	//V1.0
	//$query = "SELECT * FROM $batch_no";
	//V1.1
	$query = "SELECT s.seat_no,s.student_name,s.uid,c.$ut_tw_pr_th_type FROM $batch_no s INNER JOIN $subject_batch_no c ON s.uid = c.uid";
	//V1.2
	/*$query = "SELECT * FROM $batch_no";
	$subject_batch_query = mysqli_prepare($db,"SELECT $ut_tw_pr_th_type FROM $subject_batch_no WHERE uid = ?");
	mysqli_stmt_bind_param($subject_batch_query,"s",$student_uid);*/

	$result = mysqli_query($db, $query);
	if(mysqli_num_rows($result) > 0)
	{
	   	while ($row = mysqli_fetch_assoc($result)) 
	    {
	    	$no_of_students++;

	    	$seat_no = $row["seat_no"];
			$student_name = $row["student_name"];
			$student_uid = $row["uid"];
			
			//V1.0
			/*$query1 = "SELECT $ut_tw_pr_th_type FROM $subject_batch_no WHERE uid = '$student_uid'";
			$result1 = mysqli_query($db, $query1);
			if(mysqli_num_rows($result1) == 1)
			{
			   	while ($row = mysqli_fetch_assoc($result1)) 
			    {
					*/
			//V1.2			
			/*if(mysqli_stmt_execute($subject_batch_query))
			{
			   	while ($row = mysqli_fetch_assoc($result1)) 
			    {*/
					$ut_tw_pr_th = $row[$ut_tw_pr_th_type];
			    	$_SESSION['ut_tw_pr_th'] = $ut_tw_pr_th;
			    	$_SESSION['ut_tw_pr_th_type'] = $ut_tw_pr_th_type;
			    	
					echo "<tr>";
					echo "<td name='".$seat_no."'>".$seat_no."</td>";
					echo "<td name='".$student_name."'>".$student_name."</td>";
					echo "<td name='".$student_uid."'><input readonly class='w3-padding' type='text' name='rollno[]' value='".$student_uid."' style='border:none;border-color:transparent;'></input></td>";
					
					if($ut_tw_pr_th=="" || $ut_tw_pr_th==null){
						echo "<td name='".$ut_tw_pr_th_type."'> <input class='w3-input w3-hover-border-teal w3-round-xxlarge w3-padding marks' type='text' name='marks[]' placeholder='0' value='".$ut_tw_pr_th."'> </td>";
						echo "<td name=''><input type='submit' class='w3-btn w3-round-xxlarge w3-teal w3-hover-teal w3-content' value='SAVE MARKS' name=''></td></tr>";
					}
					else{
						echo "<td name='".$ut_tw_pr_th_type."'> <input class='w3-input w3-hover-border-teal w3-round-xxlarge w3-padding marks' type='text' name='marks[]' placeholder='0' value='".$ut_tw_pr_th."' readonly> </td>";
						echo "<td name=''><input type='text' class='w3-btn w3-round-xxlarge w3-red' value='LOCKED' readonly></td></tr>";
					}

				/*}

			}*/
		}
	}

	$_SESSION['no_of_students_in_class'] = $no_of_students;

	echo "</table></div>
	<br>
	<input type='submit' class='w3-btn w3-round-xxlarge w3-teal w3-hover-teal w3-content' value='SAVE MARKS' style='position:relative;left:46%;' name='final'></form>
	";
}
else{
    echo "<script>window.location.href = '../php/403-forbidden-error.php';</script>";
}
//}
?>
</body>
</html>