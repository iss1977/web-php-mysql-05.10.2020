<?php 
    session_start();
    require_once('./../inc/login.inc.php');

if (isset($_REQUEST['login'])){
    $username = trim(htmlspecialchars($_POST["username"]));
    $entered_password = trim(htmlspecialchars($_POST["password"]));

    var_dump($_POST);

    if (!empty($username) && !empty($entered_password)){
        
        $query = $con->prepare('SELECT `id`, `username`, `email`, `password`, `forename`, `familyname`, `created_at` FROM `user` WHERE (username=?) OR (email=?)');
        $query->bind_param('ss',$username, $username);
        $query->execute();
        $result = $query->get_result();
        $rows = $query->num_rows;
        $password_valid = false;

        while ($row = $result->fetch_assoc()) {
            $password_valid = password_verify($entered_password, $row['password']);  
        }

       
        
        /* free results */
        $query->free_result();
        $query->close();
        $con->close();

        if ($password_valid){
            $_SESSION['username'] = $username;
            header("Location: secret.php");
        }else{
            $error ="Bitte login daten richtig ausfüllen";
            echo '<script language="javascript">';
            echo 'alert("Bitte login daten richtig ausfüllen");';  //not showing an alert box.
            echo '</script>';
            header("Location: ../index.php");
             exit;
        }
        
    }else{
        $error ="Bitte login daten  ausfüllen";
        echo '<script language="javascript">';
        echo 'alert("Bitte login daten  ausfüllen");';  //not showing an alert box.
        echo '</script>';
        header("Location: ../index.php");
        exit;
    }
} else {
    $error=NULL;
}

?>