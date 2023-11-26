<?php 
session_start();
include 'C:\xampp\htdocs\Proiect\Utils\db_connect.php';
//include 'C:\xampp\htdocs\Proiect\Utils\server.php';
$db1 = new DataBase();
$db = $db1->connnectDataBase();

if($_SESSION['date_logare']){
    if(isset($_GET['numarMasa']) &&
    isset($_GET['userID']) &&
    isset($_GET['data_introdusa']) &&
    isset($_GET['ora_introdusa']) && 
    isset($_GET['nr_de_persoane'])){
        $numarMasa = intval($_GET['numarMasa']);
        $userID = intval($_GET['userID']);
        $data = strtotime($_GET['data_introdusa']);
        $dataFormatata=date('Y-m-d',$data);
        $ora = strtotime($_GET['ora_introdusa']);
        $oraFormatata = date('H:i:s', $ora);
        $dateTimeString = $dataFormatata . ' ' . $oraFormatata;
        $nr_persoane = intval($_GET['nr_de_persoane']);

        $quetyStmt = "INSERT INTO bookings(bookingDate,userID,tableID,durata) VALUES('$dateTimeString',$userID,'$numarMasa',1)";
        $query = mysqli_query($db,$quetyStmt);
        header('location:../aprobatHTML.php');        
}
else{
    header('location:../index.php');
}
}
else{
    echo "bitch";
}
mysqli_close($db);

?>