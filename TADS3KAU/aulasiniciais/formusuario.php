<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de usuario </title>
</head>
<body>

<h2>cadastro de usuario</h2>
    
    <form action="actionUsuario.php" method="POST">
    <LABEL for="nomeUsuario">Nome:</LABEL><br>
    <input type="text" name="nomeUsuario"><br>

    <LABEL for="emailUsuario">emai:</LABEL><br>
    <input type="email" name="emaiUsuario"><br>

    <LABEL for="senhaUsuario">senha:</LABEL><br>
    <input type="password" name="senhaUsuario"><br>

    <button type="submit">Cadastrar</button>

    </form>
</body>
</html>