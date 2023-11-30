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
    <!-- Background image -->
    <!-- //Daca nu este logat nici un user!!! -->
    <?php if(empty($_SESSION['date_logare'])): ?>
    <?php
    include 'Components/navbar.php'
    ?>
    <img src="Pics/1158153.jpg" style="
    height: 100vh;
    width: 100vw;
    object-fit: cover;
    filter: brightness(0.6);
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
    ">
    <div class="container d-flex  justify-content-center vh-100 ">
        <div class="text-center">
            <h1 style="color: white" >Daca doriti sa rezervati o masa va rog sa va logati!!!</h1>
            <h2 style="color: white" >Va multumesc mult!</h2>
        </div>
    </div>
    <?php endif ?>
    <?php  if (isset($_SESSION['date_logare'])) : ?>
    <?php include 'Components/navbar_log.php' ?>
    <img src="Pics/1158153.jpg" style="
    height: 100vh;
    width: 100vw;
    object-fit: cover;
    filter: brightness(0.6);
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
    ">
        <div class="container d-flex  justify-content-center vh-100 ">
            <div class="text-center">
                <h1>Welcome
                    <strong>
                        <?php
                        echo $_SESSION['date_logare'];
                        ?>
                    </strong>
                </h1>
            </div>
        </div>
    </div>
    <p>
    </p>
    <?php endif ?>

    <script src="js/bootsrap.min.js"></script>
</body>

</html>