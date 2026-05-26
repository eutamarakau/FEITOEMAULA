<?php 

    $hostBD ="localhost"; 
    $userBD ="root";
    $senhaBD = "root";
    $database = "eshoptbkau";

    $conn = mysqli_connect($hostBD, $userBD, $senhaBD, $database);

    if(!$conn){
        echo "<p> ERRO $database </p>";
    }
   
?>