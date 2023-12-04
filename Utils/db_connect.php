<?php
    class DataBase{
        public $serverName = "localhost";
        public $userName = "root";
        public $password = "";
        public $dbName = "proiect_php1";

        function connnectDataBase(){
            $con = mysqli_connect($this->serverName,$this->userName,$this->password,$this->dbName);
            if(mysqli_connect_errno()){
                exit();
                return "Failed to connect";
            }
            else{
                return $con;
            }
        }
    }

?>
