<?php

require_once('../utils/init.php');


if (isset($_POST["submit"]))

{
    // Banco receita

    $nome_receita = $_POST ["nome_receita"];
    $descricao_receita = $_POST ["comentario_receita"];
    $indice_og = $_POST ["OG"];
    $indice_fg = $_POST ["FG"];
    $indice_ibu = $_POST ["IBU"];
    $indice_abv = $_POST ["ABV"];
    $tempo_brasagem = $_POST ["brassagem"];
    $tempo_fervura = $_POST ["fervura"];
    $tempo_fermentacao = $_POST ["fermentacao"];
    $tempo_repouso = $_POST ["rampa"];
    $tempo_variacao = $_POST ["variacao"];
    
        $PDO = db_connect();

        $sql = "INSERT INTO receita
        (nome_receita,
        descricao_receita,
        indice_og,
        indice_fg,
        indice_ibu,
        indice_abv,
        tempo_brasagem,
        tempo_fervura,
        tempo_fermentacao,
        tempo_repouso,
        tempo_variacao) VALUES ('$nome_receita', '$descricao_receita', '$indice_og', '$indice_fg', '$indice_ibu', '$indice_abv', '$tempo_brasagem','$tempo_fervura', '$tempo_fermentacao', '$tempo_repouso', '$tempo_variacao')";          

        $stmt = $PDO->prepare($sql);
        $stmt->execute();

        $cod_receita = $PDO->lastInsertId();

        echo($cod_receita);

        //Banco ingrediente_receita

        $cod_ingrediente = $_POST ["ingred1"];
        $quantidade = $_POST ["qtd1"];

        $sql = "INSERT INTO ingrediente_receita
        (cod_ingrediente, cod_receita, quantidade, preco_ingrediente)
        VALUES ($cod_ingrediente, $cod_receita, $quantidade, 0)";

        $stmt = $PDO->prepare($sql);
        $stmt->execute();

        $cod_ingrediente = $_POST ["ingred2"];
        $quantidade = $_POST ["qtd2"];

        $sql = "INSERT INTO ingrediente_receita
        (cod_ingrediente, cod_receita, quantidade, preco_ingrediente)
        VALUES ($cod_ingrediente, $cod_receita, $quantidade, 0)";

        echo($sql);

        $stmt = $PDO->prepare($sql);
        $stmt->execute();

        $cod_ingrediente = $_POST ["ingred3"];
        $quantidade = $_POST ["qtd3"];

        $sql = "INSERT INTO ingrediente_receita
        (cod_ingrediente, cod_receita, quantidade, preco_ingrediente)
        VALUES ($cod_ingrediente, $cod_receita, $quantidade, 0)";

        $stmt = $PDO->prepare($sql);
        $stmt->execute();

        header('Location: receitas-ca.php');    

}

?>