@extends('layouts.app')
@section('title', 'CBox | Links Cadastrados')

<style type="text/css">
    .hide {
        display: none;
    }
    .disabled {
        pointer-events: none;
        cursor: default;
        text-decoration: none;
        background-color: #b7b7b7 !important;
        border-color: #b7b7b7 !important;
        color: #fff !important;
    }
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
            @if(!\Auth()->user()->is_admin)
                <button type="button" class="btn btn-primary" data-toggle="modal" id="insert-modal">
                    Adicionar Link
                </button>
            @endif
            <div class="card">
                <div class="card-header">Links Cadastrados</div>
                <div class="card-body">
                    @if(isset($links) && count($links) > 0)
                        <table class="table table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Link Encurtado</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Acessos</th>
                                    <th scope="col">Data de Cadastro</th>
                                    <th>Ações</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($links as $link)
                                <tr>
                                    <th scope="row">{{ $link->id }}</th>
                                    <td><a href="{{ $link->url }}" target="_blank" onclick="contarAcessos(`{{$link->id}}`);">{{ $link->url_short }}</a></td>
                                    <td><?=substr(strip_tags($link['url']), 0, 30) . '...'?></td>
                                    <td>{{ $link->counter }}</td>
                                     <td>{{ \Carbon\Carbon::parse($link->created_at)->format('d/m/Y') }}</td>
                                    @auth
                                        <td>
                                            <a href="#" class="btn btn-warning {{ (\Auth()->user()->is_admin) ? 'disabled' : '' }}" title="Editar link" data-id="{{$link->id}}" id="edit-modal"><i class="fas fa-pencil-alt white"></i></a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-danger {{ (\Auth()->user()->is_admin) ? 'disabled' : '' }}" title="Deletar link" data-id="{{$link->id}}" id="delete-modal"><i class="fas fa-trash white"></i></a>
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
            @include('links.components.form_links')
            @include('links.components.modal_confirm')
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('dist/js/jquery-3.5.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/crud_links.js') }}"></script>
@endsection
