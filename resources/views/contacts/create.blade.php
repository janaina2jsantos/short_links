@extends('layouts.app')
@section('title', 'ALFASOFT | Adicionar Contatos')

<style type="text/css">
    .login-box {
        margin: 0 auto;
    }
    .container {
        padding-top: 10px;
    }
    .image {
        text-align: center;
        padding-top: 10px;
        margin-bottom: 15px;
    }
    .image img {
        width: 150px;
    }
    .btn-pesquisa {
        margin-top: 31px;
    }
    #texto-pesquisa {
        font-size: 17px;
    }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
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
                    @include('contacts.components.form_contacts')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
