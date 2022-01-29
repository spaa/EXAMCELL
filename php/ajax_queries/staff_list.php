<?php
include '../php/server.php';
$query = "SELECT first_name,middle_name,last_name FROM staff_information";
$result = mysqli_query($db, $query);
$list_array = new array();
if (!mysqli_query($db, $query)) {
    array_push($errors, "query_not_processed");
    header("Location: ../php/create_new_class.php?error=query_not_processed");
} else {
    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row["first_name"] . " " . $row["middle_name"] . " " . $row["last_name"];

        echo "<option value='" . $name . "'>" . $name . "</option>";
    }
}
