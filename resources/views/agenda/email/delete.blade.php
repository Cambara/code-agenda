@extends('template')

@section('title') Remover Email @endsection

@section('container')
    <div class="col-md-6">
        <h3>
            <span class="header_apagar">Deseja realmente apagar este Email ?</span>
            <small>{{$email->email}}</small>
        </h3>
        <form action="{{route('email.destroy',['id'=>$email->id])}}" method="post">
            <input type="hidden" name="_method" value="DELETE" />
            <button type="submit" class="btn btn-danger">Apagar</button>
            <a href="{{route('agenda.index')}}" class="btn btn-primary">Voltar</a>
        </form>
    </div>
@endsection