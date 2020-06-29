<?php
//CONEXÃO COM BANCO DE DADOS
$mysqli = new mysqli("localhost", "root", "g25s10m99", "trab_6");

if(mysqli_connect_error()){
    echo "Erro ao conectar ao BD: %s", mysqli_connect_error();
    exit();
} 



//FIM CONEXÃO COM BANCO DE DADOS

?>

