<!-- Inclui o header.php -->
<?php include "header.php" ?>

    <?php
    
        //Verifica o método de requisição do servidor
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            //Define o bloco de variáveis para armazenar as informações recebidas do formulário
            $categoriaImovel = $cidadeImovel = $fotoImovel = $valorImovel = "";

            //Variável booleana para controle de erros de preenchimento
            $erroPreenchimento = false;

            //Categoria do imovel
            if(empty($_POST["categoriaImovel"])){
                echo "<div class='alert alert-warning text-center'>O campo <strong>CATEGORIA</strong> é obrigatório!</div>";
                $erroPreenchimento = true;
            }
            else{
                //Filtra e Armazena o valor na variável
                $categoriaImovel = filtrar_entrada($_POST["categoriaImovel"]);
            }

            //Cidade do Imovel
            if(empty($_POST["cidadeImovel"])){
                echo "<div class='alert alert-warning text-center'>O campo <strong>CIDADE</strong> é obrigatório!</div>";
                $erroPreenchimento = true;
            }
            else{
                //Filtra e Armazena o valor na variável
                $cidadeImovel = filtrar_entrada($_POST["cidadeImovel"]);
            }

            //Valor Imovel
            if(empty($_POST["valorImovel"])){
                echo "<div class='alert alert-warning text-center'>O campo <strong>VALOR DO Imovel</strong> é obrigatório!</div>";
                $erroPreenchimento = true;
            }
            else{
                //Filtra e Armazena o valor na variável
                $valorImovel = filtrar_entrada($_POST["valorImovel"]);
            }

            //Foto do Imovel
            $diretorio    = "img/"; //Define para qual diretório as imagens serão movidas
            $fotoImovel  = $diretorio . basename($_FILES['fotoImovel']['name']); //Montar o nome a ser salvo no BD
            $tipoDaImagem = strtolower(pathinfo($fotoImovel, PATHINFO_EXTENSION)); //Pega o tipo do arquivo em letras minúsculas
            $erroUpload   = false; //Variável para controle de erros do upload da foto

            //Verifica se o tamanho do arquivo é diferente de ZERO
            if($_FILES["fotoImovel"]["size"] != 0){

                //Verifica se o tamanho do arquivo é maior do que 5 MegaBytes(MB) - Medida em bytes
                if($_FILES["fotoImovel"]["size"] > 5000000){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>FOTO</strong> deve ter tamanho máximo de 5MB!</div>";
                    $erroUpload = true;
                }

                //Verifica se a foto está nos formatos JPG, JPEG, PNG ou WEBP
                if($tipoDaImagem != "jpg" && $tipoDaImagem != "jpeg" && $tipoDaImagem != "png" && $tipoDaImagem != "webp"){
                    echo "<div class='alert alert-warning text-center'>A <strong>FOTO</strong> deve estar no formatos JPG, JPEG, PNG ou WEBP!</div>";
                    $erroUpload = true;
                }

                //Verifica se a imagem foi movida para o diretório (assets/img), utilizando a função move_uploaded_file()
                if(!move_uploaded_file($_FILES["fotoImovel"]["tmp_name"], $fotoImovel)){
                    echo "<div class='alert alert-warning text-center'>Erro ao tentar mover a <strong>FOTO</strong> para o diretório $diretorio!</div>";
                    $erroUpload = true;
                }

            }
            else{
                echo "<div class='alert alert-warning text-center'>O campo <strong>FOTO</strong> é obrigatório!</div>";
                $erroUpload = true;
            }

            //Se NÃO houver erro de preenchimento e NÃO houver erro no upload da foto
            if(!$erroPreenchimento && !$erroUpload){

                //Criar uma variável para armazenar a QUERY que realiza a inserção de dados do Usuário na tabela Imovels
                $inserirImovel = "INSERT INTO imoveis (fotoImovel, categoriaImovel,  cidadeImovel, valorImovel)
                                    VALUES ('$fotoImovel', '$categoriaImovel', '$cidadeImovel', '$valorImovel')";

                //Inclui o arquivo de conexão com o Banco de Dados
                include "conectarBD.php";

//////////////////////////////////////////////////////////////////////////////
                //Se conseguir executar a QUERY para inserção, exibe alerta de sucesso e a tabela com os dados informados
                //A funçao mysqli_query executa operações no Banco de Dados
                if(mysqli_query($conn, $inserirImovel)){

                    echo "<div class='container'>";
                        echo "<div class='alert alert-success text-center'><strong>IMOVEIS</strong> cadastrado com sucesso!</div>";
                        echo "
                            <div class='container mt-3'>
                                <div class='container mt-3 mb-3 text-center'>
                                    <img src='$fotoImovel' style='width:150px' title='Foto do Imovel' class='img-thumbnail'>
                                </div>
                                <table class='table'>
                                
                                    <tr>
                                        <th>CIDADE</th>
                                        <td>$cidadeImovel</td>
                                    </tr>
                                    <tr>
                                        <th>CATEGORIA</th>
                                        <td>$categoriaImovel</td>
                                    </tr>
                                    <tr>
                                        <th>VALOR</th>
                                        <td>$valorImovel</td>
                                    </tr>
                                </table>
                            </div>
                        ";
                    echo "</div>";
                }
                else{
                    echo "<div class='alert alert-danger text-center'>
                    Erro ao tentar inserir dados do<strong>IMOVEL</strong> no banco de dados $database!</div>";
                }
            }

        }
        else{
            //Usa a função "header()" para redirecionar o usuário para o formImovel.php
            header("location:formImovel.php");
        }

        //Função para filtrar entrada de dados
        function filtrar_entrada($dado){
            $dado = trim($dado); //Remove espaços desnecessários
            $dado = stripslashes($dado); //Remove barras invertidas
            $dado = htmlspecialchars($dado); //Converte caracteres especiais em entidades HTML

            //Retorna o dado após filtrado
            return($dado);
        }
    
    ?>

<!-- Inclui o footer.php -->
<?php include "footer.php" ?>