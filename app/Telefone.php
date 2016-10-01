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
    protected $fillable = ['descricao','codpais','ddd','prefixo','sufixo','pessoa_id'];

    public function pessoa(){
        return $this->belongsTo('Agenda\Pessoa');
    }

    public function getNumeroAttribute()
    {
        return "{$this->codpais} ({$this->ddd}) {$this->prefixo}-{$this->sufixo}";
    }
}