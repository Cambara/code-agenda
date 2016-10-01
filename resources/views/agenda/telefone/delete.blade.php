@extends('template')

@section('title') Remover Pessoa @endsection

@section('container')
    <div class="col-md-6">
        <h3>
            <span class="header_apagar">Deseja realmente apagar este telefone ?</span>
            <small>{{$telefone->descricao}}: {{ $telefone->numero }}</small>
        </h3>
        <form action="{{route('telefone.destroy',['id'=>$telefone->id])}}" method="post">
            <input type="hidden" name="_method" value="DELETE" />
            <button type="submit" class="btn btn-danger">Apagar</button>
            <a href="{{route('agenda.index')}}" class="btn btn-primary">Voltar</a>
        </form>
    </div>
    <div class="col-md-6">
        @include('agenda.partials.contato',["pessoa"=>$telefone->pessoa])
    </div>
@endsection