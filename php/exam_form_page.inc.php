<?php
include 'server.php';

//echo (int)2.5;
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
//TODO SELECT PREPARED STATEMENT
//error in below line
//$uid = mysqli_real_escape_string($uid);
$regular_form = "";
$kt_form = array();

//this variable will store KT column name from student_general_info database
//$sem_col = "";

$query = "SELECT current_sem,current_year_yyyy,next_year_allowed FROM student_general_info WHERE uid='$uid'";
$exec = mysqli_query($db,$query);
if(mysqli_num_rows($exec)==1){
    $row = mysqli_fetch_assoc($exec);
    //$current_year = $row['current_year'];
    $current_sem = $row['current_sem'];
    $current_year_yyyy = $row['current_year_yyyy'];
    $next_year_allowed = $row['next_year_allowed'];

    if($next_year_allowed==1)
        $regular_form = "CLEAR YOUR GOLDEN KT FIRST";
    else
        $regular_form = $current_sem;

    $check_sem_marks = mysqli_prepare($db,"SELECT sem1_kt,sem2_kt,sem3_kt,sem4_kt,sem5_kt,sem6_kt,sem7_kt,sem8_kt,? FROM student_general_info WHERE uid = '$uid'");
    mysqli_stmt_bind_param($check_sem_marks,"s",$sem_col);

    for($i = 1;$i<$current_sem;$i++){
        $sem_col = "sem".$i."_kt";
        if(mysqli_stmt_execute($check_sem_marks)){
            $result = mysqli_stmt_get_result($check_sem_marks);
            $row = mysqli_fetch_assoc($result);
            //print_r($row);
            $kt_value = $row[$sem_col];
            if($kt_value!=0){
                array_push($kt_form,$i);
            }
        }
        else{
            $_SESSION["message"] = "ERROR:- IF THIS KEEPS SHOWING PLEASE CONTACT YOUR CLASS TEACHER";
            //echo "<script>window.location.href='exam_form_page.php';</script>";
        }
    }
}
else{
    $_SESSION["message"] = "ERROR:- IF THIS KEEPS SHOWING PLEASE CONTACT YOUR CLASS TEACHER";
    //echo "<script>window.location.href='exam_form_page.php';</script>";
}
?>