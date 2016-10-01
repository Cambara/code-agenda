<?php
namespace Agenda\Http\Controllers;


use Agenda\Pessoa;
use Illuminate\Http\Request;
class AgendaController extends Controller
{
    public function index($name = '', Request $request)
    {
        $pesquisa = $request->input('p');
        if($pesquisa != null)
        {
            $name = $pesquisa;
        }

        $pessoas = Pessoa::where('nome','like',"$name%")
                    ->orWhere('apelido','like', "$name%")->get();
        return view('agenda.index',["pessoas" => $pessoas]);
    }
}
