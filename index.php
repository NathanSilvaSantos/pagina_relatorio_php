<?php
// Conexão com banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "dbagenda";

$connect = mysqli_connect($servername, $username, $password, $db_name) or die("Erro ao conectar no servidor. - ". mysqli_connect_error());
mysqli_set_charset($connect, "utf8");


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de contatos</title>
</head>
<body>

    <h1>Lista de contatos</h1>
    <hr>
    <table>
        <thead>
            <tr>
                <th>Nome:</th>
                <th>Sobrenome:</th>
                <th>Email:</th>
                <th>Telefone:</th>
            </tr>
        </thead>

        <tbody>
            <?php
                // Executando a consulta
                $sql ="SELECT * FROM contatos";
                $resultado = mysqli_query($connect, $sql);
                // Verificando se obteve resultado
                if(mysqli_num_rows($resultado) > 0) {
                // Percorre todas as linhas retornadas da consulta
                while ($dados = mysqli_fetch_array($resultado)) {
                    
            ?>
            <tr>
                <!-- Exibindo as informações na tabela -->
                <td><?php echo $dados['nome']; ?></td>
                <td><?php echo $dados['sobrenome']; ?></td>
                <td><?php echo $dados['email']; ?></td>
                <td><?php echo $dados['telefone']; ?></td>
            </tr>
            <?php 
                    } 
                } else{
            ?>
                <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
            <?php } ?>
                    
        </tbody>
    </table>
</body>
</html>