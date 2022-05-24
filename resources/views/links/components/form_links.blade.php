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

<div class="modal fade" role="dialog" aria-hidden="true" id="cadastroModalLink">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="texto-modal"></h4>
            </div>
            <div class="modal-body">
                <form id="form-links">
                    @csrf
                    @if(isset($link))
                        {{ method_field('PUT') }}
                    @endif
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>URL</label>
                                <input type="text" name="url" class="form-control" autocomplete="off" id="url" />
                                <small id="emailHelp" class="form-text text-muted">Cole a URL para ser encurtada.</small>
                                <div class="alert alert-danger hide" id="url-error"></div>
                            </div>
                            <div class="form-group col-md-12">
                                <label>URL Encurtada</label>
                                <input type="text" name="url_short" class="form-control" autocomplete="off" id="url_short" placeholder="qBE01" maxlength="5" />
                                <small id="emailHelp" class="form-text text-muted">Siga o exemplo acima para gerar a url encurtada.</small>
                                <div class="alert alert-danger hide" id="url_short-error"></div>
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









