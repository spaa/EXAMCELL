<?php

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

	
	$dirc = "../files/student_files/".$uid;
	if (!file_exists($dirc)) {
		mkdir($dirc);
	}
	
	for ($i=1; $i <5 ; $i++) { 
	# code...

		$file = $_FILES['file'.$i];
		

		$fileName = $_FILES['file'.$i]['name'];
		$fileType = $_FILES['file'.$i]['type'];
		$fileTmpName = $_FILES['file'.$i]['tmp_name'];
		$fileError =$_FILES['file'.$i]['error'];
		$fileSize =$_FILES['file'.$i]['size'];

		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));

		$allowed = array('pdf');
		$allowed2 = array('jpeg','jpg','png');

		if ($i<3) {
			# code...
		
			if (in_array($fileActualExt, $allowed)) {
				if ($fileError === 0) {
					if ($fileSize < 100000000) {
						switch ($i) {
							case '1':
									$fileNameNew = "10th.".$fileActualExt;
									$fileDestination = '../files/student_files/'.$uid."/".$fileNameNew;

									$upload_image = "UPDATE student_general_info SET ssc_marksheet='$fileDestination' WHERE uid = '$uid'";
									$result_image = mysqli_query($db,$upload_image);
									if(!mysqli_query($db,$upload_image))
									{
										array_push($errors, "10th_marksheet_cannot_be_uploaded_in_database");
										header("Location: index.php?error=10th_marksheet_cannot_be_uploaded_in_database");
									}	
									else{			
									move_uploaded_file($fileTmpName, $fileDestination);
									}
									break;

							case '2':
									$fileNameNew = "12th.".$fileActualExt;
									$fileDestination = '../files/student_files/'.$uid."/".$fileNameNew;				
									$upload_image = "UPDATE student_general_info SET hsc_marksheet='$fileDestination' WHERE uid = '$uid'";
									$result_image = mysqli_query($db,$upload_image);
									if(!mysqli_query($db,$upload_image))
									{
										array_push($errors, "12th_marksheet_cannot_be_uploaded_in_database");
										header("Location: index.php?error=12th_marksheet_cannot_be_uploaded_in_database");
									}	
									else{			
									move_uploaded_file($fileTmpName, $fileDestination);
									}
									break;
								
							default:
									echo "error";
									break;
						}


						
					}
					else{
						array_push($errors, "File_size_is_too_large_for_pfg");
						header("Location: index.php?error=File_size_is_too_large_for_pdf");
					}
				}
				else{
					array_push($errors, "There_was_an_error_while_uploading_file_pdf");
					header("Location: index.php?error=There_was_an_error_while_uploading_file_pdf");
				}
			}

			else{
				if($fileName!="")
				{
					array_push($errors, "You_cannot_upload_files_of_this_type_for_pdf");
					header("Location: index.php?error=You_cannot_upload_files_of_this_type_for_pdf");
				}
				else{
					array_push($errors, "upload=nothing");
					header("Location: index.php?upload=nothing");
				}
			}
		}

		else{

			if (in_array($fileActualExt, $allowed2)) {
				if ($fileError === 0) {
					if ($fileSize < 1000000) {
						switch ($i) {

							case '1':
								# code...
								break;

							case '2':
								# code...
								break;

							case '3':
									$fileNameNew = "photo.".$fileActualExt;
									$fileDestination = '../files/student_files/'.$uid."/".$fileNameNew;				
									$upload_image = "UPDATE student_general_info SET photo='$fileDestination' WHERE uid = '$uid'";
									$result_image = mysqli_query($db,$upload_image);
									if(!mysqli_query($db,$upload_image))
									{
										array_push($errors, "photo_cannot_be_uploaded_in_database");
										header("Location: index.php?error=photo_cannot_be_uploaded_in_database");
									}	
									else{			
									move_uploaded_file($fileTmpName, $fileDestination);
									}
									break;

							case '4':
									$fileNameNew = "signature.".$fileActualExt;
									$fileDestination = '../files/student_files/'.$uid."/".$fileNameNew;				
									$upload_image = "UPDATE student_general_info SET signature='$fileDestination' WHERE uid = '$uid'";
									$result_image = mysqli_query($db,$upload_image);
									if(!mysqli_query($db,$upload_image))
									{
										array_push($errors, "signature_cannot_be_uploaded_in_database");
										header("Location: index.php?error=signature_cannot_be_uploaded_in_database");
									}	
									else{			
									move_uploaded_file($fileTmpName, $fileDestination);
									}
									break;
								
							default:
									echo "error";
									break;
						}

						/*$fileNameNew = "profile_".$username.".".$fileActualExt;

						$fileDestination = '../images/student_signature/'.$fileNameNew;
						
						move_uploaded_file($fileTmpName, $fileDestination);

						$image_status = 1;
						$upload_image = "UPDATE user SET profile_image_link='$fileDestination',profile_image_status='$image_status' WHERE username = '$username'";
						$result_image = mysqli_query($db,$upload_image);
						if(!mysqli_query($db,$upload_image))
						{
							header("Location: session_user_details.php?error=image_cannot_be_uploaded");
						}
						else{*/
							#header("Location: index.php?upload=success");
						#}
					}
					else{
						array_push($errors, "File_size_is_too_large_for_images");
						header("Location: index.php?error=File_size_is_too_large_for_image");
					}
				}
				else{
					array_push($errors, "There_was_an_error_while_uploading_file_image");
					header("Location: index.php?error=There_was_an_error_while_uploading_file_image");
				}
			}

			else{
				if($fileName!="")
				{
					array_push($errors, "You_cannot_upload_files_of_this_type_for_image");
					header("Location: index.php?error=You_cannot_upload_files_of_this_type_for_image");
				}
				else{

					array_push($errors, "upload=nothing");
					header("Location: index.php?upload=nothing");
				}
			}
		}
	}

	if(count($errors) == 0){
		header("Location: index.php?update=successful_in_student_general_info");
	}

?>