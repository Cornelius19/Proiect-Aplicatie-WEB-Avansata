<?php
include 'Utils/server.php';

if(empty($_SESSION['date_logare'])){
    echo "Va rog sa va logati!!!";
}
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
    <?php  if (isset($_SESSION['date_logare'])) : ?>
    <p>Welcome
         <strong>
            <?php
                echo $_SESSION['date_logare'];
                echo " ";
                //echo $_SESSION['success'];
            ?>
        </strong>
    </p>

    <?php endif ?>
    <?php
    function closeSession(){
        session_close();
    }
    ?>
    <form action="index.php" method="post">
        <button class="btn btn-primary" type="submit" name="close_session">
            Log out
        </button>
    </form>

    <script src="js/bootsrap.min.js"></script>
</body>

</html>