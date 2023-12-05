<?php
session_start();
include 'C:\xampp\htdocs\Proiect\Utils\db_connect.php';
$db1 = new DataBase();
$db = $db1->connnectDataBase();
$idUser = $_SESSION['id_user'];
$pretTotal = 0;
$querySTMT = "SELECT * FROM comenzi JOIN comenzi_detalii ON comenzi.orderID = comenzi_detalii.orderID JOIN products ON comenzi_detalii.productID = products.productID WHERE comenzi.userID = $idUser";
$query = mysqli_query($db,$querySTMT);
if(mysqli_num_rows($query) > 0){
    echo '<table class="table table-dark table-striped"><thead><tr align="center"><th scope="col">id Comanda</th><th scope="col">Produsele</th>
    <th scope="col">Cantitatea</th><th scope="col">Pretul final</th><th scope="col">Pretul Total</th></thead>';
    $previousOrderID = -1;
    $result = mysqli_fetch_all($query,MYSQLI_ASSOC);
    foreach($result as $comanda){
        echo '<tr>
                <td class="text-center align-middle"> '.$comanda['orderID'].' </td>
                <td class="text-center align-middle"> '.$comanda['productName'].' </td>
                <td class="text-center align-middle"> '.$comanda['quantity'].' </td>
                <td class="text-center align-middle"> '.$comanda['productPrice'] * $comanda['quantity'] .'$ </td>';
                // $pretTotal += $comanda['productPrice'] * $comanda['quantity'];
                // echo '<td class="text-center align-middle"> '.$pretTotal .'$ </td>';
    }
    

    // Afișează fiecare rând
//     while ($row = $query->fetch_assoc()) {
//         Verifică dacă id_comanda curent este diferit de cel anterior
//         if ($row["orderID"] != $previousOrderID) {
//             Afișează id_comanda doar o dată
//             echo "Order ID: " . $row["orderID"] . "<br>";
//             Actualizează valoarea anterioară pentru următoarea iterare
//             $previousOrderID = $row["orderID"];
//         }

//         Afișează detaliile produsului pentru fiecare rând
//         echo "Product Name: " . $row["productName"] . "<br>";
//         echo "Quantity: " . $row["quantity"] . "<br>";
//         echo "Product Price: " . $row["productPrice"] . "<br>";
//         echo "<hr>";
// } 
}
else {
    echo "Nu au fost găsite rezultate.";
}


?>