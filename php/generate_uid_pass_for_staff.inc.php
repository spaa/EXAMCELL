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


$uid = '';
$no_of_staff='';

$uid_year = date('y',strtotime($joining_date));
$uid_branch = $branch_shortform;
$uid_shift = $shift;
$uid_boy_or_girl = '';
$uid_staff_no = '';



$query = "SELECT no_of_staff FROM no_of_staff WHERE sr_no=1";

$result = mysqli_query($db, $query);
if(!mysqli_query($db, $query))
{
	array_push($errors, "query_not_processed_for_staff_per_year_table");
	header("Location: ../php/staf_registration_form.php?error=query_not_processed_for_staff_per_year_table");
}
else
{	
	$check = mysqli_num_rows($result);
	if($check != 1){
		array_push($errors, "dublicate_data_in_no_of_staff_table");
		header("Location: ../php/staf_registration_form.php?error=dublicate_data_in_no_of_staff_table");
		exit();
	}
	else{
		while ($row = mysqli_fetch_assoc($result)) {
		    $no_of_staff = $row["no_of_staff"];
		    $no_of_staff++;
		}
	}
}

if ($gender == "MALE") {
	$uid_boy_or_girl = "A";
}
else{
		$uid_boy_or_girl = "B";
}

if ($no_of_staff<10) {
	$uid_staff_no = "00".$no_of_staff;
}
elseif ($no_of_staff<100) {
	$uid_staff_no = "0".$no_of_staff;
}
else{
		$uid_staff_no = $no_of_staff;
}

$uid = "F".$uid_year.$uid_branch.$uid_shift.$uid_staff_no.$uid_boy_or_girl;

//password
$pass = $mothername.$uid_year;


/*else
{
	
	header('Location: index.php');
}*/

?>