<?php include'dashboard_header.php';
if($_SESSION['user_type']!="HOD"){
	echo "<script>window.location.href='403-forbidden-error.php';</script>";
}
?>
<!--<div class="w3-display-container w3-panel w3-pale-blue w3-card-4 w3-center">
	<span onclick="this.parentElement.style.display='none'"
		class="w3-btn w3-pale-blue w3-large w3-display-topright">x</span>
	<p>Enter EVERYTHING IN CAPITAL LETTER</p>
</div>-->
<form class="w3-container w3-mobile w3-margin w3-padding-large" action="create_new_class.inc.php" method="post"
	enctype="multipart/form-data">

	<div class="w3-content w3-animate-opacity w3-card-4 container w3-white w3-border w3-border-red" style=" ">

		<div class="w3-center">

			<div class="w3-container w3-padding w3-xxlarge w3-black">
				CREATE NEW CLASS
			</div>

			<div class="w3-container w3-padding w3-row">
				<label class=" fa fa-date w3-right-align w3-xlarge w3-opacity"></label>
				<input type="text" id="year" class="w3-input " name="year" placeholder="YEAR *" required autocomplete>
			</div>

			<div class="w3-container w3-padding">
				<select id="semister" class="w3-select" name="semister" onclick="subject()" required <!--oninput="check_sem()"--> >
					<option value="">SEMISTER</option>
					<?php
							$month = date("n");

							if($_SESSION['branch']=='FE'){
								if($month>=1 && $month<=5){
								echo "
								<option value='2'>2</option>";
								}
								else{
									echo "
									<option value='1'>1</option>";
								}
							}
							else{
								
								if($month>=1 && $month<=5){
									echo '
									<option value="4">4</option>
									<option value="6">6</option>
									<option value="8">8</option>
									';
								}
								else{
									echo '
									<option value="3">3</option>
									<option value="5">5</option>
									<option value="7">7</option>
								';
								}
							}
						?>


				</select>
			</div>

			<div class="w3-container w3-padding ">
				<!--V1.0
					<select id="course" class="w3-select" name="course" required>
						<option value=""  >COURSE NAME</option>
						<option value="FE FE">FE COMMON</option>
						<option value="COMPUTER CP">COMPUTER ENGINEERING</option>
						<option value="IT IT">IT ENGINEERING</option>
						<option value="CIVIL CV">CIVIL ENGINEERING</option>
						<option value="EXTC EX">EXTC ENGINEERING</option>
						<option value="ELECTRICAL EL">ELECTRICAL ENGINEERING</option>
						<option value="CHEMICAL CM">CHEMICAL ENGINEERING</option>
						<option value="BIOMED BM">BIO-MED ENGINEERING</option>
						<option value="BIOTECH BT">BIO-TECH ENGINEERING</option>
						<option value="MECHANICAL MC">MECHANICAL ENGINEERING</option>
					</select>-->
				<!-- V1.1 -->
				<?php echo'<input type="text" class="w3-input " name="course" value="'.$_SESSION['branch'].'" readonly>';?>
			</div>

			<div class="w3-container w3-padding ">
				<select id="class_incharge" class="w3-select" name="class_incharge" onclick="show_list()" required>
					<option value="">CLASS INCHARGE</option>
					<!-- V1.0 
						<?php /*
							$query = "SELECT first_name,middle_name,last_name FROM staff_information";
							$result = mysqli_query($db, $query);
							if(!mysqli_query($db, $query))
							{
								array_push($errors, "query_not_processed");
								header("Location: ../php/create_new_class.php?error=query_not_processed");
							}
							else
							{
								while ($row = mysqli_fetch_assoc($result)) 
								{
									$name = $row["first_name"]." ".$row["middle_name"]." ".$row["last_name"];

									echo "<option value='".$name."'>".$name."</option>";
								}
							}*/
						?>
						-->

				</select>
			</div>

			<div class="w3-container w3-padding">
				<select id="no_of_subjects" class="w3-select" name="no_of_subjects" required onchange="subject()">
					<option value="0">NO. OF SUBJECTS</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
				</select>
			</div>

			<p id="1"></p>
			<p id="2"></p>
			<p id="3"></p>
			<p id="4"></p>
			<p id="5"></p>
			<p id="6"></p>

			<input type="submit" name="create_class"
				class="w3-btn w3-margin w3-padding-large w3-teal w3-round-xxlarge w3-center" value="CREATE CLASS">
			<input type="hidden" name="course_short_name" id="course_short_name">
		</div>


	</div>


</form>

