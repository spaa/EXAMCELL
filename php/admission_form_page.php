<?php include 'dashboard_header.php';
if($_SESSION['user_type']!="STUDENT"){
    echo "<script>window.location.href = '403-forbidden-error.php'</script>";
}
include 'admission_form_page.inc.php';
?>

<br><br>
<div class="w3-container">
    <div class="w3-container w3-teal">
        <h1 class="w3-wide w3-large" id="notify" style="font-family:'Allerta Stencil';"> ADMISSION FORM</h1>
    </div>
    <div class="w3-container w3-white w3-card-4 w3-center" id="messageNotification">
        <p id='regular_activated'>
        <?php 
        if($regular_form == "CLEAR YOUR GOLDEN KT FIRST"){
            echo "<p>$regular_form</p>";
        }
        else if($regular_form >0 && $regular_form<=8){
        echo "
            <form action='regular_exam_form.php' method='POST'>
                <input type='submit' name='regular_exam_form' class='w3-button w3-teal' value='SEM $regular_form FORM'>
            </form>
        ";
        }
        ?>
        </p>
        <p id="regular_message"></p>
    </div>
</div>
<br><br>
<script>
function notify(){
var xhttp,data;
if(window.XMLHttpRequest){
    xhttp = new XMLHttpRequest();
}
else{
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
        data = JSON.parse(this.responseText);
        if(data[0].activated=="yes"){
            console.log(data[0].activated);
            document.getElementById("regular_message").innerHTML = "";
            document.getElementById("regular_activated").style.display = "block";
        }
        else{
            console.log(data[0].activated);
            document.getElementById("regular_activated").style.display = "none";
            document.getElementById("regular_message").innerHTML = "ADMISSION FORM NOT AVAILABLE";
        }
    }
}
xhttp.open("GET","../files/notifications_for_student/notifications_by_exam_cell_for_filling_admission_form/activate_admission_form_link.json",true);
xhttp.send();
setTimeout(notify, 1000);
}
notify();
</script>