@extends('layouts.app')
@section('title', 'CBox | Clientes Cadastrados')

<style type="text/css">
    #msg-wrapper {
        margin-top: 10px;
    }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center" id="msg-wrapper">
        <div class="col-md-10 alert alert-success fade show hide" role="alert" id="msg-success">
            <span id="msg-text"></span> 
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <button type="button" class="btn btn-primary" data-toggle="modal" id="insert-modal">
               Adicionar Cliente
            </button>
            <div class="card">
                <div class="card-header">Clientes Cadastrados</div>
                <div class="card-body">
                    @if(isset($clientes) && count($clientes) > 0)
                        <table class="table table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Cidade</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col">Data de Cadastro</th>
                                    <th>Ações</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($clientes as $cliente)
                                <tr>
                                    <th scope="row">{{ $cliente->id }}</th>
                                    <td>{{ $cliente->name }}</td>
                                    <td>{{ $cliente->email }}</td>
                                    <td>{{ $cliente->city }}</td>
                                    <td>{{ $cliente->phone }}</td>
                                    <td>{{ \Carbon\Carbon::parse($cliente->created_at)->format('d/m/Y') }}</td>
                                    @auth
                                        <td>
                                            <a href="#" class="btn btn-warning" title="Editar Cliente" data-id="{{$cliente->id}}" id="edit-modal"><i class="fas fa-pencil-alt white"></i></a>
                                        </td>

                                        <td>
                                            <a href="#" class="btn btn-danger" title="Deletar Cliente" data-id="{{$cliente->id}}" id="delete-modal"><i class="fas fa-trash white"></i></a>
                                        </td>
                                    @endauth
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <tr>
                            Nenhum registro encontrado.
                        </tr>
                    @endif
                </div>
            </div>
            @include('clientes.components.form_clientes')
            @include('clientes.components.modal_confirm')
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('dist/js/jquery-3.5.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/crud_clientes.js') }}"></script>
@endsection
