<?php
    $hostname = "localhost";
    $database = "bd_covid_watcher";
    $user = "root";
    $password = "";

    $conn = new mysqli($hostname, $user, $password, $database);

    /*if ($conn->connect_errno) {
        echo "Erro";
    }else{
        echo "Conectado";
    }*/

?>