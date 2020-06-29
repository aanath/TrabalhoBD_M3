<?php

include('../Config.php');


if($_POST ['nome'] == ''){
    echo "É necessário informar o nome do cliente para continuar o processo!"; 
    
} else if($_POST ['email'] == ''){
    echo "É necessário informar o email do cliente para continuar o processo!"; 
    
} else if($_POST ['telefone'] == ''){
    echo "É necessário informar o telefone do cliente para continuar o processo!";
    
}else if($_POST ['logradouro'] == ''){
    echo "É necessário informar o logradouro do cliente para continuar o processo!";  
    
} else if($_POST ['numero'] == ''){
    echo "É necessário informar o número do cliente para continuar o processo!";
    
} else if($_POST ['bairro'] == ''){
    echo "É necessário informar o bairro do cliente para continuar o processo!";
    
} else if($_POST ['cidade'] == ''){
    echo "É necessário informar a cidade do cliente para continuar o processo!"; 
    
} else if($_POST ['estado'] == ''){
    echo "É necessário informar o estado do cliente para continuar o processo!"; 
       
} else {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];

    $sql = "SELECT id  FROM estado WHERE estado = '$estado';";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row(); 
    
    if(empty($row[0])){
        $sql = "INSERT INTO estado (estado) VALUES ('$estado');";
    
        if($mysqli->query($sql) == true){

        } else {
            echo "Erro ao adcionar o cliente!";
        }
    }
    
    //Adicionando cidade
    $sql = "SELECT id  FROM cidade WHERE cidade = '$cidade';";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row(); 
    if(empty($row[0])){
        $sql = "INSERT INTO cidade (cidade) VALUES ('$cidade');";
 
        if($mysqli->query($sql) == true){

        } else {
            echo "Erro ao adcionar o cliente!";
        }
    }

    //Adicionando bairro
    $sql = "SELECT id  FROM bairro WHERE bairro = '$bairro';";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row(); 
    if(empty($row[0])){
        $sql = "INSERT INTO bairro (bairro) VALUES ('$bairro');";
        if($mysqli->query($sql) == true){

        } else {
            echo "Erro ao adcionar o cliente!";
        }
    }

    //Adiciona endereço
    $sql = "SELECT id  FROM bairro WHERE bairro = '$bairro';";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row(); 
    $idB = $row[0];
    $sql = "SELECT id  FROM cidade WHERE cidade = '$cidade';";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row(); 
    $idC = $row[0];
    $sql = "SELECT id  FROM estado WHERE estado = '$estado';";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row(); 
    $idE = $row[0];
    
    $sql = "INSERT INTO endereco (id_bairro, id_cidade, id_estado, logradouro, numero) VALUES ('$idB', '$idC', '$idE', '$logradouro', '$numero');";
    if($mysqli->query($sql) == true){

    } else {
        echo "Erro ao adcionar o cliente!";
    }
    
    $sql = "SELECT id FROM endereco ORDER BY id DESC LIMIT 1";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row(); 
    $id = $row[0];
    
    $sql = "INSERT INTO cliente (id_endereco, nome, email, telefone) VALUES ('$id', '$nome', '$email', '$telefone');";
    
    if($mysqli->query($sql) == true){
        echo "Cliente adcionado!";
    } else {
        echo "Erro ao adcionar o cliente!";
    }
}

?>

<br/>
<button type="button" onclick="location.href= '/index.php'">Voltar</button>