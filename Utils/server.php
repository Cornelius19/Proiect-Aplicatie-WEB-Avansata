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
            if (mysqli_num_rows($results) == 1) {
                $_SESSION['date_logare'] = $date;
                header('location: index.php');
            }else {
                $error = "Parola nu coincide!!!";
                $_POST['logare'] = null;
                showErrorMessage($error, "Eroare la inregistrare!");
            }
        }

        
    }
    if(isset($_POST['close_session'])){
        session_destroy();
        header('location: logare.php');
    }
    
    
    
?>