<?php 
    include "header.php";
?>

<section class="py-5">

    <div class="d-flex justify-content mt-3 mb-3">
        <div class="row">
            <div class="col">

        <?php 
            echo "<h3 class='text-center'>Listar os registros em uma tabela:</h3>";
            $listaUsuarios = "SELECT * FROM Usuarios";

            include "conexaoBD.php";
            $res = mysqli_query($conn, $listaUsuarios) or die("Erro ao tentar listar");
            $totalUsuarios = mysqli_num_rows($res); 

            echo
               " <div class='alert alert-info text-center'>Temos <strong>$totalUsuarios</strong> usuarios cadastrados no sistema</div>";

            //pt1
            echo"
                <table class='table'>
                    <thead class='table-dark'>
                        <tr>
                            <th>ID</th>
                            <th>FOTO</th>
                            <th>NOME</th>
                            <th>DATA DE NASCIMENTO</th>
                            <th>CIDADE</th>
                            <th>EMAIL</th>
                        </tr>
                    </thead>
                
                ";

            //pt2
            while($registro = mysqli_fetch_assoc($res)){
                $idUsuario     = $registro ['idUsuario'];
                $fotoUsuario   = $registro ['fotoUsuario'];
                $nomeUsuario   = $registro ['nomeUsuario'];
                $dataUsuario   = $registro ['dataUsuario'];
                $dia           = substr($dataUsuario, 8, 2);
                $mes           = substr($dataUsuario, 5, 2);
                $ano           = substr($dataUsuario, 0, 4);
                $cidadeUsuario = $registro ['cidadeUsuario'];
                $emailUsuario  = $registro ['emailUsuario'];

            //pt3    
                echo"
                    <tr>
                            <td>$idUsuario</td>
                            <td> <img src='$fotoUsuario' style = 'width:100px'></td>
                            <td>$nomeUsuario</td>
                            <td>$dia/$mes/$ano</td>
                            <td>$cidadeUsuario</td>
                            <td>$emailUsuario</td>
                     </tr> 
                     ";
            }
            //pt4
            echo "</tbody>";
            echo "</table>";
            mysqli_close($conn);




        ?>
            </div>
        </div>
    </div>
</section>








<?php 
    include "footer.php";
?>        