<script type="text/javascript">
	//V1.0
	/*
	function check_sem() {
		if (document.getElementById("semister").value <= 2) {
			document.getElementById("course").disabled = true;
		} else {
			document.getElementById("course").disabled = false;
		}
	}*/

	//Capatilize each character
	function capatilized(id) {
		var ch = document.getElementById(id);
		//var ch = document.getElementByClassNames(id);
		ch.value = ch.value.toUpperCase();
	}


	//V1.1
	//to stop repeating list
	//this variables shows if the list is printed already or not
	//0 means list is not printed AND 1 means list is printed already
	var subject_incharge_list= [0,0,0,0,0,0];

	function subject() {
		var n = document.getElementById("no_of_subjects").value;
		//remove all the child nodes first
		if(document.getElementById(1).childElementCount!=0){
			//here we use previous value of n so that after reselecting no of subjects all earlier cerated data can be hidden
			for(var i=1;i<=prev_value;i++){
				//console.log(document.getElementById(i).children[0]);
				document.getElementById(i).children[0].style.display='none';
				document.getElementById(i).children[1].style.display='none';
				subject_incharge_list[i-1] = 0;				
		}
		}
		//stores previous value of n
		prev_value = n;

		//set subject code value TODO check mumbai university subject code for each branch
		var branch_code = "";
		//get HOD's branch
		var branch = document.getElementById("department_short_name").innerHTML;
		/*if(branch.includes("COMPUTER"))
			branch_code = "CSC";
		else if(branch.includes("IT"))
			branch_code = "ITC";
		else if(branch.includes("BIOMEDICAL"))
			branch_code = "BMC";
		else if(branch.includes("BIOTECHNOLOGY"))
			branch_code = "BTC";
		else if(branch.includes("CHEMICAL"))
			branch_code = "CHC";
		else if(branch.includes("CIVIL"))
			branch_code = "CIC";
		else if(branch.includes("EXTC"))
			branch_code = "EXC";
		else if(branch.includes("ELECTRICAL"))
			branch_code = "ELC";
		else if(branch.includes("MECHANICAL"))
			branch_code = "MEC";
		else
			branch_code = "FEC";*/
		branch_code = branch + "C";

		//set course short name so that it can be used while creating tables in database
		//V1.0
		//document.getElementById("course_short_name").value = branch_code.substring(0,2);
		//V1.1
		document.getElementById("course_short_name").value = branch;		
		//which sem is selected		
		var sem = document.getElementById("semister").value;

		for (var i = 1; i <= n; i++) {
			//according to subject number
			subject_code = branch_code+sem+"0"+i;
			document.getElementById(i).innerHTML = `
				<div class='w3-container w3-padding w3-row'>
					<span class='w3-left-align w3-quarter label'>SUBJECT ` + i + `</span>
					<input type='text' id='subject` + i + `' class='w3-input w3-third w3-margin-right' name='subject` + i +
				`' placeholder='SUBJECT ` + i + ` NAME *' required oninput="capatilized('subject` + i + `')">
					<input type='text' id='subject_code` + i + `' class='w3-input w3-quarter' name='subject_code` + i +
				`' placeholder='SUBJECT ` + i + ` CODE *' value='`+subject_code+`' readonly required>
				</div>
				<div class='w3-container w3-padding w3-row'>
					<span class='w3-left-align w3-quarter label'>&nbsp;</span>
					<input type='text' id='subject_short_name` + i +
				`' class='w3-input w3-third w3-margin-right' name='subject_short_name` + i + `' placeholder='SUBJECT ` +
				i + ` SHORT NAME *' required oninput="capatilized('subject_short_name` + i + `')">
					<!--V1.0
					<input type='text' id='subject_incharge` + i + `' class='w3-input w3-quarter' name='subject_incharge` + i +
				`' placeholder='SUBJECT ` + i + ` INCHARGE *' required oninput="capatilized('subject_incharge` + i + `')">
					-->
					<!--V1.1-->
					<select id='subject_incharge_` + i + `' class='w3-select w3-quarter' name='subject_incharge` + i + `' onclick='show_list()' required>
					<option value=''  >SUBJECT INCHARGE</option>
				</div>`;
		}
	}

	//V1.1
	//to stop repeating list
	//this variables shows if the list is printed already or not
	//0 means list is not printed AND 1 means list is printed already
	var class_incharge_list = 0;
	//ajax call to show staff list
	function show_list() {
		var xhttp;
		
		if (window.XMLHttpRequest) {
			xhttp = new XMLHttpRequest();
		} else {
			xhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				var class_incharge = document.getElementById("class_incharge");
				var json_data = JSON.parse(this.responseText);
				if(class_incharge_list==0){
					class_incharge_list = 1;
				for (var i = 0; i < json_data.length; i++) {
					var ele = document.createElement("OPTION");
					var att = document.createAttribute("value");
					att.value = json_data[i];
					ele.innerHTML = json_data[i];
					class_incharge.appendChild(ele);
					console.log(json_data[i]);
				}
				}
				var no_of_subjects = document.getElementById('no_of_subjects').value;
				for (var j = 1; j <= no_of_subjects; j++) {
					var subject_incharge = document.getElementById("subject_incharge_" + j);
					if(subject_incharge_list[j-1]==0){
						subject_incharge_list[j-1]++;
					for (var i = 0; i < json_data.length; i++) {
						var ele = document.createElement("OPTION");
						var att = document.createAttribute("value");
						att.value = json_data[i];
						ele.innerHTML = json_data[i];
						subject_incharge.appendChild(ele);
						//console.log(subject_incharge);
					}
					}
				}
			}
		};
		xhttp.open("POST", "../php/staff_name_list.php", true);
		xhttp.send();
	}
	show_list();
</script>
</body>

</html>