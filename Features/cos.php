<?php
session_start();
include 'C:\xampp\htdocs\Proiect\Utils\db_connect.php';
$db1 = new DataBase();
$db = $db1->connnectDataBase();
$querySTMT = "SELECT * FROM products ";
$query = mysqli_query($db,$querySTMT);
if(mysqli_num_rows($query)){
    echo '<table class="table table-dark table-striped"><thead><tr align="center"><th scope="col">Numele Produsului</th><th scope="col">Pretul</th>
        <th scope="col">Cantitatea</th></thead>';
    $result = mysqli_fetch_all($query,MYSQLI_ASSOC);
    foreach($result as $product){
        if(in_array($product['productID'],$_SESSION['cos'])){
            $nrDeProduse = array_count_values($_SESSION['cos'])[$product['productID']];
            echo '<tr>
            <td class="text-center align-middle"> '.$product['productName'].' </td>
            <td class="text-center align-middle"> '.$product['productPrice'].' </td>
            <td class="text-center align-middle"> '.$nrDeProduse.' </td>
            </tr>';
        }
    }
    $array = implode($_SESSION['cos']);
echo $array;
        }
    
?>