function addProduto() {

  var value = $("#selectProduto option:selected").val();

  $.ajax({
    type: "POST",
    url: "produtos-list-pedidos.php",
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
    data: { cnpj: cnpj, cliente: cliente, entrega: entrega, produtos: produtosJson }
  }).done( function(response) {
    document.write(response);
  });
}