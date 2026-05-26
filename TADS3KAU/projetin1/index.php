<?php 
    include "header.php";
    include "conexaoBD.php";

    $filtroAnuncio = $_GET['statusAnuncio'] ?? 'todos';

    if($filtroAnuncio == 'todos'){
        $listaAnuncio = "SELECT * FROM anuncios";
    }
    else{
        $listaAnuncio = "SELECT * FROM anuncios WHERE statusAnuncio = '$filtroAnuncio'";
        }
    $res = mysqli_query($conn, $listaAnuncio) or die("Erro ao tentar listar");
?>
<style>
            .card-link{
                text-decoration: none;
                color: inherit;
            }

            .card-hover{
                position: relative;
                transition: trasform 0.2s ease, box-shadow 0.2s esse;
                cursor: pointer;
            }

            .card-hover:hover{
                transform: translateY(-5px);
                box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            }

            .card-overlay{
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0,0,0,0.6);
                color: white;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: bold;
                font-size: 1.2rem;
                opacity: 0;
                transition: opacity 0.3 ease;
            }

            .card-hover:hover .card-overlay{
                opacity: 1;
            }

            .card-hover:hover .card-overlay {
                opacity: 1;
            }

            .faixa-finalizado {
                position: absolute;
                width: 50%;
                background-color: red;
                color: while;
                text-align: center;
                font-weight: bold;
                font-size: 0.7rem;
                padding: 5px 0;
                z-index: 10;
                box-shadow: 0 2px 5px rgba(0,0,0,0.3);
            }

            .imagem-finalizada{
                filter: grayscale(100%);
                opacity: 75%;
            }

</style>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <form method="get" class"mb-5" action="index.php">
                    <div class="row justify-content-center">
                        <div class="col-4">
                            <select name="statusAnuncio" class="form-select">
                                <option value="todos" <?php if($filtroAnuncio == 'todos') {echo "selected";} ?>>Exibir todos os anúncios</option>
                                <option value="disponivel" <?php if($filtroAnuncio == 'disponivel') {echo "selected";} ?> >Exibir apenas anúncios disponíveis</option>
                                <option value="finalizado" <?php if($filtroAnuncio == 'finalizado') {echo "selected";} ?>>Exibir apenas anúncios finalizados</option>
                            
                            </select>

                            <button type="submit" class="btn btn-outline-dark" style="float:right"><i class="bi bi-funnel"></i>filtrar Anúncios</button>
                        </div>
                    </div>
                </form>
                <br>

                <?php  
                    $totalAnuncios = mysqli_num_rows($res);
                    echo "<div class='alert alert-info text-center'> Há $totalAnuncios anúncios em nosso sistema! </div>";
                ?>

                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            
        
        
<?php
    while($registro = mysqli_fetch_assoc($res)){
                $idAnuncio     = $registro ['idAnuncio'];
                $Usuarios_idUsuario     = $registro ['Usuarios_idUsuario'];
                $fotoAnuncio   = $registro ['fotoAnuncio'];
                $tituloAnuncio   = $registro ['tituloAnuncio'];
                $categoriaAnuncio = $registro ['categoriaAnuncio'];
                $descricaoAnuncio = $registro ['descricaoAnuncio'];
                $valorAnuncio   = $registro ['valorAnuncio'];
                number_format($valorAnuncio, 2, ',', '.');
                $dataAnuncio   = $registro ['dataAnuncio'];
                $horaAnuncio   = $registro ['horaAnuncio'];
                $statusAnuncio   = $registro ['statusAnuncio'];
   
        
        echo"

                    <div class='col mb-5'>
                        <a class='card-link' href='visualizarProduto.php?idAnuncio=$idAnuncio'>
                            <div class='card h-100 card-hover'>";

                            if($registro['statusAnuncio'] == 'finalizado'){
                                echo"<div class='faixa-finalizado'> Anúncio Finalizado
                                </div>";

                            }

                            echo"

                                <div class='card-overlay'>
                                    <i class='bi bi-eye me-2'></i> Visualizar Anuncio
                                </div>

                                <img class='card-img-top "; if($registro['statusAnuncio'] == 'finalizado'){echo"imagem-finalizada";} echo"'
                                    src='$fotoAnuncio'
                                    alt='$tituloAnuncio' />

                                <div class='card-body p-4'>
                                    <div class='text-center'>

                                        <h5 class='fw-bolder'>
                                        $tituloAnuncio
                                        </h5>

                                        <p> R$ $valorAnuncio</p>
                                    </div>
                                </div>

                            </div>
                        </a>
                       
                    </div>
            ";
    }

 ?>
                </div>
            </div>
        </section>
<?php 
    include "footer.php";
?>        