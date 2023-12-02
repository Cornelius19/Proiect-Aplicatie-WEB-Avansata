
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
<?php 
    include 'Components/navbar_log.php';
?>
    <!-- Mesajul de sus -->
    <div class="card mx-auto col-md-8 ">
        <div class="card-body text-center text-bg-dark">
            <h1>Select date and time for your reservation</h1>
            <p>O masa are capacitatea maxima de 4 persoane</p>
        </div>
    </div>
    <!-- Formularul de rezervare -->
    <form method="post" action="tableHTML.php">
        <div
            class="container pt-3 pb-1 d-flex flex-row  align-items-center justify-content-center text-center fw-semibold">

            <div class="col-2">
                <p>Data:</p><?php 
                    if(!(isset($_POST['data_introdusa']))){
                        echo '<input type="date" min="2023-11-26" max="2024-01-31"  id="data" name="data_introdusa" required>';
                    }
                    else{
                        echo '<input type="date" id="data" min="2023-11-26" max="2024-01-31" name="data_introdusa" required value = "'.$_POST['data_introdusa'].'">';
                    }
                ?>
            </div>
            <div class="col-2">
                <p>Ora</p>
                <?php 
                    if(!(isset($_POST['ora_introdusa']))){
                        echo '<input type="time" min="08:00" max="22:00" id="data" name="ora_introdusa" required>';
                    }
                    else{
                        echo '<input type="time" min="08:00" max="22:00" id="data" name="ora_introdusa" required value = "'.$_POST['ora_introdusa'].'">';
                    }
                ?>
            </div>
            <div class="col-2">
                <p>Nr oameni</p>
                <?php 
                    if(!(isset($_POST['nr_de_persoane']))){
                        echo '<input type="number" name="nr_de_persoane" min="1" max="4" required>';
                    }
                    else{
                        echo '<input type="number" name="nr_de_persoane" value="'.$_POST['nr_de_persoane'].'" max="4" required>';
                    }
                ?>
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-info" name="validate">Valabilitate</button>
            </div>
        </div>

    </form>

    <div class="container pt-3 pb-1 d-flex flex-row  align-items-center justify-content-center text-center fw-semibold">
        <div class="row gy-4 gx-4 row-cols-4">

            <?php
                    include 'Features/rezervare_verificare.php';
                ?>
        </div>
    </div>
    <script src="js/bootstrap.min.js">
    < /body>        <
    /html>