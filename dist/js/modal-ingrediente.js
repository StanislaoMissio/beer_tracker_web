$('#modalEdit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.contact100-form-title-modal').text('Editar ' + recipient)
    modal.find('.modal-body input').val(recipient)
  })

$('#modalDelete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever')
    var recipients = recipient.split("/") // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.contact100-form-title-modal').text('Deletar ' + recipients[0] + '?')
    modal.find('.modal-body input').val()
    modal.find('.text-hidden').text(recipients[1])
  })

$('#btn-delete').on('click', function(e) {
  var codIngrediente = $(this).find(".text-hidden").text();
                              
  alert(codIngrediente)
  $.ajax({
    type: "POST",
    url: "ingredientes-delete.php",
    data: { 'cod' : codIngrediente },
    success: function(data) {
        alert('success');
    }
  }) 
});

$('#btn-edit').on('click', function(e) {
  var codIngrediente = $('#codIngrediente').html();
  var nomeIngrediente = $('#').html();
  var descricaoIngrediente = $('#codIngrediente').html();
  
  $.ajax({
    type: "POST",
    url: "ingredientes-delete.php",
    data: { 'cod' : codIngrediente },
    success: function(data) {
        alert('success');
      } 
  }) 
});

$('#btn-delete-login').on('click', function(e) {
  var codUsuario = $('#codUsuario').html();
  $.ajax({
    type: "POST",
    url: "login-delete.php",
    data: { 'cod_usuario' : codUsuario },
    success: function(data) {
      if(data.status == 'success'){
        alert('success');
      } 
  }
  }) 
});