<?php
session_start();
include "server.php";

if(isset($_SERVER['HTTP_REFERER'])){
    if(!stristr($_SERVER['HTTP_REFERER'],"sem_link_activation.php")){
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

/*Using this we get activate_marks_link.json data structure as
[
    {
        Staff 1 :all event details are stored here
    },
    {
        Staff 2 :all event details are stored here
    }
]
This is Best Version:-Consumes less storage
*/
//default text to be stored in link_activated.txt file
$text = "-1";

//Branch of hod..to insert data in that particular branch file
$branch = $_SESSION['branch'];

for ($i=1; $i <= 5; $i++) { 
    if(isset($_POST[$i])){
        echo "clicked";
        
        if($i==1){
            $notification_type = "ut1_marks";
            $notification = "UT1";
            $text = 0;
        }
        else if($i==2){
            $notification_type = "ut2_marks";
            $notification = "UT2";
            $text = 1;
        }
        else if($i==3){
            $notification_type = "tearm_work";
            $notification = "TERM WORK";
            $text = 2;
        }
        else if($i==4){
            $notification_type = "practical";
            $notification = "PRACTICAL";
            $text = 3;
        }
        else{
            $notification_type = "theory";
            $notification = "THEORY";
            $text = 4;
        }
    
        function get_data($notification,$notification_type){

            //default text to be stored in link_activated.txt file
            $text = "-1";

            //Branch of hod..to insert data in that particular branch file
            $branch = $_SESSION['branch'];
            
            //stores current event array---complete array
            $sem_activated = array();
            //stores non duplicate uids
            $uid = array();
            //stores notification
            $notify = array();
            $db = mysqli_connect('localhost','root','','exam_cell');
            if(!$db)
            die("Connection Failed ".mysqli_connect_error());
            else {
                echo "Connection established<br>";
                
                date_default_timezone_set("Asia/Kolkata");
                
                $year = date("Y");
                $month = date("n");
                if($month>=1 && $month<=5){
                    $sem_seen = array(2,4,6,8);
                }
                else{
                    $sem_seen = array(1,3,5,7);
                }

                //TODO this query is the final query it will NOT WORK for TESTING
                //$query = "SELECT c.batch_branch,c.batch_branch_short_name,c.batch_current_year,c.batch_current_year_in_no,c.batch_sem,sf.sr_no,s.batch_no,s.subject_batch_no,s.subject_name,s.subject_short_name,sf.first_name,sf.middle_name,sf.last_name,s.subject_code,sf.uid_staff FROM subject_incharge s INNER JOIN staff_information sf ON s.subject_incharge_uid=sf.uid_staff INNER JOIN class_batch c ON c.batch_branch='$branch' AND c.batch_year=$year AND (c.batch_sem=$sem_seen[0] OR c.batch_sem=$sem_seen[1] OR c.batch_sem=$sem_seen[2] OR c.batch_sem=$sem_seen[3]) ORDER BY sf.sr_no";
                
                //TODO This is used for TESTING PURPOSE:- REMOVE THIS QUERY AFTER TESTING
                $query = "SELECT c.batch_branch,c.batch_branch_short_name,c.batch_current_year,c.batch_current_year_in_no,c.batch_sem,sf.sr_no,s.batch_no,s.subject_batch_no,s.subject_name,s.subject_short_name,sf.first_name,sf.middle_name,sf.last_name,s.subject_code,sf.uid_staff FROM subject_incharge s INNER JOIN staff_information sf ON s.subject_incharge_uid=sf.uid_staff INNER JOIN class_batch c ON c.batch_branch='$branch' AND (c.batch_sem=$sem_seen[0] OR c.batch_sem=$sem_seen[1] OR c.batch_sem=$sem_seen[2] OR c.batch_sem=$sem_seen[3]) ORDER BY sf.sr_no";
                if($result = mysqli_query($db,$query)){
                    echo "query executed successfully<br>";
                    
                    //current year:-to create current year folder if not exist
                    $curr_year = date("Y");
                    //folder containing json files which stores notification to staff about sem activated
                    $file = "../files/notifications_for_staff/notification_for_exam_link_activation_by_hod_per_year/".$curr_year;
                    //open folder if exist 
                    if(file_exists($file)){
                        $file_folder = $file."/".$branch;
                        if(file_exists($file_folder)){
                            //json file containing notification to staff about sem activated
                            $json_file = $file_folder."/activate_marks_link.json";
                            //open file if exists
                            if(file_exists($json_file))
                                $sem_activated = json_decode(file_get_contents($json_file),true);
                        }
                        else{
                            mkdir($file_folder);
                        }
                                            
                    }
                    //else create new folder
                    else{
                        mkdir($file);
                        $file_folder = $file."/".$branch;
                        mkdir($file_folder);
                    }
                    while($row = mysqli_fetch_assoc($result)){
                        //Finding index of object element in array
                        $index = array_search($row['uid_staff'],array_column($sem_activated,"uid"));
                        if(in_array($row['uid_staff'],$sem_activated[$index])){
                            /*
                            //Finding index of object element in array
                            $index = array_search($row['uid_staff'],array_column($sem_activated,"uid"));
                            echo "<br>INDEX IS:-".$index."<br>";
                            */
                            //Dynamically Pushing new object in an onject
                            //Method 1
                            $notify = array(
                                'subject_name' => $row['subject_name'],
                            'subject_short_name' => $row['subject_short_name'],
                            'date' => date("jS F, Y"),//date('d-m-Y'),
                            'day' => date('l'),
                            'time' => date('h:i:s A'),
                            'batch_no' => $row['batch_no'],
                            'subject_batch_no' => $row['subject_batch_no'],
                            'subject_code' => $row['subject_code'],
                            'sem' => $row['batch_sem'],
                            'branch' => $row['batch_branch'],
                            'branch_short_name' => $row['batch_branch_short_name'],
                            'batch_current_year' => $row['batch_current_year'],
                            'batch_current_year_in_no' => $row['batch_current_year_in_no'],
                            'notification' => $notification,
                            'notification_type' => $notification_type,
                            'viewed' => 'no'
                            );
                            array_push($sem_activated[$index]["notification"],$notify);

                        }
                        else
                        {
                            $notify = array(
                                'subject_name' => $row['subject_name'],
                            'subject_short_name' => $row['subject_short_name'],
                            'date' => date("jS F, Y"),//date('d-m-Y'),
                            'day' => date('l'),
                            'time' => date('h:i:s A'),
                            'batch_no' => $row['batch_no'],
                            'subject_batch_no' => $row['subject_batch_no'],
                            'subject_code' => $row['subject_code'],
                            'sem' => $row['batch_sem'],
                            'branch' => $row['batch_branch'],
                            'branch_short_name' => $row['batch_branch_short_name'],
                            'batch_current_year' => $row['batch_current_year'],
                            'batch_current_year_in_no' => $row['batch_current_year_in_no'],
                            'notification' => $notification,
                            'notification_type' => $notification_type,
                            'viewed' => 'no'
                            );

                            //to check if uid repeats:if this happens we should merge the notification in that uid
                            array_push($uid,$row['uid_staff']);

                                $sem_activated[] = array(
                                    'uid' => $row['uid_staff'],
                                    'name' => $row['first_name']." ".$row['middle_name']." ".$row['last_name'],
                                    'notification' => array($notify)
                                    );   
                        }
                    }
                    return json_encode($sem_activated);
                }
                else{
                    echo "error in query";
                }
            }
        }

        //current year:-to create current year folder if not exist
        $curr_year = date("Y");
        //json file containing notification to staff about sem activated
        $file = "../files/notification_for_exam_link_activation_by_hod_per_year/".$curr_year."/".$branch;
        $json_file = $file."/activate_marks_link.json";

            if(file_put_contents($json_file,get_data($notification,$notification_type)))
            {
                //text file contains which link is activated
                $link_activate_file = fopen($file."/link_activated.txt","w");
                fwrite($link_activate_file,$text);
                fclose($link_activate_file);
                
                echo $file."  file created successfully....<br>";
                header("Location: sem_link_activation.php?successful");
            }
            else {
                /*
                //text file contains which link is activated
                $link_activate_file = fopen("link_activated.txt","w");
                fwrite($link_activate_file,$text);
                fclose($link_activate_file);*/
                echo "Error while copying contents";
            }
        
        //print_r(get_data($notification,$notification_type));
    }
}
?>