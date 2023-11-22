<?php
session_start();
   include 'db_connect.php';
   include 'Components/errorMessage.php';
    $db1 = new DataBase();
    $db = $db1->connnectDataBase();
    $errors = array();


    //logarea 
    if (isset($_POST['logare'])) {
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
      
        if (empty($email)) {
            array_push($errors, "Username is required");
            showErrorMessage($errors);
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }
      
        if (count($errors) == 0) {
            echo("Nu avem nici o eroare :)");
            $query = "SELECT * FROM users WHERE email='$email' AND pass='$password'";
            $results = mysqli_query($db, $query);
            if (mysqli_num_rows($results) == 1) {
              $_SESSION['email'] = $email;
              $_SESSION['success'] = "You are now logged in";
              header('location: index.php');
            }else {
                $error = "You entered wrong credidentials";
                showErrorMessage($error);
            }
        }
        
    }



?>