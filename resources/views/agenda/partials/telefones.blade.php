<p><a href="{{route("telefone.create",["id"=> $pessoa->id])}}" class="label label-primary">Novo Telefone</a> </p>
<table  class="table table-hover">
    @foreach($telefones as $telefone)
        <tr>
            <td>{{$telefone->descricao}}</td>
            <td>{{$telefone->numero}}</td>
            <td>
                <a href="{{route('telefone.edit',["id"=>$telefone->id])}}" data-toggle="tooltip" data-placement="top"
                   title="Editar ">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="{{route('telefone.delete',["id"=>$telefone->id])}}"
                   class="text-danger" data-toggle="tooltip" data-placement="top"
                   title="Remover">
                    <i class="fa fa-minus-circle"></i>
                </a>
            </td>
        </tr>
    @endforeach
</table>