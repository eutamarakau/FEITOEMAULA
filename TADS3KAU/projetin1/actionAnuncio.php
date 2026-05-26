<?php include "header.php" ?>

    <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $nomeAnuncio = 
        $descricaoAnuncio = 
        $valorAnuncio = 
        $dataAnuncio = "";

        $erroPreenchimento = false;

        $dataAnuncio = date("Y-m-d");
        $horaAnuncio = date("H:i:s");

        if(empty($_POST["nomeAnuncio"])){
            echo" <div class='alert-warning text-center'>O campo <strong> NOME </strong> deve ser preenchido
            </div>";
            $erroPreenchimento = true;
        }
        else{
            $nomeAnuncio = filtrar_entrada($_POST["nomeAnuncio"]);

        }
        
        if(empty($_POST["descricaoAnuncio"])){
            echo" <div class='alert-warning text-center'>O campo <strong> descricao </strong> deve ser preenchido
            </div>";
            $erroPreenchimento = true;
        }
        else{
            $descricaoAnuncio = filtrar_entrada($_POST["descricaoAnuncio"]);
        }
        if(empty($_POST["categoriaAnuncio"])){
            echo" <div class='alert-warning text-center'>O campo <strong> categoria </strong> deve ser preenchido
            </div>";
            $erroPreenchimento = true;
        }
        else{
            $categoriaAnuncio = filtrar_entrada($_POST["categoriaAnuncio"]);
        }
        if(empty($_POST["valorAnuncio"])){
            echo" <div class='alert-warning text-center'>O campo <strong> valor </strong> deve ser preenchido
            </div>";
            $erroPreenchimento = true;
        }
        else{
            $valorAnuncio = (filtrar_entrada($_POST["valorAnuncio"]));
        }
        

        //foto Anuncio
        $diretorio = "assets/img/";
        $fotoAnuncio = $diretorio . basename($_FILES['fotoAnuncio']['name']);
        $tipoDaImagem = strtolower(pathinfo($fotoAnuncio, PATHINFO_EXTENSION));
        $erroUpload = false; 

        // echo "<div class='container-fluid'>";
        // echo"$diretorio";
        // echo"$fotoAnuncio";
        // echo"$tipoDaImagem";
        // echo "</div>";

        if($_FILES["fotoAnuncio"] ["size"] !=0){
            if($_FILES["fotoAnuncio"]["size"] > 500000)
                echo "<div class='alert alert-warning text-center'>A foto deve ter ate 5mb</div>";
                $erroUpload = true;

            if($tipoDaImagem != "jpg" && $tipoDaImagem != "jpeg" && $tipoDaImagem!= "png" && $tipoDaImagem != "webp"){
                $erroUpload = true;
            }

            if(!move_uploaded_file($_FILES["fotoAnuncio"]["tmp_name"], $fotoAnuncio)){
                echo "<div class='alert alert-warning text-center'>Erro ao tentar mover a foto para o diretotio</div>";
                $erroUpload = true;
            }
        }
        else{
            echo "<div class='alert alert-warning text-center'>O CAMPO FOTO É OBRIGATORIO</div>";
            $erroUpload = true;
        }

        $idUsuario = $_SESSION['idUsuario'];
        
        // SE NN TIVER ERRO
        if(!$erroPreenchimento && $erroUpload){
            //QUERY
            $inserirAnuncio = "INSERT INTO anuncios (Usuarios_idUsuario, fotoAnuncio, tituloAnuncio, categoriaAnuncio, descricaoAnuncio, valorAnuncio, dataAnuncio, horaAnuncio, statusAnuncio)
                                VALUES ('$idUsuario', '$fotoAnuncio', '$nomeAnuncio', '$categoriaAnuncio', '$descricaoAnuncio', '$valorAnuncio', '$dataAnuncio', '$horaAnuncio', 'disponivel')";

            include "conexaoBD.php";

            //se conseguir
            if(mysqli_query($conn, $inserirAnuncio)){
                echo "<div class='container mt-4'>";
                        echo "<div class='alert alert-success text-center'>Anuncio cadastrado com sucesso</div>";

                        echo "<div class='mt-3 container'>
                                <div class='container mt-3 mb-3 text-center'>
                                    <img src = '$fotoAnuncio' alt = 'fotoAnuncio' style = 'width:150px; heigth: auto;'>
                                </div>
                                <table class='table table-striped'>
                                    <tr>
                                        <th>NOME</th>
                                        <td>$nomeAnuncio</td>
                                    </tr>
                                    <tr>
                                        <th>categoria</th>
                                        <td>$categoriaAnuncio</td>
                                    </tr>
                                    <tr>
                                        <th>descricao</th>
                                        <td>$descricaoAnuncio</td>
                                    </tr>
                                    <tr>
                                        <th>valor</th>
                                        <td>$valorAnuncio</td>
                                    </tr>
                                    <tr>
                                        <th>data</th>
                                        <td>$dataAnuncio</td>
                                    </tr>
                                    <tr>
                                        <th>Hora</th>
                                        <td>$horaAnuncio</td>
                                    </tr>                             
                                </table>
                            </div>";
                        echo"</div>";
            }
            else {
                echo "<div class='alert alert-warning text-center'>ERRO</div>";
            }
    
        }
    }
    else{
        header("location:formAnuncio.php");
    }

        function filtrar_entrada($dado){
            $dado = trim($dado);
            $dado = stripcslashes($dado);
            $dado = htmlspecialchars($dado);
            return $dado;

        }


    ?>
















<?php include "footer.php" ?>