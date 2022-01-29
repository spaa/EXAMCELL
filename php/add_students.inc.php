<?php
session_start();
include'server.php';

if(isset($_SERVER['HTTP_REFERER'])){
    if(!stristr($_SERVER['HTTP_REFERER'],"add_students.php")){
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


$total_class = $_SESSION['total_class'];
for ($i=1; $i <= $total_class; $i++) { 
	if (isset($_POST[$i])) {
		$batch_no = $_POST[$i];
		/*echo "successful ".$i." sr_no:-".$batch_no;
		$batch_no = $_POST["batch_no"];
		$batch_year = $_POST["batch_year"];
		$batch_branch = $_POST["batch_branch"];
		$batch_sem = $_POST["batch_sem"];

		echo $batch_no." ".$batch_year." ".$batch_branch." ".$batch_sem;*/

		$query = "SELECT * FROM class_batch WHERE batch_no = '$batch_no'";
		$result = mysqli_query($db, $query);
	    if(mysqli_num_rows($result) == 1)
	    {
	    	while ($row = mysqli_fetch_assoc($result)) 
	    	{
	    		$batch_year = $row["batch_year"];
				$batch_branch = $row["batch_branch"];
				$batch_sem = $row["batch_sem"];
			}
			//echo $batch_no." ".$batch_year." ".$batch_branch." ".$batch_sem;

			$query = "UPDATE class_batch SET class_filled='1' WHERE batch_no = '$batch_no'";
			
			if(!($result = mysqli_query($db, $query)))
			{
				array_push($errors, "class_filled_not_updated_in_class_batch_table");
				header("Location: ../php/add_students.php?error=class_filled_not_updated_in_class_batch_table");
			}	
			else
			{	

				$query = "INSERT INTO $batch_no (student_name,uid) SELECT CONCAT(last_name,' ',first_name,' ',middle_name) as 'student_name',uid FROM student_general_info WHERE current_year_yyyy = '$batch_year' AND current_year = '$batch_branch' AND current_sem = '$batch_sem' ORDER BY student_name";
				
				if(!mysqli_query($db, $query))
				{
					array_push($errors, "student_not_selected_to_add_in_class_form_student_general_info");
					header("Location: ../php/add_students.php?error=student_not_inserted_in_class_form_student_general_info");
				}
				else
				{
					$query = "SELECT * FROM $batch_no";
					$result = mysqli_query($db, $query);	
					while ($row = mysqli_fetch_assoc($result)) 
					{
						$batch_id = $row["batch_id"];
						if ($batch_id<10) {
							$seat_no = $batch_sem."00".$batch_id;
						}
						else{
							$seat_no = $batch_sem."0".$batch_id;
						}
						$sql = "UPDATE $batch_no SET seat_no='$seat_no' WHERE batch_id = '$batch_id'";
						
						if(!($res = mysqli_query($db,$sql)))
						{
							array_push($errors, "cannot_update_seat_no_in_current_class");
							header("Location: ../php/add_students.php?error=cannot_update_seat_no_in_current_class");
							exit();
						}	
					}			
							for ($j=0; $j < 6; $j++) { 
									$subject_batch_no = $batch_no.$j;
									$query = "INSERT INTO $subject_batch_no (student_name,uid) SELECT CONCAT(last_name,' ',first_name,' ',middle_name) as 'student_name',uid FROM student_general_info WHERE current_year_yyyy = '$batch_year' AND current_year = '$batch_branch' AND current_sem = '$batch_sem' ORDER BY student_name";
									
									if(!mysqli_query($db, $query))
									{
										array_push($errors, "student_not_selected_to_add_in_class_form_student_general_info");
										header("Location: ../php/add_students.php?error=student_not_inserted_in_each_seperate_class_form_student_general_info");
										exit();
									}
									
							}
						
						if (count($errors) == 0) {
							header("Location: ../php/add_students.php?successfully_added_students_to_particular_class");
						}
				}
			}
		}
		
	}
}


?>