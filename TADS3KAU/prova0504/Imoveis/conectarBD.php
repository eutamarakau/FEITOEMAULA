<?php

    $hostBD   = "localhost"; 
    $userBD   = "root"; 
    $senhaBD  = "root"; 
    $database = "prova";

    $conn     = mysqli_connect($hostBD, $userBD, $senhaBD, $database);

    if(!$conn){
        echo "<p>Erro ao tentar conectar a aplicação à base de dados <strong>$database</strong></p>";
    }

?>