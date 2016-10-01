<p><a href="{{route("email.create",["id"=> $pessoa->id])}}" class="label label-primary">Novo Email</a> </p>

<table  class="table table-hover">
    @foreach($emails as $e)
        <tr>
            <td>{{$e->email}}</td>
            <td>
                <a href="{{route('email.edit',["id"=>$e->id])}}" data-toggle="tooltip" data-placement="top"
                   title="Editar ">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="{{route('email.delete',["id"=>$e->id])}}"
                   class="text-danger" data-toggle="tooltip" data-placement="top"
                   title="Remover">
                    <i class="fa fa-minus-circle"></i>
                </a>
            </td>
        </tr>
    @endforeach
</table>