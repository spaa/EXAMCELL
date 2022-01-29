<?php
include '../php/server.php';

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

$query = "SELECT first_name,middle_name,last_name FROM staff_information ORDER BY first_name";
$result = mysqli_query($db, $query);
$array_list = array();
if (!mysqli_query($db, $query)) {
    array_push($errors, "query_not_processed");
    header("Location: ../php/create_new_class.php?error=query_not_processed");
} else {
    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row["first_name"] . " " . $row["middle_name"] . " " . $row["last_name"];

        //echo "<option value='" . $name . "'>" . $name . "</option>";
        //$array_list[] = array($name);
        array_push($array_list,$name);
    }
}
//$array_list = sort($array_list);
echo json_encode($array_list);
