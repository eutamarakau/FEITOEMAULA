<?php 
    include "header.php";
?>
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">


<?php
    $idUsuario = $_SESSION['idUsuario'];
    include "conexaoBD.php";
    $listaAnuncio = "SELECT * FROM anuncios WHERE Usuarios_idUsuario = $idUsuario";
    $res = mysqli_query($conn, $listaAnuncio) or die("Erro ao tentar listar");
    
    while($registro = mysqli_fetch_assoc($res)){
                $idAnuncio     = $registro ['idAnuncio'];
                $Usuarios_idUsuario     = $registro ['Usuarios_idUsuario'];
                $fotoAnuncio   = $registro ['fotoAnuncio'];
                $tituloAnuncio   = $registro ['tituloAnuncio'];
                $categoriaAnuncio = $registro ['categoriaAnuncio'];
                $descricaoAnuncio = $registro ['descricaoAnuncio'];
                $valorAnuncio   = $registro ['valorAnuncio'];
                $dataAnuncio   = $registro ['dataAnuncio'];
                $horaAnuncio   = $registro ['horaAnuncio'];
                $statusAnuncio   = $registro ['statusAnuncio'];
   
        
        echo"
                    <div class='col mb-5'>
                        <div class='card h-100'>
                            <!-- Product image-->
                            <img class='card-img-top' src='$fotoAnuncio' alt='...' />
                            <!-- Product details-->
                            <div class='card-body p-4'>
                                <div class='text-center'>
                                    <!-- Product name-->
                                   <h5 class='fw-bolder'>$tituloAnuncio</h5>
                                    <!-- Product price-->
                                    $valorProduto
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                                <div class='text-center'><a class='btn btn-outline-dark mt-auto' href='visualizarProduto.php'>Visualizar Produto</a></div>
                            </div>
                        </div>
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