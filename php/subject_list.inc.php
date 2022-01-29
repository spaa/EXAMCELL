<?php
include "server.php";
session_start();

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

$query = "SELECT * FROM subject_list";

if($result = mysqli_query($db,$query)){
	$i=0;
	while($row = mysqli_fetch_assoc($result)){
		$subject_name = $row['subject_name'];
		$subject_short_name = $row['subject_short_name'];
		$subject_branch = $row['branch'];
		$subject_credit_t = $row['credit_point_t'];
		$subject_credit_o = $row['credit_point_o'];

		echo "
			<tr class='w3-teal'>
				
		            <th><input class='w3-input' name='subject_name".$i."' value='".$subject_name."' readonly></th>
					<th><input class='w3-input' name='subject_short_name".$i."' value='".$subject_short_name."' readonly></th>
					<th><input class='w3-input' name='subject_branch".$i."' value='".$subject_branch."' readonly></th>
					<th><input class='w3-input' name='subject_credit_t".$i."' value='".$subject_credit_t."'></th>
					<th><input class='w3-input' name='subject_credit_o".$i."' value='".$subject_credit_o."'></th>
					<th><input type='submit' class='w3-btn w3-teal w3-round-xxlarge w3-padding' 
					name='modify_subject".$i."' value='MODIFY' ></th>
					<th><input type='reset'  class='w3-btn w3-teal w3-round-xxlarge w3-padding' 
					name='delete_subject".$i."' value='DELETE' ></th>
				
		    </tr>
		    
		";
		$i++;
	}
}