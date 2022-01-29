<?php include'dashboard_header.php';
if($_SESSION['user_type']!="STUDENT"){
  echo "<script>window.location.href='403-forbidden-error.php</script>";
}
?>
<?php include'regular_exam_form.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Exam Form</title>
	<!--<link rel="stylesheet" type="text/css" href="../css/w3.css">-->
	<!--Colors-->
		<link rel="stylesheet" type="text/css" href="../css/w3-colors-2019.css">
  <link rel="stylesheet" href="../css/w3.css">
	
	<!--Exam Form Styling sheet -->
	<link rel="stylesheet" type="text/css" href="../css/examform.css">

	<!--Custom File Choose Button Styling -->
	<link rel="stylesheet" type="text/css" href="../css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="../css/demo.css" />
	<link rel="stylesheet" type="text/css" href="../css/component.css" />
	<!--JQuery link -->
  <script src="../js/jquery.min.js"></script>
</head>
<body>

	<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>

<?php if(isset($_POST['kt_exam_form'])):?>
<!-- Create action form -->
  <form class="w3-mobile w3-margin" action="../php/exam_form.inc.php" autocomplete novalidate>
  <div class="w3-card-4 w3-margin w3-white">

    <!--Exam Form-->
    <div class="w3-container w3-black w3-center w3-xxlarge">
      EXAM FORM</div>
    <div id="container" class="w3-container w3-row-padding w3-padding w3-animate-right">
      <div class="w3-container w3-row-padding">
        <div class="w3-half w3-row">
          <span class="w3-quarter w3-large label">BRANCH:</span>
            <input type="text" class="w3-threequarter w3-input" name="branch" disabled <?php echo"value='$course_fullform'";?>>
        </div>
        <div class="w3-half w3-row">
          <span class="w3-quarter w3-large label">SEMESTER:</span>
            <input type="text" class="w3-threequarter w3-input" name="semester" disabled <?php echo"value='$_POST[kt_form]'";?>>
        </div>
      </div>
      <div class="w3-container w3-center w3-padding-large" onclick="hide_show('','Container1')">
        <input type="radio" class="w3-radio" name="form_type" value="Regular" disabled><label>REGULAR</label>
        <input type="radio" class="w3-radio" name="form_type" value="ATKT" disabled checked><label>ATKT</label>
      </div>
    </div>

    <!--Name Field:--->
    <div onclick="myFunction('Container1')" class="w3-button w3-block w3-black w3-left-align">
      <span class="w3-badge w3-white">1</span> NAME</div>
    <!--Name Field inputs:--->
    <div id="Container1" class="w3-hide w3-container w3-row-padding w3-padding w3-animate-zoom">

      <!--Name details:--->
      <div class="w3-container w3-row-padding w3-half w3-padding">
        <div class="w3-container w3-padding w3-row">
          <span class="w3-half w3-large label">SURNAME:</span>
            <input type="text" class="w3-half w3-input" name="surname" disabled <?php echo"value='$lastname'";?>>
        </div>
        <div class="w3-container w3-padding w3-row">
          <span class="w3-half w3-large label">FIRST NAME:</span>
            <input type="text" class="w3-half w3-input" name="firstname"  disabled <?php echo"value='$firstname'";?>>
        </div>
        <div class="w3-container w3-padding w3-row">
          <span class="w3-half w3-large label">FATHERS FIRST NAME:</span>
            <input type="text" class="w3-half w3-input" name="fathername"  disabled <?php echo"value='$middlename'";?>>
        </div>
        <div class="w3-container w3-padding w3-row">
          <span class="w3-half w3-large label">MOTHERS FIRST NAME:</span>
            <input type="text" class="w3-half w3-input" name="mothername"  disabled <?php echo"value='$mothername'";?>>
        </div>
      </div>

      
      <div class="w3-container w3-row w3-half w3-padding">
        <!--photo details:--->
        <div class="w3-half">
          <div id="wrapper">
            <input type='file' id="photo" name="photo" accept="image/*" capture style="display:none"/>
            <div style="width: 200px;height:250px">
                  <img id="photo_img" disabled <?php echo"src='$photo'";?> style="width: 200px;height: 250px;" alt="Photo" />
                </div>
          </div>
        </div>

        <!--signature details:--->
        <div class="w3-half">
          <div id="wrapper">       
            <input type='file' id="signature" name="signature" accept="image/*" capture style="display:none"/>
            <div style="width: 200px;height:150px">
                  <img id="signature_img" disabled <?php echo"src='$signature'";?> style="width: 200px;height: 150px;" alt="Signature" />
                </div>
                <p id="signature_change" class="w3-button w3-teal w3-round">Change Signature</p>
                <p id="photo_change" class="w3-button w3-teal w3-round">Change Photo</p>
          </div>
        </div>
      </div>
		<!--Proceed to next Container -->
      <div class="proceed w3-ceter w3-teal w3-button w3-margin" onclick="hide_show('Container1','Container2')">Proceed
      </div>
    </div>

    <!--Name Field in Marathi:--->
    <div onclick="hide_show('Container1','Container2')" class="w3-button w3-block w3-black w3-left-align"><span class="w3-badge w3-white">2</span> Name in <i>Devanagari</i> Script -(in Marathi)</div>
    <div id="Container2" class="w3-hide w3-container w3-row w3-padding w3-animate-zoom">
        
        <div class="w3-container w3-padding w3-quarter">
            <input type="text" id="surname_marathi" class="w3-input" name="surname_marathi" placeholder="SURNAME" oninput="capatilize('surname_marathi')" required autocomplete>
        </div>
        <div class="w3-container w3-padding w3-quarter">
            <input type="text" id="firstname_marathi" class="w3-input" name="firstname_marathi" placeholder="FIRST NAME" oninput="capatilize('firstname_marathi')" required autocomplete>
        </div>
        <div class="w3-container w3-padding w3-quarter">
            <input type="text" id="fathername_marathi" class="w3-input" name="fathername_marathi" placeholder="FATHERS NAME" oninput="capatilize('fathername_marathi')" required autocomplete>
        </div>
        <div class="w3-container w3-padding w3-quarter">
            <input type="text" id="mothername_marathi" class="w3-input" name="mothername_marathi" placeholder="MOTHERS NAME" oninput="capatilize('mothername_marathi')" required autocomplete>

        <!-- Proceed to next container-->
        </div>
		<div class="proceed w3-ceter w3-teal w3-button w3-margin" onclick="hide_show('Container2','Container3')">Proceed
      	</div>
    </div>


    <!--Address Field:--->
    <div onclick="myFunction('Container3')" class="w3-button w3-block w3-black w3-left-align"><span class="w3-badge w3-white">3</span> Compelete Postal Address</div>
    <div id="Container3" class="w3-hide w3-container w3-row w3-padding w3-animate-zoom">
        
        <div class="w3-container w3-padding">
		 <span class="w3-half w3-large label">ADDRESS:</span>
            <textarea id="address" class="w3-container w3-input" rows="3" cols="40" style="resize: none;" placeholder="ADDRESS" oninput="capatilize('address')" disabled ><?php echo "$address";?></textarea>
        </div>
        <div class="w3-container w3-padding w3-half">
		 <span class="w3-half w3-large label">pincode:</span>
            <input class="w3-input" id="pincode" name="pincode" maxlength='6' pattern="[0-9]{6}"  disabled <?php echo "value='$pincode'";?> >
        </div>
        <div class="w3-container w3-padding w3-half">
		 <span class="w3-half w3-large label">PARENT NUMBER:</span>
            <input type="text" maxlength="10" class="w3-input" name="tel_no" pattern="[0-9]{10}" placeholder="PARENT NUMBER"  disabled <?php echo "value='$father_mobile'";?> >
        </div>
        <div class="w3-container w3-padding w3-half">
		 <span class="w3-half w3-large label">MOBILE NUMBER</span>
            <input type="text" maxlength="10" class="w3-input" name="monile_no" pattern="[0-9]{10}" placeholder="MOBILE NUMBER" disabled <?php echo "value='$mobile'";?>>
        </div>
        <div class="w3-container w3-padding w3-half">
		 <span class="w3-half w3-large label">EMAIL ID:</span>
            <input type="email" class="w3-input" name="monile_no" placeholder="EMAIL ID" disabled <?php echo "value='$email'";?>>
        </div>

		<!--Proceed to next container-->
        <div class="proceed w3-ceter w3-teal w3-button w3-margin" onclick="hide_show('Container3','Container4')">Proceed
      	</div>
    </div>

    <!--Sex -->
    <div onclick="myFunction('Container4')" class="w3-button w3-block w3-black w3-left-align"><span class="w3-badge w3-white">4</span> SEX(GENDER)</div>
    <div id="Container4" class="w3-hide w3-center w3-container w3-padding-24 w3-animate-zoom">
      <div class="w3-row-padding w3-third">
        <input type="radio" class="w3-check" name="Gender" value="Male" <?php if($gender=="MALE") { echo "checked disabled ";}?>/><label>MALE</label>
      </div>
      <div class="w3-row-padding w3-third">
        <input type="radio" class="w3-check" name="Gender" value="Female" disabled <?php if($gender=="FEMALE") { echo "checked ";}?>/><label>FEMALE</label>
      </div>
      <div class="w3-row-padding w3-third">
          <input type="radio" class="w3-check" name="Gender" value="Others" disabled <?php if($gender=="OTHERS") { echo "checked ";}?>/><label>OTHERS</label>
      </div>

	<!--Proceed to next container-->
      <div class="w3-ceter w3-teal w3-button w3-margin" onclick="hide_show('Container4','Container5')">Proceed
      </div>
    </div>


    <!--Student Type -->
    <div onclick="myFunction('Container5')" class="w3-button w3-block w3-black w3-left-align"><span class="w3-badge w3-white">5</span> STUDENT TYPE</div>
    <div id="Container5" class="w3-hide w3-center w3-container w3-padding-24 w3-animate-zoom">
      <div class="w3-row-padding w3-quarter">
        <input type="radio" class="w3-check" name="Student_type" value="CBSGS"/><label>CBSGS</label>
      </div>
      <div class="w3-row-padding w3-quarter">
        <input type="radio" class="w3-check" name="Student_type" value="Regular"/><label>Regular</label>
      </div>
      <div class="w3-row-padding w3-quarter">
          <input type="radio" class="w3-check" name="Student_type" value="ATKT"/><label>ATKT</label>
      </div>
      <div class="w3-row-padding w3-quarter">
          <input type="radio" class="w3-check" name="Student_type" value="PROVISION"/><label>PROVISION</label>
      </div>

	<!-- Proceed to next container-->
      <div class="w3-ceter w3-teal w3-button w3-margin" onclick="hide_show('Container5','Container6')">Proceed
      </div>
    </div>


    <!--Category -->
    <div onclick="myFunction('Container6')" class="w3-button w3-block w3-black w3-left-align"> <span class="w3-badge w3-white">6</span> CATEGORY</div>
    <div id="Container6" class="w3-hide w3-center w3-container w3-padding-24 w3-animate-zoom">
      
      <!--Check box

      <div class="w3-row-padding w3-third">
        <input type="radio" class="w3-check" name="Category" value="OPEN"/><label>OPEN</label>
      </div>
      <div class="w3-row-padding w3-third">
        <input type="radio" class="w3-check" name="Category" value="SC"/><label>SC</label>
      </div>
      <div class="w3-row-padding w3-third">
          <input type="radio" class="w3-check" name="Category" value="ST"/><label>ST</label>
      </div>
      <div class="w3-row-padding w3-third">
          <input type="radio" class="w3-check" name="Category" value="DT"/><label>DT</label>
      </div>
      <div class="w3-row-padding w3-third">
          <input type="radio" class="w3-check" name="Category" value="OBC"/><label>OBC</label>
      </div>
      -->

      <select class="w3-select w3-padding-large" name="Category">
        <option value="" disabled >CATEGORY</option>
        <option value="OPEN" disabled <?php if($category=="OPEN"){echo "selected";} ?>  >OPEN</option>
        <option value="SC"disabled <?php if($category=="SC"){echo "selected";} ?> >SC</option>
        <option value="ST"disabled <?php if($category=="ST"){echo "selected";} ?> >ST</option>
        <option value="DT" disabled <?php if($category=="DT"){echo "selected";} ?> >DT</option>
        <option value="OBC"disabled <?php if($category=="OBC"){echo "selected";} ?> >OBC</option>
		
      </select> 
    
    <!--Proceed to next container-->
    	<div class="w3-ceter w3-teal w3-button w3-margin" onclick="hide_show('Container6','Container7')">Proceed
      	</div>
    </div>

    <!--Medical Status -->
    <div onclick="myFunction('Container7')" class="w3-button w3-block w3-black w3-left-align"><span class="w3-badge w3-white">7</span> MEDICAL STATUS</div>
    <div id="Container7" class="w3-hide w3-center w3-container w3-padding-24 w3-animate-zoom">

      <!--Check box
      <div class="w3-row-padding w3-quarter">
        <input type="radio" class="w3-check" name="Medical_status" value="Nothing"/><label>NOTHING</label>
      </div>
      <div class="w3-row-padding w3-quarter">
        <input type="radio" class="w3-check" name="Medical_status" value="Phy. H. C."/><label>Phy. H. C.</label>
      </div>
      <div class="w3-row-padding w3-quarter">
        <input type="radio" class="w3-check" name="Medical_status" value="Blind"/><label>BLIND</label>
      </div>
      <div class="w3-row-padding w3-quarter">
          <input type="radio" class="w3-check" name="Medical_status" value="Others"/><label>OTHERS</label>
      </div>
    -->

    <select class="w3-select w3-padding-large" name="Medical_status">
      <option value="" disabled selected>MEDICAL STATUS</option>
      <option value="Nothing"disabled <?php if($medical_status=="NOTHING"){echo "selected";} ?> >NOTHING</option>
      <option value="Phy. H. C." disabled <?php if($medical_status=="PHYSICALLY HANDICAPPED"){echo "selected";} ?> >PHYSICALLY HANDICAPPED</option>
      <option value="Blind" disabled <?php if($medical_status=="BLIND"){echo "selected";} ?>>BLIND</option>
      <option value="Others" disabled <?php if($medical_status=="PHYSICALLY HANDICAPPED"){echo "selected";} ?> >OTHERS</option>
    </select>

	<!--Proceed to next Container -->
      <div class="w3-ceter w3-teal w3-button w3-margin" onclick="hide_show('Container7','Container8')">Proceed
      </div>

    </div>

    <!--Subject Obtained -->
    <div onclick="myFunction('Container8')" class="w3-button w3-block w3-black w3-left-align"><span class="w3-badge w3-white">8</span> SUBJECT OBTAINED</div>
    <div id="Container8" class="w3-hide w3-center w3-container w3-padding-24 w3-animate-zoom">
      <div class="w3-display-container w3-panel w3-pale-blue w3-card-4 w3-center">
        <span onclick="this.parentElement.style.display='none'" class="w3-btn w3-pale-blue w3-large w3-display-topright">x</span>
        <p>Enter Marks only if claiming exemption</p>
      </div> 
      <table class="w3-table-all w3-card-4">
          <thead>
            <tr class="w3-teal">
              <th>Sr. No.</th>
              <th>Name of Subject</th>
              <th>Average of Two Tests</th>
              <th>Theory</th>
              <th>Term Work</th>
              <th>Practical</th>
              <th>Oral</th>
              <th>Save/Edit</th>
            </tr>
          </thead>
          <tr>
          <td>1</td>
            <td>SYSTEM PROGRAMMING AND COMPILER CONSTRUCTION</td>
            <td><input type="text" name="ut_avg" id="ut_avg1" class="w3-input" pattern="[0-9]{2}"></td>
            <td><input type="text" name="theory" id="theory1" class="w3-input" pattern="[0-9]{2}"></td>
            <td><input type="text" name="tw" id="tw1" class="w3-input" pattern="[0-9]{2}"></td>
            <td><input type="text" name="practical" id="practical1" class="w3-input" pattern="[0-9]{2}"></td>
            <td><input type="text" name="oral" id="oral1" class="w3-input" pattern="[0-9]{2}"></td>
            <td><div class="w3-btn w3-teal w3-card w3-round-xxlarge">Save</div></td>
          </tr>
          <tr>
            <td>2</td>
            <td>SOFTWARE ENGINEERING</td>
            <td><input type="text" name="ut_avg" id="ut_avg2" class="w3-input" pattern="[0-9]{2}"></td>
            <td><input type="text" name="theory" id="theory2" class="w3-input" pattern="[0-9]{2}"></td>
            <td><input type="text" name="tw" id="tw2" class="w3-input" pattern="[0-9]{2}"></td>
            <td><input type="text" name="practical" id="practical2" class="w3-input" pattern="[0-9]{2}"></td>
            <td><input type="text" name="oral" id="oral2" class="w3-input" pattern="[0-9]{2}"></td>
            <td><div class="w3-btn w3-teal w3-card w3-round-xxlarge">Save</div></td>
          </tr>
          <tr>
            <td>3</td>
            <td>DISTRIBUTED DATABASE</td>
            <td><input type="text" name="ut_avg" id="ut_avg3" class="w3-input" pattern="[0-9]{2}"></td>
            <td><input type="text" name="theory" id="theory3" class="w3-input" pattern="[0-9]{2}"></td>
            <td><input type="text" name="tw" id="tw3" class="w3-input" pattern="[0-9]{2}"></td>
            <td><input type="text" name="practical" id="practical3" class="w3-input" pattern="[0-9]{2}"></td>
            <td><input type="text" name="oral" id="oral3" class="w3-input" pattern="[0-9]{2}"></td>
            <td><div class="w3-btn w3-teal w3-card w3-round-xxlarge">Save</div></td>
          </tr>
          <tr>
            <td>4</td>
            <td>MOBILE COMMUNICATION AND COMPUTING</td>
            <td><input type="text" name="ut_avg" id="ut_avg4" class="w3-input" pattern="[0-9]{2}"></td>
            <td><input type="text" name="theory" id="theory4" class="w3-input" pattern="[0-9]{2}"></td>
            <td><input type="text" name="tw" id="tw4" class="w3-input" pattern="[0-9]{2}"></td>
            <td><input type="text" name="practical" id="practical4" class="w3-input" pattern="[0-9]{2}"></td>
            <td><input type="text" name="oral" id="oral4" class="w3-input" pattern="[0-9]{2}"></td>
            <td><div class="w3-btn w3-teal w3-card w3-round-xxlarge">Save</div></td>
          </tr>
      </table>

