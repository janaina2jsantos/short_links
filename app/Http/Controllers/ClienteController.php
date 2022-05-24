<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\ClienteRequest;
use Illuminate\Support\Facades\Hash;
use Session;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = User::where('is_admin', '=', 0)->get();    
        return view('clientes.index', compact('clientes'));
    }

    public function store(ClienteRequest $request)
    {    
        try{
            $cliente = new User();
            $cliente->name = $request->name;
            $cliente->email = $request->email;
            $cliente->password = Hash::make('123456');
            $cliente->city = $request->city;
            $cliente->uf = $request->uf;
            $cliente->phone = $request->phone;
            $cliente->created_at = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
            $cliente->updated_at = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
            $cliente->deleted_at =  null;
            $cliente->save();
            return response()->json(['success' => 'Cliente cadastrado com sucesso!']);
           
        }catch(\Exception $e) {
            return response()->json(['error' => 'Não foi possível realizar o cadastro.']);
        }
    }

    public function edit($id)
    {
        $cliente = User::findOrFail($id);
        return response()->json(['cliente' => $cliente]);
    }

    public function update(ClienteRequest $request, $id)
    {
        $cliente = User::findOrFail($id);

        try {
            $cliente->name = isset($request->name) ? $request->input('name') : $cliente->name;
            $cliente->email = isset($request->email) ? $request->input('email') : $cliente->email;
            $cliente->city = isset($request->city) ? $request->input('city') : $cliente->city;
            $cliente->uf = isset($request->uf) ? $request->input('uf') : $cliente->uf;
            $cliente->phone = isset($request->phone) ? $request->input('phone') : $cliente->phone;
            $cliente->updated_at = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
            $cliente->deleted_at = null;
            $cliente->save();
            return response()->json(['success' => 'Cadastro atualizado com sucesso!']);

        }catch(\Exception $e) { 
            return response()->json(['error' => 'Não foi possível atualizar o cadastro.']);
        }
    }

    public function destroy($id)
    {
        try {
            User::where('id', $id)->update(['deleted_at' => \Carbon\Carbon::now()->format('Y-m-d')]);
            return response()->json(['success' => 'Cadastro excluído com sucesso!']);

        }catch (\Exception $e) {
            return response()->json(['success' => 'Não foi possível excluir o cadastro.']);
        }
    }
}
