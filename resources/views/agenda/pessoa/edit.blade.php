@extends('template')

@section('title') Editar Contato @endsection

@section('container')
    <h3>Editar Contato - {{$pessoa->nome}}</h3>
    <hr/>
    <div class="col-md-6">
        <form id="form_contato" class="form-horizontal" method="post" action="{{route('pessoa.update',["id"=>$pessoa->id])}}">
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome Completo"
                           value="{{$pessoa->nome}}">
                </div>
            </div>
            <div class="form-group">
                <label for="apelido" class="col-sm-2 control-label">Apelido</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="apelido" name="apelido" placeholder="Apelido"
                        value="{{$pessoa->apelido}}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="radio">
                        <label>
                            <input name="sexo" type="radio" value="F" @if($pessoa->sexo == 'F') checked @endif>
                            <i class="fa fa-female"></i>
                        </label><br>
                        <label>
                            <input name="sexo" type="radio" value="M" @if($pessoa->sexo == 'M') checked @endif>
                            <i class="fa fa-male"></i>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Alterar</button>
                </div>
            </div>
        </form>

        @include('agenda.partials.telefones',["telefones" => $pessoa->telefones])
        @include('agenda.partials.emails',["emails"=> $pessoa->emails])
    </div>
    <div class="col-md-6">
        <div id="erros" class="alert alert-danger" style="display: none;">
        </div>

    </div>

@endsection
@section('scripts')
<script type="text/javascript">

    $('#form_contato').submit(function (event) {
       event.preventDefault();
       var $form   = $(this),
           nome_attr    = $form.find("input[name='nome']").val(),
           apelido_attr = $form.find("input[name='apelido']").val(),
           sexo_attr    = $form.find("input[name='sexo']:checked").val(),
           url          = $form.attr("action");
        var posting = $.post(url,{nome:nome_attr, apelido: apelido_attr, sexo: sexo_attr, _method: 'PUT' });
        posting.done(function (data) {
            if(data.result)
            {
                var n = document.getElementById("nome").value;

                window.location.href = '{{route('agenda.index')}}/'+n.substr(0,1);
            }else{
                alert('Ops tivemos um problema ao editar seu usuário');
            }
        });
        posting.fail(function (data) {
            data = data.responseJSON;
            var erros = document.getElementById('erros');
            erros.style.display = 'block';
            erros.innerHTML = "";
            var lista = document.createElement('ul');
            for(campo in data)
            {
                for(e in data[campo])
                {
                    var li = document.createElement('li');
                    li.innerHTML = data[campo][e];
                    lista.appendChild(li);
                }
            }
            erros.appendChild(lista);
        });
    });

</script>
@endsection