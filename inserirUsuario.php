<?php 
    if (!isset($_POST['nome']) ||
        !isset($_POST['email']) ||
        !isset($_POST['senha']) ||
        $_POST['nome'] == "" ||
        $_POST['email'] == "" ||
        $_POST['senha'] == ""
     ) header('Location: dashboard.php');

    require('db/db.php');
    $CONN = conexao();
    $sql = "USE agenda;";
    $resultado = mysqli_query($CONN, $sql);
    if (!$resultado)
    die ("Erro: Seleção database... " . mysqli_error($CONN). "<br />");

    $sql = "INSERT INTO usuario (nome,email,senha)";
    $sql .= "VALUES ('" . $_POST['nome'] . "', '";
    $sql .= $_POST['email'] . "', '" . $_POST['senha'] . "');";
    $resultado = mysqli_query($CONN, $sql);
        if (!$resultado)
            die ("Erro: Seleção database... " . mysqli_error($CONN). "<br />");

    mysqli_close($CONN);
    header('Location: dashboard.php');

?>