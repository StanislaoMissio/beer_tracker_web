function deleteUsuario(){
    var codUsuario = $("#usuarioDeleteCod").val()

    $.ajax({
    type: "POST",
    url: "login-delete.php",
    data: { cod: codUsuario }
    }).done(function(response) {
        if(response=='true'){
            $("#deleteModal").modal('hide')
        } else {
            console.log(response)
        }
    });
    $("#main").load("login_adm.php")
};

function editUsuario(){
    var cod = $("#usuarioCod").val()
    var nome = $("#usuarioNome").val()
    var login = $("#usuarioLogin").val()
    var email = $("#usuarioEmail").val()

    $.ajax({
    type: "POST",
    url: "login-update.php",
    data: { cod: cod, nome: nome, login: login, email: email }
    }).done(function(response) {
        if(response=='true'){
            $("#editModal").modal('hide')
        } else {
            alert(response)
        }
    });
    $("#main").load("login_adm.php");    
};

$('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('cod')
    var nome = button.data('nome')

    var modal = $(this)
    modal.find('.modal-title').text('Deletar ' + nome)
    modal.find('#usuarioDeleteCod').val(recipient)
})

$('#editModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('cod')
    var nome = button.data('nome')
    var login = button.data('login')
    var email = button.data('email')

    var modal = $(this)
    modal.find('.modal-title').text('Editar ' + nome)
    modal.find('#usuarioCod').val(recipient)
    modal.find('#usuarioNome').val(nome)
    modal.find('#usuarioLogin').val(login)
    modal.find('#usuarioEmail').val(email)
})