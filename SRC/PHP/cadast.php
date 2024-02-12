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
        $genero = $_POST['genero'];
        $datNasc = $_POST['datNasc'];

        $result = mysqli_query($con, "INSERT INTO contatos(nome, senha, genero, datNasc) VALUES ('$nome', '$senha', '$genero', '$datNasc')");

        $erros = [];

        if (strlen($senha) < 8) {
            $erros[] = "A senha deve conter no mínimo 8 dígitos";
        }

        if(!preg_match('/[A-Z]/', $senha)){
            $erros[] = "A senha deve conter letras maiúsculas";
        }

        if(!preg_match('/[a-z]/', $senha)){
            $erros[] = "A senha deve conter letras minúsculas";
        }

        if (!preg_match('/[^a-zA-Z0-9]/', $senha)) {
            $erros[] = "A senha deve conter no mínimo um símbolo";
        }

        if (empty($erros)) {
           
        } else {           
            foreach ($erros as $erro) {
                echo $erro . "<br>";
            }
        }
    }
    ?> 

    <form action="<?=$_SERVER['PHP_SELF'] ?>" method="post">
        <header>
            <h1>Cadastro</h1>
        </header>

        <main>
            <label for="nome">
                <h2>Nome</h2>
                <input type="text" name="nome" required>
            </label>

            <label for="senha">
                <h2>Senha</h2>

                <input type="password" name="senha" id="senha" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$" title="A senha deve conter pelo menos:
                Uma letra minúscula,
                Uma letra maiúscula,
                Um símbolo,
                No mínimo 8 caracteres"  required>
            </label>

            <label for="genero">
                <h2>Gênero</h2>
                <select name="genero" id="genero">
                    <option value="select">Selecione</option>
                    <option value="fem">Feminino</option>
                    <option value="masc">Masculino</option>
                    <option value="out">Outro</option>
                </select>
            </label>

            <label for="datNasc">
                <h2>Data de Nascimento</h2>
                <input type="date" name="datNasc" id="datNasc" required>
            </label>

            <input type="submit" value="Enviar" name="submit" id="submit">
        </main>
    </form>
</body>
</html>