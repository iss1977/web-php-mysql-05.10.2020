<?php 

$entry = $_REQUEST['lexiconID'];
var_dump($entry);

$obj =  '<div class="modal fade" id="newItemModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">';
$obj .=   '<div class="modal-dialog modal-dialog-centered" role="document">';
$obj .='<div class="modal-content">';
$obj .= '<div class="modal-header">';
$obj .= '<h5 class="modal-title" id="exampleModalLongTitle">'."Add a new item".'</h5>';
$obj .= '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
$obj .= '<span aria-hidden="true">&times;</span>';
$obj .= '</button>';
$obj .= '</div>';
$obj .= '<div class="modal-body">';
$obj .= '<p>Hello from modal window</p>';
$obj .= '</div>';
$obj .= '<div class="modal-footer">';
$obj .= '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
$obj .= '<button type="button" class="btn btn-primary">Save changes</button>';
$obj .= '</div>    </div>  </div></div>';



echo $obj;
?>