<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial</title>
</head>
<body>
<?php
    include_once('banco.php');

    $sql = "SELECT * FROM contatos";

    $resultado = $con->query($sql);

    if ($resultado->num_rows > 0) {

        echo "<table class='table table-hover table-striped'>";
        echo "<tr><th>ID</th><th>Nome</th><th>Senha</th><th>Gênero</th><th>Data de Nascimento</th></tr>";
        while ($row = $resultado->fetch_object())
        {
            echo "<tr>";
            echo "<td>" . $row -> id . "</td>";
            echo "<td>" . $row -> nome . "</td>";
            echo "<td>" . $row -> senha . "</td>";
            echo "<td>" . $row -> genero . "</td>";
            echo "<td>" . $row -> datNasc . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        } else {
            echo "<p class='alert alert-danger'>Não foram encontrados resultados!</p>";
        }
?>

</body>
</html>