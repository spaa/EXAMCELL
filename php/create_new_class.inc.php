<?php
session_start();
include'server.php';

if(isset($_SERVER['HTTP_REFERER'])){
    if(!stristr($_SERVER['HTTP_REFERER'],"create_new_class.php")){
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

$year = '';
$semister = '';
$course = '';
$class_incharge = '';
$no_of_subjects = '';
$subject1 = '';
$subject2 = '';
$subject3 = '';
$subject4 = '';
$subject5 = '';
$subject6 = '';
$subject_code1 = '';
$subject_code2 = '';
$subject_code3 = '';
$subject_code4 = '';
$subject_code5 = '';
$subject_code6 = '';
$subject_short_name1 = '';
$subject_short_name2 = '';
$subject_short_name3 = '';
$subject_short_name4 = '';
$subject_short_name5 = '';
$subject_short_name6 = '';
$subject_incharge1 = '';
$subject_incharge2 = '';
$subject_incharge3 = '';
$subject_incharge4 = '';
$subject_incharge5 = '';
$subject_incharge6 = '';
$no_of_subjects = '';
$table_name = '';

$subject = array();
$subject_code = array();
$subject_short_name = array();
$subject_incharge = array();

$errors = array();

if(isset($_POST['create_class'])){
	$no_of_subjects = $_POST['no_of_subjects'];

	$year = explode('0',$_POST['year']);
	$year_yyyy = $_POST['year'];
	$year_yy = $year[1];
	
	//V1.0
	//$course= explode(' ',$_POST['course']);
	//$course_fullform = $course[0];
	//$course_shortform = $course[1];
	//V1.1
	$course_fullform = $_POST['course'];
	$course_shortform = $_POST['course_short_name'];

	$semister = $_POST['semister'];
	if ($semister<=2) {
		$course_current_year = "FE";
		$course_current_year_in_no = 1;
	}
	else if($semister<=4){
		$course_current_year = "SE";
		$course_current_year_in_no = 2;
	}
	else if($semister<=6){
		$course_current_year = "TE";
		$course_current_year_in_no = 3;
	}
	else{
		$course_current_year = "BE";
		$course_current_year_in_no = 4;	
	}
	
	$class_incharge = $_POST['class_incharge'];
	$class_incharge_name = explode(' ',$_POST['class_incharge']);
	$class_incharge_first_name = $class_incharge_name[0];
	$class_incharge_middle_name = $class_incharge_name[1];
	$class_incharge_last_name = $class_incharge_name[2];

	//echo $class_incharge."<br>".$class_incharge_first_name."<br>".$class_incharge_middle_name."<br>".$class_incharge_last_name;

	$subject1 = strtoupper($_POST['subject1']);
	$subject2 = strtoupper($_POST['subject2']);
	$subject3 = strtoupper($_POST['subject3']);
	$subject4 = strtoupper($_POST['subject4']);
	$subject5 = strtoupper($_POST['subject5']);
	$subject6 = strtoupper($_POST['subject6']);

	$subject_code1 = strtoupper($_POST['subject_code1']);
	$subject_code2 = strtoupper($_POST['subject_code2']);
	$subject_code3 = strtoupper($_POST['subject_code3']);
	$subject_code4 = strtoupper($_POST['subject_code4']);
	$subject_code5 = strtoupper($_POST['subject_code5']);
	$subject_code6 = strtoupper($_POST['subject_code6']);

	$subject_short_name1 = strtoupper($_POST['subject_short_name1']);
	$subject_short_name2 = strtoupper($_POST['subject_short_name2']);
	$subject_short_name3 = strtoupper($_POST['subject_short_name3']);
	$subject_short_name4 = strtoupper($_POST['subject_short_name4']);
	$subject_short_name5 = strtoupper($_POST['subject_short_name5']);
	$subject_short_name6 = strtoupper($_POST['subject_short_name6']);

	$subject_incharge1 = strtoupper($_POST['subject_incharge1']);
	$subject_incharge2 = strtoupper($_POST['subject_incharge2']);
	$subject_incharge3 = strtoupper($_POST['subject_incharge3']);
	$subject_incharge4 = strtoupper($_POST['subject_incharge4']);
	$subject_incharge5 = strtoupper($_POST['subject_incharge5']);
	$subject_incharge6 = strtoupper($_POST['subject_incharge6']);

	if ($no_of_subjects==6) {
		array_push($subject,$subject1,$subject2,$subject3,$subject4,$subject5,$subject6);
		array_push($subject_code,$subject_code1,$subject_code2,$subject_code3,$subject_code4,$subject_code5,$subject_code6);
		array_push($subject_short_name,$subject_short_name1,$subject_short_name2,$subject_short_name3,$subject_short_name4,$subject_short_name5,$subject_short_name6);
		array_push($subject_incharge,$subject_incharge1,$subject_incharge2,$subject_incharge3,$subject_incharge4,$subject_incharge5,$subject_incharge6);
	}
	elseif ($no_of_subjects==5) {
		array_push($subject,$subject1,$subject2,$subject3,$subject4,$subject5);
		array_push($subject_code,$subject_code1,$subject_code2,$subject_code3,$subject_code4,$subject_code5);
		array_push($subject_short_name,$subject_short_name1,$subject_short_name2,$subject_short_name3,$subject_short_name4,$subject_short_name5);
		array_push($subject_incharge,$subject_incharge1,$subject_incharge2,$subject_incharge3,$subject_incharge4,$subject_incharge5);
	}
	else{
		array_push($subject,$subject1,$subject2,$subject3,$subject4);
		array_push($subject_code,$subject_code1,$subject_code2,$subject_code3,$subject_code4);
		array_push($subject_short_name,$subject_short_name1,$subject_short_name2,$subject_short_name3,$subject_short_name4);
		array_push($subject_incharge,$subject_incharge1,$subject_incharge2,$subject_incharge3,$subject_incharge4);
	}
	//print_r($subject);


	$table_name = $course_shortform.$year_yy.$semister;
	//echo $table_name.'1'."<br>".$year_yyyy;

	$sql = "INSERT INTO class_batch (batch_no,batch_year,batch_branch,batch_branch_short_name,batch_current_year,batch_current_year_in_no,batch_sem,class_incharge) VALUES ('$table_name', '$year_yyyy','$course_fullform' , '$course_shortform', '$course_current_year', '$course_current_year_in_no', '$semister', '$class_incharge')";
	if(!$logged = mysqli_query($db, $sql))
	{
		array_push($errors, "DATA NOT INSERTED IN CLASS BATCH");
		header("Location: ../php/create_new_class.php?error=data_not_inserted_in_class_batch");
	}
	else
	{
		//THIS WILL CREATE NOTIFICATION ABOUT CLASS ALLOTED
		//stores current event array---complete array
		$class_alloted = array();
		//stores notification
		$notify = array();
		date_default_timezone_set("Asia/Kolkata");
		//current year:-to create current year folder if not exist
		$curr_year = date("Y");
		//folder containing json files which stores notification to staff about sem activated
		$file = "../files/notifications_for_staff/notification_for_class_alloted_by_hod_per_year/".$curr_year;

		if(file_exists($file)){
			$file_folder = $file."/".$course_fullform;
				if(file_exists($file_folder)){
					//json file containing notification to staff about sem activated
					$json_file = $file_folder."/class_alloted.json";
					//open file if exists
					if(file_exists($json_file))
						$sem_activated = json_decode(file_get_contents($json_file),true);
				}
				else{
					mkdir($file_folder);
					$json_file = $file_folder."/class_alloted.json";
				}                      
		}
		//else create new folder
		else{
			mkdir($file);
			$file_folder = $file."/".$course_fullform;
			mkdir($file_folder);
			$json_file = $file_folder."/class_alloted.json";						
		}
                            $notify = array(
                                'date' => date("jS F, Y"),//date('d-m-Y'),
                            'day' => date('l'),
                            'time' => date('h:i:s A'),
							'batch_no' => $table_name,
							'batch_year' => $year_yyyy,
                            'sem' => $semister,
                            'branch' => $course_fullform,
							'branch_short_name' => $course_shortform,
							'batch_current_year' => $course_current_year,
                            'batch_current_year_in_no' => $course_current_year_in_no,
                            'notification' => 'CLASS ALLOTED',
                            'notification_type' => 'class_alloted',
                            'viewed' => 'no'
                            );

                                $class_alloted[] = array(
                                    //'uid' => $subject_incharge_uid,
                                    'name' => $class_incharge,
                                    'notification' => array($notify)
                                    );   
                    
            if(file_put_contents($json_file,json_encode($class_alloted)))
            {
                echo $file."  file created successfully....<br>";
            }
            else {
				array_push($errors, "ERROR WHILE COPYING DATA");				
                echo "Error while copying contents in $json_file";
			}
			

		//header("Location: ../php/create_new_class.php?success=data_inserted_in_class_batch");
	
		/*TODO once year is done set classs_incharge value to 0 again
		if we dont do this then following may happen
		suppose a teacher is given class incharge of Class A in 2015 so value of class_incharge=1
		and next year none of the class incharge is alloted to her and still the value of class_incharge=1
		*/
		$mysql = "UPDATE staff_information SET class_incharge='1' WHERE first_name = '$class_incharge_first_name' AND middle_name = '$class_incharge_middle_name' AND last_name = '$class_incharge_last_name'";
		//$query = mysqli_query($db,$mysql);
		if(!mysqli_query($db,$mysql))
		{
			array_push($errors, "cannot_update_class_incharge_info_in_staff_information_database");
			header("Location: create_new_class.php?error=cannot_update_class_incharge_info_in_staff_information_database");
			exit();
		}	
		else{			
				$query = "CREATE TABLE IF NOT EXISTS $table_name (
					batch_id int NOT NULL AUTO_INCREMENT,
				    student_name varchar(50),
				    uid varchar(20),
				    seat_no varchar(12),
				    subject1 varchar(5),
				    subject2 varchar(5),
				    subject3 varchar(5),
				    subject4 varchar(5),
				    subject5 varchar(5),
				    subject6 varchar(5),
				    hall_ticket_verified int(2) NOT NULL,
				    exam_verified int(2) NOT NULL,
				    marks_verified int(2) NOT NULL,
				    PRIMARY KEY (batch_id)
				) ";

				$result = mysqli_query($db, $query);

				if($stmt = mysqli_query($db,"SHOW TABLES LIKE $table_name ")){
					 if(mysqli_num_rows($stmt) ==1 ){
						echo "table is created ";
					  }else{
						header("Location: ../php/create_new_class.php?error=new_class_batch_table_already_exist");
						exit();
					}
				}

				//hallticket table
				$query = "CREATE TABLE IF NOT EXISTS $table_name"."_hallticket (
					sub_id INTEGER NOT NULL AUTO_INCREMENT,
				    subject_code varchar(10),
				    subject_name varchar(70),
				    date_of_exam varchar(15),
				    time_of_exam varchar(15),
					PRIMARY KEY sub_id(sub_id)
				)";

				$result = mysqli_query($db, $query);

				/*if($result = mysqli_query($db, $query)){
					echo "table_created";
				}
				else{
					header("Location: ../php/create_new_class.php?error=new_hallticket_table_not_created");
						exit();
				}*/

				if($stmt = mysqli_query($db,"SHOW TABLES LIKE $table_name ")){
					 if(mysqli_num_rows($stmt) ==1 ){
						echo "table is created ";
					  }else{
						header("Location: ../php/create_new_class.php?error=new_hallticket_table_not_created");
						exit();
					}
				}
		}
		//THIS WILL CREATE NOTIFICATION ABOUT SUBJECTS ALLOTED
		//stores current event array---complete array
		$subject_alloted = array();
		//stores notification
		$notify = array();
		date_default_timezone_set("Asia/Kolkata");
		//current year:-to create current year folder if not exist
		$curr_year = date("Y");
		//folder containing json files which stores notification to staff about sem activated
		$file = "../files/notifications_for_staff/notification_for_subjects_alloted_by_hod_per_year/".$curr_year;

		for ($i=0; $i < $no_of_subjects ; $i++) { 
			# code...
			$subject_incharge_name = explode(" ",$subject_incharge[$i]);
			$subject_incharge_first_name = $subject_incharge_name[0];
			$subject_incharge_middle_name = $subject_incharge_name[1];
			$subject_incharge_last_name = $subject_incharge_name[2];

			$uid_query = "SELECT uid_staff FROM staff_information WHERE first_name ='$subject_incharge_first_name' AND middle_name = '$subject_incharge_middle_name' AND last_name = '$subject_incharge_last_name'";
			$result_uid_query = mysqli_query($db,$uid_query);
			if(mysqli_num_rows($result_uid_query)!=1){
				array_push($errors, "TEACHER NOT FOUND");
				echo $subject_incharge_first_name." ".$subject_incharge_last_name;
			}
			else{
				$row = mysqli_fetch_assoc($result_uid_query);
				$subject_incharge_uid = $row['uid_staff'];


				$subject_batch_no = $table_name.$i;

			$sql = "INSERT INTO subject_incharge (batch_no,subject_batch_no,subject_name,subject_short_name,subject_code,subject_incharge_uid)
				        VALUES ('$table_name','$subject_batch_no','$subject[$i]','$subject_short_name[$i]','$subject_code[$i]','$subject_incharge_uid')";
			//$logged = mysqli_query($db, $sql);
			if(!$logged = mysqli_query($db, $sql))
			{
				array_push($errors, "DATA NOT INSERTED IN SUBJECT INCHARGE TABLE");
				header("Location: ../php/create_new_class.php?error=data_not_inserted_in_subject_incharge_table");
			}
			else
			{
				//THIS WILL CREATE NOTIFICATION ABOUT SUBJECTS ALLOTED                    
                //open folder if exist 
		if(file_exists($file)){
			$file_folder = $file."/".$course_fullform;
				if(file_exists($file_folder)){
					//json file containing notification to staff about sem activated
					$json_file = $file_folder."/subjects_alloted.json";
					//open file if exists
					if(file_exists($json_file))
						$sem_activated = json_decode(file_get_contents($json_file),true);
				}
				else{
					mkdir($file_folder);
					//json file containing notification to staff about sem activated
					$json_file = $file_folder."/subjects_alloted.json";
				}                    
		}
		//else create new folder
		else{
			mkdir($file);
			$file_folder = $file."/".$course_fullform;
			mkdir($file_folder);
			$json_file = $file_folder."/subjects_alloted.json";						
		}
                        //Finding index of object element in array
                        $index = array_search($subject_incharge_uid,array_column($subject_alloted,"uid"));
                        if(in_array($subject_incharge_uid,$subject_alloted[$index])){
                            //Method 1
                            $notify = array(
                                'subject_name' => $subject[$i],
                            'subject_short_name' => $subject_short_name[$i],
                            'date' => date("jS F, Y"),//date('d-m-Y'),
                            'day' => date('l'),
                            'time' => date('h:i:s A'),
                            'batch_no' => $table_name,
                            'subject_batch_no' => $subject_batch_no,
                            'subject_code' => $subject_code[$i],
                            'sem' => $semister,
                            'branch' => $course_fullform,
							'branch_short_name' => $course_shortform,
							'batch_current_year' => $course_current_year,
                            'batch_current_year_in_no' => $course_current_year_in_no,
                            'notification' => 'SUBJECT ALLOTED',
                            'notification_type' => 'subject_alloted',
                            'viewed' => 'no'
                            );
                            array_push($subject_alloted[$index]["notification"],$notify);

                        }
                        else
                        {
                            $notify = array(
                                'subject_name' => $subject[$i],
                            'subject_short_name' => $subject_short_name[$i],
                            'date' => date("jS F, Y"),//date('d-m-Y'),
                            'day' => date('l'),
                            'time' => date('h:i:s A'),
                            'batch_no' => $table_name,
                            'subject_batch_no' => $subject_batch_no,
                            'subject_code' => $subject_code[$i],
                            'sem' => $semister,
                            'branch' => $course_fullform,
							'branch_short_name' => $course_shortform,
							'batch_current_year' => $course_current_year,
                            'batch_current_year_in_no' => $course_current_year_in_no,
                            'notification' => 'SUBJECT ALLOTED',
                            'notification_type' => 'subject_alloted',
                            'viewed' => 'no'
                            );

                                $subject_alloted[] = array(
                                    'uid' => $subject_incharge_uid,
                                    'name' => $subject_incharge[$i],
                                    'notification' => array($notify)
                                    );   
                        }
                    
                    
            if(file_put_contents($json_file,json_encode($subject_alloted)))
            {
                echo $file."  file created successfully....<br>";
                //header("Location: create_new_class.php?successful");
            }
            else {
                /*
                //text file contains which link is activated
                $link_activate_file = fopen("link_activated.txt","w");
                fwrite($link_activate_file,$text);
				fclose($link_activate_file);*/
				array_push($errors, "ERROR WHILE COPYING DATA");				
                echo "Error while copying contents in $json_file";
			}
			
			//CREATE TABLES FOR EACH SUBJECTS
				$query = "CREATE TABLE IF NOT EXISTS $subject_batch_no (
					subject_batch_id int NOT NULL AUTO_INCREMENT,
				    uid varchar(20),
				    ut1_marks varchar(5) NOT NULL,
				    ut1_marks_verified int(2) NOT NULL,
				    ut2_marks varchar(5) NOT NULL,
				    ut2_marks_verified int(2) NOT NULL,
				    aggregate varchar(5) NOT NULL,
				    tearm_work varchar(5) NOT NULL,
				    practical varchar(5) NOT NULL,
				    theory varchar(5) NOT NULL,
				    pointer varchar(5) NOT NULL,
				    marks_verified int(2) NOT NULL,
				    PRIMARY KEY (subject_batch_id)
				) ";

				$result = mysqli_query($db, $query);

				if($stmt = mysqli_query($db,"SHOW TABLES LIKE $subject_batch_no ")){
					 if(mysqli_num_rows($stmt) ==1 ){
						echo "table is created ";
					  }else{
						header("Location: ../php/create_new_class.php?error=subject_batch_table_already_exist");
						exit();
					}
				}

				$sql = "INSERT INTO $table_name"."_hallticket (subject_code,subject_name)
				        VALUES ('$subject_code[$i]','$subject[$i]')";
				
				if(!$logged = mysqli_query($db, $sql))
				{
					array_push($errors, "DATA NOT INSERTED IN SUBJECT INCHARGE TABLE");
					header("Location: ../php/create_new_class.php?error=data_not_inserted_in_class_hallticket");
				}
			}
			}
		}

		if (count($errors) == 0) {
			header("Location: ../php/create_new_class.php?successfully_created_class");
		}
/**/
	}

	
}
?>