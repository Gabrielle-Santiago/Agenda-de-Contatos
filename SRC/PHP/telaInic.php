<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial</title>
</head>
<body>
    <?php
    //esta dando erro com o con (diz que não identifica)

        $sql = "SELECT * FROM contatos";

        $result = $con -> query ($sql);

        $qtd = $result -> num_rows;

        if ($qtd > 0) {
            print"<table class= 'table table hover table-striped'>";
            while ($row = $result -> fetch_object()//recuperar uma linha do resultado da consulta como um objeto.
            ) {
                print "<tr>";
                print "<td>". $row -> id;
                print "<td>". $row -> nome;
                print "<td>". $row -> senha;
                print "<td>". $row -> genero;
                print "<td>". $row -> datNasc;
                print "</tr>";
            }
            print "</table>";
        } else{
            print "<p class='alert alert-danger'>Não foram encontrados resultados!</p>";
        }
    ?>
</body>
</html>