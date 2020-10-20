<?php 
$title = $_POST['title'];
$teaser = $_POST['teaser'];
$description = $_POST['description'];
$itemID  = $_POST['new-or-old'];
var_dump($_FILES['file']['name']  );


if ($_FILES){
    $file = $_FILES['file']['name'];
} else { 
    $file = NULL;
}


$target_dir = "./../lexicon-img/";
$uploadOK = 1; // will switch to 0 if an error 

$target_file = $target_dir.basename($_FILES['file']['name']);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (isset($_POST['submit'])){
    $check = getimagesize($_FILES['file']['tmp_name']);
    if ($check !== false){
        echo ("<script>console.log('File is an Image ". $check['mime'] ."')</script>");
        $uploadOK = 1;
    } else {
        echo ("<script>console.log('File is not an Image')</script>");
        $uploadOK = 0;
    }
}



// allow only certain filetypes
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
    echo ("<script>console.log('Sind nur JPG, usw erlaubt')</script>");
    $uploadOK = 0;
}

if ($uploadOK == 1){ // storing the file
    if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file)){
        echo ("<script>console.log('The file was uploaded')</script>");
    }else{
        echo ("<script>console.log('Error by uploading the file.')</script>");
        $uploadOK = 0;
    };
} else {
    echo ("<script>console.log('File was not uploaded')</script>");
}

// let's save the things
if ( $uploadOK == 1){
    include("login.inc.php");
    if ($itemID == "-1"){
        $stmt = $con->prepare("INSERT INTO `content` (`title`, `teaser`, `description`, `imgpath`) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss",$title,$teaser,$description,$file);
    } else {
        
        $stmt = $con->prepare("UPDATE `content` SET `title` = ?, `teaser` = ?, `description` = ?, `imgpath` = ? WHERE (`id` =? ); ");
        $stmt->bind_param("sssss",$title,$teaser,$description,$file, $itemID);
        var_dump($stmt);
        
    }
    $stmt->execute();
    $stmt->close();
    $con->close();
}

if (isset($_SERVER['HTTP_REFERER']))
    header("Location:{$_SERVER['HTTP_REFERER']}");
?>