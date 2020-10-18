<?php
$host ="localhost";
$pw = "myuserpass";
$user ="myuser";
$db = "mydb";

$con = new mysqli($host, $user, $pw, $db);
if($con->connect_errno) {
    printf("Connect failed: %sn", $con->connect_error);
    exit();
}
?>