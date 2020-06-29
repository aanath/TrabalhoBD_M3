<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include ('Config.php');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Transporte</title>
    </head>
    <body>
        <h1>Gerenciar cliente</h1>
        <button onclick="location.href='Cliente/AdicionarCliente.php'">Adcionar cliente</button>
        <br/>
        <br/>
        
        <table border="1px" >
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Opções</th>
            </tr>
            <?php
                $sql = "SELECT id, nome, email, telefone, id_endereco FROM cliente;";
                if($result = $mysqli->query($sql)){
                    while($row = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>" . $row ['nome'] ."</td>";
                        echo "<td>" . $row ['email'] ."</td>";
                        echo "<td>" . $row ['telefone'] ."</td>";
                        echo "<td>";
                        echo "<a href='Cliente/VisualizarEnd.php?id=". $row ['id'] ."'>  Visualizar</a>";
                        echo "</td>";
                        echo "<td>";
                        echo "<a href='Cliente/ExcluirController.php?id=". $row ['id'] ."'>Excluir </a>";
                        echo "<a href='Cliente/Editar.php?id=". $row ['id_endereco'] ."'> Editar</a>";
                        echo "</td>";
                        echo '</tr>';
                    }
                }
            ?>
            </table>
    </body>
</html>

<?php 
    $mysqli->close();
?>