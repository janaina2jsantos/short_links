<style type="text/css">
    .alert {
        padding: 2px;
        margin-bottom: -5px;
    }
    .hide {
        display: none;
    }
    .center {
        text-align: center;
    }
    #msg-success {
        max-width: 81%;
        margin-top: -20px;
        margin-bottom: 15px;
        padding: 10px 20px;
    }
</style>

<div class="modal fade" role="dialog" aria-hidden="true" id="cadastroModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="texto-modal"></h4>
            </div>
            <div class="modal-body">
                <form id="form-clientes">
                    @csrf
                    @if(isset($cliente))
                        {{ method_field('PUT') }}
                    @endif
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Nome</label>
                                <input type="text" name="name" class="form-control" autocomplete="off" id="name" />
                                <div class="alert alert-danger hide" id="name-error"></div>
                            </div>
                            <div class="form-group col-md-12">
                                <label>E-mail</label>
                                <input type="email" name="email" class="form-control" autocomplete="off" id="email" />
                                <div class="alert alert-danger hide" id="email-error"></div>
                            </div>
                            <div class="form-group col-md-8">
                                <label>Cidade</label>
                                <input type="text" name="city" class="form-control" autocomplete="off" id="city" />
                                <div class="alert alert-danger hide" id="city-error"></div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Estado</label>
                                <input type="text" name="uf" class="form-control" autocomplete="off" maxlength="2" id="uf" />
                                <div class="alert alert-danger hide" id="uf-error"></div>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Telefone</label>
                                <input type="text" name="phone" class="form-control" autocomplete="off" maxlength="15" id="phone" />
                                <div class="alert alert-danger hide" id="phone-error"></div>
                            </div>
                        </div>
                    </div>
                </form>
                <button class="btn progress-button btn-primary btn-lg btn-block" id="btn-prosseguir">
                    <i class="fas fa-sign-out-alt fa-padding"></i>&nbsp;Prosseguir
                </button>
                <button type="button" class="btn progress-button btn-warning btn-lg btn-block" data-dismiss="modal">
                    <i class="fas fa-exclamation-circle fa-padding"></i>&nbsp;Cancelar
                </button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    // Máscara para o telefone
    function mascara(o,f) {
        v_obj = o;
        v_fun = f;
        setTimeout("execmascara()",1);
    }

    function execmascara() {
        v_obj.value = v_fun(v_obj.value);
    }

    function mtel(v) {
        v=v.replace(/\D/g,""); 
        v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); 
        v=v.replace(/(\d)(\d{4})$/,"$1-$2"); 
        return v;
    }

    function id( el ) {
        return document.getElementById(el);
    }

    window.onload = function() {
        id('phone').onkeyup = function(){
            mascara(this, mtel);
        }
    }
</script>







