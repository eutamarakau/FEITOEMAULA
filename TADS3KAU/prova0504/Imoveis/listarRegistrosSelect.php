<?php include "header.php" ?>

<section class="py-5">

    <div class="d-flex justify-content mt-3 mb-3">

        <div class="row">
            <div class="col">

                <h3>Exibir Registros em um campo SELECT</h3>

                <div class='form-floating mt-3 mb-3'>

                    <select class='form-select' name='nomeImovel'>
                        <?php
                            include "conectarBD.php";
                            $listarImovels = "SELECT * FROM Imovels";
                            $res = mysqli_query($conn, $listarImovels) or die("Erro ao tentar carregarImoveis");
                            while($registro = mysqli_fetch_assoc($res)){
                                $idImovel   = $registro['idImovel'];
                                $nomeImovel = $registro['nomeImovel'];
                                echo "<option value='$idImovel'>$nomeImovel</option>";
                            }
                        ?>
                    </select>
                    <label for='nomeImovel'>Selecione um Usuário</label>
                </div>

            </div>
        </div>

    </div>

</section>

<?php include "footer.php" ?>