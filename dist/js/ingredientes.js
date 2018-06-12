function deleteIngrediente(){
    var codIngrediente = $("#ingredienteDeleteCod").val()

    $.ajax({
    type: "POST",
    url: "ingredientes-delete.php",
    data: { cod: codIngrediente }
    }).done(function(response) {
        if(response=='true'){
            $("#deleteModal").modal('hide')
        } else {
            console.log(response)
        }
    });
    $("#main").load("ingredientes.php")
};

function editIngrediente(){
    var cod = $("#ingredienteCod").val()
    var nome = $("#ingredienteNome").val()
    var descricao = $("#ingredienteDescricao").val()

    $.ajax({
    type: "POST",
    url: "ingredientes-edit.php",
    data: { cod: cod, nome: nome, descricao: descricao }
    }).done(function(response) {
        if(response=='true'){
            $("#editModal").modal('hide')
        } else {
            console.log(response)
        }
    });
    $("#main").load("ingredientes.php");    
};

$('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('cod')
    var nome = button.data('nome')

    var modal = $(this)
    modal.find('.modal-title').text('Deletar ' + nome)
    modal.find('#ingredienteDeleteCod').val(recipient)
})

$('#editModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('cod')
    var nome = button.data('nome')

    var modal = $(this)
    modal.find('.modal-title').text('Editar ' + nome)
    modal.find('#ingredienteCod').val(recipient)
    modal.find('#ingredienteNome').val(nome)
})