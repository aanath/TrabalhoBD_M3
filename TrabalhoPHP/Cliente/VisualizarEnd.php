<?php
include ('../Config.php');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Transporte</title>
    </head>
    <body>
        <h1>Endereço do Cliente</h1>
        <br/>
        <br/>
        <table border="1px" >
            <tr>
                <th>Logradouro</th>
                <th>Número</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>Estado</th>
            </tr>
            <?php
                if(!isset($_GET['id']) && $_GET['id'] == " "){
                    echo "Por favor informe o ID do endereço do cliente";
                }else {
                    $id = $_GET['id'];

                    $sql = "SELECT id_bairro  FROM endereco WHERE id = $id;";
                    $result = $mysqli->query($sql);
                    $row = $result->fetch_row(); 
                    $idBairro = $row[0];

                    $sql = "SELECT id_cidade  FROM endereco WHERE id = $idBairro;";
                    $result = $mysqli->query($sql);
                    $row = $result->fetch_row(); 
                    $idCidade = $row[0];

                    $sql = "SELECT id_estado  FROM endereco WHERE id = $idCidade;";
                    $result = $mysqli->query($sql);
                    $row = $result->fetch_row(); 
                    $idEstado = $row[0];
                    
                    echo "<tr>";
                    $sql = "SELECT logradouro, numero FROM endereco WHERE id = $id;";
                    if($mysqli->query($sql) == true){
                        $result = $mysqli->query($sql);
                        $row = $result->fetch_assoc();
                        echo "<td>" . $row ['logradouro'] ."</td>";
                        echo "<td>" . $row ['numero'] ."</td>";
                    } else {
                        echo "Erro ao adcionar o cliente!";
                    }
                    $sql = "SELECT bairro FROM bairro WHERE id = $idBairro;";
                    if($mysqli->query($sql) == true){
                        $result = $mysqli->query($sql);
                        $row = $result->fetch_assoc();
                        echo "<td>" . $row ['bairro'] ."</td>";
                    } else {
                        echo "Erro ao adcionar o cliente!";
                    }
                    $sql = "SELECT cidade FROM cidade WHERE id = $idCidade;";
                    if($mysqli->query($sql) == true){
                        $result = $mysqli->query($sql);
                        $row = $result->fetch_assoc();
                        echo "<td>" . $row ['cidade'] ."</td>";
                    } else {
                        echo "Erro ao adcionar o cliente!";
                    }
                    $sql = "SELECT estado FROM estado WHERE id = $idEstado;";
                    if($mysqli->query($sql) == true){
                        $result = $mysqli->query($sql);
                        $row = $result->fetch_assoc();
                        echo "<td>" . $row ['estado'] ."</td>";
                    } else {
                        echo "Erro ao adcionar o cliente!";
                    }
                    echo '</tr>';
                }
            ?>
            </table>
    </body>
</html>

<?php 
    $mysqli->close();
?>

<br/>
    <button type="button" onclick="location.href= '/index.php'">Voltar</button>
