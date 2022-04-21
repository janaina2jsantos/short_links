@extends('layouts.app')
@section('title', 'ALFASOFT | Ver Detalhes Contato')

<style type="text/css">
    .alert-success {
        padding: 8px !important;
        margin-bottom: 10px !important;
    }
    #delete-contato {
        float: right;
        margin-right: 72%;
    }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ver Contato</li>
              </ol>
            </nav>
            
            <div class="card" style="width: 35rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $contact->name }}</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Email:</strong> {{ $contact->email }}</li>
                    <li class="list-group-item"><strong>Contato:</strong> {{ $contact->contact }}</li>
                    <li class="list-group-item"><strong>Data de Cadastro:</strong> {{ \Carbon\Carbon::parse($contact->created_at)->format('d/m/Y') }}</li>
                </ul>
                <div class="card-body">
                    <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{route('contact.destroy', $contact->id)}}" method="POST" id="delete-contato">
                        @csrf
                        @method('DELETE') 
                        <a title="Deletar Contato">
                            <button type="submit" class="btn btn-danger" onclick="return confirmDelete();">
                                Deletar
                            </button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
     // Funçao para confirmar delete 
     function confirmDelete() {
        if (confirm("Tem certeza que deseja excluir esse contato? Essa ação é irreversível!")) {
            return true;
        }else {
            return false;
        }
     }
</script>
@endsection
