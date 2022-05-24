@extends('layouts.app')
@section('title', 'CBox | Página Inicial')

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
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Bem-vindo(a)
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Sistema encurtador de URL</h5>
                        <p class="card-text">Suas URLs encurtadas podem ser usadas em publicações, blogs, fóruns, e-mails, mensagens instantâneas e outros locais. Acompanhe as estatísticas para seus negócios e projetos monitorando a quantidade de acessos da sua URL com o contador de cliques.</p>
                        @guest
                            <a href="{{ route('login') }}" class="btn btn-primary" id="btn-adicionar"><i class="fas fa-user"></i> Faça login</a>
                        @else
                            @if(\Auth()->user()->is_admin)
                                <a href="{{ route('clientes.index') }}">Voltar</a><br />
                            @else
                                <a href="{{ route('links.index') }}">Voltar</a>
                            @endif
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

