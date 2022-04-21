<style type="text/css">
    .alert {
        padding: 2px;
        margin-bottom: -5px;
    }
    .buttons {
        margin-top: 25px;
    }
</style>

<form action="{{ (isset($contact) ? route('contact.update', ['id' => $contact->id]) : route('contact.store')) }}" method="POST" id="contacts-form" enctype="multipart/form-data">
    @csrf
    @if(isset($contact))
        {{ method_field('PUT') }}
    @endif

    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-6">
                <label>Nome</label>
                <input type="text" name="name" class="form-control" value="{{ $contact->name ?? old('name') }}" autocomplete="off"  />
                @if($errors->has('name'))
                    <div class="alert alert-danger">
                        {{ $errors->first('name') }} 
                    </div>
                @endif
            </div>

            <div class="form-group col-md-6">
                <label>Contato</label>
                <input type="text" name="contact" class="form-control" value="{{ $contact->contact ?? old('contact') }}" autocomplete="off"  maxlength="9" />
                @if($errors->has('contact'))
                    <div class="alert alert-danger">
                        {{ $errors->first('contact') }} 
                    </div>
                @endif
            </div>  

            <div class="form-group col-md-6">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $contact->email ?? old('email') }}" autocomplete="off"  />
                @if($errors->has('email'))
                    <div class="alert alert-danger">
                        {{ $errors->first('email') }} 
                    </div>
                @endif
            </div>            
        </div>

        <div class="buttons">
            <button type="submit" class="btn btn-primary btn-classic" id="btn-salvar"><i class="fas fa-archive"></i>&nbsp;Salvar</button>
            <a href="{{ route('home') }}" class="btn btn-secondary btn-exit"><i class="fas fa-undo"></i>&nbsp;Voltar</a>
        </div>
       
    </div>
</form>



