<?php
    require_once('../utils/init.php');

    // pega os dados do formuário
    $name = isset($_POST['nome']) ? $_POST['nome'] : null;
    $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;   

    // insere no banco
    $PDO = db_connect();
    $sql = "INSERT INTO ingrediente(nome_ingrediente, descricao_ingrediente) VALUES(:nome, :descricao)";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nome', $name);
    $stmt->bindParam(':descricao', $descricao);

    if ($stmt->execute()){
        header("Refresh:0; url=ingrediente-cadastro.php");
    }
    else{
        echo "Erro ao cadastrar";
        print_r($stmt->errorInfo());
    }
?>
