<?php
    $hostname = "localhost";
    $database = "bd_covid_watcher"; //nome do banco
    $user = "root"; //usuário
    $password = ""; //senha

    $conn = new mysqli($hostname, $user, $password, $database);

    /*if ($conn->connect_errno) {
        echo "Erro";
    }else{
        echo "Conectado";
    }*/

?>