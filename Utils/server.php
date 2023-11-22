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
                if($user['email'] === $email){
                    echo "email inregistrat";
                }
            }
        if($password === $repassword ){
                $password = md5($repassword);
                $query = "INSERT INTO users (LastName,FirstName, email, pass)
                        VALUES('$lastName','$firstName','$email','$password')";
                mysqli_query($db,$query);
                $_SESSION['username'] = $firstName;
                $_SESSION['succes'] = "You are logged in";
                header('location: index.php');
            }
        else{
                $error1 = "Uh-oh! 🙈 Looks like you entered the wrong credentials. Double-check your username and password and try again. ✨";
                showErrorMessage($error1, "Wrong credidentials");
                $_POST['reg_user'] = null; 
            }
    }

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
                $error = "Uh-oh! 🙈 Looks like you entered the wrong credentials. Double-check your username and password and try again. ✨";
      showErrorMessage($error, "Wrong credidentials");
      $_POST['logare'] = null;
            }
        }
        
    }



?>