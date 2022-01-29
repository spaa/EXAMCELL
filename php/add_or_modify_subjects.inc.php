<?php
session_start();
include'server.php';

if(isset($_SERVER['HTTP_REFERER'])){
    if(!stristr($_SERVER['HTTP_REFERER'],"add_or_modify_subjects.php")){
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

$subject_name = "";
$subject_short_name = "";
$subject_branch = "";
$subject_credit_t = "";
$subject_credit_o = "";

if(isset($_POST['add_subject_detail'])){
	$subject_name = $_POST['subject_name'];
	$subject_short_name = $_POST['subject_short_name'];
	$subject_branch = $_POST['branch'];
	$subject_credit_t = $_POST['subject_credit_t'];
	$subject_credit_o = $_POST['subject_credit_o'];

	$query = "INSERT INTO subject_list(subject_name,subject_short_name,branch, credit_point_t , credit_point_o) 
	VALUES('$subject_name','$subject_short_name','$subject_branch',$subject_credit_t,$subject_credit_o)";

	if(mysqli_query($db,$query))
	{
		header("Location: ../php/add_or_modify_subjects.php?success=data_inserted_in_subject_list");
		
	}
	else{
		array_push($errors, "DATA NOT INSERTED IN SUBJECT LIST");
		header("Location: ../php/add_or_modify_subjects.php?error=data_not_inserted_in_subject_list");
	}
}

else{
	$sql = "SELECT * FROM subject_list";

	if($res = mysqli_query($db,$sql))
		$n = mysqli_num_rows($res);
	//echo "$n , ";
	for ($i=0; $i < $n; $i++) { 
		
		if(isset($_POST['modify_subject'.$i])){
			$subject_name = $_POST['subject_name'.$i];
			$subject_short_name = $_POST['subject_short_name'.$i];
			$subject_branch = $_POST['subject_branch'.$i];
			$subject_credit_t = $_POST['subject_credit_t'.$i];
			$subject_credit_o = $_POST['subject_credit_o'.$i];

			//echo "$subject_name , $subject_branch , $subject_credit_o , $subject_credit_t";

			$query = "UPDATE subject_list SET credit_point_t = $subject_credit_t,credit_point_o = $subject_credit_o 
			WHERE subject_name = '$subject_name' AND branch = '$subject_branch'";

			if(!$logged = mysqli_query($db,$query))
			{
				array_push($errors, "DATA NOT UPDATED IN SUBJECT LIST");
				header("Location: ../php/add_or_modify_subjects.php?error=data_not_updated_in_subject_list");
			}
			else{
				header("Location: ../php/add_or_modify_subjects.php?success=data_updated_in_subject_list");
			}
		}

		if(isset($_POST['delete_subject'.$i])){
			$subject_name = $_POST['subject_name'.$i];
			$subject_short_name = $_POST['subject_short_name'.$i];
			$subject_branch = $_POST['subject_branch'.$i];
			$subject_credit_t = $_POST['subject_credit_t'.$i];
			$subject_credit_o = $_POST['subject_credit_o'.$i];

			$query = "DELETE FROM subject_list 
			WHERE subject_name = '$subject_name' AND branch = '$subject_branch'";

			if(!$logged = mysqli_query($db,$query))
			{
				array_push($errors, "DATA NOT DELETED FROM SUBJECT LIST");
				header("Location: ../php/add_or_modify_subjects.php?error=data_not_deleted_from_subject_list");
			}
			else{
				header("Location: ../php/add_or_modify_subjects.php?success=data_deleted_from_subject_list");
			}
		}
	}
}
