<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <?php
    if (isset($_POST['submit'])) {
        include_once('banco.php');

        $nome = $_POST['nome'];
        $senha = $_POST['senha'];

        $result = mysqli_query($mysqli, "INSERT INTO CONTATOS(nome, senha) VALUES ('$nome', '$senha')");
    } 
    ?> 
    <form action="banco.php" method="post">
        <header>
            <h1>Cadastro</h1>
        </header>

        <main>
            <label for="nome">
                <h2>Nome</h2>
                <input type="text" name="nome">
            </label>

            <label for="senha">
                <h2>Senha</h2>
                <input type="password" name="senha" id="senha">
            </label>

            <label for="genero">
                <h2>Gênero</h2>
                <input type="radio" name="genero" id="sexoFem">Feminino
                <input type="radio" name="genero" id="sexoMasc">Masculino
                <input type="radio" name="genero" id="sexoOut">Outro
            </label>

            <label for="datNasc">
                <h2>Data de Nascimento</h2>
                <input type="date" name="datNasc" id="datNasc">
            </label>

            <input type="submit" value="Enviar" name="submit" id="submit">
        </main>
    </form>
</body>
</html>