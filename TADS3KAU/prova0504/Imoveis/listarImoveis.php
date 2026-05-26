<?php include "header.php" ?>

<section class="py-5">

    <div class="d-flex justify-content mt-3 mb-3">

        <div class="row">
            <div class="col">

                <?php
                    echo "<h3 class='text-center'>Listar Registros em uma TABELA:</h3>";

                    //Query para listar TODOS os registros da tabela Imovel
                    $listarImovel = "SELECT * FROM imoveis";

                    include "conectarBD.php";
                    //A função mysqli_query() é responsável pela execução de comandos SQL no Banco de Dados
                    $res = mysqli_query($conn, $listarImovel) or die("Erro ao tentar listar Imovel!");
                    $totalImovel = mysqli_num_rows($res); //Usa a função mysqli_num_rows() para buscar o total de registros retornados pela QUERY

                    echo "<div class='alert alert-info text-center'>Há <strong>$totalImovel</strong> imoveis cadastrados no sistema!</div>";

                    //Parte 1 - Montar o cabeçalho da tabela para exibir os registros
                    echo "
                        <table class='table'>
                            <thead class='table-dark'>
                                <tr>
                                    <th>ID</th>
                                    <th>FOTO</th>
                                    <th>CATEGORIA</th>
                                    <th>CIDADE</th>
                                    <th>VALOR</th>
                                </tr>
                            </thead>
                            <tbody>
                    ";

                    //Parte 2 - Enquanto houver registros, executa a função abaixo para armazenar em variáveis PHP
                    while($registro = mysqli_fetch_assoc($res)){
                        $idImovel             = $registro['idImovel'];
                        $fotoImovel           = $registro['fotoImovel'];
                        $categoriaImovel           = $registro['categoriaImovel'];
                        $cidadeImovel         = $registro['cidadeImovel'];
                        $valorImovel          = $registro['valorImovel'];

                        //Parte 3 - Exibir os valores armazenados nas variáveis
                        echo "
                            <tr>
                                <td>$idImovel</td>
                                <td><img src='$fotoImovel' title='Foto do Imovel' style='width:100px'></td>
                                <td>$categoriaImovel</td>
                                <td>$cidadeImovel</td>
                                <td>$valorImovel</td>
                            </tr>
                        ";
                    }
                    //Parte 4 - Encerrar a tabela e a conexão com o BD.
                    echo "</tbody>";
                    echo "</table>";
                    mysqli_close($conn);
                ?>

            </div>
        </div>

    </div>

</section>

<?php include "footer.php" ?>