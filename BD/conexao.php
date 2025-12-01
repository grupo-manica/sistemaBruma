<?php

$local_server = "localserver";
$usuario_server = "root";
$senha_server = "";
$banco_de_dados = "sistemaBruma";

try{
    $pdo= new PDO("mysql:host=$local_server,dbname=$banco_de_dados",$usuario_server,$senha);
    $pdo->exec("SET CHARACTER SET utf8");
}
catch(Exception $erro){
    echo "ATENÇÃO - ERRO NA CONEXÃO: " . $erro->getMessage();
    exit;
}

$tabela = "usuario";
?>