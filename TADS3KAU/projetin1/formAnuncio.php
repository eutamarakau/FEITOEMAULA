<?php include "header.php" ?>

    <section class="py-5">
        <div class="d-flex justify-content-center mb-3">
                <div class="row">
                    <div class="col">
                        <h2>Cadastro de Produto</h2>

                        <form action="actionAnuncio.php" method="POST" class="was-validated" enctype="multipart/form-data">
                            <div class="form-floating mt-3 mb-3">
                                <input type="file" class="form-control" id="fotoAnuncio" placeholder="foto" name="fotoAnuncio" required>
                                <label for="fotoAnuncio">foto do Anuncio</label>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-floating mt-3 mb-3">
                                <input type="text" class="form-control" id="nomeAnuncio" placeholder="nome" name="nomeAnuncio" required>
                                <label for="nomeAnuncio">Titulo do Anuncio</label>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-floating mt-3 mb-3">
                                <select class="form-select" id="categoriaAnuncio" name="categoriaAnuncio" placeholder="Categoria">
                                    <option value="" disabled selected>...</option>
                                    <option value="HOBBIES">HOBBIES</option>
                                    <option value="MAKES">MAKES</option>
                                    <option value="ROUPAS">ROUPAS</option>
                                    <option value="COMIDAS">COMIDAS</option>
                                    <option value="OUTROS">OUTROS</option>
                                </select>
                                <label for="categoriaAnuncio">Categorias de anuncios</label>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-floating mt-3 mb-3">
                                <input class="form-control" id="descricaoAnuncio" placeholder="descricao" name="descricaoAnuncio" required>
                                <label for="descricaoAnuncio">descricao do Anuncio</label>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-floating mt-3 mb-3">
                                <input type="text" class="form-control" id="valorAnuncio" placeholder="valor" name="valorAnuncio" required>
                                <label for="valorAnuncio">valor</label>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback"></div>
                            </div>
                        
                            <button type="submit" class="btn btn-success" >Anunciar</button>
                        </form>

                       
                    </div>
                </div>
        </div>

    </section>



























<?php include "footer.php" ?>
