<?php include'dashboard_header.php' ?>
<?php
if($_SESSION['user_type']!="ADMIN"){
	echo "<script>window.location.href='403-forbidden-error.php';</script>";
}
?>
<br>
<input type="button" id="add_button" name="add_subject" class="w3-btn w3-margin w3-padding-large w3-teal w3-round-xxlarge w3-center" value="ADD SUBJECT" onclick="add_cancle_sub()">
<div id="add_subject_details" class="w3-hide w3-card-4 w3-margin w3-center w3-white w3-responsive">
	<form method="post" action="add_or_modify_subjects.inc.php" enctype="multipart/form-data">
		<table class="w3-table-all w3-card-4">
		    <thead>
		        <tr class="w3-white">
		            <th> <input type="text" id="subject_name" placeholder="SUBJECT NAME" class="w3-input " name="subject_name" oninput ="capatilized('subject_name')"> </th>
					<th> <input type="text" id="subject_short_name" placeholder="SUBJECT SHORTFORM" class="w3-input " name="subject_short_name" oninput ="capatilized('subject_short_name')"> </th>
					<th>
						<select id="subject_branch" class="w3-select" name="branch" required>
							<option value=""  >COURSE NAME</option>
							<option value="FE">FE</option>
							<option value="COMPUTER">COMPUTER ENGINEERING</option>
							<option value="IT">IT ENGINEERING</option>
							<option value="CIVIL">CIVIL ENGINEERING</option>
							<option value="EXTC">EXTC ENGINEERING</option>
							<option value="ELECTRICAL">ELECTRICAL ENGINEERING</option>
							<option value="CHEMICAL">CHEMICAL ENGINEERING</option>
							<option value="BIOMED">BIO-MED ENGINEERING</option>
							<option value="BIOTECH">BIO-TECH ENGINEERING</option>
							<option value="MECHANICAL">MECHANICAL ENGINEERING</option>
						</select> 
					</th>
					<th> <input type="text" placeholder="CREDIT POINT T" class="w3-input " name="subject_credit_t"> </th>
					<th> <input type="text" placeholder="CREDIT POINT O" class="w3-input " name="subject_credit_o"> </th>
					<th> <input type="submit" class="w3-btn w3-margin w3-padding-large w3-teal w3-round-xxlarge w3-center" name="add_subject_detail" value="ADD"> </th>
					<th> <input type="button" class="w3-btn w3-margin w3-padding-large w3-teal w3-round-xxlarge w3-center" id="cancle" onclick="add_cancle_sub()" value="Cancle"> </th>
		        </tr>
		    </thead>
		</table>
	</form>
</div>
<div class="w3-card-4 w3-margin w3-center w3-white">
	<div class="w3-container w3-black w3-padding-large w3-xxlarge" style="text-shadow:1px 1px 0 orange"> SUBJECT LIST
	</div>
	<div class="w3-responsive">
		<form action='../php/add_or_modify_subjects.inc.php' method='POST' enctype='multipart/form-data'>
		<table class="w3-table-all" id="data">

		    <thead>
		        <tr class="w3-teal">
		            <th>SUBJECT NAME</th>
					<th>SUBJECT SHORT NAME</th>
					<th>BRANCH</th>
					<th>CREDIT POINT T</th>
					<th>CREDIT POINT O</th>
					<th>UPDATE</th>
					<th>DELETE</th>
		        </tr>
		    </thead>
		</table>
		</form>
	</div>
</div>
<script type="text/javascript">

	//Capatilize each character
	function capatilized(id) {
		var ch = document.getElementById(id);
		//var ch = document.getElementByClassNames(id);
		ch.value = ch.value.toUpperCase();
	}


	function add_cancle_sub() {
		
		var x = document.getElementById("add_subject_details");
		if(x.className.indexOf("w3-show")== -1){
			document.getElementById("add_button").disabled = true;
			x.className = x.className.replace("w3-hide" , " ");
			x.className += "w3-show";
		}
		else{
			document.getElementById("add_button").disabled = false;
			x.className = x.className.replace("w3-show" , " ");
			x.className += "w3-hide";
		}
	}

	function show_subject_list(){
		var xhttp;

		if(window.XMLHttpRequest){
			xhttp = new XMLHttpRequest();
		}
		else{
			xhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				data = this.responseText;

				document.getElementById("data").innerHTML += data;
			}
		};

		xhttp.open("POST","./subject_list.inc.php",true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("fname=Henry&lname=Ford");

        //setTimeout(show_subject_list,50000);
	}
	show_subject_list();
</script>