    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo RELATIVE_PATH_ROOT ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo RELATIVE_PATH_ROOT ?>auth/lexicon-list.php">Lexicon items</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>


            </ul>
            <?php 
            if (isset($_SESSION["username"])){ ?>
            <!-- If logged in, we can logout-->
            <form action="./logout.php" method="post" class="form-inline my-2 my-lg-0">
                <span class="mr-2">You are logged in.</span>
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Logout</button>
            </form>

            <?php } else {?>
            <div class="form-row">
                <form action="./auth/login.php?login=1" method="post">
                    <div class="form-row justify-content-end">
                        <div class="col-sm-3 my-1">
                            <label class="sr-only" for="inlineFormInputName">Username or email:</label>
                            <input type="text" class="form-control" id="inlineFormInputName" name="username" placeholder="user@domain.com">
                        </div>
                        <div class="col-sm-3 my-1">
                            <label class="sr-only" for="inlineFormInputGroupUsername">Password :</label>
                            <input type="password" class="form-control" id="inlineFormInputGroupUsername" name="password" placeholder="******">
                        </div>
                        <div class="col-auto my-1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="autoSizingCheck2">
                                <label class="form-check-label" for="autoSizingCheck2">
                                Remember me
                                </label>
                            </div>
                        </div>
                        <div class="col-auto my-1">
                            <button type="submit" class="btn btn-primary" name="login">Login</button>
                        </div>
                    </div>
                </form>
                <form action="./auth/registry.php?register=1" method="get">
                    <div class="col-auto my-1">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registerModalCenter">Register</button>
                    </div>
                </form>
            </div>

            <?php } ?>
        </div> <!--end of div / class="collapse navbar-collapse" -->
    </nav>

