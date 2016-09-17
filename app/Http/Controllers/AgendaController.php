<?php
namespace Agenda\Http\Controllers;


use Agenda\Pessoa;
use Illuminate\Http\Request;
class AgendaController extends Controller
{
    public function index($name = 'A', Request $request)
    {
        $pesquisa = $request->input('p');
        if($pesquisa != null)
        {
            $name = $pesquisa;
        }
        $letras = array_map(function ($letra){return $letra->value;}, Pessoa::getLetras() );

        $pessoas = Pessoa::where('nome','like',"$name%")
                    ->orWhere('apelido','like', "$name%")->get();
        return view('agenda.index',["pessoas" => $pessoas,"letras"=> $letras]);
    }
}
