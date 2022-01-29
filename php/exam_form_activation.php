<?php include 'dashboard_header.php';
if($_SESSION['user_type']!="EXAMCELL"){
    echo "<script>window.location.href = '403-forbidden-error.php'</script>";
}
$month = date("n");
if($month>=1 && $month<=5){
    $sem_seen = array(2,4,6,8);
}
else{
    $sem_seen = array(1,3,5,7);
}

if(isset($_POST['submit'])){
    $notification = array();

    $curr_year = date("Y");
    //folder containing json files which stores notification to staff about sem activated
    $json_file = "../files/notifications_for_student/notifications_by_exam_cell_for_filling_exam_form/activate_exam_form_link.json";    
    $notification[] = array(
        'year' => date("Y"),
        'sem' =>  $sem_seen[0].','.$sem_seen[1].','.$sem_seen[2].','.$sem_seen[3],
        'activated' => 'yes'
    );
    if(file_put_contents($json_file,json_encode($notification))){
        $_SESSION['message'] = "SUCCESS NOW STUDENTS CAN FILL EXAM FORM";
        echo "<script>window.location.href = 'dashboard.php';</script>";
    }           
}
?>
<br><br>
<div class="w3-margin w3-panel w3-display-container w3-pale-blue w3-bottombar w3-border-yellow w3-border">
    <span onclick="this.parentElement.style.display='none'" class="w3-button w3-large w3-display-topright">&times;</span>
    <p><strong>NOTE...!</strong> ACTIVATE EXAM FORM FOR SEM <?php echo "$sem_seen[0],$sem_seen[1],$sem_seen[2],$sem_seen[3]";?> </p>
</div>

<div class="w3-container">
    <div class="w3-container w3-teal">
        <h1 class="w3-wide w3-large" id="notify" style="font-family:'Allerta Stencil';"> ACTIVATE EXAM FORM</h1>
    </div>
    <div class="w3-container w3-white w3-card-4 w3-center" id="messageNotification">
        <p>
            <form action="exam_form_activation.php" method="POST">
                <p id="message"> EXAM FORM IS ACTIVATED </p>
                <input type="submit" style="display:none" name="submit" id="activate" class="w3-button w3-teal" value="ACTIVATE">
            </form>
        </p>
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
        if(data[0].activated=="no"){
            console.log(data[0].activated);
            document.getElementById("message").style.display = "none";
            document.getElementById("activate").style.display = "block";
        }
        else if(data[0].activated=="yes"){
            console.log(data[0].activated);
            document.getElementById("activate").style.display = "none";
            document.getElementById("message").style.display = "block";
        }
    }
}
xhttp.open("GET","../files/notifications_for_student/notifications_by_exam_cell_for_filling_exam_form/activate_exam_form_link.json",true);
xhttp.send();
setTimeout(notify, 1000);
}
notify();
</script>