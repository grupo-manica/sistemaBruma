<?php
$local_server = "localhost";
$usuario_server = "root";
$senha_server = "";
$banco_de_dados = "sistemabruma";

try{
    $pdo= new PDO("mysql:host=$local_server;dbname=$banco_de_dados",
    $usuario_server,$senha_server);
    $pdo->exec("SET CHARACTER SET utf8");
}
catch(Exception $erro){
    echo "ATENÇÃO - ERRO NA CONEXÃO: " . $erro->getMessage();
    exit;
}

$tabela = "usuario";
?>