<?php

namespace Agenda\Http\Controllers;


use Agenda\Pessoa;
use Agenda\Telefone;
use Illuminate\Http\Request;

class TelefoneController extends Controller
{
    public function create($id)
    {
        $pessoa = Pessoa::find($id);
        return view("agenda.telefone.create",compact('pessoa'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            "descricao" => 'required|max:50',
            "codpais"   => 'required|max:8',
            "ddd"       => 'required',
            "prefixo"   => 'required',
            "sufixo"    => 'required',
            "pessoa_id" => 'required'
        ]);
        $telefone = Telefone::create($request->all());
        return $telefone->id > 0 ? ['result' => true]:['result' => false];
    }
    public function edit($id)
    {
        $telefone = Telefone::find($id);
        return view("agenda.telefone.edit",compact('telefone'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            "descricao" => 'required|max:50',
            "codpais"   => 'required|max:8',
            "ddd"       => 'required',
            "prefixo"   => 'required',
            "sufixo"    => 'required'
        ]);
        $telefone = Telefone::find($id);
        $telefone->fill($request->all())->save();
        return $telefone->id > 0 ? ['result' => true]:['result' => false];
    }
    public function delete($id)
    {
        $telefone = Telefone::find($id);
        return view('agenda.telefone.delete',compact('telefone'));
    }
    public function destroy($id)
    {
        Telefone::destroy($id);
        return redirect()->route('agenda.index');
    }
}