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

function calcTotal(qtd, preco){
    var reais = "R$ ";
    var resultado = Number(qtd) * Number(preco);
    $("#total").text(reais + resultado);
}
function cadastrarPedido(){
  
  var pedidosJson = $('#tableProdutos').tableToJSON();
  var cnpj = $('#cnpj').val();
  var cliente = $('#cliente').val();
  var entrega = $('#entrega').val();

  $.ajax({
    type: "POST",
    url: "pedido-insert.php",
    data: { cnpj: cnpj, cliente: cliente, entrega: entrega, pedidos: pedidosJson}
  }).done( function(response) {
    alert(response);
  });
}