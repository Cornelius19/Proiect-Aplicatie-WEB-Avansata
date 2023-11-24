<?php 
    include 'Components/navbar_log.php';
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
    <!-- Mesajul de sus -->
    <div class="card mx-auto col-md-8 ">
        <div class="card-body text-center text-bg-dark">
            <h1>Select date and time for your reservation</h1>
            <p>O masa are capacitatea maxima de 4 persoane</p>
        </div>
    </div>

    <!-- Formularul de rezervare -->
    <form method="post" action="table.php">
        <div
            class="container pt-3 pb-1 d-flex flex-row  align-items-center justify-content-center text-center fw-semibold">
            
                <div class="col-2">
                    <p>Data:</p>
                    <input type="date" name="data_introdusa" required>
                </div>
                <div class="col-2">
                    <p>Ora</p>
                    <input type="time" min="08:00" max="22:00" name="ora_introdusa" required>
                </div>
                <div class="col-2">
                    <p>Nr oameni</p>
                    <input type="number" name="nr_de_persoane" max="4" required>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-info" name="validate">Rezerva</button>
                </div>            
        </div>
        
    </form>
    <form action="table.php" method="post">
        <div class="container pt-3 pb-1 d-flex flex-row  align-items-center justify-content-center text-center fw-semibold"> 
            <div class="row gy-4 gx-4 row-cols-4">
                <?php include 'Utils/server.php' ?>
            </div>
        </div>
    </form>






    <script src="js/bootstrap.min.js"></script>
</body>

</html>