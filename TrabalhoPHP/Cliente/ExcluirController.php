<?php
include ('../Config.php');


if(!isset($_GET['id']) && $_GET['id'] == " "){
    echo "Por favor informe o ID do cliente";
}else {
    $id = $_GET['id'];
    
    $sql = "SELECT id_endereco  FROM cliente WHERE id = $id;";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row(); 
    $idEndereco = $row[0];
    
    $sql = "DELETE FROM cliente WHERE id = $id;";
    if($mysqli->query($sql) == true){
        
    } else {
         echo "Erro ao excluir o cliente!";
    }
    
    $sql = "DELETE FROM endereco WHERE id = $idEndereco;";
    if($mysqli->query($sql) == true){
        echo "Cliente excluido com sucesso!";
    } else {
         echo "Erro ao excluir o cliente!";
    }
    
    
    
    
}
$mysqli->close();
?>
<br/>
    <button type="button" onclick="location.href= '/index.php'">Voltar</button>
