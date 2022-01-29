<?php include 'dashboard_header.php';
if($_SESSION['user_type']!="STUDENT"){
    echo "<script>window.location.href = '403-forbidden-error.php'</script>";
}
include 'exam_form_page.inc.php';
?>

<br><br>
<div class="w3-container">
    <div class="w3-container w3-teal">
        <h1 class="w3-wide w3-large" id="notify" style="font-family:'Allerta Stencil';"> REGULAR EXAM FORM</h1>
    </div>
    <div class="w3-container w3-white w3-card-4 w3-center" id="messageNotification">
        <?php 
        if($regular_form == "CLEAR YOUR GOLDEN KT FIRST"){
            echo "<p>$regular_form</p>";
        }
        else if($regular_form >0 && $regular_form<=8){
        echo "<p id='regular_activated'>
            <form action='regular_exam_form.php' method='POST'>
                <input type='submit' name='regular_exam_form' class='w3-button w3-teal' value='SEM $regular_form FORM'>
            </form>
        </p>";
        }
        ?>
        <p id="regular_message">EXAM FORM NOT AVAILABLE</p>
    </div>
</div>
<br><br>

<div class="w3-container">
    <div class="w3-container w3-teal" >
        <h1 class="w3-wide w3-large" id="notify" style="font-family:'Allerta Stencil';"> KT EXAM FORM</h1>
    </div>
    <div class="w3-container w3-white w3-card-4 w3-center" id="messageNotification">
    <?php 
        if(count($kt_form)==0){
            echo "<p>YOU DONT HAVE ANY KT";
        }
        else{
            echo "<p id='kt_activated'>";
            for($i=0;$i<count($kt_form);$i++){
                echo "
                    <form action='kt_exam_form.php' method='POST'>
                        <input type='hidden' name='kt_form' value='$kt_form[$i]'>
                        <input type='submit' name='kt_exam_form' class='w3-button w3-teal' value='SEM $kt_form[$i] KT FORM'>
                    </form>
                ";
            }
            echo "</p>";
        }
    ?>
        <p id="kt_message"></p>
    </div>
</div>
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
            document.getElementById("kt_message").innerHTML = "";
            document.getElementById("regular_activated").style.display = "block";
            document.getElementById("kt_activated").style.display = "block";
        }
        else{
            console.log(data[0].activated);
            document.getElementById("regular_activated").style.display = "none";
            document.getElementById("kt_activated").style.display = "none";
            document.getElementById("regular_message").innerHTML = "EXAM FORM NOT AVAILABLE";
            document.getElementById("kt_message").innerHTML = "EXAM FORM NOT AVAILABLE";
        }
    }
}
xhttp.open("GET","../files/notifications_for_student/notifications_by_exam_cell_for_filling_exam_form/activate_exam_form_link.json",true);
xhttp.send();
setTimeout(notify, 1000);
}
notify();
</script>