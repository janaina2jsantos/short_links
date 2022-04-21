@extends('layouts.app')
@section('title', 'ALFASOFT | Contatos Cadastrados')

<style type="text/css">
     .alert-success {
          position: absolute !important;
          top: 76px !important;
          width: 35% !important;
          padding: 8px !important;
     }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
          @if(Session::has('success'))
               <div class="col-md-6 alert alert-success alert-dismissible fade show" role="alert">
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
          if (confirm("Tem certeza que deseja excluir esse Contato? Essa ação é irreversível!")) {
               return true;
          }else {
               return false;
          }
     }
</script>
@endsection
