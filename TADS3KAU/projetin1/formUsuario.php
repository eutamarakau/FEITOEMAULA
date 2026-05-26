<?php include "header.php" ?>

    <section class="py-5">
        <div class="d-flex justify-content-center mb-3">
                <div class="row">
                    <div class="col">
                        <h2>Cadastro de Usuario</h2>

                        <form action="actionUsuario.php" method="POST" class="was-validated" enctype="multipart/form-data">
                            <div class="form-floating mt-3 mb-3">
                                <input type="file" class="form-control" id="fotoUsuario" placeholder="foto" name="fotoUsuario" required>
                                <label for="fotoUsuario">foto</label>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-floating mt-3 mb-3">
                                <input type="text" class="form-control" id="nomeUsuario" placeholder="nome" name="nomeUsuario" required>
                                <label for="nomeUsuario">Nome Completo</label>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-floating mt-3 mb-3">
                                <input type="date" class="form-control" id="dataUsuario" placeholder="dataUsuario" name="dataUsuario" required>
                                <label for="dataUsuario">Dia que nasceu</label>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-floating mt-3 mb-3">
                                <select class="form-select" id="cidadeUsuario" name="cidadeUsuario" placeholder="Cidade">
                                    <option value="curiuva" selected>curiuva</option>
                                    <option value="imbau">imbau</option>
                                    <option value="reserva">reserva</option>
                                    <option value="telemaco">telemaco</option>
                                    <option value="tibagi">tibagi</option>
                                </select>
                                <label for="cidadeUsuario">Cidade</label>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-floating mt-3 mb-3">
                                <input type="email" class="form-control" id="emailUsuario" placeholder="Email" name="emailUsuario" required>
                                <label for="emailUsuario">Email</label>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-floating mt-3 mb-3">
                                <input type="password" class="form-control" id="senhaUsuario" placeholder="Senha" name="senhaUsuario" maxlength="8" minlength="6" required>
                                <label for="senhaUsuario">Senha</label>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-floating mt-3 mb-3">
                                <input type="password" class="form-control" id="confirmarsenhaUsuario" placeholder="Senha" name="confirmarsenhaUsuario" maxlength="8" minlength="6" required>
                                <label for="confirmarsenhaUsuario">Confirmar Senha</label>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback"></div>
                            </div>
                            <button type="submit" class="btn btn-success" >Cadastrarse </button>
                        </form>

                       
                    </div>
                </div>
        </div>

    </section>



























<?php include "footer.php" ?>
