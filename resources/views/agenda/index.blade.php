@extends('template')

@section('title')Home @endsection

@section('container')

    @foreach($pessoas as $pessoa)
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span>{{$pessoa->apelido}}</span>
                        <span class="pull-right">
                            @if($pessoa->sexo == 'M')
                                    <i class="fa fa-male"></i>
                                @else
                                    <i class="fa fa-female"></i>
                                @endif
                        </span>
                        <span class="pull-right contacts-btn-actions">
                            <a href="#" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top"
                            title="Editar">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{route('pessoa.destroy',["id" => $pessoa->id])}}"
                               class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top"
                               title="Remover">
                                <i class="fa fa-minus-circle"></i>
                            </a>
                        </span>
                    </h3>
                </div>
                <div class="panel-body">
                    <h3>{{$pessoa->nome}}</h3>
                    <table  class="table table-hover">
                        @foreach($pessoa->telefones as $telefone)
                            <tr>
                                <td>{{$telefone->descricao}}</td>
                                <td>{{$telefone->numero}}</td>
                                <td>
                                    <a href="{{route('telefone.destroy',["id"=>$telefone->id])}}"
                                       class="text-danger" data-toggle="tooltip" data-placement="top"
                                       title="Remover">
                                        <i class="fa fa-minus-circle"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    @endforeach
@endsection
