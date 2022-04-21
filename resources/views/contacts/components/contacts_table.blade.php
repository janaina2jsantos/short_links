
    <div class="col-md-8">
        <a href="{{ route('contacts.create') }}" class="btn btn-success" id="btn-adicionar">Adicionar Contato</a>
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
                                        <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-warning btn-action" title="Editar Contato"><i class="fas fa-pencil-alt"></i></a>
                                    </td>
                                    <td>
                                        <form action="#" method="POST" id="delete-contato">
                                            @csrf
                                            @method('DELETE') 
                                              <a title="Deletar">
                                              <button type="submit" class="btn btn-danger" onclick="return confirmDelete();">
                                                <i class="fas fa-trash"></i>
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
  

