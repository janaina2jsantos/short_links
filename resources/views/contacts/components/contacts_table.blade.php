<style type="text/css">
    .btn-success {
        margin-bottom: 10px;
    }
    .white {
        color: #fff !important;
    }
</style>

    <div class="col-md-10">
        <a href="{{ route('contact.create') }}" class="btn btn-success" id="btn-adicionar"><i class="fas fa-user-plus"></i> Adicionar Contato</a>
        <div class="card">
            <div class="card-header">Contatos Cadastrados</div>
            <div class="card-body">
                @if($contacts->count() > 0)
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Contato</th>
                                <th scope="col">Email</th>
                                <th scope="col">Data Cadastro</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as $contact)
                            <tr>
                                <th scope="row">{{ $contact->id }}</th>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->contact }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ \Carbon\Carbon::parse($contact->created_at)->format('d/m/Y') }}</td>

                                @auth
                                    <td>
                                        <a href="{{ route('contact.show', $contact->id) }}" class="btn btn-primary btn-action" title="Detalhes do Contato"><i class="fas fa-address-card white"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-warning" title="Editar Contato"><i class="fas fa-pencil-alt white"></i></a>
                                    </td>
                                    <td>
                                        <form action="{{route('contact.destroy', $contact->id)}}" method="POST" id="delete-contato">
                                            @csrf
                                            @method('DELETE') 
                                            <a title="Deletar Contato">
                                                <button type="submit" class="btn btn-danger" onclick="return confirmDelete();">
                                                    <i class="fas fa-trash white"></i>
                                                </button>
                                            </a>
                                        </form>
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
    </div>
  

