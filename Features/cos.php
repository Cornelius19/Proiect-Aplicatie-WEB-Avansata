<?php
session_start();
include 'C:\xampp\htdocs\Proiect\Utils\db_connect.php';
$db1 = new DataBase();
$db = $db1->connnectDataBase();
$querySTMT = "SELECT * FROM products ";
$query = mysqli_query($db,$querySTMT);
$newArray = array();

$total = 0;
if(mysqli_num_rows($query)){
    if(!isset($_SESSION['cos'])){
        $_SESSION['cos'] = array();
    }
    echo '<table class="table table-dark table-striped"><thead><tr align="center"><th scope="col">Numele Produsului</th><th scope="col">Pretul</th>
        <th scope="col">Cantitatea</th><th scope="col">Valoare</th><th scope="col">Modifica</th></thead>';
    $result = mysqli_fetch_all($query,MYSQLI_ASSOC); 
    foreach($result as $product){
        if(in_array($product['productID'],$_SESSION['cos'])){
            if(isset($_POST['button'.$product['productID'].''])){
                $nrDeProduse = $_POST['input'.$product['productID'].''];
            }else {
                $nrDeProduse = array_count_values($_SESSION['cos'])[$product['productID']];
            }
            if($nrDeProduse != 0){
                $valProdus = $product['productPrice'] * $nrDeProduse;
                echo '<tr>
                <td class="text-center align-middle"> '.$product['productName'].' </td>
                <td class="text-center align-middle"> '.$product['productPrice'].'$ </td>
                
                <form action="cosHTML.php" method="post">
                <td class="text-c
                326
                .enter align-middle">  <input min="0" max="100" type="number" value="'.$nrDeProduse.'" name="input'.$product['productID'].'"> </input></td>
                <td class="text-center align-middle">'.$valProdus.'$</td>
                <td class="text-center align-middle">
                <button type="submit" class="btn btn-warning" name="button'.$product['productID'].'"> Modifica </button></form>
                </td>
                </tr>';
                while($nrDeProduse != 0){
                    array_push($newArray, $product['productID']);
                    $nrDeProduse--;
                }
                $total+=$valProdus;
            }
        }

    }
    $_SESSION['cos'] = $newArray; 
    echo '</table>';
    
    
        
}  
echo '<div > 
    <h1 style="color: white">TOTAL: '.$total.' $ </h1>
    <form method="post" >
    <button type="submit" class="btn btn-success" name="buy">
        Buy
    </button>
</form>
        </div>';

        if(isset($_POST["buy"])){
            $_SESSION['products'] = array_count_values($_SESSION['cos']);
            $idUser = $_SESSION['id_user'];
            $dataComanda = date("Y-m-d");
            $querySTMT = "INSERT INTO comenzi (userID,dataComenzii) VALUES ('$idUser','$dataComanda')";
            $query = mysqli_query($db,$querySTMT);
            if($query){
                $id_comanda = $db->insert_id;
                foreach($_SESSION['products'] as $produsID => $cantitate){
                    $querySTMT1 = "INSERT INTO comenzi_detalii (orderID,productID,quantity) VALUES ('$id_comanda','$produsID','$cantitate')";
                    $query1 = mysqli_query($db,$querySTMT1);
                }
            }    
            unset($_SESSION['cos']);
            echo '<meta http-equiv="refresh" content="0;url=cosHTML.php">';
        }


mysqli_close($db);  
?>
