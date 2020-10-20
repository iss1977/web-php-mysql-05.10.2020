<?php 
define('SECURE', true);
session_start();

$entry = $_REQUEST['lexiconID'];


// in result will be the html document to send
$response="<div class='modal-header'>";



include('login.inc.php');
$result = $con->query("SELECT id, title, teaser, description, imgpath, created_at FROM content where content.id=".$entry);
// echo $result;

while($entry = $result->fetch_assoc()) { 
    $response .= "<h5 class='modal-title' id='staticBackdropLabel'>".$entry['title']."</h5>";
    $response .= "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
    $response .= "<span aria-hidden='true'>&times;</span>";
    $response .= "</button>";
    $response .= "</div>";
    $response .= "<div class='modal-body'>";
    $response .= "<p>".$entry['teaser']."</p>";
    $response .= "<p>".$entry['description']."</p>";
    
    $response .= "</div>";
    $response .= "<div class='modal-footer'>";
    $response .= "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
    $response .= "</div>";

}

echo $response;
$con->close();

?>