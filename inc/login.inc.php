<?php
$host ="locahost";
$pw = "myuserpass";
$user ="myuser";
$db = "mydb";

$con = new mysqli($host, $user, $pw, $db);
if($con->connect_errno) {
    printf("Connect to mysql  failed: %sn", $con->connect_error);
    exit();
}
?>