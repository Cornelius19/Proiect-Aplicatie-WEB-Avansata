<?php 
session_start();
include 'C:\xampp\htdocs\Proiect\Utils\db_connect.php';
//include 'C:\xampp\htdocs\Proiect\Utils\server.php';
$db1 = new DataBase();
$db = $db1->connnectDataBase();

if($_SESSION['date_logare']){
    if(isset($_GET['numarMasa']) &&
    isset($_GET['data_introdusa']) &&
    isset($_GET['ora_introdusa']) && 
    isset($_GET['nr_de_persoane'])){
        //echo 'Rezervarea din data '.$_GET['data_introdusa'].' la ora '.$_GET['ora_introdusa'].'pentru '.$_GET['nr_de_persoane'].' persoane a fost realizata cu succes la masa '.$_GET['numarMasa'];
        $numarMasa = intval($_GET['numarMasa']);
        $data = strtotime($_GET['data_introdusa']);
        $dataFormatata=date('Y-m-d',$data);
        $ora = strtotime($_GET['ora_introdusa']);
        $oraFormatata = date('H:i:s', $ora);
        $oraRea = new DateTime('01:00:00');
        // $userID = $_SESSION['userID'];
        // if($oraFormatata == $oraRea){
        //     echo "bitch";
        // }
        // else{
        //     echo "hey";
        //     echo $oraFormatata,$oraRea;
        // }

        $dateTimeString = $dataFormatata . ' ' . $oraFormatata;
        $dateTimeObject = DateTime::createFromFormat('Y-m-d H:i:s', $dateTimeString);
        $nr_persoane = intval($_GET['nr_de_persoane']);

        $quetyStmt = "INSERT INTO bookings(bookingDate,userID,tableID,durata) VALUES('$dateTimeString',1,'$numarMasa',1)";
        $query = mysqli_query($db,$quetyStmt);
        header('location:../aprobat.php');        
}
else{
    header('location:../index.php');
}
}
else{
    echo "bitch";
}


?>