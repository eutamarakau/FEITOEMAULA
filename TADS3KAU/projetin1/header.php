<?php error_reporting(0);
session_start();

if($_SESSION['logado'] == true){
    $$idUsuario = $_SESSION['idUsuario'];
    $nomeUsuario = $_SESSION['nomeUsuario'];
    $emailUsuario = $_SESSION['emailUsuario'];
    $nivelUsuario = $_SESSION['nivelUsuario'];

    $nomeCompleto = explode(' ', $nomeUsuario);
    $primeiroNome = $nomeCompleto[0];
}
    ?>

<!DOCTYPE html>
<html lang="pt-br">
    <?php date_default_timezone_set('America/Sao_Paulo');
    ?>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ESHOPE</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&display=swap" rel="stylesheet">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />

        <style>
            
        </style>
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="merriweather navbar-brand" href="index.php">ESHOPE</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Pagina Inicial</a></li>
                        <li class="nav-item"><a class="nav-link" href="listarRegistrosTabela.php">Sobre</a></li>
                        
                    </ul>
                   
                    <ul class="navbar-nav mb-2 mb-lg-0 ms-lg-4">
                        <?php 
                         if($_SESSION['logado'] == true){
                            if($nivelUsuario == 'administrador'){
                                echo"
                                <li class='nav-item dropdown'>
                                    <a class='nav-link dropdown-toggle' id='navbarDropdown' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'><i class ='bi bi-person-circle'></i>$primeiroNome</a>
                                    <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                        <li><a class='dropdown-item' href='formAnuncio.php'>Criar Anúncio</a></li>
                                        <li><hr class='dropdown-divider' /></li>
                                        <li><a class='dropdown-item' href='meusAnuncios.php'>Gerenciar Anúncios</a></li>
                                        <li><a class='dropdown-item' href='#!'>Gerenciar Usuários</a></li>
                                        <li><hr class='dropdown-divider' /></li>
                                        <li><a class='dropdown-item' href='logout.php'>Sair</a></li>
                                    </ul>
                                </li>
                                ";
                            }
                            else{
                                echo"
                                <li class='nav-item dropdown'>
                                    <a class='nav-link dropdown-toggle' id='navbarDropdown' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'><i class ='bi bi-person-circle'></i>$primeiroNome</a>
                                    <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                        <li><a class='dropdown-item' href='formAnuncio.php'>Criar Anuncio</a></li>
                                        <li><hr class='dropdown-divider' /></li>
                                        <li><a class='dropdown-item' href='meusAnuncios.php'>Meus Anuncios</a></li>
                                        <li><a class='dropdown-item' href='#!'>Minhas Compras</a></li>
                                        <li><hr class='dropdown-divider' /></li>
                                        <li><a class='dropdown-item' href='logout.php'>Sair</a></li>
                                    </ul>
                                </li>
                                ";
                            }
                         }
                         else{
                            echo
                             " <li class='merriweather nav-item'><a class='nav-link active' aria-current='page' href='formLogin.php'>Login</a></li>";
                         }

                        ?>
                    </ul>

                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-3">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <a class="display-4 fw-bolder" href="index.php">
                        <img src="assets/img/ShopTB_Logo.png" style="width: 100px;">
</a>
                    <p class=" merriweather lead fw-normal text-white-50 mb-0">sua loja de produtinhos chineis</p>
                </div>
            </div>
        </header>
        
