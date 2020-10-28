<?php
if (!isset($_GET['codigo']))
        header('Location: dashboard.php');

require('db/db.php');
$CONN = conexao();
$sql = "USE agenda;";
$resultado = mysqli_query($CONN, $sql);
 if(!$resultado)
    die ("Erro: Seleção database..." . mysqli_error($CONN). "<br />");

$codigo = $_GET['codigo'];
$sql = "SELECT " FROM usuario WHERE codigo=" . $codigo . ";";
$resultado = mysqli_query($CONN, $sql);
if (!$resultado)
    die("Erro: " . mysqli_error($CONN) . "<br />");

if(mysqli_num_rows($resultado) <= 0 )
    die("ERRO: Código não existente!");

$linha = mysqli_fetch_assoc($resultado);
mysqli_close($CONN);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Alterar Usuário</h1>
    <form action="Alterar.php" method="POST" >
        <input type="hidden" name="codigo" value="<?= $linha['codigo'] ?>" />
        <input type="text" name="nome" value="<?= $linha['nome'] ?>" /><br />  
        <input type="email" name="email" value="<?= $linha['email'] ?>" /><br />
        <input type="password" name="senha" placeholder="Digite sua senha" /><br /> 
        
        <input type="submit" value="Alterar" />
    </form>
</body>
</html>

