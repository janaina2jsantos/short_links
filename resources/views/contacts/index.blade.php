@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
          @include('contacts.components.contacts_table', ['contacts' => $contacts])
     </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $('#btn-adicionar').on('click', function() {
        var loggedIn = {{ auth()->check() ? 'true' : 'false' }};
        if (!loggedIn) {
            alert('Você precisa fazer login para cadastrar novos contatos!'); 
        }
    });
</script>
@endsection