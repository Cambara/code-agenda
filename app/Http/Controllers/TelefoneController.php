<?php

namespace Agenda\Http\Controllers;


use Agenda\Telefone;

class TelefoneController extends Controller
{
    public function destroy($id)
    {
        Telefone::destroy($id);
        return redirect()->route('agenda.index');
    }
}