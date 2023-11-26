<?php
session_start();
include 'C:\xampp\htdocs\Proiect\Utils\db_connect.php';
include 'Components/errorMessage.php';
$db1 = new DataBase();
$db = $db1->connnectDataBase();
$errors = array();
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
                header('location: logareHTML.php');
            }
            else{
                $error = "Parolele nu coincid!";
                $_POST['reg_user'] = null;
                showErrorMessage($error, "Error :D");
            }   
    }
    
}
mysqli_close($db);
?>