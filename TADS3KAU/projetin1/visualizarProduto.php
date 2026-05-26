<?php 
    include "header.php";
    include "conexaoBD.php";

    if(isset($_GET['idAnuncio'])){
        $idAnuncio = $_GET['idAnuncio'];

        $buscarAnuncio = "SELECT anuncios. *, usuarios.nomeUsuario
                          FROM anuncios
                          INNER JOIN usuarios
                            ON anuncios.Usuarios_idUsuario = usuarios.idUsuario
                          WHERE anuncios.idAnuncio = $idAnuncio ";

        $resAnuncio = mysqli_query($conn, $buscarAnuncio); 
        if(mysqli_num_rows($resAnuncio) > 0){
            $anuncio = mysqli_fetch_assoc($resAnuncio);
            $categoriaAnuncio = $anuncio['categoriaAnuncio'];
        }
        else{
            echo "<div class='class alert-danger text-center'>NAO ENCONTRADO</div>";
            include "footer.php";
            exit();
        }
    }
    else{
        echo "<div class='class alert-danger text-center'>NAO ENCONTRADO</div>";
        include "footer.php";
        exit();
    }
?>

<style>
    .img-produto-principal {
        width: 100%;
        max-height: 660px;
        object-fit: contain;
    }

    .img-produto-relacionado{
        width: 100%;
        height: 180px;
        object-fit: contain;
        background-color: lightgray;
        padding: 10px;
    }

    .titulo-relacionado{
        min-height: 55px;
        overflow-wrap: break-word;
    }

    .card-relacionado{
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .card-relacionado:hover{
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

</style>
<section class="py-5">
    <div class="class container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-itens-center">
            <div class="col-md-6">
                <img src="<?= htmlspecialchars($anuncio['fotoAnuncio']) ?>" alt="<?= htmlspecialchars($anuncio['tituloAnuncio']) ?>" title="<?= htmlspecialchars($anuncio['tituloAnuncio']) ?>" class="img-produto-principal mb-5 mb-md-0">
            </div>
            <div class="col-md-6">
                <div class="small mb-1">
                    Categoria: <?php echo htmlspecialchars($anuncio['categoriaAnuncio']) ?>
                </div>
                <h1 class="display-5 fw-bolder">
                    <?php echo htmlspecialchars($anuncio['tituloAnuncio']); ?>
                </h1>
                <div class="fs-5 mb-5">
                    R$ <?php echo number_format($anuncio['valorAnuncio'],2 ,',', '.'); ?>
                </div>
                <p class="lead">
                    <?php echo htmlspecialchars($anuncio['descricaoAnuncio']) ?>
                </p>
                <p class="text-muted">
                    Anunciado por <strong><?= htmlspecialchars($anuncio['nomeUsuario']) ?></strong><br>
                    Publicado por <?= date('d/m/Y', strtotime($anuncio['dataAnuncio'])); ?>
                    Publicado por <?= date('H:i', strtotime($anuncio['horaAnuncio'])); ?>

                </p>

                <?php 
                if(isset($_SESSION['logado']) && $_SESSION['logado'] == true){
                    if($anuncio['statusAnuncio'] == 'disponivel') { 
                        if ($_SESSION['idUsuario'] == $anuncio['Usuarios_idUsuario']){
                            echo"
                            <a href='#formEditarAnuncio.php' class='btn btn-outline-dark btn-lg mt-3'>
                                <i class='bi bi-cart-fill-me-1'></i>
                                Editar Anuncio
                            </a>";
                        }
                        else{
                            echo"
                            <a href='efetuarCompra.php?idAnuncio=$idAnuncio' class='btn btn-outline-dark btn-lg mt-3'>
                                <i class='bi bi-cart-fill-me-1'></i>
                                Comprar
                            </a>";

                        }
                   }
                    else{
                        echo"
                            <button class='btn btn-secondary btn-lg mt-3'>
                                Anúncio Finalizado
                            </button>
                            ";
                    }
                }  
                else{
                    echo"
                        <a href='formLogin.php' class='btn btn-outline-dark btn-lg mt-3'>
                            <i class ='bi bi-person me-1'></i>Acesse o sistema para efetuar a compra
                        </a>
                    ";
                }?>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="f2-bolder mb-4">Produtos Relacionados</h2>
        <div class="row gx-4 gx-lg-4 row-cols-1 row-cols-md-5 row-cols-xl-4 justify-content-center">
            <?php 
                $listarRelacionados = "SELECT * FROM anuncios WHERE categoriaAnuncio = '$categoriaAnuncio' AND idAnuncio !='$idAnuncio' AND statusAnuncio = 'disponivel'";

                $resRelacionados = mysqli_query($conn, $listarRelacionados);

                if(mysqli_num_rows($resRelacionados) > 0){
                    while($relacionado = mysqli_fetch_assoc($resRelacionados)){
                        $idAnuncio = $relacionado['idAnuncio'];
                ?>

                <div class="col-md-5">
                    <a href="visualizarProduto.php?idAnuncio=<?=$idAnuncio?>" class="text-decoration-none text-dark">
                        <div class="card h-100 card-relacionado">
                            <img class="card-img-top img-produto-relacionado"
                            src="<?= htmlspecialchars($relacionado['fotoAnuncio']) ?>" alt="<?= htmlspecialchars($relacionado['tituloAnuncio']) ?>" title="<?= htmlspecialchars($relacionado['tituloAnuncio']) ?>">
                        
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder titulo-relacionado"> <?= htmlspecialchars($relacionado['tituloAnuncio']); ?></h5>
                                    <p class="text-muted-small"> <?= htmlspecialchars($relacionado['categoriaAnuncio']) ?></p>
                                    <p><?= number_format($relacionado['valorAnuncio'], 2, ',', '.') ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php   }
                } else{
                    echo"<p class='text-center'> Nenhum anuncio relacionado";
                } ?>
        </div>
    </div>
</section>
<?php include "footer.php" ?>