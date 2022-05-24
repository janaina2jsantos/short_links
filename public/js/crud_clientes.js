$(document).ready(function() {
    // Inserir cadastro
    $(document).on('click', '#insert-modal', function() {
        jQuery.noConflict();
        $('#cadastroModal').modal('show');
        $('#texto-modal').text("Cadastrar Cliente");
        $("#form-clientes input").val('');
        $('.hide').hide();

        // Modal confirm  
        $('#cadastroModal').modal({
        }).on('click', '#btn-prosseguir', function(e) {
            e.preventDefault();
            var name = $("#name").val();
            var email = $("#email").val();
            var city = $("#city").val();
            var uf = $("#uf").val();
            var phone = $("#phone").val();        

            // Submit form
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '/clientes/cadastrar',
                type: 'POST',
                data:{
                    name:name,
                    email:email,
                    city:city,
                    uf:uf,
                    phone:phone
                  },
                success: function(data) { 
                    if (data.success) {
                        $('#msg-success').show().find('#msg-text').text(data.success); 
                        $('#cadastroModal').modal('hide');
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
            $('#cadastroModal').modal('toggle');
        });
    });

    // Editar cadastro
    $(document).on('click', '#edit-modal', function() {
        var id = $(this).data('id');
        jQuery.noConflict();
        $('#name-error').hide();
        $('#email-error').hide();
        $('#city-error').hide();
        $('#uf-error').hide();
        $('#phone-error').hide();

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '/clientes/editar/'+id,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var name = "";
                var email = "";
                var city = "";
                var uf = "";
                var phone = "";
                
                // Pegando os valores do db e exibindo nos inputs
                $('#cadastroModal').modal('show');
                $('#texto-modal').text("Atualizar Cadastro");
                $("#name").val(data.cliente.name);
                $("#email").val(data.cliente.email);
                $("#city").val(data.cliente.city);
                $("#uf").val(data.cliente.uf);
                $("#phone").val(data.cliente.phone);                

                // Modal Confirm  
                $('#cadastroModal').modal({
                }).on('click', '#btn-prosseguir', function(e) {
                    e.preventDefault();
                    // Atriuindo novos valores aos inputs
                    name = $("#name").val();
                    email = $("#email").val();
                    city = $("#city").val();
                    uf = $("#uf").val();
                    phone = $("#phone").val();

                    // Submit Form
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: '/clientes/editar/'+id,
                        type: 'PUT',
                        data:{
                            name:name,
                            email:email,
                            city:city,
                            uf:uf,
                            phone:phone
                          },
                        success: function(data) { 
                            if (data.success) {
                                $('#msg-success').show().find('#msg-text').text(data.success); 
                                $('#cadastroModal').modal('hide');
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
                    $('#cadastroModal').modal('toggle');
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
                url: '/clientes/deletar/'+id,
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
    $('#cadastroModal').on('hidden.bs.modal', function () {
        $(this).find('#clientes-form').trigger('reset');
    });

});// end read