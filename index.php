<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <!-- //Daca nu este logat nici un user!!! -->
    <?php if(empty($_SESSION['date_logare'])): ?>
    <?php
    include 'Components/navbar.php'
    ?>
    <div class="container d-flex align-items-center justify-content-center vh-100 ">
        <div class="text-center">
            <div class="alert alert-primary">
                Daca doriti sa rezervati o masa va rog sa va logati!!!
                <p class="mb-0">Va multumesc mult!</p>
            </div>
        </div>
    </div>

    <?php endif ?>


    <?php  if (isset($_SESSION['date_logare'])) : ?>
    <?php include 'Components/navbar_log.php' ?>
    <p>Welcome
        <strong>
            <?php
                echo $_SESSION['date_logare'];
            ?>
        </strong>
    </p>
    <?php endif ?>

    <script src="js/bootsrap.min.js"></script>
</body>

</html>