<?php 

include 'server.php';

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

$no_of_students='';

$uid_shift = $shift;
$uid_year = $admission_year_yy;
$uid_branch = $course_shortform;
$uid_fe_or_dse = $current_year_no;
$uid_boy_or_girl = '';
$uid_student_no = '';


if ($uid_fe_or_dse==1) {
	$query = "SELECT no_of_students FROM students_per_year WHERE year = '$admission_year_yyyy'";
}
else{
	$query = "SELECT no_of_students FROM students_per_year_dse WHERE year = '$admission_year_yyyy'";
}
$result = mysqli_query($db, $query);
if(!mysqli_query($db, $query))
{
	array_push($errors, "query_not_processed_for_students_per_year_table");
	header("Location: ../php/files.php?error=query_not_processed_for_students_per_year_table");
}
else
{	
	$check = mysqli_num_rows($result);
	if($check != 1){
		array_push($errors, "dublicate_data_in_students_per_year_table");
		header("Location: ../php/files.php?error=dublicate_data_in_students_per_year_table");
		exit();
	}
	else{
		while ($row = mysqli_fetch_assoc($result)) {
		    $no_of_students = $row["no_of_students"];
		    $no_of_students++;
		}
	}
}

if ($gender == "MALE") {
	$uid_boy_or_girl = "A";
}
else{
		$uid_boy_or_girl = "B";
}

if ($no_of_students<10) {
	$uid_student_no = "00".$no_of_students;
}
elseif ($no_of_students<100) {
	$uid_student_no = "0".$no_of_students;
}
else{
		$uid_student_no = $no_of_students;
}

$uid = $uid_shift.$uid_year.$uid_branch.$uid_fe_or_dse.$uid_student_no.$uid_boy_or_girl;

//password
$pass = $mothername.$admission_year_yyyy;


/*else
{
	
	header('Location: index.php');
}*/

?>