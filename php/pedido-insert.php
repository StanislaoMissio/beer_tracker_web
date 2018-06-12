<?php
    require_once('init.php');

    // pega os dados do formuário
    $cnpj = isset($_POST['cnpj']) ? $_POST['cnpj'] : null;
    $cliente = isset($_POST['cliente']) ? $_POST['cliente'] : null;   
    $entrega = isset($_POST['entrega']) ? $_POST['entrega'] : null;   
    $produtos = isset($_POST['produtos']) ? $_POST['produtos'] : null;
    $response = 'false';
    $total = 0;

    foreach($produtos as $produto){
        $totalWithDot = str_replace(",", ".", $produto['Total']);
        $totalNumber = (float)str_replace("R$", "", $produto['Total']);
        $total = $totalNumber + $total;
    }
    
    // insere no banco
    $PDO = db_connect();

    $sqlPedido = "INSERT INTO pedido(data_pedido, data_entrega, cod_cliente, valor_pedido_total)
                  VALUES(DATE_FORMAT(NOW(), '%Y,%m,%d'), :entrega,
                  :cliente, :total)";

    $stmtPedido = $PDO->prepare($sqlPedido);
    $stmtPedido->bindParam(':entrega', $entrega, PDO::PARAM_STR);
    $stmtPedido->bindParam(':cliente', $cliente, PDO::PARAM_INT);
    $stmtPedido->bindParam(':total', $total, PDO::PARAM_INT);

    if($stmtPedido->execute()){
        $codPedido = $PDO->lastInsertId();
    } else {
        $response = $stmtItemPedido->errorInfo();
    }

    if(!is_null($codPedido) || !empty($codPedido)) {
        foreach($produtos as $produto){

            $sqlItemPedido = "INSERT INTO item_pedido(cod_pedido, cod_produto, quantidade, total) 
                              VALUES (:cod_pedido, :cod_produto, :quantidade, :total)";

            $stmtItemPedido = $PDO->prepare($sqlItemPedido);
            $stmtItemPedido->bindParam(':cod_pedido', $codPedido);
            $stmtItemPedido->bindParam(':cod_produto', $produto['#']);
            $stmtItemPedido->bindParam(':quantidade', $produto['Quantidade']);
            $stmtItemPedido->bindParam(':total', $produto['Total']);

            if($stmtItemPedido->execute()){
                $response = 'true';
            } else {
                $response = $stmtItemPedido->errorInfo();
            }
        }
    }

    print_r($response);
    
?>