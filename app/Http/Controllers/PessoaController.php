<?php

namespace Agenda\Http\Controllers;


use Agenda\Pessoa;

class PessoaController extends Controller
{
    public function destroy($id)
    {
        Pessoa::destroy($id);
        return redirect()->route('agenda.index');
    }
}