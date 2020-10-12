<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- My CSS-->
    <link rel="stylesheet" href="css/style.css">

    <title>PHP Aufgabe - 10.05.2020</title>
</head>

<body>

<?php 

   
    $GLOBALS['GL_PROJECT_ROOT'] = __DIR__;
    define('HTTP_PATH_ROOT', isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : (isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : '_UNKNOWN_'));
    define('LOCAL_PATH_ROOT', $_SERVER['DOCUMENT_ROOT']);
    define('RELATIVE_PATH_ROOT', '');
    define('RELATIVE_PATH_BASE', str_replace(LOCAL_PATH_ROOT, RELATIVE_PATH_ROOT, getcwd()));
    var_dump($GLOBALS['GL_PROJECT_ROOT']);
    echo ("hello");
    echo( constant('RELATIVE_PATH_BASE'));
?>

<?php session_start(); // we load the current session or start a new one...
if(isset($_SESSION['username'])){
    header("Location: ./auth/secret.php");
    exit();
}
include('./inc/loggedNav.inc.php');
?>



    <!-- ----------------------   My Image slider carousel --------------------------->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/cat-slider-1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/cat-slider-2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/cat-slider-3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container">
        <div class="row">

            <?php
            include('inc/login.inc.php');
            $result = $con->query("SELECT id, title, teaser, description, imgpath, created_at FROM content");
            
            while($entry = $result->fetch_assoc()) { 
              
            ?>


    <!-- ----------------------  My Cards -------------------------------->

    

            <div id ="<?php echo $entry['id'] ?>" class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="img/<?php echo $entry['imgpath'] ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $entry['title']; ?></h5>
                            <p class="card-text"><?php echo $entry['description']; ?></p>
                            <p class="card-text"><small class="text-muted"><?php echo $entry['created_at']; ?></small></p>
                            <button type="button" class="btn btn-primary ajaxModel" data-id="<?php echo $entry['id']; ?>">More info ...</button>
                        </div>
                    </div>
                </div>
            </div>


<?php
} // close the while loop : while($entry = $result->fetch_assoc())
?>

        </div> <!--close class row-->
    </div>  <!--close class container -->



<!-- Modal : will used to display more information about an animal ... -->
<div class="modal fade " id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        Hello
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="registerModalCenter" tabindex="-1" role="dialog" aria-labelledby="registerModalCenter" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Register a new user.</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form  action="./auth/registry.php?register=1" method="post">
            <div class="modal-body w-100">
                <div class="form-group my-1">
                    <label class = "form-control col-sm-4" for="username">Username:</label>
                    <input class = "form-control col-sm-7" type="text" name = "username" id="username">
                </div>
                <div class="form-group my-1">
                    <label class = "form-control col-sm-4" for="password1">Password:</label>
                    <input class = "form-control col-sm-7"  type="password" name = "password1" id="password1">
                </div>
                <div class="form-group my-1">
                    <label class = "form-control col-sm-4" for="password2">Password again:</label>
                    <input class = "form-control col-sm-7"  type="password" name = "password2" id="password2">
                </div>
                <div class="form-group my-1">
                    <label class = "form-control col-sm-4" for="first-name">First name:</label>
                    <input  class = "form-control col-sm-7" type="text" name = "first-name" id="first-name">
                </div>
                <div class="form-group my-1">
                    <label class = "form-control col-sm-4" for="last-name">Last name:</label>
                    <input  class = "form-control col-sm-7" type="text" name = "last-name" id="last-name">
                </div>
                <div class="form-group my-1">
                    <label class = "form-control col-sm-4" for="email">Email:</label>
                    <input class = "form-control col-sm-7"  type="email" name = "email" id="email">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
  </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    
    <script src="js/app.js"></script>
</body>

</html>