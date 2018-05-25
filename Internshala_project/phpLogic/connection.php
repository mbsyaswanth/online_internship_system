<?php
// for database connection<?php include 'connection.php';?//>
$mysqli = new mysqli("localhost", "root", "", "internweb");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}else{
 // echo "connected";
}
?>
