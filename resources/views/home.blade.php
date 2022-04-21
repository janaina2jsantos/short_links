@extends('layouts.app')
@section('title', 'ALFASOFT | Contatos Cadastrados')

<style type="text/css">
    .alert-success {
        padding: 8px !important;
        margin-bottom: 10px !important;
    }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
          @if(Session::has('success'))
               <div class="col-md-6 alert alert-success w-50 alert-dismissible alert-dismissible-02 fade show" role="alert" id="close">
                      <strong><i class="fas fa-check-circle"></i></strong>&nbsp;{{ Session::get('success') }}
               </div>
          @endif
          @include('contacts.components.contacts_table', ['contacts' => $contacts])
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
