<?php 
    session_start();

if (isset($_REQUEST['login_or_register'])){
    echo var_dump("Request is </br>",$_REQUEST);
    echo var_dump("Post  is </br>",$_POST);
}

?>