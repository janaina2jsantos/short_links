@extends('layouts.app')
@section('title', 'ALFASOFT | Atualizar Contato')

<style type="text/css">
    .alert-success {
        position: absolute !important;
        top: 70px !important;
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

        <div class="col-md-8">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Library</li>
              </ol>
            </nav>
            <div class="card">
                <div class="card-header">Adicionar Contato</div>
                <div class="card-body">
                    @include('contacts.components.form_contacts', ['contact' => $contact])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
