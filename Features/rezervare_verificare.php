    <?php
    session_start();
    include 'C:\xampp\htdocs\Proiect\Utils\db_connect.php';
    include 'Components/errorMessage.php';
    $db1 = new DataBase();
    $db = $db1->connnectDataBase();
    if(isset($_POST['validate'])){
        $userID = $_SESSION['id_user'];
        $meseBlocate = array();
        $data = ($_POST['data_introdusa']);
        $ora = (($_POST['ora_introdusa']));
        $persoane = ($_POST['nr_de_persoane']);
        $q1 = "SELECT * FROM bookings WHERE DATE(bookingDate) = '$data'";
        $r1 = mysqli_query($db,$q1);
        if(mysqli_num_rows($r1) > 0){
            $bookings = mysqli_fetch_all($r1,MYSQLI_ASSOC);
            foreach($bookings as $booking){
                $oraStart = new DateTime($booking["bookingDate"]);
                $oraStop = new DateTime($booking["bookingDate"]);
                $oraStop->modify('+1 hours');
            
                $oraStart1 = $oraStart->format('H:i');
                $oraStop1 = $oraStop->format('H:i');
    
                if($ora >= $oraStart1 && $ora <= $oraStop1 ){
                    array_push($meseBlocate,$booking['tableID']);
                }
            }
            
            $meseStmt = "SELECT * FROM tables";
            $meseQuery = mysqli_query($db,$meseStmt);
            $mese = mysqli_fetch_all($meseQuery,MYSQLI_ASSOC);
            foreach($mese as $masa){
                if(in_array($masa['tableID'],$meseBlocate)){
                    echo ('<div class="col">
                    <button class="btn btn-danger" disabled> Masa '.$masa['tableID'].' </button>
                    </div>');
                }else{
                    echo ('<div class="col">
                    <a class="btn btn-success" name="'.$masa['tableID'].'" href="../Proiect/Features/rezervare.php?numarMasa='.$masa['tableID'].'&userID='.$userID.'&data_introdusa='.$data .'&ora_introdusa='.$ora.'&nr_de_persoane='.$persoane.'" > Masa '.$masa['tableID'].'  </a>
                    </div>');

                }
            }
        }
        else{
            $meseStmt = "SELECT * FROM tables";
            $meseQuery = mysqli_query($db,$meseStmt);
            $mese = mysqli_fetch_all($meseQuery,MYSQLI_ASSOC);
            foreach($mese as $masa){
                echo ('<div class="col">
                <a class="btn btn-success" name="'.$masa['tableID'].'" href="../Proiect/Features/rezervare.php?numarMasa='.$masa['tableID'].'&userID='.$userID.'&data_introdusa='.$data .'&ora_introdusa='.$ora.'&nr_de_persoane='.$persoane.'" > Masa '.$masa['tableID'].'  </a>
                </div>');
            }  
        }    
    } 
mysqli_close($db);
?>