<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aula 01 di PHP</title>
</head>
<body>
    <?php 
        //comentar uma unica linha
        /* comentar
        varias
        linhas
        */



        /* decarar variaveis

        $a = 0;
        $b = 10.11;
        $c = "gambiarra";

        echo "<p style='color:green'> $c </p>";
        */



        /*funçoews 

        //algo escopo global
        $x= 5;
        function teste (){
            echo "<p> variavel x dentro da funçao é $x </p>";
        }
        teste();
        echo "<p> variavel x fora da funçao é $x </p>";

        */

        /*estrutura de sele
        $idadeUsuario = 18;
        if($idadeUsuario >=18) {
            echo "acesso permitido";
        }
        else 
        */    
            
        // $a = 5;
        // $b = 7;
        // $c = 3;

        // if($a > $b){
        //     echo"A é maior que B";
        // }
        // elseif($a > $c){
        //     echo"A é maior que C";
        // }
        // else{
        //     echo"A é menor que B e C";
        // }

        // comando siwiter

        // $cor = "rosa";

        // switch($cor){
        //     case "verde": echo "sua calda de sereia é verde" ;
        //     break;
        //     case "rosa": echo "sua calda de sereia é rosa" ;
        //     break;
        //     case "vermelho": echo "sua calda de sereia é vermelho" ;
        //     break;
        //     case "blue": echo "sua calda de sereia é blue" ;
        //     break;
        //     case "pretp": echo "sua calda de sereia é pretp" ;
        //     break;

        //     default:
        //         echo "vc n é uma sereia digna";
        // }

        //estrutura de repetição

        // $i = 1;

        
        // do {
        //     echo"<p>$i";
        // }while($i<=10);


        //tabela
        // echo"<table border='2'>";
        // for($linha = 1; $linha <=10; $linha++){
        //     echo"<tr>";
        //     for($coluna = 1; $coluna <= 10; $coluna++){
        //         echo"<td style:'padding: 20px'>";
        //         echo"$linha x $coluna";
        //         echo"</td>";
        //     };
        //     echo"</tr>";
        // }
        // echo "</table>";

        //array
        // $numeros = array("1", "2", "3", "4");

        // foreach($numeros as $numero){
        //     echo "<p>" . $numero;
        // }

        //função

        function escreverMensagem(){
            echo"<p>oi";
        }

        
        function escreverMensagemR($p, $nome){
            $p = "oi " . $nome;
            return $p;
        }

        escreverMensagem();
        $p = "";
        echo escreverMensagemR($p, "kakau");
    ?>
</body>
</html>