<?php
    session_start();
    include 'C:\xampp\htdocs\Proiect\Utils\db_connect.php';
    include 'Components/errorMessage.php';
    $db1 = new DataBase();
    $db = $db1->connnectDataBase();

    $userID = $_SESSION['id_user'];
    $querySTMT = "SELECT bookingID, bookingDate, tableID, durata, nr_persoane FROM bookings WHERE userID = $userID";
    $query = mysqli_query($db,$querySTMT);
    if(mysqli_num_rows($query)){
        echo '<table class="table table-dark table-striped"><thead><tr align="center"><th scope="col">Data rezervarii</th><th scope="col">Numarul Mesei</th>
        <th scope="col">Durata</th><th scope="col">Nr de persoane</th><th scope="col">Cancel</th></tr></thead>';
        // while($result=mysqli_fetch_assoc($query)){
        //     echo '<tr>';
        //     foreach($result as $booking){
        //         echo '<td align="center">'.$booking.'</td>';
        //     }
        //     //for ($i=0;$i<count($result);$i++) echo '<td align="center">'.$result[$i].'</td>';
        //     echo '<td align="center"> <form method="post" action="rezervariHTML.php"><button name="'.$result['bookingID'].'" type="submit" class="btn btn-warning" >Cancel</button></form>';
        //     echo '</tr>';
        while ($result = mysqli_fetch_assoc($query)) {
            $bookID = $result['bookingID'];
            // echo '<tr>';
            // echo '<td class="text-center align-middle">' . $result['bookingDate'] . '</td>';
            // echo '<td class="text-center align-middle">' . $result['tableID'] . '</td>';
            // echo '<td class="text-center align-middle">' . $result['durata'] . '</td>';
            // echo '<td class="text-center align-middle">' . $result['nr_persoane'] . '</td>';
            // echo '<td class="text-center align-middle"> <form method="post" action="rezervariHTML.php">';
            // echo '<button name="'.$bookID.'"  type="submit" class="btn btn-warning" >Cancel</button>';
            // echo '</form></td>';
            // echo '</tr>';
            echo '<tr>
            <td class="text-center align-middle"> '.$result['bookingDate'].' </td>
            <td class="text-center align-middle"> '.$result['tableID'].' </td>
            <td class="text-center align-middle"> '.$result['durata'].' </td>
            <td class="text-center align-middle"> '.$result['nr_persoane'].' </td>
            <td class="text-center align-middle"> <form method="post" action="rezervariHTML.php">
            <button name="'.$bookID.'"  type="submit" class="btn btn-warning" >Cancel</button>
            </form></td>;
            </tr>';
            if(isset($_POST[$bookID])){
                $querySTMT = "DELETE FROM bookings WHERE bookingID = $bookID";
                $query = mysqli_query($db,$querySTMT);
                header('location: rezervariHTML.php');
            }
        }
    }
    



?>