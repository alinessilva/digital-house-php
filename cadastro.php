<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Formulário</title>
</head>
<body>
    <form action="acoes.php" method="post">
        <label for="">Nome:</label><br>
        <input type="text" name="nome" id=""><br>
        <label for="">Login: </label><br>
        <input type="text" name="login" id=""><br>
        <label for="">Senha: </label><br>
        <input type="password" name="senha" id=""><br>
        <label for="">Confirmar Senha: </label><br>
        <input type="password" name="confirmar" id=""><br>
        <button type="submit" name="acao" value="cadastro">Cadastrar</button>
    </form>
</body>
</html>