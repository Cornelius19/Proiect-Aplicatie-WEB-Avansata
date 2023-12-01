<?php
session_start();
include 'C:\xampp\htdocs\Proiect\Utils\db_connect.php';
$db1 = new DataBase();
$db = $db1->connnectDataBase();

$querySTMT = "SELECT* FROM products";
$query = mysqli_query($db,$querySTMT);

if(mysqli_num_rows($query)){
    $result = mysqli_fetch_all($query,MYSQLI_ASSOC);
    foreach($result as $product){
        echo '<div class="col">
                <div class="card">
                    <img src="'.$product['photoPath'].'" class="card-img item-image mx-auto d-block"
                    alt="Photo of ' .$product['productName'].'" width="1000" height="300" />
                        <div class="card-body">
                            <h5 class="card-title">'.$product['productName'].'</h5>
                            <p class="card-text">
                                '.$product['descriere'].'
                            </p>
                            <a name="'.$product['productID'].'" href="../Proiect/Features/dateCos.php?productID='.$product['productID'].'" class="btn btn-success">
                                Adauga cos
                            </a>
                        </div>
                </div>
            </div>';
    }

}




?>