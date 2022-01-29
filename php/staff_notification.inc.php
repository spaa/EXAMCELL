<?php
include "server.php";
session_start();

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

//To check if message array is there
$filled = 0;

$count = 0;
$notify = array();
$message = array();

function sort_by_viewed($a,$b){
    if($a["viewed"]=="no" && $b["viewed"]=="no")
    return 0;
    else if($a["viewed"]=="yes" && $b["viewed"]=="no")
    return 1;
    else
    return -1;
}

function sort_by_fe_se_te_be($a,$b){
    if($a["batch_current_year_in_no"]==$b["batch_current_year_in_no"])
    return 0;
    return ($a["batch_current_year_in_no"]<$b["batch_current_year_in_no"])?-1:1;
}

function sort_by_date_and_time($a,$b){
    if($a["date"]==$b["date"]){
        return strcmp($a["time"],$b["time"]);
    }
    return strcmp($a["date"],$b["date"]);
}

date_default_timezone_set("Asia/Kolkata");

$branch = $_SESSION['branch'];
$curr_year = date("Y");

//folder containing json files which stores notification to staff about subject alloted
$file = "../files/notifications_for_staff/notification_for_class_alloted_by_hod_per_year/".$curr_year."/".$branch."/class_alloted.json";

if(file_exists($file)){
        $file_content = file_get_contents($file);

        $json_data = json_decode($file_content);
        foreach ($json_data as $data) {
            if ($data->name == $_SESSION['name']){
                foreach ($data->notification as $notifi) {
                    if($notifi->viewed=="no")
                    $count++;

                    $message[] = array(
                        'from' => "HOD",
                        'notification' => $notifi->notification,
                        'day' => $notifi->day,
                        'date' => $notifi->date,
                        'time' => $notifi->time,
                        'batch_no' => $notifi->batch_no,
                        'branch' => $notifi->branch,
                        'branch_short_name' => $notifi->branch_short_name,
                        'batch_current_year' => $notifi->batch_current_year,
                        'batch_current_year_in_no' => $notifi->batch_current_year_in_no,
                        'viewed' => $notifi->viewed,
                        'sem' => $notifi->sem,
                        'msg' => ""
                    );
                }
            }
        }

        /*$notify[] = array(
            'count' => $count,
            'message' => array_reverse($message)
        );*/
           
    //}
}


//folder containing json files which stores notification to staff about subject alloted
$file = "../files/notifications_for_staff/notification_for_subjects_alloted_by_hod_per_year/".$curr_year."/".$branch."/subjects_alloted.json";

if(file_exists($file)){
    /*if (0 == filesize($file)) {
        $notify[] = array(
            'count' => $count,
            'message' => ''
        );
    } else {*/
        $file_content = file_get_contents($file);

        $json_data = json_decode($file_content);
        foreach ($json_data as $data) {
            if ($data->uid == $_SESSION['uid']){
                foreach ($data->notification as $notifi) {
                    if($notifi->viewed=="no")
                    $count++;

                    $message[] = array(
                        'from' => "HOD",
                        'notification' => $notifi->notification,
                        'day' => $notifi->day,
                        'date' => $notifi->date,
                        'time' => $notifi->time,
                        'batch_no' => $notifi->batch_no,
                        'subject_batch_no' => $notifi->subject_batch_no,
                        'subject_code' => $notifi->subject_code,
                        'subject_name' => $notifi->subject_name,
                        'subject_short_name' => $notifi->subject_short_name,
                        'branch' => $notifi->branch,
                        'branch_short_name' => $notifi->branch_short_name,
                        'batch_current_year' => $notifi->batch_current_year,
                        'batch_current_year_in_no' => $notifi->batch_current_year_in_no,
                        'viewed' => $notifi->viewed,
                        'sem' => $notifi->sem,
                        'msg' => "Dear teacher for SEMISTER $notifi->sem : \"$notifi->subject_name\" ($notifi->subject_short_name) of $notifi->branch BRANCH is alloted to you"
                    );
                }
            }
        }

        /*$notify[] = array(
            'count' => $count,
            'message' => array_reverse($message)
        );*/
           
    //}
}

//folder containing json files which stores notification to staff about sem activated
$file = "../files/notifications_for_staff/notification_for_exam_link_activation_by_hod_per_year/".$curr_year."/".$branch."/activate_marks_link.json";

if(file_exists($file)){
    if (0 == filesize($file)) {
        $notify[] = array(
            'count' => $count,
            'message' => ''
        );
    } else {
        $file_content = file_get_contents($file);

        $json_data = json_decode($file_content);
        foreach ($json_data as $data) {
            if ($data->uid == $_SESSION['uid']){
                foreach ($data->notification as $notifi) {
                    if($notifi->viewed=="no")
                    $count++;
                    //method1
                    /*
                    $msg = array(
                        'from' => "HOD",
                        'day' => $notifi->day,
                        'date' => $notifi->date,
                        'time' => $notifi->time,
                        'msg' => "Dear teacher you can now enter marks for ".$notifi->notification." for ".$notifi->subject_name
                    );
                    array_push($message,$msg);*/

                    //method2
                    $message[] = array(
                        'from' => "HOD",
                        'notification' => $notifi->notification,
                        'day' => $notifi->day,
                        'date' => $notifi->date,
                        'time' => $notifi->time,
                        'batch_no' => $notifi->batch_no,
                        'subject_batch_no' => $notifi->subject_batch_no,
                        'subject_code' => $notifi->subject_code,
                        'subject_name' => $notifi->subject_name,
                        'subject_short_name' => $notifi->subject_short_name,
                        'branch' => $notifi->branch,
                        'branch_short_name' => $notifi->branch_short_name,
                        'batch_current_year' => $notifi->batch_current_year,
                        'batch_current_year_in_no' => $notifi->batch_current_year_in_no,
                        'viewed' => $notifi->viewed,
                        'sem' => $notifi->sem,
                        'msg' => "Dear teacher you can now enter marks for ".$notifi->notification." for ".$notifi->subject_name."(".$notifi->subject_short_name.") for $notifi->branch BRANCH"
                    );
                }
            }
        }

        //V1.0
        usort($message,"sort_by_fe_se_te_be");

        usort($message,"sort_by_date_and_time");

        usort($message,"sort_by_viewed");

        $notify[] = array(
            'count' => $count,
            'message' => array($message)
        );  
    }
}
//V1.0
else{
    $notify[] = array(
        'count' => $count,
        'message' => ''
    );
}

//V1.1
/*usort($message,"sort_by_fe_se_te_be");

usort($message,"sort_by_date_and_time");

usort($message,"sort_by_viewed");

$notify[] = array(
    'count' => $count,
    'message' => $message
    );      */
echo json_encode($notify);
?>