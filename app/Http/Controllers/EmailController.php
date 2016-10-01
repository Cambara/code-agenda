<?php
/**
 * Created by PhpStorm.
 * User: cambabunto
 * Date: 01/10/16
 * Time: 12:40
 */

namespace Agenda\Http\Controllers;


use Agenda\Email;
use Agenda\Pessoa;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function create($id)
    {
        $pessoa = Pessoa::find($id);
        return view('agenda.email.create',compact('pessoa'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            "email" => "required|email|min:6|unique:emails",
            "pessoa_id" => "required"
        ]);
        $email = Email::create($request->all());
        return $email->id > 0 ? ['result'=>true]:['result'=>false];
    }
    public function edit($id)
    {
        $email = Email::find($id);
        return view('agenda.email.edit',compact('email'));
    }
    public function update(Request $request, $id)
    {
        $email = Email::find($id);
        $this->validate($request,[
            "email" => "required|email|min:6|unique:emails,email,".$email->id
        ]);
        $email->fill($request->all())->save();
        return $email->id > 0 ? ['result'=>true]:['result'=>false];
    }
    public function delete($id)
    {
        $email = Email::find($id);
        return view('agenda.email.delete',compact('email'));
    }
    public function destroy($id)
    {
        Email::destroy($id);
        return redirect()->route('agenda.index');
    }
}