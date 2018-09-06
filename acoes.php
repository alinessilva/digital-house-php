<?php
// chamar as funcoes tb pode ser usuado o require 
include_once('funcoes.php');

// POSSO MANDAR A ACAO TANTO POR POST OU POR GET QUANDO USO REQUEST
switch ($_REQUEST['acao']) {
    case 'login':
        if(login($_POST['login'], $_POST['senha'])){
            header('Location:index.php');
        }else{
           header('Location:index.php?page=login&msg="Usuario+não+encontrado+ou+senha+invalida!');
        }
        break;

    case 'cadastro':
        unset($_POST['acao']); // não quero gravar acao
        $cad = cadastro($_POST);
            if($cad['error']){  // analisar erros e acertos
                header('Location:index.php?page=cadastro&msg='.$cad['msg']);
            }else{
                header('Location:index.php?page=login&msg='.$cad['msg']);
            }
        break;

    case 'logout':
        logout();
        header('Location:index.php');
        break;

    default:
        echo "Rota inválida!";
        break;
}


?>