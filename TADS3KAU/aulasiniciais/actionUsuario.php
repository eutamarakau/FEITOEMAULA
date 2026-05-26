<?php

//vERIFICA O METODO DE REQUISISAO DO SERVIDOR
if($_SERVER["REQUEST_METHOD"] =="POST"){

    // //BLOCO PARA DECLARAR VARIAVEIS
    // $nomeUsuario = "";
    // $emailUsuario = "";
    // $senhaUsuario = "";
     //BLOCO PARA DECLARAR VARIAVEIS
    $nomeUsuario = $emailUsuario = $senhaUsuario = "";

    //variavel booleana para controle de erros de preenchimento
    $erroPreenchimento = false;

    if(empty($_POST["nomeUsuario"])){
        echo "<p style='color:red'>O CAMPO NOME É OBRIGATORIO! </P>";
        $erroPreenchimento = true;
    }
    else{
        //armazena o valor do indice da array post na variavel php
        $nomeUsuario =filtrar_entrada($_POST["nomeUsuario"]);

        //utiliza funcao preg
    if(!preg_match('/^[\p{l}]+%/u', $nomeUsuario)){
    echo "<p style= 'color:red'>O campo Nome dever conter apenas letras!<\p>";
    $erroPreenchimento = true;
    }
    }
    if(empty($_POST["emailUsuario"])){
        echo "<p style='color:red'>O CAMPO email É OBRIGATORIO! </P>";
        $erroPreenchimento = true;
    }
    else{
        //armazena o valor do indice da array post na variavel php
        $emailUsuario =filtrar_entrada($_POST["emailUsuario"]);
    }
    if(empty($_POST["senhaUsuario"])){
        echo "<p style='color:red'>O CAMPO senha É OBRIGATORIO! </P>";
        $erroPreenchimento = true;
    }
    else{
        //armazena o valor do indice da array post na variavel php
        $senhaUsuario =filtrar_entrada($_POST["senhaUsuario"]);
    }
  
    //se o campo estiver preenchido exibe a tabela com os dados
    if(!$erroPreenchimento){
        echo "
        <table border='1'>
            <tr>
                <th>Nome do usuario </th>
                <td>$nomeUsuario</td>
            </tr>
            <tr>
                <th>Nome do usuario </th>
                <td>$emailUsuario</td>
            </tr>
            <tr>
                <th>Nome do usuario </th>
                <td>$senhaUsuario</td>
            </tr>
        </table>
        ";
    }
}
else{
    //Redireciona o usuario para o formUsuario.php
    header("location:formUsuario.php");
}

// FUNÇAO PARA FILTRAR ENTRADAS DE DADOS PARA PREVINIR ATAQUES SQL
function filtrar_entrada($dado){
    $dado = trim($dado); //remover espaços desnecessarios 
    $dado = stripslashes($dado); // rem barras invertidas
    $dado = htmlspecialchars($dado); //converte caracter e, entidades html

    // apos filtrar retorna o dado
    return($dado);
}

//utiliza funcao preg
if(!preg_match('/^[\p{l}]+%/u', $nomeUsuario)){
    echo "<p sty";
}
?>