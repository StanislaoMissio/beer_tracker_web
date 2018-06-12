function deletePedido(){
    var codPedido = $("#pedidoDeleteCod").val()

    $.ajax({
    type: "POST",
    url: "pedido-delete.php",
    data: { cod: codPedido }
    }).done(function(response) {
        if(response=='true'){
            $("#deleteModalPedido").modal('hide')
        } else {
            console.log(response)
        }
    });
};

function editPedido(){
    var cod = $("#pedidoCod").val()
    var nome = $("#pedidoNome").val()

    $.ajax({
    type: "POST",
    url: "ingredientes-edit.php",
    data: { cod: cod, nome: nome }
    }).done(function(response) {
        if(response=='true'){
            $("#editModalPedido").modal('hide')
        } else {
            console.log(response)
        }
    });
};

$('#deleteModalPedido').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var recipient = button.data('cod')
    var nome = button.data('nome')

    var modal = $(this)
    modal.find('.modal-title').text('Deletar ' + nome)
    modal.find('#pedidoDeleteCod').val(recipient)
})

$('#editModalPedido').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var recipient = button.data('cod')
    var nome = button.data('nome')

    var modal = $(this)
    modal.find('.modal-title').text('Editar ' + nome)
    modal.find('#pedidoCod').val(recipient)
    modal.find('#pedidoNome').val(nome)
})

$('#deleteModalPedido').on('hidden.bs.modal', function (event) {
    $("#main").load("pedidos.php");
})

$('#editModalPedido').on('hidden.bs.modal', function (event) {
    $("#main").load("pedidos.php");
})