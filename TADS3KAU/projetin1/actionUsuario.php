<?php include "header.php" ?>

    <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $nomeUsuario = 
        $emailUsuario = 
        $senhaUsuario = 
        $confirmarsenhaUsuario = 
        $cidadeUsuario = 
        $dataUsuario = "";

        $erroPreenchimento = false;

        if(empty($_POST["nomeUsuario"])){
            echo" <div class='alert-warning text-center'>O campo <strong> NOME </strong> deve ser preenchido
            </div>";
            $erroPreenchimento = true;
        }
        else{
            $nomeUsuario = filtrar_entrada($_POST["nomeUsuario"]);

            // if(preg_match("/^[\]' ]*$/", $nomeUsuario) == 0) {
            //     echo "<div class='alert alert-danger' role='alert'>O nome deve conter apenas letras e espaços!</div>";
            //     $ok = false;
            // }
        }
        if(empty($_POST["dataUsuario"])){
            echo" <div class='alert-warning text-center'>O campo <strong> DATA DE NASCIMENTO </strong> deve ser preenchido
            </div>";
            $erroPreenchimento = true;
    }
        else{
                $dataUsuario = filtrar_entrada($_POST["dataUsuario"]);

                if(strlen($dataUsuario) == 10){
                   $diaUsuario = substr($dataUsuario, 8, 2);
                   $mesUsuario = substr($dataUsuario, 5, 2);
                   $anoUsuario = substr($dataUsuario, 0, 4);

                   if(!checkdate($mesUsuario, $diaUsuario, $anoUsuario)){
                        echo" <div class='alert-warning text-center'><strong> DATA INVALIDA
                        </strong></div>";
           
                        $erroPreenchimento = true;
                   }
                }
                else{
                    echo" <div class='alert-warning text-center'><strong> DATA INVALIDA
                        </strong></div>";
                    $erroPreenchimento = true;
                }
            }
        if(empty($_POST["emailUsuario"])){
            echo" <div class='alert-warning text-center'>O campo <strong> EMAIL </strong> deve ser preenchido
            </div>";
            $erroPreenchimento = true;
        }
        else{
            $emailUsuario = filtrar_entrada($_POST["emailUsuario"]);
        }
        if(empty($_POST["cidadeUsuario"])){
            echo" <div class='alert-warning text-center'>O campo <strong> Cidade </strong> deve ser preenchido
            </div>";
            $erroPreenchimento = true;
        }
        else{
            $cidadeUsuario = filtrar_entrada($_POST["cidadeUsuario"]);
        }
        if(empty($_POST["senhaUsuario"])){
            echo" <div class='alert-warning text-center'>O campo <strong> SENHA </strong> deve ser preenchido
            </div>";
            $erroPreenchimento = true;
        }
        else{
            $senhaUsuario = md5(filtrar_entrada($_POST["senhaUsuario"]));
        }
        if(empty($_POST["confirmarsenhaUsuario"])){
            echo" <div class='alert-warning text-center'>O campo <strong> CONFIRMAR SENHA </strong> deve ser preenchido
            </div>";
            $erroPreenchimento = true;
        }
        else{
            $confirmarsenhaUsuario = md5(filtrar_entrada($_POST["confirmarsenhaUsuario"]));

            if($confirmarsenhaUsuario != $senhaUsuario){
                echo" <div class='alert-warning text-center'>As senhas não coincidem
            </div>";
            $erroPreenchimento = true;
            }
        }

        //foto usuario
        $diretorio = "assets/img/";
        $fotoUsuario = $diretorio . basename($_FILES['fotoUsuario']['name']);
        $tipoDaImagem = strtolower(pathinfo($fotoUsuario, PATHINFO_EXTENSION));
        $erroUpload = false; 

        // echo "<div class='container-fluid'>";
        // echo"$diretorio";
        // echo"$fotoUsuario";
        // echo"$tipoDaImagem";
        // echo "</div>";

        if($_FILES["fotoUsuario"] ["size"] !=0){
            if($_FILES["fotoUsuario"]["size"] > 500000)
                echo "<div class='alert alert-warning text-center'>A foto deve ter ate 5mb</div>";
                $erroUpload = true;

            if($tipoDaImagem != "jpg" && $tipoDaImagem != "jpeg" && $tipoDaImagem!= "png" && $tipoDaImagem != "webp"){
                $erroUpload = true;
            }

            if(!move_uploaded_file($_FILES["fotoUsuario"]["tmp_name"], $fotoUsuario)){
                echo "<div class='alert alert-warning text-center'>Erro ao tentar mover a foto para o diretotio</div>";
                $erroUpload = true;
            }
        }
        else{
            echo "<div class='alert alert-warning text-center'>O CAMPO FOTO É OBRIGATORIO</div>";
            $erroUpload = true;
        }
        
        // SE NN TIVER ERRO
        if(!$erroPreenchimento && $erroUpload){

            //QUERY
            $inserirUsuario = "INSERT INTO Usuarios (fotoUsuario, nomeUsuario, dataUsuario, cidadeUsuario, emailUsuario, senhaUsuario, nivelUsuario)
                                VALUES ('$fotoUsuario', '$nomeUsuario', '$dataUsuario', '$cidadeUsuario', '$emailUsuario', '$senhaUsuario', 'usuario')";

            include "conexaoBD.php";

            //se conseguir
            if(mysqli_query($conn, $inserirUsuario)){
                echo "<div class='container mt-4'>";
                    echo "<div class='alert alert-success text-center'>Usuario cadastrado com sucesso</div>";

                    echo "<div class='mt-3 container'>
                            <div class='container mt-3 mb-3 text-center'>
                                <img src = '$fotoUsuario' alt = 'fotoUsuario' style = 'width:150px; heigth: auto;'>
                            </div>
                            <table class='table table-striped'>
                                <tr>
                                    <th>NOME</th>
                                    <td>$nomeUsuario</td>
                                </tr>
                                <tr>
                                    <th>DATA DE NASCIMENTO</th>
                                    <td>$diaUsuario/$mesUsuario/$anoUsuario</td>
                                </tr>
                                <tr>
                                    <th>CIDADE</th>
                                    <td>$cidadeUsuario</td>
                                </tr>
                                <tr>
                                    <th>EMAIL</th>
                                    <td>$emailUsuario</td>
                                </tr>
                                <tr>
                                    <th>SENHA</th>
                                    <td>$senhaUsuario</td>
                                </tr>
                                <tr>
                                    <th>CONFIRMAR SENHA</th>
                                    <td>$confirmarsenhaUsuario</td>
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
        header("location:formUsuario.php");
    }

        function filtrar_entrada($dado){
            $dado = trim($dado);
            $dado = stripcslashes($dado);
            $dado = htmlspecialchars($dado);
            return $dado;

        }


    ?>
















<?php include "footer.php" ?>