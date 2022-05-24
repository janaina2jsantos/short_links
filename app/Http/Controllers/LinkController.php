<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use App\Http\Requests\LinkRequest;

class LinkController extends Controller
{
    public function index()
    {
        $links = Link::where('deleted_at', '=', null)->get();    
        return view('links.index', compact('links'));
    }

    public function store(LinkRequest $request)
    {   
        try{
            $link = new Link();
            $short = "http://localhost:8000/".$request->url_short;
            $has_url = $link->where("url_short", $short)->get();

            if (count($has_url) > 0) {
                return response()->json(['error' => 'Essa URL já está cadastrada. Por favor, informe um valor diferente.']);
            }
            else{
                $link->user_id = Auth()->user()->id;
                $link->url = $request->url;
                $link->url_short = $short;
                $link->counter = 0;
                $link->created_at = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
                $link->updated_at = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
                $link->deleted_at = null;
                $link->save();
                return response()->json(['success' => 'Link cadastrado com sucesso!']);
            }
        }catch(\Exception $e) {
            return response()->json(['error' => 'Não foi possível realizar o cadastro.']);
        }
    }

    public function edit($id)
    {
        $link = Link::findOrFail($id);
        return response()->json(['link' => $link]);
    }

    public function update(LinkRequest $request, $id)
    {
        try {
            $link = Link::findOrFail($id);
            $short = "http://localhost:8000/".$request->input('url_short');
            $has_url = Link::where("url_short", $short)->where('id', '!=', $id)->get();

            if (count($has_url) > 0) {
                return response()->json(['error' => 'Essa URL já está cadastrada. Por favor, informe um valor diferente.']);
            }
            else {
                $link->url = isset($request->url) ? $request->input('url') : $link->url;
                $link->url_short = isset($short) ? $short : $link->url_short;
                $link->updated_at = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
                $link->deleted_at = null;
                $link->save();
                return response()->json(['success' => 'Link atualizado com sucesso!']);
            }            
        }catch(\Exception $e) { 
            return response()->json(['error' => 'Não foi possível atualizar o cadastro.']);
        }
    }

    public function destroy($id)
    {
        try {
            Link::where('id', $id)->update(['deleted_at' => \Carbon\Carbon::now()->format('Y-m-d')]);
            return response()->json(['success' => 'Link excluído com sucesso!']);

        }catch (\Exception $e) {
            return response()->json(['success' => 'Não foi possível excluir o cadastro.']);
        }
    }

    public function counter($id)
    {
        $link = Link::findOrFail($id);
        $link->update([
            'counter' => $link->counter+1
        ]);
        
        return response()->json(['success' => 'Counter atualizado.']);
    }
}

