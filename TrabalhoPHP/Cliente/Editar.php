<?php
include ('../Config.php');


if(!isset($_GET['id']) && $_GET['id'] == " "){
    echo "Por favor informe o ID do aluno";
}else {
    $id = $_GET['id'];
    
    $sql = "SELECT id_endereco  FROM cliente WHERE id = $id;";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row(); 
    $idEndereco = $row[0];
    
    $sql = "SELECT id_bairro  FROM endereco WHERE id = $idEndereco;";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row(); 
    $idBairro = $row[0];

    $sql = "SELECT id_cidade  FROM endereco WHERE id = $idEndereco;";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row(); 
    $idCidade = $row[0];

    $sql = "SELECT id_estado  FROM endereco WHERE id = $idEndereco;";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row(); 
    $idEstado = $row[0];
    
    
    $sql = "SELECT nome, email, telefone FROM cliente WHERE id = $id;";
    if($result = $mysqli->query($sql)){
            $row = $result->fetch_row();
            $nome = $row[0];
            $email = $row[1];
            $telefone = $row[2];
    }
    
    $sql = "SELECT logradouro, numero FROM endereco WHERE id = $idEndereco;";
    if($result = $mysqli->query($sql)){
            $row = $result->fetch_row();
            $logradouro = $row[0];
            $numero = $row[1];
    }
    
    $sql = "SELECT bairro FROM bairro WHERE id = $idBairro;";
    if($result = $mysqli->query($sql)){
            $row = $result->fetch_row();
            $bairro = $row[0];
    }
    
    $sql = "SELECT cidade FROM cidade WHERE id = $idCidade;";
    if($result = $mysqli->query($sql)){
            $row = $result->fetch_row();
            $cidade = $row[0];
    }
    
    $sql = "SELECT estado FROM estado WHERE id = $idEstado;";
    if($result = $mysqli->query($sql)){
            $row = $result->fetch_row();
            $estado = $row[0];
    
      
?>    

<html>
    <head>
        <meta charset="UTF-8">
        <title>Transporte</title>
    </head>
    <body>
        <h1>Editar Cliente</h1>
        <small>*Campos obrigatórios</small>
        <form action="EditarController.php?id=<?php echo $id; ?>" method="post">
            <br/>
            Nome*:
            <input type='text' name='nome' id='nome' required="true" value="<?php echo $nome?>"/>
            <br/>
            <br/>
            E-mail*:
            <input type='text' name='email' id='email' required="true" value="<?php echo $email?>"/>
            <br/>
            <br/>
            Telefone*:
            <input type='text' name='telefone' id='telefone' required="true" value="<?php echo $telefone?>"/>
            <br/>
            <br/>
            Logradouro*:
            <input type='text' name='logradouro' id='logradouro' required="true" value="<?php echo $logradouro?>"/>
            <br/>
            <br/>
            Numero*:
            <input type='text' name='numero' id='numero' required="true" value="<?php echo $numero?>"/>
            <br/>
            <br/>
            Bairro*:
            <input type='text' name='bairro' id='bairro' required="true" value="<?php echo $bairro?>"/>
            <br/>
            <br/>
            Cidade*:
            <input type='text' name='cidade' id='cidade' required="true" value="<?php echo $cidade?>"/>
            <br/>
            <br/>
            Estado*:
            <input type='text' name='estado' id='estado' required="true" value="<?php echo $estado?>"/>
            <br/>
            <br/>
            <button type="submit">Salvar</button>
            <button type="button" onclick="location.href= '/index.php'">Voltar</button>
        </form>
    </body>
</html>

<?php
    }
    $result->close();
}
$mysqli->close();

?>    