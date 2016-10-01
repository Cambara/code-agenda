<?php

namespace Agenda\Http\Controllers;


use Agenda\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PessoaController extends Controller
{
    public function create()
    {
        return view('agenda.pessoa.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'nome' => 'required|min:3|max:255|unique:pessoas',
            'apelido' => 'required|min:2|max:50',
            'sexo' => 'required'
        ]);
        $pessoa = Pessoa::create($request->all());
        return $pessoa->id > 0 ? ['result' => true]:['result' => false];
    }
    public function edit($id)
    {
        $pessoa = Pessoa::find($id);
        return view("agenda.pessoa.edit",compact('pessoa'));
    }
    public function update(Request $request, $id)
    {
        $pessoa = Pessoa::find($id);
        $this->validate($request,[
            'nome' => 'required|min:3|max:255|unique:pessoas,nome,'.$pessoa->id,
            'apelido' => 'required|min:2|max:50',
            'sexo' => 'required'
        ]);
        $pessoa->fill($request->all())->save();
        return $pessoa->id > 0 ? ['result' => true]:['result' => false];
    }
    public function delete($id)
    {
        $pessoa = Pessoa::find($id);
        return view('agenda.pessoa.delete', compact('pessoa'));
    }
    public function destroy($id)
    {
        Pessoa::destroy($id);
        return redirect()->route('agenda.index');
    }
}