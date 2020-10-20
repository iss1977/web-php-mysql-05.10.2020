<?php 

$entry = $_REQUEST['lexiconID'];
if ($entry == -1){
    $itemID = -1;
}else{
    $itemID =  $_REQUEST['lexiconID'];
}


var_dump($entry);
// if lexiconID is not -1, then load the data from database.
    if ($entry!=-1){
    include("./../inc/login.inc.php");
    $result = $con->query("SELECT id, title, teaser, description, imgpath, created_at FROM content where content.id=".$entry);
    // echo $result;

    while($entry = $result->fetch_assoc()) { 
        $title = $entry['title'];
        $teaser = $entry['teaser'];
        $description = $entry['description'];
        $imgpath = $entry['imgpath'];
    }
}else {
    // we have a new item, but we must declare the variables, so the editLexicon.php can read the values
    $title = ""; 
    $teaser = "";
    $description = "";
    $imgpath = "";
}


include('./editLexicon_tpl.php');
$obj="";

// $obj =  '<div class="modal fade" id="newItemModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">';
// $obj .=   '<div class="modal-dialog modal-dialog-centered" role="document">';
// $obj .='<div class="modal-content">';
// $obj .= '<div class="modal-header">';
// $obj .= '<h5 class="modal-title" id="exampleModalLongTitle">'."Add a new item".'</h5>';
// $obj .= '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
// $obj .= '<span aria-hidden="true">&times;</span>';
// $obj .= '</button>';
// $obj .= '</div>';
// $obj .= '<div class="modal-body">';
// $obj .= '<p>Hello from modal window</p>';
// $obj .= '</div>';
// $obj .= '<div class="modal-footer">';
// $obj .= '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
// $obj .= '<button type="button" class="btn btn-primary">Save changes</button>';
// $obj .= '</div>    </div>  </div></div>';



echo $obj;
?>