<?php
/**
 * Created by PhpStorm.
 * User: cambabunto
 * Date: 01/10/16
 * Time: 12:31
 */

namespace Agenda;

use Illuminate\Database\Eloquent\Model;
class Email extends Model
{
    protected $fillable = ['email','pessoa_id'];

    public function pessoa()
    {
        return $this->belongsTo('Agenda\Pessoa');
    }
}