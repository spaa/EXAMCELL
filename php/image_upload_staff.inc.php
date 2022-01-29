<?php
//TODO security
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
	
	$dir = "../files/staff_files/".$uid;
	if (!file_exists($dir)) {
		mkdir($dir);
	}
	
	for ($i=1; $i <3 ; $i++) { 
	# code...

		$file = $_FILES['file'.$i];
		

		$fileName = $_FILES['file'.$i]['name'];
		$fileType = $_FILES['file'.$i]['type'];
		$fileTmpName = $_FILES['file'.$i]['tmp_name'];
		$fileError =$_FILES['file'.$i]['error'];
		$fileSize =$_FILES['file'.$i]['size'];

		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));

		#$allowed = array('pdf');
		$allowed2 = array('jpeg','jpg','png');

			if (in_array($fileActualExt, $allowed2)) {
				if ($fileError === 0) {
					if ($fileSize < 1000000) {
						switch ($i) {

							case '1':
									$fileNameNew = "photo.".$fileActualExt;
									$fileDestination = '../files/staff_files/'.$uid."/".$fileNameNew;				
									$upload_image = "UPDATE staff_information SET photo='$fileDestination' WHERE uid_staff = '$uid'";
									$result_image = mysqli_query($db,$upload_image);
									if(!mysqli_query($db,$upload_image))
									{
										array_push($errors, "photo_cannot_be_uploaded_in_database");
										header("Location: staf_registration_form.php?error=photo_cannot_be_uploaded_in_database");
									}	
									else{			
									move_uploaded_file($fileTmpName, $fileDestination);
									}
									break;

							case '2':
									$fileNameNew = "signature.".$fileActualExt;
									$fileDestination = '../files/staff_files/'.$uid."/".$fileNameNew;				
									$upload_image = "UPDATE staff_information SET signature='$fileDestination' WHERE uid_staff = '$uid'";
									$result_image = mysqli_query($db,$upload_image);
									if(!mysqli_query($db,$upload_image))
									{
										array_push($errors, "signature_cannot_be_uploaded_in_database");
										header("Location: staf_registration_form.php?error=signature_cannot_be_uploaded_in_database");
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
						header("Location: staf_registration_form.php?error=File_size_is_too_large_for_image");
					}
				}
				else{
					array_push($errors, "There_was_an_error_while_uploading_file_image");
					header("Location: staf_registration_form.php?error=There_was_an_error_while_uploading_file_image");
				}
			}

			else{
				if($fileName!="")
				{
					array_push($errors, "You_cannot_upload_files_of_this_type_for_image");
					header("Location: staf_registration_form.php?error=You_cannot_upload_files_of_this_type_for_image");
				}
				else{

					array_push($errors, "upload=nothing");
					header("Location: staf_registration_form.php?upload=nothing");
				}
			}
		}


	if(count($errors) == 0){
		header("Location: staf_registration_form.php?update=successful_in_student_general_info");
	}

?>