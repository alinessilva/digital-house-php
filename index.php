<?php
    include_once('funcoes.php');
    $page = isset($_GET['page'])?$_GET['page']:'home';
    if(!file_exists($page.".php")) $page = 'home';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Menu</title>
</head>
<body>
    <nav>
        <ul>
        <li><a href="index.php?page=home">Home</a></li>
            <?php if(is_logged()): ?>
                <li><a href="acoes.php?acao=logout">Logout</a></li>
            <?php else: ?>
             <li><a href="index.php?page=cadastro">Cadastro</a></li>
             <li><a href="index.php?page=login">Login</a></li>
            <?php endif; ?>
          
        </ul>
    </nav>
    <div class="mensagem">
        <?php echo isset($_GET['msg'])?$_GET['msg']:'';?>
    </div>
    <div class="conteudo">
        <?php
            include($page.".php");
        ?>
    </div>
    
</body>
</html>