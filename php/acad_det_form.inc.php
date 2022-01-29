<?php

include 'server.php';

if(isset($_SERVER['HTTP_REFERER'])){
    //if(!stristr($_SERVER['HTTP_REFERER'],"dashboard.php")){
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

$uid = '';
$tenth_doc  = '';
$tw_or_dp_doc = '';
$sem1 = '';
$sem2 = '';
$sem3 = '';
$sem4 = '';
$sem5 = '';
$sem6 = '';
$sem7 = '';
$sem8 = '';

$uid = $_SESSION['uid'];
$query = "SELECT * FROM student_general_info WHERE uid = '$uid'";
$result = mysqli_query($db,$query);
if(mysqli_num_rows($result)==1) {
    while ($row = mysqli_fetch_assoc($result)) {
        $tenth_doc = $row["ssc_marksheet"];
        $tw_or_dp_doc = $row["hsc_marksheet"];
        $sem1 = $row["sem1_document"];
        $sem2 = $row["sem2_document"];
        $sem3 = $row["sem3_document"];
        $sem4 = $row["sem4_document"];
        $sem5 = $row["sem5_document"];
        $sem6 = $row["sem6_document"];
        $sem7 = $row["sem7_document"];
        $sem8 = $row["sem8_document"];
    }
}