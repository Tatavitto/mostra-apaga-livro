<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Mostrando dados</title>
</head>
<body>
    <?php
$servidor = 'localhost';
$banco = 'receitas';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    
$comandoSQL = 'SELECT `id`, `nome`, `idioma`, `paginas`, `editora`, `data`, `isbn` FROM `livros`';
    
$comando = $conexao->prepare($comandoSQL);
$resultado = $comando->execute();

if($resultado) {
    echo "Mostrando resultado:";
    echo "<br>";
    while($linha = $comando->fetch()) {
        echo $linha['nome'] . " " . $linha['idioma'] . " " . $linha['paginas'] . " " . $linha['editora'] . " " . $linha['data'] . " " . $linha['isbn'] . "<br>";
        $id = $linha['id'];
        echo "<a href='apaga_livro.php?id=$id'>Apagar</a><br>";
    }
} else {
    echo "Erro no comando SQL";
}

    ?>
</body>
</html>