<?php
    if(isset($_POST['close_session'])){
        session_destroy();
        header('location: logareHTML.php');
    }
?>
<nav class="navbar navbar-expand-md bg-body-tertiary">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tableHTML.php">Tables</a>
                </li>
                <!-- <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li> -->
            </ul>
        </div>
        <div class="mx-auto order-0">
            <a class="navbar-brand ms-auto" href="#">SD Coffe</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <form action="index.php" method="post">
                        <button class="btn btn-primary" type="submit" name="close_session">
                            Log out
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>