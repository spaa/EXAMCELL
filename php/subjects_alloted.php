<?php include'dashboard_header.php';

if($_SESSION['user_type']!="STAFF"){
	echo "<script>window.location.href='403-forbidden-error.php';</script>";
}

$errors = array();
unset($_SESSION['batch_no']);
unset($_SESSION['subject_batch_no']);
unset($_SESSION['subject_name']);
unset($_SESSION['subject_short_name']);
unset($_SESSION['subject_code']);
?>
<div class="w3-card-4 w3-margin w3-center w3-white">

			<div class="w3-container w3-black w3-padding-large w3-xxlarge" style="text-shadow:1px 1px 0 orange"> SUBJECTS ALLOTED
			</div>
			<div class="w3-responsive">
		    	<table class="w3-table-all w3-card-4">
		        	<thead>
		            <tr class="w3-teal _9_documents">
		            	<!--<th>SR.NO</th>-->
		              	<th>SUBJECT NAME</th>
						<th>SUBJECT CODE</th>
						<th>BRANCH</th>
						<th>CURRENT YEAR</th>
						<th>SEMISTER</th>
		              	<th>SELECT CLASS</th>
		            </tr>
		        	</thead>
		        	<?php 
                			$year = date("Y");							
							$month = date("n");
							if($month>=1 && $month<=5){
								$sem_seen = array(2,4,6,8);
							}
							else{
								$sem_seen = array(1,3,5,7);
							}
							//V1.0
							//$query = "SELECT * FROM subject_incharge WHERE subject_incharge_uid = '$uid'";
							//V1.1
                			//TODO this query is the final query it will NOT WORK for TESTING
							//$query = "SELECT s.subject_batch_no,s.subject_name,s.subject_code,c.batch_branch,c.batch_current_year,c.batch_sem FROM subject_incharge s INNER JOIN class_batch c ON c.batch_no = s.batch_no AND subject_incharge_uid = '$uid' AND c.batch_year=$year AND (c.batch_sem=$sem_seen[0] OR c.batch_sem=$sem_seen[1] OR c.batch_sem=$sem_seen[2] OR c.batch_sem=$sem_seen[3])";
                			//TODO This is used for TESTING PURPOSE:- REMOVE THIS QUERY AFTER TESTING
							$query = "SELECT s.subject_batch_no,s.subject_name,s.subject_code,c.batch_branch,c.batch_current_year,c.batch_sem FROM subject_incharge s INNER JOIN class_batch c ON subject_incharge_uid = '$uid' AND c.batch_no = s.batch_no AND (c.batch_sem=$sem_seen[0] OR c.batch_sem=$sem_seen[1] OR c.batch_sem=$sem_seen[2] OR c.batch_sem=$sem_seen[3]) ORDER BY c.batch_sem";
							$result = mysqli_query($db, $query);
							if(!mysqli_query($db, $query))
							{
								array_push($errors, "query_not_processed");
								header("Location: ../php/subjects_alloted.php?error=query_not_processed");
							}
							else
							{
								$i=1;
								if(mysqli_num_rows($result)==0){
									echo "<script>window.location.href = '403-forbidden-error.php'</script>";
								}
								else{
								while ($row = mysqli_fetch_assoc($result)) 
								{
									//V1.0
									/*$batch_no = $row["batch_no"];
									$batch_year = $row["batch_year"];*/

									//V1.1
									$subject_batch_no = $row["subject_batch_no"];
									$subject_name = $row["subject_name"];
									$subject_code = $row["subject_code"];
									$subject_branch = $row["batch_branch"];
									$subject_current_year = $row["batch_current_year"];
									$subject_sem = $row["batch_sem"];

									echo "<form class='w3-mobile w3-margin' action='../php/ut_term_pracs_th.php' method='POST' enctype='multipart/form-data'>";
									echo "<tr>";
									echo "<td name='".$subject_name."'>".$subject_name."</td>";
									echo "<td name='".$subject_code."'>".$subject_code."</td>";
									echo "<td name='".$subject_branch."'>".$subject_branch."</td>";
									echo "<td name='".$subject_current_year."'>".$subject_current_year."</td>";
									echo "<td name='".$subject_sem."'>".$subject_sem."</td>";
									/*Earlier each subject had unique name
									echo "<td name='".$subject_batch_no.$i."'> <input class='w3-btn w3-teal w3-round-xxlarge w3-padding' type='submit' name='".$i."' value='".$subject_batch_no."' > </td></tr>";
									*/
									//Now each subject has same name
									//the improvement is because for each subject seperate form is created according to logic
									//so each form will have separate input which will be different from each others
									echo "<td name='".$subject_batch_no.$i."'>
											<input type='hidden' class='w3-hide' name='subject_batch_no' value='".$subject_batch_no."'>
											<input class='w3-btn w3-teal w3-round-xxlarge w3-padding' type='submit' name='enter_marks' value='ENTER MARKS' > </td></tr>";

									echo "</form>";
									$i++;
								}
								}
								$_SESSION['total_no_of_subjects_alloted'] = $i-1;
							}
					?>
				</table>
			</div>
		</div>
<!--</form>-->


