<?php
session_start();
include 'C:\xampp\htdocs\Proiect\Utils\db_connect.php';
include 'Components/errorMessage.php';
$db1 = new DataBase();
$db = $db1->connnectDataBase();

    if (isset($_POST['logare'])) {
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $pass = md5($password);
        $query = "SELECT * FROM users WHERE email='$email' AND pass='$pass'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $rezultat = mysqli_fetch_assoc($results);
            $lastName = $rezultat['LastName'];
            $firstName = $rezultat['FirstName'];
            $date = $lastName." ".$firstName;
            $user_ID = $rezultat['userID'];
            $_SESSION['date_logare'] = $date;
            $_SESSION['id_user'] = $user_ID;
            header('location: index.php');
        }else {
            $error = "Datele introduse nu sunt corecte sau nu sunteti inregistrat!";
            $_POST['logare'] = null;
            showErrorMessage($error, "Logare ERROR");
        }
        }
        mysqli_close($db);
?>