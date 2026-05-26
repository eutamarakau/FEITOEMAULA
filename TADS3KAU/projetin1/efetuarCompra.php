<?php include "header.php" ?>

<div class="conteiner mt-3 mb-3">
    <?php 
        if(isset($_SESSION['logado']) && $_SESSION['logado'] == true){
            if(isset($_GET['idAnuncio'])){
                $idUsuario = $_SESSION ['idUsuario'];
                $idAnuncio = $_GET ['idAnuncio'];

                include "conexaoBD.php";
                $buscarAnuncio = "SELECT * FROM Anuncios WHERE idAnuncio = $idAnuncio";
                $resultado = mysqli_query($conn, $buscarAnuncio);

                if(mysqli_num_rows($resultado)){
                    $anuncio = mysqli_fetch_assoc($resultado);

                    $fotoAnuncio = $anuncio['fotoAnuncio'];
                    $tituloAnuncio = $anuncio['tituloAnuncio'];
                    $valorAnuncio = $anuncio['valorAnuncio'];
                    
                    $dataCompra = date('Y-m-d');
                    $horaCompra = date('H:i:s');

                    $inserirCompra = "INSERT INTO Compras (Usuarios_idUsuario, Anuncios_idAnuncio, dataCompra, horaCompra, valorCompra)
                    VALUES ($idUsuario, $idAnuncio, '$dataCompra', '$horaCompra', '$valorAnuncio')";

                    $atualizarStatusAnuncio = "
                    UPDATE Anuncios
                    SET statusAnuncio = 'finalizado'
                    WHERE idAnuncio = $idAnuncio
                    ";


                    if(mysqli_query($conn, $inserirCompra)){
                        if(mysqli_query($conn, $atualizarStatusAnuncio)){
                            echo "
                                <div class='alert alert-success text-center'>
                                    Você comprou $tituloAnuncio!
                                </div>

                                <div calss'container mt-3 mb-5'>
                                    <div class='mt-3 text-center'>
                                        <img src='$fotoAnuncio' style='width:300px' title='Foto de $tituloAnuncio'/>
                                    </div>
                                </div>
                            ";
                        }
                        else{
                        echo "
                            <div class'alert alert-danger text-center'>
                                Erro ao atualizar status do anúncio!
                            </div>
                        ";
                    }
                    }
                    
                    else{
                        echo "
                            <div class'alert alert-danger text-center'>
                                Erro ao efetuar compra!
                            </div>
                        ";
                    }
                }
                else{
                        echo "
                            <div class'alert alert-danger text-center'>
                                Anúncio não econtrado!
                            </div>
                        ";
                    }
            }
            else{
                header("location:index.php");
            }
        }
        else{
            header("location:index.php");
        }
    ?>
</div>

<?php include "footer.php" ?>