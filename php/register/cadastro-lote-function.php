<?php

require_once('init.php');


if (isset($_POST["submit"]))

{
    // Banco produto

    $cod_produto = $_POST ["nome_produto"];
    $data_inicio = $_POST ["inicio"];
    $data_envase = $_POST ["envase"];
    $data_fermentacao = $_POST ["fermentacao"];
    $data_fim = $_POST ["termino"];
    $indice_og = $_POST ["OG"];
    $indice_fg = $_POST ["FG"];
    $indice_ibu = $_POST ["IBU"];
    $indice_abv = $_POST ["ABV"];
    
    
        $PDO = db_connect();

        $sql = "INSERT INTO lote
        (cod_produto,
        data_inicio,
        data_envase,
        data_fermentacao,
        data_fim,
        indice_og,
        indice_fg,
        indice_ibu,
        indice_abv) VALUES ('$cod_produto', '$data_inicio', '$data_envase', '$data_fermentacao', '$data_fim', $indice_og, $indice_fg, $indice_ibu, $indice_abv)";          

        $stmt = $PDO->prepare($sql);
        $stmt->execute();

        echo($sql);
  

}

?>