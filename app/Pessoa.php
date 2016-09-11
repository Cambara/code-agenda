<?php

namespace Agenda;


use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = ['nome','apelido','sexo'];

    public function telefones()
    {
        return $this->hasMany('Agenda\Telefone');
    }
}