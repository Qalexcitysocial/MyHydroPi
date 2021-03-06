<?php
// SETTINGS_COL_NAMES.PHP
    require "hydropi_connect.php";
    // Get all the settings names from the database and place in an array
    $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'hydropi' AND TABLE_NAME = 'settings'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $colnames = array();
        while($row = mysqli_fetch_assoc($result)) {
            if (($row['COLUMN_NAME'] != "pk") and ($row['COLUMN_NAME'] != "pause_readings")) {
                array_push($colnames, $row['COLUMN_NAME']);
            }
        }
    }
    mysqli_free_result($result);
    mysqli_close($conn);
?>