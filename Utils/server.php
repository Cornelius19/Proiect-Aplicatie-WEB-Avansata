<?php
session_start();
    include 'db_connect.php';
    include 'Components/errorMessage.php';
    $db1 = new DataBase();
    $db = $db1->connnectDataBase();
    $errors = array();

    //inregistrarea
    if(isset($_POST['reg_user'])){
        $lastName = mysqli_real_escape_string($db,$_POST['last_name']);
        $firstName = mysqli_real_escape_string($db,$_POST['first_name']);
        $email = mysqli_real_escape_string($db,$_POST['email']);
        $password = mysqli_real_escape_string($db,$_POST['pass']);
        $repassword = mysqli_real_escape_string($db,$_POST['re_pass']);   
        
        $user_check_query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($db,$user_check_query);
        $user = mysqli_fetch_assoc($result);

           
        if($user){
            echo "Email deja inregistrat!";
        }
        else{
            if($password === $repassword ){
                $password = md5($repassword);
                $query = "INSERT INTO users (LastName,FirstName, email, pass)
                    VALUES('$lastName','$firstName','$email','$password')";
                mysqli_query($db,$query);
                $date = $firstName." ".$lastName;
                $_SESSION['date_logare'] = $date;
                header('location: index.php');
            }
            else{
                $error = "Parolele nu coincid!";
                $_POST['reg_user'] = null;
                showErrorMessage($error, "Error :D");
            }   
    }
    mysqli_close($db);
}
        

    //logarea 
    if (isset($_POST['logare'])) {
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
      
        if (empty($email)) {
            array_push($errors, "Username is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }
        if (count($errors) == 0) {
            $pass = md5($password);
            $query = "SELECT * FROM users WHERE email='$email' AND pass='$pass'";
            $results = mysqli_query($db, $query);
            $rezultat = mysqli_fetch_assoc($results);
            $lastName = $rezultat['LastName'];
            $firstName = $rezultat['FirstName'];
            $date = $lastName." ".$firstName;
            $user_ID = $rezultat['userID'];
            if (mysqli_num_rows($results) == 1) {
                $_SESSION['date_logare'] = $date;
                $_SESSION['id_user'] = $user_ID;
                header('location: index.php');
            }else {
                $error = "Parola nu coincide!!!";
                $_POST['logare'] = null;
                showErrorMessage($error, "Eroare la inregistrare!");
            }
        }
        mysqli_close($db);
        
    }
    if(isset($_POST['close_session'])){
        session_destroy();
        header('location: logare.php');
    }
    $data = null;

    //rezervare verificare
    if(isset($_POST['validate'])){
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
                    <a class="btn btn-success" name="'.$masa['tableID'].'" href="../Proiect/Features/rezervare.php?numarMasa='.$masa['tableID'].'&data_introdusa='.$data .'&ora_introdusa='.$ora.'&nr_de_persoane='.$persoane.'" > Masa '.$masa['tableID'].'  </a>
                    </div>');

                }
            }
        }
        else{
            $meseStmt = "SELECT * FROM tables";
            $meseQuery = mysqli_query($db,$meseStmt);
            $mese = mysqli_fetch_all($meseQuery,MYSQLI_ASSOC);
            foreach($mese as $masa){
                if(in_array($masa['tableID'],$meseBlocate)){
                    echo ('<div class="col">
                    <button class="btn btn-danger" type="submit" name="'.$masa['tableID'].'" disabled > Masa '.$masa['tableID'].' </button>
                    </div>');
                }else{
                    echo ('<div class="col">
                    <a class="btn btn-success" name="'.$masa['tableID'].'" href="../Proiect/Features/rezervare.php?numarMasa='.$masa['tableID'].'&data_introdusa='.$data .'&ora_introdusa='.$ora.'&nr_de_persoane='.$persoane.'" > Masa '.$masa['tableID'].'  </a>
                    </div>');
        }   }
        mysqli_close($db);
    }
    


}   
?>