<!--Proceed to next Container -->
      <div class=" w3-ceter w3-teal w3-button w3-margin" onclick="hide_show('Container8','Container9')">Proceed
      </div>

    </div>


    <!--Previous Semister Details -->
    <div onclick="myFunction('Container9')" class="w3-button w3-block w3-black w3-left-align"><span class="w3-badge w3-white">9</span> DETAILS OF PREVIOUS EXAMINATION</div>
    <div id="Container9" class="w3-hide w3-center w3-container w3-padding-24 w3-animate-zoom">
      <div class="w3-display-container w3-panel w3-pale-blue w3-card-4 w3-center">
        <p>Attach Photocopies of all Examinations Appeared</p>
      </div> 
      <div class="w3-responsive">
        <table class="w3-table-all w3-card-4 _9_documents">
            <thead>
              <tr class="w3-teal">
                  <th rowspan="2">Sr. No.</th>
                  <th rowspan="2">EXAMINATION</th>
                  <th rowspan="2">Month & Year</th>
                  <th rowspan="2">Seat No.</th>
                  <th rowspan="2">Total Marks / GPA</th>
                  <th rowspan="2">Result</th>
                  <th colspan="4">No. of Heads in which failed</th>
                  <th rowspan="2">Remarks</th>
                  <th rowspan="2">Encl. Total No.</th>
                  <th rowspan="2">Upload Document</th>
                  <th rowspan="2">Save/Edit</th>
              </tr>
              <tr class="w3-teal">
                <th>ESE</th>
                <th>IA</th>
                <th>TW</th>
                <th>OR/PR</th>
              </tr>
          </thead>
            <tr>
            <td>1</td>
              <td>DIPLOMA</td>
              <td><input type="month" name="month&year" id="month&year1" class="w3-input"></td>
              <td><input type="text" name="seatno" id="seatno1" class="w3-input" pattern="[0-9]{2} "></td>
              <td><input type="text" name="gpa" id="gpa1" class="w3-input" pattern="[0-9]"></td>
              <td><input type="text" name="result" id="result1" class="w3-input"></td>
              <td><input type="text" name="ese" id="ese1" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="ia" id="ia1" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="tw" id="tw1" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="op_pr" id="or_pr1" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="remark" id="remark1" class="w3-input"></td>
              <td><input type="text" name="encl" id="encl1" class="w3-input"></td>  
              <td>
              
                <input type="file" name="file-1[]" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" style="display: none;" />
                <label class="w3-teal w3-round-xxlarge" for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="14" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span></label>
              
              </td> 

              <td><div class="w3-btn w3-teal w3-card w3-round-xxlarge">Save</div></td>
            </tr>
            <tr>
              <td>2</td>
              <td>SEMESTER I</td>
              <td><input type="month" name="month&year" id="month&year2" class="w3-input"></td>
              <td><input type="text" name="seatno" id="seatno2" class="w3-input" pattern="[0-9]{2}"></td>
              <td><input type="text" name="gpa" id="gpa2" class="w3-input" pattern="[0-9]"></td>
              <td><input type="text" name="result" id="result2" class="w3-input"></td>
              <td><input type="text" name="ese" id="ese2" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="ia" id="ia2" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="tw" id="tw2" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="op_pr" id="or_pr2" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="remark" id="remark2" class="w3-input"></td>
              <td><input type="text" name="encl" id="encl2" class="w3-input"></td>
              <td>
              
                <input type="file" name="file-2[]" id="file-2" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" style="display: none;" />
                <label class="w3-teal w3-round-xxlarge" for="file-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="14" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span></label>
              
              </td>
              <td><div class="w3-btn w3-teal w3-card w3-round-xxlarge">Save</div></td>
            </tr>
            <tr>
              <td>3</td>
              <td>SEMESTER II</td>
              <td><input type="month" name="month&year" id="month&year3" class="w3-input"></td>
              <td><input type="text" name="seatno" id="seatno3" class="w3-input" pattern="[0-9]{2}"></td>
              <td><input type="text" name="gpa" id="gpa3" class="w3-input" pattern="[0-9]"></td>
              <td><input type="text" name="result" id="result3" class="w3-input"></td>
              <td><input type="text" name="ese" id="ese3" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="ia" id="ia3" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="tw" id="tw3" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="op_pr" id="or_pr3" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="remark" id="remark3" class="w3-input"></td>
              <td><input type="text" name="encl" id="encl3" class="w3-input"></td>
              <td>
              
                <input type="file" name="file-3[]" id="file-3" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" style="display: none;" />
                <label class="w3-teal w3-round-xxlarge" for="file-3"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="14" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span></label>
              
              </td>
              <td><div class="w3-btn w3-teal w3-card w3-round-xxlarge">Save</div></td>
            </tr>
            <tr>
              <td>4</td>
              <td>SEMESTER III</td>
              <td><input type="month" name="month&year" id="month&year4" class="w3-input"></td>
              <td><input type="text" name="seatno" id="seatno4" class="w3-input" pattern="[0-9]{2}"></td>
              <td><input type="text" name="gpa" id="gpa4" class="w3-input" pattern="[0-9]"></td>
              <td><input type="text" name="result" id="result4" class="w3-input"></td>
              <td><input type="text" name="ese" id="ese4" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="ia" id="ia4" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="tw" id="tw4" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="op_pr" id="or_pr4" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="remark" id="remark4" class="w3-input"></td>
              <td><input type="text" name="encl" id="encl4" class="w3-input"></td>
              <td>
              
                <input type="file" name="file-4[]" id="file-4" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" style="display: none;" />
                <label class="w3-teal w3-round-xxlarge" for="file-4"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="14" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span></label>
              
              </td>
              <td><div class="w3-btn w3-teal w3-card w3-round-xxlarge">Save</div></td>
            </tr>
            <tr>
              <td>5</td>
              <td>SEMESTER IV</td>
              <td><input type="month" name="month&year" id="month&year5" class="w3-input"></td>
              <td><input type="text" name="seatno" id="seatno5" class="w3-input" pattern="[0-9]{2}"></td>
              <td><input type="text" name="gpa" id="gpa5" class="w3-input" pattern="[0-9]"></td>
              <td><input type="text" name="result" id="result5" class="w3-input"></td>
              <td><input type="text" name="ese" id="ese5" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="ia" id="ia5" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="tw" id="tw5" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="op_pr" id="or_pr5" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="remark" id="remark5" class="w3-input"></td>
              <td><input type="text" name="encl" id="encl5" class="w3-input"></td>
              <td>
              
                <input type="file" name="file-5[]" id="file-5" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" style="display: none;" />
                <label class="w3-teal w3-round-xxlarge" for="file-5"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="14" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span></label>
              
              </td>
              <td><div class="w3-btn w3-teal w3-card w3-round-xxlarge">Save</div></td>
            </tr>
            <tr>
              <td>6</td>
              <td>SEMESTER V</td>
              <td><input type="month" name="month&year" id="month&year6" class="w3-input"></td>
              <td><input type="text" name="seatno" id="seatno6" class="w3-input" pattern="[0-9]{2}"></td>
              <td><input type="text" name="gpa" id="gpa6" class="w3-input" pattern="[0-9]"></td>
              <td><input type="text" name="result" id="result6" class="w3-input"></td>
              <td><input type="text" name="ese" id="ese6" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="ia" id="ia6" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="tw" id="tw6" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="op_pr" id="or_pr6" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="remark" id="remark6" class="w3-input"></td>
              <td><input type="text" name="encl" id="encl6" class="w3-input"></td>
              <td>
              
                <input type="file" name="file-6[]" id="file-6" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" style="display: none;" />
                <label class="w3-teal w3-round-xxlarge" for="file-6"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="14" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span></label>
              
              </td>
              <td><div class="w3-btn w3-teal w3-card w3-round-xxlarge">Save</div></td>
            </tr>
            <tr>
              <td>7</td>
              <td>SEMESTER VI</td>
              <td><input type="month" name="month&year" id="month&year7" class="w3-input"></td>
              <td><input type="text" name="seatno" id="seatno7" class="w3-input" pattern="[0-9]{2}"></td>
              <td><input type="text" name="gpa" id="gpa7" class="w3-input" pattern="[0-9]"></td>
              <td><input type="text" name="result" id="result7" class="w3-input"></td>
              <td><input type="text" name="ese" id="ese7" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="ia" id="ia7" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="tw" id="tw7" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="op_pr" id="or_pr7" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="remark" id="remark7" class="w3-input"></td>
              <td><input type="text" name="encl" id="encl7" class="w3-input"></td>
              <td>
              
                <input type="file" name="file-7[]" id="file-7" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" style="display: none;" />
                <label class="w3-teal w3-round-xxlarge" for="file-7"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="14" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span></label>
              
              </td>
              <td><div class="w3-btn w3-teal w3-card w3-round-xxlarge">Save</div></td>
            </tr>
            <tr>
              <td>8</td>
              <td>SEMESTER VII</td>
              <td><input type="month" name="month&year" id="month&year8" class="w3-input"></td>
              <td><input type="text" name="seatno" id="seatno8" class="w3-input" pattern="[0-9]{2}"></td>
              <td><input type="text" name="gpa" id="gpa8" class="w3-input" pattern="[0-9]"></td>
              <td><input type="text" name="result" id="result8" class="w3-input"></td>
              <td><input type="text" name="ese" id="ese8" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="ia" id="ia8" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="tw" id="tw8" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="op_pr" id="or_pr8" class="w3-input" pattern="[0-9]{1}"></td>
              <td><input type="text" name="remark" id="remark8" class="w3-input"></td>
              <td><input type="text" name="encl" id="encl8" class="w3-input"></td>
              <td>
              
                <input type="file" name="file-8[]" id="file-8" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" style="display: none;" />
                <label class="w3-teal w3-round-xxlarge" for="file-8"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="14" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span></label>
              
              </td>
              <td><div class="w3-btn w3-teal w3-card w3-round-xxlarge">Save</div></td>
            </tr>
        </table>
      </div>

      <!--Proceed to next Container -->
      <div class="w3-ceter w3-teal w3-button w3-margin" onclick="hide_show('Container9','Container10')">Proceed
      </div>
    </div>

    <!--kt passing year -->
    <div onclick="myFunction('Container10')" class="w3-button w3-block w3-black w3-left-align"><span class="w3-badge w3-white">10</span> Year in which kept terms for</div>
    <div id="Container10" class="w3-hide w3-center w3-container w3-padding-24 w3-animate-zoom">
      
      <table class="w3-table-all w3-card-4">
          <thead>
            <tr class="w3-teal">
              <th>Course</th>
              <th>Month and Year</th>
              <th>Save/Edit</th>
            </tr>
          </thead>
          <tr>
          <td>F.E. SEM. I</td>
            <td><input type="month" class="w3-input" name="kt_month&year" id="kt_month&year1"></td>
            <td><div class="w3-btn w3-teal w3-card w3-round-xxlarge">Save</div></td>
          </tr>
          <tr>
            <td>F.E. SEM. II</td>
            <td><input type="month" class="w3-input" name="kt_month&year" id="kt_month&year2"></td>
            <td><div class="w3-btn w3-teal w3-card w3-round-xxlarge">Save</div></td>
          </tr>
          <tr>
            <td>S.E. SEM. I</td>
            <td><input type="month" class="w3-input" name="kt_month&year" id="kt_month&year3"></td>
            <td><div class="w3-btn w3-teal w3-card w3-round-xxlarge">Save</div></td>
          </tr>
          <tr>
            <td>S.E. SEM. II</td>
            <td><input type="month" class="w3-input" name="kt_month&year" id="kt_month&year4"></td>
            <td><div class="w3-btn w3-teal w3-card w3-round-xxlarge">Save</div></td>
          </tr>
          <tr>
            <td>T.E. SEM. I</td>
            <td><input type="month" class="w3-input" name="kt_month&year" id="kt_month&year5"></td>
            <td><div class="w3-btn w3-teal w3-card w3-round-xxlarge">Save</div></td>
          </tr>
          <tr>
            <td>T.E. SEM. II</td>
            <td><input type="month" class="w3-input" name="kt_month&year" id="kt_month&year6"></td>
            <td><div class="w3-btn w3-teal w3-card w3-round-xxlarge">Save</div></td>
          </tr>
          <tr>
            <td>B.E. SEM. I</td>
            <td><input type="month" class="w3-input" name="kt_month&year" id="kt_month&year7"></td>
            <td><div class="w3-btn w3-teal w3-card w3-round-xxlarge">Save</div></td>
          </tr>
      </table>

      <!--Proceed to next Container -->
      <div class="w3-ceter w3-teal w3-button w3-margin" onclick="hide_show('Container10','Container11')">Proceed
      </div>


    </div>

    <!--Exam Fee Payment details-->
    <div onclick="myFunction('Container11')" class="w3-button w3-block w3-black w3-left-align"><span class="w3-badge w3-white">11</span> Details of Exam Fee Payment</div>
    <div id="Container11" class="w3-hide w3-content w3-container w3-padding-24 w3-row w3-animate-zoom">

      <div class="w3-card-4 w3-padding-24 w3-margin w3-border w3-border-teal">
      <div class="w3-row w3-padding">
        <div class="w3-half"><p>EXAMINITION FEE (in Rupees):-</p></div>
        <input type="text" name="fees" class="w3-half w3-input" id="examinationfee" >
      </div>
      <div class="w3-row w3-padding">
        <div class="w3-half"><p>STATEMENT OF MARKS FEE (in Rupees):-</p></div>
        <input type="text" name="fees" class="w3-half w3-input" id="statementfee" >
      </div>
      <div class="w3-row w3-padding">
        <div class="w3-half"><p>FORM FEE (in Rupees):-</p></div>
        <input type="text" name="fees" class="w3-half w3-input" id="formfee" >
      </div>
      <div class="w3-row w3-padding">
        <div class="w3-half"><p>LATE FEE (in Rupees):-</p></div>
        <input type="text" name="fees" class="w3-half w3-input" id="latefee" >
      </div>
      <div class="w3-row w3-padding">
        <div class="w3-half"><p>TOTAL FEE (in Rupees):-</p></div>
        <input type="text" name="fees" class="w3-half w3-input" id="totalfee" >
      </div>
      <div class="w3-row w3-padding">
        <div class="w3-half"><p>RECEIPT NUMBER:-</p></div>
        <input type="text" name="fees" class="w3-half w3-input" id="receiptno" >
      </div>
      <div class="w3-row w3-padding">
        <div class="w3-half"><p>DATE:-</p></div>
        <input type="date" name="fees" class="w3-half w3-input" id="fee_date" >
      </div>
      </div>

      <!--Proceed to next Container -->
      <div class="proceed w3-ceter w3-teal w3-button w3-margin" onclick="hide_show('Container11','Container12')">Proceed
      </div>

    </div>

    <div onclick="myFunction('Container12')" class="w3-button w3-block w3-black w3-left-align"><span class="w3-badge w3-white">12</span> UNDERTAKING BY THE STUDENT</div>
    <div id="Container12" class="w3-hide w3-content w3-container w3-padding-24 w3-row w3-animate-zoom">

      <div class="w3-card-4 w3-padding-24 w3-margin w3-border w3-border-teal">
        <div class="w3-row w3-padding">
          <address class="w3-padding w3-container">
            To,<br>
            The Principal,<br>
            MGMCET.<br>
          </address>
          <div class="w3-container w3-padding">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sir,<br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I request your permission to present myself for the ensuing examination. I have paid the prescribed fees for the same and the information furnished above by me are correct.
          </div>
          <div class="w3-row w3-half">
            <div class="w3-row w3-padding-large">
              <p class="w3-third">PLACE: </p>
              <input type="text" name="place" id="place" class="w3-input w3-twothird" oninput="capatilize('place')">
            </div>
            <div class="w3-row w3-padding-large">
              <p class="w3-third">DATE: </p>
              <input type="date" name="date" class="w3-input w3-twothird" min="2015-01-01">
            </div>
          </div>
          <div class="w3-row w3-half">
            <div class="w3-half">
              <input type='file' id="accept_signature" name="accept_signature" accept="image/*" style="display:none"/>
              <div style="width: 200px;height:150px">
                    <img id="accept_signature_img" src="http://macgroup.org/blog/wp-content/uploads/2011/10/iphone-camera-icon-150x150.jpg" alt="Signature" />
                  </div>
                </div>
            <p id="accept_signature_upload" class="w3-button w3-teal w3-round">Upload Signature</p>
          </div>
        </div>
      
      </div>

    	<div class="w3-content w3-container w3-center">
			<input type="checkbox" class="w3-check" name="accept_form" required><label>I accept all terms and conditions and the information furnished above by me are correct.</label>
		</div>
    	<div class="w3-center w3-padding w3-margin ">
        	<input type="submit" name="submit" class="w3-btn w3-teal w3-round" formaction="../html/dashboard_general.html">
    	</div>
    </div>

  </div>
  <script type="text/javascript" src="../js/exam_form.js"></script>

  <!--Custom File Choose Button Java Script -->
  <script src="../js/custom-file-input.js"></script>   
  </form>
  <?php endif;?>
</body>
</html>