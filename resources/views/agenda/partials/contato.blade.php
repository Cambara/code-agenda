<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <span>{{$pessoa->apelido}}</span>
            <span class="pull-left contacts-icon-sexo">
                            @if($pessoa->sexo == 'M')
                    <i class="fa fa-male"></i>
                @else
                    <i class="fa fa-female"></i>
                @endif
                        </span>
            <span class="pull-right">
                            <a href="{{route('pessoa.edit',['id'=>$pessoa->id])}}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top"
                               title="Editar">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{route('pessoa.delete',["id" => $pessoa->id])}}"
                               class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top"
                               title="Remover">
                                <i class="fa fa-minus-circle"></i>
                            </a>
                        </span>
        </h3>
    </div>
    <div class="panel-body">
        <h3>{{$pessoa->nome}}</h3>
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#email_{{$pessoa->id}}" aria-controls="Emails" role="tab" data-toggle="tab">Email</a>
            </li>
            <li role="presentation">
                <a href="#telefone_{{$pessoa->id}}" aria-controls="Telefones" role="tab" data-toggle="tab">Telefone</a>
            </li>
        </ul>
        <div class="tab-content" style="margin-top: 20px;">
            <div role="tabpanel" class="tab-pane active" id="email_{{$pessoa->id}}">
                @include('agenda.partials.emails',["emails" => $pessoa->emails])
            </div>
            <div role="tabpanel" class="tab-pane" id="telefone_{{$pessoa->id}}">
                @include('agenda.partials.telefones',["telefones" => $pessoa->telefones])
            </div>
        </div>
    </div>
</div>
