<?php

namespace Agenda;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pessoa extends Model
{
    protected $fillable = ['nome','apelido','sexo'];

    public function telefones()
    {
        return $this->hasMany('Agenda\Telefone');
    }
    public function emails()
    {
        return $this->hasMany('Agenda\Email');
    }
    /**
     * @return array
     */
    public static function getLetras()
    {
        $letras = DB::select(DB::raw("SELECT DISTINCT value
                                        FROM (
                                            SELECT DISTINCT LEFT(nome, 1) AS value FROM pessoas
                                            UNION SELECT DISTINCT LEFT(apelido, 1) AS value FROM pessoas
                                        ) AS letra"));
        return array_map(function ($letra){return $letra->value;}, $letras);
    }
}