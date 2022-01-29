<?php include'dashboard_header.php';
if($_SESSION['user_type']!="HOD"){
	echo "<script>window.location.href = '../php/403-forbidden-error.php';</script>";		
}
?>


		<div class="w3-card-4 w3-margin w3-center w3-white">

			<div class="w3-container w3-black w3-padding-large w3-xxlarge" style="text-shadow:1px 1px 0 orange"> ADD STUDENTS TO CLASS
			</div>
			<div class="w3-responsive">
		    	<table class="w3-table-all w3-card-4">
		        	<thead>
		            <tr class="w3-teal _9_documents">
		            	<!--<th>SR.NO</th>-->
		            	<th>BATCH NO.</th>
		              	<th>BATCH YEAR</th>
		              	<th>BATCH BRANCH</th>
		              	<th>BATCH SEMESTER</th>
		              	<th>CLASS INCHARGE</th>
		              	<th>ADD STUDENTS TO CLASS</th>
		            </tr>
		        	</thead>
		          

		          	<?php 
							$branch = $_SESSION['branch'];
							$query = "SELECT * FROM class_batch WHERE class_filled = '0' AND batch_branch='$branch'";
							$result = mysqli_query($db, $query);
							if(!mysqli_query($db, $query))
							{
								array_push($errors, "query_not_processed");
								header("Location: ../php/add_students.php?error=query_not_processed");
							}
							else
							{
								$i=1;
								if (mysqli_num_rows($result)==0) {
									echo "<script>window.location.href = '../php/403-forbidden-error.php';</script>";											
								}
								while ($row = mysqli_fetch_assoc($result)) 
								{
									$batch_no = $row["batch_no"];
									$batch_year = $row["batch_year"];
									$batch_branch = $row["batch_branch"];
									$batch_sem = $row["batch_sem"];
									$class_incharge = $row["class_incharge"];

									echo "<form class='w3-mobile w3-margin' action='add_students.inc.php' method='POST' enctype='multipart/form-data'>";
									echo "<tr>";
									echo "<td name='".$batch_no."'>".$batch_no."</td>";
									echo "<td name='".$batch_year."'>".$batch_year."</td>";
									echo "<td name='".$batch_branch."'>".$batch_branch."</td>";
									echo "<td name='".$batch_sem."'>".$batch_sem."</td>";
									echo "<td name='".$class_incharge."'>".$class_incharge."</td>";
									echo "<td name='".$batch_no.$i."'> <input class='w3-btn w3-teal w3-round-xxlarge w3-padding' type='submit' name='".$i."' value='".$batch_no."' > </td></tr>";
									echo "</form>";
									$i++;
								}
								$_SESSION['total_class'] = $i-1;
							}
					?>
				</table>
			</div>
		</div>
</form>


