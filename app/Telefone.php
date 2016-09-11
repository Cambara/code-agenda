<?php
/**
 * Created by PhpStorm.
 * User: cambabunto
 * Date: 05/09/16
 * Time: 21:13
 */

namespace Agenda;


use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $fillable = ['descricao','codpais','ddd','prefixo','sufixo'];

    public function pessoa(){
        return $this->belongsTo('Agenda\Pessoa');
    }
}