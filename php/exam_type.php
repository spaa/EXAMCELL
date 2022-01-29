<?php
include 'dashboard_header.php';
if(isset($_SERVER['HTTP_REFERER'])){
    if(stristr($_SERVER['HTTP_REFERER'],"ut_term_pracs_th.php")||stristr($_SERVER['HTTP_REFERER'],"subjects_alloted.php")){
        echo "
        <div class='w3-card-4 w3-margin w3-center w3-white'>
            <div class='w3-container w3-black w3-padding-large w3-xxlarge' style='text-shadow:1px 1px 0 orange'> ENTER MARKS IN".$_SESSION['subject_name']." (".$_SESSION['subject_short_name'].")
            </div>
            <form class='w3-mobile w3-margin w3-padding' action='../php/enter_marks.php' method='POST' enctype='multipart/form-data'>
                <input type='submit' class='w3-btn w3-teal w3-padding w3-round-large' name='exam_marks' value='UT1'>
                <input type='submit' class='w3-btn w3-teal w3-padding w3-round-large' name='exam_marks' value='UT2'>
                <input type='submit' class='w3-btn w3-teal w3-padding w3-round-large' name='exam_marks' value='PRACS'>
                <input type='submit' class='w3-btn w3-teal w3-padding w3-round-large' name='exam_marks' value='TERMWORK'>
                <input type='submit' class='w3-btn w3-teal w3-padding w3-round-large' name='exam_marks' value='THEORY'>
            </form>
        </div>";
    }
    else{
    echo "<script>window.location.href = '../php/403-forbidden-error.php';</script>";
    }
}
else{
    echo "<script>window.location.href = '../php/403-forbidden-error.php';</script>";
    }
?>

        
