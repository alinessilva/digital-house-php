<?php
session_start();
$arquivo = 'dados.json'; // vou usar para toda função

function cadastro($user){
    global $arquivo;
    // verificar se as senhas são iguais

    if($user['senha']!=$user['confirmar']){
        return [
            'error' => true,
            'id' => false,
            'msg' => "As senhas não conferem"
        ];
        }

        // JSON - Se existir fazer a leitura se não criar uma estrutura vazia
        // como vamos usar varias vezes o ideal é colocar o json numa variavel

        if(file_exists($arquivo)){
            $dados = json_decode(file_get_contents($arquivo), true); // abrir o arquivo decode // pegar o conteudo file_get_contents // true transforma em array e não objeto
        } else {
            $dados = ["usuarios" => []]; // molde da estrutura que o arquivo vai ter - transformar o json em uma array PHP
        }

      // $dados['usuarios']  // essa é a minha lista de usuário, preciso verificar se o usuário está lá dentro

        foreach ($dados['usuarios'] as $id => $usuario){
        if($user['login'] == $usuario['login']){
            return [
                'error' => true,
                'id' => $id,
                'msg' => "Usuários já cadastrado!"
            ];
         }
     }

     // inserir o usuário no JSON - 1 = inserir na variavel dados no final da array

        $id = count($dados['usuarios']); // descobrir qtos usuarios existem
        unset($user['confirmar']);
        $user['senha'] = password_hash($user['senha'], PASSWORD_DEFAULT); // criptografando a senha
        $dados['usuarios'][] = $user; // gravar no array
        file_put_contents($arquivo, json_encode($dados)); // sobrescreve e colocar os dados do json 
            return [
                'error' => false,
                'id' => $id,
                'msg' => "Usuário cadastrado com sucesso!"
            ];

        }

        // var_dump(cadastro([
        //     'nome' => "teste",
        //     'login' => "teste",
        //     'senha' => "teste",
        //     'confirmar' => "teste",

    // ]));

    // verificar se login e senha existe no json
    function login($login, $senha){
        global $arquivo;
        if(file_exists($arquivo)){
            $dados = json_decode(file_get_contents($arquivo), true); // abrir o arquivo decode // pegar o conteudo file_get_contents // true transforma em array e não objeto
        } else {
            $dados = ["usuarios" => []]; // molde da estrutura que o arquivo vai ter - transformar o json em uma array PHP
        }

        foreach ($dados['usuarios'] as $id => $usuario){
            if($login == $usuario['login'] && password_verify($senha, $usuario['senha'])){
                $_SESSION['usuario'] = $usuario;
                $_SESSION['usuario']['id'] = $id;
                return true;
             }
     }
        return false;
    }

    function is_logged(){
        return isset($_SESSION['usuario']);
    }

    function get_user(){
        return isset($_SESSION['usuario'])?$_SESSION['usuario']:false;
    }

    function logout(){
        session_destroy();
    }


    /*  
    
    recebe $user:

    [
        'nome' => "",
        'login' => "",
        'senha' => "",
        'confirmar' => "",
        'acao' => "",



    ]
    
    
    retorna um array: [
      'error' => bool,
      'id' => (false ou posicao na lista),
      Dica: Qual o tamanho do array, essa vai ser a posição que vou inserir
      'msg' => "msg de erro"
      ]
        - verificar se as senhas são iguais
        - abrir um json se não existe criar com o seguinte formato:
            {"usuarios": []}
        - verificar se já existe um usuário com o mesmo email
        - caso não exista, inserir no JSON

    */


?>