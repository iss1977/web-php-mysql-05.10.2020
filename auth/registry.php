<?php
    session_start();
    require_once("../inc/login.inc.php");

    var_dump($_GET['register']);


    if(isset($_GET['register'])){
        print_r("Starting regsiter");
        var_dump($_GET['register']);
        $error = false;
        $email = trim(htmlspecialchars($_POST['email']));
        $password1 = trim(htmlspecialchars($_POST['password1']));
        $password2 = trim(htmlspecialchars($_POST['password2']));
        $username = trim(htmlspecialchars($_POST['username']));
        $firstName = trim(htmlspecialchars($_POST['first-name']));
        $lastName = trim(htmlspecialchars($_POST['last-name']));

        // validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo 'Bitte gültige email eingeben';
            $error = true;
        }

        // validate password
        if (strlen($password1)==0 || ($password1 != $password2)){
            echo 'Bitte gültige password eingeben';
            $error = true;

        }

        // check if the username or email has been already registred.

        var_dump($error);

        if (!$error){
            $stmt = $con->prepare("SELECT email from user WHERE username=? OR email=?");
            $stmt->bind_param('ss',$username,$email);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->free_result();
            if ($result->num_rows > 0){
                // email or user schon vorhanden
                echo "User/Email already exist";
                $error = true;
            }
        }

        // if no error, we can add the user to the database.
        if (!$error){
        $stmt = $con->prepare("INSERT INTO `user` (`username`, `email`, `password`, `forename`, `familyname`, `created_at`) VALUES (?,?,?,?,?, current_timestamp())");
        $hashToStoreInDb = password_hash($password1, PASSWORD_DEFAULT);

        $stmt->bind_param('sssss',$username,$email,$hashToStoreInDb,$firstName,$lastName);
        $stmt->execute();
        $stmt->close();
        $con->close();
        $_SESSION['username']=$username;
        header ("Location: ../index.php");
        }
    }else{
        $con->close();   
    } // end if isset 

?>