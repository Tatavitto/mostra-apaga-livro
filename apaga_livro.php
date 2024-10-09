<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recebe dados</title>
</head>
<body>
    <form action="">
	<label for="">id que será apagado:</label>
	<input type="text" name="id"><br>
	<input type="submit">
    </form>
</body>
</html>
<?php
$id = $_GET['id'];
$comandoSQL = "DELETE FROM livros WHERE livros.id = $id";

$servidor = 'localhost';
$banco = 'receitas';
$usuario = 'root';
$senha = '';


$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

try {

    $resultado = $conexao->exec($comandoSQL);

    if($resultado) {
        echo "Item apagado!";
    } else {
        echo "Erro ao apagar o item!";
    }
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
?>