<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use Session;

class ContactController extends Controller
{
    public function index()
    {   
        $contacts = Contact::where('deleted_at', '=', null)->get();    
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {   
        return view('contacts.create');
    }

    public function store(ContactRequest $request)
    {    
        try{
            $contact = new Contact();

            $contact->name = $request->name;
            $contact->contact = $request->contact;
            $contact->email = $request->email;
            $contact->created_at = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
            $contact->updated_at = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
            $contact->deleted_at =  null;
            $contact->save();

            Session::flash('success', ' Contato inserido com sucesso!');
            return redirect()->route('home');
           
        }catch(\Exception $e) {
            Session::flash('error', ' Não foi possível cadastrar o contato.');
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $contact = Contact::where('id', $id)->first();
        return view('contacts.edit', compact('contact'));
    }

    public function update(ContactRequest $request, $id)
    {
        // dd($request->input('name'));
        // try {

            $contact = Contact::where('id', $id)->first();  

            $contact->name = $request->input('name');
            $contact->contact = $request->input('contact');
            $contact->email = $request->input('email');
            $contact->updated_at = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
            $contact->deleted_at =  null;
            $contact->save();

            Session::flash('success', ' Cadastro atualizado com sucesso!');
            return redirect()->back()->withInput();

        // }catch(\Exception $e) { 
        //     Session::flash('error', ' Não foi possível atualizar o cadastro.');
        //     return redirect()->back()->withInput();
        // }
    }

    public function destroy($id)
    {
        try {
            DigitalUser::where('id_biblioteca_digital_usuario', $id)->update(['deleted_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')]);
            Session::flash('success', ' Cadastro excluído com sucesso!');
            return response()->json(['success' => 'success'], 200);

        }catch (\Exception $e) {
            Session::flash('error', ' Não foi possível excluir o cadastro.');
            return response()->json(["status" => false], 401);
        }
    }

}
