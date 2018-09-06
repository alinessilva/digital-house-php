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
    <title>Login</title>
</head>

<body>
<form action="acoes.php" method="post">
        <label for="">Login: </label><br>
        <input type="text" name="login" id=""><br>
        <label for="">Senha: </label><br>
        <input type="password" name="senha" id=""><br>
        <button type="submit" name="acao" value="login">Login</button>
    </form>
</body>
</html>