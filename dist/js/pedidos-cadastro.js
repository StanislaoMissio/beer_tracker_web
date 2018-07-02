function addProduto() {

  var value = $("#selectProduto option:selected").val();

  $.ajax({
    type: "POST",
    url: "../list/produtos-list-pedidos.php",
    data: { cod: value }
  }).done(function( json ) {
    $("#tableProdutos").last().append(json);
  });    
}

function calcTotal(qtd, preco, cod){
    var reais = "R$ ";
    var resultado = Number(qtd) * Number(preco);
    $("#" + cod).text(reais + resultado);
}

function cadastrarPedido(){
  
  var produtosJson = $('#tableProdutos').tableToJSON({
    textExtractor: function(cellIndex,$cell) {
      return $cell.find('input, input').val() || $cell.text();
    }
  });
  var cnpj = $('#cnpj').val();
  var cliente = $("#cliente option:selected").val();
  var entrega = $('#entrega').val();

  $.ajax({
    type: "POST",
    url: "pedido-insert.php",
    data: { cliente: cliente, entrega: entrega, produtos: produtosJson }
  }).done( function(response) {
    if(response == 'true'){
      window.location.href = 'pedidos-cadastro.php';
    }
  });
}