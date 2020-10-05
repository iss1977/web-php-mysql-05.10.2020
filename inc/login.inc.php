<?php
$host ="localhost";
$pw = "123456";
$user ="sebastian";
$db = "php_beispiel_05102020";

$con = new mysqli($host, $user, $pw, $db);
if($con->connect_errno) {
    printf("Connect failed: %sn", $con->connect_error);
    exit();
}
?>