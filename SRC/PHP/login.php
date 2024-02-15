<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<?php

// Dados de conexão com o banco de dados
$hostname = "localhost";
$username = "root";
$password = "";
$database = "usuarios";

// Estabelecer conexão com o banco de dados
$conexao = mysqli_connect($hostname, $username, $password, $database);

// Verificar se a conexão foi bem-sucedida
if (!$conexao) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Verificar se o formulário de login foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Obter dados do formulário de login
    $usuario = $_POST["nome"];
    $senha = $_POST["senha"];

    // Consulta SQL para verificar o login
    $query = "SELECT * FROM contatos WHERE nome = ? AND senha = ?";
    if ($stmt = $conexao->prepare($query)) {

        $stmt->bind_param("ss", $usuario, $senha);

        $stmt->execute();

        // Verificar se há resultados
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            
            echo "Login bem-sucedido!";
            header("Location: telaInic.php");
            exit;
        } else {
            
            echo "Nome de usuário ou senha incorretos!";
        }

        // Fechar a declaração preparada
        $stmt->close();
    } else {
        echo "Erro ao preparar a consulta: " . $conexao->error;
    }
}

// Fechar a conexão com o banco de dados
$conexao->close();
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