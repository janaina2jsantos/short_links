$(document).ready(function() {
    // Inserir cadastro
    $(document).on('click', '#insert-modal', function() {
        jQuery.noConflict();
        $('#cadastroModalLink').modal('show');
        $('#texto-modal').text("Cadastrar Link");
        $("#form-links input").val('');
        $('.hide').hide();

        // Modal confirm  
        $('#cadastroModalLink').modal({
        }).on('click', '#btn-prosseguir', function(e) {
            e.preventDefault();
            var url = $("#url").val();
            var url_short = $("#url_short").val();

            // Submit form
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '/links/cadastrar',
                type: 'POST',
                data:{
                    url:url,
                    url_short:url_short
                  },
                success: function(data) { 
                    if (data.success) {
                        $('#msg-success').show().find('#msg-text').text(data.success); 
                        $('#cadastroModalLink').modal('hide');
                        setTimeout(function() {
                            location.reload();
                        },2000);
                    }
                    else {
                        $('#url_short-error').show().html(data.error);
                    }
                },
                error: function(response) { 
                    if (response.responseJSON.errors) {
                        $.each( response.responseJSON.errors, function(key, value) {
                            $('#'+key+'-error').show().html(value);
                        });
                    }
                }
            });
        }).on('click', '#btn-cancelar', function(e) {            
            $('#cadastroModalLink').modal('toggle');
        });
    });

    // Editar cadastro
    $(document).on('click', '#edit-modal', function() {
        var id = $(this).data('id');
        jQuery.noConflict();
        $('#url-error').hide();
        $('#url_short-error').hide();

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '/links/editar/'+id,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var url = "";
                var url_short = "";
                
                // Pegando os valores do db e exibindo nos inputs
                $('#cadastroModalLink').modal('show');
                $('#texto-modal').text("Atualizar Link");
                $("#url").val(data.link.url);
                $("#url_short").val(data.link.url_short.substring(data.link.url_short.indexOf("/") + 17));  
                               
                // Modal Confirm  
                $('#cadastroModalLink').modal({
                }).on('click', '#btn-prosseguir', function(e) {
                    e.preventDefault();
                    // Atriuindo novos valores aos inputs
                    url = $("#url").val();
                    url_short = $("#url_short").val();

                    // Submit Form
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: '/links/editar/'+id,
                        type: 'PUT',
                        data:{
                            url:url,
                            url_short:url_short
                          },
                        success: function(data) { 
                            if (data.success) {
                                $('#msg-success').show().find('#msg-text').text(data.success); 
                                $('#cadastroModalLink').modal('hide');
                                setTimeout(function() {
                                    location.reload();
                                },2000);
                            }
                        },
                        error: function(response) { 
                            if (response.responseJSON.errors) {
                                $.each( response.responseJSON.errors, function(key, value) {
                                    $('#'+key+'-error').show().html(value);
                                });
                            }
                        }
                    });
                }).on('click', '#btn-cancelar', function(e) {
                    $('#cadastroModalLink').modal('toggle');
                });

            }// end success
        });
    });

    // Deletar cadastro
    $(document).on('click', '#delete-modal', function() {
        var id = $(this).data('id');
        jQuery.noConflict();
        $('#deleteModal').modal('show');

        // Modal confirm
        $('#deleteModal').modal({
        }).on('click', '#btn-prosseguir', function(e) {
            e.preventDefault();
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '/links/deletar/'+id,
                type: 'DELETE',
                dataType: 'json',
                data: {method: '_DELETE', submit: true}, 
                success: function(data) { 
                    if (data.success) {
                        $('#msg-success').show().find('#msg-text').text(data.success); 
                        $('#deleteModal').modal('hide');
                        setTimeout(function() {
                            location.reload();
                        },2000);
                    }
                }
            });
        }).on('click', '#btn-cancelar', function(e) {
            $('#deleteModal').modal('toggle'); 
        });
    });

    // Resetar Modal
    $('#cadastroModalLink').on('hidden.bs.modal', function () {
        $(this).find('#clientes-form').trigger('reset');
    });

});// end ready

function contarAcessos(id) {
    var id = id;
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: '/links/counter/'+id,
        type: 'GET',
        method: 'PUT',
        data:{
            id:id
        },
        success: function(data) { 
            window.location.href = "/links";
        },
        error: function(response) { 
            // console.log(response);
        }
    });
}