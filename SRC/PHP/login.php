<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php
    if (isset($_POST['submit'])) {
        include_once('banco.php');
    } 
    ?>

    <form action="<?=$_SERVER['PHP_SELF'] ?>"  method="post">
        <header>
            <h1>Login</h1>
        </header>

        <main>
            <label for="nome">
                <p>Nome do usuário</p>
                <input method="post" type="text" id="nome" name="nome">
            </label>
            <label for="senha">
                <p>Senha</p>
                <input type="password" id="senha" name="senha">
            </label>
    
            <input type="submit" value="Verificar" name="submit">

            <a href="http://localhost/Agenda-de-Contatos/SRC/PHP/cadast.php">Cadastrar</a>
        </main>
    </form>
</body>
</html>